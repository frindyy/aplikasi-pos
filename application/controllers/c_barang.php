<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {
			$this->session->set_flashdata('peringatan', '<div class="alert alert-danger">Maaf, Harus login terlebih dahulu</div>');
			redirect('auth','refresh');
		}
		if ($this->session->userdata('level')!=='admin') {
			show_404();
		}
	}

	public function index()
	{
		$data = array(
				'content' => 'barang/v_barang',
				'title' => 'Data Barang',
				'hasil' => $this->m_barang->get_barang()->result_array()
			);
		$this->load->view('template',$data);
	}

	public function tambah_barang(){
		$data['content'] = 'barang/form_tambah';
		$data['title'] = 'Tambah Data Barang';
		$this->load->view('template', $data);
	}

	public function tambah_proses(){
		$this->form_validation->set_rules('kd_barang', 'Kode barang', 'required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('warna', 'Warna Kaos', 'required');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
		$this->form_validation->set_rules('provit', 'provit', 'required');
	// Jika Form validation salah akan di redirect di view Barang
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'barang/form_tambah';
			$data['title'] = 'Tambah Data Barang';
			$this->load->view('template',$data);
		} else {
	// Jika Form validation benar maka akan di masukan di database Barang dan di tampilkan
			$kd_barang = $this->input->post('kd_barang');
			$nama_barang = $this->input->post('nama_barang');
			$ukuran = $this->input->post('ukuran');
			$warna = $this->input->post('warna');
			$harga_beli = $this->input->post('harga_beli');
			$harga_jual = $this->input->post('harga_jual');
			$provit = $this->input->post('provit');

			$data = array(
					'kd_barang' => $kd_barang,
					'nama_barang' => $nama_barang,
					'ukuran' => $ukuran,
					'warna' => $warna,
					'harga_beli' => $harga_beli,
					'harga_jual' => $harga_jual,
					'provit' => $provit,
					'stock' => 0
				);

			$this->m_barang->insert_data($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil di tambahkan</div>');
			redirect('c_barang/index','refresh');
		}
	}
		
	public function edit_barang($kd_barang){
		$data['content'] = 'barang/edit_barang';
		$data['title'] = 'Edit Barang';
		$data['barang'] = $this->m_barang->get_barang_by_id($kd_barang)->row_array();
		$this->load->view('template', $data);
	}	

	public function proses_edit_barang(){
		$kd_barang = $this->input->post('kd_barang');
		$nama_barang = $this->input->post('nama_barang');
		$ukuran = $this->input->post('ukuran');
		$warna = $this->input->post('warna');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$stock = $this->input->post('stock');

		$data = array(
				'nama_barang' => $nama_barang,
				'ukuran' => $ukuran,
				'warna' => $warna,
				'harga_beli' => $harga_beli,
				'harga_jual' => $harga_jual,
				'stock' => $stock
			);
		$this->m_barang->update_barang($kd_barang,$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Edit data Barang berhasil</div>');
		redirect('c_barang','refresh');
	}

	public function hapus_barang($kd_barang){
		$this->m_barang->hapus_barang($kd_barang);
		$this->session->set_flashdata("pesan","<div class='alert alert-danger'>data Barang berhasil di Hapus !!!</div>");
		redirect('c_barang','refresh');
	}

	public function cetak_pdf(){
		$data['hasil'] = $this->m_barang->get_barang()->result();
		$this->load->view('barang/cetak_pdf', $data);
	}

	public function cetak_exel(){
		header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
		$data = array(
				'hasil' => $this->m_barang->get_barang()->result_array()
			);
		$this->load->view('barang/cetak_exel',$data);
	}
			
}

/* End of file c_barang.php */
/* Location: ./application/controllers/c_barang.php */