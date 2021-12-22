<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b><?= $company_detail->nama_portal; ?></b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Untuk Saat ini, Fitur reset password hanya dapat di lakukan oleh administrator</p>

      <div class="row">
        <div class="col-12">
          <a href="https://wa.me/6281263280610" target="_blank" class="btn btn-primary btn-block">Hubungi Administrator</a>
        </div>
        <!-- /.col -->
      </div>
      <div class="row pt-2">
        <div class="col-12">
          <a href="<?= base_url('auth'); ?>" class="btn btn-secondary btn-block">Kembali Login</a>
        </div>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->