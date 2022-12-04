<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AksesOwner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('OwnerModel');
        $this->load->library('form_validation'); // library validation from CI

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
            $data['profil'] = "assets/img/icon/kasir-icon.png";
            $this->load->view('owner/templates/header',$data);
            $this->load->view('owner/templates/sidebar',$data);
            $this->load->view('owner/index',$data);
            $this->load->view('owner/templates/footer',$data);
        }
        else
        {
            redirect('masterlogin/auth');
        }
    }

    public function akses()
    {
        // Memastikan Owner Login
        if ($this->session->userdata('role') == 3 )
        {
            $data['judul'] = "BloumCoffe | Owner - Akses";
            $data['profil'] = "assets/img/icon/kasir-icon.png";

            $data['akses'] = $this->OwnerModel->getAllAkses();

            $this->load->view('owner/templates/header',$data);
            $this->load->view('owner/templates/sidebar',$data);
            $this->load->view('owner/akses/index',$data);
            $this->load->view('owner/templates/footer',$data);
        }
        else
        {
            redirect('masterlogin/auth');
        }
    }

    public function akses_add()
    {
        // Memastikan Owner Login
        if ($this->session->userdata('role') == 3 )
        {
            
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[login.username]',['is_unique' => 'Username telah terdaftar']);
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if( $this->form_validation->run() == false )
            {
                $data['judul'] = "BloumCoffe | Owner - Tambah Akses";
                $data['profil'] = "assets/img/icon/kasir-icon.png";
    
                $data['akses'] = $this->OwnerModel->getAllAkses();
    
                $this->load->view('owner/templates/header',$data);
                $this->load->view('owner/templates/sidebar',$data);
                $this->load->view('owner/akses/akses_add',$data);
                $this->load->view('owner/templates/footer',$data);
            }
            else
            {
                $this->OwnerModel->addAkses();
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> User Baru</h5> Berhasil disimpan</div>');
                redirect('aksesowner/akses');
            }

        }
        else
        {
            redirect('masterlogin/auth');
        }
    }

    public function akses_del($username)
    {        
        // Memastikan Owner Login
        if ($this->session->userdata('role') == 3 )
        {
            $this->OwnerModel->delAkses($username);
            $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-trash"></i> User</h5> Berhasil dihapus</div>');
            redirect('aksesowner/akses');
        }
        else
        {
            redirect('masterlogin/auth');
        }
    }

    public function akses_edt($user)
    {
        // Memastikan Owner Login
        if ($this->session->userdata('role') == 3 )
        {
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if( $this->form_validation->run() == false )
            {
                $userid = htmlspecialchars($this->input->post('username',true));

                $data['iduser'] = $this->OwnerModel->getAksesByUsername($user);

                $data['judul'] = "BloumCoffe | Owner - Ubah Akses";
                $data['profil'] = "assets/img/icon/kasir-icon.png";
    
                $data['akses'] = $this->OwnerModel->getAllAkses();
    
                $this->load->view('owner/templates/header',$data);
                $this->load->view('owner/templates/sidebar',$data);
                $this->load->view('owner/akses/akses_edt',$data);
                $this->load->view('owner/templates/footer',$data);
            }
            else
            {
                $this->OwnerModel->edtAkses($user);
                var_dump($user);
                $this->session->set_flashdata('flash', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> User Baru</h5> Berhasil disimpan</div>');
                redirect('aksesowner/akses');
            }

        }
        else
        {
            redirect('masterlogin/auth');
        }

    }

    // Master Menu Kategori

    public function kategori()
    {
        // Memastikan Owner Login
        if ($this->session->userdata('role') == 3 )
        {
            $data['judul'] = "BloumCoffe | Owner - Kategori Menu";
            $data['profil'] = "assets/img/icon/kasir-icon.png";

            $data['kategori'] = $this->OwnerModel->getAllKategori();

            $this->load->view('owner/templates/header',$data);
            $this->load->view('owner/templates/sidebar',$data);
            $this->load->view('owner/master/kategori',$data);
            $this->load->view('owner/templates/footer',$data);
        }
        else
        {
            redirect('masterlogin/auth');
        }
    }
    
    public function kategori_add()
    {
        // Memastikan Owner Login
        if ($this->session->userdata('role') == 3 )
        {
            $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required|is_unique[kategori.kategori]',['is_unique' => 'Kategori telah terdaftar']);

            if( $this->form_validation->run() == false )
            {
                $this->session->set_flashdata('flash', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Kategori Baru</h5> Gagal ditambah</div>');
                redirect('aksesowner/kategori');
            }
            else
            {
                $this->OwnerModel->addKategori();
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Kategori Baru</h5> Berhasil disimpan</div>');
                redirect('aksesowner/kategori');
            }
        }
        else
        {
            redirect('masterlogin/auth');
        }
    }

    public function kategori_del($id)
    {
        $this->OwnerModel->delKategori($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-trash"></i> Kategori </h5> Berhasil dihapus</div>');
        redirect('aksesowner/kategori');
    }

    public function kategori_get()
    {
        echo json_encode($this->OwnerModel->getKategori($_POST['id']));
    }
}