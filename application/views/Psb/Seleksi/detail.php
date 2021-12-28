<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="button-group mb-2">
                <button onclick="history.back()" class="btn btn-md btn-danger"><i class="fas fa-arrow-left"></i> Back</button>
                <button onclick="reload_table()" class="btn btn-md btn-info"><i class="fas fa-sync"></i> Reload</button>
            </div>
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
                                <th>Minat Jurusan</th>
                                <th>NO WA /Telepon</th>
                                <th>Asal Sekolah</th>
                                <th>Status Akademik</th>
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
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <b><p class="lead" id="name_and_nik"></p></b>
                <table class="table table-striped" id="file_table">
                    <thead>
                        <tr>
                            <td>Keterangan</td>
                            <td>File</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pas Photo</td>
                            <td id="file_pasphoto"></td>
                        </tr>
                        <tr>
                            <td>Raport 1</td>
                            <td id="file_raport_1"></td>
                        </tr>
                        <tr>
                            <td>Raport 2</td>
                            <td id="file_raport_2"></td>
                        </tr>
                        <tr>
                            <td>Raport 3</td>
                            <td id="file_raport_3"></td>
                        </tr>
                        <tr>
                            <td>Raport 4</td>
                            <td id="file_raport_4"></td>
                        </tr>
                        <tr>
                            <td>SK Rangking</td>
                            <td id="file_sk"></td>
                        </tr>
                        <tr>
                            <td>Surat Pernyataan</td>
                            <td id="file_surat_pernyataan"></td>
                        </tr>
                        <tr>
                            <td>Surat Kesanggupan</td>
                            <td id="file_surat_kesanggupan"></td>
                        </tr>
                        <tr>
                            <td>Formulir Kepala Sekolah</td>
                            <td id="file_formulir_kepsek"></td>
                        </tr>
                        <tr>
                            <td>Sertifikat Prestasi 1</td>
                            <td id="file_sertifikat_1"></td>
                        </tr>
                        <tr>
                            <td>Sertifikat Prestasi 2</td>
                            <td id="file_sertifikat_2"></td>
                        </tr>
                        <tr>
                            <td>Sertifikat Prestasi 3</td>
                            <td id="file_sertifikat_3"></td>
                        </tr>
                        <tr>
                            <td>Sertifikat Prestasi 4</td>
                            <td id="file_sertifikat_4"></td>
                        </tr>
                        <tr>
                            <td>Sertifikat Prestasi 5</td>
                            <td id="file_sertifikat_5"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <form action="POST" id="aksi_luluskan">
                    <input type="hidden" id="nik_form" value="" required>
                    <button type="button" class="btn btn-sm btn-success" id="btnLuluskan" onclick="luluskan()"><i class="fas fa-check"></i> Luluskan</button>
                </form>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Abaikan</button>
            </div>
        </div>
    </div>
</div>