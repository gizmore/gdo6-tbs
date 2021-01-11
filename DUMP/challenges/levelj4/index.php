<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JavaScript 4: &quot;Hard but possible.&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"><script src="JavaScript">
  function testEncode() {
    var dater = new Date();
    Day = dater.getDate();
    dater = null;
    Ret = encode(document.formular.user.value, Day);
    location = Ret+".php";
  }
  function encode (OrigString, CipherVal) {
    Ref="0123456789abcdefghijklmnopqrstuvwxyz._~ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    CipherVal = parseInt(CipherVal);
    var Temp="";
    for (Count=0; Count < OrigString.length; Count++) {
      TempChar = OrigString.substring (Count, Count+1);
      Conv = cton(Ref, TempChar);
      Cipher=Conv^CipherVal;
      Cipher=ntoc(Ref, Cipher);
      Temp += Cipher;
    }
    return (Temp);
  }
  function cton (Ref, Char) {
    return (Ref.indexOf(Char));
  }
  function ntoc (Ref, Val) {
    return (Ref.substring(Val, Val+1));
  }
</script></head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>JavaScript</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/levelj4/index.php" title="Challenge: &quot;Hard but possible.&quot;"><span>Hard but possible.</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a JavaScript-challenge" src="/files/images/groupmasters/1_all.gif" height="18" width="25" /><span>JavaScript 4: &quot;Hard but possible.&quot;</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=55" title="Rate this challenge!"><img src="/files/images/icons/vote_stat_sl.gif" width="16" height="16" alt="vote icon" title="Rate this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=17&amp;challenge_id=55" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=30&amp;challenge_id=55" title="Visit the JavaScript-Forum for solutions of this challenge."><img src="/files/images/misc/challenge_forum_solutions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum for solutions of this challenge." /><span>Solutions</span></a></td><td class="done">done&nbsp;<a href="/challengestats.php?challengeid=55" title="3957 users have solved this challenge so far.">[3957]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><p class="challenge_1" style="text-align:center;">Only input a valid username and you will get to the solution page.</p>
<form name="formular" style="margin:0px;width:100%;text-align:center;padding:0px;">
  <input type="text" name="user" maxlength="20" size="20" class="challenge_edit" />
  <input type="button" name="b1" value="Check" onClick="testEncode()" class="challenge_submit" />
</form>
</div></div></body></html>