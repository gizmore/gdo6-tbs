<?php
use GDO\OnlineUsers\Method\ViewOnline;
use GDO\Profile\GDT_ProfileLink;

$result = ViewOnline::make()->getQuery()->exec();

$guestcount = 0;
$onlineUsers = '';
while ($user = $result->fetchObject())
{
    if ($user->isGuest())
    {
        $guestcount++;
    }
    else
    {
        $profileLink = GDT_ProfileLink::make()->withNickname()->forUser($user);
        $onlineUsers .= sprintf("<div>%s<span>%s</span></div>\n", $profileLink->renderCell(), $user->getVar('user_level'));
    }
}
?>
<div id="tbs-online-list">
  <?=$onlineUsers?>
  <div id="tbs-anonymous"><?=t('tbs_guestcount', [$guestcount])?></div>
</div>
