<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('fpdf');
		$this->load->model(array('m_barang','m_pembelian'));
		$logged_in = $this->session->userdata('logged_in');
	//Jika tidak ada session login akan menampilkan pesan dan di redirect ke tampilan form login
		if (!$logged_in) {
			$this->session->set_flashdata('peringatan', '<div class="alert alert-danger">Maaf, Harus login terlebih dahulu</div>');
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		if (isset($_POST['submit'])) {
			$this->m_pembelian->insert_barang();
			redirect('c_pembelian','refresh');
		}else{
		$data['content'] = 'pembelian/form_pembelian';
		$data['title'] = 'Form Transaksi Pembelian';
		$data['detail'] = $this->m_pembelian->tampil_detail_penjualan()->result_array();
		//menampilkan Kode secara ber Urut misal PEB001
		$data['kode_unik'] = $this->m_pembelian->buat_kode();
		$this->load->view('template', $data);
		}
	}

	public function cari_barang(){
		$data['content'] = 'pembelian/form_cari_barang';
		$data['title'] = 'Cari Barang';
		$data['barang'] = $this->m_barang->get_barang();
		$this->load->view('template',$data);
	}

	public function pilih_barang($kd_barang){
		$data['content'] = 'pembelian/form_pembelian_id';
		$data['title'] = 'Pilih Barang';
		$data['barang'] = $this->m_barang->get_barang_by_id($kd_barang)->row();
		$this->load->view('template',$data);
	}

	public function hapus_item($id_pembelian){
		$datpen = $this->db->get_where('detail_pembelian',array('id_pembelian'=>$id_pembelian))->row_array();
		$databar = $this->db->query('select stock from barang where kd_barang="'.$datpen['kd_barang'].'"')->row_array();
		$stock = $databar['stock']-$datpen['qty'];
		$kdbar = $datpen['kd_barang'];
		$this->db->query('update barang set stock="'.$stock.'" where kd_barang = "'.$kdbar.'"');
		$this->m_pembelian->hapus_detail_pembelian($id_pembelian);
		redirect('c_pembelian','refresh');
	}

	public function selesai_belanja(){
		if (isset($_POST['simpan'])) {

			$subtotal = $this->db->query("SELECT sum(total) as jumlah FROM detail_pembelian WHERE status='0'")->row_array();
			$kode_pembelian = $_POST['kode_pembelian'];
			$tgl_pembelian = $_POST['tgl_pembelian'];
			$total_bayar = $_POST['total_bayar'];
			$user=$this->session->userdata('username');
			$nik_karyawan=$this->db->get_where('karyawan',array('username'=>$user))->row_array();

			if ($_POST['total_bayar'] < $subtotal['jumlah']) {
				echo "<script>
						alert('Total Bayar Tidak Cukup!');
					</script>";
					redirect('c_pembelian','refresh');
			}else{
				$data = array(
					'kode_pembelian'=>$kode_pembelian,
					'tgl_pembelian'=>$tgl_pembelian,
					'nik'=>$nik_karyawan['nik'],
					'total_bayar'=>$total_bayar,
					'total_pembayaran'=>$subtotal['jumlah']
				);
			$this->m_pembelian->selesai_belanja($data);
			$this->session->set_flashdata("pesan","<div class='alert alert-success'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>tambah data berhasil 
				<a href='".base_url('c_pembelian/cetak_detail_pembelian/'.$kode_pembelian)."' target='blank' class='btn btn-success'> Cetak Nota </a>
				</div>");
			redirect('c_pembelian','refresh');
			}			
		}
	}

	public function data_pembelian(){
		$data['content'] = 'pembelian/v_detail_pembelian';
		$data['title'] = 'Detail Transaksi Pembelian';
		$data['hasil'] = $this->m_pembelian->data_detail_pembelian();
		$this->load->view('template', $data);
	}

	public function cetak_detail_pembelian($kode_pembelian){
		$data['hasil'] = $this->m_pembelian->tampil_nota_pembelian($kode_pembelian);
		$data['tam'] = $this->m_pembelian->ambil_pembelian($kode_pembelian)->row();
		$this->load->view('pembelian/cetak_detail_pembelian', $data);
	}

	public function laporan_pembelian(){
		$data['content'] = 'pembelian/v_laporan_pembelian';
		$data['title'] = 'Laporan Pembelian';
		$data['hasil'] = $this->m_pembelian->tampil_laporan_pembelian();
		$this->load->view('template', $data);
	}

	public function cetak_laporan(){
		if (isset($_POST['cetak'])) {
		$tanggal1 = $_POST['tanggal1'];
		$tanggal2 = $_POST['tanggal2'];
		$data['hasil'] = $this->m_pembelian->laporan_periode($tanggal1,$tanggal2)->result();
		$this->load->view('pembelian/cetak_laporan', $data);
		}else{
		$data['hasil'] = $this->m_pembelian->semua_laporan()->result();
		$this->load->view('pembelian/cetak_laporan', $data);
		}
	}
}

/* End of file c_pembelian.php */
/* Location: ./application/controllers/c_pembelian.php */