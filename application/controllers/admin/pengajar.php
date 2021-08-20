<?php

class Pengajar extends CI_Controller{

	public function index()
	{
		$data['dosen'] = $this->db->query('SELECT * FROM pengajar WHERE kategori_pengajar = "SD"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/pengajar', $data);
		$this->load->view('template_admin/footer');
	}

	public function detail($id_pengajar)
	{
		$data['detail'] = $this->model_dosen->detail_data($id_pengajar);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/detail_pengajar', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_pengajar()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_pengajar');
		$this->load->view('template_admin/footer');
	}

	public function tambah_pengajar_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambah_dosen();
		}else{
			$nomer_induk   	= $this->input->post('nomer_induk');
			$nama_dosen   	= $this->input->post('nama_dosen');
			$alamat   		= $this->input->post('alamat');
			$jenis_kelamin  = $this->input->post('jenis_kelamin');
			$email   		= $this->input->post('email');
			$telepon   		= $this->input->post('telepon');
			$photo 			= $_FILES['photo'];
			if ($photo=''){}else{
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|jpeg';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('photo')){
					echo "Gagal Upload"; die();
				}else{
					$photo = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nomer_induk' 	=> $nomer_induk,
				'nama_dosen' 	=> $nama_dosen,
				'alamat' 		=> $alamat,
				'jenis_kelamin' => $jenis_kelamin,
				'email' 		=> $email,
				'telepon' 		=> $telepon,
				'photo' 		=> $photo
			);

			$this->model_dosen->insert_data($data, 'pengajar');
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/pengajar');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nomer_induk','nomer_induk','required');
		$this->form_validation->set_rules('nama_dosen','nama_dosen','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('telepon','telepon','required');
	}

	public function update($id_pengajar)
	{
		$where = array('id_pengajar' => $id_pengajar);
		$data['dosen'] = $this->model_dosen->edit_data($where, 'pengajar')->result();
		$data['detail'] = $this->model_dosen->detail_data($id_pengajar);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/update_pengajar', $data);
		$this->load->view('template_admin/footer');
	}

	public function do_update_pengajar()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->update();
		}else{
			$id_pengajar 	= $this->input->post('id_pengajar');
			$nomer_induk   	= $this->input->post('nomer_induk');
			$nama_dosen   	= $this->input->post('nama_dosen');
			$alamat   		= $this->input->post('alamat');
			$jenis_kelamin  = $this->input->post('jenis_kelamin');
			$email   		= $this->input->post('email');
			$telepon   		= $this->input->post('telepon');
			$photo 			= $_FILES['userfile']['name'];

			if ($photo){
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|jpeg';

				$this->load->library('upload', $config);
				if($this->upload->do_upload('userfile')){
					$userfile = $this->upload->data('file_name');
					$this->db->set('photo', $userfile);
				}else{
					echo "Gagal";
				}
			}
			$data = array(
				'id_pengajar' 	=> $id_pengajar,
				'nomer_induk' 	=> $nomer_induk,
				'nama_dosen' 	=> $nama_dosen,
				'alamat' 		=> $alamat,
				'jenis_kelamin' => $jenis_kelamin,
				'email' 		=> $email,
				'telepon' 		=> $telepon
			);

			$where = array(
				'id_pengajar' => $id_pengajar
			);

			$this->model_dosen->update_data($where, $data, 'pengajar');
			$this->session->set_flashdata('pesan','Data berhasil diubah!');
			redirect('admin/pengajar');
		}
	}

	public function delete($id_pengajar)
	{
		$where = array('id_pengajar' => $id_pengajar);
		$this->model_dosen->hapus_data($where,'pengajar');
		$this->session->set_flashdata('pesan','Data berhasil dihapus!');
		redirect('admin/pengajar');
	}
}

?>