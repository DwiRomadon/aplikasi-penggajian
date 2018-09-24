<?php
$mode		= $this->uri->segment(3);

if ($mode == "bayar_potongan") {
    $act	            = "act_edt";
    $nik                = $datpil->nik;
    $nama               = $datpil->nama;
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

    $bulan = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );
    $kampret = $bulan[date('m')];

    $tahun = date('Y');

    $cAngsuran	= $this->db->query("SELECT t_pot_qurban.angsuran_ke as angkequr, t_pot_kredit_bank.angsuran_ke as angkekrebank, t_pot_kop_kredit.ansuran_ke as angkekopkre, t_pot_kasbon.angsuran_ke as angkekas FROM t_pot_qurban INNER JOIN t_pot_kredit_bank ON t_pot_qurban.nik = t_pot_kredit_bank.nik JOIN t_pot_kop_kredit ON t_pot_kredit_bank.nik = t_pot_kop_kredit.nik JOIN t_pot_kasbon On t_pot_kasbon.nik = t_pot_kop_kredit.nik WHERE t_pot_qurban.nik ='$nik'");
    $jumlah_data= $cAngsuran->num_rows();
    $result	    = $cAngsuran->row();

    if($result != null){
        $angsurankeKurban           = $result->angkequr + 1;
        $angsuranKeKreditbank       = $result->angkekrebank + 1;
        $angsurankeKasbon           = $result->angkekas + 1;
        $angsurankeKopKre           = $result->angkekopkre + 1;
    }else {
        $angsuranke = "0";
    }

}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <div class="actions">
                    <div class="actions">
                        <a href="<?php echo base_URL(); ?>index.php/admin/setPotonganFix/tabel_pootongan"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Kembali</a>
                        <b>&ensp;&ensp;&ensp;&ensp; Form Bayar Potongan / Kasbon <?php echo "Bulan ".$kampret." Tahun ".$tahun." ".$nama ?></b>

                    </div>
                </div>
            </header>
        </div>
    </div>
</div>
<?php echo $this->session->flashdata("k");?>

