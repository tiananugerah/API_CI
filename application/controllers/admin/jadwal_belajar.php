<?php

class Jadwal_belajar extends CI_Controller{

	public function index()
	{
		$data['jadwal_belajar'] = $this->db->query('SELECT * FROM jadwal_sekolah WHERE tingkatan = "SD"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/jadwal_belajar', $data);
		$this->load->view('template_admin/footer');
	}

	public function input_jadwal()
	{
		$data['pengajar'] = $this->db->query('SELECT * FROM pengajar WHERE kategori_pengajar = "SD"')->result();
		$data['mata_pelajaran'] = $this->db->query('SELECT * FROM mata_pelajaran WHERE tingkatan = "SD"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_input_jadwal', $data);
		$this->load->view('template_admin/footer');
	}

	public function input_jadwal_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->input_jadwal();
		}else{
			$data = array(
				'nama_pengajar'=> $this->input->post('nama_pengajar', TRUE),
				'mata_pelajaran'  => $this->input->post('mata_pelajaran', TRUE),
				'ruangan' 	   => $this->input->post('ruangan', TRUE),
				'tanggal' 	   => $this->input->post('tanggal', TRUE),
				'waktu_mulai'  => $this->input->post('waktu_mulai', TRUE),
				'waktu_akhir'  => $this->input->post('waktu_akhir', TRUE),
				'tingkatan'    => $this->input->post('tingkatan', TRUE),
			);

			$this->model_jadwalkuliah->input_data($data);
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/jadwal_belajar');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_pengajar','nama_pengajar','required');
		$this->form_validation->set_rules('mata_pelajaran','mata_pelajaran','required');
		$this->form_validation->set_rules('ruangan','ruangan','required');
		$this->form_validation->set_rules('tanggal','tanggal','required');
		$this->form_validation->set_rules('waktu_mulai','waktu_mulai','required');
		$this->form_validation->set_rules('waktu_akhir','waktu_akhir','required');
		$this->form_validation->set_rules('tingkatan','tingkatan','required');
	}

	public function update($id_jadwal)
	{
		$where = array('id_jadwal' => $id_jadwal);
		$data['jadwal_kuliah'] = $this->model_jadwalkuliah->edit_data($where, 'jadwal_kuliah')->result();
		$data['dosen'] = $this->model_dosen->tampil_data('dosen')->result();
		$data['prodi'] = $this->model_prodi->tampil_data('prodi')->result();
		$data['mata_kuliah'] = $this->model_matkul->tampil_data('mata_kuliah')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/update_jadwal_kuliah', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_data()
	{
		$id_jadwal 		= $this->input->post('id_jadwal');
		$nama_dosen 	= $this->input->post('nama_dosen');
		$nama_prodi     = $this->input->post('nama_prodi');
		$nama_matkul 	= $this->input->post('nama_matkul');
		$ruangan 		= $this->input->post('ruangan');
		$tanggal 		= $this->input->post('tanggal');
		$waktu_mulai 	= $this->input->post('waktu_mulai');
		$waktu_akhir 	= $this->input->post('waktu_akhir');

		$data = array(
			'id_jadwal' 	=> $id_jadwal,
			'nama_dosen' 	=> $nama_dosen,
			'nama_prodi' 	=> $nama_prodi,
			'nama_matkul' 	=> $nama_matkul,
			'ruangan' 		=> $ruangan,
			'tanggal' 		=> $tanggal,
			'waktu_mulai' 	=> $waktu_mulai,
			'waktu_akhir' 	=> $waktu_akhir
		);

		$where = array(
			'id_jadwal' => $id_jadwal
		);

		$this->model_jadwalkuliah->update_data($where,$data,'jadwal_kuliah');
		$this->session->set_flashdata('pesan','Data berhasil diubah!');
		redirect('admin/jadwal_kuliah');
	}

	public function delete($id_jadwal)
	{
		$where = array('id_jadwal' => $id_jadwal);
		$this->model_jadwalkuliah->hapus_data($where,'jadwal_kuliah');
		$this->session->set_flashdata('pesan','Data berhasil dihapus!');
		redirect('admin/jadwal_kuliah');
	}
}

?>