<?php
use GDO\Language\Trans;
use GDO\Session\GDO_Session;
use GDO\TBS\GDO_TBS_Challenge;
use GDO\Util\Strings;
use GDO\Core\Debug;
use GDO\Core\GDOError;
use GDO\Core\Logger;
use GDO\Core\ModuleLoader;
use GDO\DB\Database;
use GDO\Core\Application;

chdir($_SERVER['DOCUMENT_ROOT']);
require 'GDO6.php';
require 'protected/config.php';

Database::init();
new ModuleLoader(GDO_PATH . 'GDO/');
GDO_Session::init(GDO_SESS_NAME, GDO_SESS_DOMAIN, GDO_SESS_TIME, !GDO_SESS_JS, GDO_SESS_HTTPS);
new Application();
ModuleLoader::instance()->loadModulesCache();

# Bootstrap
Trans::$ISO = GDO_LANGUAGE;
Logger::init(null, GDO_ERROR_LEVEL); # 1st init as guest
Debug::init();
Debug::enableErrorHandler();
Debug::enableExceptionHandler();
Debug::setDieOnError(GDO_ERROR_DIE);
Debug::setMailOnError(GDO_ERROR_MAIL);
GDO_Session::instance();
?>
<div>Solution checker active</div>
<?php
if ( ($solution = @$_REQUEST['solution']) && (@$_REQUEST['button_submit']) )
{
    $url = $_SERVER['SCRIPT_FILENAME'];
    $url = Strings::substrFrom($url, '/GDO/TBS');
    $challenge = GDO_TBS_Challenge::getByURL($url);
    if (!$challenge)
    {
        throw new GDOError('err_tbs_challenge');
    }
    
    $challenge->onSolve($solution);
}
