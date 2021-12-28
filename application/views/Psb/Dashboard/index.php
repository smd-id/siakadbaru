
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4 id="total_undangan">0</h4>
                        <p>Jalur Undangan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4 id="total_reguler">0</h4>
                        <p>Jalur Reguler</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4 id="total_mohon_konfirmasi">0</h4>
                        <p>Mohon Konfirmasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4 id="total_dana_terkumpul">0</h4>
                        <p>Total Dana Terkumpul (Reguler)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Chart By Regional
                        </h3>
                        <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#chartundangan" data-toggle="tab">Undangan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#chartreguler" data-toggle="tab">Reguler</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="chartundangan">
                                <p class="lead">Jalur Undangan</p>
                                <canvas id="chart_undangan" width="400" height="200" class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="chart tab-pane" id="chartreguler">
                                <p class="lead">Jalur Reguler</p>
                                <canvas id="chart_reguler" width="400" height="200" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p>Data Dihimpun Berdasarkan :
                            <ul>
                                <li>Peserta Sudah Melakukan Pembayaran</li>
                                <li>Peserta Sudah Mengisi Biodata</li>
                                <li>Peserta Sudah Upload File</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>