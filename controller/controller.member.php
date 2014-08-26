<?php
include 'inc/function/fungsi_produk.php';
$action = isset($_GET['action']) ? $_GET['action'] : 'default';

if ($action == 'default')
{
	include 'content/member/default.php';	
}
elseif ($action == 'register')
{
	include 'content/member/register.php';
}
elseif ($action == 'login')
{
	include 'content/member/login.php';
}
elseif ($action == 'edit')
{
	include 'content/member/edit.php';
}
elseif ($action == 'transaksi')
{
	include 'content/member/transaksi.php';
}
elseif ($action == 'logout')
{
	include 'content/member/logout.php';
}	
else
{
	show_404();
}