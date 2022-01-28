<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Ujian Bacaan Al-Quran
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
                            <input type="text" class="form-control" id="cita_cita" name="cita_cita" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row d-none" id="soal">
                        <p class="lead">Soal dan Pertanyaan</p>
                        <div class="col-md-12">
                            <form id="form_wawancara" method="post" class="form-horizontal">
                                <input type="hidden" name="nik" id="nik" required>
                                <input type="hidden" name="step_1" value="1" required>
                                <input type="hidden" name="users_step_1" value="<?= $this->session->userdata['id'];?>" required>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Khatak Jali</label>
                                        <input type="number" name="khatak_jali" id="khatak_jali" class="form-control" placeholder="Isikan hanya angka dari 0 s/d 50" min="0" max="50" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Khatak Kafi</label>
                                        <input type="number" name="khatak_kafi" id="khatak_kafi" class="form-control" placeholder="Isikan hanya angka dari 0 s/d 50" min="0" max="50" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Total Skor</label>
                                        <input type="text" class="form-control total_skor" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Jumlah Hafalan</label>
                                        <input type="number" name="jumlah_hafalan" id="jumlah_hafalan" min="0" max="30" placeholder="Isikan hanya angka dari 0 s/d 30" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Kualitas Hafalan</label>
                                        <select class="form-control" name="kualitas_hafalan" id="kualitas_hafalan" required>
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
                                        <label>Rekomendasi Hafalan</label>
                                        <select class="form-control" name="rekomendasi_hafalan" id="rekomendasi_hafalan" required>
                                            <option value="">Pilih</option>
                                            <option value="1">REKOM SEKALI</option>
                                            <option value="2">REKOM</option>
                                            <option value="3">KURANG REKOM</option>
                                            <option value="4">TIDAK REKOM</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label>Keterangan Hafalan</label>
                                        <textarea class="form-control" name="keterangan_hafalan" id="keterangan_hafalan" rows="4" required></textarea>
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