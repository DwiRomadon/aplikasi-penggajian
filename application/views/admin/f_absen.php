<?php
 $username = $this->session->userdata('admin_user'); ?>



   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Rekap Absen Mahasiswa</b>
                                    
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
		    
		
        
$q_cek	= $otherdb->query("SELECT kdmk, count(kdmk) As jumlah FROM absenmhs20171 where npm = '$username' group by kdmk " )->result();
				?>
	

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
            <th>Kode Mata Kuliah</th>
            <th>Jumlah Kehadiran</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($q_cek)) {
			echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
$no 	= 1;
			foreach ($q_cek as $b) {
			
		?>
		<tr>
        	<td><?php echo $no ;?></td>
			<td><?php echo $b->kdmk ; ?></td>
            <td><?php echo $b->jumlah ;?><?php $no++; }}?></td>
         
		</tr>

	</tbody>
</table>


	</div>
	
	
	
	</div>
	

