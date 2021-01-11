<?php
namespace GDO\TBS\Method;

use GDO\Form\MethodCrud;
use GDO\TBS\GDO_TBS_Challenge;

final class ChallengeCRUD extends MethodCrud
{
    public function hrefList()
    {
        return href('TBS', 'ChallengeLists');
    }

    public function gdoTable()
    {
        return GDO_TBS_Challenge::table();
    }
    
}
