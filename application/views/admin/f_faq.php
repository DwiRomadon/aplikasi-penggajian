<?php
$kategori		= $this->uri->segment(3);
$pertanyaan		= $this->uri->segment(4);

$q_cek	= $this->db->query("SELECT * FROM t_faq where id_faq = '$pertanyaan'");
				$j_cek	= $q_cek->num_rows();
				$d_cek	= $q_cek->row();
				
        		if($j_cek == 1) {
           		$jawaban = $d_cek->Jawaban;
				$tanya = $d_cek->Pertanyaan;
				}
				else
				{
				$jawaban = "";
				$tanya = "";
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
                                    

	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-10">
		<table width="84%" class="table-form">
        
             
        	<tr>
        	  <td>Kategori</td>
        	  <td colspan="3"><select name="kategorifaq" class="form-control" required onchange="document.location.href=this.value">
        	    <option value=""><?php echo $kategori ?></option>
        	    <?php 
				
				$q_cek	= $this->db->query("SELECT * FROM t_kategorifaq" )->result();
				
				if (empty($q_cek)) {
			echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
$no 	= 1;
			foreach ($q_cek as $b) { ?>
				<option value="<?php echo base_url(); ?>index.php/admin/faq/<?php echo $b->faqkategori ;?>"><?php echo $b->faqkategori ; ?></option>
                <?php		
						
				// echo "<option value='$b->faqkategori' selected>$b->faqkategori</option>";
				
				}
			}
			?>
      	    </select></td>
       	  </tr>
          
          
          
          
          <tr>
        	  <td>Pertanyaan</td>
        	  <td colspan="3"><select name="pertanyaan" class="form-control" required onchange="document.location.href=this.value">
        	    <option value=""><?php echo $tanya ; ?> </option>
        	    <?php 
				
				$k_cek	= $this->db->query("SELECT * FROM t_faq WHERE faqkategori = '$kategori'" )->result();
				
				if (empty($k_cek)) {
			echo "<option value=''>Data Tidak Ada</option>";
		} else {
$no 	= 1;
			foreach ($k_cek as $k) { ?>
				<option value="<?php echo base_url(); ?>index.php/admin/faq/<?php echo $kategori ;?>/<?php echo $k->id_faq ;?>"><?php echo $k->Pertanyaan ; ?></option>
                <?php		
						
				// echo "<option value='$b->faqkategori' selected>$b->faqkategori</option>";
				
				}
			}
			?>
      	    </select></td>
       	  </tr>
            
            <tr>
            </tr>
          <tr>
          <td>Jawaban </td>
              <td colspan="3"><b><?php echo $jawaban ; ?></b></td>
          </tr>
         
			
			
	
		</table>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

<textarea class="ckeditor" id="ckedtor"></textarea>

        
	</div>
	
	
	
	</div>
	

