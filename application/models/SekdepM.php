<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SekdepM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function edit_data_diri($no_identitas, $data){ //edit data diri
		$this->db->where('no_identitas', $no_identitas);
		$this->db->update('pengguna', $data);
		return TRUE;
	}

	function get_kegiatan_diajukan(){ //ambil semua data kegiatan yang diajukan yang diajukan
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('pengguna', 'pengguna.no_identitas = kegiatan.no_identitas');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.kode_jenis_kegiatan = kegiatan.kode_jenis_kegiatan');
		$this->db->join('file_upload', 'file_upload.kode_kegiatan = kegiatan.kode_kegiatan');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	public function get_kegiatan_diajukan_by_id($id){ //ambil data kegiatan yang diajukan sesuai id
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('pengguna', 'pengguna.no_identitas = kegiatan.no_identitas');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.kode_jenis_kegiatan = kegiatan.kode_jenis_kegiatan');
		$this->db->join('file_upload', 'file_upload.kode_kegiatan = kegiatan.kode_kegiatan');
		$this->db->where('kegiatan.kode_kegiatan', $id);
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}	

	function insert_pengajuan_kegiatan($data){   //post pengguna_jabatan
		if($this->db->insert('kegiatan', $data)){
			return $this->db->insert_id(); //return last insert ID
		} 
	}  

	public function upload(){ // Fungsi untuk upload file ke folder
		$config['upload_path'] = './assets/file_upload';
		$config['allowed_types'] = 'pdf';
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

	public function update_kegiatan($kode_fk, $data_kegiatan){
		$this->db->where('kode_kegiatan', $kode_fk);
		$this->db->update('kegiatan' , $data_kegiatan);
		return TRUE;
	}
	public function gajadi_update($id){ //reset dana disetujui ke 0 ketika gagal insert
		$data = array('dana_disetujui' => 0, );
		$this->db->where('kode_kegiatan', $id);
		$this->db->update('kegiatan', $data);
		return "berhasil delete";
	}

}