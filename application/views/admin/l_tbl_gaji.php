<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <div class="actions">
                    <a href="<?php echo base_URL(); ?>index.php/admin/form_penggajian_submit/config_penggajian"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Kembali</a>
                    <b>Data Gaji Dosen Dan Karyawan <?php echo $bulana."  ".$tahuna ; ?></b>
                </div>

            </header>
            <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

            <!-- </div> -->
            <div class="panel-body table-responsive">
                <div class="box-tools m-b-15">
                    <form action="<?php echo base_URL(); ?>index.php/admin/form_penggajian_submit/cari" method="POST">
                        <div class="input-group">
                            <input type='hidden' value="<?php echo $bulana?>" class="form-control input-sm pull-right" style="width: 150px;"  name='bulan' placeholder='Kata Kunci Pencarian...' required />
                            <input type='hidden' value="<?php echo $tahuna?>" class="form-control input-sm pull-right" style="width: 150px;"  name='tahun' placeholder='Kata Kunci Pencarian...' required />
                            <input type='text' class="form-control input-sm pull-right" style="width: 150px;"  name='q' placeholder='Cari Berdasarkan Nama..' required />
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <form action="<?php echo base_URL(); ?>index.php/admin/form_penggajian_submit/" method="POST">
                        <div class="text-right" style="margin-top: 10px;">
                            <input type='hidden' value="<?php echo $bulana?>" class="form-control input-sm pull-right" style="width: 150px;"  name='bulan' placeholder='Kata Kunci Pencarian...' required />
                            <input type='hidden' value="<?php echo $tahuna?>" class="form-control input-sm pull-right" style="width: 150px;"  name='tahun' placeholder='Kata Kunci Pencarian...' required />
                            <button type="submit" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></button>
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
                                    <th width="10%">Nama</th>
                                    <th width="10%">Jabatan</th>
                                    <th width="10%">Pendapatan Kotor</th>
                                    <th width="10%">Potongan</th>
                                    <th width="10%">Pendapatan Bersih</th>
                                    <th width="5%">Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (empty($tablegajih)) {
                                    echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                                } else {
                                $no 	= ($this->uri->segment(3) + 1);
                                foreach ($tablegajih as $b) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?> </td>
                                    <td><?php echo $b->nama;?></td>
                                    <td><?php echo $b->nama_jabatan;?></td>
                                    <td><?php echo "Rp.".number_format($b->gaji_kotor, 0,".",".");?></td>
                                    <td><?php echo "Rp.".number_format($b->potongan   , 0,".",".");?></td>
                                    <td><?php echo "Rp.".number_format($b->gaji_bersih, 0,".",".");?></td>
                                    <td class="ctr">
                                        <div class="btn-group">
                                            <form action="<?php echo base_URL()?>index.php/admin/form_penggajian_submit/inputGaji/<?php echo $b->nik;?>/<?php echo $bulana;?>/<?php echo $tahuna;?>" method="post">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Setting Honor Dan Potongan</button>
                                            </form>
                                        </div>
                                        <?php $no++; }}
                                        ?>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <center><ul class="pagination"><?php //echo $paginate; ?></ul></center>
                        </div>