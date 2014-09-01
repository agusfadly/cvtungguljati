<?php
include "../inc/function/fungsi_rupiah.php";
$aksi	= "modul/mod_ongkoskirim/aksi_ongkoskirim.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '';
switch($act)
{
	// Tampil Ongkos Kirim
	default:
		include 'modul/mod_ongkoskirim/ongkoskirim_index.php';
    break;  
	// Form Tambah Ongkos Kirim
	case "tambahongkoskirim":
		include 'modul/mod_ongkoskirim/ongkoskirim_tambah.php';
    break;  
	// Form Edit Ongkos Kirim
	case "editongkoskirim":
		include 'modul/mod_ongkoskirim/ongkoskirim_edit.php';   
    break;  
}