<?php


class PemesananController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MenuModel');
        $this->load->model('KategoriModel');
        $this->load->model('MejaModel');
        $this->load->model('PesananModel');
    }
    public function index()
    {
        $data['kategori'] = $this->KategoriModel->getall();
        $data['menu'] = $this->MenuModel->getall();
        $data['meja'] = $this->MejaModel->getall();
        $this->load->view('pemesanan/pemesanan', $data);
    }

    public function detailpemesanan($idproduk)
    {
        $data['meja'] = $this->MejaModel->getall();
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
        $data['meja'] = $this->MejaModel->getall();
        $this->load->view('pemesanan/editpesanan', $data);
    }

    public function getubahpesanan()
    {
        $rootsession = $this->session->userdata('pesanan');
        $rootsession[$_GET['id']]['jumlahpesanan'] = $_GET['jumlah'];
        $this->session->set_userdata('pesanan', $rootsession);
        redirect(base_url('editpesanan/'.$_GET['id']."/".$_GET['jumlah']));
    }

    public function prosespesanan()   
    {
       if($this->PesananModel->setpesanan())
       {
        $this->session->unset_userdata('pesanan');
        $this->session->unset_userdata('totalharga');
        redirect(base_url());
       }else{
        echo "Gagal dimasukkan ke database";
       }
    }
    public function uptokoki()
    {
        if ($this->PesananModel->kirimkekoki($_POST['form_idpesanan']))
        {
            redirect(base_url("akseskasir"));
        }
    }

    public function cooking()
    {
        if ($this->PesananModel->cooking($_POST['kodePesanan']))
        {
            redirect(base_url("akseskoki"));
        }
    }
    public function bayar()
    {
        if ($this->PesananModel->bayarPesanan($_POST['form_idpesanan']))
        {
            redirect(base_url("akseskasir"));
        }
    }

    public function upfinish()
    {
        if ($this->PesananModel->selesaimasak($_POST['kodePesanan']))
        {
            redirect(base_url("akseskoki"));
        }
    }

    
}
