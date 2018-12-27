-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 04:27 PM
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
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `IDAnggota` int(4) NOT NULL,
  `nama_depan` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nama_belakang` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `surel` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `nohp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `katasandi` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `j-kartu_identitas` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabel untuk anggota';

--
-- RELATIONSHIPS FOR TABLE `anggota`:
--

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `IDAnggota`, `nama_depan`, `nama_belakang`, `surel`, `avatar`, `nohp`, `alamat`, `katasandi`, `j-kartu_identitas`, `no_identitas`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `status_pekerjaan`, `level_akses`, `kode_akses`, `status`, `tgl_dibuat`, `tgl_perubahan`) VALUES
(0001, 11, 'Mike', 'Dalisay', 'mike@example.com', 'https://junglove.net/wp-content/uploads/2017/08/c7f1d4263ff000681dc9cc755fe943b4-600x600.jpg', '081246361064', 'Di bumi', '*3820DB1895C26747A592360B64556C6A70E99815', 'KTP', 6471012506980002, 'Balikpapan', '1998-06-25', 'Laki-Laki', 'Mahasiswa', 'Admin', '', 1, '2018-12-13 09:48:00', '2018-12-27 15:26:23'),
(0002, 12, 'Kenneth', 'Robinson', 'simonickalexs@gmail.com', NULL, '087815321421', 'Dirumah', '*3820DB1895C26747A592360B64556C6A70E99815', 'KTP', 647101150219970003, 'Balikapan', '1997-02-15', 'Laki-Laki', 'Mahasiswa', 'Pustakawan', '', 1, '2018-12-13 09:48:00', '2018-12-27 15:26:23'),
(0003, 13, 'Darwin', 'Dalisay', 'darwin@example.com', NULL, '089517371697', 'Dimana aku senang', '*3820DB1895C26747A592360B64556C6A70E99815', 'Kartu Pelajar', 28173782981, 'Balikpapan', '2003-01-20', 'Laki-Laki', 'Mahasiswa', 'Anggota', '', 1, '2018-12-13 09:48:00', '2018-12-27 15:26:23'),
(0004, 14, 'Marisol', 'Jane', 'marisol@example.com', NULL, '081347955101', 'Pulau Kapuk', '*3820DB1895C26747A592360B64556C6A70E99815', 'Kartu Pelajar', 771236219, 'Balikpapan', '1998-03-11', 'Perempuan', 'Mahasiswa', 'Anggota', '', 1, '2018-12-13 09:48:00', '2018-12-27 15:26:23'),
(0005, 15, 'Scott', 'Hanselman', 'scott@microsoft.com', 'https://i.imgur.com/ltva2En.jpg', '089617288809', 'Pulau Mocacchino', '*3820DB1895C26747A592360B64556C6A70E99815', 'Kartu Pelajar', 839402893, 'Balikpapan', '1998-05-19', 'Laki-Laki', 'Mahasiswa', 'Anggota', '', 1, '2018-12-13 09:48:00', '2018-12-27 15:26:23'),
(0006, 16, 'Tim', 'Duncan', 'duncan.tim@example.com', NULL, '081524431098', 'Pulau Komodo', '*3820DB1895C26747A592360B64556C6A70E99815', 'Kartu Pelajar', 2392849021, 'Balikpapan', '1999-12-12', 'Laki-Laki', 'Mahasiswa', 'Anggota', '', 1, '2018-12-13 09:48:00', '2018-12-27 15:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `nomor_panggil` varchar(8) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `deskripsi_singkat` text CHARACTER SET utf8 NOT NULL,
  `pengarang` varchar(200) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `status_buku` int(1) NOT NULL COMMENT '0 = dipinjam, 1 = tersedia, 2 = hilang',
  `isbn` varchar(250) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COMMENT='Tabel data buku';

--
-- RELATIONSHIPS FOR TABLE `buku`:
--

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`nomor_panggil`, `judul_buku`, `deskripsi_singkat`, `pengarang`, `tahun_terbit`, `status_buku`, `isbn`, `penerbit`, `tgl_ditambahkan`, `tgl_perubahan`, `gambar`, `numofcopies`, `lbr_halaman`, `kategori`, `jenis_bahan`, `konten_digital`, `idrelasibuku`) VALUES
('CA-107', 'Well Of Furies', 'The most feared world in the galaxy: The Well of Furies. From this planet, the godlike Ulltrians waged war on all life among the stars.', 'Craig DeLancey', '2016-10-11', 1, '281031200', 'Omega Threshold', '2015-06-03 09:18:00', '2018-12-16 01:54:49', 'https://kbimages1-a.akamaihd.net/f8998177-6e94-4558-bc9a-933f6d7d0d75/353/569/90/False/well-of-furies.jpg', 4, 137, 'Sains Fiksi', 'Monograf', NULL, 125),
('CA-108', 'Evolution Commandos', 'Amir Tarkos is one of the only humans in the Predator Corp, the most feared and respected military force in the Galaxy. The Predators seek to prevent and punish lifecrimes: violations against ecosystems. With his partner Bria, a bear-like carnivore, Tarkos is given a dangerous and difficult mission.', 'Craig DeLancey', '2015-05-16', 1, '281031200', 'Omega Threshold', '2015-06-03 09:18:00', '2018-12-16 01:53:55', 'https://kbimages1-a.akamaihd.net/b73855d5-e36a-499d-84af-fb964d5a7532/353/569/90/False/evolution-commandos.jpg', 1, 142, 'Sains Fiksi', 'Monograf', NULL, 125),
('CA-109', 'Earthfall', 'The Ulltrians, ancient warriors long thought extinct, now threaten the galaxy. Earth is next on their list of targets.', 'Craig DeLancey', '2014-08-09', 1, '291089384', 'Omega Threshold', '2018-12-12 00:00:00', '2018-12-16 01:51:54', 'https://kbimages1-a.akamaihd.net/b18201fe-b43e-4be1-992a-825689002413/353/569/90/False/earthfall-8.jpg', 3, 136, 'Sains Fiksi', 'Monograf', NULL, 125),
('CA-112', 'Go Kitchen (Ayo Ke Dapur)', 'Lets GO KITCHEN buibuuuuuuu, semangat selalu!!! Siapa saja bisa pergi ke dapur. Oak ada kata gak bisa untuk urusan pergi ke dapur, yang ada hanya mau atau tidak untuk belajar Kiss Kiss dari kecamatan Cikampek, jayalah selalu untuk buibu seluruh Indonesia!', 'Restu Utami Dewi', '2018-09-27', 1, '978979757', 'Kawan Pustaka', '2018-12-25 00:00:00', '2018-12-26 00:20:37', 'https://cdn.gramedia.com/uploads/items/9789797576622_go_kitchen__w200_hauto.jpg', 1, 184, 'Buku Memasak', 'Monograf', NULL, 108),
('CA-113', 'Digital ParenThink', 'Membesarkan Kids Zaman Now memiliki tantangannya sendiri karena sejak lahir, internet telah menjadi bagian dari keseharian mereka. Bagaikan dua sisi mata uang, internet sangat memudahkan hidup kita sekaligus diam-diam menyimpan bahaya.', 'Mona Ratuliu', '2018-08-14', 1, '978602385', 'Noura Books Publishing', '2018-12-25 00:00:00', '2018-12-26 00:20:45', 'https://cdn.gramedia.com/uploads/items/9786023855131_Digital-ParenThink__w200_hauto.jpg', 1, 216, 'Pengasuhan Anak', 'Monograf', NULL, 113),
('CA-114', 'Detektif Conan 94', 'Sikap Ran akhir-akhir ini agak aneh! Conan dan Kogoro yang curiga akhirnya memutuskan untuk membuntuti gadis itu? dan apa yang mereka temukan!? Karya wisata merah darah, di mana terjadi benturan berbagai kepentingan pun dimulai!', 'Aoyama Gosho', '2018-09-05', 1, '97860204', 'Elex Media Komputindo', '2018-12-25 00:00:00', '2018-12-26 00:19:37', 'https://cdn.gramedia.com/uploads/items/9786020478012_Detektif-Cona__w200_hauto.jpg', 1, 192, 'Komik', 'Monograf', NULL, 114),
('CA-115', 'Delusi', 'Dewangga Bayuzena, si cowok ganteng tapi nakal, suka berantem, sok jagoan, dan termasuk dalam geng Rudy sekawan yang beranggotakan Gabrian, Rudy, dan Daffa. Akibat tingkah lakunya yang berandalan itu, Zena dipindahkan dari sekolah elit dan harus terjebak di SMA Adi Bakti yang dijulukinya \'sekolah pembuangan\'.', 'Sirhayani', '2018-11-29', 0, '97860253', 'HIKARU PUBLISHING', '2018-12-25 00:00:00', '2018-12-26 00:19:31', 'https://cdn.gramedia.com/uploads/items/9786025318443_delusi__w200_hauto.jpg', 1, 376, 'Komik', 'Monograf', NULL, 115),
('CA-116', 'Berpikir Secepat Cahaya: Rahasia Melatih Ketajaman Otak', 'Buku ini berisi macam-macam latihan otak yang simple dan unik seperti teknik mengingat angka dan kata dengan metode bertingkat, sehingga kemampuan memori akan semakin terasah. Teknik mengasah otak kiri dan kanan dalam waktu bersamaan juga ada dalam buku ini.\r\nSenam otak bukanlah hal yang menakutkan, tapi akan menjadi hal yang sangat luar biasa menyenangkan.\r\nYuk, mulai Senam Otak. Sekarang!', 'Sahda Halim', '2018-11-22', 1, '208000744', 'Cakrawala', '2018-12-26 00:00:00', '2018-12-26 21:35:41', 'https://cdn.gramedia.com/uploads/items/9786025753114_berpikir_secepat_cahaya__w200_hauto.jpg', 0, 284, 'Psikologi', 'Monograf', NULL, 116),
('CA-117', 'Hit Refresh', 'Hit Refresh berkisah tentang transformasi terbesar yang tengah berlangsung dalam tubuh Microsoft di bawah kepemimpinan Satya Nadella, sang CEO. Selama ini, ketika mendengar kata Microsoft, orang akan langsung mengaitkannya dengan Bill Gates yang cemerlang atau Steve Ballmer yang super energik. Nadella nyaris tak masuk ke radar para selebritas teknologi. Namun dalam tahun-tahun pertamanya memimpin, Nadella melakukan banyak gebrakan baru. Salah satunya adalah menciptakan budaya perusahaan yang menggabungkan antara empati dan teknologi. Dia juga membuat pertaruhan besar dalam beberapa teknologi kunci, seperti artificial intelligence (AI atau kecerdasan buatan) dan cloud computing (komputasi awan), yang membuat Microsoft menjadi unik.', 'Satya Nadella', '2018-12-12', 1, '9786022915041', 'Bentang Pustaka', '2018-12-27 00:00:00', '2018-12-27 20:36:45', 'https://cdn.gramedia.com/uploads/items/9786022915041_hit_refresh__w200_hauto.jpg', 0, 376, 'Motivasi', 'Monograf', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE `peminjaman` (
  `id_peminjaman` int(7) UNSIGNED ZEROFILL NOT NULL,
  `id_anggota` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nomor_panggil_buku` varchar(8) NOT NULL,
  `is_accepted` int(2) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- RELATIONSHIPS FOR TABLE `peminjaman`:
--   `id_anggota`
--       `anggota` -> `id`
--   `nomor_panggil_buku`
--       `buku` -> `nomor_panggil`
--

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `nomor_panggil_buku`, `is_accepted`, `tgl_peminjaman`, `tgl_pengembalian`, `tanggal_kembali`) VALUES
(0000001, 0005, 'CA-115', 1, '2018-12-25', '2018-12-25 11:37:31', NULL),
(1738140, 0005, 'CA-113', 0, '2018-12-26', '2019-01-01 16:00:00', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- RELATIONSHIPS FOR TABLE `pengembalian`:
--   `id_anggota`
--       `anggota` -> `id`
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
  ADD PRIMARY KEY (`nomor_panggil`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_anggota` (`id_anggota`),
  ADD KEY `fk_buku` (`nomor_panggil_buku`);

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
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1738141;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buku` FOREIGN KEY (`nomor_panggil_buku`) REFERENCES `buku` (`nomor_panggil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
