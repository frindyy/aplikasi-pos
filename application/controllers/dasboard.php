<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_dashboard');
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {
			$this->session->set_flashdata('peringatan', '<div class="alert alert-danger">Maaf, Harus login terlebih dahulu</div>');
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		$data['content']='dashboard/v_dashboard';
		$data['title']='Halaman Dashboard';
		$data['hit_kar'] = $this->m_dashboard->hitung_karyawan();
		$data['hit_pell'] = $this->m_dashboard->hitung_pelanggan();
		$data['penjualan_hari_ini'] = $this->m_dashboard->penjualan_hari_ini();
		$data['pembelian_hari_ini'] = $this->m_dashboard->pembelian_hari_ini();
		$this->load->view('template',$data);
	}

}

/* End of file dasboard.php */
/* Location: ./application/controllers/dasboard.php */