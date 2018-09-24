<hr>
<h3>Tampilkan data berdasarkan</h3>
<hr>
<div class="col-md-7">
<form action="index.php?page=dosen&action=cari_tabel"  method="post">
	<div class="col-md-8">
				<input type="checkbox" name="kontrakCat">
				<select name="kontrak">
					<option value="">-status kontrak-</option>
					<?php
					$sql = mysql_query("select * from dosen group by status_kontrak");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['status_kontrak'] ?>"><?php echo $novan['status_kontrak'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="jjaCat">
				<select name="jja">
					<option value="">-JJA-</option>
					<?php
					$sql = mysql_query("select * from dosen group by JJA");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['JJA'] ?>"><?php echo $novan['JJA'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="golCat">
				<select name="golongan">
					<option value="">-Golongan-</option>
					<?php
					$sql = mysql_query("select * from dosen group by golongan");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['golongan'] ?>"><?php echo $novan['golongan'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				

				<input type="checkbox" name="tugas_tambahanCat">
				<select name="tugas">
					<option value="">-Tugas Tambahan-</option>
					<?php
					$sql = mysql_query("select * from dosen group by tugas_tambahan");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['tugas_tambahan'] ?>"><?php echo $novan['tugas_tambahan'] ?></option> <?php
					}
					 ?>
					
				</select>
			
				<br>
				<input type="checkbox" name="fakultasCat">
				<select name="fakultas">
					<option value="">-Fakultas-</option>
					<?php
					$sql = mysql_query("select * from dosen group by fakultas");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['fakultas'] ?>"><?php echo $novan['fakultas'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="prodiCat">
				<select name="prodi">
					<option value="">-Prodi-</option>
					<?php
					$sql = mysql_query("select * from dosen group by prodi");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['prodi'] ?>"><?php echo $novan['prodi'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="ijinCat">
				<select name="ijin_belajar">
					<option value="">-Ijin Belajar-</option>
					<?php
					$sql = mysql_query("select * from dosen group by ijin_belajar");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['ijin_belajar'] ?>"><?php echo $novan['ijin_belajar'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="pendidikanCat">
				<select name="pendidikan_terakhir">
					<option value="">-Pendidikan terakhir-</option>
					<?php
					$sql = mysql_query("select * from dosen group by pendidikan_terakhir");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['pendidikan_terakhir'] ?>"><?php echo $novan['pendidikan_terakhir'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="tempatCat">
				<select name="tempat_pendidikan">
					<option value="">-Tempat Pendidikan-</option>
					<?php
					$sql = mysql_query("select * from dosen group by tempat_pendidikan");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['tempat_pendidikan'] ?>"><?php echo $novan['tempat_pendidikan'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="sumberCat">
				<select name="sumber_dana">
					<option value="">-Sumber dana-</option>
					<?php
					$sql = mysql_query("select * from dosen group by sumber_dana");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['sumber_dana'] ?>"><?php echo $novan['sumber_dana'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="sertifikasiCat">
				<select name="sertifikasi">
					<option value="">-Sertifikasi-</option>
					<?php
					$sql = mysql_query("select * from dosen group by sertifikasi_dosen");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['sertifikasi_dosen'] ?>"><?php echo $novan['sertifikasi_dosen'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="statusCat">
				<select name="status_dosen">
					<option value="">-Status dosen-</option>
					<?php
					$sql = mysql_query("select * from dosen group by status_dosen");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['status_dosen'] ?>"><?php echo $novan['status_dosen'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="belajarCat">
				<select name="tugas_belajar">
					<option value="">-Tugas Belajar-</option>
					<?php
					$sql = mysql_query("select * from dosen group by tugas_belajar");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['tugas_belajar'] ?>"><?php echo $novan['tugas_belajar'] ?></option> <?php
					}
					 ?>
					
				</select>
		
	<div class="col-md-12">
			<input type="submit" value="Tampilkan data" class="btn btn-primary">
	</div>
	
	<input type="hidden" name="page" value="<?=@$_GET['page'];?>">
	<input type="hidden" name="action" value="cari_tabel">
