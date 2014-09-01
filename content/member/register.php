<?php
function is_registered($email)
{
	$sql = "SELECT email
		FROM member
		WHERE email = '$email'";
	$Q	= mysql_query($sql);
	return mysql_num_rows($Q) > 0 ? true : false;
}
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
		$body_mail = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head><body>
<h1>Terimakasih telah mendaftar menjadi member.</h1><p>Silahkan login menggunakan akun Anda.</p>
Email : '.$email.'<br/>
Password: '.$password.'<br/>
<p>Silahkan login <a href="http://cvtungguljati.com/member/login">disini</a>.</p>
</body>
</html>';
		$headers = "From: admin@cvtungguljati.com\r\n";
		$headers .= "Reply-to: admin@cvtungguljati.com\r\n";
		$headers .= "Content-type: text/html";
		if ((isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'www.cvtungguljati.com' || $_SERVER['HTTP_HOST'] == 'cvtungguljati.com')) || $_SERVER['SERVER_NAME'] == 'www.cvtungguljati.com' || $_SERVER['SERVER_NAME'] == 'cvtungguljati.com')
		{
			$mail_sent = mail($email, "Registrasi Member - CV Tunggul Jati", $body_mail, $headers);
		}
		else
		{
			echo 'Maaf, saat ini sistem sedang offline. Coba lagi nanti.<br/>';
		}
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
	elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$error 		= true;
		$e_email 	= 'Format Email salah.';
	}
	elseif (is_registered($_POST['email']))
	{
		$error 		= true;
		$e_email 	= 'Email sudah terdaftar. Silahkan Login.';
	}
	if ($_POST['password'] == '')
	{
		$error 		= true;
		$e_password = 'Anda belum mengisi password';
	}
	elseif (strlen($_POST['password']) < 6)
	{
		$error 		= true;
		$e_password = 'Password minimal 6 karakter.';
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
						<td valign="top">Nama</td>
						<td valign="top"> : <input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : '' ; ?>"/><br/><?php echo isset($e_nama) ? '<p class="error">'.$e_nama.'</p>' : ''; ?></td>
					</tr>
					<tr>
						<td valign="top">Email</td>
						<td valign="top"> : <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ; ?>"/><br/><?php echo isset($e_email) ? '<p class="error">'.$e_email.'</p>' : ''; ?></td>
					</tr>
					<tr>
						<td valign="top">Password</td>
						<td valign="top"> : <input type="password" name="password" /><br/><?php echo isset($e_password) ? '<p class="error">'.$e_password.'</p>' : ''; ?></td>
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