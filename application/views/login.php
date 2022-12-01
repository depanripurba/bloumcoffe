<!doctype html>
<html lang="en">

<head>
  <title>Silahkan Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/buttons.bootstrap4.min.css">
  <!-- end datatable -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/adminlte.min.css">
   <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/css/') ?>A.style.css.pagespeed.cf.EsokhafFue.css">
  <script nonce="51c308ec-8b6d-44e9-bcfa-03767feea8dd">
    (function(w, d) {
      ! function(a, e, t, r) {
        a.zarazData = a.zarazData || {};
        a.zarazData.executed = [];
        a.zaraz = {
          deferred: []
        };
        a.zaraz.q = [];
        a.zaraz._f = function(e) {
          return function() {
            var t = Array.prototype.slice.call(arguments);
            a.zaraz.q.push({
              m: e,
              a: t
            })
          }
        };
        for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
        a.zaraz.init = () => {
          var t = e.getElementsByTagName(r)[0],
            z = e.createElement(r),
            n = e.getElementsByTagName("title")[0];
          n && (a.zarazData.t = e.getElementsByTagName("title")[0].text);
          a.zarazData.x = Math.random();
          a.zarazData.w = a.screen.width;
          a.zarazData.h = a.screen.height;
          a.zarazData.j = a.innerHeight;
          a.zarazData.e = a.innerWidth;
          a.zarazData.l = a.location.href;
          a.zarazData.r = e.referrer;
          a.zarazData.k = a.screen.colorDepth;
          a.zarazData.n = e.characterSet;
          a.zarazData.o = (new Date).getTimezoneOffset();
          a.zarazData.q = [];
          for (; a.zaraz.q.length;) {
            const e = a.zaraz.q.shift();
            a.zarazData.q.push(e)
          }
          z.defer = !0;
          for (const e of [localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a.startsWith("_zaraz_"))).forEach((t => {
            try {
              a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
            } catch {
              a.zarazData["z_" + t.slice(7)] = e.getItem(t)
            }
          }));
          z.referrerPolicy = "origin";
          z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData)));
          t.parentNode.insertBefore(z, t)
        };
        ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, 0, "script");
    })(window, document);
  </script>
</head>

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="login-wrap p-4 p-md-5">
            <!-- <div class="icon d-flex align-items-center justify-content-center">
              <i class="fa fa-user text-white"></i>
            </div> -->
            <h3 class="text-center mb-4">Silahkan Login Terlebih Dahulu</h3>
            <form action="<?= base_url('auth/validate') ?>" method="POST" class="login-form">
              <div class="form-group">
                <input name="username" type="text" class="form-control rounded-left" placeholder="Username" required>
              </div>
              <div class="form-group d-flex">
                <input name="password" type="password" class="form-control rounded-left" placeholder="Password" required>
              </div>
                <div style="text-align:center">Belum Punya Akun ?? <a href="<?=base_url('daftar')?>">Daftar</a></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="<?= base_url('assets/js/') ?>jquery.min.js"></script>
  <script src="<?= base_url('assets/js/') ?>popper.js+bootstrap.min.js+main.js.pagespeed.jc.wRxug4_Avg.js"></script>
  <script>
    eval(mod_pagespeed_mGxpOPO3_V);
  </script>
  <script>
    eval(mod_pagespeed_hRdA8ZBafG);
  </script>
  <script>
    eval(mod_pagespeed_jDGrFP5nZp);
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"73ea831c7a499fa7","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.0","si":100}' crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/') ?>js/toastr.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/sweetalert2.min.js"></script>
  <!-- inisialisasi toast -->
  <script>
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    
  </script>
  <script>
    var pesan = '<?= $this->session->flashdata('alert') ?>';
    var pesandua = '<?= $this->session->flashdata('berhasil') ?>';
  </script>
  <!-- end inisialisasi toast -->
  <!-- cek triger toast -->
  <?php if ($this->session->flashdata('alert') != null) : ?>
    <?php
    echo "<script>
  swalWithBootstrapButtons.fire(
      'Warning',
      pesan,
      'error'
    )

  </script>";
    ?>
  <?php endif ?>
  <?php if ($this->session->flashdata('berhasil') != null) : ?>
    <?php
    echo "<script>
  swalWithBootstrapButtons.fire(
      'Berhasil',
      pesandua,
      'success'
    )

  </script>";
    ?>
  <?php endif ?>
  <!-- end cek triger toast -->
</body>

</html>