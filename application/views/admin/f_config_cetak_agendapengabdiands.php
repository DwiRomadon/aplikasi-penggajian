<?php $username = $this->session->userdata('admin_user'); ?>


   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Lihat Data </b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form action="<?php echo base_url(); ?>/index.php/admin/arsip_pengabdiandsadmin/sem" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	

	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
       
        
        
                  
        	<tr>
        	  <td>Tahun</td>
        	  <td colspan="3"><select name="tahunakademik" class="form-control" required>
        	    <option value="">--</option>
        	    <?php 
			for ($i = 2010; $i <= (date('Y')); $i++) {
				$x = $i+1;
				if (date('Y') == $i) {
					
					echo "<option value='$i/$x' selected>$i/$x</option>";
				} else {
					echo "<option value='$i/$x'>$i/$x</option>";
				}
			}
			?>
      	    </select></td>
       	  </tr>
            <tr>
              <td>Semester</td>
              <td colspan="2"><select name="semester" class="form-control" required>
                <option value="">--</option>
                <option value='Ganjil' selected>Ganjil</option>
                <option value='Genap' selected>Genap</option>
            </select></td></tr>
            
          <tr>
            
          </tr>
          </tr>
            <tr>
              <td>Status</td>
              <td colspan="2"><select name="status" class="form-control" required>
                <option value="">--</option>
                <option value='1' selected>Di Setujui</option>
                <option value='0' selected>Tidak Di Setujui</option>
            </select></td></tr>
            
          <tr>
              <td colspan="3">&nbsp;</td>
          </tr>
          
			
			
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Lihat</button>
		<a href="<?php echo base_URL()?>index.php/admin/arsip_pengabdiandsadmin" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
	</form>
    
  
