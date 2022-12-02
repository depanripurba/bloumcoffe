<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AksesOwner extends CI_Controller
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
        if ($this->session->userdata('role') == 3 )
        {
            $data['judul'] = "BloumCoffe | Owner";
            $this->load->view('owner/index',$data);
        }
        else
        {
            redirect('masterlogin/forcelogout');
        }
    }
}