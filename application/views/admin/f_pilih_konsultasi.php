
<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
	
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Komponen Kinerja Dosen</a>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
					
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" method="post" action="<?php echo base_URL(); ?>index.php/admin/klas_pilih/cari">
					<input type="text" class="form-control" name="q" style="width: 200px" placeholder="Kata kunci pencarian ..." required>
					<button type="submit" class="btn btn-danger"><i class="icon-search icon-white"> </i> Cari</button>
				</form>
			</ul>
		</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->

  </div>
</div>

<?php echo $this->session->flashdata("k");?>
	

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="10%">Id</th>
            <th width="10%">Kode</th>
            <th width="10%">Unsur</th>
			<th width="10%">Kegiatan</th>
			<th width="25%">Komponen</th>
			<th width="25%">Bukti</th>
			<th width="15%">Angka Kredit</th>
            <th width="10%">Pilih</th>
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
			<td><?php echo $b->id?></td>
            <td><?php echo $b->Kode?></td>
            <td><?php echo $b->Unsur?></td>
            <td><?php echo $b->Kegiatan?></td>
            <td><?php echo $b->Komponen?></td>
            <td><?php echo $b->Bukti?></td>
            <td><?php echo $b->AngkaKredit?></td>
           
   
			<td class="ctr">

					<a href="<?php echo base_URL()?>index.php/admin/arsip_konsultasi/send/<?php echo $b->Kode?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i>Pilih</a>

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
