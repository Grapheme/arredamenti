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
		<label>Адрес (RU):</label>
		<input type="text" name="content[ru_address]" class="span9" value="<?=(isset($contentData['ru_address']))?$contentData['ru_address']:'';?>" placeholder="Адрес (RU)" />
		<label>Адрес (EN):</label>
		<input type="text" name="content[en_address]" class="span9" value="<?=(isset($contentData['en_address']))?$contentData['en_address']:'';?>" placeholder="Адрес (EN)" />
		<label>Телефоны (RU):</label>
		<input type="text" name="content[ru_phones]" class="span9" value="<?=(isset($contentData['ru_phones']))?$contentData['ru_phones']:'';?>" placeholder="Телефоны (RU)" />
		<label>Телефоны (EN):</label>
		<input type="text" name="content[en_phones]" class="span9" value="<?=(isset($contentData['en_phones']))?$contentData['en_phones']:'';?>" placeholder="Телефоны (EN)" />
		<label>Режим работы (RU):</label>
		<input type="text" name="content[ru_mode_work]" class="span9" value="<?=(isset($contentData['ru_mode_work']))?$contentData['ru_mode_work']:'';?>" placeholder="Режим работы (RU)" />
		<label>Режим работы (EN):</label>
		<input type="text" name="content[en_mode_work]" class="span9" value="<?=(isset($contentData['en_mode_work']))?$contentData['en_mode_work']:'';?>" placeholder="Режим работы (EN)" />
		<label>Эл.почта (RU):</label>
		<input type="text" name="content[ru_email]" class="span9" value="<?=(isset($contentData['ru_email']))?$contentData['ru_email']:'';?>" placeholder="Эл.почта (RU)" />
		<label>Эл.почта (EN):</label>
		<input type="text" name="content[en_email]" class="span9" value="<?=(isset($contentData['en_email']))?$contentData['en_email']:'';?>" placeholder="Эл.почта (EN)" />
	<hr/>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit btn-success no-clickable btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>