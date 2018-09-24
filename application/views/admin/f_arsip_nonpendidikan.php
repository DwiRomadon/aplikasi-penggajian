<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {
	$act				= "act_edt";
	$idp				= $datpil->id;
	$tahunakademik		= $datpil->tahunakademik;
	$semester			= $datpil->semester;
	$kode				= $datpil->kode;
	$narasi			    = $datpil->narasi;
	$namakegiatan		= $datpil->namakegiatan;
	$tgl_kegiatan	    = $datpil->tgl_kegiatan;
	$penyelenggara		= $datpil->penyelenggara;
	$tempat			    = $datpil->tempat;
	$prestasi		    = $datpil->prestasi;
	$poin			    = $datpil->poin;
	
	
}
 else {
	$act			= "act_add";
	$idp			= "";
	$tahunakademik	= "";
	$semester		= "";
	$kode			= "";
	$narasi		    = "";
	$namakegiatan		= "";
	$tgl_kegiatan	    = "";
	$penyelenggara		= "";
	$tempat			    = "";
	$prestasi		    = "";
	$poin			    = "";

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
                                    <b>Kegiatan Akademik</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/arsip_nonpendidikan/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
        <tr>
          <td > Komponen Kegiatan</td>
          <td  ><input type=text name='kode' size='20' class="form-control" value="<?php echo $kode?>" /></td>
          <td  ><a href="<?php echo base_URL()?>index.php/admin/klas_pilihnonpendidikan"><img src="<?php echo base_url(); ?>aset/img/places_ic_search.png" width="44" height="36" /></a></td>
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
              <td colspan="3">DETAIL KEGIATAN<span style="text-align: center"></span></td>
          </tr>
          <tr>
            <td>Tanggal Kegiatan</td>
            <td colspan="2"><b>
              <input type="date" tabindex="6" name="tgl_kegiatan" required="required" value="<?php echo $tgl_kegiatan; ?>" id="tgl_kegiatan"  class="form-control" />
            </b></td>
          </tr>
          <tr>
            <td>Nama Kegiatan</td>
            <td colspan="2"><input name='namakegiatan' type="text" class="form-control" id="namakegiatan" value="<?php echo $namakegiatan?>" size='20' /></td>
          </tr>
          <tr>
            <td>Penyelenggara</td>
            <td colspan="2"><input name='penyelenggara' type="text" class="form-control" id="penyelenggara" value="<?php echo $penyelenggara?>" size='20' /></td>
          </tr>
          <tr>
            <td>Tempat Kegiatan</td>
            <td colspan="2"><input name='tempat' type="text" class="form-control" id="tempat" value="<?php echo $tempat?>" size='20' /></td>
          </tr>
          <tr>
            <td>Prestasi</td>
            <td colspan="2"><select name="prestasi" class="form-control" required >
              <option value="">--</option>
              <option value='Juara Umum' selected>Juara Umum</option>
              <option value='Juara 1' selected>Juara 1</option>
              <option value='Juara 2' selected>Juara 2</option>
              <option value='Juara 3' selected>Juara 3</option>
              <option value='Juara Harapan' selected>Juara Harapan</option>
              <option value='Peserta' selected>Peserta</option>
              <option value='Panitia' selected>Panitia</option>
            </select></td>
          </tr>
          <tr>
           <td >narasi Arsip</td>
           <td colspan="2"><b>
             <textarea tabindex="4" name="narasi" required class="form-control" id="narasi"><?php echo $narasi; ?></textarea>
           </b></td>
		  </tr>
			
			
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/arsip_nonpendidikan" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
	</form>
