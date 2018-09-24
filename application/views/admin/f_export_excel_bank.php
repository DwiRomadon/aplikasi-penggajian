<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <b>Cetak Excel Bank</b>
            </header>
            <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

            <!-- </div> -->
            <div class="panel-body table-responsive">
                <div class="box-tools m-b-15">
                </div>
                <form method="post" action="<?php echo base_URL(); ?>index.php/admin/export_data_to_excel" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
                    <div class="row-fluid well" style="overflow: hidden; height: 540px;">

                        <div class="col-lg-10">
                            <table width="84%" class="table-form">
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
                                <tr>
                                <tr><td colspan="6">
                                        <br><button type="submit" class="btn btn-primary pull-right" tabindex="9" ><i class="icon icon-ok icon-white"></i> Submit</button>
                                    </td></tr>

                            </table>

                        </div>
                        <div class="col-lg-6">
                            <table width="100%" class="table-form">
                            </table>
                        </div>
                    </div>
                </form>