<?php
namespace GDO\TBS;

use GDO\DB\GDT_Decimal;

/**
 * Votes between 0.0 and 10.0.
 * Colored.
 * @author gizmore
 */
final class GDT_TBS_VoteField extends GDT_Decimal
{
    protected function __construct()
    {
        parent::__construct();
        $this->digits(2, 1);
        $this->notNull();
        $this->initial('0.0');
    }
    
}
