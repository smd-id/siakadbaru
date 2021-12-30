<section class="content">
    <div class="row">
        <div class="col-md-12">            
            <div class="card">
                <div class="card-header">               
                    <div class="card-title">
                        <button class="btn btn-danger btn-xs" onclick="history.back()"><i class="fas fa-arrow-left"></i> Back</button>
                        <button class="btn btn-info btn-xs" onclick="reload_table()"><i class="fas fa-sync"></i> Reload</button>
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


<!-- Modal File -->
<div class="modal fade" id="modal_file" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <b><p class="lead" id="name_and_nik"></p></b>
                <hr>
                <div class="row">
                    <div class="col-6">

                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    Pas Photo
                                    <div class="float-right text-primary" id="file_pasphoto"></div>
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link">
                                    Raport Semester 1
                                    <div class="float-right text-primary" id="file_raport_1"></div>
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link">
                                    Raport Semester 2
                                    <span class="float-right text-primary" id="file_raport_2"></span>
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link">
                                    Raport Semester 3
                                    <span class="float-right text-primary" id="file_raport_3"></span>
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link">
                                    Raport Semester 4
                                    <span class="float-right text-primary" id="file_raport_4"></span>
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link">
                                    SK Rangking Sekolah
                                    <span class="float-right text-primary" id="file_sk"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    Surat Pernyataan
                                    <span class="float-right text-primary" id="file_surat_pernyataan"></span>
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link">
                                    Surat Kesanggupan Membiayai
                                    <span class="float-right text-primary" id="file_surat_kesanggupan"></span>
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link">
                                    Formulir Isian Kepala Sekolah
                                    <span class="float-right text-primary" id="file_formulir_kepsek"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link">
                            Sertifikat Prestasi 1
                            <span class="float-right text-primary" id="file_sertifikat_1"></span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link">
                            Sertifikat Prestasi 2
                            <span class="float-right text-primary" id="file_sertifikat_2"></span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link">
                            Sertifikat Prestasi 3
                            <span class="float-right text-primary" id="file_sertifikat_3"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">
                            Sertifikat Prestasi 4
                            <span class="float-right text-primary" id="file_sertifikat_4"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">
                            Sertifikat Prestasi 5
                            <span class="float-right text-primary" id="file_sertifikat_5"></span>
                        </a>
                    </li>
                </ul>
                <!-- <center>
                    <a class="btn btn-primary btn-sm" id="downloadZip" target="_blank"><i class="fas fa-download"></i> Download ZIP</a>
                </center> -->
            </div>
            <div class="modal-footer">
                <?php if($userdata->izin_psb == 'admin' or $userdata->izin_psb == 'moderator'): ?>
                <form action="POST" id="aksi_luluskan">
                    <input type="hidden" id="nik_form" value="" required>
                    <button type="button" class="btn btn-sm btn-success" id="btnLuluskan" onclick="luluskan()"><i class="fas fa-check"></i> Luluskan</button>
                </form>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Abaikan</button>
                <?php else: ?>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Biodata -->
