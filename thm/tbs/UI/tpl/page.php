<?php
use GDO\Core\Website;
use GDO\TBS\GDT_TBS_Sidebar;
use GDO\Util\Javascript;
use GDO\Core\Module_Core;
use GDO\UI\GDT_Page;
use GDO\UI\GDT_Loading;
use GDO\TBS\GDT_TBS_TopBar;

/**
 * TBS page layout.
 */

/** @var $page GDT_Page **/
$page->loadSidebars();
?>
<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=Website::displayTitle()?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow" />
	<meta name="generator" content="GDO v<?=Module_Core::instance()->gdo_revision?>">
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
		  <?=Website::renderTopResponse()?>
		  <?=$page->html?>
		</div>
	  </div>
	  <div><?=$page->bottomNav->render()?></div>
	</div>
	
	<?=GDT_Loading::make()->renderCell()?>
	
	<?=Javascript::displayJavascripts(Module_Core::instance()->cfgMinifyJS() === 'concat')?>

  </body>
</html>
