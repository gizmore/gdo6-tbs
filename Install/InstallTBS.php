<?php
namespace GDO\TBS\Install;

use GDO\Core\Module_Core;
use GDO\Friends\Module_Friends;
use GDO\PM\Module_PM;
use GDO\Language\Module_Language;
use GDO\Forum\Module_Forum;

/**
 * Configure a few modules on install.
 * @author gizmore
 */
final class InstallTBS
{
    public static function onInstall()
    {
        Module_Core::instance()->saveConfigVar('allow_guests', '0');
        Module_Friends::instance()->saveVar('module_enabled', false);
        Module_PM::instance()->saveConfigVar('pm_welcome', '1');
        Module_Language::instance()->saveConfigVar('languages', '["en","de","it"]');
        Module_Forum::instance()->saveConfigVar('forum_mail_enable', '0');
    }
    
}
