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
	if ($_FILES['gambar']['name'] == '')
	{
		$rror 		= true;
		$_gambar	= 'Gambar produk harus diisi.';
	}
	if (!$rror)
	{
		$lokasi_file    = $_FILES['gambar']['tmp_name'];
		$tipe_file      = $_FILES['gambar']['type'];
		$nama_file      = $_FILES['gambar']['name'];
		$acak           = rand(1,99);
		$nama_file_unik = $acak.$nama_file; 
		$produk_seo      = seo_title($_POST['nama_produk']);

		UploadImage($nama_file_unik);
		mysql_query("INSERT INTO produk(nama_produk, seo, id_kategori, harga, berat, stok, deskripsi, tgl_masuk, gambar) 
                            VALUES('$_POST[nama_produk]', '$produk_seo', '$_POST[kategori]', '$_POST[harga]', '$_POST[berat]', '$_POST[stok]', '$_POST[deskripsi]', CURRENT_DATE(), '$nama_file_unik')") or die(mysql_error());
		?>
		<script>
		alert('Data berhasil ditambah.');
		location='media.php?module=produk';
		</script>
		<?php
	}
}
?>
<div class='top_admin_box'>
	<h2>Tambah Produk</h2>
</div>
<form name="form" method='POST' action="" enctype='multipart/form-data'>
    <table>
        <tr>
			<td width="70">Nama Produk</td>
			<td> : <input type="text" name="nama_produk" size="60" value="<?php echo isset($_POST['nama_produk']) ? $_POST['nama_produk'] : ''; ?>">
				<?php echo (isset($_nama_produk)) ? '<br><span class="error">'.$_nama_produk.'</span>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td> : <select name='kategori'>
				<?php
				$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
				while($r=mysql_fetch_array($tampil)){
					echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
				}
				?>
				</select> Pilih Kategori
			</td>
		</tr>
        <tr>
			<td>Harga</td>
			<td> : <input type="text" name='harga' size="10" value="<?php echo isset($_POST['harga']) ? $_POST['harga'] : ''; ?>">
			<?php echo (isset($_harga)) ? '<br><span class="error">'.$_harga.'</span>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td>Berat</td>
			<td> : <input type="text" name='berat' size="4" value="<?php echo isset($_POST['berat']) ? $_POST['berat'] : ''; ?>" /> *dalam Kg
			<?php echo (isset($_berat)) ? '<br><span class="error">'.$_berat.'</span>' : ''; ?>
			</td>
		</tr>
        <tr>
			<td>Stok</td>
			<td> : <input type="text" name='stok' size="3" value="<?php echo isset($_POST['stok']) ? $_POST['stok'] : ''; ?>">&nbsp;&nbsp;Satuan : <select name='satuan'>
		  																					<option value='unit'> unit </option>
		  																					<option value='pcs'> pcs </option>
																							<option value='buah'> buah </option>
																							</select>
			<?php echo (isset($_stok)) ? '<br><span class="error">'.$_stok.'</span>' : ''; ?>
			</td>
		</tr>
        <tr>
			<td valign='top'>Deskripsi</td>
			<td> <textarea name='deskripsi' style='width: 450px; height: 250px;'><?php echo isset($_POST['deskripsi']) ? $_POST['deskripsi'] : ''; ?></textarea></td>
		</tr>
        <tr>
			<td>Gambar</td>
			<td> : <input type="file" name='gambar' size="40"> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px				
				<?php echo (isset($_gambar)) ? '<br><span class="error">'.$_gambar.'</span>' : ''; ?>
			</td>
		</tr>
        <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";