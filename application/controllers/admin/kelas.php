<?php  

class Kelas extends CI_Controller{

	public function index()
	{
		$data['kelas'] = $this->model_kelas->tampil_data()->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/kelas', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_kelas()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->index();
		}else{
			$kelas   	= $this->input->post('kelas');
			$rombel   	= $this->input->post('rombel');
			$kategori   = $this->input->post('kategori');

			$data = array(
				'kelas' 	=> $kelas,
				'rombel' 	=> $rombel,
				'kategori' 	=> $kategori,
			);

			$this->model_kelas->insert_data($data, 'kategori_kelas');
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/kelas');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kelas','kelas','required');
		$this->form_validation->set_rules('rombel','rombel','required');
		$this->form_validation->set_rules('kategori','kategori','required');
	}
}

?>