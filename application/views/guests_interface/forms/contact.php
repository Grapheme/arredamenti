<form action="<?=site_url('send-callback-message');?>" method="POST" class="form-send-callback-message">
	<fieldset>
		<legend><?=lang('localize_form_legend');?></legend>
		<div class="form_error_message hidden"></div>
		<input class="contact-input valid-required" name="name" type="text" placeholder="<?=lang('localize_form_name');?>">
		<input class="contact-input valid-required valid-email" name="email" type="text" placeholder="<?=lang('localize_form_email');?>">
		<textarea class="contact-textarea valid-required" name="message" placeholder="<?=lang('localize_form_message');?>"></textarea>
		<input class="btn no-clickable btn-loading btn-submit contact-submit" type="submit" value="<?=lang('localize_form_submit');?>">
	</fieldset>
</form>