<?php
namespace GDO\TBS;

use GDO\Core\GDT;

/**
 * A sidebar icon.
 * @author gizmore
 */
final class GDT_TBS_Icon extends GDT
{
    public $iconName;
    public function iconName($iconName)
    {
        $this->iconName = $iconName;
    }

    public function render()
    {
        return $this->renderCell();
    }
    
    public function renderCell()
    {
        $path = Module_TBS::instance()->wwwPath("img/sidebar/{$this->iconName}.gif");
        return sprintf("<img src=\"%s\" />\n", $path);
    }
    
}
