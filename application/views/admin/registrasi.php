<!DOCTYPE html>
<html >

<head>
  <meta charset="UTF-8">
  <title>Registrasi e-Portofolio Dosen</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> 

  
 <link rel="stylesheet" href="<?php echo base_URL();?>aset/regis/css/style.css"> 

  
</head>

<body>
  <!-- multistep form -->
<form id="msform" action="<?php echo base_URL(); ?>index.php/admin/register" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Setup Akun</li>
    <li>Setup Prodi</li>
    <li>Data Diri</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Buat Akun Anda</h2>
    <h3 class="fs-subtitle">Langkah  1</h3>
    <input type="text" name="username" placeholder="NIDN Sebagai User Id" />
    <input type="text" name="nip" placeholder="Nomor Induk Pegawai" />
    <input type="password" name="password" placeholder="Password" />
    <input type="password" name="password2" placeholder="Confirm Password" />
   <input type="button" name="next" class="next action-button" value="Next" />
   </fieldset>
  <fieldset>
    <h2 class="fs-title">Akun Anda</h2>
    <h3 class="fs-subtitle">Profil Diri Anda</h3>
    <input type="text" name="nama" placeholder="Nama Anda" />
    <input type="text" name="jabfungsional" placeholder="Jabatan Fungsional" />
    <input type="text" name="gol" placeholder="Golongan" />
     <input type="text" name="jenis" placeholder="Jenis | DS/PR/DT/PT" />
 	<h3 class="fs-subtitle">Tanggal Lahir</h3>
    <input type="date" name="tgl_lahir" placeholder="Tgl Lahir" />
    <input type="text" name="tempatlahir" placeholder="Tempat Lahir" />
        
<input type="text" name="nohp" placeholder="No HP" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Bidang Ilmu</h2>
    <h3 class="fs-subtitle">Riwayat Pendidikan</h3>
    <input type="text" name="fakultas" placeholder="Fakultas" />
    <input type="text" name="prodi" placeholder="prodi" />
    <input type="text" name="s1" placeholder="Nama Universitas | S1" />
    <input type="text" name="s2" placeholder="Nama Universitas | S2" />
    <input type="text" name="s3" placeholder="Nama Universitas | S3" />
    <input type="text" name="bidangilmu" placeholder="Bidang Ilmu" />
       <h3 class="fs-subtitle">Foto Profil</h3>
     <input type="file" tabindex="7" name="photo" id="photo" placeholder="Pilih Foto" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
   
    <button type="submit" class="btn btn-primary" tabindex="7" >Simpan</button>
  </fieldset>
</form>



  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script src="<?php echo base_URL();?>aset/regis/js/index.js"></script>

</body>
</html>
