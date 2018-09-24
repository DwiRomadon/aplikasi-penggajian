<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {
	$act					= "act_edt";
	$idp					= $datpil->id;
	$Jenis					= $datpil->jenis;
	$IPK					= $datpil->IPK;
	$Poinpendidikan			= $datpil->poinpendidikan;
	$Poinpenelitian			= $datpil->poinpenelitian;
	$Poinpengabdian			= $datpil->poinpengabdian;
	$Beasiswa				= $datpil->beasiswa;


	
}
 else {
	$act					= "act_add";
	$Jenis					= "";
	$IPK					= "";
	$idp					= "";
	$Poinpendidikan			= "";
	$Poinpenelitian		= "";
	$Poinpengabdian	= "";
	$Beasiswa				= "";

} 




?>
   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Besaran Beasiswa</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/arsip_besar/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
         <tr>
          <td > Jenis Beasiswa</td>
          <td  ><input type=text name='Jenis' size='20' class="form-control" value="<?php echo $Jenis?>" /></td>
         </tr>
         
          <tr>
          <td > IPK</td>
          <td  ><input type=text name='IPK' size='20' class="form-control" value="<?php echo $IPK?>" /></td>
         </tr>
        
        
        <tr>
          <td > Poin akademik</td>
          <td  ><input type=text name='Poinpendidikan' size='20' class="form-control" value="<?php echo $Poinpendidikan?>" /></td>
         </tr>
         
          
        	<tr>
              <td>Poin Penelitian</td>
               <td  ><input type=text name='Poinpenelitian' size='20' class="form-control" value="<?php echo $Poinpenelitian?>" /></td>
               </tr>
               
               	<tr>
              <td>Poin Pengabdian</td>
               <td  ><input type=text name='Poinpengabdian' size='20' class="form-control" value="<?php echo $Poinpengabdian?>" /></td>
               </tr>
            
              <tr>
            <td>Beasiswa</td>
            <td colspan="2"><input name='Beasiswa' type="text" class="form-control" id="Beasiswa" value="<?php echo $Beasiswa?>" size='20' /></td>
          </tr>
            
         
			
			
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/arsip_besar" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
	</form>
