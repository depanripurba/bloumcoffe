<?php

class MejaModel extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('jlh_meja')->result();
	}	
	

}
