<?php
use GDO\TBS\Module_TBS;
$tutorials = Module_TBS::instance()->tutorialWWWPath();
?>
<div class="module">
  <h1>Tutorials</h1>
  <h3 style="margin-top:0px;">Introduction</h3>
  <div class="content"><div class="box">
    Hi, here we want to give beginners a kind of help. We will add tutorials here for different types of challenges so you can get an idea of them. After reading one of the tutorials you should be able to solve at least one of our challenges of the specified category. The aim of this site is not to show you how you can devastate homepages or do some real hacking. But it is very important to know how to program secure HTML, JavaScript, Perl or PHP	applications.<br />
    But now let's start :-)
  </div></div>
  <h3>Tutorials written by bright-shadow users</h3>
  <div class="content"><div class="box">
Weaknesses in Web-Applications is the first tutorial I wrote and I did it to help all the people out there that have problems finding
material that helps them to learn the basics of making web-applications more secure. If I have time I will add more and
more information to it. The newest version will be available here! If the content of the tutorial changes the version number
changes. If I just fix some spelling errors the version stays the same but you can check the date of the last change.
If I made any mistakes just write me an email (webmaster at bright-shadows.net),pm me or write a message in the forum!
<ul class="com_list1">
<li><a href="<?=$tutorials?>webbug_tbs1.0_8.10.2004.txt" target="_blank">Web Bugs v1.0 by theblacksheep+r3d5pik3</a></li>
<li><a href="<?=$tutorials?>javascript1.html" target="_blank">JavaScript password protections by erik, theblacksheep</a></li>
<li><a href="<?=$tutorials?>cracking_general.doc" target="_blank">General Cracking by Blacklotis</a></li>
<li><a href="<?=$tutorials?>tbs_wiwa.txt" target="_blank">Weaknesses in Web-Applications v1.7 by theblacksheep</a></li>
</ul>
  </div></div>
  <h3>Security of Web-Applications</h3>
  <div class="content"><div class="box">
