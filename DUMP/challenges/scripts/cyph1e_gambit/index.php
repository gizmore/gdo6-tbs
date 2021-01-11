<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JavaScript 12: &quot;Gambit&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"><script type="text/javascript">
  function boh() {
    alert(huh(document.formular.pass.value) ? "Righty captain! Enter the password in the box below." : "Not even close!");
  }
  function huh(pw) {
    var b = Array(8, 0, 28, 20, 20, 12, 0, 8);
    var c = Array(0x71B131DD, 0xD965BB95, 0x99351B35, 0x313BB71B);
    for(var i=0; i<pw.length; i+=4) {
      var tmp = 0;
      for(var j=0; j<b.length; j++)
        tmp |= (pw.charCodeAt(i+j%4) & ((j>3) ? 0xF0 : 0xF)) << b[j];
      for(var j=31; j+1; c[i/4]>>=1)
        tmp ^= (c[i/4] & 1) << j--;
      if(++tmp) break;
    }
    return(i==16);
  }
</script>
</head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>JavaScript</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/scripts/cyph1e_gambit/index.php" title="Challenge: &quot;Gambit&quot;"><span>Gambit</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a JavaScript-challenge" src="/files/images/groupmasters/1_all.gif" height="18" width="25" /><span>JavaScript 12: &quot;Gambit&quot; [made by <a class="fromuser" href="/userstats.php?username=cyph1e">cyph1e</a>]</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=347" title="Rate this challenge!"><img src="/files/images/icons/vote_stat_sl.gif" width="16" height="16" alt="vote icon" title="Rate this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=17&amp;challenge_id=347" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=30&amp;challenge_id=347" title="Visit the JavaScript-Forum for solutions of this challenge."><img src="/files/images/misc/challenge_forum_solutions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum for solutions of this challenge." /><span>Solutions</span></a></td><td class="done">done&nbsp;<a href="/challengestats.php?challengeid=347" title="371 users have solved this challenge so far.">[371]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><div class="challenge_1" style="text-align:center;">
This short piece of nicely formatted code shouldn't keep you occupied too long. Just reverse it.
<form name="formular" style="margin:0px;text-align:center;padding:0px;">
Password: <input type="text" name="pass" maxlength="20" size="20" class="challenge_edit" />
<input type="button" name="b1" value="Check" onClick="boh()" class="challenge_submit" />
</form></div>
<form action="/challenges/scripts/cyph1e_gambit/index.php" method="get" style="margin-top:3mm;margin-bottom:1mm;padding:0px;">
  <input type="text" value="enter solution" name="solution" size="20" class="challenge_edit" />
  <input type="submit" value="Check it!" name="button_submit" style="margin-left:5mm;" class="challenge_submit" />
</form></div></div></body></html>