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
<style>
    .bg-siakad{
        background-image: url("https://ruhulislam.com/wp-content/uploads/2020/10/2018-12-07-1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    h1.page-header-title{
        color: white;
        font-weight: bold;
        text-shadow: 0 0 3px #000000, 0 0 5px #0000FF;
    }
    .page-header-subtitle{
        color: white;
        text-shadow: 0 0 3px #000000, 0 0 5px #0000FF;
        font-size: 14pt;
    }
</style>
<body class="nav-fixed">
<nav class="topnav navbar navbar-expand shadow navbar-light">
    <a class="navbar-brand" href="<?= base_url(); ?>">
    <img src="<?= base_url('assets/img/logo/logo.png'); ?>" style="height:2.2rem!important;margin:-5px 0px 0px 0px;">
    </a>
</nav>
    <!-- Modal -->
    <div class="modal fade" id="myModalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Daftar Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" class="form-vertical" id="form-regitser">
                        <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        
                        <div class="form-group">
                        <label>NO WA</label>
                        <input type="number" name="whatsapp" id="whatsapp" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        
                        <div class="form-group">
                        <label>NIK</label>
                        <input type="number" name="nik" id="nik" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        
                        <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="role">Jabatan</label>
                            <select class="form-control" id="role_id" name="role_id" required>
                                <option value="">--Pilih Role--</option>
                                <?php foreach ($roles as $key): ?>
                                <option value="<?= $key->id;?>"><?= $key->role_name;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm btnSave" onClick="submitRegister()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <main>
        <header class="page-header bg-siakad pb-5">
            <div class="container">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-12 mt-5 mb-5">
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
                                            <input class="form-control py-4" id="usernames" name="username" type="text" placeholder="Enter Username" autocomplate="off">
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Password</label>
                                            <input class="form-control py-4" id="passwords" name="password" type="password" placeholder="Enter password" autocomplate="off">
                                        </div>
                                        <div class="form-group">
                                                <input type="checkbox" onclick="showPassword()"> Show Password
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                            <a href="#" onCLick="window.open('https://wa.me/6281263280610')"> Lupa Password?</a>
                                            <a href="#" onCLick="registermodal()"> Daftar Akun</a>
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
<script src="<?= base_url('assets/'); ?>js/default-notif.js"></script>

<?php
  if ($this->session->flashdata('msg') !== NULL){
      swalalert($this->session->flashdata('msg'), $this->session->flashdata('type'));
  }
?>

<script>

function showPassword()
{
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}

function registermodal()
{
    $('#myModalRegister').modal('show')
}

function submitRegister()
{
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable

    // ajax adding data to database
    $.ajax({
        url : "<?= base_url('auth/doregister'); ?>",
        type: "POST",
        data: $('#form-regitser').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status == true)
            {
                $('#myModalRegister').modal('hide');
                mySwalalert('Berhasil Menyimpan Data, Silahkan Login', 'success');
            }
            $('#btnSave').text('Save');
            $('#btnSave').attr('disabled',false);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            mySwalalert('Gagal Menyimpan Data', 'error');
            $('#btnSave').text('Save');
            $('#btnSave').attr('disabled',false);
        }
    });
}
</script>

</body>
</html>