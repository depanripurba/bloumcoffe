  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col">
                      <h1 class="m-0 text-dark">Laporan Customer</h1>
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

                              <!-- bagian dari tabel costumer -->
                            <h2>Data Pelanggan Lama</h2>
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Nama Pelanggan</th>
                                          <th>Tanggal Lahir</th>
                                          <th>No Hp</th>
                                          <th>Alamat</th>
                                          <th>Banyak Point</th>
                                          <th>Banyak Pemesanan</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1;
                                        foreach ($pengguna['pelangganlama'] as $user) : ?>
                                          <tr>
                                              <td width="50"><?= $no++ ?></td>
                                              <td><?= $user->nama ?></td>
                                              <td><?= $user->tanggal_lahir ?></td>
                                              <td><?= $user->no_HP ?></td>
                                              <td><?= $user->alamat ?></td>
                                              <td><?= $user->point ?></td>
                                              <td><?= $user->counter ?> kali</td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                              <!-- end bagian costumer -->
                              <h2 class="mt-3">Data Pelanggan Baru</h2>
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Nama Pelanggan</th>
                                          <th>Tanggal Lahir</th>
                                          <th>No Hp</th>
                                          <th>Alamat</th>
                                          <th>Banyak Point</th>
                                          <th>Banyak Pemesanan</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1;
                                        foreach ($pengguna['pelangganbaru'] as $user) : ?>
                                          <tr>
                                              <td width="50"><?= $no++ ?></td>
                                              <td><?= $user->nama ?></td>
                                              <td><?= $user->tanggal_lahir ?></td>
                                              <td><?= $user->no_HP ?></td>
                                              <td><?= $user->alamat ?></td>
                                              <td><?= $user->point ?></td>
                                              <td><?= $user->counter ?> kali</td>
                                          </tr>
                                      <?php endforeach; ?>
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