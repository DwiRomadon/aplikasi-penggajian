<style type="text/css">
.clearfix .alert.alert-dismissable.alert-success table tr td {
	text-align: left;
}
.clearfix .alert.alert-dismissable.alert-success table {
	font-size: 14px;
	text-align: left;
}
.clearfix .alert.alert-dismissable.alert-success #printableArea table tr td p {
	font-size: 18px;
}
.clearfix .alert.alert-dismissable.alert-success #printableArea table tr td p {
	text-align: center;
}
</style>
      <div class="clearfix">







<?php $username = $this->session->userdata('admin_user'); 
$kodeprodi = $this->session->userdata('admin_prodi'); 

$a_cek	= $this->db->query("SELECT * FROM t_pembayaran where npm = '$username' AND status = '2' ORDER BY tgl DESC");
				$b_cek	= $a_cek->num_rows();
				$c_cek	= $a_cek->row();
				
        		if($b_cek  >= 1) {
           		$tahun = $c_cek->tahunakademik;
				$semester = $c_cek->semester;
				}
				else
				{
				$tahun = "";
				$semester = "";
				}


?>




		<div class="alert">
        
        <?php
		 $otherdb = $this->load->database('otherdb', TRUE);
		 $q_cek		= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$NPM' ");	
		 $j_cek	= $q_cek->num_rows();
		 $d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			
			$kodeprodi = $d_cek->kdpstmsmhs;
			 
		$q_cek1	= $this->db->query("SELECT * FROM t_mahasiswa WHERE username = '$NPM' ");
		$j_cek1	= $q_cek1->num_rows();
		$d_cek1	= $q_cek1->row();
		//echo $this->db->last_query();
		
        if($j_cek1 == 1) {
			$photo = $d_cek1->photo;
		}
		else
		{
			$photo = "biancal.jpg";
		}
           
	
		?>
           
	
		
        
           <div id="printableArea">
           
        <table width="379" border="0" background="<?php echo base_url();?>aset/img/bgktm.png" background-repeat: no-repeat>
         
           <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
           <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><p></p></td>
          </tr>
          <tr>
            <td width="107" rowspan="5">   <img src="http://ublapps.ubl.ac.id/student/upload/foto_profil/<?php echo $photo; ?>" width="90" height="86" class="thumbnail span3" style="display: inline; float: right; margin-right: px; width: 100px; height: 100px" /></td>
            <td width="147"><?php echo $d_cek->nmmhsmsmhs ?></td>
            <td width="111" rowspan="5"><img src="<?php echo base_url();?>upload/qrcodektm/<?php echo $NPM; ?>.png" width="100" height="100" class="thumbnail span3" style="display: inline; float: left; margin-right: 0px; width: 100px; height: 100px" /></td>
          </tr>
          <tr>
            <td><?php echo $NPM?></td>
          </tr>
          <?php
		  if ($kodeprodi == "61201")
		  {
			  $programstudi = "Manajemen";
			  $fakultas = "F. Ekonomi dan Bisnis";
		  }
		  else if ($kodeprodi == "62201")
		  {
			  $programstudi = "Akuntansi";
			  $fakultas = "F. Ekonomi dan Bisnis";
		  }
		  else if ($kodeprodi == "74201")
		  {
			  $programstudi = "Ilmu Hukum";
			  $fakultas = "Fakultas Hukum";
		  }
		  else if ($kodeprodi == "63201")
		  {
			  $programstudi = "Ilmu Administrasi Negara";
			  $fakultas = "F I S I P";
		  }
		   else if ($kodeprodi == "63211")
		  {
			  $programstudi = "Ilmu Administrasi Bisnis";
			  $fakultas = "F I S I P";
		  }
		  else if ($kodeprodi == "70201")
		  {
			  $programstudi = "Ilmu Komunikasi";
			  $fakultas = "F I S I P";
		  }
		  else if ($kodeprodi == "22201")
		  {
			  $programstudi = "Teknik Sipil";
			  $fakultas = "F. Teknik";
		  }
		   else if ($kodeprodi == "21201")
		  {
			  $programstudi = "Teknik Mesin";
			  $fakultas = "F. Teknik";
		  }
		    else if ($kodeprodi == "23201")
		  {
			  $programstudi = "Arsitektur";
			  $fakultas = "F. Teknik";
		  }
		    else if ($kodeprodi == "57201")
		  {
			  $programstudi = "Sistem Informasi";
			  $fakultas = "F. Ilmu Komputer";
		  }
		   else if ($kodeprodi == "55201")
		  {
			  $programstudi = "Informatika";
			  $fakultas = "F. Ilmu Komputer";
		  }
		   else if ($kodeprodi == "88203")
		  {
			  $programstudi = "Pendidikan. B. Iggris";
			  $fakultas = "F K I P";
		  }
		  else
		  {
			  $programstudi = "NULL";
			  $fakultas = "NULL";
		  }
		  
		  
		  
		  
		  
		  ?>
		  
          <tr>
            <td><?php echo $programstudi ?></td>
          </tr>
          <tr>
            <td><?php echo $fakultas ?></td>
          </tr>
         
          <tr>
          
            <td colspan="3">&nbsp;</td>
          </tr>
           <tr>
            <td colspan="3">&nbsp;&nbsp;Berlaku Hingga <?php echo $tahun; ?>/<?php echo $semester; ?></td>
          </tr>
           <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
        </table>
        <p>
          <?php
       
         }
		 else
		 {
			 echo "NPM Tidak di temukan";
		 }
		?>
</p>
          </div>


            
  </div>
  
        <table width="200" border="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="button" onclick="printDiv('printableArea')" value="Cetak KTM" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>PERHATIAN : D-KTM akan aktiv setelah anda mengupdate Photo. <br />
        Menu Ganti Photo ada di pojok kanan atas.<br />
        Ketentuan Photo. <br />
        1. Wajah terlihat jelas. <br />
        2. Didalam Photo hanya berisi gambar satu orang. <br />
        
          <br />
          <p>&nbsp;&nbsp;&nbsp;</p>
          <script>

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}


   </script>
        </p>
      </div>
      <?php


?>



