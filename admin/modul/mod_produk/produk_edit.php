<?php
$edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$r    = mysql_fetch_array($edit);
echo "<div class='top_admin_box'><h2>Edit Produk</h2></div>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=update>
          <input type=hidden name=id value='".$r['id_produk'].">
          <table>
          <tr><td width=70>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60 value='".$r['nama_produk']."'></td></tr>
          <tr><td>Kategori</td>  <td> : <select name='kategori'>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          while($w=mysql_fetch_array($tampil))
		  {
            if ($r['id_kategori']==$w['id_kategori']){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }
    echo "</select></td></tr>
		 <tr><td>Vendor</td>  <td> : <select name='vendor'>";
 
          $tampil2=mysql_query("SELECT * FROM vendor ORDER BY nama_vendor");
			
          while($w2=mysql_fetch_array($tampil2)){
            if ($r[id_vendor]==$w[id_vendor]){
              echo "<option value=$w2[id_vendor] selected>$w2[nama_vendor]</option>";
            }
            else{
              echo "<option value=$w2[id_vendor]>$w2[nama_vendor]</option>";
            }
          }
    echo "</select></td></tr>		
          <tr><td>Harga</td>     <td> : <input type=text name='harga' value=$r[harga] size=10>Harga Awal: <input type=text name='h_awal' value=$r[h_awal] size=10>Ongkir: <input type=text name='ongkir' value=$r[ongkir] size=8></td></tr>
		   <tr><td>Dimensi(PxLxT)</td><td> : <input type=text name='dimensi' value=$r[dimensi] size=10>&nbsp;&nbsp;Berat :  <input type=text name='berat' value=$r[berat] size=4>*dalam Kg</td></tr>
          <tr><td>Stok</td>     <td> : <input type=text name='stok' value=$r[stok] size=3>&nbsp;&nbsp;Promo : <select name='promo'>
		  																					<option value='off' selected> Off </option>
																							<option value='on' selected> On </option>
																							</select>
									&nbsp;&nbsp;Segera Hadir : <select name='soon'>
		  																					<option value='off' selected> Off </option>
																							<option value='on' selected> On </option>
																							</select></td></tr>
          <tr><td valign='top'>Deskripsi</td>   <td> <textarea name='deskripsi' style='width: 450px; height: 250px;'>$r[deskripsi]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  
          <img src='../foto_produk/small_$r[gambar]'></td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='gambar' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";