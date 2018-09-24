   <div class="col-md-10">                           
                                    <div class="banner-main-home-text">
                                        <div class="heading">
                                            <h2>Form Input Data Dosen</h2>
                                            
                                        </div>
                                        
                                    </div>
                                    <form action="" method="post" id="form">
	<table class="table" width="60%">
		<tr>
			<th>NIDN</th>
			<th>:</th>
			<th><input type="text" name="NIDN" class="form-control"></th>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" class="form-control"></td>
		</tr>
		<tr>
			<td>Status Kontrak</td>
			<td>:</td>
			<td><input type="radio" value="PNS" name="status"> PNS  <input type="radio" name="status" value="Yayasan"> Yayasan 
				<input type="radio" name="status" value="Kontrak">
			 Kontrak</td>
		</tr>
		<tr>
			<td>Tanggal Masuk UBL</td>
			<td>:</td>
			<td><input type="date" name="tanggal_masuk" class="form-control"></td>
		</tr>	
		<tr>
			<td>Jenjang Jabatan Akademik</td>
			<td>:</td>
			<td>
				<input type="radio" value="TP" name="jenjang"> TP 
				<input type="radio" value="AA" name="jenjang"> AA
				<input type="radio" value="L" name="jenjang"> L
				<input type="radio" value="LK" name="jenjang"> LK
				<input type="radio" value="GB" name="jenjang"> GB
				
			</td>
		</tr>
		<tr>
			<td>Angka Kredit</td>
			<td>:</td>
			<td><input type="text" name="angka" class="form-control"></td>
		</tr>
		<tr>
			<td>TMT</td>
			<td>:</td>
			<td><input type="date" name="tmt" class="form-control"></td>
		</tr>
		<tr>
			<td>Pangkat/Golongan</td> 
			<td>:</td>
			<td>
				<select name='golongan' class="form-control" >
                    <option value="0" selected>- Pilih Pangkat/Golongan -</option>
                    <option value="Penata Muda III/A">Penata Muda III/A</option>
                    <option value="Penata Muda TK 1 1II/B">Penata Muda TK 1 1II/B</option>
                    <option value="Penata III/C">Penata III/C</option>
                    <option value="Penata TK 1 III/D">Penata TK 1 III/D</option>
                    <option value="Pembina IV/A">Pembina IV/A</option>
                    <option value="Pembina TK 1 IV/B">Pembina TK 1 IV/B</option>
                    <option value="Pembina Utama Muda IV/C">Pembina Utama Muda IV/C</option>
                    <option value="Pembina Utama Madya IV/D">Pembina Utama Madya IV/D</option>
                    <option value="Pembina Utama IV/E">Pembina Utama IV/E</option>
                </select>
            </td>
		</tr>
		<tr>
			<td>TMT Golongan</td>
			<td>:</td>
			<td><input type="date" name="tmt_golongan" class="form-control"></td>
		</tr>
		<tr>
			<td>Tugas Tambahan</td>
			<td>:</td>
			<td>
						<input type="radio" name="tugas1" value="Yayasan Administrasi Lampung">Yayasan Administrasi Lampung<br>
						<input type="radio" name="tugas1" value="Pimpinan Universitas">Pimpinan Universitas<br>
                    	<input type="radio" name="tugas1" value="BIRO">BIRO<br>		
                   		<input type="radio" name="tugas1" value="Unit Pelaksana Teknis">Unit Pelaksana Teknis<br> 		
                   		<input type="radio" name="tugas1" value="LPPM">LPPM       <br>            
                   <input type="radio" name="tugas1" value="Laboratorium">Laboratorium  <br>                 	
                	<input type="radio" name="tugas1" value="Dekan Fakultas">Dekan Fakultas<br>
                	<input type="radio" name="tugas1" value="Sekertaris Fakultas">Sekertaris Fakultas<br>
                	<input type="radio" name="tugas1" value="Kepala Program Studi">Kepala Program Studi<br>
                	<input type="radio" name="tugas1" value="Sekertaris Program Studi">Sekertaris Program Studi<br>	
                	<input type="radio" name="tugas1" value="lainnya"> Lainnya<br>
                	<input type="radio" name="tugas1" value="Tidak ada Tugas Tambahan">Tidak ada Tugas Tambahan<br>
				
			</td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td>
				<select name='fakultas' class="form-control" >
					<option value="0" selected>- Pilih Fakultas -</option>
					<option value="Fakultas Hukum">Fakultas Hukum</option>
					<option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
					<option value="Fakultas Teknik">Fakultas Teknik</option>
					<option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu Pendidikan</option>
					<option value="Fakultas Ilmu Sosial dan Ilmu Politik">Fakultas Ilmu Sosial dan Ilmu Politik</option>
					<option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
				</select>	
			</td>
		</tr>
		<tr>
			<td>Program Studi</td>
			<td>:</td>
			<td>
				<select name='prodi' class="form-control" >
					<option value="0" selected>- Pilih Program Studi -</option>
					<option value="Ilmu Hukum">Ilmu Hukum</option>
					<option value="Sistem Informasi">Sistem Informasi</option>
					<option value="Teknik Sipil">Teknik Mesin</option>
					<option value="Teknik Arsitek">Teknik Arsitek</option>
					<option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
					<option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
					<option value="Administrasi Bisnis">Administrasi Bisnis</option>
					<option value="Administrasi Publik">Administrasi Publik</option>
					<option value="Manajemen">Manajemen</option>
					<option value="Akuntansi">Akuntansi</option>
					<option value="Teknik Informatika">Teknik Informatika</option>
					<option value="Teknik Sipil">Teknik Sipil</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Pendidikan Terakhir</td>
			<td>:</td>
			<td>
				<input type="radio" value="S1" name="pendidikan_terakhir"> S1
				<input type="radio" value="S2" name="pendidikan_terakhir"> S2
				<input type="radio" value="S3" name="pendidikan_terakhir"> S3
			</td>
		</tr>
		<tr>
			<td>Tempat Pendidikan Terakhir</td>
			<td>:</td>
			<td>
				<input type="radio" value="Lampung" name="tempat_pendidikan"> Lampung
				<input type="radio" value="Luar Lampung" name="tempat_pendidikan"> Luar Lampung
			</td>
		</tr>
		<tr>
			<td>Sumber Dana</td>
			<td>:</td>
			<td><input type="radio" value="Beasiswa" name="sumber" class="sertifikasi"> Beasiswa
				<input type="radio" value="Non Beasiswa" name="sumber" class="sertifikasi"> Non Beasiswa</td>
		</tr>
		<tr>
			<td>Sertifikasi Dosen</td>
			<td>:</td>
			<td>
				<input type="radio" value="Ya" name="sertifikasi_dosen" class="sertifikasi"> Ya
				<input type="radio" value="Tidak" name="sertifikasi_dosen" class="sertifikasi"> Tidak
				<input type="text" name="no_ser" id="sertifikasi1" class="form-control" placeholder="Isikan No Sertifikat.." style="display:none">
				<input type="text" name="tahun_lulus" id="sertifikasi2" class="form-control" placeholder="Isikan Tahun Lulus.." style="display:none">
			</td>
		</tr>
		<tr>
			<td>Status Dosen</td>
			<td>:</td>
			<td>
				<input type="radio" value="NIDN dan Mengajar" name="Status_dosen"> NIDN dan Mengajar
				<input type="radio" value="NIDK" name="Status_dosen"> NIDK<br>
				<input type="radio" value="NIDN tanpa Mengajar" name="Status_dosen"> NIDN tanpa Mengajar
				<input type="radio" value="Tidak Aktif" name="Status_dosen"> Tidak Aktif
			</td>
		</tr>
		<tr>
			<td>Tugas Belajar</td>
			<td>:</td>
			<td>
				<input type="radio" value="Ya" name="tugas_belajar" class="belajar"> Ya
				<input type="radio" value="Tidak" name="tugas_belajar" class="belajar"> Tidak
				<input type="text" name="tempat_studi" id="tempat_studi" class="form-control" style="display:none" placeholder="Isikan Tempat Studi..">
			</td>
		</tr>
		<tr>
			<td>Ijin Belajar</td>
			<td>:</td>
			<td>
				<input type="radio" value="Ya" name="ijin_belajar" class="ijin"> Ya
				<input type="radio" value="Tidak" name="ijin_belajar" class="ijin"> Tidak
				<input type="text" name="tujuan_studi" id="ijin" class="form-control" style="display:none" placeholder="Isikan Tujuan Studi..">
			</td>
		</tr>
		<tr>
			<td colspan="3"><center><input type="submit" name="tambah" value="Tambahkan Data" class="btn btn-primary"></center>
			</td>
		</tr>
	</table>
