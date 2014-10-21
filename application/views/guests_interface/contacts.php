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
			<div class="contact-container clearfix">
				<div class="contact-block js_top_no_delay">
					<div id="map-canvas"></div>
				</div>
				<div class="contact-get-in-touch js_animate_left">
					<div class="contact-block-container">
						<span class="contact-get-in-touch-header"><?=lang('localize_address');?></span>
						<address><?=$contentData[$this->uri->language_string.'_address'];?></address>
					</div>
					<div class="contact-block-container">
						<span class="contact-get-in-touch-header"><?=lang('localize_phones');?></span>
						<address><?=$contentData[$this->uri->language_string.'_phones'];?></address>
					</div>
					<div class="contact-block-container">
						<span class="contact-get-in-touch-header"><?=lang('localize_mode_work');?></span>
						<p><?=$contentData[$this->uri->language_string.'_mode_work'];?></p>
					</div>
					<div class="contact-block-container">
						<span class="contact-get-in-touch-header"><?=lang('localize_email');?></span>
						<address><?=safe_mailto($contentData[$this->uri->language_string.'_email'],$contentData[$this->uri->language_string.'_email']);?></address>
					</div>
				</div>
				<div class="contact-us-block js_animate_right">
					<?php $this->load->view('guests_interface/forms/contact');?>
				</div>
				<div class="contact-enter-photo js_top_no_delay"></div>
			</div>
		</div>
	</div>
	<?php $this->load->view('guests_interface/includes/footer');?>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	<script type="text/javascript" src="<?=baseURL('js/vendor/jquery.form.js');?>"></script>
	<script type="text/javascript" src="<?=baseURL('js/libs/localize.js');?>"></script>
	<script type="text/javascript" src="<?=baseURL('js/libs/base.js');?>"></script>
	<script type="text/javascript" src="<?=baseURL('js/cabinet/guest.js');?>"></script>
	<script src="<?=baseURL('js/main.js');?>"></script>
	<?php $this->load->view('guests_interface/includes/google-map');?>
	<?php $this->load->view('guests_interface/includes/google-analytics');?>
	<?php $this->load->view('guests_interface/includes/metrika');?>
</body>
</html>