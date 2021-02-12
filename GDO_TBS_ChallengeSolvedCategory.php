<?php
namespace GDO\TBS;

use GDO\Core\GDO;
use GDO\Profile\GDT_User;
use GDO\DB\GDT_UInt;
use GDO\User\GDO_User;
use GDO\DB\GDT_Decimal;
use GDO\DB\Query;

/**
 * Precompute challenge points per category for the users.
 * 
 * @TODO: convert this table into a view?
 * @TODO: on a solve it is enough to increment a single category for a single user. A challenge can only have 1 category.
 * 
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
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

    private static function updateUsersWithHugeQuery()
    {
        $users = GDO_User::table()->select('user_id')->exec();
        while ($userid = $users->fetchValue())
        {
            self::updateUserWithHugeQuery($userid);
        }
    }
    
    private static function updateUserWithHugeQuery($userid)
    {
        $userid = (int)$userid;
        
        $query = new Query(self::table());
        $tableName = self::table()->gdoTableName();
        
        # 1 userid
        $calcselect = "( SELECT $userid ), ";
        
        # 5 whole site
        $calcselect .= self::calcselect($userid);
        
        # 5x12 each category
        foreach (GDT_TBS_ChallengeCategory::$CATS as $category)
        {
            $calcselect .= self::calcselect($userid, $category);
        }
        
        # fix
        $calcselect = trim($calcselect, ' ,');
        
        # Exec calculation
        $query = $query->raw("REPLACE INTO $tableName VALUES ( $calcselect )");
        $query->exec();

        # Change user_level
        $user = GDO_User::table()->find($userid);
        $user->setVar('user_level', (int)self::get($user)->getVar('csc_points'));
        $user->save();
    }
    
    /**
     * @TODO: Ugly code
     * @param int $userid
     * @param int $categoryID
     */
    private static function calcselect($userid, $category=null)
    {
        $challTable = GDO_TBS_Challenge::table()->gdoTableName();
        $solvedTable = GDO_TBS_ChallengeSolved::table()->gdoTableName();
        $whereCat = $category === null ? '' : " AND chall_category='$category'";
        $calcselect = "( SELECT COUNT(*) FROM $solvedTable st JOIN $challTable ct ON st.cs_challenge = ct.chall_id WHERE st.cs_user=$userid$whereCat ), ";
        $calcselect .= "( SELECT COUNT(*) FROM $challTable WHERE 1$whereCat ), ";
        $calcselect .= "( SELECT SUM(chall_score) FROM $solvedTable st JOIN $challTable ct ON st.cs_challenge = ct.chall_id WHERE st.cs_user=$userid$whereCat ), ";
        $calcselect .= "( SELECT SUM(chall_score) FROM $challTable WHERE 1$whereCat ), ";
        $calcselect .= "( SELECT ( SELECT SUM(chall_score) FROM $solvedTable st JOIN $challTable ct ON st.cs_challenge = ct.chall_id WHERE st.cs_user=$userid$whereCat ) / ( SELECT SUM(chall_score) FROM $challTable WHERE 1$whereCat ) * 100.0 ), ";
        return $calcselect;
    }
    
    public static function updateUsers()
    {
        self::updateUsersWithHugeQuery();
    }
    
    public static function get(GDO_User $user)
    {
        if (!($row = self::getById($user->getID())))
        {
            $row = self::blank([
                'csc_user' => $user->getID(),
                'csc_points' => '0',
            ]);
        }
        return $row;
    }
    
    public static function updateUser(GDO_User $user)
    {
        $row = self::get($user);
        $before = $row->getVar('csc_points');
        self::updateUserWithHugeQuery($user->getID());
        $row = self::get($user);
        $after = $row->getVar('csc_points');
        
        return [$before, $after];
    }

}
