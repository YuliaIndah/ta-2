<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class StafM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}
}