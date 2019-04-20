<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function cek_user($data){
		$query = $this->db->get_where('karyawan',$data);
		return $query;
	}	

}

/* End of file m_auth.php */
/* Location: ./application/models/m_auth.php */