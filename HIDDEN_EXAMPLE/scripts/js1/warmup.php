<?php
use GDO\User\GDO_User;
use GDO\TBS\GDO_TBS_Challenge;

chdir("../../../../../"); # need to adjust this

define('TBS_CHALL_CATEGORY', 'JavaScript');
define('TBS_CHALL_TITLE', 'First one and very easy to do.');

require 'GDO/TBS/chall_include_head.php';

/** @var $chall GDO_TBS_Challenge **/
if (isset($chall))
{
    $chall->solved(GDO_User::current());
}

require 'GDO/TBS/chall_include_foot.php';
