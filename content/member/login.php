<?php

//var_dump($_SESSION['member_id']);
function do_login($email, $password)
{
	$sql 	= "SELECT *
		FROM member
		WHERE email = '$email'
			AND password = '".md5($password)."'";
	$Q		= mysql_query($sql);
	if (mysql_num_rows($Q) > 0)
	{
		$member 					= mysql_fetch_assoc($Q);
		$_SESSION['member_id'] 		= $member['member_id'];
		$_SESSION['member_nama']	= $member['nama'];
		$_SESSION['member_email'] 	= $member['email'];
		header('Location: '.BASE_URL.'member');
	}
	else
	{
		?>
		<script>
		alert('Email atau password Anda salah. Silahkan coba lagi.');
		</script>
		<?php	
	}
}

if ($_POST)
{
	$error = false;
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
		do_login($_POST['email'], $_POST['password']);
	}
}
?>
<h1>Login Member</h1>
<div class="detailbox">
	<div class="login_container" align="center">
		<?php echo isset($e_email) ? '<div class="error">'.$e_email.'</div>' : ''; ?>
		<?php echo isset($e_password) ? '<div class="error">'.$e_password.'</div>' : ''; ?>
			<form name="form" method="POST" action="" onSubmit="return validateForm()">
				<table>
					<tr>
						<td>Email</td>
						<td> : <input type="text" name="email" /></td>
					</tr>
					<tr>
						<td>Password</td>
						<td> : <input type="password" name="password" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="Login" />
						</td>
					</tr>
				</table>
			</form>
	</div><!--end login container --> 
	<p>or <a href="<?php echo BASE_URL.'member/register'; ?>">register member</a></p>
</div>