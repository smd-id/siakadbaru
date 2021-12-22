
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b><?= $detail->nama_portal; ?></b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Masukkan Credential Anda</p>

      <form action="<?= base_url('auth/dologin'); ?>" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
    </form>

      <p class="mb-1 pt-2">
        <a href="<?= base_url('auth/forgotpass'); ?>">Lupa Password</a>
      </p>
      <!-- <p class="mb-0">
        <a href="<?= base_url('auth/register'); ?>" class="text-center">Daftar Akun</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->