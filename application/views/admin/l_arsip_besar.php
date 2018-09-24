   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Besaran Beasiswa</b>
                                    
                                      <div class="text-right" style="margin-top: 10px;">
                 <a href="<?php echo base_URL(); ?>index.php/admin/arsip_besar" class="btn btn-sm btn-info">Refresh Beasiswa<i class="fa fa-refresh"></i></a> <a href="<?php echo base_URL(); ?>index.php/admin/arsip_besar/add" class="btn btn-sm btn-warning">Tambah Beasiswa <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                
                                    
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                    <form action="<?php echo base_URL(); ?>index.php/admin/arsip_besar/cari" method="POST">
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
            <th width="10%">Jenis</th>
            <th width="10%">IPK</th>
            <th width="10%">Poin pendidikan</th>
            <th width="10%">Poin penelitian</th>
             <th width="10%">Poin pengabdian</th>
			<th width="10%">Beasiswa</th>

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
			
		?>
		<tr>
        
        	<td><?php echo $no ; ?> </td>
            <td><?php echo $b->jenis ;?></td>
            <td><?php echo $b->IPK ;?></td>
			<td><?php echo $b->poinpendidikan ;?></td>
            <td><?php echo $b->poinpenelitian ;?></td>
            <td><?php echo $b->poinpengabdian ;?></td>
             <td><?php echo $b->beasiswa;?></td>           
            </font>             	
                
		
			<td class="ctr">
				
                
				<div class="btn-group">
					<a href="<?php echo base_URL()?>index.php/admin/arsip_besar/edt/<?php echo $b->id?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
					<a href="<?php echo base_URL()?>index.php/admin/arsip_besar/del/<?php echo $b->id?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
					<i class="icon-trash icon-white"> </i> Hapus</a>
				</div>	

				<?php $no++;  }} ?>
                
			</td>
		</tr>
	
	</tbody>
</table>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
</div>
