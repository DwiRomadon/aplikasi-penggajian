



<div class="row">
  <h2>Aplikasi OLAP Dosen</h2>
  <div class="col-md-6">
  <form action="index.php?page=dosen&action=cari" method="get">
                    <input type="text" name="cari" class="form-control" placeholder="cari dosen disini..">
                    <input type="submit" Value="Cari">
                    <input type="hidden" name="page" value="<?=@$_GET['page'];?>">
                    <input type="hidden" name="action" value="cari">
                </form>
</div>
	<div class="col-md-6">

<?php

  if ($_SESSION['level']=='admin') {
   	?> <a href="?page=dosen&action=tambah"><button class="btn btn-success"><i class="fa fa-plus"> Tambah data Dosen</i></button></a><?php
   } 
    else
    {
    	echo "";
    }
    
 ?></div>




<div class="col-md-10">

<?php 
  $action = @$_GET['action'];
  if ($action == 'cari') {
    ?> 
    <form action="" method="post">
<table class="table" width="100%" border="1">
  <tr bgcolor="gray">
    <th>No</th>
    <th>NIDN</th>
    <th>Nama Dosen</th>
    <th>Status Kontrak</th>
    <th>Tanggal Masuk</th>
    <th>JJA</th>
    <th>Angka Kredit</th>
    <th>TMT JJA</th>
    <th>golongan</th>
    <th>TMT Golongan</th>
    <th>Lihat</th>
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
    
    
  </tr>

<?php
$cari = @$_GET['cari'];
$sql = mysql_query("SELECT * FROM dosen WHERE nama_dosen LIKE '$cari' or status_kontrak LIKE '$cari' OR prodi LIKE '$cari'");
$i=1;
while ($r= mysql_fetch_array($sql)) {
    ?>
  <tr>
    <td><?= $i++; ?></td>
    <td><?= $r['NIDN']; ?></td>
    <td><?= $r['nama_dosen']; ?></td>
    <td><?= $r['status_kontrak']; ?></td>
    <td><?= $r['tanggal_masuk']; ?></td>
    <td><?= $r['JJA']; ?></td>
    <td><?= $r['angka_kredit']; ?></td>
    <td><?= $r['tmt_jja']; ?></td>
    <td><?= $r['golongan']; ?></td>
    <td><?= $r['tmt_golongan']; ?></td>
    <td><button class="btn btn-warning"><a href="?page=dosen&action=detail&id=<?php echo $r['NIDN']; ?>"><i class="fa fa-eye" aria-hidden="true"></i> Detail</a></button>
        <button class="btn btn-primary"> <a href="download_dosen.php?id=<?= $r['NIDN']; ?>"> Download  </a></button>
    </td>
        
    <td>
      <?php

  if ($_SESSION['level']=='admin') {
    ?> 
      <button class="btn btn-primary"><a href="?page=dosen&action=edit&id=<?php echo $r['NIDN']; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Edit</a></button>
        <button class="btn btn-danger"><a onclick="return confirm('yakin ingin menghapus ?')" href="?page=dosen&action=hapus&id=<?php echo $r['NIDN']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a></button>
        
    <?php
   } 
    else
    {
      echo "";
    }
    
 ?>
      </td>
  </tr>
   <?php } ?>

</table>
</form>
</div>
<div class="col-md-2">
</div>
</div>
    <?php
  }
  else{
    ?>
    <form action="" method="post">
<table class="table" width="100%" border="1">
  <tr bgcolor="gray">
    <th>No</th>
    <th>NIDN</th>
    <th>Nama Dosen</th>
    <th>Status Kontrak</th>
    <th>Tanggal Masuk</th>
    <th>JJA</th>
    <th>Angka Kredit</th>
    <th>TMT JJA</th>
    <th>golongan</th>
    <th>TMT Golongan</th>
    <th>Lihat</th>
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
  </tr>

<?php
$batas = 20;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";

if ( empty( $pg ) ) {
    $posisi = 0;
    $pg = 1;
} else {
    $posisi = ( $pg - 1 ) * $batas;
}

$sql = mysql_query("SELECT * FROM dosen limit $posisi, $batas");
$no = 1+$posisi;
while ( $r = mysql_fetch_assoc( $sql ) ) {
    ?>
  <tr>
    <td><?= $no; ?></td>
    <td><?= $r['NIDN']; ?></td>
    <td><?= $r['nama_dosen']; ?></td>
    <td><?= $r['status_kontrak']; ?></td>
    <td><?= $r['tanggal_masuk']; ?></td>
    <td><?= $r['JJA']; ?></td>
    <td><?= $r['angka_kredit']; ?></td>
    <td><?= $r['tmt_jja']; ?></td>
    <td><?= $r['golongan']; ?></td>
    <td><?= $r['tmt_golongan']; ?></td>
    <td><button class="btn btn-warning"><a href="?page=dosen&action=detail&id=<?php echo $r['NIDN']; ?>"><i class="fa fa-eye" aria-hidden="true"></i> Detail</a></button>
        <button class="btn btn-primary"> <a href="download_dosen.php?id=<?= $r['NIDN']; ?>"> Download  </a></button>
    </td>
        
    
      <?php

  if ($_SESSION['level']=='admin') {
    ?> <td>
      <button class="btn btn-primary"><a href="?page=dosen&action=edit&id=<?php echo $r['NIDN']; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Edit</a></button>
        <button class="btn btn-danger"><a onclick="return confirm('yakin ingin menghapus ?')" href="?page=dosen&action=hapus&id=<?php echo $r['NIDN']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a></button>
        </td>
  </tr>
    <?php
   } 
    else
    {
      echo "";
    }
    
 ?>
      
   <?php
    $no++;
}
?>
<tr>
    <td colspan="12">
        <?php
//hitung jumlah data
        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM dosen"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

//Navigasi ke sebelumnya
if ( $pg > 1 ) {
    $link = $pg-1;
    $prev = "<a href='index.php?page=dosen&pg=$link'>Prev </a>";
} else {
    $prev = "Prev ";
}

//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){

    if ( $i == $pg ) {
        $nmr .= $i . " ";
    } else {
        $nmr .= "<a href='index.php?page=dosen&pg=$i'>$i</a> ";
    }
}

//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
    $link = $pg + 1;
    $next = " <a href='index.php?page=dosen&pg=$link'>Next</a>";
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

