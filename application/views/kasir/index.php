  <?php if($this->session->flashdata('print')==true): ?>
    <script>
      let tes = "<?=$this->session->flashdata('url')?>"
      document.location.href = tes
    </script>

  <?php endif ?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi Hari ini</h1>
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
                      <th>Total</th>
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
                        <td>Rp. <?= number_format($row["totalHarga"]) ?></td>
                        <td>
                          <div align="center">

                            <?php
                            if ($row["statusPesanan"] == 1) {
                              echo '<div class="pending bg-danger" style="border-radius:2px"><span>New Order</span></div>';
                            }
                            if ($row["statusPesanan"] == 2) {
                              echo '<div class="menunggu" style="border-radius:2px"><span>menunggu</span></div>';
                            }
                            if ($row["statusPesanan"] == 3) {
                              echo '<div class="proses" style="border-radius:2px"><span>proses</span></div>';
                            }
                            if ($row["statusPesanan"] == 4) {
                              echo '<div class="diterima" style="border-radius:2px"><span>diterima</span></div>';
                            }
                            if ($row["statusPesanan"] == 5) {
                              echo '<div class="selesai bg-success" style="border-radius:2px"><span>Selesai</span></div>';
                            }
                            ?>
                          </div>
                        </td>
                        <td>
                          <div class="row">
                            <div class="col">
                              <button type="button" class="btn btn-block btn-primary btn-sm detail_pesanan" data-id="<?= $row['kodePesanan'] ?>" data-toggle="modal" data-target="#modal_detail">Detail</button>
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
        <form id="kirim_pesanan" data-url="<?= base_url() ?>" action="<?= base_url('pemesanancontroller/bayar') ?>" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Detail Pesanan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row" style="align-items: center">
              <div class="col-6">
                <img src="<?= base_url('assets/img/logo-bloumcoffe.png') ?>" style="width:100px" alt="">
              </div>
              <div class="col-6" align="right">
                <h5><b id="id_pesanan">ID Pesanan</b></h5>
                <input type="hidden" name="form_idpesanan" id="form_idpesanan" value="">
                <h5>Meja : <span id="nomeja">5</span></h5>
                <p>Tanggal : <span id="tanggal"></span></p>
                <p>Pemesan : <span id="pemesan"></span></p>
              </div>
            </div>
            <br>
            <div class="row" style="border-bottom:1px solid #ddd">
              <div class="col-5">
                <h5><b>Item</b></h5>
              </div>
              <div class="col-2" align="center">
                <h5><b>Jml</b></h5>
              </div>
              <div class="col-2" align="center">
                <h5><b>Harga</b></h5>
              </div>
              <div class="col-3" align="right">
                <h5><b>Total</b></h5>
              </div>
            </div>

            <div id="itemss">
              <div class="row" id="item" style="padding:3px;align-items:center;border-bottom:1px solid #ddd">
                <div class="col-7">
                  <font>Mandi</font>
                </div>
                <div class="col-2" align="center">
                  <font>1</font>
                </div>
                <div class="col-3" align="right">
                  <font>Rp. 5000</font>
                </div>
              </div>
            </div>

            <div class="row" style="padding:3px;align-items:center;border-bottom:1px solid #ddd">
              <div class="col-6">
                <b>Total</b>
              </div>
              <div class="col-6" align="right">
                <b><span id="total"></span></b>
              </div>
            </div>

            <div id="remove2" class="row" style="padding:3px;align-items:center;border-bottom:1px solid #ddd">
              <div class="col-8 row">
               <label class="col-3" for="point">Gunakan Point</label>
               <select id="gunakan"  name="gunakan" class="form-control use col-3">
                <option value="1">Tidak</option>
                <option value="2">Ya</option>
               </select>
              </div>
              <div class="col-4" align="right">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Point </strong></span>
                  </div>
                  <input disabled type="number" id="point2" name="point2" value="" class="form-control">
                  <input type="hidden" name="point" id="point">
                </div>
              </div>
            </div>

            <div id="remove1" class="row" style="padding:3px;align-items:center;border-bottom:1px solid #ddd">
              <div class="col-8">
                <b>Dibayar</b>
              </div>
              <div class="col-4" align="right">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Rp.</strong></span>
                  </div>
                  <input type="hidden" id="totalbelanja" name="totalbelanja">
                  <input type="hidden" id="totalbelanja2" name="totalbelanja2">
                  <input type="hidden" id="kodebelanja" name="kodebelanja">
                  <input type="hidden" id="temptotal" name="temptotal">
                  <input type="hidden" id="statusbayar" name="statusbayar" value="1">
                  <input type="hidden" id="id" name="id">
                  <input type="number" id="bayar" name="bayar" class="form-control">
                </div>
              </div>
            </div>
            
            <div id="remove2" class="row" style="padding:3px;align-items:center">
              <div class="col-6">
                <b>Kembalian</b>
              </div>
              <div class="col-6" align="right">
                <b>Rp. <strong id="kembalian">000</strong></b>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-default" id="cetakbill">Cetak Bill</button>
            <button type="submit" class="btn btn-success" id="tbl_submit"><strong>Rp. </strong>Bayar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->