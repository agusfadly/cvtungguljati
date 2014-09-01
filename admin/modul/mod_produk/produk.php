<?php
include "../inc/library/paging.php";
include "../inc/function/fungsi_rupiah.php";
$act 	= isset($_GET['act']) ? $_GET['act'] : null;
$aksi 	= "modul/mod_produk/aksi_produk.php";
switch ($act)
{
	// Tampil Produk
	default:
		include 'modul/mod_produk/produk_index.php'; 
    break;
	case "tambahproduk":
		include 'modul/mod_produk/produk_tambah.php'; 
    break;
	case "editproduk":
		include 'modul/mod_produk/produk_edit.php';
    break;  
}