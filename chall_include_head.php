<?php
use GDO\DB\Database;
use GDO\Language\Trans;
use GDO\Session\GDO_Session;
use GDO\TBS\GDO_TBS_Challenge;
use GDO\Core\Debug;
use GDO\Core\Logger;
use GDO\Core\ModuleLoader;
use GDO\Core\Application;
use GDO\User\GDO_User;
use GDO\Core\GDT_Error;
use GDO\Core\Website;

require "GDO6.php";
require 'protected/config.php';

Database::init();
new ModuleLoader(GDO_PATH . 'GDO/');
GDO_Session::init(GWF_SESS_NAME, GWF_SESS_DOMAIN, GWF_SESS_TIME, !GWF_SESS_JS, GWF_SESS_HTTPS);
new Application();
ModuleLoader::instance()->loadModulesCache();

# Bootstrap
Trans::setISO(GWF_LANGUAGE);
Logger::init(null, GWF_ERROR_LEVEL); # 1st init as guest
Debug::init();
Debug::enableErrorHandler();
Debug::enableExceptionHandler();
Debug::setDieOnError(GWF_ERROR_DIE);
Debug::setMailOnError(GWF_ERROR_MAIL);
GDO_Session::instance();
?>
<!DOCTYPE html>
<html>
<head>
<title>TBS Challenge</title>
<?=Website::displayHead()?>
<?=Website::displayMeta()?>
<?=Website::displayLink()?>
</head>
<?php
if (!GDO_User::current()->isMember())
{
    echo GDT_Error::responseWith('err_members_only')->render();
}
else
{
    $chall = GDO_TBS_Challenge::getChallenge(TBS_CHALL_CATEGORY, TBS_CHALL_TITLE);
}
?>
