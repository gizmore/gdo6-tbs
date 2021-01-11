<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Programming 16: &quot;Lights out!&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"></head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>Programming</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/programming/aceldama_lightsout/index.php" title="Challenge: &quot;Lights out!&quot;"><span>Lights out!</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a Programming-challenge" src="/files/images/groupmasters/7_all.gif" height="18" width="25" /><span>Programming 16: &quot;Lights out!&quot; [made by <a class="fromuser" href="/userstats.php?username=aceldama">aceldama</a>]</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=362" title="See the rating of this challenge!"><img src="/files/images/icons/vote_stat_see_sl.gif" width="16" height="16" alt="vote icon" title="See the rating of this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=24&amp;challenge_id=362" title="Visit the Programming-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the Programming-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="notdone">not&nbsp;done&nbsp;<a href="/challengestats.php?challengeid=362" title="66 users have solved this challenge so far.">[66]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><div style="margin:0px;padding:0px;text-align:left;">
<p class="challenge_1" style="text-align:left;">1. The goal</p>
The game consists of a grid of squares. When the game starts <a class="challenge_1" href="tryout.php" target="_blank">here</a>, a random number 
of these squares are bright and the rest dark. &quot;Clicking&quot; one of the squares will 
switch itself and the four squares adjacent to it (vertically or horizontally) to the opposite state - light becomes 
dark and dark becomes light. The diagonally neighbouring squares however are not 
affected, see the illustration below if this is unclear. Your goal is to turn all the squares 
dark.
<div style="text-align:center;"><img src="Illustration.png" style="margin:4px;border:solid #000000 1px;background-color:#FFFFFF;padding:4px 0px 2px 4px;" alt="Example" title="&quot;Clicking&quot; a square amounts to switch all the squares around it in shape of a plus (+) sign." /></div>

<p class="challenge_1" style="text-align:left;">2. The rules</p>
You can &quot;click&quot; as many buttons as you like, as long as you click any button at most once. You have two seconds to complete the challenge.

<p class="challenge_1" style="text-align:left;">3. The format</p>
Squares are numbered line by line starting from zero in the top left corner. Encode your solution by listing the numbers of the squares to click (in order to get every square dark) as a two digit hexadecimal each and submit it to 
<p class="challenge_1" style="text-align:center;">&quot;http://bright-shadows.net/challenges/programming/aceldama_lightsout/solution.php?solution=&quot;+HEXed square number sequence</p>
In the sequence depicted in the example picture above, the moves would be described by &quot;...solution=1812&quot;. Apparently this does not 
solve the puzzle, but you get the idea. The sequence in which the clicks are 
submitted does not matter at all (&quot;...?solution=1218&quot; gives the same action).
<div class="challenge_1" style="text-align:center;font-weight:bold;font-size:14pt;">Good luck!</div>
</div>
<form action="/challenges/programming/aceldama_lightsout/index.php" method="get" style="margin-top:3mm;margin-bottom:1mm;padding:0px;">
  <input type="text" value="enter solution" name="solution" size="20" class="challenge_edit" />
  <input type="submit" value="Check it!" name="button_submit" style="margin-left:5mm;" class="challenge_submit" />
</form></div></div></body></html>