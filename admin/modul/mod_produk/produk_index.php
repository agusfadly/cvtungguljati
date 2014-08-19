<h1>Data Produk</h1>
<input type="button" value='Tambah Produk' onclick="window.location.href='?module=produk&act=tambahproduk';">
<table id="list">
	<tr>
		<th>No</th>
		<th>Nama Produk</th>
		<th>Harga</th>
		<th>Stok</th>
		<th>Tgl. masuk</th>
		<th>Aksi</th>
	</tr>
<?php
		$p      = new Paging2;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		$tampil = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi, $batas");
	  
		$no 	= $posisi+1;
		while ($r=mysql_fetch_array($tampil))
		{
			$tanggal	= tgl_indo($r['tgl_masuk']);
			$harga		= format_rupiah($r['harga']);
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$r['nama_produk'].'</td>
					<td>'.$harga.'</td>
					<td align="center">'.$r['stok'].'</td>
					<td>'.$tanggal.'</td>
					<td>
						<a href="?module=produk&act=editproduk&id='.$r['id_produk'].'">Edit</a> | 
						<a href="modul/mod_produk/aksi_produk.php?module=produk&act=hapus&id='.$r['id_produk'].'" onclick="return confirmSubmit(\''.$r['nama_produk'].'\',\''.$r['id_produk'].'\')">Hapus</a>
					</td>
				</tr>';
			$no++;
		}
		echo "</table>";
		$halaman		= isset($_GET['halaman']) ? $_GET['halaman'] : 1;
		$jmldata 		= mysql_num_rows(mysql_query("SELECT * FROM produk"));
		$jmlhalaman  	= $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman 	= $p->navHalaman($halaman, $jmlhalaman);

		echo "<div id=paging>Hal: $linkHalaman</div><br>";