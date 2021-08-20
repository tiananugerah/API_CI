<?php 

class Mata_pelajaran extends CI_Controller{
	public function index()
	{
		$data['mata_pelajaran'] = $this->db->query('SELECT * FROM mata_pelajaran WHERE tingkatan = "SD"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/mata_pelajaran', $data);
		$this->load->view('template_admin/footer');
	}

	public function input()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_mata_pelajaran');
		$this->load->view('template_admin/footer');
	}

	public function tambah_matpel()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
			$data = array(
				'kode_matkul'     => $this->input->post('kode_matkul', TRUE),
				'nama_matkul'     => $this->input->post('nama_matkul', TRUE),
				'semester'   	  => $this->input->post('semester', TRUE),
				'tingkatan'   	  => $this->input->post('tingkatan', TRUE),
			);

			$this->model_matkul->insert_data($data, 'mata_pelajaran');
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/mata_pelajaran');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_matkul','kode_matkul','required');
		$this->form_validation->set_rules('nama_matkul','nama_matkul','required');
		$this->form_validation->set_rules('tingkatan','tingkatan','required');
		$this->form_validation->set_rules('semester','semester','required');
	}

	public function update($id_matkul)
	{
		$where = array('kode_matkul' => $id_matkul);
		$data['mata_pelajaran'] = $this->model_matkul->edit_data($where, 'mata_pelajaran')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_matpel_update', $data);
		$this->load->view('template_admin/footer');
	}

	public function do_update()
	{
		$kode_matkul 	= $this->input->post('kode_matkul');
		$nama_matkul	= $this->input->post('nama_matkul');
		$tingkatan 		= $this->input->post('tingkatan');
		$semester 		= $this->input->post('semester');

		$data = array(
			'kode_matkul'   => $kode_matkul,
			'nama_matkul' 	=> $nama_matkul,
			'tingkatan' 	=> $tingkatan,
			'semester'	 	=> $semester,
		);

		$where = array(
			'kode_matkul' => $kode_matkul
		);

		$this->model_matkul->update_data($where,$data,'mata_pelajaran');
		$this->session->set_flashdata('pesan','Data berhasil diubah!');
		redirect('admin/mata_pelajaran');
	}

	public function delete($id_matkul)
	{
		$where = array('kode_matkul' => $id_matkul);
		$this->model_matkul->hapus_data($where,'mata_pelajaran');
		$this->session->set_flashdata('pesan','Data berhasil dihapus!');
		redirect('admin/mata_pelajaran');
	}
}

?>