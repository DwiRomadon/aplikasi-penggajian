<?php
error_reporting(0);
session_start();


include "class.ezpdf.php";
include "../koneksi.php";
include "rupiah.php";
  
$pdf = new Cezpdf();
 
// Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('fonts/Courier.afm');

$all = $pdf->openObject();

// Tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addJpegFromFile('logo.jpg',20,800,69);

// Teks di tengah atas untuk judul header
$pdf->addText(70, 820, 16,'<b>Sistem Informasi SDM Universitas Bandar Lampung</b>');
$pdf->addText(260, 800, 18,'<b>KARYAWAN</b>');
// Garis atas untuk header
$pdf->line(10, 795, 578, 795);

// Garis bawah untuk footer
$pdf->line(10, 50, 578, 50);
// Teks kiri bawah
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');


$bagianWhere = "";

if (isset($_GET['pendidikanCat']))
{
   $fd = $_GET['pendidikan'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "pendidikan_terakhir = '$fd'";
   }
   {
       $bagianWhere .= " AND pendidikan_terakhir = '$fd'";
   }
}

if (isset($_GET['statusCat']))
{
   $nim = $_GET['status'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "status_karyawan = '$nim'";
   }
   {
       $bagianWhere .= " AND status_karyawan = '$nim'";
   }
}
if (isset($_GET['unitCat']))
{
   $nim = $_GET['unit'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "unit_kerja = '$nim'";
   }
   {
       $bagianWhere .= " AND unit_kerja = '$nim'";
   }
}

 error_reporting(0);
$query = "SELECT * FROM karyawan WHERE ".$bagianWhere;
$hasil = mysql_query($query);
$jml = mysql_num_rows($hasil);

if ($jml !=""){
$i = 1;
while($r = mysql_fetch_array($hasil))
{
  
  $data[$i]=array('<b>No</b>'=>$i,
                  '<b>NIK</b>'=>$r[NIK],
                  '<b>Nama</b>'=>$r[nama_karyawan],
                  '<b>Pendidikan</b>'=>$r[pendidikan_terakhir],
                  '<b>Status</b>'=>$r[status_karyawan],
                  '<b>Tanggal Masuk </b>'=>$r[tanggal_masuk_ubl],
                  
                  
                  
                  );

  $i++;
}

$pdf->ezTable($data, '', '', '');



// Penomoran halaman
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  echo 'pdf erorr';
}

?>
