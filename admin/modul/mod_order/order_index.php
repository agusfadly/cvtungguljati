<?php
echo "<div class='top_admin_box'><h2>Data Order</h2></div>
          <table id='list' width=100%>
          <tr><th>No</th><th>Nama konsumen</th><th>tgl. order</th><th>jam</th><th>status</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM orders ORDER BY id_orders DESC LIMIT $posisi,$batas");
	$no=$posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r['tgl_order']);
      echo "<tr><td align=center>$r[id_orders]</td>
                <td>$r[nama_customer]</td>
                <td>$tanggal</td>
                <td>$r[jam_order]</td>
                <td>$r[status_order]</td>
		            <td><a href=?module=order&act=detailorder&id=$r[id_orders]>Detail</a></td></tr>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM orders"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";