
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <style>
        body {
            background: rgb(204,204,204);
        }
        page {
            background: white;
            display: block;
        }
        page[size="A4"] {  
            width: 21cm;
            height: 29.5cm;
            margin: 0 auto;
        }
        div.content {
            margin-left: 24px;
            margin-right: 18px;
        }
        div.content-table {
            margin-left: 35px;
            margin-right: 35px;
        }
        div.content-table-center {
            margin-left: 35px;
            margin-right: 35px;
        }
        div.a {
            line-height: 80%;
            margin-left: 55px;
            margin-right: 55px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td {
            text-align: left;
            height: 40px;
            font-size: 10pt;
        }
        h2 {
            line-height: 90%;
            margin-bottom: -13px;
        }
        .ttd {
            padding-left: 11cm;
        }

        @media print 
        {
            @page {
            size: A4; /* DIN A4 standard, Europe */
            margin-left: 0,1cm;
            margin-right: 0,1cm;
            margin-top: 0,1cm;
            margin-bottom: 0,1cm;
            }
            html, body {
                width: 210mm;
                height: 295mm;
                background: #FFF;
                overflow:visible;
            }
        }      
    </style>

</head>
<body>
    <page size="A4">
        <img src="<?= base_url('assets/img/logo/'); ?>logo.png" style="margin-top: 15px; margin-left: 15px;">
        <center>
        <br>
        <div class="a">
            <h2>Absensi Peserta PSB</h2>
            <h3 style="font-size: 18px;"><u>UJIAN LISAN <?= date_indo($jadwal); ?></u></h3>
            <p><?= $ruang; ?> | Sesi <?= $sesi; ?></p>
        </div>
        </center>
        
        <div class="content-table">
        <table style="width:100%">
            <thead>
                <tr>
                    <th><center><b>No</b></center></th>
                    <th><center><b>No Ujian</b></center></th>
                    <th><center><b>Jurusan</b></center></th>
                    <th><center><b>Nama</b></center></th>
                    <th><center><b>Asal Sekolah</b></center></th>
                    <th><center><b>TTD</b></center></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($result as $key) : ?>
        
                    <tr>
                        <td><center><?= $i; ?></center></td>
                        <td><center><b><?php echo $key->no_ujian; ?></b></center></td>
                        <td><center><b><?php echo jurusan_singkat($key->jurusan); ?></center></b></td>
                        <td><?php echo $key->nama; ?></td>
                        <td><?php echo $key->asal_sekolah; ?></td>
                        <td><?= $i; ?>._________</td>                         
                    </tr>  

                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <div class="ttd">
            <center><b>PENGAWAS</b></center>
            <br>
            <br>
            <br>
            <center>_______________________</center>
        </div>
        </div>
    </page>
    
</body>
<footer>
    <script>window.print();</script>
</footer>
</html>