<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AksesKoki extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('PesananModel');

        // Memastikan User yang login
        if (! $this->session->userdata('role'))
        {
            redirect('masterlogin/auth');
        }
    }

    public function index()
    {
        // Memastikan Owner Login
        if ($this->session->userdata('role') == 2 )
        {
            $data['antrian'] = $this->PesananModel->getAllForkoki();
            $data['judul'] = "BloumCoffe | Koki";
            $data['profil'] = "assets/img/icon/koki-icon.png";
            $this->load->view('template/admin/header',$data);
            $this->load->view('template/admin/sidebar',$data);
            $this->load->view('koki/index',$data);
            $this->load->view('template/admin/footer',$data);

        }
        else
        {
            redirect('masterlogin/auth');
        }
    }
}