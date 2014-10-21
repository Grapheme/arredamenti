/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

$(function(){
	var mainOptions = {target: null,beforeSubmit: mt.ajaxBeforeSubmit,success: mt.ajaxSuccessSubmit,dataType:'json',type:'post'};
	$("form.form-signin .btn-loading").click(function(){
		var _this = this;
		var _form = $(_this).parents('form');
		$(_this).addClass('loading');
		var options = mainOptions;
		options.success = function(response,status,xhr,jqForm){
			if(response.status){
				mt.redirect(response.redirect);
			}else{
				mt.ajaxSuccessSubmit(response,status,xhr,jqForm);
				$("div.div-form-operation").after('<div class="msg-alert error">'+response.responseText+'</div>');
			}
		}
		setTimeout(function(){$(_form).ajaxSubmit(options);},500);
		return false;
	});
	$("form.form-send-callback-message .btn-submit").click(function(){
		mt.currentLenguage = mt.getLanguageURL();
		var options = mainOptions;
		options.beforeSubmit = function(formData,jqForm,options){
			return validation($(jqForm));
		}
		options.success = function(response,status,xhr,jqForm){
			if(response.status){
				$(jqForm).find("div.form_error_message").html(Localize[mt.currentLenguage]['sending_mail']).removeClass('hidden');
				$(jqForm).resetForm();
			}else{
				alert(response.responseText);
			}
		}
		$("form.form-send-callback-message").ajaxSubmit(options);
	})
	
	function validation(jqForm){
		
		var errors = false;
		$(jqForm).find("div.form_error_message").addClass('hidden');
		$(jqForm).find(".valid-required").removeClass('form-error');
		
		$(jqForm).find(".valid-required").each(function(i,element){
			if($(element).emptyValue()){
				$(element).addClass('form-error');
				$(jqForm).find("div.form_error_message").html(Localize[mt.currentLenguage]['empty_fields']).removeClass('hidden');
				errors = true;
			}
		});
		if($(jqForm).find(".valid-email").length > 0){
			var email = $(jqForm).find("input.valid-email").val().trim();
			if(email != ''){
				if(!mt.isValidEmailAddress(email)){
					$(jqForm).find("input.valid-email").addClass('form-error');
					$(jqForm).find("div.form_error_message").html(Localize[mt.currentLenguage]['valid_email']).removeClass('hidden');
					errors = true;
				}
			}
		}
		if(errors){
			return false;
		}else{
			return true;
		}
	}
});