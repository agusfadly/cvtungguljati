<?php

function get_produk_by_seo($seo)
{
	$sql	= "SELECT * FROM produk WHERE seo = '$seo'";
	$Q		= mysql_query($sql) or die(mysql_error());
	return mysql_fetch_assoc($Q);
}

function update_stok($id_produk)
{
	$sql 	= "UPDATE produk SET stok = stok -1 WHERE id_produk = '$id_produk'";
	$Q		= mysql_query($sql) or die (mysql_error());
}