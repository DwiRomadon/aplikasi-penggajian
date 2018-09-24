<?php
$mode		= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
    $act	            = "act_edt";
    $id					= $datpil->id;
    $nik                = $datpil->nik;
    $gapok			    = $datpil->gapok;
    $transport 			= $datpil->transport;
    $uangmakan 			= $datpil->uang_makan;
    $grade 			    = $datpil->grade;
    $tunjaskes 			= $datpil->tunj_askes;
    $tunjanganFungDos 	= $datpil->tunj_fungsional_dos;
    $tunjanganFungKar 	= $datpil->tunj_fungsional_kar;
    $honorNgajar 	    = $datpil->honor_mengajar;
    $tunJA 		        = $datpil->tunj_ja;
    $tunNatura 		    = $datpil->tunj_natura;
    $tunLain 		    = $datpil->tunj_lain;
    $tgl                = "";

} else {
    $act	            = "act_add";
    $id					= "";
    $nik                = "";
    $gapok			    = "";
    $transport 			= "";
    $uangmakan 			= "";
    $grade 			    = "";
    $tunjaskes 			= "";
    $tunjanganFungDos 	= "";
    $tunjanganFungKar 	= "";
    $honorNgajar 	    = "";
    $tunJA 		        = "";
    $tunNatura 		    = "";
    $tunLain 		    = "";
    $tgl                = date('Y-m-d');

}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <b>Form Master Gaji</b>
            </header>
        </div>
    </div>
</div>

<form action="<?php echo base_URL(); ?>index.php/admin/master_gaji/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="tgl" value="<?php echo $tgl; ?>">

    <div class="row-fluid well" style="overflow: hidden">
        <?php echo $this->session->userdata("k");?>

        <div class="col-lg-6">
            <table width="100%" class="table-form">
                <tr><td>Nama / NIK</td><td colspan="3"><div class="select-error">
                            <select name="nik" class="form-control selectpicker" id="select-person" data-live-search="true" required>
                                <?php
                                $datax		= $this->db->query("Select * From karyawan")->result();
                                $dataxx     = $this->db->query("SELECT * FROM karyawan where nik='$nik'")->result();
                                $no 	    = ($this->uri->segment(4) + 1);

                                if ($nik == '') { ?>
                                    <option value="">-- Nama / NIK Karyawan --</option>
                                <?php } else {?>
                                    <?php
                                    if(empty($dataxx)){
                                        echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                                    } else {
                                        $no 	= ($this->uri->segment(4) + 1);
                                        foreach ($dataxx as $b) {?>
                                            <option value="<?php echo $b->nik?>"><?php echo $b->nik." / ".$b->nama?></option>
                                            <?php
                                        } ?>
                                        <div class="label label-danger">No Action</div>
                                        <?php
                                    }?>
                                <?php } ?>


                                <?php
                                if (empty($datax)) {
                                    echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                                } else {
                                    $no 	= ($this->uri->segment(4) + 1);
                                    foreach ($datax as $b) {
                                        ?>
                                        <option value="<?php echo $b->nik?>"><?php echo $b->nik." / ".$b->nama?></option>
                                    <?php }  ?>
                                <?php } ?>
                            </select></div></td>
                </tr>
                <tr><td width="50%">Gaji Pokok</td><td><b><input type="number" name="gapok" required value="<?php echo $gapok;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Transport</td><td><b><input type="number" name="transport" required value="<?php echo $transport;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Uang Makan</td><td><b><input type="number" name="uangmakan" required value="<?php echo $uangmakan;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Honor Mengajar</td><td><b><input type="number" name="honorNgajar" required value="<?php echo $honorNgajar;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Grade</td><td><b><input type="number" name="grade" required value="<?php echo $grade;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj Askes</td><td><b><input type="number" name="tunaskes" required value="<?php echo $tunjaskes;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <td colspan="2">
                    <br><button type="submit" class="btn btn-primary" tabindex="7" ><i class="icon icon-ok icon-white"></i> Simpan</button>
                    <a href="<?php echo base_URL(); ?>index.php/admin/master_gaji" class="btn btn-success" tabindex="8" ><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
                </td></tr>
            </table>
        </div>
        <div class="col-lg-6">
            <table width="100%" class="table-form">
                <tr><td width="30%">Tunj Fung(Dos YAL)</td><td><b><input type="number" name="tunFungDos" required value="<?php echo $tunjanganFungDos;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj Fung Karyawan</td><td><b><input type="number" name="tunFungKar" required value="<?php echo $tunjanganFungKar;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj J.A</td><td><b><input type="number" name="tunJA" required value="<?php echo $tunJA;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj Natura</td><td><b><input type="number" name="tunNatura" required value="<?php echo $tunNatura;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
                <tr><td width="20%">Tunj Lain-Lain</td><td><b><input type="number" name="tunLain" required value="<?php echo $tunLain;?>" style="width: 300px" class="form-control" tabindex="1" ></b></td></tr>
            </table>
        </div>


    </div>

</form>
