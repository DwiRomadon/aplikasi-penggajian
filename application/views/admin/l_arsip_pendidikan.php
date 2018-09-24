   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Kegiatan Akademik</b> <br>
                                     
                                    
                                      <div class="text-right" style="margin-top: 10px;">
                 <a href="<?php echo base_URL(); ?>index.php/admin/arsip_pendidikan" class="btn btn-sm btn-info">Refresh Kegiatan<i class="fa fa-refresh"></i></a> <a href="<?php echo base_URL(); ?>index.php/admin/arsip_pendidikan/add" class="btn btn-sm btn-warning">Tambah Kegiatan <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                
                                 
                                  

                                </header>
                                   
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                <b>Tulisan Merah menandakan postingan anda belum di verifikasi</b>
                                    <div class="box-tools m-b-15">
                                    <form action="<?php echo base_URL(); ?>index.php/admin/arsip_pendidikan/cari" method="POST">
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
			<th width="8%">Kode / Komponen</th>
            <th width="10%">Tahun Akademik / Semester</th>
            <th width="15%">Keterangan </th>
			<th width="10%">Narasi / Poin</th>
			<th width="10%">Bukti</th>
			<th width="35%">Bukti Kegiatan</th>
			<th width="17%">Aksi</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
				
					if($b->status == 0)
				{
					$warna = "#FF0000";
				}
				else
				{
					$warna = "#003300";
				}
				
			 $datax		= $this->db->query("SELECT * FROM t_kegiatan where Kode = '$b->kode' ")->result();
	
		
			foreach ($datax as $x) {
				$komponen = $x->Komponen;
				$bukti = $x->Bukti;
			
		}
		?>
		<tr>
			<td><font color="<?php echo $warna ?>"><?php echo $b->kode."<br><i>".$komponen."</i>";?></td>
            <td><font color="<?php echo $warna ?>"><?php echo $b->tahunakademik."<br><i>".$b->semester."</i>";?></td>
             <td><font color="<?php echo $warna ?>"><?php echo "Menjadi ".$b->prestasi." Pada Acara ".$b->namakegiatan.", ".$b->penyelenggara." yang diadakan pada  ".$b->tgl_kegiatan." di ".$b->tempat;?></td>
			<td><font color="<?php echo $warna ?>"><?php echo $b->narasi."<br><i>".$b->poin?></td>
			<td><font color="<?php echo $warna ?>"><?php echo $bukti?></td>
            <td class="ctr">
				<?php  
				if ($b->npm == $this->session->userdata('admin_user')) {
				?><center>
				<div class="btn-group">
					<a href="<?php echo base_URL()?>index.php/admin/buktipendidikan/add/<?php echo $b->id?>/<?php echo $b->npm?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i>Input Bukti</a>
                    
					
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
		 
		 $datam		= $this->db->query("SELECT * FROM t_pendidikanfile WHERE idpendidikan = '$b->id' AND npm = '$b->npm' ")->result();
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
					<a href="<?php echo base_URL()?>index.php/admin/buktipendidikan/edt/<?php echo $l->id?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
					<a href="<?php echo base_URL()?>index.php/admin/buktipendidikan/del/<?php echo $l->id?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
					<i class="icon-trash icon-white"> </i> Hapus</a>
                    <a href="<?php echo base_URL()?>index.php/admin/buktipendidikan/view/<?php echo $l->id?>" class="btn btn-info btn-sm"><i class="icon-print icon-white"> </i> View </a>
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
                
                
                
			</td>
			<td class="ctr">
				<?php  
				if ($b->npm == $this->session->userdata('admin_user')) {
				?>
				<div class="btn-group">
					<a href="<?php echo base_URL()?>index.php/admin/arsip_pendidikan/edt/<?php echo $b->id?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
					<a href="<?php echo base_URL()?>index.php/admin/arsip_pendidikan/del/<?php echo $b->id?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
					<i class="icon-trash icon-white"> </i> Hapus</a>
				</div>	
				<?php } else { ?>
				<div class="label label-danger">No Action</div>
				<?php } ?>
			</td>
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
