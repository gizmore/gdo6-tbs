
import requests,sys,re,time
import sqlite3
from bs4 import BeautifulSoup

def string2timestamp(d):
	return time.mktime(time.strptime(d,"%d.%m.%Y %H:%M:%S"))

class forumDownloader:
	def __init__(self,conn,sessionID):
		self.conn=conn
		self.cookies={"PHPSESSID":sessionID}

	def getPosts(self,topicID):
		resp=requests.get("http://bright-shadows.net/forum/forum_showtopic.php",params={"topicid":topicID},cookies=self.cookies)
		if "You have not solved the challenge this topic is connected with." in resp.text:
			return 0
		if "href=\"forum_newpost.php?quote_post=" not in resp.text:
			#locked topic, no id so no way to store it into db
			return 0
		# get number of pages
		print("found a missing topic!")
		soup = BeautifulSoup(resp.content,"lxml")
		nbPages=int(re.search("\\(page [0-9]* of ([0-9]*)\\)",soup.find("h1").text).group(1))
		for page in range(nbPages):
			if page>0:
				resp=requests.get("http://bright-shadows.net/forum/forum_showtopic.php",params={"topicid":topicID,"page":page},cookies=self.cookies)
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

				self.conn.execute("INSERT INTO forum_posts (id , title , message , postdate , author , topic,editedby, editdate) values (?,?,?,?,?,?,?,?)",[postID,postTitle,postMsg,postDate,author,topicID,postEditedBy,postEditedDate])
		return 1

def main():

	if len(sys.argv)<2:
		print("Usage: python3 {} <PHPSESSID>".format(sys.argv[0]))
		exit()
	
	# import file
	try:
		with open("missing.txt","r") as f:
			topics=f.read()
	except:
		print("error, file missing.txt not found")
		exit()

	conn=sqlite3.connect("missingTopics.db")
	conn.execute("CREATE TABLE IF NOT EXISTS forum_posts (id INTEGER PRIMARY KEY, title TEXT, message TEXT, postdate INTEGER, author TEXT, topic INTEGER, editedby TEXT, editdate INTEGER);")
	nb=0
	crawler=forumDownloader(conn,sys.argv[1])
	for topic in topics.split("\n"):
		nb+=crawler.getPosts(topic.split(";")[0])
	conn.commit()
	if nb==0:
		print("no new topics downloaded, thank you for your help!")
	else:
		print("{} new topics downloaded, please send missingTopics.db to xaav.\n Thank you for your help!".format(nb))

if __name__ == "__main__":
    main()