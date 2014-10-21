<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

	$config = array(
		'signin' =>array(
			array('field'=>'login','label'=>'Логин','rules'=>'required|trim'),
			array('field'=>'password','label'=>'Пароль','rules'=>'required|trim')
		),
        'brend' =>array(
            array('field'=>'ru_title','label'=>'Название (RU)','rules'=>'required|trim|htmlspecialchars'),
            array('field'=>'ru_description','label'=>'Описание (RU)','rules'=>'required|trim|xss_clean'),
            array('field'=>'en_title','label'=>'Название (EN)','rules'=>'required|trim|htmlspecialchars'),
            array('field'=>'en_description','label'=>'Описание (EN)','rules'=>'required|trim|xss_clean'),
			array('field'=>'url','label'=>'URL','rules'=>'required|trim'),
			array('field'=>'site','label'=>'Ссылка на сайт','rules'=>'prep_url|trim'),
			array('field'=>'position','label'=>'Отображение','rules'=>'numeric|trim'),
		),
		'news' =>array(
			array('field'=>'ru_title','label'=>'Название (RU)','rules'=>'trim|htmlspecialchars'),
			array('field'=>'ru_title2','label'=>'Название 2 (RU)','rules'=>'trim|htmlspecialchars'),
			array('field'=>'ru_short','label'=>'Анонс (RU)','rules'=>'trim|xss_clean'),
			array('field'=>'ru_full','label'=>'Полный текст (RU)','rules'=>'trim'),
			array('field'=>'en_title','label'=>'Название (EN)','rules'=>'trim|htmlspecialchars'),
			array('field'=>'en_title2','label'=>'Название 2 (EN)','rules'=>'trim|htmlspecialchars'),
			array('field'=>'en_short','label'=>'Анонс (EN)','rules'=>'trim|xss_clean'),
			array('field'=>'en_full','label'=>'Полный текст (EN)','rules'=>'trim'),
			#array('field'=>'file','label'=>'Основное изображение','rules'=>'required'),
		),
		'factory' =>array(
			array('field'=>'ru_title','label'=>'Название (RU)','rules'=>'required|trim|htmlspecialchars'),
			array('field'=>'ru_description','label'=>'Описание (RU)','rules'=>'trim|xss_clean'),
			array('field'=>'en_title','label'=>'Название (EN)','rules'=>'required|trim|htmlspecialchars'),
			array('field'=>'en_description','label'=>'Описание (EN)','rules'=>'trim|xss_clean'),
			array('field'=>'site','label'=>'Ссылка на сайт','rules'=>'prep_url|trim'),
			array('field'=>'sort','label'=>'Отображение','rules'=>'numeric|trim'),
		),
		'category' =>array(
			array('field'=>'ru_title','label'=>'Название (RU)','rules'=>'required|trim|htmlspecialchars'),
			array('field'=>'ru_description','label'=>'Описание (RU)','rules'=>'trim|xss_clean'),
			array('field'=>'en_title','label'=>'Название (EN)','rules'=>'required|trim|htmlspecialchars'),
			array('field'=>'en_description','label'=>'Описание (EN)','rules'=>'trim|xss_clean'),
			array('field'=>'url','label'=>'URL','rules'=>'required|trim'),
		),
		'collection' =>array(
			array('field'=>'ru_title','label'=>'Название (RU)','rules'=>'required|trim|htmlspecialchars'),
			array('field'=>'ru_description','label'=>'Описание (RU)','rules'=>'trim|xss_clean'),
			array('field'=>'en_title','label'=>'Название (EN)','rules'=>'required|trim|htmlspecialchars'),
			array('field'=>'en_description','label'=>'Описание (EN)','rules'=>'trim|xss_clean'),
			array('field'=>'url','label'=>'URL','rules'=>'required|trim'),
			array('field'=>'number','label'=>'Порядковый номер','rules'=>'required|trim'),
			array('field'=>'brend','label'=>'Бренд ID','rules'=>'required|numeric|trim'),
			array('field'=>'category','label'=>'Категория ID','rules'=>'required|numeric|trim'),
		),
		'image_caption' =>array(
			array('field'=>'id','label'=>'ID','rules'=>'required|trim|numeric'),
			array('field'=>'caption','label'=>'Caption','rules'=>'trim|xss_clean'),
			array('field'=>'number','label'=>'Number','rules'=>'trim|numeric'),
		),
		'page' =>array(
			array('field'=>'ru_title','label'=>'Название (RU)','rules'=>'required|trim|htmlspecialchars'),
			array('field'=>'en_title','label'=>'Название (EN)','rules'=>'required|trim|htmlspecialchars'),
			array('field'=>'url','label'=>'URL страницы','rules'=>'trim'),
		),
		'callback' =>array(
			array('field'=>'name','label'=>' ','rules'=>'required|trim|htmlspecialchars|xss_clean'),
			array('field'=>'email','label'=>' ','rules'=>'required|valid_email|trim|htmlspecialchars|xss_clean'),
			array('field'=>'message','label'=>' ','rules'=>'required|trim|htmlspecialchars|xss_clean'),
		),
	);
?>