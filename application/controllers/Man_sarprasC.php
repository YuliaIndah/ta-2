<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_sarprasC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['UserM','Man_sarprasM']);
		Man_sarpras_access();
	}

	public function data_diri(){
		$data['title'] = "Data Diri - Manajer Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('man_sarpras/data_diri_content', $this->data, true) ;
		$this->load->view('man_sarpras/index_template', $data);
	}

	// sebagai man_sarpras

	public function index(){ //halaman index man_sarpras (dashboard)
		$data['title'] = "Beranda | Manajer Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('man_sarpras/index_content', $this->data, true) ;
		$this->load->view('man_sarpras/index_template', $data);
	}

	public function persetujuan_barang(){ //halaman persetujuan barang (man_sarpras)
		$data['title'] = "Persetujuan Barang | Manajer Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan

		$this->data['data_persetujuan_barang'] = $this->Man_sarprasM->get_data_item_pengajuan()->result();
		$data['body'] = $this->load->view('man_sarpras/persetujuan_barang_content', $this->data, true) ;
		$this->load->view('man_sarpras/index_template', $data);
	}

	public function detail_persetujuan_terima($id){ //menampilkan modal dengan isi dari detail_pengajuan.php
		$data['detail_barang'] = $this->Man_sarprasM->get_data_pengajuan_by_id($id)->result()[0];
		$data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$this->load->view('man_sarpras/detail_persetujuan_terima', $data);
	}

	public function detail_persetujuan_tolak($id){ //menampilkan modal dengan isi dari detail_pengajuan.php
		$data['detail_barang'] = $this->Man_sarprasM->get_data_pengajuan_by_id($id)->result()[0];
		$data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$this->load->view('man_sarpras/detail_persetujuan_tolak', $data);
	}

	public function kelola_barang(){ //halaman kelola barang(man_sarpras)
		$data['title'] = "Kelola Barang | Manajer Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];      //get data diri buat nampilin nama di pjok kanan
		$this->data['data_barang'] = $this->UserM->get_barang()->result();          //menampilkan data barang untuk man_sarpras dan staff sarpras
		$this->data['jenis_barang'] = $this->Man_sarprasM->get_pilihan_jenis_barang()->result();
		$data['body'] = $this->load->view('man_sarpras/barang_content', $this->data, true);
		$this->load->view('man_sarpras/index_template', $data);
	}

	public function pengaturan_akun(){
		$data['title'] = "Pengaturan Akun | Manajer Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengaturan_akun_content', $this->data, true) ;
		$this->load->view('man_sarpras/index_template', $data);
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
			if($this->Man_sarprasM->insert_tambah_barang($data_pengguna)){
				$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect('Man_sarprasC/kelola_barang');
			}else{
				$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan');
				redirect('Man_sarprasC/kelola_barang');
			}
		}

	}

	public function ubah_barang($kode_barang){ //menampilkan modal dengan isi dari ubah_barang.php
		$data['ubah_barang']          = $this->UserM->get_barang_by_kode_barang($kode_barang)->result()[0];
		$data['pilihan_jenis_barang'] = $this->Man_sarprasM->get_pilihan_jenis_barang($kode_barang)->result();
		echo json_encode($data);
	}
	public function getListAjax() 
	{
		$data = $this->db->get('jenis_barang')->result();
		echo json_encode($data);
	}

	public function ubah_data_barang(){ //update data barang
		$id 				= $_POST['id'];
		$nama_barang 		= $_POST['nama_barang'];
		$kode_jenis_barang  = $_POST['kode_jenis_barang'];
		$data = array(
			'nama_barang'       => $nama_barang,
			'kode_jenis_barang' => $kode_jenis_barang
		);
		$this->UserM->ubah_data_barang($id,$data);
		redirect('Man_sarprasC/kelola_barang');
	}

	public function post_persetujuan_barang(){ //fungsi untuk tambah progress persetujuan barang
		$this->form_validation->set_rules('no_identitas', 'No Identitas','required');
		$this->form_validation->set_rules('kode_fk', 'Kode FK','required');
		$this->form_validation->set_rules('kode_nama_progress', 'Kode Nama Progress','required');
		$this->form_validation->set_rules('komentar', 'Komentar','required');
		$this->form_validation->set_rules('jenis_progress', 'Merk','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Persetujuan anda tidak berhasil ditambahkan1 ');
			redirect('Man_sarprasC/persetujuan_barang') ;
			//redirect ke halaman pengajuan barang
		}else{
			
			$no_identitas 		= $_POST['no_identitas'];
			$kode_fk 		    = $_POST['kode_fk'];
			$kode_nama_progress = $_POST['kode_nama_progress'];
			$komentar           = $_POST['komentar'];
			$jenis_progress 	= $_POST['jenis_progress'];

			$format_waktu 		= "%H:%i";
			$waktu_progress 	= mdate($format_waktu);

			$format_tgl 		= "%Y-%m-%d";
			$tgl_progress 		= mdate($format_tgl);


			$data_progress		= array(
				'no_identitas'		=> $no_identitas,
				'kode_fk'			=> $kode_fk,
				'kode_nama_progress'=> $kode_nama_progress,
				'komentar'			=> $komentar,
				'jenis_progress'	=> $jenis_progress,
				'tgl_progress'		=> $tgl_progress,
				'waktu_progress'	=> $waktu_progress

			);
			if($this->UserM->insert_progress($data_progress)){
				$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect('Man_sarprasC/persetujuan_barang');
			}else{
				$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan2');
				redirect('Man_sarprasC/persetujuan_barang');
			}

		}

	}	

	public function klasifikasi_barang(){ //halaman kelola barang(man_sarpras)
		$data['title'] = "Klasifikasi Barang | Manajer Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];      //get data diri buat nampilin nama di pjok kanan
		$this->data['data_klasifikasi'] = $this->Man_sarprasM->get_data_klasifikasi_barang()->result();          //menampilkan data barang yang belum memiliki jenis barang / belum terklasifikasi
		$data['body'] = $this->load->view('man_sarpras/klasifikasi_barang_content', $this->data, true);
		$this->load->view('man_sarpras/index_template', $data);
	}

	public function update_klasifikasi($kode_jenis_barang, $kode_barang){ //edit data diri
		$kode_barang     	= $kode_barang;
		$kode_jenis_barang  = $kode_jenis_barang;
		$status_klasifikasi = 'valid';

		$data = array(
			'kode_barang'     	=> $kode_barang,
			'kode_jenis_barang' => $kode_jenis_barang,
			'status_klasifikasi'=> $status_klasifikasi
		);
		$this->Man_sarprasM->update_klasifikasi_barang($kode_barang,$data);
		$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
		redirect('Man_sarprasC/klasifikasi_barang');
	}

	// sebagai pegawai

	public function pengajuan_kegiatan_pegawai(){ //halaman pengajuan kegiatan (pegawai)
		$data['title'] = "Pengajuan Kegiatan Pegawai | Manajer Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('man_sarpras/pengajuan_kegiatan_pegawai_content', $this->data, true);
		$this->load->view('man_sarpras/index_template', $data);
	}
	public function kegiatan_pegawai(){ //halaman kegiatan pegawai
		$data['title'] = "Daftar Kegiatan | Manajer Sarana dan Prasarana";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$this->data['data_kegiatan'] = $this->UserM->get_kegiatan_pegawai()->result();	//menampilkan kegiatan yang diajukan user sebagai pegwai
		$data['body'] = $this->load->view('man_sarpras/kegiatan_pegawai_content', $this->data, true);
		$this->load->view('man_sarpras/index_template', $data);
	}

	public function post_pengajuan_kegiatan_pegawai(){ //fungsi post pengajuan kegiatan pegawai
		$this->form_validation->set_rules('id_pengguna_jabatan', 'ID Pengguna Jabatan','required');
		$this->form_validation->set_rules('kode_jenis_kegiatan', 'Kode Jenis Kegiatan','required');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan','required');
		$this->form_validation->set_rules('tgl_kegiatan', 'Tanggal Kegiatan','required');
		$this->form_validation->set_rules('dana_diajukan', 'Dana Diajukan','required');
		$this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan','required');
		$this->form_validation->set_rules('dana_disetujui', 'Dana Disetujui');
		if($this->form_validation->run() == FALSE){
			redirect('Man_sarprasC/pengajuan_kegiatan_pegawai');
		}else{
			$id_pengguna_jabatan 	= $_POST['id_pengguna_jabatan'];
			$kode_jenis_kegiatan 	= $_POST['kode_jenis_kegiatan'];
			$nama_kegiatan 			= $_POST['nama_kegiatan'];
			$tgl_kegiatan 			= $_POST['tgl_kegiatan'];
			$dana_diajukan 			= $_POST['dana_diajukan'];
			$tgl_pengajuan 			= $_POST['tgl_pengajuan'];
			$dana_disetujui			= $_POST['dana_disetujui'];

			$data_pengajuan_kegiatan = array(
				'id_pengguna_jabatan' 	=> $id_pengguna_jabatan,
				'kode_jenis_kegiatan' 	=> $kode_jenis_kegiatan,
				'nama_kegiatan' 		=> $nama_kegiatan,
				'tgl_kegiatan'			=> $tgl_kegiatan,
				'dana_diajukan' 		=> $dana_diajukan,
				'tgl_pengajuan'			=> $tgl_pengajuan,
				'dana_disetujui'		=> $dana_disetujui);

			$insert_id = $this->Man_sarprasM->insert_pengajuan_kegiatan($data_pengajuan_kegiatan);
			if($insert_id){ //get last insert id
				$upload = $this->Man_sarprasM->upload(); // lakukan upload file dengan memanggil function upload yang ada di Man_sarprasM.php
			if($upload['result'] == "success"){ // Jika proses upload sukses
				$this->Man_sarprasM->save($upload,$insert_id); // Panggil function save yang ada di Man_sarprasM.php untuk menyimpan data ke database
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->Man_sarprasM->delete($insert_id);//hapus data pengajuan kegiatan ketka gagal upload file
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan');
				redirect('Man_sarprasC/pengajuan_kegiatan_pegawai');
			}
			$this->session->set_flashdata('sukses','Data Pengajuan Kegiatan anda berhasil ditambahkan');
			redirect('Man_sarprasC/kegiatan_pegawai');
		}else{
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan');
			redirect('Man_sarprasC/pengajuan_kegiatan_pegawai');
		}
	}
}

	public function edit_data_diri($no_identitas){ //edit data diri
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
		$this->Man_sarprasM->edit_data_diri($no_identitas,$data);
		$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
		redirect('Man_sarprasC/data_diri');
	}

	public function ajukan_barang(){ //halaman pengajuan barang
		$data['title'] = "Daftar Pengajuan Barang | Kepala Departemen";
		$kode_unit = $this->session->userdata('kode_unit');
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0]; //get data diri buat nampilin nama di pojok kanan
		$this->data['data_ajukan_barang'] = $this->UserM->get_ajukan_barang()->result();	//menampilkan pengajuan barag yang diajukan user sebagai pegwai
		$this->data['data_pimpinan'] = $this->UserM->get_id_pimpinan($kode_unit)->result()[0]->no_identitas;	//menampilkan pengajuan barag yang diajukan user sebagai pegwai
		$this->data['pilihan_barang'] = $this->UserM->get_pilihan_barang()->result();
		$data['body'] = $this->load->view('man_sarpras/ajukan_barang_content', $this->data, true);
		$this->load->view('man_sarpras/index_template', $data);
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
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 1');
			redirect('Man_sarprasC/ajukan_barang') ;
			//redirect ke halaman pengajuan barang
		}else{
			$upload = $this->Man_sarprasM->upload(); // lakukan upload file dengan memanggil function upload yang ada di Man_sarprasM.php
			$no_identitas 		= $_POST['no_identitas'];
			$kode_barang 		= $_POST['kode_barang'];
			$tgl_item_pengajuan = $_POST['tgl_item_pengajuan'];
			$nama_item_pengajuan= $_POST['nama_item_pengajuan'];
			$url 				= $_POST['url'];
			$harga_satuan 		= $_POST['harga_satuan'];
			$merk 				= $_POST['merk'];
			$jumlah 			= $_POST['jumlah'];
			$pimpinan			= $_POST['pimpinan'];

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
				'file_gambar' 			=> $upload['file']['file_name'],
				'pimpinan'				=> $pimpinan

			);
			if($upload['result'] == "success"){ // Jika proses upload sukses
				$insert_id = $this->Man_sarprasM->insert_pengajuan_barang($data_pengguna);  // untuk memasukkan data ke tabel item_pengajuan

				if($insert_id){ // Jika proses insert ke item barang sukses

					$format_tgl 	= "%Y-%m-%d";
					$tgl_progress 	= mdate($format_tgl);
					$format_waktu 	= "%H:%i:%s";
					$waktu_progress	= mdate($format_waktu);
					$kode_nama_progress	= "1";
					$komentar			= "insert otomatis";
					$jenis_progress		= "barang";

					$data = array(
						'no_identitas' 			=> $no_identitas,
						'kode_fk'				=> $insert_id,
						'kode_nama_progress' 	=> $kode_nama_progress,
						'komentar'				=> $komentar,
						'jenis_progress'		=> $jenis_progress,
						'tgl_progress'			=> $tgl_progress,
						'waktu_progress'		=> $waktu_progress

					);
				$this->UserM->insert_progress($data); //insert progress langsung ketika mengajukan kegiatan untuk manajer, kepala, dan pimpinan yang lain
				}else{ 
					$this->session->set_flashdata('error','Data Pengajuan Pengajuan Barang anda tidak berhasil ditambahkan');
					redirect('Man_sarprasC/ajukan_barang');
				}
			
			$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect('Man_sarprasC/ajukan_barang');//redirect ke halaman pengajuan barang
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 2');
				redirect('Man_sarprasC/ajukan_barang');//redirect ke halaman pengajuan barang
			}

		}

	}	

	public function post_tambah_barang_baru(){ //fungsi untuk tambah barang baru
		$this->form_validation->set_rules('nama_barang', 'Nama Barang','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->ajukan_barang();
			//redirect ke halaman ajukan barang
		}else{
			$nama_barang 		= $_POST['nama_barang'];

			$status_klasifikasi = "tidak valid";
			$data_pengguna		= array(
				'nama_barang'		=> $nama_barang,
				'status_klasifikasi'=> $status_klasifikasi
			);
			if($this->Man_sarprasM->insert_tambah_barang($data_pengguna)){
				$this->session->set_flashdata('sukses','Data Barang Baru berhasil ditambahkan');
				redirect('Man_sarprasC/ajukan_barang');
			}else{
				$this->session->set_flashdata('error','Data Barang Baru tidak berhasil ditambahkan');
				redirect('Man_sarprasC/ajukan_barang');
			}
		}

	}
	
	
}