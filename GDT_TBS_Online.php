<?php
namespace GDO\TBS;

use GDO\Core\GDT;
use GDO\Core\GDT_Template;

/**
 * The sidebar online users at the bottom left.
 * 
 * @author gizmore
 */
final class GDT_TBS_Online extends GDT
{
    public function renderCell()
    {
        return GDT_Template::php('TBS', 'ajax/active_users.php');
    }
    
}
