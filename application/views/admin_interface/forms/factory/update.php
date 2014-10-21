<?=form_open(ADMIN_START_PAGE.'/factory/update?mode=update&id='.$this->input->get('id'),array('class'=>'form-manage-brend')); ?>
	<div class="control-group">
		<label>Название (RU): <em>(обязательное)</em></label>
		<input type="text" name="ru_title" class="span3 valid-required" value="<?=$factory['ru_title'];?>" placeholder="Название (RU)" />
		<label>Описание (RU): <em>(обязательное)</em></label>
		<textarea class="span6" name="ru_description" placeholder="Описание (RU)"><?=$factory['ru_description'];?></textarea>
		<label>Название (EN): <em>(обязательное)</em></label>
		<input type="text" name="en_title" class="span3 valid-required" value="<?=$factory['en_title'];?>" placeholder="Название (EN)" />
		<label>Описание (EN): <em>(обязательное)</em></label>
		<textarea class="span6" name="en_description" placeholder="Описание (EN)"><?=$factory['en_description'];?></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>Ссылка на сайт</label>
		<input type="text" name="site" class="span6" value="<?=$factory['site'];?>" placeholder="URL на сайт бренда" />
	</div>
	<div class="control-group">
		<label>Порядок:</label>
		<input type="text" name="sort" class="span6 valid-required" value="<?=$factory['sort'];?>" />
	</div>
	<div class="controls">
		<label>Логотип:</label>
		<?php if(!empty($factory['logo'])):?>
			<div class="clearfix">
				<img class="img-rounded destination-photo" src="<?=base_url($factory['logo']);?>" title="">
			</div>
		<?php endif;?>
		<input type="file" autocomplete="off" name="file" size="52">
		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
		<div id="div-upload-photo" class="bar-file-upload hidden">
			<div class="progress progress-info progress-striped active">
				<div class="bar" style="width: 0%"></div>
			</div>
		</div>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit btn-success no-clickable btn-loading">Сохранить</button>
		<a class="btn btn-info" href="<?=site_url(ADMIN_START_PAGE.'/factory?mode=list');?>">Завершить</a>
	</div>
<?= form_close(); ?>