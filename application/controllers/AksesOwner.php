<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AksesOwner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('OwnerModel');
        $this->load->model('MenuModel');
        $this->load->model('KategoriModel');
        $this->load->model('MejaModel');
        $this->load->model('DaftarModel');
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
            $data['jlmh_kategori'] = $this->db->count_all('kategori');
            $data['jlmh_menu'] = $this->db->count_all('menu');
            $data['jlmh_akun'] = $this->db->count_all('daftar');
            $data['jlmh_transaksi'] = $this->db->count_all('pesanan');
            $data['laporan'] = $this->OwnerModel->getAllLaporan();

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

    // 4
    public function menu()
    {
        if ($this->session->userdata('role') == 3) {
            $data['judul'] = "BloumCoffe | Owner - Kelola Menu";
            $data['profil'] = "assets/img/icon/kasir-icon.png";
            $data['kategori'] = "BloumCoffe | Owner - Kelola Menu";
            $data['jenis'] =  $this->KategoriModel->getAll();
            $data['menu'] =  $this->MenuModel->getAll();

            $this->load->view('owner/templates/header', $data);
            $this->load->view('owner/templates/sidebar', $data);
            $this->load->view('owner/master/menu', $data);
            $this->load->view('owner/templates/footer', $data);
        } else {
            redirect('masterlogin/auth');
        }
    }

    public function tambahmenu()
    {
        $ekstension                     = explode(".", $_FILES['menu']['name'])[1];
        $namamenu                       = $_POST['namamenu'];
        $filename                       = str_replace(" ", "", $_POST['namamenu']);
        $harga                          = $_POST['harga'];
        $namagambar                     = $filename . "." . $ekstension;
        $kategori                       = $_POST['kategori'];
        $config['upload_path']          = FCPATH . '/upload/menu';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $filename;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        $config['max_width']            = 1080;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('menu')) {
            $data['error'] = $this->upload->display_errors();
            var_dump($data['error']);
        }
        $push = $this->MenuModel->tambahmenu($namamenu, $harga, $namagambar, $kategori);
        if ($push) {
            redirect(base_url('aksesowner/menu'));
        }
    }

    public function hapusmenu($id, $gambar)
    {
        if ($this->MenuModel->hapus($id, $gambar)) {
            redirect(base_url('aksesowner/menu'));
        }
    }

    public function meja()
    {
        if ($this->session->userdata('role') == 3) {
            $data['judul'] = "BloumCoffe | Owner - Kelola Menu";
            $data['profil'] = "assets/img/icon/kasir-icon.png";
            $data['kategori'] = "BloumCoffe | Owner - Kelola Menu";
            $data['jenis'] =  $this->KategoriModel->getAll();
            $data['jlhmeja'] =  $this->MejaModel->getAll();

            $this->load->view('owner/templates/header', $data);
            $this->load->view('owner/templates/sidebar', $data);
            $this->load->view('meja', $data);
            $this->load->view('owner/templates/footer', $data);
        } else {
            redirect('masterlogin/auth');
        }
    }

    public function tambahmeja()
    {
        if($this->MejaModel->updatemeja()){
            $this->session->set_flashdata('pesan',"berhasil");
            redirect('aksesowner/meja');
        }
    }


    public function laporan()
    {
         // Memastikan Owner Login
         if ($this->session->userdata('role') == 3 )
         {
             $data['judul'] = "BloumCoffe | Owner - Laporan";
             $data['profil'] = "assets/img/icon/kasir-icon.png";
 
             $data['laporan'] = $this->OwnerModel->getAllLaporan();
 
             $this->load->view('owner/templates/header',$data);
             $this->load->view('owner/templates/sidebar',$data);
             $this->load->view('owner/laporan/index',$data);
             $this->load->view('owner/templates/footer',$data);
         }
         else
         {
             redirect('masterlogin/auth');
         }
    }

    public function cetak()
    {
         // Memastikan Owner Login
         if ($this->session->userdata('role') == 3 )
         {
            $this->load->library('Pdf'); // MEMANGGIL LIBRARY PDF

             $data['judul'] = "BloumCoffe | Owner - Laporan";
             $data['profil'] = "assets/img/icon/kasir-icon.png";
 
             $data['laporan'] = $this->OwnerModel->getAllLaporan();
 
             $this->load->view('owner/laporan/cetak',$data);
         }
         else
         {
             redirect('masterlogin/auth');
         }
    }

    public function waktu()
    {

        // Memastikan Owner Login
         if ($this->session->userdata('role') == 3 )
         {
            if ($_POST['waktu']=="")
            {
                redirect('aksesowner/laporan');
            }
            else
            {

                $waktu = $_POST['waktu'];
                $pecah = explode("-",$waktu);
                $dd = $pecah[2];
                $mm = $pecah[1];
                $yy = $pecah[0];
                $year = str_split($yy,2)[1];

                $date = [$dd,' / ',$mm,' / ',$year];
                $tgl = implode($date);
        
                echo $tgl;
                
                $data['tgl'] = $tgl;

                $data['judul'] = "BloumCoffe | Owner - Laporan";
                $data['profil'] = "assets/img/icon/kasir-icon.png";
                $data['laporan'] = $this->OwnerModel->getAllLaporanTanggal($tgl);
                $this->load->view('owner/templates/header',$data);
                $this->load->view('owner/templates/sidebar',$data);
                $this->load->view('owner/laporan/index',$data);
                $this->load->view('owner/templates/footer',$data);
            }
         }
         else
         {
             redirect('masterlogin/auth');
         }
    }

    public function cetakWaktu($tgl)
    {
         // Memastikan Owner Login
         if ($this->session->userdata('role') == 3 )
         {
            $this->load->library('Pdf'); // MEMANGGIL LIBRARY PDF

             $data['judul'] = "BloumCoffe | Owner - Laporan";
             $data['profil'] = "assets/img/icon/kasir-icon.png";
 
             $data['laporan'] = $this->OwnerModel->getAllLaporanWaktu($tgl);
 
             $this->load->view('owner/laporan/cetak',$data);
         }
         else
         {
             redirect('masterlogin/auth');
         }
    }

    public function pelanggan()
    {
        $data['pengguna'] = $this->DaftarModel->membedakanpelanggan();
        $data['judul'] = "BloumCoffe | Owner - Laporan";
        $data['profil'] = "assets/img/icon/kasir-icon.png";
        $this->load->view('owner/templates/header',$data);
        $this->load->view('owner/templates/sidebar',$data);
        $this->load->view('owner/laporan/laporancustomer',$data);
        $this->load->view('owner/templates/footer',$data);
    }
}