<?php
$pg = (isset($_GET['pg']) && $_GET['pg'] !== '') ? $_GET['pg'] : 'home';
if ($pg == 'home')
{
	include 'controller/controller.home.php';
}
elseif ($pg == 'kategori')
{
	include 'controller/controller.kategori.php';
}
elseif ($pg == 'produk')
{
	include 'controller/controller.produk.php';
}
elseif ($pg == 'cari')
{
	include 'controller/controller.cari.php';
}
elseif ($pg == 'cart')
{
	include 'controller/controller.cart.php';
}
elseif ($pg == 'member')
{
	include 'controller/controller.member.php';
}
elseif ($pg == 'checkout')
{
	include 'controller/controller.checkout.php';
}
else
{
	show_404();
}