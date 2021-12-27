<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Peserta - <?= $nama_kabupaten; ?>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id_kab" id="id_kab" value="<?= $id_kabupaten; ?>">
                    <table class="table table-striped" id="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>NO WA /Telepon</th>
                                <th>Asal Sekolah</th>
                                <th>File / Berkas</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="modal_file" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
               <input type="hidden" id="nik" value="">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Luluskan</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Abaikan</button>
            </div>
        </div>
    </div>
</div>