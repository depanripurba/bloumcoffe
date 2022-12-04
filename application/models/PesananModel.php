<?php

class PesananModel extends CI_Model
{



    public function getAll()
    {
        $this->db->order_by('id', 'DESC');
        $dataquery = $this->db->get('pesanan')->result();
        $masterarray = [];
        foreach ($dataquery as $row) {
            $dataquerymasterpesanan = $this->db->get('masterpesanan')->result();
            $obpesanan = [];
            foreach ($dataquerymasterpesanan as $rows) {
                $datachild = [
                    "id" => $rows->id,
                    "pesanan" => $rows->pesanan,
                    "harga" => $rows->harga,
                ];
                $obpesanan[] = $datachild;
            }

            $simpledata = [
                "kodePesanan" => $row->kodePesanan,
                "tanggal" => $row->tanggal,
                "statusPesanan" => $row->statusPesanan,
                "noMeja" => $row->noMeja,
                "totalHarga" => $row->totalHarga,
                "diskon" => $row->diskon,
                "TotalHargaAkhir" => $row->totalHargaAkhir,
                "detailpesanan" => $obpesanan
            ];
            $masterarray[] = $simpledata;
        }
        return $masterarray;
    }

    // gettall for koki
    public function getAllForkoki()
    {
        $status = array('2', '3', '4');
        $this->db->where_in('statusPesanan', $status);
        $this->db->order_by('id', 'DESC');
        $dataquery = $this->db->get('pesanan')->result();
        $masterarray = [];
        foreach ($dataquery as $row) {
            $dataquerymasterpesanan = $this->db->get('masterpesanan')->result();
            $obpesanan = [];
            foreach ($dataquerymasterpesanan as $rows) {
                $datachild = [
                    "id" => $rows->id,
                    "pesanan" => $rows->pesanan,
                    "harga" => $rows->harga,
                ];
                $obpesanan[] = $datachild;
            }

            $simpledata = [
                "kodePesanan" => $row->kodePesanan,
                "tanggal" => $row->tanggal,
                "statusPesanan" => $row->statusPesanan,
                "noMeja" => $row->noMeja,
                "totalHarga" => $row->totalHarga,
                "diskon" => $row->diskon,
                "TotalHargaAkhir" => $row->totalHargaAkhir,
                "detailpesanan" => $obpesanan
            ];
            $masterarray[] = $simpledata;
        }
        return $masterarray;
    }
    // end getall for koki

    public function setpesanan()
    {
        foreach ($this->session->userdata('pesanan') as $row) {
            $data2 = array(
                'kodePesanan' => $_POST['kodepesanan'],
                "pesanan" => $row['namapesanan'],
                "jumlah" => $row['jumlahpesanan'],
                "harga" => $row['harga'],

            );
            $this->db->insert('masterpesanan', $data2);
        }
        $data = array(
            'kodePesanan' => $_POST['kodepesanan'],
            "totalHarga" => $this->session->userdata('totalharga'),
            "statusPesanan" => 1,
            "tanggal" => date('d / M / y'),
            "noMeja" => $_POST['meja'],
            "totalHargaAkhir" => $this->session->userdata('totalharga')

        );

        return $this->db->insert('pesanan', $data);
    }

    // 130
    public function getPesananByID($id)
    {
        return $this->db->get_where('masterpesanan', ['kodePesanan' => $id])->result();
    }
    public function getPesananByIDD($id)
    {
        return $this->db->get_where('pesanan', ['kodePesanan' => $id])->result();
    }

    public function bayarPesanan($kode)
    {
        $this->db->where('kodePesanan', $kode);
        return $this->db->update('pesanan', ['statusPesanan' => 5]);
    }

    public function kirimkekoki($kode)
    {
        $this->db->where('kodePesanan', $kode);
        return $this->db->update('pesanan', ['statusPesanan' => 2]);
    }

    public function cooking($kode){
        $this->db->where('kodePesanan', $kode);
        return $this->db->update('pesanan', ['statusPesanan' => 3]);
    }
    public function selesaimasak($kode){
        $this->db->where('kodePesanan', $kode);
        return $this->db->update('pesanan', ['statusPesanan' => 4]);
    }
}
