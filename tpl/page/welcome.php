<?php
use GDO\UI\GDT_Panel;
use GDO\Login\Method\Form;

$panel = GDT_Panel::make();
$panel->title('tbs_welcome_title');
$panel->text('tbs_welcome_text');

// $form = Form::make();
// $panel->addField(GDT_Method::make()->method($form));
echo $panel->render();

$form = Form::make();
echo $form->execute()->render();
