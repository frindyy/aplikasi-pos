<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public function hitung_karyawan(){
		$query = $this->db->query("select nik from karyawan");
		$total = $query->num_rows();
		return $total;
	}

	public function hitung_pelanggan(){
		$query = $this->db->query("select id_pelanggan from pelanggan");
		$total = $query->num_rows();
		return $total;
	}

	public function penjualan_hari_ini(){
		$date = date('Y-m-d');
		$query = $this->db->query("select kode_penjualan from penjualan where tgl_penjualan='".$date."'");
		$total = $query->num_rows();
		return $total;
	}

	public function pembelian_hari_ini(){
		$date = date('Y-m-d');
		$query = $this->db->query("select kode_pembelian from pembelian where tgl_pembelian='".$date."'");
		$total = $query->num_rows();
		return $total;
	}

}

/* End of file m_dashboard.php */
/* Location: ./application/models/m_dashboard.php */