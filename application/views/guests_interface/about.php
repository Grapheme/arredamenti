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
				<div class="nav-list-container nav_zero_margin_bottom">
					<?php $this->load->view('guests_interface/includes/menu');?>
				</div>
			</nav>
		</div>
		<div id="main">
			<h1><?=$page[$this->uri->language_string.'_page_h1'];?></h1>
			<div class="about-image"></div>
			<div class="about-company-container js_animate_top">
				<div class="about-company-page-text">
					<?=$contentData[$this->uri->language_string.'_content'];?>
				</div>
			</div>
			<div class="fellow-companies-detailed">
				<ul class="fellow-companies-detailed-list clearfix">
				<?php for($i=0;$i<count($brends);$i++):?>
					<li class="fellow-company-item js_animate_top">
						<div class="delicate-design-stroke"></div>
						<div class="fellow-company-logo">
							<a target="_blank" href="<?=(!empty($brends[$i]['site'])?$brends[$i]['site']:'#');?>">
								<img src="<?=baseURL($brends[$i]['logo']);?>" title="<?=$brends[$i][$this->uri->language_string.'_title'];?>">
							</a>
						</div>
						<div class="fellow-company-description">
							<?=$brends[$i][$this->uri->language_string.'_description'];?>
						</div>
					</li>
				<?php endfor;?>
				</ul>
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