<?php
$sql = "SELECT k.nama_kategori
	FROM kategori AS k
	WHERE k.seo = '".$_GET['seo']."'";
$Q = mysql_query($sql);
$k = mysql_fetch_assoc($Q);

echo '<h1>Produk / Kategori '.$k['nama_kategori'].'</h1>';

$sql = "SELECT nama_kategori, nama_produk, deskripsi, gambar, harga, p.seo, stok, satuan
	FROM kategori AS k
		INNER JOIN produk AS p ON k.id_kategori = p.id_kategori
	WHERE k.seo = '".$_GET['seo']."'";
$Q = mysql_query($sql);
if (mysql_num_rows($Q) < 1) :
	echo '<p>Belum ada produk pada kategori ini.</p>';
else :
	$i = 1;
	while($row = mysql_fetch_assoc($Q)) :	
		$position = ($i%2 == 0) ? 'rightbox' : 'leftbox';
	?>
		<div class="leftbox">
			<h3><?php echo $row['nama_produk']; ?></h3>
			<img src="<?php echo BASE_URL; ?>images/<?php echo $row['gambar']; ?>" width="93" height="95" alt="photo 1" class="left" />
			<p><b>Harga:</b> Rp <b><?php echo indo_uang($row['harga']); ?></b></p>
			<p><?php echo break_description($row['deskripsi'], 50); ?> ...</p>
			<p><b>Stok:</b> <?php echo $row['stok'].' '.$row['satuan']; ?></p>
			<p class="readmore"><a href="<?php echo BASE_URL.'produk/detail-'.$row['seo']; ?>">DETAIL <b>PRODUK</b></a></p>
			<div class="clear"></div>
		</div>
	<?php
		echo ($i%2 == 0) ? '<div class="clear"></div>' : '';
		$i++;
	endwhile;
endif;