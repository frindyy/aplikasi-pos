<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_op extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {
			$this->session->set_flashdata('peringatan', '<div class="alert alert-danger">Maaf, Harus login terlebih dahulu</div>');
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		$data['content']='dashboard/v_pratama';
		$data['title']='Halaman Dashboard';
		$this->load->view('template',$data);
	}

}

/* End of file dashboard_op.php */
/* Location: ./application/controllers/dashboard_op.php */