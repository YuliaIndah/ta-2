<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Man_keuanganM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function get_data_pengajuan($kode_jenis_kegiatan){ //ambil semua data kegiatan yang diajukan 
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.kode_jenis_kegiatan = kegiatan.kode_jenis_kegiatan');
		$this->db->join('file_upload', 'file_upload.kode_kegiatan = kegiatan.kode_kegiatan');
		$this->db->where('jenis_kegiatan.kode_jenis_kegiatan', $kode_jenis_kegiatan);
		if($kode_jenis_kegiatan == 2){ //kegiatan mahasiswa
			$this->db->join('pengguna', 'pengguna.no_identitas = kegiatan.no_identitas');
			$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
			$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
		}else{ //kegiatan pegawai
			$this->db->join('pengguna', 'pengguna.no_identitas = kegiatan.no_identitas');
			$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
			$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
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
}