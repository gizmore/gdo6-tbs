<?php
namespace GDO\TBS\Test;

use GDO\Tests\TestCase;
use GDO\Tests\MethodTest;
use GDO\TBS\Method\ChallengeLists;
use function PHPUnit\Framework\assertEquals;

/**
 * Test a few things :)
 * @author gizmore
 */
final class TBSTest extends TestCase
{
    /**
     * GDO Core rendering test.
     */
    public function testChallengeLists()
    {
        $r = MethodTest::make()->method(ChallengeLists::make())->execute();
        assertEquals(1, substr_count($r->render(), 'JavaScript'), "Test if challenge list category is only rendered once.");
    }
    
}
