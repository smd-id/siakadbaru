<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Interview Calon Santri
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

                    <div class="row d-none" id="identitas">
                        <div class="col-md-4">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" readonly>
                            
                            <label for="nama">Jurusan Pilihan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" readonly>
                            
                            <label for="nama">NIK</label>
                            <input type="text" class="form-control" id="nik_display" name="nik_display" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="nama">Asal Sekolah</label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" readonly>
                            
                            <label for="nama">Asal Daerah</label>
                            <input type="text" class="form-control" id="kabupaten" name="kabupaten" readonly>
                            
                            <label for="nama">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="nama">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" readonly>
                            
                            <label for="nama">Hobi</label>
                            <input type="text" class="form-control" id="hobi" name="hobi" readonly>
                            
                            <label for="nama">Cita Cita</label>
                            <input type="text" class="form-control" id="cita_cita_display1" name="cita_cita_display1" readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="nama">Prestasi 1</label>
                            <input type="text" class="form-control" id="prestasi_1" name="prestasi_1" readonly>

                            <label for="nama">Prestasi 2</label>
                            <input type="text" class="form-control" id="prestasi_2" name="prestasi_2" readonly>
                            
                            <label for="nama">Prestasi 3</label>
                            <input type="text" class="form-control" id="prestasi_3" name="prestasi_3" readonly>

                            <label for="nama">Prestasi 4</label>
                            <input type="text" class="form-control" id="prestasi_4" name="prestasi_4" readonly>

                            <label for="nama">Prestasi 5</label>
                            <input type="text" class="form-control" id="prestasi_5" name="prestasi_5" readonly>
                        </div>
                    </div>
                    
                    <br>

                    <div class="row d-none" id="soal">
                        <p class="lead">Soal dan Pertanyaan</p>
                        <div class="col-md-12">
                            <form id="form_wawancara" method="post" class="form-horizontal">
                                <input type="hidden" name="nik" id="nik" required>
                                <input type="hidden" name="step_3" id="step_3" value="1" required>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Prestasi Akademik</label>
                                          <textarea type="text" name="prestasi_akademik" id="prestasi_akademik" class="form-control" required></textarea>
                                        </div>

                                        <div class="form-group">
                                          <label>Prestasi NON-Akademik</label>
                                          <textarea type="text" name="prestasi_non_akademik" id="prestasi_non_akademik" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kemampuan Bahasa Inggris</label>
                                            <select class="form-control" name="bahasa_inggris" id="bahasa_inggris" required>
                                                <option value="">Pilih</option>
                                                <option value="1">SANGAT BAIK</option>
                                                <option value="2">BAIK</option>
                                                <option value="3">CUKUP</option>
                                                <option value="4">KURANG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kemampuan Bahasa Arab</label>
                                            <select class="form-control" name="bahasa_arab" id="bahasa_arab" required>
                                                <option value="">Pilih</option>
                                                <option value="1">SANGAT BAIK</option>
                                                <option value="2">BAIK</option>
                                                <option value="3">CUKUP</option>
                                                <option value="4">KURANG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label>Info Masuk RIAB</label>
                                          <textarea type="text" name="info_masuk" id="info_masuk" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label>Alasan Masuk RIAB</label>
                                          <textarea type="text" name="alasan_masuk" id="alasan_masuk" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label>Riwayat Penyakit</label>
                                          <textarea type="text" name="riwayat_penyakit" id="riwayat_penyakit" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pernah Merokok ?</label>
                                            <select class="form-control" name="merokok" id="merokok" required>
                                                <option value="">Pilih</option>
                                                <option value="1">PERNAH</option>
                                                <option value="2">TIDAK PERNAH</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pernah Pacaran ?</label>
                                            <select class="form-control" name="pacaran" id="pacaran" required>
                                                <option value="">Pilih</option>
                                                <option value="1">PERNAH</option>
                                                <option value="2">TIDAK PERNAH</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Penggunaan HP</label>
                                          <textarea type="text" name="penggunaan_hp" id="penggunaan_hp" class="form-control" required></textarea>
                                        </div>

                                        <div class="form-group">
                                          <label>Pelanggaran</label>
                                          <textarea type="text" name="pelanggaran" id="pelanggaran" class="form-control" required></textarea>
                                        </div>

                                        <div class="form-group">
                                          <label>Guru Yang Tidak disukai</label>
                                          <textarea type="text" name="guru_tidak_suka" id="guru_tidak_suka" class="form-control" required></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label>Pelajaran yang disukai</label>
                                          <textarea type="text" name="pelajaran_suka" id="pelajaran_suka" class="form-control" required></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label>Pelajaran yang Tidak disukai</label>
                                          <textarea type="text" name="pelajaran_tidak_suka" id="pelajaran_tidak_suka" class="form-control" required></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label>Cita Cita</label>
                                          <input type="text" id="cita_cita_display2" class="form-control" readonly>
                                          <textarea type="text" name="cita_cita" id="cita_cita" class="form-control" required></textarea>
                                        </div>

                                        <div class="form-group">
                                          <label>Alasan Memilih Jurusan : </label>
                                          <input type="text" id="jurusan_display" class="form-control" readonly>
                                          <textarea type="text" name="alasan_memilih_jurusan" id="alasan_memilih_jurusan" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Rekomendasi Interview</label>
                                            <select class="form-control" name="rekomendasi_interview" id="rekomendasi_interview" required>
                                                <option value="">Pilih</option>
                                                <option value="1">REKOM SEKALI</option>
                                                <option value="2">REKOM</option>
                                                <option value="3">KURANG REKOM</option>
                                                <option value="4">TIDAK REKOM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Keterangan Interview</label>
                                            <textarea class="form-control" name="keterangan_interview" id="keterangan_interview" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <button type="button" id="btnsave" class="btn btn-primary" onclick="save()">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>