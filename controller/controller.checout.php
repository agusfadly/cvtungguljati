<?php

$action = isset($_GET['action']) ? $_GET['action'] : 'default';

if ($action == 'default')
{
//unset($_SESSION['cart']);
?>
	<h1>Keranjang Belanja</h1>
	<div class="detailbox">
		<?php if (isset($_SESSION['cart'])) : ?>
			<div class="cart" >
				<table>
					<tr>
						<td width="5%">
							No.
						</td>
						<td width="40%">
							Nama
						</td>
						<td width="10%">
							Jumlah
						</td>
						<td width="20%">
							Harga
						</td>
						<td width="25%">
							Total
						</td>
					</tr>
					<?php
					$no 			= 1;
					$grand_total 	= 0;
					foreach($_SESSION['cart'] as $id => $row)
					{
						$total = $row['jumlah'] * $row['harga'];
						echo '<tr>
						<td width="5%" style="text-align:center;">
							'.$no.'
						</td>
						<td width="40%">
							<a href="'.BASE_URL.'produk/detail-'.$row['seo'].'">'.$row['nama_produk'].'</a>
						</td>
						<td width="10%" style="text-align:center;">
							'.$row['jumlah'].'
						</td>
						<td width="20%" style="text-align:right;">
							<span style="float:left;">Rp</span>'.indo_uang($row['harga']).'
						</td>
						<td width="25%" style="text-align:right;">
							<span style="float:left;">Rp</span>'.indo_uang($total).'
						</td>
						</tr>';
						$no++;
						$grand_total += $total;
					}
					?>
					<tr>
						<td colspan="4" style="text-align:center; font-weight:bold;">
							Total
						</td>
						<td width="25%" style="text-align:right;">
							<span style="float:left;">Rp</span><?php echo indo_uang($grand_total); ?>
						</td>
					</tr>
				</table>
			</div>
			<div class="cart-footer">
				<a href="<?php echo BASE_URL.'checkout'; ?>">CHECKOUT</a>
			</div>
		<?php else : ?>
			<h1>Maaf, keranjang belanja Anda masih kosong.</h1>
		<?php endif; ?>
	</div>
<?php
}
elseif ($action == 'tambah')
{
	$seo	= $_GET['seo'];
	$produk = get_produk_by_seo($seo);
  
	if ($produk['stok'] == 0)
	{
		?>
		<script>
		alert("Maaf, stok '<?php echo $produk['nama_produk']; ?> habis.");
		location = '<?php echo BASE_URL.'produk/detail-'.$seo; ?>';
		</script>	
		<?php
	}
	else
	{
		if (!isset($_SESSION['cart']))
			$_SESSION['cart'] = array();
		if (!array_key_exists($produk['id_produk'], $_SESSION['cart']))
		{
			$_SESSION['cart'][$produk['id_produk']] = array(
				'id_kategori'	=> $produk['id_kategori'],
				'nama_produk' 	=> $produk['nama_produk'],
				'harga' 		=> $produk['harga'],
				'berat' 		=> $produk['berat'],
				'satuan' 		=> $produk['satuan'],
				'gambar' 		=> $produk['gambar'],
				'seo' 			=> $produk['seo'],
				'jumlah' 		=> 1
			);
		}
		else
		{
			$_SESSION['cart'][$produk['id_produk']]['jumlah'] += 1;
		}
		update_stok($produk['id_produk']);
		echo '<script>document.location = "'.BASE_URL.'cart";</script>';// check if the product is already
		
	}
}	
else
{
	show_404();
}