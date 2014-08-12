<?php
$sql = "SELECT k.nama_kategori, k.seo AS seo_kategori, p.*
	FROM kategori AS k
		INNER JOIN produk AS p ON k.id_kategori = p.id_kategori
	WHERE p.seo = '".$_GET['seo']."'";
$Q = mysql_query($sql);
if (mysql_num_rows($Q) < 1) :
	show_404();
else :
	$row = mysql_fetch_assoc($Q);
	echo '<h1>Produk / Detail '.$row['nama_produk'].'</h1>';
	?>
	<div class="detailbox">
		<h3><?php echo $row['nama_produk']; ?></h3>
		<img src="<?php echo BASE_URL; ?>images/<?php echo $row['gambar']; ?>" width="186" height="190" alt="photo 1"/>
		<p><b>Harga:</b> Rp <b><?php echo indo_uang($row['harga']); ?></b></p>
		<p><?php echo $row['deskripsi']; ?></p>
		<p><b>Stok:</b> <?php echo $row['stok'].' '.$row['satuan']; ?></p>
		<p><b>Berat:</b> <?php echo $row['berat']; ?> kg</p>
		<p><b>Ongkos kirim:</b> Rp <?php echo indo_uang($row['ongkir']); ?> /kg</p>
		<p class="readmore"><a href="<?php echo BASE_URL.'cart/tambah-'.$row['seo']; ?>">BELI <b>PRODUK</b></a></p>
		<div class="clear"></div>
	</div>
	<?php
endif;