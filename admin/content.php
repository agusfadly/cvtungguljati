<?php

$modul = isset($_GET['module']) ? $_GET['module'] : 'home';

// Bagian Home
if ($modul=='home')
{
	echo "<h1>Selamat Datang</h1>
          <p>Hai <b>".$_SESSION['nama_lengkap']."</b>, selamat datang di halaman Administrator.<br> Silahkan klik menu pilihan yang berada 
          di sebelah kiri untuk mengelola content website. </p>";
}
elseif (file_exists('modul/mod_'.$modul.'/'.$modul.'.php'))
{
	include 'modul/mod_'.$modul.'/'.$modul.'.php';
}
else
{
	echo "<p><b>Maaf, pilihan belum tersedia.</b></p>";
}