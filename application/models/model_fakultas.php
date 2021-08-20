<?php  

class Model_fakultas extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('fakultas');
	}

	public function input_data($data)
	{
		$this->db->insert('fakultas', $data);
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function jumlah_fakultas()
	{
		$this->db->select('*');
		$this->db->from('fakultas');

		return $this->db->get()->num_rows();
	}
}

?>