<?php
include "../../../inc/config.php";
include "../../../inc/general.php";
$module	= $_GET['module'];
$act	= $_GET['act'];

// Hapus produk
if ($module=='produk' AND $act=='hapus')
{
	mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
	unlink('../../../gambar_produk/'.$_GET['gambar']);
	@unlink('../../../gambar_produk/small_'.$_GET['gambar']);
	header('location:../../media.php?module='.$module);
}