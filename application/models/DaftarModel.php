<?php

class DaftarModel extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('daftar');
	}
	public function getcount()
	{
		return $this->db->count_all('daftar');
	}
	//fungsi untuk add data 
	public function Daftar($nama,$tgllahir,$nohp,$alamat,$username, $password)
	{
		$data = array(
            'nama'=>$nama,
            'tanggal_lahir'=>$tgllahir,
            'no_HP'=>$nohp,
            'alamat'=>$alamat,
			'username' => $username,
			'password' => $password
		);

		return $this->db->insert('daftar', $data);
	}
	

}
