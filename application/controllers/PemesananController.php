<?php


class PemesananController extends CI_Controller
{
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
        $this->load->view('pemesanan/pemesanan', $data);
    }

    public function detailpemesanan($idproduk)
    {
        $data['detail'] = $this->MenuModel->getspesifik($idproduk);
        $this->load->view('pemesanan/detailpesanan', $data);
    }

    // bagian kelola session untuk pemesanan
    public function banyakpesanan()
    {
        $rootdata = [];
        if ($this->session->userdata('pesanan') == null) {
            $rootdata[$_GET['id']] = [
                "idpesanan" => $_GET['id'],
                "namapesanan" => $_GET['namapesanan'],
                "jumlahpesanan" => $_GET['jumlah'],
                "harga" => $_GET['harga'],
                "totalharga" => $_GET['jumlah'] * $_GET['harga']
            ];
        } else {
            $rootdata = $this->session->userdata('pesanan');
            if (isset($rootdata[$_GET['id']])) {
                $jmlpes = $rootdata[$_GET['id']]['jumlahpesanan'];
                unset($rootdata[$_GET['id']]);
                $ttlpes = $_GET['jumlah'] + $jmlpes;
                $rootdata[$_GET['id']] = [
                    "idpesanan" => $_GET['id'],
                    "namapesanan" => $_GET['namapesanan'],
                    "jumlahpesanan" => $ttlpes,
                    "harga" => $_GET['harga'],
                    "totalharga" => $ttlpes * $_GET['harga']
                ];
            } else {
                $rootdata[$_GET['id']] = [
                    "idpesanan" => $_GET['id'],
                    "namapesanan" => $_GET['namapesanan'],
                    "jumlahpesanan" => $_GET['jumlah'],
                    "harga" => $_GET['harga'],
                    "totalharga" => $_GET['jumlah'] * $_GET['harga']
                ];
            }
        }


        $this->session->set_userdata('pesanan', $rootdata);
        $totalharga = 0;
        foreach ($this->session->userdata('pesanan') as $row) {
            $totalharga += $row['totalharga'];
        }
        $this->session->set_userdata('totalharga', $totalharga);
        redirect(base_url('detail/' . $_GET['id']));
    }

    public function removepesanan($id)
    {
        var_dump($id);
        $rootsession = $this->session->userdata('pesanan');
        unset($rootsession[$id]);
        $this->session->set_userdata('pesanan', $rootsession);
        redirect(base_url('./'));
    }

    public function editpesanan($id, $jumlahpesanan)
    {
        $data['detail'] = $this->MenuModel->getspesifik($id);
        $data['jumlahpesanan'] = $jumlahpesanan;
        $this->load->view('pemesanan/editpesanan', $data);
    }

    public function getubahpesanan()
    {
        $rootsession = $this->session->userdata('pesanan');
        $rootsession[$_GET['id']]['jumlahpesanan'] = $_GET['jumlah'];
        $this->session->set_userdata('pesanan', $rootsession);
        redirect(base_url());
    }
}
