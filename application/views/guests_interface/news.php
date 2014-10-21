<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
	<link rel="stylesheet" href="<?=baseURL('js/vendor/fotorama_new.css');?>" />
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
			<div class="catalog_seo">
				<h1><?=$news[$lang."_title2"]?></h1>
				<div class="fotorama news-fotorama" data-width="100%" data-fit="cover" data-minHeight="300px" data-swipe="false" data-maxheight="450px">
<? foreach ($news_imgs as $img) { ?>
					<img src="<?=$img?>" alt="">
<? } ?>
<?/*?>
					<img src="http://arredamenti.su/img/fotorama/4.jpg" alt="">
					<img src="http://arredamenti.su/img/fotorama/3.jpg" alt="">
<?*/?>
				</div>
				<div>
	  				<?=$news[$lang.'_full']?>
				</div>

<?/*?>
				<div class="partnership-colums-container clearfix">
					<div class="partnership-column left_column js_animate_right" style="position: relative; opacity: 1; right: 0px;">
						<h2 class="dealers-column-header">Создать уютный и неповторимый дизайн с помощью мебели от салона «Arredamenti»</h2>
						<div class="dealers-column-text">
							<p>В каталоге сайта вы найдете полностью укомплектованные гарнитуры для детской комнаты, кабинета, офиса или кухни. Но мы также поставляем не входящие в гарнитур предметы мебели. Из них вы самостоятельно можете скомпоновать комплект итальянской мебели на свой вкус под конкретный интерьер. Мебель от известнейших брендов Италии поможет создать уютный и неповторимый дизайн любого помещения как в жилом доме, так и в офисе. Стильная мебель для офиса и для дома – это итальянская мебель из салона «Arredamenti» в Ростове-на-Дону. Качество, надежность, износостойкость, стильность, элегантность, изысканность и функциональность – вот основные качества итальянской мебели, привлекающие внимание многих наших клиентов.</p>					</div>
					</div>
					<div class="partnership-column right_column js_animate_left" style="position: relative; opacity: 1; left: 0px;">
						<h3 class="dealers-column-header">Мебель от известнейших брендов Италии</h3>
						<div class="dealers-column-text">
							<p> Коллекции мебели для офиса «Frezza» придадут вашему бизнесу дополнительный имидж, внушающий доверие потенциальным партнерам и клиентам. Лучшие кухонные гарнитуры от «Doimo Cucine» доставят удовольствие любой, самой придирчивой и капризной хозяйке. Они отличаются идеальным функционалом, деланы из натуральных материалов, стильные и уютные. Мир высокой мебельной моды в нашем салоне представлен модельным рядом «Casamania» – воплощением самых смелых фантазий, вызывающих разнообразную гамму эмоций и чувств. Итальянская мебель для любых заведений: от библиотек и баров, до холлов бизнес-центров и элитных гостиных – это «EdContract». Более сотни знаменитых брендов итальянской мебели представлены в нашем салоне: на любую финансовую возможность и вкус.</p>					</div>
					</div>
				</div>
<?*/?>
			</div>
		</div>
	</div>
	<?php $this->load->view('guests_interface/includes/footer');?>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	<?php $this->load->view('guests_interface/includes/google-analytics');?>
	<script src="<?=baseURL('js/vendor/fotorama_new.js');?>"></script>
	<script src="<?=baseURL('js/main.js');?>"></script>
	<?php $this->load->view('guests_interface/includes/metrika');?>
</body>
</html>