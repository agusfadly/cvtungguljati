<?php

$sql = 'SELECT *
	FROM produk';
$Q = mysql_query($sql);
$i = 1;
while($row = mysql_fetch_assoc($Q)) :	
	$position = ($i%2 == 0) ? 'rightbox' : 'leftbox';
?>
	<div class="<?php echo $position; ?>">
		<h3><?php echo $row['nama_produk']; ?></h3>
		<img src="<?php echo BASE_URL; ?>gambar_produk/<?php echo $row['gambar']; ?>" width="93" height="95" alt="photo 1" class="left" />
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