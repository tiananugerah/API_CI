<?php  

class Model_tunggakan extends CI_Model{

	public function get($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function insert_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->insert($table,$data);
	}
}

?>