<?php
    if($jumQurban == 0){

    }else{
    ?>
<form method="post" action="<?php echo base_URL()?>index.php/admin/setPotonganFix/act_bayar_potongan_qurban">
    <div class="col-lg-6">
        <div class="well">
            <table class="table-form" width="100%">
                <tr><td><h4><b> Qurban </b></h4></td></tr>
                <tr><td>NIK </td><td><input type="text" class="form-control" value="<?php echo $nik?>" readonly name="nik" style="width: 200px" ></td></tr>
                <tr><td>Bulan</td><td><input type="text" class="form-control" readonly value="<?php echo $kampret;?>" name="bulan" style="width: 200px" ></td></tr>
                <tr><td>Tahun</td><td><input type="number" class="form-control" readonly value="<?php echo $tahun?>" name="tahun" style="width: 200px" ></td></tr>
                <tr><td>Jumlah </td><td><input type="number" name="jumkurban" class="form-control" readonly style="width: 200px" autofocus value="<?php echo $jumQurban?>" required></td></tr>
                <tr><td>Lama Angsuran</td><td><input type="number" class="form-control" readonly value="<?php echo $angQurban?>" name="angkurban" style="width: 200px" ></td></tr>
                 <?php
                    if($angsurankeKurban >= $angQurban || $jumQurban == 0){
                ?>
                        <tr><td>Angsuran Ke</td><td><input type="text" class="form-control" readonly value="<?php echo "Sudah Lunas"?>" name="angsuranke" style="width: 200px" ></td></tr>
                    <?php }else{?>
                        <tr><td>Angsuran Ke</td><td><input type="number" class="form-control" readonly value="<?php echo $angsurankeKurban?>" name="angsuranke" style="width: 200px" ></td></tr>
                        <tr><td>Jumlah Yg di Bayarkan</td><td><input type="number" class="form-control" name="jumlahygdibayar" style="width: 200px" ></td></tr>
                <?php }?>
                <tr>
                    <td colspan="2">
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="icon icon-ok icon-white"></i> Bayar</button>
                    </td></tr>
            </table>
        </div>
    </div>
</form>

<?php
    }
    if($jumKreBank == 0){

    }else{
?>
<form method="post" action="<?php echo base_URL()?>index.php/admin/setPotonganFix/act_bayar_potongan_kredit_bank">
    <div class="col-lg-6">
        <div class="well">
            <table class="table-form" width="100%">
                <tr><td><h4><b> Kredit Bank </b></h4></td></tr>
                <tr><td>NIK </td><td><input type="text" class="form-control" value="<?php echo $nik?>" readonly name="nik" style="width: 200px" ></td></tr>
                <tr><td>Bulan</td><td><input type="text" class="form-control" readonly value="<?php echo $kampret;?>" name="bulan" style="width: 200px" ></td></tr>
                <tr><td>Tahun</td><td><input type="number" class="form-control" readonly value="<?php echo $tahun?>" name="tahun" style="width: 200px" ></td></tr>
                <tr><td>Jumlah </td><td><input readonly type="number" name="jumkrebank" class="form-control" style="width: 200px" autofocus value="<?php echo $jumKreBank?>" required></td></tr>
                <tr><td>Lama Angsuran</td><td><input type="number" readonly class="form-control" name="angkrebank" value="<?php echo $angKreBank?>" style="width: 200px" required></td></tr>
                <tr><td>Angsuran Ke</td><td><input type="number" class="form-control" readonly value="<?php echo $angsuranKeKreditbank?>" name="angsuranke" style="width: 200px" ></td></tr>
                <tr><td>Jumlah Yg di Bayarkan</td><td><input type="number" class="form-control" name="jumlahygdibayar" style="width: 200px" ></td></tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="icon icon-ok icon-white"></i> Bayar</button>
                    </td></tr>
            </table>
        </div>
    </div>
</form>
<?php
    }

    if($jumKasbon == 0){

    }else{
?>

<form method="post" action="<?php echo base_URL()?>index.php/admin/setPotonganFix/act_bayar_potongaan_kasbon">
    <div class="col-lg-6">
        <div class="well">
            <table class="table-form" width="100%">
                <tr><td><h4><b> Pinjaman / Kasbon </b></h4></td></tr>
                <tr><td>NIK </td><td><input type="text" class="form-control" value="<?php echo $nik?>" readonly name="nik" style="width: 200px" ></td></tr>
                <tr><td>Bulan</td><td><input type="text" class="form-control" readonly value="<?php echo $kampret;?>" name="bulan" style="width: 200px" ></td></tr>
                <tr><td>Tahun</td><td><input type="number" class="form-control" readonly value="<?php echo $tahun?>" name="tahun" style="width: 200px" ></td></tr>
                <tr><td>Jumlah </td><td><input type="number" readonly name="jumkasbon" class="form-control" style="width: 200px" autofocus value="<?php echo $jumKasbon?>" required></td></tr>
                <tr><td>Lama Angsuran</td><td><input type="number" readonly class="form-control" value="<?php echo $angKasbon?>" name="angkasbon" style="width: 200px" required></td></tr>
                <tr><td>Angsuran Ke</td><td><input type="number" class="form-control" readonly value="<?php echo $angsurankeKasbon?>" name="angsuranke" style="width: 200px" ></td></tr>
                <tr><td>Jumlah Yg di Bayarkan</td><td><input type="number" class="form-control" name="jumlahygdibayar" style="width: 200px" ></td></tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="icon icon-ok icon-white"></i> Bayar</button>
                    </td></tr>
            </table>
        </div>
    </div>
</form>
<?php
    }

    if($jumKoprasiKredit == 0){

    }else{
?>

<form method="post" action="<?php echo base_URL()?>index.php/admin/setPotonganFix/act_bayar_potongaan_koprasi_kredit">
    <div class="col-lg-6">
        <div class="well">
            <table class="table-form" width="100%">
                <tr><td><h4><b> Koprasi Kredit </b></h4></td></tr>
                <tr><td>NIK </td><td><input type="text" class="form-control" value="<?php echo $nik?>" readonly name="nik" style="width: 200px" ></td></tr>
                <tr><td>Bulan</td><td><input type="text" class="form-control" readonly value="<?php echo $kampret;?>" name="bulan" style="width: 200px" ></td></tr>
                <tr><td>Tahun</td><td><input type="number" class="form-control" readonly value="<?php echo $tahun?>" name="tahun" style="width: 200px" ></td></tr>
                <tr><td>Jumlah </td><td><input readonly type="number" name="jumkoprasikredit" class="form-control" style="width: 200px" autofocus value="<?php echo $jumKoprasiKredit?>" required></td></tr>
                <tr><td>Lama Angsuran</td><td><input readonly type="number" class="form-control" value="<?php echo $angKoprasiKredit?>" name="angkoprasikredit" style="width: 200px" required></td></tr>
                <tr><td>Angsuran Ke</td><td><input type="number" class="form-control" readonly value="<?php echo $angsurankeKopKre?>" name="angsuranke" style="width: 200px" ></td></tr>
                <tr><td>Jumlah Yg di Bayarkan</td><td><input type="number" class="form-control" name="jumlahygdibayar" style="width: 200px" ></td></tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="icon icon-ok icon-white"></i> Bayar</button>
                    </td></tr>
            </table>
        </div>
    </div>
</form>
<?php }?>

