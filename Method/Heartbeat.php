<?php
namespace GDO\TBS\Method;

use GDO\Core\MethodAjax;
use GDO\Core\GDT_Response;
use GDO\PM\GDO_PM;
use GDO\User\GDO_User;
use GDO\DB\GDT_UInt;
use GDO\Forum\GDO_ForumRead;
use GDO\Core\GDT_JSON;
use GDO\OnlineUsers\Method\ViewOnline;

/**
 * Updates online list and pm/forum badge.
 * @author gizmore
 */
final class Heartbeat extends MethodAjax
{
    public function execute()
    {
        $user = GDO_User::current();
        
        $pm = GDO_PM::countUnread($user);
        
        $forum = GDO_ForumRead::countUnread($user);
        
        $query = ViewOnline::make()->getQuery()->
            selectOnly('user_id, user_name, user_real_name, user_guest_name, user_level, user_gender');
        $users = $query->exec()->fetchAllAssoc();
        
        return GDT_Response::makeWith(
            GDT_UInt::make('unread_pm')->var($pm),
            GDT_UInt::make('unread_forum')->var($forum),
            GDT_JSON::make('online_users')->value($users),
            GDT_UInt::make('online_anonymous')->var(3)
        );
    }

}
