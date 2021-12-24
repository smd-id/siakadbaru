
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary btn-xs btn-save"><i class="fa fa-save"></i> Save</button>
                <button class="btn btn-success btn-xs" onclick="add_data()"><i class="fas fa-plus"></i> Add New Menu</button>
                <button class="btn btn-info btn-xs" onClick="window.location.reload();"><i class="fas fa-sync"></i> Reload</button>
            </div>
            <div class="card-body">
                <div class="dd" id="nestable">
                    Loading Menu...
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-primary btn-xs btn-save"><i class="fa fa-save"></i> Save</button>
                <button class="btn btn-success btn-xs" onclick="add_data()"><i class="fas fa-plus"></i> Add New Menu</button>
                <button class="btn btn-info btn-xs" onClick="window.location.reload();"><i class="fas fa-sync"></i> Reload</button>
            </div>
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
                            <label for="menu">Menu Name</label>
                            <input type="text" class="form-control" id="menu" name="menu">
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" id="url" name="url">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon">
                        </div>
                        <div class="form-group" id="select_parent">
                            <label for="menu_parent_id">Sebagai</label>
                            <select class="form-control" id="menu_parent_id" name="menu_parent_id">
                                <option value="">Main Menu</option>
                                <?php foreach ($menulist as $key): ?>
                                <option value="<?=$key['id'];?>">Submenu - <?=$key['menu'];?></option>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

