<?php
if ($_SESSION['level']=='admin')
{
	$sql=mysql_query("select * from modul where aktif='Y' order by urutan");
}
else
{
	$sql=mysql_query("select * from modul where status='user' and aktif='Y' order by urutan"); 
} 
while ($m=mysql_fetch_array($sql))
{  
	echo "<dd><a href='$m[link]'>&rArr; $m[nama_modul] </a></dd>";
}