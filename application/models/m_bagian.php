<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bagian extends CI_Model {


	public function get_bagian(){
		$this->db->select('*');
		$this->db->from('bagian');
		return $this->db->get();
					
	}

	public function insert_data($my_table,$data){
		$res = $this->db->insert($my_table,$data);
		return $res;
	}

	public function buat_kode()   {    
		  $this->db->select('RIGHT(bagian.kode_bagian,2) as kode', FALSE);
		  $this->db->order_by('kode_bagian','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('bagian');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else{      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		  $kodejadi = "kbg".$kodemax;    
		  return $kodejadi;  
		 }

		 public function get_bagian_id($kode_bagian){
		 	$this->db->select('*');
		 	$this->db->from('bagian');
		 	$this->db->where('kode_bagian',$kode_bagian);

		 	return $this->db->get();
		 }

		 public function update_bagian($kode_bagian,$data){
		 	$this->db->where('kode_bagian',$kode_bagian);
		 	$this->db->update('bagian',$data);
		 }

		 public function hapus_bagian($kode_bagian){
		 	$this->db->where('kode_bagian',$kode_bagian);
		 	$this->db->delete('bagian');
		 }

}

/* End of file m_bagian.php */
/* Location: ./application/models/m_bagian.php */