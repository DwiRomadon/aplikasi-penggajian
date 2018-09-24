<?php 

$kdmobil = @$_GET['id'];

mysql_query("delete from dosen where NIDN='$kdmobil'")or die (mysql_error());

 ?>
 <script type="text/javascript">
 	window.location.href="?page=dosen";
 </script>