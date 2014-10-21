<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Autorization extends MY_Controller{
	
	function __construct(){

		parent::__construct();
	}
	
	/*********************************************************************************************************************/
	
	public function loginIn(){
		
		if(!$this->input->is_ajax_request() && $this->loginstatus === FALSE):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url());
		if($this->postDataValidation('signin') == TRUE):
			if($user = $this->accounts->authentication($this->input->post('login'),$this->input->post('password'))):
				if($user['active']):
					$account = json_encode(array('id'=>$user['id']));
					$this->session->set_userdata(array('logon'=>md5($this->input->post('login')),'account'=>$account));
					$json_request['redirect'] = site_url(ADMIN_START_PAGE);
					$json_request['status'] = TRUE;
				else:
					$json_request['responseText'] = 'Аккаунт не активирован';
				endif;
			else:
				$json_request['responseText'] = 'Неверный логин или пароль';
			endif;
		else:
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены поля'),TRUE);
		endif;
		echo json_encode($json_request);
	}
	
	/*********************************************************************************************************************/
	
	public function signIN(){
		
		$this->load->view("guests_interface/accounts/signin");
	}
	
	public function logoff(){
		
		$this->clearSession(FALSE);
		$this->session->unset_userdata(array('logon'=>'','profile'=>'','account'=>'','backpath'=>''));
		if(isset($_SERVER['HTTP_REFERER'])):
			redirect($_SERVER['HTTP_REFERER']);
		else:
			redirect('');
		endif;
	}
}