<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class StafM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function get_id_pimpinan(){
		$this->db->select('pengguna.no_identitas');
		$this->db->from('pengguna');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
	}

}