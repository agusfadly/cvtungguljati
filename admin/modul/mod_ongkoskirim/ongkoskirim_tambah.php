    echo "<div class='top_admin_box'><h2>Tambah Ongkos Kirim</h2></div>
          <form method=POST action='$aksi?module=ongkoskirim&act=input'>
          <table>
          <tr><td>Nama Kota</td><td> : <input type=text name='nama_kota'></td></tr>
          <tr><td>Ongkos Kirim</td><td> : <input type=text name='ongkos_kirim' size=7></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";