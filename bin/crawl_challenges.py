
import requests,sys,re, os
from bs4 import BeautifulSoup
import sqlite3

class challengeCrawler:
	def __init__(self,conn,sessionID):
		self.conn=conn
		self.cookies={"PHPSESSID":sessionID}

	def getChalls(self):
		self.conn.execute("""CREATE TABLE IF NOT EXISTS challenges (	id INTEGER PRIMARY KEY,categ INTEGER,num_order INTEGER,URL TEXT,author TEXT,name TEXT,num_votes INTEGER,voted_difficulty INTEGER,voted_creativity INTEGER,voted_education INTEGER,voted_presentation INTEGER,date_creation INTEGER, status TEXT)""")
		self.conn.execute("""CREATE TABLE IF NOT EXISTS challenge_categories (id INTEGER PRIMARY KEY,title TEXT,forum_id INTEGER,solution_forum_id INTEGER)""")
		resp=requests.get("http://www.bright-shadows.net/hackchallenge.php",cookies=self.cookies)
		soup = BeautifulSoup(resp.text,"lxml")

		tags=soup.find_all("div",attrs={"class":"cl_group"})
		categID=-1
		for tag in tags:
			categID+=1
			print (tag)
			categname=tag.find("label").text
			forums=[int(a["href"].split("=")[1]) for a in tag.find_all("a")]
			print (forums)
			record="{},'{}','{}','{}'\n".format(categID,categname,forums[0],forums[1])
			print(record)
			self.conn.execute("INSERT INTO challenge_categories (id, title, forum_id, solution_forum_id) values(?,?,?,?)",[categID,categname,forums[0],forums[1]])
			

			challenges=tag.findNext("table", {"class":"cl_challs"}).find_all("tr")
			for line in challenges:
				#print(line)
				challID=line.find("td",attrs={"class":"doneby"}).find("a")["href"].split("challengeid=")[1]
				nametag=line.find("td",attrs={"class":"name"})
				url=nametag.find("a")["href"]
				nametext=nametag.text.split(": ")
				order=nametext[0]
				name=''.join(nametext[1:])
				author=""
				if "[made by " in name:
					author=name.split("[made by ")[1][:-1]
					name=name.split("[made by ")[0]
				votetag=line.find("td",attrs={"class":"vote"})
				num_votes=votetag.find("span").text
				votes=[t.text for t in line.find_all("td")[2:6]]
				record="{},{},{},'{}','{}','{}',{},{},{}\n".format(challID,categID,order,url,author,name,num_votes,votes,"")
				print (record)
				self.conn.execute("insert into challenges(id,categ,num_order,URL,author,name,num_votes,voted_difficulty,voted_creativity,voted_education,voted_presentation,date_creation,status) values(?,?,?,?,?,?,?,?,?,?,?,?,'not tested')",[challID,categID,order,url,author,name,num_votes,votes[0],votes[1],votes[2],votes[3],0])
		self.conn.commit()

def main():
	if len(sys.argv)<2:
		print("Usage: python3 {} <PHPSESSID>".format(sys.argv[0]))
		exit()
	conn=sqlite3.connect("TBS.db")


	crawler=challengeCrawler(conn,sys.argv[1])
	crawler.getChalls()



if __name__ == "__main__":
    main()
