<?php
use GDO\Core\Module_Core;
use GDO\Core\Website;
use GDO\TBS\GDT_TBS_Sidebar;
use GDO\Javascript\Javascript;
use GDO\UI\GDT_Page;
use GDO\UI\GDT_Loading;
use GDO\TBS\GDT_TBS_TopBar;
use GDO\Javascript\Module_Javascript;
use GDO\UI\GDT_Bar;
use GDO\Perf\GDT_PerfBar;
/**
 * TBS page layout.
 */
/** @var $page GDT_Page **/
$page->bottomNav = GDT_Bar::make('bottomNav')->horizontal();
$page->bottomNav->addField(GDT_PerfBar::make());
?>
<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=Website::displayTitle()?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="generator" content="GDO v<?=Module_Core::GDO_REVISION?>">
	<?=Website::displayMeta()?>
	<?=Website::displayLink()?>
  </head>
  <body>
    
	<div id="gdo-pagewrap">
	  <div class="gdo-body">
	    <?=GDT_TBS_Sidebar::make()->render()?>
	    <?=GDT_TBS_TopBar::make()->render()?>
		<div class="gdo-main">
		  <?=$page->topTabs->render()?>
		  <?=Website::topResponse()->render()?>
		  <?=$page->html?>
		</div>
	  </div>
	  <div><?=$page->bottomNav->render()?></div>
	</div>
	
	<?=GDT_Loading::make()->render()?>
	
	<?=Javascript::displayJavascripts(Module_Javascript::instance()->cfgMinifyJS() === 'concat')?>

  </body>
</html>
