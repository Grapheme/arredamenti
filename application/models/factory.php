<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Factory extends MY_Model{

	protected $table = "factory";
	protected $primary_key = "id";
	protected $fields = array("*");
	protected $order_by = "ru_title,en_title,sort";
	
	function __construct(){
		parent::__construct();
	}
}