 <div class="row">
                <div class="col-md-10">
                    <h1 class="page-header"><center>Hasil Pencarian Olap Dosen</center></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                                        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data yang anda cari</center>
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                            <div class="table table-responsive">
                            <?php


$bagianWhere = "";

if (isset($_POST['kontrakCat']))
{
   $fd = $_POST['kontrak'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "status_kontrak = '$fd'";
   }
   {
   		 $bagianWhere .= " AND status_kontrak = '$fd'";
   }
}

if (isset($_POST['jjaCat']))
{
   $nim = $_POST['jja'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "JJA = '$nim'";
   }
   {
   		 $bagianWhere .= " AND JJA = '$nim'";
   }
}
if (isset($_POST['golCat']))
{
   $nim = $_POST['golongan'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "golongan = '$nim'";
   }
   {
   		 $bagianWhere .= " AND golongan = '$nim'";
   }
}
if (isset($_POST['tugas_tambahanCat']))
{
   $nim = $_POST['tugas'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tugas_tambahan = '$nim'";
   }
   {
   		 $bagianWhere .= " AND tugas_tambahan = '$nim'";
   }
}
if (isset($_POST['fakultasCat']))
{
   $nim = $_POST['fakultas'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "fakultas = '$nim'";
   }
   {
       $bagianWhere .= " AND fakultas = '$nim'";
   }
}
if (isset($_POST['prodiCat']))
{
   $nim = $_POST['prodi'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "prodi = '$nim'";
   }
   {
       $bagianWhere .= " AND prodi = '$nim'";
   }
}
if (isset($_POST['ijinCat']))
{
   $nim = $_POST['ijin_belajar'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "ijin_belajar = '$nim'";
   }
   {
       $bagianWhere .= " AND ijin_belajar = '$nim'";
   }
}
if (isset($_POST['pendidikanCat']))
{
   $nim = $_POST['pendidikan_terakhir'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "pendidikan_terakhir = '$nim'";
   }
   {
       $bagianWhere .= " AND pendidikan_terakhir = '$nim'";
   }
}
if (isset($_POST['tempatCat']))
{
   $nim = $_POST['tempat_pendidikan'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tempat_pendidikan = '$nim'";
   }
   {
       $bagianWhere .= " AND tempat_pendidikan = '$nim'";
   }
}
if (isset($_POST['sumberCat']))
{
   $nim = $_POST['sumber_dana'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "sumber_dana = '$nim'";
   }
   {
       $bagianWhere .= " AND sumber_dana = '$nim'";
   }
}
if (isset($_POST['sertifikasiCat']))
{
   $nim = $_POST['sertifikasi'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "sertifikasi_dosen = '$nim'";
   }
   {
       $bagianWhere .= " AND sertifikasi_dosen = '$nim'";
   }
}
if (isset($_POST['statusCat']))
{
   $nim = $_POST['status_dosen'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "status_dosen = '$nim'";
   }
   {
       $bagianWhere .= " AND status_dosen = '$nim'";
   }
}
if (isset($_POST['belajarCat']))
{
   $nim = $_POST['tugas_belajar'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tugas_belajar = '$nim'";
   }
   {
       $bagianWhere .= " AND tugas_belajar = '$nim'";
   }
}

?>
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                      <th>NIDN</th>
											<th>Nama Dosen</th>
											<th>Status Kontrak</th>
											<th>Tanggal Masuk</th>
											<th colspan="2">Opsi</th>
										
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                <?php
																error_reporting(0);
$no=0;
$query = "SELECT * FROM dosen WHERE ".$bagianWhere;
$hasil = mysql_query($query);
$r=mysql_num_rows($hasil);
if($r==0){
echo "
<div class='alert alert-danger' role='alert' style='font-size:14px;'><strong>Maaf..!!</strong> Data Yang Anda Cari Tidak Tersedia, harap coba lagi...!!!</div>
";
}
while ($r = mysql_fetch_array($hasil))
{
$no++;
?>
  <tr>
     <td><?= $no; ?></td>
		<td><?= $r['NIDN']; ?></td>
		<td><?= $r['nama_dosen']; ?></td>
		<td><?= $r['status_kontrak']; ?></td>
		<td><?= $r['tanggal_masuk']; ?></td>
    <td><button class="btn btn-warning"><a href="?page=dosen&action=detail&id=<?php echo $r['NIDN']; ?>"><i class="fa fa-eye" aria-hidden="true"></i> Detail</a></button></td>
        <td><button class="btn btn-primary"><a href="download_dosen.php?id=<?= $r['NIDN']; ?>"> Download </a></button></td>
    </td>
		
  
  </tr>
<?php 
}
?>
<tr>
  <td colspan="7"><button class="btn btn-deault"><a href="index.php?page=dosen&action=tabel_dosen">Cari Lagi</a></br></button>
                    <button class="btn btn-success"><a href="index.php"><i class="fa fa-home">Back To Home</i></a></button></td>
</tr>
                                  
                           
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    