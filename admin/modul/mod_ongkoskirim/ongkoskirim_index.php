<?php
 echo "<div class='top_admin_box'><h2>Ongkos Kirim</h2></DIV>
          <input type=button value='Tambah Ongkos Kirim' 
          onclick=\"window.location.href='?module=ongkoskirim&act=tambahongkoskirim';\">
          <table id='list'>
          <tr><th>no</th><th>nama kota</th><th>ongkos kirim</th><th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM kota ORDER BY id_kota DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       $ongkos = format_rupiah($r['ongkos_kirim']);
       echo "<tr><td>$no</td>
             <td>$r[nama_kota]</td>
             <td align=right>$ongkos</td>
             <td><a href=?module=ongkoskirim&act=editongkoskirim&id=$r[id_kota]>Edit</a> | 
	               <a onclick=\"return confirmSubmit('$r[nama_kota]')\" href=$aksi?module=ongkoskirim&act=hapus&id=$r[id_kota]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
?>
<script> 
<!-- 
function confirmSubmit(ttt) {
	var msg;
	msg= "Anda yakin akan menghapus kota " + ttt + " dari daftar pengiriman?";
	var agree=confirm(msg);
	if (agree)
		return true ;
	else
		return false ;
}
// -->
</script>