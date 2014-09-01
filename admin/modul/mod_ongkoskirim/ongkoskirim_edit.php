<?php
$edit=mysql_query("SELECT * FROM kota WHERE id_kota='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='top_admin_box'><h2>Edit Ongkos Kirim</h2></div>
          <form method=POST action=$aksi?module=ongkoskirim&act=update>
          <input type=hidden name=id value='$r[id_kota]'>
          <table>
          <tr><td>Nama Kota</td><td> : <input type=text name='nama_kota' value='$r[nama_kota]'></td></tr>
          <tr><td>Ongkos Kirim</td><td> : <input type=text name='ongkos_kirim' value='$r[ongkos_kirim]' size=7></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";