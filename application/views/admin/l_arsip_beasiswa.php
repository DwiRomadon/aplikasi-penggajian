   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Upload Dokumen beasiswa Anda</b>
                                    
                                      <div class="text-right" style="margin-top: 10px;">
                 <a href="<?php echo base_URL(); ?>index.php/admin/arsip_beasiswa" class="btn btn-sm btn-info">Refresh Kegiatan<i class="fa fa-refresh"></i></a> <a href="<?php echo base_URL(); ?>index.php/admin/arsip_beasiswa/add" class="btn btn-sm btn-warning">Tambah Kegiatan <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                
                                    
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                    <form action="<?php echo base_URL(); ?>index.php/admin/arsip_beasiswa/cari" method="POST">
                                        <div class="input-group">
                                        <input type='text' class="form-control input-sm pull-right" style="width: 150px;"  name='q' placeholder='Kata Kunci Pencarian...' required /> 
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>    
                                    </div>
                                    
                                    


<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
	
	

<?php echo $this->session->flashdata("k");?>
	

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5%">No</th>
            <th width="10%">Tanggal Upload</th>
            <th width="10%">Tahun Akademik / Semester</th>
			<th width="10%">Jumlah</th>
			<th width="45%">File Syarat</th>
		
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
				
				if($b->status == 1)
				{
					$warna = "#FF0000";
				}
				else
				{
					$warna = "#003300";
				}
			
		?>
		<tr>
        
        	<td><font color="<?php echo $warna ?>"> <?php echo $no ; ?> </td>
			<td><font color="<?php echo $warna ?>"><?php echo $b->tgl ;?></td>
            <td><font color="<?php echo $warna ?>"><?php echo $b->tahunakademik."<br><i>".$b->semester."</i>";?></td>
             <td><font color="<?php echo $warna ?>"><?php echo $b->jumlah ;?></td>
	
            <td class="ctr">
				<?php  
				if ($b->npm == $this->session->userdata('admin_user')) {
				?><center>
				<div class="btn-group">
				<a href="<?php echo base_URL()?>index.php/admin/buktibeasiswa/add/<?php echo $b->idbeasiswa?>/<?php echo $b->npm?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i>Input Bukti</a>
                    
					
				</div>	
                </center>
                <br />
				<?php } else { ?>
				<div class="label label-danger">No Action</div>
				<?php } ?>
                
                <table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="25%">Jenis</th>
            <th width="25%">File</th>
			<th width="50%">Aksi</th>
		</tr>
        <?php 
		 
		 $datam		= $this->db->query("SELECT * FROM t_beasiswafile WHERE idbeasiswa = '$b->idbeasiswa' AND npm = '$b->npm' ")->result();
		if (empty($datam)) {
			echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			foreach ($datam as $l) {
		?>
         
  <tr>
    <td><?php echo $l->jenis ?></td>
                <td><?php echo $l->status?></td>
                 <td class="ctr">
				<?php  
				if ($l->npm == $this->session->userdata('admin_user')) {
				?>
				<div class="btn-group">
					<a href="<?php echo base_URL()?>index.php/admin/buktibeasiswa/edt/<?php echo $l->id?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
					<a href="<?php echo base_URL()?>index.php/admin/buktibeasiswa/del/<?php echo $l->id?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
					<i class="icon-trash icon-white"> </i> Hapus</a>
                    <a href="<?php echo base_URL()?>index.php/admin/buktibeasiswa/view/<?php echo $l->id?>" class="btn btn-info btn-sm"><i class="icon-print icon-white"> </i> View </a>
				</div>	
				</div>	
				<?php } else { ?>
				 <a href="<?php echo base_URL()?>index.php/admin/buktiborang/view/<?php echo $l->id?>" class="btn btn-info btn-sm"><i class="icon-print icon-white"> </i> View </a>
				<?php } ?>
			</td>
          
                  </tr>
<?php }  ?>
				
				<?php } ?>
                
                
	</thead>
    </table>
            
            </font>             	
                
		
			
		</tr>
		<?php 
			$no++;
			}
		}
		?>
	</tbody>
</table>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
</div>
