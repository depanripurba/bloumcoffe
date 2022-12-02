
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$judul?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor/adminlte/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor/adminlte/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/vendor/adminlte/')?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor/adminlte/')?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Icon -->
  <link rel="shortcut icon" href="<?=base_url('assets/img/icon-bloumcoffe.png')?>" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('assets/vendor/adminlte/')?>index3.html" class="brand-link">
      <img src="<?=base_url('assets/img/icon-bloumcoffe.png')?>" alt="BloumCoffee Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light text-success"><strong>Bloum Coffee</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets/img/icon/kasir-icon.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Halo, <?=$this->session->userdata('user')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt mr-2"></i>
              <p class="text">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

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
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Meja</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1.</td>
                    <td>PSN001</td>
                    <td>22-11-2022 01:32</td>
                    <td>1</td>
                    <td>11.000</td>
                    <td>
                      <div class="color-palette-set" align="center">
                        <div class="bg-warning" style="border-radius:2px"><span>Pending</span></div>
                      </div>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                          <button type="button" class="btn btn-block btn-primary btn-sm">Bill</button>
                        </div>
                        <div class="col">
                          <button type="button" class="btn btn-block bg-purple btn-sm">Terima</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>PSN002</td>
                    <td>22-11-2022 01:30</td>
                    <td>3</td>
                    <td>4.000</td>
                    <td>
                      <div class="color-palette-set" align="center">
                        <div class="bg-info" style="border-radius:2px"><span>Proses</span></div>
                      </div>
                    </td>
                    <td>
                    <div class="row">
                        <div class="col">
                          <button type="button" class="btn btn-block btn-primary btn-sm">Bill</button>
                        </div>
                        <div class="col">
                          <button type="button" class="btn btn-block bg-purple btn-sm">Terima</button>
                        </div>
                      </div>
                    </td>
                  </tr>
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

<!-- jQuery -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/vendor/adminlte/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/vendor/adminlte/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/vendor/adminlte/')?>dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
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
</body>
</html>
