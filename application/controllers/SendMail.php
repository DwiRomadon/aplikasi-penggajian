<?php
/**
 * Created by PhpStorm.
 * User: dwi
 * Date: 03/09/18
 * Time: 10:23
 */

class SendMail extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('email');
    }

    function index()
    {

        $nik				= $this->uri->segment(2);
        $bulan              = $this->uri->segment(3);
        $tahun              = $this->uri->segment(4);

        $datpil	= $this->db->query("SELECT * FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik 
                                                JOIN jabatan ON karyawan.id_jabatan=jabatan.id 
                                                Join t_master_gajih ON karyawan.nik=t_master_gajih.nik
                                                WHERE karyawan.nik = '$nik' and transaksi_gaji.bulan='$bulan' and transaksi_gaji.tahun='$tahun'")->row();
        $kar       = $this->db->query("SELECT * FROM `karyawan` where nik ='$nik'")->row();

        $nik                = $datpil->nik;
        $nama               = $datpil->nama;
        $bulan              = $datpil->bulan;
        $tahun              = $datpil->tahun;

        //Send Email
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "ramadhand250@gmail.com";
        $config['smtp_pass'] = "abgtua12345";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $ci->email->initialize($config);
        $ci->email->from('ramadhand250@gmail.com', 'Slip Gajih-'.$bulan.'-'.$tahun);
        $list = array($kar->email);
        $ci->email->to($list);
        $this->email->reply_to($kar->email, 'Explendid Videos');
        $ci->email->subject('Nganu');
        $ci->email->message('Nganu Loh');
        $basepath = $_SERVER['DOCUMENT_ROOT'].'/adminapps/upload/slip_pdf/'.$bulan.'-'.$tahun.'/'.$nik.'-'.$nama.'-'.$bulan.'-'.$tahun.'.pdf';
        $this->email->attach($basepath);
        if($ci->email->send()){
            echo 'Email send.';
        }else{
            show_error($this->email->print_debugger());
        }
    }
}