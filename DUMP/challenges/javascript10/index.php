<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JavaScript 9: &quot;F|nd y0ur w4y&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css">  <script type="text/javascript">
  function usercheck() {
    input_user=document.fx.user.value;
    pass_val="\"eHgMYUn_MWW[SLZ!kKOiM\\SX[Uif'GcaO]YU`eWPJIv|g`YTVTlrUPQT`R_T MgIO~pcM[QHaQVrYI^u'f,ueHgMYU,";
    aNum=0;
    ax2=1;
    for(var i=0;i<input_user.length;i++){
         cx=input_user.substring(i,i+1);
         aNum=aNum+input_user.charCodeAt(i);
         ax2=(ax2*input_user.charCodeAt(i))%65537;
    }
    if (aNum==1286&&ax2==16628) {
      p_val="";
      for(var i=0;i<pass_val.length;i++)
      { hehe=input_user.charCodeAt(i%input_user.length)-32;
        heh2=pass_val.charCodeAt(i)-32;
        hehe=heh2-hehe+96;
        if(hehe>95) hehe=hehe-96;
        hehe=hehe+32;
        p_val=p_val+String.fromCharCode(hehe);
      }
      msgWindow=window.open("","displayWindow","menubar=yes");
      msgWindow.document.writeln("<html\><body onload=blah()\>Access Denied");
      msgWindow.document.writeln("<font color=white\>hehe");
      msgWindow.document.writeln(p_val);
      msgWindow.document.writeln("</font\></body\></html\>");
      msgWindow.document.close();
    }
    else {
      alert("Go home!");
      window.location.href="http://www.disney.com";
    }
  }
</script></head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>JavaScript</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/javascript10/index.php" title="Challenge: &quot;F|nd y0ur w4y&quot;"><span>F|nd y0ur w4y</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a JavaScript-challenge" src="/files/images/groupmasters/1_all.gif" height="18" width="25" /><span>JavaScript 9: &quot;F|nd y0ur w4y&quot; [made by <a class="fromuser" href="/userstats.php?username=Caesum">Caesum</a>]</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=131" title="Rate this challenge!"><img src="/files/images/icons/vote_stat_sl.gif" width="16" height="16" alt="vote icon" title="Rate this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=17&amp;challenge_id=131" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=30&amp;challenge_id=131" title="Visit the JavaScript-Forum for solutions of this challenge."><img src="/files/images/misc/challenge_forum_solutions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum for solutions of this challenge." /><span>Solutions</span></a></td><td class="done">done&nbsp;<a href="/challengestats.php?challengeid=131" title="734 users have solved this challenge so far.">[734]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><p class="challenge_1" style="text-align:center;">Please enter your username!</p>
<form name="fx" style="margin:0px;text-align:center;padding:0px;">
  <input type="text" name="user" maxlength="20" size="20" class="challenge_edit" />
  <input type="button" name="b1" value="Check" onClick="usercheck()" class="challenge_submit" />
</form>
</div></div></body></html>