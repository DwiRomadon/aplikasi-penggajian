<?php
$mode					= $this->uri->segment(3);
$idu					= $this->uri->segment(4);
$npm					= $this->uri->segment(5);

if ($mode == "edt" || $mode == "act_edt") {
	$act				= "act_edt";
	$idp				= $datpil->id;
	$idnonpendidikan		= $datpil->idnonpendidikan;
	$status				= $datpil->status;
	$jenis				= $datpil->jenis;

	
} else {
	$act			= "act_add";
	$idp			= "";
    $idnonpendidikan	= "";
	$status			= "";
	$jenis			= "";

}
?>
   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Input Bukti Kegiatan Akademik</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
                                    <?php
		$q_cek	= $this->db->query("SELECT * FROM t_nonpendidikan WHERE id = '$idu'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
           ?>
		   <tr>
			<td width="35%" height="28" bgcolor="#dff0d8">Bukti Pada Kegiatan</td>
            <td width="65%" bgcolor="#dff0d8">: <?php echo $d_cek->narasi ;} ?> </td>
		</tr>
       
	
	<form action="<?php echo base_URL()?>index.php/admin/buktinonpendidikan/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="<?php echo $mode; ?>">
	<input type="hidden" name="idu" value="<?php echo $idu; ?>">
    <input type="hidden" name="npm" value="<?php echo $npm; ?>">
    <input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="100%" class="table-form">
		
            <tr><td>Status</td><td><select name="status" class="form-control" required><option value="">--</option>
			<option value='Publish' selected>Publish</option>
            <option value='Private' selected>Private</option>
		   </select>
			</td></tr>
		<tr><td width="20%">Jenis Arsip</td><td><b><input type="text" tabindex="2" name="jenis" required value="<?php echo $jenis; ?>" id="jenis" style="width: 400px" class="form-control"></b></td></tr>	
      		<tr><td colspan="2">
            <tr><td width="20%">File Surat (Scan)</td><td><b><input type="file" tabindex="7" name="file_arsip" class="form-control" style="width: 200px" id="file_arsip"></b></td></tr>	
            <tr><td>	
		<button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Simpan</button></td><td>
		<a href="<?php echo base_URL()?>index.php/admin/arsip_nonpendidikan" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		
	</div>
	
	</div>
	
	</form>
