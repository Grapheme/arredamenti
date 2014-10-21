/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */
var uploadImage = uploadImage || {};

uploadImage.singlePhotoOption = {
	target: null, type: 'post', dataType:'json',
	beforeSubmit: function(formData,jqForm,options){
		if(mt.ajaxBeforeSubmit(formData,jqForm,options)){
			if($(jqForm).find('input[type="file"]').emptyValue() == false){
				var percentVal = '0%';
				$("div.bar").width(percentVal).html(percentVal);
				$("#div-upload-photo").removeClass('hidden');
			}
		}else{return false;}
	},
	uploadProgress: function(event,position,total,percentComplete){
		var percentVal = percentComplete + '%';
		$("div.bar").width(percentVal).html(percentVal);
	},
	success: function(response,statusText,xhr,jqForm){
		var percentVal = '100%';
		$("button.btn-loading").removeClass('loading');
		$("div.bar").width(percentVal).html(percentVal);
		if(response.status){
			$("div.bar").parents('div.progress').removeClass('progress-info active').addClass('progress-success');
			$("div.div-form-operation").after('<div class="msg-alert">'+response.responseText+'</div>');
			if(response.responsePhotoSrc != false){
				$("img.destination-photo").attr('src',response.responsePhotoSrc);
			}
			if(response.redirect){
				setTimeout(function(){mt.redirect(response.redirect);},3000);
			}
		}else{
			$("div.bar").parents('div.progress').removeClass('progress-info active').addClass('progress-danger');
			$("div.div-form-operation").after('<div class="msg-alert error">'+response.responseText+'</div>');
		}
	}
}

/*
uploadImage.multiPhotoOption = {
	target: null, type: 'post', dataType: 'json',

	multi_upload_file: null, progressbar: null,

	beforeSubmit: function(formData,jqForm,options){		if(mt.ajaxBeforeSubmit(formData,jqForm,options)){
    		//alert("2");
    		//alert( $(jqForm).find('input[type="file"][multiple]').attr('class') );
    		var multi_upload_file = $(jqForm).find('input[type="file"][multiple]');
			if( $(multi_upload_file).val() != false ){                //alert( $(multi_upload_file).attr('class') );
                var progressbar = $(multi_upload_file).parent().find('.div-upload-photo-multiple');
                //alert( $(progressbar).attr('class') );
				var percentVal = '0%';
				$(progressbar).find(".bar").width(percentVal).html(percentVal);
				$(progressbar).removeClass('hidden');
			}
		}else{return false;}
	},
	uploadProgress: function(event,position,total,percentComplete){
		var percentVal = percentComplete + '%';
		$("div.bar").width(percentVal).html(percentVal);
	},
	success: function(response,statusText,xhr,jqForm){
		var percentVal = '100%';
		$("button.btn-loading").removeClass('loading');
		$("div.bar").width(percentVal).html(percentVal);
		if(response.status){
			$("div.bar").parents('div.progress').removeClass('progress-info active').addClass('progress-success');
			$("div.div-form-operation").after('<div class="msg-alert">'+response.responseText+'</div>');
			if(response.responsePhotoSrc != false){
				$("img.destination-photo").attr('src',response.responsePhotoSrc);
			}
			if(response.redirect){
				setTimeout(function(){mt.redirect(response.redirect);},3000);
			}
		}else{
			$("div.bar").parents('div.progress').removeClass('progress-info active').addClass('progress-danger');
			$("div.div-form-operation").after('<div class="msg-alert error">'+response.responseText+'</div>');
		}
	}
}
*/