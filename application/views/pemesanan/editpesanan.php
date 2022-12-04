<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/container/css/style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/bootstrap/css/bootstrap.min.css" defer>
    <title>Edit Pesananan</title>
</head>

<body>

    <nav class="navigasi">
        <div class="logo">
            <img src="<?= base_url() ?>assets/img/bloumcoffe.jpg" width="60px">
        </div>
        <ul>
            <li>
                <div class="select"><a href="">Beranda</a></div>
            </li>
            <li>
                <div class="select"><a href="https://s3indonesia.co.id">Produk</a></div>
            </li>
            <li>
                <div class="select"><a href="tentang">Tentang</a></div>
            </li>
            <li>
                <div class="select"><a href="kontak">Kontak</a></div>
            </li>
            <?php if (isset($_SESSION['data'])) : ?>
                <li>
                    <div class="select"><a href="logout.php">Log Out</a></div>
                </li>
            <?php endif ?>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <div class="hamparan"></div>

    <div style="height: 70px;"></div>
    <!-- bagian kategori menu -->

    <!-- bagian isi -->

    <section style="padding:30px;background:#f5f5f5">
        <div class="container" style="padding:20px;background: #fff;border-radius:5px;">
            <div class="row">
                <div class="col-12" style="font-size:25px;margin-bottom:10px"><b>Ubah Pesanan</b></div>
                <!-- bagian detail produk yang akan di beli -->
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="product-label sale">sale</div>
                            <img src="<?= base_url('upload/menu/' . $detail->namagambar) ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $detail->namamenu ?></h5>
                                <span class="text-bold">Rp. <?= number_format($detail->harga) ?></span>
                                <span class="text-primary">Tersedia</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 border rounded align-self-start">
                        <form action="<?= base_url() ?>PemesananController/getubahpesanan" method="GET" class="form">
                            <span><i class="text-danger">*Silahkan Ubah Jumlah Pesanan</i> </span>
                            <div class="form-group mb-3">
                                <input name="namapesanan" type="hidden" value="<?= $detail->namamenu ?>">
                                <label for="nama">Nama Pesanan</label>
                                <input type="hidden" name="id" value="<?= $detail->id ?>">
                                <input type="hidden" name="harga" value="<?= $detail->harga ?>">
                                <input value="<?= $detail->namamenu ?>" id="nama" disabled type="text" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" value="<?= $jumlahpesanan ?>" id="jumlah" name="jumlah" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success">Ubah Pesanan</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-5 border rounded align-self-start" style="margin-left: 20px!important;">
                        <span class="text-bold">Pesanan Anda</span>
                        <!-- start tabel -->
                        <?php if ($this->session->userdata('pesanan') != null) : ?>
                            <table class="table" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">*</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1 ?>
                                    <?php foreach ($this->session->userdata('pesanan') as $row) : ?>
                                        <tr>
                                            <td><?= $nomor ?></td>
                                            <td><?= $row['namapesanan'] ?></td>
                                            <td>Rp. <?= number_format($row['harga']) ?></td>
                                            <td width="10"><?= $row['jumlahpesanan'] ?></td>
                                            <td style="text-align:right">Rp. <?= number_format($row['totalharga']) ?></td>
                                            <td><a href="<?= base_url('removepesanan/' . $row['idpesanan']) ?>"><img class="tbl" src="<?= base_url('assets/img/icon/delete.png') ?>" width="15" alt=""></a> <a href="<?= base_url('editpesanan/' . $row['idpesanan'] . '/' . $row['jumlahpesanan']) ?>"><img class="tbl" src="<?= base_url('assets/img/icon/edit.png') ?>" width="15" alt=""></a></td>
                                        </tr>
                                        <?php $nomor++ ?>
                                    <?php endforeach ?>


                                    <tr>
                                        <td colspan="4"><b>T O T A L</b></td>
                                        <td style="text-align:right"><b>Rp. <?= number_format($this->session->userdata('totalharga')) ?></b></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="<?= base_url('PemesananController/prosespesanan') ?>" method="POST">
                                <div class="form-group">
                                    <label for="kodegejala">Kode Pesanan</label>
                                    <input name="kode_pesanan" disabled type="text" class="form-control" placeholder="pilih nomor meja generate kode pesanan" id="kodepesanan">
                                    <input name="kodepesanan" type="hidden" id="kodepesananhide">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kodegejala">Nomor Meja</label>
                                    <select name="meja" id="trigerpesanan" class="form-control">
                                        <option value="0">--Pilih Nomor Meja--</option>
                                        <?php for ($i = 1; $i <= $meja[0]->jlhmeja; $i++) : ?>
                                            <option value="<?= $i ?>">Meja <?= $i ?></option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                                <small class="text-danger"><i>Pastikan anda sudah memilih nomor meja dengan benar</i> </small>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                                </div>
                            <?php endif ?>
                            </form>
                            <?php if ($this->session->userdata('pesanan') == null) : ?>
                                <br><span class="text-danger">Belum ada pesanan</span>
                                <br><span>Silahkan Pilih menu!!</span>
                            <?php endif ?>
                    </div>
                    <!-- menu kanan -->
                    <center><a href="<?= base_url() ?>" class="btn btn-primary mt-3">Lihat Menu Lainnya</a></center>
                </div>
            </div>

            <!-- end bagian detail produk yang akan dibeli -->

        </div>

        </div>
    </section>
    <!-- end bagian isi -->
    <!-- end bagian kategori menu -->

    <section style="background: #333">
        <div class="container" style="padding: 20px;" align="center">
            <font style="color:white;font-size: 12px;">Copyright © 2022 - BloumCoffe</font>
        </div>
    </section>

    <script src="<?= base_url() ?>/assets/container/js/script.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <?php if ($this->session->userdata('pesanan') == null) : ?>
        <script>
            sessionStorage.removeItem("kodepesanan")
            sessionStorage.removeItem("nomormeja")
        </script>
    <?php endif ?>
    <!-- akhir dari cek session berisi atau tidak -->
    <script>
        kodepesanlocal = sessionStorage.getItem('kodepesanan')
        const trigerpes = document.querySelector('#trigerpesanan')
        const kodepeshide = document.querySelector('#kodepesananhide')
        const kodepesanan = document.querySelector('#kodepesanan')
        console.log("ini isi triger" + trigerpes.value);
        console.log(kodepesanan.value);
        if (sessionStorage.getItem('nomormeja') == null) {
            trigerpes.value = 0
        } else {
            trigerpes.value = sessionStorage.getItem('nomormeja')
        }
        if (kodepesanan.value == null) {

        } else {
            kodepesanan.value = sessionStorage.getItem('kodepesanan')
            kodepeshide.value = sessionStorage.getItem('kodepesanan')

        }

        console.log(sessionStorage.getItem('kodepesanan'))
        trigerpes.addEventListener('change', (a) => {
            let kodepesan = "PSN"
            let nomormeja = a.target.value
            console.log(nomormeja)
            let detik = new Date().getSeconds()
            let menit = new Date().getMinutes()
            let jam = new Date().getHours()
            let hari = new Date().getDay()
            let tanggal = new Date().getDate()
            let bulan = new Date().getMonth()
            let tahun = new Date().getFullYear()
            kodepesanankomplit = kodepesan + nomormeja + detik + menit + jam + tanggal + bulan + tahun
            kodepesanan.value = kodepesanankomplit
            kodepeshide.value = kodepesanankomplit

            sessionStorage.setItem("kodepesanan", kodepesanankomplit)
            sessionStorage.setItem("nomormeja", nomormeja)
        })
    </script>

    <!-- end custom script -->
</body>

</html>