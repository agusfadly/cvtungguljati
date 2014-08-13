<?php

function render_menu()
{
	$sql 	= 'SELECT * FROM kategori';
	$Q 		= mysql_query($sql);
	
	$html 	= '';
	$i 		= 0;
	while($row = mysql_fetch_array($Q))
	{
		$first = ($i == 0) ? 'class="first"' : '';
		$html .= '<dd '.$first.'><a href="'.BASE_URL.'produk/kategori-'.$row['seo'].'">'.$row['nama_kategori'].'</a></dd>';
		$i++;
	}
	return $html;
}

function render_search()
{
	$html = '<dd class="searchform">
				<form action="'.BASE_URL.'" method="GET">
				  <div>
					<select name="cat">
					  <option value="semua" selected="selected">Kategori Produk</option>';
	$sql = 'SELECT * FROM kategori';
	$Q = mysql_query($sql);
	while($row = mysql_fetch_array($Q))
	{
		$html .= '<option value="'.$row['seo'].'">'.$row['nama_kategori'].'</option>';
	}
	
	$html .= '</select>
				  </div>
				  <div>
					<input name="q" type="text" value="" class="text" placeholder="Nama Produk" />
					<input name="search" type="hidden" value="true" />
				  </div>
				  <div class="softright">
					<input type="image" src="'.BASE_URL.'images/btn_search.gif" />
				  </div>
				</form>
				</dd>';
	return $html;
}

// HELPER FUNCTION
function indo_tanggal($tanggal)
{
	$tanggal = explode('-',$tanggal);
	return $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];
}

function indo_uang($angka)
{
	return number_format($angka, 2, ',', '.');
}

function break_description($html, $length)
{
	
	$isi_berita = htmlentities(strip_tags($html)); // membuat paragraf pada isi berita dan mengabaikan tag html

    $isi = substr($isi_berita, 0, $length); // ambil sebanyak $length karakter	
	//echo $isi;
    $isi = substr($isi_berita, 0, strrpos($isi, " ")); // potong per spasi kalimat
	//echo $isi;
	return $isi;
}

function show_404()
{
	echo '<h1>Error 404</h1>';
	echo '<p>URL tidak ditemukan.</p>';
}

function tgl_indo($tgl)
{
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}	

function getBulan($bln)
{
	switch ($bln)
	{
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
	}
} 

// SECURITY FUNCTION 
function antiinjection($data)
{
	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
}