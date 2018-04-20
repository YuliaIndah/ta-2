<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class KadepM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	function get_data_pengguna(){ //ambil data seluruh pengguna yang terdaftar
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
		$query = $this->db->get(); 
		return $query;
	}

	function get_data_pengajuan($kode_jenis_kegiatan, $kode_unit, $kode_jabatan){ //ambil semua data pengajuan yang diajukan
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
			$this->db->where('progress.jenis_progress = "kegiatan"'); //jenis progress kegiatan bukan barang
			$this->db->where('progress.kode_nama_progress = "1"'); //kegiatan yang diterima
		}else{ //kegiatan pegawai
			$this->db->join('progress', 'progress.kode_fk = kegiatan.kode_kegiatan');
			$this->db->join('pengguna', 'pengguna.no_identitas = progress.no_identitas');
			$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna.kode_jabatan');
			$this->db->join('unit', 'unit.kode_unit = pengguna.kode_unit');
			$this->db->where('kegiatan.pimpinan = progress.no_identitas');
			$this->db->where('progress.kode_nama_progress = "1"'); //kegiatan yang diterima
			
		}
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	public function get_data_pengajuan_by_id($id){ //ambil data pengajuan sesuai id
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

	public function aktif($no_identitas){ //aktifasi akun pengguna
		$status = "aktif";
		$data = array('status' =>$status,);

		$this->db->where('no_identitas', $no_identitas);
		$this->db->update('pengguna', $data);
		return;
	}

	public function non_aktif($no_identitas){ //deaktifasi akun pengguna
		$status = "tidak aktif";
		$data = array('status' =>$status,);

		$this->db->where('no_identitas', $no_identitas);
		$this->db->update('pengguna', $data);
		return;
	}

	public function hapus($id){//hapus persetujuan kegiatan
		$this->db->where('kode_acc_kegiatan', $id);
		$this->db->delete('acc_kegiatan');
		return "berhasil";
	}

	public function get_status(){
		$this->db->select('*');
		
	}
	
}