<?php
if (empty($tablewoi)) {
    echo "";
} else {
    $no 	= ($this->uri->segment(3) + 1);
    foreach ($tablewoi as $b) {
        ob_start();
        $nik            = $b->nik;
        $tglan          = date('Y-m-d');
        $tgl            = date('dmY');
        $slip           = $nik."-".$tgl;
        $waktuInput     = date("Y-m-d h:i:sa");
        $gapok          = $b->gapok;
        //end prosess uang tranport dan uang makan
        $trasport       = $b->transport;
        $uangMakan      = $b->uang_makan;
        $q_cek	= $this->db->query("SELECT *  FROM absen_karyawan where nik = '$b->nik' and bulan ='$bulana' and tahun = '$tahuna'");
        $j_cek	= $q_cek->num_rows();
        $d_cek	= $q_cek->row();

        if($j_cek == 1) {
            $total = $d_cek->jumlah_hadir;
            $hitTransportAndMakan = $trasport + $uangMakan;
            $hasilMakanTranport   = $hitTransportAndMakan *  $total;
        }
        else {
            $total = 0;
            $hitTransportAndMakan = $trasport + $uangMakan;
            $hasilMakanTranport   = $hitTransportAndMakan *  $total;
        }
        //end prosess uang tranport dan uang makan
        $grade          = $b->grade;
        $tunjAskes      = $b->tunj_askes;
        $tunjfungdos    = $b->tunj_fungsional_dos;
        $tunjfungkar    = $b->tunj_fungsional_kar;
        $honor_ngajar   = $b->honor_mengajar;
        $q_cekk	= $this->db->query("SELECT *  FROM jumlahabsen where nidn = '$b->nik' and bulan ='$bulana' and tahun = '$tahuna'");
        $j_cekk	= $q_cekk->num_rows();
        $d_cekk	= $q_cekk->row();

        if($j_cekk == 1) {
            $totalk = $d_cekk->jumlah;
            $hitHonorNgajar = $honor_ngajar * $totalk;
        }
        else {
            $totalk = 0;
            $hitHonorNgajar = $honor_ngajar * $totalk;
        }

        $q_ceek	= $this->db->query("SELECT IFNULL(SUM(jumlah), 0) as pot_fix FROM `t_rincian_potongan_fix` WHERE `nik`='$b->nik' and `bulan`='$bulana' and tahun='$tahuna'");
        $j_ceek	= $q_ceek->num_rows();
        $d_ceek	= $q_ceek->row();



        $tunjJa         = $b->tunj_ja;
        $tunjNatura     = $b->tunj_natura;
        $tunjLain       = $b->tunj_lain;

        $hasil          = $gapok + $hasilMakanTranport + $grade + $tunjAskes + $tunjfungdos + $tunjfungkar
                          + $hitHonorNgajar + $tunjJa + $tunjNatura + $tunjLain;

        $potonganfix = $d_ceek->pot_fix;

        $gajiBersih = $hasil - $potonganfix;

        $q_cekk1	= $this->db->query("SELECT * FROM transaksi_gaji where nik = '$b->nik' and bulan='$bulana' and tahun='$tahuna'");
        $j_cekk1	= $q_cekk1->num_rows();
        $d_cekk1	= $q_cekk1->row();

        if($j_cekk1 == 0){
            $this->db->query("INSERT INTO transaksi_gaji VALUES (NULL,'$slip','$nik','$tglan','$hasil','$potonganfix','$gajiBersih','$waktuInput','$bulana','$tahuna','$totalk','-')");
        }

    }
}
?>

<?php
if(isset($bulana) && isset($tahuna))
{
    ?>
    <form name="myForm" id="myForm"  action="<?php echo base_url() ?>index.php/admin/form_penggajian_submit/table_gaji" method="POST">
        <input type="hidden" name="bulan" value="<?php echo $bulana?>">
        <input type="hidden" name="tahun" value="<?php echo $tahuna?>">
    </form>

    <script>
        function submitform()
        {
            document.getElementById("myForm").submit();
        }
        window.onload = submitform;
    </script>
    <?php
}
?>
