  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col">

                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">

              <!-- Main row -->
              <div class="col-md-6">
                <?php if($this->session->flashdata('pesan')):?>
                  <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Alert!</h5>
                     Data Meja Berhasil Di Update
                  </div>
                <?php endif ?>
                  <div class="card card-success">
                      <div class="card-header">
                          <h3 class="card-title">Kelola Meja</h3>
                      </div>

                      <form action="<?= base_url('aksesowner/tambahmeja') ?>" method="POST">
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Jumlah Meja</label>
                                  <input type="hidden" name="id" value="<?= $jlhmeja[0]->id ?>">
                                  <input type="number" name="jlh_meja" value="<?= $jlhmeja[0]->jlhmeja ?>" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Meja">
                              </div>
                          </div>
                          <div class="card-footer">
                              <button type="submit" class="btn btn-success">Update Jumlah Meja</button>
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