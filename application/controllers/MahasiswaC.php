<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		// Mahasiswa_access();
	}

	public function index(){ //halaman index mahasiswa (dashboard)
		$data['title'] = "Dashboard | Mahasiswa";
		$data['body'] = $this->load->view('mahasiswa/index_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
	}

	public function data_diri(){ //halaman data diri
		$data['title'] = "Data Diri";
		$data['body'] = $this->load->view('data_diri_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
	}

	public function pengaturan_akun(){ //halaman pengaturan akun
		$data['title'] = "Pengaturan Akun | Mahasiswa";
		$data['body'] = $this->load->view('pengaturan_akun_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
	}

	public function pengajuan_kegiatan(){
		$data['title'] = "Pengajuan Kegiatan | Mahasiswa";
		$data['body'] = $this->load->view('mahasiswa/pengajuan_kegiatan_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
	}

	public function status_pengajuan(){
		$data['title'] = "Status Pengajuan | Mahasiswa";
		$data['body'] = $this->load->view('mahasiswa/status_pengajuan_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
	}
}