<?php
$mode		= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$unit	= $datpil->unit;
	$penanggungjawab		= $datpil->penanggungjawab;

} else {
	$act		= "act_add";
	$idp		= "";
	$unit	= "";
	$penanggungjawab		= "";

}
?>
<div class="navbar navbar-inverse">
	<div class="container" style="z-index: 0">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Manage unit</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	
	<form action="<?php echo base_URL(); ?>index.php/admin/manage_unit/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
	<input type="hidden" name="idp" value="<?php echo $idp; ?>">
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="100%" class="table-form">
		<tr><td width="20%">unit</td><td><b><input type="text" name="unit" required value="<?php echo $unit; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
	
		<tr><td colspan="2">
		<br><button type="submit" class="btn btn-primary" tabindex="7" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL(); ?>index.php/unit/manage_unit" class="btn btn-success" tabindex="8" ><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">
		<td width="20%">Penanggung Jawab</td>
	 <td>
         <select id="penanggungjawab" name="penanggungjawab" required class="form-control" style="width: 300px" >
         <option value="">Silahkan Pilih</option>
         <?php 
		 
		 $datax		= $this->db->query("SELECT * FROM t_admin where level = 'Admin' ")->result();
		if (empty($datax)) {
			echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($datax as $b) {
		?>
         
   <option value="<?php echo $b->nama?>"><?php echo $b->nama?></option>
<?php }  ?>
				<div class="label label-danger">No Action</div>
				<?php } ?>
</select>
         </td>
    </tr>
		
		</table>
	</div>
	
	</div>
	
	</form>
