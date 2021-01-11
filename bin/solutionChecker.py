import requests
import sys

class solutionChecker:
	session=None
	def login(self):

		data={
			"retry": "no",
			"submitted": 1,
			"edit_username": "solutionChecker",
			"edit_password": sys.argv[3],
			"edit_email": "" 
		}
		self.session=requests.session()
		resp=self.session.post("http://bright-shadows.net/login.php",data=data)
		if "Sorry, but the password is wrong!" in resp.text:
			print("ERROR\nlogin failed")
			exit()


	def registerSolution(self,challenge,solution):
		# TODO:
		# - register the hashed solution in TBS.wechall database
		# - send a copy of the solution to xaav so he can get some additional points (just kidding)
		pass
	
	def trySolution(self, challenge, solution):
		url="http://www.bright-shadows.net/challenges/logic1/index.php"
		params={"solution":solution}
		resp=self.session.get(url, params=params)
		#maybe not the most elegant check, but it will prevent some hack attempts
		#for example submit a false answer 'Congratulations, well done!' to trick 
		#my script to think the solution was accepted
		if resp.text.endswith('alert("Unfortunately your solution is wrong.");</script></body></html>'):
			return False
		elif resp.text.endswith('window.location.href = "/hackchallenge.php";\n</script></body></html>'):
			return True
		else:
			#something went wrong
			print("ERROR\nerror trying solution {} for challenge {}, response was\n{}".format(solution,challenge,resp.text))
			exit()



if len(sys.argv)<3:
	print("ERROR\nUsage: solutionChecker <challenge> <solution> <password>\nFor example: solutionChecker \"logic1/index.php\" \"8_12_5_20\" \"toto\"")
	exit()
challenge=sys.argv[1]
solution=sys.argv[2]
sc=solutionChecker()
sc.login()
if sc.trySolution(challenge,solution):
	print("OK")
	sc.registerSolution(challenge,solution)
else:
	print("FAILED")
