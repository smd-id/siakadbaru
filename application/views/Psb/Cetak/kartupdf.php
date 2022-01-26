
<?php

ob_start();
$pdf = new Pdf('P', 'in', 'A4', true, 'UTF-8', false);
$pdf->SetTitle($title.'-'.$output->checksum);
$pdf->SetTopMargin(2);
$pdf->setFooterMargin(2);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set font
$pdf->SetFont('helvetica', '', 10, '', true);

$pdf->SetAuthor('Ruhul Islam Anak Bangsa');

if ($output->jalur == "reguler"){
    $cat = "<b>".$output->ruang_cat."</b> - Pukul : ".$output->sesi_cat;
} elseif ($output->jalur == "undangan") {
    $cat = "<b>Tidak Ada Ujian Komputer</b>";
}

// Lembar Kartu ujian
$pdf->AddPage();
// set JPEG quality
$pdf->setJPEGQuality(75);

$header = '<p><img src="'.$assetsurl.'images/header-kartu.jpg"></img></p>';
$pdf->writeHTML($header, true, false, false, false, '');
$pdf->Image($filesurl.'pasphoto/'.$output->pasphoto, 172, 30, 28, '', '', '', '', false, 300);
$body = '
     <table width="100%">
          <tbody>
               <tr>
                    <td width="160">Asal Sekolah</td>
                    <td>: '.$output->asal_sekolah.'</td>
                    
               </tr>
               <tr>
                    <td width="160">Asal Daerah</td>
                    <td>: '.what_kabupaten($output->kabupaten).'</td>
                    
               </tr>
               <br />
               <tr>
                    <td width="160"><strong>NOMOR UJIAN</strong></td>
                    <td><strong>: '.$output->no_ujian.'</strong></td>
               </tr>
               <tr>
                    <td width="160">Nama</td>
                    <td>: '.$output->nama.'</td>
               </tr>
               <tr>
                    <td width="160">Tempat/Tanggal Lahir</td>
                    <td>: '.$output->tempat_lahir.', '.date_indo($output->tanggal_lahir).'</td>
               </tr>
               <tr>
                    <td width="160">Jenis Kelamin</td>
                    <td>: '.jenis_kelamin($output->jenis_kelamin).'</td>
               </tr>
               <tr>
                    <td width="160">Pilihan Jurusan</td>
                    <td>: '.jurusan($output->jurusan).'</td>
               </tr>
                    
                    <p><strong>Waktu dan Tempat Pelaksanaan Ujian</strong></p>
               
               <tr>
                    <td width="160">Hari/Tanggal Ujian</td>
                    <td>: '.longdate_indo($output->jadwal_ujian).'</td>                
               </tr>
               <tr>
                    <td width="160">Lokasi</td>
                    <td>: Dayah Ruhul Islam Anak Bangsa</td>
               </tr>
               <tr>
                    <td width="160">Ruang Ujian Komputer</td>
                    <td>: '.$cat.'</td>
               </tr>
               <tr>
                    <td width="160">Ruang Ujian Lisan (Wawancara)</td>
                    <td>: <b>'.$output->ruang_lisan.'</b> - Pukul : '.$output->sesi_lisan.'</td>
               </tr>
               <tr>
                    <td width="160"><b>Wawancara Orang Tua</b></td>
                    <td>: <b>Di Tentukan Panitia</b> - Pukul : '.$output->sesi_cat.'</td>
               </tr>
          </tbody>
     </table>
