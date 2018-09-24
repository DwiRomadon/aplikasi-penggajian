<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {
	$act			= "act_edt";
	$idp			= $datpil->id;
	$Kode			= $datpil->Kode;
	$Unsur			= $datpil->Unsur;
	$Kegiatan		= $datpil->Kegiatan;
	$Komponen		= $datpil->Komponen;
	$Bukti		    = $datpil->Bukti;
	$AngkaKredit  	= $datpil->AngkaKredit;

	
}
 else {
	$act			= "act_add";
	$idp			= "";
	$Kode			= "";
	$Unsur			= "";
	$Komponen		= "";
	$Kegiatan		= "";
	$Bukti	    	= "";
	$AngkaKredit     = "";
} 




?>
   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Komponen Kegiatan Mahasiswa</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/arsip_komponen/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
        <tr>
          <td > Kode Kegiatan</td>
          <td  ><input type=text name='Kode' size='20' class="form-control" value="<?php echo $Kode?>" /></td>
         </tr>
         
          
        	<tr>
              <td>Unsur</td>
              <td colspan="2"><select name="Unsur" class="form-control" required>
                <option value="">--</option>
                <option value='PENDIDIKAN' selected>PENDIDIKAN</option>
                <option value='PENELITIAN' selected>PENELITIAN</option>
                <option value='PENGABDIAN' selected>PENGABDIAN</option>
            </select></td></tr>
            
              <tr>
            <td>Kegiatan</td>
            <td colspan="2"><input name='Kegiatan' type="text" class="form-control" id="Kegiatan" value="<?php echo $Kegiatan?>" size='20' /></td>
          </tr>
            
          <tr>
            <td>Komponen</td>
            <td colspan="2"><input name='Komponen' type="text" class="form-control" id="Kegiatan" value="<?php echo $Komponen?>" size='20' /></td>
          </tr>
          
        
          
         
         
        
          <tr>
           <td >Bukti</td>
           <td colspan="2"><b>
             <textarea tabindex="4" name="Bukti" required class="form-control" id="Bukti"><?php echo $Bukti; ?></textarea>
           </b></td>
		  </tr>
          
           <tr>
           <td >Angka Kredit</td>
        
                <td colspan="2"><input name='AngkaKredit' type="text" class="form-control" id="AngkaKredit" value="<?php echo $AngkaKredit?>" size='20' /></td>
           </td>
		  </tr>
			
			
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/arsip_komponen" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
	</form>
