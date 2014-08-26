<?php
$sql = "SELECT * FROM member WHERE member_id = '$_SESSION[member_id]'";
$Q	= mysql_query($sql);
$member = mysql_fetch_assoc($Q);
//var_dump($member);
?>
<h1>Profil Saya</h1>
<div class="detailbox">
	<div>
		<table>
			<tr valign="top">
				<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
				<td>Nama</td>
				<td> : </td>
				<td><?php echo $member['nama']; ?></td>
			</tr>
			<tr valign="top">
				<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
				<td>Email</td>
				<td> : </td>
				<td><?php echo $member['email']; ?></td>
			</tr>
			<tr valign="top">
				<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
				<td>Alamat</td>
				<td> : </td>
				<td><?php echo $member['alamat1']; ?><br/>
					<?php echo $member['alamat2']; ?><br/>
					<?php echo $member['kota']; ?><br/>
					<?php echo $member['provinsi']; ?><br/>
					<?php echo $member['kode_pos']; ?><br/>
				</td>
			</tr>
		</table>
	</div><!--end login container -->          
</div>
<h1>Transaksi Terakhir</h1>
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