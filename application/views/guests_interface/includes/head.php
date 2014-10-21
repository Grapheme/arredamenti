<meta charset="utf-8" <? #print_r($page); ?> />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?=(isset($page[$this->uri->language_string.'_page_title']))?$page[$this->uri->language_string.'_page_title']:'Arredamenti';?></title>
<meta name="description" content="<?=(isset($page[$this->uri->language_string.'_page_description']))?$page[$this->uri->language_string.'_page_description']:'Arrenamenti';?>" />
<meta name="viewport" content="width=device-width" />
<link rel="icon" type="image/png" href="<?=baseURL('favicon.png');?>" >
<link rel="stylesheet" href="<?=baseURL('css/normalize.min.css');?>" />
<link rel="stylesheet" href="<?=baseURL('css/fonts.css');?>" />
<link rel="stylesheet" href="<?=baseURL('css/main.css');?>" />
<script src="<?=baseURL('js/vendor/modernizr-2.6.2.min.js');?>"></script>