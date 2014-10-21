<?php
	$categoriesList = array($pages['catalog-mebeli']['url'],$pages['magazin-italianskoi-mebeli']['url'],$pages['partnership']['url'],$pages['factories']['url'],$pages['contacts']['url']);
	if(($activeListItem = array_search($this->uri->segment(1),$categoriesList)) === FALSE):
		$activeListItem = -1;
	endif;
?>
<ul class="nav-list clearfix">
	<li class="nav-list-item small-item<?=($activeListItem == 0)?' active-list-item':'';?>">
		<a href="<?=site_url($pages['catalog-mebeli']['url']);?>"><?=$pages['catalog-mebeli'][$this->uri->language_string.'_title']?></a>
	</li>
	<li class="nav-list-item <?=($activeListItem == 1)?' active-list-item':'';?>">
		<a href="<?=site_url($pages['magazin-italianskoi-mebeli']['url']);?>"><?=$pages['magazin-italianskoi-mebeli'][$this->uri->language_string.'_title']?></a>
	</li>
	<li class="nav-list-item <?=($activeListItem == 2)?' active-list-item':'';?>">
		<a href="<?=site_url($pages['partnership']['url']);?>"><?=$pages['partnership'][$this->uri->language_string.'_title']?></a>
	</li>
	<li class="nav-list-item nav-fabrics-item <?=($activeListItem == 3)?' active-list-item':'';?>">
		<a href="<?=site_url($pages['factories']['url']);?>"><?=$pages['factories'][$this->uri->language_string.'_title']?></a>
	</li>
	<li class="nav-list-item contact-item <?=($activeListItem == 4)?' active-list-item':'';?>">
		<a href="<?=site_url($pages['contacts']['url']);?>"><?=$pages['contacts'][$this->uri->language_string.'_title']?></a>
	</li>
</ul>