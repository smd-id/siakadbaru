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
				<td colspan="42"><h3>Data Peserta PSB 2022</h3></td>
				<td colspan="6"><h3>Data Ruangan & Jadwal</h3></td>
			</tr>
			<tr>
                <td>No</td>
                <td>No Ujian</td>
                <td>NIK</td>
                <td>NISN</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>TTL</td>
                <td>Email</td>
                <td>NO Telepon</td>
                <td>Anak KE</td>
                <td>Dari Saudara</td>
                <td>Hobi</td>
                <td>Cita Cita</td>
                <td>Alamat</td>
                <td>Desa</td>
                <td>Kecamatan</td>
                <td>Kabupaten</td>
                <td>Provinsi</td>
                <td>Kode Pos</td>
                <td>Asal Sekolah</td>
                <td>Alamat Asal Sekolah</td>
                <td>Kode NPSN</td>
                <td>Tahun Lulus</td>
                <td>Status AyaH</td>
                <td>Nama Ayah</td>
                <td>Pekerjaan Ayah</td>
                <td>Penghasilan Ayah</td>
                <td>NO Telepon Ayah</td>
				<td>Status Ibu</td>
                <td>Nama Ibu</td>
                <td>Pekerjaan Ibu</td>
                <td>Penghasilan Ibu</td>
                <td>NO Telepon Ibu</td>
                <td>Nama Wali</td>
                <td>Hubungan Wali</td>
                <td>NO Telepon Wali</td>
                <td>Prestasi 1</td>
                <td>Prestasi 2</td>
                <td>Prestasi 3</td>
                <td>Prestasi 4</td>
                <td>Prestasi 5</td>
                <td>Tanggal Daftar</td>
                <td>Jadwal Ujian</td>
                <td>Ruang CAT</td>
                <td>Sesi CAT</td>
                <td>Ruang Lisan</td>
                <td>Sesi Lisan</td>
                <td>Jurusan Pilihan</td>
            </tr>
		</thead>
		<tbody>
	
		<?php $i = 1; ?>
		<?php foreach ($result as $key): ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $key->no_ujian; ?></td>
				<td>'<?= $key->nik; ?></td>
				<td><?= $key->nisn; ?></td>
				<td><?= $key->nama; ?></td>
				<td><?= $key->jenis_kelamin; ?></td>
				<td><?= $key->tempat_lahir; ?>, <?= $key->tanggal_lahir; ?></td>
				<td><?= $key->email; ?></td>
				<td>'<?= $key->no_telepon; ?></td>
				<td><?= $key->anak_ke; ?></td>
				<td><?= $key->dari_saudara; ?></td>
				<td><?= $key->hobi; ?></td>
				<td><?= $key->cita_cita; ?></td>
				<td><?= $key->alamat; ?></td>
				<td><?= what_desa($key->desa); ?></td>
				<td><?= what_kecamatan($key->kecamatan); ?></td>
				<td><?= what_kabupaten($key->kabupaten); ?></td>
				<td><?= what_provinsi($key->provinsi); ?></td>
				<td><?= $key->kode_pos; ?></td>
				<td><?= $key->asal_sekolah; ?></td>
				<td><?= $key->alamat_sekolah_asal; ?></td>
				<td><?= $key->npsn_sekolah_asal; ?></td>
				<td><?= $key->tahun_lulus; ?></td>
				<td><?= $key->status_ayah; ?></td>
				<td><?= $key->nama_ayah; ?></td>
				<td><?= $key->pekerjaan_ayah; ?></td>
				<td><?= $key->penghasilan_ayah; ?></td>
				<td>'<?= $key->no_telepon_ayah; ?></td>
				<td><?= $key->status_ibu; ?></td>
				<td><?= $key->nama_ibu; ?></td>
				<td><?= $key->pekerjaan_ibu; ?></td>
				<td><?= $key->penghasilan_ibu; ?></td>
				<td>'<?= $key->no_telepon_ibu; ?></td>
				<td><?= $key->nama_wali; ?></td>
				<td><?= $key->status_wali; ?></td>
				<td>'<?= $key->no_telepon_wali; ?></td>
				<td><?= $key->prestasi_1; ?></td>
				<td><?= $key->prestasi_2; ?></td>
				<td><?= $key->prestasi_3; ?></td>
				<td><?= $key->prestasi_4; ?></td>
				<td><?= $key->prestasi_5; ?></td>
				<td><?= $key->tanggal_daftar; ?></td>
				<td><?= date_indo($key->jadwal_ujian); ?></td>
				<td><?= $key->ruang_cat; ?></td>
				<td><?= $key->sesi_cat; ?></td>
				<td><?= $key->ruang_lisan; ?></td>
				<td><?= $key->sesi_lisan; ?></td>
				<td><?= jurusan_singkat($key->jurusan); ?></td>
			</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
</html>