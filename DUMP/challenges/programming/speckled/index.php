<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Programming 14: &quot;Speckled Windows&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"></head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>Programming</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/programming/speckled/index.php" title="Challenge: &quot;Speckled Windows&quot;"><span>Speckled Windows</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a Programming-challenge" src="/files/images/groupmasters/7_all.gif" height="18" width="25" /><span>Programming 14: &quot;Speckled Windows&quot; [made by <a class="fromuser" href="/userstats.php?username=BaRa">BaRa</a>]</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=342" title="See the rating of this challenge!"><img src="/files/images/icons/vote_stat_see_sl.gif" width="16" height="16" alt="vote icon" title="See the rating of this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=24&amp;challenge_id=342" title="Visit the Programming-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the Programming-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="notdone">not&nbsp;done&nbsp;<a href="/challengestats.php?challengeid=342" title="196 users have solved this challenge so far.">[196]</a></td></tr></table></td></tr></table></div><div class="challenge_div">
<div class='challenge_div'>

When you <a class='challenge_2' href='tryout.php' target='_blank'>click on this link</a>, 
you'll get a picture with 5 fields, all with a different backgroundcolor.
You have to count the number of different colored pixels in each field.
Once you have the right numbers you need to sort them by backgroundcolor, from darkest to lightest. <br>
Concatenate the numbers and submit them to: 
<p class='challenge_1' style='text-align:center;'>
&quot;http://bright-shadows.net/challenges/programming/speckled/solution.php?solution=&quot;+number string</p>
You have 5 seconds to do this challenge.
<div class='challenge_1' style='text-align:left;'>
<img src='example.png' width='320' height='220' class='challenge_1' style='float:left;margin-right:2mm;' />
<span style='font-weight:bold;text-decoration:underline;text-align:center;'>Example:</span><br />
In this picture you can see the 5 fields. Left, top, right, bottom and middle.<br />
<pre style='margin:0px;padding:0px;font-size:10pt;'>
   Field               Pixels		BGcolor
    Left                1                #C2C2C2
    Top                 2                #5F5F5F
    Right               3                #242424
    Bottom              8                #919191
    Middle              6                #A1A1A1
	
BLACK &gt; #242424 &gt; #5F5F5F &gt; #919191 &gt; #A1A1A1 &gt; #C2C2C2 &gt; WHITE
        3         2         8         6         1
</pre>
<br />
The answer to this example is: 32861<br />
Good luck!
</div>
<form action="/challenges/programming/speckled/index.php" method="get" style="margin-top:3mm;margin-bottom:1mm;padding:0px;">
  <input type="text" value="enter solution" name="solution" size="20" class="challenge_edit" />
  <input type="submit" value="Check it!" name="button_submit" style="margin-left:5mm;" class="challenge_submit" />
</form></div></div></body></html>