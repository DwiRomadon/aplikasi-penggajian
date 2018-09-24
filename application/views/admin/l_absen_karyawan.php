<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <div class="actions">
                    <a href="<?php echo base_URL(); ?>index.php/admin/input_absen_karyawan/"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Kembali</a>
                    <b>&nbsp;&nbsp;&nbsp;&nbsp; Data Absen Karyawan Bulan <?php echo $bulana." Tahun ".$tahuna ; ?></b>
                </div>

            </header>
            <!-- </div> -->
            <div class="panel-body table-responsive">
                <div class="box-tools m-b-15">
                    <form action="<?php echo base_URL(); ?>index.php/admin/manage_absen_karyawan/cari" method="POST">
                        <div class="input-group">
                            <input type='hidden' class="form-control input-sm pull-right" style="width: 150px;" value="<?php echo $bulana?>"  name='bulan' placeholder='Kata Kunci Pencarian...' required />
                            <input type='hidden' class="form-control input-sm pull-right" style="width: 150px;" value="<?php echo $tahuna?>" name='tahun' placeholder='Kata Kunci Pencarian...' required />
                            <input type='text' class="form-control input-sm pull-right" style="width: 150px;"  name='q' placeholder='Kata Kunci Pencarian...' required />
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <form action="<?php echo base_URL(); ?>index.php/admin/manage_absen_karyawan/" method="POST">
                        <div class="input-group-btn">
                            <input type='hidden' class="form-control input-sm pull-right" style="width: 150px;" value="<?php echo $bulana?>"  name='bulan' placeholder='Kata Kunci Pencarian...' required />
                            <input type='hidden' class="form-control input-sm pull-right" style="width: 150px;" value="<?php echo $tahuna?>" name='tahun' placeholder='Kata Kunci Pencarian...' required />
                            <button class="btn btn-sm btn-info pull-right">Refresh <i class="fa fa-refresh"></i></button>
                        </div>
                    </form>
                </div>
            </div>

                <div class="clearfix">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->session->flashdata("k");?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Nik</th>
                                    <th width="10%">Nama</th>
                                    <th width="10%">Jumlah Hadir</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (empty($data)) {
                                    echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                                } else {
                                $no 	= ($this->uri->segment(3) + 1);
                                foreach ($data as $b) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?> </td>
                                    <td><?php echo $b->nik;?></td>
                                    <td><?php echo $b->nama;?></td>
                                    <td><?php echo $b->jumlah_hadir;?></td>
                                    <td class="ctr">
                                        <div class="btn-group">
                                            <a href="<?php echo base_URL()?>index.php/admin/manage_absen_karyawan/edt/<?php echo $b->nik?>/<?php echo $bulana?>/<?php echo $tahuna?>/" type="submit" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit Data Absen</a>
                                        </div>
                                        <?php $no++; }}
                                        ?>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <center><ul class="pagination"><?php echo $pagi; ?></ul></center>
                        </div>