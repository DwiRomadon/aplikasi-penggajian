<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {
	$act				= "act_edt";
	//$idp				= $datpil->id;
	$kodeinfo			= $datpil->kode_info;
	$informasi			= $datpil->informasi;
	//$npm			= $datpil->npm;
	//$pembimbing			= $datpil->pembimbing;
	//$prodi		    = $datpil->prodi;
	//$judul		  	= $datpil->judul;

	
}
 else {
	$act			= "act_add";

	$kodeinfo				= "";
	$informasi				= "";
	//$npm			= "";
	//$pembimbing			= "";
	//$prodi		    = "";
	//$judul		  	= "";
} 




?>
   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Konsultasi Kegiatan Akademik</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/akademik/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	
	<input type="hidden" name="kode_info" value="<?php echo $kodeinfo; ?>">
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
       
        
        
        	<tr>
        	  <td>&nbsp;</td>
              
           
      	  </tr>
          
        	
          
            
          
         
          </tr>
          <tr>
              <td colspan="3">APLIKASI CHATBOOT<span style="text-align: center"></span></td>
          </tr>
            <tr>
            <td>Informasi</td>
            <td>
            <script type="text/javascript" src="<?php echo base_url();?>/template/ckeditor/ckeditor.js"></script>
            <textarea class="ckeditor" id="ckedtor" name='informasia' ><?php echo $informasi?></textarea>
            </td>
            
          </tr>
         
          
           <tr>
             <td>File Info</td>
             <td><b><input type="file" tabindex="7" name="fileinfo" class="form-control" id="file_arsip"></b></td>
             </tr>
  
          
          
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/akademik" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
	</form>
