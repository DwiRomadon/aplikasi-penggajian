   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Daftar Pengisi KRS</b> <br>
                                     
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
            <th>NPM</th>
            <th>Nama MHS</th>
            <th>Prodi</th>
            <th>Fakultas</th>
            <th>Program <br> R = Reg <br> N = Non Reg <br> K = KMH</th>
            <th>Tanggal Isi KRS</th>
            
      
         	</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= 1;
			foreach ($data as $b) {
				
		  $kodeprodi = $b->kdpsttrnlm;
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
		         
		$q_cek	= $otherdb->query("SELECT nmmhsmsmhs,shiftmsmhs FROM msmhs WHERE nimhsmsmhs = '$b->nimhstrnlm' ");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$nama	= $d_cek->nmmhsmsmhs;  
			$kdp	    = $d_cek->shiftmsmhs;  
		}
		  
		
			
		?>
		<tr>
            <td><?php echo $no;?></td>
            <td><a href="<?php echo base_URL()?>index.php/admin/arsip_detailkrs/lihat/<?php echo $b->nimhstrnlm;?>/<?php echo $namatabel;?>" class="btn btn-success btn-sm"> <?php echo $b->nimhstrnlm;?></a></td>
            <td><?php echo $nama;?></td>
            <td><?php echo $programstudi;?></td>
            <td><?php echo $fakultas;?></td>
            <td><?php echo $kdp;?></td>
            <td><?php echo $b->tglinputkrs;?></td>
            
           		
		</tr>
		<?php 
			$no++;
			}}
			
			
		?>
	</tbody>
</table>

</div>
