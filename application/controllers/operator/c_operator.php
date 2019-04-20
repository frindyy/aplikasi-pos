<?php

class C_operator extends CI_Controller {

	public function index() {
		$data['username'] = $this->session->userdata('username');
		$data['gambar'] = $this->session->userdata('gambar');
		redirect('dashboard_op','refresh');
	}

}
?>