<?php


if (empty($tablegajih)) {
    echo "";
} else {
    foreach ($tablegajih as $b) {
        $nik           = $b->nik;
        $bulan         = $b->bulan;
        $tahun         = $b->tahun;
        $nama          = $b->nama;
        $mail          = $b->mail;

        $basepath = $_SERVER['DOCUMENT_ROOT'].'/adminapps/upload/slip_pdf/';
        $path = $basepath.$nik.'-'.$nama.'-'.$bulan.'-'.$tahun.'.pdf';
        echo $path."<br>";
        /*$ci = get_instance();
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

        $ci->email->from('ramadhand250@gmail.com', 'Blabla');
        $list = array($mail);
        $ci->email->to($list);
        $this->email->reply_to($mail, 'Explendid Videos');
        $ci->email->subject('Sumpah ini testing');
        $ci->email->message('Jangan nyolot geh loh ');
        $this->email->attach($path);
        if($ci->email->send()){
            echo 'Email send.';
            echo $path;
        }else{
            show_error($this->email->print_debugger());
        }*/
    }
}