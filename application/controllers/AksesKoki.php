<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AksesKoki extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

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
            $data['judul'] = "BloumCoffe | Koki";
            $this->load->view('koki/index',$data);
        }
        else
        {
            redirect('masterlogin/forcelogout');
        }
    }
}