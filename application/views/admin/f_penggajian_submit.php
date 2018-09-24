<?php
    $id					= $datpil->id;
    $nik                = $datpil->nik;
    $nama               = $datpil->nama;
    $jabatan			= $datpil->nama_jabatan;
    $gapok			    = $datpil->gapok;
    $transport          = $datpil->transport;

    $uangMakan          = $datpil->uang_makan;
    $honorNgajar        = $datpil->honor_mengajar;
    $grade              = $datpil->grade;
    $tunjAskes          = $datpil->tunj_askes;
    $tunFungdos         = $datpil->tunj_fungsional_dos;
    $tunFungKar         = $datpil->tunj_fungsional_kar;
    $tunjJa             = $datpil->tunj_ja;
    $tunjNatura         = $datpil->tunj_natura;
    $tunjLain           = $datpil->tunj_lain;
    $kotor              = $datpil->gaji_kotor;
    $potongan           = $datpil->potongan;
    $bersih             = $datpil->gaji_bersih;
    $noSlip             = $datpil->no_slip;
    $bulan              = $datpil->bulan;
    $tahun              = $datpil->tahun;
    $tglGajian          = $datpil->tgl_gaji;
    //$juml               = $datas->jumlah_hadir;
    if($datas == null){
        $jumlah_absen_kar   = 0;
        $hitTransport = 0;
        $hitUangMkn= 0;
    }else{
        $jumlah_absen_kar   = $datas->jumlah_hadir;
        $hitTransport       = $transport * $jumlah_absen_kar;
        $hitUangMkn         = $uangMakan * $jumlah_absen_kar;
    }
    $tgl                = date('d-m-Y');
    $tglslip            = date('dmY');


    $totalk = $datpil->absen_ngajar;

    $hitHonorNgajar = $honorNgajar * $totalk;
?>
<script>
    $(document).on({
        "contextmenu": function(e) {
            console.log("ctx menu button:", e.which);

            // Stop the context menu
            e.preventDefault();
        },
        "mousedown": function(e) {
            console.log("normal mouse down:", e.which);
        },
        "mouseup": function(e) {
            console.log("normal mouse up:", e.which);
        }
    });
</script>
<style>
    .button {
        width: 175px;
        height: 35px;
    }
</style>


<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <form method="post" action="<?php echo base_URL(); ?>index.php/admin/form_penggajian_submit/table_gaji" accept-charset="utf-8" enctype="multipart/form-data" name="myform">
                <div class="actions">
                    <div class="actions">
                        <input type="hidden" name="bulan" value="<?php echo  $bulan?>">
                        <input type="hidden" name ="tahun" value="<?php echo  $tahun?>">
                        <a onclick="myform.submit()"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Kembali</a>
                        <b>&ensp;&ensp;&ensp;&ensp;Detail Gaji</b>
                    </div>
                </div>
                </form>
            </header>
        </div>
    </div>
