<?php
$mode					= $this->uri->segment(3);
$idu					= $this->uri->segment(4);
$nidn					= $this->uri->segment(5);

if ($mode == "edt" || $mode == "act_edt") {
	$act				= "act_edt";
	$idp				= $datpil->id;
	$idpenelitian		= $datpil->idpenelitian;
	$status				= $datpil->status;
	$jenis				= $datpil->jenis;

	
} else {
	$act			= "act_add";
	$idp			= "";
    $idpenelitian	= "";
	$status			= "";
	$jenis			= "";

}
?>
<div class="navbar navbar-inverse">
	<div class="container z0">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Input Bukti</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	
	<form action="<?php echo base_URL()?>index.php/admin/buktipenelitian/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="<?php echo $mode; ?>">
	<input type="hidden" name="idu" value="<?php echo $idu; ?>">
    <input type="hidden" name="nidn" value="<?php echo $nidn; ?>">
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
		<a href="<?php echo base_URL()?>index.php/admin/arsip_internal" tabindex="10" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		
	</div>
	
	</div>
	
	</form>
