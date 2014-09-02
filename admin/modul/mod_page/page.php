<?php
include "../inc/library/paging.php";
include "../inc/function/fungsi_rupiah.php";
$act 	= isset($_GET['act']) ? $_GET['act'] : null;
$aksi 	= "modul/mod_page/aksi_page.php";
switch ($act)
{
	// Tampil Produk
	default:
		include 'modul/mod_page/page_index.php'; 
    break;
	case "tambahpage":
		include 'modul/mod_page/page_tambah.php'; 
    break;
	case "editpage":
		include 'modul/mod_page/page_edit.php';
    break;  
}