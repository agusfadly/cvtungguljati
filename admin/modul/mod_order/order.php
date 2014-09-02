<?php
include "../inc/library/paging.php";
include "../inc/function/fungsi_rupiah.php";
$aksi	= "modul/mod_order/aksi_order.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '';
switch($act)
{
	// Tampil Order
	default:
		include 'modul/mod_order/order_index.php';
    break;   
	case "detailorder":
		include 'modul/mod_order/order_detail.php';
	break;  
}