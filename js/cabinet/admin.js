/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

$(function(){
	var mainOptions = {target: null,beforeSubmit: mt.ajaxBeforeSubmit,success: mt.ajaxSuccessSubmit,dataType:'json',type:'post'};

	$("form.form-manage-brend .btn-submit").click(function(){
		$(this).addClass('loading');
		$("form.form-manage-brend").ajaxSubmit(uploadImage.singlePhotoOption);
		return false;
	});
	$("form.form-manage-news .btn-submit").click(function(){
		$(this).addClass('loading');
		$("form.form-manage-news").ajaxSubmit(uploadImage.singlePhotoOption);
		return false;
	});
	$("form.form-manage-category .btn-submit").click(function(){
		$(this).addClass('loading');
		$("form.form-manage-category").ajaxSubmit(uploadImage.singlePhotoOption);
		return false;
	});
	$("form.form-manage-collection .btn-submit").click(function(){
		$(this).addClass('loading');
		$("form.form-manage-collection").ajaxSubmit(uploadImage.singlePhotoOption);
		return false;
	});
	$("button.remove-item").click(function(){
		if(!confirm('Удалить запись?')){ return false;}
		var _this = this;
		var itemID = $(this).attr('data-item');
		var action = $(this).parents('table').attr('data-action');
		$.ajax({
			url: action,type: 'POST',dataType: 'json',data:{'id':itemID},
			beforeSend: function(){
				$("div.result-request").html('');
			},
			success: function(response,textStatus,xhr){
				if(response.status){
					$(_this).parents('tr').remove();
				}else{
					$("div.result-request").html(response.responseText);
				}
			},
			error: function(xhr,textStatus,errorThrown){}
		});
	});
	$("button.btn-image-caption").click(function(){
		var _this = this;
		var itemID = $(this).attr('data-item');
		var ru_caption = $(this).siblings('input.image-ru-caption').val().trim();
		var en_caption = $(this).siblings('input.image-en-caption').val().trim();
		var number = $(this).siblings('input.image-number').val().trim();
		var action = $(this).parents('ul.resources-items').attr('data-action');
		$.ajax({
			url: action,type: 'POST',dataType: 'json',data:{'id':itemID,'ru_caption':ru_caption,'en_caption':en_caption,'number':number},
			beforeSend: function(){
				$(_this).addClass('loading');
			},
			success: function(response,textStatus,xhr){
				$(_this).removeClass('loading');
				if(response.status){
					$(_this).html('OK').removeClass('btn-info').addClass('btn-success');
				}else{
					$(_this).html('NOT').removeClass('btn-info').addClass('btn-danger');
				}
			},
			error: function(xhr,textStatus,errorThrown){
				$(_this).removeClass('loading');
				$(_this).html('ERR').removeClass('btn-info').addClass('btn-danger');
			}
		});
	});
	$("form.form-manage-page .btn-submit").click(function(){
		var _form = $("form.form-manage-page");
		$(this).addClass('loading');
		var options = mainOptions;
		options.success = function(response,status,xhr,jqForm){
			mt.ajaxSuccessSubmit(response,status,xhr,jqForm);
			if(response.status){
				$("div.div-form-operation").after('<div class="msg-alert">'+response.responseText+'</div>');
			}else{
				$("div.div-form-operation").after('<div class="msg-alert error">'+response.responseText+'</div>');
			}
		}
		$(_form).ajaxSubmit(options);
		return false;
	});
});