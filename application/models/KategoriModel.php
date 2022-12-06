<?php

class KategoriModel extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('kategori')->result_array();
	}
	public function getcount()
	{
		return $this->db->count_all('kategori');
	}
	//fungsi untuk add data 
	public function pushkategori($nama)
	{
		$data = array(
            'kategori'=>$nama,
           
		);

		return $this->db->insert('kategori', $data);
	}
	public function hapuskategori($id)
	{
		return $this->db->delete('kategori', array('id_kategori' => $id));
	}

}
