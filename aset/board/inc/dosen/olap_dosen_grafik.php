<form action="index.php?page=dosen&action=cari_grafik"  method="get">
	<div class="row">
		<div class="row">
		<div class="col-md-7">
			<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            Silahkan Pilih Kriteria pada Dimention 1 dan 2 
                        </div>
		</div>
		<div class="col-md-5">
		</div>
	</div>
		<div class="col-md-8"><h2>Pencarian Data Berdasarkan</h2>
		</div>
<?php 		$sql = mysql_query("select * from dosen") or die (mysql_error());
      $data = mysql_fetch_array($sql); ?>
		<div class="col-md-6">
			<b>Dimention 1</b><br>
			<input type="radio" value="status_kontrak" name="x">Status Kontrak<br>
			<input type="radio" value="JJA" name="x">JJA<br>
			<input type="radio" value="golongan" name="x">Pangkat / Golongan<br>
			<input type="radio" value="tugas_tambahan" name="x">Tugas Tambahan<br>
			<input type="radio" value="fakultas" name="x">Fakultas<br>
			<input type="radio" value="prodi" name="x">Program Studi<br>
			<input type="radio" value="pendidikan_terakhir" name="x">Pendidikan Terakhir<br>
			<input type="radio" value="tempat_pendidikan" name="x">Tempat Pendidikan Terakhir<br>
			<input type="radio" value="sumber_dana" name="x">Sumber dana<br>
			<input type="radio" value="ijin_belajar" name="x">Ijin Belajar<br>
			<input type="radio" value="sertifikasi_dosen" name="x">Sertifikasi Dosen<br>
			<input type="radio" value="status_dosen" name="x">Status Dosen<br>
			<input type="radio" value="tugas_belajar" name="x">Tugas Belajar<br>
		</div>
		<div class="col-md-6">
			<b>Dimention 2</b><br>
			<input type="radio" value="status_kontrak" name="y">Status Kontrak<br>
			<input type="radio" value="JJA" name="y">JJA<br>
			<input type="radio" value="golongan" name="y">Pangkat / Golongan<br>
			<input type="radio" value="tugas_tambahan" name="y">Tugas Tambahan<br>
			<input type="radio" value="fakultas" name="y">Fakultas<br>
			<input type="radio" value="prodi" name="y">Program Studi<br>
			<input type="radio" value="pendidikan_terakhir" name="y">Pendidikan Terakhir<br>
			<input type="radio" value="tempat_pendidikan" name="y">Tempat Pendidikan Terakhir<br>
			<input type="radio" value="sumber_dana" name="y">Sumber dana<br>
			<input type="radio" value="ijin_belajar" name="y">Ijin Belajar<br>
			<input type="radio" value="sertifikasi_dosen" name="y">Sertifikasi Dosen<br>
			<input type="radio" value="status_dosen" name="y">Status Dosen<br>
			<input type="radio" value="tugas_belajar" name="y">Tugas Belajar<br>
		</div>
		<div class="col-md-12">
			<input type="submit" value="Tampilkan data" class="btn btn-primary">
		</div>
	</div>
	<input type="hidden" name="page" value="<?=@$_GET['page'];?>">
		<input type="hidden" name="action" value="cari_grafik">
</form>