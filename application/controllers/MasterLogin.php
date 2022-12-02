<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MasterLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // library validation from CI
    }

    public function auth()
    {
                // setting rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if( $this->form_validation->run() == false )
        {
        $data['judul'] = "BloumCoffe | Log-in";

        $this->load->view('auth/templates/auth_header',$data);
        $this->load->view('auth/index');
        $this->load->view('auth/templates/auth_footer');
        }
        else{
            $this->_login();
        }
    }

    private function _login()
    {
        // Mendapatkan username dan password dari Form Login
        $username = htmlspecialchars($this->input->post('username',true));
        $password = htmlspecialchars($this->input->post('password',true));

        // Memeriksa Username
        $user = $this->db->get_where('login',['username' => $username])->row_array();

        // Pengecekan User
        if($user)
        {
            // Memeriksa Password
            if($password == $user['password'])
            {
                // Menyiapkan Data User yang Masuk
                $data = [
                    'user' => $user['username'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);

                // Menyesuakan Halaman User yang Login
                if( $user['role'] == 3 )
                {
                    redirect('aksesowner');
                }
                if( $user['role'] == 2 )
                {
                    redirect('akseskoki');
                }
                if( $user['role'] == 1 )
                {
                    redirect('akseskasir');
                }
            }
            else
            {
                // Flash Notif Password salah by CI
                $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">Maaf, <strong>Password</strong> salah</div>');
                redirect('masterlogin/auth');
            }
        }
        else
        {
            // Flash Notif Username tidak terdaftar by CI
            $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">Maaf, <strong>Username</strong> Belum terdaftar</div>');
            redirect('masterlogin/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('role');
        
        $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">Anda telah <strong>Logout</strong></div>');
        redirect('masterlogin/auth');
    }

    // Paksa Keluar
    public function forcelogout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('role');
        redirect('masterlogin/auth');
    }

}