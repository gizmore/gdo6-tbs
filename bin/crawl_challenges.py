
import requests,sys,re, os
from bs4 import BeautifulSoup


countries={}

fileChallenges=open("challenges.csv","w")
fileChallenges.write("id,categ,order,URL,author,name,num_votes,voted_difficulty,voted_creativity,voted_education,voted_presentation,date_creation\n")
fileCateg=open("challenge_categories.csv","w")
fileCateg.write("id,title,forum,solution_forum\n")


def getChalls():
	resp=requests.get("http://www.bright-shadows.net/hackchallenge.php",cookies=cookies)
	soup = BeautifulSoup(resp.text,"lxml")

	tags=soup.find_all("div",attrs={"class":"cl_group"})
	categID=-1
	for tag in tags:
		categID+=1
		print (tag)
		categname=tag.find("label").text
		forums=[a["href"] for a in tag.find_all("a")]
		print (forums)
		record="{},'{}','{}','{}'\n".format(categID,categname,forums[0],forums[1])
		print(record)
		fileCateg.write(record)

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
			votes=",".join([t.text for t in line.find_all("td")[2:6]])
			record="{},{},{},'{}','{}','{}',{},{},{}\n".format(challID,categID,order,url,author,name,num_votes,votes,"")
			print (record)
			fileChallenges.write(record)


if len(sys.argv)<2:
	print("Usage: crawl <PHPSESSID>")
	exit()


cookies={"PHPSESSID":sys.argv[1]}

getChalls()