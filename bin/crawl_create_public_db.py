import sys
import sqlite3
import shutil
def main():


	shutil.copyfile('TBS.db', 'TBS_public.db')
	conn=sqlite3.connect("TBS_public.db")
	conn.execute("update users set email=NULL,age_birthday=NULL;")
	conn.execute("delete from forum_posts where topic in (select ft.id from forum_topics ft inner join forums f on ft.forumid=f.id inner join forum_roots fr on fr.id=f.root where fr.parentid=11) ;")
	conn.commit()
	
	
if __name__ == "__main__":
    main()