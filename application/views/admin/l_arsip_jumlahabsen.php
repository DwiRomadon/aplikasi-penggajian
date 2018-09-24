   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Daftar Jumlah absen</b> <br>
                                     
                                    <button onClick="window.print();">Print</button>
                                    
                                  

                                </header>
                                   
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                 <a href="<?php echo base_URL(); ?>index.php/admin/arsip_inputpenggajian/simpans" class="btn btn-sm btn-info">Input ke Penggajian <i class="fa fa-arrow-circle-right"></i></a>
                              
                                    <div class="box-tools m-b-15">
                                    <form action="<?php echo base_URL(); ?>index.php/admin/arsip_pendidikan/cari" method="POST">
                                        <div class="input-group">
                                        <input type='text' class="form-control input-sm pull-right" style="width: 150px;"  name='q' placeholder='Kata Kunci Pencarian...' required /> 
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>    
                                    </div>
                                    
                                    


<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
	
	

<?php echo $this->session->flashdata("k");?>
	
<?php echo "Tahun akademik ".$namatabel;?> <br>
<?php echo "Absen dari  ".$tanggalawal;?> Hingga <?php echo "Absen dari  ".$tanggalakhir;?>
<?php $tabel = "absenngajar".$namatabel;?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Prodi</th>
            <th>Fakultas</th>
            <th>Jumlah Masuk</th>
            <th>Jumlah Total Absen</th>
            
      
         	</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= 1;
			foreach ($data as $b) {
				
		  $kodeprodi = $b->kdprodi;
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
		  
		  
	
		
		$otherdb = $this->load->database('otherdb', TRUE);
		         
		$q_cek1	= $otherdb->query("SELECT nmdostbdos FROM tbdos WHERE nidnntbdos = '$b->nidn' ");
		$j_cek1	= $q_cek1->num_rows();
		$d_cek1	= $q_cek1->row();
		//echo $this->db->last_query();
		
        if($j_cek1 == 1) {
			$namadosen	= $d_cek1->nmdostbdos;  

		}
		else
		{
			$namadosen = "Tidak ada Di Database";

		}
		  
		  
		
			
		?>
		<tr>
            <td><?php echo $no;?></td>
            <td><a href="<?php echo base_URL()?>index.php/admin/arsip_detailjumlahabsen/lihat/<?php echo $b->nidn;?>/<?php echo $namatabel;?>/<?php echo $tanggalawal;?>/<?php echo $tanggalakhir;?>" class="btn btn-success btn-sm"> <?php echo $b->nidn;?></a></td>
            <td><?php echo $namadosen;?></td>
            <td><?php echo $programstudi;?></td>
            <td><?php echo $fakultas;?></td>
            <td><?php echo $b->jumlah;?></td>
            <?php
			$datarin		= $otherdb->query("SELECT nidn,kdprodi,kdmk, count(nidn) as jumlah  FROM $tabel WHERE nidn = '$b->nidn' AND (tglabsen BETWEEN '$tanggalawal' AND '$tanggalakhir') group by nidn,kdmk order by nidn")->result();
			
			
					
			if (empty($datarin)) {
			$totalabs = 0;
		} else {
			
			$totalabs = 0;
			foreach ($datarin as $x) {
					  		  
		$otherdb = $this->load->database('otherdb', TRUE);
		         
		$q_cek	= $otherdb->query("SELECT Kode_MK, Nama_MK,SKS FROM matakuliah WHERE Kode_MK = '$x->kdmk' AND jurusanKd ='$x->kdprodi' ");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
		
		  if($j_cek == 1) {
			$kodemk = $d_cek->Kode_MK;  
			$namamk	= $d_cek->Nama_MK;  
			$sksmk	    = $d_cek->SKS; 
			
			if ($sksmk == 1 or $sksmk == 0 )
			{
				$poins = 2;
			}
			else
			{
			$poins = $sksmk;	
			}
			
			if ((substr($kodemk,0,2) == "UN") or ($kodemk == "TA0113") or ($kodemk == "TA0212") or ($kodemk == "TA0311") or ($kodemk == "TA0410") or ($kodemk == "TA0509") or ($kodemk == "TA0606") )
			{
				     $poins = 0;
			}
					
			$poinmk = $poins / 2 ;
							
		}
		else
		{
			$namamk = "Tidak ada Di Database";
			$sksmk	    = 0; 
			$poinmk = $sksmk ;
		}
			
		
		
             $jumlahabsen = $x->jumlah * $poinmk ;
             $totalabs = $totalabs + $jumlahabsen; 
			
			}
		}
			
		?>
			

            
            <td><?php echo $totalabs;?></td>
            
            <?php $this->db->query("INSERT INTO jumlahabsen VALUES ('$b->nidn','$totalabs')"); ?>
           		
		</tr>
		<?php 
			$no++;
			}}
			
			
		?>
	</tbody>
</table>

</div>
