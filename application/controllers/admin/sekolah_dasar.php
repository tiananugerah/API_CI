<?php  

class Sekolah_dasar extends CI_Controller{

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
			'level'    => $data->level,
		);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/sekolah_dasar', $data);
		$this->load->view('template_admin/footer');
	}
}

?>