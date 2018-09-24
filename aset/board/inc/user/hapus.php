<?php 

$kdmobil = @$_GET['id'];

mysql_query("delete from administrator where username='$kdmobil'")or die (mysql_error());

 ?>
 <script type="text/javascript">
 	window.location.href="?page=user";
 </script>