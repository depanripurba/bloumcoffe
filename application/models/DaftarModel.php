<?php

class DaftarModel extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('daftar')->result();
	}

	public function membedakanpelanggan()
	{
		$pelangganlama = $this->db->query("SELECT * FROM daftar WHERE counter>10");
		$pelangganbaru = $this->db->query("SELECT * FROM daftar WHERE counter<=10");
		return [
			"pelangganlama"=>$pelangganlama->result(),
			"pelangganbaru"=>$pelangganbaru->result(),
		];
	}
	public function getcount()
	{
		return $this->db->count_all('daftar');
	}

	public function spesifikuser($id)
	{
		return $this->db->get_where('daftar',array("id_customer"=>$id));
	}
	//fungsi untuk add data 
	public function Daftar($nama, $tgllahir, $nohp, $alamat, $username, $password)
	{
		$data = array(
			'nama' => $nama,
			'tanggal_lahir' => $tgllahir,
			'no_HP' => $nohp,
			'alamat' => $alamat,
			'username' => $username,
			'password' => $password,
			'tanggalDaftar' => date('d-m-Y'),
		);

		return $this->db->insert('daftar', $data);
	}

	public function getspesifik($id)
	{
		return $this->db->get_where('daftar', array('id_customer' => $id))->result()[0];
	}

	public function updatepoint($id, $point)
	{
		$datasingle = $this->db->get_where('daftar', array('id_customer' => $id))->result()[0];

		$data = [
			'point' => $point,
			'counter' => $datasingle->counter * 1 + 1
		];
		$this->db->where('id_customer', $id);
		return $this->db->update('daftar', $data);
	}
}
