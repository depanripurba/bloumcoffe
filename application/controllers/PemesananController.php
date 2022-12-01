<?php


class PemesananController extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
        $this->load->model('KategoriModel');
	}
    public function index()
    {
        $data['kategori'] = $this->KategoriModel->getall();
        $data['menu'] = $this->MenuModel->getall();
        $this->load->view('pemesanan/pemesanan',$data);
    }

    public function detailpemesanan($idproduk)
    {
        $data['detail'] = $this->MenuModel->getspesifik($idproduk);
        $this->load->view('pemesanan/detailpesanan',$data);
    }

    // bagian kelola session untuk pemesanan
    public function banyakpesanan()
    {
        
        $singledata = [
            "namapesanan"=>$_GET['namapesanan'],
            "jumlahpesanan"=>$_GET['jumlah']
        ];
  
        $this->session->set_userdata($singledata);
        redirect(base_url('detail/'.$_GET['id']));

    }
}