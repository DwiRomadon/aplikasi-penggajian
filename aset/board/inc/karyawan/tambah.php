

<div class="container">
<h1>Form Input Data Karyawan</h1>
<div class="col-md-8">
<form action="" method="post">
	<table class="table" width="60%">
		
		<tr>
			<th>NIK</th>
			<th>:</th>
			<th><input type="text" name="NIK" class="form-control"></th>
		</tr>
		<tr>
			<th>Nama</th>
			<th>:</th>
			<th><input type="text" name="nama" class="form-control"></th>
		</tr>
		<tr>
			<td>Pendidikan Terakhir</td>
			<td>:</td>
			<td>
				<input type="radio" value="D3" name="pendidikan_terakhir"> D3
				<input type="radio" value="SMA" name="pendidikan_terakhir"> SMA
				<input type="radio" value="S1" name="pendidikan_terakhir"> S1
				<input type="radio" value="S2" name="pendidikan_terakhir"> S2
			</td>
		</tr>
		<tr>
			<td>Status Karyawan</td>
			<td>:</td>
			<td>
				<input type="radio" value="Tetap" name="status_karyawan"> Tetap
				<input type="radio" value="Kontrak" name="status_karyawan"> Kontrak
				<input type="radio" value="Magang" name="status_karyawan"> Magang
			</td>
		</tr>
		<tr>
			<td>Tanggal Masuk UBL</td>
			<td>:</td>
			<td><input type="date" name="tanggal_masuk"></td>
		</tr>
		<tr>
			<td>Unit Kerja</td>
			<td>:</td>
			<td>
				<input type="radio" value="BAA" name="unit_kerja" > BAA<br>
				<input type="radio" value="BAK" name="unit_kerja"> BAK<br>
				<input type="radio" value="BAU" name="unit_kerja"> BAU<br>
				<input type="radio" value="BPPSDM" name="unit_kerja"> Biro Pembinaan dan Pengembangan SDM<br>
				<input type="radio" value="BAKH" name="unit_kerja" > Biro Kemahasiswaan dan Hubungan Alumni<br>
				<input type="radio" value="BHMK" name="unit_kerja"> Biro Humas, Marketing dan Kerjasama<br>
				<input type="radio" value="LSPM" name="unit_kerja"> Lembaga Sistem Penjamin Mutu<br>
				<input type="radio" value="UPT" name="unit_kerja"> Unit Pelaksana Teknis<br>
				<input type="radio" value="LPPM" name="unit_kerja"> Lembaga Penelitian dan Pengabdian kepada Masyarakat<br>
				<input type="radio" value="Laboratorium" name="unit_kerja"> Laboratorium<br>
				<input type="radio" value="Fakultas" name="unit_kerja"> Fakultas<br>
				<input type="radio" value="Pascasarjana" name="unit_kerja"> Pascasarjana<br>
				<input type="radio" value="lainnya" name="unit_kerja"> lainnya<br>
			</td>
		</tr>
		<tr>
				<td colspan="2">
					<td><input type="submit" name="tambah" class="btn btn-primary" value="Tambah"></td>
			</td>
		</tr>
	</table>
	<?php 
	$nik=@$_POST['NIK'];
	$nama=@$_POST['nama'];
	$pendidikan_terakhir=@$_POST['pendidikan_terakhir'];
	$status=@$_POST['status_karyawan'];
	$tanggal=@$_POST['tanggal_masuk'];
	$unit=@$_POST['unit_kerja'];

	$tambah = @$_POST['tambah'];
	 if($tambah)
		{
				if($nama==""  || $pendidikan_terakhir==""  || $status=="" || $tanggal=="" )
				{
					?>
					<script type="text/javascript">
					alert("input tidak boleh ada yang kosong");
					</script>
					<?php
				}
				else
				{
					
						mysql_query("insert into karyawan (NIK,nama_karyawan,pendidikan_terakhir,status_karyawan,tanggal_masuk_ubl,unit_kerja) values 
    ('$nik','$nama','$pendidikan_terakhir','$status','$tanggal','$unit')") or die(mysql_error());
						?>
						<script type="text/javascript">
						alert("data berhasil ditambahkan");
						window.location.href="?page=karyawan";
						</script>
						<?php
					
				}
	    }
	 ?>
</form>
</div>
<div class="col-md-4">
</div>
</div>