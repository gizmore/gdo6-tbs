<?phpuse GDO\User\GDO_User;
use GDO\TBS\Method\ChallengeLists;/** @var $user GDO_User **/$_REQUEST['user'] = $user->getID();
echo ChallengeLists::make()->execute()->render();