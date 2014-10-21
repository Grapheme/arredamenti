<?=form_open(ADMIN_START_PAGE.'/news/insert',array('class'=>'form-manage-news')); ?>

    <div class="control-group">
        <label>Сортировка: <em>(напр.: 0, 1, 2...)</em></label>
        <input type="text" name="sort" class="span1" value="0" placeholder="Сортировка" />
        <label>URL: <em>(first-news-on-the-site)</em></label>
        <input type="text" name="url" class="span6" value="" placeholder="news-url" />
    </div>
    
    <hr/>
    
	<div class="control-group">
		<label>Заголовок 1 (RU): <em>(напр.: Скидки, Акции)</em></label>
		<input type="text" name="ru_title" class="span2" value="" placeholder="Заголовок 1 (RU)" />
		<label>Заголовок 2 (RU): <em>(заголовок новости)</em></label>
		<input type="text" name="ru_title2" class="span6" value="" placeholder="Заголовок новости (RU)" />
		<label>Анонс (RU):</label>
		<textarea class="span6" name="ru_short" placeholder="Анонс новости (RU)"></textarea>
		<label>Полный текст (RU):</label>
		<textarea class="redactor" style="height:100px" name="ru_full" placeholder="Полный текст новости (RU)"></textarea>

        <label>SEO Title (RU)</label>
        <input type="text" name="ru_seo_title" class="span6" value="" placeholder="SEO Title (RU)" />
        <label>SEO Description (RU):</label>
        <textarea class="span6" name="ru_seo_description" placeholder="SEO Description (RU)"></textarea>
	</div>

	<hr/>

	<div class="control-group">
		<label>Заголовок 1 (EN): <em>(for example: Discount, Action)</em></label>
		<input type="text" name="en_title" class="span2" value="" placeholder="Заголовок 1 (EN)" />
		<label>Заголовок 2 (EN): <em>(news main title)</em></label>
		<input type="text" name="en_title2" class="span6" value="" placeholder="Заголовок новости (EN)" />
		<label>Анонс (EN):</label>
		<textarea class="span6" name="en_short" placeholder="Анонс новости (EN)"></textarea>
		<label>Полный текст (EN):</label>
		<textarea class="redactor" style="height:100px" name="en_full" placeholder="Полный текст новости (EN)"></textarea>

        <label>SEO Title (EN)</label>
        <input type="text" name="en_seo_title" class="span6" value="" placeholder="SEO Title (EN)" />
        <label>SEO Description (EN):</label>
        <textarea class="span6" name="en_seo_description" placeholder="SEO Description (EN)"></textarea>
	</div>
	<hr/>
<!--
	<div class="control-group">
		<label>Отображение:</label>
		<select name="position" class="span3">
		<?php foreach($this->brendPosition as $key => $value):?>
			<option value="<?=$key;?>"><?=$value;?></option>
		<?php endforeach;?>
		</select>
	</div>
    <hr/>
-->
	<div class="controls">

        <div>
    		<label>Основное изображение:</label>
    		<input type="file" autocomplete="off" name="file" size="52" class="valid-required">
    		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
    		<div id="div-upload-photo" class="bar-file-upload hidden">
    			<div class="progress progress-info progress-striped active">
    				<div class="bar" style="width: 0%"></div>
    			</div>
    		</div>
        </div>

        <div>
    		<label>Галерея <em>(можно выбрать несколько изображений)</em>:</label>
    		<input type="file" autocomplete="off" name="files[]" size="52" multiple class="multiple-upload-images">
    		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
    		<div id="div-upload-photos" class="bar-files-upload hidden div-upload-photo-multiple">
    			<div class="progress progress-info progress-striped active">
    				<div class="bar" style="width: 0%"></div>
    			</div>
    		</div>
        </div>

	</div>

	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-success btn-submit btn-loading">Добавить</button>
	</div>

<?=form_close();?>