<div class="modal fade" id="modal_biodata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="lead" id="minat"></p>
                <p>A. Biodata dan Alamat</p>
                <table class="table table-striped my-2" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td width="19%">NIK</td>
                            <td width="1%">:</td>
                            <td width="80%" id="nik"></td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td id="nisn"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td id="nama"></td>
                        </tr>
                        <tr>
                            <td>Tempat & Tanggal Lahir</td>
                            <td>:</td>
                            <td><span id="tempat_lahir"></span>, <span id="tanggal_lahir"></span></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td id="jenis_kelamin"></td>
                        </tr>
                        <tr>
                            <td>No Telepon / WA</td>
                            <td>:</td>
                            <td id="no_telepon"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <td>Anak Ke</td>
                            <td>:</td>
                            <td>Anak Ke <span id="anak_ke"></span> Dari <span id="dari_saudara"></span> Bersaudara</td>
                        </tr>
                        <tr>
                            <td>Hobi</td>
                            <td>:</td>
                            <td id="hobi"></td>
                        </tr>
                        <tr>
                            <td>Cita Cita</td>
                            <td>:</td>
                            <td id="cita_cita"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td id="alamat"></td>
                        </tr>
                        <tr>
                            <td>Desa</td>
                            <td>:</td>
                            <td id="desa"></td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td id="kecamatan"></td>
                        </tr>
                        <tr>
                            <td>Kabupaten</td>
                            <td>:</td>
                            <td id="kabupaten"></td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>:</td>
                            <td id="provinsi"></td>
                        </tr>
                        <tr>
                            <td>Kode Pos</td>
                            <td>:</td>
                            <td id="kode_pos"></td>
                        </tr>
                    </tbody>
                </table>
                <p>B. Data Sekolah Asal</p>
                <table class="table table-striped my-2" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td width="19%">Asal Sekolah</td>
                            <td width="1%">:</td>
                            <td width="80%" id="asal_sekolah"></td>
                        </tr>
                        <tr>
                            <td>Kode NPSN</td>
                            <td>:</td>
                            <td id="npsn_sekolah_asal"></td>
                        </tr>
                        <tr>
                            <td>Alamat Sekolah</td>
                            <td>:</td>
                            <td id="alamat_sekolah_asal"></td>
                        </tr>
                        <tr>
                            <td>Jenis Sekolah</td>
                            <td>:</td>
                            <td id="jenis_sekolah_asal"></td>
                        </tr>
                        <tr>
                            <td>Tahun Lulus</td>
                            <td>:</td>
                            <td id="tahun_lulus"></td>
                        </tr>
                    </tbody>
                </table>

                <p>C. Data Ayah</p>
                <table class="table table-striped my-2" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td width="19%">Nama Ayah</td>
                            <td width="1%">:</td>
                            <td width="80%" id="nama_ayah"></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td>
                            <td>:</td>
                            <td id="pekerjaan_ayah"></td>
                        </tr>
                        <tr>
                            <td width="19%">Penghasilan Ayah</td>
                            <td>:</td>
                            <td id="penghasilan_ayah"></td>
                        </tr>
                        <tr>
                            <td width="19%">No Telepon Ayah</td>
                            <td>:</td>
                            <td id="no_telepon_ayah"></td>
                        </tr>
                        <tr>
                            <td width="19%">Pendidikan Ayah</td>
                            <td>:</td>
                            <td id="pendidikan_ayah"></td>
                        </tr>
                        <tr>
                            <td width="19%">Status Ayah</td>
                            <td>:</td>
                            <td id="status_ayah"></td>
                        </tr>
                    </tbody>
                </table>

                <p>D. Data Ibu</p>
                <table class="table table-striped my-2" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td width="19%">Nama Ibu</td>
                            <td width="1%">:</td>
                            <td width="80%" id="nama_ibu"></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ibu</td>
                            <td>:</td>
                            <td id="pekerjaan_ibu"></td>
                        </tr>
                        <tr>
                            <td>Penghasilan Ibu</td>
                            <td>:</td>
                            <td id="penghasilan_ibu"></td>
                        </tr>
                        <tr>
                            <td>No Telepon Ibu</td>
                            <td>:</td>
                            <td id="no_telepon_ibu"></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Ibu</td>
                            <td>:</td>
                            <td id="pendidikan_ibu"></td>
                        </tr>
                        <tr>
                            <td>Status Ibu</td>
                            <td>:</td>
                            <td id="status_ibu"></td>
                        </tr>
                    </tbody>
                </table>

                <p>E. Data Wali</p>
                <table class="table table-striped my-2" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td width="19%">Nama Wali</td>
                            <td width="1%">:</td>
                            <td width="80%" id="nama_wali"></td>
                        </tr>
                        <tr>
                            <td>No Telepon Wali</td>
                            <td>:</td>
                            <td id="no_telepon_wali"></td>
                        </tr>
                        <tr>
                            <td>Status Dengan Wali</td>
                            <td>:</td>
                            <td id="status_wali"></td>
                        </tr>
                    </tbody>
                </table>

                <p>F. Prestasi Siswa</p>
                <table class="table table-striped my-2" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td width="19%">Prestasi 1</td>
                            <td width="1%">:</td>
                            <td width="80%" id="prestasi_1"></td>
                        </tr>
                        <tr>
                            <td>Prestasi 2</td>
                            <td>:</td>
                            <td id="prestasi_2"></td>
                        </tr>
                        <tr>
                            <td>Prestasi 3</td>
                            <td>:</td>
                            <td id="prestasi_3"></td>
                        </tr>
                        <tr>
                            <td>Prestasi 4</td>
                            <td>:</td>
                            <td id="prestasi_4"></td>
                        </tr>
                        <tr>
                            <td>Prestasi 5</td>
                            <td>:</td>
                            <td id="prestasi_5"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>