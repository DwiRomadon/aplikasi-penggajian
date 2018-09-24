<?php $username = $this->session->userdata('admin_user'); 

$total = 0; 
				$q_cek	= $this->db->query("SELECT count(npm) AS point FROM t_pendidikan where status = '1' GROUP BY npm");
				$j_cek	= $q_cek->num_rows();
				$d_cek	= $q_cek->row();
				
        		if($j_cek == 1) {
           		$total = $d_cek->point;
				}
				else
				{
				$total = 0;
				}
				
$totalnp = 0; 
				$q_ceknp	= $this->db->query("SELECT count(poin) AS point FROM t_nonpendidikan where status = '1' GROUP BY npm");
				$j_ceknp	= $q_ceknp->num_rows();
				$d_ceknp	= $q_ceknp->row();
				
        		if($j_ceknp == 1) {
           		$totalnp = $d_ceknp->point;
				}
				else
				{
				$totalnp = 0;
				}
				
				
$totalk = 0; 
				$q_cekk	= $this->db->query("SELECT count(npm) AS point FROM t_konsul GROUP BY npm");
				$j_cekk	= $q_cekk->num_rows();
				$d_cekk	= $q_cekk->row();
				
        		if($j_cekk == 1) {
           		$totalk = $d_cekk->point;
				}
				else
				{
				$totalk = 0;
				}
?>
		<div class="col-sm-3">
			<div class="small-box bg-aqua">
				<div class="inner">
               
		
					<h3><?php echo $total; ?></h3>
					<p>Kegiatan Akademik</p>
                    
                   
				</div>
				<div class="icon">
               		<i class="fa fa-book"></i>
				</div>
				<a class="small-box-footer" href="#">Lihat Selengkapnya</a>
			</div>
		</div>
        
		<div class="col-sm-3">
			<div class="small-box bg-red">
				<div class="inner">
					<h3><?php echo $totalnp; ?></h3>
					<p>Kegiatan Non Akademik</p>
				</div>
				<div class="icon">
					<i class="fa fa-music"></i>
				</div>
				<a class="small-box-footer" href="#">Lihat Selengkapnya</a>
			</div>
		</div>
        
		<div class="col-sm-3">
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?php echo $totalk; ?></h3>
					<p>Konsultasi Anda</p>
				</div>
				<div class="icon">
					<i class="fa fa-coffee"></i>
				</div>
				<a class="small-box-footer" href="#">Lihat Selengkapnya</a>
			</div>
		</div>
        
		<div class="col-sm-3">
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>34</h3>
					<p>Galeri Kegiatan</p>
				</div>
				<div class="icon">
					<i class="fa fa-camera"></i>
				</div>
				<a class="small-box-footer" href="#">Lihat Selengkapnya</a>
			</div>
		</div>

 <div class="col-md-8">
                            <!--earning graph start-->
                            <section class="panel">
                                <header class="panel-heading">
                                    Grafik Kegiatan Anda
                                </header>
                                <div class="panel-body">
                                    <canvas id="linechart" width="600" height="330"></canvas>
                                </div>
                                        </section>
                                        <!--earning graph end-->

                                    </div>
                                    
                                    
                                    <div class="col-lg-4">

                                        <!--chat start-->
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Pemberitahuan
                                            </header>
                                                <div class="panel-body" id="noti-box">
                                          
                                                </div>
                                        </section>



                      </div>


                 
             