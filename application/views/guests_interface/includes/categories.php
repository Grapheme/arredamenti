<div class="nav-sublist-container">
	<ul class="nav-sublist clearfix">
		<?php for($i=0;$i<count($categories);$i++):?>
			<li class="nav-sublist-item<?=($this->uri->segment(2) == $categories[$i]['url'])?' active-list-item':''?>">
				<a class="<?=($categories[$i]['url'] == 'sale')?'sale-list-item': '';?>" href="<?=site_url('catalog-mebeli/'.$categories[$i]['url']);?>"><?=$categories[$i][$this->uri->language_string.'_title']?></a>
			</li>
		<?php endfor;?>
	</ul>
</div>