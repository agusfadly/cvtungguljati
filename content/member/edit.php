<?php
function do_update($nama, $email, $alamat1, $alamat2, $kota, $provinsi, $kode_pos)
{
	$sql 	= "UPDATE member
		SET nama = '$nama', 
			email = '$email', 
			alamat1 = '$alamat1', 
			alamat2 = '$alamat2', 
			kota = '$kota', 
			provinsi = '$provinsi', 
			kode_pos = '$kode_pos'
		WHERE member_id = '$_SESSION[member_id]'";
	$Q		= mysql_query($sql);
	if ($Q)
	{
		$_SESSION['member_nama']	= $nama;
		$_SESSION['member_email'] 	= $email;
		header('Location: '.BASE_URL.'member');
	}
	else
	{
		?>
		<script>
		alert('Kesalahan sistem. Silahkan coba lagi.');
		</script>
		<?php	
	}
}
if ($_POST)
{
	$error = false;
	if ($_POST['nama'] == '')
	{
		$error 		= true;
		$e_nama 	= 'Anda belum mengisi nama';
	}
	if ($_POST['email'] == '')
	{
		$error 		= true;
		$e_email 	= 'Anda belum mengisi e-mail';
	}
	if (!$error)
	{
		do_update($_POST['nama'], $_POST['email'], $_POST['alamat1'], $_POST['alamat2'], $_POST['kota'], $_POST['provinsi'], $_POST['kode_pos'] );
	}
}

$sql = "SELECT * FROM member WHERE member_id = '$_SESSION[member_id]'";
$Q	= mysql_query($sql);
$member = mysql_fetch_assoc($Q);
//var_dump($member);
?>
<h1>Edit Profil Saya</h1>
<div class="detailbox">
	<div>
		<form action="" method="post">
			<table>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Nama</td>
					<td> : </td>
					<td><input type="text" name="nama" value="<?php echo $member['nama']; ?>" /></td>
				</tr>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Email</td>
					<td> : </td>
					<td><input type="text" name="email" value="<?php echo $member['email']; ?>" /></td>
				</tr>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Alamat1</td>
					<td> : </td>
					<td><textarea name="alamat1"><?php echo $member['alamat1']; ?></textarea><br/>
					</td>
				</tr>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Alamat2</td>
					<td> : </td>
					<td><textarea name="alamat2"><?php echo $member['alamat2']; ?></textarea>
					</td>
				</tr>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Kota</td>
					<td> : </td>
					<td><input type="text" name="kota" value="<?php echo $member['kota']; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Provinsi</td>
					<td> : </td>
					<td><input type="text" name="provinsi" value="<?php echo $member['provinsi']; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<?php echo isset($e_login) ? '<span class="error">'.$e_login.'</span>' : ''; ?>
					<td>Kode Pos</td>
					<td> : </td>
					<td><input type="text" name="kode_pos" value="<?php echo $member['kode_pos']; ?>" />
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="Update" /></td>
				</tr>
			</table>
		</form>
	</div><!--end login container -->          
</div>