<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css">
    <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <title><?= $title; ?></title>
    <!-- <style>
    td {
      padding-top: 2px !important;
      padding-bottom: 2px !important;
      vertical-align: middle !important;
    }
  </style> -->
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-paper-plane"></i></div>
                <div class="sidebar-brand-text mx-3"><?= nama_website(); ?></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item<?= ('Dasbor' == $title) ? ' active' : ''; ?>">
                <a class="nav-link" href="<?= base_url(); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dasbor</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <?php if ($admin) { ?>
            <li class="nav-item<?= (strpos($title, 'Data') !== false) ? ' active' : ''; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data" aria-expanded="true"
                    aria-controls="data">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data</span>
                </a>
                <div id="data" class="collapse<?= (strpos($title, 'Data') !== false) ? ' show' : ''; ?>"
                    aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item<?= ('Data Jenis' == $title) ? ' active' : ''; ?>"
                            href="<?= base_url('data/jenis'); ?>">
                            <i class="fas fa-fw fa-list"></i>
                            <span>Data Jenis</span>
                        </a>
                        <a class="collapse-item<?= ('Data Barang' == $title) ? ' active' : ''; ?>"
                            href="<?= base_url('data/barang'); ?>">
                            <i class="fas fa-fw fa-list"></i>
                            <span>Data Barang</span>
                        </a>
                    </div>
                </div>
            </li>
            <?php } else { ?>
            <li class="nav-item<?= ('Beli Barang' == $title) ? ' active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('beli_barang'); ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Beli Barang</span>
                </a>
            </li>
            <?php } ?>
            <hr class="sidebar-divider my-0">
            <li class="nav-item<?= ('Transaksi' == $title) ? ' active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('transaksi'); ?>">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Transaksi</span>
                </a>
            </li>
            <?php if ($admin) { ?>
            <li class="nav-item<?= ('Laporan' == $title) ? ' active' : ''; ?>">
                <a class="nav-link" href="<?= base_url('laporan'); ?>">
                    <i class="fas fa-fw fa-scroll"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <?php } ?>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i
                            class="fa fa-bars"></i></button>
                    <h2><?= $title; ?></h2>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url(); ?>assets/img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i
                                        class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                    </div>