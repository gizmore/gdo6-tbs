<?php
namespace GDO\TBS\Method;

use GDO\Table\MethodQueryTable;
use GDO\TBS\GDT_TBS_Rank;
use GDO\Country\GDT_Country;
use GDO\User\GDT_Level;
use GDO\TBS\GDT_TBS_GroupmasterIcon;
use GDO\TBS\GDT_TBS_ChallengeCategory;
use GDO\Profile\GDT_ProfileLink;
use GDO\TBS\GDO_TBS_ChallengeSolvedCategory;
use GDO\User\GDO_User;

/**
 * TBS ranking table.
 * @author gizmore
 */
final class Ranking extends MethodQueryTable
{
    public function fileCached() { return true; }
    
    public function isOrdered() { return false; }
    public function isFiltered() { return false; }
    public function getDefaultOrder() { return 'user_level DESC'; }
    public function getDefaultIPP() { return 100; }
    public function fetchAs() { return GDO_User::table(); }
    
//     public function getTitleLangKey() { return 'table_tbs_ranking'; }
    
    public function getTitle()
    {
        return t('mtitle_tbs_ranking');
    }
    
    
    public function gdoTable()
    {
        return GDO_TBS_ChallengeSolvedCategory::table();
    }
    
    public function getQuery()
    {
        return $this->gdoTable()->select('*')->
                joinObject('csc_user')->
                where('user_type="member"')->
                fetchTable(GDO_User::table());
    }
    
    public function gdoHeaders()
    {
        $o = $this->table->headers->name;
        $page = $this->table->headers->getField('page')->getRequestVar($o, 1);
        $ipp = $this->table->headers->getField('ipp')->getRequestVar($o, 100);
        $from = $this->table->pagemenu->getFromS($page, $ipp);
        return [
            GDT_TBS_Rank::make('rank')->startRank($from+1),
            GDT_Country::make('user_country')->noLabel()->withName(false),
            GDT_ProfileLink::make('username')->withNickname(),
            GDT_Level::make('user_level')->label('solved'),
            $this->groupmasterIcon(0),
            $this->groupmasterIcon(1),
            $this->groupmasterIcon(2),
            $this->groupmasterIcon(3),
            $this->groupmasterIcon(4),
            $this->groupmasterIcon(5),
            $this->groupmasterIcon(6),
            $this->groupmasterIcon(7),
            $this->groupmasterIcon(8),
            $this->groupmasterIcon(9),
            $this->groupmasterIcon(10),
            $this->groupmasterIcon(11),
            $this->groupmasterIcon(12),
        ];
    }
    
    private function groupmasterIcon($id)
    {
        return GDT_TBS_GroupmasterIcon::make()->
            category(GDT_TBS_ChallengeCategory::$CATS[$id]);
    }
    
}
