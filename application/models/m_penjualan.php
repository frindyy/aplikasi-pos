<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	public function cari_barang_get_one($kd_barang){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('kd_barang',$kd_barang);

		return $this->db->get();
	}

	public function insert_barang(){
		$kd_barang=$this->input->post('kd_barang');
		$nama_barang=$this->input->post('nama_barang');
		$warna=$this->input->post('warna');
		$ukuran=$this->input->post('ukuran');
		$qty=$this->input->post('qty');
		$kd_barang = $this->db->get_where('barang',array('kd_barang' => $kd_barang ))->row_array();
		if ($qty > $kd_barang['stock']) {
			echo "<script>
						alert('Stock barang habis,Silakan tambah stock barang terlebih dahulu!!');
				  </script>";
				  redirect('c_penjualan','refresh');
		}else{
		$data=array(
				'kd_barang'=>$kd_barang['kd_barang'],
				'warna'=>$warna,
				'ukuran'=>$ukuran,
				'qty'=>$qty,
				'harga_jual'=>$kd_barang['harga_jual'],
				'total'=>$kd_barang['harga_jual']*$qty,
				'status'=>'0'
			);
		$this->db->insert('detail_penjualan',$data);
		}	
	}
	public function tampil_detail_penjualan(){
		$this->db->select('detail_penjualan.id_penjualan,barang.nama_barang,detail_penjualan.warna,detail_penjualan.ukuran,detail_penjualan.harga_jual,detail_penjualan.qty,detail_penjualan.total');
		$this->db->from('detail_penjualan');
		$this->db->join('barang','barang.kd_barang=detail_penjualan.kd_barang and status="0"');
		return $this->db->get();
	}

	public function delete_detail_penjualan($id_penjualan){
		$this->db->where('id_penjualan',$id_penjualan);
		$this->db->delete('detail_penjualan');
	}

	public function buat_kode()   {    
		  $query = $this->db->query('select max(kode_penjualan) as kode from penjualan')->row_array();
		  $kode=substr($query['kode'], 3,5);
		  $jum=$kode+1;
		  if ($jum < 10) {
		  	$id='PEN0000'.$jum;
		  }else if($jum >= 10 && $jum < 100){
		  	$id='PEN000'.$jum;
		  }else if($jum >=100 && $jum < 1000){
		  	$id='PEN00'.$jum;
		  }else{
		  	$id='PEN0'.$jum;
		  }
		  return $id;
		 }

		 public function selesai_belanja($data){
		 	$this->db->insert('penjualan',$data);
		 	$last_id = $this->db->query('select kode_penjualan from penjualan order by kode_penjualan desc')->row_array();
		 	$this->db->query('update detail_penjualan set kode_penjualan="'.$last_id['kode_penjualan'].'" where status="0"');
		 	$this->db->query('update detail_penjualan set status="1" where status="0"');
		 }

		 public function data_detail_penjualan(){
		 	$this->db->select('penjualan.kode_penjualan,penjualan.tgl_penjualan,penjualan.total_pembayaran,pelanggan.nm_pelanggan');
		 	$this->db->from('penjualan');
		 	$this->db->join('pelanggan','pelanggan.id_pelanggan=penjualan.id_pelanggan');
		 	return $this->db->get();
		 }

		 public function tampil_nota_penjualan($kode_penjualan){
		 	$this->db->select("penjualan.kode_penjualan,barang.nama_barang,detail_penjualan.kd_barang,detail_penjualan.warna,detail_penjualan.ukuran,detail_penjualan.harga_jual,detail_penjualan.qty,detail_penjualan.total");
		 	$this->db->from('penjualan');
		 	$this->db->join('detail_penjualan','penjualan.kode_penjualan=detail_penjualan.kode_penjualan');
		 	$this->db->join('barang','barang.kd_barang=detail_penjualan.kd_barang');
		 	$this->db->where('penjualan.kode_penjualan',$kode_penjualan);
		 	return $this->db->get()->result();
		 }

		 public function ambil_penjualan($kode_penjualan){
		 	$this->db->select('penjualan.kode_penjualan,penjualan.tgl_penjualan,karyawan.nama_karyawan,pelanggan.nm_pelanggan,penjualan.total_bayar,penjualan.total_pembayaran');
		 	$this->db->from('penjualan');
		 	$this->db->join('karyawan','karyawan.nik=penjualan.nik');
		 	$this->db->join('pelanggan','pelanggan.id_pelanggan=penjualan.id_pelanggan');
		 	$this->db->where('kode_penjualan',$kode_penjualan);
		 	return $this->db->get();
		 }

		 public function tampil_laporan_penjualan(){
		 	$this->db->select('detail_penjualan.kode_penjualan,penjualan.tgl_penjualan,barang.nama_barang,barang.provit,detail_penjualan.kd_barang,detail_penjualan.warna,detail_penjualan.ukuran,detail_penjualan.qty,detail_penjualan.harga_jual,detail_penjualan.total');
		 	$this->db->from('detail_penjualan');
		 	$this->db->join('penjualan','penjualan.kode_penjualan=detail_penjualan.kode_penjualan');
		 	$this->db->join('barang','barang.kd_barang=detail_penjualan.kd_barang');
		 	return $this->db->get();
		 }

		 public function laporan_periode($tanggal1,$tanggal2){
		 	$this->db->select('detail_penjualan.kode_penjualan,penjualan.tgl_penjualan,barang.nama_barang,barang.provit,barang.harga_beli,detail_penjualan.kd_barang,detail_penjualan.warna,detail_penjualan.ukuran,detail_penjualan.qty,detail_penjualan.harga_jual,detail_penjualan.total');
		 	$this->db->from('detail_penjualan');
		 	$this->db->join('penjualan','penjualan.kode_penjualan=detail_penjualan.kode_penjualan');
		 	$this->db->join('barang','barang.kd_barang=detail_penjualan.kd_barang');
		 	$this->db->where('penjualan.tgl_penjualan >=',$tanggal1);
		 	$this->db->where('penjualan.tgl_penjualan <=',$tanggal2);
		 	return $this->db->get();
		 }

		 public function semua_laporan(){
		 	$this->db->select('detail_penjualan.kode_penjualan,penjualan.tgl_penjualan,barang.nama_barang,barang.provit,barang.harga_beli,detail_penjualan.kd_barang,detail_penjualan.warna,detail_penjualan.ukuran,detail_penjualan.qty,detail_penjualan.harga_jual,detail_penjualan.total');
		 	$this->db->from('detail_penjualan');
		 	$this->db->join('penjualan','penjualan.kode_penjualan=detail_penjualan.kode_penjualan');
		 	$this->db->join('barang','barang.kd_barang=detail_penjualan.kd_barang');
		 	return $this->db->get();
		 }
}

/* End of file m_penjualan.php */
/* Location: ./application/models/m_penjualan.php */