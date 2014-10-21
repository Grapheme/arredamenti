<div class="<?=(uri_string() == '')?'_lang':'guest_lang';?>">
	<a class="_rus_lang<?=($this->uri->language_string == RUSLAN)?' _active_lang':''?>" href="<?=baseURL(RUSLAN.'/'.uri_string());?>">RU</a>
	<a class="_eng_lang<?=($this->uri->language_string == ENGLAN)?' _active_lang':''?>" href="<?=baseURL(ENGLAN.'/'.uri_string());?>">ENG</a>
</div>