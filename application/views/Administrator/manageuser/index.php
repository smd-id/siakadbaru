
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-success btn-xs" onclick="add_data()"><i class="fas fa-plus"></i> Add Data</button>
                <button class="btn btn-info btn-xs" onclick="reload_table()"><i class="fas fa-sync"></i> Reload</button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">No WA</th>
                            <th scope="col">No NIK</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Status</th>
                            <th>#</th>
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

    <!-- Modal -->
    <div class="modal fade" id="modal_form" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" id="form" class="form-horizontal" method="POST">
                        <input type="hidden" value="" id="id" name="id"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" reqiured>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" reqiured>
                                </div>
                                <div class="form-group">
                                    <label for="whatsapp">No Telepon</label>
                                    <input type="number" class="form-control" id="whatsapp" name="whatsapp" placeholder="08.." reqiured>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" reqiured>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" reqiured>
                                </div>
                                
                                <div class="form-group">
                                    <label for="role">Jabatan</label>
                                    <select class="form-control" id="role_id" name="role_id" required>
                                        <option value="">--Pilih Role--</option>
                                        <?php foreach ($roles as $key): ?>
                                        <option value="<?= $key->id;?>"><?= $key->role_name;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="">--Pilih Status--</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Suspend</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
