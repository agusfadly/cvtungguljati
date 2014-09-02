<?php
include "../../../inc/config.php";
include "../../../inc/general.php";

$module	= $_GET['module'];
$act	= $_GET['act'];

// Hapus page
if ($module=='page' AND $act=='hapus')
{
	mysql_query("DELETE FROM page WHERE id_page='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}