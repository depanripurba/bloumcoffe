<!-- jQuery -->
<script src="<?= base_url('assets/vendor/adminlte/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/vendor/adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/vendor/adminlte/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/vendor/adminlte/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/vendor/adminlte/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/vendor/adminlte/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/vendor/adminlte/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/vendor/adminlte/') ?>dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "ordering": false,
      "paging": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  function formatRupiah(money) {
    return new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR'
    }).format(money);
  }
  // bagian realtime dari select kasir
  $('.detail_pesanan').on('click', function() {
    // Mendapatkan data id CS
    const id = $(this).data('id');

    // Membuat variabel controller
    var ubahcs = 'admin/edtcs';
    let totalll = 0;

    $.ajax({
      url: 'http://localhost/bloumcoffe/akseskasir/getdetail/',
      data: {
        id: id
      },
      method: 'POST',
      dataType: 'json',
      success: function(data) {
        // cek data yang dipanggil
        console.log(data);

        // Mengubah input hidden id
        $('#id_pesanan').text(data.kodePesanan);
        $('#nomeja').text(data.noMeja);
        $('#total').text(formatRupiah(data.totalHargaAkhir));
        $('#tanggal').text(data.tanggal);
        $('#form_idpesanan').val(data.kodePesanan);


        // Cek status

        if (data.statusPesanan == "1") {
          let redi = document.querySelector("#kirim_pesanan")
          redi.action = redi.getAttribute('data-url') + "pemesanancontroller/uptokoki"
          $('#tbl_submit').show()
          $('#tbl_submit').text('Terima')
          $('#remove1').hide()
          $('#remove2').hide()
          $('#pemesan').text(data.nama)
          $('#cetakbill').show()

        } else if (data.statusPesanan == "2") {
          $('#tbl_submit').hide()
          $('#remove1').hide()
          $('#remove2').hide()
          $('#cetakbill').hide()
        } else if (data.statusPesanan == "3") {
          $('#tbl_submit').hide()
          $('#remove1').hide()
          $('#remove2').hide()
        } else if (data.statusPesanan == "4") {
          let redi = document.querySelector("#kirim_pesanan")
          redi.action = redi.getAttribute('data-url') + "pemesanancontroller/bayar"
          $('#tbl_submit').show()
          $('#tbl_submit').text('Bayar')
          $('#remove1').show()
          $('#remove2').show()
          $('#point').val(data.point)
          $('#point2').val(data.point)
          $('#pemesan').text(data.nama)
          $('#totalbelanja').val(data.totalHarga);
          $('#totalbelanja2').val(data.totalHarga);
          $('#kodebelanja').val(data.kodePesanan);
          $('#temptotal').val(data.totalHarga);
          $('#id').val(data.id);
          $('#cetakbill').show()

        } else if (data.statusPesanan == "5") {
          let redi = document.querySelector("#kirim_pesanan")
        redi.action = redi.getAttribute('data-url') + "pemesanancontroller/cetakbill/"+data.kodePesanan+"/cetakbilll"
          $('#tbl_submit').show()
          $('#tbl_submit').text('Cetak')
          $('#remove1').hide()
          $('#remove2').hide()
          $('#cetakbill').hide()

        }

        $("#cetakbill").on("click", () => {
          let redi = document.querySelector("#kirim_pesanan")
          tes = redi.getAttribute('data-url')
          document.location.href = tes+"pemesanancontroller/cetakbill/"+data.kodePesanan+"/cetakbill"
        })

        item = document.getElementById('item');
        itemss = document.getElementById('itemss');

        total = data.totalHargaAkhir;

        let temp = '';

        for (i = 0; i <= data['detailpes'].length - 1; i++) {
          console.log(data[i]);
          temp += `
          <div class="row" id="item" style="padding:3px;align-items:right;border-bottom:1px solid #ddd">
          <div class="col-5">
            <font>` + data['detailpes'][i].pesanan + `</font>
          </div>
          <div class="col-2" align="center">
            <font>` + data['detailpes'][i].jumlah + `</font>
          </div>
          <div class="col-2" align="right">
            <font>` + formatRupiah(data['detailpes'][i].harga) + `</font>
          </div>
          <div class="col-3" align="right">
            <font>` + formatRupiah(data['detailpes'][i].harga * data['detailpes'][i].jumlah) + `</font>
          </div>
          </div>`
        }
        itemss.innerHTML = temp;


      }

    });







  });
  //==== bagian dari select koki start=== //==== bagian dari select koki start===
  $('.detail_pesanankoki').on('click', function() {
    const id = $(this).data('id');
    // bagian dari ajax
    function formatRupiah(money) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
      }).format(money);
    }
    $.ajax({
      url: 'http://localhost/bloumcoffe/akseskasir/getdetail/',
      data: {
        id: id
      },
      method: 'POST',
      dataType: 'json',
      success: function(data) {
        $("#id_pesanan").text(data.kodePesanan)
        $("#noMeja").text(data.noMeja)
        $("#tanggal").text(data.tanggal)
        $("#kodepesanan").val(data.kodePesanan)
        // looping untuk pembuatan list
        let temp = '';
        itemss = document.getElementById('itemss');
        for (i = 0; i <= data['detailpes'].length - 1; i++) {
          console.log(data[i]);
          temp += ` <div class="col-8">
              <font style="font-size:20px">` + data['detailpes'][i].pesanan + `</font>
            </div>
            <div class="col-4" align="right">
              <font style="font-size:20px">` + data['detailpes'][i].jumlah + `</font>
            </div>`
        }


        itemss.innerHTML = temp;



        // end looping
        console.log(data);
        // cek statuspesanan
        let redi = document.querySelector("#kirim_pesanan")
        console.log(redi);
        if (data.statusPesanan == "2") {
          let redi = document.querySelector("#kirim_pesanan")
          redi.action = redi.getAttribute('data-url') + "pemesanancontroller/cooking"
          $('#tbl_submit').text('Siapkan')
        } else if (data.statusPesanan == "3") {
          let redi = document.querySelector("#kirim_pesanan")
          redi.action = redi.getAttribute('data-url') + "pemesanancontroller/upfinish"
          $('#tbl_submit').text('Sajikan')
        } else if (data.statusPesanan == "4") {
          $('#tbl_submit').text('Sajikan')
        }


        // end cek status pesanan
      }
    })
    // end bagian dari ajax
  });
  // bagian realtime dari kasir

  $('#gunakan').change(function() {
    // cek value
    if ($(this).val() == 1) {
      let total2 = $('#totalbelanja2').val();
      $('#total').text(formatRupiah(total2));
    }
    if ($(this).val() == 2) {
      let total2 = $('#totalbelanja2').val() - $('#point').val();
      $('#total').text(formatRupiah(total2));
      $('#temptotal').val(total2);
    }
    $('#statusbayar').val($(this).val());
    $('#kembalian').text()
  });

  var bayar = document.getElementById('bayar');


  bayar.addEventListener('keyup', function() {
    total = $('#temptotal').val();
    var isi = bayar.value - total;
    $("#kembalian").text(isi);
    $('#change').attr('value', isi);
  });
</script>



</body>

</html>