<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title;?> | <?= $detail->nama_sekolah; ?></title>

  <!--Favicon-->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/'); ?>img/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="nav-fixed">
<nav class="topnav navbar navbar-expand shadow navbar-light bg-white">
    <a class="navbar-brand" href="<?= base_url(); ?>">
    <img src="<?= base_url('assets/img/logo/logo.png'); ?>" style="height:2.2rem!important;margin:-5px 0px 0px 0px;">
    </a>
</nav>
    <main>
        <header class="page-header page-header-dark bg-navy pb-5">
            <div class="container">
                <div class="page-header-content pt-3">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-12 mt-4">
                            <h1 class="page-header-title">
                                Sistem Informasi Akademik
                            </h1>
                            <div class="page-header-subtitle"><?= $detail->nama_sekolah; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container mt-n4">
            <div class="row">
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-xxl-12">
                                    <h1 class="text-primary">Silahkan Login</h1>
                                    <p class="text-gray-700 mb-0">Portal Kesantrian dan Manajemen Dayah <?= $detail->nama_sekolah; ?></p>
                                </div>
                                <div class="col-xl-6 col-xxl-12">
                                    <form action="<?= base_url('auth/dologin'); ?>" method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="username">Username</label>
                                            <input class="form-control py-4" id="username" name="username" type="text" placeholder="Enter Username" autocomplate="off">
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Password</label>
                                            <input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter password" autocomplate="off">
                                        </div>
                                        <div class="form-group">
                                                <input type="checkbox" onclick="myFunction()"> Show Password
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" name="submit" class="btn btn-primary">Login</button> <a href="https://wa.me/6281263280610" target="_blank"> Lupa Password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-3">
                    <div class="card bg-navy">
                    <div class="card-body">
                        <h5 class="card-title pb-3">Portal Ruhul Islam</h5>
                        <p class="card-text">Dapatkan informasi seputar <?= $detail->nama_sekolah; ?></p>
                        <div class="d-flex justify-content-center">
                            <a href="https://ruhulislam.com" class="btn btn-primary btn-sm ">Kunjungi</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-navy">
                    <div class="card-body">
                        <h5 class="card-title pb-3">Portal RIAB FAIR</h5>
                        <p class="card-text">Laman informasi Event RIAB FAIR oleh <?= $detail->nama_sekolah; ?></p>
                        <div class="d-flex justify-content-center">
                            <a href="https://riabfair.ruhulislam.com" class="btn btn-primary btn-sm">Kunjungi</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-navy">
                    <div class="card-body">
                        <h5 class="card-title pb-3">Portal PSB</h5>
                        <p class="card-text">Informasi Penerimaan Santri Baru <?= $detail->nama_sekolah; ?></p>
                        <div class="d-flex justify-content-center">
                            <a href="https://psb.ruhulislam.com" class="btn btn-primary btn-sm">Kunjungi</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-navy">
                    <div class="card-body">
                        <h5 class="card-title pb-3">Portal Alumni</h5>
                        <p class="card-text">Informasi alumni dan database alumni <?= $detail->nama_sekolah; ?></p>
                        <div class="d-flex justify-content-center">
                            <a href="https://faris.ruhulislam.com" class="btn btn-primary btn-sm">Kunjungi</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-sm-3">
                    <div class="card bg-navy">
                    <div class="card-body">
                        <h5 class="card-title pb-3">Portal Perpustakaan</h5>
                        <p class="card-text">Akses Informasi buku dan pinjam mandiri di Perpustakaan <?= $detail->nama_sekolah; ?></p>
                        <div class="d-flex justify-content-center">
                            <a href="https://perpus.ruhulislam.com" class="btn btn-primary btn-sm">Kunjungi</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card bg-navy">
                    <div class="card-body">
                        <h5 class="card-title pb-3">Portal RDM</h5>
                        <p class="card-text">Akses Informasi Rapor Digital Madrasah <?= $detail->nama_sekolah; ?></p>
                        <div class="d-flex justify-content-center">
                            <a href="https://rdm.ruhulislam.com" class="btn btn-primary btn-sm">Kunjungi</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="navbar navbar-expand shadow navbar-light  bg-navy fixed-bottom">
        <span>
            Copyright &copy; <?= date('Y'); ?>
            <a href="#" target="_blank"> Ruhul Islam</a>
        </span>
    </footer>

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- sweetalert2 -->
<script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/default-siakad.js"></script>

<?php
  if ($this->session->flashdata('msg') !== NULL){
      swalalert($this->session->flashdata('msg'), $this->session->flashdata('type'));
  }
?>

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>