<?php
if (empty($ambildata)) {
    echo "woiiii";
} else {



    $nik = $ambildata->nik;
    $noSlip = $ambildata->no_slip;

    if($ambildata1 != null){
        $jumlahnya = $ambildata1->jumlah;
    }
    $bulan  = $ambildata->bulan;
    $tahun  = $ambildata->tahun;

    $idTransaksi = $ambildata1->id_perkiraan;

    $gator  = $ambildata->gaji_kotor;

    $potong = $ambildata->potongan - $jumlahnya;

    $cekpotongan = $ambildata->potongan;
    $hasil = $gator - $potong;

    if($cekpotongan != null){
        $this->db->query("DELETE FROM rincian_potongan_gaji WHERE nik='$nik' and bulan='$bulan' and tahun='$tahun' and id_perkiraan='$idTransaksi'");
        $this->db->query("UPDATE transaksi_gaji SET potongan='$potong', gaji_bersih = '$hasil'
                      WHERE no_slip='$noSlip' and nik='$nik' and bulan='$bulan' and tahun='$tahun'");
     }else {
        $this->db->query("DELETE FROM rincian_potongan_gaji WHERE nik='$nik' and bulan='$bulan' and tahun='$tahun' and id_perkiraan='$idTransaksi'");
        $this->db->query("UPDATE transaksi_gaji SET potongan='0', gaji_bersih = '$gator'
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
