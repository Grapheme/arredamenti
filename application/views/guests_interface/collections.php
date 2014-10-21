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
		<div id="main" class="catalog-item-list-container clearfix">
			<ul class="subcatalog-item-list">
			<?php for($i=0;$i<count($brends);$i++):?>
				<li class="subcatalog-item-list-item">
					<div class="subcatalog-item-header">
						<?=lang('localize_brends');?>: <h2 class="subcatalog-header-facname"><?=strtoupper($brends[$i][$this->uri->language_string.'_title']);?></h2>
						<?=count($brends[$i]['collections']).' '.pluralCollection(count($brends[$i]['collections']),$this->uri->language_string);?>
					</div>
					<ul id="fit_container" class="subcatalog-facgoods clearfix">
					<?php for($j=0;$j<count($brends[$i]['collections']);$j++):?>
						<li class="subcatalog-facgoods-item fit_item js_animate_left">
							<div class="subcatalog-item-body">
								<img src="<?=baseURL($brends[$i]['collections'][$j]['logo']);?>">
								<div class="subcatalog-item-caption">
									<a href="<?=site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$brends[$i]['collections'][$j]['url']);?>">
										<h3 class="subcatalog-item-name"><?=$brends[$i]['collections'][$j][$this->uri->language_string.'_title'];?></h3>
									</a>
								</div>
							</div>
						</li>
					<?php endfor;?>
					</ul>
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