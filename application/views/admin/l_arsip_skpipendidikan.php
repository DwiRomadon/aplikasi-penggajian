<style type="text/css">
.clearfix .alert.alert-dismissable.alert-success table tr td {
	font-size: 18px;
}
.clearfix .alert.alert-dismissable.alert-success table {
	font-size: 14px;
}
</style>
      <div class="clearfix">


<?php $username = $this->session->userdata('admin_user'); ?>



		<div class="alert alert-dismissable alert-success">
        
        <?php
		$q_cek	= $this->db->query("SELECT * FROM t_mahasiswa WHERE username = '$username'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
           
	
		?>
        Surat Keterangan Pendamping Ijazah <?php echo $d_cek->prodi ?> <?php echo $d_cek->fakultas ?>
        
        <table width="100%">
		
		<tr>
		  <td height="28" colspan="2" bgcolor="#dff0d8"><img src="<?php echo base_url(); ?>upload/foto_profil/<?php echo $d_cek->photo; ?>" width="173" height="165" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 150px; height: 150px" /></td>
		  </tr>
		<tr>
			<td width="35%" height="28" bgcolor="#dff0d8">Nama</td>
            <td width="65%" bgcolor="#dff0d8">: <?php echo $d_cek->nama ?> </td>
		</tr>
        <tr>
			<td width="35%" height="28" bgcolor="#dff0d8">NPM</td>
            <td width="65%" bgcolor="#dff0d8">: <?php echo $d_cek->username ?> </td>
		</tr>

      
        </table>
        Daftar Riwayat Kegiatan Akademik <br />
        <?php
       
         }
		?>
        
        
        <?php
		
		$adata		= $this->db->query("SELECT * FROM t_pendidikan WHERE npm = '$username' ORDER BY tgl_simpan DESC")->result();
		
		if (empty($adata)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= 0;
			foreach ($adata as $x) {
				echo $no.". Menjadi ".$x->prestasi." Pada Acara ".$x->namakegiatan.", ".$x->penyelenggara." yang diadakan pada  ".$x->tgl_kegiatan." di ".$x->tempat."<br>";
				$no = $no + 1;
			}
		}
		
		?>
            
  </div>
			
      </div>
