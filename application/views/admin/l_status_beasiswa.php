  <?php $username = $this->session->userdata('admin_user');
  

				
				
   ?>
   
   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Status Beasiswa Anda</b>
                                    

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                    <form action="<?php echo base_URL(); ?>index.php/admin/arsip_beasiswa/cari" method="POST">
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
	

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5%">No</th>
            <th width="25%">Tahun Akademik / Semester</th>
			<th width="15%">IPK</th>
            <th width="20%">Poin Akademik</th>
            <th width="20%">Poin Non Akademik</th>
			<th width="15%">Beasiswa Anda</th>
		
		</tr>
	</thead>
	
	<tbody>
		<?php 
		
		$data		= $this->db->query("SELECT tahunakademik, semester, SUM(poin) AS point FROM t_pendidikan where npm = '$username' AND status = '1' GROUP BY tahunakademik,semester,npm")->result();
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
				
					$warna = "#000000";
					
				
			
		?>
		<tr>
        
        	<td><font color="<?php echo $warna ?>"> <?php echo $no ; ?> </td>
            <td><font color="<?php echo $warna ?>"><?php echo $b->tahunakademik."<br><i>".$b->semester."</i>";?></td>
             <td><font color="<?php echo $warna ?>"></td>
	  		<td><font color="<?php echo $warna ?>"><?php echo $b->point ;?></td>
            
            <?php
			
			$q_cek	= $this->db->query("SELECT SUM(poin) AS poinx FROM t_nonpendidikan where npm = '$username' AND status = '1' AND tahunakademik = '$b->tahunakademik' AND semester = '$b->semester' GROUP BY npm");
				$j_cek	= $q_cek->num_rows();
				$d_cek	= $q_cek->row();
				
        		if($j_cek == 1) 
				{
           		$total = $d_cek->poinx;
				}
				else
				{
				$total = "0";
				}
			
$q2_cek	= $this->db->query("SELECT max(beasiswa) as bs  FROM t_besar where poinakademik <= '$b->point' AND poinnonakademik <= '$total ' ");
				$j2_cek	= $q2_cek->num_rows();
				$d2_cek	= $q2_cek->row();
				
        		if($j2_cek == 1) 
				{
           		$bsa= $d2_cek->bs;
				}
				else
				{
				$bsa = "0";
				}
			
			
			?>
        	<td><font color="<?php echo $warna  ?>"><?php echo $total; ?></td>
         	 <td><font color="<?php echo $warna ?>"><?php echo $bsa; ?></td>
               
            
            </font>             	
                
		
			
		</tr>
		<?php 
			$no++;
			}
		}
		?>
	</tbody>
</table>

</div>
