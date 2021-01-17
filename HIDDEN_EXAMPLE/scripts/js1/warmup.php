<?php
chdir("../../../../../");

define('TBS_CHALL_CATEGORY', 'JavaScript');
define('TBS_CHALL_TITLE', 'First one and very easy to do.');

require 'GDO/TBS/chall_include_head.php';

if (isset($chall))
{
    echo $chall->solved()->render();
}

require 'GDO/TBS/chall_include_foot.php';
