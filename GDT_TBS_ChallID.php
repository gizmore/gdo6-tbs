<?php
namespace GDO\TBS;

use GDO\DB\GDT_UInt;

final class GDT_TBS_ChallID extends GDT_UInt
{
//     protected function __construct()
//     {
//         parent::__construct();
//         $this->noLabel();
//     }
    
    public static function make($name=null)
    {
        $obj = parent::make($name);
        $obj->noLabel();
        return $obj;
    }
    
    public function renderCell()
    {
        return sprintf('%s:', $this->getVar());
    }
    
}