</div>

    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="row-fluid well" style="overflow: hidden">
        <div class="text-left">
            <button type="submit" class="btn btn-success" onclick=" window.open('<?php echo base_URL()?>index.php/admin/form_penggajian_submit/view_slip/<?php echo $nik;?>/<?php echo $bulan;?>/<?php echo $tahun;?>', '_blank');" tabindex="9" ><i class="fa fa-print"></i> Cetak PDF</button>
        </div>
        <div class="col-lg-6">
            <table width="100%" class="table-form">
                <input type="hidden" name="bulan" value="<?php echo  $bulan?>">
                <input type="hidden" name ="tahun" value="<?php echo  $tahun?>">
                <tr><td width="20%">No Slip</td><td><b><input type="text" name="no_slip" required value="<?php echo $noSlip; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus readonly="readonly"></b></td></tr>
                <tr><td width="20%">Tanggal</td><td><b><input type="text" name="alamat" required value="<?php echo $tglGajian; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus readonly="readonly"></b></td></tr>
                <tr><td width="20%">NIK</td><td><b><input type="text" name="nik" required value="<?php echo $nik; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus readonly="readonly"></b></td></tr>
                <tr><td width="20%">Nama</td><td><b><input type="text" name="alamat" required value="<?php echo $nama; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus readonly="readonly"></b></td></tr>
                <tr><td width="20%">Jumlah Hari Kerja</td><td><b><input readonly="readonly" type="text" value="<?php echo $jumlah_absen_kar;?>" name="alamat" id='gapok' required  style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Jumlah Hadir Mengajar</td><td><b><input readonly="readonly" type="text" value="<?php echo $totalk;?>" name="alamat" required  style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Jabatan</td><td><b><input readonly="readonly" type="text" name="notelp" required value="<?php echo $jabatan;?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="50%">Gaji Pokok</td><td><b><input readonly="readonly" type="text" name="gapok" required value="<?php echo "Rp. ".number_format($gapok, 0,".",".");?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Transport</td><td><b><input readonly="readonly" type="text" name="transport" required value="<?php echo "Rp. ".number_format($hitTransport, 0,".",".");?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Uang Makan</td><td><b><input readonly="readonly" type="text" name="uangmakan" required value="<?php echo "Rp. ".number_format($hitUangMkn, 0,".",".") ;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td><hr style="height:1px;border-top:1px solid #23b7e5"></td><td><hr style="height:1px;border-top:1px solid #23b7e5"></td></tr>
                <tr><td><h4><b>Total</b></h4></td></tr>
                <tr><td width="20%">Penerimaan kotor</td><td><b><input readonly="readonly" type="text" name="honorNgajar" required value="<?php echo "Rp. ".number_format($kotor, 0,".",".");?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Potongan</td><td><b><input type="text" readonly="readonly" name="grade" required value="<?php echo "Rp. ".number_format($potongan, 0,".",".");?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Penerimaan Bersih</td><td><b><input readonly="readonly" type="text" name="tunaskes" required value="<?php echo "Rp. ".number_format($bersih, 0,".","."); ?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>

            </table>
        </div>
        <div class="col-lg-6" >
            <table width="100%" class="table-form">
                <tr><td width="20%">Honor Mengajar</td><td><b><input readonly="readonly" type="text" name="honorNgajar" required value="<?php echo "Rp. ".number_format($hitHonorNgajar, 0,".",".");?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Grade</td><td><b><input type="text" readonly="readonly" name="grade" required value="<?php echo "Rp. ".number_format($grade, 0,".",".") ;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj Askes</td><td><b><input readonly="readonly" type="text" name="tunaskes" required value="<?php echo "Rp. ".number_format($tunjAskes, 0,".",".") ;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="30%">Tunj Fung(Dos YAL)</td><td><b><input readonly="readonly" type="text" name="tunFungDos" required value="<?php echo "Rp. ".number_format($tunFungdos, 0,".",".") ;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj Fung Karyawan</td><td><b><input readonly="readonly" type="text" name="tunFungKar" required value="<?php echo "Rp. ".number_format($tunFungKar, 0,".",".") ;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj J.A</td><td><b><input type="text" readonly="readonly" name="tunJA" required value="<?php echo "Rp. ".number_format($tunjJa, 0,".",".") ;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj Natura</td><td><b><input type="text" readonly="readonly" name="tunNatura" required value="<?php echo "Rp. ".number_format($tunjNatura, 0,".",".");?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj Lain-Lain</td><td><b><input type="text" readonly="readonly" name="tunLain" required value="<?php echo "Rp. ".number_format($tunjLain, 0,".",".");?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
            </table>
        </div>
    </div>
