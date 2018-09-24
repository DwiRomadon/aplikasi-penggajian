<?php
if (empty($ambildata)) {
    echo "woiiii";
} else {

    $nik               = $ambildata->nik;
    $noSlip            = $ambildata->no_slip;
    $jumlahPottidakfix = $ambildata1->totJum;
    $jumlahpotonganfix = $ambildata2->totJum2;
    $jumlah            =  $jumlahpotonganfix + $jumlahPottidakfix;
    $bulan             = $ambildata->bulan;
    $tahun             = $ambildata->tahun;

    $gator  = $ambildata->gaji_kotor;
    $potongan = $ambildata->potongan;

    if($potongan != null){
        $hasil = $gator - $jumlah;
    }else {
        $hasil = $gator + $potongan;
    }


    $this->db->query("UPDATE transaksi_gaji SET potongan='$jumlah', gaji_bersih = '$hasil'
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
