<center><h2>Data User</h2></center>
<a href="?page=user&action=tambah"><button class="btn btn-success"><i class="fa fa-plus"> Tambah data User</i></button></a>
<form action="" method="post">
<table class="table">
	<tr>
        <th>No.</th>
		<th>Username</th>
		<th>Password</th>
		<th>No.Hp</th>
		<th>Email</th>
		<th>Opsi</th>
	</tr>

<?php
$batas = 3;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";

if ( empty( $pg ) ) {
    $posisi = 0;
    $pg = 1;
} else {
    $posisi = ( $pg - 1 ) * $batas;
}

$sql = mysql_query("SELECT * FROM administrator where level='user' limit $posisi, $batas");
$no = 1+$posisi;
while ( $r = mysql_fetch_assoc( $sql ) ) {
    ?>
	<tr><td><?= $no; ?></td>
		<td><?= $r['username']; ?></td>
		<td><?= $r['password']; ?></td>
		<td><?= $r['no_hp']; ?></td>
		<td><?= $r['email']; ?></td>
		
		<td><button class="btn btn-primary"><a href="?page=user&action=edit&username=<?php echo $r['username']; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Edit</button></a>
                <button class="btn btn-danger"><a onclick="return confirm('yakin ingin menghapus ?')" href="?page=user&action=hapus&id=<?php echo $r['username']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</button></a>
            </td>
	</tr>
	 <?php
    $no++;
}
?>
<tr>
    <td colspan="7">
        <?php
//hitung jumlah data
        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM administrator where level='user'"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

//Navigasi ke sebelumnya
if ( $pg > 1 ) {
    $link = $pg-1;
    $prev = "<a href='index.php?page=user&pg=$link'>Prev </a>";
} else {
    $prev = "Prev ";
}

//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){

    if ( $i == $pg ) {
        $nmr .= $i . " ";
    } else {
        $nmr .= "<a href='index.php?page=user&pg=$i'>$i</a> ";
    }
}

//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
    $link = $pg + 1;
    $next = " <a href='index.php?page=user&pg=$link'>Next</a>";
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