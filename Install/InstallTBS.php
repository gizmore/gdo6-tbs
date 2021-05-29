<?php
namespace GDO\TBS\Install;

use GDO\Core\Module_Core;
use GDO\PM\Module_PM;
use GDO\Language\Module_Language;
use GDO\Forum\Module_Forum;
use GDO\Mibbit\Module_Mibbit;
use GDO\Register\Module_Register;
use GDO\Favicon\Module_Favicon;
use GDO\File\GDO_File;
use GDO\TBS\Module_TBS;

/**
 * Configure a few modules on install.
 * @author gizmore
 */
final class InstallTBS
{
    public static function onInstall()
    {
        self::changeModuleConfigForTBS();
    }
    
    private static function changeModuleConfigForTBS()
    {
        # TBS is not guest-friendly!
        Module_Core::instance()->saveConfigVar('allow_guests', '0');
//         Module_Core::instance()->saveConfigVar('load_sidebars', '0');
        
        # Disable Friends. We only need it for GDT_ACL
//         if (module_enabled('Friends'))
//         {
//             Module_Friends::instance()->saveVar('module_enabled', false);
//         }
        
        # Send a welcome PM
        Module_PM::instance()->saveConfigVar('pm_welcome', '1');
        
        # Available languages
        Module_Language::instance()->saveConfigVar('languages', '["en","de","it"]');
        
        # On install disable forum email.
        Module_Forum::instance()->saveConfigVar('forum_mail_enable', '0');
        Module_Forum::instance()->saveConfigVar('forum_hook_left_bar', '0');

        # IRC
        Module_Mibbit::instance()->saveConfigVar('mibbit_host', 'irc.wechall.net');
        Module_Mibbit::instance()->saveConfigVar('mibbit_port', '6666');
        Module_Mibbit::instance()->saveConfigVar('mibbit_tls', '1');
        Module_Mibbit::instance()->saveConfigVar('mibbit_channel', '#tbs');
        
        # Register
        Module_Register::instance()->saveConfigVar('right_bar', '0');
        Module_Register::instance()->saveConfigVar('signup_password_retype', '0');
    
        # TBS Favicon
        $path = Module_TBS::instance()->filePath('Install/favicon.ico');
        $file = GDO_File::fromPath('favicon.ico', $path)->insert()->copy();
        Module_Favicon::instance()->saveConfigVar('favicon', $file->getID());
        Module_Favicon::instance()->updateFavicon();
    }
    
}
