<?php

    function date_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }


    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
            return "Januari";
            break;
            case 2:
            return "Februari";
            break;
            case 3:
            return "Maret";
            break;
            case 4:
            return "April";
            break;
            case 5:
            return "Mei";
            break;
            case 6:
            return "Juni";
            break;
            case 7:
            return "Juli";
            break;
            case 8:
            return "Agustus";
            break;
            case 9:
            return "September";
            break;
            case 10:
            return "Oktober";
            break;
            case 11:
            return "November";
            break;
            case 12:
            return "Desember";
            break;
        }
    }

    //Format Shortdate
    function shortdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = short_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }

    function short_bulan($bln)
    {
        switch ($bln)
        {
            case 1:
            return "01";
            break;
            case 2:
            return "02";
            break;
            case 3:
            return "03";
            break;
            case 4:
            return "04";
            break;
            case 5:
            return "05";
            break;
            case 6:
            return "06";
            break;
            case 7:
            return "07";
            break;
            case 8:
            return "08";
            break;
            case 9:
            return "09";
            break;
            case 10:
            return "10";
            break;
            case 11:
            return "11";
            break;
            case 12:
            return "12";
            break;
        }
    }

    function huruf_bulan($bln)
    {
        switch ($bln)
        {
            case 1:
            return "A";
            break;
            case 2:
            return "B";
            break;
            case 3:
            return "B";
            break;
            case 4:
            return "D";
            break;
            case 5:
            return "E";
            break;
            case 6:
            return "F";
            break;
            case 7:
            return "G";
            break;
            case 8:
            return "H";
            break;
            case 9:
            return "I";
            break;
            case 10:
            return "J";
            break;
            case 11:
            return "K";
            break;
            case 12:
            return "L";
            break;
        }
    }

    //Format Medium date
    function mediumdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = medium_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }


    function medium_bulan($bln)
    {
        switch ($bln)
        {
            case 1:
            return "Jan";
            break;
            case 2:
            return "Feb";
            break;
            case 3:
            return "Mar";
            break;
            case 4:
            return "Apr";
            break;
            case 5:
            return "Mei";
            break;
            case 6:
            return "Jun";
            break;
            case 7:
            return "Jul";
            break;
            case 8:
            return "Ags";
            break;
            case 9:
            return "Sep";
            break;
            case 10:
            return "Okt";
            break;
            case 11:
            return "Nov";
            break;
            case 12:
            return "Des";
            break;
        }
    }

    function romawi_bulan($bln)
    {
        switch ($bln)
        {
        case 1:
        return "I";
        break;
        case 2:
        return "II";
        break;
        case 3:
        return "III";
        break;
        case 4:
        return "IV";
        break;
        case 5:
        return "V";
        break;
        case 6:
        return "VI";
        break;
        case 7:
        return "VII";
        break;
        case 8:
        return "VIII";
        break;
        case 9:
        return "IX";
        break;
        case 10:
        return "X";
        break;
        case 11:
        return "XI";
        break;
        case 12:
        return "XII";
        break;
        }
    }

    //Long date indo Format
    function longdate_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];
        $bulan = bulan($pecah[1]);

        $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
        $nama_hari = "";
        if($nama=="Sunday") {$nama_hari="Minggu";}
        else if($nama=="Monday") {$nama_hari="Senin";}
        else if($nama=="Tuesday") {$nama_hari="Selasa";}
        else if($nama=="Wednesday") {$nama_hari="Rabu";}
        else if($nama=="Thursday") {$nama_hari="Kamis";}
        else if($nama=="Friday") {$nama_hari="Jumat";}
        else if($nama=="Saturday") {$nama_hari="Sabtu";}
        return $nama_hari.','.$tgl.' '.$bulan.' '.$thn;
    }
    // Tanggal Lahir
    function umur($tgl_lahir)
    {
	
        // ubah ke format Ke Date Time
        $lahir = new DateTime($tgl_lahir);
        $hari_ini = new DateTime();
            
        $diff = $hari_ini->diff($lahir);
            
        // Display
        return $diff->y;
    }

    function tanggallahir($ktp)
    {
        $tanggal_lahir = substr($ktp, 6, 2);
        $bulan_lahir = substr($ktp, 8, 2);
        $tahun_lahir = substr($ktp, 10, 2);

        if (intval($tanggal_lahir) > 40) {
            $date = intval($tanggal_lahir) - 40;
            $hasil = "19".$tahun_lahir."-".$bulan_lahir."-".$date;                              
        } else {
            $date = intval($tanggal_lahir);
            $hasil = "19".$tahun_lahir."-".$bulan_lahir."-".$date;
        }
        return $hasil;
    }

    function jeniskelamin($ktp)
    {
        $tanggal_lahir = substr($ktp, 6, 2);
        if (intval($tanggal_lahir) > 40) {
            $hasil = "2";                             
        } else {
            $hasil = "1";
        }
        return $hasil;
    }

    function spgdate($date)
    {
        $tgl = substr($date, 0, 2);
        $bln = substr($date, 2, 2);
        $tahun = substr($date, 4, 4);
        
        return $tahun."-".$bln."-".$tgl;
    }

    function rupiah($angka)
    {
	
        $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }

    function rupiah_norp($angka)
    {
	
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }

    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " Belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . "Ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
    
    function terbilang($nilai)
    {
        if($nilai<0) {
            $hasil = "Minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }     		
        return $hasil;
    }

    function manipulasiTanggal($tgl,$jumlah=1,$format='days')
    {
        $currentDate = $tgl;
        return date('Y-m-d', strtotime($jumlah.' '.$format, strtotime($currentDate)));
    }

    function selisihTangal($tanggal){
        $tanggal_kpb  = strtotime($tanggal);
        $sekarang    = time(); // Waktu sekarang
        $diff   = $tanggal_kpb - $sekarang;
        return floor($diff / (60 * 60 * 24)); // Umur anda dalam hitungan hari
    }

    function selisihHari($tanggal){
        $tanggal_awal  = strtotime($tanggal);
        $sekarang    = time(); // Waktu sekarang
        $diff   = $sekarang - $tanggal_awal;
        return floor($diff / (60 * 60 * 24)); // Umur anda dalam hitungan hari
    }

?>

