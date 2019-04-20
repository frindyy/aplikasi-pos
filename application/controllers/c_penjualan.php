<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('fpdf');
		$this->load->model(array('m_barang','m_penjualan'));
		$logged_in = $this->session->userdata('logged_in');
	//Jika tidak ada session login akan menampilkan pesan dan di redirect ke tampilan form login
		if (!$logged_in) {
			$this->session->set_flashdata('peringatan', '<div class="alert alert-danger">Maaf, Harus login terlebih dahulu</div>');
			redirect('auth','refresh');
		}
	}

	public function index()
	{
	// Jika Tombol submit di tekan data akan dimasukan di database
		if (isset($_POST['submit'])) {
			$this->m_penjualan->insert_barang();
			redirect('c_penjualan','refresh');
		}else{
		// Menampilkan Detail penjualan dari database
			$data['content'] = 'penjualan/form_penjualan';
			$data['title']='Form Transaksi penjualan';
			$data['detail'] = $this->m_penjualan->tampil_detail_penjualan()->result_array();
		//menampilkan Kode secara ber Urut misal kbg001
			$data['kode_unik'] = $this->m_penjualan->buat_kode();
			$this->load->view('template',$data);
		}
	}

	public function cari_barang(){
		$data['content'] = 'penjualan/form_cari_barang';
		$data['title'] = 'cari barang';
		$data['barang'] = $this->m_barang->get_barang();
		$this->load->view('template',$data);
	}

	public function pilih_barang($kd_barang){
		$data['content'] = 'penjualan/form_penjualan_id';
		$data['title'] = 'Pilih Barang';
		$data['barang'] = $this->m_barang->get_barang_by_id($kd_barang)->row();
		$this->load->view('template',$data);
	}

	public function hapus_item($id_penjualan){
		$datpen = $this->db->get_where('detail_penjualan',array('id_penjualan'=>$id_penjualan))->row_array();
		$databar = $this->db->query('select stock from barang where kd_barang="'.$datpen['kd_barang'].'"')->row_array();
		$stock = $datpen['qty']+$databar['stock'];
		$kdbar = $datpen['kd_barang'];
		$this->db->query('update barang set stock="'.$stock.'" where kd_barang = "'.$kdbar.'"');
		$this->m_penjualan->delete_detail_penjualan($id_penjualan);
		redirect('c_penjualan','refresh');
	}

	public function selesai_belanja(){
		
		if (isset($_POST['simpan'])) {
			$total_diskon = 0;
			$subtotal = $this->db->query("SELECT sum(total) as jumlah FROM detail_penjualan WHERE status='0'")->row_array();
			$qty = $this->db->query("select qty from detail_penjualan where status='0'")->row_array();
			if ($qty > 6) {
					$total_diskon = ($subtotal['jumlah']*3)/100;
				}else{
					$total_diskon = $subtotal['jumlah'];
				}
			$kode_penjualan = $_POST['kode_penjualan'];
			$tgl_penjualan = $_POST['tgl_penjualan'];
			$total_bayar = $_POST['total_bayar'];
			$nama_pelanggan = $_POST['nama_pelanggan'];
			$user=$this->session->userdata('username');
			$nik_karyawan=$this->db->get_where('karyawan',array('username'=>$user))->row_array();

			if ($_POST['total_bayar'] < $total_diskon) {
				echo "<script>
						alert('Total Bayar Tidak Cukup!');
					</script>";
					redirect('c_penjualan','refresh');
			}else{
				$data = array(
					'kode_penjualan'=>$kode_penjualan,
					'tgl_penjualan'=>$tgl_penjualan,
					'nik'=>$nik_karyawan['nik'],
					'id_pelanggan'=>$nama_pelanggan,
					'total_bayar'=>$total_bayar,
					'total_pembayaran'=>$subtotal['jumlah']
				);
			$this->m_penjualan->selesai_belanja($data);
			$this->session->set_flashdata("pesan","<div class='alert alert-success'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>tambah data berhasil 
				<a href='".base_url('c_penjualan/cetak_detail_penjualan/'.$kode_penjualan)."' target='blank' class='btn btn-success'> Cetak Nota </a>
				</div>");
			redirect('c_penjualan','refresh');
			}			
		}
	}

	public function data_penjualan(){
		$data['content'] = 'penjualan/v_detail_penjualan';
		$data['title'] = 'Detail Transaksi Penjualan';
		$data['hasil'] = $this->m_penjualan->data_detail_penjualan();
		$this->load->view('template', $data);
	}
		
	public function cetak_detail_penjualan($kode_penjualan){
		
		$data['hasil'] = $this->m_penjualan->tampil_nota_penjualan($kode_penjualan);
		$data['tam'] = $this->m_penjualan->ambil_penjualan($kode_penjualan)->row();
		$this->load->view('penjualan/cetak_detail_penjualan',$data);
	}	

	public function laporan_penjualan(){
		
			$data['content'] = 'penjualan/v_laporan_penjualan';
			$data['title'] = 'Laporan Penjualan';
			$data['hasil'] = $this->m_penjualan->tampil_laporan_penjualan();
			$this->load->view('template',$data);
	}

	public function cetak_laporan(){
		if (isset($_POST['cetak'])) {
			$tanggal1 = $_POST['tanggal1'];
			$tanggal2 = $_POST['tanggal2'];
			$data['hasil'] = $this->m_penjualan->laporan_periode($tanggal1,$tanggal2)->result();
			$this->load->view('penjualan/cetak_laporan', $data);
		}else{
		$data['hasil'] = $this->m_penjualan->semua_laporan()->result();
		$this->load->view('penjualan/cetak_laporan', $data);
		}
	}
}

/* End of file c_penjualan.php */
/* Location: ./application/controllers/c_penjualan.php */