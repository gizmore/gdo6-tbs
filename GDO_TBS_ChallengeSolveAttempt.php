<?php
namespace GDO\TBS;

use GDO\Core\GDO;
use GDO\Profile\GDT_User;
use GDO\Date\GDT_DateTime;
use GDO\User\GDO_User;
use GDO\Date\Time;
use GDO\Core\Application;

final class GDO_TBS_ChallengeSolveAttempt extends GDO
{
    public function gdoCached() { return false; }
    
    public function gdoColumns()
    {
        return [
            GDT_User::make('csa_user'),
            GDT_DateTime::make('csa_date'),
        ];
    }
    
    public function getDate() { return $this->getVar('csa_date'); }
    
    public static function getTimeout(GDO_User $user)
    {
        $max = self::getMaxAttempts();
        $amt = self::getAttempts($user);
        if ($amt >= $max)
        {
            $last = self::getOldestAttemptInFrame($user);
            $diff = Time::getDiff($last->getDate());
            return Time::humanDuration($diff);
        }
        else
        {
            return false;
        }
    }
    
    ###############
    ### Private ###
    ###############
    private static function getTimeframe()
    {
        return Module_TBS::instance()->cfgSolveTimeout();
    }
    
    private static function getTimeCut()
    {
        return Time::getDate(Application::$TIME - self::getTimeframe());
    }
    
    private static function getMaxAttempts()
    {
        return Module_TBS::instance()->cfgSolveAttempts();
    }
    
    private static function getAttempts(GDO_User $user)
    {
        return self::table()->select('COUNT(*)')->
            where("csa_user={$user->getID()}")->
            where('csa_date >'.quote(self::getTimeCut()))->
            exec()->fetchValue();
    }
    
    private static function getOldestAttemptInFrame(GDO_User $user)
    {
        return self::table()->select()->
            where("csa_user={$user->getID()}")->
            where('csa_date >'.quote(self::getTimeCut()))->
            first()->exec()->fetchObject();
        
    }
    
}
