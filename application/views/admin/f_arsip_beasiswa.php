<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {
	$act				= "act_edt";
	$idp				= $datpil->idbayar;
	$tahunakademik		= $datpil->tahunakademik;
	$semester			= $datpil->semester;
	$jumlah		    = $datpil->jumlah;
	$perihal		= $datpil->perihal;
	$status  	= "2";

	
}
 else {
	$act			= "act_add";
	$idp			= "";
	$tahunakademik	= "";
	$semester		= "";
	$jumlah	    	= "";
	$perihal 		= "";
	$status         = "";
} 

if ($mode == "send")
{
	$kode =  $this->uri->segment(4);

}



?>
   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Pembayaran Kuliah</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/arsip_beasiswa/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
              
        
                 
        	<tr>
        	  <td>Tahun</td>
        	  <td colspan="3"><?php echo $tahunakademik ?>
      	    </td>
       	  </tr>
            <tr>
              <td>Semester</td>
              <td colspan="2"><?php echo $semester ?></td></tr>
            
          <tr>
             <td>Jumlah bayar</td>
              <td colspan="2">Rp. <?php echo $jumlah ?></td></tr>
          </tr>
                    <tr>
            <td>Bukti Bayar</td>
            <td colspan="2"><input type="file" tabindex="7" name="file_arsip" class="form-control" style="width: 200px" id="file_arsip"></td></tr>
          </tr>
         
        
          <tr>
           <td >Perihal</td>
           <td colspan="2"><b>
             <textarea tabindex="4" name="perihal" required class="form-control" id="perihal"><?php echo $perihal; ?></textarea>
           </b></td>
		  </tr>
			
			
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/arsip_beasiswa" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
	</form>
