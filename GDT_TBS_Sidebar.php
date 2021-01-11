<?php
namespace GDO\TBS;

use GDO\UI\GDT_Bar;
use GDO\Core\GDT;
use GDO\UI\GDT_Link;
use GDO\Core\GDT_Template;

final class GDT_TBS_Sidebar extends GDT_Bar
{
    
    protected function __construct()
    {
        parent::__construct();
    }
    
    public function render()
    {
        return GDT_Template::php('TBS', 'left_bar.php');
    }
    
}
