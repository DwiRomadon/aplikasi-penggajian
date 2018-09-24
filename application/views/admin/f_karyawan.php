<?php
$mode		= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
    $act	= "act_edt";
    $id					= $datpil->id;
    $idJabatan			= $datpil->id_jabatan;
    $nama 				= $datpil->nama;
    $alamat 			= $datpil->alamat;
    $noTelp 			= $datpil->no_telp;
    $jk 			    = $datpil->jk;
    $tempatLahir 		= $datpil->tempat_lahir;
    $tglLahir 			= $datpil->tgl_lahir;
    $email 			    = $datpil->email;
    $jabatanAkademik    = $datpil->id_jenjang;
    $norek              = $datpil->no_rek;
    $pendidikan 		= $datpil->pendidikan;
    $kode_otomatis      = $datpil->nik;
    $status             = $datpil->status;

} else {
    $act	    = "act_add";
    $id		    = "";
    $idJabatan  = "";
    $nama	    = "";
    $alamat	    = "";
    $noTelp     = "";
    $jk         = "";
    $tempatLahir= "";
    $tglLahir   = "";
    $email      = "";
    $pendidikan = "";
    $norek      = "";
    $status     = "";
    $tgl        = date('dmY');
    $cNik	    = $this->db->query("SELECT nik from karyawan");
    $jumlah_data= $cNik->num_rows();
    $result	    = $cNik->row();
    $datakode   = $cNik->result_array();

    if($datakode){
        $nilaikode = substr($jumlah_data[1], 1);
        $kode = (int) $nilaikode;
        // setiap $kode di tambah 1
        $kode = $jumlah_data + 1;
        // hasil untuk menambahkan kode
        // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
        // atau angka sebelum $kode
        $kode_otomatis = $tgl.str_pad($kode, 0, "0", STR_PAD_LEFT);
    }else {
        $kode_otomatis = $tgl."1";
    }

}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <b>Form Karywan</b>
            </header>
        </div>
    </div>
</div>

