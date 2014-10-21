<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
	<link rel="stylesheet" href="<?=baseURL('css/isotope.css');?>">
	<noscript><link rel="stylesheet" href="<?=baseURL('css/noJS.css');?>"/></noscript>
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
				<div class="nav-list-container nav_zero_margin_bottom">
					<?php $this->load->view('guests_interface/includes/menu');?>
				</div>
			</nav>
		</div>
		<div id="main" class="fabrics">
			<h1><?=$page[$this->uri->language_string.'_page_h1'];?></h1>
			<div class="fabrics-head clearfix">
				<div class="fabrics-left">
					<span class="fabrics-count">102</span>
					<?=lang('brands_fabric_count');?>
				</div>
				<div class="fabrics-right">
					<?=lang('brands_fabric_text');?>
				</div>
			</div>
			<div class="catalog_seo hidden">
				<?=$contentData[$this->uri->language_string.'_content'];?>
			</div>
			<div class="fabrics-body">
				<ul class="fabrics-list">
				<?php for($i=0;$i<count($factories);$i++):?>
					<li class="fabrics-item fit_item">
						<div class="fabric-container" style="background-image: url(<?=baseURL($factories[$i]['logo'])?>);">
							<div class="fabric-caption">
								<span>
									<?=$factories[$i][$this->uri->language_string.'_description'];?>
								</span>
							<?php if(!empty($factories[$i]['site'])):?>
								<div>
									<a class="fabric-link" target="_blank" title="<?=$factories[$i][$this->uri->language_string.'_title'];?>" href="<?=$factories[$i]['site'];?>"><?=$factories[$i]['site'];?></a>
								</div>
							<?php endif;?>
							</div>
						</div>
					</li>
				<?php endfor;?>
				</ul>
			</div>
		</div>
		<div class="preloader">
			<img src="<?=baseURL('img/loading.gif');?>">
		</div>
	</div>
	<?php $this->load->view('guests_interface/includes/footer');?>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	<?php $this->load->view('guests_interface/includes/google-analytics');?>
	<script src="<?=baseURL('js/main.js');?>"></script>
	<?php $this->load->view('guests_interface/includes/metrika');?>
	<script src="<?=baseURL('js/vendor/jquery.isotope.min.js');?>"></script>
	<script src="<?=baseURL('js/cabinet/fabrics-isotope.js');?>"></script>
	
</body>
</html>