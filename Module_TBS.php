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
use GDO\UI\GDT_Card;
use GDO\UI\GDT_Container;
use GDO\DB\Query;
use GDO\Vote\Module_Vote;

/**
 * TBS website as gdo6 module.
 * 
 * @TODO BBDecoder in Module_TBSBBMessage
 * 
 * @ISSUES
 * - Forum is way too slow :(
 * 
 * @author gizmore
 * @license Property of Erik and TBS
 */
final class Module_TBS extends GDO_Module
{
    public $module_priority = 110;
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
            'OnlineUsers', 'Profile', 'PM',
            'Login', 'Register', 'Recovery', 'Admin',
            'Favicon', 'FontAwesome', 'Captcha',
            'JQuery', 'JQueryAutocomplete',
            'TBSBBMessage', 'LoadOnClick',
            'Perf', 'Statistics',
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
    
    public function hookDecoratePostUser(GDT_Card $card, GDT_Container $cont, GDO_User $user)
    {
        # Add likes
        $likes = Module_Vote::instance()->userSettingVar($user, 'likes');
        $cont->addField(GDT_UInt::make()->label('num_likes', [$likes]));
        
        # Add groupmaster icons
        $cont2 = GDT_Container::make()->horizontal()->addClass('badge-container');
        foreach (GDT_TBS_ChallengeCategory::$CATS as $category)
        {
            $cont2->addField(
                GDT_TBS_GroupmasterIcon::make()->category($category)->gdo($user)
            );
        }
        $cont->addField($cont2);
    }
    
    public function hookMethodQueryTable_Forum_Thread(Query $query)
    {
        $join = 'LEFT JOIN gdo_tbs_challengesolvedcategory AS csc ON csc_user=post_creator';
        $query->join($join);
    }
    
    public function hookUserActivated(GDO_User $user)
    {
        # Craete scoring upon activation.
        GDO_TBS_ChallengeSolvedCategory::updateUser($user);
    }
}
