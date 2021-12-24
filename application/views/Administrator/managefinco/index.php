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
                            <th scope="col">Nama Finco</th>
                            <th scope="col">Alias / Singkatan</th>
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
                            <label for="name">Nama Finco</label>
                            <input type="text" class="form-control" id="name" name="name" reqiured>
                        </div>
                        <div class="form-group">
                            <label for="alias">Alias / Singkatan</label>
                            <input type="text" class="form-control" id="alias" name="alias" required>
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
