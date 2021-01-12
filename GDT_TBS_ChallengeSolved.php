<?php
namespace GDO\TBS;

use GDO\User\GDO_User;
use GDO\DB\GDT_Virtual;
use GDO\UI\GDT_Label;

final class GDT_TBS_ChallengeSolved extends GDT_Virtual
{
    protected function __construct()
    {
        parent::__construct();
        $this->gdtType(GDT_Label::make());
    }
    
    ############
    ### User ###
    ############
    public $user;
    public function user(GDO_User $user)
    {
        $this->user = $user;
        return $this->subquery("SELECT 1 FROM gdo_tbs_challengesolved cs WHERE cs_challenge=gdo_tbs_challenge.chall_id AND cs_user={$this->user->getID()}");
    }
    
    /**
     * @return GDO_TBS_Challenge
     */
    public function getChallenge()
    {
        return $this->gdo;
    }
    
    public function renderCell()
    {
        if ($this->gdo->getVar($this->name))
        {
            return sprintf('<span class="tbs-done">%s</span>', t('tbs_done'));
        }
        else
        {
            return sprintf('<span class="tbs-not-done">%s</span>', t('tbs_not_done'));
        }
    }
    
}
