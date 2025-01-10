-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 03:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournalagil`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Firefly', 'Seorang anggota Pemburu Stellaron dan seorang gadis muda berpakaian baju besi mekanik \" SAM .\" Terlahir sebagai senjata, dia menderita Entropy Loss Syndrome yang menyakitkan akibat modifikasi genetik. Dia bergabung dengan Stellaron Hunters untuk mencari makna hidup, tanpa henti mencari cara untuk menentang takdir.', 'firefly.jpg', '2024-12-24 21:03:00', 'admin'),
(2, 'Robin', 'Seorang penyanyi Halovian yang lahir di Penacony dan meraih ketenaran kosmik. Seorang wanita muda yang elegan dan sopan. Kali ini, dia diundang pulang oleh Keluarga untuk menghibur semua orang dengan sebuah lagu di Festival Charmony . Dia dapat menggunakan kekuatan Harmoni untuk menyiarkan musiknya, mewujudkan \"resonansi\" tidak hanya di antara para penggemarnya tetapi juga semua bentuk kehidupan.', 'robin.jpg', '2024-12-24 22:00:00', 'admin'),
(3, 'Changli', 'Penasihat Hakim Jinzhou, Changli sangat ahli dalam memanfaatkan sifat manusia untuk menjebak musuh-musuhnya. Sebagai mentor bagi Jinhsi, dia persuasif dan sabar. Dia memiliki aspirasi yang tak tergoyahkan, mempertahankan posisinya dalam permainan tanpa akhir melawan waktu dan kekacauan.', 'changli.jpg', '2024-12-24 15:04:06', 'admin'),
(4, 'Shorekeeper', 'Shorekeeper, makhluk ilahi misterius yang mengatur hakikat keterasingan, muncul sebagai respons atas panggilan Anda. Setelah menghabiskan waktu selama ribuan tahun dalam penjagaan, gejolak emosi dan hasrat pertama muncul dalam hatinya, menumbuhkan tekad kuat untuk terhubung dengan dunia — dan dengan Anda.', 'shorekeeper.jpg', '2024-12-24 15:04:06', 'admin'),
(5, 'Jinshi', 'Sebagai Hakim Jinzhou, Jinhsi mengemban tugas mulia dan berat.Dari masa ke masa, Ratapan telah memangsa harapan manusia yang rentan.Namun, dengan menghadapi rintangan, dia berusaha sekuat tenaga untuk menempa jalan menuju hari esok.', 'jinshi.jpg', '2024-12-24 15:07:37', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gambar`, `tanggal`, `username`) VALUES
(1, 'gedung.jpg', '2024-12-31 14:35:54', 'admin'),
(2, 'kedokteran.jpg', '2024-12-31 14:35:54', 'admin'),
(3, 'kelompok.jpg', '2024-12-31 14:35:54', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`id`, `gambar`, `tanggal`, `username`) VALUES
(1, 'dandadan.jpg', '2024-12-31 15:00:01', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usr` (`username`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
