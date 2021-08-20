<?php  

class Siswa extends CI_Controller{
	public function index()
	{
		$data['pelajar'] = $this->db->query('SELECT * FROM pelajar WHERE kategori = "SD"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/siswa', $data);
		$this->load->view('template_admin/footer');
	}

	public function detail($id)
	{
		$data['detail'] = $this->model_mahasiswa->detail_data($id);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/detail_siswa', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_siswa()
	{
		$data['kelas'] = $this->db->query('SELECT * FROM kategori_kelas WHERE kategori = "SD"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_tambah_siswa', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_siswa_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambah_siswa();
		}else{
			$nomer_induk   	= $this->input->post('nomer_induk');
			$kelas   		= $this->input->post('kelas');
			$nama_lengkap   = $this->input->post('nama_lengkap');
			$alamat   		= $this->input->post('alamat');
			$email   		= $this->input->post('email');
			$telepon   		= $this->input->post('telepon');
			$tempat_lahir   = $this->input->post('tempat_lahir');
			$tgl_lahir   	= $this->input->post('tgl_lahir');
			$jenis_kelamin 	= $this->input->post('jenis_kelamin');
			$kategori		= $this->input->post('kategori');
			$pas_photo 		= $_FILES['pas_photo'];
			if ($pas_photo=''){}else{
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|jpeg';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('pas_photo')){
					echo "Gagal Upload"; die();
				}else{
					$pas_photo = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nomer_induk' 	=> $nomer_induk,
				'kelas' 		=> $kelas,
				'nama_lengkap' 	=> $nama_lengkap,
				'alamat' 		=> $alamat,
				'email' 		=> $email,
				'telepon' 		=> $telepon,
				'tempat_lahir' 	=> $tempat_lahir,
				'tgl_lahir' 	=> $tgl_lahir,
				'jenis_kelamin' => $jenis_kelamin,
				'kategori'		=> $kategori,
				'pas_photo' 	=> $pas_photo
			);

			$this->model_mahasiswa->insert_data($data, 'pelajar');
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/siswa');
		}
	}

	public function update($id)
	{
		$where = array('id' => $id);
		$data['pelajar'] = $this->model_mahasiswa->edit_data($where, 'pelajar')->result();
		$data['detail'] = $this->model_mahasiswa->detail_data($id);
		$data['kelas'] = $this->db->query('SELECT * FROM kategori_kelas WHERE kategori = "SD"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/update_siswa', $data);
		$this->load->view('template_admin/footer');
	}

	public function do_update_siswa()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->update();
		}else{
			$id 			= $this->input->post('id');
			$nomer_induk   	= $this->input->post('nomer_induk');
			$kelas   		= $this->input->post('kelas');
			$nama_lengkap   = $this->input->post('nama_lengkap');
			$alamat   		= $this->input->post('alamat');
			$email   		= $this->input->post('email');
			$telepon   		= $this->input->post('telepon');
			$tempat_lahir   = $this->input->post('tempat_lahir');
			$tgl_lahir   	= $this->input->post('tgl_lahir');
			$jenis_kelamin 	= $this->input->post('jenis_kelamin');
			$kategori 		= $this->input->post('kategori');
			$pas_photo 		= $_FILES['userfile']['name'];

			if ($pas_photo){
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|jpeg';

				$this->load->library('upload', $config);
				if($this->upload->do_upload('userfile')){
					$userfile = $this->upload->data('file_name');
					$this->db->set('pas_photo', $userfile);
				}else{
					echo "Gagal";
				}
			}
			$data = array(
				'nomer_induk' 	=> $nomer_induk,
				'kelas' 		=> $kelas,
				'nama_lengkap' 	=> $nama_lengkap,
				'alamat' 		=> $alamat,
				'email' 		=> $email,
				'telepon' 		=> $telepon,
				'tempat_lahir' 	=> $tempat_lahir,
				'tgl_lahir' 	=> $tgl_lahir,
				'jenis_kelamin' => $jenis_kelamin,
				'kategori' 		=> $kategori
			);

			$where = array(
				'id' => $id
			);

			$this->model_mahasiswa->update_data($where, $data, 'pelajar');
			$this->session->set_flashdata('pesan','Data berhasil diubah!');
			redirect('admin/siswa');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nomer_induk','nomer_induk','required');
		$this->form_validation->set_rules('kelas','kelas','required');
		$this->form_validation->set_rules('nama_lengkap','nama_lengkap','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('telepon','telepon','required');
		$this->form_validation->set_rules('tempat_lahir','tempat_lahir','required');
		$this->form_validation->set_rules('tgl_lahir','tgl_lahir','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		$this->form_validation->set_rules('kategori','kategori','required');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->model_mahasiswa->delete($where,'pelajar');
		$this->session->set_flashdata('pesan','Data berhasil dihapus!');
		redirect('admin/siswa');
	}
}

?>