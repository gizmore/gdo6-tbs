<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Programming 10: &quot;Jigsaw Puzzle&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"><style type="text/css">
  td.block {text-align:center;vertical-align:middle;width:25px;height:25px;border-style:solid;border-width:1px;border-color:#000000;color:#000000;font-weight:600;}
  td.rblock {text-align:center;vertical-align:middle;width:25px;height:25px;border-style:solid;border-width:1px;border-color:#FF0000;color:#FF0000;font-weight:600;}
</style>
</head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>Programming</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/programming/jigsaw/index.php" title="Challenge: &quot;Jigsaw Puzzle&quot;"><span>Jigsaw Puzzle</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a Programming-challenge" src="/files/images/groupmasters/7_all.gif" height="18" width="25" /><span>Programming 10: &quot;Jigsaw Puzzle&quot; [made by <a class="fromuser" href="/userstats.php?username=acidbits">acidbits</a>]</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=180" title="See the rating of this challenge!"><img src="/files/images/icons/vote_stat_see_sl.gif" width="16" height="16" alt="vote icon" title="See the rating of this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=24&amp;challenge_id=180" title="Visit the Programming-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the Programming-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="notdone">not&nbsp;done&nbsp;<a href="/challengestats.php?challengeid=180" title="125 users have solved this challenge so far.">[125]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><div style="margin:0px;padding:0px;text-align:left;">
<p class="challenge_1" style="text-align:left;">1. Get the puzzle</p>
<table cellspacing="0" stlye="margin:1mm;">
  <tr>
    <td style="padding:1mm;color:#FFFFFF;font-size:12pt;vertical-align:top;text-align:justify;">
When you <a class="challenge_1" href="tryout.php" target="_blank">click on this link</a>, you will receive a puzzle (as an image) like the one on the right. There are red and black blocks. First of all, assign numbers to the blocks form left to right and top to bottom, starting from 0. For the example it would look like this:</td>
    </td>
    <td rowspan="2" style="padding:1mm;background-color:#DDDDDD;vertical-align:middle;border-style:solid;border-width:1px;border-color:#000000;"><img src="test2.png" style="margin:0px;border-width:0px;" alt="puzzle-example" /></td>
  </tr>
  <tr>
    <td style="text-align:center;vertical-align:top;padding:0px;">
<table cellspacing="4" style="font-size:12pt;margin:0mm;background-color:#FFFFFF;border-style:solid;border-color:#000000;border-width:1px;">
  <tr>
    <td class="block">0</td>
    <td class="rblock">1</td>
    <td class="block">2</td>
  </tr>
  <tr>
    <td class="rblock">3</td>
    <td class="block">4</td>
    <td class="rblock">5</td>
  </tr>
  <tr>
    <td class="rblock">6</td>
    <td class="block">7</td>
    <td class="block">8</td>
  </tr>
</table>
    </td>
  </tr>
</table>
<p class="challenge_1" style="text-align:left;">2. Solve the puzzle</p>
<table cellspacing="0" stlye="margin:1mm;">
  <tr>
    <td style="padding:1mm;color:#FFFFFF;font-size:12pt;vertical-align:top;text-align:justify;">
There will be only one corner block with red colour and this red corner block is allways the top left block. Blocks are randomly mixed and rotated. Now it's your job to fit all the blocks correctly together. On the right you can see the correct solution for the example above. The blocks are now arranged in this way (according to the numbers assigned to them like above):</td>
    </td>
    <td rowspan="2" style="padding:1mm;background-color:#DDDDDD;vertical-align:middle;border-style:solid;border-width:1px;border-color:#000000;"><img src="test1.png" style="margin:0px;border-width:0px;" alt="example solved" /></td>
  </tr>
  <tr>
    <td style="text-align:center;vertical-align:middle;padding:0px;">
<table cellspacing="4" style="font-size:12pt;margin:1mm;background-color:#FFFFFF;border-style:solid;border-color:#000000;border-width:1px;">
  <tr>
    <td class="rblock">6</td>
    <td class="block">7</td>
    <td class="block">8</td>
  </tr>
  <tr>
    <td class="block">0</td>
    <td class="rblock">1</td>
    <td class="rblock">5</td>
  </tr>
  <tr>
    <td class="block">2</td>
    <td class="rblock">3</td>
    <td class="block">4</td>
  </tr>
</table>
    </td>
  </tr>
</table>
<p class="challenge_1" style="text-align:left;">3. Submit the solution</p>
Now look at the blocks and check which ones are red. Their numbers (in the order of the blocks from top to bottom; left to right) give the solution. For the example above, it would be 6153. Send the solution to (time limit is 5 seconds):<p class="challenge_1" style="text-align:center;">&quot;http://bright-shadows.net/challenges/programming/jigsaw/solution.php?solution=&quot;+red numbers</p>
</div>
<form action="/challenges/programming/jigsaw/index.php" method="get" style="margin-top:3mm;margin-bottom:1mm;padding:0px;">
  <input type="text" value="enter solution" name="solution" size="20" class="challenge_edit" />
  <input type="submit" value="Check it!" name="button_submit" style="margin-left:5mm;" class="challenge_submit" />
</form></div></div></body></html>