  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orderan Hari ini</h1>
          </div>
          <div class="col-sm-6">
            <!-- Kosong -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header"></div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Kode Pesanan</th>
                      <th>Tanggal</th>
                      <th>Meja</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($antrian as $row) : ?>
                      <tr>
                        <td><a href="#"><b><?= $row["kodePesanan"] ?></a></a></td>
                        <td><?= $row["tanggal"] ?></td>
                        <td><?= $row["noMeja"] ?></td>
                        <td>
                          <div align="center">
                          <?php
                            if ($row["statusPesanan"] == 2) {
                              echo '<div class="pending bg-danger" style="border-radius:2px"><span>New Order</span></div>';
                            }
                            if ($row["statusPesanan"] == 3) {
                              echo '<div class="menunggu" style="border-radius:2px"><span>Proses</span></div>';
                            }
                            if ($row["statusPesanan"] == 4) {
                              echo '<div class="proses" style="border-radius:2px"><span>Selesai</span></div>';
                            }
                            ?>
                          </div>
                        </td>
                        <td>
                          <div class="row">
                            <div class="col">
                            <button type="button" class="detail_pesanankoki btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal_detail"  data-id="<?= $row['kodePesanan'] ?>">Detail</button>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="http://adminlte.io">BloumCoffee</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- modal Detail -->
  <div class="modal fade" id="modal_detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Orderan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div  class="modal-body">
          <div class="row" style="align-items: center">
            <div class="col-6">
              <img src="<?= base_url('assets/img/logo-bloumcoffe.png') ?>" style="width:100px" alt="">
            </div>
            <div class="col-6" align="right">
              <h5><b id="id_pesanan">ID Pesanan</b></h5>
              <h5 id="noMeja"></h5>
              <p>Tanggal : <span id="tanggal"></span></p>
            </div>
          </div>
          <br>
          <div class="row" style="border-bottom:1px solid #ddd">
            <div class="col-8">
              <h5><b>Item</b></h5>
            </div>
            <div class="col-4" align="right">
              <h5><b>Jumlah</b></h5>
            </div>
          </div>
          <div id="itemss" class="row" style="padding:3px;align-items:center;border-bottom:1px solid #ddd">
            <div class="col-8">
              <font style="font-size:20px">Mandi</font>
            </div>
            <div class="col-4" align="right">
              <font style="font-size:20px">1</font>
            </div>
          </div>
        </div>
        <form id="kirim_pesanan" method="POST" action="<?=base_url('pemesananController/cooking')?>" data-url="<?=base_url()?>">
        <input type="hidden"  name="kodePesanan" id="kodepesanan">

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button id="tbl_submit" type="submit" id="tombol_bayar" class="btn btn-info"><strong>Siapkan</strong></button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->