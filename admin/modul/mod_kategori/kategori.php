<script LANGUAGE="JavaScript"> 
<!-- 
function confirmSubmit(ttt) {
var msg;
msg= "Anda yakin akan menghapus kategori " + ttt + "?";
var agree=confirm(msg);
if (agree)
return true ;
else
return false ;
}
function validateForm()
	{
		var z=document.forms["form"]["nama_kategori"].value;
		if (z=="")
		{
			alert("Anda belum mengisikan Kategori :)");
			return false;		
		}
	
	}
// -->
</script>
<?php
$aksi 	= "modul/mod_kategori/aksi_kategori.php";
$act 	= isset($_GET['act']) ? $_GET['act'] : '';
switch ($act)
{
  // Tampil Kategori
  default:
    echo "<div class='top_admin_box'><h2>Kategori</h2></DIV>
          <input type=button value='Tambah Kategori' 
          onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">
          <table id='list'>
          <tr><th>no</th><th>Nama kategori</th><th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_kategori]</td>
             <td><a href=?module=kategori&act=editkategori&id=$r[id_kategori]>Edit</a> | 
	               <a onclick=\"return confirmSubmit('$r[nama_kategori]')\" href=$aksi?module=kategori&act=hapus&id=$r[id_kategori]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Kategori
  case "tambahkategori":
    echo "<div class='top_admin_box'><h2>Tambah Kategori</h2></div>
          <form method=POST action='$aksi?module=kategori&act=input' name='form' onSubmit='return validateForm()'>
          <table>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_kategori'></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Kategori  
  case "editkategori":
    $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='top_admin_box'><h2>Edit Kategori</h2></div>
          <form method=POST action=$aksi?module=kategori&act=update name='form' onSubmit='return validateForm()'>
          <input type=hidden name=id value='$r[id_kategori]'>
          <table>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_kategori' value='$r[nama_kategori]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
