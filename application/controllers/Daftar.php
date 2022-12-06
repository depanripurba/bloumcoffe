<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

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
		$this->load->model('DaftarModel');
	}
	public function index()
	{
		$this->load->view('daftar');
	}

    public function registrasi()
	{
        // var_dump($_POST);
        // die;
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $senderdata = $this->DaftarModel->Daftar($nama,$tgl_lahir,$no_hp,$alamat,$username,$password);
       if($senderdata){
        $this->session->set_flashdata("berhasil","berhasil");
		redirect(base_url('login'));
       }
	}

	public function profile()
	{
		
        $data['judul'] = "Profile";
		$data['profile'] = $this->DaftarModel->spesifikuser($this->session->userdata('loginuser')['id']);
        $data['dp'] = base_url('assets/img/icon-bloumcoffe.png');
        $this->load->view('pemesanan/templates/header', $data);
        $this->load->view('profile', $data);
	}

}
