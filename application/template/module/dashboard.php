<?php

include('component/com-kamar.php');

include('component/com-transaksi.php');

?>
<section class="content-header">
	<h1>Dashboard <span class="small">Selamat datang</span></h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-sm-3">
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?php echo $total_tersedia; ?></h3>
					<p>KM Jelajah</p>
				</div>
				<div class="icon">
					<i class="fa fa-anchor"></i>
				</div>
				<a class="small-box-footer" href="#">Lihat Selengkapnya</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="small-box bg-red">
				<div class="inner">
					<h3><?php echo $total_terpakai; ?></h3>
					<p>Jumlah Pengguna</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a class="small-box-footer" href="#">Lihat Selengkapnya</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?php echo $total_tersedia; ?></h3>
					<p>Jumlah Installer</p>
				</div>
				<div class="icon">
					<i class="fa fa-database"></i>
				</div>
				<a class="small-box-footer" href="#">Lihat Selengkapnya</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?php echo $total_kotor; ?></h3>
					<p>Jumlah Downloader</p>
				</div>
				<div class="icon">
					<i class="fa fa-download"></i>
				</div>
				<a class="small-box-footer" href="#">Lihat Selengkapnya</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">ROV View</h3>
				</div>
			
			<iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2sus!4v1433693112182!6m8!1m7!1suy-VMfMFqbkAAAQZA8wKrw!2m2!1d-3.849412!2d-32.37538!3f18.76!4f17.03!5f0.7820865974627469" width="600" height="450" frameborder="0" style="border:0"></iframe>
				
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">ROV Life View</span></h3>
				</div>
				
			
			<iframe allowfullscreen="" class="YOUTUBE-iframe-video" data-thumbnail-src="https://i.ytimg.com/vi/4C5EGXqgx8s/0.jpg" frameborder="0" height="450" src="https://www.youtube.com/embed/4C5EGXqgx8s?feature=player_embedded" width="600"></iframe></div>
			</div>
		</div>
		
</section>