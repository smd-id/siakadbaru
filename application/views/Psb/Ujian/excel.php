<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
?>

<html>
	<link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.css'); ?>">
	<style>
		table {
			border-collapse: collapse;
			border: 1px solid black;
		} 
	
		th,td {
			border: 1px solid black;
			text-align: center; 
    		vertical-align: middle;
		}
	
		table.c {
			table-layout: auto;
			width: 700%;  
		}
	</style>
	
	
	<table class="table table-striped c">
		<thead>
			<tr>
				<td colspan="39"><h3>BLANKO WAWANCARA PSB 2021</h3></td>
			</tr>
			<tr>
				<td rowspan="3">NO</td>
				<td rowspan="3">NO UJIAN</td>
				<td rowspan="3">NIK</td>
				<td rowspan="3">NAMA LENGKAP</td>
				<td rowspan="3">JENIS KELAMIN</td>
				<td rowspan="3">JURUSAN</td>
				<td rowspan="3">DOMISILI</td>
				<td colspan="5">TES BACAAN AL-QURAN</td>
				<td colspan="5">TES PRAKTIK IBADAH DAN QIRAATUL KUTUB</td>
				<td colspan="16">TES SELEKSI INTERVIEW</td>
				<td colspan="3">REKOMENDASI</td>
				<td colspan="3">KETERANGAN TAMBAHAN LAINNYA</td>
			</tr>
			<tr>
				<td rowspan="2">KHATA' JALI</td>
				<td rowspan="2">KHATA' KHAFI</td>
				<td rowspan="2">TOTAL SKOR</td>
				<td rowspan="2">JUMLAH HAFALAN</td>
				<td rowspan="2">KUALITAS HAFALAN</td>
				<td rowspan="2">BACAAN SHALAT</td>
				<td rowspan="2">DOA SEHARI-HARI</td>
				<td rowspan="2">SHALAT JENAZAH</td>
				<td rowspan="2">NIAT-NIAT</td>
				<td rowspan="2">QIRAATUL KUTUB</td>
				<td colspan="2">PRESTASI</td>
				<td colspan="2">PENGUASAAN BAHASA ASING</td>
				<td rowspan="2">INFORMASI MASUK RIAB</td>
				<td rowspan="2">ALASAN MASUK RIAB</td>
				<td rowspan="2">PENYAKIT</td>
				<td rowspan="2">MEROKOK</td>
				<td rowspan="2">PACARAN</td>
				<td rowspan="2">PENGGUNAAN HP</td>
				<td rowspan="2">PELANGGARAN YANG PERNAH DILAKUKAN</td>
				<td rowspan="2">GURU YANG TIDAK DISUKAI</td>
				<td rowspan="2">PELAJARAN DISUKAI</td>
				<td rowspan="2">PELAJARAN YANG TIDAK DISUKAI</td>
				<td rowspan="2">CITA-CITA</td>
				<td rowspan="2">ALASAN MEMILIH JURUSAN</td>
				<td rowspan="2">TES BACA AL-QUR'AN</td>
				<td rowspan="2">TES PRAKTIK IBADAH</td>
				<td rowspan="2">INTERWIEW</td>
				<td rowspan="2">TES BACA AL-QUR'AN</td>
				<td rowspan="2">TES PRAKTIK IBADAH</td>
				<td rowspan="2">INTERWIEW</td>
			</tr>
			<tr>
				<td>AKADEMIK</td>
				<td>NON AKADEMIK</td>
				<td>B. INGGRIS</td>
				<td>B. ARAB</td>
			</tr>
		</thead>
		<tbody>
	
		<?php $i = 1; ?>
		<?php foreach ($result as $key): ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $key->no_ujian; ?></td>
				<td><?= $key->nik; ?></td>
				<td><?= $key->nama; ?></td>
				<td><?= jenis_kelamin($key->jenis_kelamin); ?></td>
				<td><?= jurusan($key->jurusan); ?></td>
				<td><?= what_kabupaten($key->kabupaten); ?></td>
				<td><?= $key->khatak_jali; ?></td>
				<td><?= $key->khatak_kafi; ?></td>
				<td><?= 50 - ($key->khatak_jali + $key->khatak_kafi); ?></td>
				<td><?= $key->jumlah_hafalan; ?></td>
				<td><?= baik_or_no($key->kualitas_hafalan); ?></td>
				<td><?= baik_or_no($key->bacaan_sholat); ?></td>
				<td><?= baik_or_no($key->doa_seharihari); ?></td>
				<td><?= baik_or_no($key->sholat_jenazah); ?></td>
				<td><?= baik_or_no($key->niat_niat); ?></td>
				<td><?= baik_or_no($key->qiraatul_kutub); ?></td>
				<td><?= $key->prestasi_akademik; ?></td>
				<td><?= $key->prestasi_non_akademik; ?></td>
				<td><?= baik_or_no($key->bahasa_inggris); ?></td>
				<td><?= baik_or_no($key->bahasa_arab); ?></td>
				<td><?= $key->info_masuk; ?></td>
				<td><?= $key->alasan_masuk; ?></td>
				<td><?= $key->riwayat_penyakit; ?></td>
				<td><?= pernah_or_no($key->merokok); ?></td>
				<td><?= pernah_or_no($key->pacaran); ?></td>
				<td><?= $key->penggunaan_hp; ?></td>
				<td><?= $key->pelanggaran; ?></td>
				<td><?= $key->guru_tidak_suka; ?></td>
				<td><?= $key->pelajaran_suka; ?></td>
				<td><?= $key->pelajaran_tidak_suka; ?></td>
				<td><?= $key->cita_cita; ?></td>
				<td><?= $key->alasan_memilih_jurusan; ?></td>
				<td><?= rekom_or_no($key->rekomendasi_hafalan); ?></td>
				<td><?= rekom_or_no($key->rekomendasi_ibadah); ?></td>
				<td><?= rekom_or_no($key->rekomendasi_interview); ?></td>
				<td><?= $key->keterangan_hafalan; ?></td>
				<td><?= $key->keterangan_ibadah; ?></td>
				<td><?= $key->keterangan_interview; ?></td>
			</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
</html>