<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Crypto 64: &quot;Hash me baby (ph128)&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"></head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>Crypto</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/crypto/phas_hash/index.php" title="Challenge: &quot;Hash me baby (ph128)&quot;"><span>Hash me baby (ph128)</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a Crypto-challenge" src="/files/images/groupmasters/3_all.gif" height="18" width="25" /><span>Crypto 64: &quot;Hash me baby (ph128)&quot; [made by <a class="fromuser" href="/userstats.php?username=Phas(retired)">Phas(retired)</a>]</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=291" title="See the rating of this challenge!"><img src="/files/images/icons/vote_stat_see_sl.gif" width="16" height="16" alt="vote icon" title="See the rating of this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=20&amp;challenge_id=291" title="Visit the Crypto-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the Crypto-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="notdone">not&nbsp;done&nbsp;<a href="/challengestats.php?challengeid=291" title="71 users have solved this challenge so far.">[71]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><div style="margin:0px;padding:0px;text-align:justify;">
<p class="challenge_1" style="text-align:left;">Description</p>
PhasHash-128 is a new hash algorithm that generates a 128 bit hash value from any input.
Here goes the implementation of the hash function with comments in some programming languages.
<ul>
<li><a href="ph128_cpp.txt" target="_blank" class="challenge_1">C++ Implementation</a></li>
<li><a href="ph128_php.txt" target="_blank" class="challenge_1">PHP Implementation</a></li>
<li><a href="ph128_js.txt" target="_blank" class="challenge_1">JavaScript Implementation</a></li>
<li><a href="ph128_delphi.txt" target="_blank" class="challenge_1">Delphi Implementation</a></li>
</ul>
There is also a compiled <a href="PH128_exe.zip" target="_blank" class="challenge_1">PH128.exe</a> to calculate the PhasHash-128 of any string.<br />
If you want to test if your implementation of the function works correctly you can check if you get these <a href="ph128_samples.txt" target="_blank" class="challenge_1">hash values</a> for some sample strings.
<p class="challenge_1" style="text-align:left;">Challenge</p>
This is the hash value I get when I calculate the PH128 of my new signature... :<br />
ed8f08bae8e6d7cc73f8eaa4b6ddf70c<br />
Do you think anyone could sign as if he was me?<br />
<p class="challenge_1" style="text-align:left;margin-top:0px;">Hint</p>
My signature contains any char from ASCII(1) to ASCII(255) and is long enough to be unbruteforceable.
<p class="challenge_1" style="text-align:left;">Enter your signature</p>
<form name="form1" action="index.php">
<textarea name="signature" rows="10" cols="64" class="memo_1"></textarea><br />
<input name="submit" type="submit" value="Calculate PH128" class="challenge_submit" />
</form>
<p class="challenge_1" style="text-align:left;">Solution</p></div>
<form action="/challenges/crypto/phas_hash/index.php" method="get" style="margin-top:3mm;margin-bottom:1mm;padding:0px;">
  <input type="text" value="enter solution" name="solution" size="20" class="challenge_edit" />
  <input type="submit" value="Check it!" name="button_submit" style="margin-left:5mm;" class="challenge_submit" />
</form>&copy;Phas
</div></div></body></html>
