<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <b>Daftar Gaji Pegawai Bulan <?php echo $bulana?> Tahun <?php echo $tahuna?></b>
                <div class="text-right" style="margin-top: 10px;">
                    <a href="<?php echo base_URL(); ?>index.php/admin/master_honor" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></a>
                    <form action="<?php echo base_URL(); ?>index.php/admin/export_data_to_excel/export_excel" method="post">
                        <input type="hidden" value="<?php echo $bulana?>" name="bulan">
                        <input type="hidden" value="<?php echo $tahuna?>" name="tahun">
                        <button type="submit" class="btn btn-sm btn-success"> Export To Excel <i class="fa fa-file-excel-o"></i></button>
                    </form>
                </div>

            </header>
            <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

            <!-- </div> -->
            <div class="panel-body table-responsive">
                <div class="box-tools m-b-15">
                    <form action="<?php echo base_URL(); ?>index.php/admin/master_honor/cari" method="POST">
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
                                    <th width="10%">Nik</th>
                                    <th width="10%">Nama</th>
                                    <th width="10%">Gaji Pegawai</th>
                                    <th width="10%">No Rek</th>
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
                                    <td><?php echo $no ; ?> </td>
                                    <td><?php echo $b->nik ;?></td>
                                    <td><?php echo $b->nama ;?></td>
                                    <td><?php echo $b->gaji_bersih ;?></td>
                                    <td><?php echo $b->no_rek ;?></td>
                                        <?php $no++;  }} ?>
                                </tr>

                                </tbody>
                            </table>
                            <center><ul class="pagination"><?php echo $pagi; ?></ul></center>
                        </div>
