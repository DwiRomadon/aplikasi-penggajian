<?php
$username = $this->session->userdata('admin_user');
$nama = $this->session->userdata('admin_nama');
?>
   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Ganti Photo Profil</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
       
       
	
	<form action="<?php echo base_URL()?>index.php/admin/gantiphoto" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<input type="hidden" name="username" value="<?php echo $username; ?>">
    <input type="hidden" name="nama" value="<?php echo $nama; ?>">

	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="100%" class="table-form">

            <tr><td width="20%">Pilih Photo</td><td><b><input type="file" tabindex="7" name="photo" class="form-control" style="width: 200px" id="photo"></b></td></tr>	
            <tr><td>	
		<button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button></td><td>
		<a href="<?php echo base_URL()?>index.php/admin/" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		
	</div>
	
	</div>
	
	</form>
