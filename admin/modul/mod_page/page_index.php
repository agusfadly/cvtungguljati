<?php
$tampil = mysql_query("SELECT * FROM page ORDER BY judul DESC") or die(mysql_error());
if (mysql_num_rows($tampil) > 0)
{
?>
	<h1>Data Page</h1>
	<table id="list">
		<tr>
			<th>Nama Page</th>
			<th>Isi</th>
			<th>Tgl. update</th>
			<th>Aksi</th>
		</tr>
	<?php
		while ($r=mysql_fetch_array($tampil))
		{
			$tanggal	= tgl_indo($r['last_update']);
			echo '<tr>
					<td>'.$r['judul'].'</td>
					<td align="center">'.$r['isi'].'</td>
					<td>'.$tanggal.'</td>
					<td>
						<a href="?module=page&act=editpage&id='.$r['id'].'">Edit</a>
					</td>
				</tr>';
		}
		echo "</table>";
}