<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

	public function get_karyawan(){
		$this->db->select('karyawan.nik,karyawan.gambar,karyawan.nama_karyawan,bagian.nama_bagian
			,karyawan.tanggal_masuk,karyawan.alamat,karyawan.no_telp,karyawan.username,karyawan.password,karyawan.level');
		$this->db->from('karyawan');
		$this->db->join('bagian','bagian.kode_bagian=karyawan.kode_bagian');
		return $this->db->get();
	}

	public function insert_data($my_table,$data){
		$res = $this->db->insert($my_table,$data);
		return $res;
	}

	public function select_by_id($nik){
		$this->db->select('karyawan.nik,karyawan.gambar,karyawan.nama_karyawan,bagian.nama_bagian
			,karyawan.tanggal_masuk,karyawan.alamat,karyawan.no_telp,karyawan.username,karyawan.password,karyawan.level');
		$this->db->from('karyawan');
		$this->db->join('bagian','bagian.kode_bagian=karyawan.kode_bagian');
		$this->db->where('nik',$nik);
		return $this->db->get();
	}

	public function hapus_karyawan($nik){
		$this->db->where('nik',$nik);
		$this->db->delete('karyawan');
	}

	public function get_karyawan_id($nik){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->where('nik',$nik);

		return $this->db->get();
	}
	public function update($nik,$data){
		$this->db->where('nik',$nik);
		$this->db->update('karyawan',$data);
	}

}

/* End of file m_karyawan.php */
/* Location: ./application/models/m_karyawan.php */