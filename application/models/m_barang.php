<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	
	public function get_barang(){
		$this->db->select('*');
		$this->db->from('barang');
		return $this->db->get();
		
	}

	public function get_barang_by_id($kd_barang){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('kd_barang',$kd_barang);
		return $this->db->get();
		
	}

	public function buat_kode(){
		 $this->db->select('RIGHT(barang.kd_barang,2) as kode', FALSE);
		  $this->db->order_by('kd_barang','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('barang');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "kb-".$kodemax;    
		  return $kodejadi;  
	}

	public function insert_data($data){
		$this->db->insert('barang',$data);
	}

	public function update_barang($kd_barang,$data){
		$this->db->where('kd_barang',$kd_barang);
		$this->db->update('barang',$data);
	}

	public function hapus_barang($kd_barang){
		$this->db->where('kd_barang',$kd_barang);
		$this->db->delete('barang');
	}

}

/* End of file m_barang.php */
/* Location: ./application/models/m_barang.php */