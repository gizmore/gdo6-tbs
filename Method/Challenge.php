<?php
namespace GDO\TBS\Method;

use GDO\Core\Method;
use GDO\TBS\GDT_TBS_Challenge;
use GDO\TBS\GDO_TBS_Challenge;

final class Challenge extends Method
{
    public function isGuestAllowed() { return false; }
    
    public function gdoParameters()
    {
        return [
            GDT_TBS_Challenge::make('challenge')->notNull(),
        ];
    }
    
    /**
     * @return GDO_TBS_Challenge
     */
    public function getChallenge()
    {
        return $this->gdoParameterValue('challenge');
    }
    
    public function execute()
    {
        $challenge = $this->getChallenge();
        return $this->templatePHP('challenge.php', ['challenge' => $challenge]);
    }
    
}
