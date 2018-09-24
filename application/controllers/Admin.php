<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('test_model');
        $this->load->library('excel');
	}
	
	public function index() {
		$username = $this->session->userdata('admin_user');
		
		         
		$q_cek	= $this->db->query("SELECT * FROM t_adminapps WHERE username = '$username' ");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$a['page']	= "d_amain";
		
		    $this->load->view('admin/aaa', $a);
		}
		else
		{
		
			redirect("index.php/admin/login");
		}
		
		
		
	}

	
	public function qr2()
	{$this->load->library('ciqrcode');
	$kodeqr = $this->session->userdata('admin_user');

$this->load->helper('url');


$qr['data'] = 'http://ublapps.ubl.ac.id/profileubl/?npm='.$this->session->userdata('admin_user');

$qr['level'] = 'H';
$qr['size'] = 10;
$qr['savename'] = FCPATH.'upload/qrcodektm/'.$kodeqr.'.png';
$this->ciqrcode->generate($qr);
$a['page']	= "ektm";
		
		$this->load->view('admin/aaa', $a);

//echo '<img src="'.base_url().'upload/qrcodektm/qr.png" />';
	}
	
	public function qr3()
	{$this->load->library('ciqrcode');
	$kodeqr = $this->session->userdata('admin_user');

    $this->load->helper('url');


    $qr['data'] = 'http://ublapps.ubl.ac.id/profileubl/?npm='.$this->session->userdata('admin_user');

    $qr['level'] = 'H';
    $qr['size'] = 10;
    $qr['savename'] = FCPATH.'upload/qrcodektm/'.$kodeqr.'.png';
    $this->ciqrcode->generate($qr);
    $a['page']	= "qrcard";

            $this->load->view('admin/aaa', $a);

    //echo '<img src="'.base_url().'upload/qrcodektm/qr.png" />';
	}
	
	
	
	public function klas_pilih() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_kegiatan")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/klas_surat/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$uraian					= addslashes($this->input->post('uraian'));
	
		$cari					= addslashes($this->input->post('q'));

		
		if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_kegiatan WHERE Kode LIKE '%$cari%' OR Kegiatan LIKE '%$cari%' OR Komponen LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "f_pilih";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_kegiatan WHERE id = '$idu'")->row();	
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE t_kegiatan SET nama = '$nama', uraian = '$uraian' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/klas_surat');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_kegiatan WHERE unsur = 'PENELITIAN' LIMIT $awal, $akhir ")->result();
			$a['page']		= "f_pilih";
		}
		
		$this->load->view('admin/bbb', $a);
	}
	
	
	
	
		public function klas_pilihpendidikan() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_kegiatan")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/klas_surat/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$uraian					= addslashes($this->input->post('uraian'));
	
		$cari					= addslashes($this->input->post('q'));

		
		if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_kegiatan WHERE Kode LIKE '%$cari%' OR Kegiatan LIKE '%$cari%' OR Komponen LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "f_pilih_pendidikan";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_kegiatan WHERE id = '$idu'")->row();	
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE t_kegiatan SET nama = '$nama', uraian = '$uraian' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/klas_surat');
		} else {
		    $a['data']		= $this->db->query("SELECT * FROM t_kegiatan WHERE unsur = 'AKADEMIK' LIMIT $awal, $akhir ")->result();
			$a['page']		= "f_pilih_pendidikan";
		}
		
		$this->load->view('admin/bbb', $a);
	}
	
	
	
	
	
		public function klas_pilihkonsultasi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_kegiatan")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/klas_surat/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$uraian					= addslashes($this->input->post('uraian'));
	
		$cari					= addslashes($this->input->post('q'));

		
		if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_kegiatan WHERE Kode LIKE '%$cari%' OR Kegiatan LIKE '%$cari%' OR Komponen LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "f_pilih_konsultasi";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_kegiatan WHERE id = '$idu'")->row();	
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE t_kegiatan SET nama = '$nama', uraian = '$uraian' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/klas_surat');
		} else {
		    $a['data']		= $this->db->query("SELECT * FROM t_kegiatan WHERE unsur = 'AKADEMIK' LIMIT $awal, $akhir ")->result();
			$a['page']		= "f_pilih_konsultasi";
		}
		
		$this->load->view('admin/bbb', $a);
	}
	
	
	
	
	public function klas_pilihpenelitianmhs() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_kegiatan")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/klas_surat/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$uraian					= addslashes($this->input->post('uraian'));
	
		$cari					= addslashes($this->input->post('q'));

		
		if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_kegiatan WHERE Kode LIKE '%$cari%' OR Kegiatan LIKE '%$cari%' OR Komponen LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "f_pilih_penelitianmhs";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_kegiatan WHERE id = '$idu'")->row();	
			$a['page']		= "f_klas_surat";
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE t_kegiatan SET nama = '$nama', uraian = '$uraian' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/klas_surat');
		} else {
		    $a['data']		= $this->db->query("SELECT * FROM t_kegiatan WHERE unsur = 'NONAKADEMIK' LIMIT $awal, $akhir ")->result();
			$a['page']		= "f_pilih_penelitianmhs";
		}
		
		$this->load->view('admin/bbb', $a);
	}
	
	
	
	
	
	
	
	
	





public function buktipendidikan() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$idu					= addslashes($this->input->post('idu'));
		$npm					= addslashes($this->input->post('npm'));
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_pendidikanfile WHERE npm = '$npm'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/buktipendidikan/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idx				= $this->uri->segment(4);

		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
	
		$jenis					= addslashes($this->input->post('jenis'));
		$status					= addslashes($this->input->post('status'));
		$idu					= addslashes($this->input->post('idu'));
		$npm					= addslashes($this->input->post('npm'));

		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/arsip_pendidikan';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';

		$this->load->library('upload', $config);
		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_pendidikanfile WHERE id = '$idx' ");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_pendidikan');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikanfile WHERE id = '$id' AND (tempat LIKE '%$cari%' OR keterangan LIKE '%$cari%' OR no_arsip LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_buktipendidikan";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_buktipendidikan";
		}else if ($mau_ke == "view") {
			//$a['datpil']	= $this->db->query("SELECT * FROM t_pendidikanfile WHERE id = '$idx'")->row();
			//$Encrypted = encrypt($idu);
			$encrypt=base64_encode($idx);
			redirect('f_viewpendidikan.php?id='.$encrypt);
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_pendidikanfile WHERE id = '$idx' ")->row();	
			$a['page']		= "f_buktipendidikan";
		} else if ($mau_ke == "act_add") {	
		$idg=$idu;
		$npmg=$npm;
			if ($this->upload->do_upload('file_arsip')) {
				$up_data	 	= $this->upload->data();
				
									
				$this->db->query("INSERT INTO t_pendidikanfile VALUES (NULL,'$idu', '$npm', '$jenis', '".$up_data['file_name']."','$status')");
			} else {
			
            $this->db->query("INSERT INTO t_pendidikanfile VALUES (NULL,'$idu', '$npm', '$jenis', '','$status')");
			}		
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_pendidikan');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('file_arsip')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE t_pendidikanfile SET  jenis = '$jenis', status = '$status',file = '".$up_data['file_name']."' WHERE id = '$idu'");
				redirect('index.php/admin/arsip_pendidikan');
			} else {
				$this->db->query("UPDATE t_pendidikanfile SET  jenis = '$jenis', status = '$status',file = '' WHERE id = '$idu'");
				redirect('index.php/admin/arsip_pendidikan');
			}	
			
		}
		
		$this->load->view('admin/aaa', $a);
	}



public function buktibeasiswa() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$idu					= addslashes($this->input->post('idu'));
		$npm					= addslashes($this->input->post('npm'));
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_beasiswafile WHERE npm = '$npm'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/buktibeasiswa/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idx				= $this->uri->segment(4);

		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
	
		$jenis					= addslashes($this->input->post('jenis'));
		$status					= addslashes($this->input->post('status'));
		$idu					= addslashes($this->input->post('idu'));
		$npm					= addslashes($this->input->post('npm'));

		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/arsip_beasiswa';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';

		$this->load->library('upload', $config);
		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_beasiswafile WHERE id = '$idx' ");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_beasiswa');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_beasiswafile WHERE id = '$id' AND (tempat LIKE '%$cari%' OR keterangan LIKE '%$cari%' OR no_arsip LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_buktibeasiswa";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_buktibeasiswa";
		}else if ($mau_ke == "view") {
			//$a['datpil']	= $this->db->query("SELECT * FROM t_beasiswafile WHERE id = '$idx'")->row();
			//$Encrypted = encrypt($idu);
			$encrypt=base64_encode($idx);
			redirect('f_viewbeasiswa.php?id='.$encrypt);
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_beasiswafile WHERE id = '$idx' ")->row();	
			$a['page']		= "f_buktibeasiswa";
		} else if ($mau_ke == "act_add") {	
		$idg=$idu;
		$npmg=$npm;
			if ($this->upload->do_upload('file_arsip')) {
				$up_data	 	= $this->upload->data();
				
									
				$this->db->query("INSERT INTO t_beasiswafile VALUES (NULL,'$idu', '$npm', '$jenis', '".$up_data['file_name']."','$status')");
			} else {
			
            $this->db->query("INSERT INTO t_beasiswafile VALUES (NULL,'$idu', '$npm', '$jenis', '','$status')");
			}		
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_beasiswa');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('file_arsip')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE t_beasiswafile SET  jenis = '$jenis', status = '$status',file = '".$up_data['file_name']."' WHERE id = '$idu'");
				redirect('index.php/admin/arsip_beasiswa');
			} else {
				$this->db->query("UPDATE t_beasiswafile SET  jenis = '$jenis', status = '$status',file = '' WHERE id = '$idu'");
				redirect('index.php/admin/arsip_beasiswa');
			}	
			
		}
		
		$this->load->view('admin/aaa', $a);
	}





