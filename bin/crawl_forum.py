
import requests,sys,re, os, csv
import sqlite3
from bs4 import BeautifulSoup
import time

conn=sqlite3.connect("TBS.db")

def createTables():
	conn.execute("CREATE TABLE forum_roots (id INTEGER PRIMARY KEY, title TEXT, parentID INTEGER);")
	conn.execute("CREATE TABLE forums (id INTEGER PRIMARY KEY, title TEXT, description TEXT, root INTEGER);")
	conn.execute("CREATE TABLE forum_topics (id INTEGER PRIMARY KEY, title TEXT, author TEXT, forumID INTEGER, challengeID INTEGER);")
	conn.execute("CREATE TABLE forum_posts (id INTEGER PRIMARY KEY, title TEXT, message TEXT, postdate INTEGER, author TEXT, topic INTEGER, editedby TEXT, editdate INTEGER);")
	conn.commit()


def getRootRecursive(node,parentID):
	# crawl the "tr" tags
	lines= node.find_all("tr",recursive=False)
	for tr in lines:
		cl=tr.find("td")["class"][0]
		if cl=="tree" or cl=="tree_b":
			# spacer, ignore
			pass
		elif cl=="content":
			#sub-category
			link=tr.find("a",attrs={"class":"dir"})
			if link:
				rootName=link.text
				rootID=re.search("javascript:goVisit\\(([0-9]*)\\)",link["href"]).group(1)
				conn.execute("INSERT INTO forum_roots (id,title,parentid) values(?,?,?)",[rootID,rootName,parentID])
				conn.commit()
				print("new root",rootName,rootID)

				# retreive content
				content=tr.parent.find("tr",attrs={"id":"tr_deeper_{}".format(rootID)}).find_all("td")[1].find("table")
				getRootRecursive(content,rootID)

		elif cl=="tree_a":
			#forum
			forumNode=tr.find_all("td",recursive=False)[1].find("table").find("tr").find("td")
			forumDesc=forumNode.text.strip().split("--[")
			forumName=forumDesc[0]
			forumDesc=forumDesc[1][:-1]
			forumID=re.search("goVisit\\(([0-9]*)\\)",forumNode["onclick"]).group(1)
			print("forum",forumID,forumName,forumDesc)
			conn.execute("INSERT INTO forums (id,title,root,description) values(?,?,?,?)",[forumID,forumName,parentID,forumDesc])
			#conn.commit()

def getRoot():
	# start from empty db
	conn.execute("DELETE from forum_roots")
	conn.execute("DELETE from forums")
	
	resp=requests.get("http://bright-shadows.net/forum/forum_structure.php",cookies=cookies,params={"rootid":13})
	soup = BeautifulSoup(resp.content,"lxml")
	conn.execute("INSERT INTO forum_roots (id,title,parentID) VALUES (13,'TheBlackSheep',NULL)")
	conn.commit()
	getRootRecursive(soup.find("table",attrs={"class":"forum_structure_blind"}),13)


def getTopics(forumID):
	resp=requests.get("http://bright-shadows.net/forum/forum_showforum.php",params={"forumid":forumID},cookies=cookies)
	# get number of pages
	soup = BeautifulSoup(resp.content,"lxml")
	nbPages=int(re.search("\\(page [0-9]* of ([0-9]*)\\)",soup.find("h1").text).group(1))
	print(nbPages)
	for page in range(nbPages):
		if page>0:
			resp=requests.get("http://bright-shadows.net/forum/forum_showforum.php",params={"forumid":forumID,"page":page},cookies=cookies)
			soup = BeautifulSoup(resp.content,"lxml")
		table=soup.find("table",attrs={"class","forum_showforum"})
		for tr in table.find_all("tr"):
			topicTag=tr.find("td",attrs={"class":"topic"})
			if not topicTag: 
				continue
			topicID=int(re.search("topicid=([0-9]*)$",topicTag.find("a")["href"]).group(1))
			topicTitle=topicTag.text.strip()
			challID=None
			if len(topicTag.find_all("a"))>1: 
				challLink=topicTag.find_all("a")[-1]["href"]
				if challLink.startswith("/chall"):
					challID=conn.execute("SELECT id FROM challenges WHERE URL=?",[challLink]).fetchall()[0][0]
			#id , title , author , forumID , challengeID 
			author=tr.find("td",attrs={"class":"author"}).text.strip()
			if author=="unknown user":
				author=None
			else:
				topicTitle=topicTitle.split("=> [")[0]
			print(topicID, topicTitle, author, forumID, challID)
			conn.execute("INSERT INTO forum_topics (id , title , author , forumID , challengeID ) values (?,?,?,?,?)",[topicID, topicTitle, author, forumID, challID])
	conn.commit()

