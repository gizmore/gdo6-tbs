<?php
namespace GDO\TBS\Method;

use GDO\Core\Application;
use GDO\Core\Method;
use GDO\Core\MethodAdmin;
use GDO\TBS\Module_TBS;
use GDO\UI\GDT_Page;

final class Admin extends Method
{
    use MethodAdmin;

    /**
     * Before execute we add the top tabs.
     * @see MethodAdmin
     */
    public function beforeExecute()
    {
        if (Application::instance()->isHTML())
        {
            $this->renderNavBar('TBS');
            GDT_Page::$INSTANCE->topTabs->addField(
                Module_TBS::instance()->barAdminTabs()
            );
        }
    }
    
    public function execute()
    {
    }
    
}
