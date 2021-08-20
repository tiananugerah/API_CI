<?php  

class Auth extends CI_Controller{

	public function index()
	{
		$this->load->view('vlogin');
	}

	public function proses()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('vlogin');
			$this->load->view('template_admin/footer');
		}else{
			$username   = $this->input->post('username');
			$password   = $this->input->post('password');

			$user       = $username;
			$pass       = md5($password);

			$cek        = $this->model_login->cek_login($user, $pass);

			if ($cek->num_rows() > 0){
				foreach ($cek->result() as $ck) {
					$sess_data['username'] = $ck->username;
					$sess_data['email'] = $ck->email;
					$sess_data['level'] = $ck->level;

					$this->session->set_userdata($sess_data);
				}
				if ($sess_data['level'] == 'admin'){
					redirect('admin/dashboard');
				}
				elseif ($sess_data['level'] == 'dosen'){
					redirect('guru/dashboard');
				}
				elseif ($sess_data['level'] == 'mahasiswa'){
					redirect('siswa/dashboard');
				}else{
					$this->session->set_flashdata('pesan', 'Username atau Password Salah!');
					redirect('login/auth');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Username atau Password Salah!');
				redirect('login/auth');
			}
		}
		
	}

	public function out()
	{
		$this->session->sess_destroy();
		redirect('login/auth');
	}
}

?>
