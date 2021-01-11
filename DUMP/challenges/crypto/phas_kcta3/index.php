<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Crypto 63: &quot;Powerful key (KCTA 3)&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"></head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>Crypto</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/crypto/phas_kcta3/index.php" title="Challenge: &quot;Powerful key (KCTA 3)&quot;"><span>Powerful key (KCTA 3)</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a Crypto-challenge" src="/files/images/groupmasters/3_all.gif" height="18" width="25" /><span>Crypto 63: &quot;Powerful key (KCTA 3)&quot; [made by <a class="fromuser" href="/userstats.php?username=Phas(retired)">Phas(retired)</a>]</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=288" title="See the rating of this challenge!"><img src="/files/images/icons/vote_stat_see_sl.gif" width="16" height="16" alt="vote icon" title="See the rating of this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=20&amp;challenge_id=288" title="Visit the Crypto-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the Crypto-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="notdone">not&nbsp;done&nbsp;<a href="/challengestats.php?challengeid=288" title="85 users have solved this challenge so far.">[85]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><div style="margin:0px;padding:0px;text-align:justify;">
<p class="challenge_1" style="text-align:left;">Weak Algorithm (KCTA 2).</p>
Hmmm, KCTA1 was too easy, KCTA2 was also broken easily with a second method... was the algorithm the problem or the chosen key? Well, let's do a third try. The algorithm used in KCTA3 is exactly the same as in KCTA1 and KCTA2. The key used is long enough to avoid using the method most people used in KCTA2.<br />
The plain text is just a MD5 hash. The solution is just that upper case MD5 hash, you don't need to bruteforce the hash.
<p class="challenge_1" style="text-align:left;">Algorithms</p>
Here you can download the implementation of the <a href="encryption.txt" target="_blank" class="challenge_1">encryption</a> and <a href="decryption.txt" target="_blank" class="challenge_1">decryption</a> algorithms. If you have problems understanding the code, you can take a look at <a href="http://www.php.net/manual/en/" class="challenge_1">http://www.php.net/[function_name]</a>.
<p class="challenge_1" style="text-align:left;">Challenge</p>
Can you find the plain text? Cipher text (it is one number splitted into 14 lines):
<div style="margin:1mm;padding:0px;text-align:center;"><table cellspacing="0" style="text-align:center;font-family:'Courier New',monospace;font-size:10pt;border-style:solid;border-width:1px;border-color:#000000;background-color:#FFFFFF;color:#000000;padding:0px;margin:0px;"><tr><td style="margin:0px;padding-top:2mm;padding-bottom:2mm;padding-left:4mm;padding-right:4mm;">10710371385785232669648474138934287318823343254315734643750035191884907880487877506826057433<br />
01378517495509378443828639262455521270450131629959960416637348685406767806073159725742868720<br />
05984875750058284527009582287724464837037521525591823959524637874640509497637344176129111428<br />
50778753674619735879709721989732609235988756553219870833910157129342451124716775622685993024<br />
41328032625345572460744292933775278481147841937376156811974940838603550150019688228350935808<br />
22317200982740103017714838397857577871222508120238440822479536164524344856634595623741268027<br />
73461722473586653483021779586851399449530576132914750969547565835411905640468675107042338671<br />
85030338293800372519872886657978941627910208953121527980593965332885777713011284151445923653<br />
31352476655963061829032009634157875006357197875757194286524078562024082526966172265511903614<br />
67054301325245696179291619604399098623499002555429103904346255761430912899895485643467847181<br />
13589321819039166738970088968121459673650269589425279452166724712153020007937782174923268296<br />
52092051531288958378198124619514001231160278903135802159961933483022206242483481095553715677<br />
67871041443515063536386180164237471860898935523330942996289935615396957257249912613227645397<br />
98577231144918801870639492709736345913537666758722485809095264143321624809018377819321</td></tr></table></div>
<p class="challenge_1" style="text-align:left;margin-top:0px;">Hint</p>
You can solve this challenge &quot;by hand&quot; (without programming) if you have a big numbers calculator.
<p class="challenge_1" style="text-align:left;">Solution</p></div>
<form action="/challenges/crypto/phas_kcta3/index.php" method="get" style="margin-top:3mm;margin-bottom:1mm;padding:0px;">
  <input type="text" value="enter solution" name="solution" size="20" class="challenge_edit" />
  <input type="submit" value="Check it!" name="button_submit" style="margin-left:5mm;" class="challenge_submit" />
</form></div></div></body></html>