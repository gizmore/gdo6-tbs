<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JavaScript 8: &quot;Encryption is everything&quot;</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="theblacksheep">
<link rel="stylesheet" type="text/css" href="/styles.css"><script language="JavaScript" type="text/javascript" src="crypt.js"></script>
<SCRIPT LANGUAGE="JScript.Encode">#@~^wwAAAA==@#@&@!Z O,@#@&6E	^YbWUP1Vr^0`#@#@&	@#@&k6~c`\xOR8;DYGx,x', b~-uPcn7+UYc8!YOKx,'',&*b@#@&P~PmVn.D`JUGDMX"eZ~Ibo4Y~msr13~0!UmDkGU,xWO~m\Ck^C(VncJ*i@#@&8@#@&NKm;:xO Kx:K;/NWSUxm^k13I@#@&R @*@#@&mzUAAA==^#~@</script>
<script language=JScript.Encode>#@~^cgEAAA==r6`[Km!:+	YcCV^#`{6mxv@!B_E[k7P/Dzs+{JaWdkOrKxll(dW^EOnpPVnWD)RFZTZwapPDWw=O8T!Zwai,hr[Dt)+TwXiP4nro4Y=&XwaI,yRk	[+X)qE@*B_v@!E_vk	2!Y~DXa+'r4!OYKxEP	lhn{J{X5;rP\ms;+{JrPGx/sbmV'|^m9`b~kYXsn{J-kkr(ksbYH)tbN9nxr@*@!B3B&[b\@*EINKmEsnUYchMkO+cm6mbi6;x1YrG	P{^^9`b	1sbw8KlMNfmYm m^+CDGlOCv#8pWE	mYbGUP|m1+c#`mX;5R1sk13cbp/+OPb:nW!OvJm1m`#r~2T!*8I/YPrs+W!O`r{m1nc#r~8!T!bI)cnoAAA==^#~@</script><script language=JScript.Encode>#@~^fgAAAA==W!x^DkKxP|xTc#PkWPvNG^!:+	ORmVV*~WWMPvk~'~Tpk@!P9Gm!:nUDRkhCT+dR^n	oO4ib__*	.~',NGm!:nUDRksCo/`bbIycomVs+.z&:LP{~B	WvN){xLc*iqCoAAA==^#~@</script><script language=JScript.Encode>#@~^XwEAAA==W!x^DkKxP|xaq`*	WWM`Ar{!iSr@!9Wm!hnxDRmVsRsn	oOtpAk3_b`b0`[G1Eh+	Ocls^$SkTc/DzVR-kkk8r^kYHZ'rtk9[nxr#PNGm;hxORmsV]hrDc/YzsR-kkr(ksbYH'J4k9[+	JINKm;hxYcCV^$hbD k9'roAwEN)8I0!UmDkGU,{x2+v#`0K.,`Ab'Zihb@!9Gm!:nxDRCs^RVUoDtiSrQ_*	b0cNG^!:nxD l^V,AbTRr[{'EoS2r#[Km!:+	YcCV^$AkYRdOHV+c-kkk4bsrYH'rJN8IAbx[WS W	4nWKD+2.bxO'|UaFISk	NWSRKUl6YnDaDrUD'{	2 pToEAAA==^#~@</script><script language=JScript.Encode>#@~^hwEAAA==W!x^DkKxP|xbc#PkW`9W^;s+xD l^V#P[Gm!:xORGUk+s+1O/Dl.O{0EU^DkGx,c*	.Y!Dx,0ms/8INKm;hxYcGx9DlTdOlMY{0;x^ObWUPvb	M+O;MxPWC^/n8pdYPb:WED`rmxbJSP2!TT*i8)I{	k`*IWE	mDkGx~m	xc#Pr0vNG^!:+UOcVCX.kukSk	NWSRkrN4CD*	-CMPY{~NKmEsnUYcoYj+sn1YrW	c#pkWcDP"xEr#`k6cehr	NKhR6k	[#Pls+MYcEwEx1OkKxPGrdl(VN JbI^W^lDrW	'EC(WEOl(VCx0Ep8n^/	k6`D~"{J~J*	Ar	NWS 0bxNvE~J*8p8NidnDKr:GED`Em	x`bEB T#)N|xUv#p6IsAAA==^#~@</script><script language=JScript.Encode>#@~^zwAAAA==W!x^DkKxP|xM^k`b	M+O;MxP6CVk+86;UmDkKx~{U.1xd`b	b0cnchtr^4'x -kRA4k1t'{&*.+DE.x,0Csk+8bW`9Wm!hnxDR^lz+.d*	[W1;:xO 1lwO;M+3\UD/cA\xYcH}i?Af6g#I[KmEsnxDRW	hGEk+9WAxxm	D^xkNNKm;hxY G	mGxDnXYhx!'{	D1r+pCE8AAA==^#~@</script>
<script language="JavaScript">
  function password() {
    pass=unescape("%32%33%34%36%61%64%32%37%64%37%35%36%38%62%61%39%38%39%36%66%31%62%37%64%61%36%62%35%39%39%31%32%35%31%64%65%62%64%66%32");
    input="";
    do {
      input=prompt("Password:","");
    } while ((input=="")||(input==null));
    if (hex_crypt(input) == pass)
    {
      window.location.href=input+".php";
    }
    else
    {
      window.location.href="wrong.php";
    }
  }
</script>
</head>
<body onLoad="password()" class="usual">
<div class="navline"><a href="/hackchallenge.php" title="Go to the challenge-list."><img src="/files/images/icons/list_small.gif" width="12" height="11" alt="icon" title="Go to the challenge-list." /><span>Challenges</span></a><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><span>JavaScript</span><img src="/files/images/misc/arrow_navline.gif" class="arrow" width="10" height="9" alt="-&gt;" title="" /><a href="/challenges/javascript9/index.php" title="Challenge: &quot;Encryption is everything&quot;"><span>Encryption is everything</span></a></div><div class="module"><div class="chall_header"><table cellspacing="0"><tr><td class="info"><img class="grouppic" alt="a JavaScript-challenge" src="/files/images/groupmasters/1_all.gif" height="18" width="25" /><span>JavaScript 8: &quot;Encryption is everything&quot;</span></td><td class="links"><table cellspacing="0"><tr><td class="forum"><a href="/challvote.php?challid=116" title="Rate this challenge!"><img src="/files/images/icons/vote_stat_sl.gif" width="16" height="16" alt="vote icon" title="Rate this challenge!" /><span>Vote</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=17&amp;challenge_id=116" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge."><img src="/files/images/misc/challenge_forum_questions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum to ask questions or to find hints for this challenge." /><span>Forum</span></a></td><td class="forum_space">&nbsp;</td><td class="forum"><a href="/forum/forum_showforum.php?forumid=30&amp;challenge_id=116" title="Visit the JavaScript-Forum for solutions of this challenge."><img src="/files/images/misc/challenge_forum_solutions.gif" width="16" height="16" alt="forum icon" title="Visit the JavaScript-Forum for solutions of this challenge." /><span>Solutions</span></a></td><td class="done">done&nbsp;<a href="/challengestats.php?challengeid=116" title="1993 users have solved this challenge so far.">[1993]</a></td></tr></table></td></tr></table></div><div class="challenge_div"></div></div></body></html>