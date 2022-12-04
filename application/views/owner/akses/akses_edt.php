  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Ubah Akses User</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <!-- Main row -->

        <div class="row">
          <div class="col">

          <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Tambah User</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url('aksesowner/akses_edt/'.$iduser['username'])?>" method="POST">
                <div class="card-body">
                    <input type="hidden" class="form-control" id="username" name="username" placeholder="username" value="<?=$iduser['username']?>">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" value="<?=$iduser['password']?>">
                    <?=form_error('password','<small class="text-danger">','</small>'); // form_error by CI ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Level</label>
                    <select class="form-control" id="role" name="role">
                        <option value="<?=$iduser['role']?>">
                        <?php
                            if($iduser['role']==1)
                            {
                            echo "Kasir";
                            }
                            if($iduser['role']==2)
                            {
                            echo "Koki";
                            }
                            if($iduser['role']==3)
                            {
                            echo "Owner";
                            }
                        ?>
                        </option>
                        <option value="1">Kasir</option>
                        <option value="2">Koki</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning"><i class="nav-icon far fas fa-save mr-2"></i>Ubah</button>
                </div>
              </form>
            </div>

          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->