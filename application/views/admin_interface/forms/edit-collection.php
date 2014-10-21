<?=form_open(ADMIN_START_PAGE.'/collection/update?id='.$this->input->get('id'),array('class'=>'form-manage-collection')); ?>
<?php if($this->input->get('brend') !== FALSE && $this->input->get('category') !== FALSE):?>
	<input type="hidden" value="<?=($this->input->get('brend') === FALSE)?$collection['brend']:$this->input->get('brend');?>" name="brend"/>
	<input type="hidden" value="<?=($this->input->get('category') === FALSE)?$collection['category']:$this->input->get('category');?>" name="category"/>
<?php else:?>
	<input type="hidden" value="<?=$collection['brend'];?>" name="brend"/>
	<input type="hidden" value="<?=$collection['category'];?>" name="category"/>
<?php endif;?>
	<div class="control-group">
		<label>Title (RU): </label>
		<input type="text" name="ru_page_title" class="span6" value="<?=$collection['ru_page_title'];?>" placeholder="Title (RU)" />
		<label>Description (RU):</label>
		<textarea class="span6" name="ru_page_description" placeholder="Описание (RU)"><?=$collection['ru_page_description'];?></textarea>
		<label>Title (EN):</label>
		<input type="text" name="en_page_title" class="span6" value="<?=$collection['en_page_title'];?>" placeholder="Title (EN)" />
		<label>Description (EN):</label>
		<textarea class="span6" name="en_page_description" placeholder="Description (EN)"><?=$collection['en_page_description'];?></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>Название (RU): <em>(обязательное)</em></label>
		<input type="text" name="ru_title" class="span6 valid-required" value="<?=$collection['ru_title'];?>" placeholder="Название (RU)" />
		<label>Описание (RU):</label>
		<textarea class="span6" name="ru_description" placeholder="Описание (RU)"><?=$collection['ru_description'];?></textarea>
		<label>Название (EN): <em>(обязательное)</em></label>
		<input type="text" name="en_title" class="span6 valid-required" value="<?=$collection['en_title'];?>" placeholder="Название (EN)" />
		<label>Описание (EN):</label>
		<textarea class="span6" name="en_description" placeholder="Описание (EN)"><?=$collection['en_description'];?></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>URL: <em>(обязательное)</em></label>
		<input type="text" name="url" class="span6 valid-required" value="<?=$collection['url'];?>" placeholder="На латинице, без пробелов и больших букв" />
		<label>№ п.п.: <em>(обязательное, для порядка отображения)</em></label>
		<input type="text" name="number" class="span2 valid-required valid-numeric" value="<?=$collection['number'];?>" placeholder="Целое число" />
	</div>
	<?php if(!empty($collection['logo'])):?>
	<div class="controls clearfix">
		<img class="span2 destination-photo img-polaroid" src="<?=site_url($collection['logo']);?>" />
	</div>
	<?php endif;?>
	<div class="controls">
		<label>Изображение:</label>
		<input type="file" autocomplete="off" name="file" size="52">
		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
		<div id="div-upload-photo" class="bar-file-upload hidden">
			<div class="progress progress-info progress-striped active">
				<div class="bar" style="width: 0%"></div>
			</div>
		</div>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-success btn-submit btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>