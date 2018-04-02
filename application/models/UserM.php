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
	public function get_pilihan_jabatan(){ //mengambil jabatan dari db jabatan
		$query = $this->db->get('jabatan');	
		return $query;
	}
	public function get_pilihan_unit(){
		$query = $this->db->get('unit');
		return $query;
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
}  