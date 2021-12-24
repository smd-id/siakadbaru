    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-success btn-xs" onclick="add_data()"><i class="fas fa-plus"></i> Add Data</button>
                <button class="btn btn-info btn-xs" onclick="reload_table()"><i class="fas fa-sync"></i> Reload</button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Jabatan</th>
                            <th scope="col">Warna Badge</th>
                            <th scope="col">Status</th>
                            <th scope="col">#</th>
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
        <div class="modal-dialog">
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
                        <div class="form-group">
                            <label for="role_name">Role Name</label>
                            <input type="text" class="form-control" id="role_name" name="role_name" reqiured>
                        </div>
                        <div class="form-group">
                            <label for="role_color">Role Color</label>
                            <input type="text" class="form-control" id="role_color" name="role_color" placeholder="success / info / error">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">--Pilih Status--</option>
                                <option value="1">Aktif</option>
                                <option value="0">Suspend</option>
                            </select>
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
