<form action="index.php?page=karyawan&action=cari_tabel"  method="GET">
	<div class="row"><h2>Pencarian Data Berdasarkan</h2>
		<div class="col-md-6">
			<input type="checkbox" name="pendidikanCat">
				<select name="pendidikan">
					<option value="">-Pendidikan Terakhir-</option>
					<?php
					$sql = mysql_query("select * from karyawan group by pendidikan_terakhir");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['pendidikan_terakhir'] ?>"><?php echo $novan['pendidikan_terakhir'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
			<input type="checkbox" name="statusCat">
				<select name="status">
					<option value="">-Status Karyawan-</option>
					<?php
					$sql = mysql_query("select * from karyawan group by status_karyawan");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['status_karyawan'] ?>"><?php echo $novan['status_karyawan'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
			<input type="checkbox" name="unitCat">
				<select name="unit">
					<option value="">-Unit Kerja-</option>
					<?php
					$sql = mysql_query("select * from karyawan group by unit_kerja");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['unit_kerja'] ?>"><?php echo $novan['unit_kerja'] ?></option> <?php
					}
					 ?>
					
				</select>
				
		</div>
		
	</div>
	<input type="submit" name="tampil" class="btn btn-primary" value="Tampilkan">
<input type="hidden" name="page" value="<?=@$_GET['page'];?>">
		<input type="hidden" name="action" value="cari_tabel">
</form>


<form action="inc/karyawan/mod_laporan/download_cari_karyawan.php"  method="GET" target="_blank">
	<div class="row"><h2>Pencarian Data Berdasarkan</h2>
		<div class="col-md-6">
			<input type="checkbox" name="pendidikanCat">
				<select name="pendidikan">
					<option value="">-Pendidikan Terakhir-</option>
					<?php
					$sql = mysql_query("select * from karyawan group by pendidikan_terakhir");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['pendidikan_terakhir'] ?>"><?php echo $novan['pendidikan_terakhir'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
			<input type="checkbox" name="statusCat">
				<select name="status">
					<option value="">-Status Karyawan-</option>
					<?php
					$sql = mysql_query("select * from karyawan group by status_karyawan");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['status_karyawan'] ?>"><?php echo $novan['status_karyawan'] ?></option> <?php
					}
					 ?>
					
				</select>
				<br>
			<input type="checkbox" name="unitCat">
				<select name="unit">
					<option value="">-Unit Kerja-</option>
					<?php
					$sql = mysql_query("select * from karyawan group by unit_kerja");
					while ($novan = mysql_fetch_array($sql)) {
						?> <option value="<?php echo $novan['unit_kerja'] ?>"><?php echo $novan['unit_kerja'] ?></option> <?php
					}
					 ?>
					
				</select>
				
		</div>
		
	</div>
	<input type="submit" name="tampil" class="btn btn-primary" value="Download">
</form>