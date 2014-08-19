<?php
// class paging untuk halaman administrator
class Paging {
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas)
	{
		if(empty($_GET['cat-page']))
		{
			$posisi=0;
			$_GET['cat-page']=1;
		}
		else
		{
			$posisi = ($_GET['cat-page']-1) * $batas;
		}
		return $posisi;
	}

	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas)
	{
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	// Fungsi untuk link halaman 1,2,3 (untuk admin)
	function navHalaman($halaman_aktif, $jmlhalaman)
	{
		$link_halaman = "";

		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++)
		{
			if ($i == $halaman_aktif)
			{
				$link_halaman .= "<b>$i</b> | ";
			}
			else
			{
				$link_halaman .= "<a href=$_SERVER[PHP_SELF]?page=$_GET[page]&cat-page=$i>$i</a> | ";
			}
			$link_halaman .= " ";
		}
		return $link_halaman;
	}
}


// class paging untuk halaman produk (menampilkan semua produk) 
class Paging2 {
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas)
	{
		if(empty($_GET['halaman']))
		{
			$posisi	= 0;
			$_GET['halaman'] = 1;
		}
		else
		{
			$posisi = ($_GET['halaman']-1) * $batas;
		}
		return $posisi;
	}

	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas)
	{
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	// Fungsi untuk link halaman 1,2,3 
	function navHalaman($halaman_aktif, $jmlhalaman)
	{
		$link_halaman = "";

		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++)
		{
			if ($i == $halaman_aktif){
				$link_halaman .= "<b>$i</b> | ";
			}
			else
			{
				$link_halaman .= "<a href=?module=produk&halaman=$i>$i</a> | ";
			}
			$link_halaman .= " ";
		}
		return $link_halaman;
	}
}


// class paging untuk halaman kategori (menampilkan semua kategori)
class Paging3{
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas)
	{
		switch(@$_GET['page'])
		{
			case 'category' :
					if(empty($_GET['cat-page']))
					{
						$posisi=0;
						$_GET['cat-page']=1;
					}
					else
					{
						$posisi = ($_GET['halkategori']-1) * $batas;
					}
				break;
			case 'vendor' :
					if(empty($_GET['vendor-page']))
					{
						$posisi=0;
						$_GET['vendor-page']=1;
					}
					else
					{
						$posisi = ($_GET['vendor-page']-1) * $batas;
					}
				break;		
		}
		return @$posisi;
	}

	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas)
	{
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	// Fungsi untuk link halaman 1,2,3 
	function navHalaman($halaman_aktif, $jmlhalaman)
	{
		$link_halaman = "";
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		switch($page)
		{
			case 'category' :
					// Link halaman 1,2,3, ...
					for ($i=1; $i<=$jmlhalaman; $i++)
					{
						if ($i == $halaman_aktif)
						{
							$link_halaman .= "<b>$i</b> | ";
						}
						else
						{
							$link_halaman .= "<a href=$_SERVER[PHP_SELF]?page=$_GET[page]&cat-page=$i>$i</a> | ";
						}
						$link_halaman .= " ";
					}
				break;
			case 'vendor' :
					// Link halaman 1,2,3, ...
					for ($i=1; $i<=$jmlhalaman; $i++)
					{
						if ($i == $halaman_aktif)
						{
							$link_halaman .= "<b>$i</b> | ";
						}
						else
						{
							$link_halaman .= "<a href=$_SERVER[PHP_SELF]?page=$_GET[page]&cat-page=$i>$i</a> | ";
						}
						$link_halaman .= " ";
					}
				break;		
		}
		return $link_halaman;
	}
}