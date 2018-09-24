   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Konsultasi Anda</b>
                                    
                                      <div class="text-right" style="margin-top: 10px;">
                 <a href="<?php echo base_URL(); ?>index.php/admin/key" class="btn btn-sm btn-info">Refresh Kegiatan<i class="fa fa-refresh"></i></a> 
                </div>
                
                                    
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                    <form action="<?php echo base_URL(); ?>index.php/admin/key/cari" method="POST">
                                        <div class="input-group">
                                        <input type='text' class="form-control input-sm pull-right" style="width: 150px;"  name='q' placeholder='Kata Kunci Pencarian...' required /> 
                                        <a href="<?php echo base_URL(); ?>index.php/admin/nlp/<?php echo $kode ?>/input/add" class="btn btn-sm btn-warning">Keyword Lainnya <i class="fa fa-arrow-circle-right"></i></a>
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
			<th width="20%">Kode Keyword</th>
            <th width="60%">Keyword</th>
	      
			<th width="20%">Aksi</th>
		</tr>
	</thead>
    Setting Keyword untuk informasi berikut ini <br>
	<?php echo $kode ." "; 
	
		$q_cek	= $this->db->query("SELECT informasi FROM t_info where kode_info = '$kode' ");
				$j_cek	= $q_cek->num_rows();
				$d_cek	= $q_cek->row();
				
        		if($j_cek == 1) {
           		echo $d_cek->informasi;
				}
				else
				{
				$total = 0;
				}
	
	
	
	
	?>
	<tbody>
		<?php 
		$no 	= 0;
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			
			foreach ($data as $b) {
				
				
				
					$warna = "#FF0000";
			
			
		?>
		<tr>
        
			<td><font color="<?php echo $warna ?>"> <?php echo $no ?> </td>        
        	
             <td><font color="<?php echo $warna ?>"><?php echo $b->keyword;?></td>
        
            
          
        
			<td class="ctr">
				
               
				<div class="btn-group">
                
            
					
				<a href="<?php echo base_URL()?>index.php/admin/nlp/<?php echo $kode ?>/<?php echo $b->keyword;?>/del " class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Delete</a>

					
				</div>	
                
			   
				  
				
				<?php 
				
				$no++;
				} ?> 
                
			</td>
		</tr>
		<?php 
			
			}
		{
			}
		?>
	</tbody>
</table>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
</div>
