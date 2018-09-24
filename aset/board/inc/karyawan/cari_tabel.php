 <div class="row">
                <div class="col-md-10">
                    <h1 class="page-header"><center>Hasil Pencarian Olap Dosen</center></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">
                                        
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
?>
                            
     <form action="download_cari_karyawan.php" method="post">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                            <th>NIK</th>
                      <th>Nama Karyawan</th>
                      <th>Pendidikan Terakhir</th>
                      <th>Status Karyawan</th>
                      <th>Tanggal Masuk UBL</th>
                      <th>Unit Kerja</th>
                      <th>Opsi</th>
                      
                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                <?php
                                error_reporting(0);
$no=0;
$query = "SELECT * FROM karyawan WHERE ".$bagianWhere;
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
    <td><?= $r['NIK']; ?></td>
    <td><?= $r['nama_karyawan']; ?></td>
    <td><?= $r['pendidikan_terakhir']; ?></td>
    <td><?= $r['status_karyawan']; ?></td>
    <td><?= $r['tanggal_masuk_ubl']; ?></td>
    <td><?= $r['unit_kerja']; ?></td>
    
         <td><button class="btn btn-primary"><a href="download_karyawan.php?id=<?= $r['NIK']; ?>"> Download </a></button></td>
       
 </td>
    
  
  </tr>
<?php 
}
?>
                                  
                      
                              </form>   
                              <tr>
                                <td colspan="8"> <button class="btn btn-deault"><a href="index.php?page=karyawan&action=tabel_karyawan">Cari Lagi</a></br></button>
                    <button class="btn btn-success"><a href="index.php"><i class="fa fa-home">Back To Home</i></a></button> </td>
                              </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
         
 <?php 
    $fd = $_GET['pendidikan'];
   if ($fd !=''){
     $bagianWhere1 .= "pendidikan_terakhir = '$fd'";
   }

   $fd = $_GET['status'];
   if ($fd !=''){
     $bagianWhere1 .= "status_karyawan = '$fd'";
   }

   $fd = $_GET['unit'];
   if ($fd !=''){
     $bagianWhere1 .= "unit_kerja = '$fd'";
   }
     ?>
