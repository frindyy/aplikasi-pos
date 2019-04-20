<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_karyawan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_karyawan');
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
				'content' => 'karyawan/v_karyawan',
				'title' => 'Data Karyawan',
				'hasil' => $this->m_karyawan->get_karyawan()->result_array()
			);
		$this->load->view('template', $data);
	}

	public function tambah_karyawan(){
		$data['content'] = 'karyawan/form_tambah';
		$data['title'] = 'Tambah Karyawan';
		$data['error'] = '';
		$this->load->view('template', $data);
	}

	public function tambah_proses(){

		$config['upload_path'] = './foto/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '1024';
		$config['file_name']      = 'userfile-'.trim(str_replace(" ","",date('dmYHis')));

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$data = array(
					'content' => 'karyawan/form_tambah',
					'title' => 'Tambah Karyawan'
				);
			$this->session->set_flashdata('error', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
			$this->load->view('template', $data);
		}
		else
		{
			$nik = $this->input->post('nik');
			$img=$this->upload->data();
			$gambar=$img['file_name'];
			$nama_karyawan = $this->input->post('nama_karyawan');
			$nama_bagian = $this->input->post('nama_bagian');
			$tanggal_masuk = $this->input->post('tanggal_masuk');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$level = $this->input->post('level');

			$data = array(
					'nik' => $nik,
					'gambar' => $gambar,
					'nama_karyawan' => $nama_karyawan,
					'kode_bagian' => $nama_bagian,
					'tanggal_masuk' => $tanggal_masuk,
					'alamat' => $alamat,
					'no_telp' => $no_telp,
					'username' => $username,
					'password' => md5($password),
					'pass' => $password,
					'level' => $level
				);
			$res = $this->m_karyawan->insert_data('karyawan',$data);
			if ($res > 0) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil ditambahkan</div>');
				redirect('c_karyawan','refresh');
			}else{
				echo "insert data gagal";
			}
		}
	}
		
	public function detail_karyawan($nik){
		$data['content'] = 'karyawan/detail_karyawan';
		$data['title'] = 'Detail Karyawan';
		$data['detail'] = $this->m_karyawan->select_by_id($nik)->row_array();
		$this->load->view('template',$data);
	}
		
	public function hapus_karyawan($nik){
		$this->m_karyawan->hapus_karyawan($nik);
		$this->session->set_flashdata("pesan","<div class='alert alert-danger'>data Karyawan berhasil di Hapus !!!</div>");
		redirect('c_karyawan','refresh');
	}

	public function edit_karyawan($nik){
		$data['karyawan'] = $this->m_karyawan->get_karyawan_id($nik)->row_array();
		$data['title'] = 'Edit Karyawan';
		$data['content'] = 'karyawan/edit_karyawan';
		$this->load->view('template', $data);
	}

	public function proses_edit_karyawan(){
		$config['upload_path'] = './foto/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '1024';

		$this->load->library('upload', $config);

		
			$this->upload->do_upload('userfile');
			$nik = $this->input->post('nik');
			$img=$this->upload->data();
			$gambar=$img['file_name'];
			$nama_karyawan = $this->input->post('nama_karyawan');
			$nama_bagian = $this->input->post('nama_bagian');
			$tanggal_masuk = $this->input->post('tanggal_masuk');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$level = $this->input->post('level');

			if(empty($gambar)){
            // update without foto
            $data = array(
					'nama_karyawan' => $nama_karyawan,
					'kode_bagian' => $nama_bagian,
					'tanggal_masuk' => $tanggal_masuk,
					'alamat' => $alamat,
					'no_telp' => $no_telp,
					'username' => $username,
					'password' => md5($password),
					'pass' => $password,
					'level' => $level
				);
        }else{
            // update with foto
            $data = array(
					'gambar' => $gambar,
					'nama_karyawan' => $nama_karyawan,
					'kode_bagian' => $nama_bagian,
					'tanggal_masuk' => $tanggal_masuk,
					'alamat' => $alamat,
					'no_telp' => $no_telp,
					'username' => $username,
					'password' => md5($password),
					'pass' => $password,
					'level' => $level
				);
        }
        $nik   = $this->input->post('nik_id');
        $this->m_karyawan->update($nik,$data);
        redirect('c_karyawan','refresh');
		
	}

}


/* End of file c_karyawan.php */
/* Location: ./application/controllers/c_karyawan.php */