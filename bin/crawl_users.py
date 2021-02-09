
import requests,sys,re, os
from html import unescape
import sqlite3
from bs4 import BeautifulSoup
from time import sleep,time
from os import listdir

class usercrawler:
	def __init__(self,sessionID,conn,useDump):
		self.patternRank=re.compile("<td title=\".* is on rank ([0-9]*)\\.\">")
		self.patternChalls=re.compile("<td title=\".* has solved ([0-9]*) challenges\\.\">")
		self.patternEmail=re.compile("<a href=\"([&#0-9;]*)\" title=\"Send an email")
		self.patternCountry=re.compile("<img src=\"/files/images/countries/([0-9]*).gif\"")
		self.patternCountryName=re.compile("<img src=\"/files/images/countries/[0-9]*.gif\" alt=\"([^\"]*)\"")
		self.patternRegDate=re.compile("<th>Registration date:</th>\\s*<td>([^<]*)</td>",re.DOTALL)
		self.patternLastVisit=re.compile("<th>Last visit:</th>\\s*<td>([^<]*)</td>",re.DOTALL)
		self.patternBirthday=re.compile("<th>Age / birthday:</th>\\s*<td>([^<]*)</td>")
		self.patternChallSolved=re.compile("")
		self.patternWebsite=re.compile("<a href=\"([^\"]*)\" title=\"Go to [^\"]*'s website.\"")
		self.cookies={"PHPSESSID":sessionID}
		self.conn=conn
		self.useDump=useDump
		self.countries={}

	def getHTML(self,url):
		if self.useDump:
			with open("userDump/" + url,"r") as f:
				rslt=f.read()
		else:
			rslt=requests.get("http://" + url,cookies=self.cookies).text
		return rslt

	def getMatch(self,s,pattern):
		m=pattern.search(s)
		if m==None: return ""
		return m.group(1)

	def getuserinfo(self,username):
		
		resp=self.getHTML("www.bright-shadows.net/userstats.php?username={}".format(username))
		country=self.getMatch(resp,self.patternCountry) 
		if country !="" and country not in self.countries:
			self.countries[country]=self.getMatch(resp,self.patternCountryName)
		self.conn.execute("""INSERT INTO users (username,rank,nb_solved,email,country_id,registration_date,last_visit,age_birthday,website,ranked) values (?,?,?,?,?,?,?,?,?,1)""",
			[
				username,
				self.getMatch(resp,self.patternRank),
				self.getMatch(resp,self.patternChalls),
				unescape(self.getMatch(resp,self.patternEmail)),
				country,
				self.getMatch(resp,self.patternRegDate),
				self.getMatch(resp,self.patternLastVisit),
				self.getMatch(resp,self.patternBirthday),
				self.getMatch(resp,self.patternWebsite)

			])
		soup = BeautifulSoup(resp,"lxml")

		tags=soup.find_all("div",attrs={"class":"cl_group"})
		categID=-1
		for tag in tags:
			challenges=tag.findNext("table", {"class":"cl_challs"}).find_all("tr")
			for line in challenges:
				done=line.find("td",attrs={"class":"done"})
				if done!=None:
					challID=line.find("td",attrs={"class":"vote"}).a["href"]
					challID=re.search("/challvote.php\\?challid=([0-9]*)",challID).group(1)
					self.conn.execute("INSERT INTO challenge_solved (challengeid,solver) values (?,?)",[challID,username])
		self.conn.commit()

def main():
	if len(sys.argv)<2:
		print("Usage: crawl <PHPSESSID>")
		exit()


	dumpexists=False
	try:
	    f = open("userDump/www.bright-shadows.net/userstats.php?username=Xaav")
	    dumpexists=True
	except IOError:
	    print("File userDump/www.bright-shadows.net/userstats.php?username=xaav not found")
	    print("the algorithm is more efficient if you have a local dump of the user files")
	    print("run this command to download all user data:")
	    print("wget --recursive wget --recursive -np -e robots=off -x --header \"Cookie: PHPSESSID=<your session id>\" --level 1 http://www.bright-shadows.net/ranking.php?perpage=20000")
	    sleep(5)


	conn=sqlite3.connect("TBS.db")
	conn.execute("""CREATE TABLE IF NOT EXISTS users (
		username TEXT PRIMARY KEY,
		rank INTEGER,
		nb_solved INTEGER,
		email TEXT,
		country_id  INTEGER,
		registration_date INTEGER,
		last_visit  INTEGER,
		age_birthday TEXT,
		website TEXT,
		ranked INTEGER)""")
	conn.execute("""CREATE TABLE IF NOT EXISTS countries (
		id INTEGER PRIMARY KEY,
		name TEXT)""")
	conn.execute("""CREATE TABLE IF NOT EXISTS challenge_solved (challengeid INTEGER ,solver TEXT)""")
	conn.execute("delete from users")
	conn.execute("delete from countries")
	conn.execute("delete from challenge_solved")
	conn.commit()
	
	countries={}

	cookies={"PHPSESSID":sys.argv[1]}
	pattern=re.compile("<a class=\"rank_user\" href=\"/userstats.php\\?username=([^\"]*)\">")
	nbUsers=0
	print("dump exists?", dumpexists)

	crawler=usercrawler(sys.argv[1],conn,dumpexists)
	resp=crawler.getHTML("www.bright-shadows.net/ranking.php?perpage=20000")
	totusers=12592
	start=time()
	for m in pattern.findall(resp):
		crawler.getuserinfo(m)
		nbUsers+=1
		if nbUsers%10==0:
			etc=(time()-start)/nbUsers*(totusers-nbUsers)/60
			print("---done: {:.2f}% estimate to complete: {:0f} minutes --------------------------------------------".format(nbUsers/totusers*100,etc))
		print("{}\t{}".format(nbUsers,m))
		
	for k in crawler.countries:
		conn.execute("INSERT INTO countries (id,name) values (?,?)",[k,crawler.countries[k]])

	conn.commit()

if __name__ == "__main__":
    main()