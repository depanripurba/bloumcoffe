<?php

class OwnerModel extends CI_Model
{
	public function getAllAkses()
	{
        return $this->db->get('login')->result_array();
    }

    public function getAksesByUsername($user)
    {
        return $this->db->get_where('login', ['username' => $user])->row_array();
    }

    public function addAkses()
    {
        $username = htmlspecialchars($this->input->post('username',true));
        $password = htmlspecialchars($this->input->post('password',true));
        $role     = htmlspecialchars($this->input->post('role',true));

        $data = [
            'username' => $username,
            'password' => $password,
            'role'     => $role * 1
        ];

        $this->db->insert('login',$data);
    }

    public function delAkses($username)
    {
        $this->db->delete('login',['username'=>$username]);
    }

    public function edtAkses($userid)
    {

        $password = htmlspecialchars($this->input->post('password',true));
        $role     = htmlspecialchars($this->input->post('role',true));

        $data = [
            'password' => $password,
            'role'     => $role * 1
        ];

        $this->db->where('username', $userid);
        $this->db->update('login', $data);
    }

    public function getAllKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function addKategori()
    {
        $kategori = htmlspecialchars($this->input->post('kategori',true));
        $this->db->insert('kategori',['kategori'=>$kategori]);
    }

    public function delKategori($id)
    {
        $this->db->delete('kategori',['id_kategori'=>$id]);
    }

    public function getKategori($id)
    {
        return $this->db->get_where('kategori',['id_kategori'=>$id])->row_array();
    }
}