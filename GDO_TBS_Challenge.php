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
use GDO\Core\GDT_MD5;
use GDO\DB\GDT_Decimal;
use GDO\DB\GDT_UInt;
use GDO\User\GDO_User;
use GDO\Net\GDT_Url;
use GDO\Forum\GDT_ForumBoard;
use GDO\Core\GDT_Success;
use GDO\Core\GDT_Response;
use GDO\User\GDO_Permission;
use GDO\User\GDT_Permission;

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
            
            GDT_MD5::make('chall_solution'),
            GDT_Permission::make('chall_permission'),
            
            GDT_UInt::make('chall_votes')->notNull()->initial('0'),
            
            GDT_TBS_VoteField::make('chall_difficulty')->tooltip('tbs_tt_chall_difficulty'),
            GDT_TBS_VoteField::make('chall_creativity')->tooltip('tbs_tt_chall_creativity'),
            GDT_TBS_VoteField::make('chall_education')->tooltip('tbs_tt_chall_education'),
            GDT_TBS_VoteField::make('chall_presentation')->tooltip('tbs_tt_chall_presentation'),
            
            GDT_ForumBoard::make('chall_questions'),
            GDT_ForumBoard::make('chall_solutions'),
            
            GDT_Virtual::make('chall_solver_count')->gdtType(GDT_Decimal::make()->tooltip('tbs_tt_chall_solver_count'))->subquery("SELECT COUNT(*) FROM gdo_tbs_challengesolved cs WHERE cs_challenge=gdo_tbs_challenge.chall_id"),
            GDT_TBS_ChallengeSolved::make('chall_solved'),
            
            GDT_CreatedBy::make('chall_creator'),
            GDT_CreatedAt::make('chall_created'),
            GDT_DeletedBy::make('chall_deletor'),
            GDT_DeletedAt::make('chall_deleted'),
        ];
    }
    
    public function getTitle() { return $this->getVar('chall_title'); }
    public function displayTitle() { return $this->display('chall_title'); }
    public function getQuestionBoardID() { return $this->getVar('chall_questions'); }
    public function getSolutionBoardID() { return $this->getVar('chall_solutions'); }
    public function displayCategory() { return $this->getVar('chall_category'); }
    
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
    
    public function getURL() { return $this->getValue('chall_url'); }
    
    public function getOrder() { return $this->getVar('chall_order'); }
    
    public function hrefChallenge() { return href('TBS', 'Challenge', "&challenge={$this->getID()}"); }
    public function href_chall_questions() { return href('Forum', 'Boards', "&board={$this->getQuestionBoardID()}"); }
    public function href_chall_solutions() { return href('Forum', 'Boards', "&board={$this->getSolutionBoardID()}"); }
    
    public function queryChallengeCount() { return $this->countWhere(); }

    public function getChallengeCount()
    {
        static $count;
        if (!isset($count))
        {
            $count = $this->queryChallengeCount();
        }
        return $count;
    }
    
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
    
    public function onSolve($answer)
    {
        if ($this->getVar('chall_solution') === md5($answer))
        {
            $this->solved();
        }
    }
    
    public function solved(GDO_User $user=null)
    {
        $user = $user === null ? GDO_User::current() : $user;
        
        if (!$this->isPersisted())
        {
            return $this->response('msg_tbs_solved_alpha');
        }
        
        if ($this->hasSolved($user))
        {
            return $this->response('msg_tbs_solved_already');
        }
        
        return $this->onSolved($user);
    }
    
    private function onSolved(GDO_User $user)
    {
        GDO_TBS_ChallengeSolved::challengeSolved($this, $user);
        
        list($before, $after) = GDO_TBS_ChallengeSolvedCategory::updateUser($user);
        $gain = $after - $before;
        return $this->response('msg_tbs_solved', [$gain, $after]);
    }
    
    private function response($key, array $args=null)
    {
        return GDT_Response::makeWith(
            GDT_Success::make()->text($key, $args)
        );
    }
    
}
