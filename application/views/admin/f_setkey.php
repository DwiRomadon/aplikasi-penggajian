<?php
$mode		= $this->uri->segment(3);


if ($mode == "edt" || $mode == "act_edt") {
	$act				= "act_edt";
	//$idp				= $datpil->id;
	$keyword			= $datpil->keyword;
	//$informasi			= $datpil->informasi;
	//$npm			= $datpil->npm;
	//$pembimbing			= $datpil->pembimbing;
	//$prodi		    = $datpil->prodi;
	//$judul		  	= $datpil->judul;

	
}
 else {
	$act			= "act_add";

	$keyword				= "";
	//$informasi				= "";
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
                                    <b>Input Keyword Lainnya</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
                                    <?php echo $kode ." "; 
	
		$q_cek	= $this->db->query("SELECT informasi FROM t_info where kode_info = '$kode' ");
				$j_cek	= $q_cek->num_rows();
				$d_cek	= $q_cek->row();
				
        		if($j_cek == 1) {
           		echo $d_cek->informasi;
				}
				else
				{
				$total = 0;
				}
	
	
	
	
	?>
                                    
	
	<form action="<?php echo base_URL()?>index.php/admin/nlp/<?php echo $kode ?>/input/otheradd" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
	
	
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
       
        
        
        	<tr>
        	  <td>&nbsp;</td>
              
           
      	  </tr>
          
        	
          
            
          
         
          </tr>
          <tr>
              <td colspan="3">Tambah Keyword<span style="text-align: center"></span></td>
          </tr>
            <tr>
            <td>Keyword</td>
            <td colspan="2"><input name='keywordo' type="text" class="form-control" id="subjek" value="<?php echo $keyword?>" size='20' /></td>
          </tr>
         
          
           
  
          
          
		<tr><td colspan="3">
		<br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL()?>index.php/admin/nlp/<?php echo $kode ?> " tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">

		
           			
		</table>
	</div>
	
	</div>
	
    
    <table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="20%">Kode Keyword</th>
            <th width="60%">Keyword</th>
	      
			<th width="20%">Aksi</th>
		</tr>
	</thead>
    
	
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
				
				
				
					$warna = "#FF0000";
			
			
		?>
		<tr>
        
			<td><font color="<?php echo $warna ?>"> <?php echo $b -> kode_keyword ; ?> </td>        
        	
             <td><font color="<?php echo $warna ?>"><?php echo $b->keyword;?></td>
        
            
          
        
			<td class="ctr">
				
               
				<div class="btn-group">
                
                <?php
                
                $b_cek	= $this->db->query("SELECT keyword FROM t_setkey where kode_info = '$kode' and keyword = '$b->keyword' ");
				$l_cek	= $b_cek->num_rows();
				$k_cek	= $b_cek->row();
				
        		if($l_cek == 1) {
					?>
           		<div class="label label-danger">No Action</div>
                <?php
				}
				else
				{
					?>
					
				<a href="<?php echo base_URL()?>index.php/admin/nlp/<?php echo $kode ?>/<?php echo $b->keyword;?>/act_add " class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Set Keyword</a>
<?php
				}
				
				?>
					
				</div>	
                
			   
				  
				
				<?php } ?> 
                
			</td>
		</tr>
		<?php 
			$no++;
			}
		{
			}
		?>
	</tbody>
</table>

	</form>
