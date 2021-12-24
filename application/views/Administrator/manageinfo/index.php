<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-success btn-xs" onclick="add_data()"><i class="fas fa-plus"></i> Add Data</button>
                    <button class="btn btn-info btn-xs" onclick="reload_table()"><i class="fas fa-sync"></i> Reload</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <th>No</th>
                            <th>Title</th>
                            <th>Informasi</th>
                            <th>Date & Time</th>
                            <th>#</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

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
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" reqiured>
                        </div>
                        <div class="form-group">
                            <label for="information">Information</label>
                            <textarea type="text" class="form-control" id="information" name="information" rows="5"></textarea>
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