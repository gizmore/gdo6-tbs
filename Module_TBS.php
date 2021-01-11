<?php
namespace GDO\TBS;

use GDO\Core\GDO_Module;
use GDO\Classic\Module_Classic;
use GDO\TBS\Install\InstallTBS;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
use GDO\User\GDO_User;
use GDO\Date\GDT_Duration;
use GDO\DB\GDT_UInt;
use GDO\DB\GDT_Checkbox;
use GDO\Net\GDT_Url;

/**
 * TBS website as gdo6 module.
 * 
 * @TODO BBDecoder in Module_TBSBBMessage
 * 
 * @KNOWN_BUG first challenge does not save permission id Oo
 * 
 * @author gizmore
 * @license Property of Erik and TBS
 */
final class Module_TBS extends GDO_Module
{
    public $module_priority = 100;
    public $module_license = 'Properitary';
    
    public function isSiteModule() { return true; }
    public function getTheme() { return 'tbs'; }
    public function onLoadLanguage() { return $this->loadLanguage('lang/tbs'); }
    public function href_administrate_module() { return href('TBS', 'Admin'); }
    
    ##############
    ### Module ###
    ##############
    public function getDependencies()
    {
        return [
            'Country', 'Language', 'Contact',
            'Classic', 'Forum', 'News', 'Mibbit',
            'Pagecounter', 'OnlineUsers', 'Profile', 'PM',
            'Login', 'Register', 'Recovery', 'Admin',
            'Favicon', 'FontAwesome', 'Captcha',
            'JQuery', 'JQueryAutocomplete',
            'TBSBBMessage', 'LoadOnClick', 'Perf',
        ];
    }
    
    public function getClasses()
    {
        return [
            GDO_TBS_Challenge::class,
            GDO_TBS_ChallengeSolveAttempt::class,
            GDO_TBS_ChallengeSolved::class,
            GDO_TBS_ChallengeSolvedCategory::class,
        ];
    }
    
    ##############
    ### Config ###
    ##############
    public function getConfig()
    {
        return [
            GDT_Duration::make('chall_solve_timeout')->initial('5m'),
            GDT_UInt::make('chall_solve_attempts')->initial('5'),
        ];
    }
    public function cfgSolveTimeout() { return $this->getConfigValue('chall_solve_timeout'); }
    public function cfgSolveAttempts() { return $this->getConfigVar('chall_solve_attempts'); }
    
    public function getUserSettings()
    {
        return [
            GDT_Checkbox::make('tbs_ranked')->initial('1')->notNull(),
            GDT_Url::make('tbs_website')->allowLocal(false)->allowExternal()->reachable(),
        ];
    }
    
    ############
    ### Init ###
    ############
    public function onInstall()
    {
        InstallTBS::onInstall();
    }
    
    public function onIncludeScripts()
    {
        $this->addJavascript('js/tbs.js');
        $this->addCSS('css/gdo6-tbs.css');
        Module_Classic::instance()->addJavascript('js/gdo6-classic.js');
    }

    ##############
    ### Render ###
    ##############
    /**
     * Get TBS Admin Section tabs.
     * @return \GDO\UI\GDT_Bar
     */
    public function barAdminTabs()
    {
        $tabs = GDT_Bar::make()->horizontal();
        
        $tabs->addField(GDT_Link::make('link_tbs_import')->href(href('TBS', 'ImportRealTBS')));
        $tabs->addField(GDT_Link::make('link_tbs_recalc')->href(href('TBS', 'RecalcPoints')));
        
        return $tabs;
    }
    
    public function rawIcon($path, $title='')
    {
        $path = $this->wwwPath("images/{$path}");
        $title = $title ? " title=\"{$title}\"" : $title;
        return sprintf('<img%s src="%s" alt="icon" />', $title, $path);
    }
    
    public function hookProfileTemplate(GDO_User $user)
    {
        echo $this->templatePHP('profile.php', ['user' => $user]);
    }
    
}
