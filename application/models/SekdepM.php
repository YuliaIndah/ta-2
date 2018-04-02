<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SekdepM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function get_data_pengajuan(){
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('pengguna_jabatan', 'pengguna_jabatan.id_pengguna_jabatan = kegiatan.id_pengguna_jabatan');
		$this->db->join('pengguna', 'pengguna.no_identitas = pengguna_jabatan.no_identitas');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna_jabatan.kode_jabatan');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.kode_jenis_kegiatan = kegiatan.kode_jenis_kegiatan');
		$this->db->join('file_upload', 'file_upload.kode_kegiatan = kegiatan.kode_kegiatan');
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

	// Fungsi untuk upload file ke folder
	public function upload(){
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
	
	// Fungsi untuk menyimpan data ke database
	public function save($upload,$insert_id){
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

	public function edit_data_diri($no_identitas, $data){ //edit data diri
		$this->db->where('no_identitas', $no_identitas);
		$this->db->update('pengguna', $data);
		return TRUE;
	}
}