</div>
</form>

</div>
<div class="col-md-5">




<form action="inc/dosen/mod_laporan/download_cari_dosen.php"  method="GET" target="_blank">
	
				<input type="checkbox" name="kontrakCat">
				<select name="kontrak">
					<option value="">-status kontrak-</option>
					<?php
					$sql = mysql_query("select * from dosen group by status_kontrak");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['status_kontrak'] ?>"><?php echo $novan['status_kontrak'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="jjaCat">
				<select name="jja">
					<option value="">-JJA-</option>
					<?php
					$sql = mysql_query("select * from dosen group by JJA");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['JJA'] ?>"><?php echo $novan['JJA'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="golCat">
				<select name="golongan">
					<option value="">-Golongan-</option>
					<?php
					$sql = mysql_query("select * from dosen group by golongan");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['golongan'] ?>"><?php echo $novan['golongan'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="tugas_tambahanCat">
				<select name="tugas">
					<option value="">-Tugas Tambahan-</option>
					<?php
					$sql = mysql_query("select * from dosen group by tugas_tambahan");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['tugas_tambahan'] ?>"><?php echo $novan['tugas_tambahan'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="fakultasCat">
				<select name="fakultas">
					<option value="">-Fakultas-</option>
					<?php
					$sql = mysql_query("select * from dosen group by fakultas");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['fakultas'] ?>"><?php echo $novan['fakultas'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="prodiCat">
				<select name="prodi">
					<option value="">-Prodi-</option>
					<?php
					$sql = mysql_query("select * from dosen group by prodi");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['prodi'] ?>"><?php echo $novan['prodi'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="ijinCat">
				<select name="ijin_belajar">
					<option value="">-Ijin Belajar-</option>
					<?php
					$sql = mysql_query("select * from dosen group by ijin_belajar");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['ijin_belajar'] ?>"><?php echo $novan['ijin_belajar'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="pendidikanCat">
				<select name="pendidikan_terakhir">
					<option value="">-Pendidikan terakhir-</option>
					<?php
					$sql = mysql_query("select * from dosen group by pendidikan_terakhir");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['pendidikan_terakhir'] ?>"><?php echo $novan['pendidikan_terakhir'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="tempatCat">
				<select name="tempat_pendidikan">
					<option value="">-Tempat Pendidikan-</option>
					<?php
					$sql = mysql_query("select * from dosen group by tempat_pendidikan");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['tempat_pendidikan'] ?>"><?php echo $novan['tempat_pendidikan'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="sumberCat">
				<select name="sumber_dana">
					<option value="">-Sumber dana-</option>
					<?php
					$sql = mysql_query("select * from dosen group by sumber_dana");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['sumber_dana'] ?>"><?php echo $novan['sumber_dana'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="sertifikasiCat">
				<select name="sertifikasi">
					<option value="">-Sertifikasi-</option>
					<?php
					$sql = mysql_query("select * from dosen group by sertifikasi_dosen");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['sertifikasi_dosen'] ?>"><?php echo $novan['sertifikasi_dosen'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="statusCat">
				<select name="status_dosen">
					<option value="">-Status dosen-</option>
					<?php
					$sql = mysql_query("select * from dosen group by status_dosen");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['status_dosen'] ?>"><?php echo $novan['status_dosen'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
				<input type="checkbox" name="belajarCat">
				<select name="tugas_belajar">
					<option value="">-Tugas Belajar-</option>
					<?php
					$sql = mysql_query("select * from dosen group by tugas_belajar");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['tugas_belajar'] ?>"><?php echo $novan['tugas_belajar'] ?></option> <?php
					}
					 ?>
					
				</select>
		
		<br>
	
	<input type="submit" name="tampil" class="btn btn-primary" value="Download">
</form>
</div>