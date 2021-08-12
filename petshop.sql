-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 11:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id_admin`, `username`, `pass`, `nama_lengkap`) VALUES
(1, 'admin', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(5) NOT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `id_produk`, `images`) VALUES
(27, 14, 'makanan1.png'),
(28, 14, 'catzhoize3.png'),
(29, 14, 'catzhoize4.png'),
(30, 14, 'catzhoize2.png'),
(31, 15, 'proplan.png'),
(32, 15, 'proplan2.png'),
(33, 15, 'proplan3.png'),
(34, 16, 'royalCN.png'),
(35, 16, 'royalCN2.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(5, 'Cat Food'),
(6, 'Dog Food'),
(7, 'Aksesoris'),
(8, 'perawatan');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(3) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 10000),
(2, 'Bandung', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `email_pelanggan` varchar(30) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telpon_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telpon_pelanggan`) VALUES
(1, 'rizkiapriliantono@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', 'Rizki Apriliantono', '08221344212342'),
(3, 'jiboy14@gmail.com', '9592638716b04b52fe6e041429822a79', 'Rizki Apriliantono', '085710648073'),
(4, 'ujicoba@gmail.com', 'rizki123', 'ujicoba', '123'),
(7, 'user@gmail.com', '69f9c4fd46611744e3ec5519d3c9f7c0', 'user', '1234123');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `id_pembelian` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 1, 'user_coba', 'BCA', '10000', '2021-01-13', 'tes'),
(2, 18, 'user_coba', 'BCA', '1000000', '2021-01-13', ''),
(3, 19, 'user_coba', 'Mandiri Syariah', '2000000', '2021-02-02', 'index.png'),
(6, 18, 'Rizki Apriliantono', 'Bank NTT', 'Rp. 152.000', '2021-02-09', '20210209114439'),
(7, 17, 'Bunga Keladi', 'Bank Mega', 'Rp. 142.000', '2021-02-09', '20210209115300ban2.JPG'),
(8, 19, 'Rizki Apriliantono', 'Bank Permata', 'Rp. 142.000', '2021-02-09', '20210209120506vespa1.png'),
(9, 22, 'Rizki Apriliantono', 'Bank CIMB Niaga', 'Rp. 340.000', '2021-02-27', '20210227085146why.png'),
(10, 22, 'Rizki Apriliantono', 'Bank CIMB Niaga', 'Rp. 340.000', '2021-02-27', '20210227085504why.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(5) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kode_pos` int(7) NOT NULL,
  `pajak` int(6) NOT NULL,
  `tarif` int(5) NOT NULL,
  `alamat_pengiriman` varchar(100) NOT NULL,
  `status_pembelian` varchar(20) NOT NULL DEFAULT 'PENDING',
  `resi_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `kode_pos`, `pajak`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(21, 5, 2, '2021-02-26', 130000, 'Bandung', 31512, 10000, 20000, 'jalan kamboja raya no 10', 'PENDING', ''),
(22, 1, 1, '2021-02-27', 340000, 'Jakarta', 12441, 30000, 10000, 'ajalan sadar raya', 'SUCCESS', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(5) NOT NULL,
  `id_pembelian` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah_produk` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(9) NOT NULL,
  `berat` int(3) NOT NULL,
  `subharga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah_produk`, `nama`, `harga`, `berat`, `subharga`) VALUES
