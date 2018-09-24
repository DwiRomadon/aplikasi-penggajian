<?php

	$otherdb = $this->load->database('otherdb', TRUE);
						 
	$q_cek17	= $otherdb->query("SELECT kdpstmsmhs,nmmhsmsmhs FROM msmhs WHERE nimhsmsmhs = '$NPM' ");
	$j_cek17	= $q_cek17->num_rows();
	$d_cek17	= $q_cek17->row();
				//echo $this->db->last_query();
				if($j_cek17 == 1) {
					$prodi	= $d_cek17->kdpstmsmhs; 
					$username = $NPM; 
					$nama	= $d_cek17->nmmhsmsmhs; 
					
					$kodeprodi = $prodi;
					
					  if ($kodeprodi == "61201")
				  {
					  $programstudi = "Manajemen";
					  $fakultas = "F. Ekonomi dan Bisnis";
				  }
				  else if ($kodeprodi == "62201")
				  {
					  $programstudi = "Akuntansi";
					  $fakultas = "F. Ekonomi dan Bisnis";
				  }
				  else if ($kodeprodi == "74201")
				  {
					  $programstudi = "Ilmu Hukum";
					  $fakultas = "Fakultas Hukum";
				  }
				  else if ($kodeprodi == "63201")
				  {
					  $programstudi = "Ilmu Administrasi Negara";
					  $fakultas = "F I S I P";
				  }
				   else if ($kodeprodi == "63211")
				  {
					  $programstudi = "Ilmu Administrasi Bisnis";
					  $fakultas = "F I S I P";
				  }
				  else if ($kodeprodi == "70201")
				  {
					  $programstudi = "Ilmu Komunikasi";
					  $fakultas = "F I S I P";
				  }
				  else if ($kodeprodi == "22201")
				  {
					  $programstudi = "Teknik Sipil";
					  $fakultas = "F. Teknik";
				  }
				   else if ($kodeprodi == "21201")
				  {
					  $programstudi = "Teknik Mesin";
					  $fakultas = "F. Teknik";
				  }
					else if ($kodeprodi == "23201")
				  {
					  $programstudi = "Arsitektur";
					  $fakultas = "F. Teknik";
				  }
					else if ($kodeprodi == "57201")
				  {
					  $programstudi = "Sistem Informasi";
					  $fakultas = "F. Ilmu Komputer";
				  }
				   else if ($kodeprodi == "55201")
				  {
					  $programstudi = "Informatika";
					  $fakultas = "F. Ilmu Komputer";
				  }
				   else if ($kodeprodi == "88203")
				  {
					  $programstudi = "Pendidikan. B. Iggris";
					  $fakultas = "F K I P";
				  }
				  else
				  {
					  $programstudi = "NULL";
					  $fakultas = "NULL";
				  }
						
					
				
				}
				
				else
				
				{
					
			$mksks = 0;
				}


?>



   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Transkrip Mahasiswa</b>
                                    
                                    <? 
									

									echo $username;

									?>
                                    
                                     <div class="text-right" style="margin-top: 10px;">
               
                </div>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    

	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		 <?php
		$otherdb = $this->load->database('otherdb', TRUE);
		
		echo "NPM  Mahasiswa :".$username."<br>";
		echo "Nama Mahasiswa :".$nama."<br>";
		echo "Program Studi  :".$programstudi."<br>";
		echo "Fakultas	     :".$fakultas."<br><br><br>";
		
		
		    
		
        
				?>
	



<?php 
$tahun = substr($username,0,2);
$th = substr(date("Y"),-2);

$limit = $th - $tahun;
if ($limit > 7)
{
$limit = 7;	
}

	$bobotskskum = 0;
$totalskskum	= 0;
$skstempuh=0;
$bobottempuh=0;
?>

