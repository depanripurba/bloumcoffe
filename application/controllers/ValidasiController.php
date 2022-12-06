<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ValidasiController extends CI_Controller
{

    public function index()
    {
        $this->session->set_userdata('riwayat', 'pesanan');
        $this->load->view('validasi');
    }


    public function proseslogin()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = htmlspecialchars($this->input->post('password', true));

        // Memeriksa Username
        $user = $this->db->get_where('daftar', ['username' => $username])->row_array();

        // Pengecekan User
        if ($user) {
            // Memeriksa Password
            if ($password == $user['password']) {
                // Menyiapkan Data User yang Masuk
                $data = [
                    'user' => $user['username'],
                    'point' => $user['point'],
                    'id'=>$user['id_customer'],
                ];
                $this->session->set_userdata('loginuser', $data);

                // Menyesuakan Halaman User yang Login
                if ($this->session->userdata('loginuser') != null) {
                    redirect(base_url('PemesananController/prosespesanan'));
                } else {
                    redirect(base_url());
                }
            } else {
                // Flash Notif Password salah by CI
                $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">Maaf, <strong>Password</strong> salah</div>');
                redirect(base_url('login'));
            }
        } else {
            // Flash Notif Username tidak terdaftar by CI
            $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">Maaf, <strong>Username</strong> Belum terdaftar</div>');
            redirect('masterlogin/auth');
        }
    }

    public function setpengguna()
    {
        $pengguna = [
            "nama" => "pengunjung",
            "point" => "tidak ada point",
            'id'=>"PE",
        ];
        $this->session->set_userdata('loginuser', $pengguna);
        redirect('PemesananController/prosespesanan');
    }

    public function logout(){
        $this->session->unset_userdata('loginuser');
        redirect(base_url());
    }
}
