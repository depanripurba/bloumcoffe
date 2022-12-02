<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/container/css/style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/bootstrap/css/bootstrap.min.css" defer>
    <title>Official Website Bloum Coffe</title>  
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
                <div class="col-12" style="font-size:25px;margin-bottom:10px"><b>Detail Pesanan</b></div>
                <!-- bagian detail produk yang akan di beli -->
                <div class="row">
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                        <div class="product-label sale">sale</div>
                            <img src="<?= base_url('upload/menu/' . $detail->namagambar) ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $detail->namamenu ?></h5>
                                <span class="text-bold">Rp. <?=number_format($detail->harga)?></span>
                                <span class="text-primary">Tersedia</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 border rounded align-self-start">
                    <form action="../PemesananController/banyakpesanan" method="GET" class="form">
                        <span><i class="text-danger">*Silahkan Sesuaikan Jumlah Pesanan</i> </span>
                        <div class="form-group mb-3">
                            <input name="namapesanan" type="hidden" value="<?=$detail->namamenu?>">
                            <label for="nama">Nama Pesanan</label>
                            <input type="hidden" name="id" value="<?=$detail->id?>">
                            <input type="hidden" name="harga" value="<?=$detail->harga?>">
                            <input value="<?=$detail->namamenu?>" id="nama" disabled type="text" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" value="1" id="jumlah" name="jumlah" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success">Tambahkan</button>
                        </div>
                    </form>
                    </div>
                    
                    <div class="col-4 border rounded  align-self-start">
                        <!-- menu kanan -->
                        <span class="text-bold">Pesanan Anda</span>
                        <!-- start tabel -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">*</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nasi Goreng</td>
                                    <td>2</td>
                                    <td>120000</td>
                                    <td><a href="" class="btn btn-primary">X</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nasi Gurih</td>
                                    <td>2</td>
                                    <td>120000</td>
                                    <td><a href="" class="btn btn-primary">X</a></td>
                                </tr>
                                <tr>
                                    <td colspan="4">total</td>
                                    <td>120000</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="kodegejala">Kode Pesanan</label>
                            <input value="" disabled name="kode_penyakit" type="text" class="form-control" id="kodegejala" placeholder="Kode Penyakit">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kodegejala">Nomor Meja</label>
                            <select name="" id="" class="form-control">
                                <option value="">Meja 1</option>
                                <option value="">Meja 2</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary">Konfirmasi Pesanan</button>
                        </div>
                    </div>
                    <!-- menu kanan -->
                    <center><a href="<?=base_url()?>" class="btn btn-primary mt-3">Lihat Menu Lainnya</a></center>
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
</body>

</html>