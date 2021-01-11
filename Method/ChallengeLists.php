<?php
namespace GDO\TBS\Method;

use GDO\Core\Method;
use GDO\Core\GDT_Response;
use GDO\Profile\GDT_User;
use GDO\TBS\GDT_TBS_ChallengeCategory;

final class ChallengeLists extends Method
{
    public function isGuestAllowed() { return false; }
    
    public function gdoParameters()
    {
        return [
            GDT_User::make('user')->fallbackCurrentUser(),
        ];
    }
    
    public function execute()
    {
        $response = GDT_Response::make();
        
        foreach (GDT_TBS_ChallengeCategory::$CATS as $category)
        {
            $list = ChallengeList::make();
            $_REQUEST['category'] = $category;
            $response->add($list->execute());
        }
        
        return $response;
    }
    
}
