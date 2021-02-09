
import requests,sys,re, os
from html import unescape
import sqlite3
from bs4 import BeautifulSoup
from time import sleep,time
from os import listdir

class forumImporter:
	def __init__(self,conn):
		self.conn=conn


	def getUnknownForums(self):
		rows=self.conn.execute("""
			select ft.id, 'http://bright-shadows.net'||c.url
			from forum_topics ft 
			inner join forums f on f.id=ft.forumID 
			inner join challenges c on c.id=f.challengeID
			inner join forum_roots fr on fr.id=f.root 
			inner join forum_roots fr2 on fr2.id=fr.parentID
			where 
				ft.id not in (select topic from forum_posts) 
				and ft.challengeID not NULL 
				and fr2.id=11
			group by ft.id
			""").fetchall()
		#print (rows)
		return [str(x[0])+";"+x[1] for x in rows]


def main():

	for file in os.listdir("contributions"):
		print("importing",file)
		conn=sqlite3.connect("TBS.db")
		conn.execute("attach database 'contributions/{}' as a;".format(file))
		conn.execute("insert into forum_posts select * from a.forum_posts where id not in (select id from forum_posts);")
		conn.commit()
		conn.close()

	conn=sqlite3.connect("TBS.db")
	crawler=forumImporter(conn)
	conn.commit()
	
	forums=crawler.getUnknownForums()
	print("\n".join(forums))
	
	
if __name__ == "__main__":
    main()