public function arsip_pendidikan() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_pendidikan WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_pendidikan/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$narasi					= addslashes($this->input->post('narasi'));
		$namakegiatan			= addslashes($this->input->post('namakegiatan'));
		$tgl_kegiatan 			= addslashes($this->input->post('tgl_kegiatan'));
		$penyelenggara			= addslashes($this->input->post('penyelenggara'));
		$tempat					= addslashes($this->input->post('tempat'));
		$prestasi				= addslashes($this->input->post('prestasi'));
		$poin					= addslashes($this->input->post('poin'));
		
		
		$cari					= addslashes($this->input->post('q'));

        $datax		= $this->db->query("SELECT * FROM t_kegiatan where Kode = '$kode' ")->result();
		if (empty($datax)) {
			//echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			$poinx = 0;
		} else {
			foreach ($datax as $b) {
				$poinx =  $b->AngkaKredit;
			}
		}
		
		if ($prestasi == "Juara Umum"){
			$poinc = 7;
		} else
		if ($prestasi == "Juara 1"){
			$poinc = 6;
		} else
		if ($prestasi == "Juara 2"){
			$poinc = 5;
		} else
		if ($prestasi == "Juara 3"){
			$poinc = 4;
		} else
		if ($prestasi == "Juara Harapan"){
			$poinc = 3;
		} else
		if ($prestasi == "Peserta"){
			$poinc = 2;
		} else
		if ($prestasi == "Panitia"){
			$poinc = 1;
		} else
		{
			$poinc = 0;
		}
		$poin = $poinx * $poinc;
		
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_pendidikan WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_pendidikan');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikan WHERE npm = '$npm' AND (narasi LIKE '%$cari%' OR kode LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pendidikan";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_pendidikan";
		} else if ($mau_ke == "send") {
			$kode					= $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_pendidikan";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_pendidikan WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_pendidikan";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_pendidikan VALUES (NULL,'$npm', '$ta', '$sem', '$kode', '$narasi', '$namakegiatan', '$tgl_kegiatan', '$penyelenggara', '$tempat', '$prestasi', '$poin', NOW(),'0')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_pendidikan');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_pendidikan SET tahunakademik = '$ta',semester = '$sem',kode = '$kode', narasi = '$narasi', poin = '$poin' WHERE id = '$idp'");
			
				
			redirect('index.php/admin/arsip_pendidikan');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikan WHERE npm = '$npm' ORDER BY tgl_simpan DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_pendidikan";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	
	
	
	//pendidikan admin
	
	public function arsip_pendidikanadmin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_pendidikan")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_pendidikanadmin/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$narasi					= addslashes($this->input->post('narasi'));
		$namakegiatan			= addslashes($this->input->post('namakegiatan'));
		$tgl_kegiatan 			= addslashes($this->input->post('tgl_kegiatan'));
		$penyelenggara			= addslashes($this->input->post('penyelenggara'));
		$tempat					= addslashes($this->input->post('tempat'));
		$prestasi				= addslashes($this->input->post('prestasi'));
		$poin					= addslashes($this->input->post('poin'));
		
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$status				= addslashes($this->input->post('status'));
		
		
		$cari					= addslashes($this->input->post('q'));

        $datax		= $this->db->query("SELECT * FROM t_kegiatan where Kode = '$kode' ")->result();
		if (empty($datax)) {
			//echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			$poinx = 0;
		} else {
			foreach ($datax as $b) {
				$poinx =  $b->AngkaKredit;
			}
		}
		
		if ($prestasi == "Juara Umum"){
			$poinc = 7;
		} else
		if ($prestasi == "Juara 1"){
			$poinc = 6;
		} else
		if ($prestasi == "Juara 2"){
			$poinc = 5;
		} else
		if ($prestasi == "Juara 3"){
			$poinc = 4;
		} else
		if ($prestasi == "Juara Harapan"){
			$poinc = 3;
		} else
		if ($prestasi == "Peserta"){
			$poinc = 2;
		} else
		if ($prestasi == "Panitia"){
			$poinc = 1;
		} else
		{
			$poinc = 0;
		}
		$poin = $poinx * $poinc;
		
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_pendidikan WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_pendidikan');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikan WHERE npm = '$npm' AND (narasi LIKE '%$cari%' OR kode LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pendidikanadmin";
		}else if ($mau_ke == "sem") {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikan WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' AND status = '$status' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_pendidikanadmin";
			
		}else if ($mau_ke == "semslrh") {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikan WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_pendidikanadmin";
			
		}  
		else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_pendidikan";
		} else if ($mau_ke == "edtsetuju") {
			
			$this->db->query("UPDATE t_pendidikan SET status = '1' WHERE id = '$idu' ");	
			//redirect('index.php/admin/arsip_pendidikanadmin');
			$q_cek	= $this->db->query("SELECT * FROM t_pendidikan WHERE id = '$idu'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$ta = $d_cek->tahunakademik;
			$sem = $d_cek->semester;
			$st = $d_cek->status;
			
		}
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikan WHERE tahunakademik = '$ta' AND semester = '$sem' AND status = '$st' ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pendidikanadmin";
			
		} else if ($mau_ke == "edttdksetuju") {
			
			$this->db->query("UPDATE t_pendidikan SET status = '0' WHERE id = '$idu' ");	
			//redirect('index.php/admin/arsip_pendidikanadmin');
			$q_cek	= $this->db->query("SELECT * FROM t_pendidikan WHERE id = '$idu'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$ta = $d_cek->tahunakademik;
			$sem = $d_cek->semester;
			$st = $d_cek->status;
			
		}
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikan WHERE tahunakademik = '$ta' AND semester = '$sem' AND status = '$st' ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pendidikanadmin";
			
		} 	else if ($mau_ke == "send") {
			$kode					= $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_pendidikan";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_pendidikan WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_pendidikan";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_pendidikan VALUES (NULL,'$npm', '$ta', '$sem', '$kode', '$narasi', '$namakegiatan', '$tgl_kegiatan', '$penyelenggara', '$tempat', '$prestasi', '$poin', NOW(),'0')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_pendidikanadmin');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_pendidikan SET tahunakademik = '$ta',semester = '$sem',kode = '$kode', narasi = '$narasi', poin = '$poin' WHERE id = '$idp'");
			
				
			redirect('index.php/admin/arsip_pendidikan');
		} 
		else {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikan ORDER BY tgl_simpan DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_pendidikanadmin";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//--------------------------------
	
	
	
	//admindosen
	public function arsip_pendidikandsadmin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_pendidikands")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_pendidikandsadmin/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$narasi					= addslashes($this->input->post('narasi'));
		$namakegiatan			= addslashes($this->input->post('namakegiatan'));
		$tgl_kegiatan 			= addslashes($this->input->post('tgl_kegiatan'));
		$penyelenggara			= addslashes($this->input->post('penyelenggara'));
		$tempat					= addslashes($this->input->post('tempat'));
		$prestasi				= addslashes($this->input->post('prestasi'));
		$poin					= addslashes($this->input->post('poin'));
		
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$status				= addslashes($this->input->post('status'));
		
		
		$cari					= addslashes($this->input->post('q'));

        $datax		= $this->db->query("SELECT * FROM t_kegiatan where Kode = '$kode' ")->result();
		if (empty($datax)) {
			//echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			$poinx = 0;
		} else {
			foreach ($datax as $b) {
				$poinx =  $b->AngkaKredit;
			}
		}
		
		if ($prestasi == "Juara Umum"){
			$poinc = 7;
		} else
		if ($prestasi == "Juara 1"){
			$poinc = 6;
		} else
		if ($prestasi == "Juara 2"){
			$poinc = 5;
		} else
		if ($prestasi == "Juara 3"){
			$poinc = 4;
		} else
		if ($prestasi == "Juara Harapan"){
			$poinc = 3;
		} else
		if ($prestasi == "Peserta"){
			$poinc = 2;
		} else
		if ($prestasi == "Panitia"){
			$poinc = 1;
		} else
		{
			$poinc = 0;
		}
		$poin = $poinx * $poinc;
		
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_pendidikands WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_pendidikands');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikands WHERE nidn = '$nidn' AND (narasi LIKE '%$cari%' OR kode LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pendidikandsadmin";
		}else if ($mau_ke == "sem") {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikands WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' AND status = '$status' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_pendidikandsadmin";
			
		}else if ($mau_ke == "semslrh") {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikands WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_pendidikandsadmin";
			
		}  
		else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_pendidikands";
		} else if ($mau_ke == "edtsetuju") {
			
			$this->db->query("UPDATE t_pendidikands SET status = '1' WHERE id = '$idu' ");	
			//redirect('index.php/admin/arsip_pendidikandsadmin');
			$q_cek	= $this->db->query("SELECT * FROM t_pendidikands WHERE id = '$idu'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$ta = $d_cek->tahunakademik;
			$sem = $d_cek->semester;
			$st = $d_cek->status;
			
		}
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikands WHERE tahunakademik = '$ta' AND semester = '$sem' AND status = '$st' ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pendidikandsadmin";
			
		} else if ($mau_ke == "edttdksetuju") {
			
			$this->db->query("UPDATE t_pendidikands SET status = '0' WHERE id = '$idu' ");	
			//redirect('index.php/admin/arsip_pendidikandsadmin');
			$q_cek	= $this->db->query("SELECT * FROM t_pendidikands WHERE id = '$idu'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$ta = $d_cek->tahunakademik;
			$sem = $d_cek->semester;
			$st = $d_cek->status;
			
		}
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikands WHERE tahunakademik = '$ta' AND semester = '$sem' AND status = '$st' ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pendidikandsadmin";
			
		} 	else if ($mau_ke == "send") {
			$kode					= $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_pendidikands";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_pendidikands WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_pendidikands";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_pendidikands VALUES (NULL,'$nidn', '$ta', '$sem', '$kode', '$narasi', '$namakegiatan', '$tgl_kegiatan', '$penyelenggara', '$tempat', '$prestasi', '$poin', NOW(),'0')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_pendidikandsadmin');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_pendidikands SET tahunakademik = '$ta',semester = '$sem',kode = '$kode', narasi = '$narasi', poin = '$poin' WHERE id = '$idp'");
			
				
			redirect('index.php/admin/arsip_pendidikands');
		} 
		else {
			$a['data']		= $this->db->query("SELECT * FROM t_pendidikands ORDER BY tgl_simpan DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_pendidikandsadmin";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//--------------------------------


//pengabdiands
//admindosen
	public function arsip_pengabdiandsadmin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_pengabdiands")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_pengabdiandsadmin/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$narasi					= addslashes($this->input->post('narasi'));
		$namakegiatan			= addslashes($this->input->post('namakegiatan'));
		$tgl_kegiatan 			= addslashes($this->input->post('tgl_kegiatan'));
		$penyelenggara			= addslashes($this->input->post('penyelenggara'));
		$tempat					= addslashes($this->input->post('tempat'));
		$prestasi				= addslashes($this->input->post('prestasi'));
		$poin					= addslashes($this->input->post('poin'));
		
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$status				= addslashes($this->input->post('status'));
		
		
		$cari					= addslashes($this->input->post('q'));

        $datax		= $this->db->query("SELECT * FROM t_kegiatan where Kode = '$kode' ")->result();
		if (empty($datax)) {
			//echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			$poinx = 0;
		} else {
			foreach ($datax as $b) {
				$poinx =  $b->AngkaKredit;
			}
		}
		
		if ($prestasi == "Juara Umum"){
			$poinc = 7;
		} else
		if ($prestasi == "Juara 1"){
			$poinc = 6;
		} else
		if ($prestasi == "Juara 2"){
			$poinc = 5;
		} else
		if ($prestasi == "Juara 3"){
			$poinc = 4;
		} else
		if ($prestasi == "Juara Harapan"){
			$poinc = 3;
		} else
		if ($prestasi == "Peserta"){
			$poinc = 2;
		} else
		if ($prestasi == "Panitia"){
			$poinc = 1;
		} else
		{
			$poinc = 0;
		}
		$poin = $poinx * $poinc;
		
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_pengabdiands WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_pengabdiands');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdiands WHERE nidn = '$nidn' AND (narasi LIKE '%$cari%' OR kode LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pengabdiandsadmin";
		}else if ($mau_ke == "sem") {
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdiands WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' AND status = '$status' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_pengabdiandsadmin";
			
		}else if ($mau_ke == "semslrh") {
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdiands WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_pengabdiandsadmin";
			
		}  
		else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_pengabdiands";
		} else if ($mau_ke == "edtsetuju") {
			
			$this->db->query("UPDATE t_pengabdiands SET status = '1' WHERE id = '$idu' ");	
			//redirect('index.php/admin/arsip_pengabdiandsadmin');
			$q_cek	= $this->db->query("SELECT * FROM t_pengabdiands WHERE id = '$idu'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$ta = $d_cek->tahunakademik;
			$sem = $d_cek->semester;
			$st = $d_cek->status;
			
		}
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdiands WHERE tahunakademik = '$ta' AND semester = '$sem' AND status = '$st' ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pengabdiandsadmin";
			
		} else if ($mau_ke == "edttdksetuju") {
			
			$this->db->query("UPDATE t_pengabdiands SET status = '0' WHERE id = '$idu' ");	
			//redirect('index.php/admin/arsip_pengabdiandsadmin');
			$q_cek	= $this->db->query("SELECT * FROM t_pengabdiands WHERE id = '$idu'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$ta = $d_cek->tahunakademik;
			$sem = $d_cek->semester;
			$st = $d_cek->status;
			
		}
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdiands WHERE tahunakademik = '$ta' AND semester = '$sem' AND status = '$st' ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pengabdiandsadmin";
			
		} 	else if ($mau_ke == "send") {
			$kode					= $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_pengabdiands";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_pengabdiands WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_pengabdiands";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_pengabdiands VALUES (NULL,'$nidn', '$ta', '$sem', '$kode', '$narasi', '$namakegiatan', '$tgl_kegiatan', '$penyelenggara', '$tempat', '$prestasi', '$poin', NOW(),'0')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_pengabdiandsadmin');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_pengabdiands SET tahunakademik = '$ta',semester = '$sem',kode = '$kode', narasi = '$narasi', poin = '$poin' WHERE id = '$idp'");
			
				
			redirect('index.php/admin/arsip_pengabdiands');
		} 
		else {
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdiands ORDER BY tgl_simpan DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_pengabdiandsadmin";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//--------------------------------
	
	//penelitian
	//admindosen
	public function arsip_penelitiandsadmin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_penelitiands")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_penelitiandsadmin/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$narasi					= addslashes($this->input->post('narasi'));
		$namakegiatan			= addslashes($this->input->post('namakegiatan'));
		$tgl_kegiatan 			= addslashes($this->input->post('tgl_kegiatan'));
		$penyelenggara			= addslashes($this->input->post('penyelenggara'));
		$tempat					= addslashes($this->input->post('tempat'));
		$prestasi				= addslashes($this->input->post('prestasi'));
		$poin					= addslashes($this->input->post('poin'));
		
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$status				= addslashes($this->input->post('status'));
		
		
		$cari					= addslashes($this->input->post('q'));

        $datax		= $this->db->query("SELECT * FROM t_kegiatan where Kode = '$kode' ")->result();
		if (empty($datax)) {
			//echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			$poinx = 0;
		} else {
			foreach ($datax as $b) {
				$poinx =  $b->AngkaKredit;
			}
		}
		
		if ($prestasi == "Juara Umum"){
			$poinc = 7;
		} else
		if ($prestasi == "Juara 1"){
			$poinc = 6;
		} else
		if ($prestasi == "Juara 2"){
			$poinc = 5;
		} else
		if ($prestasi == "Juara 3"){
			$poinc = 4;
		} else
		if ($prestasi == "Juara Harapan"){
			$poinc = 3;
		} else
		if ($prestasi == "Peserta"){
			$poinc = 2;
		} else
		if ($prestasi == "Panitia"){
			$poinc = 1;
		} else
		{
			$poinc = 0;
		}
		$poin = $poinx * $poinc;
		
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_penelitiands WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_penelitiands');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitiands WHERE nidn = '$nidn' AND (narasi LIKE '%$cari%' OR kode LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_penelitiandsadmin";
		}else if ($mau_ke == "sem") {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitiands WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' AND status = '$status' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_penelitiandsadmin";
			
		}else if ($mau_ke == "semslrh") {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitiands WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_penelitiandsadmin";
			
		}  
		else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_penelitiands";
		} else if ($mau_ke == "edtsetuju") {
			
			$this->db->query("UPDATE t_penelitiands SET status = '1' WHERE id = '$idu' ");	
			//redirect('index.php/admin/arsip_penelitiandsadmin');
			$q_cek	= $this->db->query("SELECT * FROM t_penelitiands WHERE id = '$idu'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$ta = $d_cek->tahunakademik;
			$sem = $d_cek->semester;
			$st = $d_cek->status;
			
		}
			$a['data']		= $this->db->query("SELECT * FROM t_penelitiands WHERE tahunakademik = '$ta' AND semester = '$sem' AND status = '$st' ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_penelitiandsadmin";
			
		} else if ($mau_ke == "edttdksetuju") {
			
			$this->db->query("UPDATE t_penelitiands SET status = '0' WHERE id = '$idu' ");	
			//redirect('index.php/admin/arsip_penelitiandsadmin');
			$q_cek	= $this->db->query("SELECT * FROM t_penelitiands WHERE id = '$idu'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
			$ta = $d_cek->tahunakademik;
			$sem = $d_cek->semester;
			$st = $d_cek->status;
			
		}
			$a['data']		= $this->db->query("SELECT * FROM t_penelitiands WHERE tahunakademik = '$ta' AND semester = '$sem' AND status = '$st' ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_penelitiandsadmin";
			
		} 	else if ($mau_ke == "send") {
			$kode					= $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_penelitiands";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_penelitiands WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_penelitiands";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_penelitiands VALUES (NULL,'$nidn', '$ta', '$sem', '$kode', '$narasi', '$namakegiatan', '$tgl_kegiatan', '$penyelenggara', '$tempat', '$prestasi', '$poin', NOW(),'0')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_penelitiandsadmin');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_penelitiands SET tahunakademik = '$ta',semester = '$sem',kode = '$kode', narasi = '$narasi', poin = '$poin' WHERE id = '$idp'");
			
				
			redirect('index.php/admin/arsip_penelitiands');
		} 
		else {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitiands ORDER BY tgl_simpan DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_penelitiandsadmin";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//--------------------------------




public function arsip_penelitianmhsadmin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_penelitianmhs WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_penelitianmhsadmin/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$narasi					= addslashes($this->input->post('narasi'));
		$namakegiatan			= addslashes($this->input->post('namakegiatan'));
		$tgl_kegiatan 			= addslashes($this->input->post('tgl_kegiatan'));
		$penyelenggara			= addslashes($this->input->post('penyelenggara'));
		$tempat					= addslashes($this->input->post('tempat'));
		$prestasi				= addslashes($this->input->post('prestasi'));
		$poin					= addslashes($this->input->post('poin'));
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$status				= addslashes($this->input->post('status'));
		
		
		$cari					= addslashes($this->input->post('q'));

        $datax		= $this->db->query("SELECT * FROM t_kegiatan where Kode = '$kode' ")->result();
		if (empty($datax)) {
			//echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			$poinx = 0;
		} else {
			foreach ($datax as $b) {
				$poinx =  $b->AngkaKredit;
			}
		}
		
		if ($prestasi == "Juara Umum"){
			$poinc = 7;
		} else
		if ($prestasi == "Juara 1"){
			$poinc = 6;
		} else
		if ($prestasi == "Juara 2"){
			$poinc = 5;
		} else
		if ($prestasi == "Juara 3"){
			$poinc = 4;
		} else
		if ($prestasi == "Juara Harapan"){
			$poinc = 3;
		} else
		if ($prestasi == "Peserta"){
			$poinc = 2;
		} else
		if ($prestasi == "Panitia"){
			$poinc = 1;
		} else
		{
			$poinc = 0;
		}
		$poin = $poinx * $poinc;
		
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_penelitianmhs WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_penelitianmhs');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitianmhs WHERE npm = '$npm' AND (narasi LIKE '%$cari%' OR kode LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_penelitianmhsadmin";
		}else if ($mau_ke == "sem") {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitianmhs WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' AND status = '$status' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_penelitianmhsadmin";
			
		}else if ($mau_ke == "semslrh") {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitianmhs WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_penelitianmhsadmin";
			
		}   
		
		else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_penelitianmhs";
		} else if ($mau_ke == "edtsetuju") {
			
			$this->db->query("UPDATE t_penelitianmhs SET status = '1' WHERE id = '$idu' ");	
			redirect('index.php/admin/arsip_penelitianmhsadmin');
			
		} else if ($mau_ke == "edttdksetuju") {
			
			$this->db->query("UPDATE t_penelitianmhs SET status = '0' WHERE id = '$idu' ");	
			redirect('index.php/admin/arsip_penelitianmhsadmin');
			
		} 	else if ($mau_ke == "send") {
			$kode					= $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_penelitianmhs";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_penelitianmhs WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_penelitianmhs";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_penelitianmhs VALUES (NULL,'$npm', '$ta', '$sem', '$kode', '$narasi', '$namakegiatan', '$tgl_kegiatan', '$penyelenggara', '$tempat', '$prestasi', '$poin', NOW(),'0')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_penelitianmhsadmin');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_penelitianmhs SET tahunakademik = '$ta',semester = '$sem',kode = '$kode', narasi = '$narasi', poin = '$poin' WHERE id = '$idp'");
			
				
			redirect('index.php/admin/arsip_penelitianmhs');
		} 
		else {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitianmhs ORDER BY tgl_simpan DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_penelitianmhsadmin";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//--------------------------------

public function arsip_pengabdianmhsadmin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_pengabdianmhs WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_pengabdianmhsadmin/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$narasi					= addslashes($this->input->post('narasi'));
		$namakegiatan			= addslashes($this->input->post('namakegiatan'));
		$tgl_kegiatan 			= addslashes($this->input->post('tgl_kegiatan'));
		$penyelenggara			= addslashes($this->input->post('penyelenggara'));
		$tempat					= addslashes($this->input->post('tempat'));
		$prestasi				= addslashes($this->input->post('prestasi'));
		$poin					= addslashes($this->input->post('poin'));
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$status				= addslashes($this->input->post('status'));
		
		
		$cari					= addslashes($this->input->post('q'));

        $datax		= $this->db->query("SELECT * FROM t_kegiatan where Kode = '$kode' ")->result();
		if (empty($datax)) {
			//echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			$poinx = 0;
		} else {
			foreach ($datax as $b) {
				$poinx =  $b->AngkaKredit;
			}
		}
		
		if ($prestasi == "Juara Umum"){
			$poinc = 7;
		} else
		if ($prestasi == "Juara 1"){
			$poinc = 6;
		} else
		if ($prestasi == "Juara 2"){
			$poinc = 5;
		} else
		if ($prestasi == "Juara 3"){
			$poinc = 4;
		} else
		if ($prestasi == "Juara Harapan"){
			$poinc = 3;
		} else
		if ($prestasi == "Peserta"){
			$poinc = 2;
		} else
		if ($prestasi == "Panitia"){
			$poinc = 1;
		} else
		{
			$poinc = 0;
		}
		$poin = $poinx * $poinc;
		
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_pengabdianmhs WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_pengabdianmhs');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdianmhs WHERE npm = '$npm' AND (narasi LIKE '%$cari%' OR kode LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pengabdianmhsadmin";
		}else if ($mau_ke == "sem") {
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdianmhs WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' AND status = '$status' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_pengabdianmhsadmin";
			
		}else if ($mau_ke == "semslrh") {
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdianmhs WHERE tahunakademik = '$tahunakademik' AND semester = '$semester' ORDER BY id DESC")->result();
			
			$a['page']		= "l_arsip_pengabdianmhsadmin";
			
		}   
		
		else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_pengabdianmhs";
		} else if ($mau_ke == "edtsetuju") {
			
			$this->db->query("UPDATE t_pengabdianmhs SET status = '1' WHERE id = '$idu' ");	
			redirect('index.php/admin/arsip_pengabdianmhsadmin');
			
		} else if ($mau_ke == "edttdksetuju") {
			
			$this->db->query("UPDATE t_pengabdianmhs SET status = '0' WHERE id = '$idu' ");	
			redirect('index.php/admin/arsip_pengabdianmhsadmin');
			
		} 	else if ($mau_ke == "send") {
			$kode					= $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_pengabdianmhs";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_pengabdianmhs WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_pengabdianmhs";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_pengabdianmhs VALUES (NULL,'$npm', '$ta', '$sem', '$kode', '$narasi', '$namakegiatan', '$tgl_kegiatan', '$penyelenggara', '$tempat', '$prestasi', '$poin', NOW(),'0')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_pengabdianmhsadmin');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_pengabdianmhs SET tahunakademik = '$ta',semester = '$sem',kode = '$kode', narasi = '$narasi', poin = '$poin' WHERE id = '$idp'");
			
				
			redirect('index.php/admin/arsip_pengabdianmhs');
		} 
		else {
			$a['data']		= $this->db->query("SELECT * FROM t_pengabdianmhs ORDER BY tgl_simpan DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_pengabdianmhsadmin";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//--------------------------------





public function buktipenelitianmhs() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$idu					= addslashes($this->input->post('idu'));
		$npm					= addslashes($this->input->post('npm'));
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_penelitianmhsfile WHERE npm = '$npm'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/buktipenelitianmhs/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idx				= $this->uri->segment(4);

		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
	
		$jenis					= addslashes($this->input->post('jenis'));
		$status					= addslashes($this->input->post('status'));
		$idu					= addslashes($this->input->post('idu'));
		$npm					= addslashes($this->input->post('npm'));

		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/arsip_penelitianmhs';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';

		$this->load->library('upload', $config);
		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_penelitianmhsfile WHERE id = '$idx' ");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_penelitianmhs');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitianmhsfile WHERE id = '$id' AND (tempat LIKE '%$cari%' OR keterangan LIKE '%$cari%' OR no_arsip LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_buktipenelitianmhs";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_buktipenelitianmhs";
		}else if ($mau_ke == "view") {
			//$a['datpil']	= $this->db->query("SELECT * FROM t_penelitianmhsfile WHERE id = '$idx'")->row();
			//$Encrypted = encrypt($idu);
			$encrypt=base64_encode($idx);
			redirect('f_viewpenelitianmhs.php?id='.$encrypt);
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_penelitianmhsfile WHERE id = '$idx' ")->row();	
			$a['page']		= "f_buktipenelitianmhs";
		} else if ($mau_ke == "act_add") {	
		$idg=$idu;
		$npmg=$npm;
			if ($this->upload->do_upload('file_arsip')) {
				$up_data	 	= $this->upload->data();
				
									
				$this->db->query("INSERT INTO t_penelitianmhsfile VALUES (NULL,'$idu', '$npm', '$jenis', '".$up_data['file_name']."','$status')");
			} else {
			
            $this->db->query("INSERT INTO t_penelitianmhsfile VALUES (NULL,'$idu', '$npm', '$jenis', '','$status')");
			}		
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_penelitianmhs');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('file_arsip')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE t_penelitianmhsfile SET  jenis = '$jenis', status = '$status',file = '".$up_data['file_name']."' WHERE id = '$idu'");
				redirect('index.php/admin/arsip_penelitianmhs');
			} else {
				$this->db->query("UPDATE t_penelitianmhsfile SET  jenis = '$jenis', status = '$status',file = '' WHERE id = '$idu'");
				redirect('index.php/admin/arsip_penelitianmhs');
			}	
			
		}
		
		$this->load->view('admin/aaa', $a);
	}







public function arsip_penelitianmhs() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_penelitianmhs WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_penelitianmhs/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$narasi					= addslashes($this->input->post('narasi'));
		$namakegiatan			= addslashes($this->input->post('namakegiatan'));
		$tgl_kegiatan 			= addslashes($this->input->post('tgl_kegiatan'));
		$penyelenggara			= addslashes($this->input->post('penyelenggara'));
		$tempat					= addslashes($this->input->post('tempat'));
		$prestasi				= addslashes($this->input->post('prestasi'));
		$poin					= addslashes($this->input->post('poin'));
		
		
		$cari					= addslashes($this->input->post('q'));

        $datax		= $this->db->query("SELECT * FROM t_kegiatan where Kode = '$kode' ")->result();
		if (empty($datax)) {
			//echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
			$poinx = 0;
		} else {
			foreach ($datax as $b) {
				$poinx =  $b->AngkaKredit;
			}
		}
		
		if ($prestasi == "Juara Umum"){
			$poinc = 7;
		} else
		if ($prestasi == "Juara 1"){
			$poinc = 6;
		} else
		if ($prestasi == "Juara 2"){
			$poinc = 5;
		} else
		if ($prestasi == "Juara 3"){
			$poinc = 4;
		} else
		if ($prestasi == "Juara Harapan"){
			$poinc = 3;
		} else
		if ($prestasi == "Peserta"){
			$poinc = 2;
		} else
		if ($prestasi == "Panitia"){
			$poinc = 1;
		} else
		{
			$poinc = 0;
		}
		$poin = $poinx * $poinc;
		
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_penelitianmhs WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_penelitianmhs');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitianmhs WHERE npm = '$npm' AND (narasi LIKE '%$cari%' OR kode LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_penelitianmhs";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_penelitianmhs";
		} else if ($mau_ke == "send") {
			$kode					= $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_penelitianmhs";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_penelitianmhs WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_penelitianmhs";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_penelitianmhs VALUES (NULL,'$npm', '$ta', '$sem', '$kode', '$narasi', '$namakegiatan', '$tgl_kegiatan', '$penyelenggara', '$tempat', '$prestasi', '$poin', NOW(),'0')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_penelitianmhs');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_penelitianmhs SET tahunakademik = '$ta',semester = '$sem',kode = '$kode', narasi = '$narasi', poin = '$poin' WHERE id = '$idp'");
			
				
			redirect('index.php/admin/arsip_penelitianmhs');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_penelitianmhs WHERE npm = '$npm' ORDER BY tgl_simpan DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_penelitianmhs";
		}
		
		$this->load->view('admin/aaa', $a);
	}








public function arsip_konsultasi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_konsultasi/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$isikonsul				= addslashes($this->input->post('isikonsul'));
		$subjek					= addslashes($this->input->post('subjek'));
		
		
		$cari					= addslashes($this->input->post('q'));

       
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_konsultasi');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_konsultasi";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_konsultasi";
		} else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_konsultasi";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_konsul WHERE idkonsul = '$idu'")->row();	
			$a['page']		= "f_arsip_konsultasi";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_konsultasi');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_konsul SET tahunakademik = '$ta',semester = '$sem',tgl=NOW(),subjek = '$subjek', isikonsul = '$isikonsul' WHERE idkonsul = '$idp'");
			
					
			redirect('index.php/admin/arsip_konsultasi');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_konsultasi";
		}
		
		$this->load->view('admin/aaa', $a);
	}



//komponen start

public function arsip_komponen() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$id = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_kegiatan")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_komponen/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $Kode 					= addslashes($this->input->post('Kode'));
		$Unsur 					= addslashes($this->input->post('Unsur'));
		$Kegiatan					= addslashes($this->input->post('Kegiatan'));
		$Komponen				= addslashes($this->input->post('Komponen'));
		$Bukti				= addslashes($this->input->post('Bukti'));
		$AngkaKredit					= addslashes($this->input->post('AngkaKredit'));
		
		
		$cari					= addslashes($this->input->post('q'));

       
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_kegiatan WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_komponen');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_kegiatan WHERE id = '$id' AND (Bukti LIKE '%$cari%' OR AngkaKredit LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_komponen";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_komponen";
		
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_kegiatan WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_komponen";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_kegiatan VALUES (NULL,'$Kode','$Unsur','$Kegiatan', '$Komponen', '$Bukti', '$AngkaKredit')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_komponen');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_kegiatan SET Kode = '$Kode', Unsur = '$Unsur', Kegiatan = '$Kegiatan',Komponen = '$Komponen', Bukti = '$Bukti',AngkaKredit = '$AngkaKredit' WHERE id = '$idp'");
			
					
			redirect('index.php/admin/arsip_komponen');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_kegiatan ORDER BY id DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_komponen";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//komponen end




//besar start

public function arsip_besar() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$id = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_besar")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_besar/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$Jenis					= addslashes($this->input->post('Jenis'));
        $Poinpendidikan 		= addslashes($this->input->post('Poinpendidikan'));
		$Poinpenelitian			= addslashes($this->input->post('Poinpenelitian'));
		$Poinpengabdian			= addslashes($this->input->post('Poinpengabdian'));
		$IPK					= addslashes($this->input->post('IPK'));
		$Beasiswa				= addslashes($this->input->post('Beasiswa'));

		
		
		$cari					= addslashes($this->input->post('q'));

       
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_besar WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_besar');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_besar WHERE id = '$id' AND (poinpendidikan LIKE '%$cari%' OR beasiswa LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_besar";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_besar";
		
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_besar WHERE id = '$idu'")->row();	
			$a['page']		= "f_arsip_besar";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_besar VALUES (NULL,'$Jenis','$IPK','$Poinpendidikan','$Poinpenelitian','$Poinpengabdian','$Beasiswa')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_besar');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_besar SET jenis = '$Jenis', IPK = '$IPK', poinpendidikan = '$Poinpendidikan', poinpenelitian	 = '$Poinpenelitian',poinpengabdian	 = '$Poinpengabdian', beasiswa = '$Beasiswa' WHERE id = '$idp'");
			
					
			redirect('index.php/admin/arsip_besar');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_besar ORDER BY id DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_besar";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//besar end






