<?php
$Q 		= mysql_query("SELECT * FROM page WHERE seo='".$_GET['pg']."'");
$data	= mysql_fetch_assoc($Q);
?>

<h1><?php echo $data['judul']; ?></h1>
<div class="detailbox">
	<?php echo $data['isi']; ?>
	<div class="clear"></div>
</div>