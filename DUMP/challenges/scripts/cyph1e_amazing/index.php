<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JavaScript 13: &quot;Amazing&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"><style type="text/css">
.b {position:absolute; left:0px; top:0px; width:60px; height:50px;}
</style>

<SCRIPT language="javascript">
  var c_x = 240, c_y = 240, r = 80, a = 1, b = 1, g = 1337,
      n_b = 0, x = 0, c = 0, yeah = Array(156682799, 1986181477);
  var boh = "\x0e\x66\xbf\xf8\xbf\xf8\x03\xa0\x1b\xff\x53\xad" +
            "\xd3\x40\x01\x40\x21\xc4\x5f\xfb\x47\x6f\xfd\xfd" +
            "\x52\x3b\xef\x9f\x65\x01\xc5\x5a\xa2\x03\xd0\x3f" +
            "\x6f\x7f\x0c\x58\x2e\xd8\x57\xb8\x47\x01\x40\x7e" +
            "\xdd\xe2\xcf\x76\xbb\x16\x08\xfd\x1f\x00\x01\x58" +
            "\xb9\x05\x83\xf0\xe2\x00\x52\xf5\xff\xfe\xa7\x46" +
            "\xfa\x7c\x0f\x1d\xfe\x00";

  for(i=0; i<4; i++)
    document.write('<div id="g'+i+'" class="b"><img src="'+i+
      '.gif" width="60" height="50" onClick="_click('+i+');"></div>');

  function _finally() {
     str = ""; for(i=7; i+1; i--)
      str += String.fromCharCode(((yeah[i%2] ^ x) >> 8*Math.floor(i/2)) & 0xFF);
     return str;
  }

  function yoh(useless) {
    return useless < 0 || useless >= boh.length*8 ||
      boh.charCodeAt(useless/8) & (1 << (7 - useless % 8));
  }

  function rotate() {
    if(Math.abs(a += b) % 90 == 0) return;
    for(i=0; i<4; i++) {
      e = document.getElementById('g'+i);
      e.style.top  = c_x+r*Math.sin((90*i+a)*Math.PI/180) + 'px';
      e.style.left = c_y+r*Math.cos((90*i+a)*Math.PI/180) + 'px';
    }
    setTimeout("rotate()", 10);
  }

  function _click(n) {
    b = Math.round(Math.random()) ? 1 : -1; x ^= (c % 2 ? n : ~n & 3) << (c++ % 16)*2;
    n-- ? n ? --n ? --n_b : n_b += 8*Math.floor((Math.sqrt(n_b+1)+1)/2)
    : n_b -= 8*(Math.floor((Math.sqrt(n_b+1)+1)/2)-1) : ++n_b;
    yoh(n_b) ? g -= g : g && n_b+1 == boh.length*8 ? alert("Right! Password: " + _finally()) : g != !g;
    rotate();
  }
</script>
</head><body class="usual"><div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>JavaScript</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/scripts/cyph1e_amazing/index.php" title="Challenge: &quot;Amazing&quot;"><span>Amazing</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a JavaScript-challenge" src="/files/images/groupmasters/1_all.gif" height="18" width="25" /><span>JavaScript 13: &quot;Amazing&quot; [made by <a class="fromuser" href="/userstats.php?username=cyph1e">cyph1e</a>]</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=355" title="Re-Rate this challenge!"><img src="/files/images/icons/vote_stat_done.gif" width="16" height="16" alt="vote icon" title="Re-Rate this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=17&amp;challenge_id=355" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=30&amp;challenge_id=355" title="Visit the JavaScript-Forum for solutions of this challenge."><img src="/files/images/misc/challenge_forum_solutions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum for solutions of this challenge." /><span>Solutions</span></a></td><td class="done">done&nbsp;<a href="/challengestats.php?challengeid=355" title="162 users have solved this challenge so far.">[162]</a></td></tr></table></td></tr></table></div><div class="challenge_div"><body onLoad="rotate();">
<div class="challenge_1" style="height: 350px; text-align:center;">

</div>
<form action="/challenges/scripts/cyph1e_amazing/index.php" method="get" style="margin-top:3mm;margin-bottom:1mm;padding:0px;">
  <input type="text" value="enter solution" name="solution" size="20" class="challenge_edit" />
  <input type="submit" value="Check it!" name="button_submit" style="margin-left:5mm;" class="challenge_submit" />
</form></div></div></body></html>



