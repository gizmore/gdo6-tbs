<?php
use GDO\Profile\GDT_ProfileLink;
use GDO\TBS\Method\Heartbeat;
use GDO\User\GDO_User;

$users = Heartbeat::make()->getOnlineUsers();

$guestcount = 0;
$onlineUsers = '';

$c = GDO_User::table()->cache;
foreach ($users as $user)
{
    $user = $c->getDummy()->setGDOVars($user);
    if ($user->isAnon())
    {
        $guestcount++;
    }
    else
    {
        $profileLink = GDT_ProfileLink::make()->withNickname()->forUser($user);
        $onlineUsers .= sprintf("<div>%s<span>%s</span></div>\n",
            $profileLink->renderCell(), $user->getVar('user_level'));
    }
}
?>
<div id="tbs-online-list">
  <?=$onlineUsers?>
  <div id="tbs-anonymous"><?=t('tbs_guestcount', [$guestcount])?></div>
</div>
