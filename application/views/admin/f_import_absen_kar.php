<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                    <div class="actions">
                        <div class="actions">
                               <b>&ensp;&ensp;&ensp;&ensp; Absen Karyawan</b>
                        </div>
                    </div>
            </header>
        </div>
    </div>
</div>

<form method="post" action="<?php echo base_url(); ?>index.php/admin/manage_absen_karyawan" enctype="multipart/form-data">
<div class="col-lg-6">
    <div class="row-fluid well" style="overflow: hidden">
        <td><h4><b> Lihat Absen Karyawan </b></h4></td>
        <hr style="height:1px;border-top:1px solid #23b7e5">
        <div class="container" style="height: 388px">
            <br />
            <table width="40%" class="table-form">
                <tr><td>Bulan</td><td colspan="3">
                        <select name="bulan" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">-- Pilih Bulan --</option>
                            <?php
                            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                            foreach ($bulan as $kampret){
                                echo"<option value='$kampret'> $kampret </option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td>Tahun</td><td colspan="3">
                        <select name="tahun" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">-- Pilih Tahun --</option>
                            <?php
                            $now=date('Y');
                            foreach (range(2016, $now) as $a)
                            {
                                echo "<option value='$a'>$a</option>";
                            }
                            ?>
                        </select>
                    </td>

                </tr>
                <tr><td colspan="6">
                        <br><button type="submit" class="btn btn-info pull-right" tabindex="9" ><i class="icon icon-ok icon-white"></i> Submit</button>
                    </td></tr>

            </table>
        </div>
    </div>
</div>
</form>

<div class="col-lg-6">
    <div class="row-fluid well" style="overflow: hidden">
        <td><h4><b> Import Absen Karyawan </b></h4></td>
        <hr style="height:1px;border-top:1px solid #23b7e5">
        <div class="container" style="height: 388px">
            <form method="post" action="<?php echo base_url(); ?>index.php/admin/upload" enctype="multipart/form-data">

                <table width="40%" class="table-form">
                <tr><td><p><label>Pilih file dengan format .Csv</label></tr></td>
                    <tr><td><input type="file" name="file" id="file" class="form-control" required accept=".xls, .xlsx, .csv" /></p></td></tr>
                <br />
                    <tr><td><input type="submit" name="import" value="Import" class="btn btn-info pull-right" /></td></tr>
                </table>
            </form>
            <br />
        </div>
    </div>
</div>