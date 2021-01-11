<?php
namespace GDO\TBS;

use GDO\DB\GDT_String;
use GDO\Profile\GDT_ProfileLink;

final class GDT_TBS_ChallTitle extends GDT_String
{
    public function defaultLabel() { return $this->label('name'); }
    
    /**
     * @return GDO_TBS_Challenge
     */
    private function getChallenge() 
    {
        return $this->gdo;
    }
    
    public function renderCell()
    {
        $chall = $this->getChallenge();
        
        # Creator string
        $creator = $chall->getCreator();
        if ($creator->getID() <= '2')
        {
            $creator = '';
        }
        else
        {
            $creator = GDT_ProfileLink::make()->withNickname()->forUser($creator)->renderCell();
            $creator = sprintf(' <span>(made by %s)</span>', $creator);
        }
        
        # output
        return sprintf('<div class="tbs-chall-title"><a href="%s">%s</a>%s</div>',
            $chall->hrefChallenge(), $chall->displayTitle(), $creator);
    }
    
}
