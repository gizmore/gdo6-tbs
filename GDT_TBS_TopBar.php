<?php
namespace GDO\TBS;

use GDO\Core\GDT;
use GDO\Core\GDT_Template;

/**
 * Render the TOP bar.
 * Image.
 * Page counter.
 * User counter.
 * Online counter.
 * Chall counter.
 * @author gizmore
 *
 */
final class GDT_TBS_TopBar extends GDT
{
    public function render()
    {
        return GDT_Template::php('TBS', 'top_bar.php');
    }
    
}
