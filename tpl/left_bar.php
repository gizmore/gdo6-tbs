<?php
use GDO\TBS\Module_TBS;
use GDO\TBS\GDT_TBS_Online;
use GDO\User\GDO_User;
use GDO\PM\GDO_PM;
use GDO\Forum\GDO_ForumPost;
use GDO\Forum\GDO_ForumRead;
use GDO\Forum\GDO_ForumThread;

$mod = Module_TBS::instance();
$user = GDO_User::current();
?>
<div id="left_bar">

  <img
   id="tbs_top_left_image"
   alt="logo"
   src="<?=$mod->wwwPath('img/header_1.jpeg')?>" />

  <div class="left_group">
  
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_home.gif')?>" />
      ::[<a href="<?=href('TBS', 'Welcome')?>"><?=t('link_tbs_home')?></a>]
    </div>
    
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_news.gif')?>" />
      ::[<a href="<?=href('News', 'NewsList')?>"><?=t('link_tbs_news')?></a>]
    </div>
    
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_challenge.gif')?>" />
      ::[<a href="<?=href('TBS', 'ChallengeLists')?>"><?=t('link_tbs_challenges')?></a>]
    </div>

    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_ranking.gif')?>" />
      ::[<a href="<?=href('TBS', 'Ranking')?>"><?=t('link_tbs_ranking')?></a>]
    </div>
    
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_account.gif')?>" />
      ::[<a href="<?=href('Account', 'Settings')?>"><?=t('link_tbs_account')?></a>]
    </div>
    
  </div>
  
  <div class="left_group">
  
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_forum.gif')?>" />
      ::[<a href="<?=href('Forum', 'Boards')?>"><?=t('link_tbs_forum')?></a>]
      <?php $count = GDO_ForumRead::countUnread($user); ?>
      <div id="left-unread-forum" class="left-unread-count" <?=$count?'':'style="display:none;"'?>><?=$count?></div>
    </div>

    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_chat.gif')?>" />
      ::[<a href="<?=href('TBS', 'Chat')?>"><?=t('link_tbs_chat')?></a>]
    </div>

    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_pm.gif')?>" />
      ::[<a href="<?=href('PM', 'Overview')?>"><?=t('link_tbs_pm')?></a>]
      <?php $count = GDO_PM::countUnread($user); ?>
      <div id="left-unread-pm" class="left-unread-count" <?=$count?'':'style="display:none;"'?>><?=$count?></div>
    </div>

  </div>
  
  <div class="left_group">

    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_learn.gif')?>" />
      ::[<a href="<?=href('TBS', 'VulnerableCode')?>"><?=t('link_tbs_learn')?></a>]
    </div>
  
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_tutorials.gif')?>" />
      ::[<a href="<?=href('TBS', 'Tutorials')?>"><?=t('link_tbs_tutorials')?></a>]
    </div>
  
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_downloads.gif')?>" />
      ::[<a href="<?=href('TBS', 'Downloads')?>"><?=t('link_tbs_downloads')?></a>]
    </div>
  
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_support.gif')?>" />
      ::[<a href="<?=href('TBS', 'Support')?>"><?=t('link_tbs_support')?></a>]
    </div>
  
  </div>
  
  <div class="left_group">
  
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_links.gif')?>" />
      ::[<a href="<?=href('TBS', 'Links')?>"><?=t('link_tbs_links')?></a>]
    </div>
  
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_contact.gif')?>" />
      ::[<a href="<?=href('Contact', 'Form')?>"><?=t('link_tbs_contact')?></a>]
    </div>
  
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_logout.gif')?>" />
      ::[<a href="<?=href('Login', 'Logout')?>"><?=t('link_tbs_logout')?></a>]
    </div>
  
  </div>
  
  <?php if (GDO_User::current()->isStaff()) : ?>
  <div class="left_group">
    <div class="left_link">
      <img src="<?=$mod->wwwPath('img/sidebar/menu_admin.gif')?>" />
      ::[<a href="<?=href('Admin', 'Modules')?>"><?=t('link_tbs_admin')?></a>]
    </div>
  </div>
  <?php endif; ?>

  <?=GDT_TBS_Online::make('online_users')->render()?>
  
</div>
