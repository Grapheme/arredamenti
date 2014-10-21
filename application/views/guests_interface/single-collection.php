<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
	<link rel="stylesheet" href="<?=baseURL('css/isotope.css');?>">
	<link rel="stylesheet" href="<?=baseURL('css/jquery.fancybox.css');?>">
</head>
	<body>
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<div class="popup">
		<a href="<?=site_url($this->uri->segment(1).'/'.$this->uri->segment(2));?>" id="cross-button"></a>
		<div class="popup-header">
			<span class="popup-header-firm"><?=$collection[$this->uri->language_string.'_title']?></span>
			<span class="popup-header-firm-description"><?=$collection[$this->uri->language_string.'_description']?></span>
		</div>
		<ul id="fit_popup_container" class="popup-image-list">
		<?php for($i=0;$i<count($images);$i++):?>
			<li class="popup-image-list-item fit_item">
				<div class="popup-item-shadow">
					<a class="fancybox" rel="group" href="<?=baseURL($images[$i]['resource']);?>" data-title-id="title-<?=$i+1;?>"> </a>
				</div>
				<img data-grid="<?=$images[$i]['grid'];?>" src="<?=baseURL($images[$i]['thumbnail']);?>" alt="<?=$images[$i][$this->uri->language_string.'_caption'];?>">
				<div id="title-<?=$i+1?>" class="hidden">
				<?php if(!empty($images[$i][$this->uri->language_string.'_caption'])):?>
					<div class="fancybox-title-fabric"><span class="caps"><?=$images[$i][$this->uri->language_string.'_caption'];?></span></div>
				<?php endif;?>
				</div>
			</li>
		<?php endfor;?>
		</ul>
		<div class="preloader">
			<img src="<?=baseURL('img/loading.gif');?>">
		</div>
	</div>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	<script type="text/javascript" src="<?=baseURL('js/vendor/jquery.fancybox.pack.js');?>"></script>
	<script type="text/javascript" src="<?=baseURL('js/cabinet/fancybox-config.js');?>"></script>
	<script type="text/javascript" src="<?=baseURL('js/vendor/jquery.isotope.min.js');?>"></script>
	<script type="text/javascript" src="<?=baseURL('js/cabinet/isotope-config.js');?>"></script>
	<?php $this->load->view('guests_interface/includes/google-analytics');?>
	<?php $this->load->view('guests_interface/includes/metrika');?>
</body>
</html>