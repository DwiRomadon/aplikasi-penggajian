<?php 

$kdmobil = @$_GET['id'];

mysql_query("delete from karyawan where NIK='$kdmobil'")or die (mysql_error());

 ?>
 <script type="text/javascript">
 	window.location.href="?page=karyawan";
 </script>