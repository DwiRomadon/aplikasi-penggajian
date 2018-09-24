<?php
$mode		= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
    $act	            = "act_edt";
    $nik                = $datpil->nik;
    $jumQurban 	        = $datpil->jumpotqur;
    $angQurban 		    = $datpil->lama_angsuran_qurban;
    $jumKreBank 	    = $datpil->jumpotkrebank;
    $angKreBank         = $datpil->lama_ang_kre_bank;
    $jumKasbon     	    = $datpil->jumpotkasbon;
    $angKasbon     	    = $datpil->lama_ang_pot_kas;
    $jumKoprasiKredit   = $datpil->jumpotkopkre;
    $angKoprasiKredit   = $datpil->lama_ang_kop_kre;
    $jumKoprasiPokok    = $datpil->p_kop_pokok;
    $jumNatura          = $datpil->p_natura;
    $jumTht 	        = $datpil->p_tht;
    $jumAskes 	        = $datpil->p_askes;

} else {
    $act	            = "act_add";
    $nik 		        = "";
    $jumQurban 	        = "0";
    $angQurban 		    = "0";
    $jumKreBank 	    = "0";
    $angKreBank         = "0";
    $jumKasbon     	    = "0";
    $angKasbon     	    = "0";
    $jumKoprasiKredit   = "0";
    $angKoprasiKredit   = "0";
    $jumKoprasiPokok    = "0";
    $jumNatura          = "0";
    $jumTht 	        = "0";
    $jumAskes 	        = "0";

}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <a href="<?php echo base_URL(); ?>index.php/admin/setPotonganFix/"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Kembali</a>
                <b>Form Setting Potongan</b>
            </header>
        </div>
    </div>
</div>

<form action="<?php echo base_URL()?>index.php/admin/setPotonganFix/<?php echo $act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

<div class="col-lg-6">
    <div class="well">
            <table class="table-form" width="100%">
                <tr><td>Nama / NIK</td><td >
                        <select name="nik" class="form-control selectpicker" id="select-person" data-live-search="true" required>
                            <?php
                            $datax		= $this->db->query("SELECT * From karyawan")->result();
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
                        </select>
                    </td>
                </tr>
                <tr><td><h4><b> Qurban </b></h4></td></tr>
                <tr><td>Jumlah </td><td><input type="number" name="jumkurban" class="form-control" style="width: 200px" autofocus value="<?php echo $jumQurban?>" required></td></tr>
                <tr><td>Lama Angsuran</td><td><input type="number" class="form-control" value="<?php echo $angQurban?>" name="angkurban" style="width: 200px" ></td></tr>

                <tr><td><h4><b> Kredit Bank </b></h4></td></tr>
                <tr><td>Jumlah </td><td><input type="number" name="jumkrebank" class="form-control" style="width: 200px" autofocus value="<?php echo $jumKreBank?>" required></td></tr>
                <tr><td>Lama Angsuran</td><td><input type="number" class="form-control" name="angkrebank" value="<?php echo $angKreBank?>" style="width: 200px" required></td></tr>

                <tr><td><h4><b> Pinjaman / Kasbon </b></h4></td></tr>
                <tr><td>Jumlah </td><td><input type="number" name="jumkasbon" class="form-control" style="width: 200px" autofocus value="<?php echo $jumKasbon?>" required></td></tr>
                <tr><td>Lama Angsuran</td><td><input type="number" class="form-control" value="<?php echo $angKasbon?>" name="angkasbon" style="width: 200px" required></td></tr>

                <tr><td> <h4><b> Koprasi Kredit </b></h4></td></tr>
                <tr><td>Jumlah </td><td><input type="number" name="jumkoprasikredit" class="form-control" style="width: 200px" autofocus value="<?php echo $jumKoprasiKredit?>" required></td></tr>
                <tr><td>Lama Angsuran</td><td><input type="number" class="form-control" value="<?php echo $angKoprasiKredit?>" name="angkoprasikredit" style="width: 200px" required></td></tr>

            </table>

    </div>
</div>
    <div class="col-lg-6">
        <div class="well">

            <table class="table-form" width="100%">
                <tr><td><h4><b> Koprasi Pokok </b></h4></td></tr>
                <tr><td>Jumlah </td><td><input type="number" name="jumkoprasipokok" class="form-control" style="width: 200px" autofocus value="<?php echo $jumKoprasiPokok?>" required></td></tr>


                <tr><td><h4><b> Potongan Natura </b></h4></td></tr>
                <tr><td>Jumlah </td><td><input type="number" name="jumnatura" class="form-control" style="width: 200px" autofocus value="<?php echo $jumNatura?>" required></td></tr>

                <tr><td><h4><b> Potongan THT </b></h4></td></tr>
                <tr><td>Jumlah </td><td><input type="number" name="jumtht" class="form-control" style="width: 200px" autofocus value="<?php echo $jumTht?>" required></td></tr>

                <tr><td><h4><b> Potongan Askes </b></h4></td></tr>
                <tr><td>Jumlah </td><td><input type="number" name="jumaskes" class="form-control" style="width: 200px" autofocus value="<?php echo $jumAskes?>" required></td></tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="icon icon-ok icon-white"></i> Submit</button>
                    </td></tr>
            </table>
        </div>
    </div>
</form>