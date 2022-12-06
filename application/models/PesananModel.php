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
        $kodepesanan = $this->session->userdata("pesananPOST")["kodePesanan"];
        $meja = $this->session->userdata("pesananPOST")["meja"];

        foreach ($this->session->userdata('pesanan') as $row) {
            $data2 = array(
                'kodePesanan' => $kodepesanan,
                "pesanan" => $row['namapesanan'],
                "jumlah" => $row['jumlahpesanan'],
                "harga" => $row['harga'],

            );
            $this->db->insert('masterpesanan', $data2);
        }
        $data = array(
            'kodePesanan' => $kodepesanan,
            "totalHarga" => $this->session->userdata('totalharga'),
            "statusPesanan" => 1,
            "tanggal" => date('d / m / y'),
            "noMeja" => $meja,
            "idpemesan" => $this->session->userdata('loginuser')['id'],
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

    public function updatepemesanan($id,$point,$total)
	{
		$data =
		[
			'diskon'=>$point,
            'totalHargaAkhir'=>$total
		];
    	$this->db->where('kodePesanan',$id);
		return $this->db->update('pesanan',$data);
	}	

    public function ambildata($idpesanan)
    {   
        $data = [
            "kodePesanan"=>$idpesanan
        ];
        return $this->db->get_where('pesanan',$data)->result()[0];
    }

    public function ambilpesanan($idpesanan)
    {   
        $data = [
            "kodePesanan"=>$idpesanan
        ];
        return $this->db->get_where('masterpesanan',$data)->result();
    }
}