public function ubah_biodata() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$npm = $this->session->userdata('admin_user');
		$mau_ke					= $this->uri->segment(3);
		//ambil variabel Postingan
        $alamat 					= addslashes($this->input->post('alamat'));
		$telepon 					= addslashes($this->input->post('telepon'));
		$tempat						= addslashes($this->input->post('tempat'));
		$tgl						= addslashes($this->input->post('tgl'));
	
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/ubah_biodata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_ubah_biodata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "edt") {
			
        $otherdb = $this->load->database('otherdb', TRUE);
			$a['datpil']	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$npm' ")->row();	
			$a['page']		= "f_ubah_biodata";
			
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/ubah_biodata');
			
		} else if ($mau_ke == "act_edt") {
			  $otherdb = $this->load->database('otherdb', TRUE);
			  $otherdb->query("UPDATE msmhs SET almtinggal = '$alamat',tlp = '$telepon',tplhrmsmhs = '$tempat', tglhrmsmhs = '$tgl' WHERE nimhsmsmhs = '$npm'");
			
					
			redirect('index.php/admin/profil');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_ubah_biodata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	
	
	//BAK-------------------
	
	public function arsip_pengisikrs() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
			$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		$mau_ke					= $this->uri->segment(3);
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$prodi				= addslashes($this->input->post('prodi'));
		
		$namatabel = "trnlm".$tahunakademik.$semester;
		
		
	
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/ubah_biodata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_ubah_biodata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ubah_biodata";
		}else if ($mau_ke == "sem") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel GROUP BY nimhstrnlm ORDER BY tglinputkrs DESC")->result();
			$a['namatabel']	= $tahunakademik.$semester ;
			$a['page']		= "l_arsip_pengisikrs";
			
		} else if ($mau_ke == "prodi") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE kdpsttrnlm = '$prodi' GROUP BY nimhstrnlm ORDER BY tglinputkrs DESC")->result();
			$a['namatabel']	= $tahunakademik.$semester ;
			$a['page']		= "l_arsip_pengisikrs";
			
		}else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "edt") {
			
        $otherdb = $this->load->database('otherdb', TRUE);
			$a['datpil']	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$npm' ")->row();	
			$a['page']		= "f_ubah_biodata";
			
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/ubah_biodata');
			
		} else if ($mau_ke == "act_edt") {
			  $otherdb = $this->load->database('otherdb', TRUE);
			  $otherdb->query("UPDATE msmhs SET almtinggal = '$alamat',tlp = '$telepon',tplhrmsmhs = '$tempat', tglhrmsmhs = '$tgl' WHERE nimhsmsmhs = '$npm'");
			
					
			redirect('index.php/admin/profil');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_ubah_biodata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//----------BAK end
	
	
	
	
	//BAK-------------------
	
	public function arsip_jumlahabsen() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
			$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		$mau_ke					= $this->uri->segment(3);
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$prodi				= addslashes($this->input->post('prodi'));
		$tanggalawal				= addslashes($this->input->post('tanggalawal'));
		$tanggalakhir				= addslashes($this->input->post('tanggalakhir'));
		
		$namatabel = "absenngajar".$tahunakademik.$semester;
		
		
	
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/ubah_biodata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_ubah_biodata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ubah_biodata";
		}else if ($mau_ke == "sem") {
			$otherdb = $this->load->database('otherdb', TRUE);
			
			if(is_null($otherdb->query("SHOW TABLES LIKE '{$namatabel}'")->row()))
		{
           $this->session->set_flashdata("Data Tidak ada");
			redirect('index.php/admin/');
		}
		else
		{		
			$this->db->query("TRUNCATE jumlahabsen");
			
			$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT nidn,kdprodi, count(nidn) as jumlah  FROM $namatabel WHERE (tglinput BETWEEN '$tanggalawal' AND '$tanggalakhir') group by nidn order by nidn")->result();
			$a['namatabel']	   = $tahunakademik.$semester ;
			$a['tanggalawal']  = $tanggalawal;
			$a['tanggalakhir'] = $tanggalakhir;
			$a['page']		   = "l_arsip_jumlahabsen";
			}
			
		} else if ($mau_ke == "prodi") {
			
			$otherdb = $this->load->database('otherdb', TRUE);
			
			if(is_null($otherdb->query("SHOW TABLES LIKE '{$namatabel}'")->row()))
		{
           $this->session->set_flashdata("Data Tidak ada");
			redirect('index.php/admin/');
		}
		else
		{		
			$this->db->query("TRUNCATE jumlahabsen");
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT nidn,kdprodi, count(nidn) as jumlah  FROM $namatabel WHERE kdprodi = '$prodi' AND (tglabsen BETWEEN '$tanggalawal' AND '$tanggalakhir') group by nidn order by nidn")->result();
			$a['namatabel']	= $tahunakademik.$semester ;
			$a['tanggalawal']  = $tanggalawal;
			$a['tanggalakhir'] = $tanggalakhir;
			$a['page']		= "l_arsip_jumlahabsen";
		}
			
		}else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "edt") {
			
        $otherdb = $this->load->database('otherdb', TRUE);
			$a['datpil']	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$npm' ")->row();	
			$a['page']		= "f_ubah_biodata";
			
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/ubah_biodata');
			
		} else if ($mau_ke == "act_edt") {
			  $otherdb = $this->load->database('otherdb', TRUE);
			  $otherdb->query("UPDATE msmhs SET almtinggal = '$alamat',tlp = '$telepon',tplhrmsmhs = '$tempat', tglhrmsmhs = '$tgl' WHERE nimhsmsmhs = '$npm'");
			
					
			redirect('index.php/admin/profil');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_ubah_biodata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//----------BAK end
	
	
	
	
	
	
	
	//Export------------------
	
	public function exportmhs() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
			
		
		$mau_ke					= $this->uri->segment(3);
		
	
		
		
	
		if ($mau_ke == "export") {
			 $otherdb = $this->load->database('otherdb', TRUE);
			
			$data		=  $otherdb->query("SELECT * FROM exportmsmhs")->result();
			
			if (empty($data)) {
			echo "Data Tidak Ada";
		} else {
			$no 	= 1;
			foreach ($data as $b) {
				 $NPM= $b->NPM;
				 
				 $otherdb = $this->load->database('otherdb', TRUE);
		         
				$q_cek	= $otherdb->query("SELECT nimhsmsmhs FROM msmhs where nimhsmsmhs LIKE '$NPM' ");
				$j_cek	= $q_cek->num_rows();
				$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        		if($j_cek == 1) {
					
					  $otherdb->query("UPDATE msmhs SET nlipktrlsm = '$b->IPK', tglretrlsm = '$b->tahunlulus', tglttdlulus = '$b->tahunlulus', tgllstrlsm = '$b->tahunlulus',stllstrlsm = '$b->Predikat',noijatrlsm = '$b->seriijazah',thnsemlulus = '$b->tahunakademik' WHERE nimhsmsmhs = '$NPM'");
				}
		  
				
			}
			
				
			}
			
			
		} else {
			
			
		}
		
		redirect("index.php/admin");
	}
	
	//----------BAK end
	
	
	//Export------------------
	
	public function exportfoto() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
			
		
		$mau_ke					= $this->uri->segment(3);
		
	
		
		
	
		if ($mau_ke == "export") {
			 $otherdb = $this->load->database('otherdb', TRUE);
			
			$data		=  $otherdb->query("SELECT * FROM potomhs")->result();
			
			if (empty($data)) {
			echo "Data Tidak Ada";
		} else {
			$no 	= 1;
			foreach ($data as $b) {
				 $NPM= $b->npm;
				 
				 $otherdb = $this->load->database('otherdb', TRUE);
		         
				$q_cek	= $otherdb->query("SELECT nimhsmsmhs FROM msmhs where nimhsmsmhs LIKE '$NPM' ");
				$j_cek	= $q_cek->num_rows();
				$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        		if($j_cek == 1) {
					
					  $otherdb->query("UPDATE msmhs SET pasphoto = '$b->file', 	kdpstmsmhs = '$b->prodi' WHERE nimhsmsmhs = '$NPM'");
				}
		  
				
			}
			
				
			}
			
			
		} else {
			
			
		}
		
		redirect("index.php/admin");
	}
	
	//----------BAK end
	
	
	//KRS-------------------
	
	public function arsip_detailkrs() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		$mau_ke					= $this->uri->segment(3);
		
		$npm				= $this->uri->segment(4);
		
		$namatabel = "trnlm".$this->uri->segment(5);
		
		
	
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/ubah_biodata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_ubah_biodata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ubah_biodata";
		}else if ($mau_ke == "sem") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel GROUP BY nimhstrnlm ORDER BY tglinputkrs DESC")->result();
			$a['namatabel']	= $namatabel ;
			$a['page']		= "l_arsip_detailkrs";
			
		} else if ($mau_ke == "lihat") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE nimhstrnlm = '$npm' ")->result();
			$a['namatabel']	= $namatabel ;
			$a['page']		= "l_arsip_detailkrs";
			
		}else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "edt") {
			
        $otherdb = $this->load->database('otherdb', TRUE);
			$a['datpil']	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$npm' ")->row();	
			$a['page']		= "f_ubah_biodata";
			
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/ubah_biodata');
			
		} else if ($mau_ke == "act_edt") {
			  $otherdb = $this->load->database('otherdb', TRUE);
			  $otherdb->query("UPDATE msmhs SET almtinggal = '$alamat',tlp = '$telepon',tplhrmsmhs = '$tempat', tglhrmsmhs = '$tgl' WHERE nimhsmsmhs = '$npm'");
			
					
			redirect('index.php/admin/profil');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_ubah_biodata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//----------BAK end
	
	public function arsip_detailjumlahabsen() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		//$nidn = $this->session->userdata('admin_user');
		
		$mau_ke					= $this->uri->segment(3);
		
		$nidn				= $this->uri->segment(4);
		
		$namatabel = "absenngajar".$this->uri->segment(5);
		$tanggalawal = $this->uri->segment(6);
		$tanggalakhir = $this->uri->segment(7);
		
		
	
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/ubah_biodata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_ubah_biodata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ubah_biodata";
		}else if ($mau_ke == "sem") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT nidn,kdprodi, count(nidn) as jumlah  FROM $namatabel WHERE nidn = '$nidn' AND (tglinput BETWEEN '2018-04-21' AND '2018-05-21') group by nidn order by nidn")->result();
			$a['namatabel']	= $namatabel ;
			$a['page']		= "l_arsip_detailjumlahabsen";
			
		} else if ($mau_ke == "lihat") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT nidn,kdprodi,kdmk,kelas, count(nidn) as jumlah  FROM $namatabel WHERE nidn = '$nidn' AND (tglinput BETWEEN '$tanggalawal' AND '$tanggalakhir') group by nidn,kdmk,kelas order by nidn")->result();
			$a['namatabel']	= $namatabel ;
			$a['tanggalawal']  = $tanggalawal;
			$a['tanggalakhir'] = $tanggalakhir;
			$a['page']		= "l_arsip_detailjumlahabsen";
			
		}else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "edt") {
			
        $otherdb = $this->load->database('otherdb', TRUE);
			$a['datpil']	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$npm' ")->row();	
			$a['page']		= "f_ubah_biodata";
			
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/ubah_biodata');
			
		} else if ($mau_ke == "act_edt") {
			  $otherdb = $this->load->database('otherdb', TRUE);
			  $otherdb->query("UPDATE msmhs SET almtinggal = '$alamat',tlp = '$telepon',tplhrmsmhs = '$tempat', tglhrmsmhs = '$tgl' WHERE nimhsmsmhs = '$npm'");
			
					
			redirect('index.php/admin/profil');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_ubah_biodata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//----------BAK end
	
	
	
	public function arsip_detailverifikasi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		$mau_ke					= $this->uri->segment(3);
		
		$kdmk				= $this->uri->segment(4);
		$npmhs				= $this->uri->segment(6);
		
		$namatabel = "trnlm".$this->uri->segment(5);
		
		$tabelnya = $this->uri->segment(5);
		
		
	
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/ubah_biodata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_ubah_biodata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ubah_biodata";
		}else if ($mau_ke == "sem") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel GROUP BY nimhstrnlm ORDER BY tglinputkrs DESC")->result();
			$a['namatabel']	= $namatabel ;
			$a['page']		= "l_arsip_detailkrs";
			
		} else if ($mau_ke == "lihat") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE kdmktrnlm = '$kdmk' AND verifikasi = 'N' ")->result();
			$a['tabelnya']	= $tabelnya ;
			$a['page']		= "l_arsip_detailverifikasi";
			
		} else if ($mau_ke == "edtsetuju") {
				$otherdb = $this->load->database('otherdb', TRUE);
				
				$otherdb->query("UPDATE $namatabel SET verifikasi = 'Y',cekverifikasi = 'COBA' WHERE kdmktrnlm = '$kdmk' AND nimhstrnlm = '$npmhs' ");
				
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE kdmktrnlm = '$kdmk' AND verifikasi = 'N' ")->result();
			$a['tabelnya']	= $tabelnya ;
			$a['page']		= "l_arsip_detailverifikasi";
			
		}else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "edt") {
			
        $otherdb = $this->load->database('otherdb', TRUE);
			$a['datpil']	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$npm' ")->row();	
			$a['page']		= "f_ubah_biodata";
			
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/ubah_biodata');
			
		} else if ($mau_ke == "act_edt") {
			  $otherdb = $this->load->database('otherdb', TRUE);
			  $otherdb->query("UPDATE msmhs SET almtinggal = '$alamat',tlp = '$telepon',tplhrmsmhs = '$tempat', tglhrmsmhs = '$tgl' WHERE nimhsmsmhs = '$npm'");
			
					
			redirect('index.php/admin/profil');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_ubah_biodata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//----------BAK end




	
	public function arsip_detailinputnilai() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		$mau_ke					= $this->uri->segment(3);
		
		$kdmk				= $this->uri->segment(4);
		$npmhs				= $this->uri->segment(6);
		
		$namatabel = "trnlm".$this->uri->segment(5);
		
		$tabelnya = $this->uri->segment(5);
		
		
	
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/ubah_biodata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_ubah_biodata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ubah_biodata";
		}else if ($mau_ke == "sem") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel GROUP BY nimhstrnlm ORDER BY tglinputkrs DESC")->result();
			$a['namatabel']	= $namatabel ;
			$a['page']		= "l_arsip_detailkrs";
			
		} else if ($mau_ke == "lihat") {
				$otherdb = $this->load->database('otherdb', TRUE);
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE kdmktrnlm = '$kdmk' AND nlakhtrnlm = 'T' ")->result();
			$a['tabelnya']	= $tabelnya ;
			$a['page']		= "l_arsip_detailinputnilai";
			
		} else if ($mau_ke == "edtsetuju") {
				$otherdb = $this->load->database('otherdb', TRUE);
				
				$otherdb->query("UPDATE $namatabel SET verifikasi = 'Y',cekverifikasi = 'COBA' WHERE kdmktrnlm = '$kdmk' AND nimhstrnlm = '$npmhs' ");
				
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE kdmktrnlm = '$kdmk' AND verifikasi = 'N' ")->result();
			$a['tabelnya']	= $tabelnya ;
			$a['page']		= "l_arsip_detailverifikasi";
			
		}else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "edt") {
			
        $otherdb = $this->load->database('otherdb', TRUE);
			$a['datpil']	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$npm' ")->row();	
			$a['page']		= "f_ubah_biodata";
			
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/ubah_biodata');
			
		} else if ($mau_ke == "act_edt") {
			  $otherdb = $this->load->database('otherdb', TRUE);
			  $otherdb->query("UPDATE msmhs SET almtinggal = '$alamat',tlp = '$telepon',tplhrmsmhs = '$tempat', tglhrmsmhs = '$tgl' WHERE nimhsmsmhs = '$npm'");
			
					
			redirect('index.php/admin/profil');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_ubah_biodata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//----------BAK end


//belumverifikasui-------------------
	
	public function arsip_verifikasi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
			$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		$mau_ke					= $this->uri->segment(3);
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$prodi				= addslashes($this->input->post('prodi'));
		
		$namatabel = "trnlm".$tahunakademik.$semester;
		
		
	
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/ubah_biodata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_ubah_biodata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ubah_biodata";
		}else if ($mau_ke == "sem") {
				$otherdb = $this->load->database('otherdb', TRUE);
				
				if(is_null($otherdb->query("SHOW TABLES LIKE '{$namatabel}'")->row()))
		{
           $this->session->set_flashdata("Data Tidak ada");
			redirect('index.php/admin/');
		}
		else
		{		
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE verifikasi = 'N' GROUP BY kdmktrnlm")->result();
			$a['namatabel']	= $tahunakademik.$semester ;
			$a['page']		= "l_arsip_verifikasi";
		}
			
		} else if ($mau_ke == "prodi") {
				$otherdb = $this->load->database('otherdb', TRUE);
				if(is_null($otherdb->query("SHOW TABLES LIKE '{$namatabel}'")->row()))
		{
           $this->session->set_flashdata("Data Tidak ada");
			redirect('index.php/admin/');
		}
		else
		{		
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE kdpsttrnlm = '$prodi' AND verifikasi = 'N' GROUP BY kdmktrnlm")->result();
			$a['namatabel']	= $tahunakademik.$semester ;
			$a['page']		= "l_arsip_verifikasi";
		}
			
		}else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "edt") {
			
        $otherdb = $this->load->database('otherdb', TRUE);
			$a['datpil']	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$npm' ")->row();	
			$a['page']		= "f_ubah_biodata";
			
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/ubah_biodata');
			
		} else if ($mau_ke == "act_edt") {
			  $otherdb = $this->load->database('otherdb', TRUE);
			  $otherdb->query("UPDATE msmhs SET almtinggal = '$alamat',tlp = '$telepon',tplhrmsmhs = '$tempat', tglhrmsmhs = '$tgl' WHERE nimhsmsmhs = '$npm'");
			
					
			redirect('index.php/admin/profil');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_ubah_biodata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//----------BAK end



//belumverifikasui-------------------
	
	public function arsip_inputnilai() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
			$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$nidn = $this->session->userdata('admin_user');
		
		$mau_ke					= $this->uri->segment(3);
		
		$tahunakademik			= addslashes($this->input->post('tahunakademik'));
		$semester				= addslashes($this->input->post('semester'));
		$prodi				= addslashes($this->input->post('prodi'));
		
		$namatabel = "trnlm".$tahunakademik.$semester;
		
		
	
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsul WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/ubah_biodata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_ubah_biodata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ubah_biodata";
		}else if ($mau_ke == "sem") {
				$otherdb = $this->load->database('otherdb', TRUE);
				
				if(is_null($otherdb->query("SHOW TABLES LIKE '{$namatabel}'")->row()))
		{
           $this->session->set_flashdata("Data Tidak ada");
			redirect('index.php/admin/');
		}
		else
		{		
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE nlakhtrnlm  = 'T' group by kdmktrnlm")->result();
			$a['namatabel']	= $tahunakademik.$semester ;
			$a['page']		= "l_arsip_inputnilai";
		}
			
		} else if ($mau_ke == "prodi") {
				$otherdb = $this->load->database('otherdb', TRUE);
				if(is_null($otherdb->query("SHOW TABLES LIKE '{$namatabel}'")->row()))
		{
           $this->session->set_flashdata("Data Tidak ada");
			redirect('index.php/admin/');
		}
		else
		{		
			$a['data']		= $otherdb->query("SELECT * FROM $namatabel WHERE kdpsttrnlm = '$prodi' AND nlakhtrnlm  = 'T' GROUP BY kdmktrnlm")->result();
			$a['namatabel']	= $tahunakademik.$semester;
			$a['page']		= "l_arsip_inputnilai";
		}
			
		}else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_ubah_biodata";
		} else if ($mau_ke == "edt") {
			
        $otherdb = $this->load->database('otherdb', TRUE);
			$a['datpil']	= $otherdb->query("SELECT * FROM msmhs WHERE nimhsmsmhs = '$npm' ")->row();	
			$a['page']		= "f_ubah_biodata";
			
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_konsul VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$subjek', '$isikonsul','', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/ubah_biodata');
			
		} else if ($mau_ke == "act_edt") {
			  $otherdb = $this->load->database('otherdb', TRUE);
			  $otherdb->query("UPDATE msmhs SET almtinggal = '$alamat',tlp = '$telepon',tplhrmsmhs = '$tempat', tglhrmsmhs = '$tgl' WHERE nimhsmsmhs = '$npm'");
			
					
			redirect('index.php/admin/profil');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsul WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_ubah_biodata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//----------BAK end






public function arsip_administrasi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_administrasi WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_konsultasi/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$kode					= addslashes($this->input->post('kode'));
		$perihal				= addslashes($this->input->post('perihal'));
		$surat					= addslashes($this->input->post('surat'));
		
		
		$cari					= addslashes($this->input->post('q'));

       
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_administrasi WHERE idadmin = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_administrasi');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_administrasi WHERE npm = '$npm' AND (perihal LIKE '%$cari%' OR surat LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_administrasi";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_administrasi";
		} else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_administrasi";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_administrasi WHERE idadmin = '$idu'")->row();	
			$a['page']		= "f_arsip_administrasi";
		} else if ($mau_ke == "act_add") {	
	
		$this->db->query("INSERT INTO t_administrasi VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$surat', '$perihal', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_konsultasi');
			
		} else if ($mau_ke == "act_edt") {
							$this->db->query("UPDATE t_administrasi SET tahunakademik = '$ta',semester = '$sem',tgl=NOW(),surat = '$surat', perihal = '$perihal' WHERE idadmin = '$idp'");
			
					
			redirect('index.php/admin/arsip_administrasi');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_administrasi WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_administrasi";
		}
		
		$this->load->view('admin/aaa', $a);
	}