<div class="col-lg-12">
    <div class="clearfix">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-1">
                    <h4><b>Honor </b></h4>
                </div>
                <form action="<?php echo base_URL()?>index.php/admin/form_penggajian_submit/inputhonor" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <input type="hidden" name="bulan" value="<?php echo  $bulan?>">
                    <input type="hidden" name ="tahun" value="<?php echo  $tahun?>">
                    <input type="hidden" name ="nik" value="<?php echo  $nik?>">
                    <input type="hidden" name ="nama" value="<?php echo  $nama?>">
                    <input type="hidden" name ="nomorslippp" value="<?php echo  $noSlip?>">
                    &ensp;&ensp;<button type="submit" class="btn btn-success button button" tabindex="9" ><i class="fa fa-plus"></i> Input Honor </button>
                </form>
                <?php echo $this->session->flashdata("k");?>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="1%" >No</th>
                        <th width="3%">Nama</th>
                        <th width="2%">Jumlah</th>
                        <th width="1%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $tbl = $this->db->query("Select * From perkiraan INNER JOIN rincian_transaksi_gaji On 
                                             perkiraan.id=rincian_transaksi_gaji.id_perkiraan where 
                                             rincian_transaksi_gaji.no_slip='$noSlip' and rincian_transaksi_gaji.nik ='$nik' 
                                             and rincian_transaksi_gaji.bulan = '$bulan' and rincian_transaksi_gaji.tahun = '$tahun'")->result();

                    if (empty($tbl)) {
                        echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Tidak Ada Data--</td></tr>";
                    } else {
                    $no 	= ($this->uri->segment(2) + 1);
                    foreach ($tbl as $b) {
                    ?>
                    <tr>
                        <td><?php echo $no ; ?> </td>
                        <td><?php echo $b->nama ;?></td>
                        <td><?php echo "Rp. ".number_format($b->jumlah, 0,".",".");?></td>
                        <td class="ctr">
                            <div class="btn-group">
                                <a href="<?php echo base_URL()?>index.php/admin/form_penggajian_submit/delete_penggajian_honor/<?php echo $b->nik?>/<?php echo $b->bulan?>/<?php echo $b->tahun?>/<?php echo $b->id_perkiraan?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-white"> </i> Hapus</a>
                            </div>
                            <?php
                            $no++;
                            }
                    } ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-6">
                <div class="col-lg-2">
                    <h4><b>Potongan</b></h4>
                </div>
                <form action="<?php echo base_URL()?>index.php/admin/form_penggajian_submit/inputpotongan" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <input type="hidden" name="bulan" value="<?php echo  $bulan?>">
                    <input type="hidden" name ="tahun" value="<?php echo  $tahun?>">
                    <input type="hidden" name ="nama" value="<?php echo  $nama?>">
                    <input type="hidden" name ="nik" value="<?php echo  $nik?>">
                    <input type="hidden" name ="nomorslippp" value="<?php echo  $noSlip?>">
                    &ensp;&ensp;<button type="submit" class="btn btn-success button button" tabindex="9" ><i class="fa fa-plus"></i> Input Potongan</button>
                </form>
                <?php echo $this->session->flashdata("k");?>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="1%" >No</th>
                        <th width="3%">Nama</th>
                        <th width="2%">Jumlah</th>
                        <th width="1%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $tbl = $this->db->query("Select * From perkiraan INNER JOIN rincian_potongan_gaji On 
                                             perkiraan.id=rincian_potongan_gaji.id_perkiraan where 
                                             rincian_potongan_gaji.no_slip='$noSlip' and rincian_potongan_gaji.nik ='$nik' 
                                             and rincian_potongan_gaji.bulan = '$bulan' and rincian_potongan_gaji.tahun = '$tahun'")->result();

                    if (empty($tbl)) {
                        echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Tidak Ada Data--</td></tr>";
                    } else {
                    $no 	= ($this->uri->segment(2) + 1);
                    foreach ($tbl as $b) {
                    ?>
                    <tr>
                        <td><?php echo $no ; ?> </td>
                        <td><?php echo $b->nama ;?></td>
                        <td><?php echo "Rp. ".number_format($b->jumlah, 0,".",".");?></td>
                        <td class="ctr">
                            <div class="btn-group">
                                <a href="<?php echo base_URL()?>index.php/admin/form_penggajian_submit/delete_penggajian_potongan/<?php echo $b->nik?>/<?php echo $b->bulan?>/<?php echo $b->tahun?>/<?php echo $b->id_perkiraan?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-white"> </i> Hapus</a>
                            </div>
                            <?php
                            $no++;
                    }
                    } ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <div class="col-lg-2">
                    <?php $namapot = "Potongan_Fix" ?>
                    <h4><b><?php echo $namapot ?></b></h4>
                </div>
                <table class="table table-bordered table-hover" align="center">
                    <thead>
                    <tr >
                        <th width="1%" >No</th>
                        <th width="10%">Nama</th>
                        <th width="15%" >Jumlah</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $tbl = $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE nik='$nik' and bulan='$bulan' AND tahun ='$tahun'")->result();

                    if (empty($tbl)) {
                        echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Tidak Ada Data--</td></tr>";
                    } else {
                    $no 	= ($this->uri->segment(2) + 1);
                    foreach ($tbl as $b) {
                    ?>
                    <tr>
                        <td ><?php echo $no ; ?> </td>
                        <td ><?php echo $b->nama_pot ;?></td>
                        <td ><?php echo "Rp. ".number_format($b->jumlah, 0,".",".");?></td>
                        <?php
                            $no++;
                        }
                    }
                    ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>