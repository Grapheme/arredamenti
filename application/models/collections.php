<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Collections extends MY_Model{

	protected $table = "collections";
	protected $primary_key = "id";
	protected $fields = array("*");
	protected $order_by = "number";
	
	function __construct(){
		parent::__construct();
	}
}