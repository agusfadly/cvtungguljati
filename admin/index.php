<?php

include "../inc/config.php";
include "../inc/general.php";

if (isset($_SESSION['username']))
{
	header('Location:media.php');
}

if ($_POST)
{
	$username	= antiinjection($_POST['username']);
	$pass     	= antiinjection(md5($_POST['password']));

	$login		= mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$pass'");
	$ketemu		= mysql_num_rows($login);
	$r			= mysql_fetch_array($login);

	if ($ketemu > 0)
	{
		$_SESSION['username']     	= $r['username'];
		$_SESSION['nama_lengkap']	= $r['nama_lengkap'];
		$_SESSION['level']    		= $r['level'];
		header('Location:media.php');
	}
	else
	{
		$e_login = 'Username atau password salah.';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
	<title>::..Login First..::</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/login.css" />
	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="css/iecss.css" />
	<![endif]-->
	<script type="text/javascript" src="js/validateLogin.js"></script>
</head>
<body>
	<div id="main_container">
		<div class="top_bar"></div>
		<div class="login_container" align="center">
			<div class="top_divider" style="height:164px;">
			</div>
			<div class="title"><h2>Login</h2></div>
			<form name="form" method="POST" action="" onSubmit="return validateForm()">
				<table>
					<tr>
						<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
						<td>Username</td>
						<td> : <input type="text" name="username" /></td>
					</tr>
					<tr>
						<td>Password</td>
						<td> : <input type="password" name="password" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="Login">
						</td>
					</tr>
				</table>
			</form>
		</div><!--end login container -->          
	</div>
	<!-- end of main_container -->
</body>
</html>