<?php  

class Sekolah_menengah_atas extends CI_Controller{

	function __construct() {
		parent::__construct();

		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan','Anda belum login!');
			redirect('login/auth');
		}
	}

	public function index()
	{
		$data = $this->model_user->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'level'    => $data->level,
		);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sma/sidebar');
		$this->load->view('admin/sma/dashboard', $data);
		$this->load->view('template_admin/footer');
	}

	public function data_siswa()
	{
		$data['pelajar'] = $this->db->query('SELECT * FROM pelajar WHERE kategori = "SMA"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sma/sidebar');
		$this->load->view('admin/sma/data_siswa', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_siswa()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sma/sidebar');
		$this->load->view('admin/sma/tambah_siswa_sma');
		$this->load->view('template_admin/footer');
	}

	public function data_pengajar()
	{
		$data['dosen'] = $this->db->query('SELECT * FROM pengajar WHERE kategori_pengajar = "SMA"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sma/sidebar');
		$this->load->view('admin/sma/data_pengajar', $data);
		$this->load->view('template_admin/footer');
	}

	public function mata_pelajaran()
	{
		$data['mata_pelajaran'] = $this->db->query('SELECT * FROM mata_pelajaran WHERE tingkatan = "SMA"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sma/sidebar');
		$this->load->view('admin/sma/mata_pelajaran', $data);
		$this->load->view('template_admin/footer');
	}

	public function tahun_akademik()
	{
		$data['tahun_akademik'] = $this->model_tahunakademik->tampil_data('tahun_akademik')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sma/sidebar');
		$this->load->view('admin/sma/tahun_akademik', $data);
		$this->load->view('template_admin/footer');
	}

	public function jadwal_belajar()
	{
		$data['jadwal_belajar'] = $this->db->query('SELECT * FROM jadwal_sekolah WHERE tingkatan = "SMA"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sma/sidebar');
		$this->load->view('admin/sma/jadwal_belajar', $data);
		$this->load->view('template_admin/footer');
	}

	public function input_nilai()
	{
		$data = array(
			'kode_matpel' 	   => set_value('kode_matpel'),
			'id_tahunakademik' => set_value('id_tahunakademik')
		);

		$this->load->view('template_admin/header');
        $this->load->view('template_admin/sma/sidebar');
        $this->load->view('admin/sma/form_input_nilai', $data);
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
            $kategori = "SMA";

            $this->db->select('nilai.id_nilai, nilai.nomer_induk, pelajar.nama_lengkap, nilai.nilai, mata_pelajaran.nama_matkul, pelajar.kategori');
            $this->db->from('nilai');
            $this->db->join('pelajar','pelajar.nomer_induk = nilai.nomer_induk');
            $this->db->join('mata_pelajaran','nilai.kode_matpel = mata_pelajaran.kode_matkul');
            $this->db->where('nilai.id_tahunakademik', $id_tahunakademik);
            $this->db->where('nilai.kode_matpel', $kode_matpel);
            $this->db->where('nilai.kategori', $kategori);
            $query = $this->db->get()->result();

            $data = array(
                'list_nilai'        => $query,
                'kode_matpel'       => $kode_matpel,
                'id_tahunakademik'  => $id_tahunakademik,
                'kategori'			=> 'SMA'
            );

            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sma/sidebar');
            $this->load->view('admin/sma/form_nilai', $data);
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
			redirect('admin/sekolah_menengah_atas/input_nilai');
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