<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_keuanganC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['UserM','Man_keuanganM']);
		Man_keuangan_acess();
	}

	// sebagai semua
	public function data_diri(){ //halaman data diri
		$data['title'] = "Data Diri | Kepala Departemen";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('man_keuangan/data_diri_content', $this->data, true) ;
		$this->load->view('man_keuangan/index_template', $data);
	}

	// sebagai manajer keuangan
	public function index(){ //halaman index manajer Keuangan (dashboard)
		$data['title'] = "Beranda | Manajer Keuangan";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('man_keuangan/index_content', $this->data, true) ;
		$this->load->view('man_keuangan/index_template', $data);
	}

	public function pengaturan_akun(){ //halaman pengaturan akun
		$data['title'] = "Pengaturan Akun | Manajer Keuangan";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('man_keuangan/pengaturan_akun_content', $this->data, true) ;
		$this->load->view('man_keuangan/index_template', $data);
	}

	public function kegiatan_diajukan(){ //halaman pengajuan kegiatan (manajer keuangan)
		$data['title'] = "Kegiatan Diajukan | Manajer Keuangan";
		$this->data['data_pengajuan_kegiatan'] = $this->Man_keuanganM->get_kegiatan_diajukan()->result();
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('man_keuangan/kegiatan_diajukan', $this->data, true) ;
		$this->load->view('man_keuangan/index_template', $data);
	}

	// sebagi pegawai

	public function kegiatan_pegawai(){ //halaman kegiatan pegawai
		$data['title'] = "Daftar Kegiatan | Manajer Keuangan";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0]; //get data diri buat nampilin nama di pjok kanan
		$this->data['data_kegiatan'] = $this->UserM->get_kegiatan_pegawai()->result();	//menampilkan kegiatan yang diajukan user sebagai pegwai
		$data['body'] = $this->load->view('man_keuangan/kegiatan_pegawai_content', $this->data, true);
		$this->load->view('man_keuangan/index_template', $data);
	}

	public function pengajuan_kegiatan_pegawai(){ //halaman pengajuan kegiatan (pegawai)
		$data['title'] = "Pengajuan Kegiatan | Manajer Keuangan";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('man_keuangan/pengajuan_kegiatan_pegawai_content', $this->data, true);
		$this->load->view('man_keuangan/index_template', $data);
	}

	public function persetujuan_kegiatan($id){ //menampilkan modal dengan isi dari detail_pengajuan.php
		$data['detail_kegiatan'] = $this->Man_keuanganM->get_kegiatan_diajukan_by_id($id)->result()[0];
		$data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['nama_progress'] = $this->Man_keuanganM->get_pilihan_nama_progress()->result();
		$this->load->view('man_keuangan/detail_pengajuan', $data);
	}

	public function detail_kegiatan($id){ //menampilkan modal dengan isi dari detail_pengajuan.php
		$data['detail_kegiatan'] = $this->Man_keuanganM->get_kegiatan_diajukan_by_id($id)->result()[0];
		$data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['nama_progress'] = $this->Man_keuanganM->get_pilihan_nama_progress()->result();
		$this->load->view('man_keuangan/detail_kegiatan', $data);
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
		$this->Man_keuanganM->edit_data_diri($no_identitas,$data);
		$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
		redirect('Man_keuanganC/data_diri');
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
			redirect('Man_keuanganC/pengajuan_kegiatan_pegawai');
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

			$insert_id = $this->Man_keuanganM->insert_pengajuan_kegiatan($data_pengajuan_kegiatan);
				if($insert_id){ //get last insert id
					$upload = $this->Man_keuanganM->upload(); // lakukan upload file dengan memanggil function upload yang ada di Man_keuanganM.php
				if($upload['result'] == "success"){ // Jika proses upload sukses
					$this->Man_keuanganM->save($upload,$insert_id); // Panggil function save yang ada di Man_keuanganM.php untuk menyimpan data ke database
				}else{ // Jika proses upload gagal
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					$this->Man_keuanganM->delete($insert_id);//hapus data pengajuan kegiatan ketka gagal upload file
					$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan');
					redirect('Man_keuanganC/pengajuan_kegiatan_pegawai');
				}
				$this->session->set_flashdata('sukses','Data Pengajuan Kegiatan anda berhasil ditambahkan');
				redirect('Man_keuanganC/kegiatan_pegawai');
			}else{
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan');
				redirect('Man_keuanganC/pengajuan_kegiatan_pegawai');
			}
		}
	}

	public function post_progress(){ //posting progress dan update kegiatan (dana disetujui)
		$no_identitas		= $_POST['no_identitas'];
		$kode_fk			= $_POST['kode_fk'];
		$kode_nama_progress	= $_POST['kode_nama_progress'];
		$komentar			= $_POST['komentar'];
		$jenis_progress		= $_POST['jenis_progress'];
		$dana_disetujui		= $_POST['dana_disetujui'];
		$format_tgl 	= "%Y-%m-%d";
		$tgl_progress 	= mdate($format_tgl);
		$format_waktu 	= "%H:%i";
		$waktu_progress	= mdate($format_waktu);
		$data = array(
			'no_identitas' 			=> $no_identitas,
			'kode_fk'				=> $kode_fk,
			'kode_nama_progress' 	=> $kode_nama_progress,
			'komentar'				=> $komentar,
			'jenis_progress'		=> $jenis_progress,
			'tgl_progress'			=> $tgl_progress,
			'waktu_progress'		=> $waktu_progress
		);
		$data_kegiatan = array('dana_disetujui' => $dana_disetujui, );
		if($this->Man_keuanganM->update_kegiatan($kode_fk, $data_kegiatan)){ //update dana disetujui
			if($this->Man_keuanganM->insert_progress($data)){ //insert progress
				redirect('Man_keuanganC/kegiatan_diajukan');
			}else{
				$this->Man_keuanganM->gajadi_update($kode_fk); //reset dana disetujui ke 0 ketika gagal insert
			}
		}		
	}

}