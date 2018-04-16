<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staf_sarprasC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['UserM','Staf_sarprasM']);
		Staf_sarpras_access();
	}

	public function data_diri(){ //halaman data diri
		$data['title'] = "Data Diri | Staf Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('staf_sarpras/data_diri_content', $this->data, true) ;
		$this->load->view('staf_sarpras/index_template', $data);
	}

	public function edit_data_diri($no_identitas){ // post edit data diri
		$jen_kel    = $_POST['jen_kel'];
		$tmp_lahir  = $_POST['tmp_lahir'];
		$tgl_lahir  = $_POST['tgl_lahir'];
		$alamat     = $_POST['alamat'];
		$no_hp      = $_POST['no_hp'];

		$data = array(
			'jen_kel'     => $jen_kel,
			'tmp_lahir'   => $tmp_lahir,
			'tgl_lahir'   => $tgl_lahir,
			'alamat'      => $alamat,
			'no_hp'       => $no_hp
		);
		$this->UserM->edit_data_diri($no_identitas,$data);
		$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
		redirect('Staf_sarprasC/data_diri');
	}


	public function index(){ //halaman index Staff Sarpras (dashboard)
		$data['title'] = "Beranda | Staf Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('staf_sarpras/index_content', $this->data, true) ;
		$this->load->view('staf_sarpras/index_template', $data);
	}

	public function pengaturan_akun(){ //halaman pengaturan akun
		$data['title'] = "Pengaturan Akun | Staff Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('staf_sarpras/pengaturan_akun_content', $this->data, true) ;
		$this->load->view('staf_sarpras/index_template', $data);
	}
	
}