<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Edit Biodata
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Cari Berdasarkan</label>
                            <div class="input-group mb-3">
                                <select name="berdasarkan" id="berdasarkan" class="form-control">
                                    <option value="nik">NIK</option>
                                    <option value="no_ujian">No Ujian</option>
                                </select>
                                <input type="text" class="form-control" id="val_cari" name="val_cari">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger" onclick="cari_data()">Cari Data</button>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>            
        </div>
        <div class="col-md-12">
            <div class="card d-none" id="form_card">
                <div class="card-body">

                <form id="form_biodata" class="form" method="POST">
                    <input type="hidden" id="id" name="id" required>
                    
                    <p class="lead">A.BIODATA DIRI</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Nomor KTP (Sesuai di KTP / KK)</label>
                                <input type="number" id="nik" name="nik" maxlength="20" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="number" id="no_telepon" name="no_telepon" class="form-control" maxlength="16" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="number" id="nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional" maxlength="10" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" min="2005-01-01" max="2008-12-31" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Anak Ke</label>
                                <input type="number" id="anak_ke" name="anak_ke" placeholder="Isi dengan Angka" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Dari Bersaudara</label>
                                <input type="number" id="dari_saudara" name="dari_saudara" placeholder="Isi dengan Angka" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Hobi</label>
                                <input type="text" id="hobi" name="hobi" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Cita-Cita</label>
                                <input type="text" id="cita_cita" name="cita_cita" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    
                    <p class="lead">B. DATA ALAMAT</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Alamat Tempat Tinggal</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi" id="provinsi" class="form-control" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Kabupaten</label>
                                <select name="kabupaten" id="kabupaten" class="form-control" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="kecamatan" id="kecamatan" class="form-control" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Desa</label>
                                <select name="desa" id="desa" class="form-control" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="number" id="kode_pos" name="kode_pos" class="form-control" maxlength="6" required>
                            </div>
                        </div>
                    </div>
                    
                    <p class="lead">C. DATA ASAL SEKOLAH</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Nama Sekolah Asal</label>
                                <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Kode NPSN Sekolah Asal</label>
                                <input type="number" id="npsn_sekolah_asal" name="npsn_sekolah_asal" maxlength="15" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Jenis Sekolah Asal</label>
                                <select name="jenis_sekolah_asal" id="jenis_sekolah_asal" class="form-control" required>
                                    <option value="">Pilih Jenis Sekolah</option> 
                                    <option value="SMP Negeri">SMP Negeri</option>
                                    <option value="SMP Swasta">SMP Swasta</option>
                                    <option value="SMPIT">SMPIT</option>
                                    <option value="MTs Negeri">MTs Negeri</option>
                                    <option value="MTs Swasta">MTs Swasta</option>
                                    <option value="Pondok Pesantren">Pondok Pesantren</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Alamat Sekolah Asal</label>
                                <input type="text" id="alamat_sekolah_asal" name="alamat_sekolah_asal" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Tahun Lulus</label>
                                <input type="number" id="tahun_lulus" name="tahun_lulus" maxlength="4" min="2020" max="2022" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    

                    <p class="lead">D. DATA ORANG TUAN DAN WALI</p>
                    <hr>
                    <div class="row">
                        <p class="lead">1. Ayah</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Status Ayah</label>
                                <select name="status_ayah" id="status_ayah" class="form-control" required>
                                    <option value="">Pilih Status Ayah</option> 
                                    <option value="masih">Masih</option>
                                    <option value="meninggal">Meninggal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="status_ayah_result">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Pekerjaan Ayah</label>
                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Penghasilan Ayah</label>
                                <select name="penghasilan_ayah" id="penghasilan_ayah" class="form-control" required>
                                    <option value="">Silahkan Pilih</option>
                                    <option value="0">Tidak Ada</option>
                                    <option value="< 2.500.000">&#x2190; 2.500.000</option>
                                    <option value="2.500.000 - 5.000.000">2.500.000 - 5.000.000</option>
                                    <option value="5.000.000 - 7.000.000">5.000.000 - 7.000.000</option>
                                    <option value=">7.000.000">&#8594; 7.000.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Pendidikan Terakhir Ayah</label>
                                <input type="text" id="pendidikan_ayah" name="pendidikan_ayah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Nomor Telepon Ayah</label>
                                <input type="number" id="no_telepon_ayah" name="no_telepon_ayah" maxlength="16" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="lead">2. Ibu</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Status Ibu</label>
                                <select name="status_ibu" id="status_ibu" class="form-control" required>
                                    <option value="">Pilih Status Ibu</option> 
                                    <option value="masih">Masih</option>
                                    <option value="meninggal">Meninggal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="status_ibu_result">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Pekerjaan Ibu</label>
                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Penghasilan Ibu</label>
                                <select name="penghasilan_ibu" id="penghasilan_ibu" class="form-control" required>
                                    <option value="">Silahkan Pilih</option>
                                    <option value="0">Tidak Ada</option>
                                    <option value="< 2.500.000">&#x2190; 2.500.000</option>
                                    <option value="2.500.000 - 5.000.000">2.500.000 - 5.000.000</option>
                                    <option value="5.000.000 - 7.000.000">5.000.000 - 7.000.000</option>
                                    <option value=">7.000.000">&#8594; 7.000.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Pendidikan Terakhir Ibu</label>
                                <input type="text" id="pendidikan_ibu" name="pendidikan_ibu" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Nomor Telepon Ibu</label>
                                <input type="number" id="no_telepon_ibu" name="no_telepon_ibu" maxlength="16" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="lead">3. Wali</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Nama Wali</label>
                                <input type="text" id="nama_wali" name="nama_wali" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Nomor Telepon Wali</label>
                                <input type="number" id="no_telepon_wali" name="no_telepon_wali" maxlength="16" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Status Dengan Wali</label>
                                <input type="text" id="status_wali" name="status_wali" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <p class="lead">E. DATA PRESTASI SANTRI</p>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Prestasi 1</label>
                                <input type="text" id="prestasi_1" name="prestasi_1" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Prestasi 2</label>
                                <input type="text" id="prestasi_2" name="prestasi_2" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Prestasi 3</label>
                                <input type="text" id="prestasi_3" name="prestasi_3" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Prestasi 4</label>
                                <input type="text" id="prestasi_4" name="prestasi_4" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Prestasi 5</label>
                                <input type="text" id="prestasi_5" name="prestasi_5" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>

                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" id="btnsave" onclick="save()">Save</button>
                </div>
            </div>
        </div>
    </div>
</section>