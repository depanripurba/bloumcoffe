<?php
$menu = 'basis';
$beranda = $menu == 'beranda' ? 'active' : 'none';
$penyakit = $menu == 'penyakit' ? 'active' : 'none';
$gejala = $menu == 'gejala' ? 'active' : 'none';
$basis = $menu == 'basis' ? 'active' : 'none';
$tentang = $menu == 'tentang' ? 'active' : 'none';
$konsultasi = $menu == 'diagnosa' ? 'active' : 'none';


$ceklogin = true;
if ($this->session->userdata('user') == null) {
  $ceklogin = false;
}
$menu = [
  "Beranda" => ["fa fa-home", "", $beranda],
  "Diagnosa" => ["fas fa-stethoscope", "diagnosa", $konsultasi],
  "Tentang" => ["fas fa-atlas", "about", $tentang]

];

if ($ceklogin) {
  $menu = [
    "Beranda" => ["fa fa-home", "", $beranda],
    "Data Penyakit" => ["fas fa-book-medical", "penyakit", $penyakit],
    "Data Gejala" => ["fa fa-database", "gejala", $gejala],
    "Data Pengetahuan" => ["fas fas fa-bong", "basispengetahuan", $basis],
    "Diagnosa" => ["fas fa-stethoscope", "diagnosa", $konsultasi],
    "Tentang" => ["fas fa-atlas", "about", $tentang]
  ];
}

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tes Koneksi Jaringan Internet</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- start datatable -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/buttons.bootstrap4.min.css">
  <!-- end datatable -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/adminlte.min.css">
   <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/toastr.min.css">
  <!-- Theme style -->
  <style>
    #tabelauto_filter{
      float: left;
      margin-left: -520px !important;
    }
  </style>
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

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <?php if($this->session->userdata('user')!=null): ?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
           <span><?=$this->session->userdata('user')['username']?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Sub Menu</span>
            <div class="dropdown-divider"></div>
            <a href="<?=base_url('auth/signout')?>" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Log Out
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?=base_url('gejala')?>" class="dropdown-item">
              <i class="fas fa-database mr-2"></i> Gejala
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?=base_url('penyakit')?>" class="dropdown-item">
              <i class="fas fa-book-medical mr-2"></i> Penyakit
            </a>
            <a href="basispengetahuan" class="dropdown-item">
              <i class="fas fa-bong mr-2"></i> Data Pengetahuan
            </a>
            <div class="dropdown-divider"></div>
            <span class="dropdown-item dropdown-footer">dropdown menu</span>
          </div>
        </li>
      <?php endif ?>
     <?php if($this->session->userdata('user')==null): ?> 
      <li class="nav-item">
        <a class="btn btn-primary" href="<?=base_url('login')?>">login</a>
      </li>
    <?php endif ?>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <i class="nav-icon p-3 fas fa-home"></i>
        <span class="brand-text font-weight-light">Sistem Pakar</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->




        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <?php foreach ($menu as $child => $m) : ?>
              <li class="nav-item">
                <a class="nav-link <?= $m[2] ?>" href="<?= base_url($m[1]) ?>">
                  <i class="nav-icon <?= $m[0] ?>"></i>
                  <p>
                    <?= $child ?>
                  </p>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">

      </div>
      <!-- /.content-header -->