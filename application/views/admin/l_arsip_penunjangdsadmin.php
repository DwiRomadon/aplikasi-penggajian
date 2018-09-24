   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Kegiatan Akademik</b> <br>
                                     
                                    
                                     
                                 
                                  

                                </header>
                                   
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                <b>Tulisan Merah menandakan postingan anda belum di verifikasi</b>
                                    <div class="box-tools m-b-15">
                                    <form action="<?php echo base_URL(); ?>index.php/admin/arsip_penunjangds/cari" method="POST">
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
            <th width="10%">NPM</th>
            <th width="10%">Tahun Akademik / Semester</th>
            <th width="10%">Keterangan </th>
			<th width="10%">Narasi / Poin</th>
			<th width="10%">Bukti</th>
			<th width="25%">Bukti Kegiatan</th>
			<th width="22%">Aksi</th>
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
	if (empty($datax)) {
			echo "Data Tidak Di Temukan";
		}
		else
		{
		
			foreach ($datax as $x) {
				$komponen = $x->Komponen;
				$bukti = $x->Bukti;
			
		}
		}
		?>
		<tr>
            <td><font color="<?php echo $warna ?>"><?php echo $b->nidn ?></td>
			<td><font color="<?php echo $warna ?>"><?php echo $b->kode."<br><i>".$komponen."</i>";?></td>
            <td><font color="<?php echo $warna ?>"><?php echo $b->tahunakademik."<br><i>".$b->semester."</i>";?></td>
            <td><font color="<?php echo $warna ?>"><?php echo "Menjadi ".$b->prestasi." Pada Acara ".$b->namakegiatan.", ".$b->penyelenggara." yang diadakan pada  ".$b->tgl_kegiatan." di ".$b->tempat;?></td>
			<td><font color="<?php echo $warna ?>"><?php echo $b->narasi."<br><i>".$b->poin?></td>
			<td><font color="<?php echo $warna ?>"><?php echo $bukti?></td>
            <td class="ctr">
				
				
				<div class="label label-danger">No Action</div>
			
                
                <table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="25%">Jenis</th>
            <th width="25%">File</th>
			<th width="50%">Aksi</th>
		</tr>
        <?php 
		 
		 $datam		= $this->db->query("SELECT * FROM t_penunjangdsfile WHERE idpenunjangds = '$b->id' AND nidn = '$b->nidn' ")->result();
		if (empty($datam)) {
			echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			foreach ($datam as $l) {
		?>
         
  <tr>
                <td><?php echo $l->jenis ?></td>
                <td><?php echo $l->status?></td>
                 <td class="ctr">
			<a href="<?php echo base_URL()?>index.php/admin/buktipenunjangds/view/<?php echo $l->id?>" class="btn btn-info btn-sm"><i class="icon-print icon-white"> </i> View </a>
			</td>
          
                  </tr>
<?php }  ?>
				
				<?php } ?>
                
                
	</thead>
    </table>
                
                
                
			</td>
			<td class="ctr">
				
				<div class="btn-group">
					<a href="<?php echo base_URL()?>index.php/admin/arsip_penunjangdsadmin/edtsetuju/<?php echo $b->id?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Setuju</a>
					<a href="<?php echo base_URL()?>index.php/admin/arsip_penunjangdsadmin/edttdksetuju/<?php echo $b->id?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
					<i class="icon-trash icon-white"> </i> Tidak Setuju</a>
				</div>	
				
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
