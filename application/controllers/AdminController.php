<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
        $this->load->model('MenuModel');
    }
    public function index()
    {
        echo "ini adalah master dari admin";
    }

    public function kelolakategori()
    {
        
        $data['kategori'] =  $this->KategoriModel->getAll()->result();
        $this->load->view('kategori/kelolakategori',$data);
    }

// bagian post
    public function postkategori()
    {
        $cek = $this->KategoriModel->pushkategori($_POST['namaKategori']);
        if($cek){
            echo "berhasil";
        }else{
            echo "Gagal masuk";
        }
    }
    // bagian post
    // kelolakategori
    public function hapuskategori($id)
    {
        $cek = $this->KategoriModel->hapuskategori($id);
        if($cek){
            redirect('admin/kategori');
        }else{
            echo "gagal dihapus";
        }
    }
    // kelolakategori


    // kelola menu
    public function kelolamenu()
    {

        $data['kategori'] =  $this->KategoriModel->getAll();
        $data['menu'] =  $this->KategoriModel->getAll();
        $this->load->view('menu/kelolamenu',$data);
    }
    public function insertmenu()
    {
        $ekstension                     = explode(".",$_FILES['menu']['name'])[1];
        $namamenu                       = $_POST['namamenu'];
        $filename                       = str_replace(" ","",$_POST['namamenu']);
        $harga                          = $_POST['harga'];
        $namagambar                     = $filename.".".$ekstension;
        $kategori                       = $_POST['kategori'];
		$config['upload_path']          = FCPATH.'/upload/menu';
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
        $push = $this->MenuModel->tambahmenu($namamenu,$harga,$namagambar,$kategori);
        if($push){
            echo "berhasil di simpan ke database";
        }
    }
    // kelola menu
}
