  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Data Kategori</h1>
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
          <div class="card">

            <div class="card-body">
              <a href="#" class="btn bg-purple mb-3" data-toggle="modal" data-target="#kategori_add"><i class="nav-icon far fas fa-plus mr-2"></i>Tambah Kategori</a>
              <?php 
                echo $this->session->flashdata('flash');
                $this->session->unset_userdata('flash');
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kategori</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1 ; foreach ($kategori as $kgr){?>
                <tr>
                  <td width="50"><?=$no++?></td>
                  <td><?=$kgr['kategori']?></td>
                  <td width="180">
                    <div class="row">
                      <div class="col">
                        <button data-toggle="modal" data-id="<?=$kgr['id_kategori']?>" data-target="#kategori_add" class="btn btn-block btn-warning btn-sm tombolUbahKategori"><i class="nav-icon far fas fa-edit"></i></button>
                      </div>
                      <div class="col">
                        <button data-toggle="modal" data-target="#kategori_del" class="btn btn-block btn-danger btn-sm"><i class="nav-icon far fas fa-trash"></i></button>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- modal formulir -->
<div class="modal fade" id="kategori_add">
  <div class="modal-dialog modal-lg info-dialog">
    <form action="<?=base_url('aksesowner/kategori_add')?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title info-title">Input Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="kategori">Nama Kategori</label>
          <input type="hidden" class="form-control" id="id" name="id">
          <input type="text" class="form-control" id="kategori" name="kategori" placeholder="kategori">
          <?=form_error('kategori','<small class="text-danger">','</small>'); // form_error by CI ?>
        </div>
      </div>
      <div class="modal-footer justify-content-between info-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn bg-purple mb-3"><i id="icon" class="nav-icon far fas fa-save mr-2"></i>Simpan</button>
      </div>
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal hapus -->
<div class="modal fade" id="kategori_del">
  <div class="modal-dialog modal-lg">
    <form action="<?=base_url('aksesowner/kategori_add')?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin menghapus kategori ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <a href="<?=base_url('aksesowner/kategori_del/').$kgr['id_kategori']?>" class="btn btn-danger mb-3"><i class="nav-icon far fas fa-trash mr-2"></i>Hapus</a>
      </div>
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->