import sqlite3
import crawl_users
import sys

if len(sys.argv)<2:
	print("Usage: crawl <PHPSESSID>")
	exit()
conn=sqlite3.connect("TBS.db")

def patchDB(patchUsers=True, patchForum=True, patchChallenges=True):

	if patchUsers:
		crawler=crawl_users.usercrawler(sys.argv[1],conn,False)

		# add non-ranked users (users found as post/toipc author but not found in ranking page)
		query="select author from forum_topics where author not in (select username from users) union select author from forum_posts where author not in (select username from users) group by author"
		users=conn.execute(query).fetchall()
		cpt=0
		for user in users:
			user=user[0]
			crawler.getuserinfo(user)
			cpt+=1
		print("{} non-ranked users retreived".format(cpt))

	if patchChallenges:
		# calculate challenge release date
		for row in conn.execute("select challengeid,min(postdate) from forum_topics t inner join forum_posts p on t.id=p.topic group by challengeid").fetchall():
			challid=row[0]
			creationDate=row[1]
			conn.execute("update challenges set date_creation=? where id=?",[creationDate,challid])
		conn.commit()
		print("challenge creation date approximated")

	if patchForum:
		# patch forum structure to have one questions forum and one solution forum per challenge, move topics in correct forum
		#move questions/solutons forums into roots table
			
		conn.execute("alter table forum_roots add description text")		
		conn.execute("insert into forum_roots select id, title, 18,description  from forums where root=18")
		conn.execute("insert into forum_roots select id, title, 11,description from forums where root=11")
		
		# add a field "challenge_categ" into root table to indicate which challenge category it refers to
		conn.execute("alter table forum_roots add challenge_categ INTEGER")
		conn.execute("update forum_roots set challenge_categ = (select id from challenge_categories where challenge_categories.title = forum_roots.title)")
		#some harcoding because spelling differences
		conn.execute("update forum_roots set challenge_categ = (select id from challenge_categories where challenge_categories.title = 'Java-Applet') where forum_roots.title='Java-Applets';")
		conn.execute("update forum_roots set challenge_categ = (select id from challenge_categories where challenge_categories.title = 'Information Gathering') where forum_roots.title='Information-Gathering'")

		# a a field to specify the challenge it refers to (may be NULL) and if a forum is a solution forum (and must then be hidden until the user solves the challenge)
		conn.execute("alter table forums add solutionForum INTEGER")
		conn.execute("alter table forums add challengeID INTEGER")
		# create two forums per challenge (questions/solutions)
		conn.execute("insert into forums select challenges.id + (CASE WHEN parent.id=18 THEN 50 ELSE 412 END),name, parent.title||\": '\"||name||\"'\", forum_roots.id, (CASE WHEN parent.id=18 THEN 0 ELSE 1 END), challenges.id from challenges inner join forum_roots on challenges.categ=forum_roots.challenge_categ inner join forum_roots parent on parent.id=forum_roots.parentID order by challenges.id;")
		
		
		#move topics to the correct forum, depending on the challenge and the root (hint or solution)
		conn.execute("update forum_topics set forumID=(select f.id from forums f where f.challengeID=forum_topics.challengeID and solutionForum=1) where forum_topics.forumID in (select r2.id from forum_roots r2 where r2.parentID=11);")
		conn.execute("update forum_topics set forumID=(select f.id from forums f where f.challengeID=forum_topics.challengeID and solutionForum=0) where forum_topics.forumID in (select r2.id from forum_roots r2 where r2.parentID=18);")
		conn.execute("delete from forums where root in (11,18);")
		conn.execute("delete from forum_topics where forumid not in (select id from forums) or forumid is null;")
		conn.execute("delete from forum_posts where topic not in (select id from forum_topics) or topic is null;")

		

		print("forum structure patched")

		conn.commit()

def printTopics(forumID,header):
	for topic in conn.execute("select id,title,author,challengeID from forum_topics where forumID=?",[forumID]):
		print (header+"-"+",".join([str(x) for x in topic ]))

def printRootRec(rootid,header):
	for root in conn.execute("select id,title from forum_roots where parentID=?",[rootid]):
		print(header+"ROOT{}: ".format(root[0])+root[1])
		printRootRec(root[0],header+"   ")

		for forum in conn.execute("select id, title, description,challengeID from forums where root=?",[root[0]]):
			print(header+"   FORUM {}: ".format(forum[0])+",".join([str(x) for x in forum ]))
			printTopics(forum[0],header+"      ")


def printRoots(header):
	printRootRec(13,header)

#patchDB(patchUsers=False,patchChallenges=False)
patchDB()
#printRoots("")
