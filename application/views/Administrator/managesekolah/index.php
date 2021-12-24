<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body box-profile">
                    <form action="#" method="POST" id="data_sekolah">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>App Name</label>
                                  <input type="text" class="form-control" name="nama_portal" id="nama_portal">
                                </div>
                                <div class="form-group">
                                  <label>App Version</label>
                                  <input type="text" class="form-control" name="versi_portal" id="versi_portal">
                                </div>
                                <div class="form-group">
                                  <label>School Name</label>
                                  <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah">
                                </div>
                                <div class="form-group">
                                  <label>Kode NPSN (Angka)</label>
                                  <input type="number" class="form-control" name="npsn" id="npsn">
                                </div>
                                <div class="form-group">
                                  <label>Kepala Sekolah</label>
                                  <input type="text" class="form-control" name="kepala_sekolah" id="kepala_sekolah">
                                </div>
                                <div class="form-group">
                                  <label>Tahun Ajaran Sekolah</label>
                                  <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Alamat</label>
                                  <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah">
                                </div>
                                <div class="form-group">
                                  <label>Email Sekolah</label>
                                  <input type="email" class="form-control" name="email_sekolah" id="email_sekolah">
                                </div>
                                <div class="form-group">
                                  <label>FB Sekolah</label>
                                  <input type="text" class="form-control" name="fb_sekolah" id="fb_sekolah">
                                </div>
                                <div class="form-group">
                                  <label>IG Sekolah</label>
                                  <input type="text" class="form-control" name="ig_sekolah" id="ig_sekolah">
                                </div>
                                <div class="form-group">
                                  <label>WEB Sekolah</label>
                                  <input type="text" class="form-control" name="web_sekolah" id="web_sekolah">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" onClick="updateData()" id="btnSave">Update Data</button>
                </div>
            </div>
        </div>
    </div>
</section>