-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 07:32 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipudalmstest`
--
CREATE DATABASE IF NOT EXISTS `sipudalmstest` DEFAULT CHARACTER SET latin7 COLLATE latin7_general_ci;
USE `sipudalmstest`;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id` int(8) NOT NULL,
  `nama_depan` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nama_belakang` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `surel` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `katasandi` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `j-kartu_identitas` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `no_identitas` bigint(17) NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `status_pekerjaan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level_akses` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `kode_akses` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending, 1=dikonfirmasi',
  `tgl_dibuat` datetime NOT NULL,
  `tgl_perubahan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabel untuk anggota';

--
-- RELATIONSHIPS FOR TABLE `anggota`:
--

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama_depan`, `nama_belakang`, `surel`, `nohp`, `alamat`, `katasandi`, `j-kartu_identitas`, `no_identitas`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `status_pekerjaan`, `level_akses`, `kode_akses`, `status`, `tgl_dibuat`, `tgl_perubahan`) VALUES
(1, 'Mike', 'Dalisay', 'mike@example.com', '081246361064', 'Di bumi', '*71311A56200B2866958433E255027865AF83FD2E', 'KTP', 6471012506980002, 'Balikpapan', '1998-06-25', 'Laki-Laki', 'Mahasiswa', 'Admin', '', 1, '2018-12-13 09:48:00', '2018-12-15 12:15:14'),
(2, 'Kenneth', 'Robinson', 'simonickalexs@gmail.com', '087815321421', 'Dirumah', '*71311A56200B2866958433E255027865AF83FD2E', '', 0, '', '0000-00-00', '', '', 'Pustakawan', '', 1, '2018-12-13 09:48:00', '2018-12-13 13:28:55'),
(3, 'Darwin', 'Dalisay', 'darwin@example.com', '089517371697', 'Dimana aku senang', '*71311A56200B2866958433E255027865AF83FD2E', '', 0, '', '0000-00-00', '', '', 'Anggota', '', 1, '2018-12-13 09:48:00', '2018-12-13 13:28:55'),
(4, 'Marisol', 'Jane', 'marisol@example.com', '081347955101', 'Pulau Kapuk', '*71311A56200B2866958433E255027865AF83FD2E', '', 0, '', '0000-00-00', '', '', 'Anggota', '', 1, '2018-12-13 09:48:00', '2018-12-13 13:28:55'),
(5, 'Martin', 'Ignacio', 'martin@example.com', '089617288809', 'Pulau Mocacchino', '*71311A56200B2866958433E255027865AF83FD2E', '', 0, '', '0000-00-00', '', '', 'Anggota', '', 1, '2018-12-13 09:48:00', '2018-12-13 13:28:55'),
(6, 'Tim', 'Duncan', 'duncan.tim@example.com', '081524431098', 'Pulau Komodo', '*71311A56200B2866958433E255027865AF83FD2E', '', 0, '', '0000-00-00', '', '', 'Anggota', '', 1, '2018-12-13 09:48:00', '2018-12-13 13:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `pengarang` varchar(200) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `status_buku` int(1) NOT NULL COMMENT '0 = dipinjam, 1 = tersedia, 2 = hilang',
  `nomor_panggil` varchar(8) NOT NULL,
  `isbn` int(30) NOT NULL,
  `penerbit` varchar(70) NOT NULL,
  `tgl_ditambahkan` datetime NOT NULL,
  `tgl_perubahan` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `gambar` mediumtext NOT NULL,
  `numofcopies` int(10) NOT NULL,
  `lbr_halaman` int(18) NOT NULL,
  `kategori` varchar(40) NOT NULL,
  `jenis_bahan` varchar(20) DEFAULT NULL,
  `konten_digital` text,
  `idrelasibuku` int(75) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin7 COMMENT='Tabel data buku';

--
-- RELATIONSHIPS FOR TABLE `buku`:
--

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `deskripsi_singkat`, `pengarang`, `tahun_terbit`, `status_buku`, `nomor_panggil`, `isbn`, `penerbit`, `tgl_ditambahkan`, `tgl_perubahan`, `gambar`, `numofcopies`, `lbr_halaman`, `kategori`, `jenis_bahan`, `konten_digital`, `idrelasibuku`) VALUES
(1, 'Earthfall', 'The Ulltrians, ancient warriors long thought extinct, now threaten the galaxy. Earth is next on their list of targets.', 'Craig DeLancey', '2014-08-09', 1, 'CA-109', 291089384, 'Omega Threshold', '2018-12-12 00:00:00', '2018-12-16 01:51:54', 'https://kbimages1-a.akamaihd.net/b18201fe-b43e-4be1-992a-825689002413/353/569/90/False/earthfall-8.jpg', 3, 136, 'Sains Fiksi', 'Monograf', NULL, 125),
(2, 'Evolution Commandos', 'Amir Tarkos is one of the only humans in the Predator Corp, the most feared and respected military force in the Galaxy. The Predators seek to prevent and punish lifecrimes: violations against ecosystems. With his partner Bria, a bear-like carnivore, Tarkos is given a dangerous and difficult mission.', 'Craig DeLancey', '2015-05-16', 1, 'CA-108', 281031200, 'Omega Threshold', '2015-06-03 09:18:00', '2018-12-16 01:53:55', 'https://kbimages1-a.akamaihd.net/b73855d5-e36a-499d-84af-fb964d5a7532/353/569/90/False/evolution-commandos.jpg', 1, 142, 'Sains Fiksi', 'Monograf', NULL, 125),
(3, 'Well Of Furies', 'The most feared world in the galaxy: The Well of Furies. From this planet, the godlike Ulltrians waged war on all life among the stars.', 'Craig DeLancey', '2016-10-11', 1, 'CA-107', 281031200, 'Omega Threshold', '2015-06-03 09:18:00', '2018-12-16 01:54:49', 'https://kbimages1-a.akamaihd.net/f8998177-6e94-4558-bc9a-933f6d7d0d75/353/569/90/False/well-of-furies.jpg', 4, 137, 'Sains Fiksi', 'Monograf', NULL, 125);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin7;

--
-- RELATIONSHIPS FOR TABLE `peminjaman`:
--   `id_anggota`
--       `anggota` -> `id`
--   `id_buku`
--       `buku` -> `id_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tgl_kembali` int(11) NOT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin7;

--
-- RELATIONSHIPS FOR TABLE `pengembalian`:
--   `id_anggota`
--       `anggota` -> `id`
--   `id_buku`
--       `buku` -> `id_buku`
--   `id_peminjaman`
--       `peminjaman` -> `id_peminjaman`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `nomor_panggil` (`nomor_panggil`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
