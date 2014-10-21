<?=form_open(ADMIN_START_PAGE.'/category/update?mode=update&id='.$this->input->get('id'),array('class'=>'form-manage-category')); ?>
	<div class="control-group">
		<label>Title (RU): </label>
		<input type="text" name="ru_page_title" class="span6" value="<?=$category['ru_page_title'];?>" placeholder="Title (RU)" />
		<label>Description (RU):</label>
		<textarea class="span6" name="ru_page_description" placeholder="Описание (RU)"><?=$category['ru_page_description'];?></textarea>
		<label>Title (EN):</label>
		<input type="text" name="en_page_title" class="span6" value="<?=$category['en_page_title'];?>" placeholder="Title (EN)" />
		<label>Description (EN):</label>
		<textarea class="span6" name="en_page_description" placeholder="Description (EN)"><?=$category['en_page_description'];?></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>Название (RU): <em>(обязательное)</em></label>
		<input type="text" name="ru_title" class="span3 valid-required" value="<?=$category['ru_title'];?>" placeholder="Название (RU)" />
		<label>Описание (RU):</label>
		<textarea class="span6" name="ru_description" placeholder="Описание (RU)"><?=$category['ru_description'];?></textarea>
		<label>Название (EN): <em>(обязательное)</em></label>
		<input type="text" name="en_title" class="span3 valid-required" value="<?=$category['en_title'];?>" placeholder="Название (EN)" />
		<label>Описание (EN):</label>
		<textarea class="span6" name="en_description" placeholder="Описание (EN)"><?=$category['en_description'];?></textarea>
		<label>H1 (RU): </label>
		<input type="text" name="ru_page_h1" class="span6" value="<?=$category['ru_page_h1'];?>" placeholder="H1 (RU)" />
		<label>H1 (EN):</label>
		<input type="text" name="en_page_h1" class="span6" value="<?=$category['en_page_h1'];?>" placeholder="H1 (EN)" />
	</div>
	<hr/>
	<div class="control-group">
		<label>Контент (RU):</label>
		<textarea class="redactor" rows="10" name="ru_page_content"><?=$category['ru_page_content'];?></textarea>
		<label>Контент (EN):</label>
		<textarea class="redactor" rows="10" name="en_page_content"><?=$category['en_page_content'];?></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>URL: <em>(обязательное)</em></label>
		<input type="text" name="url" class="span3 valid-required" value="<?=$category['url'];?>" placeholder="URL категории" />
		<label>Порядковый номер: <em>(обязательное)</em></label>
		<input type="text" name="number" class="span3 valid-required" value="<?=$category['number'];?>" />
	</div>
	<div class="controls">
		<label>Логотип:</label>
		<?php if(!empty($category['logo'])):?>
			<div class="clearfix">
				<img class="span2 img-rounded destination-photo" src="<?=base_url($category['logo']);?>" title="">
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
		<a class="btn btn-info" href="<?=site_url(ADMIN_START_PAGE.'/categories?mode=list');?>">Завершить</a>
	</div>
<?= form_close(); ?>