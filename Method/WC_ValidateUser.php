<?php
namespace GDO\TBS\Method;

use GDO\Core\MethodAjax;
use GDO\User\GDT_User;
use GDO\Mail\GDT_Email;

/**
 * WC API for validating user emails.
 * This script shall simply return 1 or 0.
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class WC_ValidateUser extends MethodAjax
{
    public function gdoParameters()
    {
        return [
            GDT_User::make('user')->notNull(),
            GDT_Email::make('email')->notNull(),
        ];
    }
    
    public function execute()
    {
        if ($this->gdoParameterValue('user') &&
            $this->gdoParameterValue('email'))
        {
            die('1');
        }
        die('0');
    }
    
}
