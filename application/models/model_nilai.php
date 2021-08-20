<?php  

class Model_nilai extends CI_Model{

	public function insert_data($data)
	{
		$this->db->insert('nilai', $data);
	}
}

?>