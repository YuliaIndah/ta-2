<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['UserM','MahasiswaM']);
		Mahasiswa_access();
		// Mahasiswa_access();
	}

	public function index(){ //halaman index mahasiswa (dashboard)
		$data['title'] = "Dashboard | Pengurus KM TEDI";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('mahasiswa/index_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
	}

	public function data_diri(){ //halaman data diri
		$data['title'] = "Data Diri | Pengurus KM TEDI";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('mahasiswa/data_diri_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
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
		$this->MahasiswaM->edit_data_diri($no_identitas,$data);
		$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
		redirect('MahasiswaC/data_diri');
	}

	public function pengaturan_akun(){ //halaman pengaturan akun
		$data['title'] = "Pengaturan Akun | Pengurus KM TEDI";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengaturan_akun_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
	}

	public function pengajuan_kegiatan(){
		$data['title'] = "Pengajuan Kegiatan | Pengurus KM TEDI";
		$this->data['data_kegiatan'] = $this->UserM->get_kegiatan_pegawai()->result();	//menampilkan kegiatan yang diajukan user sebagai pegwai
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('mahasiswa/pengajuan_kegiatan_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
	}

	public function post_pengajuan_kegiatan_pegawai(){ //fungsi post pengajuan kegiatan pegawai
		$this->form_validation->set_rules('no_identitas', 'No Identitas','required');
		$this->form_validation->set_rules('kode_jenis_kegiatan', 'Kode Jenis Kegiatan','required');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan','required');
		$this->form_validation->set_rules('tgl_kegiatan', 'Tanggal Kegiatan','required');
		$this->form_validation->set_rules('dana_diajukan', 'Dana Diajukan','required');
		$this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan','required');
		$this->form_validation->set_rules('dana_disetujui', 'Dana Disetujui');
		if($this->form_validation->run() == FALSE){
			redirect('MahasiswaC/pengajuan_kegiatan');
		}else{
			$no_identitas 			= $_POST['no_identitas'];
			$kode_jenis_kegiatan 	= $_POST['kode_jenis_kegiatan'];
			$nama_kegiatan 			= $_POST['nama_kegiatan'];
			$tgl_kegiatan 			= $_POST['tgl_kegiatan'];
			$dana_diajukan 			= $_POST['dana_diajukan'];
			$tgl_pengajuan 			= $_POST['tgl_pengajuan'];
			$dana_disetujui			= $_POST['dana_disetujui'];

			$data_pengajuan_kegiatan = array(
				'no_identitas' 			=> $no_identitas,
				'kode_jenis_kegiatan' 	=> $kode_jenis_kegiatan,
				'nama_kegiatan' 		=> $nama_kegiatan,
				'tgl_kegiatan'			=> $tgl_kegiatan,
				'dana_diajukan' 		=> $dana_diajukan,
				'tgl_pengajuan'			=> $tgl_pengajuan,
				'dana_disetujui'		=> $dana_disetujui);

			$insert_id = $this->MahasiswaM->insert_pengajuan_kegiatan($data_pengajuan_kegiatan);
				if($insert_id){ //get last insert id
					$upload = $this->MahasiswaM->upload(); // lakukan upload file dengan memanggil function upload yang ada di MahasiswaM.php
				if($upload['result'] == "success"){ // Jika proses upload sukses
					$this->MahasiswaM->save($upload,$insert_id); // Panggil function save yang ada di MahasiswaM.php untuk menyimpan data ke database
				}else{ // Jika proses upload gagal
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					$this->MahasiswaM->delete($insert_id);//hapus data pengajuan kegiatan ketka gagal upload file
					$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan');
					redirect('MahasiswaC/pengajuan_kegiatan');
				}
				$this->session->set_flashdata('sukses','Data Pengajuan Kegiatan anda berhasil ditambahkan');
				redirect('MahasiswaC/pengajuan_kegiatan');
			}else{
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan');
				redirect('MahasiswaC/pengajuan_kegiatan');
			}
		}
	}

	public function status_pengajuan(){
		$data['title'] = "Status Pengajuan | Pengurus KM TEDI";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('mahasiswa/status_pengajuan_content', $this->data, true) ;
		$this->load->view('mahasiswa/index_template', $data);
	}
}