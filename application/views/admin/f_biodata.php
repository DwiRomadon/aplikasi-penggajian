<?php
 $username = $this->session->userdata('admin_user'); ?>



   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Biodata Mahasiswa</b>
                                    
                                     <div class="text-right" style="margin-top: 10px;">
                 <a href="<?php echo base_URL(); ?>index.php/admin/profil" class="btn btn-sm btn-info">Refresh Kegiatan<i class="fa fa-refresh"></i></a> <a href="<?php echo base_URL(); ?>index.php/admin/ubah_biodata/edt" class="btn btn-sm btn-warning">Edit Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    

	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		 <?php
		$otherdb = $this->load->database('otherdb', TRUE);
		         
		$q_cek	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$username' ");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
           
	
		?>
        <table width="100%">
		
		
        
		<tr>
			<td width="35%" height="28" >Nama</td>
            <td width="65%" >: <?php echo $d_cek->nmmhsmsmhs ?> </td>
		</tr>
        <tr>
			<td width="35%" height="28" >NPM</td>
            <td width="65%" >: <?php echo $d_cek->nimhsmsmhs ?> </td>
		</tr>

    <tr>
			<td width="35%" height="33" >Alamat </td>
            <td width="65%" >:  <?php echo $d_cek->almtinggal?></td>
		</tr>
                 <tr>
			<td width="35%" height="33" >Telepon </td>
            <td width="65%" >:  <?php echo $d_cek->tlp ?></td>
		</tr>
        <tr>
			<td width="35%" height="33" >Tempat / Tgl Lahir </td>
            <td width="65%" >:  <?php echo $d_cek->tplhrmsmhs ?>/<?php echo $d_cek->tglhrmsmhs ?></td>
		</tr>
        
 
		
		

	
        
        </table>
        <?php
       
         }
		?>
	</div>
	
	
	
	</div>
	

