 <?php
$id = @$_GET['id'];
 $sql = mysql_query("SELECT * FROM dosen where NIDN='$id'");
  while ($te=mysql_fetch_array($sql))
  {
  ?>
  <div class="container">
<h1>Form Input Data Dosen</h1>
<div class="col-md-8">
<form action="" method="post" id="form">
	<table class="table" width="60%">
		<tr>
			<th>NIDN</th>
			<th>:</th>
			<th><input type="text" name="NIDN" class="form-control" value="<?php echo $te['NIDN'] ?>"></th>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" class="form-control" value="<?php echo $te['nama_dosen'] ?>"></td>
		</tr>
		<tr>
			<td>Status Kontrak</td>
			<td>:</td>
			<td><input type="radio" value="PNS" name="status" <?php if($te['status_kontrak'] =='PNS'){echo 'checked';}?>> PNS  
				<input type="radio" name="status" value="Yayasan" <?php if($te['status_kontrak'] =='Yayasan'){echo 'checked';}?>> Yayasan 
				<input type="radio" name="status" value="Kontrak" <?php if($te['status_kontrak'] =='Kontrak'){echo 'checked';}?>>
			 Kontrak</td>
		</tr>
		<tr>
			<td>Tanggal Masuk UBL</td>
			<td>:</td>
			<td><input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $te['tanggal_masuk'] ?>"></td>
		</tr>	
		<tr>
			<td>Jenjang Jabatan Akademik</td>
			<td>:</td>
			<td>
				<input type="radio" value="TP" name="jenjang" <?php if($te['JJA'] =='TP'){echo 'checked';}?>> TP 
				<input type="radio" value="AA" name="jenjang" <?php if($te['JJA'] =='AA'){echo 'checked';}?>> AA
				<input type="radio" value="L" name="jenjang" <?php if($te['JJA'] =='L'){echo 'checked';}?>> L
				<input type="radio" value="LK" name="jenjang" <?php if($te['JJA'] =='LK'){echo 'checked';}?>> LK
				<input type="radio" value="GB" name="jenjang" <?php if($te['JJA'] =='GB'){echo 'checked';}?>> GB
				
			</td>
		</tr>
		<tr>
			<td>Angka Kredit</td>
			<td>:</td>
			<td><input type="text" name="angka" class="form-control" value="<?php echo $te['angka_kredit'] ?>"></td>
		</tr>
		<tr>
			<td>TMT</td>
			<td>:</td>
			<td><input type="date" name="tmt" class="form-control" value="<?php echo $te['tmt_jja'] ?>"></td>
		</tr>
		<tr>
			<td>Pangkat/Golongan</td> 
			<td>:</td>
			<td>

				<select name='golongan' class="form-control" >

					 
					 
						<option <?php if( $te['golongan']==''){echo "selected"; } ?> value=''>-Pilih Golongan-</option>
						<option <?php if( $te['golongan']=='Penata Muda III/A'){echo "selected"; } ?> value='Penata Muda III/A'>Penata Muda III/A</option>
						<option <?php if( $te['golongan']=='Penata Muda TK 1 III/B'){echo "selected"; } ?> value='Penata Muda TK 1 III/B'>Penata Muda TK 1 III/B</option>
						<option <?php if( $te['golongan']=='Penata III/C'){echo "selected"; } ?> value='Penata III/C'>Penata III/C</option>
						<option <?php if( $te['golongan']=='Penata TK 1 III/D'){echo "selected"; } ?>value="Penata TK 1 III/D">Penata TK 1 III/D</option>
                    	<option <?php if( $te['golongan']=='Pembina IV/A'){echo "selected"; } ?>value="Pembina IV/A">Pembina IV/A</option>
						<option <?php if( $te['golongan']=='Pembina TK 1 IV/B'){echo "selected"; } ?> value='Pembina TK 1 IV/B'>Pembina TK 1 IV/B</option>
						<option <?php if( $te['golongan']=='Pembina Utama Muda IV/C'){echo "selected"; } ?> value='Pembina Utama Muda IV/C'>Pembina Utama Muda IV/C</option>
						<option <?php if( $te['golongan']=='Pembina Utama Madya IV/D'){echo "selected"; } ?> value='Pembina Utama Madya IV/D'>Pembina Utama Madya IV/D</option>
						<option <?php if( $te['golongan']=='Pembina Utama IV/E'){echo "selected"; } ?> value='Pembina Utama IV/E'>Pembina Utama IV/E</option>
					 ?>
                   
                </select>
            </td>
		</tr>
		<tr>
			<td>TMT Golongan</td>
			<td>:</td>
			<td><input type="date" name="tmt_golongan" class="form-control" value="<?php echo $te['tmt_golongan'] ?>"></td>
		</tr>
		<tr>
			<td>Tugas Tambahan</td>
			<td>:</td>
			<td><input type="radio" name="tugas1" value="Yayasan Administrasi Lampung" <?php if($te['tugas_tambahan'] =='Yayasan Administrasi Lampung'){echo 'checked';}?>>Yayasan Administrasi Lampung<br>
				<input type="radio" name="tugas1" value="Pimpinan Universitas" <?php if($te['tugas_tambahan'] =='Pimpinan Universitas'){echo 'checked';}?>>Pimpinan Universitas<br>
						

                    	
                    	<input type="radio" name="tugas1" value="BIRO" <?php if($te['tugas_tambahan'] =='BIRO'){echo 'checked';}?>>BIRO<br>
                    
	                   	
                   		
                   		<input type="radio" name="tugas1" value="Unit Pelaksana Teknis" <?php if($te['tugas_tambahan'] =='Unit Pelaksana Teknis'){echo 'checked';}?>>Unit Pelaksana Teknis<br>
                    
                   		
                   		
                   		<input type="radio" name="tugas1" value="LPPM" <?php if($te['tugas_tambahan'] =='LPPM'){echo 'checked';}?>>LPPM<br>
                    
                   
                   
                   <input type="radio" name="tugas1" value="Laboratorium" <?php if($te['tugas_tambahan'] =='Laboratorium'){echo 'checked';}?> >Laboratorium<br>
                    	
                	<input type="radio" name="tugas1" value="Dekan Fakultas" <?php if($te['tugas_tambahan'] =='Dekan Fakultas'){echo 'checked';}?>>Dekan Fakultas<br>
                	<input type="radio" name="tugas1" value="Sekertaris Fakultas" <?php if($te['tugas_tambahan'] =='Sekertaris Fakultas'){echo 'checked';}?>>Sekertaris Fakultas<br>
                	<input type="radio" name="tugas1" value="Kepala Program Studi" <?php if($te['tugas_tambahan'] =='Kepala Program Studi'){echo 'checked';}?>>Kepala Program Studi<br>
                	<input type="radio" name="tugas1" value="Sekertaris Program Studi" <?php if($te['tugas_tambahan'] =='Sekertaris Program Studi'){echo 'checked';}?>>Sekertaris Program Studi<br>
                	<input type="radio" value="lainnya" name="tugas1" <?php if($te['tugas_tambahan'] =='lainnya'){echo 'checked';}?>> Lainnya<br>
                	<input type="radio" name="tugas1" value="Tidak ada Tugas Tambahan" <?php if($te['tugas_tambahan'] =='Tidak ada Tugas Tambahan'){echo 'checked';}?>>Tidak ada Tugas Tambahan

					
			</td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td>
				<select name='fakultas' class="form-control" >
					<option <?php if( $te['fakultas']=='Fakultas Hukum'){echo "selected"; } ?> value='Fakultas Hukum'>Fakultas Hukum</option>
					<option <?php if( $te['fakultas']=='Fakultas Ilmu Komputer'){echo "selected"; } ?> value='Fakultas Ilmu Komputer'>Fakultas Ilmu Komputer</option>
					<option <?php if( $te['fakultas']=='Fakultas Teknik'){echo "selected"; } ?> value='Fakultas Teknik'>Fakultas Teknik</option>
					<option <?php if( $te['fakultas']=='Fakultas Keguruan dan Ilmu Pendidikan'){echo "selected"; } ?> value='Fakultas Keguruan dan Ilmu Pendidikan'>Fakultas Keguruan dan Ilmu Pendidikan</option>
					<option <?php if( $te['fakultas']=='Fakultas Ilmu Sosial dan Ilmu Politik'){echo "selected"; } ?> value="Fakultas Ilmu Sosial dan Ilmu Politik">Fakultas Ilmu Sosial dan Ilmu Politik</option>
					<option <?php if( $te['fakultas']=='Fakultas Ekonomi dan Bisnis'){echo "selected"; } ?> value='Fakultas Ekonomi dan Bisnis'>Fakultas Ekonomi dan Bisnis</option>

				</select>	
			</td>
		</tr>
		<tr>
			<td>Program Studi</td>
			<td>:</td>
			<td>
				<select name='prodi' class="form-control" >
				<option <?php if( $te['prodi']=='Ilmu Hukum'){echo "selected"; } ?> value='Ilmu Hukum'>Ilmu Hukum</option>
					<option <?php if( $te['prodi']=='Sistem Informasi'){echo "selected"; } ?> value='Sistem Informasi'>Sistem Informasi</option>
					<option <?php if( $te['prodi']=='Teknik Informatika'){echo "selected"; } ?> value='Teknik Informatika'>Teknik Informatika</option>
					<option <?php if( $te['prodi']=='Teknik Mesin'){echo "selected"; } ?> value='Teknik Mesin'>Teknik Mesin</option>
					<option <?php if( $te['prodi']=='Teknik Arsitek'){echo "selected"; } ?> value='Teknik Arsitek'>Teknik Arsitek</option>
					<option <?php if( $te['prodi']=='Teknik Sipil'){echo "selected"; } ?> value='Teknik Sipil'>Teknik Sipil</option>

					<option <?php if( $te['prodi']=='Pendidikan Bahasa Inggris'){echo "selected"; } ?> value='Pendidikan Bahasa Inggris'>Pendidikan Bahasa Inggris</option>
					<option <?php if( $te['prodi']=='Ilmu Komunikasi'){echo "selected"; } ?> value='Ilmu Komunikasi'>Ilmu Komunikasi</option>
					<option <?php if( $te['prodi']=='Administrasi Bisnis'){echo "selected"; } ?> value='Administrasi Bisnis'>Administrasi Bisnis</option>
					<option <?php if( $te['prodi']=='Administrasi Publik'){echo "selected"; } ?> value='Administrasi Publik'>Administrasi Publik</option>
					<option <?php if( $te['prodi']=='Manajemen'){echo "selected"; } ?> value='Manajemen'>Manajemen</option>
					<option <?php if( $te['prodi']=='Akuntansi'){echo "selected"; } ?> value='Akuntansi'>Akuntansi</option>


				</select>
			</td>
		</tr>
		<tr>
			<td>Pendidikan Terakhir</td>
			<td>:</td>
			<td>
				<input type="radio" value="S1" name="pendidikan_terakhir" <?php if($te['pendidikan_terakhir'] =='S1'){echo 'checked';}?>> S1
				<input type="radio" value="S2" name="pendidikan_terakhir" <?php if($te['pendidikan_terakhir'] =='S2'){echo 'checked';}?>> S2
				<input type="radio" value="S3" name="pendidikan_terakhir" <?php if($te['pendidikan_terakhir'] =='S3'){echo 'checked';}?>> S3
			</td>
		</tr>
		<tr>
			<td>Tempat Pendidikan Terakhir</td>
			<td>:</td>
			<td>
				<input type="radio" value="Lampung" name="tempat_pendidikan" <?php if($te['tempat_pendidikan'] =='Lampung'){echo 'checked';}?>> Lampung
				<input type="radio" value="Luar Lampung" name="tempat_pendidikan" <?php if($te['tempat_pendidikan'] =='Luar Lampung'){echo 'checked';}?>> Luar Lampung
			</td>
		</tr>
		<tr>
			<td>Sumber Dana</td>
			<td>:</td>
			<td><input type="text" name="sumber" class="form-control" value="<?php echo $te['sumber_dana'] ?>"></td>
		</tr>
		<tr>
			<td>Sertifikasi Dosen</td>
			<td>:</td>
			<td>
				<input type="radio" value="Ya" name="Sertifikasi_dosen" class="sertifikasi" <?php if($te['sertifikasi_dosen'] =='Ya'){echo 'checked';}?>> Ya
				<input type="radio" value="Tidak" name="Sertifikasi_dosen" class="sertifikasi" <?php if($te['sertifikasi_dosen'] =='Tidak'){echo 'checked';}?>> Tidak
				<input type="text" name="no_ser" id="sertifikasi1" class="form-control"  value="<?php echo $te['no_sertifikasi'] ?>">
				<input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control" value="<?php echo $te['tahun_lulus'] ?>">
			</td>
		</tr>
		<tr>
			<td>Status Dosen</td>
			<td>:</td>
			<td>
				<input type="radio" value="NIDN dan Mengajar" name="Status_dosen" <?php if($te['status_dosen'] =='NIDN dan Mengajar'){echo 'checked';}?>> NIDN dan Mengajar
				<input type="radio" value="NIDK" name="Status_dosen" <?php if($te['status_dosen'] =='NIDK'){echo 'checked';}?>> NIDK<br>
				<input type="radio" value="NIDN tanpa Mengajar" name="Status_dosen" <?php if($te['status_dosen'] =='NIDN tanpa Mengajar'){echo 'checked';}?>> NIDN tanpa Mengajar
				<input type="radio" value="Tidak Aktif" name="Status_dosen" <?php if($te['status_dosen'] =='Tidak Aktif'){echo 'checked';}?>> Tidak Aktif
			</td>
		</tr>
		<tr>
			<td>Tugas Belajar</td>
			<td>:</td>
			<td>
				<input type="radio" value="Ya" name="tugas_belajar" class="belajar" <?php if($te['tugas_belajar'] =='Ya'){echo 'checked';}?>> Ya
				<input type="radio" value="Tidak" name="tugas_belajar" class="belajar" <?php if($te['tugas_belajar'] =='Tidak'){echo 'checked';}?>> Tidak
				<input type="text" name="tempat_studi" id="tempat_studi" class="form-control" value="<?php echo $te['tempat_studi'] ?>">
			</td>
		</tr>
		<tr>
			<td>Ijin Belajar</td>
			<td>:</td>
			<td>
				<input type="radio" value="Ya" name="ijin_belajar" class="ijin" <?php if($te['ijin_belajar'] =='Ya'){echo 'checked';}?>> Ya
				<input type="radio" value="Tidak" name="ijin_belajar" class="ijin" <?php if($te['ijin_belajar'] =='Tidak'){echo 'checked';}?>> Tidak
				<input type="text" name="tujuan_studi" id="tujuan" class="form-control" value="<?php echo $te['tujuan_studi'] ?>">
			</td>
		</tr>
		<tr>
			<td colspan="3"><center><input type="submit" name="edit" value="Edit Data" class="btn btn-primary"></center>
			</td>
		</tr>
	</table>
	<?php
	$id = @$_GET['id'];
	$nidn =@$_POST['NIDN'];
    $nama =@$_POST['nama'];
    $status =@$_POST['status'];
    $tanggal_masuk =@$_POST['tanggal_masuk'];
    $jenjang =@$_POST['jenjang'];
    $angka =@$_POST['angka'];
    $tmt =@$_POST['tmt'];
    $golongan =@$_POST['golongan'];
    $tmt_golongan =@$_POST['tmt_golongan'];
    $tambahan =@$_POST['tugas1'];
    $fakultas =@$_POST['fakultas'];
    $prodi =@$_POST['prodi'];
    $pendidikan_terakhir =@$_POST['pendidikan_terakhir'];
    $tempat_pendidikan =@$_POST['tempat_pendidikan'];
    $sumber_dana =@$_POST['sumber'];
    $sertifikasi_dosen =@$_POST['Sertifikasi_dosen'];
    $no_ser =@$_POST['no_ser'];
    $tahun_lulus =@$_POST['tahun_lulus'];
    $status_dosen =@$_POST['Status_dosen'];
    $tugas_belajar =@$_POST['tugas_belajar'];
    $tempat_studi =@$_POST['tempat_studi'];
    $ijin_belajar =@$_POST['ijin_belajar'];
    $tujuan_studi =@$_POST['tujuan_studi'];

		$edit_dosen = @$_POST['edit'];
		if($edit_dosen)
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

					
						mysql_query("update dosen set 
							NIDN='$nidn',
							nama_dosen='$nama',
							status_kontrak='$status',
							tanggal_masuk='$tanggal_masuk',
							JJA='$jenjang',
							angka_kredit='$angka',
							tmt_jja='$tmt',
							golongan='$golongan',
							tmt_golongan='$tmt_golongan',
							tugas_tambahan='$tambahan',
							fakultas='$fakultas',
							prodi='$prodi',
							pendidikan_terakhir='$pendidikan_terakhir',
							tempat_pendidikan='$tempat_pendidikan',
							sumber_dana='$sumber_dana',
							sertifikasi_dosen='$sertifikasi_dosen',
							no_sertifikasi='$no_ser',
							tahun_lulus='$tahun_lulus',
							status_dosen='$status_dosen',
							tugas_belajar='$tugas_belajar',
							tempat_studi='$tempat_studi',
							ijin_belajar='$ijin_belajar',
							tujuan_studi='$tujuan_studi'
							where NIDN='$id'")or die(mysql_error());
						?>
							<script type="text/javascript">
							alert("data anda berhasil diedit");
							window.location.href="?page=dosen";
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
<script>
<?php } ?>