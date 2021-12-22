
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" id="form_akses" method="POST">
                                    <input type="hidden" id="menu_id" name="menu_id" value="<?=$id;?>">
                                    <input type="hidden" id="userbefore" name="userbefore" value="<?=$akses->permited_to;?>">
                                    <div class="form-group">
                                      <label for="id">Pilih User</label>
                                        <select name="iduser" id="id_user" class="form-control select2bs4 select2-hidden-accessible" multiple="multiple" style="width: 100%;" data-placeholder="Pilih User" required>
                                            <?php $arrayuser = explode(',', $akses->permited_to); ?>
                                            <?php $this->db->where_not_in('id', $arrayuser);?>
                                            <?php $getdata = $this->db->get('users')->result();?>
                                            <?php foreach($getdata as $key): ?>
                                            <option value="<?=$key->id;?>"><?=$key->name;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button id="btnSave" type="submit" class="btn btn-primary" onclick="save_akses()">Save</button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Dapat di akses oleh</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" width="100%" id="table-akses">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID User</th>
                                    <th>Nama</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $pecahkan = explode(',', $akses->permited_to);?>
                                <?php $no = 1;?>
                                <?php foreach ($pecahkan as $key): ?>
                                <?php $getdata = $this->db->get_where('users', ['id' => $key])->row();?>
                                <tr>
                                    <td scope="row"><?=$no;?></td>
                                    <td><?=$getdata->id;?></td>
                                    <td><?=$getdata->name;?></td>
                                    <td><button class="btn btn-danger btn-xs" onclick="delete_data(<?=$id;?>, <?=$getdata->id;?>)"><i class="fas fa-trash"></i> Hapus</button></td>
                                </tr>
                                <?php $no++;?>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