<ul class="com_list1">
<li><a href="http://net-square.com/papers/one_way/one_way.html" target="_blank">One-way Web Hacking</a></li>
<li><a href="https://www.watchfire.com/securearea/whitepapers.aspx?id=8" target="_blank">HTTP Response Splitting, Web Cache Poisoning Attacks, and Related Topics</a></li>
<li><a href="http://www.webappsec.org/tc/WASC-TC-v1_0.pdf" target="_blank">Web Application Security Consortium: Threat Classification</a></li>
<li><a href="http://www.webappsec.org/projects_pdf/wasc_glossary_02262004.pdf" target="_blank">Web Security Glossary</a></li>
<li><a href="http://www.owasp.org/documentation/appsecfaq" target="_blank">Frequently Asked Questions on Web Application Security</a></li>
<li><a href="http://www.appsecinc.com/presentations/DB_APP_WORMS.pdf" target="_blank">Introduction to Database and Application Worms</a></li>
<li><a href="http://www.acros.si/papers/session_fixation.pdf" target="_blank">Session Fixation Vulnerability in Web-based Applications</a></li>
<li><a href="http://www.cgisecurity.com/papers/fingerprinting-2.txt" target="_blank">Fingerprinting Port 80 Attacks II</a></li>
<li><a href="http://www.creger.com/development/OWASPTopTen-v1.pdf" target="_blank">OWASP Top 10</a></li>
<li><a href="http://www.cgisecurity.net/papers/header-based-exploitation.txt" target="_blank">Header Based Exploitation</a></li>
<li><a href="http://www.cgisecurity.com/papers/fingerprint-port80.txt" target="_blank">Fingerprinting Port 80 Attacks I</a></li>
<li><a href="<?=$tutorials?>SessionIDs.pdf" target="_blank">Brute-Force Exploitation of Web Application Session IDs</a></li>
<li><a href="<?=$tutorials?>studyinscarlet.txt" target="_blank">A Study In Scarlet</a></li>
<li><a href="http://www.securenet.de/papers/Session_Riding.pdf" target="_blank">Session Riding</a></li>
<li><a href="<?=$tutorials?>csrf.txt" target="_blank">Cross-Site Request Forgeries</a></li>
<li><a href="http://www.net-security.org/dl/articles/XSS-Paper.txt" target="_blank">Real World XSS</a></li>
<li><a href="http://www.net-security.org/dl/articles/xss_anatomy.pdf" target="_blank">The Anatomy of Cross Site Scripting</a></li>
<li><a href="http://www.net-security.org/dl/articles/AdvancedXSS.pdf" target="_blank">Advanced cross site scripting and client automation</a></li>
<li><a href="http://www.cgisecurity.com/xss-faq.html" target="_blank">The Cross Site Scripting FAQ</a></li>
<li><a href="http://www.spidynamics.com/whitepapers/SPIcross-sitescripting.pdf" target="_blank">Cross-Site Scripting</a></li>
<li><a href="http://www.cgisecurity.net/lib/WH-WhitePaper_XST_ebook.pdf" target="_blank">Cross-Site Tracing (XST)</a></li>
<li><a href="http://www.cgisecurity.com/lib/flash-xss.htm" target="_blank">Bypassing JavaScript Filters - The Flash Attack</a></li>
<li><a href="http://www.cgisecurity.com/lib/XSS.pdf" target="_blank">Evolution of Cross-Site Scripting Attacks</a></li>
<li><a href="http://www.appsecinc.com/presentations/Manipulating_SQL_Server_Using_SQL_Injection.pdf" target="_blank">Manipulating Microsoft SQL Server Using SQL Injection</a></li>
<li><a href="http://www.spidynamics.com/whitepapers/Blind_SQLInjection.pdf" target="_blank">Blind SQL Injection</a></li>
<li><a href="http://shh.thathost.com/text/binary-search-sql-injection.txt" target="_blank">Using Binary Search with SQL Injection</a></li>
<li><a href="http://www.spidynamics.com/whitepapers/WhitepaperSQLInjection.pdf" target="_blank">SQL Injection</a></li>
<li><a href="http://www.nextgenss.com/papers/more_advanced_sql_injection.pdf" target="_blank">More Advanced SQL Injection</a></li>
<li><a href="http://www.nextgenss.com/papers/advanced_sql_injection.pdf" target="_blank">Advanced SQL Injection</a></li>
</ul>
  </div></div>
  <h3>Buffer Overflows, Format String Attacks, ...</h3>
  <div class="content"><div class="box">
<ul class="com_list1">
<li><a href="http://www.trapkit.de/papers/gcc_stack_layout_v1_20030830.pdf" target="_blank">GCC 3.x Stack Layout (german)</a></li>
<li><a href="<?=$tutorials?>dtors.txt" target="_blank">Overwriting the .dtors section</a></li>
<li><a href="http://www.zotteljedi.de/doc/stacksmashing/stacksmashing.pdf" target="_blank">Buffer Overflows fuer Jedermann (german)</a></li>
<li><a href="http://doc.bughunter.net/format-string/exploit-fs.html" target="_blank">Exploiting Format String Vulnerabilities</a></li>
<li><a href="http://www.phrack.org/phrack/49/P49-14" target="_blank">P49-14 Smashing The Stack For Fun And Profit</a></li>
<li><a href="http://www.phrack.org/phrack/55/P55-08" target="_blank">P55-08 The Frame Pointer Overwrite</a></li>
<li><a href="http://www.phrack.org/phrack/59/p59-0x07.txt" target="_blank">Advances in format string exploitation</a></li>
<li><a href="http://www.phrack.org/phrack/60/p60-0x0a.txt" target="_blank">Basic Integer Overflows</a></li>
</ul>
  </div></div>
</div>
