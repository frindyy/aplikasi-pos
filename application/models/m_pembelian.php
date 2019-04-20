<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembelian extends CI_Model {

	public function insert_barang(){
		$kd_barang=$this->input->post('kd_barang');
		$nama_barang=$this->input->post('nama_barang');
		$warna=$this->input->post('warna');
		$ukuran=$this->input->post('ukuran');
		$qty=$this->input->post('qty');
		$kd_barang = $this->db->get_where('barang',array('kd_barang' => $kd_barang ))->row_array();
		
		$data=array(
				'kd_barang'=>$kd_barang['kd_barang'],
				'warna'=>$warna,
				'ukuran'=>$ukuran,
				'qty'=>$qty,
				'harga_beli'=>$kd_barang['harga_beli'],
				'total'=>$kd_barang['harga_beli']*$qty,
				'status'=>'0'
			);
		$this->db->insert('detail_pembelian',$data);
	}

	public function tampil_detail_penjualan(){
		$this->db->select('detail_pembelian.id_pembelian,barang.nama_barang,detail_pembelian.warna,detail_pembelian.ukuran,detail_pembelian.harga_beli,detail_pembelian.qty,detail_pembelian.total');
		$this->db->from('detail_pembelian');
		$this->db->join('barang','barang.kd_barang=detail_pembelian.kd_barang and status="0"');
		return $this->db->get();
	}

	public function buat_kode()   {    
		  $query = $this->db->query('select max(kode_pembelian) as kode from pembelian')->row_array();
		  $kode=substr($query['kode'], 3,5);
		  $jum=$kode+1;
		  if ($jum < 10) {
		  	$id='PEB0000'.$jum;
		  }else if($jum >= 10 && $jum < 100){
		  	$id='PEB000'.$jum;
		  }else if($jum >=100 && $jum < 1000){
		  	$id='PEB00'.$jum;
		  }else{
		  	$id='PEB0'.$jum;
		  }
		  return $id;
		 }

	public function hapus_detail_pembelian($id_pembelian){
		$this->db->where('id_pembelian',$id_pembelian);
		$this->db->delete('detail_pembelian');
	}

	public function selesai_belanja($data){
		$this->db->insert('pembelian',$data);
		$last_id = $this->db->query('select kode_pembelian from pembelian order by kode_pembelian desc')->row_array();
		 	$this->db->query('update detail_pembelian set kode_pembelian="'.$last_id['kode_pembelian'].'" where status="0"');
		 	$this->db->query('update detail_pembelian set status="1" where status="0"');
	}

	public function data_detail_pembelian(){
		$this->db->select('pembelian.kode_pembelian,pembelian.tgl_pembelian,pembelian.total_pembayaran');
	 	$this->db->from('pembelian');
	 	return $this->db->get();
	}

	 public function tampil_nota_pembelian($kode_pembelian){
		 	$this->db->select("pembelian.kode_pembelian,barang.nama_barang,detail_pembelian.kd_barang,detail_pembelian.warna,detail_pembelian.ukuran,detail_pembelian.harga_beli,detail_pembelian.qty,detail_pembelian.total");
		 	$this->db->from('pembelian');
		 	$this->db->join('detail_pembelian','pembelian.kode_pembelian=detail_pembelian.kode_pembelian');
		 	$this->db->join('barang','barang.kd_barang=detail_pembelian.kd_barang');
		 	$this->db->where('pembelian.kode_pembelian',$kode_pembelian);
		 	return $this->db->get()->result();
		 }

	 public function ambil_pembelian($kode_pembelian){
		 	$this->db->select('pembelian.kode_pembelian,pembelian.tgl_pembelian,karyawan.nama_karyawan,pembelian.total_bayar,pembelian.total_pembayaran');
		 	$this->db->from('pembelian');
		 	$this->db->join('karyawan','karyawan.nik=pembelian.nik');
		 	$this->db->where('kode_pembelian',$kode_pembelian);
		 	return $this->db->get();
		 }

	public function tampil_laporan_pembelian(){
		 	$this->db->select('detail_pembelian.kode_pembelian,pembelian.tgl_pembelian,barang.nama_barang,detail_pembelian.warna,detail_pembelian.ukuran,detail_pembelian.qty,detail_pembelian.harga_beli,detail_pembelian.total');
		 	$this->db->from('detail_pembelian');
		 	$this->db->join('pembelian','pembelian.kode_pembelian=detail_pembelian.kode_pembelian');
		 	$this->db->join('barang','barang.kd_barang=detail_pembelian.kd_barang');
		 	return $this->db->get();
		 }

	 public function laporan_periode($tanggal1,$tanggal2){
		 	$this->db->select('detail_pembelian.kode_pembelian,pembelian.tgl_pembelian,barang.nama_barang,detail_pembelian.kd_barang,detail_pembelian.warna,detail_pembelian.ukuran,detail_pembelian.qty,detail_pembelian.harga_beli,detail_pembelian.total');
		 	$this->db->from('detail_pembelian');
		 	$this->db->join('pembelian','pembelian.kode_pembelian=detail_pembelian.kode_pembelian');
		 	$this->db->join('barang','barang.kd_barang=detail_pembelian.kd_barang');
		 	$this->db->where('pembelian.tgl_pembelian >=',$tanggal1);
		 	$this->db->where('pembelian.tgl_pembelian <=',$tanggal2);
		 	return $this->db->get();
		 }

	public function semua_laporan(){
		 	$this->db->select('detail_pembelian.kode_pembelian,pembelian.tgl_pembelian,barang.nama_barang,detail_pembelian.kd_barang,detail_pembelian.warna,detail_pembelian.ukuran,detail_pembelian.qty,detail_pembelian.harga_beli,detail_pembelian.total');
		 	$this->db->from('detail_pembelian');
		 	$this->db->join('pembelian','pembelian.kode_pembelian=detail_pembelian.kode_pembelian');
		 	$this->db->join('barang','barang.kd_barang=detail_pembelian.kd_barang');
		 	return $this->db->get();
		 }

}

/* End of file m_pembelian.php */
/* Location: ./application/models/m_pembelian.php */