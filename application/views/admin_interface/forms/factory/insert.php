<?=form_open(ADMIN_START_PAGE.'/factory/insert',array('class'=>'form-manage-brend')); ?>
	<div class="control-group">
		<label>Название (RU): <em>(обязательное)</em></label>
		<input type="text" name="ru_title" class="span6 valid-required" value="" placeholder="Название (RU)" />
		<label>Описание (RU): <em>(обязательное)</em></label>
		<textarea class="span6" name="ru_description" placeholder="Описание (RU)"></textarea>
		<label>Название (EN): <em>(обязательное)</em></label>
		<input type="text" name="en_title" class="span6 valid-required" value="" placeholder="Название (EN)" />
		<label>Описание (EN): <em>(обязательное)</em></label>
		<textarea class="span6" name="en_description" placeholder="Описание (EN)"></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<label>Ссылка на сайт</label>
		<input type="text" name="site" class="span6" value="" placeholder="URL на сайт бренда" />
	</div>
	<div class="control-group">
		<label>Порядок:</label>
		<input type="text" name="sort" class="span6 valid-required" value="0" />
	</div>
	<div class="controls">
		<label>Логотип:</label>
		<input type="file" autocomplete="off" name="file" size="52">
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