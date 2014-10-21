<?=form_open(ADMIN_START_PAGE.'/brend/update?mode=update&id='.$this->input->get('id'),array('class'=>'form-manage-brend')); ?>
	<div class="control-group">
		<label>Название (RU): <em>(обязательное)</em></label>
		<input type="text" name="ru_title" class="span3 valid-required" value="<?=$brend['ru_title'];?>" placeholder="Название (RU)" />
		<label>Описание (RU): <em>(обязательное)</em></label>
		<textarea class="span6 valid-required" name="ru_description" placeholder="Описание (RU)"><?=$brend['ru_description'];?></textarea>
		<label>Название (EN): <em>(обязательное)</em></label>
		<input type="text" name="en_title" class="span3 valid-required" value="<?=$brend['en_title'];?>" placeholder="Название (EN)" />
		<label>Описание (EN): <em>(обязательное)</em></label>
		<textarea class="span6 valid-required" name="en_description" placeholder="Описание (EN)"><?=$brend['en_description'];?></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>URL: <em>(обязательное)</em></label>
		<input type="text" name="url" class="span3 valid-required" value="<?=$brend['url'];?>" placeholder="URL фабрики" />
		<label>Ссылка на сайт</label>
		<input type="text" name="site" class="span6" value="<?=$brend['site'];?>" placeholder="URL на сайт бренда" />
	</div>
	<div class="control-group">
		<label>Отображение:</label>
		<select name="position" class="span3">
		<?php foreach($this->brendPosition as $key => $value):?>
			<option value="<?=$key;?>" <?=($brend['position'] == $key)?'selected="selected"':'';?>><?=$value;?></option>
		<?php endforeach;?>
		</select>
	</div>
	<div class="controls">
		<label>Логотип:</label>
		<?php if(!empty($brend['logo'])):?>
			<div class="clearfix">
				<img class="img-rounded destination-photo" src="<?=base_url($brend['logo']);?>" title="">
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
		<a class="btn btn-info" href="<?=site_url(ADMIN_START_PAGE.'/brends?mode=list');?>">Завершить</a>
	</div>
<?= form_close(); ?>