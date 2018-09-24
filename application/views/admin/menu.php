                            <ul class="sidebar-menu">
                                <li class="active">
                                    <a href="<?php echo base_url(); ?>index.php/admin">
                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                
                                
                                   <?php
		if ($this->session->userdata('admin_level') == "bpkha") {
			
			
		?>
                                
                                
                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Pendidikan</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/config_semester"><i class="fa fa-angle-double-right"></i> Per Status</a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/config_semesterslrh"><i class="fa fa-angle-double-right"></i> Per Semester </a></li>
                                          <li><a href="<?php echo base_url(); ?>/index.php/admin/arsip_pendidikanadmin"><i class="fa fa-angle-double-right"></i> Verifikas Seluruh</a></li>
                                    </ul>
                                </li>

                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-music"></i>
                                    <span>Penelitian</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/config_semesternon"><i class="fa fa-angle-double-right"></i> Per Status</a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/config_semesterslrhnon"><i class="fa fa-angle-double-right"></i> Per Semester </a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/arsip_penelitianmhsadmin"><i class="fa fa-angle-double-right"></i> Verifikas Seluruh</a></li>                               
                                         </ul>
                                </li>

                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-music"></i>
                                    <span>Pengabdian</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/config_semesterabdi"><i class="fa fa-angle-double-right"></i> Per Status</a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/config_semesterslrhabdi"><i class="fa fa-angle-double-right"></i> Per Semester </a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/arsip_pengabdianmhsadmin"><i class="fa fa-angle-double-right"></i> Verifikas Seluruh</a></li>                               
                                         </ul>
                                </li>
                                            
                                                           
                                
                                 
                                  <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-print"></i>
                                    <span>Poin Kegiatan</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/arsip_komponen"><i class="fa fa-angle-double-right"></i>Poin Kegiatan</a></li>
                                         <li><a href="<?php echo base_url(); ?>index.php/admin/arsip_besar"><i class="fa fa-angle-double-right"></i>Besar Beasiswa</a></li>
                                        <li><a href="404.php"><i class="fa fa-angle-double-right"></i>Info Layanan</a></li>
                                      
                                    </ul>
                                </li>
                                
         <?php } ?>
         
                                         <?php
		if ($this->session->userdata('admin_level') == "ppsdm") {
			
			
		?>
                                
                                
                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Pendidikan</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/config_semesterds"><i class="fa fa-angle-double-right"></i> Per Status</a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/config_semesterslrhpendidikands"><i class="fa fa-angle-double-right"></i> Per Semester </a></li>
                                          <li><a href="<?php echo base_url(); ?>/index.php/admin/arsip_pendidikanadmin"><i class="fa fa-angle-double-right"></i> Verifikas Seluruh</a></li>
                                    </ul>
                                </li>

                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-music"></i>
                                    <span>Penelitian</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/config_semesterpenelitiands"><i class="fa fa-angle-double-right"></i> Per Status</a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/config_semesterslrhpenelitiands"><i class="fa fa-angle-double-right"></i> Per Semester </a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/arsip_penelitiandsadmin"><i class="fa fa-angle-double-right"></i> Verifikas Seluruh</a></li>                               
                                         </ul>
                                </li>

                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-music"></i>
                                    <span>Pengabdian</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/config_semesterpengabdiands"><i class="fa fa-angle-double-right"></i> Per Status</a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/config_semesterslrhpengandiands"><i class="fa fa-angle-double-right"></i> Per Semester </a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/arsip_pengabdiandsadmin"><i class="fa fa-angle-double-right"></i> Verifikas Seluruh</a></li>                               
                                         </ul>
                                </li>
                                            
                                            
                                <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-music"></i>
                                    <span>Penunjang</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/config_semesterpenunjangds"><i class="fa fa-angle-double-right"></i> Per Status</a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/config_semesterslrhpenunjangds"><i class="fa fa-angle-double-right"></i> Per Semester </a></li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/admin/arsip_penunjangdsadmin"><i class="fa fa-angle-double-right"></i> Verifikas Seluruh</a></li>                               
                                         </ul>
                                </li>
                                                           
                                
                                 
                                  <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-print"></i>
                                    <span>Poin Kegiatan</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/arsip_komponen"><i class="fa fa-angle-double-right"></i>Poin Kegiatan</a></li>
                                         <li><a href="<?php echo base_url(); ?>index.php/admin/arsip_besar"><i class="fa fa-angle-double-right"></i>Besar Beasiswa</a></li>
                                        <li><a href="404.php"><i class="fa fa-angle-double-right"></i>Info Layanan</a></li>
                                      
                                    </ul>
                                </li>
                                
         <?php } ?>
         
                 
                                   <?php
		if ($this->session->userdata('admin_level') == "chatbot") {
			
			
		?>
         
          <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Bianca</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                       <li><a href="<?php echo base_url(); ?>index.php/admin/akademik"><i class="fa fa-angle-double-right"></i> Informasi</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/keyword"><i class="fa fa-angle-double-right"></i> Keyword Informasi</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/chatbot"><i class="fa fa-angle-double-right"></i> Pesan Chatbot</a></li>
                                         <li><a href="<?php echo base_url(); ?>index.php/admin/key"><i class="fa fa-angle-double-right"></i> KEY</a></li>
                                         <li><a href="<?php echo base_url(); ?>index.php/admin/nlp"><i class="fa fa-angle-double-right"></i> NLP</a></li>
                                         <li><a href="<?php echo base_url(); ?>index.php/admin/kata"><i class="fa fa-angle-double-right"></i> KATA</a></li>
                                       
                                    </ul>
                                </li>                        
                             <?php } ?>
                             
                              <?php
		if ($this->session->userdata('admin_level') == "baa") {
			
			
		?>
         
          <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>IKD</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                       <li><a href="<?php echo base_url(); ?>index.php/admin/akademik"><i class="fa fa-angle-double-right"></i> Laporan Seluruh</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/keyword"><i class="fa fa-angle-double-right"></i> Laporan / Mata Kuliah</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/chatbot"><i class="fa fa-angle-double-right"></i> Laporan / Dosen</a></li>
                                         <li><a href="<?php echo base_url(); ?>index.php/admin/chatbot"><i class="fa fa-angle-double-right"></i> Laporan Akhir</a></li>
      
                     
                                    </ul>
               
                                </li>  
                                  <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Laporan Pengisi KRS</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                       <li><a href="<?php echo base_url(); ?>index.php/admin/pengisikrs"><i class="fa fa-angle-double-right"></i> Seluruh</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/pengisikrsprodi"><i class="fa fa-angle-double-right"></i> PerProdi</a></li>

                                         
                                    </ul>
                                </li>       
                                
                                
                                </li>  
                                
                                
                                 <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Lap. Blm Verifikasi Nilai</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                       <li><a href="<?php echo base_url(); ?>index.php/admin/verifikasi"><i class="fa fa-angle-double-right"></i> Seluruh</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/verifikasiprodi"><i class="fa fa-angle-double-right"></i> PerProdi</a></li>

                                         
                                    </ul>
                                </li>       
                                
                                
                                </li>  
                                
                                  <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Lap. Belum Input Nilai</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                       <li><a href="<?php echo base_url(); ?>index.php/admin/inputnilai"><i class="fa fa-angle-double-right"></i> Seluruh</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/inputnilaiprodi"><i class="fa fa-angle-double-right"></i> PerProdi</a></li>

                                         
                                    </ul>
                                </li>       
                                
                                
                                </li>  
                                
                                
                                  <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Cetak Digital KTM</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                           <li><a href="<?php echo base_url(); ?>index.php/admin/ektm"><i class="fa fa-angle-double-right"></i> Cetak KTM</a></li>

                                         
                                    </ul>
                                </li>    
                                
                                
                                   </li>  
                                
                                  <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Laporan Jumlah Absen</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                       <li><a href="<?php echo base_url(); ?>index.php/admin/jumlahabsen"><i class="fa fa-angle-double-right"></i> Seluruh</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/jumlahabsenprodi"><i class="fa fa-angle-double-right"></i> PerProdi</a></li>

                                         
                                    </ul>
                                </li>     
                                
                                   <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Cetak Transkrip</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                           <li><a href="<?php echo base_url(); ?>index.php/admin/transkrip"><i class="fa fa-angle-double-right"></i> Transkrip Mahasiswa </a></li>

                                         
                                    </ul>
                                </li>      
                                
                                
                                   <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Export Data</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                           <li><a href="<?php echo base_url(); ?>index.php/admin/exportmhs/export"><i class="fa fa-angle-double-right"></i> Export Data </a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/admin/exportfoto/export"><i class="fa fa-angle-double-right"></i> Export photo </a></li>

                                         
                                    </ul>
                                </li>                                  
                             <?php } ?>
                             
                             
                             
                              <?php
		if ($this->session->userdata('admin_level') == "marketing") {
			
			
		?>
         
  
                                  <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Laporan Pengisi KRS</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                       <li><a href="<?php echo base_url(); ?>index.php/admin/pengisikrs"><i class="fa fa-angle-double-right"></i> Seluruh</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/pengisikrsprodi"><i class="fa fa-angle-double-right"></i> PerProdi</a></li>

                                         
                                    </ul>
                                </li>       
                                
                                
                               
                                
                                
                                </li>  
                                
                               
                                
                                
                                  <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Cetak Digital KTM</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                           <li><a href="<?php echo base_url(); ?>index.php/admin/ektm"><i class="fa fa-angle-double-right"></i> Cetak KTM</a></li>

                                         
                                    </ul>
                                </li>    
                                
                                   <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Cetak Transkrip</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                           <li><a href="<?php echo base_url(); ?>index.php/admin/transkrip"><i class="fa fa-angle-double-right"></i> Transkrip Mahasiswa </a></li>

                                         
                                    </ul>
                                </li>      
                                
                                                          
                             <?php } ?>
                             
                             
                             
                             
                              <?php
		if ($this->session->userdata('admin_level') == "bak") {
			
			
		?>
         
          <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Laporan Pengisi KRS</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                       <li><a href="<?php echo base_url(); ?>index.php/admin/pengisikrs"><i class="fa fa-angle-double-right"></i> Seluruh</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/pengisikrsprodi"><i class="fa fa-angle-double-right"></i> PerProdi</a></li>

                                         
                                    </ul>
                                </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Data Master</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/admin/master_karyawan"><i class="fa fa-angle-double-right"></i> Data Karyawan</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/master_jabatan"><i class="fa fa-angle-double-right"></i> Jabatan</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/master_gaji"><i class="fa fa-angle-double-right"></i> Master Gaji</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/master_honor"><i class="fa fa-angle-double-right"></i> Setting Honor</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/input_absen_karyawan"><i class="fa fa-angle-double-right"></i> Absen Karyawan </a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-puzzle-piece"></i>
                    <span>Potongan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/admin/setPotonganFix"><i class="fa fa-angle-double-right"></i> Setting Potongan</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/setPotonganFix/tabel_pootongan"><i class="fa fa-angle-double-right"></i> Bayar Potongan</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Transaksi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/admin/form_penggajian_submit/config_penggajian" ><i class="fa fa-angle-double-right"></i> Penggajian</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-print"></i>
                    <span>Laporan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/admin/form_penggajian_submit/cetak_pdf"><i class="fa fa-angle-double-right"></i> Cetak PDF</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/export_excel"><i class="fa fa-angle-double-right"></i> Cetak Excel Bank</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/export_excel"><i class="fa fa-angle-double-right"></i> Cetak Honor/Gaji </a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/export_excel"><i class="fa fa-angle-double-right"></i> Cetak Potongan </a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/export_excel"><i class="fa fa-angle-double-right"></i> Cetak Honor/Gaji Dosen LB</a></li>
                </ul>
            </li>
        <?php } ?>
                            </ul>
                            
                            	