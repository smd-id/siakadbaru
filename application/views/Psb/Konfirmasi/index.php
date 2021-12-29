    
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Peserta</th>
                            <th scope="col">No Telepon / WA</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Struk</th>
                            <?php if(check_izin_psb() == TRUE): ?>
                            <th scope="col">#</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
