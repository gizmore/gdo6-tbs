<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Programming 13: &quot;Peano Jordan&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"></head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>Programming</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/programming/peanojordan/index.php" title="Challenge: &quot;Peano Jordan&quot;"><span>Peano Jordan</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a Programming-challenge" src="/files/images/groupmasters/7_all.gif" height="18" width="25" /><span>Programming 13: &quot;Peano Jordan&quot;</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=323" title="See the rating of this challenge!"><img src="/files/images/icons/vote_stat_see_sl.gif" width="16" height="16" alt="vote icon" title="See the rating of this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=24&amp;challenge_id=323" title="Visit the Programming-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the Programming-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="notdone">not&nbsp;done&nbsp;<a href="/challengestats.php?challengeid=323" title="196 users have solved this challenge so far.">[196]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><p style="text-align:left;">As you may or may not know, the theory of math integration started with what
is called the Peano-Jordan measure.<br />
In order to calculate the integral of a function, they started calculating the area subtended by the
function.<br /><br />
The process is simple (and you can see the picture to understan it): let's say you want to calculate the
area subtended by the function p(x) in a given interval [x<sub>1</sub>,x<sub>2</sub>]. All you have to do
is divide this interval in a finite number of steps and build rectangles as shown in the picture. Since
the function I'll give you is continuous because it is a polynomial function ( p(x) ) you are sure that
the vertical lines of the rectangles are going to meet the function somewhere. In each interval you get
multiple values of the function because each step is made by infinite points. For each step you can take
either the max(p(x)), or min(p(x)) or an average value that can be either avg(x)=[max(p(x)+min(p(x))]/2
or the value that the function gets in the middle point of each step.<br />
Depending on what value you take you get an area approximation which is a little bigger than the real
area (taking max(p(x))), a little smaller than the real area (taking min(p(x))) or very near the real
area (taking avg(p(x))). <br />Anyway, Riemann has proved that when the measure of each step becomes
smaller and smaller (tending to 0) all these values tend to one value which is the correct area.</p>
<p class="challenge_1" style="text-align:center;">
<img src="function.jpg" alt="example" width="540" height="300" border="1" /></p>
<p style="text-align:left;">What you're asked to do here is to calculate an approximation of the area using a step length of 0.01
units <br />and taking the middle value to calculate the height of the rectangles. The middle value is the
value that p(x) gets in the exact middle point of each step. <br />So, if for a given p(x) in a certain step
you get min(p(x))=8, max(p(x))=10 and middle(p(x))=8.5, even if the average avg(p(x))=9 I want you to use
8.5. <br />The area of that rectangle will then be 8.5*0.01=0,085 units&sup2;. The total area is the sum of
each rectangle area you'll get from x<sub>1</sub> to x<sub>2</sub>. If for example x<sub>1</sub>=1 and
x<sub>2</sub>=4 you're going to calculate (4-1)/0.01=3*100=300 rectangles.<br />
<br />Note that if middle(p(x))&lt;0 then p(x) in that point is negative and the corresponding rectangle
will be negative too.<br />
The polynomial I provide has this structure:<br /><br /></p>
<pre>p(x) = (n<sub>0</sub>/d<sub>0</sub>) + (n<sub>1</sub>/d<sub>1</sub>)*x^1 + ... + (n<sub>k</sub>/d<sub>k</sub>)*x^k
(where &quot;+&quot; signs could be &quot;-&quot; either and where the first coefficient could be negative as well)</pre>
<p style="text-align:left;">k is random calculated by my script and n<sub>k</sub>, d<sub>k</sub> are the
random numerator and denominator of the k<sup>th</sup> coefficient of p(x).<br />
So, resuming:
<ol style="text-align:left;">
  <li>Get p(x).</li>
  <li>Get [x<sub>1</sub>,x<sub>2</sub>] (note that [a,b] mean that the interval is inclusive)</li>
  <li>Divide [x<sub>1</sub>,x<sub>2</sub>] in 100*(x<sub>2</sub>-x<sub>1</sub>) steps</li>
  <li>Sum up all the rectangles you get multiplying 0.01*middle(p(x)) for each step.</li>
  <li>Now you get the approximation of the area.</li>
</ol>
<p style="text-align:left;">
When you have the correct approximation pick up the absolute value and round it to an integer then calculate the lowercase md5 of the number.<br />
  That will be the solution you have to pass to the solution page.<br /><br />
Example 1: 345.23 -&gt; solution=md5(345)<br />
Example 2: 123.89 -&gt; solution=md5(124)<br />
Example 3: -567.44 -&gt; solution=md5(567)<br />
Example 4: -567.50 -&gt; solution=md5(568)<br /><br />

Notes: to calculate the result the script uses regular php vars.<br />
To check php's floating point precision go to <a class="challenge_1" href="http://www.php.net" target="_blank">www.php.net</a><br />
<a class="challenge_1" href="tryout.php" target"_blank">Click here to start the challenge</a><br /><br />
<p class="challenge_1" style="text-align:center;">&quot;http://bright-shadows.net/challenges/programming/peanojordan/solution.php?solution=&quot;+letters</p><br />
The page will then tell you the password for this challenge.<br />
Time limit is 4 seconds.<br /><br />
<strong>Good luck!</strong><br />
Sfabriz
</p>
<form action="/challenges/programming/peanojordan/index.php" method="get" style="margin-top:3mm;margin-bottom:1mm;padding:0px;">
  <input type="text" value="enter solution" name="solution" size="20" class="challenge_edit" />
  <input type="submit" value="Check it!" name="button_submit" style="margin-left:5mm;" class="challenge_submit" />
</form></div></div></body></html>