<?php

class Model_absenmahasiswa extends CI_Model{
	public function input_data($data)
	{
		$this->db->insert('data_kehadiran_mahasiswa', $data);
	}
}

?>