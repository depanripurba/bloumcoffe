  <!-- bagian kategori menu -->

  <!-- bagian isi -->

  <section style="padding:20px;background:#f5f5f5">
      <div class="" style="padding:20px;background: #fff;border-radius:5px;">
          <div class="mb-3">
              <div class="card border" style="width:20rem;margin:auto;height:80vh">
                  <img src="<?= base_url('assets/img/bloumcoffe.jpg') ?>" width="100px!important" class="card-img-top" alt="...">
                  <div class="card-body">
                      <?php if ($profile->result() == null) { ?>
                          <h2>Anda Login Sebagai Tamu</h2>
                      <?php }else{ ?>
                      <div>
                          <h5>Identitas User</h5>
                      </div>
                      <table class="table">
                          <tbody>
                              <tr>
                                  <td>Nama User</td>
                                  <td>:</td>
                                  <td><?= $profile->result()[0]->nama ?></td>
                              </tr>
                              <tr>
                                  <td>Tanggal Lahir</td>
                                  <td>:</td>
                                  <td><?= $profile->result()[0]->tanggal_lahir ?></td>
                              </tr>
                              <tr>
                                  <td>Point</td>
                                  <td>:</td>
                                  <td><?= $profile->result()[0]->point ?></td>
                              </tr>
                              <tr>
                                  <td>Status</td>
                                  <td>:</td>
                                  <td>
                                      <?php if ($profile->result()[0]->counter >= 10) {
                                            echo "Customer Lama";
                                        } else {
                                            echo "Customer Baru";
                                        }
                                        ?>
                                  </td>
                              </tr>
                          </tbody>
                         
                      </table>
                      <?php } ?>
                      <center><a href="<?=base_url()?>" class="btn btn-success">Menu</a></center>
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