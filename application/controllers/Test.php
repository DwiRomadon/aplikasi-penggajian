<?php
/**
 * Created by PhpStorm.
 * User: dwi
 * Date: 05/08/18
 * Time: 17:03
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('test_model');
        $this->load->library('excel');
    }

    function index(){
        $a['showtbl'] = $this->db->query("Select * From perkiraan Where kategori = 'Unfix' and aktif='Y'")->result();
        $a['tbl'] = $this->db->query("Select * From perkiraan Where id = '".$_POST['id']."'")->result();
        $a['page']	= "f_test";
        $this->load->view('admin/aaa', $a);
    }

    function woi(){

        $input 				= addslashes($this->input->post('file'));
        $import             = addslashes($this->input->post('import'));
        $a['page']	= "f_test2";
        $a['data']  = $input;
        $a['btn']   = $import;
        $this->load->view('admin/f_test2');
    }

    function upload(){
        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $address = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $city = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $postal_code = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $data[] = array(
                        'nik'		=>	$customer_name,
                        'jumlah_hadir'			=>	$address,
                        'bulan'				=>	$city,
                        'tahun'		=>	$postal_code
                    );
                }
            }
            $this->test_model->insert($data);
            //$this->db->query("INSERT INTO absen_karyawan VALUES (NULL,'$data[0]','$data[1]','$data[2]','$data[3]')");
            echo 'Data Imported successfully';
        }else{
            echo 'Gagal';
        }
    }
}