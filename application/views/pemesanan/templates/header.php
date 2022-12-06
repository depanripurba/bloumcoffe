<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/')?>container/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>bootstrap/css/bootstrap.min.css" type="text/css" defer>
    <!-- Title -->
    <link rel="shortcut icon" href="<?=$dp?>" type="image/x-icon">
    <!-- Title -->
    <title><?=$judul?></title>
</head>
<style>
  .tbl{
    opacity: 0.6;
  }
  .tbl:hover{
    opacity: 1;
  }
  .profil{
    border: 1px solid #096e3f;
    border-radius: 50%;
    height: 30px;
    width: 30px;
    padding: 2px;
    text-align: center;
    font-weight: bold;
    cursor: pointer;
    background: #198754;
    color: white;
  }
</style>
<body>
  <nav class="navigasi">
    <div class="logo">
      <a href="<?=base_url('masterlogin/auth')?>"><img src="<?=base_url('assets/img/bloumcoffe.jpg')?>" width="60px"></a>
    </div>
    <ul>
      <li>
        <div class="select"><a href="<?=base_url('validasiController/logout')?>">Log Out</a></div>
      </li>
      <li>
        <a href="<?=base_url('daftar/profile') ?>"><div class="profil">BC</div></a>
      </li>
    </ul>
    <div class="menu-toggle">
      <input type="checkbox">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>
    <div class="hamparan"></div>
    <div style="height: 70px;"></div>

    
