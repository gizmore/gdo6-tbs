<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JavaScript 5: &quot;Easy script&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"><script type="text/javascript">
  function check() {
    pass     = unescape('%44%61%67%6F%62%65%72%74%20%44%75%63%6B');
    solution = pass.substr(0,8)+pass.substring(9,13)+pass.substring(8,9);
    passwd = document.formular.user.value;
    if (passwd == solution) {
      window.location.href=solution+".php";
    }
    else {
      alert("False!!!");
    }
  }
</script></head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>JavaScript</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/scripts/js5/index.php" title="Challenge: &quot;Easy script&quot;"><span>Easy script</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a JavaScript-challenge" src="/files/images/groupmasters/1_all.gif" height="18" width="25" /><span>JavaScript 5: &quot;Easy script&quot;</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=56" title="Rate this challenge!"><img src="/files/images/icons/vote_stat_sl.gif" width="16" height="16" alt="vote icon" title="Rate this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=17&amp;challenge_id=56" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=30&amp;challenge_id=56" title="Visit the JavaScript-Forum for solutions of this challenge."><img src="/files/images/misc/challenge_forum_solutions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum for solutions of this challenge." /><span>Solutions</span></a></td><td class="done">done&nbsp;<a href="/challengestats.php?challengeid=56" title="6030 users have solved this challenge so far.">[6030]</a></td></tr></table></td></tr></table></div><div class="challenge_div">Hey just log in here!
<div class="challenge_1" style="text-align:center;"> 
  <form name="formular" style="margin:0px;padding:0px;text-align:center;">
    Username: <input type="text" name="user" maxlength="20" value="" size="20" class="edit_1" style="margin-right:3mm;">
    <input type="button" value="Check" onClick="check()" class="challenge_submit">
  </form>
</div>
</div></div></body></html>