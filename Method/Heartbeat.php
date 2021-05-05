<?php
namespace GDO\TBS\Method;

use GDO\Core\MethodAjax;
use GDO\Core\GDT_Response;
use GDO\PM\GDO_PM;
use GDO\User\GDO_User;
use GDO\DB\GDT_UInt;
use GDO\Core\GDT_JSON;
use GDO\OnlineUsers\Method\ViewOnline;
use GDO\Forum\GDO_ForumUnread;

/**
 * Updates online list and pm/forum badge.
 * @author gizmore
 * @version 6.10.1
 * @since 6.10.0
 */
final class Heartbeat extends MethodAjax
{
    public function getTitleLangKey() { return 'tbs_heartbeat'; }
    
    public function execute()
    {
        $user = GDO_User::current();
        
        $pm = GDO_PM::countUnread($user);
        
        $forum = GDO_ForumUnread::countUnread($user);
        
        $query = ViewOnline::make()->getQuery()->
            selectOnly('user_id, user_name, user_real_name, user_guest_name,
                user_level, user_gender, user_country');
        $users = $query->exec()->fetchAllAssoc();
        
        $anon = 3;
        
        return GDT_Response::makeWith(
            GDT_UInt::make('unread_pm')->var($pm),
            GDT_UInt::make('unread_forum')->var($forum),
            GDT_JSON::make('online_users')->value($users),
            GDT_UInt::make('online_anonymous')->var($anon)
        );
    }

}
