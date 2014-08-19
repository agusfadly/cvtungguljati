<?php

include "../inc/config.php";
include "../inc/general.php";

if (!isset($_SESSION['username']))
{
	header('Location:index.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CV Tunggul Jati - Administrator</title>
		<meta name="description" content="" />
		<meta name="keyword" content="" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/admin.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="js/nicEdit.js"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
		</script>
		<!--[if IE 6]>
			<link rel="stylesheet" type="text/css" href="css/iecss.css" />
		<![endif]-->
		<script type="text/javascript" src="js/boxOver.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="inner">
				<div id="header">
					<h1>
						<img src="<?php echo BASE_URL; ?>images/logo.gif" width="519" height="63" alt="Online Movie Store" />
					</h1>
					<div id="nav">
						<a href="<?php echo BASE_URL.'admin'; ?>">HOME</a> | <?php echo $_SESSION['nama_lengkap']; ?>
					</div>			
				</div><!-- end of #header -->
				<dl id="browse">
					<dt>Menu Admin</dt>
					<?php include "menu.php"; ?>
					<dd><a href="logout.php">&rArr; LOGOUT</a></dd>
				</dl>
				<div id="body">
					<div class="inner">
						<?php include "content.php"; ?>    	
					</div>
				</div>
				<div class="clear"></div>
				<div id="footer">
					Developed by <a href="http://twitter.com/agus">Agus</a> &nbsp;
					<div id="footnav">
						<?php echo date('Y-m-d'); ?>
					</div>
				</div>				
			</div><!-- end of #inner -->             
		</div><!-- end of #wrapper -->
	</body>
</html>