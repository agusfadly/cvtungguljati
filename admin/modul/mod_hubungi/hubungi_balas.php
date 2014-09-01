<?php
$tampil = mysql_query("SELECT * FROM kontak WHERE id_kontak='$_GET[id]'");
$r      = mysql_fetch_array($tampil);

    echo "<div class='top_admin_box'><h2>Reply Email</h2></div>
          <form method=POST action='?module=hubungi&act=kirimemail'>
          <table>
          <tr><td>Kepada</td><td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>Subjek</td><td> : <input type=text name='subjek' size=50 value='Re: $r[subjek]'></td></tr>
          <tr><td>Pesan</td><td> <textarea name='pesan' style='width: 400px; height: 150px;'><br><br><br><br>     
  -------------------------------------------------------------------------------------------------------
  $r[pesan]</textarea></td></tr>
          <tr><td colspan=2><input type=submit value=Kirim>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";