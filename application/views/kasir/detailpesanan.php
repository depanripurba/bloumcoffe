<div class="modal fade show" id="modal_detail" aria-modal="true" style="display: block; padding-left: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Pesanan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="align-items: center">
          <div class="col-6">
            <img src="http://localhost/bloumcoffe/assets/img/logo-bloumcoffe.png" style="width:100px" alt="">
          </div>
          <div class="col-6" align="right">
            <h5><b>ID Pesanan</b></h5>
            <h5>Meja : 12</h5>
            <p>Tanggal : 2022-09-08</p>
          </div>
        </div>
        <br>
        <div class="row" style="border-bottom:1px solid #ddd">
          <div class="col-7">
            <h5><b>Item</b></h5>
          </div>
          <div class="col-2" align="center">
            <h5><b>Jml</b></h5>
          </div>
          <div class="col-3" align="right">
            <h5><b>Harga</b></h5>
          </div>
        </div>
        <div class="row" style="padding:3px;align-items:center;border-bottom:1px solid #ddd">
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
        <div class="row" style="padding:3px;align-items:center;border-bottom:1px solid #ddd">
          <div class="col-6">
            <b>Total</b>
          </div>
          <div class="col-6" align="right">
            <b>Rp. <span id="total">5000</span></b>
          </div>
        </div>
        <div class="row" style="padding:3px;align-items:center;border-bottom:1px solid #ddd">
          <div class="col-8">
            <b>Dibayar</b>
          </div>
          <div class="col-4" align="right">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><strong>Rp.</strong></span>
              </div>
              <input type="number" id="bayar" name="bayar" class="form-control">
            </div>
          </div>
        </div>
        <div class="row" style="padding:3px;align-items:center">
          <div class="col-6">
            <b>Kembalian</b>
            <input type="hidden" id="change" name="change" value="">
          </div>
          <div class="col-6" align="right">
            <b>Rp. <strong id="kembalian">000</strong></b>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success"><strong>Rp. </strong>Bayar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>