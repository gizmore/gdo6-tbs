<?php
namespace GDO\TBS\Method;

use GDO\Core\MethodAjax;

final class ActiveUsers extends MethodAjax
{
    public function execute()
    {
        return $this->templatePHP('ajax/active_users.php');
    }
    
}
