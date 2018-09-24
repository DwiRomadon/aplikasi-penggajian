


<div class="row">
<h2>Aplikasi OLAP Karyawan</h2>

  <div class="col-md-6">
    <form action="index.php?page=karyawan&action=cari" method="get">
                    <input type="text" name="cari" class="form-control" placeholder="cari nama karyawan disini..">
                    <input type="submit" Value="Cari">
                    <input type="hidden" name="page" value="<?=@$_GET['page'];?>">
                    <input type="hidden" name="action" value="cari">
                </form>
  </div>
  <div class="col-md-6">
    <?php

  if ($_SESSION['level']=='admin') {
    ?> <a href="?page=karyawan&action=tambah"><button class="btn btn-success"><i class="fa fa-plus"> Tambah data Karyawan</i></button></a><?php
   } 
    else
    {
      echo "";
    }
    
 ?>
</div>




<?php 
  $cek = @$_GET['action'];
  if ($cek =='cari') {
    ?> 
    <div class="col-md-10">
<form action="" method="post">
<table class="table" border="1">
  <tr bgcolor="gray">
    <th>NIK</th>
    <th>Nama Karyawan</th>
    <th>Pendidikan Terakhir</th>
    <th>Status Karyawan</th>
    <th>Tanggal Masuk UBL</th>
    <th>Unit Kerja</th>
    <?php

  if ($_SESSION['level']=='admin') {
    ?> 
     <th>Opsi</th>
    <?php
   } 
    else
    {
      echo "";
    }
    
 ?>
    <th>Download</th>
  </tr>

<?php
$batas = 30;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";

if ( empty( $pg ) ) {
    $posisi = 0;
    $pg = 1;
} else {
    $posisi = ( $pg - 1 ) * $batas;
}
$cari = @$_GET['cari'];
$sql = mysql_query("SELECT * FROM karyawan where nama_karyawan LIKE '$cari' OR status_karyawan LIKE '$cari' OR unit_kerja LIKE '$cari' limit $posisi, $batas");
$no = 1+$posisi;
while ( $r = mysql_fetch_assoc( $sql ) ) {
    ?>
  <tr>
    <td><?= $r['NIK']; ?></td>
    <td><?= $r['nama_karyawan']; ?></td>
    <td><?= $r['pendidikan_terakhir']; ?></td>
    <td><?= $r['status_karyawan']; ?></td>
    <td><?= $r['tanggal_masuk_ubl']; ?></td>
    <td><?= $r['unit_kerja']; ?></td>
    <?php

  if ($_SESSION['level']=='admin') {
    ?> <td>
      <button class="btn btn-warning"><a href="?page=karyawan&action=edit&id=<?php echo $r['NIK']; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Edit</a></button>
        <button class="btn btn-danger"><a onclick="return confirm('yakin ingin menghapus ?')" href="?page=karyawan&action=hapus&id=<?php echo $r['NIK']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a></button>
        </td>
    <?php
   } 
    else
    {
      ?>
      <?php
    }
    
 ?>
 <td>
        <button class="btn btn-primary"> <a href="download_karyawan.php?id=<?= $r['NIK']; ?>"> Download  </a></button>
 </td>
  </tr>

   <?php
    $no++;
}
?>
<tr>
    <td colspan="8">
        <?php
//hitung jumlah data
        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM karyawan where nama_karyawan LIKE '$cari' OR status_karyawan LIKE '$cari' OR unit_kerja LIKE '$cari'"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

//Navigasi ke sebelumnya
if ( $pg > 1 ) {
    $link = $pg-1;
    $prev = "<a href='index.php?page=karyawan&pg=$link'>Prev </a>";
} else {
    $prev = "Prev ";
}

//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){

    if ( $i == $pg ) {
        $nmr .= $i . " ";
    } else {
        $nmr .= "<a href='index.php?page=karyawan&pg=$i'>$i</a> ";
    }
}

