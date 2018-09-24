<form action="index.php?page=karyawan&action=cari_grafik"  method="get">
	<div class="row"><h2>Pencarian Data Berdasarkan</h2>
		<div class="row">
		<div class="col-md-7">
			<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            Silahkan Pilih Kriteria pada Dimention 1 dan 2 
                        </div>
		</div>
		<div class="col-md-5">
		</div>
	</div>
		
		<div class="col-md-6">
		
			<b>Dimention 1</b><br>
			<input type="radio" value="pendidikan_terakhir" name="x">Pendidikan Terakhir<br>
			<input type="radio" value="status_karyawan" name="x">Status Karyawan<br>
			<input type="radio" value="unit_kerja" name="x">Unit Kerja<br>
		</div>
		<div class="col-md-6">
			<b>Dimention 2</b><br>
			<input type="radio" value="pendidikan_terakhir" name="y">Pendidikan Terakhir<br>
			<input type="radio" value="status_karyawan" name="y">Status Karyawan<br>
			<input type="radio" value="unit_kerja" name="y">Unit Kerja<br>
		</div>
		<div class="col-md-12">
			<input type="submit" value="Tampilkan data" class="btn btn-primary">
		</div>
	</div>
	<input type="hidden" name="page" value="<?=@$_GET['page'];?>">
		<input type="hidden" name="action" value="cari_grafik">
</form>