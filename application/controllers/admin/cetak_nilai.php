<?php  

class Cetak_nilai extends CI_Controller{

	function __construct(){
        parent::__construct();
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data = array(
            'kode_matpel' => set_value('kode_matpel')
        );

            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/masuk_cetak_nilai', $data);
            $this->load->view('template_admin/footer');
    }

    public function nilai_aksi()
    {
        $this->_rulesCetakNilai();

        if($this->form_validation->run() == FALSE) {
            $this->index();
        }else{
            $kode_matpel      = $this->input->post('kode_matpel', TRUE);

            $this->db->select('n.id_nilai,n.nomer_induk,p.nama_lengkap,p.kelas,n.nilai,m.nama_matkul,m.kkm');
            $this->db->from('nilai as n');
            $this->db->join('pelajar as p','p.nomer_induk = n.nomer_induk');
            $this->db->join('mata_pelajaran as m','n.kode_matpel = m.kode_matkul');
            $this->db->where('n.kode_matpel', $kode_matpel);
            $query = $this->db->get()->result();

            $data = array(
                'list_nilai'        => $query,
                'kode_matpel'       => $kode_matpel,
            );

            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/list_nilai', $data);
            $this->load->view('template_admin/footer');
        }
    }

    public function _rulesCetakNilai()
    {
        $this->form_validation->set_rules('kode_matpel','kode_matpel','required');
    }

	public function print_nilai($kode_matpel)
	{
		defined('BASEPATH') OR exit('No direct script access allowed');

		error_reporting(0);
        $pdf = new FPDF('L', 'mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'NILAI AKHIR SISWA/SISWI',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
 
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'N0',1,0,'C');
        $pdf->Cell(30,6,'NOMER INDUK',1,0,'C');
        $pdf->Cell(50,6,'NAMA',1,0,'C');
        $pdf->Cell(50,6,'MATA PELAJARAN',1,0,'C');
        $pdf->Cell(30,6,'NILAI',1,1,'C');
 
        $pdf->SetFont('Arial','',10);
        $list_nilai = $this->db->query("SELECT nilai.id_nilai, nilai.nomer_induk, pelajar.nama_lengkap, mata_pelajaran.nama_matkul, nilai.nilai FROM nilai INNER JOIN pelajar ON pelajar.nomer_induk = nilai.nomer_induk INNER JOIN mata_pelajaran ON mata_pelajaran.kode_matkul = nilai.kode_matpel WHERE nilai.kode_matpel = '$kode_matpel'")->result();
        $no=0;
        foreach ($list_nilai as $ln){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(30,6,$ln->nomer_induk,1,0);
            $pdf->Cell(50,6,$ln->nama_lengkap,1,0);
            $pdf->Cell(50,6,$ln->nama_matkul,1,0);
            $pdf->Cell(30,6,$ln->nilai,1,1);
        }
        $pdf->Output();
	}
}

?>