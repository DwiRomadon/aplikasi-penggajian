
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                
                               
                                
                                
                                <?php $tampil=mysql_query("select * from data_anggota order by id desc");
                        $total=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total"; ?></span>
                                    Total Poin Akademik
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-music"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from data_buku order by id desc");
                        $total1=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total1"; ?></span>
                                    Total Poin Non Akademik
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-refresh fa-coffee fa-1x"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from trans_pinjam order by id desc");
                        $total2=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total2"; ?></span>
                                    Konsultasi Anda
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-refresh fa-spin fa-1x"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from pengunjung order by id desc");
                        $total3=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total3"; ?></span>
                                    Galeri Kegiatan
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main row -->
                    <div class="row">

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
                                                <?php
                                                $tampil=mysql_query("select * from data_anggota order by id desc limit 1");
                                                while($data2=mysql_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-block alert-danger">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data2['nama'];?></strong>, Telah Melakukan Kegiatan Akademik Baru.
                                                    </div>
                                                    <?php } ?>
                                                    
                                                <?php
                                                $tampil=mysql_query("select * from admin order by user_id desc limit 1");
                                                while($data3=mysql_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-success">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data3['fullname']; ?></strong>, Telah Melakukan Kegiatan Non Akademik Baru 
                                                    </div>
                                                <?php } ?>
                                                    
                                                <?php
                                                $tampil=mysql_query("select * from data_buku order by id desc limit 1");
                                                while($data4=mysql_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data4['judul']; ?></strong>, Event Terbaru
                                                    </div>
                                                <?php } ?>
                                                   
                                                <?php
                                                $tampil=mysql_query("select * from pengunjung order by id desc limit 1");
                                                while($data5=mysql_fetch_array($tampil)){
                                                ?>   
                                                    <div class="alert alert-warning">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data5['nama']; ?> </strong> Informasi Terbaru
                                                    </div>
                                                <?php } ?>
                                                </div>
                                        </section>



                      </div>


                  </div>
                    
                    <div class="row">
                        <div class="col-md-5">
                            <div class="panel">
                                <header class="panel-heading">
                                    Daftar Mahasiswa Terdaftar
                                </header><?php
                        $tampil=mysql_query("select * from data_anggota order by id desc limit 3");
                        while($data1=mysql_fetch_array($tampil)){
                        ?>
                                <ul class="list-group teammates">
                                    <li class="list-group-item">
                                        <a href="anggota.php"><img src="<?php echo $data1['foto']; ?>" width="50" height="50" style="border: 3px solid #555555;"></a>
                                        <a href="anggota.php"><?php echo $data1['nama']; ?></a>
                                    </li>
                                </ul>
                               <?php } ?>
                                <div class="panel-footer bg-white">
                                    <!-- <span class="pull-right badge badge-info">32</span> -->
                                    <a href="anggota.php" class="btn btn-sm btn-info">Data Anggota <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                          <section class="panel tasks-widget">
                              <header class="panel-heading">
                                List Komponen Kegiatan
                            </header>
                            <div class="panel-body">

                              <div class="task-content">

                                  <ul class="task-list">
                                  <?php
                                  $tampil=mysql_query("select * from data_buku order by id desc limit 5");
                                  while($data6=mysql_fetch_array($tampil)){
                                  ?>
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey list-child"/>
                                              <!-- <input type="checkbox" class="square-grey"/> -->
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp"><?php echo $data6['judul']; ?></span>
                                              <span class="label label-primary"><?php echo $data6['tgl_input']; ?></span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-info btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>     
                                    <?php } ?>
                                  </ul>
                              </div>

                              <div class=" add-task-row">
                                  <a class="btn btn-warning btn-sm pull-left" href="buku.php">Lihat Buku Bacaan</a>
                                  <!--<a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>-->
                              </div>
                          </div>
                      </section>
              </div>
              
            
              