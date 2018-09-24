<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <b>Input Honor</b>
            </header>
        </div>
    </div>
</div>

<form action="<?php echo base_URL()?>index.php/admin/form_penggajian_submit/act_save" method="post" accept-charset="utf-8" enctype="multipart/form-data">

    <input type="hidden" name="id" value="">

    <div class="row-fluid well" style="overflow: hidden; height: 450px;">

        <div class="col-lg-6">
            <table width="100%" class="table-form">
                <tr><td width="20%">No Slip</td><td><b><input readonly="readonly" type="text" name="no_slip" required value="<?php echo $_POST['nomorslippp']; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Nik</td><td><b><input readonly="readonly" type="text" name="nik" required value="<?php echo $_POST['nik']; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Nama</td><td><b><input readonly="readonly" type="text" required value="<?php echo $_POST['nama']; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Bulan</td><td><b><input readonly="readonly" type="text" name="bulan" required value="<?php echo $_POST['bulan']; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td width="20%">Tahun</td><td><b><input readonly="readonly" type="text" name="tahun" required value="<?php echo $_POST['tahun']; ?>" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr><td>Nama Honor </td><td colspan="3">
                        <select name="id_perkiraan" class="form-control selectpicker"
                                data-live-search="true" required>
                            <option value="">-- Nama Honor --</option>
                            <?php

                            if (empty($data)) {
                                echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                            } else {
                                foreach ($data as $b) {
                                    $id = $b->id;
                                    ?>
                                    <option value="<?php echo $id?>"><?php echo $b->nama?></option>
                                    <?php

                                }
                            }?>
                        </select>
                    </td>
                </tr>
                <tr><td width="20%">Jumlah</td><td><b><input type="number" name="jumlah" required value="" style="width: 300px" class="form-control" tabindex="1" autofocus></b></td></tr>
                <tr>
                <td colspan="2">
                    <br><button type="submit" class="btn btn-primary" tabindex="7" ><i class="icon icon-ok icon-white"></i> Simpan</button>
                    <a href="<?php echo base_URL()?>index.php/admin/form_penggajian_submit/inputGaji/<?php echo $_POST['nik'];?>/<?php echo $_POST['bulan'];?>/<?php echo $_POST['tahun'];?>" class="btn btn-success" tabindex="8" ><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
                </td></tr>
            </table>
        </div>

    </div>
</form>
