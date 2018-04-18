 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class UserM extends CI_Model  
 {  
 	function __construct(){
 		parent:: __construct();
 		$this->load->database();
 	} 
	public function insert_pengguna($data){ //post pengguna
		return $this->db->insert('pengguna', $data);
	}
	public function verifyemail($key){  //post konfirmasi email ubah value status_email jadi 1 (aktif)
		$data = array(
			'status_email' => '1',
		);  
		$this->db->where('md5(email)', $key);
		return $this->db->update('pengguna', $data);  
	}
	public function insert_data_resend($data){ //post resend data email
		$this->db->where('no_identitas',$data['no_identitas']); 
		return $this->db->update('pengguna',$data);
	}  

	// jabatan
	public function get_pilihan_jabatan(){ //mengambil jabatan dari db jabatan
		$query = $this->db->get('jabatan');	
		return $query;
	}
	public function get_pilihan_jabatan_by_id($id){ //mengambil jabatan dari db jabatan berdasarkan id
		$this->db->where('kode_jabatan', $id);
		$query = $this->db->get('jabatan');	
		return $query;
	}

	// Unit
	public function get_pilihan_unit(){
		$query = $this->db->get('unit');
		return $query;
	}
	public function get_pilihan_unit_by_id($id){ //mengambil jabatan dari db jabatan berdasarkan id
		$this->db->where('kode_unit', $id);
		$query = $this->db->get('unit');	
		return $query;
	}


	//jenis barang
	public function get_jenis_barang(){
		return $query = $this->db->get('jenis_barang');
	}
	public function get_jenis_barang_by_id($id){
		$this->db->where('kode_jenis_barang', $id);
		return $query = $this->db->get('jenis_barang');
	}

	//jenis kegiatan
	public function get_jenis_kegiatan(){
		$this->db->select('*');
		$this->db->from('jenis_kegiatan');
		return $query = $this->db->get();
	}
	public function get_jenis_kegiatan_by_id($id){
		$this->db->where('kode_jenis_kegiatan', $id);
		return $query = $this->db->get('jenis_kegiatan');
	}

	// nama progress
	public function get_nama_progress(){
		return $query = $this->db->get('nama_progress');
	}
	public function get_nama_progress_by_id($id){
		$this->db->where('kode_nama_progress', $id);
		return $query = $this->db->get('nama_progress');
	}

	public function update($id, $kode, $db, $data){
		$this->db->where($kode, $id);
		return $query = $this->db->update($db, $data);
	}
	public function insert($db, $data){
		return $query = $this->db->insert($db, $data);
	}

	//acc kegiatan (persetujuan  kegiatan)
	public function get_persetujuan_kegiatan(){
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->join('jabatan', 'pengguna.kode_jabatan = jabatan.kode_jabatan');
		$this->db->join('unit', 'pengguna.kode_unit = unit.kode_unit');
		$this->db->join('acc_kegiatan','pengguna.no_identitas = acc_kegiatan.no_identitas');
		$this->db->join('jenis_kegiatan','acc_kegiatan.kode_jenis_kegiatan = jenis_kegiatan.kode_jenis_kegiatan');
		return $query = $this->db->get();
	}

	function get_data_diri(){ //ambil data diri user berdasarkan session
		$no_identitas = $this->session->userdata('no_identitas');
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('pengguna.no_identitas', $no_identitas);
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
		$this->db->join('unit', 'pengguna.kode_unit = unit.kode_unit');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	public function edit_data_diri($no_identitas, $data){ //edit data diri
		$this->db->where('no_identitas', $no_identitas);
		$this->db->update('pengguna', $data);
		return TRUE;
	}
	
	function get_kegiatan_pegawai(){ //menampilkan kegiatan yang diajukan user sebagai pegwai
		$no_identitas = $this->session->userdata('no_identitas');
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('pengguna', 'pengguna.no_identitas = kegiatan.no_identitas');
		$this->db->where('pengguna.no_identitas', $no_identitas);

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	} 

	public function insert_pengajuan_kegiatan($data){   //post pengguna_jabatan
		if($this->db->insert('kegiatan', $data)){
			return $this->db->insert_id(); //return last insert ID
		} 
	}  

	public function upload(){ // Fungsi untuk upload file ke folder
		$config['upload_path'] = './assets/file_upload';
		$config['allowed_types'] = 'pdf|jpg|PNG|JPG|jpeg';
		$config['max_size']	= '';
		$config['remove_space'] = TRUE;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file_upload')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function save($upload,$insert_id){ // Fungsi untuk menyimpan data ke database
		$data = array(
			'kode_kegiatan' => $insert_id, //last insert id
			'nama_file' 	=> $upload['file']['file_name'],
			'ukuran_file' 	=> $upload['file']['file_size']
		);
		
		$this->db->insert('file_upload', $data);
	}

	public function delete($id){ //hapus data pengajuan kegiatan ketika gagal upload file
		$this->db->where('kode_kegiatan', $id);
		$this->db->delete('kegiatan');
		return "berhasil delete";
	}

	public function get_pilihan_nama_progress(){ //fungsi untuk ambil pilihan nama progress
		$query = $this->db->get('nama_progress');
		return $query;
	}

	public function insert_progress($data){   //post progress
		$query = $this->db->insert('progress', $data);
		return $query; 
	}

	public function get_id_pimpinan($kode_unit){
		$this->db->select('pengguna.no_identitas');
		$this->db->from('pengguna');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
		$this->db->where('unit.kode_unit', $kode_unit);
		$this->db->where('jabatan.kode_jabatan != "4"');

		return $query = $this->db->get();
	}

	//buat select progress yang sesuai data persetujuan mahasiswa KADEP
	//cek progress sudah input belom
	function get_data_status_kegiatan($array_data_pengajuan, $no_identitas){
		$this->db->select('progress.kode_fk');
		$this->db->from('progress');
		$this->db->join('pengguna', 'progress.no_identitas = pengguna.no_identitas');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
		$this->db->where('progress.no_identitas', $no_identitas);
		$this->db->where_in('progress.kode_fk', $array_data_pengajuan);
		$this->db->where('progress.jenis_progress = "kegiatan"');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	// =================BARANG================

	function get_barang(){ //menampilkan data seluruh barang
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('jenis_barang','jenis_barang.kode_jenis_barang = barang.kode_jenis_barang');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}

	}

	public function ubah_data_barang($id, $data){ //edit data diri
		$this->db->where('kode_barang', $id);
		$this->db->update('barang', $data);
		return TRUE;
	}

	function get_barang_by_kode_barang($kode_barang){ //menampilkan data seluruh barang
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('jenis_barang','jenis_barang.kode_jenis_barang = barang.kode_jenis_barang');
		$this->db->where('barang.kode_barang', $kode_barang);
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}

	}

	function get_ajukan_barang(){ //menampilkan pengajuan barang yang diajukan user sebagai pegwai
		$no_identitas = $this->session->userdata('no_identitas');
		$this->db->select('*');
		$this->db->from('item_pengajuan');
		$this->db->join('pengguna', 'pengguna.no_identitas = item_pengajuan.no_identitas');
		$this->db->join('barang', 'barang.kode_barang = item_pengajuan.kode_barang');
		$this->db->join('jenis_barang', 'jenis_barang.kode_jenis_barang = barang.kode_jenis_barang');
		$this->db->where('pengguna.no_identitas', $no_identitas);

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	} 

	public function get_pilihan_barang(){ // untuk menampilkan dropdown pilihan barang di halaman tambah pengajuan barang
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('jenis_barang', 'barang.kode_jenis_barang = jenis_barang.kode_jenis_barang');
		$query = $this->db->get();
		return $query;
	}

}  