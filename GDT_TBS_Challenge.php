<?php
namespace GDO\TBS;

use GDO\DB\GDT_Object;
use GDO\Core\WithCompletion;

/**
 * This is a challenge object type for databases.
 * @author gizmore
 */
final class GDT_TBS_Challenge extends GDT_Object
{
    use WithCompletion;
    
    public function __construct()
    {
        parent::__construct();
        $this->table(GDO_TBS_Challenge::table());
    }
    
}
