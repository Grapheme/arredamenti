<?php
	$url = '';
	if($this->input->get('brend') !== FALSE):
		$url .= '&brend='.$this->input->get('brend');
	endif;
	if($this->input->get('category') !== FALSE):
		$url .= '&category='.$this->input->get('category');
	endif;
?>
<div class="well sidebar-nav">
	<ul class="nav nav-list">
		<li class="nav-header">Разделы</li>
		<li><a href="<?=site_url(ADMIN_START_PAGE.'/pages?mode=list');?>">Страницы</a></li>
		<li><a href="<?=site_url(ADMIN_START_PAGE.'/brends?mode=list');?>">Бренды</a></li>
		<li><a href="<?=site_url(ADMIN_START_PAGE.'/factory?mode=list');?>">Фабрики</a></li>
		<li><a href="<?=site_url(ADMIN_START_PAGE.'/categories?mode=list');?>">Категории</a></li>
		<li><a href="<?=site_url(ADMIN_START_PAGE.'/collections?mode=list'.$url);?>">Коллекции</a></li>
		<li><a href="<?=site_url(ADMIN_START_PAGE.'/news?mode=list'.$url);?>">Новости</a></li>
	</ul>
</div>