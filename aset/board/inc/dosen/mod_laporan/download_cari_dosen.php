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
$pdf->addText(260, 800, 18,'<b>DOSEN</b>');
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

if (isset($_GET['kontrakCat']))
{
   $fd = $_GET['kontrak'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "status_kontrak = '$fd'";
   }
   {
       $bagianWhere .= " AND status_kontrak = '$fd'";
   }
}

if (isset($_GET['jjaCat']))
{
   $nim = $_GET['jja'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "JJA = '$nim'";
   }
   {
       $bagianWhere .= " AND JJA = '$nim'";
   }
}
if (isset($_GET['golCat']))
{
   $nim = $_GET['golongan'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "golongan = '$nim'";
   }
   {
       $bagianWhere .= " AND golongan = '$nim'";
   }
}
if (isset($_GET['tugas_tambahanCat']))
{
   $nim = $_GET['tugas'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tugas_tambahan = '$nim'";
   }
   {
       $bagianWhere .= " AND tugas_tambahan = '$nim'";
   }
}
if (isset($_GET['fakultasCat']))
{
   $nim = $_GET['fakultas'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "fakultas = '$nim'";
   }
   {
       $bagianWhere .= " AND fakultas = '$nim'";
   }
}
if (isset($_GET['prodiCat']))
{
   $nim = $_GET['prodi'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "prodi = '$nim'";
   }
   {
       $bagianWhere .= " AND prodi = '$nim'";
   }
}
if (isset($_GET['ijinCat']))
{
   $nim = $_GET['ijin_belajar'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "ijin_belajar = '$nim'";
   }
   {
       $bagianWhere .= " AND ijin_belajar = '$nim'";
   }
}
if (isset($_GET['pendidikanCat']))
{
   $nim = $_GET['pendidikan_terakhir'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "pendidikan_terakhir = '$nim'";
   }
   {
       $bagianWhere .= " AND pendidikan_terakhir = '$nim'";
   }
}
if (isset($_GET['tempatCat']))
{
   $nim = $_GET['tempat_pendidikan'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tempat_pendidikan = '$nim'";
   }
   {
       $bagianWhere .= " AND tempat_pendidikan = '$nim'";
   }
}
if (isset($_GET['sumberCat']))
{
   $nim = $_GET['sumber_dana'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "sumber_dana = '$nim'";
   }
   {
       $bagianWhere .= " AND sumber_dana = '$nim'";
   }
}
if (isset($_GET['sertifikasiCat']))
{
   $nim = $_GET['sertifikasi'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "sertifikasi_dosen = '$nim'";
   }
   {
       $bagianWhere .= " AND sertifikasi_dosen = '$nim'";
   }
}
if (isset($_GET['statusCat']))
{
   $nim = $_GET['status_dosen'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "status_dosen = '$nim'";
   }
   {
       $bagianWhere .= " AND status_dosen = '$nim'";
   }
}
if (isset($_GET['belajarCat']))
{
   $nim = $_GET['tugas_belajar'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tugas_belajar = '$nim'";
   }
   {
       $bagianWhere .= " AND tugas_belajar = '$nim'";
   }
}
echo $bagianWhere;
 error_reporting(0);
$query = "SELECT * FROM dosen WHERE ".$bagianWhere;
$hasil = mysql_query($query);
$jml = mysql_num_rows($hasil);

if ($jml !=""){
$i = 1;
while($r = mysql_fetch_array($hasil))
{
  
  $data[$i]=array('<b>No</b>'=>$i,
                  '<b>Nama</b>'=>$r[nama_dosen],
                  
                  '<b>JJA</b>'=>$r[JJA],
                  '<b>Fakultas</b>'=>$r[fakultas],
                  
                  
                  
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
