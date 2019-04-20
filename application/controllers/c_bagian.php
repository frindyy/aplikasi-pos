<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bagian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_bagian');
		$logged_in = $this->session->userdata('logged_in');
		//Jika tidak ada session login akan menampilkan pesan
		if (!$logged_in) {
			$this->session->set_flashdata('peringatan', '<div class="alert alert-danger">Maaf, Harus login terlebih dahulu</div>');
			redirect('auth','refresh');
		}
		//Jika session tidak admin akan menampilkan error
		if ($this->session->userdata('level')!=='admin') {
			show_404();
		}
	}
	// menampilkan view data bagian
	public function index()
	{
		$data['content'] = 'bagian/v_bagian';
		$data['title']='Data Bagian';
		$data['hasil'] = $this->m_bagian->get_bagian();
		
		$this->load->view('template',$data);
	}
	// Tambah data bagian
	public function tambah_bagian(){
		
		$data['content'] = 'bagian/form_tambah';
		$data['title']='Tambah Data Bagian';
		$this->load->view('template', $data);
	}
	// Proses Tambah Bagian
	public function tambah_proses(){
	// Membuat Form Validasi
		$this->form_validation->set_rules('kode_bagian', 'Kode Bagian', 'required');
		$this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required|max_length[12]');
	// Jika Form validation salah akan di redirect di view Bagian
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'bagian/form_tambah';
			$data['title'] = 'Tambah Data Bagian';
			$this->load->view('template',$data);
		} else {
	// Jika Form validation benar maka akan di masukan di database bagian dan di tampilkan
			$kode_bagian = $this->input->post('kode_bagian');
			$nama_bagian = $this->input->post('nama_bagian');

			$data = array(
					'kode_bagian' => $kode_bagian,
					'nama_bagian' => $nama_bagian
				);

			$res = $this->m_bagian->insert_data('bagian',$data);
			if ($res > 0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil di tambahkan</div>');
				redirect('c_bagian/index','refresh');
			}else{
				echo "insert data gagal";
			}
			
		}
	}
	// Edit data Bagian
	public function edit_bagian($kode_bagian){
		$data['bagian'] = $this->m_bagian->get_bagian_id($kode_bagian)->row_array();
		$data['title'] = 'Edit Bagian';
		$data['content'] = 'bagian/edit_bagian';
		$this->load->view('template', $data);
	}
	// Proses Update Data Bagian
	public function proses_edit_bagian(){
		$kode_bagian=$this->input->post('kode_bagian');
		$nama_bagian=$this->input->post('nama_bagian');
		
		$data=array(
				'nama_bagian' => $nama_bagian
			);
		$this->m_bagian->update_bagian($kode_bagian,$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Edit data Bagian berhasil</div>');
		redirect('c_bagian','refresh');
	}
	// Hapus Data Bagian
	public function hapus_bagian($kode_bagian){
		$this->m_bagian->hapus_bagian($kode_bagian);
		$this->session->set_flashdata("pesan","<div class='alert alert-danger'>data bagian berhasil di Hapus !!!</div>");
		redirect('c_bagian','refresh');
	}

}

/* End of file c_bagian.php */
/* Location: ./application/controllers/c_bagian.php */