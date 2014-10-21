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
		<input type="text" name="ru_page_h1" class="span6" value="" placeholder="H1 (RU)" />
		<label>H1 (EN):</label>
		<input type="text" name="en_page_h1" class="span6" value="" placeholder="H1 (EN)" />
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
		<label>URL: <em>(обязательное)</em></label>
		<input type="text" name="url" class="span3 valid-required disabled" disabled="disabled" value="<?=$content['url'];?>" placeholder="URL страницы" />
	</div>
	<hr/>
		
		<label>Дилерам (RU):</label>
		<input type="text" name="content[ru_title_dillers]" class="span3" value="<?=(isset($contentData['ru_title_dillers']))?$contentData['ru_title_dillers']:'';?>" placeholder="Название (RU)" />
		<textarea class="span9" rows="6" name="content[ru_description_dillers]" placeholder="Контент (RU)"><?=(isset($contentData['ru_description_dillers']))?$contentData['ru_description_dillers']:'';?></textarea>
		<label>Дилерам (EN):</label>
		<input type="text" name="content[en_title_dillers]" class="span3" value="<?=(isset($contentData['en_title_dillers']))?$contentData['en_title_dillers']:'';?>" placeholder="Название (RU)" />
		<textarea class="span9" rows="6" name="content[en_description_dillers]" placeholder="Контент (EN)"><?=(isset($contentData['en_description_dillers']))?$contentData['en_description_dillers']:'';?></textarea>
		
		<label>Дизайнерам (RU):</label>
		<input type="text" name="content[ru_title_designers]" class="span3" value="<?=(isset($contentData['ru_title_designers']))?$contentData['ru_title_designers']:'';?>" placeholder="Название (RU)" />
		<textarea class="span9" rows="6" name="content[ru_description_designers]" placeholder="Контент (RU)"><?=(isset($contentData['ru_description_designers']))?$contentData['ru_description_designers']:'';?></textarea>
		<label>Дизайнерам (EN):</label>
		<input type="text" name="content[en_title_designers]" class="span3" value="<?=(isset($contentData['en_title_designers']))?$contentData['en_title_designers']:'';?>" placeholder="Название (RU)" />
		<textarea class="span9" rows="6" name="content[en_description_designers]" placeholder="Контент (EN)"><?=(isset($contentData['en_description_designers']))?$contentData['en_description_designers']:'';?></textarea>
		
		<label>Контакты (RU):</label>
		<textarea class="span9" rows="2" name="content[ru_contacts]" placeholder="Контакты (EN)"><?=(isset($contentData['ru_contacts']))?$contentData['ru_contacts']:'';?></textarea>
		<label>Контакты (EN):</label>
		<textarea class="span9" rows="2" name="content[en_contacts]" placeholder="Контакты (EN)"><?=(isset($contentData['en_contacts']))?$contentData['en_contacts']:'';?></textarea>
	<hr/>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit btn-success no-clickable btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>