public function arsip_pembayaran() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_pembayaran WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_pembayaran/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$status					= addslashes($this->input->post('status'));
		$perihal				= addslashes($this->input->post('perihal'));
		$jumlah					= addslashes($this->input->post('jumlah'));
		
		
		$cari					= addslashes($this->input->post('q'));

       	$config['upload_path'] 		= './upload/kwitansi';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';

		$this->load->library('upload', $config);
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_pembayaran WHERE idadmin = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_pembayaran');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_pembayaran WHERE npm = '$npm' AND (perihal LIKE '%$cari%' OR jumlah LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_pembayaran";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_pembayaran";
		}else if ($mau_ke == "view") {
			//$a['datpil']	= $this->db->query("SELECT * FROM t_pendidikanfile WHERE id = '$idx'")->row();
			//$Encrypted = encrypt($idu);
			$encrypt=base64_encode($idu);
			redirect('f_viewkw.php?id='.$encrypt);
		
		} else if ($mau_ke == "send") {
			$status		    = $this->uri->segment(4);
			$a['status']		= $status;
			$a['page']		= "f_arsip_pembayaran";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_pembayaran WHERE idbayar = '$idu'")->row();	
			$a['page']		= "f_arsip_pembayaran";
		} else if ($mau_ke == "act_add") {	
		
		
	
		$this->db->query("INSERT INTO t_pembayaran VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$jumlah', '$perihal', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_pembayaran');
			
		} else if ($mau_ke == "act_edt") {
			
			if ($this->upload->do_upload('file_arsip')) {
				$up_data	 	= $this->upload->data();
				$this->db->query("UPDATE t_pembayaran SET tgl=NOW(), perihal = '$perihal',status = '2',file = '".$up_data['file_name']."'WHERE idbayar = '$idp'");
			}
			else
			{
				$this->db->query("UPDATE t_pembayaran SET tgl=NOW(), perihal = '$perihal',status = '2',file = '' WHERE idbayar = '$idp'");
			}
			
					
			redirect('index.php/admin/arsip_pembayaran');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_pembayaran WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_pembayaran";
		}
		
		$this->load->view('admin/aaa', $a);
	}







//==== Ini koding akademik 

public function akademik() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		//$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
	//	$nama = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_info")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/akademik/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$kodeinfo					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$informasi 					= addslashes($this->input->post('informasia'));
		//$nama					= addslashes($this->input->post('namaa'));
		$kodeinfox						= addslashes($this->input->post('kode_info'));
       // $judul					= addslashes($this->input->post('judul'));
		//$isiproposal 			= addslashes($this->input->post('isiproposal'));
		//$pembimbing		        = addslashes($this->input->post('pembimbing'));
		//$prodi	     		    = addslashes($this->input->post('prodi'));
//		$file_proposal 			= addslashes($this->input->post('fileproposal'));
		
		//$isikonsul				= addslashes($this->input->post('isikonsul'));
		//$subjek					= addslashes($this->input->post('subjek'));
		
		
		$cari					= addslashes($this->input->post('q'));
		$config['upload_path'] 		= './upload/arsip_akademik';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '3000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';
        

		$this->load->library('upload', $config);
	

       
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_info WHERE kode_info = '$kodeinfo'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/akademik');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_info WHERE kode_info = '$kodeinfo' AND (informasi LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_akademik";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_akademik";
		} else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_akademik";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_info WHERE kode_info = '$kodeinfo'")->row();	
			$a['page']		= "f_akademik";
		} else if ($mau_ke == "act_add") {	
		//untuk insert ke database
	
	      if ($this->upload->do_upload('fileinfo')) {
				$up_data	 	= $this->upload->data();
	
	
		$this->db->query("INSERT INTO t_info VALUES (NULL,'$informasi','".$up_data['file_name']."')");
						
		  }
		  
		  else 
		  
		  {
			 $this->db->query("INSERT INTO t_info VALUES (NULL,'$informasi','')");
	 
		  }
		  
		  $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/akademik');
			
		} else if ($mau_ke == "act_edt") {
			 if ($this->upload->do_upload('fileinfo')) {
				$up_data	 	= $this->upload->data();
				
				
			
							$this->db->query("UPDATE t_info SET informasi = '$informasi' , file_info = '" .$up_data['file_name']. "' WHERE kode_info = '$kodeinfox'");
			
					 }
				  else
				  {
				 $this->db->query("UPDATE t_info SET informasi = '$informasi' WHERE kode_info = '$kodeinfox'");
				  }
					
					
					
					
			redirect('index.php/admin/akademik');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_info ")->result();
			$a['page']		= "l_akademik";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
//==== akhir dari akademik





//==== Ini koding KEYWORD 

public function keyword() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		//$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
	//	$nama = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_keyword")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/keyword/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$kodekeyword					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$keyword				= addslashes($this->input->post('keyworda'));
		//$nama					= addslashes($this->input->post('namaa'));
		$kodekeywordx						= addslashes($this->input->post('kode_keyword'));
       // $judul					= addslashes($this->input->post('judul'));
		//$isiproposal 			= addslashes($this->input->post('isiproposal'));
		//$pembimbing		        = addslashes($this->input->post('pembimbing'));
		//$prodi	     		    = addslashes($this->input->post('prodi'));
//		$file_proposal 			= addslashes($this->input->post('fileproposal'));
		
		//$isikonsul				= addslashes($this->input->post('isikonsul'));
		//$subjek					= addslashes($this->input->post('subjek'));
		
		
		$cari					= addslashes($this->input->post('q'));
		$config['upload_path'] 		= './upload/arsip_keyword';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '3000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';
        

		$this->load->library('upload', $config);
	

       
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_keyword WHERE kode_keyword = '$kodekeyword'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/keyword');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_keyword WHERE kode_keyword = '$kodekeyword' AND (keyword LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_keyword";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_keyword";
		} else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_keyword";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_keyword WHERE kode_keyword = '$kodekeyword'")->row();	
			$a['page']		= "f_keyword";
		} else if ($mau_ke == "act_add") {	
		//untuk insert ke database
	
	      if ($this->upload->do_upload('filekeyword')) {
				$up_data	 	= $this->upload->data();
	
	
		$this->db->query("INSERT INTO t_keyword VALUES (NULL,'$keyword','".$up_data['file_name']."')");
						
		  }
		  
		  else 
		  
		  {
			 $this->db->query("INSERT INTO t_keyword VALUES (NULL,'$keyword','')");
	 
		  }
		  
		  $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/keyword');
			
		} else if ($mau_ke == "act_edt") {
			 if ($this->upload->do_upload('filekeyword')) {
				$up_data	 	= $this->upload->data();
				
				
			
							$this->db->query("UPDATE t_keyword SET keyword = '$keyword' , file_keyword = '" .$up_data['file_name']. "' WHERE kode_keyword = '$kodekeywordx'");
			
					 }
				  else
				  {
				 $this->db->query("UPDATE t_keyword SET keyword = '$keyword' WHERE kode_keyword = '$kodekeywordx'");
				  }
					
					
					
					
			redirect('index.php/admin/keyword');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_keyword ")->result();
			$a['page']		= "l_keyword";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
//==== akhir dari KEYWORD




	
	
	
	// koding key
	
public function key() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		//$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
	//	$nama = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_key")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/key/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		//$kodeinfo					= $this->uri->segment(4);
		
		
	//	$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		//$informasi 					= addslashes($this->input->post('informasia'));
		//$nama					= addslashes($this->input->post('namaa'));
		//$kodeinfo					= addslashes($this->input->post('kode_info'));
        $kodekeyword					= addslashes($this->input->post('kode_keyword'));
		$keyword 			= addslashes($this->input->post('keyword'));
		//$pembimbing		        = addslashes($this->input->post('pembimbing'));
		//$prodi	     		    = addslashes($this->input->post('prodi'));
//		$file_proposal 			= addslashes($this->input->post('fileproposal'));
		
		//$isikonsul				= addslashes($this->input->post('isikonsul'));
		//$subjek					= addslashes($this->input->post('subjek'));
		
		
		//$cari					= addslashes($this->input->post('q'));
		//$config['upload_path'] 		= './upload/arsip_akademik';
		//$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		//$config['max_size']			= '3000000';
		//$config['max_width']  		= '3000000';
		//$config['max_height'] 		= '3000000';
        

		//$this->load->library('upload', $config);
	

       
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_key WHERE kode_keyword = '$kodekeyword'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/key');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_key WHERE kode_keyword = '$kodekeyword' AND (keyword LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_key";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_setkey";
		} else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "l_key";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_key");	
			$a['page']		= "l_key";
			} else if ($mau_ke == "act_add") {
			
		
		
		
		
		//untuk insert ke database
	
	      //if ($this->upload->do_upload('fileinfo')) {
			//	$up_data	 	= $this->upload->data();
	
	
		//$this->db->query("INSERT INTO t_key VALUES ($kodeinfo,'$kodekeyword','".$up_data['file_name']."')");
						
		  //}
		  
		  //lse 
		  
		  {
			 $this->db->query("INSERT INTO t_key VALUES ('$kodekeyword','$keyword')");
	 
		  }
		  
		  $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/key');
			
		//} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('fileinfo')) {
				$up_data	 	= $this->upload->data();
				
				
			
							$this->db->query("UPDATE t_key ");
			
					 }
				  else
				  {
				 $this->db->query("UPDATE t_key SET kode_keyword = '$kodekeyword' WHERE kode_info = '$kodeinfo'");
				  }
					
					
					
					
			redirect('index.php/admin/key');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_info ")->result();
			$a['page']		= "l_setkey";
		}
		
		
		
		
		$this->load->view('admin/aaa', $a);
	}
	// akhir koding kode key
	
	
	

// koding nlp
public function nlp() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		//$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
	//	$nama = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_key")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/key/p");
		
		//ambil variabel URL
		$mau_ke				     	= $this->uri->segment(5);
		$kodeinfo					= $this->uri->segment(3);
		$keywordd					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		//$informasi 					= addslashes($this->input->post('informasia'));
		//$nama					= addslashes($this->input->post('namaa'));
		//$kodeinfo					= addslashes($this->input->post('kode_info'));
        $kodekeyword					= addslashes($this->input->post('kode_keyword'));
		$keyword 			= addslashes($this->input->post('keyword'));
		$keywordo 			= addslashes($this->input->post('keywordo'));
		//$pembimbing		        = addslashes($this->input->post('pembimbing'));
		//$prodi	     		    = addslashes($this->input->post('prodi'));
//		$file_proposal 			= addslashes($this->input->post('fileproposal'));
		
		//$isikonsul				= addslashes($this->input->post('isikonsul'));
		//$subjek					= addslashes($this->input->post('subjek'));
		
		
		$cari					= addslashes($this->input->post('q'));
		$config['upload_path'] 		= './upload/arsip_akademik';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '3000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';
        

		$this->load->library('upload', $config);
	

       
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_setkey WHERE kode_info = '$kodeinfo' and keyword = '$keywordd' ");
			
			$textlink = "index.php/admin/nlp/".$kodeinfo;
		  
		  $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect($textlink);
			
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_key")->result();
			$a['page']		= "l_key";
		} else if ($mau_ke == "add") {
			$a['kode']		= $kodeinfo;
			$a['page']		= "f_setkey";
			$a['data']		= $this->db->query("SELECT * FROM t_key ")->result();
		} else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "l_key";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_key");	
			$a['page']		= "l_key";
		} else if ($mau_ke == "otheradd") {
			
			$this->db->query("INSERT INTO t_setkey VALUES ('$kodeinfo','$keywordo')");
						
		  
		$textlink = "index.php/admin/nlp/".$kodeinfo;
		  
		  $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect($textlink);
			
			
		} else if ($mau_ke == "act_add") {
		
		
		//untuk insert ke database
	
	     
	
	
		$this->db->query("INSERT INTO t_setkey VALUES ('$kodeinfo','$keywordd')");
						
		  
		$textlink = "index.php/admin/nlp/".$kodeinfo;
		  
		  $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect($textlink);
			
		} else if ($mau_ke == "act_edt") {
			 if ($this->upload->do_upload('fileinfo')) {
				$up_data	 	= $this->upload->data();
				
				
			
							$this->db->query("UPDATE t_nlp SET informasi = '$informasi' , file_info = '" .$up_data['file_name']. "' WHERE kode_info = '$kodeinfox'");
			
					 }
				  else
				  {
				 $this->db->query("UPDATE t_key SET kode_keyword = '$kodekeyword' WHERE keyword = '$kodekeyword'");
				  }
					
					
					
					
			redirect('index.php/admin/key');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_setkey where kode_info = '$kodeinfo' ")->result();
			$a['kode']		= $kodeinfo;
			$a['page']		= "l_key";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	// akhir koding kode nlpc




//==== Ini koding KATA 

public function kata() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		//$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
	//	$nama = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_kata")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/kata/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$kata					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$kata				= addslashes($this->input->post('kata'));
		//$nama					= addslashes($this->input->post('namaa'));
		$kataganti				= addslashes($this->input->post('kataganti'));
       // $judul					= addslashes($this->input->post('judul'));
		//$isiproposal 			= addslashes($this->input->post('isiproposal'));
		//$pembimbing		        = addslashes($this->input->post('pembimbing'));
		//$prodi	     		    = addslashes($this->input->post('prodi'));
//		$file_proposal 			= addslashes($this->input->post('fileproposal'));
		
		//$isikonsul				= addslashes($this->input->post('isikonsul'));
		//$subjek					= addslashes($this->input->post('subjek'));
		
		
		$cari					= addslashes($this->input->post('q'));
		$config['upload_path'] 		= './upload/arsip_keyword';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '3000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';
        

		$this->load->library('upload', $config);
	

       
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_kata WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/kata');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_kata WHERE id = '$idp' AND (kata LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_kata";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_kata";
		} else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_kata";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_kata WHERE kata = '$kata'")->row();	
			$a['page']		= "f_kata";
		} else if ($mau_ke == "act_add") {	
		//untuk insert ke database
	
	     
		  {
			 $this->db->query("INSERT INTO t_kata VALUES (NULL, '$kata','$kataganti')");
	 
		  }
		  
		  $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/kata');
			
		
			
					
					
					
					
					
			redirect('index.php/admin/kata');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_kata ")->result();
			$a['page']		= "l_kata";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
//==== akhir dari Kata
	




public function arsip_beasiswa() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_beasiswa WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_beasiswa/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$status					= addslashes($this->input->post('status'));
		$perihal				= addslashes($this->input->post('perihal'));
		$jumlah					= addslashes($this->input->post('jumlah'));
		
		
		$cari					= addslashes($this->input->post('q'));

       	$config['upload_path'] 		= './upload/kwitansi';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';

		$this->load->library('upload', $config);
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_beasiswa WHERE idadmin = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_beasiswa');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_beasiswa WHERE npm = '$npm' AND (perihal LIKE '%$cari%' OR jumlah LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_beasiswa";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_beasiswa";
		}else if ($mau_ke == "view") {
			//$a['datpil']	= $this->db->query("SELECT * FROM t_pendidikanfile WHERE id = '$idx'")->row();
			//$Encrypted = encrypt($idu);
			$encrypt=base64_encode($idu);
			redirect('f_viewkw.php?id='.$encrypt);
		
		} else if ($mau_ke == "send") {
			$status		    = $this->uri->segment(4);
			$a['status']		= $status;
			$a['page']		= "f_arsip_beasiswa";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_beasiswa WHERE idbayar = '$idu'")->row();	
			$a['page']		= "f_arsip_beasiswa";
		} else if ($mau_ke == "act_add") {	
		
		
	
		$this->db->query("INSERT INTO t_beasiswa VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$jumlah', '$perihal', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_beasiswa');
			
		
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_beasiswa WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_beasiswa";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	
	
	
	public function status_beasiswa2() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_beasiswa WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_beasiswa/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('tahunakademik'));
		$status					= addslashes($this->input->post('status'));
		$perihal				= addslashes($this->input->post('perihal'));
		$jumlah					= addslashes($this->input->post('jumlah'));
		
		
		$cari					= addslashes($this->input->post('q'));

       	$config['upload_path'] 		= './upload/kwitansi';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';

		$this->load->library('upload', $config);
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_beasiswa WHERE idadmin = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_beasiswa');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_beasiswa WHERE npm = '$npm' AND (perihal LIKE '%$cari%' OR jumlah LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_status_beasiswa";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_beasiswa";
		}else if ($mau_ke == "view") {
			//$a['datpil']	= $this->db->query("SELECT * FROM t_pendidikanfile WHERE id = '$idx'")->row();
			//$Encrypted = encrypt($idu);
			$encrypt=base64_encode($idu);
			redirect('f_viewkw.php?id='.$encrypt);
		
		} else if ($mau_ke == "send") {
			$status		    = $this->uri->segment(4);
			$a['status']		= $status;
			$a['page']		= "f_arsip_beasiswa";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_beasiswa WHERE idbayar = '$idu'")->row();	
			$a['page']		= "f_arsip_beasiswa";
		} else if ($mau_ke == "act_add") {	
		
		
	
		$this->db->query("INSERT INTO t_beasiswa VALUES (NULL,'$npm','$nidn', '$ta', '$sem',NOW(), '$jumlah', '$perihal', '1')");
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_beasiswa');
			
		
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_beasiswa WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_status_beasiswa";
		}
		
		$this->load->view('admin/aaa', $a);
	}