(1, 1, 1, 1, 'Daun Sirih', 25000, 1, 25000),
(2, 2, 2, 5, 'Bunga Keladi', 2000, 3, 2000),
(3, 0, 13, 1, '', 0, 0, 1000000),
(4, 0, 13, 1, '', 0, 0, 1000000),
(5, 5, 13, 2, 'algonema', 1000000, 1, 2000000),
(6, 6, 13, 1, 'algonema', 1000000, 1, 1000000),
(7, 7, 13, 1, 'algonema', 1000000, 1, 1000000),
(8, 8, 11, 1, 'Rizki Apriliantono', 120000, 2, 120000),
(9, 9, 11, 1, 'Rizki Apriliantono', 120000, 2, 120000),
(10, 10, 11, 2, 'Rizki Apriliantono', 120000, 2, 240000),
(11, 10, 13, 1, 'algonema', 1000000, 1, 1000000),
(12, 10, 12, 1, 'Body Vespa 150 Super Tahun 1990', 32, 2, 32),
(13, 11, 11, 2, 'Rizki Apriliantono', 120000, 2, 240000),
(14, 11, 13, 1, 'algonema', 1000000, 1, 1000000),
(15, 12, 11, 2, 'Rizki Apriliantono', 120000, 2, 240000),
(16, 13, 11, 2, 'Rizki Apriliantono', 120000, 2, 240000),
(17, 14, 11, 1, 'Rizki Apriliantono', 120000, 2, 120000),
(18, 15, 11, 2, 'Rizki Apriliantono', 120000, 2, 240000),
(19, 16, 11, 1, 'Rizki Apriliantono', 120000, 2, 120000),
(20, 17, 11, 1, 'Rizki Apriliantono', 120000, 2, 120000),
(21, 18, 11, 1, 'Rizki Apriliantono', 120000, 2, 120000),
(22, 19, 11, 1, 'Rizki Apriliantono', 120000, 2, 120000),
(23, 20, 12, 2, 'Body Vespa 150 Super Tahun 1990', 32, 2, 64),
(24, 21, 14, 1, 'Cat Choize Tuna Adult', 100000, 1, 100000),
(25, 22, 15, 1, 'Pro Plan Kitten 1KG', 300000, 1, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `kat_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(4) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kat_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(14, 'Cat Food', 'Cat Choize Tuna Adult', 100000, 1, 'makanan1.png', 'Berat: 1KG\r\nMengandung nutrisi, vitamin, dan mineral lengkap yang dibutuhkan kucing dewasa untuk gigi yang sehat, pencernaan yang baik, mata yang sehat, dan bulu yang terawat.\r\nBerat bersih 800gram dan produksi terbaru dengan kadaluarsa panjang, 2021.                                ', 9),
(15, 'Cat Food', 'Pro Plan Kitten 1KG', 300000, 1, 'proplan.png', '*PRO PLAN Kitten with OPTISTART\r\n\r\n\r\nPRO PLAN Kitten with OPTISTART is specifically formulated for the healthy development of kittens from 6 weeks to 1 year. Did you know that during their first year of life, kittens are more prone to infections, diarrhoea and digestive upsets? Thats why PRO PLAN Kitten with OPTISTART combines all the essentials key nutrients that kittens need, plus colostrum proven to help them develop a stronger and faster immune response. OPTISTART also helps strengthen a kittens intestinal health and help reduce risk of stomach upsets so they can get the best start to life. Recommended for pregnant and nursing queens. Also suitable for neutered/sterilised kittens.', 19),
(16, 'Cat Food', 'ROYAL CANNIN FCN KITTEN 1 KG', 300000, 1, 'royalCN.png', '                Royal Canin Kitten adalah makanan untuk anak kucing dalam fase pertumbuhan usia 4 hingga 12 bulan. Makanan Kucing ini hadir dalam bentuk pelet yang kecil untuk membantu transisi anak kucing yang semula hanya minum susu ke makanan padat, masa ini merupakan fase sensitif yang dapat menyebabkan masalah pencernaan. Untuk itu Royal Canin menyediakan semua nutrisi yang dibutuhkan untuk kesehatan kucing yang optimal dengan tekstur yang sesuai. Makanan Kucing ini memiliki komposisi seimbang yang dapat membantu membangun sistem kekebalan tubuh dengan mannan-ogliosakarida dan antioksidan kompleksnya, serta kalsium yang cukup untuk menjaga kesehatan giginya                ', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
