
<?php $username = $this->session->userdata('admin_user'); ?>
<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {

	$act				= "act_edt";
	$alamat				= $datpil->almtinggal;
	$telepon		= $datpil->tlp;
	$tempat			= $datpil->tplhrmsmhs;
	$lahir				= $datpil->tglhrmsmhs;

	
}
else
{
	$alamat				= "aa";
	$telepon		= "aa";
	$tempat			= "aa";
	$lahir				= "aa";

}



?>
   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Ubah Biodata</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/ubah_biodata/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">

	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
        <tr>
          <td > Alamat Tinggal</td>
          <td  ><input type=text name='alamat' class="form-control" value="<?php echo $alamat;?>" /></td>
          </tr>
          
           <tr>
          <td > Telephone</td>
          <td  ><input type=text name='telepon' class="form-control" value="<?php echo $telepon;?>" /></td>
          </tr>
          
           <tr>
          <td > Tempat Lahir</td>
          <td  ><input type=text name='tempat' class="form-control" value="<?php echo $tempat;?>" /></td>
          </tr>
          
           <tr>
          <td > Tanggal lahir</td>
          <td  ><input type=date name='tgl' class="form-control" value="<?php echo $lahir;?>" /></td>
          </tr>
        
        
        	
			
			
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/profil" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
	</form>
