<?php
echo "<div class='top_admin_box'><h2>Hubungi Kami</h2></div>
          <table id='list'>
          <tr><th>no</th><th>nama</th><th>email</th><th>subjek</th><th>tanggal</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM kontak ORDER BY id_kontak DESC LIMIT $posisi, $batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r['tanggal']);
      echo "<tr><td>$no</td>
                <td>$r[nama]</td>
                <td><a href=?module=hubungi&act=balasemail&id=$r[id_kontak]>$r[email]</a></td>
                <td>$r[subjek]</td>
                <td>$tgl</a></td>
                <td><a onclick=\"return confirmSubmit()\" href=$aksi?module=hubungi&act=hapus&id=$r[id_kontak]>Hapus</a>
                </td></tr>";
    $no++;
    }
    echo "</table>";
    $jmldata		= mysql_num_rows(mysql_query("SELECT * FROM kontak"));
    $jmlhalaman  	= $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman	= $p->navHalaman($_GET['halaman'], $jmlhalaman);
	if ( $jmldata > $batas )
		echo "<div id=paging>Hal: $linkHalaman</div><br>";
?>
<script> 
<!-- 
function confirmSubmit() {
	var agree=confirm("Anda yakin akan menghapus?");
	if (agree)
		return true ;
	else
		return false ;
}
// -->
</script>