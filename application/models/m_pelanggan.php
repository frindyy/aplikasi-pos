<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

	public function get_pelanggan(){

		$this->db->select('*');
		$this->db->from('pelanggan');
		return $this->db->get();
	}

	public function buat_kode(){
		 $this->db->select('RIGHT(pelanggan.id_pelanggan,2) as kode', FALSE);
		  $this->db->order_by('id_pelanggan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pelanggan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else{      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
		  $kodejadi = "P-".$kodemax;    
		  return $kodejadi;  
	}

	public function insert_data($data){
		$this->db->insert('pelanggan',$data);
	}

	public function get_pelanggan_id($id_pelanggan){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan',$id_pelanggan);

		return $this->db->get();
	}

	public function update_pelanggan($id_pelanggan,$data){
		$this->db->where('id_pelanggan',$id_pelanggan);
		$this->db->update('pelanggan',$data);
	}

	public function hapus_pelanggan($id_pelanggan){
		$this->db->where('id_pelanggan',$id_pelanggan);
		$this->db->delete('pelanggan');
	}

}

/* End of file m_pelanggan.php */
/* Location: ./application/models/m_pelanggan.php */