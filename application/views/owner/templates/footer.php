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

<!-- Logout -->
<!-- modal logout -->
<div class="modal fade" id="modal_logout">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Keluar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin keluar?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?=base_url('masterlogin/logout')?>" class="btn btn-danger"><strong>Logout</strong></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Logout -->

<!-- jQuery -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/moment/moment.min.js"></script>
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/vendor/adminlte/')?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url('assets/vendor/adminlte/')?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/vendor/adminlte/')?>dist/js/demo.js"></script>

<!-- Script JS Buatan -->
<script src="<?=base_url('assets/js/')?>script.js"></script>
</body>
</html>


<script>

let tombolhapus = document.querySelectorAll(".tombolhapus");

tombolhapus.forEach((a)=>{
  a.addEventListener('click',(a)=>{
    let id = a.target.getAttribute('data-id');
    let gambar = a.target.getAttribute('data-gambar');
    let cek = confirm("apakah anda yakin menghapus");
    if(cek==true){
      document.location.href = "http://localhost/bloumcoffe/aksesowner/hapusmenu/"+id+"/"+gambar
    }

  })
})

</script>