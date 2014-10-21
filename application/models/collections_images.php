<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Collections_images extends MY_Model{

	protected $table = "collections_images";
	protected $primary_key = "id";
	protected $fields = array("*");
	protected $order_by = "number";
	
	function __construct(){
		parent::__construct();
	}
}