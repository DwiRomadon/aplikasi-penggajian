<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {
	$act				= "act_edt";
	$idp				= $datpil->idkonsul;
	$tahunakademik		= $datpil->tahunakademik;
	$semester			= $datpil->semester;
	$surat				= $datpil->surat;
	$perihal		    = $datpil->perihal;
	$kode  	= "2";

	
}
 else {
	$act			= "act_add";
	$idp			= "";
	$tahunakademik	= "";
	$semester		= "";
	$surat			= "";
	$perihal	    = "";
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
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/arsip_administrasi/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
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
              <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
              <td colspan="3">DETAIL KONSULTASI<span style="text-align: center"></span></td>
          </tr>
          <tr>
            <td>Subjek Konsultasi</td>
            <td colspan="2"><select name="surat" class="form-control" required>
                <option value="">--</option>
                <option value='Surat Keputusan' selected>Surat Keputusan</option>
                <option value='Surat Tugas' selected>Surat Tugas</option>
                <option value='Surat Keterangan Lulus' selected>Surat Keterangan Lulus</option>
                <option value='Surat Keterangan Kuliah' selected>Surat Keterangan Kuliah</option>
                <option value='Surat Pengantar Transkrip' selected>Surat Pengantar Transkrip</option>
                <option value='Surat Izin Penelitian' selected>Surat Keterangan Kuliah</option>
                <option value='Surat Cuti Kuliah' selected>Surat Cuti Kuliah</option>
                <option value='Surat Izin Mata Kuliah' selected>Surat Izin Mata Kuliah</option>
                <option value='Surat Pindah Program Studi' selected>Surat Pindah Program Studi</option>
                <option value='Surat Rekomendasi Beasiswa' selected>Surat Rekomendasi Beasiswa</option>
            </select></td></tr>
          </tr>
         
        
          <tr>
           <td >Perihal</td>
           <td colspan="2"><b>
             <textarea tabindex="4" name="perihal" required class="form-control" id="narasi"><?php echo $perihal; ?></textarea>
           </b></td>
		  </tr>
			
			
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/arsip_administrasi" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
	</form>
