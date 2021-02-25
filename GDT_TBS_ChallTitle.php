<?php
namespace GDO\TBS;

use GDO\DB\GDT_String;
use GDO\Profile\GDT_ProfileLink;

/**
 * A challenge title.
 * A string with challenge creator link.
 * @author gizmore
 */
final class GDT_TBS_ChallTitle extends GDT_String
{
    public function defaultLabel() { return $this->label('name'); }
    
    /**
     * @var GDT_ProfileLink
     */
    private $creator;
    
    protected function __construct()
    {
        parent::__construct();
        $this->creator = GDT_ProfileLink::make()->withNickname();
    }
    
    
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
            $creator = $this->creator->forUser($creator)->renderCell();
            $creator = sprintf(' <span>(made by %s)</span>', $creator);
        }
        
        # output
        return sprintf('<div class="tbs-chall-title"><a href="%s">%s</a>%s</div>',
            $chall->hrefChallenge(), $chall->displayTitle(), $creator);
    }
    
}
