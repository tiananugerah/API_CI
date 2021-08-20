<?php  

class Data_absensi extends CI_Controller{

	public function index()
	{
		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']
		) && $_GET['tahun']!='')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}  
		$data['absensi'] = $this->db->query("SELECT data_kehadiran_dosen.*, pengajar.nama_dosen, pengajar.jenis_kelamin FROM data_kehadiran_dosen INNER JOIN pengajar ON data_kehadiran_dosen.nip = pengajar.nomer_induk WHERE data_kehadiran_dosen.bulan = '$bulantahun' AND kategori = 'SD' ORDER BY pengajar.nama_dosen ASC")->result();
		// var_dump($data);
		// die();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_absensi', $data);
		$this->load->view('template_admin/footer');
	}

	public function input_absen()
	{
		$data['dosen'] = $this->model_dosen->tampil_data('dosen')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_input_absen', $data);
		$this->load->view('template_admin/footer');
	}

	public function input_absen_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
			$data = array(
				'bulan'			=> $this->input->post('bulan', TRUE),
				'nip'   		=> $this->input->post('nip', TRUE),
				'nama_dosen'    => $this->input->post('nama_dosen', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'hadir' 	  	=> $this->input->post('hadir', TRUE),
				'sakit' 	  	=> $this->input->post('sakit', TRUE),
				'alpha' 	  	=> $this->input->post('alpha', TRUE)
			);

			$this->model_absendosen->input_data($data);
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/data_absensi');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('bulan','bulan','required');
		$this->form_validation->set_rules('nip','nip','required');
		$this->form_validation->set_rules('nama_dosen','nama_dosen','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		$this->form_validation->set_rules('hadir','hadir','required');
		$this->form_validation->set_rules('sakit','sakit','required');
		$this->form_validation->set_rules('alpha','alpha','required');

	}

	public function update($id_kehadiran)
	{
		$where = array('id_kehadiran' => $id_kehadiran);
		$data['absensi'] = $this->model_absendosen->edit_data($where, 'data_kehadiran_dosen')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/update_absen_dosen', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_data()
	{
		$id_kehadiran 	= $this->input->post('id_kehadiran');
		$bulan 			= $this->input->post('bulan');
		$nip    		= $this->input->post('nip');
		$nama_dosen 	= $this->input->post('nama_dosen');
		$jenis_kelamin 	= $this->input->post('jenis_kelamin');
		$hadir    		= $this->input->post('hadir');
		$sakit 			= $this->input->post('sakit');
		$alpha 			= $this->input->post('alpha');

		$data = array(
			'id_kehadiran' 		=> $id_kehadiran,
			'bulan' 			=> $bulan,
			'nip' 				=> $nip,
			'nama_dosen' 		=> $nama_dosen,
			'jenis_kelamin' 	=> $jenis_kelamin,
			'hadir' 			=> $hadir,
			'sakit' 			=> $sakit,
			'alpha' 			=> $alpha
		);

		$where = array(
			'id_kehadiran' => $id_kehadiran
		);

		$this->model_absendosen->update_data($where,$data,'data_kehadiran_dosen');
		$this->session->set_flashdata('pesan','Data berhasil diubah!');
		redirect('admin/data_absensi');
	}

	public function delete($id_kehadiran)
	{
		$where = array('id_kehadiran' => $id_kehadiran);
		$this->model_absendosen->hapus_data($where,'data_kehadiran_dosen');
		$this->session->set_flashdata('pesan','Data berhasil dihapus!');
		redirect('admin/data_absensi');
	}

	public function absen_mahasiswa()
	{
		$data['absen'] = $this->db->query("SELECT data_kehadiran_mahasiswa.*, pelajar.nama_lengkap, pelajar.jenis_kelamin FROM data_kehadiran_mahasiswa INNER JOIN pelajar ON data_kehadiran_mahasiswa.nim = pelajar.nomer_induk WHERE data_kehadiran_mahasiswa.bulan = '$bulantahun' AND kategori = 'SD' ORDER BY pelajar.nama_lengkap ASC")->result();
		// var_dump($data);
		// die();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_absensi_mahasiswa', $data);
		$this->load->view('template_admin/footer');
	}

	public function input_absen_mahasiswa()
	{
		$data['mahasiswa'] = $this->model_mahasiswa->tampil_data('mahasiswa')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_input_absen_mahasiswa', $data);
		$this->load->view('template_admin/footer');
	}

	public function absen_mahasiswa_aksi()
	{
		$this->_rulesMhs();

		if($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
			$data = array(
				'bulan'			=> $this->input->post('bulan', TRUE),
				'nim'   		=> $this->input->post('nim', TRUE),
				'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'hadir' 	  	=> $this->input->post('hadir', TRUE),
				'sakit' 	  	=> $this->input->post('sakit', TRUE),
				'alpha' 	  	=> $this->input->post('alpha', TRUE)
			);

			$this->model_absenmahasiswa->input_data($data);
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/data_absensi/absen_mahasiswa');
		}
	}

	public function _rulesMhs()
	{
		$this->form_validation->set_rules('bulan','bulan','required');
		$this->form_validation->set_rules('nim','nim','required');
		$this->form_validation->set_rules('nama_lengkap','nama_lengkap','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		$this->form_validation->set_rules('hadir','hadir','required');
		$this->form_validation->set_rules('sakit','sakit','required');
		$this->form_validation->set_rules('alpha','alpha','required');

	}

	public function update_mahasiswa($id_kehadiran)
	{
		$where = array('id_kehadiran' => $id_kehadiran);
		$data['absen_mahasiswa'] = $this->model_absenmahasiswa->edit_data($where, 'data_kehadiran_mahasiswa')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/update_absen_dosen', $data);
		$this->load->view('template_admin/footer');
	}
}

?>