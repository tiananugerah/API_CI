<?php  

class Spp extends CI_Controller{

	public function index()
	{
		$data['pelajar'] = $this->db->query('SELECT * FROM pelajar WHERE kategori = "SD"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/spp_siswa', $data);
		$this->load->view('template_admin/footer');
	}
}

?>