
<div class="row">
	<div class="col-md-10">
		<h2>Data Tampil OLAP Karyawan</h2>
		<table class="table" border="1">
	
<?php
$x = @$_GET['x'];
$y = @$_GET['y']; 
?>	<tr bgcolor="gray">
		<th>No.</th>
		<th><?php echo $x ?></th>
		<th><?php echo $y ?></th>
		<th>Jumlah Data</th>
	</tr>
<?php
$batas = 6;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";

if ( empty( $pg ) ) {
    $posisi = 0;
    $pg = 1;
} else {
    $posisi = ( $pg - 1 ) * $batas;
}
$sql=mysql_query("SELECT *, COUNT( * ) as jumlah
FROM karyawan
GROUP BY $x,$y limit $posisi, $batas");
$no = 1+$posisi;
$data = [];

while($novan=mysql_fetch_array($sql)){
	$data[] = [
			'nama' => $novan[$x] . " " . $novan[$y],
			'jumlah' => $novan['jumlah'],
		];
?>
<tr>
	<td><?php echo $no ?></td>
	<td><?php echo $novan[$x] ?></td>
	<td><?php echo $novan[$y] ?></td>
	<td><?php echo $novan['jumlah'] ?></td>
</tr>
<?php
    $no++;
}
?>
<tr>
    <td colspan="7">
        <?php
//hitung jumlah data
        $x = @$_GET['x'];
		$y = @$_GET['y']; 
        $jml_data = mysql_num_rows(mysql_query("SELECT * , COUNT( * ) as jumlah
FROM karyawan
GROUP BY $x,$y"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

//Navigasi ke sebelumnya
if ( $pg > 1 ) {
    $link = $pg-1;
    $prev = "<a href='index.php?page=karyawan&action=cari_grafik&y=$y&x=$x&pg=$link'>Prev </a>";
} else {
    $prev = "Prev ";
}

//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){

    if ( $i == $pg ) {
        $nmr .= $i . " ";
    } else {
        $nmr .= "<a href='index.php?page=karyawan&action=cari_grafik&y=$y&x=$x&pg=$i'>$i</a> ";
    }
}

//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
    $link = $pg + 1;
    $next = " <a href='index.php?page=karyawan&action=cari_grafik&y=$y&x=$x&pg=$link'>Next</a>";
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

</table>
	</div>
	</div>
	<div class="row">
	<div class="col-md-10">
		<h2>Grafik data</h2>
		<div id="grafik"></div>
		<script>
// Menggunakan Morris.Line
/*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
Morris.Bar({
  element: 'grafik',
  parseTime: false,
  data: <?=json_encode($data);?>,
  xkey: 'nama',
  ykeys: ['jumlah'],
  labels: ['Jumlah']
});
</script> 
	</div>
</div>


