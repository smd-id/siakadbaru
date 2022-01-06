    
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            List Peserta
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" width="100%" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Asal Sekolah</th>
                                    <th>Jurusan</th>                                    
                                    <th>Bukti Pembayaran</th>                                   
                                    <th>Status Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($result as $key): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $key->nik; ?></td>
                                    <td><?= $key->nama; ?></td>
                                    <td><?= $key->no_telepon; ?></td>
                                    <td><?= $key->asal_sekolah; ?></td>
                                    <td><?= jurusan_singkat($key->jurusan); ?></td>                                   
                                   

                                    <?php if ($key->struk_daftarulang !== ''): ?>
                                    <td><?= '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Show File" onclick="viewFile(' . "'" . $key->struk_daftarulang . "'" . ')"><i class="fas fa-eye"></i> File</a>'; ?></td>
                                    <?php else: ?>
                                    <td><span class="badge badge-info">Belum</span></td>
                                    <?php endif; ?>

                                    <td><?= sudah_belum($key->s_cetak); ?></td>
                                
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>