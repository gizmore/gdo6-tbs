<div class="module" style="margin-top:3mm;">
  <h1>Faq/Info/Help</h1>
  <dl>
   <dt>Don'ts</dt>
     <dd>
       <ul class="donts">
         <li>Server attacks</li>
         <li>Brute force attacks</li>
         <li>Trading challenge solutions</li>
         <li>Private message spamming</li>
       </ul>
    </dd>

    <dt>Miscellaneous</dt>
     <dd>
       Please register just one account. All other ones will be deleted.
       Users can chose whether they want to hide there email after account registration or not.
       The admins of bright-shadows.net won't make your email address available to anybody if you chose to hide it.<br />
       Every user has the responsibility to chose a strong password (example: g49bnklgidf) which he keeps secret.
       Account have been taken over in the past!<br />
       The admins have the right to delete forum posts if they think they are not appropriate and accounts of
       users that do not accept the rules (especially traders, pm spammers, server attackers, user that want to gain
       an advantage by taking over accounts, etc).
       Therefore the admins may have a look at private messages if they think someone is trading solutions.<br />
       Users that haven't solved a challenges since registration might be deleted once in a while.
       A few times a year also user that haven't been logged in for at least a year and that have solved less than 20 challenges might be deleted.
       The remaining accounts stay untouched.<br />
       Everything at bright-shadows.net is &copy; by the admins.
     </dd>

    <dt>Security/Hacking</dt>
     <dd>
      Please do not attack the server.
      We are not our own hoster so in case the server is vulnerable we can't do much except telling our hoster about this.
      Don't be lame or we have to inform your ISP! This specially refers to brute force attacks.
      They are usually not necessary and if they are, check if it can be done offline (example: password hashes).<br />
      A totally different aspect are security holes within the web site
     (<a target="_blank" href="GDO/TBS/tutorials/tbs_wiwa.txt" class="tbscode_standard_link" title="Visit this hyperlink! (Target: /tutorials/tbs_wiwa.txt)"><img src="GDO/TBS/images/misc/tbsc_hyperlink.gif" width="16" height="16" class="tbscode_standard_link" alt="link" title="Visit this hyperlink! (Target: /tutorials/tbs_wiwa.txt)" />web-application</a>).
      If you find one of those please report them to theblacksheep (there have been a couple XSS ones in the past).
      We won't get mad at you for those :-)
     </dd>

    <dt>Challenges</dt>
     <dd>
      The challenges are divided into groups, such as <q>PHP</q> or <q>JavaScript</q>.
      All these groups and the corresponding challenges are listed when you click on <q>Challenges</q> in the menu.
      In the rightmost column of this table, you can see whether you have solved the challenge or not.
      The number left from this shows the count of all users who have solved it yet.
      This number is red if just a very few have solved it, and green, if many users have done so.<br />
      When you click on a challenge in the left column, you get to the challenge itself.
      Then you get a task or encrypted text or whatever and you have to solve it.
      If you have done so, you are ranked again and return to the challenge-overview.
     </dd>

    <dt>Hints/Solution Trading</dt>
     <dd>
      The users of bright-shadows have put great affords into creating that variety of challenges.
      Trading challenge solutions with other user would just be unfair. That's why we
      are going to delete users that trade solutions.
      We don't care why they have done it!<br />
      If you need a hint for a challenge ask in the forum first!
      Don't harass other user especially the challenge creator(s) by sending tons of spam pms.
    </dd>

    <dt>Support/Donations/Challenges/Tutorials/etc</dt>
     <dd>
      Please go to <a href="index.php?mo=TBS&me=Support" class="tbscode_standard_link" title="Visit this hyperlink! (Target: /support.php)"><img src="GDO/TBS/images/misc/tbsc_hyperlink.gif" width="16" height="16" class="tbscode_standard_link" alt="link" title="Visit this hyperlink! (Target: /support.php)" />Support Us</a>
      in the menue for further information.
    </dd>

    <dt>Private Messages</dt>
     <dd>
      Well, private messages (you reach them via <q>Private Msg&rsquo;s</q> in the menu) are there to allow you to
      send messages to any registered user. The interface is quite self-explaining so I don't want to do this here;
      you are clever enough to figure it out on your own. Important might be that if you get any new messages, you
      can see a corresponding hint in the menu next to the link <q>Private Msg&rsquo;s</q>. If the addressee of any
      of your messages has read it you can see this in your outbox(<q>read</q> appears left from the specific
      message). Now I just want to explain how deleting messages works.<br />
      If a message is sent, it is in the outbox of the user who sent it and in the inbox of the user who received it.
      If you delete a message in your outbox, it will <em>not</em> be deleted
      in the inbox of the addressee. The same goes the other way round: if you delete a message in your inbox it will
      still be in the sender's outbox. So just delete everything you don't need any more, the other user will still have
      the message then (or not if he deleted it too).<br />
      Deleting messages which are not needed any longer also helps us to save web space.
      You may use the boardcode in your private messages. To get information about this, read the forum paragraph.
     </dd>

    <dt>Forum</dt>
     <dd>
      We made our forum on our own and we are quite happy with it. If you have any suggestions or hints, please let
      us now.<br />
      Every registered user can view the forum and can create topics and replies. Please be sure that you put your
      topic into the correct forum. All users can edit their own posts too. For the case you made a mistake, you can
      delete your own topic when there are no replies yet.<br />
      In the forum, there is no HTML-Code allowed. We have a Boardcode.
      This code is available in any posts and in private messages as well as in your signature. You can change your
      signature for the forum in the MyAccount-area.
    </dd>

   <dt>userdata.php</dt>
   <dd>
      Some user have written programs that connect to bright-shadows.net and collect information about
      their current rank, new challenges, new posts, new pms, etc.
      To save a little bandwidth and to optimize the process of data collection you can use the 
      <a href="GDO/TBS/userdata.php" class="tbscode_standard_link" title="Visit this hyperlink! (Target: /userdata.php)"><img src="GDO/TBS/images/misc/tbsc_hyperlink.gif" width="16" height="16" class="tbscode_standard_link" alt="link" title="Visit this hyperlink! (Target: /userdata.php)" />userdata</a>
      script.<br />
      If you do not specify the username parameter it returns the following information about you:<br />
      USER:RANK:TOTAL USERS:CHALLS_SOLVED:TOTAL_CHALLS:UNREAD_NEWS:UNREAD_FORUM:UNREAD_PM<br />
      Otherwise (userdata.php?username=whatever) you get the following information:<br />
      USER:RANK:TOTAL USERS:CHALLS_SOLVED:TOTAL_CHALLS<br />
      The second method also works if you aren't logged in.
  </dd>
</dl>

</div>
