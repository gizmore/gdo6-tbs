<?php
namespace GDO\TBS\Test;

use GDO\Tests\TestCase;
use GDO\Tests\MethodTest;
use GDO\TBS\Method\ChallengeLists;
use function PHPUnit\Framework\assertEquals;
use GDO\TBS\GDO_TBS_ChallengeSolvedCategory;
use function PHPUnit\Framework\assertTrue;
use GDO\TBS\GDO_TBS_Challenge;

/**
 * Test a few things :)
 * @author gizmore
 */
final class TBSTest extends TestCase
{
    public static function testChallCreation()
    {
        $chall = GDO_TBS_Challenge::blank([
            'chall_order' => '1',
            'chall_category' => 'JavaScript', 
            'chall_title' => 'Simple',
            'chall_url' => 'challenge/1/Test',
            'chall_solution' => 'test',
        ])->insert();
        assertTrue($chall->isPersisted());
    }
    
    public function testUpdateQuery()
    {
        GDO_TBS_ChallengeSolvedCategory::table()->updateUsers();
        assertTrue(true);
    }
    
    /**
     * GDO Core rendering test.
     */
    public function testChallengeLists()
    {
        # 4 times the string JavaScript has to appear.
        $r = MethodTest::make()->method(ChallengeLists::make())->execute();
        assertEquals(4, substr_count($r->render(), 'JavaScript'), "Test if challenge list category is only rendered once.");
    }
    
}
