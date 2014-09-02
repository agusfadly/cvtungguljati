<?php
function simpan_kontak($nama, $email, $subjek, $pesan)
{
	$sql = "INSERT INTO kontak(nama, email, subjek, pesan, tanggal)
		VALUES ('$nama', '$email', '$subjek', '$pesan', CURRENT_DATE)";
	
	return mysql_query($sql);
}

if($_POST)
{
	$error = false;
	// strip_tags() all post
	foreach($_POST as $key=>$value)
	{
		$_POST[$key] = strip_tags($_POST[$key]);
	}
	
	if($_POST['nama'] == '')
	{
		$error 	= true;
		$e_nama	= 'Nama harus diisi.';
	}
	else
	{
		$nama 	= filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
	}
	
	if($_POST['email'] == '')
	{
		$error 		= true;
		$e_email	= 'Email harus diisi.';
	}
	else
	{
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$error 		= true;
			$e_email	= 'Format Email salah.';
		}
		else
		{
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		}
	}
	
	if($_POST['pesan'] == '')
	{
		$error 		= true;
		$e_pesan	= 'Pesan harus diisi.';
	}
	else
	{
		$pesan = filter_var($_POST['pesan'], FILTER_SANITIZE_STRING);
	}
	
	if($_POST['subjek'] == '')
	{
		$error 		= true;
		$e_subjek	= 'Subjek harus diisi.';
	}
	else
	{
		$subjek = filter_var($_POST['subjek'], FILTER_SANITIZE_STRING);
	}
	
	if (!$error)
	{
		$success = simpan_kontak($nama, $email, $subjek, $pesan);
		
		// freeup $_POST variables
		foreach($_POST as $key=>$value)
		{
			unset($_POST[$key]);
		}
	}
}
?>
<h1>Hubungi Kami</h1>
<div class="detailbox">
	<?php echo (isset($success)) ? '<p>Data berhasil terkirim. Kami akan segera meresponya.</p>' : ''; ?>
	<form action="" method="post">
			<table>
				<tr valign="top">
					<td>Nama</td>
					<td> : </td>
					<td>
						<input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>" /><br/>
						<?php echo isset($e_nama) ? '<span class="error">'.$e_nama.'</span>' : ''; ?>
					</td>
				</tr>
				<tr valign="top">
					<td>Email</td>
					<td> : </td>
					<td>
						<input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" /><br/>
						<?php echo isset($e_email) ? '<span class="error">'.$e_email.'</span>' : ''; ?>
					</td>
				</tr>
				<tr valign="top">
					<td>Subjek</td>
					<td> : </td>
					<td>
						<input type="text" name="subjek" value="<?php echo isset($_POST['subjek']) ? $_POST['subjek'] : ''; ?>" /><br/>
						<?php echo isset($e_subjek) ? '<span class="error">'.$e_subjek.'</span>' : ''; ?>
					</td>
				</tr>
				<tr valign="top">
					<td>Pesan</td>
					<td> : </td>
					<td>
						<textarea name="pesan" cols="30" rows="5"><?php echo isset($_POST['pesan']) ? $_POST['pesan'] : ''; ?></textarea><br/>
						<?php echo isset($e_pesan) ? '<span class="error">'.$e_pesan.'</span>' : ''; ?>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="Kirim" /></td>
				</tr>
			</table>
		</form>
	<div class="clear"></div>
</div>