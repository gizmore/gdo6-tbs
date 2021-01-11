<?php
namespace GDO\TBS;

use GDO\Core\GDO;
use GDO\Profile\GDT_User;
use GDO\DB\GDT_UInt;
use GDO\User\GDO_User;
use GDO\DB\GDT_Decimal;

final class GDO_TBS_ChallengeSolvedCategory extends GDO
{
    public function gdoCached() { return false; }
    
    public function gdoColumns()
    {
        return [
            GDT_User::make('csc_user')->primary(),
            
            GDT_UInt::make('csc_solved')->bytes(2),
            GDT_UInt::make('csc_max_solved')->bytes(2),
            GDT_UInt::make('csc_points')->bytes(2),
            GDT_UInt::make('csc_max_points')->bytes(2),
            GDT_Decimal::make('csc_percent')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_0')->bytes(2),
            GDT_UInt::make('csc_max_solved_0')->bytes(2),
            GDT_UInt::make('csc_points_0')->bytes(2),
            GDT_UInt::make('csc_max_points_0')->bytes(2),
            GDT_Decimal::make('csc_percent_0')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_1')->bytes(2),
            GDT_UInt::make('csc_max_solved_1')->bytes(2),
            GDT_UInt::make('csc_points_1')->bytes(2),
            GDT_UInt::make('csc_max_points_1')->bytes(2),
            GDT_Decimal::make('csc_percent_1')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_2')->bytes(2),
            GDT_UInt::make('csc_max_solved_2')->bytes(2),
            GDT_UInt::make('csc_points_2')->bytes(2),
            GDT_UInt::make('csc_max_points_2')->bytes(2),
            GDT_Decimal::make('csc_percent_2')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_3')->bytes(2),
            GDT_UInt::make('csc_max_solved_3')->bytes(2),
            GDT_UInt::make('csc_points_3')->bytes(2),
            GDT_UInt::make('csc_max_points_3')->bytes(2),
            GDT_Decimal::make('csc_percent_3')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_4')->bytes(2),
            GDT_UInt::make('csc_max_solved_4')->bytes(2),
            GDT_UInt::make('csc_points_4')->bytes(2),
            GDT_UInt::make('csc_max_points_4')->bytes(2),
            GDT_Decimal::make('csc_percent_4')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_5')->bytes(2),
            GDT_UInt::make('csc_max_solved_5')->bytes(2),
            GDT_UInt::make('csc_points_5')->bytes(2),
            GDT_UInt::make('csc_max_points_5')->bytes(2),
            GDT_Decimal::make('csc_percent_5')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_6')->bytes(2),
            GDT_UInt::make('csc_max_solved_6')->bytes(2),
            GDT_UInt::make('csc_points_6')->bytes(2),
            GDT_UInt::make('csc_max_points_6')->bytes(2),
            GDT_Decimal::make('csc_percent_6')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_7')->bytes(2),
            GDT_UInt::make('csc_max_solved_7')->bytes(2),
            GDT_UInt::make('csc_points_7')->bytes(2),
            GDT_UInt::make('csc_max_points_7')->bytes(2),
            GDT_Decimal::make('csc_percent_7')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_8')->bytes(2),
            GDT_UInt::make('csc_max_solved_8')->bytes(2),
            GDT_UInt::make('csc_points_8')->bytes(2),
            GDT_UInt::make('csc_max_points_8')->bytes(2),
            GDT_Decimal::make('csc_percent_8')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_9')->bytes(2),
            GDT_UInt::make('csc_max_solved_9')->bytes(2),
            GDT_UInt::make('csc_points_9')->bytes(2),
            GDT_UInt::make('csc_max_points_9')->bytes(2),
            GDT_Decimal::make('csc_percent_9')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_10')->bytes(2),
            GDT_UInt::make('csc_max_solved_10')->bytes(2),
            GDT_UInt::make('csc_points_10')->bytes(2),
            GDT_UInt::make('csc_max_points_10')->bytes(2),
            GDT_Decimal::make('csc_percent_10')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_11')->bytes(2),
            GDT_UInt::make('csc_max_solved_11')->bytes(2),
            GDT_UInt::make('csc_points_11')->bytes(2),
            GDT_UInt::make('csc_max_points_11')->bytes(2),
            GDT_Decimal::make('csc_percent_11')->digits(3, 1),
            
            GDT_UInt::make('csc_solved_12')->bytes(2),
            GDT_UInt::make('csc_max_solved_12')->bytes(2),
            GDT_UInt::make('csc_points_12')->bytes(2),
            GDT_UInt::make('csc_max_points_12')->bytes(2),
            GDT_Decimal::make('csc_percent_12')->digits(3, 1),
        ];
    }

    public static function updateUsers()
    {
        $result = GDO_User::table()->select()->exec();
        while ($user = $result->fetchObject())
        {
            self::updateUser($user);
        }
    }
    
    public static function get(GDO_User $user)
    {
        if (!($row = self::getById($user->getID())))
        {
            $row = self::blank([
                'csc_user' => $user->getID(),
            ]);
        }
        return $row;
    }
    
    public static function updateUser(GDO_User $user)
    {
        $row = self::get($user);
        
        $before = $row->getVar('csc_points');
        
        $row->setVars([
            'csc_solved' => GDO_TBS_ChallengeSolved::table()->queryNumSolved($user),
            'csc_max_solved' => GDO_TBS_ChallengeSolved::table()->queryChallengeCount(),
            'csc_points' => GDO_TBS_ChallengeSolved::table()->queryNumPoints($user),
            'csc_max_points' => GDO_TBS_ChallengeSolved::table()->queryMaxPoints(),
        ]);
        $row->setVar('csc_percent', 
            (int)
            floatval($row->getVar('csc_points')) / 
            floatval($row->getVar('csc_max_points')));
        
        foreach (GDT_TBS_ChallengeCategory::$CATS as $n => $category)
        {
            $row->setVars([
                "csc_solved_{$n}" => GDO_TBS_ChallengeSolved::table()->queryNumSolved($user, $category),
                "csc_max_solved_{$n}" => GDO_TBS_ChallengeSolved::table()->queryChallengeCount($category),
                "csc_points_{$n}" => GDO_TBS_ChallengeSolved::table()->queryNumPoints($user, $category),
                "csc_max_points_{$n}" => GDO_TBS_ChallengeSolved::table()->queryMaxPoints($category),
            ]);
            $row->setVar("csc_percent_{$n}",
                (int)
                floatval($row->getVar("csc_points_{$n}")) /
                floatval($row->getVar("csc_max_points_{$n}")));
        }
        
        $after = $row->getVar('csc_points');
        
        $row->save();
        
        $user->saveVar('user_level', $row->getVar('csc_points'));
        
        return [$before, $after];
    }

}
