<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JavaScript 2: &quot;Often used but easy to solve.&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"><script type="text/javascript">
  function password () {
    var d1, d2, d3, d4, d5, input;
    d1=window.document.bgColor;
    d2=window.document.linkColor;
    d3=d1.substring (1,5)+d2.substring (1,3);
    d4=d3.toUpperCase ();
    input=prompt("Password:","");
    if (input!=d3 && input!=d4) {
      alert("Are you crazy? Thats so easy!");
      window.location.href="/hackchallenge.php";
    }
    else {
      window.location.href=d3+".php";
    }
  }
</script>
</head>
<body onLoad="password()" class="usual" link="#FF9900" bgcolor="#D0D0D0">
<div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>JavaScript</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/scripts/js2/index.php" title="Challenge: &quot;Often used but easy to solve.&quot;"><span>Often used but easy to solve.</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a JavaScript-challenge" src="/files/images/groupmasters/1_all.gif" height="18" width="25" /><span>JavaScript 2: &quot;Often used but easy to solve.&quot;</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=2" title="Rate this challenge!"><img src="/files/images/icons/vote_stat_sl.gif" width="16" height="16" alt="vote icon" title="Rate this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=17&amp;challenge_id=2" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=30&amp;challenge_id=2" title="Visit the JavaScript-Forum for solutions of this challenge."><img src="/files/images/misc/challenge_forum_solutions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum for solutions of this challenge." /><span>Solutions</span></a></td><td class="done">done&nbsp;<a href="/challengestats.php?challengeid=2" title="8200 users have solved this challenge so far.">[8200]</a></td></tr></table></td></tr></table></div><div class="challenge_div">Get it!
</div></div></body></html>