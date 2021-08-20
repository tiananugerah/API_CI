<?php

class Tahun_akademik extends CI_Controller{
	public function index()
	{
		$data['tahun_akademik'] = $this->model_tahunakademik->tampil_data('tahun_akademik')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/tahun_akademik', $data);
		$this->load->view('template_admin/footer');
	}

	public function input()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_tahun_akademik');
		$this->load->view('template_admin/footer');
	}

	public function input_data()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
			$data = array(
				'tahun_akademik'     => $this->input->post('tahun_akademik', TRUE),
				'semester'   => $this->input->post('semester', TRUE),
				'status'   => $this->input->post('status', TRUE),
			);

			$this->model_tahunakademik->input_data($data);
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/tahun_akademik');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tahun_akademik','tahun_akademik','required');
		$this->form_validation->set_rules('semester','semester','required');
		$this->form_validation->set_rules('status','status','required');
	}

	public function update($id_tahunakademik)
	{
		$where = array('id_tahunakademik' => $id_tahunakademik);
		$data['tahun_akademik'] = $this->model_tahunakademik->edit_data($where, 'tahun_akademik')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/update_tahunakademik', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_tahunakademik()
	{
		$id_tahunakademik = $this->input->post('id_tahunakademik');
		$tahun_akademik = $this->input->post('tahun_akademik');
		$semester = $this->input->post('semester');
		$status = $this->input->post('status');

		$data = array(
			'id_tahunakademik'   => $id_tahunakademik,
			'tahun_akademik' => $tahun_akademik,
			'semester' => $semester,
			'status' => $status
		);

		$where = array(
			'id_tahunakademik' => $id_tahunakademik
		);

		$this->model_tahunakademik->update_data($where,$data,'tahun_akademik');
		$this->session->set_flashdata('pesan','Data berhasil diubah!');
		redirect('admin/tahun_akademik');
	}

	public function delete($id_tahunakademik)
	{
		$where = array('id_tahunakademik' => $id_tahunakademik);
		$this->model_tahunakademik->hapus_data($where,'tahun_akademik');
		$this->session->set_flashdata('pesan','Data berhasil dihapus!');
		redirect('admin/tahun_akademik');
	}
}

?>