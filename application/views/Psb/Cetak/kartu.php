<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Menu Cetak Kartu
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('cetakkartu'); ?>" method="POST">
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="text" name="nik" id="nik" class="form-control" required>                      
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Cetak</button>
                </form>
            </div>
        </div>
    </div>
</div>