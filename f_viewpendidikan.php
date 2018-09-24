<?php


/*function decrypt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
*/
		
$id = $_GET['id'];

$decrypt=base64_decode($id);

//$Decrypted = decrypt($id);


$host = "localhost";	//nama host
$user = "root";	//username phpMyAdmin
$pass = "";	//password phpMyAdmin
$name = "ublapps";	//nama database

$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!");

$show = mysql_query("SELECT * FROM t_pendidikanfile WHERE id='$decrypt'");
	if(mysql_num_rows($show) == 0){
		echo '<script>window.history.back()</script>';
		
	}else{
		$data = mysql_fetch_assoc($show);
	
	}
	
	$rest = substr($data['file'], -3);
	
	if ($rest=="pdf")
	{
	$tipe = "application/pdf";	
	}
	else
	{
		$tipe = "image/jpg";	
	}


  $file		= 'upload/arsip_pendidikan/'.$data['file'];
  $filename = 'Cetak File';
  header('Content-type: '.$tipe);
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>