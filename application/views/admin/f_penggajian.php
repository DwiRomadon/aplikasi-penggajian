<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <b>Lihat Data </b>
            </header>
            <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

            <!-- </div> -->
            <div class="panel-body table-responsive">
                <div class="box-tools m-b-15">
                </div>
                <form method="post" action="<?php echo base_URL(); ?>index.php/admin/form_penggajian_submit/inputGaji" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe">
                    <div class="row-fluid well" style="overflow: hidden; height: 340px;">

                        <div class="col-lg-10">
                            <table width="84%" class="table-form">
                                <tr><td>Nama</td><td colspan="3">
                                        <select name="nik" class="form-control selectpicker" data-live-search="true" required>
                                            <option value="">-- NIK / Nama Karyawan --</option>
                                            <?php

                                            $datax		= $this->db->query("Select * From karyawan")->result();
                                            $no 	= ($this->uri->segment(4) + 1);

                                            if (empty($datax)) {
                                                echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                                            } else {
                                                $no 	= ($this->uri->segment(4) + 1);
                                                $b = null;
                                                foreach ($datax as $b) {
                                                    ?>
                                                    <option value="<?php echo $b->nik?>"><?php echo $b->nik." / ".$b->nama?></option>
                                                    <?php
                                                }  }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                <tr><td colspan="3">
                                        <br><button type="submit" class="btn btn-primary" tabindex="9" ><i class="icon icon-ok icon-white"></i> Submit</button>
                                    </td></tr>

                            </table>

                        </div>
                        <div class="col-lg-6">
                            <table width="100%" class="table-form">
                            </table>
                        </div>
                    </div>
                </form>