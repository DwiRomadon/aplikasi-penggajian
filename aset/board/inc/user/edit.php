<?php
$id = @$_GET['username'];
 $sql = mysql_query("SELECT * FROM administrator where level='user' and username='$id'")or die (mysql_error());
 $data = mysql_fetch_array($sql);
  ?>
  <div class="container">
<h1>Form Input Data Karyawan</h1>
<div class="col-md-8">
<form action="" method="post">
	<table class="table" width="60%">
		<tr>
			<th>Username</th>
			<th>:</th>
			<th><input type="text" name="user" class="form-control" value="<?=$data['username'] ?>"></th>
		</tr>
		<tr>
			<th>Password</th>
			<th>:</th>
			<th><input type="text" name="pass" class="form-control" value="<?=$data['password'] ?>"></th>
		</tr>
		<tr>
			<th>No.HP</th>
			<th>:</th>
			<th><input type="text" name="no" class="form-control" value="<?=$data['no_hp'] ?>"></th>
		</tr>
		<tr>
			<th>Email</th>
			<th>:</th>
			<th><input type="text" name="email" class="form-control" value="<?=$data['email'] ?>"></th>
		</tr>
		<tr>
			<td colspan="3">
				<input type="submit" class="btn btn-primary" value="Edit" name="edit">
			</td>
		</tr>
	</table>
	<?php
		$id = @$_GET['username'];
		$u = @$_POST['user'];
		$p =@$_POST['pass'];
		$n =@$_POST['no'];
		$e =@$_POST['email'];

		$edit_user = @$_POST['edit'];
		if($edit_user)
			{
				if($u==""  || $p=="" || $n=="" || $e=="")
				{
					?>
					<script type="text/javascript">
					alert("input tidak boleh ada yang kosong");
					</script>
					<?php
				}
				else
				{

					
						mysql_query("update administrator set username='$u',password=MD5('$p'),no_hp='$n',email='$e'
							where username='$id'")or die(mysql_error());
						?>
							<script type="text/javascript">
							alert("data anda berhasil diedit");
							window.location.href="?page=user";
							</script>
							<?php
					
					
				}
	    	}
	 ?>
</form>
</div>
<div class="col-md-4">
</div>
</div>

