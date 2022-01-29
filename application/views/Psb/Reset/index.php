<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Reset Password
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Cari Berdasarkan</label>
                            <div class="input-group mb-3">
                                <select name="berdasarkan" id="berdasarkan" class="form-control">
                                    <option value="nik">NIK</option>
                                    <option value="no_ujian">No Ujian</option>
                                </select>
                                <input type="text" class="form-control" id="val_cari" name="val_cari">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger" onclick="cari_data()">Cari Data</button>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>            
        </div>
        <div class="col-md-12">
            <div class="card d-none" id="form_card">
                <div class="card-body">

                <form id="form_biodata" class="form" method="POST">
                    <input type="hidden" id="id" name="id" required>
                    
                    <p class="lead">New Password</p>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number" id="nik" name="nik" class="form-control" required readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>NAMA</label>
                                <input type="text" id="nama" name="nama" class="form-control" required readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="text" id="new_password" name="new_password" class="form-control" required>
                            </div>
                        </div>
                    </div>

                </form>

                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" id="btnsave" onclick="save()">Save</button>
                </div>
            </div>
        </div>
    </div>
</section>