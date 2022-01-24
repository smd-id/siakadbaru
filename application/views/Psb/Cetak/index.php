    
    <section class="content">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Absensi Ujian CAT
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('cetakabsensi/cat'); ?>" class="form-vertical" method="POST">
                            <div class="form-group">
                              <label>Tentukan Jadwal</label>
                              <select name="jadwal_ujian" id="jadwal_ujian" class="form-control" required>
                                  <option value="">--Pilih Jadwal--</option>
                                  <?php foreach($jadwal_ujian as $key): ?>
                                  <option value="<?= $key->jadwal_ujian; ?>"><?= date_indo($key->jadwal_ujian); ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Tentukan Ruang</label>
                              <select name="ruang_cat" id="ruang_cat" class="form-control" required>
                                  <option value="">--Pilih Ruang CAT--</option>
                                  <?php foreach($ruang_cat as $key): ?>
                                  <option value="<?= $key->ruang_cat; ?>"><?= $key->ruang_cat; ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Tentukan Sesi</label>
                              <select name="sesi_cat" id="sesi_cat" class="form-control" required>
                                  <option value="">--Pilih Sesi CAT--</option>
                                  <?php foreach($sesi_cat as $key): ?>
                                  <option value="<?= $key->sesi_cat; ?>"><?= $key->sesi_cat; ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Absensi Ujian Lisan
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('cetakabsensi/lisan'); ?>" class="form-vertical" method="POST">
                            <div class="form-group">
                              <label>Tentukan Jadwal</label>
                              <select name="jadwal_ujian" id="jadwal_ujian" class="form-control" required>
                                  <option value="">--Pilih Jadwal--</option>
                                  <?php foreach($jadwal_ujian as $key): ?>
                                  <option value="<?= $key->jadwal_ujian; ?>"><?= date_indo($key->jadwal_ujian); ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Tentukan Ruang</label>
                              <select name="ruang_lisan" id="ruang_lisan" class="form-control" required>
                                  <option value="">--Pilih Ruang Lisan--</option>
                                  <?php foreach($ruang_lisan as $key): ?>
                                  <option value="<?= $key->ruang_lisan; ?>"><?= $key->ruang_lisan; ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Tentukan Sesi</label>
                              <select name="sesi_lisan" id="sesi_lisan" class="form-control" required>
                                  <option value="">--Pilih Sesi Lisan--</option>
                                  <?php foreach($sesi_lisan as $key): ?>
                                  <option value="<?= $key->sesi_lisan; ?>"><?= $key->sesi_lisan; ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </section>