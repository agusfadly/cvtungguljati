-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2014 at 04:36 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi_agus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Agus Paul', 'admin@cvtunguljati.com', '08238923848', 'admin', 'N'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User Biasa', 'userbiasa@cvtunguljati.com', 'xxxxx', 'user', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `seo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `seo`) VALUES
(1, 'Kertas', 'kertas'),
(2, 'Buku', 'buku'),
(3, 'Alat Tulis', 'alat-tulis'),
(10, 'Tape', 'tape'),
(5, 'Post-it', 'post-it'),
(6, 'Lem', 'lem'),
(7, 'Tools', 'tools'),
(8, 'Ordner, Box File', 'ordner-box-file'),
(9, 'Kalkulator', 'kalkulator'),
(11, 'Dokumen Keeper, Clear Sleeves, Map, dll', 'dokumen-keeper-clear-sleeves-map-dll'),
(18, 'Ring Binder', 'ring-binder'),
(19, 'Slide Binder', 'slide-binder'),
(20, 'Ring Spiral', 'ring-spiral'),
(21, 'Karbon Fax', 'karbon-fax'),
(22, 'Flipchart', 'flipchart');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id_kontak` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(2, 'Sari Rizki', 'setoelkahfi@ymail.com', 'Astaganaga', 'hehehehe', '2012-01-11'),
(8, 'Seto El Kahfi', 'setoelkahfi@gmail.com', 'Subjek', 'Pesan', '2012-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos_kirim` int(10) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `ongkos_kirim`) VALUES
(1, 'Jakarta', 13000),
(2, 'Bandung', 13500),
(3, 'Semarang', 10000),
(4, 'Medan', 20000),
(5, 'Aceh', 25000),
(6, 'Banjarmasin', 17500),
(7, 'Balikpapan', 18500),
(8, 'Samarinda', 19500),
(9, 'Lainnya', 10000),
(10, 'Palembang', 23000),
(11, 'Surabaya', 13000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat1` varchar(100) NOT NULL,
  `alamat2` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kode_pos` char(5) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `nama`, `email`, `password`, `alamat1`, `alamat2`, `kota`, `provinsi`, `kode_pos`) VALUES
(1, 'Agus Paul', 'member1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Perumnas II Blok J.16', 'Kelurahan Cibodas', 'Tangerang', 'Banten', '15810'),
(2, 'Member Dua', 'member2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `urutan` int(5) NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=64 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `status`, `aktif`, `urutan`) VALUES
(18, 'PRODUK', '?module=produk', 'admin', 'Y', 4),
(42, 'ORDER', '?module=order', 'admin', 'Y', 6),
(10, 'MANAJEMEN MODUL', '?module=modul', 'admin', 'Y', 2),
(31, 'KATEGORI', '?module=kategori', 'admin', 'Y', 3),
(53, 'KONTAK KAMI', '?module=hubungi', 'user', 'Y', 9),
(51, 'REVIEW PRODUK', '?module=review', 'user', 'Y', 8),
(50, 'VENDOR', '?module=vendor', 'user', 'Y', 5),
(48, 'ONGKOS KIRIM', '?module=ongkoskirim', 'user', 'Y', 6),
(49, 'GANTI PASSWORD', '?module=password', 'user', 'Y', 1),
(54, 'DAFTAR USER', '?module=user', 'user', 'Y', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_orders` int(5) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_order` char(50) NOT NULL,
  `jam_order` time NOT NULL,
  `tgl_order` date NOT NULL,
  `id_kota` int(4) NOT NULL,
  PRIMARY KEY (`id_orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `member_id`, `nama_customer`, `alamat_lengkap`, `telpon`, `email`, `status_order`, `jam_order`, `tgl_order`, `id_kota`) VALUES
(1, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '085715227992', 'setoelkahfi@gmail.com', '', '13:04:02', '2012-01-08', 7),
(2, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '085715227992', 'setoelkahfi@gmail.com', 'Lunas', '13:08:20', '2012-01-08', 7),
(3, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '085715227992', 'setoelkahfi@gmail.com', 'Dikirim', '13:14:12', '2012-01-08', 7),
(4, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '085715227992', 'setoelkahfi@gmail.com', 'Lunas', '13:19:36', '2012-01-08', 7),
(5, 1, 'AGUS Paul', 'sdasd', 'sds', 'setoelkahfi@gmail.com', '', '13:58:29', '2012-01-18', 5),
(6, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', 'ln', 'setoelkahfi@yahoo.co.id', 'Dikirim', '14:01:05', '2012-01-18', 6),
(7, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '99689', 'dyhgfc@gjhkjh.bkm', '', '01:56:09', '2012-01-28', 5),
(8, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '99689', 'dyhgfc@gjhkjh.bkm', '', '02:03:19', '2012-01-28', 5),
(9, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '085715227992', 'setoelkahfi@yahoo.co.id', '', '11:45:03', '2012-02-08', 1),
(10, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '085715227992', 'setoelkahfi@yahoo.co.id', '', '11:47:10', '2012-02-08', 1),
(11, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '085715227992', 'setoelkahfi@yahoo.co.id', '', '11:48:46', '2012-02-08', 1),
(12, 1, 'AGUS Paul', 'Kp Peusar Rt 7 Rw1 Ds Binong Kec. Curug ', '085715227992', 'setoelkahfi@gmail.com', 'Lunas', '04:39:27', '2012-02-16', 5),
(13, 1, 'AGUS Paul', 'Kp Peusar ', '085464', 'setoelkahfi@gmail.com', '', '10:40:25', '2012-03-14', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_produk`, `jumlah`) VALUES
(1, 1, 90),
(1, 4, 2),
(1, 2, 3),
(5, 6, 1),
(6, 1, 1),
(7, 1, 6),
(9, 5, 1),
(9, 11, 1),
(9, 9, 1),
(12, 11, 1),
(13, 8, 1),
(14, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `seo` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` double NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `satuan` char(10) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `seo`, `deskripsi`, `berat`, `harga`, `stok`, `tgl_masuk`, `gambar`, `satuan`) VALUES
(1, 2, 'Seagate 1 TB Hard Composite', 'seagate-1-tb-hard-composite', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 1, 5000000, 7, '2012-01-31', 'photo_1.jpg', 'unit'),
(2, 6, 'Flashdisk Kingston 4GB', 'flashdisk-kingston-4gb', '<h2 style="margin-top: 0.3em; margin-right: 0.3em; margin-bottom: 0.3em; margin-left: 0.3em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-weight: normal; font-size: 20px; color: rgb(51, 51, 51); line-height: 16px; "><strong><font face="arial">Feature of Triton headsets</font></strong></h2><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Triton headsets become one of a true surround&nbsp;<a href="http://goodheadphonesreviews.com/retro-headphones" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">sound headset</a>with a microphone that will work with your PS3, Xbox 360, and PC/Mac. The other features of Triton headsets also released for the audio and movie fans because&nbsp;<span style="text-decoration: underline; ">Triton headset</span>s is compatible with any device that feature a digital optical or 3.5 mm analog 5.1 outputs.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">In addition, Triton headsets has 3D mapping is outstanding, having awesome bass, great treble, the lights are good,&nbsp;<a href="http://goodheadphonesreviews.com/xbox-headphones" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">individual speaker adjustment</a>.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Besides that, Triton headsets are very comfortable to be used so that you can wear this for an entire day. This headset is also&nbsp;<a href="http://goodheadphonesreviews.com/razer-headset" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">easy to setup</a>&nbsp;and having great mic because the microphone also a solid performing component. And according to those features that make Triton headsets become one of most versatile gaming headset in the world.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><h2 style="margin-top: 0.3em; margin-right: 0.3em; margin-bottom: 0.3em; margin-left: 0.3em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-weight: normal; font-size: 20px; color: rgb(51, 51, 51); line-height: 16px; "><strong><font face="arial">Sound That Is Produced By Triton Headsets</font></strong></h2><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Triton headsets able to produce high quality of sound so that you can enjoy your time while playing game, watching movie or even listening to music. By using&nbsp;<em>Triton headsets</em>, it is like playing in the real game because the sound is very clear, comfortable, and the&nbsp;<a href="http://goodheadphonesreviews.com/jaybird-headphones" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">mix amp</a>&nbsp;makes quality very good.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Besides that, if you play games while wearing Triton headsets, you will be able to hear footsteps&nbsp;<a href="http://goodheadphonesreviews.com/sennheiser-earbuds" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">clearly from all directions</a>&nbsp;when you play war games. This condition will make the user more enjoy playing game and it makes it very easy to become completely immersed in the game you are playing.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">In addition, the microphone from Triton&nbsp;<a href="http://goodheadphonesreviews.com/peltor-headsets" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">headsets</a>&nbsp;are also allow you to separate front, center, rear, and subwoofer volume control and it will become easy to customize the sound to the game you will play.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><h2 style="margin-top: 0.3em; margin-right: 0.3em; margin-bottom: 0.3em; margin-left: 0.3em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-weight: normal; font-size: 20px; color: rgb(51, 51, 51); line-height: 16px; "><strong><font face="arial">Design of Triton headsets</font></strong></h2><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Triton headset is designed with stylish, comfortable with colorful lights. Besides that, Triton headsets are also&nbsp;<a href="http://goodheadphonesreviews.com/bang-and-olufsen-headphones" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">ergonomic</a>&nbsp;so that user able to use it with comfortable and getting quality for extended period of time.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">In addition, this headset also comfort padded head rail and ear cups provide lasting comfort and durability to make users enjoy their time while playing games and so.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">In order to give&nbsp;<a href="http://goodheadphonesreviews.com/earbud-covers" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">extra feature</a>, Triton headsets are also using removable flex microphone so that user can get optimum in game chat. However, it is not difficult to get headsets that support your activity and able enjoying music. By those features, designs and quality of sounds you can pick Triton headsets.</font></p>', 0, 100000, 7, '2012-02-05', 'photo_4.jpg', 'pcs'),
(3, 8, 'Headset Simbadda 1200db', 'headset-simbadda-1200db', '<h2 style="margin-top: 0.3em; margin-right: 0.3em; margin-bottom: 0.3em; margin-left: 0.3em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-weight: normal; font-size: 20px; color: rgb(51, 51, 51); line-height: 16px; "><strong><font face="arial">Feature of Triton headsets</font></strong></h2><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Triton headsets become one of a true surround&nbsp;<a href="http://goodheadphonesreviews.com/retro-headphones" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">sound headset</a>with a microphone that will work with your PS3, Xbox 360, and PC/Mac. The other features of Triton headsets also released for the audio and movie fans because&nbsp;<span style="text-decoration: underline; ">Triton headset</span>s is compatible with any device that feature a digital optical or 3.5 mm analog 5.1 outputs.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">In addition, Triton headsets has 3D mapping is outstanding, having awesome bass, great treble, the lights are good,&nbsp;<a href="http://goodheadphonesreviews.com/xbox-headphones" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">individual speaker adjustment</a>.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Besides that, Triton headsets are very comfortable to be used so that you can wear this for an entire day. This headset is also&nbsp;<a href="http://goodheadphonesreviews.com/razer-headset" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">easy to setup</a>&nbsp;and having great mic because the microphone also a solid performing component. And according to those features that make Triton headsets become one of most versatile gaming headset in the world.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><h2 style="margin-top: 0.3em; margin-right: 0.3em; margin-bottom: 0.3em; margin-left: 0.3em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-weight: normal; font-size: 20px; color: rgb(51, 51, 51); line-height: 16px; "><strong><font face="arial">Sound That Is Produced By Triton Headsets</font></strong></h2><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Triton headsets able to produce high quality of sound so that you can enjoy your time while playing game, watching movie or even listening to music. By using&nbsp;<em>Triton headsets</em>, it is like playing in the real game because the sound is very clear, comfortable, and the&nbsp;<a href="http://goodheadphonesreviews.com/jaybird-headphones" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">mix amp</a>&nbsp;makes quality very good.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Besides that, if you play games while wearing Triton headsets, you will be able to hear footsteps&nbsp;<a href="http://goodheadphonesreviews.com/sennheiser-earbuds" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">clearly from all directions</a>&nbsp;when you play war games. This condition will make the user more enjoy playing game and it makes it very easy to become completely immersed in the game you are playing.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">In addition, the microphone from Triton&nbsp;<a href="http://goodheadphonesreviews.com/peltor-headsets" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">headsets</a>&nbsp;are also allow you to separate front, center, rear, and subwoofer volume control and it will become easy to customize the sound to the game you will play.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><h2 style="margin-top: 0.3em; margin-right: 0.3em; margin-bottom: 0.3em; margin-left: 0.3em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-weight: normal; font-size: 20px; color: rgb(51, 51, 51); line-height: 16px; "><strong><font face="arial">Design of Triton headsets</font></strong></h2><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">Triton headset is designed with stylish, comfortable with colorful lights. Besides that, Triton headsets are also&nbsp;<a href="http://goodheadphonesreviews.com/bang-and-olufsen-headphones" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">ergonomic</a>&nbsp;so that user able to use it with comfortable and getting quality for extended period of time.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">In addition, this headset also comfort padded head rail and ear cups provide lasting comfort and durability to make users enjoy their time while playing games and so.</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">&nbsp;</font></p><p style="margin-top: 0.25em; margin-bottom: 0.75em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; line-height: 19px; color: rgb(51, 51, 51); font-size: 13px; "><font face="arial">In order to give&nbsp;<a href="http://goodheadphonesreviews.com/earbud-covers" style="outline-style: none; outline-width: initial; outline-color: initial; color: rgb(32, 107, 164); ">extra feature</a>, Triton headsets are also using removable flex microphone so that user can get optimum in game chat. However, it is not difficult to get headsets that support your activity and able enjoying music. By those features, designs and quality of sounds you can pick Triton headsets.</font></p>', 0, 100000, 100, '2012-02-05', 'photo_2.jpg', 'buah'),
(4, 2, 'Hardisk Seagate 500GB New Barracuda', 'hardisk-seagate-500gb-new-barracuda', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0, 500000, 97, '2012-02-05', 'photo_5.jpg', 'pcs'),
(5, 11, 'iPhone 3G 4GB Baru', 'iphone-3g-4gb-baru', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0, 5000000, 99, '2012-02-05', 'photo_3.jpg', 'pcs'),
(6, 7, 'Mac Book Air 14"', 'mac-book-air-14', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0.2, 10000000, 20, '2012-02-05', 'photo_6.jpg', 'pcs'),
(7, 11, 'HTC Touch New 2012', 'htc-touch-new-2012', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0, 2500000, 20, '2012-02-05', 'photo_1.jpg', 'unit'),
(8, 11, 'Palm Smartphone 7" 50GB', 'palm-smartphone-7-50gb', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0, 150000, 19, '2012-02-05', 'photo_3.jpg', 'pcs'),
(9, 7, 'Sony VAIO 12"', 'sony-vaio-12', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0, 12000000, 11, '2012-02-05', 'photo_2.jpg', 'buah'),
(10, 7, 'ASUS Eee PC Vision AMD ', 'asus-eee-pc-vision-amd-', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0, 1800000, 100, '2012-02-05', 'photo_5.jpg', 'pcs'),
(11, 11, 'iPhone 5 2012', 'iphone-5-2012', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0, 2500000, 98, '2012-02-05', 'photo_4.jpg', 'unit'),
(12, 7, 'Samsung Galaxy Tab 10"', 'samsung-galaxy-tab-10', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0, 2000000, 10, '2012-02-05', 'photo_6.jpg', 'buah'),
(13, 18, 'Paket Komputer Core i3', 'paket-komputer-core-i3', '<b>Tahan Banting</b><div>Seagate terkenal memproduksi hardisk dengan kualitasnya yang bagus. Kali ini, produsen asal Amerika Serikat ini memperkenalkan teknologi baru untuk melindungi hardisk dari guncangan,</div>', 0, 4000000, 100, '2012-02-05', 'photo_1.jpg', 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id_review` int(3) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isi` longtext NOT NULL,
  `id_produk` int(3) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'off',
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id_review`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `review_produk`
--

CREATE TABLE IF NOT EXISTS `review_produk` (
  `id_review` int(3) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isi` longtext NOT NULL,
  `id_produk` int(3) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'off',
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id_review`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `id_vendor` int(11) NOT NULL AUTO_INCREMENT,
  `nama_vendor` varchar(30) NOT NULL,
  `seo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_vendor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `seo`) VALUES
(1, 'ASUS', 'produk-asustek-all'),
(2, 'Kingston', 'produk-kingston-all'),
(3, 'Apple', 'apple'),
(4, 'TOSHIBA', 'toshiba'),
(5, 'Acer', 'acer'),
(6, 'V-Gen ', 'vgen-'),
(7, 'Lenovo', 'lenovo'),
(8, 'Fujitsu', 'fujitsu'),
(9, 'SONY', 'sony'),
(10, 'DELL', 'dell'),
(16, 'Seagate', 'seagate');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
