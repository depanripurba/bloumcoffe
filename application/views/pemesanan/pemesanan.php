<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/container/css/style.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" defer>
  <title>Official Website Bloum Coffe</title>
</head>
<style>
  .tbl{
    opacity: 0.6;
  }
  .tbl:hover{
    opacity: 1;
  }
</style>
<body>

  <nav class="navigasi">
    <div class="logo">
      <img src="assets/img/bloumcoffe.jpg" width="60px">
    </div>
    <ul>
      <li>
        <div class="select"><a href="../S3INDONESIA">Beranda</a></div>
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

   <!-- carousel-img -->
   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="padding-top:70px">
        <div class=" carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="desktop" src="<?=base_url('')?>assets/img/slide/bg-slide-1.jpg" style="width: 100%;" alt="">
                <img class="mobile" src="<?=base_url('')?>assets/img/slide/bg-slide-1_mobile.jpg" style="width: 100%;" alt="">
            </div>
            <div class="carousel-item">
                <img class="desktop" src="<?=base_url('')?>assets/img/slide/bg-slide-2.jpg" style="width: 100%;" alt="">
                <img class="mobile" src="<?=base_url('')?>assets/img/slide/bg-slide-2_mobile.jpg" style="width: 100%;" alt="">
            </div>
            <div class="carousel-item">
                <img class="desktop" src="<?=base_url('')?>assets/img/slide/bg-slide-3.jpg" style="width: 100%;" alt="">
                <img class="mobile" src="<?=base_url('')?>assets/img/slide/bg-slide-3_mobile.jpg" style="width: 100%;" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- / carousel-img -->
  <!-- bagian kategori menu -->

  <!-- bagian isi -->

  <section style="padding:20px;background:#f5f5f5">
    <div class="" style="padding:20px;background: #fff;border-radius:5px;">
      <div class="mb-3">
        <?php foreach ($menu as $row) : ?>
          <a href="" class="btn btn-primary"><?= $row->kategori ?></a>
        <?php endforeach ?>
      </div>
      <div class="row justify-content-md-center">
        <div class="col-7">
          <div class="row">
            <?php foreach ($menu as $row) :
              $prdk = $row->namamenu;
              $idpk = $row->id;
              $harg = $row->harga;
              $gmbr = $row->namagambar;
              $kat  = $row->kategori;
            ?>

              <div class="col-lg-3 col-sm-3 col-10 product-item">
                <a href="<?=base_url('detail/'.$idpk)?>" class="product-item-content">
                  <div class="product-label sale">sale</div>
                  <div id="collections-image" class="product-item-top">
                    <img src="<?= base_url('upload/menu/' . $gmbr) ?>" class="auto-image">
                  </div>
                  <div class="product-item-mid bg-white p-2">
                    <div class="product-item-detail">
                      <div class="product-item-title"><?= $prdk ?></div>
                      <div class="product-item-price">
                        <span class=""> <?= $kat ?> </span>
                        <br>
                        <span class="text-bold">Rp. <?= number_format($harg) ?></span>
                      </div>
                      <div>
                       <span class="label sale text-primary">Tersedia</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="col-4 border rounded align-self-start" style="margin-left: 20px!important;">
          <span class="text-bold">Pesanan Anda</span>
          <!-- start tabel -->
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
            <tbody >
              <?php $nomor = 1?>
              <?php foreach($this->session->userdata('pesanan') as $row):?>
              <tr>
                <td><?=$nomor?></td>
                <td><?=$row['namapesanan']?></td>
                <td>Rp. <?=number_format($row['harga'])?></td>
                <td width="10"><?=$row['jumlahpesanan']?></td>
                <td style="text-align:right">Rp. <?=number_format($row['totalharga'])?></td>
                <td><a href="<?=base_url('removepesanan/'.$row['idpesanan'])?>"><img class="tbl" src="<?=base_url('assets/img/icon/delete.png')?>" width="15" alt=""></a> <a href="<?=base_url('editpesanan/'.$row['idpesanan'].'/'.$row['jumlahpesanan'])?>"><img class="tbl" src="<?=base_url('assets/img/icon/edit.png')?>" width="15" alt=""></a></td>
              </tr>
              <?php $nomor++?>
              <?php endforeach?>

              <tr>
                <td colspan="4"><b>T O T A L</b></td>
                <td style="text-align:right"><b>Rp. <?=number_format($this->session->userdata('totalharga'))?></b></td>
                <td></td>
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
      </div>
    </div>
  </section>
  <section>
  </section>
  <!-- end bagian isi -->
  <!-- end bagian kategori menu -->

  <section style="background: #333">
    <div class="container" style="padding: 20px;" align="center">
      <font style="color:white;font-size: 12px;">Copyright © 2022 - BloumCoffe</font>
    </div>
  </section>

  <script src="assets/container/js/script.js"></script>
  <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>