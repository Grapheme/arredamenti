/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

$(function(){
	$("select.select-brend").change(function(){
		var url = mt.currentURL.replace(/&brend=(\d+)?/,'');
		if($(this).emptyValue() == false){
			url = url+'&brend='+$(this).val();
		}
		mt.redirect(url);
	});
	$("select.select-category").change(function(){
		var url = mt.currentURL.replace(/&category=(\d+)?/,'');
		if($(this).emptyValue() == false){
			url = url+'&category='+$(this).val();
		}
		mt.redirect(url);
	});
	$("select.set-image-collection-size").change(function(){
		var action = $("div.div-form-action").attr('data-action');
		var url = action.replace(/&size=(\d+)?/,'');
		url = url+'&size='+$(this).val();
		$("div.div-form-action").attr('data-action',url);
	})
});