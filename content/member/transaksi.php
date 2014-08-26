<h1>Transaksi Saya</h1>
<?php 
$sql 	= "SELECT * 
	FROM orders 
	WHERE member_id = '$_SESSION[member_id]'
	ORDER BY tgl_order DESC
	LIMIT 1";
$Q		= mysql_query($sql);
$member = mysql_fetch_assoc($Q);
?>
<div class="detailbox">
	<div>
		<?php if (mysql_num_rows($Q) > 0) : ?>
			<table>
				
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Nomor invoice</td>
					<td> : </td>
					<td><?php echo $member['id_orders']; ?></td>
				</tr>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Tanggal Order</td>
					<td> : </td>
					<td><?php echo indo_tanggal($member['tgl_order']); ?></td>
				</tr>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Nama Penerima</td>
					<td> : </td>
					<td><?php echo $member['nama_customer']; ?></td>
				</tr>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Alamat</td>
					<td> : </td>
					<td> 
						<?php echo $member['alamat_lengkap']; ?><br/>
					</td>
				</tr>
			</table>
		<?php else : ?>
			Belum ada transaksi.
		<?php endif; ?>
	</div><!--end login container -->          
</div>