    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="card-body">

                        <center>
                            <a class="btn btn-app bg-primary" href="<?= base_url('listpeserta/undangan'); ?>">
                                <span class="badge bg-success"><?= $total_undangan; ?></span>
                                <i class="fas fa-users"></i> Pendaftar Undangan
                            </a>

                            <a class="btn btn-app bg-primary" href="<?= base_url('listpeserta/reguler'); ?>">
                                <span class="badge bg-success"><?= $total_reguler; ?></span>
                                <i class="fas fa-users"></i> Pendaftar Reguler
                            </a>

                            <br>
                            <hr>

                            <a class="btn btn-app bg-secondary" href="<?= base_url('listpeserta/lulusadm'); ?>">
                                <span class="badge bg-success"><?= $total_lulus_adm; ?></span>
                                <i class="fas fa-users"></i> Lulus ADM Undangan
                            </a>

                            <a class="btn btn-app bg-secondary" href="<?= base_url('listpeserta/lulusundangan'); ?>">
                                <span class="badge bg-success"><?= $total_lulus_undangan; ?></span>
                                <i class="fas fa-users"></i> Lulus UJIAN Undangan
                            </a>

                            <a class="btn btn-app bg-secondary" href="<?= base_url('listpeserta/lulusreguler'); ?>">
                                <span class="badge bg-success"><?= $total_lulus_reguler; ?></span>
                                <i class="fas fa-users"></i> Lulus UJIAN Reguler
                            </a>

                            <br>
                            <hr>

                            <a class="btn btn-app bg-info" href="<?= base_url('konfirmasipsb'); ?>">
                                <span class="badge bg-success"><?= $total_mohon_konfirmasi; ?></span>
                                <i class="fas fa-users"></i> Mohon Konfirmasi 
                            </a>

                            <a class="btn btn-app bg-info" href="<?= base_url('listpeserta/siasia'); ?>">
                                <span class="badge bg-success"><?= $total_siasia; ?></span>
                                <i class="fas fa-users"></i> Tidak Lanjut Daftar
                            </a>

                            <a class="btn btn-app bg-info" href="<?= base_url('listpeserta/belumcetak'); ?>">
                                <span class="badge bg-success"><?= $total_belum_cetak; ?></span>
                                <i class="fas fa-users"></i> Belum Cetak Kartu
                            </a>
                            
                        </center>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
