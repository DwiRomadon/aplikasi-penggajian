<?php
if (empty($ambildata)) {
    echo "woiiii";
} else {

    $nik = $ambildata->nik;
    $noSlip = $ambildata->no_slip;

    $jumlahnya = $ambildata1->jumlah;
    $bulan  = $ambildata->bulan;
    $tahun  = $ambildata->tahun;

    $idTransaksi = $ambildata1->id_perkiraan;

    $gator  = $ambildata->gaji_kotor;

    $this->db->query("DELETE FROM rincian_transaksi_gaji WHERE nik='$nik' and bulan='$bulan' and tahun='$tahun' and id_perkiraan='$idTransaksi'");

    $sql        = $this->db->query("SELECT SUM(jumlah) as totJum FROM `rincian_potongan_gaji` WHERE nik='$nik' and bulan='$bulan' and tahun='$tahun' and no_slip='$noSlip'")->row();
    $sql2       = $this->db->query("SELECT IFNULL(SUM(jumlah), 0) as pot_fix FROM `t_rincian_potongan_fix` WHERE `nik`='$nik' and `bulan`='$bulan' and tahun='$tahun'")->row();


    $jumlah     = $sql->totJum + $sql2->pot_fix;

    if($jumlah != null){
        $hasil      = $gator - $jumlahnya;
        $hasilgaber = $hasil - $jumlah;
        $this->db->query("UPDATE transaksi_gaji SET gaji_kotor='$hasil', potongan='$jumlah', gaji_bersih = '$hasilgaber'
                      WHERE no_slip='$noSlip' and nik='$nik' and bulan='$bulan' and tahun='$tahun'");
    }else{
        $hasil      = $gator - $jumlahnya;
        $this->db->query("UPDATE transaksi_gaji SET gaji_kotor='$hasil', potongan='$jumlah', gaji_bersih = '$hasil'
                      WHERE no_slip='$noSlip' and nik='$nik' and bulan='$bulan' and tahun='$tahun'");
    }
}
?>

<?php
if(isset($bulan) && isset($tahun))
{
    ?>
    <form name="myForm" id="myForm"  action="<?php echo base_url() ?>index.php/admin/form_penggajian_submit/inputGaji/<?php echo $nik;?>/<?php echo $bulan;?>/<?php echo $tahun;?>" method="POST">
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