<?php

class C_admin extends CI_Controller {


	public function index() {
		$data['username'] = $this->session->userdata('username');
		$data['gambar'] = $this->session->userdata('gambar');
		redirect('dasboard','refresh');
	}
}
?>