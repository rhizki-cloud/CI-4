<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Utama</title>

  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">

  <!-- CSS kamu -->
  <link rel="stylesheet" href="<?= base_url('aser/css/uas-style.css?v=1') ?>">
  <link rel="stylesheet" href="<?= base_url('aset/css/nota-edit.css') ?>">
  <link rel="stylesheet" href="<?= base_url('aset/css/detail-uji.css') ?>">
  <link rel="stylesheet" href="<?= base_url('aset/css/dashboard.css') ?>">
  <link rel="stylesheet" href="<?= base_url('aset/css/nota.css') ?>">
  <link rel="stylesheet" href="<?= base_url('aset/css/jenis.css') ?>">

  <!-- DataTables (Bootstrap 4) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.13.8/css/dataTables.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- TOP NAVBAR -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto align-items-center">
    <li class="nav-item mr-2">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" style="height:26px;border-radius:50%;">
    </li>
    <li class="nav-item">
      <span class="nav-link">Admin Utama</span>
    </li>
  </ul>
</nav>

<!-- SIDEBAR -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

        <!-- DASHBOARD (TENGAH + DEKAT BRAND) -->
        <li class="nav-item">
          <a href="<?= base_url('dashboard') ?>"
             class="nav-link dashboard-link dashboard-center <?= service('uri')->getSegment(1)=='dashboard' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- BRAND BOX -->
        <div class="sidebar-brand">
          <p class="title">Lab UPY</p>
          <p class="sub">Sistem Administrasi • <?= session('role') ?? 'Admin' ?></p>
        </div>

        <hr class="sidebar-divider">

        <!-- PENGUJIAN -->
        <li class="nav-header">PENGUJIAN</li>

        <li class="nav-item">
          <a href="<?= base_url('nota') ?>"
             class="nav-link <?= service('uri')->getSegment(1)=='nota' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Nota Pengujian</p>
          </a>
        </li>

        <hr class="sidebar-divider">

        <!-- MANAJEMEN -->
        <li class="nav-header">MANAJEMEN</li>

        <li class="nav-item">
          <a href="<?= base_url('jenis-uji') ?>"
             class="nav-link <?= service('uri')->getSegment(1)=='jenis-uji' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-vials"></i>
            <p>Jenis Uji</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('kepala-lab') ?>"
             class="nav-link kepala-lab-link <?= service('uri')->getSegment(1)=='kepala-lab' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>Kepala Lab</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('user') ?>"
             class="nav-link manajemen-user <?= service('uri')->getSegment(1)=='user' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>User</p>
          </a>
        </li>

        <hr class="sidebar-divider">

        <!-- LAPORAN -->
        <li class="nav-header">LAPORAN</li>

        <li class="nav-item">
          <a href="<?= base_url('laporan/pengujian') ?>"
             class="nav-link <?= service('uri')->getSegment(1)=='laporan' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>Pengujian</p>
          </a>
        </li>

        <hr class="sidebar-divider">

        <!-- PENGGUNA -->
        <li class="nav-header">Pengguna</li>

        <li class="nav-item">
          <a href="<?= base_url('profil') ?>"
             class="nav-link <?= service('uri')->getSegment(1)=='profil' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-id-card"></i>
            <p>Profil</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Keluar</p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>

<!-- CONTENT -->
<div class="content-wrapper">
<section class="content pt-3">
<div class="container-fluid">
