<div class="login-box">
  <div class="login-logo">
    <img class="mb-3" src="<?=base_url('assets/img/logo-bloumcoffe.png')?>" alt="logo-bloumcaffe">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Harap Login Terlebih Dahulu</p>

      <?php 
          echo $this->session->flashdata('flash');
          $this->session->unset_userdata('flash');
      ?>

      <form action="<?=base_url('masterlogin/auth')?>" method="post">
        <?=form_error('username','<small class="text-danger">','</small>'); // form_error by CI ?>
        <div class="input-group mb-3">
          <input type="text" id="username" name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?=form_error('password','<small class="text-danger">','</small>'); // form_error by CI ?>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      
        <div class="social-auth-links text-center mb-3">
          <button type="submit" class="btn btn-block btn-success">
            <i class="fas fa-sign-in-alt mr-2"></i> Masuk
          </button>
        </div>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>