<style type="text/css">
.clearfix .alert.alert-dismissable.alert-success table tr td {
	font-size: 18px;
}
.clearfix .alert.alert-dismissable.alert-success table {
	font-size: 14px;
}
</style>
      <div class="clearfix">


<?php $username = $this->session->userdata('admin_user'); ?>



		<div class="alert alert-dismissable alert-success">
        
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
			<td width="35%" height="28" bgcolor="#dff0d8">Nama</td>
            <td width="65%" bgcolor="#dff0d8">: <?php echo $d_cek->nmmhsmsmhs ?> </td>
		</tr>
        <tr>
			<td width="35%" height="28" bgcolor="#dff0d8">NPM</td>
            <td width="65%" bgcolor="#dff0d8">: <?php echo $d_cek->nimhsmsmhs ?> </td>
		</tr>

    <tr>
			<td width="35%" height="33" bgcolor="#dff0d8">Alamat </td>
            <td width="65%" bgcolor="#dff0d8">:  <?php echo $d_cek->almtinggal?></td>
		</tr>
                 <tr>
			<td width="35%" height="33" bgcolor="#dff0d8">Telepon </td>
            <td width="65%" bgcolor="#dff0d8">:  <?php echo $d_cek->tlp ?></td>
		</tr>
        <tr>
			<td width="35%" height="33" bgcolor="#dff0d8">Tempat / Tgl Lahir </td>
            <td width="65%" bgcolor="#dff0d8">:  <?php echo $d_cek->tplhrmsmhs ?>/<?php echo $d_cek->tglhrmsmhs ?></td>
		</tr>
        
 
		
		

	
        
        </table>
        <?php
       
         }
		?>
            
  </div>
			
      </div>
      <?php


?>
