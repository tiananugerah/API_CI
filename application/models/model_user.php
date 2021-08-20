<?php 

class Model_user extends CI_Model{
	public function ambil_data($id_user)
	{
		$this->db->where('username', $id_user);
		return $this->db->get('user')->row();
	}
}

?>