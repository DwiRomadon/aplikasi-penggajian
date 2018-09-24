<?php
$mode		= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
    $act	        = "act_edt";
    $nik	        = $datpil->nik;
    $nama	        = $datpil->nama;
    $jumlahHadir	= $datpil->jumlah_hadir;

}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <div class="actions">
                    <table>
                    <form action="<?php echo base_URL(); ?>index.php/admin/manage_absen_karyawan/" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $bulana?>" name="bulan">
                        <input type="hidden" value="<?php echo $tahuna?>" name="tahun">
                        <button class="btn" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp; Kembali</button>
                    </form>
                     <b>&nbsp;&nbsp;&nbsp;&nbsp; Edit Jumlah hadir <?php echo $bulana." Tahun ".$tahuna ; ?></b>
                    </table>
                </div>

            </header>

        </div>
    </div>
</div>

<form action="<?php echo base_URL(); ?>index.php/admin/manage_absen_karyawan/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

<div class="row-fluid well" style="overflow: hidden">
        <div class="col-lg-6">
            <?php echo $this->session->flashdata("k");?>
            <table width="100%" class="table-form">

                <tr><td width="20%">NIK</td><td><b><input name="nik" readonly type="text"  required value="<?php echo $nik; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><input readonly type="hidden" name="bulan" required value="<?php echo $bulana; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></tr>
                <tr><input type="hidden" name="tahun" required value="<?php echo $tahuna; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></tr>
                <tr><td width="20%">Nama</td><td><b><input readonly type="text" required value="<?php echo $nama; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Jumlah Hadir</td><td><b><input type="text" name="jumlah_hadir" required value="<?php echo $jumlahHadir; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <td colspan="2">
                    <br><button type="submit" class="btn btn-primary" tabindex="7" ><i class="icon icon-ok icon-white"></i> Simpan</button>


                </td></tr>
            </table>
        </div>

    </div>
</form>



