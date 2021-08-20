<?php

class Profile_dosen extends CI_Controller{

	public function index($id_dosen)
	{
		$where = array('id_dosen' => $id_dosen);
		$data['dosen'] = $this->model_dosen->tampil_profile($where, 'dosen')->result();
		$this->load->view('template_admin/header');
		$this->load->view('dosen/profile_dosen', $data);
		$this->load->view('template_admin/footer');
	}
}

?>