<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php $this->load->view("admin_interface/includes/head");?>
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
			<div class="span9">
				<ul class="breadcrumb">
					<li><a href="<?=site_url(ADMIN_START_PAGE);?>">Панель управления</a> <span class="divider">/</span></li>
					<li class="active">Коллекции</li>
				</ul>
				<div class="clear"></div>
			<div class="inline">
				<?php $this->load->view('html/select-brends');?>
				<?php $this->load->view('html/select-categories');?>
			<?php if($this->input->get('category') !== FALSE && $this->input->get('brend') !== FALSE):?>
				<a href="<?=site_url(ADMIN_START_PAGE.'/collections/add?mode=insert&category='.$this->input->get('category').'&brend='.$this->input->get('brend').'&step=1')?>" class="btn">Добавить коллекцию</a>
			<?php endif;?>
			</div>
			<?php if(!empty($collections)):?>
				<h2>Коллекции</h2>
				<table class="table table-bordered" data-action="<?=site_url(ADMIN_START_PAGE.'/collection/remove');?>">
					<thead>
						<tr>
							<th class="span1">№ п.п.</th>
							<th class="span8">Название</th>
							<th class="span3"></th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($collections);$i++):?>
						<tr>
							<td>
								<?=$collections[$i]['number'];?>
							</td>
							<td>
							<?php if(!empty($collections[$i]['logo'])):?>
								<img class="span2 img-rounded" src="<?=base_url($collections[$i]['logo']);?>" title="">
								<?=$collections[$i]['ru_title'];?>
							<?php else:?>
								<?=$collections[$i]['ru_title'];?>
							<?php endif;?>
							</td>
							<td>
							<?php
								$url = '';
								if($this->input->get('brend') !== FALSE):
									$url .= '&brend='.$this->input->get('brend');
								endif;
								if($this->input->get('category') !== FALSE):
									$url .= '&category='.$this->input->get('category');
								endif;
							?>
								<a href="<?=site_url(ADMIN_START_PAGE.'/collections/edit?mode=text&brend='.$collections[$i]['brend'].'&category='.$collections[$i]['category'].'&id='.$collections[$i]['id'])?>" class="btn btn-link" ><i class="icon-edit"></i></a>
								<button data-item="<?=$collections[$i]['id'];?>" class="btn btn-link remove-item"><i class="icon-remove"></i></button>
							</td>
						</tr>
					<?php endfor;?>
					</tbody>
				</table>
			<?php else:?>
				<div class="msg-alert">Список коллекций пуст</div>
			<?php endif;?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<?php $this->load->view("admin_interface/includes/footer");?>
	<?php $this->load->view("admin_interface/includes/scripts");?>

<script type="text/javascript" src="<?=site_url('js/cabinet/admin.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/cabinet/selects.js');?>"></script>
</body>
</html>