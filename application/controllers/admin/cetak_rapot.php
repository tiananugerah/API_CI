<?php  

class Cetak_rapot extends CI_Controller{

	public function index()
	{
		$data = array(
			'nomer_induk' => set_value('nomer_induk')
		);

		$this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/masuk_cetak_rapot', $data);
        $this->load->view('template_admin/footer');
	}

	public function cetak_aksi()
    {
        $this->_rulesCetakNilai();

        if($this->form_validation->run() == FALSE) {
            $this->index();
        }else{
            $nomer_induk      = $this->input->post('nomer_induk', TRUE);

            $this->db->select('n.id_nilai,n.nomer_induk,p.nama_lengkap,p.kelas,n.nilai,m.nama_matkul,m.kkm,m.semester');
            $this->db->from('nilai as n');
            $this->db->join('pelajar as p','p.nomer_induk = n.nomer_induk');
            $this->db->join('mata_pelajaran as m','n.kode_matpel = m.kode_matkul');
            $this->db->where('n.nomer_induk', $nomer_induk);
            $query = $this->db->get()->result();

            $data = array(
                'list_nilai'        => $query,
                'nomer_induk'       => $nomer_induk,
                'nama_lengkap' 		=> $this->model_mahasiswa->get_by_id($nomer_induk)->nama_lengkap,
                'kelas' 			=> $this->model_mahasiswa->get_by_id($nomer_induk)->kelas
            );

            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/list_rapot', $data);
            $this->load->view('template_admin/footer');
        }
    }

    public function _rulesCetakNilai()
    {
        $this->form_validation->set_rules('nomer_induk','nomer_induk','required');
    }
}

?>