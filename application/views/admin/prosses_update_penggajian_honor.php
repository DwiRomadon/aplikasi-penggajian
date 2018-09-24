<?php
if (empty($ambildata)) {
    echo "woiiii";
} else {

    $nik            = $ambildata->nik;
    $noSlip         = $ambildata->no_slip;
    $jumlah         = $ambildata1->jumlah;
    $idPerkiraan    = $ambildata1->id_perkiraan;
    $bulan          = $ambildata->bulan;
    $tahun          = $ambildata->tahun;


    $gator          = $ambildata->gaji_kotor;
    $potongannya    = $ambildata->potongan;
    $hasil          = $gator + $jumlah;
    $gajibersih     = $hasil - $potongannya;
    $this->db->query("UPDATE transaksi_gaji SET gaji_kotor = '$hasil', gaji_bersih = '$gajibersih'  
                      WHERE no_slip='$noSlip' and nik='$nik' and bulan='$bulan' and tahun='$tahun'");
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
