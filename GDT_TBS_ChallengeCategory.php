<?php
namespace GDO\TBS;

use GDO\DB\GDT_Enum;

/**
 * A challenge category implemented as enum.
 * Order is defined by TBS and should stay the same.
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class GDT_TBS_ChallengeCategory extends GDT_Enum
{
    public static $CATS = [
        'JavaScript', # 0
        'Exploit', # 1
        'Crypto', # 2
        'CrackIt', # 3
        'Stegano', # 4
        'Flash', # 5
        'Programming', # 6
        'Java-Applet', # 7
        'Logic', # 8 
        'Special', # 9
        'Science', # 10
        'Information Gathering', # 11
        '/dev/null', # 12
    ];
    
    public static $COLORS = [
        'JavaScript' => '#e2e056',
        'Exploit' => '#c0ccff',
        'Crypto' => '#1ab60a',
        'CrackIt' => '#d72931',
        'Stegano' => '#98672e',
        'Flash' => '#1795b9',
        'Programming' => '#536bff',
        'Java-Applet' => '#ef872b',
        'Logic' => '#c0c0c0',
        'Special' => '#f355b9',
        'Science' => '#77ff50',
        'Information Gathering' => '#ffff99',
        '/dev/null' => '#00ffff',
    ];
    
    public function defaultLabel() { return $this->label('category'); }
    
    public function __construct()
    {
        parent::__construct();
        $this->enumValues(...self::$CATS);
    }
    
    public static function getCategoryID($category)
    {
        return array_search($category, self::$CATS);
    }
    
    public static function getCategoryIDs()
    {
        return array_keys(self::$CATS);
    }
    
}
