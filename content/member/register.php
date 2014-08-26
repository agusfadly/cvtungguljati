<?php
function do_register($nama, $email, $password)
{
	$sql 	= "INSERT INTO member (nama, email, password)
		VALUES ('$nama', '$email', '".md5($password)."')";
	$Q		= mysql_query($sql);
	if ($Q)
	{
		$_SESSION['member_id'] 		= mysql_insert_id();
		$_SESSION['member_nama']	= $nama;
		$_SESSION['member_email'] 	= $email;
		header('Location: '.BASE_URL.'member');
	}
	else
	{
		?>
		<script>
		alert('Kesalahan sistem. Silahkan coba lagi.');
		</script>
		<?php	
	}
}

if ($_POST)
{
	$error = false;
	if ($_POST['nama'] == '')
	{
		$error 		= true;
		$e_nama 	= 'Anda belum mengisi nama';
	}
	if ($_POST['email'] == '')
	{
		$error 		= true;
		$e_email 	= 'Anda belum mengisi e-mail';
	}
	if ($_POST['password'] == '')
	{
		$error 		= true;
		$e_password = 'Anda belum mengisi password';
	}
	if (!$error)
	{
		do_register($_POST['nama'], $_POST['email'], $_POST['password']);
	}
}
?>
<h1>Register Member</h1>
<div class="detailbox">
	<div class="login_container" align="center">
			<form name="form" method="POST" action="">
				<table>
					<tr>
						<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
						<td>Nama</td>
						<td> : <input type="text" name="nama" /></td>
					</tr>
					<tr>
						<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
						<td>Email</td>
						<td> : <input type="text" name="email" /></td>
					</tr>
					<tr>
						<td>Password</td>
						<td> : <input type="password" name="password" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="Register">
						</td>
					</tr>
				</table>
			</form>
	</div><!--end login container -->          
	<p>or <a href="<?php echo BASE_URL.'member/login'; ?>">login member</a></p>
</div>