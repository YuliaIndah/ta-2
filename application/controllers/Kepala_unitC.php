<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		Unit_access();
	}

	
}