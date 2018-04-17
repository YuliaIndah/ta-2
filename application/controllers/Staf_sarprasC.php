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

	// sebagai staff

	public function kelola_barang(){ //halaman kelola barang(man_sarpras)
		$data['title'] = "Kelola Barang | Manajer Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];      //get data diri buat nampilin nama di pjok kanan
		$this->data['data_barang'] = $this->UserM->get_barang()->result();          //menampilkan data barang untuk man_sarpras dan staff sarpras
		$this->data['jenis_barang'] = $this->Staf_sarprasM->get_pilihan_jenis_barang()->result();
		$data['body'] = $this->load->view('staf_sarpras/barang_content', $this->data, true);
		$this->load->view('staf_sarpras/index_template', $data);
	}

	public function post_tambah_barang(){ //fungsi untuk tambah barang
		$this->form_validation->set_rules('nama_barang', 'Nama Barang','required');
		$this->form_validation->set_rules('kode_jenis_barang', 'Jenis Barang','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->kelola_barang();
			//redirect ke halaman kelola barang
		}else{
			$nama_barang 		= $_POST['nama_barang'];
			$kode_jenis_barang	= $_POST['kode_jenis_barang'];
			$data_pengguna		= array(
				'nama_barang'		=> $nama_barang,
				'kode_jenis_barang'	=> $kode_jenis_barang
			);
			if($this->Staf_sarprasM->insert_tambah_barang($data_pengguna)){
				$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect('Staf_sarprasC/kelola_barang');
			}else{
				$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan');
				redirect('Staf_sarprasC/kelola_barang');
			}
		}

	}

	public function ubah_barang($kode_barang){ //menampilkan modal dengan isi dari ubah_barang.php
		$data['ubah_barang']          = $this->UserM->get_barang_by_kode_barang($kode_barang)->result()[0];
		$data['pilihan_jenis_barang'] = $this->Staf_sarprasM->get_pilihan_jenis_barang()->result();
		$this->load->view('staf_sarpras/detail_ubah_barang', $data);
	}

	public function ubah_data_barang(){ //update data barang
		$kode_barang 		= $_POST['kode_barang'];
		$kode_jenis_barang  = $_POST['kode_jenis_barang'];

		$data = array(
			'kode_barang'       => $kode_barang,
			'kode_jenis_barang' => $kode_jenis_barang
		);
		$this->UserM->ubah_data_barang($kode_barang,$data);
		redirect('Staf_sarprasC/kelola_barang');
	}

	//sebagai pegawai

	public function ajukan_barang(){ //halaman pengajuan barang
		$data['title'] = "Daftar Pengajuan Barang | Kepala Departemen";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0]; //get data diri buat nampilin nama di pojok kanan
		$this->data['data_ajukan_barang'] = $this->UserM->get_ajukan_barang()->result();	//menampilkan pengajuan barag yang diajukan user sebagai pegwai
		$this->data['pilihan_barang'] = $this->UserM->get_pilihan_barang()->result();
		$data['body'] = $this->load->view('staf_sarpras/ajukan_barang_content', $this->data, true);
		$this->load->view('staf_sarpras/index_template', $data);
	}

	public function post_tambah_ajukan_barang(){ //fungsi untuk tambah pengajuan barang
		$this->form_validation->set_rules('no_identitas', 'No Identitas','required');
		$this->form_validation->set_rules('kode_barang', 'Nama Barang','required');
		$this->form_validation->set_rules('tgl_item_pengajuan', 'Tanggal Item Pengajuan','required');
		$this->form_validation->set_rules('nama_item_pengajuan', 'Nama Item Pengajuan','required');
		$this->form_validation->set_rules('url', 'URL','required');
		$this->form_validation->set_rules('harga_satuan', 'Harga Satuan','required');
		$this->form_validation->set_rules('merk', 'Merk','required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Barang','required');
		// $this->form_validation->set_rules('pimpinan', 'Pimpinan','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 1');
			redirect('Staf_sarprasC/ajukan_barang') ;
			//redirect ke halaman pengajuan barang
		}else{
			$upload = $this->Staf_sarprasM->upload(); // lakukan upload file dengan memanggil function upload yang ada di Staf_sarprasM.php
			$no_identitas 		= $_POST['no_identitas'];
			$kode_barang 		= $_POST['kode_barang'];
			$tgl_item_pengajuan = $_POST['tgl_item_pengajuan'];
			$nama_item_pengajuan= $_POST['nama_item_pengajuan'];
			$url 				= $_POST['url'];
			$harga_satuan 		= $_POST['harga_satuan'];
			$merk 				= $_POST['merk'];
			$jumlah 			= $_POST['jumlah'];
			// $pimpinan			= $_POST['pimpinan'];

			$baru = "baru"; //buat status pengajuan berstatus baru ketika baru dibuat

			$data_pengguna		= array(
				'no_identitas'			=> $no_identitas,
				'kode_barang'			=> $kode_barang,
				'status_pengajuan'		=> $baru,
				'tgl_item_pengajuan'	=> $tgl_item_pengajuan,
				'nama_item_pengajuan'	=> $nama_item_pengajuan,
				'url'					=> $url,
				'harga_satuan'			=> $harga_satuan,
				'merk'					=> $merk,
				'jumlah'				=> $jumlah,
				'file_gambar' 			=> $upload['file']['file_name']
				// 'pimpinan'				=> $pimpinan

			);
			if($upload['result'] == "success"){ // Jika proses upload sukses
				$this->Staf_sarprasM->insert_pengajuan_barang($data_pengguna);  // untuk memasukkan data ke tabel item_pengajuan
				$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect('Staf_sarprasC/ajukan_barang');//redirect ke halaman pengajuan barang
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 2');
				redirect('Staf_sarprasC/ajukan_barang');//redirect ke halaman pengajuan barang
			}

		}

	}	
	
}