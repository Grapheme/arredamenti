<?=form_open(ADMIN_START_PAGE.'/page/update?mode=update&id='.$this->input->get('id'),array('class'=>'form-manage-page')); ?>
	<div class="control-group">
		<label>Title (RU): </label>
		<input type="text" name="ru_page_title" class="span6" value="<?=$content['ru_page_title'];?>" placeholder="Title (RU)" />
		<label>Description (RU):</label>
		<textarea class="span6" name="ru_page_description" placeholder="Описание (RU)"><?=$content['ru_page_description'];?></textarea>
		<label>Title (EN):</label>
		<input type="text" name="en_page_title" class="span6" value="<?=$content['en_page_title'];?>" placeholder="Title (EN)" />
		<label>Description (EN):</label>
		<textarea class="span6" name="en_page_description" placeholder="Description (EN)"><?=$content['en_page_description'];?></textarea>
		<label>H1 (RU): </label>
		<input type="text" name="ru_page_h1" class="span6" value="<?=$content['ru_page_h1'];?>" placeholder="H1 (RU)" />
		<label>H1 (EN):</label>
		<input type="text" name="en_page_h1" class="span6" value="<?=$content['en_page_h1'];?>" placeholder="H1 (EN)" />
	</div>
	<hr/>
	<div class="control-group">
		<label>Название (RU): <em>(обязательное)</em></label>
		<input type="text" name="ru_title" class="span3 valid-required" value="<?=$content['ru_title'];?>" placeholder="Название (RU)" />
		<label>Название (EN): <em>(обязательное)</em></label>
		<input type="text" name="en_title" class="span3 valid-required" value="<?=$content['en_title'];?>" placeholder="Название (EN)" />
	</div>
	<hr/>
	<div class="control-group">
		<label>Контент (RU):</label>
		<textarea class="redactor" rows="10" name="ru_page_content"><?=$content['ru_page_content'];?></textarea>
		<label>Контент (EN):</label>
		<textarea class="redactor" rows="10" name="en_page_content"><?=$content['en_page_content'];?></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>URL: <em>(обязательное)</em></label>
		<input type="text" name="url" class="span3 valid-required disabled" disabled="disabled" value="<?=$content['url'];?>" placeholder="URL страницы" />
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit btn-success no-clickable btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>