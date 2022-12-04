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
    <a href="<?=base_url('aksesowner')?>" class="brand-link">
      <img src="<?=base_url('assets/img/icon-bloumcoffe.png')?>" alt="BloumCoffee Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light text-success"><strong>Bloum Coffee</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
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
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fas fa-database"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('aksesowner/kategori')?>" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('aksesowner/akses')?>" class="nav-link">
              <i class="nav-icon far fas fa-user"></i>
              <p>
                Akses
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Menu
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fas fa-table"></i>
              <p>
                Meja
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Info Meja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Input Meja</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas far fa-clipboard"></i>
              <p>Laporan</p>
            </a>
          </li>
          <li class="nav-header"></li>
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