   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Konsultasi Anda</b>
                                    
                                      <div class="text-right" style="margin-top: 10px;">
                 <a href="<?php echo base_URL(); ?>index.php/admin/kata" class="btn btn-sm btn-info">Refresh Kegiatan<i class="fa fa-refresh"></i></a> <a href="<?php echo base_URL(); ?>index.php/admin/kata/add" class="btn btn-sm btn-warning">Tambah Kegiatan <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                
                                    
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                    <form action="<?php echo base_URL(); ?>index.php/admin/kata/cari" method="POST">
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
			<th width="10%">NO</th>
            <th width="30%">Kata</th>
            <th width="30%">Kata Ganti</th>
            <th width="20%">Aksi</th>
	       
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
				
				
				
					$warna = "#FF0000";
			
			
		?>
		<tr>
        
        
			<td><font color="<?php echo $warna ?>"> <?php echo $b -> id ; ?> </td>  
			<td><font color="<?php echo $warna ?>"> <?php echo $b -> kata ; ?> </td>        
        	
             <td><font color="<?php echo $warna ?>"><?php echo $b->kata_ganti;?></td>
        
            
           
        
			<td class="ctr">
				
               
				<div class="btn-group">
					<a href="<?php echo base_URL()?>index.php/admin/kata/edt/<?php echo $b->kata?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
					<a href="<?php echo base_URL()?>index.php/admin/kata/del/<?php echo $b->kata?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
					<i class="icon-trash icon-white"> </i> Hapus</a>
				</div>	
			
                
			</td>
		</tr>
		<?php 
			$no++;
			}
		}
		?>
	</tbody>
</table>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
</div>
