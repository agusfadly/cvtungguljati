<?php
include "../inc/library/paging.php";
$aksi	="modul/mod_hubungi/aksi_hubungi.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '';
switch($act)
{
	default:
		include 'modul/mod_hubungi/hubungi_index.php';
    break;
	case "balasemail":
		include 'modul/mod_hubungi/hubungi_balas.php';		
    break;
	case "kirimemail":
		
    break;  
}
?>
