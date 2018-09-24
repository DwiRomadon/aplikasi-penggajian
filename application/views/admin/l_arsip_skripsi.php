   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Konsultasi Anda</b>
                                    
                                      <div class="text-right" style="margin-top: 10px;">
                 <a href="<?php echo base_URL(); ?>index.php/admin/arsip_skripsi" class="btn btn-sm btn-info">Refresh Kegiatan<i class="fa fa-refresh"></i></a> <a href="<?php echo base_URL(); ?>index.php/admin/arsip_skripsi/add" class="btn btn-sm btn-warning">Tambah Kegiatan <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                
                                    
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
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
			<th width="5%">No</th>
            <th width="10%">Tanggal</th>
            <th width="5%">Pertemuan </th>
			<th width="10%">Subjek</th>
			<th width="20%">Konsultasi Skripsi</th>
            <th width="10%">file</th>
			<th width="25%">Jawaban Dari PA</th>
			<th width="15%">Aksi</th>
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
            <td><font color="<?php echo $warna ?>"><?php echo $b->pertemuan;?></td>
             <td><font color="<?php echo $warna ?>"><?php echo $b->subjek ;?></td>
			<td><font color="<?php echo $warna ?>"><?php echo $b->isikonsul ;?></td>
            <td><font color="<?php echo $warna ?>"> <?php echo "<a href='".base_URL()."upload/file_skripsi/".$b->file."' target='_blank'>".$b->file."</a>"?></td>
            <td><font color="<?php echo $warna ?>"><?php echo $b->jawab ;?></td>
            
            
           
            </font>             	
                
		
			<td class="ctr">
				
                <?php  
				if ($b->npm == $this->session->userdata('admin_user') && $b->status == 1) {
				?>
				<div class="btn-group">
					<a href="<?php echo base_URL()?>index.php/admin/arsip_skripsi/edt/<?php echo $b->idkonsul?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
					<a href="<?php echo base_URL()?>index.php/admin/arsip_skripsi/del/<?php echo $b->idkonsul?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
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
