<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		Admin_access();

	}

	
}