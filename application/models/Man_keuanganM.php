<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Man_keuanganM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function get_data_pengajuan($kode_jenis_kegiatan, $kode_unit, $kode_jabatan){ //ambil semua data kegiatan yang diajukan 
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.kode_jenis_kegiatan = kegiatan.kode_jenis_kegiatan');
		$this->db->join('file_upload', 'file_upload.kode_kegiatan = kegiatan.kode_kegiatan');
		$this->db->where('jenis_kegiatan.kode_jenis_kegiatan', $kode_jenis_kegiatan);
		if($kode_jenis_kegiatan == 2){ //kegiatan mahasiswa
			$this->db->join('progress', 'progress.kode_fk = kegiatan.kode_kegiatan');
			$this->db->join('pengguna', 'pengguna.no_identitas = progress.no_identitas');
			$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
			$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
			$this->db->where('unit.kode_unit', $kode_unit);
			$this->db->where('jabatan.kode_jabatan', $kode_jabatan);
			$this->db->where('progress.jenis_progress = "kegiatan"');//jenis progress kegiatan bukan barang
			$this->db->where('progress.kode_nama_progress = "1"'); //kegiatan yang diterima

		}else{ //kegiatan pegawai
			$this->db->join('progress', 'progress.kode_fk = kegiatan.kode_kegiatan');
			$this->db->join('pengguna', 'pengguna.no_identitas = progress.no_identitas');
			$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
			$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
			$this->db->where('unit.kode_unit = "1"'); //departemen
			$this->db->where('jabatan.kode_jabatan = "1"'); //kepala
			$this->db->where('progress.jenis_progress = "kegiatan"');//jenis progress kegiatan bukan barang
			$this->db->where('progress.kode_nama_progress = "1"'); //kegiatan yang diterima
		}
		
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	function get_data_pengajuan_staf(){ //ambil semua kegiatan yang diajukan staf
		$kode_unit = 3; //keuangan
		$kode_jabatan = 4;  //staf
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('pengguna', 'pengguna.no_identitas = kegiatan.no_identitas');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.kode_jenis_kegiatan = kegiatan.kode_jenis_kegiatan');
		$this->db->join('file_upload', 'file_upload.kode_kegiatan = kegiatan.kode_kegiatan');
		$this->db->where('unit.kode_unit', $kode_unit);
		$this->db->where('jabatan.kode_jabatan', $kode_jabatan);
		$this->db->where('jenis_kegiatan.kode_jenis_kegiatan = 1'); //kegiatan pegawai

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	public function get_data_pengajuan_by_id($id){ //ambil data kegiatan yang diajukan sesuai id
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