//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
    $link = $pg + 1;
    $next = " <a href='index.php?page=karyawan&pg=$link'>Next</a>";
} else {
    $next = " Next";
}

//Tampilkan navigasi
?> 
<div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-warning"><?php echo $prev ?></button>
  <button type="button" class="btn btn-default"><?php echo $nmr ?></button>
  <button type="button" class="btn btn-warning"><?php echo $next ?></button>
</div>
Total Data Anda adalah :<b> <?php echo $jml_data; ?> </b>   
</td>
</table>
</form>
</div>
<div class="col-md-2">
</div>
</div>
      <?php
  }else{
    ?> 
    <div class="col-md-10">
<form action="" method="post">
<table class="table" border="1">
  <tr bgcolor="gray">
    <th>NIK</th>
    <th>Nama Karyawan</th>
    <th>Pendidikan Terakhir</th>
    <th>Status Karyawan</th>
    <th>Tanggal Masuk UBL</th>
    <th>Unit Kerja</th>
    <?php

  if ($_SESSION['level']=='admin') {
    ?> 
     <th>Opsi</th>
    <?php
   } 
    else
    {
      echo "";
    }
    
 ?>
    <th>Download</th>
  </tr>

<?php
$batas = 30;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";

if ( empty( $pg ) ) {
    $posisi = 0;
    $pg = 1;
} else {
    $posisi = ( $pg - 1 ) * $batas;
}

$sql = mysql_query("SELECT * FROM karyawan limit $posisi, $batas");
$no = 1+$posisi;
while ( $r = mysql_fetch_assoc( $sql ) ) {
    ?>
  <tr>
    <td><?= $r['NIK']; ?></td>
    <td><?= $r['nama_karyawan']; ?></td>
    <td><?= $r['pendidikan_terakhir']; ?></td>
    <td><?= $r['status_karyawan']; ?></td>
    <td><?= $r['tanggal_masuk_ubl']; ?></td>
    <td><?= $r['unit_kerja']; ?></td>
    <?php

  if ($_SESSION['level']=='admin') {
    ?> <td>
      <button class="btn btn-warning"><a href="?page=karyawan&action=edit&id=<?php echo $r['NIK']; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Edit</a></button>
        <button class="btn btn-danger"><a onclick="return confirm('yakin ingin menghapus ?')" href="?page=karyawan&action=hapus&id=<?php echo $r['NIK']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a></button>
        </td>
    <?php
   } 
    else
    {
      ?>
      <?php
    }
    
 ?>
 <td>
        <button class="btn btn-primary"> <a href="download_karyawan.php?id=<?= $r['NIK']; ?>"> Download  </a></button>
 </td>
  </tr>

   <?php
    $no++;
}
?>
<tr>
    <td colspan="8">
        <?php
//hitung jumlah data
        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM karyawan"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

//Navigasi ke sebelumnya
if ( $pg > 1 ) {
    $link = $pg-1;
    $prev = "<a href='index.php?page=karyawan&pg=$link'>Prev </a>";
} else {
    $prev = "Prev ";
}

//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){

    if ( $i == $pg ) {
        $nmr .= $i . " ";
    } else {
        $nmr .= "<a href='index.php?page=karyawan&pg=$i'>$i</a> ";
    }
}

//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
    $link = $pg + 1;
    $next = " <a href='index.php?page=karyawan&pg=$link'>Next</a>";
} else {
    $next = " Next";
}

//Tampilkan navigasi
?> 
<div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-warning"><?php echo $prev ?></button>
  <button type="button" class="btn btn-default"><?php echo $nmr ?></button>
  <button type="button" class="btn btn-warning"><?php echo $next ?></button>
</div>
Total Data Anda adalah :<b> <?php echo $jml_data; ?> </b>   
</td>
</table>
</form>
</div>
<div class="col-md-2">
</div>
</div>
     <?php
  }
 ?>