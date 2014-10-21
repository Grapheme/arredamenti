<?=form_open(ADMIN_START_PAGE.'/news/update?mode=update&id='.$this->input->get('id'),array('class'=>'form-manage-news')); ?>

    <div class="control-group">
        <label>Сортировка: <em>(напр.: 0, 1, 2...)</em></label>
        <input type="text" name="sort" class="span1" value="<?=$news['sort'];?>" placeholder="Сортировка" />
        <label>URL: <em>(first-news-on-the-site)</em></label>
        <input type="text" name="url" class="span6" value="<?=$news['url'];?>" placeholder="news-url" />
    </div>
    
    <hr/>
    
    <div class="control-group">
        <label>Заголовок 1 (RU): <em>(напр.: Скидки, Акции)</em></label>
        <input type="text" name="ru_title" class="span2" value="<?=$news['ru_title'];?>" placeholder="Заголовок 1 (RU)" />
        <label>Заголовок 2 (RU): <em>(заголовок новости)</em></label>
        <input type="text" name="ru_title2" class="span6" value="<?=$news['ru_title2'];?>" placeholder="Заголовок новости (RU)" />
        <label>Анонс (RU):</label>
        <textarea class="span6" name="ru_short" placeholder="Анонс новости (RU)"><?=$news['ru_short'];?></textarea>
        <label>Полный текст (RU):</label>
        <textarea class="redactor" style="height:100px" name="ru_full" placeholder="Полный текст новости (RU)"><?=$news['ru_full'];?></textarea>

        <label>SEO Title (RU)</label>
        <input type="text" name="ru_seo_title" class="span6" value="<?=$news['ru_seo_title'];?>" placeholder="SEO Title (RU)" />
        <label>SEO Description (RU):</label>
        <textarea class="span6" name="ru_seo_description" placeholder="SEO Description (RU)"><?=$news['ru_seo_description'];?></textarea>
    </div>
    
    <hr/>
    
    <div class="control-group">
        <label>Заголовок 1 (EN): <em>(for example: Discount, Action)</em></label>
        <input type="text" name="en_title" class="span2" value="<?=$news['en_title'];?>" placeholder="Заголовок 1 (EN)" />
        <label>Заголовок 2 (EN): <em>(news main title)</em></label>
        <input type="text" name="en_title2" class="span6" value="<?=$news['en_title2'];?>" placeholder="Заголовок новости (EN)" />
        <label>Анонс (EN):</label>
        <textarea class="span6" name="en_short" placeholder="Анонс новости (EN)"><?=$news['en_short'];?></textarea>
        <label>Полный текст (EN):</label>
		<textarea class="redactor" style="height:100px" name="en_full" placeholder="Полный текст новости (EN)"><?=$news['en_full'];?></textarea>

        <label>SEO Title (EN)</label>
        <input type="text" name="en_seo_title" class="span6" value="<?=$news['en_seo_title'];?>" placeholder="SEO Title (EN)" />
        <label>SEO Description (EN):</label>
        <textarea class="span6" name="en_seo_description" placeholder="SEO Description (EN)"><?=$news['en_seo_description'];?></textarea>
	</div>
	<hr/>


	<div class="controls">

        <div>
    		<label>Основное изображение <em>(удалить нельзя, но можно загрузить новое)</em>:</label>
<? if ($news['image']) { ?>
	        <img class="img-rounded" src="<?=base_url($news['image']);?>" style="height:250px" title="" /><br/>
<? } ?>
    		<input type="file" autocomplete="off" name="file" size="52" class="valid-required_">
    		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
    		<div id="div-upload-photo" class="bar-file-upload hidden">
    			<div class="progress progress-info progress-striped active">
    				<div class="bar" style="width: 0%"></div>
    			</div>
    		</div>
        </div>

    </div>
    <hr/>
	<div class="controls">

        <div>
    		<label>Галерея <em>(можно удалить ранее загруженные изображения)</em>:</label>
<?
$images = glob(getcwd().'/img/news/'.$news['id'].'/*.*');
if ($images != false && count($images) > 0) {
	foreach ($images as $i => $img) {
		if (basename($img) == basename($news['image']))
		    continue;
	    #echo $img;
	    $img = str_replace(getcwd(), "", $img);
            /*<img class="img-rounded" src="<?=base_url($img);?>" style="height:100px" title="" /><br/>*/
?>
            <div style="display:inline-block; height:100px; width:150px; background-image:url(<?=$img?>); background-repeat: no-repeat; background-size: cover; background-color: #fff; background-position: 50% 50%; border: 1px solid #ccc; overflow:hidden;" class="img-rounded destination-photo"><label for='del_img_<?=basename($img)?>' style='display:block; height:100%; position:relative; overflow:hidden;'><span style="display:block; width:100%; position:absolute; bottom:0; color:#fff; background:#000; padding:0 5px 5px 5px; opacity: 0.7;"><input type='checkbox' name='del_img[]' value='<?=basename($img)?>' id='del_img_<?=basename($img)?>' style='border:0;outline:0;' /> удалить</span></label></div>
<?
	}
}
?>
            <div class="clear"></div>
            <label><em>Также можно загрузить несколько новых изображений:</em></label>
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
		<button type="submit" value="" name="submit" class="btn btn-submit btn-success no-clickable btn-loading">Сохранить</button>
		<a class="btn btn-info" href="<?=site_url(ADMIN_START_PAGE.'/news?mode=list');?>">Завершить</a>
	</div>
<?= form_close(); ?>