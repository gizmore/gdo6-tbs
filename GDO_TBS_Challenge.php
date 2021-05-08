<?php
namespace GDO\TBS;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\User\GDT_Level;
use GDO\DB\GDT_CreatedBy;
use GDO\DB\GDT_CreatedAt;
use GDO\DB\GDT_DeletedBy;
use GDO\DB\GDT_DeletedAt;
use GDO\UI\GDT_Title;
use GDO\DB\GDT_Virtual;
use GDO\DB\GDT_Decimal;
use GDO\DB\GDT_UInt;
use GDO\User\GDO_User;
use GDO\Net\GDT_Url;
use GDO\Forum\GDT_ForumBoard;
use GDO\User\GDO_Permission;
use GDO\User\GDT_Permission;
use GDO\User\GDT_Password;
use GDO\Net\URL;
use GDO\DB\GDT_Index;
use GDO\DB\Cache;

/**
 * A challenge on TBS.
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class GDO_TBS_Challenge extends GDO
{
    public function gdoColumns()
    {
        return [
            GDT_AutoInc::make('chall_id'),
            GDT_UInt::make('chall_order'),
            GDT_Level::make('chall_score')->notNull()->initial('1'),
            GDT_TBS_ChallengeCategory::make('chall_category')->notNull(),
            GDT_TBS_ChallengeStatus::make('chall_status'),
            GDT_Title::make('chall_title'),
            GDT_Url::make('chall_url')->allowLocal(true)->allowExternal(false)->notNull(),
            
            GDT_Password::make('chall_solution'),
            GDT_Permission::make('chall_permission'),
            
            GDT_UInt::make('chall_votes')->notNull()->initial('0'),
            
            GDT_TBS_VoteField::make('chall_difficulty')->tooltip('tbs_tt_chall_difficulty'),
            GDT_TBS_VoteField::make('chall_creativity')->tooltip('tbs_tt_chall_creativity'),
            GDT_TBS_VoteField::make('chall_education')->tooltip('tbs_tt_chall_education'),
            GDT_TBS_VoteField::make('chall_presentation')->tooltip('tbs_tt_chall_presentation'),
            
            GDT_ForumBoard::make('chall_questions')->label('tbs_question_board'),
            GDT_ForumBoard::make('chall_solutions')->label('tbs_solution_board'),
            
            GDT_Virtual::make('chall_solver_count')->gdtType(GDT_Decimal::make()->tooltip('tbs_tt_chall_solver_count'))->subquery("SELECT COUNT(*) FROM gdo_tbs_challengesolved cs WHERE cs.cs_challenge=chall_id"),
            GDT_TBS_ChallengeSolved::make('chall_solved'),
            
            GDT_CreatedBy::make('chall_creator'),
            GDT_CreatedAt::make('chall_created'),
            GDT_DeletedBy::make('chall_deletor'),
            GDT_DeletedAt::make('chall_deleted'),
            
            GDT_Index::make('index_chall_category')->indexColumns('chall_category'),
        ];
    }
    
    public function getTitle() { return $this->getVar('chall_title'); }
    public function displayTitle() { return $this->display('chall_title'); }
    public function getQuestionBoardID() { return $this->getVar('chall_questions'); }
    public function getSolutionBoardID() { return $this->getVar('chall_solutions'); }
    public function getCategory() { return $this->getVar('chall_category'); }
    public function displayCategory() { return $this->display('chall_category'); }
    public function getStatus() { return $this->getVar('chall_status'); }
    
    /**
     * @return GDO_Permission
     */
    public function getPermission() { return GDO_Permission::findBy('perm_name', $this->getPermissionTitle()); }
    public function getPermissionID() { return $this->getPermission()->getID(); }
    public function getPermissionTitle() { return $this->displayCategory() . '_' . $this->getOrder() . '_' . preg_replace('#[^0-9A-Za-z]#', '_', $this->getTitle()); }
    
    public function hasSolved(GDO_User $user)
    {
        return GDO_TBS_ChallengeSolved::hasSolved($user, $this);
    }
    
    /**
     * @return GDO_User
     */
    public function getCreator() { return $this->getValue('chall_creator'); }
    
    /**
     * @return URL
     */
    public function getURL() { return $this->getValue('chall_url'); }
    
    public function getOrder() { return $this->getVar('chall_order'); }
    
    public function hrefEdit() { return href('TBS', 'ChallengeCRUD', "&id={$this->getID()}"); }
    public function hrefChallenge() { return href('TBS', 'Challenge', "&challenge={$this->getID()}"); }
    public function href_chall_questions() { return href('Forum', 'Boards', "&board={$this->getQuestionBoardID()}"); }
    public function href_chall_solutions() { return href('Forum', 'Boards', "&board={$this->getSolutionBoardID()}"); }
    
    ###############
    ### Factory ###
    ###############
    /**
     * @return self
     */
    public static function getChallenge($category, $title)
    {
        return self::table()->select()->
            where('chall_category='.quote($category))->
            where('chall_title='.quote($title))->
            first()->exec()->fetchObject();
    }
    
    public static function getChallengeCount($category=null)
    {
        static $count = null;
        $key = 'tbs_challenge_count';
        $key = $category === null ? $key : $key . $category;
        if ($count === null)
        {
            if (false === ($count = Cache::get($key)))
            {
                $where = $category === null ? true : "chall_category = " . (int)$category;
                $count = self::table()->countWhere($where);
                Cache::set($key, $count);
            }
        }
        return $count;
    }
    
    /**
     * Get a challenge by GDO url.
     * @param string $url
     * @return self
     */
    public static function getByURL($url)
    {
        return self::table()->select()->
            where("chall_url LIKE '{$url}%'")->
            first()->exec()->fetchObject();
    }
    
    ###############
    ### Solving ###
    ###############
    public function onSolve($answer)
    {
        return (new ChallSolveEngine($this))->onSolve($answer);
    }
    
    public function solved(GDO_User $user)
    {
        return (new ChallSolveEngine($this))->solved($user);
    }
   
}
