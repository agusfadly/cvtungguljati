<?php
if ($_POST)
{
	$sql 	= "UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id]'";
	$update = mysql_query($sql);
	if ($update)
	{
		$success = 'Data pesanan berhasil diperbaharui.';
		if ((isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'www.cvtungguljati.com' || $_SERVER['HTTP_HOST'] == 'cvtungguljati.com')) || $_SERVER['SERVER_NAME'] == 'www.cvtungguljati.com' || $_SERVER['SERVER_NAME'] == 'cvtungguljati.com')
		{	
			$body_mail = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head><body>
	<h1>Pelanggan yang terhormat.</h1>
	<p>Saat ini status pemesanan Anda dengan nomor invoice #'.$_POST['id'].' dalam status '.$_POST['status_order'].'</p>
	<p>Silahkan login <a href="http://cvtungguljati.com/member/login"> untuk melihat status pemesanan Anda</a>.</p><br/>
	<p>Terimakasih telah berbelanja di <a href="http://cvtungguljati.com/">CV Tunggul Jati</a>.</p>
	</body>
	</html>';
			$headers = "From: noreply@cvtungguljati.com\r\n";
			$headers .= "Reply-to: noreply@cvtungguljati.com\r\n";
			$headers .= "Content-type: text/html";
			$mail_sent = mail($email, "Status Pemesanan #".$_POST['id']." - CV Tunggul Jati", $body_mail, $headers);
			$success = ($mail_sent) ? $success : 'Data pesanan berhasil diperbaharui namun sistem gagal mengirim email.';
		}
	}
	else
	{
		$success = 'Data pesanan gagal diperbaharui.';
	}
	?>
	<script>
	alert('<?php echo $success; ?>');
	location = 'media.php?module=order';
	</script>
	<?php
}
$edit	= mysql_query("SELECT * FROM orders WHERE id_orders='$_GET[id]'");
$r    	= mysql_fetch_array($edit);
$tanggal= tgl_indo($r['tgl_order']);

$pilihan_status = array('Baru', 'Lunas', 'Dikirim');
$pilihan_order 	= '';
foreach ($pilihan_status as $status)
{
	$pilihan_order .= "<option value='$status'";
	if ($status == $r['status_order'])
	{
	    $pilihan_order .= " selected";
	}
	$pilihan_order .= ">$status</option>\r\n";
}
echo "<div class='top_admin_box'><h2>Detail Order</h2></div>
          <form method='POST' action=''>
          <input type='hidden' name='id' value=$r[id_orders]>
          <table>
          <tr><td>No. Order</td>        <td> : $r[id_orders]</td></tr>
          <tr><td>Tgl. & Jam Order</td> <td> : $tanggal  $r[jam_order]</td></tr>
          <tr><td>Status Order      </td><td>: <select name='status_order'>$pilihan_order</select> 
          <input type='submit' value='Ubah Status'></td></tr>
          </table></form>";

// tampilkan rincian produk yang di order
$sql = mysql_query("SELECT * FROM orders_detail, produk 
                     WHERE orders_detail.id_produk=produk.id_produk 
                     AND orders_detail.id_orders='$_GET[id]'");
  
echo "<table border=0 width=500><tr><th>Nama Produk</th><th>Jumlah</th><th>Harga Satuan</th><th>Sub Total</th></tr>";
$total = 0;
while($s=mysql_fetch_array($sql))
{
     // rumus untuk menghitung subtotal dan total		
    $subtotal    = $s['harga'] * $s['jumlah'];
    $total       = $total + $subtotal;
    echo "<tr><td>$s[nama_produk]</td><td>$s[jumlah]</td><td>Rp. ".format_rupiah($s['harga'])."</td><td>Rp. ".format_rupiah($subtotal)."</td></tr>";
}

  $ongkos		= mysql_fetch_array(mysql_query("SELECT * FROM kota,orders WHERE orders.id_kota=kota.id_kota AND id_orders='$_GET[id]'"));
  $ongkoskirim	= $ongkos['ongkos_kirim'];
  $grandtotal   = $total + $ongkoskirim;
echo "<tr><td colspan=3 align=right>Total : </td><td>Rp. <b>".format_rupiah($total)."</b></td></tr>
      <tr><td colspan=3 align=right>Ongkos Kirim : </td><td>Rp. <b>".format_rupiah($ongkoskirim)."</b></td></tr>      
      <tr><td colspan=3 align=right>Grand Total : </td><td>Rp. <b>".format_rupiah($grandtotal)."</b></td></tr>
      </table>";

  // tampilkan data kustomer
  echo "<table border=0 width=500>
        <tr><th colspan=2>Data Kustomer</th></tr>
        <tr><td>Nama Pembeli</td><td> : $r[nama_customer]</td></tr>
        <tr><td>Alamat Pengiriman</td><td> : $r[alamat_lengkap]</td></tr>
        <tr><td>No. Telpon/HP</td><td> : $r[telpon]</td></tr>
        <tr><td>Email</td><td> : $r[email]</td></tr>
        </table>";
