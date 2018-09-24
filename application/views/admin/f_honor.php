<?php
$mode		= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
    $act	= "act_edt";
    $id		= $datpil->id;
    $nama	= $datpil->nama;
    $aktif	= $datpil->aktif;
    $jenis	= $datpil->jenis;

} else {
    $act	= "act_add";
    $id		= "";
    $kode	= "";
    $nama	= "";
    $aktif	= "";
    $jenis	= "";
}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <b>Manage Honor</b>
            </header>
        </div>
    </div>
</div>

<form action="<?php echo base_URL(); ?>index.php/admin/master_honor/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="row-fluid well" style="overflow: hidden">

        <div class="col-lg-6">
            <table width="100%" class="table-form">
                 <tr><td width="20%">Nama</td><td><b><input type="text" name="nama" required value="<?php echo $nama; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Jenis</td>
                    <td>
                        <div class="col-sm-6">
                            <?php if ($jenis == 'Honor' || $jenis == '') { ?>
                                <label>
                                    <input type="radio" name="jenis" value="Honor" checked> Honor
                                </label>
                                <label>
                                    <input type="radio" name="jenis" value="Potongan"> Potongan
                                </label>
                            <?php } else { ?>
                                <label>
                                    <input type="radio" name="jenis" value="Honor"> Honor
                                </label>
                                <label>
                                    <input type="radio" name="jenis" value="Potongan" checked> Potongan
                                </label>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr><td width="20%">Aktif</td>
                    <td>
                        <div class="col-sm-4">
                            <?php if ($aktif == 'Y' || $aktif == '') { ?>
                                <label>
                                    <input type="radio" name="aktif" value="Y" checked> Y
                                </label>
                                <label>
                                    <input type="radio" name="aktif" value="N"> N
                                </label>
                            <?php } else { ?>
                                <label>
                                    <input type="radio" name="aktif" value="Y"> Y
                                </label>
                                <label>
                                    <input type="radio" name="aktif" value="N" checked> N
                                </label>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                    <td colspan="2">
                        <br><button type="submit" class="btn btn-primary" tabindex="7" ><i class="icon icon-ok icon-white"></i> Simpan</button>
                        <a href="<?php echo base_URL(); ?>index.php/admin/master_honor" class="btn btn-success" tabindex="8" ><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
                    </td></tr>
            </table>
        </div>

    </div>

</form>
