  <!-- bagian kategori menu -->

  <!-- bagian isi -->

  <section style="padding:20px;background:#f5f5f5">
    <div class="" style="padding:20px;background: #fff;border-radius:5px;">
      <div class="mb-3">
        <?php foreach ($kategori as $row) : ?>
          <a href="<?= $row['id_kategori'] ?>" class="btn btn-success"><?= $row['kategori'] ?></a>
        <?php endforeach ?>
      </div>
      <div class="row">
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
                <a href="<?= base_url('detail/' . $idpk) ?>" class="product-item-content">
                  <div class="product-label sale">sale</div>
                  <div id="collections-image" class="product-item-top">
                    <img src="<?= base_url('upload/menu/' . $gmbr) ?>" class="auto-image">
                  </div>
                  <div class="product-item-mid bg-white p-2">
                    <div class="product-item-detail">
                      <div class="product-item-title"><?= $prdk ?></div>
                      <div class="product-item-price">
                        <span class="">
                          <?php foreach ($kategori as $row) : ?>
                            <?php if($kat==$row['id_kategori']):?>
                              <span><?=$row['kategori']?></span>
                              <?php endif;?>
                          <?php endforeach ?>
                        </span>
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
        <div class="col-5">
          <div class="border rounded align-self-start p-3">
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
                      <td>
                        <a href="<?= base_url('removepesanan/' . $row['idpesanan']) ?>"><i class="icon fas fa-trash"></i></a>
                        <a href="<?= base_url('editpesanan/' . $row['idpesanan'] . '/' . $row['jumlahpesanan']) ?>"><i class="icon fas fa-edit"></i></a>
                      </td>
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
                  <label for="kodegejala" class="mb-1">Kode Pesanan</label>
                  <input name="kode_pesanan" disabled type="text" class="form-control" placeholder="pilih nomor meja generate kode pesanan" id="kodepesanan">
                  <input required name="kodepesanan" type="hidden" id="kodepesananhide">
                </div>
                <div class="mb-3"></div>
                <div class="form-group">
                  <label for="kodegejala" class="mb-1">Nomor Meja</label>
                  <select name="meja" id="trigerpesanan" class="form-control">
                    <option value="0">--Pilih Nomor Meja--</option>
                    <?php for ($i = 1; $i <= $meja[0]->jlhmeja; $i++) : ?>
                      <option value="<?= $i ?>">Meja <?= $i ?></option>
                    <?php endfor ?>
                  </select>
                </div>
                <small class="text-danger"><i>Pastikan anda sudah memilih nomor meja dengan benar</i></small>
                <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary"><strong>Pesan Sekarang</strong></button>
                </div>
              <?php endif ?>
              </form>
              <?php if ($this->session->userdata('pesanan') == null) : ?>
                <br><span class="text-danger">Belum ada pesanan</span>
                <br><span>Silahkan Pilih menu!!</span>

                <?php if ($this->session->flashdata('flash') != null) : ?>
                  <div class="alert alert-primary" role="alert">
                    Pesanan Dalam Antrian
                  </div>
                <?php endif ?>


              <?php endif ?>

              
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
  <!-- custom script -->
  <!-- cek session pesanan kosong atau tidak -->
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