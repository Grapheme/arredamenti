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
			<div class="partnership-colums-container clearfix">
				<div class="partnership-column left_column js_animate_right">
					<h2 class="dealers-column-header">
						<?=$contentData[$this->uri->language_string.'_title_dillers'];?>
					</h2>
					<div class="delicate-design-stroke"></div>
					<div class="dealers-column-text">
						<?=$contentData[$this->uri->language_string.'_description_dillers'];?>
					</div>
				</div>
				<div class="partnership-column right_column js_animate_left">
					<h2 class="dealers-column-header">
						<?=$contentData[$this->uri->language_string.'_title_designers'];?>
					</h2>
					<div class="delicate-design-stroke"></div>
					<div class="dealers-column-text">
						<?=$contentData[$this->uri->language_string.'_description_designers'];?>
					</div>
				</div>
			</div>	
			<div class="contacts-for-partnership js_animate_top">
				<?=$contentData[$this->uri->language_string.'_contacts'];?>
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