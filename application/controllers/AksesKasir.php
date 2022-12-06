<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AksesKasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Memastikan User yang login
        $this->load->Model('PesananModel');
        $this->load->Model('DaftarModel');
        if (!$this->session->userdata('role')) {
            redirect('masterlogin/auth');
        }
    }

    public function index()
    {
        // Memastikan Owner Login
        if ($this->session->userdata('role') == 1) {
            $data['antrian'] = $this->PesananModel->getall();
            $data['judul'] = "BloumCoffe | Kasir";
            $data['profil'] = "assets/img/icon/kasir-icon.png";
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/sidebar', $data);
            $this->load->view('kasir/index', $data);
            $this->load->view('template/admin/footer', $data);
        } else {
            redirect('masterlogin/auth');
        }
    }

    public function detailpesanan()
    {
        // Memastikan Owner Login
        if ($this->session->userdata('role') == 1) {
            $data['judul'] = "BloumCoffe | Kasir";
            $data['profil'] = "assets/img/icon/kasir-icon.png";
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/sidebar', $data);
            $this->load->view('kasir/detailpesanan', $data);
            $this->load->view('template/admin/footer', $data);
        } else {
            redirect('masterlogin/auth');
        }
    }

    // 130
    public function getdetail()
    {
        $masterarraypre = [];
        $masterarray = [];

        foreach ($this->PesananModel->getPesananByID($_POST['id']) as $row) {
            $simplearr = [
                "kodePesanan" => $row->kodePesanan,
                "pesanan" => $row->pesanan,
                "jumlah" => $row->jumlah,
                "harga" => $row->harga,
            ];
            $masterarray[] = $simplearr;
        }
        $pesanan = $this->PesananModel->getPesananByIDD($_POST['id']);
        $masterarraypre['detailpes'] = $masterarray;
        $masterarraypre['point'] = $pesanan[0]->noMeja;

        if($pesanan[0]->idpemesan=="PE"){
            $masterarraypre['point'] = 0;
            $masterarraypre['nama'] = "Pengunjung";
            $masterarraypre['id'] = "PE";
        }else{
            $point = $this->DaftarModel->getspesifik($pesanan[0]->idpemesan);
            $masterarraypre['point'] = $point->point;
            $masterarraypre['nama'] = $point->nama;
            $masterarraypre['id'] = $point->id_customer;
        }
        $masterarraypre['kodePesanan'] = $_POST['id']; 
        $masterarraypre['noMeja'] = $pesanan[0]->noMeja;
        $masterarraypre['tanggal'] = $pesanan[0]->tanggal;
        $masterarraypre['statusPesanan'] = $pesanan[0]->statusPesanan;
        $masterarraypre['totalHarga'] = $pesanan[0]->totalHarga;
        $masterarraypre['diskon'] = $pesanan[0]->diskon;
        $masterarraypre['totalHargaAkhir'] = $pesanan[0]->totalHargaAkhir;
        echo json_encode($masterarraypre);
    }
}
