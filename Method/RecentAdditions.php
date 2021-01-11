<?php
namespace GDO\TBS\Method;

use GDO\Table\MethodQueryTable;
use GDO\TBS\GDO_TBS_Challenge;

/**
 * Show recently added challenges.
 * @author gizmore
 */
final class RecentAdditions extends MethodQueryTable
{
    public function gdoTable()
    {
        return GDO_TBS_Challenge::table();
    }
    
    public function getQuery()
    {
        return parent::getQuery()->order('chall_created', false)->limit(10);
    }
    
}
