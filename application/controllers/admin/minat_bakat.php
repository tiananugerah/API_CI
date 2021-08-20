<?php

class Minat_bakat extends CI_Controller{

	public function pertanyaan()
	{
		$data['pertanyaan'] = $this->model_pertanyaan->tampil_data()->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/pertanyaan', $data);
		$this->load->view('template_admin/footer');
	}

	public function input_pertanyaan()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_pertanyaan');
		$this->load->view('template_admin/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
			$data = array(
				'pertanyaan'   => $this->input->post('pertanyaan', TRUE),
				'pilihan_a'    => $this->input->post('pilihan_a', TRUE),
				'pilihan_b'    => $this->input->post('pilihan_b', TRUE),
				'pilihan_c'    => $this->input->post('pilihan_c', TRUE),
				'pilihan_d'    => $this->input->post('pilihan_d', TRUE),
			);

			$this->model_pertanyaan->input_data($data);
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/minat_bakat/pertanyaan');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('pertanyaan','pertanyaan','required');
		$this->form_validation->set_rules('pilihan_a','pilihan_a','required');
		$this->form_validation->set_rules('pilihan_b','pilihan_b','required');
		$this->form_validation->set_rules('pilihan_c','pilihan_c','required');
		$this->form_validation->set_rules('pilihan_d','pilihan_d','required');
	}

	public function edit_data($no_pertanyaan)
	{
		$where = array('no_pertanyaan' => $no_pertanyaan);
		$data['pertanyaan'] = $this->model_pertanyaan->edit_data($where, 'pertanyaan')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/update_pertanyaan', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_data()
	{
		$no_pertanyaan 	= $this->input->post('no_pertanyaan');
		$pertanyaan 	= $this->input->post('pertanyaan');
		$pilihan_a    	= $this->input->post('pilihan_a');
		$pilihan_b    	= $this->input->post('pilihan_b');
		$pilihan_c    	= $this->input->post('pilihan_c');
		$pilihan_d    	= $this->input->post('pilihan_d');

		$data = array(
			'no_pertanyaan' => $no_pertanyaan,
			'pertanyaan' 	=> $pertanyaan,
			'pilihan_a' 	=> $pilihan_a,
			'pilihan_b' 	=> $pilihan_b,
			'pilihan_c' 	=> $pilihan_c,
			'pilihan_d' 	=> $pilihan_d,
		);

		$where = array(
			'no_pertanyaan' => $no_pertanyaan
		);

		$this->model_pertanyaan->update_data($where,$data,'pertanyaan');
		$this->session->set_flashdata('pesan','Data berhasil diubah!');
		redirect('admin/minat_bakat/pertanyaan');
	}

	public function delete($no_pertanyaan)
	{
		$where = array('no_pertanyaan' => $no_pertanyaan);
		$this->model_pertanyaan->hapus_data($where,'pertanyaan');
		$this->session->set_flashdata('pesan','Data berhasil dihapus!');
		redirect('admin/minat_bakat/pertanyaan');
	}
}

?>