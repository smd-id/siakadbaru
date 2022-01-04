<section class="content">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Pilih Kategori Ujian
                    </div>
                </div>
                <div class="card-body">
                    <center>
                        <a class="btn btn-app bg-primary" href="<?= base_url('ujianlisan/bacaan'); ?>">
                            <i class="fas fa-users"></i> Test Bacaan Al-Quran
                        </a>

                        <a class="btn btn-app bg-info" href="<?= base_url('ujianlisan/ibadah'); ?>">
                            <i class="fas fa-users"></i> Praktik Ibadah
                        </a>

                        <a class="btn btn-app bg-success" href="<?= base_url('ujianlisan/interview'); ?>">
                            <i class="fas fa-users"></i> Interview
                        </a>
                    </center>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Report Hasil Ujian
                    </div>
                </div>
                <div class="card-body">
                    <center>
                        <a class="btn btn-app bg-primary" href="<?= base_url('ujianlisan/excel'); ?>">
                            <i class="fas fa-file-excel"></i> Excel
                        </a>

                        <a class="btn btn-app bg-secodary" href="<?= base_url('ujianlisan/view'); ?>">
                            <i class="fas fa-eye"></i> Lihat Saja
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>