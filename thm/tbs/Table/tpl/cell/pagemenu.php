<?php
use GDO\Table\GDT_PageMenu;
use GDO\Table\PageMenuItem;
/** @var $pagemenu GDT_PageMenu **/
/** @var $pages PageMenuItem[] **/
?>
<div class="gdo-pagemenu">
  <p><?=t('page_of', [$pagemenu->getPage(), $pagemenu->getPageCount()])?></p>
  <ul class="pagination">
	<?php foreach ($pages as $page) : ?>
	  <li class="<?=$page->htmlClass()?>"><a href="<?=html($page->href)?>" rel="<?=$pagemenu->relationForPage($page)?>"><?=$page->page?></a></li>
	<?php endforeach; ?>
  </ul>
</div>
