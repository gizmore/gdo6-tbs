<?php
use GDO\TBS\GDO_TBS_Challenge;
use GDO\TBS\Module_TBS;
use GDO\UI\GDT_Image;
use GDO\User\GDO_User;
use GDO\OnlineUsers\Method\ViewOnline;
use GDO\Statistics\GDO_Statistic;

echo "<div id=\"tbs_top_bar\">\n";

$mo = Module_TBS::instance();

$countViews = GDO_Statistic::totalHits();
$countChalls = GDO_TBS_Challenge::table()->getChallengeCount();
$countUsers = GDO_User::table()->countWhere('user_type="member"');
$countOnline = ViewOnline::make()->getQuery()->selectOnly('COUNT(*)')->exec()->fetchValue();

$views = t('tbs_top_views');
$challs = t('tbs_top_challs');
$users = t('tbs_top_users');
$online = t('tbs_top_online');

$img = GDT_Image::make()->src($mo->wwwPath('img/header_2.jpeg'));
$img->addClass('fl');
echo $img->renderCell();

echo "<div id=\"tbs_top_counts\">\n";
echo "<table>\n";
echo "<tbody>\n";

echo "<tr>\n";
echo "<th>{$views}: </th><td>{$countViews}</td>\n";
echo "<th>{$challs}: </th><td>{$countChalls}</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<th>{$users}: </th><td>{$countUsers}</td>\n";
echo "<th>{$online}: </th><td>{$countOnline}</td>\n";
echo "</tr>\n";

echo "</tbody>";
echo "</table>";

echo "</div>";
echo "<div style=\"clear: both;\"></div>\n";
echo "</div>";
