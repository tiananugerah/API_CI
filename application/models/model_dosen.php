<?php 

class Model_dosen extends CI_Model{

	public function detail_data($id_pengajar)
	{
		$hasil = $this->db->where('id_pengajar',$id_pengajar)->get('pengajar');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function insert_data($data)
	{
		$this->db->insert('pengajar', $data);
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

	public function jumlah_dosen()
	{
		$this->db->select('*');
		$this->db->from('pengajar');

		return $this->db->get()->num_rows();
	}

	public function tampil_profile($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
}

?>