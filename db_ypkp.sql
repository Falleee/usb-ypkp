-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql213.byetcluster.com
-- Generation Time: Jan 01, 2021 at 11:30 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27507834_db_ypkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tema` varchar(50) NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_kategori`, `nama_file`, `judul`, `tema`, `ketua`, `tanggal`, `deskripsi`) VALUES
(127, 6, 'upload/67530d0b14496b1e10c6d6b4a2074bf5.jpg', 'Sertifikasi MTCNA', 'Mikrotik', 'Gunawan', '2020-12-18', 'Info pelatihan & ujian sertifikasi Mikrotik (MTCNA):\r\nPeriode Desember 2020\r\n\r\n1. Pelatihan dan Ujian akan dilaksanakan selama 2 hari, Jum\'at-Sabtu (18-19 Desember 2020, pkl. 16.00-20.00 WIB di Ruang Lab. Informatika Gedung E).\r\n2. Pelaksaan ujian akan dilaksanakan hari Sabtu, 19 Desember 2020, mulai pkl. 19.00-selesai di Ruang Lab. Informatika Gedung E.\r\n3. Setiap peserta diwajibkan membawa labtop dan kabel utp yg sdh terpasang rj45 type straight dan panjang minimal 1 meter.\r\n   (Note : Kabel utp rj45 dapat dibeli di borma, kisaran harga 10/15 ribu rupiah, sdh terpasang rj45 dan tinggal digunakan)\r\n4. Untuk peralatan Mikrotik seperti Router Board dan peralatan lainnya sudah disiapkan oleh kampus.\r\n5. MATERI dan BANK SOAL yang akan di bahas di kelas dapat diunduh melalui url berikut: \r\n   https://bit.ly/materimtcnausbypkp\r\n6. Wajib mengisi data peserta ujian melalui url berikut:\r\n   https://bit.ly/daftarmtcnausbypkp\r\n7. Biaya pelatihan dan ujian sebesar Rp. 500.000, dibayarkan melalui prodi Teknik Informatika paling lambat 15 Desember 2020.\r\n\r\nTerima kasih\r\nKoordinator sertifikasi MTCNA\r\nGunawan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(3, 'Seminar'),
(5, 'Workshop'),
(6, 'Sertifikasi Internasional');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `no_induk` varchar(25) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`no_induk`, `nama`, `password`, `role`) VALUES
('123', 'admin@example.com', '$2y$10$iVxiaNCExXY90DNXekLdGO0MyMxOeDJbRb7BVX2IP4jPp42gUAiBu', '1'),
('12345', 'asep', '$2y$10$OK6Tt9XvP3eXT2E91EHgwuET1lXyJpPwuk0n77ecLlCxys5PJ7/GK', '0'),
('2113171036', 'Naufal Hidayah Surya', '$2y$10$NgsqZ1BQ/4B5mcv01300AODqhbBacmPRX8/wDFcHYWxLoUK8uBn.K', '0'),
('40162', 'pizza@gmail.com', '$2y$10$8ADbrkuPsGDjVuJ0Gp95xewRR8/bPH7B.5JJqnzh10J4SuxElgF/6', '0'),
('666', 'McCartney', '$2y$10$EACqUmgwOS48qtuYY7xjUuuLlHDaHtcEWxbhFQw2vDSsINJrR/03G', '0'),
('110', 'Abcdefg', '$2y$10$SA0RrTcV7XWFr/Yfsnc.Y.Wj55B7d7UwD5.1ORwgpldPX6pNnErfS', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`id`, `id_dokumen`, `foto`, `extension`) VALUES
(99, 116, 'CONTOH.xlsx', 'xlsx'),
(100, 116, 'email.xlsx', 'xlsx'),
(126, 127, 'IMG-20201219-WA0028.jpg', 'jpg'),
(116, 5, 'e2a5890b2e25bdaec10a225c5684974b.jpg', 'jpg'),
(125, 127, 'IMG-20201219-WA0030.jpg', 'jpg'),
(124, 127, 'IMG-20201219-WA0027.jpg', 'jpg'),
(123, 127, 'IMG-20201219-WA0029.jpg', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `judul`, `deskripsi`, `file`) VALUES
(7, 'Universitas Sangga Buana Ypkp', 'Universitas Sangga Buana Ypkp', 'upload/36a79f11ee9ffdcdd9d1e1cb427a7a68.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no_induk`);

--
-- Indexes for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
