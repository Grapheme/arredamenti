<?php
	$config =&get_config();
	$baseUrl = substr($config['base_url'],0,strlen($config['base_url'])-3);
	$_this = &get_instance();
	$_this->load->helper('language');
	$_this->lang->load('localization/404_page',$_this->languages[$_this->uri->language_string]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Page Not Found :(</title>
	<link rel="stylesheet" href="<?=$baseUrl;?>css/fonts.css">
	<style>
        ::-moz-selection {
            background: #b3d4fc;
            text-shadow: none;
        }

        ::selection {
            background: #b3d4fc;
            text-shadow: none;
        }

        html {
            padding: 30px 0;
            font-size: 16px;
            line-height: 1.4;
            color: #000;
            background: #fff;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            text-align: center;
        }

        h3 {
            margin: 1.5em 0 0.5em;
        }

        p {
            margin: 1em 0;
        }

        ul {
            padding: 0 0 0 40px;
            margin: 1em 0;
        }
        .block-404 { position: absolute; top: 30%; width: 100%; }
		.page_header { width: 240px; height: 27px; margin: 0 auto 14px; text-indent: -9999px; background: url("<?=$config['base_url'];?>img/logo.png") no-repeat; background-size: 100% auto; }           
		.brand-production { font-family: 'PT Serif'; font-style: italic; text-align: center; }
		.head-404 { font-size: 6.25em; font-family: 'Conv_BodoniC'; }
		.not-found { font-family: "Conv_Intro-Book"; text-transform: uppercase; letter-spacing: 2px; color: #242424; }
        .trouble-contact { font-family: 'Conv_Intro-Book'; color: #404040; }
        .trouble-contact a { display: inline-block; text-decoration: none; border-bottom: 1px solid; color: #404040; margin: 0 0 2px; }
        .trouble-contact a:hover { border-bottom: 3px solid #000; margin: 0; }
        .back-to-main { font-family: 'Conv_Intro-Book'; color: #111; }
        .back-to-main a { color: #000; font-weight: 700; text-decoration: none; display: inline-block; padding: 0 0 .15em; border-bottom: 1px solid #000; margin: 0 0 2px; }
        .back-to-main a:hover { border-bottom: 3px solid #000; margin: 0; }
    </style>
</head>
<body>
	<div class="container">
		<h1 class="page_header">
			ARREDAMENTI
		</h1>
		<div class="brand-production">Italian furniture</div>
		<div class="block-404">
			<div class="head-404">404</div>
			<div class="not-found"><?=lang('not_found');?></div>
			<p class="trouble-contact">
				<?=lang('text');?>,<a href="mailto:o.chub@arredamenti.su"><?=lang('write');?></a>
			</p>
			<p class="back-to-main">
				<?=lang('back');?>
				<a href="<?=$config['base_url'].RUSLAN;?>"><?=lang('main_back');?></a> <?=lang('site_back');?>
			</p>
		</div>
	</div>
</body>
</html>
