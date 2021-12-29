    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/'); ?>img/profilpic/<?= $userdata->profile_picture; ?>"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?= $userdata->name; ?></h3>
                <p class="text-muted text-center"><?= $userdata->nik; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Biodata</a></li>
                  <li class="nav-item"><a class="nav-link" href="#absensi" data-toggle="tab">Absensi</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <!-- <form action="POST" id="form_profile">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                      </div>
                    </form> -->
                  </div>
                  <div class="tab-pane" id="absensi">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="absen_date">Tentukan Bulan & Tahun</label>
                          <input type="month" name="absen_date" id="absen_date" class="form-control" onChange="getAbsensi()" value="<?= date("Y-m"); ?>">                
                        </div>
                      </div>
                    </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Hari/Tanggal</th>
                          <th>Check/In</th>
                          <th>Check/Out</th>
                          <th>Akumulasi</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>