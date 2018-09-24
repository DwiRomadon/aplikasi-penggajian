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
	
<?php echo "Tahun akademik ".$namatabel;?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Prodi</th>
            <th>Kode Mk/NamaMK</th>
            <th>kelas</th>
            <th>Jumlah Masuk</th>
            <th>Jumlah Absen</th>
            
      
         	</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= 1;
			$totalabs = 0;
			
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
		         
		$q_cek	= $otherdb->query("SELECT Nama_MK,SKS,Kode_MK FROM matakuliah WHERE Kode_MK = '$b->kdmk' AND jurusanKd = '$b->kdprodi'  ");
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
            <td><?php echo $b->nidn;?></a></td>
            <td><?php echo $namadosen;?></td>
            <td><?php echo $programstudi;?></td>
            <td><?php echo $b->kdmk;?> / <?php echo $namamk;?> / <?php echo $sksmk;?> </td>
            <td><?php echo $b->kelas;?></td>
            <td><?php echo $b->jumlah;?></td>
            <?php $jumlahabsen = $b->jumlah * $poinmk ;?>
            <td><?php echo $jumlahabsen ;?></td>
            <?php $totalabs = $totalabs + $jumlahabsen; ?>
           		
		</tr>
		<?php 
			$no++;
			}}
			
			
		?>
	</tbody>
</table>

<?php echo "Total Poin Absen =".$totalabs ; ?>

</div>
