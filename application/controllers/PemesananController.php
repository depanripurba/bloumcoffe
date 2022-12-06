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
        $this->load->model('DaftarModel');
    }

    public function index()
    {
        $data['kategori'] = $this->KategoriModel->getall();
        $data['menu'] = $this->MenuModel->getall();
        $data['meja'] = $this->MejaModel->getall();
        $data['judul'] = "Bloum Coffe";
        $data['dp'] = base_url('assets/img/icon-bloumcoffe.png');
        $this->load->view('pemesanan/templates/header', $data);
        $this->load->view('pemesanan/pemesanan', $data);
    }

    public function detailpemesanan($idproduk)
    {
        $data['meja'] = $this->MejaModel->getall();
        $data['detail'] = $this->MenuModel->getspesifik($idproduk);
        $data['judul'] = "Bloum Coffe - Detail Pesanan";
        $data['dp'] = base_url('assets/img/icon-bloumcoffe.png');
        $this->load->view('pemesanan/templates/header', $data);
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
                    "totalharga" => $ttlpes * $_GET['harga'],
                    "idpemesan" => $this->session->userdata('loginuser')['id']
                ];
            } else {
                $rootdata[$_GET['id']] = [
                    "idpesanan" => $_GET['id'],
                    "namapesanan" => $_GET['namapesanan'],
                    "jumlahpesanan" => $_GET['jumlah'],
                    "harga" => $_GET['harga'],
                    "totalharga" => $_GET['jumlah'] * $_GET['harga'],
                    "idpemesan" => $this->session->userdata('loginuser')['id']
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
        redirect(base_url('editpesanan/' . $_GET['id'] . "/" . $_GET['jumlah']));
    }

    public function prosespesanan()
    {
        if ($_POST['kodepesanan'] == null) {
            redirect(base_url());
        }
        $postdata = [
            "kodePesanan" => $_POST['kodepesanan'],
            "meja" => $_POST['meja'],
        ];
        $this->session->set_userdata('pesananPOST', $postdata);

        if ($this->session->userdata('loginuser') == null) {
            $this->session->set_userdata('kode', 1);
            redirect('ValidasiController');
        } else {
            if ($this->PesananModel->setpesanan()) {
                $this->session->unset_userdata('pesanan');
                $this->session->unset_userdata('totalharga');
                $this->session->unset_userdata('pesananPOST');
                $this->session->set_flashdata('flash', '<div class="success success-warning" role="alert">Pesanan Sudah Diantriam</div>');
                redirect(base_url());
            } else {
                echo "Gagal dimasukkan ke database";
            }
        }
    }
    public function uptokoki()
    {
        if ($this->PesananModel->kirimkekoki($_POST['form_idpesanan'])) {
            redirect(base_url("akseskasir"));
        }
    }

    public function cooking()
    {
        if ($this->PesananModel->cooking($_POST['kodePesanan'])) {
            redirect(base_url("akseskoki"));
        }
    }
    public function bayar()
    {
        $point = ($_POST['totalbelanja'] / 1000) + $_POST['point'];
        if ($_POST['statusbayar'] == 1) {
            $this->DaftarModel->updatepoint($_POST['id'], $point);
        }
        if ($_POST['statusbayar'] == 2) {
            $total  = $_POST['totalbelanja'] - $point;
            $this->DaftarModel->updatepoint($_POST['id'], 0);
            $this->PesananModel->updatepemesanan($_POST['kodebelanja'], $point, $total);
        }
        if ($this->PesananModel->bayarPesanan($_POST['form_idpesanan'])) {
            $this->session->set_flashdata("print", true);
            $this->session->set_flashdata("url", base_url('pemesanancontroller/bill/' . $_POST['form_idpesanan']) . '/' . $_POST['point'] . '/' . $_POST['bayar'].'/'.$_POST['gunakan']."/printbill");
            redirect(base_url("akseskasir"));
        }
    }

    public function upfinish()
    {
        if ($this->PesananModel->selesaimasak($_POST['kodePesanan'])) {
            redirect(base_url("akseskoki"));
        }
    }

    public function bill($idpemesan, $point, $bayar,$gunakan)
    {
        // Memastikan Owner Login
        $data['point'] = $point;
        $data['bayar'] = $bayar;
        $data['gunakan'] = $gunakan;
        $data['root'] = $this->PesananModel->ambildata($idpemesan);
        $data['listpesanan'] = $this->PesananModel->ambilpesanan($idpemesan);
        $data['person'] = $this->DaftarModel->getspesifik($data['root']->idpemesan);
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY PDF 
        $this->load->view('pemesanan/bill', $data);
    }
    public function printdetail($idpes,$status)
    {
        // Memastikan Owner Login
        $data['status'] = $status;
        $data['root'] = $this->PesananModel->ambildata($idpes);
        $data['listpesanan'] = $this->PesananModel->ambilpesanan($idpes);
        $data['person'] = $this->DaftarModel->getspesifik($data['root']->idpemesan);
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY PDF 
        $this->load->view('pemesanan/printdetail', $data);
    }
    
}
