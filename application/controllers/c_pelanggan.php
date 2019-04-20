<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_pelanggan');
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {
			$this->session->set_flashdata('peringatan', '<div class="alert alert-danger">Maaf, Harus login terlebih dahulu</div>');
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		$data = array(
				'content' => 'pelanggan/v_pelanggan',
				'title' => 'Data Pelanggan',
				'hasil' => $this->m_pelanggan->get_pelanggan()->result_array()
			);
		$this->load->view('template', $data);		
	}

	public function tambah_pelanggan(){
		$data = array(
				'content' => 'pelanggan/tambah_pelanggan',
				'title' => 'Tambah Pelanggan',
			);
		$this->load->view('template', $data);
	}

	public function tambah_proses(){
		$this->form_validation->set_rules('id_pelanggan', 'Kode Pelanggan', 'required');
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Pelanggan', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric');
	// Jika Form validation salah akan di redirect di view Pelanggan
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pelanggan/tambah_pelanggan';
			$data['title'] = 'Tambah Data Pelanggan';
			$this->load->view('template',$data);
		} else {
	// Jika Form validation benar maka akan di masukan di database Pelanggan dan di tampilkan
			$id_pelanggan = $this->input->post('id_pelanggan');
			$nama_pelanggan = $this->input->post('nama_pelanggan');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');

			$data = array(
					'id_pelanggan' => $id_pelanggan,
					'nm_pelanggan' => $nama_pelanggan,
					'alamat' => $alamat,
					'no_telp' => $no_telp
				);

			$this->m_pelanggan->insert_data($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil di tambahkan</div>');
			redirect('c_pelanggan','refresh');
		}
	}

	public function edit_pelanggan($id_pelanggan){
		$data = array(
				'content' => 'pelanggan/edit_pelanggan',
				'title' => 'Edit Pelanggan',
				'pelanggan' => $this->m_pelanggan->get_pelanggan_id($id_pelanggan)->row_array()
			);
		$this->load->view('template', $data);
	}

	public function edit_proses(){
		
	// Jika Form validation benar maka akan di masukan di database Pelanggan dan di tampilkan
			$id_pelanggan = $this->input->post('id_pelanggan');
			$nama_pelanggan = $this->input->post('nama_pelanggan');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');

			$data = array(
					'id_pelanggan' => $id_pelanggan,
					'nm_pelanggan' => $nama_pelanggan,
					'alamat' => $alamat,
					'no_telp' => $no_telp
				);

			$this->m_pelanggan->update_pelanggan($id_pelanggan,$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Edit data pelanggan berhasil disimpan</div>');
			redirect('c_pelanggan','refresh');
	}

	public function hapus_pelanggan($id_pelanggan){
		$this->m_pelanggan->hapus_pelanggan($id_pelanggan);
		$this->session->set_flashdata("pesan","<div class='alert alert-danger'>data Pelanggan berhasil di Hapus !!!</div>");
		redirect('c_pelanggan','refresh');
	}

}

/* End of file c_pelanggan.php */
/* Location: ./application/controllers/c_pelanggan.php */