</form>
<?php 
	$nidn =@$_POST['NIDN'];
    $nama =@$_POST['nama'];
    $status =@$_POST['status'];
    $tanggal_masuk =@$_POST['tanggal_masuk'];
    $jenjang =@$_POST['jenjang'];
    $angka =@$_POST['angka'];
    $tmt =@$_POST['tmt'];
    $golongan =@$_POST['golongan'];
    $tmt_golongan =@$_POST['tmt_golongan'];
    $tugas_tambahan =@$_POST['tugas1'];
    $fakultas =@$_POST['fakultas'];
    $prodi =@$_POST['prodi'];
    $pendidikan_terakhir =@$_POST['pendidikan_terakhir'];
    $tempat_pendidikan =@$_POST['tempat_pendidikan'];
    $sumber_dana =@$_POST['sumber'];
    $sertifikasi_dosen =@$_POST['sertifikasi_dosen'];
    $no_ser =@$_POST['no_ser'];
    $tahun_lulus =@$_POST['tahun_lulus'];
    $status_dosen =@$_POST['Status_dosen'];
    $tugas_belajar =@$_POST['tugas_belajar'];
    $tempat_studi =@$_POST['tempat_studi'];
    $ijin_belajar =@$_POST['ijin_belajar'];
    $tujuan_studi =@$_POST['tujuan_studi'];

    
    $tambah_data = @$_POST['tambah'];
		if($tambah_data)
		{
				if($nidn=="")
				{
					?>
					<script type="text/javascript">
					alert("input tidak boleh ada yang kosong");
					</script>
					<?php
				}
				else
				{
					
						mysql_query("insert into dosen 
							(NIDN,
							nama_dosen,
							status_kontrak,
							tanggal_masuk,
							JJA,
							angka_kredit,
							tmt_jja,
							golongan,
							tmt_golongan,
							tugas_tambahan,
							fakultas,
							prodi,
							pendidikan_terakhir,
							tempat_pendidikan,
							sumber_dana,
							sertifikasi_dosen,
							no_sertifikasi,
							tahun_lulus,
							status_dosen,
							tugas_belajar,
							tempat_studi,
							ijin_belajar,
							tujuan_studi) values
						 ('$nidn',
						'$nama',
						'$status',
						'$tanggal_masuk',
						'$jenjang',
						'$angka',
						'$tmt',
						'$golongan',
						'$tmt_golongan',
						'$tugas_tambahan',
						'$fakultas',
						'$prodi',
						'$pendidikan_terakhir',
						'$tempat_pendidikan',
						'$sumber_dana',
						'$sertifikasi_dosen',
						'$no_ser',
						'$tahun_lulus',
						'$status_dosen',
						'$tugas_belajar',
						'$tempat_studi',
						'$ijin_belajar',
						'$tujuan_studi')") or die(mysql_error());
												?>
												<script type="text/javascript">
												alert("data berhasil ditambahkan");
												window.location.href="?page=dosen";
												</script>
												<?php
					
				}
	    }
	
 ?>
<script>
	$(document).ready(function(){
		$(".tugas").change(function(){
			var valSertifikasi = $("#form").find('input[name=tugas_tambahan]:checked').val();
			if (valSertifikasi == 'Ya'){
				$("#tugas_tambahan").css('display', 'block');
			} else {
				$("#tugas_tambahan").css('display', 'none');
				
			}
		});
	});
</script>
<script>
	$(document).ready(function(){
		$(".sertifikasi").change(function(){
			var valSertifikasi = $("#form").find('input[name=sertifikasi_dosen]:checked').val();
			if (valSertifikasi == 'Ya'){
				$("#sertifikasi1").css('display', 'block');
				$("#sertifikasi2").css('display', 'block');
			} else {
				$("#sertifikasi1").css('display', 'none');
				$("#sertifikasi2").css('display', 'none');
			}
		});
	});
</script>
<script>
	$(document).ready(function(){
		$(".belajar").change(function(){
			var valSertifikasi = $("#form").find('input[name=tugas_belajar]:checked').val();
			if (valSertifikasi == 'Ya'){
				$("#tempat_studi").css('display', 'block');
				
			} else {
				$("#tempat_studi").css('display', 'none');
				
			}
		});
	});
</script>
<script>
	$(document).ready(function(){
		$(".ijin").change(function(){
			var valSertifikasi = $("#form").find('input[name=ijin_belajar]:checked').val();
			if (valSertifikasi == 'Ya'){
				$("#ijin").css('display', 'block');
				
			} else {
				$("#ijin").css('display', 'none');
				
			}
		});
	});
</script>

</div>



