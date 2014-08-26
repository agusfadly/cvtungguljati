<?php
include 'inc/config.php';
include 'inc/general.php';
include 'inc/redirect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CV Tunggul Jati</title>
		<meta name="description" content="" />
		<meta name="keyword" content="" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="<?php echo BASE_URL; ?>css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="inner">
				<div id="header">
					<h1><img src="<?php echo BASE_URL; ?>images/logo.gif" width="519" height="63" alt="Online Movie Store" /></h1>
					<div id="nav"> <a href="<?php echo BASE_URL; ?>">HOME</a> | <a href="<?php echo BASE_URL; ?>cart">view cart</a> | <a href="<?php echo BASE_URL; ?>member">member</a> </div>
      <!-- end nav -->
      <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>images/header_1.jpg" width="744" height="145" alt="Harry Potter cd" /></a> <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>images/header_2.jpg" width="745" height="48" alt="" /></a> 			
				</div>
			<!-- end header -->
			<dl id="browse">
				<?php if (isset($_SESSION['member_id'])) : ?> 
					<dt>Member Area</dt>
					<dd class="first"><a href="<?php echo BASE_URL.'member'; ?>">Profil</a></dd>
					<dd><a href="<?php echo BASE_URL.'member/edit'; ?>">Edit</a></dd>
					<dd><a href="<?php echo BASE_URL.'member/transaksi'; ?>">Transaksi</a></dd>
					<dd><a href="<?php echo BASE_URL.'member/logout'; ?>">Logout</a></dd>
				<?php endif; ?>
				<dt>Kategori Produk</dt>
				<?php echo render_menu(); ?>
				<dt>Cari Per Kategori</dt>
				<?php echo render_search(); ?>
			</dl>
			<div id="body">
				<div class="inner">
					<?php include 'controller/main.php'; ?>				
				</div>
				<!-- end .inner -->
			</div>
			<!-- end body -->
			<div class="clear"></div>
			<div id="footer"> Developed by <a href="http://twitter.com/agus">Agus</a> &nbsp;
			  <div id="footnav"> <a href="<?php echo BASE_URL; ?>admin">Login</a> | <a href="<?php echo BASE_URL; ?>">Home</a> </div>
			  <!-- end footnav -->
			</div>
			<!-- end footer -->
			</div>
		  <!-- end inner -->
		</div>
		<!-- end wrapper -->
	</body>
</html>