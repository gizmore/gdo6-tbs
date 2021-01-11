<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Special 27: &quot;New Year&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"><script type="text/javascript">
function decrypt(k) {
var data = [0x4b,0x49,0x52,0x46,0x46,0x42,0x4e,0x24,0x04,0x18,0x0b,0x0d,0x4b,0x08,0x0d,0x00,
			0x06,0x04,0x4e,0x00,0x13,0x1d,0x4e,0x0e,0x12,0x1c,0x14,0x0c,0x13,0x07,0x4e,0x1d,
			0x12,0x49,0x14,0x00,0x1e,0x1c,0x4e,0x08,0x0f,0x49,0x1b,0x00,0x09,0x1d,0x1c,0x1f,
			0x4b,0x52,0x47,0x47,0x46,0x42,0x50,0x47,0x26,0x1e,0x0f,0x0a,0x09,0x00,0x09,0x06,
			0x1d,0x00,0x09,0x08,0x12,0x0d,0x08,0x47,0x12,0x1f,0x4e,0x1e,0x12,0x15,0x07,0x08,
			0x13,0x06,0x4e,0x1d,0x19,0x1c,0x4e,0x0b,0x18,0x13,0x08,0x1d,0x4b,0x0b,0x00,0x1f,
			0x0f,0x48,0x4e,0x5b,0x07,0x09,0x50,0x6d,0x57,0x00,0x0d,0x11,0x1d,0x1c,0x09,0x47,
			0x06,0x1e,0x1f,0x0c,0x56,0x4d,0x36,0x08,0x05,0x08,0x20,0x11,0x11,0x15,0x1c,0x1d,
			0x45,0x02,0x17,0x00,0x08,0x08,0x4c,0x47,0x0c,0x18,0x1f,0x1d,0x19,0x52,0x4c,0x52,
			0x5a,0x59,0x4c,0x47,0x19,0x1c,0x18,0x0a,0x19,0x0b,0x53,0x45,0x59,0x5d,0x5e,0x45,
			0x55,0x55,0x41,0x00,0x11,0x0b,0x17,0x0c,0x0f,0x57];
var nk = "";
for (i = 0; i < k.length; i++) {
	var c = k.charCodeAt(i);
	if (c > 96 && c < 123) nk += String.fromCharCode(c);
}
var klen = nk.length;
var result = "";
for (i = 0; i < data.length; i++) {
	var c = data[i];
	c ^= k.charCodeAt(i % klen);
	if (c > 96 && c < 123) c = (c - k.charCodeAt(i % klen) + 26) % 26 + 97;
	else if (c > 64 && c < 91) c = (c - key.charCodeAt(i % klen) + 58) % 26 + 65;
	result += String.fromCharCode(c);
}
return result;
}
</script>
</head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>Special</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/specials/newyear/index.php" title="Challenge: &quot;New Year&quot;"><span>New Year</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a Special-challenge" src="/files/images/groupmasters/10_all.gif" height="18" width="25" /><span>Special 27: &quot;New Year&quot; [made by <a class="fromuser" href="/userstats.php?username=quangntenemy">quangntenemy</a>]</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=324" title="See the rating of this challenge!"><img src="/files/images/icons/vote_stat_see_sl.gif" width="16" height="16" alt="vote icon" title="See the rating of this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=27&amp;challenge_id=324" title="Visit the Special-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the Special-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="notdone">not&nbsp;done&nbsp;<a href="/challengestats.php?challengeid=324" title="23 users have solved this challenge so far.">[23]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><center>
<h3>Welcome to the new year special challenge!</h3>
<script type="text/javascript">
var key = prompt("This page is password protected\nENTER PASSWORD:","");
if (!key) key = "";
document.write(decrypt(key));
</script>
</center>
<form action="/challenges/specials/newyear/index.php" method="get" style="margin-top:3mm;margin-bottom:1mm;padding:0px;">
  <input type="text" value="enter solution" name="solution" size="20" class="challenge_edit" />
  <input type="submit" value="Check it!" name="button_submit" style="margin-left:5mm;" class="challenge_submit" />
</form></div></div></body></html>