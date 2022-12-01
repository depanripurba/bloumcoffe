<?php

class MenuModel extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('menu')->result();
	}
	public function getspesifik($id)
	{
		return $this->db->get_where('menu',array('id' => $id))->result()[0];
	}
	public function getcount()
	{
		return $this->db->count_all('daftar');
	}
	//fungsi untuk add data 
	public function tambahMenu($namamenu, $harga, $namagambar,$kategori)
	{
		$data = array(
            'namamenu'=>$namamenu,
            'harga'=>$harga,
            'namagambar'=>$namagambar,
            'kategori'=>$kategori,
		);

		return $this->db->insert('menu', $data);
	}
	

}
