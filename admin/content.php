<?php

$modul = isset($_GET['module']) ? $_GET['module'] : 'home';

// Bagian Home
if ($modul=='home')
{
	echo "<h1>Selamat Datang</h1>
          <p>Hai <b>".$_SESSION['nama_lengkap']."</b>, selamat datang di halaman Administrator.<br> Silahkan klik menu pilihan yang berada 
          di sebelah kiri untuk mengelola content website. </p>";
}
elseif ($modul=='modul')
{
	include "modul/mod_modul/modul.php";
}
elseif ($modul=='kategori')
{
	include "modul/mod_kategori/kategori.php";
}
elseif ($modul=='vendor')
{
	include "modul/mod_vendor/vendor.php";
}
elseif ($modul=='produk')
{
	include "modul/mod_produk/produk.php";
}
elseif ($modul=='order')
{
	include "modul/mod_order/order.php";
}
elseif ($modul=='hubungi')
{
	include "modul/mod_hubungi/hubungi.php";
}
elseif ($modul=='ongkoskirim')
{
	include "modul/mod_ongkoskirim/ongkoskirim.php";
}
elseif ($modul=='password')
{
	include "modul/mod_password/password.php";
}
elseif ($modul=='review')
{
	include "modul/mod_review/review.php";
}
else
{
	echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}