<?php

if (isset($_GET['search']) && $_GET['search']=='true')
{
	header('Location: cari-'.$_GET['cat'].'?'.$_GET['q']);
}
if (isset($_GET['pg']) && $_GET['pg']=='checkout')
{
	if (!isset($_SESSION['id_member']))
	{
		header('Location: member/login');
	}
}
if (isset($_GET['pg']) && $_GET['pg']=='member')
{
	$action = isset($_GET['action']) ? $_GET['action'] : 'default';
	if (!isset($_SESSION['member_id']) && ($action == 'default' || $action == 'transaksi' || $action == 'edit'))
	{
		header('Location: '.BASE_URL.'member/login');
	}
	elseif (isset($_SESSION['member_id']) && ($action == 'login' || $action == 'register'))
	{
		header('Location: '.BASE_URL.'member');
	}
	elseif ($action == 'logout')
	{
		include 'content/member/logout.php';
	}
}