-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2015 at 04:26 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isbn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `email`, `name`) VALUES
(1, 'c4924ea1a80c19de1ebcfaf6dc0ccc98', 'satryaway@gmail.com', 'Satria Agung');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `kode`, `judul`, `penulis`, `isbn`, `sinopsis`, `cover`, `datetime`) VALUES
(1, 'Cisco1', 'CISCO CCNA & JARINGAN KOMPUTER', 'Iwan Sofana', '978-602-8758-77-2', 'Teknik jaringan komputer merupakan kajian yang sangat kompleks, buku ini menjelaskan cara membangun jaringan komputer menggunakan berbagai macam perangkat Cisco dan Komputer. Membahas mengenai, - Seluk Beluk Cisco, - Mengenal perangkat Network, - Model OSI, - Mengenal LAN dan WAN, Teknologi LAN, - Teknologi WAN, - Internet, - Subnet dan CIDR, - Pendahuluan Internet Security, Perangkat Network dan Komputer, - Konfigurasi Dasar Switch, - Mengenal Perintah Sisco IOS, Konfigurasi VLAN, Mengenal Router Cisco, Konfigurasi Router, Konfigurasi VLAN Lanjut, Konfigurasi WAN, Soal Latihan Ujian CCNA', '', '2015-11-15 07:10:19'),
(2, 'Jarkom1', 'Membangun Jaringan Komputer', 'Iwan Sofana', '978-602-8758-95-6', 'Internet telah menjadi sebuah kebutuhan yang tidak dapat dikesampingkan dari nkehidupan sehari-hari. Internet memberikan kemudahan bagi penggunanya dan menawarjkan berbagai macam fasilitas. Buku ini membahas. -Pendahuluan, 1. Pengantar Jaringan Komputer, 2. Topologi Jaringan Komputer, 3. Topologhi Logika, 4. Peralatan Network. - Model OSI dan Prototkol TCP/IP 1. Apakah Model OSI itu? 2. Model DARPA dan TCP/IP ', '', '2015-11-15 07:10:19'),
(6, '019928817726', 'GPS BOTAKERS', 'Satria Agung Muhammad', '27082013', 'Buku ini tentang GPS', '56482c8236442.jpg', '2015-11-15 07:10:19'),
(7, '1211131114', 'GPS Tracker', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '', '2015-11-15 07:10:19'),
(9, '1211131114', 'GPS Tracker', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '', '2015-11-15 10:20:18'),
(10, '1211131114', 'GPS Tracker', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '56485c6d7e279.jpg', '2015-11-15 10:20:29'),
(11, '1211131114', 'GPS Tracker', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '56485c6d7f5e5.jpg', '2015-11-15 10:20:29'),
(12, '1211131114', 'ADUH!!!', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '56485c749ed93.jpg', '2015-11-15 10:20:36'),
(13, '1211131114', 'ADUH!!!', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '56485edad4af5.jpg', '2015-11-15 10:30:50'),
(14, '1211131114', 'ADUH!!!', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '56485efdc40c9.jpg', '2015-11-15 10:31:25'),
(15, '1211131114', 'ADUH!!!', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '5648656175daa.jpg', '2015-11-15 10:58:41'),
(16, '1211131114', 'ADUH!!!', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '564866e869d7b.jpg', '2015-11-15 11:05:12'),
(17, '1211131114', 'ADUH!!!', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '564868ea7ef17.jpg', '2015-11-15 11:13:46'),
(18, '1211131114', 'ADUH!!!', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '564895c56c897.jpg', '2015-11-15 14:25:09'),
(19, '1211131114', 'ADUH!!!', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '564895c97a6d2.jpg', '2015-11-15 14:25:13'),
(21, '1211131114', 'ADUH!!!', 'Satria Agung', '12138817173', 'Buku ini tentang GPS', '5648a2785f199.jpg', '2015-11-15 15:19:20'),
(23, '4800361002851', 'Jurik', 'Satria', '705452319407537', 'OMG! just read!', '5648a3f7b0050.jpg', '2015-11-15 15:25:43'),
(24, '9789791153904', 'Sudah Kudungan', 'Sateuria', '0846343244', 'Rame pokonamah', '5648a4af2073b.jpg', '2015-11-15 15:28:47'),
(25, '9786028758215', 'How to train girrafe', 'Satria', '0876224444', 'Hahaha', '5648ab65a2534.jpg', '2015-11-15 15:57:25'),
(26, '9789791758895', 'Membuat Aplikasi GPS & Suara Antrian dengan PHP', 'Ronald Rusli', '98999631208', 'Dengan sedikit kreatifitas, kita dapat membuat aplikasi yang dulunya hanya dibuat oleh pemrograman desktop dapat diwujudkan dengan pemrograman web.', '5649e23036552.jpg', '2015-11-16 14:03:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
