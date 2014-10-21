<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php $this->load->view("admin_interface/includes/head");?>
<link rel="stylesheet" href="<?=base_url('css/admin-panel/uploadzone.css');?>" />
</head>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
	<?php $this->load->view("admin_interface/includes/navbar");?>
	<div class="container">
		<div class="row">
			<div class="span3">
				<?php $this->load->view("admin_interface/includes/sidebar");?>
			</div>
			<?php
				$url = '';
				if($this->input->get('brend') !== FALSE):
					$url .= '&brend='.$this->input->get('brend');
				endif;
				if($this->input->get('category') !== FALSE):
					$url .= '&category='.$this->input->get('category');
				endif;
			?>
			<div class="span9">
				<ul class="breadcrumb">
					<li><a href="<?=site_url(ADMIN_START_PAGE);?>">Панель управления</a> <span class="divider">/</span></li>
					<li><a href="<?=site_url(ADMIN_START_PAGE.'/collections?mode=list'.$url);?>">Коллекции</a> <span class="divider">/</span></li>
					<li class="active">Редактирование колекции</li>
				</ul>
				<div class="clear"></div>
			<?php if($this->input->get('mode') === 'text'):?>
				<div class="inline">
					<?php $this->load->view('html/select-brends');?>
					<?php $this->load->view('html/select-categories');?>
				</div>
				<p class="text-info">
					При смене бренда или категории произойдет перенос коллекции.<br/> Если хотя бы один параметр не будет выбран, 
					перенос коллекции не произойдет.
				</p>
			<?php endif;?>
				<div class="clearfix">
					<ul class="nav nav-tabs">
						<li <?=($this->input->get('mode') == 'text')?'class="active"':''?>><a href="<?=site_url(ADMIN_START_PAGE.'/collections/edit?mode=text'.$url.'&id='.$this->input->get('id'));?>">Текстовая информация</a></li>
						<li <?=($this->input->get('mode') == 'image')?'class="active"':''?>><a href="<?=site_url(ADMIN_START_PAGE.'/collections/edit?mode=image'.$url.'&id='.$this->input->get('id'));?>">Изображения</a></li>
						<li <?=($this->input->get('mode') == 'caption')?'class="active"':''?>><a href="<?=site_url(ADMIN_START_PAGE.'/collections/edit?mode=caption'.$url.'&id='.$this->input->get('id'));?>">Подписи</a></li>
					</ul>
				</div>
			<?php if($this->input->get('mode') === 'text'):?>
				<?php $this->load->view('admin_interface/forms/edit-collection');?>
			<?php elseif($this->input->get('mode') === 'image'):?>
				<?php $this->load->view('admin_interface/forms/images-collection');?>
			<?php elseif($this->input->get('mode') === 'caption'):?>
				<?php $this->load->view('admin_interface/forms/images-captions');?>
			<?php endif;?>
				<a class="btn btn-info" href="<?=site_url(ADMIN_START_PAGE.'/collections?mode=list'.$url);?>">Завершить</a>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<?php $this->load->view("admin_interface/includes/footer");?>
	<?php $this->load->view("admin_interface/includes/scripts");?>
<?php if($this->input->get('mode') == 'text'):?>
<script type="text/javascript" src="<?=site_url('js/libs/upload_image.js');?>"></script>
<?php elseif($this->input->get('mode') == 'image'):?>
<script type="text/javascript" src="<?=site_url('js/libs/dropzone.js');?>"></script>
<?php endif;?>
<script type="text/javascript" src="<?=site_url('js/cabinet/selects.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/cabinet/admin.js');?>"></script>
</body>
</html>