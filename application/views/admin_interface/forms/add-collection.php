<?=form_open(ADMIN_START_PAGE.'/collection/insert',array('class'=>'form-manage-collection')); ?>
	<input type="hidden" value="<?=$this->input->get('brend');?>" name="brend"/>
	<input type="hidden" value="<?=$this->input->get('category');?>" name="category"/>
	<div class="control-group">
		<label>Title (RU): </label>
		<input type="text" name="ru_page_title" class="span6" value="" placeholder="Title (RU)" />
		<label>Description (RU):</label>
		<textarea class="span6" name="ru_page_description" placeholder="Описание (RU)"></textarea>
		<label>Title (EN):</label>
		<input type="text" name="en_page_title" class="span6" value="" placeholder="Title (EN)" />
		<label>Description (EN):</label>
		<textarea class="span6" name="en_page_description" placeholder="Description (EN)"></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>Название (RU): <em>(обязательное)</em></label>
		<input type="text" name="ru_title" class="span6 valid-required" value="" placeholder="Название (RU)" />
		<label>Описание (RU):</label>
		<textarea class="span6" name="ru_description" placeholder="Описание (RU)"></textarea>
		<label>Название (EN): <em>(обязательное)</em></label>
		<input type="text" name="en_title" class="span6 valid-required" value="" placeholder="Название (EN)" />
		<label>Описание (EN):</label>
		<textarea class="span6" name="en_description" placeholder="Описание (EN)"></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>URL: <em>(обязательное)</em></label>
		<input type="text" name="url" class="span6 valid-required" value="" placeholder="На латинице, без пробелов и больших букв" />
		<label>№ п.п.: <em>(обязательное, для порядка отображения)</em></label>
		<input type="text" name="number" class="span2 valid-required valid-numeric" value="" placeholder="Целое число" />
	</div>
	<div class="controls">
		<label>Изображение:</label>
		<input type="file" class="valid-required" autocomplete="off" name="file" size="52">
		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
		<div id="div-upload-photo" class="bar-file-upload hidden">
			<div class="progress progress-info progress-striped active">
				<div class="bar" style="width: 0%"></div>
			</div>
		</div>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-success btn-submit btn-loading">Добавить</button>
	</div>
<?=form_close();?>