';
$pdf->writeHTML($body, true, false, true, false, '');
$pdf->StartTransform();
$pdf->Rotate(10, 70, 100);
$pdf->Image($assetsurl.'images/ttd.png', 117, 152, 55, '', '', '', '', false, 300);
$pdf->StopTransform();
$tanda_tangan = '
    <table width="100%">
        <tr>
            <td align="center">Wawancara</td>
            <td align="center">Ibadah</td>
            <td align="center">Baca Al-Quran</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td align="center">____________________</td>
            <td align="center">____________________</td>
            <td align="center">____________________</td>
        </tr>
        
     </table>
     <p></p>
     <table>
            <tr>
                <td></td>
                <td></td> 
                <td>
                    <br/>
                    Aceh Besar, '.date_indo(date('Y-m-d', strtotime($output->tanggal_daftar))).'
                    <br/>
                    Ketua Panitia
                    <br />
                    <br />
                    <br />
                    <br />
                    <u><b>'.$ketua_panitia.'</b></u>
                </td>               
            </tr>         
     </table>
     <br />
     <br />
     <p style="border: 1px solid black;"><b> Mekanisme calon santri yang akan mengikuti tes :</b>
     <ol>
          <li>Calon santri wajib hadir 20 menit sebelum jadwal tes dilaksanakan</li>
          <li>Calon santri harap membawa:
            <ul>
                <li>Raport Asli</li>
                <li>Sertifikat Asli (Jika Ada)</li>
                <li>Surat Keterangan (SK) Peringkat (Jika Ada)</li>
            </ul>
          </li>
          <li>Demi menghindari kerumunan masa, wali santri dilarang duduk berkelompok dan menciptakan kerumunan.</li>
          <li>Calon santri dan wali santri wajib berpakaian rapi :
            <ul>
                <li>Putra : Celana Kain, Kemeja/koko/batik dan peci</li>
                <li>Putri : Gamis atau Rok longgar, Baju minimal selutut, Jilbab Syar`i</li>
            </ul>
          </li>
     </ol>
     </p>
';
$pdf->writeHTML($tanda_tangan, true, false, false, false, '');
$pdf->endPage();

// Lembar Formulir
$pdf->AddPage();
// set JPEG quality
$pdf->setJPEGQuality(75);
$header = '<p><img src="'.$assetsurl.'images/header-formulir.jpg"></img></p>';
$pdf->writeHTML($header, true, false, false, false, '');
$pdf->Image($filesurl.'pasphoto/'.$output->pasphoto, 172, 30, 28, '', '', '', '', false, 300);
$formulir = '   
    
    <h3 align="center" style="line-height: 1.1em;">'.$output->no_ujian.'</h3>
    <h4 align="center" style="line-height: 1.1em;">'.jurusan($output->jurusan).'</h4>

    <table cellpadding="1">
        <br />
        <tr>
            <td width="50mm">1. Nama</td>
            <td width="2mm">:</td>
            <td width="90mm"><b>'.$output->nama.'</b></td>
        </tr>
        <tr>
            <td>2. NISN</td>
            <td>:</td>
            <td>'.$output->nisn.'</td>
        </tr>
        <tr>
            <td>3. NIK (KTP)</td>
            <td>:</td>
            <td>'.$output->nik.'</td>
        </tr>
        <tr>
            <td>4. Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>'.$output->tempat_lahir.', '.date_indo($output->tanggal_lahir).'</td>
        </tr>
        <tr>
            <td>5. Jenis Kelamin</td>
            <td>:</td>
            <td>'.jenis_kelamin($output->jenis_kelamin).'</td>
        </tr>
        <tr>
            <td>6. Anak Ke / Dari Saudara</td>
            <td>:</td>
            <td>'.'Anak Ke '.$output->anak_ke.' Dari '.$output->dari_saudara.' Bersaudara'.'</td>
        </tr>
        <tr>
            <td>7. Hobi</td>
            <td>:</td>
            <td>'.$output->hobi.'</td>
        </tr>
        <tr>
            <td>8. Cita Cita</td>
            <td>:</td>
            <td>'.$output->cita_cita.'</td>
        </tr>
        <tr>
            <td>9. Alamat </td>
            <td>:</td>
            <td width="160">'.$output->alamat.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Desa</td>
            <td width="2mm">:</td>
            <td width="90mm">'.what_desa($output->desa).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kecamatan</td>
            <td width="2mm">:</td>
            <td width="90mm">'.what_kecamatan($output->kecamatan).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kabupaten</td>
            <td width="2mm">:</td>
            <td width="90mm">'.what_kabupaten($output->kabupaten).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Provinsi</td>
            <td width="2mm">:</td>
            <td width="90mm">'.what_provinsi($output->provinsi).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kode Pos</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->kode_pos.'</td>
        </tr>
        <br />
        <tr>
            <td>10. Data Asal Sekolah</td>
            <td>:</td>
            <td width="160mm">'.$output->asal_sekolah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">NPSN</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->npsn_sekolah_asal.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Alamat</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->alamat_sekolah_asal.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Kategori</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->jenis_sekolah_asal.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Tahun Lulus</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->tahun_lulus.'</td>
        </tr>
        <br />
        <tr>
            <td>11. Nama Orang Tua</td>
            <td>:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->nama_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->nama_ibu.'</td>
        </tr>
        <br />
        <tr>
            <td>12. Pekerjaan Orang Tua</td>
            <td>:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->pekerjaan_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->pekerjaan_ibu.'</td>
        </tr>
        <br />
        <tr>
            <td>13. Penghasilan Orang Tua</td>
            <td>:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->penghasilan_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->penghasilan_ibu.'</td>
        </tr>
        <br />
        <tr>
            <td>14. Pendidikan Orang Tua</td>
            <td>:</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->pendidikan_ayah.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->pendidikan_ibu.'</td>
        </tr>
        <br />
        <tr>
            <td>15. Data Wali Santri</td>
            <td>:</td>
            <td width="28mm">Nama</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->nama_wali.'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Status</td>
            <td width="2mm">:</td>
            <td width="90mm">'.$output->status_wali.'</td>
        </tr>
        <br />
        <tr>
            <td>16. No Telp / Email </td>
            <td>:</td>
            <td width="28mm">Peserta</td>
            <td width="2mm">:</td>
            <td width="90mm">'.preg_replace("/^62/", "0", $output->no_telepon).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Email</td>
            <td width="2mm">:</td>
            <td width="90mm">'.preg_replace("/^62/", "0", $output->email).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ayah</td>
            <td width="2mm">:</td>
            <td width="90mm">'.preg_replace("/^62/", "0", $output->no_telepon_ayah).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Ibu</td>
            <td width="2mm">:</td>
            <td width="90mm">'.preg_replace("/^62/", "0", $output->no_telepon_ibu).'</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="28mm">Wali</td>
            <td width="2mm">:</td>
            <td width="90mm">'.preg_replace("/^62/", "0", $output->no_telepon_wali).'</td>
        </tr>
    </table>
<br />
';
$pdf->writeHTML($formulir, true, false, false, false, '');
$tandatangan = '
    
    <table>
        <tbody>
        <tr>
            <td>
                &nbsp;
            </td>
            <td width="90mm" align="center">
                Aceh Besar, '.date_indo(date('Y-m-d', strtotime($output->tanggal_daftar))).'<br / />
                <br />
                <br />
                <br />
                ( '.$output->nama.' )
            </td>
        </tr>
        </tbody>
    </table>
';
$pdf->writeHTML($tandatangan, true, false, true, false, '');
$pdf->endPage();
 
$pdf->Output('PSB-RIAB-'.$output->no_ujian.'.pdf', 'I');
exit;
?>