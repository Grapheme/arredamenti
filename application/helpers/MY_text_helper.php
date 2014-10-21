<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

	function blog_limiter($content){
		
		if(!empty($content)):
			$pattern = "/\<cut text\=\"(.+?)\">/i";
			$replacement = "<a href=\"#\" class=\"no-clickable advanced muted\">\$1</a> <cut>";
			return preg_replace($pattern, $replacement,$content);
		else:
			return '';
		endif;
	}
	
	function pluralBrends($n,$langURL){
		
		$language[RUSLAN] = array('фабрика','фабрики','фабрик');
		$language[ENGLAN] = array('factory','factories','factories');
		
		$n = abs($n) % 100;
		$n1 = $n % 10;
		if ($n > 10 && $n < 20) return $language[$langURL][2];
		if ($n1 > 1 && $n1 < 5) return $language[$langURL][1];
		if ($n1 == 1) return $language[$langURL][0];
		return $language[$langURL][2];
	}
	
	function pluralCollection($n,$langURL){
		
		$language[RUSLAN] = array('коллекция','коллекции','коллекций');
		$language[ENGLAN] = array('collection','collections','collections');
		
		$n = abs($n) % 100;
		$n1 = $n % 10;
		if ($n > 10 && $n < 20) return $language[$langURL][2];
		if ($n1 > 1 && $n1 < 5) return $language[$langURL][1];
		if ($n1 == 1) return $language[$langURL][0];
		return $language[$langURL][2];
	}
?>