public function arsip_skripsi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		

		$ids = $this->session->userdata('admin_id');
		$unit = $this->session->userdata('admin_unit');
		$npm = $this->session->userdata('admin_user');
		$nidn = $this->session->userdata('admin_nidn');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_konsulskripsi WHERE npm = '$ids'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/arsip_skripsi/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
        $sem 					= addslashes($this->input->post('semester'));
		$ta 					= addslashes($this->input->post('pertemuan'));
		$kode					= addslashes($this->input->post('kode'));
		$isikonsul				= addslashes($this->input->post('isikonsul'));
		$subjek					= addslashes($this->input->post('subjek'));
		
		
		$cari					= addslashes($this->input->post('q'));

       	$config['upload_path'] 		= './upload/file_skripsi';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000000';
		$config['max_width']  		= '3000000';
		$config['max_height'] 		= '3000000';
        

		$this->load->library('upload', $config);
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_konsulskripsi WHERE idkonsul = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/arsip_skripsi');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_konsulskripsi WHERE npm = '$npm' AND (isikonsul LIKE '%$cari%' OR subjek LIKE '%$cari%') ORDER BY id DESC")->result();
			$a['page']		= "l_arsip_skripsi";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_arsip_skripsi";
		} else if ($mau_ke == "send") {
			$kode		    = $this->uri->segment(4);
			$a['kode']		= $kode;
			$a['page']		= "f_arsip_skripsi";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_konsulskripsi WHERE idkonsul = '$idu'")->row();	
			$a['page']		= "f_arsip_skripsi";
		} else if ($mau_ke == "act_add") {	
        
        
        if ($this->upload->do_upload('file_arsip')) {
				$up_data	 	= $this->upload->data();
				
									
				$this->db->query("INSERT INTO t_konsulskripsi VALUES (NULL,'$npm','$nidn', '$ta',NOW(), '$subjek', '$isikonsul','".$up_data['file_name']."','', '1')");
			} else {
			
           $this->db->query("INSERT INTO t_konsulskripsi VALUES (NULL,'$npm','$nidn', '$ta',NOW(), '$subjek', '$isikonsul','', '1')");
			}		
        
	
		
							
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/arsip_skripsi');
			
		} else if ($mau_ke == "act_edt") {
			
			
			if ($this->upload->do_upload('file_arsip')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE t_konsulskripsi SET pertemuan = '$ta',tgl=NOW(),subjek = '$subjek', isikonsul = '$isikonsul' ,file = '".$up_data['file_name']."' WHERE idkonsul = '$idp'");
				
			
			} else {
				$this->db->query("UPDATE t_konsulskripsi SET pertemuan = '$ta',tgl=NOW(),subjek = '$subjek', isikonsul = '$isikonsul' ,file = '' WHERE idkonsul = '$idp'");
			}	
			
			
							
			
					
			redirect('index.php/admin/arsip_skripsi');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_konsulskripsi WHERE npm = '$npm' ORDER BY tgl DESC LIMIT $awal, $akhir  ")->result();
			$a['page']		= "l_arsip_skripsi";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	


	
	public function pengguna() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}		
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		
		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$alamat					= addslashes($this->input->post('alamat'));
		$kepsek					= addslashes($this->input->post('kepsek'));
		$nip_kepsek				= addslashes($this->input->post('nip_kepsek'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('logo')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek', logo = '".$up_data['file_name']."' WHERE id = '$idp'");

			} else {
				$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek' WHERE id = '$idp'");
			}		

			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/pengguna');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM tr_instansi WHERE id = '1' LIMIT 1")->row();
			$a['page']		= "f_pengguna";
		}
		
		$this->load->view('admin/aaa', $a);	
	}
	
	
	public function register() {
					
		$idp					= addslashes($this->input->post('idp'));
		$username				= addslashes($this->input->post('username'));
		$password				= md5(addslashes($this->input->post('password')));
		$nama					= addslashes($this->input->post('nama'));
		$jabfungsional			= addslashes($this->input->post('jabfungsional'));
		$gol					= addslashes($this->input->post('gol'));
		$tgl_lahir				= addslashes($this->input->post('tgl_lahir'));
		$tempatlahir			= addslashes($this->input->post('tempatlahir'));
		$fakultas			= addslashes($this->input->post('fakultas'));
		$prodi			= addslashes($this->input->post('prodi'));
		$s1						= addslashes($this->input->post('s1'));
		$s2						= addslashes($this->input->post('s2'));
		$s3						= addslashes($this->input->post('s3'));
		$nip					= addslashes($this->input->post('nip'));
		$jenis					= addslashes($this->input->post('jenis'));
		$bidangilmu				= addslashes($this->input->post('bidangilmu'));
		$nohp					= addslashes($this->input->post('nohp'));
		$level					= addslashes($this->input->post('level'));
		$photo					= addslashes($this->input->post('photo'));
		
		$config['upload_path'] 		= './upload/foto_profil';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		
		$cek_user_exist = $this->db->query("SELECT username FROM t_mahasiswa WHERE username = '$username'")->num_rows();

			if (strlen($username) < 6) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username minimal 6 huruf</div>");
			} else if ($cek_user_exist > 0) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username telah dipakai. Ganti yang lain..!</div>");	
			} else {
				if ($this->upload->do_upload('photo')) {
				$up_data	 	= $this->upload->data();
				}
			
				$this->db->query("INSERT INTO t_mahasiswa VALUES (NULL, '$username', '$password', '$nama', '$fakultas', '$prodi', '$jabfungsional','$gol', '$tgl_lahir', '$tempatlahir', '$s1', '$s2', '$s3', '$jenis', '$bidangilmu', '$nohp', '$nip', 'Admin','".$up_data['file_name']."')");
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			}
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/login');
				
				
		
	}
	
	public function gantiphoto() {
					
		$idp					= addslashes($this->input->post('idp'));
		$username				= addslashes($this->input->post('username'));
		$nama					= addslashes($this->input->post('nama'));
		$photo					= addslashes($this->input->post('photo'));
		
		$kodeprodi = $this->session->userdata('admin_prodi'); 
		
		 if ($kodeprodi == "61201")
		  {
			  $programstudi = "Manajemen";
			  $fakultas = "F. Ekonomi dan Bisnis";
		  }
		  else if ($kodeprodi == "62201")
		  {
			  $programstudi = "Akuntansi";
			  $fakultas = "F. Ekonomi dan Bisnis";
		  }
		  else if ($kodeprodi == "74201")
		  {
			  $programstudi = "Ilmu Hukum";
			  $fakultas = "Fakultas Hukum";
		  }
		  else if ($kodeprodi == "63201")
		  {
			  $programstudi = "Ilmu Administrasi Negara";
			  $fakultas = "F I S I P";
		  }
		  else if ($kodeprodi == "70201")
		  {
			  $programstudi = "Ilmu Komunikasi";
			  $fakultas = "F I S I P";
		  }
		  else if ($kodeprodi == "22201")
		  {
			  $programstudi = "Teknik Sipil";
			  $fakultas = "F. Teknik";
		  }
		   else if ($kodeprodi == "21201")
		  {
			  $programstudi = "Teknik Mesin";
			  $fakultas = "F. Teknik";
		  }
		    else if ($kodeprodi == "23201")
		  {
			  $programstudi = "Arsitektur";
			  $fakultas = "F. Teknik";
		  }
		    else if ($kodeprodi == "57201")
		  {
			  $programstudi = "Sistem Informasi";
			  $fakultas = "F. Ilmu Komputer";
		  }
		   else if ($kodeprodi == "55201")
		  {
			  $programstudi = "Informatika";
			  $fakultas = "F. Ilmu Komputer";
		  }
		   else if ($kodeprodi == "88203")
		  {
			  $programstudi = "Pendidikan. B. Iggris";
			  $fakultas = "F K I P";
		  }
		  else
		  {
			  $programstudi = "NULL";
			  $fakultas = "NULL";
		  }
		  
		  
		
		
		$config['upload_path'] 		= './upload/foto_profil';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		
		$cek_user_exist = $this->db->query("SELECT username FROM t_mahasiswa WHERE username = '$username'")->num_rows();

			if (strlen($username) < 6) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username minimal 6 huruf</div>");
			} else if ($cek_user_exist > 0) {
				if ($this->upload->do_upload('photo')) {
				$up_data	 	= $this->upload->data();
				$this->db->query("UPDATE t_mahasiswa SET photo = '".$up_data['file_name']."', fakultas = '$fakultas' , prodi = '$programstudi' WHERE username = '$username'");
			}
			else
			{
				$this->db->query("UPDATE t_mahasiswa SET photo = '' WHERE username = '$username'");
			}
				
			} else {
				if ($this->upload->do_upload('photo')) {
				$up_data	 	= $this->upload->data();
				}
			
				$this->db->query("INSERT INTO t_mahasiswa VALUES (NULL, '$username','$nama','$fakultas','$programstudi','".$up_data['file_name']."')");
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			}
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/gantilahphoto');
				
			
		
		
	}
	
	
	public function regis() {
		$this->load->view('admin/registrasi');
	}
	
	public function profil() {
		$a['page']	= "f_biodata";
		$this->load->view('admin/aaa', $a);
		
	}
	
	public function absen() {
		$a['page']	= "f_absen";
		$this->load->view('admin/aaa', $a);
		
	}
	
	public function ektm() {
		$a['page']	= "f_config_cetak_ektm";
		$this->load->view('admin/aaa', $a);
		
	}
	
		public function transkrip() {
		$a['page']	= "f_config_cetak_transkrip";
		$this->load->view('admin/aaa', $a);
		
	}
	
    public function cetakektm() {
    if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		$NPM = addslashes($this->input->post('NPM'));
		
	$this->load->library('ciqrcode');
	$kodeqr = $NPM;

$this->load->helper('url');


$qr['data'] = 'http://ublapps.ubl.ac.id/profileubl/?npm='.$NPM;

$qr['level'] = 'H';
$qr['size'] = 10;
$qr['savename'] = FCPATH.'upload/qrcodektm/'.$kodeqr.'.png';
$this->ciqrcode->generate($qr);
		
		
		
		$a['NPM']	= $NPM;
		$a['page']	= "ektm";
		$this->load->view('admin/aaa', $a);
		
	}
	
	 public function cetaktranskrip() {
    if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		$NPM = addslashes($this->input->post('NPM'));
		
			
		
		
		$a['NPM']	= $NPM;
		$a['page']	= "f_transkrip";
		$this->load->view('admin/aaa', $a);
		
	}

	
	public function gantilahphoto() {
		$a['page']	= "f_gantiphoto";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function status_beasiswa() {
		$a['page']	= "l_status_beasiswa";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function skpipendidikan() {
		$a['page']	= "l_arsip_skpipendidikan";
		$this->load->view('admin/aaa', $a);
		
	}
	
		public function skpipenelitianmhs() {
		$a['page']	= "l_arsip_skpipenelitianmhs";
		$this->load->view('admin/aaa', $a);
		
	}
	
	public function agenda_surat_masuk() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function config_semester() {
		$a['page']	= "f_config_cetak_agendabeasiswa";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function config_semesterds() {
		$a['page']	= "f_config_cetak_agendapendidikands";
		$this->load->view('admin/aaa', $a);
	}
	
	public function config_semesterpengabdiands() {
		$a['page']	= "f_config_cetak_agendapengabdiands";
		$this->load->view('admin/aaa', $a);
	}
		public function config_semesterpenelitiands() {
		$a['page']	= "f_config_cetak_agendapenelitiands";
		$this->load->view('admin/aaa', $a);
	}
	
		public function config_semesterpenunjangds() {
		$a['page']	= "f_config_cetak_agendapenunjangds";
		$this->load->view('admin/aaa', $a);
	}
		public function config_semesternon() {
		$a['page']	= "f_config_cetak_agendabeasiswanon";
		$this->load->view('admin/aaa', $a);
	} 
	
		public function config_semesterabdi() {
		$a['page']	= "f_config_cetak_agendabeasiswaabdi";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function config_semesterslrh() {
		$a['page']	= "f_config_cetak_agendabeasiswaslrh";
		$this->load->view('admin/aaa', $a);
	} 
	
		public function config_semesterslrhpendidikands() {
		$a['page']	= "f_config_cetak_agendapendidikandsslrh";
		$this->load->view('admin/aaa', $a);
	} 
	
		public function config_semesterslrhpenelitiands() {
		$a['page']	= "f_config_cetak_agendapenelitiandsslrh";
		$this->load->view('admin/aaa', $a);
	} 
	
		public function config_semesterslrhpengabdiands() {
		$a['page']	= "f_config_cetak_agendapengabdiandsslrh";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function config_semesterslrhpenunjangds() {
		$a['page']	= "f_config_cetak_agendapenunjangdsslrh";
		$this->load->view('admin/aaa', $a);
	} 
	
	
	public function config_semesterslrhnon() {
		$a['page']	= "f_config_cetak_agendabeasiswaslrhnon";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function config_semesterslrhabdi() {
		$a['page']	= "f_config_cetak_agendabeasiswaslrhabdi";
		$this->load->view('admin/aaa', $a);
	} 
	
	
	public function faq() {
		$a['page']	= "f_faq";
		$this->load->view('admin/aaa', $a);
	} 
	
		
	public function pengisikrs() {
		$a['page']	= "f_config_cetak_pengisikrs";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function jumlahabsen() {
		$a['page']	= "f_config_cetak_jumlahabsen";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function verifikasi() {
		$a['page']	= "f_config_cetak_verifikasi";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function inputnilai() {
		$a['page']	= "f_config_cetak_inputnilai";
		$this->load->view('admin/aaa', $a);
	}
	
	public function pengisikrsprodi() {
		$a['page']	= "f_config_cetak_pengisikrsprodi";
		$this->load->view('admin/aaa', $a);
	} 
	
		public function jumlahabsenprodi() {
		$a['page']	= "f_config_cetak_jumlahabsenprodi";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function verifikasiprodi() {
		$a['page']	= "f_config_cetak_verifikasiprodi";
		$this->load->view('admin/aaa', $a);
	} 
	public function inputnilaiprodi() {
		$a['page']	= "f_config_cetak_inputnilaiprodi";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function fchatbot() {
		$a['page']	= "f_chatbot2";
		$this->load->view('admin/aaa', $a);
	} 
	
	
	public function login_siater() {
		$a['page']	= "f_login_siater";
		$this->load->view('admin/aaa', $a);
	} 
	
	
	public function agenda_surat_keluar() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function agenda_arsip_krs() {
		$a['page']	= "f_config_cetak_agendakrs";
		$this->load->view('admin/aaa', $a);
	}
	
	public function agenda_arsip_khs() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function agenda_arsip_external() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	} 
	
	public function agenda_arsip_borang() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	} 
	
	
	public function cetak_agenda() {
		$jenis_surat	= $this->input->post('tipe');
		$tgl_start		= $this->input->post('tgl_start');
		$tgl_end		= $this->input->post('tgl_end');
		$ids = $this->session->userdata('admin_id');
		
		$a['tgl_start']	= $tgl_start;
		$a['tgl_end']	= $tgl_end;		

		if ($jenis_surat == "agenda_surat_masuk") {	
			$a['data']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE pemilik='$ids' AND tgl_diterima >= '$tgl_start' AND tgl_diterima <= '$tgl_end' ORDER BY id")->result(); 
			$this->load->view('admin/agenda_surat_masuk', $a);
		} else if ($jenis_surat == "agenda_surat_keluar"){
			$a['data']	= $this->db->query("SELECT * FROM t_surat_keluar WHERE pemilik='$ids' AND tgl_catat >= '$tgl_start' AND tgl_catat <= '$tgl_end' ORDER BY id")->result();
			$this->load->view('admin/agenda_surat_keluar', $a);
		}else if ($jenis_surat == "agenda_arsip_internal"){
			$a['data']	= $this->db->query("SELECT * FROM t_arsipinternal WHERE pemilik='$ids' AND tgl_simpan >= '$tgl_start' AND tgl_simpan <= '$tgl_end' ORDER BY id")->result();
			$this->load->view('admin/agenda_arsip_internal', $a);
		}else if ($jenis_surat == "agenda_arsip_external"){
			$a['data']	= $this->db->query("SELECT * FROM t_arsipexternal WHERE pemilik='$ids' AND tgl_simpan >= '$tgl_start' AND tgl_simpan <= '$tgl_end' ORDER BY id")->result();
			$this->load->view('admin/agenda_arsip_external', $a);
		}else{
			$a['data']	= $this->db->query("SELECT * FROM t_arsipborang WHERE pemilik='$ids' AND tgl_simpan >= '$tgl_start' AND tgl_simpan <= '$tgl_end' ORDER BY no_borang")->result();
			$this->load->view('admin/agenda_arsip_borang', $a);
		}
	}	
	
	public function manage_admin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_mahasiswa")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/manage_admin/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));
		
		$pesan = "";

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$username				= addslashes($this->input->post('username'));
		$password				= md5(addslashes($this->input->post('password')));
		$nama					= addslashes($this->input->post('nama'));
		$jabfungsional			= addslashes($this->input->post('jabfungsional'));
		$gol					= addslashes($this->input->post('gol'));
		$tgl_lahir				= addslashes($this->input->post('tgl_lahir'));
		$tempatlahir			= addslashes($this->input->post('tempatlahir'));
		$s1						= addslashes($this->input->post('s1'));
		$s2						= addslashes($this->input->post('s2'));
		$s3						= addslashes($this->input->post('s3'));
		$jenis					= addslashes($this->input->post('jenis'));
		$bidangilmu				= addslashes($this->input->post('bidangilmu'));
		$nohp					= addslashes($this->input->post('nohp'));
		$jenis					= addslashes($this->input->post('nohp'));
		$level					= addslashes($this->input->post('level'));
		$cari					= addslashes($this->input->post('q'));

		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_mahasiswa WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/manage_admin');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_mahasiswa WHERE nama LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_manage_admin";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_manage_admin";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_mahasiswa WHERE id = '$idu'")->row();	
			$a['page']		= "f_manage_admin";
		} else if ($mau_ke == "act_add") {	
			$cek_user_exist = $this->db->query("SELECT username FROM t_mahasiswa WHERE username = '$username'")->num_rows();

			if (strlen($username) < 6) {
				$pesan = "Username Minimal 6 Huruf";
		 //$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username minimal 6 huruf</div>");
			} else if ($cek_user_exist > 0) {
				$pesan = "Username Telah Di Pakai";
				//$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username telah dipakai. Ganti yang lain..!</div>");	
			} else {
				$this->db->query("INSERT INTO t_mahasiswa VALUES (NULL, '$username', '$password', '$nama', '$unit', '$nip', '$level')");
				$pesan = "Data Telah di tambah";
			//	$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			}
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">$pesan</div>");
			redirect('index.php/admin/manage_admin');
		} else if ($mau_ke == "act_edt") {
			if ($password = md5("-")) {
				$this->db->query("UPDATE t_mahasiswa SET username = '$username', nama = '$nama', unit = '$unit', nip = '$nip', level = '$level' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE t_mahasiswa SET username = '$username', password = '$password', nama = '$nama', unit = '$unit', nip = '$nip', level = '$level' WHERE id = '$idp'");
			}
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated </div>");			
			redirect('index.php/admin/manage_admin');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_mahasiswa LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_manage_admin";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	
	public function manage_unit() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_unit")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/manage_unit/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));
		
		$pesan = "";

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$unit				= addslashes($this->input->post('unit'));
;
		$penanggungjawab					= addslashes($this->input->post('penanggungjawab'));
	
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_unit WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/manage_unit');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_unit WHERE penanggungjawab LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_manage_unit";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_manage_unit";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_unit WHERE id = '$idu'")->row();	
			$a['page']		= "f_manage_unit";
		} else if ($mau_ke == "act_add") {	
			$cek_user_exist = $this->db->query("SELECT unit FROM t_unit WHERE unit = '$unit'")->num_rows();

			if (strlen($unit) < 6) {
				$pesan = "unit Minimal 6 Huruf";
		 //$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">unit minimal 6 huruf</div>");
			} else if ($cek_user_exist > 0) {
				$pesan = "unit Telah Di Pakai";
				//$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">unit telah dipakai. Ganti yang lain..!</div>");	
			} else {
				$this->db->query("INSERT INTO t_unit VALUES (NULL, '$unit','$penanggungjawab')");
				$pesan = "Data Telah di tambah";
			//	$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			}
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">$pesan</div>");
			redirect('index.php/admin/manage_unit');
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE t_unit SET unit = '$unit', penanggungjawab = '$penanggungjawab' WHERE id = '$idp'");
					
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated </div>");			
			redirect('index.php/admin/manage_unit');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_unit LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_manage_unit";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	
	

	public function get_klasifikasi() {
		$kode 				= $this->input->post('kode',TRUE);
		
		$data 				=  $this->db->query("SELECT id, kode, nama FROM ref_klasifikasi WHERE kode LIKE '%$kode%' ORDER BY id ASC")->result();
		
		$klasifikasi 		=  array();
        foreach ($data as $d) {
			$json_array				= array();
            $json_array['value']	= $d->kode;
			$json_array['label']	= $d->kode." - ".$d->nama;
			$klasifikasi[] 			= $json_array;
		}
		
		echo json_encode($klasifikasi);
	}
	
	public function get_instansi_lain() {
		$kode 				= $this->input->post('dari',TRUE);
		
		$data 				=  $this->db->query("SELECT dari FROM t_surat_masuk WHERE dari LIKE '%$kode%' GROUP BY dari")->result();
		
		$klasifikasi 		=  array();
        foreach ($data as $d) {
			$klasifikasi[] 	= $d->dari;
		}
		
		echo json_encode($klasifikasi);
	}
	
	public function disposisi_cetak() {
		$idu = $this->uri->segment(3);
		$a['datpil1']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE id = '$idu'")->row();	
		$a['datpil2']	= $this->db->query("SELECT kpd_yth FROM t_disposisi WHERE id_surat = '$idu'")->result();	
		$a['datpil3']	= $this->db->query("SELECT isi_disposisi, sifat, batas_waktu FROM t_disposisi WHERE id_surat = '$idu'")->result();	
		$this->load->view('admin/f_disposisi', $a);
	}
	
	public function passwod() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		$ke				= $this->uri->segment(3);
		$id_user		= $this->session->userdata('admin_id');
		
		//var post
		$p1				= md5($this->input->post('p1'));
		$p2				= md5($this->input->post('p2'));
		$p3				= md5($this->input->post('p3'));
		
		if ($ke == "simpan") {
			$cek_password_lama	= $this->db->query("SELECT password FROM t_mahasiswa WHERE id = $id_user")->row();
			//echo 
			
			if ($cek_password_lama->password != $p1) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Lama tidak sama</div>');
				redirect('index.php/admin/passwod');
			} else if ($p2 != $p3) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Baru 1 dan 2 tidak cocok</div>');
				redirect('index.php/admin/passwod');
			} else {
				$this->db->query("UPDATE t_mahasiswa SET password = '$p3' WHERE id = ".$id_user."");
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-success">Password berhasil diperbaharui</div>');
				redirect('index.php/admin/passwod');
			}
		} else {
			$a['page']	= "f_passwod";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//login
	public function login() {
		$this->load->view('admin/login');
	}
	
	public function do_login() {
		$u 		= $this->security->xss_clean($this->input->post('u'));
        $p 		= md5($this->security->xss_clean($this->input->post('p')));
		
		$q_cek	= $this->db->query("SELECT * FROM t_adminapps WHERE username = '".$u."' AND password = '".$p."'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
            $data = array(
                  //  'admin_id' => $d_cek->id,
                    'admin_user' => $d_cek->username,
                    'admin_nama' => $d_cek->nama,
					'admin_pass' => $d_cek->password,
				//	'admin_unit' => $d_cek->unit,
				//	'admin_nidn' => $d_cek->nidn,
					'admin_prodi' => $d_cek->kdprodi_user,
					//'admin_beasiswa' => $d_cek->beasiswa,
				//	'admin_nope' => $d_cek->nohp,
                 'admin_level' => $d_cek->level,
					'admin_valid' => true
                    );
            $this->session->set_userdata($data);
            redirect('index.php/admin');
        } else {	
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">username or password is not valid</div>");
			redirect('index.php/admin/login');
		}
	}
	

	///--------------------------------------------- Aplikasi Penggajian --------------------\\\
    //--------------------------------------------- Aplikasi Penggajian -----------------------------------------

    public function master_honor() {
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
            redirect("index.php/admin/login");
        }

        /* pagination */
        $total_row		= $this->db->query("SELECT * FROM perkiraan WHERE kategori= 'Unfix'")->num_rows();
        $per_page		= 10;

        $awal	= $this->uri->segment(4);
        $awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

        //if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
        $akhir	= $per_page;

        $a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/master_honor/p");

        //ambil variabel URL
        $mau_ke					= $this->uri->segment(3);
        $idu					= $this->uri->segment(4);


        $cari					= addslashes($this->input->post('q'));

        //ambil variabel Postingan
        $id					= addslashes($this->input->post('id'));
        //$kode 				= addslashes($this->input->post('kode'));
        $nama 				= addslashes($this->input->post('nama'));
        $aktif 				= addslashes($this->input->post('aktif'));
        $jenis 				= addslashes($this->input->post('jenis'));

        if ($mau_ke == "del") {
            $this->db->query("DELETE FROM perkiraan WHERE id = '$idu'");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
            redirect('index.php/admin/master_honor');
        } else if ($mau_ke == "cari") {
            $a['data']		= $this->db->query("SELECT * FROM perkiraan WHERE kode LIKE '%$cari%' OR nama LIKE '%$cari%' ORDER BY id DESC")->result();
            $a['page']		= "l_honor";
        } else if ($mau_ke == "add") {
            $a['page']		= "f_honor";

        } else if ($mau_ke == "edt") {
            $a['datpil']	= $this->db->query("SELECT * FROM perkiraan WHERE id = '$idu'")->row();
            $a['page']		= "f_honor";
        } else if ($mau_ke == "act_add") {

            $this->db->query("INSERT INTO perkiraan VALUES (NULL,'$nama','$aktif','Unfix','$jenis')");

            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
            redirect('index.php/admin/master_honor');

        } else if ($mau_ke == "act_edt") {
            $this->db->query("UPDATE perkiraan SET nama = '$nama', aktif = '$aktif', jenis='$jenis' WHERE id = '$id '");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been update</div>");
            redirect('index.php/admin/master_honor');
        } else {
            $a['data']		= $this->db->query("SELECT * FROM perkiraan WHERE kategori= 'Unfix' ORDER BY id DESC LIMIT $awal, $akhir  ")->result();
            $a['page']		= "l_honor";
        }

        $this->load->view('admin/aaa', $a);
    }

    public function master_jabatan() {
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
            redirect("index.php/admin/login");
        }

        /* pagination */
        $total_row		= $this->db->query("SELECT * FROM jabatan")->num_rows();
        $per_page		= 10;

        $awal	= $this->uri->segment(4);
        $awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

        //if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
        $akhir	= $per_page;

        $a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/master_jabatan/p");

        //ambil variabel URL
        $mau_ke					= $this->uri->segment(3);
        $idu					= $this->uri->segment(4);


        $cari					= addslashes($this->input->post('q'));

        //ambil variabel Postingan
        $id					= addslashes($this->input->post('id'));
        $nama 				= addslashes($this->input->post('nama'));
        $jenis 			    = addslashes($this->input->post('jenis'));
        $aktif 				= addslashes($this->input->post('aktif'));

        if ($mau_ke == "del") {
            $this->db->query("DELETE FROM jabatan WHERE id = '$idu'");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
            redirect('index.php/admin/master_jabatan');
        } else if ($mau_ke == "cari") {
            $a['data']		= $this->db->query("SELECT * FROM jabatan WHERE nama_jabatan LIKE '%$cari%' ORDER BY id DESC")->result();
            $a['page']		= "l_jabatan";
        } else if ($mau_ke == "add") {
            $a['page']		= "f_jabatan";

        } else if ($mau_ke == "edt") {
            $a['datpil']	= $this->db->query("SELECT * FROM jabatan WHERE id = '$idu'")->row();
            $a['page']		= "f_jabatan";
        } else if ($mau_ke == "act_add") {

            $this->db->query("INSERT INTO jabatan VALUES (NULL,'$nama','$jenis','$aktif')");

            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
            redirect('index.php/admin/master_jabatan');

        } else if ($mau_ke == "act_edt") {
            $this->db->query("UPDATE jabatan SET nama_jabatan = '$nama', jenis ='$jenis', aktif = '$aktif' WHERE id = '$id '");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been update</div>");
            redirect('index.php/admin/master_jabatan');
        } else {
            $a['data']		= $this->db->query("SELECT * FROM jabatan ORDER BY id DESC LIMIT $awal, $akhir  ")->result();
            $a['page']		= "l_jabatan";
        }

        $this->load->view('admin/aaa', $a);
    }

    public function master_karyawan() {
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
            redirect("index.php/admin/login");
        }

        /* pagination */
        $total_row		= $this->db->query("SELECT * FROM karyawan")->num_rows();
        $per_page		= 10;

        $awal	= $this->uri->segment(4);
        $awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

        //if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
        $akhir	= $per_page;

        $a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/master_karyawan/p");

        //ambil variabel URL
        $mau_ke					= $this->uri->segment(3);
        $idu					= $this->uri->segment(4);


        $cari					= addslashes($this->input->post('q'));

        //ambil variabel Postingan
        $id					= addslashes($this->input->post('id'));
        $nik                = addslashes($this->input->post('nik'));
        $idJabatan			= addslashes($this->input->post('idJabatan'));
        $nama 				= addslashes($this->input->post('nama'));
        $alamat 			= addslashes($this->input->post('alamat'));
        $noTelp 			= addslashes($this->input->post('notelp'));
        $jk 			    = addslashes($this->input->post('jk'));
        $jenjangAkademik    = addslashes($this->input->post('ja'));
        $noRek              = addslashes($this->input->post('norek'));
        $tempatLahir 		= addslashes($this->input->post('tempatLahir'));
        $tglLahir 			= addslashes($this->input->post('tglLahir'));
        $email 			    = addslashes($this->input->post('email'));
        $pendidikan 		= addslashes($this->input->post('pendidikan'));
        $status      		= addslashes($this->input->post('status'));

        if ($mau_ke == "del") {
            $this->db->query("DELETE FROM karyawan WHERE id = '$idu'");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
            redirect('index.php/admin/master_karyawan');
        } else if ($mau_ke == "cari") {
            $a['data']		= $this->db->query("SELECT k.*, j.nama AS nama_jabatan FROM karyawan AS k LEFT JOIN jabatan AS j ON k.id_jabatan = j.id WHERE k.nama LIKE '%$cari%' ORDER BY id DESC")->result();
            $a['page']		= "l_karyawan";
        } else if ($mau_ke == "add") {
            $a['page']		= "f_karyawan";

        } else if ($mau_ke == "edt") {
            $a['datpil']	= $this->db->query("SELECT * FROM karyawan WHERE id = '$idu'")->row();
            $a['page']		= "f_karyawan";
        } else if ($mau_ke == "act_add") {

            $this->db->query("INSERT INTO karyawan VALUES (NULL,'$nik','$idJabatan','$jenjangAkademik','$status','$noRek','$nama','$alamat','$noTelp','$jk','$tempatLahir','$tglLahir','$email','$pendidikan')");

            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
            redirect('index.php/admin/master_karyawan');

        } else if ($mau_ke == "act_edt") {
            $this->db->query("UPDATE karyawan SET nik = '$nik', id_jabatan = '$idJabatan',id_jenjang = '$jenjangAkademik', status='$status' ,no_rek='$noRek', nama = '$nama', alamat = '$alamat', no_telp = '$noTelp', jk = '$jk', tempat_lahir = '$tempatLahir', tgl_lahir = '$tglLahir', email = '$email', pendidikan = '$pendidikan' WHERE id = '$id '");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been update</div>");
            redirect('index.php/admin/master_karyawan');
        } else {
            $a['data']		= $this->db->query("SELECT k.*, j.nama_jabatan AS nama_jabatan FROM karyawan AS k LEFT JOIN jabatan AS j ON k.id_jabatan = j.id ORDER BY k.id DESC LIMIT $awal, $akhir  ")->result();
            $a['page']		= "l_karyawan";
        }

        $this->load->view('admin/aaa', $a);
    }


    public function master_gaji(){
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
            redirect("index.php/admin/login");
        }

        /* pagination */
        $total_row		= $this->db->query("SELECT * FROM t_master_gajih")->num_rows();
        $per_page		= 10;

        $awal	= $this->uri->segment(4);
        $awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

        //if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
        $akhir	= $per_page;

        $a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/master_gaji/p");

        //ambil variabel URL
        $mau_ke					= $this->uri->segment(3);
        $idu					= $this->uri->segment(4);
        $niksc                  = $this->uri->segment(5);


        $cari					= addslashes($this->input->post('q'));

        //ambil variabel Postingan
        $id					= addslashes($this->input->post('id'));
        $nik                = addslashes($this->input->post('nik'));
        $gapok			    = addslashes($this->input->post('gapok'));
        $transport 			= addslashes($this->input->post('transport'));
        $uangmakan 			= addslashes($this->input->post('uangmakan'));
        $grade 			    = addslashes($this->input->post('grade'));
        $tunjaskes 			= addslashes($this->input->post('tunaskes'));
        $tunjanganFungDos 	= addslashes($this->input->post('tunFungDos'));
        $tunjanganFungKar 	= addslashes($this->input->post('tunFungKar'));
        $honorNgajar 	    = addslashes($this->input->post('honorNgajar'));
        $tunJA 		        = addslashes($this->input->post('tunJA'));
        $tunNatura 		    = addslashes($this->input->post('tunNatura'));
        $tunLain 		    = addslashes($this->input->post('tunLain'));
        $tgl                = addslashes($this->input->post('tgl'));


        if ($mau_ke == "del") {
            $this->db->query("DELETE FROM t_rincian_transaksi WHERE id_perkiraan = '41' and nik='$niksc'");
            $this->db->query("DELETE FROM t_rincian_transaksi WHERE id_perkiraan = '45' and nik='$niksc'");
            $this->db->query("DELETE FROM t_rincian_transaksi WHERE id_perkiraan = '46' and nik='$niksc'");
            $this->db->query("DELETE FROM t_rincian_transaksi WHERE id_perkiraan = '47' and nik='$niksc'");
            $this->db->query("DELETE FROM t_rincian_transaksi WHERE id_perkiraan = '48' and nik='$niksc'");
            $this->db->query("DELETE FROM t_rincian_transaksi WHERE id_perkiraan = '49' and nik='$niksc'");
            $this->db->query("DELETE FROM t_rincian_transaksi WHERE id_perkiraan = '50' and nik='$niksc'");
            $this->db->query("DELETE FROM t_rincian_transaksi WHERE id_perkiraan = '51' and nik='$niksc'");

            $this->db->query("DELETE FROM t_master_gajih WHERE id = '$idu'");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
            $a['page']		= "l_master_gaji";
        } else if ($mau_ke == "cari") {
            $a['data']		= $this->db->query("SELECT t_master_gajih.id,karyawan.nik,nama,gapok,transport,uang_makan FROM `karyawan` INNER JOIN t_master_gajih ON karyawan.nik=t_master_gajih.nik WHERE nama LIKE '%$cari%' ORDER BY id DESC")->result();
            $a['page']		= "l_master_gaji";
        } else if ($mau_ke == "add") {
             $a['page']		= "f_master_gaji";

        } else if ($mau_ke == "edt") {
            $a['datpil']	= $this->db->query("SELECT * FROM t_master_gajih WHERE id = '$idu'")->row();
            $a['page']		= "f_master_gaji";
        } else if ($mau_ke == "act_add") {

            $cekNik = $this->db->query("SELECT * FROM t_master_gajih WHERE nik = '$nik'")->row();
            if($cekNik == null){
                $this->db->query("INSERT INTO t_rincian_transaksi VALUES (NULL,41,'$gapok','$nik','$tgl'),
                                                                         (NULL,45,'$grade','$nik','$tgl'),
                                                                         (NULL,46,'$tunjaskes','$nik','$tgl'),
                                                                         (NULL,47,'$tunjanganFungDos','$nik','$tgl'),
                                                                         (NULL,48,'$tunjanganFungKar','$nik','$tgl'),
                                                                         (NULL,49,'$tunJA','$nik','$tgl'),
                                                                         (NULL,50,'$tunNatura','$nik','$tgl'),
                                                                         (NULL,51,'$tunLain','$nik','$tgl')");
                $this->db->query("INSERT INTO t_master_gajih VALUES (NULL,'$nik','$gapok','$transport','$uangmakan','$grade','$tunjaskes','$tunjanganFungDos', '$tunjanganFungKar','$honorNgajar','$tunJA','$tunNatura','$tunLain')");
                $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
                redirect('index.php/admin/master_gaji');
            }else {
                $this->session->set_userdata("k","<div class=\"alert alert-danger\" id=\"alert\">Nik sudah terdaftar dalam master gaji, silahkan periksa kembali</div>");
                $a['page']		= "f_master_gaji";
            }

        } else if ($mau_ke == "act_edt") {
            $this->db->query("UPDATE t_rincian_transaksi SET jumlah = '$gapok' WHERE id_perkiraan = '41' and nik='$nik';");
            $this->db->query("UPDATE t_rincian_transaksi SET jumlah = '$grade' WHERE id_perkiraan = '45' and nik='$nik';");
            $this->db->query("UPDATE t_rincian_transaksi SET jumlah = '$tunjaskes' WHERE id_perkiraan = '46' and nik='$nik';");
            $this->db->query("UPDATE t_rincian_transaksi SET jumlah = '$tunjanganFungDos' WHERE id_perkiraan = '47' and nik='$nik';");
            $this->db->query("UPDATE t_rincian_transaksi SET jumlah = '$tunjanganFungKar' WHERE id_perkiraan = '48' and nik='$nik';");
            $this->db->query("UPDATE t_rincian_transaksi SET jumlah = '$tunJA' WHERE id_perkiraan = '49' and nik='$nik';");
            $this->db->query("UPDATE t_rincian_transaksi SET jumlah = '$tunNatura' WHERE id_perkiraan = '50' and nik='$nik';");
            $this->db->query("UPDATE t_rincian_transaksi SET jumlah = '$tunLain' WHERE id_perkiraan = '51' and nik='$nik';");
            $this->db->query("UPDATE t_master_gajih SET nik = '$nik', gapok = '$gapok', transport = '$transport', uang_makan = '$uangmakan', grade = '$grade', tunj_askes = '$tunjaskes', tunj_fungsional_dos = '$tunjanganFungDos', tunj_fungsional_kar = '$tunjanganFungKar', honor_mengajar = '$honorNgajar', tunj_ja = '$tunJA', tunj_natura = '$tunNatura', 	tunj_lain = '$tunLain' WHERE id = '$id '");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been update</div>");
            redirect('index.php/admin/master_gaji');
        } else {
            $a['data']		= $this->db->query("SELECT t_master_gajih.id,karyawan.nik,nama,gapok,transport,uang_makan FROM `karyawan` INNER JOIN t_master_gajih ON karyawan.nik=t_master_gajih.nik  ORDER BY t_master_gajih.id DESC LIMIT $awal, $akhir  ")->result();
            $a['page']		= "l_master_gaji";
        }

        $this->load->view('admin/aaa', $a);
    }

    public function form_penggajian() {
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
            redirect("index.php/admin/login");
        }

        $a['page']	= "f_penggajian";
        $this->load->view('admin/aaa', $a);
    }

    public function form_penggajian_submit(){
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
            redirect("index.php/admin/login");
        }

        //ambil variabel URL
        $mau_ke					= $this->uri->segment(3);
        $idu					= $this->uri->segment(4);
        $bul					= $this->uri->segment(5);
        $tah					= $this->uri->segment(6);

        $iduu					= $this->uri->segment(4);
        $bull					= $this->uri->segment(5);
        $tahh					= $this->uri->segment(6);
        $id_per					= $this->uri->segment(7);



        $cari					= addslashes($this->input->post('q'));

        //variable get data
        $id					= addslashes($this->input->post('id'));
        $nik 				= addslashes($this->input->post('nik'));
        $bulan              = addslashes($this->input->post('bulan'));
        $tahun              = addslashes($this->input->post('tahun'));
        $noSlip				= addslashes($this->input->post('no_slip'));
        $nik 				= addslashes($this->input->post('nik'));
        $perkiraan          = addslashes($this->input->post('id_perkiraan'));
        $jumlah             = addslashes($this->input->post('jumlah'));



        if ($mau_ke == "config_penggajian") {

            $a['page']		= "f_config_penggajian";

        }else if($mau_ke == 'cetak_pdf'){

            $a['page']		= "f_cetak_pdf";

        }else if($mau_ke == "gaji_karyawan"){

            $a['tablewoi']	 = $this->db->query("SELECT * FROM `t_master_gajih` INNER JOIN karyawan ON t_master_gajih.nik=karyawan.nik Join jabatan ON karyawan.id_jabatan=jabatan.id")->result();
            $a['table']	     = $this->db->query("SELECT * FROM `t_master_gajih` INNER JOIN karyawan ON t_master_gajih.nik=karyawan.nik Join jabatan ON karyawan.id_jabatan=jabatan.id JOIN jumlahabsen ON jumlahabsen.nidn=t_master_gajih.nik WHERE bulan='$bulan' and tahun='$tahun'")->result();

            $a['bulana']	 = $bulan;
            $a['tahuna']	 = $tahun;
            $a['page']   = "proccess_gajian";

        }else if($mau_ke == 'proses_cetak_pdf'){

            $a['tablewoi']	 = $this->db->query("SELECT * FROM `t_master_gajih` INNER JOIN karyawan ON t_master_gajih.nik=karyawan.nik Join jabatan ON karyawan.id_jabatan=jabatan.id")->result();
            $a['table']	     = $this->db->query("SELECT * FROM `t_master_gajih` INNER JOIN karyawan ON t_master_gajih.nik=karyawan.nik Join jabatan ON karyawan.id_jabatan=jabatan.id JOIN jumlahabsen ON jumlahabsen.nidn=t_master_gajih.nik WHERE bulan='$bulan' and tahun='$tahun'")->result();
            $a['tablegajih'] = $this->db->query("SELECT karyawan.nama, transaksi_gaji.nik, transaksi_gaji.gaji_kotor, transaksi_gaji.gaji_bersih, transaksi_gaji.potongan, jabatan.nama_jabatan,transaksi_gaji.status_email FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik JOIN jabatan ON karyawan.id_jabatan=jabatan.id where transaksi_gaji.bulan='$bulan' and transaksi_gaji.tahun='$tahun' ORDER BY karyawan.nama ASC")->result();
            $a['bulana']	 = $bulan;
            $a['tahuna']	 = $tahun;
            $a['page']   = "proses_cetak_pdf";

        }else if($mau_ke == "update_penggajian"){

            $a['ambildata']	 = $this->db->query("SELECT * FROM `transaksi_gaji` WHERE nik='$idu' and bulan='$bul' and tahun='$tah'")->row();
            $a['ambildata1'] = $this->db->query("SELECT * FROM `rincian_transaksi_gaji` WHERE nik='$idu' and bulan='$bul' and tahun='$tah' and id_perkiraan='$id_per'")->row();
            $a['page']   = "prosses_update_penggajian_honor";

        }else if($mau_ke == "delete_penggajian_honor"){

            $a['ambildata']	 = $this->db->query("SELECT * FROM `transaksi_gaji` WHERE nik='$idu' and bulan='$bul' and tahun='$tah'")->row();
            $a['ambildata1'] = $this->db->query("SELECT * FROM `rincian_transaksi_gaji` INNER JOIN perkiraan ON rincian_transaksi_gaji.id_perkiraan=perkiraan.id WHERE nik='$idu' and bulan='$bul' and tahun='$tah' and id_perkiraan='$id_per'")->row();
            $a['page']   = "prosses_delete_penggajian_honor";

        }else if($mau_ke == "delete_penggajian_potongan"){

            $a['ambildata']	 = $this->db->query("SELECT * FROM `transaksi_gaji` WHERE nik='$idu' and bulan='$bul' and tahun='$tah'")->row();
            $a['ambildata1'] = $this->db->query("SELECT * FROM `rincian_potongan_gaji` INNER JOIN perkiraan ON rincian_potongan_gaji.id_perkiraan=perkiraan.id WHERE nik='$idu' and bulan='$bul' and tahun='$tah' and id_perkiraan='$id_per'")->row();

            $a['page']   = "prosses_delete_penggajian_potongan";

        }else if($mau_ke == "update_potongan"){

            $a['ambildata']	 = $this->db->query("SELECT * FROM `transaksi_gaji` WHERE nik='$idu' and bulan='$bul' and tahun='$tah'")->row();
            $a['ambildata1'] = $this->db->query("SELECT IFNULL(SUM(jumlah), 0) as totJum FROM `rincian_potongan_gaji` WHERE nik='$idu' and bulan='$bul' and tahun='$tah' and no_slip='$id_per'")->row();
            $a['ambildata2'] = $this->db->query("SELECT IFNULL(SUM(jumlah), 0) as totJum2 FROM `t_rincian_potongan_fix` WHERE nik='$idu' and bulan='$bul' AND tahun ='$tah'")->row();

            $a['page']   = "prosses_update_penggajian_potongan";

        }
        else if ($mau_ke == "inputGaji"){

            $a['datpil']	= $this->db->query("SELECT * FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik 
                                                JOIN jabatan ON karyawan.id_jabatan=jabatan.id 
                                                Join t_master_gajih ON karyawan.nik=t_master_gajih.nik
                                                WHERE karyawan.nik = '$iduu' and transaksi_gaji.bulan='$bull' and transaksi_gaji.tahun='$tahh'")->row();
            $a['datas']     = $this->db->query("SELECT * FROM `absen_karyawan` WHERE nik = '$iduu' and bulan='$bull' and tahun='$tahh'")->row();
            $a['page']		= "f_penggajian_submit";

        }else if($mau_ke == 'send_email_pdf'){

            $datpil	= $this->db->query("SELECT * FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik 
                                                JOIN jabatan ON karyawan.id_jabatan=jabatan.id 
                                                Join t_master_gajih ON karyawan.nik=t_master_gajih.nik
                                                WHERE karyawan.nik = '$iduu' and transaksi_gaji.bulan='$bull' and transaksi_gaji.tahun='$tahh'")->row();
            $kar       = $this->db->query("SELECT * FROM `karyawan` where nik ='$nik'")->row();

            $nik                = $datpil->nik;
            $nama               = $datpil->nama;
            $bulan              = $datpil->bulan;
            $tahun              = $datpil->tahun;
            $email              = $datpil->email;
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
            $ci->email->from('ramadhand250@gmail.com', 'Biro Administrasi Keuangan');
            $list = array($email);
            $ci->email->to($list);
            $this->email->reply_to($email, 'Explendid Videos');
            $ci->email->subject('Slip Gaji Bulan '.$bulan.' '.$tahun);
            $msg = "Dosen dan Karyawan yang terhormat,"."</br>"."Terlampir Slip Gaji Bpk/Ibu/Sdr/i, silahkan download bukti slip gaji Anda, untuk membukanya gunakan password tanggal lahir Anda."."</br>".
                    "Format Password = ddmmyyyy "."</br>"."Contoh = 16 Desember 1979, maka passwordnya = 16121979 "."</br>"."Segera konfirmasi (Wajib) dengan cara membalas E-mail sebagai bukti slip gaji sudah dilihat, agar Gaji bisa di transfer."."</br>".
                    " Autoreplay tidak diperkenakan."."</br>"." Kami memahami kesibukan Bapak/Ibu, namun untuk menghindari gaji tidak ditransfer maka kami mohon Bapak/Ibu dapat meluangkan waktu untuk membalas E-mail ini."."</br>"." Terimakasih atas perhatian dan kerjasamanya."."</br> Hormat Kami,
                    Biro Administrasi Keuangan";
            $ci->email->message($msg);
            $basepath = $_SERVER['DOCUMENT_ROOT'].'/adminapps/upload/slip_pdf/'.$bulan.'-'.$tahun.'/'.$nik.'-'.$nama.'-'.$bulan.'-'.$tahun.'.pdf';
            $this->email->attach($basepath);
            if($ci->email->send()){
                $this->db->query("UPDATE transaksi_gaji SET status_email = 'Terkirim' WHERE nik = '$nik' and bulan='$bulan' and tahun='$tahun'");
                echo "<script>window.close();</script>";
            }else{
                $this->db->query("UPDATE transaksi_gaji SET status_email = 'Gagal Terkirim' WHERE nik = '$nik' and bulan='$bulan' and tahun='$tahun'");
                echo "<script>window.close();</script>";
            }
        }else if($mau_ke == 'view_slip'){
            $this->load->library('Pdf');

            $datpil	= $this->db->query("SELECT * FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik 
                                                JOIN jabatan ON karyawan.id_jabatan=jabatan.id 
                                                Join t_master_gajih ON karyawan.nik=t_master_gajih.nik
                                                WHERE karyawan.nik = '$iduu' and transaksi_gaji.bulan='$bull' and transaksi_gaji.tahun='$tahh'")->row();
            $datas     = $this->db->query("SELECT * FROM `absen_karyawan` WHERE nik = '$iduu' and bulan='$bull' and tahun='$tahh'")->row();
            $kar       = $this->db->query("SELECT * FROM `karyawan` where nik ='$iduu'")->row();
            ob_start();
            $id					= $datpil->id;
            $nik                = $datpil->nik;
            $nama               = $datpil->nama;
            $jabatan			= $datpil->nama_jabatan;
            $gapok			    = $datpil->gapok;
            $transport          = $datpil->transport;
            $uangMakan          = $datpil->uang_makan;
            $honorNgajar        = $datpil->honor_mengajar;
            $grade              = $datpil->grade;
            $tunjAskes          = $datpil->tunj_askes;
            $tunFungdos         = $datpil->tunj_fungsional_dos;
            $tunFungKar         = $datpil->tunj_fungsional_kar;
            $tunjJa             = $datpil->tunj_ja;
            $tunjNatura         = $datpil->tunj_natura;
            $tunjLain           = $datpil->tunj_lain;
            $kotor              = $datpil->gaji_kotor;
            $potongan           = $datpil->potongan;
            $bersih             = $datpil->gaji_bersih;
            $noSlip             = $datpil->no_slip;
            $bulan              = $datpil->bulan;
            $tahun              = $datpil->tahun;
            $tglGajian          = $datpil->tgl_gaji;
            $tglLahir           = $kar->tgl_lahir;

            $idJA               = $datpil->id_jenjang;
            $queryJabataAkadeik = $this->db->query("SELECT nama_jabatan FROM `jabatan` where id ='$idJA'")->row();

            if($datas == null){
                $jumlah_absen_kar   = 0;
                $hitTransport = 0;
                $hitUangMkn= 0;
            }else{
                $jumlah_absen_kar   = $datas->jumlah_hadir;
                $hitTransport       = $transport * $jumlah_absen_kar;
                $hitUangMkn         = $uangMakan * $jumlah_absen_kar;
            }
            $tgl                = date('d-m-Y');
            $tglslip            = date('dmY');


            $totalk = $datpil->absen_ngajar;

            $hitHonorNgajar = $honorNgajar * $totalk;

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Dwi Romadon S.Kom');
            $pdf->SetTitle(''.$nik.'-'.$nama.'-'.$bulan.'-'.$tahun.'');
            $pdf->SetSubject('Slip Gaji');
            $pdf->SetKeywords('slip Gaji');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            $splitData = explode("-",$tglLahir);

            //$pdf->SetProtection(array('print', 'copy','modify'), ''.$splitData[1].''.$splitData[2].''.$splitData[0].'', ''.$splitData[1].''.$splitData[2].''.$splitData[0].'', 0, null);

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
                       <h4>Slip honor/gaji untuk bulan '.$bulan.' '.$tahun.'</h4>
                   </div>
                   <table cellspacing="1" cellpadding="2">
                        <tr>
                            <td>Bandar Lampung, '.$tglGajian.'</td>
                            <td>Jabatan : '.$jabatan.'</td>
                        </tr>
                        <tr>
                            <td>NIK : '.$nik.'</td>
                            <td>Jabatan Akademik : '.$queryJabataAkadeik->nama_jabatan.'</td>
                        </tr>
                        <tr>
                             <td>Nama : '.$nama.'</td>
                            <td>Honor Mengajar/jam: Rp. '.number_format($honorNgajar, 0,".",",").'</td>
                          
                            </tr>
                        <tr>
                            <td>Jumlah Hadir Mengajar : '.$totalk.'</td>
                            <td>Honor Kehadiran/hari: Rp. '.number_format($transport, 0,".",",").'</td>
                            
                        </tr>
                        <tr>
                            <td>Jumlah Hari Bekerja : '.$jumlah_absen_kar.'</td>
                            <td>Uang Makan/hari: Rp. '.number_format($uangMakan, 0,".",",").'</td>
                            
                        </tr>
                   </table><br><br/>
                        <table width="185%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                            <tr bgcolor="#ffffff">
                                <td width="25%" align="center"><span style="font-weight:bold">Nama honor/potongan</span></td>
                                <td width="25%" align="center"><span style="font-weight:bold">Jumlah</span></td>
                            </tr>';

            $html.='<tr bgcolor="#ffffff">
                                <td>Gaji Pokok</td>
                                <td>Rp. '.number_format($gapok, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Grade</td>
                                <td>Rp. '.number_format($grade, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Askes</td>
                                <td>Rp. '.number_format($tunjAskes, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Funsional Dosen</td>
                                <td>Rp. '.number_format($tunFungdos, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Fungsional Karyawan</td>
                                <td>Rp. '.number_format($tunFungKar, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Transport</td>
                                <td>Rp. '.number_format($hitTransport, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Jumlah Uang Makan</td>
                                <td>Rp. '.number_format($hitUangMkn, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Honor Memberi Kuliah</td>
                                <td>Rp. '.number_format($hitHonorNgajar, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Jenjang Akademik</td>
                                <td>Rp. '.number_format($tunjJa, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Natura</td>
                                <td>Rp. '.number_format($tunjNatura, 0,".",",").'</td>
                   </tr>
                   <tr bgcolor="#ffffff">
                                <td>Tunjangan Lain-Lain</td>
                                <td>Rp. '.number_format($tunjLain, 0,".",",").'</td>
                   </tr>
                   </table>';
            $tblhonor = $this->db->query("Select * From perkiraan INNER JOIN rincian_transaksi_gaji On 
                                             perkiraan.id=rincian_transaksi_gaji.id_perkiraan where 
                                             rincian_transaksi_gaji.no_slip='$noSlip' and rincian_transaksi_gaji.nik ='$nik' 
                                             and rincian_transaksi_gaji.bulan = '$bulan' and rincian_transaksi_gaji.tahun = '$tahun'")->result();

            if($tblhonor != null){
                $html.='<table width="92.7%" style="margin-top: 155px" cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                                <td align="center"><span style="font-weight:bold">Honor Tambahan</span></td>
                                <td>-</td>
                        </tr>
                        </table>';
            }

            foreach ($tblhonor as $b){

                $html.='<table width="92.7%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                                <td>'.$b->nama.'</td>
                                <td>Rp. '.number_format($b->jumlah, 0,".",",").'</td>
                        </tr>
                        </table>
                        ';

            }

            $tblpotongan = $this->db->query("Select * From perkiraan INNER JOIN rincian_potongan_gaji On 
                                             perkiraan.id=rincian_potongan_gaji.id_perkiraan where 
                                             rincian_potongan_gaji.no_slip='$noSlip' and rincian_potongan_gaji.nik ='$nik' 
                                             and rincian_potongan_gaji.bulan = '$bulan' and rincian_potongan_gaji.tahun = '$tahun'")->result();

            if($tblpotongan != null){
                $html.='<table width="92.7%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                                    <td align="center"><span style="font-weight:bold">Potongan</span></td>
                                    <td>-</td>
                            </tr>
                        </table>';
            }

            foreach ($tblpotongan as $b){

                $html.='<table width="92.7%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                                <td>'.$b->nama.'</td>
                                <td>Rp. '.number_format($b->jumlah, 0,".",",").'</td>
                        </tr>
                        </table>
                        ';
            }
            $html.='<table width="92.7%" cellspacing="1" bgcolor="#666666" cellpadding="2">
                    <tr bgcolor="#ffffff">
                                <td align="center"><span style="font-weight:bold">Total</span></td>
                                <td>-</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                                <td>Penerimaan Kotor</td>
                                <td>Rp. '.number_format($kotor, 0,".",",").'</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                                <td>Jumlah Potongan</td>
                                <td>Rp. '.number_format($potongan, 0,".",",").'</td>
                        </tr>
                        <tr bgcolor="#ffffff">
                                <td>Penerimaan Bersih</td>
                                <td>Rp. '.number_format($bersih, 0,".",",").'</td>
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
                                <td>'.$nama.'</td>
                        </tr>
                       
                    </table>';

            $pdf->writeHTML($html, true, false, true, false, '');
            ob_clean();
            $pdf->Output($nik.'-'.$nama.'-'.$bulan.'-'.$tahun.'.pdf', 'I');
            exit;
        }else if($mau_ke == 'cari'){
            $a['tablegajih'] = $this->db->query("SELECT * FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik JOIN jabatan ON karyawan.id_jabatan=jabatan.id where nama LIKE '%$cari%' and bulan='$bulan' and tahun='$tahun'")->result();
            $a['bulana']	 = $bulan;
            $a['tahuna']	 = $tahun;
            $a['page']       = "l_tbl_gaji";
        }else if($mau_ke == 'cari_slip'){
            $a['tablegajih'] = $this->db->query("SELECT * FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik JOIN jabatan ON karyawan.id_jabatan=jabatan.id where nama LIKE '%$cari%' and bulan='$bulan' and tahun='$tahun'")->result();
            $a['bulana']	 = $bulan;
            $a['tahuna']	 = $tahun;
            $a['page']       = "proses_cetak_pdf";
        }else if($mau_ke == 'inputhonor'){

            $a['data'] = $this->db->query("Select * From perkiraan Where kategori = 'Unfix' and aktif='Y' and jenis='Honor'")->result();
            $a['page'] = "f_input_honor";

        }else if($mau_ke == 'inputpotongan'){
            $a['data'] = $this->db->query("Select * From perkiraan Where kategori = 'Unfix' and aktif='Y' and jenis='Potongan'")->result();
            $a['page'] = "f_input_potongan";

        }else if($mau_ke == 'act_save'){
            $q_cekk1	    = $this->db->query("SELECT * FROM `rincian_transaksi_gaji` 
                                        WHERE nik='$nik' and bulan='$bulan' and tahun='$tahun' and id_perkiraan='$perkiraan'");
            $j_cekk1	    = $q_cekk1->num_rows();
            $d_cekk1	    = $q_cekk1->row();

            if($j_cekk1 == 1){
                echo '<script>alert("Honor ini sudah diinput");window.location="inputGaji/'.$nik.'/'.$bulan.'/'.$tahun.'";</script>';
                //redirect('index.php/admin/form_penggajian_submit/inputGaji/'.$nik.'/'.$bulan.'/'.$tahun.'');
            }else{
                $this->db->query("INSERT INTO rincian_transaksi_gaji VALUES (NULL,'$noSlip','$nik','$perkiraan','$jumlah','$bulan','$tahun')");
                $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
                redirect('index.php/admin/form_penggajian_submit/update_penggajian/'.$_POST['nik'].'/'.$_POST['bulan'].'/'.$_POST['tahun'].'/'.$_POST['id_perkiraan'].'');
            }
        }else if($mau_ke == 'act_save_potongan'){
            $q_cekk1	    = $this->db->query("SELECT * FROM `rincian_potongan_gaji` 
                                        WHERE nik='$nik' and bulan='$bulan' and tahun='$tahun' and id_perkiraan='$perkiraan'");
            $j_cekk1	    = $q_cekk1->num_rows();
            $d_cekk1	    = $q_cekk1->row();

            if($j_cekk1 == 1){
                echo '<script>alert("Potongan ini sudah diinput");window.location="inputGaji/'.$nik.'/'.$bulan.'/'.$tahun.'";</script>';
            }else{
                $this->db->query("INSERT INTO rincian_potongan_gaji VALUES (NULL,'$noSlip','$nik','$perkiraan','$jumlah','$bulan','$tahun')");
                $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
                redirect('index.php/admin/form_penggajian_submit/update_potongan/'.$_POST['nik'].'/'.$_POST['bulan'].'/'.$_POST['tahun'].'/'.$_POST['no_slip'].'');
            }
        } else if($mau_ke == 'table_gaji'){
            $a['bulana']	 = $bulan;
            $a['tahuna']	 = $tahun;
            $a['tablegajih'] = $this->db->query("SELECT * FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik JOIN jabatan ON karyawan.id_jabatan=jabatan.id where bulan='$bulan' and tahun='$tahun' ORDER BY karyawan.nama ASC ")->result();
            $a['page']       = "l_tbl_gaji";
        }else if($mau_ke == 'kirim_email'){
            $a['page']		= "f_kirim_email";
        } else{
            $a['tablegajih'] = $this->db->query("SELECT * FROM transaksi_gaji INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik JOIN jabatan ON karyawan.id_jabatan=jabatan.id where bulan='$bulan' and tahun='$tahun' ORDER BY karyawan.nama ASC ")->result();
            $a['bulana']	 = $bulan;
            $a['tahuna']	 = $tahun;
            $a['page']		= "l_tbl_gaji";
        }

        $this->load->view('admin/aaa', $a);
    }

    public function export_excel(){
	    $a['page'] = "f_export_excel_bank";
	    $this->load->view('admin/aaa', $a);
    }

    public function input_absen_karyawan(){
	    $a['page'] = "f_import_absen_kar";
        $this->load->view('admin/aaa', $a);
    }



    public function upload(){
        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=6; $row<=$highestRow; $row++)
                {
                    $nik = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $jumlah_hadir = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $bulan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $tahun = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $data[] = array(
                        'nik'		        =>	$nik,
                        'jumlah_hadir'		=>	$jumlah_hadir,
                        'bulan'				=>	$bulan,
                        'tahun'		        =>	$tahun
                    );
                }
            }

            $q_cekk1	= $this->db->query("SELECT *  FROM absen_karyawan where nik ='$nik' and bulan='$bulan' and tahun= '$tahun'");
            $j_cekk1	= $q_cekk1->num_rows();
            $d_cekk1	= $q_cekk1->row();

            if($j_cekk1 == 1){
                echo '<script>alert("Data Absen Karyawan Pada bulan ini sudah di import"); window.location= "input_absen_karyawan";</script>';
            }else {
                $this->test_model->insert($data);
                echo '<script>alert("Berhasil"); window.location= "input_absen_karyawan";</script>';
            }
        }else{
            echo 'Gagal';
        }
    }

    public function manage_absen_karyawan(){
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
            redirect("index.php/admin/login");
        }


        /* pagination */
        $total_row		= $this->db->query("SELECT karyawan.nik, karyawan.nama, absen_karyawan.jumlah_hadir FROM `absen_karyawan` INNER JOIN karyawan ON karyawan.nik=absen_karyawan.nik WHERE bulan='Agustus' and tahun='2018' ORDER BY nama ASC")->num_rows();
        $per_page		= 10;

        $awal	= $this->uri->segment(3);
        $awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

        //if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
        $akhir	= $per_page;

        $a['pagi']	= _page($total_row, $per_page, 3, base_url()."index.php/admin/manage_absen_karyawan/");


        //ambil variabel URL
        $mau_ke					= $this->uri->segment(3);
        $idu					= $this->uri->segment(4);
        $nikk					= $this->uri->segment(4);
        $bulann					= $this->uri->segment(5);
        $tahunn 				= $this->uri->segment(6);


        $cari					= addslashes($this->input->post('q'));

        //ambil variabel Postingan
        $id					   = addslashes($this->input->post('id'));
        $bulan				   = addslashes($this->input->post('bulan'));
        $tahun 			       = addslashes($this->input->post('tahun'));
        $nik 			       = addslashes($this->input->post('nik'));
        $jmlhhadir 			   = addslashes($this->input->post('jumlah_hadir'));

        if ($mau_ke == "del") {
            $this->db->query("DELETE FROM absen_karyawan WHERE nik = '$nikk' and bulan='$bulann' and tahun='$tahunn'");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil di hapus </div>");
            redirect('index.php/admin/manage_absen_karyawan/');
        } else if ($mau_ke == "cari") {
            $a['bulana']    = $bulan;
            $a['tahuna']    = $tahun;
            $a['data']		= $this->db->query("SELECT karyawan.nik, karyawan.nama, absen_karyawan.jumlah_hadir FROM `absen_karyawan` INNER JOIN karyawan ON karyawan.nik=absen_karyawan.nik WHERE  karyawan.nama LIKE '%$cari%' and bulan='$bulan' and tahun='$tahun' ORDER BY karyawan.nama DESC")->result();
            $a['page']		= "l_absen_karyawan";
        } else if ($mau_ke == "add") {
            $a['page']		= "f_jabatan";

        } else if ($mau_ke == "edt") {
            $a['bulana']    = $bulann;
            $a['tahuna']    = $tahunn;
            $a['datpil']	= $this->db->query("SELECT karyawan.nik, karyawan.nama, absen_karyawan.jumlah_hadir FROM `absen_karyawan` INNER JOIN karyawan ON karyawan.nik=absen_karyawan.nik WHERE karyawan.nik='$nikk' and bulan='$bulann' and tahun='$tahunn'")->row();
            $a['page']		= "f_absen_karyawan";
        } else if ($mau_ke == "act_edt") {

            $this->db->query("UPDATE absen_karyawan SET jumlah_hadir = '$jmlhhadir' WHERE nik = '$nik' and bulan='$bulan' and tahun='$tahun'");
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Berhasil ubah data</div>");
            redirect('index.php/admin/manage_absen_karyawan/edt/'.$nik.'/'.$bulan.'/'.$tahun);

        } else {
            $a['bulana']    = $bulan;
            $a['tahuna']    = $tahun;

            $a['data']		= $this->db->query("SELECT karyawan.nik, karyawan.nama, absen_karyawan.jumlah_hadir FROM `absen_karyawan` INNER JOIN karyawan ON karyawan.nik=absen_karyawan.nik WHERE bulan='$bulan' and tahun='$tahun' ORDER BY nama ASC LIMIT $awal, $akhir  ")->result();
            $a['page']		= "l_absen_karyawan";
        }

        $this->load->view('admin/aaa', $a);
    }

     public function setPotonganFix(){

         if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
             redirect("index.php/admin/login");
         }

         /* pagination */
         $total_row		= $this->db->query("SELECT * FROM t_master_potongan")->num_rows();
         $per_page		= 10;

         $awal	= $this->uri->segment(4);
         $awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

         //if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
         $akhir	= $per_page;

         $a['pagi']	= _page($total_row, $per_page, 4, base_url()."index.php/admin/setPotonganFix/p");

         //ambil variabel URL
         $mau_ke				= $this->uri->segment(3);
         $idu					= $this->uri->segment(4);
         $nikk					= $this->uri->segment(4);

         $cari					= addslashes($this->input->post('q'));

         //ambil variabel Postingan
         $id					        = addslashes($this->input->post('id'));
         $nik 				            = addslashes($this->input->post('nik'));
         $jumQurban 				    = addslashes($this->input->post('jumkurban'));
         $angQurban 				    = addslashes($this->input->post('angkurban'));
         $jumKreBank 				    = addslashes($this->input->post('jumkrebank'));
         $angKreBank 				    = addslashes($this->input->post('angkrebank'));
         $jumKasbon     			    = addslashes($this->input->post('jumkasbon'));
         $angKasbon     			    = addslashes($this->input->post('angkasbon'));
         $jumKoprasiKredit 			    = addslashes($this->input->post('jumkoprasikredit'));
         $angKoprasiKredit 			    = addslashes($this->input->post('angkoprasikredit'));
         $jumKoprasiPokok 			    = addslashes($this->input->post('jumkoprasipokok'));
         $jumNatura      			    = addslashes($this->input->post('jumnatura'));
         $jumTht 	        		    = addslashes($this->input->post('jumtht'));
         $jumAskes 	        		    = addslashes($this->input->post('jumaskes'));
         $bulan 	        		    = addslashes($this->input->post('bulan'));
         $tahun 	        		    = addslashes($this->input->post('tahun'));
         $angsuranke                    = addslashes($this->input->post('angsuranke'));
         $jumlahYgdibayar               = addslashes($this->input->post('jumlahygdibayar'));


         if ($mau_ke == "del") {
             $this->db->query("DELETE FROM t_master_potongan WHERE nik = '$nikk'");
             $this->db->query("DELETE FROM t_pot_qurban WHERE nik = '$nikk'");
             $this->db->query("DELETE FROM t_pot_kredit_bank WHERE nik = '$nikk'");
             $this->db->query("DELETE FROM t_pot_kop_kredit WHERE nik = '$nikk'");
             $this->db->query("DELETE FROM t_pot_kasbon WHERE nik = '$nikk'");
             $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
             redirect('index.php/admin/setPotonganFix');
         } else if ($mau_ke == "cari") {
             $a['data']		= $this->db->query("SELECT karyawan.nik, karyawan.nama, t_master_potongan.p_kop_pokok, t_master_potongan.p_natura, t_master_potongan.p_tht, t_master_potongan.p_askes, t_pot_qurban.jumlah as jumpotqur, t_pot_kredit_bank.jumlah as jumpotkrebank, t_pot_kop_kredit.jumlah as jumpotkopkre, t_pot_kasbon.jumlah as jumpotkasbon FROM karyawan JOIN t_master_potongan ON karyawan.nik = t_master_potongan.nik JOIN t_pot_qurban ON karyawan.nik = t_pot_qurban.nik JOIN t_pot_kredit_bank ON karyawan.nik = t_pot_kredit_bank.nik JOIN t_pot_kop_kredit ON karyawan.nik = t_pot_kop_kredit.nik JOIN t_pot_kasbon ON karyawan.nik = t_pot_kasbon.nik  WHERE nama LIKE '%$cari%' ORDER BY nama ASC")->result();
             $a['page']		= "l_potongan_fix";
         } else if ($mau_ke == "add") {
             $a['page']		= "f_potongan_fix";

         } else if ($mau_ke == "edt") {
             $a['datpil']	= $this->db->query("SELECT karyawan.nik, karyawan.nama, t_master_potongan.p_kop_pokok, 
                               t_master_potongan.p_natura, t_master_potongan.p_tht, t_master_potongan.p_askes, 
                               t_pot_qurban.jumlah as jumpotqur, t_pot_qurban.lama_angsuran as lama_angsuran_qurban,
                               t_pot_kredit_bank.jumlah as jumpotkrebank, t_pot_kredit_bank.lama_angsuran as 
                               lama_ang_kre_bank, t_pot_kop_kredit.jumlah as jumpotkopkre, t_pot_kop_kredit.lama_angsuran as 
                               lama_ang_kop_kre, t_pot_kasbon.jumlah as jumpotkasbon, t_pot_kasbon.lama_angsuran as lama_ang_pot_kas
                               FROM karyawan JOIN t_master_potongan ON karyawan.nik = t_master_potongan.nik JOIN t_pot_qurban ON 
                               karyawan.nik = t_pot_qurban.nik JOIN t_pot_kredit_bank ON karyawan.nik = t_pot_kredit_bank.nik JOIN t_pot_kop_kredit 
                               ON karyawan.nik = t_pot_kop_kredit.nik JOIN t_pot_kasbon ON karyawan.nik = t_pot_kasbon.nik WHERE karyawan.nik = '$idu'")->row();
             $a['page']		= "f_potongan_fix";
         } else if ($mau_ke == "act_add") {

             $this->db->query("INSERT INTO t_pot_qurban VALUES (NULL,'$nik','-','-','0','$jumQurban','$angQurban')");
             $this->db->query("INSERT INTO t_pot_kredit_bank VALUES (NULL,'$nik','-','-','0','$jumKreBank','$angKreBank')");
             $this->db->query("INSERT INTO t_pot_kasbon VALUES (NULL,'$nik','-','-','0','$jumKasbon','$angKasbon')");
             $this->db->query("INSERT INTO t_pot_kop_kredit VALUES (NULL,'$nik','-','-','0','$jumKoprasiKredit','$angKoprasiKredit')");
             $this->db->query("INSERT INTO t_master_potongan VALUES (NULL,'$nik','$jumKoprasiPokok','$jumNatura', '$jumTht', '$jumAskes')");


             $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
             redirect('index.php/admin/setPotonganFix');

         } else if ($mau_ke == "act_edt") {


             $this->db->query("UPDATE t_pot_qurban SET nik = '$nik', jumlah ='$jumQurban', lama_angsuran = '$angQurban' WHERE nik = '$nik'");
             $this->db->query("UPDATE t_pot_kredit_bank SET nik = '$nik', jumlah ='$jumKreBank', lama_angsuran = '$angKreBank' WHERE nik = '$nik'");
             $this->db->query("UPDATE t_pot_kasbon SET nik = '$nik', jumlah ='$jumKasbon', lama_angsuran = '$angKasbon' WHERE nik = '$nik'");
             $this->db->query("UPDATE t_pot_kop_kredit SET nik = '$nik', jumlah ='$jumKoprasiKredit', lama_angsuran = '$angKoprasiKredit' WHERE nik = '$nik'");
             $this->db->query("UPDATE t_master_potongan SET nik = '$nik', p_kop_pokok ='$jumKoprasiPokok', p_natura = '$jumNatura', p_tht='$jumTht', p_askes='$jumAskes' WHERE nik = '$nik'");

             $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been update</div>");
             redirect('index.php/admin/setPotonganFix');

         }else if($mau_ke == 'cari_tabel_pootongan'){
             $a['data']		= $this->db->query("SELECT karyawan.nik, karyawan.nama, t_master_potongan.p_kop_pokok, t_master_potongan.p_natura, t_master_potongan.p_tht, t_master_potongan.p_askes, t_pot_qurban.jumlah as jumpotqur, t_pot_kredit_bank.jumlah as jumpotkrebank, t_pot_kop_kredit.jumlah as jumpotkopkre, t_pot_kasbon.jumlah as jumpotkasbon FROM karyawan JOIN t_master_potongan ON karyawan.nik = t_master_potongan.nik JOIN t_pot_qurban ON karyawan.nik = t_pot_qurban.nik JOIN t_pot_kredit_bank ON karyawan.nik = t_pot_kredit_bank.nik JOIN t_pot_kop_kredit ON karyawan.nik = t_pot_kop_kredit.nik JOIN t_pot_kasbon ON karyawan.nik = t_pot_kasbon.nik  WHERE nama LIKE '%$cari%' ORDER BY nama ASC ")->result();
             $a['page']		= "l_tabel_potongan";
         }
         else if($mau_ke == 'tabel_pootongan'){
             $a['data']		= $this->db->query("SELECT karyawan.nik, karyawan.nama, t_master_potongan.p_kop_pokok, t_master_potongan.p_natura, t_master_potongan.p_tht, t_master_potongan.p_askes, t_pot_qurban.jumlah as jumpotqur, t_pot_kredit_bank.jumlah as jumpotkrebank, t_pot_kop_kredit.jumlah as jumpotkopkre, t_pot_kasbon.jumlah as jumpotkasbon FROM karyawan JOIN t_master_potongan ON karyawan.nik = t_master_potongan.nik JOIN t_pot_qurban ON karyawan.nik = t_pot_qurban.nik JOIN t_pot_kredit_bank ON karyawan.nik = t_pot_kredit_bank.nik JOIN t_pot_kop_kredit ON karyawan.nik = t_pot_kop_kredit.nik JOIN t_pot_kasbon ON karyawan.nik = t_pot_kasbon.nik Order BY karyawan.nama ASC LIMIT $awal, $akhir  ")->result();
             $a['page']		= "l_tabel_potongan";
         }
         else if($mau_ke == 'bayar_potongan'){

             $a['datpil']		= $this->db->query("SELECT karyawan.nik, karyawan.nama, t_master_potongan.p_kop_pokok, 
                               t_master_potongan.p_natura, t_master_potongan.p_tht, t_master_potongan.p_askes, 
                               t_pot_qurban.jumlah as jumpotqur, t_pot_qurban.lama_angsuran as lama_angsuran_qurban,
                               t_pot_kredit_bank.jumlah as jumpotkrebank, t_pot_kredit_bank.lama_angsuran as 
                               lama_ang_kre_bank, t_pot_kop_kredit.jumlah as jumpotkopkre, t_pot_kop_kredit.lama_angsuran as 
                               lama_ang_kop_kre, t_pot_kasbon.jumlah as jumpotkasbon, t_pot_kasbon.lama_angsuran as lama_ang_pot_kas
                               FROM karyawan JOIN t_master_potongan ON karyawan.nik = t_master_potongan.nik JOIN t_pot_qurban ON 
                               karyawan.nik = t_pot_qurban.nik JOIN t_pot_kredit_bank ON karyawan.nik = t_pot_kredit_bank.nik JOIN t_pot_kop_kredit 
                               ON karyawan.nik = t_pot_kop_kredit.nik JOIN t_pot_kasbon ON karyawan.nik = t_pot_kasbon.nik WHERE karyawan.nik = '$idu'")->row();
             $a['page']		= "f_pembayaran_potongan";

         }else if($mau_ke == 'act_bayar_potongan_qurban'){

             $q_cek	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan qurban'");
             $cekData	= $q_cek->num_rows();
             $d_cek2	= $q_cek->row();

             if($cekData == 1){
                 $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Potongan qurban sudah di bayar dibulan ini</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);
             }else{

                 $this->db->query("INSERT INTO t_rincian_potongan_fix VALUES (NULL,'$nik','$bulan','$tahun','potongan qurban','$jumlahYgdibayar', '$angQurban', '$angsuranke')");

                 $q_cekk1	= $this->db->query("SELECT * FROM `t_pot_qurban` WHERE `nik`= '$nik'");
                 $cekJumlahPotonganQurban	= $q_cekk1->num_rows();
                 $d_cek1	= $q_cekk1->row();

                 $q_cekk2	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan qurban'");
                 $cekJumlahPotonganQurbanDibayar	= $q_cekk2->num_rows();
                 $d_cek2	= $q_cekk2->row();

                 if($cekJumlahPotonganQurban == 1 && $cekJumlahPotonganQurbanDibayar==1){
                     $updateData = $d_cek1->jumlah - $d_cek2->jumlah;
                     $this->db->query("UPDATE t_pot_qurban SET jumlah ='$updateData', angsuran_ke = '$angsuranke' WHERE nik = '$nik'");
                 }

                 $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Berhasil membayar potongan qurban</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);
             }


         }else if($mau_ke == 'act_bayar_potongan_kredit_bank'){

             $q_cek	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan kredit bank'");
             $cekData	= $q_cek->num_rows();
             $d_cek2	= $q_cek->row();

             if($cekData == 1){
                 $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Potongan kredit bank sudah di bayar dibulan ini</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);
             }else {

                 $this->db->query("INSERT INTO t_rincian_potongan_fix VALUES (NULL,'$nik','$bulan','$tahun','potongan kredit bank','$jumlahYgdibayar', '$angKreBank', '$angsuranke')");

                 $q_cekk1 = $this->db->query("SELECT * FROM `t_pot_kredit_bank` WHERE `nik`= '$nik'");
                 $cekJumlahPotonganKreditBank = $q_cekk1->num_rows();
                 $d_cek1 = $q_cekk1->row();

                 $q_cekk2 = $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan kredit bank'");
                 $cekJumlahPotonganKreditBankDibayar = $q_cekk2->num_rows();
                 $d_cek2 = $q_cekk2->row();

                 $updateData = $d_cek1->jumlah - $d_cek2->jumlah;
                 $this->db->query("UPDATE t_pot_kredit_bank SET jumlah ='$updateData', angsuran_ke = '$angsuranke' WHERE nik = '$nik'");


                 $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Berhasil membayar potongan kredit bank</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/' . $nik);
             }

         } else if ($mau_ke == 'act_bayar_potongaan_kasbon'){

             $q_cek	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan kasbon'");
             $cekData	= $q_cek->num_rows();
             $d_cek2	= $q_cek->row();

             if($cekData == 1){
                 $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Potongan kasbon sudah di bayar dibulan ini</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);
             }else{

                 $this->db->query("INSERT INTO t_rincian_potongan_fix VALUES (NULL,'$nik','$bulan','$tahun','potongan kasbon ','$jumlahYgdibayar', '$angKasbon', '$angsuranke')");

                 $q_cekk1	= $this->db->query("SELECT * FROM `t_pot_kasbon` WHERE `nik`= '$nik'");
                 $cekJ	    = $q_cekk1->num_rows();
                 $d_cek1	= $q_cekk1->row();

                 $q_cekk2	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan kasbon'");
                 $cekJ2	    = $q_cekk2->num_rows();
                 $d_cek2	= $q_cekk2->row();

                 $updateData = $d_cek1->jumlah - $d_cek2->jumlah;
                 $this->db->query("UPDATE t_pot_kasbon SET jumlah ='$updateData', angsuran_ke = '$angsuranke' WHERE nik = '$nik'");


                 $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Berhasil membayar potongan kasbon</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);

             }
         }else if($mau_ke == 'act_bayar_potongaan_koprasi_kredit'){

             $q_cek	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan koprasi kredit'");
             $cekData	= $q_cek->num_rows();
             $d_cek2	= $q_cek->row();

             if($cekData == 1){
                 $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Potongan koprasi kredit sudah di bayar dibulan ini</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);
             }else{

                 $this->db->query("INSERT INTO t_rincian_potongan_fix VALUES (NULL,'$nik','$bulan','$tahun','potongan koprasi kredit','$jumlahYgdibayar', '$angKoprasiKredit', '$angsuranke')");

                 $q_cekk1	= $this->db->query("SELECT * FROM `t_pot_kop_kredit` WHERE `nik`= '$nik'");
                 $cekJ	    = $q_cekk1->num_rows();
                 $d_cek1	= $q_cekk1->row();

                 $q_cekk2	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan koprasi kredit'");
                 $cekJ2	    = $q_cekk2->num_rows();
                 $d_cek2	= $q_cekk2->row();

                 $updateData = $d_cek1->jumlah - $d_cek2->jumlah;
                 $this->db->query("UPDATE t_pot_kop_kredit SET jumlah ='$updateData', ansuran_ke = '$angsuranke' WHERE nik = '$nik'");


                 $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Berhasil membayar potongan koprasi kredit</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);

             }
         }else if($mau_ke == 'act_pot_koprasi_pokok'){

             $q_cek	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan koprasi pokok'");
             $cekData	= $q_cek->num_rows();
             $d_cek2	= $q_cek->row();

             if($cekData == 1){
                 $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Potongan koprasi pokok sudah di bayar dibulan ini</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);
             }else{

                 $this->db->query("INSERT INTO t_rincian_potongan_fix VALUES (NULL,'$nik','$bulan','$tahun','potongan koprasi pokok','$jumlahYgdibayar', '0', '0')");

                 $q_cekk1	= $this->db->query("SELECT * FROM `t_master_potongan` WHERE `nik`= '$nik'");
                 $cekJ	    = $q_cekk1->num_rows();
                 $d_cek1	= $q_cekk1->row();

                 $q_cekk2	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan koprasi pokok'");
                 $cekJ2	    = $q_cekk2->num_rows();
                 $d_cek2	= $q_cekk2->row();

                 $updateData = $d_cek1->p_kop_pokok - $d_cek2->jumlah;
                 $this->db->query("UPDATE t_master_potongan SET p_kop_pokok ='$updateData' WHERE nik = '$nik'");


                 $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Berhasil membayar potongan koprasi pokok</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);

             }

         }else if($mau_ke == 'act_pot_natura'){
             $q_cek	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan natura'");
             $cekData	= $q_cek->num_rows();
             $d_cek2	= $q_cek->row();

             if($cekData == 1){
                 $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Potongan natura sudah di bayar dibulan ini</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);
             }else{

                 $this->db->query("INSERT INTO t_rincian_potongan_fix VALUES (NULL,'$nik','$bulan','$tahun','potongan natura','$jumlahYgdibayar', '0', '0')");

                 $q_cekk1	= $this->db->query("SELECT * FROM `t_master_potongan` WHERE `nik`= '$nik'");
                 $cekJ	    = $q_cekk1->num_rows();
                 $d_cek1	= $q_cekk1->row();

                 $q_cekk2	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan natura'");
                 $cekJ2	    = $q_cekk2->num_rows();
                 $d_cek2	= $q_cekk2->row();

                 $updateData = $d_cek1->p_natura - $d_cek2->jumlah;
                 $this->db->query("UPDATE t_master_potongan SET p_natura ='$updateData' WHERE nik = '$nik'");


                 $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Berhasil membayar potongan natura</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);

             }

         }else if($mau_ke == 'act_pot_tht'){

             $q_cek	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan tht'");
             $cekData	= $q_cek->num_rows();
             $d_cek2	= $q_cek->row();

             if($cekData == 1){
                 $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Potongan tht sudah di bayar dibulan ini</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);
             }else{

                 $this->db->query("INSERT INTO t_rincian_potongan_fix VALUES (NULL,'$nik','$bulan','$tahun','potongan tht','$jumlahYgdibayar', '0', '0')");

                 $q_cekk1	= $this->db->query("SELECT * FROM `t_master_potongan` WHERE `nik`= '$nik'");
                 $cekJ	    = $q_cekk1->num_rows();
                 $d_cek1	= $q_cekk1->row();

                 $q_cekk2	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan tht'");
                 $cekJ2	    = $q_cekk2->num_rows();
                 $d_cek2	= $q_cekk2->row();

                 $updateData = $d_cek1->p_tht - $d_cek2->jumlah;
                 $this->db->query("UPDATE t_master_potongan SET p_tht ='$updateData' WHERE nik = '$nik'");


                 $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Berhasil membayar potongan tht</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);

             }

         }else if($mau_ke == 'act_pot_askes'){

             $q_cek	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan askes'");
             $cekData	= $q_cek->num_rows();
             $d_cek2	= $q_cek->row();

             if($cekData == 1){
                 $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Potongan askes sudah di bayar dibulan ini</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);
             }else{

                 $this->db->query("INSERT INTO t_rincian_potongan_fix VALUES (NULL,'$nik','$bulan','$tahun','potongan askes','$jumlahYgdibayar', '0', '0')");

                 $q_cekk1	= $this->db->query("SELECT * FROM `t_master_potongan` WHERE `nik`= '$nik'");
                 $cekJ	    = $q_cekk1->num_rows();
                 $d_cek1	= $q_cekk1->row();

                 $q_cekk2	= $this->db->query("SELECT * FROM `t_rincian_potongan_fix` WHERE `nik`= '$nik' and bulan='$bulan' and tahun='$tahun' and nama_pot='potongan askes'");
                 $cekJ2	    = $q_cekk2->num_rows();
                 $d_cek2	= $q_cekk2->row();

                 $updateData = $d_cek1->p_askes - $d_cek2->jumlah;
                 $this->db->query("UPDATE t_master_potongan SET p_askes ='$updateData' WHERE nik = '$nik'");


                 $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Berhasil membayar potongan askes</div>");
                 redirect('index.php/admin/setPotonganFix/bayar_potongan/'.$nik);

             }

         }else {
             $a['data']		= $this->db->query("SELECT karyawan.nik, karyawan.nama, t_master_potongan.p_kop_pokok, t_master_potongan.p_natura, t_master_potongan.p_tht, t_master_potongan.p_askes, t_pot_qurban.jumlah as jumpotqur, t_pot_kredit_bank.jumlah as jumpotkrebank, t_pot_kop_kredit.jumlah as jumpotkopkre, t_pot_kasbon.jumlah as jumpotkasbon FROM karyawan JOIN t_master_potongan ON karyawan.nik = t_master_potongan.nik JOIN t_pot_qurban ON karyawan.nik = t_pot_qurban.nik JOIN t_pot_kredit_bank ON karyawan.nik = t_pot_kredit_bank.nik JOIN t_pot_kop_kredit ON karyawan.nik = t_pot_kop_kredit.nik JOIN t_pot_kasbon ON karyawan.nik = t_pot_kasbon.nik Order BY karyawan.nama ASC LIMIT $awal, $akhir  ")->result();
             $a['page']		= "l_potongan_fix";
         }

         $this->load->view('admin/aaa', $a);

     }


    public function export_data_to_excel(){
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
            redirect("index.php/admin/login");
        }


        /* pagination */
        $total_row		= $this->db->query("SELECT karyawan.nik,karyawan.nama, transaksi_gaji.gaji_bersih, karyawan.no_rek FROM `transaksi_gaji` INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik")->num_rows();
        $per_page		= 10;

        $awal	= $this->uri->segment(3);
        $awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

        //if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
        $akhir	= $per_page;

        $a['pagi']	= _page($total_row, $per_page, 3, base_url()."index.php/admin/export_data_to_excel/p");


        //ambil variabel URL
        $mau_ke					= $this->uri->segment(3);
        $idu					= $this->uri->segment(4);
        $nikk					= $this->uri->segment(4);
        $bulann					= $this->uri->segment(5);
        $tahunn 				= $this->uri->segment(6);


        $cari					= addslashes($this->input->post('q'));

        //ambil variabel Postingan
        $id					   = addslashes($this->input->post('id'));
        $bulan				   = addslashes($this->input->post('bulan'));
        $tahun 			       = addslashes($this->input->post('tahun'));
        $nik 			       = addslashes($this->input->post('nik'));
        $jmlhhadir 			   = addslashes($this->input->post('jumlah_hadir'));

        if ($mau_ke == "export_excel") {
            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');
            $delimiter = ",";
            $newline = "\r\n";
            $filename = "Setor Bank September 2018.xlsx";
            $query = "SELECT karyawan.nik,karyawan.nama, transaksi_gaji.gaji_bersih, karyawan.no_rek FROM `transaksi_gaji` INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik WHERE bulan='$bulan' and tahun='$tahun'"; //USE HERE YOUR QUERY
            $result = $this->db->query($query);
            $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
            force_download($filename, $data);


        } else {
            $a['bulana']    = $bulan;
            $a['tahuna']    = $tahun;

            $a['data']		= $this->db->query("SELECT karyawan.nik,karyawan.nama, transaksi_gaji.gaji_bersih, karyawan.no_rek FROM `transaksi_gaji` INNER JOIN karyawan ON transaksi_gaji.nik=karyawan.nik WHERE bulan='$bulan' and tahun='$tahun' ORDER BY nama ASC")->result();
            $a['page']		= "l_excel_bank";
        }

        $this->load->view('admin/aaa', $a);
    }

	
	public function logout(){
        $this->session->sess_destroy();
		redirect('index.php/admin/login');
    }
}
