  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Data Menu</h1>
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
                <a href="#" class="btn bg-purple mb-3" data-toggle="modal" data-target="#kategori_add"><i class="nav-icon far fas fa-plus mr-2"></i>Tambah Menu</a>
                <?php
                echo $this->session->flashdata('flash');
                $this->session->unset_userdata('flash');
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Menu</th>
                      <th>Harga</th>
                      <th>
                        <center>Gambar</center>
                      </th>
                      <th>Kategori</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($menu as $kgr) { ?>
                      <tr>
                        <td width="50"><?= $no++ ?></td>
                        <td><?= $kgr->namamenu ?></td>
                        <td>Rp. <?= number_format($kgr->harga) ?></td>
                        <td align="center"><img width="100" src="<?= base_url('upload/menu/' . $kgr->namagambar) ?>" alt=""></td>
                        <td>
                          <?php foreach ($jenis as $row) : ?>
                            <?php if ($kgr->kategori == $row["id_kategori"]) : ?>
                              <?= $row["kategori"] ?>
                            <?php endif ?>
                          <?php endforeach ?>


                        </td>
                        <td width="180">
                          <div class="row">
                            <div class="col">
                              <button class="tombolhapus btn btn-block btn-danger btn-sm" data-gambar="<?= $kgr->namagambar ?>" data-id="<?= $kgr->id ?>">Hapus</button>
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
  <!-- Tes -->
  <div class="modal fade" id="kategori_add">
    <div class="modal-dialog modal-lg info-dialog">
      <form action="<?= base_url('aksesowner/tambahmenu') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title info-title">Input Menu Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="kategori">Nama Menu</label>
              <input type="text" class="form-control" id="kategori" name="namamenu" placeholder="Menu..">
              <?= form_error('kategori', '<small class="text-danger">', '</small>'); // form_error by CI 
              ?>
            </div>
            <div class="form-group">
              <label for="kategori">Jenis Menu</label>
              <select class="form-control" name="kategori" id="jenismenu">
                <?php foreach ($jenis as $data) : ?>
                  <option value="<?= $data['id_kategori'] ?>"><?= $data['kategori'] ?></option>
                <?php endforeach ?>
              </select>
              <?= form_error('kategori', '<small class="text-danger">', '</small>'); // form_error by CI 
              ?>
            </div>
            <div class="form-group">
              <label for="kategori">Harga</label>
              <input type="text" class="form-control" id="kategori" name="harga" placeholder="harga..">
              <?= form_error('kategori', '<small class="text-danger">', '</small>'); // form_error by CI 
              ?>
            </div>
            <div class="form-group">
              <label for="kategori">Upload Gambar</label>
              <input type="file" name="menu" class="form-control">
              <?= form_error('kategori', '<small class="text-danger">', '</small>'); // form_error by CI 
              ?>
            </div>
          </div>
          <div class="modal-footer justify-content-between info-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn bg-purple mb-3"></i>Simpan</button>
          </div>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->