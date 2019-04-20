<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index(){
		if ($this->session->userdata('level')=='admin') {
				redirect('dasboard');
			}
			else if ($this->session->userdata('level')=='operator') {
				redirect('dashboard_op');
			}else{
		$this->load->view('form_login');
		}
	}

	public function cek_login()
	{
		$data = array('username' => $this->input->post('user', TRUE),
						'password' => md5($this->input->post('pass', TRUE))
			);
		$this->load->model('m_auth');
		$hasil = $this->m_auth->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = true;
				$sess_data['nik'] = $sess->nik;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$sess_data['nama_karyawan'] = $sess->nama_karyawan;
				$sess_data['gambar'] = $sess->gambar;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='admin') {
				redirect('dasboard');
			}
			else if ($this->session->userdata('level')=='operator') {
				redirect('dashboard_op');
			}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('c_tampilan_awal');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */