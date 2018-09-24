<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {
	$act				= "act_edt";
	$idp				= $datpil->idkonsul;
	$tahunakademik		= $datpil->tahunakademik;
	$semester			= $datpil->semester;
	$subjek				= $datpil->subjek;
	$isikonsul		    = $datpil->isikonsul;
	$kode  	= "2";

	
}
 else {
	$act			= "act_add";
	$idp			= "";
	$tahunakademik	= "";
	$semester		= "";
	$subjek			= "";
	$isikonsul	    = "";
	$kode          = "";
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
                                    <b>Konsultasi Kegiatan Akademik</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/arsip_konsultasi/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
        <tr>
          <td > Komponen Kegiatan</td>
          <td  ><input type=text name='kode' size='20' class="form-control" value="<?php echo $kode?>" /></td>
          <td  ><a href="<?php echo base_URL()?>index.php/admin/klas_pilihkonsultasi"><img src="<?php echo base_url(); ?>aset/img/places_ic_search.png" width="44" height="36" /></a></td>
          </tr>
        
        
        	<tr>
        	  <td>&nbsp;</td>
              
               <?php
		$q_cek	= $this->db->query("SELECT * FROM t_kegiatan WHERE Kode = '$kode'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
           
		   ?>
		
        	  <td colspan="3"><?php echo $d_cek->Komponen  ?> <?php echo " | Poin : " ?> <?php echo $d_cek->AngkaKredit ; } ?></td>
              <?
			  
		?>
      	  </tr>
          
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
              <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
              <td colspan="3">DETAIL KONSULTASI<span style="text-align: center"></span></td>
          </tr>
          <tr>
            <td>Subjek Konsultasi</td>
            <td colspan="2"><input name='subjek' type="text" class="form-control" id="subjek" value="<?php echo $subjek?>" size='20' /></td>
          </tr>
         
        
          <tr>
           <td >Isi Konsultasi</td>
           <td colspan="2"><b>
             <textarea tabindex="4" name="isikonsul" required class="form-control" id="narasi"><?php echo $isikonsul; ?></textarea>
           </b></td>
		  </tr>
			
			
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/arsip_konsultasi" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
	</form>
