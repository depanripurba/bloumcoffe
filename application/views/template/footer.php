<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
   STMIK Triguna Dharma Medan Sistem Informasi
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2022 Yuni Yurika Putri Br Siregar
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>js/adminlte.min.js"></script>

<!-- start datatable -->
<script src="<?= base_url('assets/') ?>js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/') ?>js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/') ?>js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/') ?>js/toastr.min.js"></script>

<!-- cek deleting data -->
<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-2',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  })
</script>
<!-- toaster tambahdata -->
<script>
  var pesan = '<?=$this->session->flashdata('berhasil')?>';
</script>
<?php if ($this->session->flashdata('berhasil') != null) : ?>
  <?php
  echo "<script>
  Toast.fire({
      icon: 'success',
      title: pesan
    })
  </script>";
  ?>
<?php endif ?>
<!-- end toaster tambahdata -->

<?php if ($this->session->flashdata('deleted') != null) : ?>
  <?php
  echo "<script>
  swalWithBootstrapButtons.fire(
      'Deleted!',
      'Data Berhasil dihapus',
      'success'
    )
  </script>";
  ?>
<?php endif ?>
<!-- end cek deleting data -->
<script>
  //bagian hapus data
  let hapusdata = document.querySelectorAll('#hapusdata');
  let baseurl = document.querySelector('#baseurl');
  hapusdata.forEach((a) => {
    a.addEventListener('click', (a) => {
      let url = a.target.getAttribute('data-url');
      // bagian swal
      swalWithBootstrapButtons.fire({
        title: 'Yakin ingin menghapus',
        text: "Ketika menghapus tidak dapat di undo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = url
        }
      })
      // end dari swal

    })
  })


  // end hapus data

  // start custom swal

  // end custom swal
  $(function() {

    $('#tabelauto').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $('#tabelauto_filter').addClass('pull-left');
</script>
<!-- end datatable -->
</body>

</html>