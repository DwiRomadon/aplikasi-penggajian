<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="template/images/<?php echo $_SESSION['images']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nama']; ?></p>
              <span class="small"><?php echo date('l. d M Y'); ?></span>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
                     <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Jelajah Laut</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=transaksi/pesan-layanan"><i class="fa fa-circle-o"></i>Jelajah Laut</a></li>
                <li><a href="?module=kamar/kamar-kotor"><i class="fa fa-circle-o"></i>Jelajah Samudera</a></li>
              </ul>
            </li>
            <?php if($_SESSION['batasan']<=3) { ?>
            <li class="header">ADMINISTRASI ROV</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-anchor"></i>
                <span>ROV Portofolio</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=kamar/kamar-list"><i class="fa fa-circle-o"></i> Lihat Spesifikasi</a></li>
                <li><a href="?module=kamar/kamar-add"><i class="fa fa-circle-o"></i> Hasil Kamera</a></li>
                <li><a href="?module=kamar/tipe-list"><i class="fa fa-circle-o"></i> Galeri</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-suitcase"></i>
                <span>Buku Tamu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=tamu/tamu-list"><i class="fa fa-circle-o"></i> Buku Tamu</a></li>
                <li><a href="?module=tamu/tamu-add"><i class="fa fa-circle-o"></i> Gamifikasi</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>User Manager</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=user/user-list"><i class="fa fa-circle-o"></i> Lihat Pengguna</a></li>
                <li><a href="?module=user/user-add"><i class="fa fa-circle-o"></i> Tambah User Baru</a></li>
              </ul>
            </li>
            
            <?php if($_SESSION['batasan']==1) { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-building"></i>
                <span>Perusahaan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=perusahaan/perusahaan"><i class="fa fa-circle-o"></i> Lihat / Update Perusahaan</a></li>
              </ul>
            </li>
            <?php } } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>