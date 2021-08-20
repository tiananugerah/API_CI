<?php  

class Sekolah_menengah_pertama extends CI_Controller{

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
		$this->load->view('template_admin/smp/sidebar');
		$this->load->view('admin/smp/dashboard', $data);
		$this->load->view('template_admin/footer');
	}

	public function data_siswa()
	{
		$data['pelajar'] = $this->db->query('SELECT * FROM pelajar WHERE kategori = "SMP"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/smp/sidebar');
		$this->load->view('admin/smp/data_siswa', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_siswa()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/smp/sidebar');
		$this->load->view('admin/tambah_siswa_smp');
		$this->load->view('template_admin/footer');
	}

	public function data_pengajar()
	{
		$data['dosen'] = $this->db->query('SELECT * FROM pengajar WHERE kategori_pengajar = "SMP"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/smp/sidebar');
		$this->load->view('admin/smp/pengajar', $data);
		$this->load->view('template_admin/footer');
	}

	public function mata_pelajaran()
	{
		$data['mata_pelajaran'] = $this->db->query('SELECT * FROM mata_pelajaran WHERE tingkatan = "SMP"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/smp/sidebar');
		$this->load->view('admin/smp/mata_pelajaran', $data);
		$this->load->view('template_admin/footer');
	}

	public function tahun_akademik()
	{
		$data['tahun_akademik'] = $this->model_tahunakademik->tampil_data('tahun_akademik')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/smp/sidebar');
		$this->load->view('admin/smp/tahun_akademik', $data);
		$this->load->view('template_admin/footer');
	}

	public function jadwal_belajar()
	{
		$data['jadwal_belajar'] = $this->db->query('SELECT * FROM jadwal_sekolah WHERE tingkatan = "SMP"')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/smp/sidebar');
		$this->load->view('admin/smp/jadwal_belajar', $data);
		$this->load->view('template_admin/footer');
	}

	public function input_nilai()
	{
		$data = array(
			'kode_matpel' 	   => set_value('kode_matpel'),
			'id_tahunakademik' => set_value('id_tahunakademik')
		);

		$this->load->view('template_admin/header');
        $this->load->view('template_admin/smp/sidebar');
        $this->load->view('admin/smp/form_input_nilai', $data);
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
            $kategori = "SMP";

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
                'kategori'			=> 'SMP'
            );

            $this->load->view('template_admin/header');
            $this->load->view('template_admin/smp/sidebar');
            $this->load->view('admin/smp/form_nilai', $data);
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
			redirect('admin/sekolah_menengah_pertama/input_nilai');
		}
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_tahunakademik','id_tahunakademik','required');
        $this->form_validation->set_rules('nomer_induk','nomer_induk','required');
        $this->form_validation->set_rules('kode_matpel','kode_matpel','required');
        $this->form_validation->set_rules('nilai','nilai','required');
    }

    public function cetak_rapot()
	{
		$data = array(
			'nomer_induk' => set_value('nomer_induk')
		);

		$this->load->view('template_admin/header');
        $this->load->view('template_admin/smp/sidebar');
        $this->load->view('admin/smp/masuk_cetak_rapot', $data);
        $this->load->view('template_admin/footer');
	}

	public function cetak_aksi()
    {
        $this->_rulesCetakNilai();

        if($this->form_validation->run() == FALSE) {
            $this->index();
        }else{
            $nomer_induk      = $this->input->post('nomer_induk', TRUE);

            $this->db->select('n.id_nilai,n.nomer_induk,p.nama_lengkap,p.kelas,n.nilai,m.nama_matkul,m.kkm');
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
            $this->load->view('template_admin/smp/sidebar');
            $this->load->view('admin/smp/list_rapot', $data);
            $this->load->view('template_admin/footer');
        }
    }

    public function _rulesCetakNilai()
    {
        $this->form_validation->set_rules('nomer_induk','nomer_induk','required');
    }

    public function spp()
    {
    	$data = array(
			'nomer_induk' => set_value('nomer_induk')
		);

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/smp/sidebar');
		$this->load->view('admin/smp/form_masuk_transaksi', $data);
		$this->load->view('template_admin/footer');
    }

    public function transaksi()
    {
    	$this->_rulesSPP();

		if($this->form_validation->run() == FALSE) {
			$this->index();
		}else{
			$nomer_induk = $this->input->post('nomer_induk', TRUE);

			$query = "SELECT tunggakan.id_tunggakan, tunggakan.nomer_induk, pelajar.nama_lengkap, tunggakan.jenis_pembayaran, tunggakan.bulan, tunggakan.jumlah_tunggakan, tunggakan.status 
				FROM tunggakan 
				INNER JOIN pelajar ON pelajar.nomer_induk = tunggakan.nomer_induk
				WHERE tunggakan.nomer_induk = $nomer_induk AND tunggakan.kategori = 'SMP'";

			$sql = $this->db->query($query)->result();

			$query1 = "SELECT pelajar.nomer_induk, pelajar.nama_lengkap, pelajar.kelas, tunggakan.jumlah_tunggakan FROM pelajar INNER JOIN tunggakan ON (tunggakan.nomer_induk = pelajar.nomer_induk)WHERE tunggakan.kategori = 'SMP';";

			$siswa = $this->db->query($query1)->row();

			$query2 = "SELECT SUM(jumlah_tunggakan) AS tgk FROM tunggakan WHERE nomer_induk = '$nomer_induk' AND kategori = 'SMP'";

			$t = $this->db->query($query2)->row();

			$data = array(
				's_data' 		=> $sql,
				's_nomer_induk' => $nomer_induk,
				's_nama'		=> $this->model_mahasiswa->get_by_id($nomer_induk)->nama_lengkap,
				's_kelas' 		=> $siswa->kelas,
				's_tunggakan'	=> $t->tgk,
			);

			$this->load->view('template_admin/header');
			$this->load->view('template_admin/smp/sidebar');
			$this->load->view('admin/smp/transaksi_spp', $data);
			$this->load->view('template_admin/footer');
		}
    }

    public function _rulesSPP()
    {
        $this->form_validation->set_rules('nomer_induk','nomer_induk','required');
    }

    public function pembayaran($id_tunggakan)
	{
		$where = array('id_tunggakan' => $id_tunggakan);
		$data['transaksi'] = $this->model_tunggakan->get($where, 'tunggakan')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/smp/sidebar');
		$this->load->view('admin/smp/form_pembayaran', $data);
		$this->load->view('template_admin/footer');
	}

	public function pembayaran_aksi()
	{
		$this->_rulesPembayaran();

		if($this->form_validation->run() == FALSE) {
			$this->pembayaran();
		}else{

			$id_tunggakan 		= $this->input->post('id_tunggakan', TRUE);
			$nomer_induk 		= $this->input->post('nomer_induk', TRUE);
			$bulan 				= $this->input->post('bulan', TRUE);
			$total_bayar 		= $this->input->post('total_bayar', TRUE);
		}

		$data = array(
			'id_tunggakan' 		=> $id_tunggakan,
			'nomer_induk'  		=> $nomer_induk,
			'bulan'		   		=> $bulan,
			'total_bayar'		=> $total_bayar
		);

		$where = array(
			'id_tunggakan' => $id_tunggakan
		);

		$this->db->query('UPDATE tunggakan SET status = "Sudah Dibayar" WHERE id_tunggakan = "$id_tunggakan"');
		

		$this->model_tunggakan->insert_data($where,$data, 'spp');
		$this->session->set_flashdata('pesan','Data berhasil disimpan!');
		redirect('admin/sekolah_menengah_pertama/spp');
	}

	public function _rulesPembayaran()
	{
		$this->form_validation->set_rules('nomer_induk','nomer_induk','required');
		$this->form_validation->set_rules('bulan','bulan','required');
		$this->form_validation->set_rules('jumlah_tunggakan','jumlah_tunggakan','required');
		$this->form_validation->set_rules('total_bayar','total_bayar','required');
	}
}

?>