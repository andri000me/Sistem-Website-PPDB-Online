-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 05:53 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_majumakmur`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `id_daftar` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelamin_siswa` enum('Pria','Wanita') NOT NULL,
  `warga_negara` varchar(60) NOT NULL,
  `tgl_lahir_siswa` date NOT NULL,
  `agama_siswa` enum('Islam','Kristen','Katholik','Budha','Hindu','Konghuchu') NOT NULL,
  `alamat_siswa` text NOT NULL,
  `asal_sekolah_siswa` varchar(60) NOT NULL,
  `no_hp_siswa` varchar(15) NOT NULL,
  `email_siswa` varchar(60) NOT NULL,
  `nama_ayah_siswa` varchar(60) NOT NULL,
  `penghasilan_ayah_siswa` enum(' < 1 Juta',' > 1 Juta') NOT NULL,
  `nama_ibu_siswa` varchar(60) NOT NULL,
  `penghasilan_ibu_siswa` enum(' < 1 Juta',' > 1 Juta') NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftar`
--

INSERT INTO `tb_daftar` (`id_daftar`, `nama_siswa`, `kelamin_siswa`, `warga_negara`, `tgl_lahir_siswa`, `agama_siswa`, `alamat_siswa`, `asal_sekolah_siswa`, `no_hp_siswa`, `email_siswa`, `nama_ayah_siswa`, `penghasilan_ayah_siswa`, `nama_ibu_siswa`, `penghasilan_ibu_siswa`, `image`) VALUES
(5, 'ff', 'Wanita', 'indoneisa', '2020-12-30', 'Katholik', 'mm', 'nn', '8978787', 'd@gmail.com', 'zas', ' < 1 Juta', 'asd', ' > 1 Juta', '2020-10-19 at 14-56-30.png'),
(6, 'ad', 'Wanita', 'rdasd', '2021-01-04', 'Budha', 'asda', 'adsa', '443123', 'ada', 'ggg', ' < 1 Juta', 'wqdq', ' < 1 Juta', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `status` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `alamat`, `telepon`, `status`, `password`, `akses`) VALUES
('admin', 'Mas Fadil', 'Cilacap', '081390161897', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_web`
--

CREATE TABLE `tb_web` (
  `id_web` int(11) NOT NULL,
  `nama_web` varchar(35) NOT NULL,
  `domain_web` varchar(10) NOT NULL,
  `slogan_web` text NOT NULL,
  `alamat_web` text NOT NULL,
  `telp_web` varchar(16) NOT NULL,
  `fax_web` varchar(16) NOT NULL,
  `email_web` varchar(50) NOT NULL,
  `author_web` varchar(50) NOT NULL,
  `deskripsi_web` text NOT NULL,
  `keyword_web` text NOT NULL,
  `tahun_web` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_web`
--

INSERT INTO `tb_web` (`id_web`, `nama_web`, `domain_web`, `slogan_web`, `alamat_web`, `telp_web`, `fax_web`, `email_web`, `author_web`, `deskripsi_web`, `keyword_web`, `tahun_web`) VALUES
(1, 'PPDB SMA MAJU MAKMUR', '.ID', 'Aplikasi Pendaftaran Peserta Didik Baru Berbasis Web SMA MAJU MAKMUR', 'Ds. Maju Lancar RT 1 RW 02, Kecamatan Maju Sekali, Kabupaten Maju Saja.', '08909090909', '---', 'smamajumakmur@gmail.com', 'fadil', 'PPDB SMA MAJU MAKMUR adalah Aplikasi Pendaftaran Peserta Didik Baru Berbasis Web di SMA MAJU MAKMUR', 'Aplikasi Website PPDB', 2021);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_web`
--
ALTER TABLE `tb_web`
  ADD PRIMARY KEY (`id_web`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_web`
--
ALTER TABLE `tb_web`
  MODIFY `id_web` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
