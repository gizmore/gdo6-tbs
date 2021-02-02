<?php
namespace GDO\TBS;

use GDO\UI\GDT_Container;
use GDO\User\GDO_User;
use GDO\Core\GDO;

final class GDT_TBS_Master extends GDT_Container
{
    protected function __construct()
    {
        parent::__construct();
        $this->horizontal();
    }
    
    public function gdo(GDO $gdo=null)
    {
        $this->removeFields();
        $this->addMasterIcons($gdo);
        return parent::gdo($gdo);
    }
    
    private function addMasterIcons(GDO_User $user)
    {
        foreach (GDT_TBS_ChallengeCategory::$CATS as $cat)
        {
            $this->addField(
                GDT_TBS_GroupmasterIcon::make()->category($cat)->gdo($user));
        }
    }
    
}
