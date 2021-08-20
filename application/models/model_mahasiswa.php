<?php  

class Model_mahasiswa extends CI_Model{

	public function detail_data($id)
	{
		$hasil = $this->db->where('id',$id)->get('pelajar');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table,$data);
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

	public function delete($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public $table = 'pelajar';
	public $id = 'nomer_induk';

	public function get_by_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}

	public function jumlah_mahasiswa()
	{
		$this->db->select('*');
		$this->db->from('pelajar');

		return $this->db->get()->num_rows();
	}
}

?>