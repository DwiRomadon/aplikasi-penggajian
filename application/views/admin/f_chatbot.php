<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {
	$act			= "act_edt";
	$idp			= $datpil->id;
	$npm			= $datpil->npm;
	$pesan			= $datpil->pesan;
	$waktu			= $datpil->waktu;
	
	//$pembimbing			= $datpil->pembimbing;
	//$prodi		    = $datpil->prodi;
	//$judul		  	= $datpil->judul;

	
}
 else {
	$act			= "act_add";
    $idp 			= "";
	$npm			= "";
	$pesan			= "";
	//$informasi				= "";
	
	//$pembimbing			= "";
	//$prodi		    = "";
	//$judul		  	= "";
} 




?>
   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Pesan Chatbot</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/chatbot/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	
	<input type="hidden" name="id" value="<?php echo $idp; ?>">
	
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
            <td>Pesan</td>
            <td colspan="2"><input name='pesana' type="text" class="form-control" id="subjek" value="<?php echo $pesan?>" size='20' /></td>
          </tr>
         
          
           
  
          
          
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Kirim</button>
		<a href="<?php echo base_URL()?>index.php/admin/chatbot/del" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Clear Chat</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
        
	</div>
	
	</div>
	
	</form>

<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
		
			
			foreach ($data as $b) {
				
				
				
					$warna = "#FF0000";
			
			
		?>
		<font color="<?php echo $warna ?>"> Saya :  <?php echo $b -> tanya ; ?>   <br>  
         <?php 
		 
		
		 
		 $key = $b -> tanya ;
		 
		  $jumlah = str_word_count($key);
		
		  
		  $pecah = explode(" ",$key);
		  
		  for ($x=0;$x < $jumlah ; $x++)
		  {
			
			
			$q_cek	= $this->db->query("SELECT * FROM t_setkey WHERE keyword like '$pecah[$x]' ");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
           
		      $jawab = "Maaf yang pertanyaan anda belum dapat kami tanggapi" ;
		   ?>
		
        	   <?php $idinfo = $d_cek->kode_info ;  ?>
               
               <?php
               
               $x_cek	= $this->db->query("SELECT * FROM t_info WHERE kode_info = '$idinfo'");
		$m_cek	= $x_cek->num_rows();
		$t_cek	= $x_cek->row();
		//echo $this->db->last_query();
		
        if($m_cek == 1) {
           
		   $jawab = $t_cek->informasi ; } 
			   
			  
			   ?>
		 
		 
		 
       <font color="<?php $warna = "#000000"; echo $warna ?>">  Kami :  <?php echo $jawab ; ?> <br> 
        	<?php }
			
			
			
			}
			
			  
		  
		  
			}
		 }?>