<form action="<?php echo base_URL(); ?>index.php/admin/master_karyawan/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="row-fluid well" style="overflow: hidden">

        <div class="col-lg-6">
            <table width="100%" class="table-form">
                <tr><td width="20%">NIK</td><td><b><input type="text" name="nik" required value="<?php echo $kode_otomatis;?>" style="width: 300px" class="form-control" tabindex="1" autofocus readonly="readonly"></b></td></tr>
                <tr><td width="20%">Nama</td><td><b><input type="text" name="nama" required value="<?php echo $nama; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Alamat</td><td><b><textarea type="text" name="alamat" required  style="width: 300px" class="form-control" tabindex="1" autofocus><?php echo $alamat; ?></textarea></b></td></tr>
                <tr><td width="20%">No. ATM</td><td><b><input type="number" name="norek" required  style="width: 300px" class="form-control" tabindex="1" autofocus value="<?php echo $norek; ?>"></input></b></td></tr>
                <tr><td>Jabatan</td><td colspan="3">
                        <select name="idJabatan" class="form-control selectpicker" id="select-person" data-live-search="true" required>
                            <?php
                            $datax		= $this->db->query("Select * From jabatan where aktif='Y' and jenis = 'J'")->result();
                            $dataxx     = $this->db->query("SELECT DISTINCT jabatan.nama_jabatan as nmj, jabatan.id as idj FROM karyawan INNER JOIN jabatan ON karyawan.id_jabatan = jabatan.id where jabatan.id='$idJabatan' and aktif='Y'")->result();
                            $no 	    = ($this->uri->segment(4) + 1);

                            if ($idJabatan == '') { ?>
                                <option value="">-- Pilih Jabatan --</option>
                            <?php } else {?>
                                <?php
                                if(empty($dataxx)){
                                    echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                                } else {
                                    $no 	= ($this->uri->segment(4) + 1);
                                    foreach ($dataxx as $b) {?>
                                        <option value="<?php echo $b->idj?>"><?php echo $b->nmj?></option>
                                        <?php
                                    } ?>
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
                                <option value="<?php echo $b->id?>"><?php echo $b->nama_jabatan?></option>
                            <?php }  ?>
                            <?php } ?>
                        </select></td>
                </tr>
                <tr><td>Jabatan Akademik</td><td colspan="3">
                        <select name="ja" class="form-control selectpicker" id="select-person" data-live-search="true" required>
                            <?php
                            $datax		= $this->db->query("Select * From jabatan where aktif='Y' and jenis = 'JA'")->result();
                            $dataxx     = $this->db->query("SELECT DISTINCT jabatan.nama_jabatan as nmj, jabatan.id as idj FROM karyawan INNER JOIN jabatan ON karyawan.id_jenjang = jabatan.id where karyawan.id_jenjang='$jabatanAkademik' and aktif='Y'")->result();
                            $no 	    = ($this->uri->segment(4) + 1);

                            if ($idJabatan == '') { ?>
                                <option value="">-- Pilih Jabatan Akademik--</option>
                            <?php } else {?>
                                <?php
                                if(empty($dataxx)){
                                    echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                                } else {
                                    $no 	= ($this->uri->segment(4) + 1);
                                    foreach ($dataxx as $b) {?>
                                        <option value="<?php echo $b->idj?>"><?php echo $b->nmj?></option>
                                        <?php
                                    } ?>
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
                                    <option value="<?php echo $b->id?>"><?php echo $b->nama_jabatan?></option>
                                <?php }  ?>
                            <?php } ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Pendidikan</td><td colspan="3"><select name="pendidikan" class="form-control selectpicker" id="select-person" data-live-search="true" required>
                            <?php if($pendidikan == ''){ ?>
                                <option value="">-- Pilih Pendidikan --</option>
                            <?php } else { ?>
                                <option value="<?php echo $pendidikan; ?>"><?php echo $pendidikan; ?></option>
                            <?php } ?>

                            <?php
                            $pend = ["SD", "SMP", "SMA/SMK", "D1" ,"D3", "S1", "S2", "S3"];
                            foreach ($pend as $pendi){?>
                                <option value="<?php echo $pendi;?>"><?php echo $pendi;?></option>
                            <?php }?>
                        </select></td>
                </tr>
                <tr>
                    <td>Status</td><td colspan="3"><select name="status" class="form-control selectpicker" id="select-person" data-live-search="true" required>
                            <?php if($status == ''){ ?>
                                <option value="">-- Status Dosen/Karyawan --</option>
                            <?php } else { ?>
                                <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                            <?php } ?>

                            <?php
                            $status = ["Tetap", "LB", "Kontrak"];
                            foreach ($status as $stts){?>
                                <option value="<?php echo $stts;?>"><?php echo $stts;?></option>
                            <?php }?>
                        </select></td>
                </tr>
                <tr><td width="20%">No Telp</td><td><b><input type="text" name="notelp" required value="<?php echo $noTelp; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Jenis Kelamin</td>
                    <td>
                        <div class="col-sm-4">
                            <?php if ($jk == 'L' || $jk == '') { ?>
                                <label>
                                    <input type="radio" name="jk" value="L" checked> Laki - Laki
                                </label>
                                <label>
                                    <input type="radio" name="jk" value="P"> Perempuan
                                </label>
                            <?php } else { ?>
                                <label>
                                    <input type="radio" name="jk" value="L"> Laki-Laki
                                </label>
                                <label>
                                    <input type="radio" name="jk" value="P" checked> Perempuan
                                </label>
                            <?php } ?>
                        </div>
                    </td></tr>
                <tr><td width="20%">Tempat Lahir</td><td><b><input type="text" name="tempatLahir" required value="<?php echo $tempatLahir; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Tanggal Lahir</td><td><b><input type="date" name="tglLahir" value="<?php echo $tglLahir; ?>" id="date" class="form-control" ></b></td></tr>
                <tr><td width="20%">Email</td><td><b><input type="text" name="email" required value="<?php echo $email; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr>
                    <td colspan="2">
                        <br><button type="submit" class="btn btn-primary" tabindex="7" ><i class="icon icon-ok icon-white"></i> Simpan</button>
                        <a href="<?php echo base_URL(); ?>index.php/admin/master_karyawan" class="btn btn-success" tabindex="8" ><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
                    </td></tr>
            </table>
        </div>

    </div>

</form>
