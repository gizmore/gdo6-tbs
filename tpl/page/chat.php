<?php
use GDO\UI\GDT_Panel;
use GDO\UI\GDT_IconButton;

$panel = GDT_Panel::make('chat_panel');
$panel->title('tbs_chat_title');
$panel->text('tbs_chat_text');
echo $panel->render();

$button = GDT_IconButton::make('chat_button');
$button->href(href('Mibbit', 'Chat'));
$icon = '<img src="/GDO/TBS/img/sidebar/menu_chat.gif" />';
$button->rawIcon($icon);
$button->label('link_tbs_chat');
echo $button->render();
