<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Brends extends MY_Model{

	protected $table = "brends";
	protected $primary_key = "id";
	protected $fields = array("*");
	protected $order_by = "url";
	
	function __construct(){
		parent::__construct();
	}
}