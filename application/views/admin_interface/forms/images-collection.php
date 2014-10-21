<ul class="resources-items clearfix" data-action="<?=site_url(ADMIN_START_PAGE.'/collection/remove/resource');?>">
<?php for($i=0;$i<count($images);$i++):?>
	<li class="span2">
		<img class="img-rounded" src="<?=site_url($images[$i]['thumbnail'])?>" alt="">
		<a href="" data-resource-id="<?=$images[$i]['id']?>" class="no-clickable delete-resource-item">&times;</a>
	</li>
<?php endfor;?>
</ul>
<label>Размер:</label>
<select name="percent" autocomplete="off" class="span1 set-image-collection-size">
	<option value="340">25%</option>
	<option value="680">50%</option>
	<option value="1020">75%</option>
</select>
<?=$this->load->view('html/zone-upload-file',array('action'=>site_url(ADMIN_START_PAGE.'/collection/upload/resource?id='.$this->input->get('id').'&size=340')));?>