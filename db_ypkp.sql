-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Des 2020 pada 13.26
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ypkp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tema` varchar(50) NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_kategori`, `nama_file`, `judul`, `tema`, `ketua`, `tanggal`, `deskripsi`) VALUES
(120, 5, 'upload/e6c97288169cca8f012b9ae8587f41e9.png', 'Mengaji', 'Data Mining', 'Rifa', '0000-00-00', 'asd'),
(121, 3, 'upload/e29475b82e70aad0de7996bcff8ca2b8.png', 'asda', 'asd', 'asd', '2020-12-04', 'asd'),
(123, 3, 'upload/8443daf1d5528402c86a02734600e2fb.png', 'asdadadad', 'adsssssssssssssssssssss', 'asdaadsasdsad', '2020-12-04', 'asdadadssad'),
(124, 3, 'upload/c1cca5f6fa6ec6690c798d981faf6fa5.png', '1', 'a', 'a', '2021-01-05', 'a'),
(125, 3, 'upload/dca524bb04becc38fc6da04064f6563a.jpg', 'a', 'a', 'a', '2021-01-01', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(3, 'Seminar'),
(5, 'Workshop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `no_induk` varchar(25) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`no_induk`, `nama`, `password`, `role`) VALUES
('123', 'admin@example.com', '$2y$10$iVxiaNCExXY90DNXekLdGO0MyMxOeDJbRb7BVX2IP4jPp42gUAiBu', '1'),
('12345', 'asep', '$2y$10$OK6Tt9XvP3eXT2E91EHgwuET1lXyJpPwuk0n77ecLlCxys5PJ7/GK', '0'),
('2113171036', 'Naufal Hidayah Surya', '$2y$10$NgsqZ1BQ/4B5mcv01300AODqhbBacmPRX8/wDFcHYWxLoUK8uBn.K', '0'),
('40162', 'pizza@gmail.com', '$2y$10$8ADbrkuPsGDjVuJ0Gp95xewRR8/bPH7B.5JJqnzh10J4SuxElgF/6', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`id`, `id_dokumen`, `foto`, `extension`) VALUES
(89, 113, '690e0fbc67c12d084ba7559bc371c569.pdf', 'pdf'),
(90, 113, '6447a0b76f3023b76a0a63dea57dba7b.xlsx', 'xlsx'),
(98, 116, '8f1ef7f02c41939c62f9669a588e3a09.jpg', 'jpg'),
(99, 116, 'CONTOH.xlsx', 'xlsx'),
(100, 116, 'email.xlsx', 'xlsx'),
(104, 116, 'bisa.png', 'png'),
(105, 119, 'acaratambah.png', 'png'),
(111, 122, '230f423b24020b78889d99cfc15eafa8.jpg', ''),
(112, 122, '01e983f1d9a3c698b0cbaf6b8a8b2225.jpg', ''),
(113, 122, '116a567041b812144e574ad4201e65c5.jpg', ''),
(114, 122, 'cb4a43cda122b38373d3b52424771aa9.jpg', ''),
(115, 122, 'fd824343f4a6e8e69a762e76add7c563.jpg', ''),
(116, 5, 'e2a5890b2e25bdaec10a225c5684974b.jpg', 'jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `judul`, `deskripsi`, `file`) VALUES
(7, 'Universitas Sangga Buana Ypkp', 'Universitas Sangga Buana Ypkp', 'upload/36a79f11ee9ffdcdd9d1e1cb427a7a68.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no_induk`);

--
-- Indeks untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
