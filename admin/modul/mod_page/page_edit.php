<?php
if ($_POST)
{
	$error = false;
	if ($_POST['judul'] == '')
	{
		$error 		= true;
		$e_judul 	= 'Judul harus diisi';
	}
	if ($_POST['isi'] == '')
	{
		$error	= true;
		$e_isi	= 'Deskripsi harus diisi';
	}
	if (!$error)
	{
		$sql = "UPDATE page
		SET judul = '".$_POST['judul']."',
			isi = '".$_POST['isi']."',
			last_update = CURRENT_DATE()
		WHERE id = '".$_POST['id']."'";
		//echo $sql;
		if (mysql_query($sql))
		{
			$success = 'Data berhasil diperbaharui.';
		}
		else
		{
			mysql_error();
		}
	}
}
$edit = mysql_query("SELECT * FROM page WHERE id='$_GET[id]'");
$r    = mysql_fetch_array($edit);
?>
<div class='top_admin_box'>
	<h2>Edit Page</h2>
</div>
<?php echo isset($success) ? '<span class="success">'.$success.'</span>' : ''; ?>
<form method='POST' enctype='multipart/form-data' action=''>
    <input type='hidden' name='id' value="<?php echo $r['id']; ?>">
    <table>
        <tr>
			<td width="70" valign="top">Judul</td>
			<td> : <input type='text' name='judul' size="60" value="<?php echo $r['judul']; ?>" /><br/>
			<?php echo isset($e_judul) ? '<span class="error">'.$e_judul.'</span>' : ''; ?></td>
		</tr>		
        <tr>
			<td valign='top'>Deskripsi</td>
			<td> <textarea name='isi' style='width: 450px; height: 250px;'><?php echo $r['isi']; ?></textarea><br/>
			<?php echo isset($e_isi) ? '<span class="error">'.$e_isi.'</span>' : ''; ?></td>
		</tr>
        <tr>
			<td colspan="2"><input type="submit" value="Update">
             <input type="button" value="Batal" onclick="location='media.php?module=page'" /></td>
		</tr>
    </table>
</form>