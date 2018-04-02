<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staf_sarprasC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		Staf_sarpras_access();
	}

	
}