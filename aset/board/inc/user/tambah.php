<div class="container">
<h1>Form Input Data User</h1>
<div class="col-md-8">
<form action="" method="post">
	<table class="table" width="60%">
		<tr>
			<th>Username</th>
			<th>:</th>
			<th><input type="text" name="user" class="form-control"></th>
		</tr>
		<tr>
			<th>Password</th>
			<th>:</th>
			<th><input type="text" name="pass" class="form-control"></th>
		</tr>
		<tr>
			<th>No.HP</th>
			<th>:</th>
			<th><input type="text" name="no" class="form-control"></th>
		</tr>
		<tr>
			<th>Email</th>
			<th>:</th>
			<th><input type="text" name="email" class="form-control"></th>
		</tr>
		<tr>
			<td colspan="3">
				<input type="submit" class="btn btn-primary" value="Tambah" name="tambah">
			</td>
		</tr>
	</table>
	<?php 
		$u = @$_POST['user'];
		$p =@$_POST['pass'];
		$n =@$_POST['no'];
		$e =@$_POST['email'];

		$tambah = @$_POST['tambah'];
		if($tambah)
			{
				if($n==""  || $p=="" || $n=="" || $e=="")
				{
					?>
					<script type="text/javascript">
					alert("input tidak boleh ada yang kosong");
					</script>
					<?php
				}
				else
				{

							mysql_query("insert into administrator (id_admin,username,password,no_hp,email,level)
								values('null','$u',MD5('$p'),'$n','$e','user')") or die(mysql_error());
							?>
							<script type="text/javascript">
							alert("data berhasil ditambahkan");
							window.location.href="?page=user";
							</script>
							<?php
					
				}
	    
	 ?>

<?php } ?>
</form>
</div>
</div>