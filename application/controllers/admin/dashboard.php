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
		$this->load->view('template_admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('template_admin/footer');
	}
}

?>