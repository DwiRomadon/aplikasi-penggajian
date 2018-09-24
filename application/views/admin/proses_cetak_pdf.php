<?php
if (empty($tablewoi)) {
    echo "";
} else {
    $no 	= ($this->uri->segment(3) + 1);
    foreach ($tablewoi as $b) {
        ob_start();
        $nik            = $b->nik;

        //Cetak PDF ALL
        $datpill	= $this->db->query("SELECT * FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik 
                                                JOIN jabatan ON karyawan.id_jabatan=jabatan.id 
                                                Join t_master_gajih ON karyawan.nik=t_master_gajih.nik
                                                WHERE karyawan.nik = '$nik' and transaksi_gaji.bulan='$bulana' and transaksi_gaji.tahun='$tahuna'")->row();
        $datass     = $this->db->query("SELECT * FROM `absen_karyawan` WHERE nik = '$nik' and bulan='$bulana' and tahun='$tahuna'")->row();
        $karr       = $this->db->query("SELECT * FROM `karyawan` where nik ='$nik'")->row();
        ob_start();
        $idd				= $datpill->id;
        $nikk               = $datpill->nik;
        $namaa              = $datpill->nama;
        $jabatann			= $datpill->nama_jabatan;
        $gapokk			    = $datpill->gapok;
        $transportt         = $datpill->transport;
        $uangMakann         = $datpill->uang_makan;
        $honorNgajarr       = $datpill->honor_mengajar;
        $gradee             = $datpill->grade;
        $tunjAskess         = $datpill->tunj_askes;
        $tunFungdoss        = $datpill->tunj_fungsional_dos;
        $tunFungKarr        = $datpill->tunj_fungsional_kar;
        $tunjJaa            = $datpill->tunj_ja;
        $tunjNaturaa        = $datpill->tunj_natura;
        $tunjLainn          = $datpill->tunj_lain;
        $kotorr             = $datpill->gaji_kotor;
        $potongann          = $datpill->potongan;
        $bersihh            = $datpill->gaji_bersih;
        $noSlipp            = $datpill->no_slip;
        $bulann             = $datpill->bulan;
        $tahunn             = $datpill->tahun;
        $tglGajiann         = $datpill->tgl_gaji;
        $tglLahirr          = $karr->tgl_lahir;

        $idJA               = $datpill->id_jenjang;
        $queryJabataAkadeik = $this->db->query("SELECT nama_jabatan FROM `jabatan` where id ='$idJA'")->row();


        if($datass == null){
            $jumlah_absen_karr   = 0;
            $hitTransportt = 0;
            $hitUangMknn= 0;
        }else{
            $jumlah_absen_karr   = $datass->jumlah_hadir;
            $hitTransportt       = $transportt * $jumlah_absen_karr;
            $hitUangMknn         = $uangMakann * $jumlah_absen_karr;
        }
        $tgll                = date('d-m-Y');
        $tglslipp            = date('dmY');


        $totalkk = $datpill->absen_ngajar;

        $hitHonorNgajarr = $honorNgajarr * $totalkk;

        $this->load->library('Pdf');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dwi Romadon S.Kom');
        $pdf->SetTitle(''.$nikk.'-'.$namaa.'-'.$bulann.'-'.$tahunn.'');
        $pdf->SetSubject('Slip Gaji');
        $pdf->SetKeywords('slip Gaji');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        $splitData = explode("-",$tglLahirr);

        $pdf->SetProtection(array('print', 'copy','modify'), ''.$splitData[2].''.$splitData[1].''.$splitData[0].'', ''.$splitData[1].''.$splitData[2].''.$splitData[0].'', 0, null);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);
        $pdf->SetTopMargin(5);

        // set auto page breaks
        //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetAutoPageBreak(TRUE, 0);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // set font
        $pdf->SetFont('dejavusans', '', 10);

        // add a page
        $pdf->AddPage();
        $i=0;
        $html='<div width="12%" style="text-align:center">
                       <h4>Universitas Bandar Lampung</h4>
                       <h4>Slip honor/gaji untuk bulan '.$bulann.' '.$tahunn.'</h4>
                   </div>
                   <table cellspacing="1" cellpadding="2">
                        <tr>
                            <td>Bandar Lampung, '.$tglGajiann.'</td>
                            <td>Jabatan : '.$jabatann.'</td>
                        </tr>
                        <tr>
                            <td>NIK : '.$nikk.'</td>
                            <td>Jabatan Akademik : '.$queryJabataAkadeik->nama_jabatan.'</td>
                        </tr>
                        <tr>
                             <td>Nama : '.$namaa.'</td>
                            <td>Honor Mengajar/jam: Rp. '.number_format($honorNgajarr, 0,".",",").'</td>
                          
                            </tr>
                        <tr>
                            <td>Jumlah Hadir Mengajar : '.$totalkk.'</td>
                            <td>Honor Kehadiran/hari: Rp. '.number_format($transportt, 0,".",",").'</td>
                            
                        </tr>
                        <tr>
                            <td>Jumlah Hari Bekerja : '.$jumlah_absen_karr.'</td>
                            <td>Uang Makan/hari: Rp. '.number_format($uangMakann, 0,".",",").'</td>
                            
                        </tr>
                   </table><br><br/>
                        <table width="185%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                            <tr bgcolor="#ffffff">
                                <td width="25%" align="center"><span style="font-weight:bold">Nama honor/potongan</span></td>
                                <td width="25%" align="center"><span style="font-weight:bold">Jumlah</span></td>
                            </tr>';

        $html.='<tr bgcolor="#ffffff">
                                <td>Gaji Pokok</td>
                                <td>Rp. '.number_format($gapokk, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Grade</td>
                                <td>Rp. '.number_format($gradee, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Askes</td>
                                <td>Rp. '.number_format($tunjAskess, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Funsional Dosen</td>
                                <td>Rp. '.number_format($tunFungdoss, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Fungsional Karyawan</td>
                                <td>Rp. '.number_format($tunFungKarr, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Transport</td>
                                <td>Rp. '.number_format($hitTransportt, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Jumlah Uang Makan</td>
                                <td>Rp. '.number_format($hitUangMknn, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Honor Memberi Kuliah</td>
                                <td>Rp. '.number_format($hitHonorNgajarr, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Jenjang Akademik</td>
                                <td>Rp. '.number_format($tunjJaa, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Natura</td>
                                <td>Rp. '.number_format($tunjNaturaa, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Lain-Lain</td>
                                <td>Rp. '.number_format($tunjLainn, 0,".",",").'</td>
                   </tr>
                   </table>';
        $tblhonor = $this->db->query("Select * From perkiraan INNER JOIN rincian_transaksi_gaji On 
                                             perkiraan.id=rincian_transaksi_gaji.id_perkiraan where 
                                             rincian_transaksi_gaji.no_slip='$noSlipp' and rincian_transaksi_gaji.nik ='$nikk' 
                                             and rincian_transaksi_gaji.bulan = '$bulann' and rincian_transaksi_gaji.tahun = '$tahunn'")->result();

        if($tblhonor != null){
            $html.='<table width="93%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                                <td align="center"><span style="font-weight:bold">Honor Tambahan</span></td>
                                <td>-</td>
                        </tr>
                        </table>';
        }

        foreach ($tblhonor as $b){

            $html.='<table width="93%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                                <td>'.$b->nama.'</td>
                                <td>Rp. '.number_format($b->jumlah, 0,".",",").'</td>
                        </tr>
                        </table>
                        ';

        }

        $tblpotongan = $this->db->query("Select * From perkiraan INNER JOIN rincian_potongan_gaji On 
                                             perkiraan.id=rincian_potongan_gaji.id_perkiraan where 
                                             rincian_potongan_gaji.no_slip='$noSlipp' and rincian_potongan_gaji.nik ='$nikk' 
                                             and rincian_potongan_gaji.bulan = '$bulann' and rincian_potongan_gaji.tahun = '$tahunn'")->result();

        if($tblpotongan != null){
            $html.='<table width="93%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                                    <td align="center"><span style="font-weight:bold">Potongan</span></td>
                                    <td>-</td>
                            </tr>
                        </table>';
        }

        foreach ($tblpotongan as $b){

            $html.='<table width="93%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                                <td>'.$b->nama.'</td>
                                <td>Rp. '.number_format($b->jumlah, 0,".",",").'</td>
                        </tr>
                        </table>
                        ';
        }
        $html.='<table width="93%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                    <tr bgcolor="#ffffff">
                                <td align="center"><span style="font-weight:bold">Total</span></td>
                                <td>-</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                                <td>Penerimaan Kotor</td>
                                <td>Rp. '.number_format($kotorr, 0,".",",").'</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                                <td>Jumlah Potongan</td>
                                <td>Rp. '.number_format($potongann, 0,".",",").'</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                                <td>Penerimaan Bersih</td>
                                <td>Rp. '.number_format($bersihh, 0,".",",").'</td>
                        </tr>
                    </table>';

        $html.='<br><br/>
                   <table>
                    <tr bgcolor="#ffffff">
                                <td>Ka. Biro Keuangan,</td>
                                <td>Yang Menerima,</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                                <td><img src="'.base_url('/upload/ttd.png').'"></td>
                                
                        </tr>
                        <tr bgcolor="#ffffff">
                                <td>SAMSUL BAHRI, S.E., M.Ak.</td>
                                <td>'.$namaa.'</td>
                        </tr>
                       
                    </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        chmod('./upload/slip_pdf/'.$bulann.'-'.$tahunn, 0777);
        $pathupload = './upload/slip_pdf/'.$bulann.'-'.$tahunn.'/';
        if(!is_dir($pathupload)){
            mkdir($pathupload, 0755, TRUE);
        }
        $basepath = $_SERVER['DOCUMENT_ROOT'].'/adminapps/'.$pathupload.'/';
        $path = $basepath.$nik.'-'.$namaa.'-'.$bulann.'-'.$tahunn.'.pdf';
        ob_clean();
        $pdf->Output($path, 'F');
    }
}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                <div class="actions">
                    <a href="<?php echo base_URL(); ?>index.php/admin/form_penggajian_submit/cetak_pdf"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Kembali</a>
                    <b>Slip Gaji Dosen Dan Karyawan <?php echo $bulana."  ".$tahuna ; ?></b>
                </div>

            </header>
            <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

            <!-- </div> -->
            <div class="panel-body table-responsive">
                <div class="box-tools m-b-15">
                    <form action="<?php echo base_URL(); ?>index.php/admin/form_penggajian_submit/cari_slip" method="POST">
                        <div class="input-group">
                            <input type='hidden' value="<?php echo $bulana?>" class="form-control input-sm pull-right" style="width: 150px;"  name='bulan' placeholder='Kata Kunci Pencarian...' required />
                            <input type='hidden' value="<?php echo $tahuna?>" class="form-control input-sm pull-right" style="width: 150px;"  name='tahun' placeholder='Kata Kunci Pencarian...' required />
                            <input type='text' class="form-control input-sm pull-right" style="width: 150px;"  name='q' placeholder='Cari Berdasarkan Nama..' required />
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <form action="<?php echo base_URL(); ?>index.php/admin/form_penggajian_submit/proses_cetak_pdf" method="POST">
                        <div class="text-right" style="margin-top: 10px;">
                            <input type='hidden' value="<?php echo $bulana?>" class="form-control input-sm pull-right" style="width: 150px;"  name='bulan' placeholder='Kata Kunci Pencarian...' required />
                            <input type='hidden' value="<?php echo $tahuna?>" class="form-control input-sm pull-right" style="width: 150px;"  name='tahun' placeholder='Kata Kunci Pencarian...' required />
                            <button type="submit" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></button>
                        </div>
                    </form>
                </div>

                <div class="clearfix">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->session->flashdata("k");?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="5%">Nama</th>
                                    <th width="10%">Jabatan</th>
                                    <th width="10%">Pendapatan Kotor</th>
                                    <th width="10%">Potongan</th>
                                    <th width="10%">Pendapatan Bersih</th>
                                    <th width="10%">Aksi</th>
                                    <th width="5%"> Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (empty($tablegajih)) {
                                    echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                                } else {
                                $no 	= ($this->uri->segment(3) + 1);
                                foreach ($tablegajih as $b) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?> </td>
                                    <td><?php echo $b->nama;?></td>
                                    <td><?php echo $b->nama_jabatan;?></td>
                                    <td><?php echo "Rp.".number_format($b->gaji_kotor, 0,".",".");?></td>
                                    <td><?php echo "Rp.".number_format($b->potongan   , 0,".",".");?></td>
                                    <td><?php echo "Rp.".number_format($b->gaji_bersih, 0,".",".");?></td>
                                    <td class="ctr">
                                        <div class="btn-group">
                                            <a onclick=" window.open('<?php echo base_URL()?>index.php/admin/form_penggajian_submit/view_slip/<?php echo $b->nik;?>/<?php echo $bulana;?>/<?php echo $tahuna;?>', '_blank');"  class="btn btn-success btn-sm"> Lihat Slip Gaji</a>
                                            <form method="post" action="<?php echo base_URL(); ?>index.php/admin/form_penggajian_submit/proses_cetak_pdf">
                                                <input type="text" hidden="hidden" name="tahun" value="<?php echo $tahuna?>">
                                                <input type="text" hidden="hidden" name="bulan" value="<?php echo $bulana?>">
                                                <button type="submit" onclick=" window.open('<?php echo base_URL()?>index.php/admin/form_penggajian_submit/send_email_pdf/<?php echo $b->nik;?>/<?php echo $bulana;?>/<?php echo $tahuna;?>', '_blank');"  class="btn btn-warning btn-sm" > Kirim Email</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td align="center"><?php
                                            if($b->status_email == "-"){
                                                echo "Email Belum Dirkirim";
                                            }else if($b->status_email == "Terkirim"){
                                            ?>
                                                <img src="<?php echo base_url('/upload/berhasil.png')?>" height="42" width="42">
                                            <?php
                                            }else{?>
                                                <img src="<?php echo base_url('/upload/gagal.png')?>" height="42" width="42">
                                            <?php
                                            }
                                            ?></td>
                                        <?php $no++; }}
                                        ?>
                                </tr>

                                </tbody>
                            </table>
                        </div>
