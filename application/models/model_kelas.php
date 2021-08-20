<?php  

class Model_kelas extends CI_Model{

	public function tampil_data()
	{
		return $this->db->get('kategori_kelas');
	}

	public function insert_data($data)
	{
		$this->db->insert('kategori_kelas', $data);
	}
}

?>