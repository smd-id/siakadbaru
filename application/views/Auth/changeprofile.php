    <?php 
        $CI =& get_instance();
        $CI->load->model('M_Costumer');

        $sale_count = $CI->M_Costumer->get_by_sale_by($userdata->id)->num_rows();
    ?>
    
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
                <p class="text-muted text-center"><?= $userdata->honda_id; ?> - <?= $userdata->inisial; ?></p>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Total Penjualan</b> <a class="float-right"><?= $sale_count; ?> Unit</a>
                  </li>
                  <li class="list-group-item">
                    <b>Masa Kerja</b> <a class="float-right"><?= selisihHari($userdata->tanggal_sign); ?> Hari</a>
                  </li>
                  <li class="list-group-item">
                    <b>Aktifitas</b> <a class="float-right">0 Hari</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jabatan</b> <a class="float-right"><span class="badge badge-<?= $role['role_color']; ?>"><?= $role['role_name']; ?></span></a>
                  </li>
                  <li class="list-group-item">
                    <b>No WhatsApp</b> <a class="float-right"><?= $userdata->whatsapp; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $userdata->email; ?></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#absensi" data-toggle="tab">Absensi</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <p>Data tidak di temukan</p>
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
                          <th>Masuk</th>
                          <th>Pulang</th>
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