<?php
if ($_POST)
{
	$rror = false;
	if ($_POST['nama_produk']=="")
	{
		$rror 			= true;
		$_nama_produk 	= 'Nama produk harus diisi.';
	}
	if($_POST['harga']=="")
	{
		$rror 	= true;
		$_harga = 'Harga produk harus diisi.';
	}
	elseif (!is_numeric($_POST['harga']))
	{
		$rror 	= true;
		$_harga = 'Harga produk harus angka.';
	}
	if($_POST['stok']=="")
	{
		$rror 	= true;
		$_stok	= 'Stok produk harus diisi.';
	}
	elseif (!is_numeric($_POST['stok']))
	{
		$rror 	= true;
		$_stok 	= 'Stok produk harus angka.';
	}
	if($_POST['berat']!="" && !is_numeric($_POST['berat']))
	{
		$rror 	= true;
		$_berat	= 'Berat produk harus dalam angka.';
	}	
	if ($_POST['deskripsi']=="")
	{
		$rror 			= true;
		$_deskripsi 	= 'Deskripsi produk harus diisi.';
	}
	if (!$rror)
	{ 
		$produk_seo      = seo_title($_POST['nama_produk']);
		
		if ($_FILES['gambar']['name'] != '')
		{			
			$lokasi_file    = $_FILES['gambar']['tmp_name'];
			$tipe_file      = $_FILES['gambar']['type'];
			$nama_file      = $_FILES['gambar']['name'];
			$acak           = rand(1,99);
			$nama_file_unik = $acak.$nama_file;
			UploadImage($nama_file_unik);
			unlink($_POST['gambar']);
			@unlink($_POST['gambar_small']);
			mysql_query("UPDATE produk SET nama_produk = '$_POST[nama_produk]', seo='$produk_seo', id_kategori='$_POST[kategori]', harga=$_POST[harga], berat='$_POST[berat]', satuan = '$_POST[satuan]', stok='$_POST[stok]', deskripsi='$_POST[deskripsi]', tgl_masuk = CURRENT_DATE(), gambar = '$nama_file_unik' WHERE id_produk = '$_POST[id_produk]'") or die(mysql_error());
		}
		else
		{
			mysql_query("UPDATE produk SET nama_produk = '$_POST[nama_produk]', seo='$produk_seo', id_kategori='$_POST[kategori]', harga=$_POST[harga], berat='$_POST[berat]', satuan = '$_POST[satuan]', stok='$_POST[stok]', deskripsi='$_POST[deskripsi]', tgl_masuk = CURRENT_DATE() WHERE id_produk = '$_POST[id_produk]'") or die(mysql_error());
		}
		?>
		<script>
		alert('Data berhasil diperbarui.');
		</script>
		<?php
	}
}
$Q	= mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$r  = mysql_fetch_assoc($Q);
?>
<div class='top_admin_box'>
	<h2>Edit Produk</h2>
</div>
<form name="form" method='POST' action="" enctype='multipart/form-data'>
    <table>
        <tr>
			<td width="70">Nama Produk</td>
			<td> : <input type="text" name="nama_produk" size="60" value="<?php echo isset($_POST['nama_produk']) ? $_POST['nama_produk'] : $r['nama_produk']; ?>">
				<input type="hidden" name="id_produk" value="<?php echo $r['id_produk']; ?>">
				<?php echo (isset($_nama_produk)) ? '<br><span class="error">'.$_nama_produk.'</span>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td> : <select name='kategori'>
				<?php
				$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
				while($kategori=mysql_fetch_array($tampil))
				{
					$selected = $kategori['id_kategori'] == $r['id_kategori'] ? 'selected' : '';
					echo "<option value='".$kategori['id_kategori']."' ".$selected.">".$kategori['nama_kategori']."</option>";
				}
				?>
				</select> Pilih Kategori
			</td>
		</tr>
        <tr>
			<td>Harga</td>
			<td> : <input type="text" name='harga' size="10" value="<?php echo isset($_POST['harga']) ? $_POST['harga'] : $r['harga'] ; ?>">
			<?php echo (isset($_harga)) ? '<br><span class="error">'.$_harga.'</span>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td>Berat</td>
			<td> : <input type="text" name='berat' size="4" value="<?php echo isset($_POST['berat']) ? $_POST['berat'] : $r['berat']; ?>" /> *dalam Kg
			<?php echo (isset($_berat)) ? '<br><span class="error">'.$_berat.'</span>' : ''; ?>
			</td>
		</tr>
        <tr>
			<td>Stok</td>
			<td> : <input type="text" name='stok' size="3" value="<?php echo isset($_POST['stok']) ? $_POST['stok'] : $r['stok']; ?>">&nbsp;&nbsp;
				Satuan : <select name='satuan'>
		  		<?php
					$satuan = array('unit','pcs','buah');
					foreach ($satuan as $satuan)
					{
						$selected = $satuan == $r['satuan'] ? 'selected' : ''; 
						echo '<option value="'.$satuan .'" '.$selected.'> '.$satuan .' </option>';
					}
					
				?>
					</select>
			<?php echo (isset($_stok)) ? '<br><span class="error">'.$_stok.'</span>' : ''; ?>
			</td>
		</tr>
        <tr>
			<td valign='top'>Deskripsi</td>
			<td valign="top"> <textarea name='deskripsi' style='width: 450px; height: 250px;'><?php echo isset($_POST['deskripsi']) ? $_POST['deskripsi'] : $r['deskripsi']; ?></textarea></td>
		</tr>
        <tr>
			<td valign="top">Gambar</td>
			<td valign="top"> : <img src="../gambar_produk/<?php echo $r['gambar']; ?>" width="200" height="150"><br/>
				<input type="file" name='gambar' size="40"> <input type="hidden" name='gambar' value="../gambar_produk/<?php echo $r['gambar']; ?>" /> <input type="hidden" name='gambar_small' value="../gambar_produk/small_<?php echo $r['gambar']; ?>" /> 
                                          <br>Biarkan kosong jika gambar tidak diganti
										  <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px				
				<?php echo (isset($_gambar)) ? '<br><span class="error">'.$_gambar.'</span>' : ''; ?>
			</td>
		</tr>
        <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=location='media.php?module=produk'></td></tr>
          </table></form>";