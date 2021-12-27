    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Pilih Peserta
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Provinsi</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Kode Kabupaten</th>
                                    <th scope="col">Kabupaten</th>
                                    <th scope="col">Total Per Kab</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($siswa_from as $key): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo substr($key->kabupaten, 0, 2); ?></td>
                                    <td><?php echo what_provinsi(substr($key->kabupaten, 0, 2)); ?></td>
                                    <td><?php echo $key->kabupaten; ?></td>
                                    <td><?php echo what_kabupaten($key->kabupaten); ?></td>
                                    <td><span class="badge badge-success"><?php echo $key->total." Peserta"; ?></span></td>
                                    <td><a href="<?php echo base_url('seleksiberkas/detail/').$key->kabupaten; ?>" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat Peserta</a></td>
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
    <!-- /.content -->
