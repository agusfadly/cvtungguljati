  <script type="text/javascript" language="javascript">
function validasiProduk()
	{
		var x=document.forms["form"]["nama_produk"].value;
		var y=document.forms["form"]["harga"].value;
		var z=document.forms["form"]["deskripsi"].value;
		var b=document.forms["form"]["agen"].value;
		var a=document.forms["form"]["file"].value;
		var ext = a.substring(a.lastIndexOf(".") + 1);
		if (x=="" || y=="" || z=="" || a=="" || b=="-")
		{
			alert("Data Anda kurang lengkap :)");
			return false;
			
		}
		else if (ext =="dbf" || ext =="DBF")
		{
			return true;
		}
		else if (ext !="dbf" || ext !="DBF")
		{
			alert("Data harus dalam format .DBF :)");
			return false;
		}
		
	}
</script>
  
  <?php
    echo "<div class='top_admin_box'><h2>Tambah Produk</h2></div>
          <form onSubmit=\"return validasiProduk()\" name=\"form\" method='POST' action='$aksi?module=produk&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td width=70>Nama Produk</td>     <td> : <input type=text name=\"nama_produk\" size=60>";
			if (isset($_GET['f']) AND $_GET['f']=='nama') {
				echo "<br><font color=red>Nama produk sebaiknya diisi</font>";
			}
			echo "</td></tr>";
    echo "<tr><td>Kategori</td>  <td> : 
          <select name='kategori'>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select> Pilih Kategori</td></tr>
			  <tr><td>Vendor</td>  <td> : 
          <select name='vendor'>";
            $data=mysql_query("SELECT * FROM vendor ORDER BY nama_vendor");
            while($r2=mysql_fetch_array($data)){
              echo "<option value=$r2[id_vendor]>$r2[nama_vendor]</option>";//`id_produk` ,  `id_kategori` ,  `id_merk` ,  `nama_produk` ,  `seo` ,  `deskripsi` ,  `dimensi` ,  `berat` ,  `h_awal` ,  `harga` ,  `stok` ,  `tgl_masuk` ,  `gambar` ,  `dibeli` ,  `promo` ,  `soon` 
            }
    		echo "</select> Pilih Vendor</td></tr>
          <tr><td>Harga</td>     <td> : <input type=text name='harga' size=10>";
			if (isset($_GET['f']) AND $_GET['f']=='harga') {
				echo "<br><font color=red>Harga Produk harus diisi</font>";
			}
			echo "</td></tr>
		  <tr><td>Berat</td><td> : <input type=text name='berat' size=4>*dalam Kg</td></tr>
          <tr><td>Stok</td>     <td> : <input type=text name='stok' size=3>&nbsp;&nbsp;Satuan : <select name='satuan'>
		  																					<option value='unit'> unit </option>
		  																					<option value='pcs'> pcs </option>
																							<option value='buah'> buah </option>
																							</select>";
									if (isset($_GET['f']) AND $_GET['f']=='stok') {
							echo "<br><font color=red>Stok harus diisi</font>";
									}
				echo "</td></tr>";
          echo "<tr><td valign='top'>Deskripsi</td>  <td> <textarea name='deskripsi' style='width: 450px; height: 250px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='gambar' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";