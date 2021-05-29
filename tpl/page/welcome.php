<?php
use GDO\UI\GDT_Panel;
use GDO\Login\Method\Form;
use GDO\UI\GDT_Link;

$panel = GDT_Panel::make();
$panel->title('tbs_welcome_title');
$panel->text('tbs_welcome_text');
echo $panel->render();

$panel2 = GDT_Panel::make();
$panel2->title('tbs_account_migration_title');
$linkMigrate = GDT_Link::make('tbs_migrate')->href(href('TBS', 'Migrate'))->render();
$panel2->text('tbs_account_migration_text', [$linkMigrate]);
echo $panel2->render();

echo Form::make()->execute()->render();
