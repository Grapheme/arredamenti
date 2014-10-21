<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
	<link rel="stylesheet" href="<?=baseURL('css/fotorama.css');?>" />
	<style>
		#jivo-chat {
			bottom: 160px !important;
		}
	</style>
</head>
	<body class="index-body">
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<?php $this->load->view('guests_interface/includes/small-menu') ?>
	<div class="index-wrapper">
		<div class="__fotorama">
			<div class="applead__item applead__item_1">
				<img alt="" src="http://arredamenti.su/img/akcii.jpg">
			</div>
		<?php for($i=0;$i<count($images);$i++):?>
			<div class="applead__item applead__item_<?=($i%2 == 0)? '1': '2';?>">
				<!--<h2>
					<a href="<?=base_url('catalog/sale/arredamenti-sale')?>" style="text-decoration: none; color: <?=($i == 3 || $i == 1 || $i == 0)? '#000;': '#fff';?>">
						<?=($i%2 == 0)? lang('banner1'): lang('banner2');?>
					</a>
				</h2>-->
				<img alt="" src="<?=baseURL($images[$i]['resource']);?>">
			</div>
		<?php endfor;?>
		</div>
		<?php $this->load->view('guests_interface/includes/languages');?>
		<?php $this->load->view('guests_interface/includes/social');?>
		<?php $this->load->view('guests_interface/includes/small-menu-button');?>
		<div class="_header">
			<?php $this->load->view('guests_interface/includes/header');?>
			<nav>
				<?php $this->load->view('guests_interface/includes/menu');?>
			</nav>
		</div>

<? #echo "<!--" . print_r($lastnews, 1) . "-->"; ?>

<? if(@count($lastnews)) { ?>
		<div class="news-arrow news-ar-left"></div>
		<div class="news-arrow news-ar-right"></div>
		<section class="news-block">
			<div class="news-block-help"></div>
<? foreach ($lastnews as $n => $news) { ?>
			<div class="news-item">
				<a href="<?=base_url('news/'.$news['url'])?>" class="news-img" style="background-image: url(/<?=$news['image']?>)"></a>
				<div class="news-info">
					<div class="news-type">
						<?=$news[$lang.'_title']?>
					</div>
					<a href="<?=base_url('news/'.$news['url'])?>" class="news-title">
						<?=$news[$lang.'_title2']?>
					</a>
					<div class="news-text">
						<?=$news[$lang.'_short']?>
					</div>
				</div>
			</div>
<? } ?>
		</section>
<? } ?>
<?/*?>
			<div class="news-item">
				<a href="#" class="news-img" style="background-image: url(http://arredamenti.su/img/fotorama/4.jpg)">&nbsp;</a>
				<div class="news-info">
					<div class="news-type">
						Скидки
					</div>
					<a href="#" class="news-title">
						Чудесные открытия из Италии
					</a>
					<div class="news-text">
						Скидака 105% на мебель, и все остальное. Приходите и уходите. Спецпердложение
					</div>
				</div>
			</div>
			<div class="news-item">
				<a href="#" class="news-img" style="background-image: url(http://arredamenti.su/img/fotorama/4.jpg)">&nbsp;</a>
				<div class="news-info">
					<div class="news-type">
						Скидки
					</div>
					<a href="#" class="news-title">
						Чудесные открытия из Италии
					</a>
					<div class="news-text">
						Скидака 105% на мебель, и все остальное. Приходите и уходите. Спецпердложение
					</div>
				</div>
			</div>
			<div class="news-item">
				<a href="#" class="news-img" style="background-image: url(http://arredamenti.su/img/fotorama/4.jpg)">&nbsp;</a>
				<div class="news-info">
					<div class="news-type">
						Скидки
					</div>
					<a href="#" class="news-title">
						Чудесные открытия из Италии
					</a>
					<div class="news-text">
						Скидака 105% на мебель, и все остальное. Приходите и уходите. Спецпердложение
					</div>
				</div>
			</div>
			<div class="news-item">
				<a href="#" class="news-img" style="background-image: url(http://arredamenti.su/img/fotorama/4.jpg)">&nbsp;</a>
				<div class="news-info">
					<div class="news-type">
						Скидки
					</div>
					<a href="#" class="news-title">
						Чудесные открытия из Италии
					</a>
					<div class="news-text">
						Скидака 105% на мебель, и все остальное. Приходите и уходите. Спецпердложение
					</div>
				</div>
			</div>
			<div class="news-item">
				<div class="news-img" style="background-image: url(http://arredamenti.su/img/fotorama/4.jpg);">&nbsp;</div>
				<div class="news-info">
					<div class="news-type">
						Скидки
					</div>
					<a href="#" class="news-title">
						Чудесные открытия из Италии
					</a>
					<div class="news-text">
						Скидака 105% на мебель, и все остальное. Приходите и уходите. Спецпердложение
					</div>
				</div>
			</div>
<?*/?>
	</div>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	<script src="<?=baseURL('js/vendor/fotorama.js');?>"></script>
	<script src="<?=baseURL('js/cabinet/fotorama-config.js');?>"></script>
	<script src="<?=baseURL('js/main.js');?>"></script>
	<?php $this->load->view('guests_interface/includes/google-analytics');?>
	<?php $this->load->view('guests_interface/includes/metrika');?>
</body>
</html>