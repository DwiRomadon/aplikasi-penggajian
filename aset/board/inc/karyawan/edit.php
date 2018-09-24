 <?php
$id = @$_GET['id'];
 $sql = mysql_query("SELECT * FROM karyawan where NIK='$id'");
  while ($te=mysql_fetch_array($sql))
  {
  ?>

<div class="container">
<h1>Form Input Data Karyawan</h1>
<div class="col-md-8">
<form action="" method="post">
	<table class="table" width="60%">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" class="form-control" value="<?=$te['nama_karyawan']  ?>"></td>
		</tr>
		<tr>
			<td>Pendidikan Terakhir</td>
			<td>:</td>
			<td>
				<input name="pendidikan_terakhir" type="radio" value="D3" <?php if($te['pendidikan_terakhir'] =='D3'){echo 'checked';}?>/> D3 
				<input name="pendidikan_terakhir" type="radio" value="SMA" <?php if($te['pendidikan_terakhir'] =='SMA'){echo 'checked';}?>/> SMA 
				<input name="pendidikan_terakhir" type="radio" value="S1" <?php if($te['pendidikan_terakhir'] =='S1'){echo 'checked';}?>/> S1 
				<input type="radio" name="pendidikan_terakhir" value="S2" <?php if($te['pendidikan_terakhir'] =='S2'){echo 'checked';}?>/> S2
				
			</td>
		</tr>
		
		<tr>
			<td>Status Karyawan</td>
			<td>:</td>
			<td>
				<input name="status_karyawan" type="radio" value="Tetap" <?php if($te['status_karyawan'] =='Tetap'){echo 'checked';}?>> Tetap
				<input type="radio" value="Kontrak" name="status_karyawan" <?php if($te['status_karyawan'] =='Kontrak'){echo 'checked';}?>> Kontrak
				<input type="radio" value="Magang" name="status_karyawan" <?php if($te['status_karyawan'] =='Magang'){echo 'checked';}?>> Magang
			</td>
		</tr>
		<tr>
			<td>Unit Kerja</td>
			<td>:</td>
			<td>
				<input type="radio" value="BAA" name="unit_kerja" <?php if($te['unit_kerja'] =='BAA'){echo 'checked';}?>> BAA<br>
				<input type="radio" value="BAK" name="unit_kerja" <?php if($te['unit_kerja'] =='BAK'){echo 'checked';}?>> BAK<br>
				<input type="radio" value="BAU" name="unit_kerja" <?php if($te['unit_kerja'] =='BAU'){echo 'checked';}?>> BAU<br>
				<input type="radio" value="BPPSDM" name="unit_kerja" <?php if($te['unit_kerja'] =='BPPSDM'){echo 'checked';}?>> Biro Pembinaan dan Pengembangan SDM<br>
				<input type="radio" value="BKHA" name="unit_kerja" <?php if($te['unit_kerja'] =='BKHA'){echo 'checked';}?>  > Biro Kemahasiswaan dan Hubungan Alumni<br>
				<input type="radio" value="BHMK" name="unit_kerja" <?php if($te['unit_kerja'] =='BHMK'){echo 'checked';}?>> Biro Humas, Marketing dan Kerjasama<br>
				<input type="radio" value="LSPM" name="unit_kerja" <?php if($te['unit_kerja'] =='LSPM'){echo 'checked';}?>> Lembaga Sistem Penjamin Mutu<br>
				<input type="radio" value="UPT" name="unit_kerja" <?php if($te['unit_kerja'] =='UPT'){echo 'checked';}?>> Unit Pelaksana Teknis<br>
				<input type="radio" value="LPPM" name="unit_kerja" <?php if($te['unit_kerja'] =='LPPM'){echo 'checked';}?>> Lembaga Penelitian dan Pengabdian kepada Masyarakat<br>
					
				<input type="radio" value="Laboratorium" name="unit_kerja" <?php if($te['unit_kerja'] =='Laboratorium'){echo 'checked';}?>> Laboratorium<br>
					
				<input type="radio" value="Fakultas" name="unit_kerja" <?php if($te['unit_kerja'] =='Fakultas'){echo 'checked';}?>> Fakultas<br>
					
				<input type="radio" value="Pascasarjana" name="unit_kerja" <?php if($te['unit_kerja'] =='Pascasarjana'){echo 'checked';}?>> Pascasarjana<br>
				<input type="radio" value="lainnya" name="unit_kerja" <?php if($te['unit_kerja'] =='lainnya'){echo 'checked';}?>> Lainnya<br>
			</td>
		</tr>
		<tr>
					<td colspan="3"><center><input type="submit" name="edit" class="btn btn-primary" value="Edit"></center>
			</td>
		</tr>
	</table>
	<?php
	$id = @$_GET['id'];
		$nama = @$_POST['nama'];
		$p = @$_POST['pendidikan_terakhir'];
		$s =@$_POST['status_karyawan'];
		$unit =@$_POST['unit_kerja'];

		$edit_karyawan = @$_POST['edit'];
		if($edit_karyawan)
			{
				if($nama=="")
				{
					?>
					<script type="text/javascript">
					alert("input tidak boleh ada yang kosong");
					</script>
					<?php
				}
				else
				{

					
						mysql_query("update karyawan set nama_karyawan='$nama',
							pendidikan_terakhir='$p',
							status_karyawan='$s',
							unit_kerja='$unit'
							where NIK='$id'")or die(mysql_error());
						?>
							<script type="text/javascript">
							alert("data anda berhasil diedit");
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


  <?php } ?>