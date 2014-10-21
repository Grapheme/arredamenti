<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
</head>
	<body>
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<?php $this->load->view('guests_interface/includes/small-menu') ?>
	<div class="wrapper">
		<?php $this->load->view('guests_interface/includes/languages');?>
		<?php $this->load->view('guests_interface/includes/social');?>
		<?php $this->load->view('guests_interface/includes/small-menu-button');?>
		<div class="guest_header">
			<?php $this->load->view('guests_interface/includes/header');?>
			<nav>
				<div class="nav-list-container">
					<?php $this->load->view('guests_interface/includes/menu');?>
				</div>
				<?php $this->load->view('guests_interface/includes/categories');?>
			</nav>
		</div>
		<div id="main" class="catalog-item-list-container">
			<ul class="catalog-item-list clearfix">
		<?php for($i=0;$i<count($categories);$i++):?>
			<li class="catalog-item<?=($i%2 == 0)?' left js_animate_right':' right js_animate_left';?>">
				<div class="catalog-item-body">
					<img src="<?=baseURL($categories[$i]['logo']);?>">
					<div class="catalog-item-caption">
						<a href="<?=site_url($this->uri->segment(1).'/'.$categories[$i]['url']);?>">
							<h2 class="catalog-item-name">
								<?=$categories[$i][$this->uri->language_string.'_title']?>
							</h2>
							<span class="catalog-item-fabrics">
								<?=($categories[$i]['collections'])?$categories[$i]['collections'].' '.pluralCollection($categories[$i]['collections'],$this->uri->language_string):'Коллекции отсутствуют';?>
							</span>
						</a>
					</div>
				</div>
			</li>
		<?php endfor;?>
			</ul>
			<div class="catalog_seo">
				<h1><?=$page[$this->uri->language_string.'_page_h1'];?></h1>
				<?=$page[$this->uri->language_string.'_page_content'];?>
			</div>
		</div>
	</div>
	<?php $this->load->view('guests_interface/includes/footer');?>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	<?php $this->load->view('guests_interface/includes/google-analytics');?>
	<script src="<?=baseURL('js/main.js');?>"></script>
	<?php $this->load->view('guests_interface/includes/metrika');?>
</body>
</html>