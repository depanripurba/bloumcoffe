  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Data Akses</h1>
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
              <a href="<?=base_url('aksesowner/cetak')?>" class="btn btn-primary mb-3"><i class="nav-icon far fas fa-print mr-2"></i>Cetak</a>
              <div class="row mb-4">
                  <div class="col">
                      <form action="<?=base_url('aksesowner/waktu')?>" method="POST">
                        <input type="date" name="waktu">
                        <button type="submit">Cari</button>
                      </form>
                  </div>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Pemesanan</th>
                  <th>Tanggal</th>
                  <th>Pendapatan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1 ; foreach ($laporan as $user) : ?>
                <tr>
                    <td width="50"><?=$no++?></td>
                    <td><?=$user['kodePesanan']?></td>
                    <td><?=$user['tanggal']?></td>
                    <td>Rp. <?=$user['totalHarga']?></td>
                </tr>
                <?php endforeach ; ?>
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