def getAllTopics():
	conn.execute("DELETE from forum_topics")
	conn.commit()
	cur = conn.cursor()
	cur.execute("SELECT * FROM forums")

	rows = cur.fetchall()

	for row in rows:
		print("downloading topics of forum " ,row[0])
		getTopics(row[0])

def string2timestamp(d):
	return time.mktime(time.strptime(d,"%d.%m.%Y %H:%M:%S"))

def getPosts(topicID):
	resp=requests.get("http://bright-shadows.net/forum/forum_showtopic.php",params={"topicid":topicID},cookies=cookies)
	if "You have not solved the challenge this topic is connected with." in resp.text:
		return
	if "href=\"forum_newpost.php?quote_post=" not in resp.text:
		#locked topic, no id so no way to store it into db
		return
	# get number of pages
	soup = BeautifulSoup(resp.content,"lxml")
	nbPages=int(re.search("\\(page [0-9]* of ([0-9]*)\\)",soup.find("h1").text).group(1))
	for page in range(nbPages):
		if page>0:
			resp=requests.get("http://bright-shadows.net/forum/forum_showtopic.php",params={"topicid":topicID,"page":page},cookies=cookies)
			soup = BeautifulSoup(resp.content,"lxml")
		table=soup.find("table",attrs={"class","forum_showtopic"})
		for tr in table.find_all("tr"):
			tag=tr.find("td",attrs={"class":"userdata"})
			if not tag: 
				continue
			editTag=None
			nextTag=tr.findNext("tr")
			if nextTag.find("td")["class"][0]=="edited":
				editTag=nextTag
				nextTag=editTag.findNext("tr")
			postID=int(re.search("post=([0-9]*)$",nextTag.find("a",attrs={"title":"Click here if you want to add a reply quoting this post."})["href"]).group(1))
			postTitle=tr.find("a",attrs={"name":"post_{}".format(postID)}).text.strip()
			postMsg="".join([str(x) for x in tr.find("div",attrs={"class":"tbscode_standard_forum"}).contents])
			postDate=string2timestamp(nextTag.find("td",attrs={"class":"postdate"}).find("span").text.strip())
			author=None
			authorTag=tr.find("a",attrs={"class":"user"})

			postEditedBy,postEditedDate=None,None
			if editTag:
				postEditedBy=editTag.find("a").text
				postEditedDate=string2timestamp(editTag.find("td").find("div").text.split(" on ")[-1])
			if authorTag:author=authorTag.text.strip()

			conn.execute("INSERT INTO forum_posts (id , title , message , postdate , author , topic,editedby, editdate) values (?,?,?,?,?,?,?,?)",[postID,postTitle,postMsg,postDate,author,topicID,postEditedBy,postEditedDate])
	conn.commit()

def getAllPosts(start=0):
	if start==0:
		conn.execute("DELETE from forum_posts")
		conn.commit()
	cur = conn.cursor()
	cur.execute("SELECT * FROM forum_topics WHERE id>=?",[start])

	rows = cur.fetchall()

	for row in rows:
		print("downloading posts of topic " ,row[0])
		getPosts(row[0])





def downloadAll():
	
	createTables()
	getRoot()
	
	getAllTopics()
	
	getAllPosts()



if len(sys.argv)<2:
	print("Usage: crawl <PHPSESSID>")
	exit()


cookies={"PHPSESSID":sys.argv[1]}
downloadAll()