<?php 
for ($x = 0; $x <= $limit; $x++) {


    for ($y = 1; $y <= 2; $y++) {
	
    $namatabel =  "trnlm20".$tahun.$y;
	

if(is_null($otherdb->query("SHOW TABLES LIKE '{$namatabel}'")->row()))
{
  
}
else
{	
$data		= $otherdb->query("SELECT * FROM $namatabel WHERE nimhstrnlm = '$username' AND nlakhtrnlm != 'T' ")->result();
					if (empty($data)) {
					
				} else {
	?>
      Tahun Akademik : 20<?php echo $tahun ?>-<?php echo $y ?>
     
    <table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
            <th>Kode Matakuliah</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Nilai / Bobot</th>

            
      
         	</tr>
	</thead>
	
	<tbody>
    <?php
				}
		$data		= $otherdb->query("SELECT * FROM $namatabel WHERE nimhstrnlm = '$username' AND nlakhtrnlm != 'T' ")->result();
					if (empty($data)) {
					
				} else {
					$bobotsks = 0;
$totalsks	= 0;
					$no 	= 1;
					foreach ($data as $b) {
						
				  $kodeprodi = $b->kdpsttrnlm;
				   if ($kodeprodi == "61101")
				  {
					  $programstudi = "Magister Manajemen";
					  $fakultas = "Program Pascasarjana";
				  }
				   else if ($kodeprodi == "74101")
				  {
					  $programstudi = "Magister Hukum";
					  $fakultas = "Program Pascasarjana";
				  }
				  else if ($kodeprodi == "22101")
				  {
					  $programstudi = "Magister Teknik";
					  $fakultas = "Program Pascasarjana";
				  }
				 else if ($kodeprodi == "63101")
				  {
					  $programstudi = "Magister Ilmu. Administrasi";
					   $fakultas = "Program Pascasarjana";
				  }
				 else if ($kodeprodi == "61201")
				  {
					  $programstudi = "Manajemen";
					  $fakultas = "F. Ekonomi dan Bisnis";
				  }
				  else if ($kodeprodi == "62201")
				  {
					  $programstudi = "Akuntansi";
					  $fakultas = "F. Ekonomi dan Bisnis";
				  }
				  else if ($kodeprodi == "74201")
				  {
					  $programstudi = "Ilmu Hukum";
					  $fakultas = "Fakultas Hukum";
				  }
				  else if ($kodeprodi == "63201")
				  {
					  $programstudi = "Ilmu Administrasi Negara";
					  $fakultas = "F I S I P";
				  }
				   else if ($kodeprodi == "63211")
				  {
					  $programstudi = "Ilmu Administrasi Bisnis";
					  $fakultas = "F I S I P";
				  }
				  else if ($kodeprodi == "70201")
				  {
					  $programstudi = "Ilmu Komunikasi";
					  $fakultas = "F I S I P";
				  }
				  else if ($kodeprodi == "22201")
				  {
					  $programstudi = "Teknik Sipil";
					  $fakultas = "F. Teknik";
				  }
				   else if ($kodeprodi == "21201")
				  {
					  $programstudi = "Teknik Mesin";
					  $fakultas = "F. Teknik";
				  }
					else if ($kodeprodi == "23201")
				  {
					  $programstudi = "Arsitektur";
					  $fakultas = "F. Teknik";
				  }
					else if ($kodeprodi == "57201")
				  {
					  $programstudi = "Sistem Informasi";
					  $fakultas = "F. Ilmu Komputer";
				  }
				   else if ($kodeprodi == "55201")
				  {
					  $programstudi = "Informatika";
					  $fakultas = "F. Ilmu Komputer";
				  }
				   else if ($kodeprodi == "88203")
				  {
					  $programstudi = "Pendidikan. B. Iggris";
					  $fakultas = "F K I P";
				  }
				  else
				  {
					  $programstudi = "NULL";
					  $fakultas = "NULL";
				  }
				  
				  
				  
				  
				$otherdb = $this->load->database('otherdb', TRUE);
						 
				$q_cek1	= $otherdb->query("SELECT Nama_MK,SKS FROM matakuliah WHERE Kode_MK = '$b->kdmktrnlm' AND JurusanKd = '$prodi' ");
				
				
				$j_cek1	= $q_cek1->num_rows();
				$d_cek1	= $q_cek1->row();
				//echo $this->db->last_query();
				
				if($j_cek1 == 1) {
					$namamk	= $d_cek1->Nama_MK;  
					$sksmk	    = $d_cek1->SKS;  
					
					$sks1 = $d_cek1->SKS;
				$mksks = $sks1*$b->bobottrnlm;
				
				$skstempuh = $skstempuh + $sksmk;
				$bobottempuh = $bobottempuh + $mksks;
				
				}
				
				else
				
				{
					
			$mksks = 0;
				}
				
				
				$bobotsks = $bobotsks + $mksks;
			$totalsks = $totalsks + $sks1;	
			
$bobotskskum = $bobotskskum+$bobotsks;
$totalskskum = $totalskskum + $totalsks ;		
					
				?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $b->kdmktrnlm;?></td>
					<td><?php echo $namamk;?></td>
					<td><?php echo $sksmk;?></td>
					<td><?php echo $b->nlakhtrnlm;?> / <?php echo $b->bobottrnlm;?></td>

					
						
				</tr>
				<?php 
					$no++;
					}
					$ipk =$bobotsks /$totalsks; 

					}
					
					
				?>
			</tbody>
		</table>
        
        
      <?php $data		= $otherdb->query("SELECT * FROM $namatabel WHERE nimhstrnlm = '$username' ")->result();
					if (empty($data)) {
					
				} else {
					
					echo "IPS Anda : ".number_format($ipk,2) ;$ipk = 0;}?> <br><br>
        
        <?php
			
} 

	}


	$tahun = $tahun+1;
	
} 


echo "Total SKS anda ".$skstempuh."<br>";
echo "IPK Anda ".number_format($bobottempuh/$skstempuh,2);
?>
   

	</div>
	
	
	
	</div>
	

