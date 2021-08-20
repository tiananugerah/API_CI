<?php  

class Nilai extends CI_Controller{

	public function input_nilai()
	{
		$data = array(
			'kode_matpel' 	   => set_value('kode_matpel'),
			'id_tahunakademik' => set_value('id_tahunakademik')
		);

		$this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/form_input_nilai', $data);
        $this->load->view('template_admin/footer');
	}

	public function input_nilai_aksi()
    {
        $this->_rulesInputNilai();

        if($this->form_validation->run() == FALSE) {
            $this->input_nilai();
        }else{
            $kode_matpel      = $this->input->post('kode_matpel', TRUE);
            $id_tahunakademik = $this->input->post('id_tahunakademik', TRUE);
            $kategori = "SD";

            $this->db->select('n.id_nilai, n.nomer_induk, p.nama_lengkap, n.nilai, m.nama_matkul, p.kategori');
            $this->db->from('nilai as n');
            $this->db->join('pelajar as p','p.nomer_induk = n.nomer_induk');
            $this->db->join('mata_pelajaran as m','n.kode_matpel = m.kode_matkul');
            $this->db->where('n.id_tahunakademik', $id_tahunakademik);
            $this->db->where('n.kode_matpel', $kode_matpel);
            $this->db->where('n.kategori', $kategori);
            $query = $this->db->get()->result();

            $data = array(
                'list_nilai'        => $query,
                'kode_matpel'       => $kode_matpel,
                'id_tahunakademik'  => $id_tahunakademik,
                'kategori'			=> 'SD'
            );

            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/form_nilai', $data);
            $this->load->view('template_admin/footer');
        }
    }

    public function _rulesInputNilai()
    {
        $this->form_validation->set_rules('kode_matpel','Kode Mata Pelajaran','required');
        $this->form_validation->set_rules('id_tahunakademik','Tahun Akademik','required');
    }

    public function simpan_nilai()
    {
    	$this->_rules();

    	if($this->form_validation->run() == FALSE) {

			$this->input_nilai();

		}else{

			$data = array(
				'id_tahunakademik'=> $this->input->post('id_tahunakademik', TRUE),
				'nomer_induk'     => $this->input->post('nomer_induk', TRUE),
				'kode_matpel'     => $this->input->post('kode_matpel', TRUE),
				'nilai'			  => $this->input->post('nilai', TRUE),
				'kategori'		  => $this->input->post('kategori', TRUE)
			);

			$this->model_nilai->insert_data($data, 'nilai');
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');
			redirect('admin/nilai/input_nilai');
		}
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_tahunakademik','id_tahunakademik','required');
        $this->form_validation->set_rules('nomer_induk','nomer_induk','required');
        $this->form_validation->set_rules('kode_matpel','kode_matpel','required');
        $this->form_validation->set_rules('nilai','nilai','required');
    }
}

?>