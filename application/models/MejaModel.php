<?php

class MejaModel extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('jlh_meja')->result();
	}

	public function updatemeja()
	{
		$data = [
			'jlhmeja'     => $_POST['jlh_meja']
		];

		$this->db->where('id', $_POST['id']);
		return ($this->db->update('jlh_meja', $data));
	}
}
