-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2016 at 01:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Khonghucu');

-- --------------------------------------------------------

--
-- Table structure for table `jalur_penerimaan`
--

CREATE TABLE `jalur_penerimaan` (
  `id` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jalur` varchar(30) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalur_penerimaan`
--

INSERT INTO `jalur_penerimaan` (`id`, `tahun`, `jalur`, `start_time`, `end_time`) VALUES
(1, '2016', 'PMDK Akademik', '2016-06-09 07:00:00', '2016-06-09 23:59:59'),
(2, '2016', 'PMDK Bidik Misi (Utama)', '2016-06-09 07:00:00', '2016-06-09 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `nama_panggilan` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `program_studi` varchar(5) NOT NULL,
  `jalur_masuk` int(11) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` int(11) NOT NULL,
  `alamat_asal` text NOT NULL,
  `alamat_sekarang` text NOT NULL,
  `asal_sekolah` text NOT NULL,
  `jurusan_asal` text NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `facebook` text,
  `twitter` text,
  `instagram` text,
  `line` text,
  `status` text NOT NULL,
  `cita_cita` text NOT NULL,
  `hobi` text NOT NULL,
  `olahraga` text NOT NULL,
  `hal_disukai` text NOT NULL,
  `hal_tidak_disukai` text NOT NULL,
  `kebiasaan_baik` text NOT NULL,
  `kebiasaan_buruk` text NOT NULL,
  `motivasi_masuk` text NOT NULL,
  `moto_hidup` text NOT NULL,
  `deskripsi_diri` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id` varchar(5) NOT NULL,
  `program_studi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id`, `program_studi`) VALUES
('D3-TI', 'D-III Teknik Informatika'),
('D4-TI', 'D-IV Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_penerimaan`
--

CREATE TABLE `tahun_penerimaan` (
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_penerimaan`
--

INSERT INTO `tahun_penerimaan` (`tahun`) VALUES
('2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jalur_penerimaan`
--
ALTER TABLE `jalur_penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tahun` (`tahun`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jalur_masuk` (`jalur_masuk`),
  ADD KEY `program_studi` (`program_studi`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_penerimaan`
--
ALTER TABLE `tahun_penerimaan`
  ADD PRIMARY KEY (`tahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jalur_penerimaan`
--
ALTER TABLE `jalur_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jalur_penerimaan`
--
ALTER TABLE `jalur_penerimaan`
  ADD CONSTRAINT `jalur_penerimaan_ibfk_1` FOREIGN KEY (`tahun`) REFERENCES `tahun_penerimaan` (`tahun`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`jalur_masuk`) REFERENCES `jalur_penerimaan` (`id`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
