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
					<li class="active">Новости</li>
				</ul>
				<div class="clear"></div>
				<div class="inline">
					<a href="<?=site_url(ADMIN_START_PAGE.'/news/add')?>" class="btn">Добавить новость</a>
				</div>
			<?php if(!empty($news)):?>
				<h2>Новости</h2>
				<table class="table table-bordered" data-action="<?=site_url(ADMIN_START_PAGE.'/news/remove');?>">
					<thead>
						<tr>
							<th class="span9">Заголовок</th>
							<th class="span2"></th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($news);$i++):?>
						<tr>
							<td>
							<?php if(!empty($news[$i]['image'])):?>
								<!--<img class="img-rounded" src="<?=base_url($news[$i]['image']);?>" style="height:50px" title="">-->

<div style="display:inline-block; float:left; height:50px; width:75px; background-image:url(<?=base_url($news[$i]['image'])?>); background-repeat:no-repeat; background-size: cover; background-color: #fff; background-position: 50% 50%; border: 1px solid #ccc; overflow:hidden; margin-right:7px" class="img-rounded destination-photo"></div>

							<?php endif;?>
<?
    if ($news[$i]['ru_title2']) {
        if ($news[$i]['ru_title']) {
        	echo "<b>" . mb_strtoupper($news[$i]['ru_title']) . "</b><br/>";
        }
    	echo "{$news[$i]['ru_title2']}";
	} elseif ($news[$i]['en_title2']) {
        if ($news[$i]['en_title']) {
        	echo "<b>" . mb_strtoupper($news[$i]['en_title']) . "</b><br/>";
        }
    	echo "{$news[$i]['en_title2']}";
	} else {		echo " = нет заголовка = ";
	}

?>
							</td>
							<td>
								<a href="<?=site_url(ADMIN_START_PAGE.'/news/edit?mode=text&id='.$news[$i]['id'])?>" class="btn btn-link" ><i class="icon-edit"></i></a>
								<button data-item="<?=$news[$i]['id'];?>" class="btn btn-link remove-item"><i class="icon-remove"></i></button>
							</td>
						</tr>
					<?php endfor;?>
					</tbody>
				</table>
			<?php else:?>
				<div class="msg-alert">Пока нет никаких новостей</div>
			<?php endif;?>
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<?php $this->load->view("admin_interface/includes/footer");?>
	<?php $this->load->view("admin_interface/includes/scripts");?>

<script type="text/javascript" src="<?=site_url('js/cabinet/admin.js');?>"></script>
</body>
</html>