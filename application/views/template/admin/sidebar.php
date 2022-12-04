<style>
  .pending
  {
    background-color: #d2d8dd;
    border: 1px solid #6c757d;
    color: #6c757d;
    font-weight: 600;
  }
  .menunggu
  {
    background-color: #fff4d5;
    border: 1px solid #ffc107;
    color: #c59300;
    font-weight: 600;
  }
  .proses
  {
    background-color: #ffe0e3;
    border: 1px solid #dc3545;
    color: #dc3545;
    font-weight: 600;
  }
  .diterima
  {
    background-color: #dffbff;
    border: 1px solid #17a2b8;
    color: #17a2b8;
    font-weight: 600;
  }
  .selesai
  {
    background-color: #dbffef;
    border: 1px solid #3d9970;
    color: #3d9970;
    font-weight: 600;
  }
</style>

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
    <a href="#" class="brand-link">
      <img src="<?=base_url('assets/img/icon-bloumcoffe.png')?>" alt="BloumCoffee Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light text-success"><strong>Bloum Coffee</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url($profil)?>" class="img-circle" alt="User Image">
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
            <a href="" data-toggle="modal" data-target="#modal_logout" class="nav-link">
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