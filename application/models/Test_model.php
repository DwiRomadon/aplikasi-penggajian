<?php
/**
 * Created by PhpStorm.
 * User: dwi
 * Date: 05/08/18
 * Time: 17:04
 */

class Test_model extends CI_Model{

    function allData(){
        $hasil=$this->db->query("SELECT * FROM jabatan");
		return $hasil->result();
    }

    function insert($data)
    {
        $this->db->insert_batch('absen_karyawan', $data);
    }
}