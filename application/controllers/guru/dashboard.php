<?php

class Dashboard extends CI_Controller{

	function __construct() {
		parent::__construct();

		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan','Anda belum login!');
			redirect('login/auth');
		}
	}

	public function index()
	{
		$data = $this->model_user->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'level'	   => $data->level,
		);
		$data['mahasiswa'] = $this->model_mahasiswa->jumlah_mahasiswa();
		$data['dosen'] = $this->model_dosen->jumlah_dosen();
		$data['fakultas'] = $this->model_fakultas->jumlah_fakultas();
		$data['prodi'] = $this->model_prodi->jumlah_prodi();
		$this->load->view('template_admin/header');
		$this->load->view('dosen/dashboard', $data);
		$this->load->view('template_admin/footer');
	}
}

?>