-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 02:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `alumniID` int(11) NOT NULL,
  `alumniNim` int(50) NOT NULL,
  `alumniNik` int(50) NOT NULL,
  `alumniNpwp` int(50) NOT NULL,
  `alumniNama` varchar(50) NOT NULL,
  `alumniJurusan` varchar(50) NOT NULL,
  `alumniTahunLulus` varchar(4) NOT NULL,
  `alumniNoWA` int(11) NOT NULL,
  `alumniEmail` varchar(50) NOT NULL,
  `alumniUsername` varchar(50) NOT NULL,
  `alumniPassword` varchar(50) NOT NULL,
  `alumniAlamat` text NOT NULL,
  `alumniStatusPertanyaan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni`
--

INSERT INTO `tb_alumni` (`alumniID`, `alumniNim`, `alumniNik`, `alumniNpwp`, `alumniNama`, `alumniJurusan`, `alumniTahunLulus`, `alumniNoWA`, `alumniEmail`, `alumniUsername`, `alumniPassword`, `alumniAlamat`, `alumniStatusPertanyaan`) VALUES
(2, 11111143, 4322, 222, 'dgfx', 'dfgdf', '', 565656, 'dffgfg', '123', '123', 'fgf', NULL),
(3, 2355, 235, 235, '3sdgf', 'dfg', '2020', 0, '', '111', '111', '', NULL),
(4, 346, 346, 345, 'aaaaa123', 'dfg', '', 456, 'dfg', 'dfg', 'dfg', 'dfg', NULL),
(5, 565, 345, 34656, 'sgfhghhhhhh', 'hg', '2010', 87686, 'dfg', 'fff', 'fff', 'df', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_alumni`
--

CREATE TABLE `tb_jawaban_alumni` (
  `jawabanAlumniID` int(11) NOT NULL,
  `jawabanAlumni_alumniID` int(11) DEFAULT NULL,
  `jawabanAlumni_pertanyaanID` int(11) DEFAULT NULL,
  `jawabanAlumniStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban_alumni`
--

INSERT INTO `tb_jawaban_alumni` (`jawabanAlumniID`, `jawabanAlumni_alumniID`, `jawabanAlumni_pertanyaanID`, `jawabanAlumniStatus`) VALUES
(1, 2, 49, 'sukses'),
(2, 2, 15, 'sukses'),
(3, 2, 58, 'sukses'),
(4, 2, 59, 'sukses'),
(5, 2, 60, 'sukses'),
(6, 2, 61, 'sukses'),
(7, 3, 49, 'sukses'),
(8, 3, 15, 'sukses'),
(9, 3, 58, 'sukses'),
(10, 3, 59, 'sukses'),
(11, 3, 60, 'sukses'),
(12, 3, 61, 'sukses'),
(13, 4, 49, 'sukses'),
(14, 4, 15, 'sukses'),
(15, 4, 58, 'sukses'),
(16, 4, 59, 'sukses'),
(17, 4, 60, 'sukses'),
(18, 4, 61, 'sukses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_alumni_essay`
--

CREATE TABLE `tb_jawaban_alumni_essay` (
  `jawabanAlumniEsayID` int(11) NOT NULL,
  `jawabanAlumniEsay_jawabanAlumniID` int(11) DEFAULT NULL,
  `jawabanAlumniEsayDesk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban_alumni_essay`
--

INSERT INTO `tb_jawaban_alumni_essay` (`jawabanAlumniEsayID`, `jawabanAlumniEsay_jawabanAlumniID`, `jawabanAlumniEsayDesk`) VALUES
(29, 4, 'fgf'),
(30, 10, 'esfd'),
(31, 16, 'aaaaaxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_alumni_pm`
--

CREATE TABLE `tb_jawaban_alumni_pm` (
  `jawabanAlumniPMID` int(11) NOT NULL,
  `jawabanAlumniPM_jawabanAlumniID` int(11) DEFAULT NULL,
  `jawabanAlumniPM_jawabanPMID` int(11) DEFAULT NULL,
  `jawabanAlumniPM_djawabanPMID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban_alumni_pm`
--

INSERT INTO `tb_jawaban_alumni_pm` (`jawabanAlumniPMID`, `jawabanAlumniPM_jawabanAlumniID`, `jawabanAlumniPM_jawabanPMID`, `jawabanAlumniPM_djawabanPMID`) VALUES
(124, 3, 17, 46),
(125, 3, 18, 50),
(126, 3, 19, 54),
(127, 9, 17, 46),
(128, 9, 18, 51),
(129, 9, 19, 55),
(130, 15, 17, 46),
(131, 15, 18, 51),
(132, 15, 19, 55);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_alumni_ps`
--

CREATE TABLE `tb_jawaban_alumni_ps` (
  `jawabanAlumniPSID` int(11) NOT NULL,
  `jawabanAlumniPS_jawabanAlumniID` int(11) DEFAULT NULL,
  `jawabanAlumniPS_jawabanPSID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban_alumni_ps`
--

INSERT INTO `tb_jawaban_alumni_ps` (`jawabanAlumniPSID`, `jawabanAlumniPS_jawabanAlumniID`, `jawabanAlumniPS_jawabanPSID`) VALUES
(153, 1, 5),
(154, 2, 1),
(155, 5, 22),
(156, 6, 24),
(157, 7, 5),
(158, 8, 2),
(159, 11, 22),
(160, 12, 25),
(161, 13, 5),
(162, 14, 1),
(163, 17, 22),
(164, 18, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_alumni_ps_lanjut`
--

CREATE TABLE `tb_jawaban_alumni_ps_lanjut` (
  `jawabanAlumniPSLID` int(11) NOT NULL,
  `jawabanAlumniPSL_jawabanAlumniPSID` int(11) DEFAULT NULL,
  `jawabanAlumniPSLDesk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_pm`
--

CREATE TABLE `tb_jawaban_pm` (
  `jawabanPMID` int(11) NOT NULL,
  `jawabanPM_pertanyaanID` int(11) DEFAULT NULL,
  `jawabanPMDesk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban_pm`
--

INSERT INTO `tb_jawaban_pm` (`jawabanPMID`, `jawabanPM_pertanyaanID`, `jawabanPMDesk`) VALUES
(17, 58, 'Etika'),
(18, 58, 'Komunikasi Lisan'),
(19, 58, 'Pengembangan Diri'),
(20, 64, 'sgf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_pm_detail`
--

CREATE TABLE `tb_jawaban_pm_detail` (
  `djawabanPMID` int(11) NOT NULL,
  `djawabanPM_jawabanPMID` int(11) DEFAULT NULL,
  `djawabanPMDesk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban_pm_detail`
--

INSERT INTO `tb_jawaban_pm_detail` (`djawabanPMID`, `djawabanPM_jawabanPMID`, `djawabanPMDesk`) VALUES
(46, 17, 'Kurang'),
(47, 17, 'Cukup'),
(48, 17, 'Baik'),
(49, 17, 'Sangat Baik'),
(50, 18, 'Kurang'),
(51, 18, 'Cukup'),
(52, 18, 'Baik'),
(53, 18, 'Sangat Baik'),
(54, 19, 'Kurang'),
(55, 19, 'Cukup'),
(56, 19, 'Baik'),
(57, 19, 'Sangat Baik'),
(58, 20, 'sdf'),
(59, 20, 'df'),
(60, 20, 'df'),
(61, 20, 'df');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_ps`
--

CREATE TABLE `tb_jawaban_ps` (
  `jawabanPSID` int(11) NOT NULL,
  `jawabanPS_pertanyaanID` int(11) DEFAULT NULL,
  `jawabanPSLanjutan` varchar(255) DEFAULT NULL,
  `jawabanPSDesk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban_ps`
--

INSERT INTO `tb_jawaban_ps` (`jawabanPSID`, `jawabanPS_pertanyaanID`, `jawabanPSLanjutan`, `jawabanPSDesk`) VALUES
(1, 15, 'tidak_aktif', 'Sangat Erat'),
(2, 15, 'tidak_aktif', 'Erat'),
(3, 15, 'tidak_aktif', 'Cukup Erat'),
(4, 15, 'tidak_aktif', 'Tidak Sama Skali'),
(5, 49, 'tidak_aktif', 'Biaya Sendiri'),
(6, 49, 'aktif', 'Beasiswa, Sebutkan..'),
(22, 60, 'tidak_aktif', 'Tidak'),
(23, 60, 'aktif', 'Ya, Sebutkan...'),
(24, 61, 'tidak_aktif', 'Sangat Dekat'),
(25, 61, 'tidak_aktif', 'Dekat'),
(26, 61, 'tidak_aktif', 'Jauh'),
(27, 61, 'tidak_aktif', 'Sangat Jauh'),
(28, 63, 'tidak_aktif', 'sdfd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `pertanyaanID` int(11) NOT NULL,
  `pertanyaan_pertanyaanKID` int(11) NOT NULL,
  `pertanyaanKategoriJawaban` varchar(50) NOT NULL,
  `pertanyaanKriteriaJawaban` varchar(50) DEFAULT NULL,
  `pertanyaanDesk` text NOT NULL,
  `pertanyaanUrutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`pertanyaanID`, `pertanyaan_pertanyaanKID`, `pertanyaanKategoriJawaban`, `pertanyaanKriteriaJawaban`, `pertanyaanDesk`, `pertanyaanUrutan`) VALUES
(15, 1, 'pilihan', 'kriteria_pilih_single', 'Seberapa Erat Hubungan antara bidang anda?', 2),
(49, 1, 'pilihan', 'kriteria_pilih_single', 'Sumber dana Kuliah S2?', 1),
(58, 1, 'pilihan', 'kriteria_pilih_multiple', 'Evaluasi', 14),
(59, 1, 'esay', 'kriteria_esay', 'Penghasila', 15),
(60, 1, 'pilihan', 'kriteria_pilih_single', 'Memiliki Sertifikat?', 16),
(61, 1, 'pilihan', 'kriteria_pilih_single', 'Seberapa dekat anda dengan lokasi kantor?', 17),
(62, 2, 'esay', 'kriteria_esay', 'coba 1', 1),
(63, 2, 'pilihan', 'kriteria_pilih_single', 'gfgf', 2),
(64, 2, 'pilihan', 'kriteria_pilih_multiple', 'fgf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan_kategori`
--

CREATE TABLE `tb_pertanyaan_kategori` (
  `pertanyaanKID` int(11) NOT NULL,
  `pertanyaanKDesk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pertanyaan_kategori`
--

INSERT INTO `tb_pertanyaan_kategori` (`pertanyaanKID`, `pertanyaanKDesk`) VALUES
(1, 'kerja'),
(2, 'lanjut Kuliah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `petugasID` int(11) NOT NULL,
  `petugasNama` varchar(255) DEFAULT NULL,
  `petugasRule` varchar(255) DEFAULT NULL,
  `petugasUsername` varchar(255) DEFAULT NULL,
  `petugasPassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`petugasID`, `petugasNama`, `petugasRule`, `petugasUsername`, `petugasPassword`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'admin1', NULL, 'sdfdf', 'sdfds'),
(3, 'admin3', 'addx', 'sdfdf', 'asffdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`alumniID`);

--
-- Indexes for table `tb_jawaban_alumni`
--
ALTER TABLE `tb_jawaban_alumni`
  ADD PRIMARY KEY (`jawabanAlumniID`),
  ADD KEY `jawabanAlumni_alumniID` (`jawabanAlumni_alumniID`),
  ADD KEY `jawabanAlumni_pertanyaanID` (`jawabanAlumni_pertanyaanID`);

--
-- Indexes for table `tb_jawaban_alumni_essay`
--
ALTER TABLE `tb_jawaban_alumni_essay`
  ADD PRIMARY KEY (`jawabanAlumniEsayID`),
  ADD KEY `jawabanAlumniEsay_jawabanAlumniID` (`jawabanAlumniEsay_jawabanAlumniID`);

--
-- Indexes for table `tb_jawaban_alumni_pm`
--
ALTER TABLE `tb_jawaban_alumni_pm`
  ADD PRIMARY KEY (`jawabanAlumniPMID`) USING BTREE,
  ADD KEY `jawabanAlumniPM_jawabanPMID` (`jawabanAlumniPM_jawabanPMID`),
  ADD KEY `jawabanAlumniPM_djawabanPMID` (`jawabanAlumniPM_djawabanPMID`),
  ADD KEY `jawabanAlumniPM_jawabanAlumniID` (`jawabanAlumniPM_jawabanAlumniID`);

--
-- Indexes for table `tb_jawaban_alumni_ps`
--
ALTER TABLE `tb_jawaban_alumni_ps`
  ADD PRIMARY KEY (`jawabanAlumniPSID`) USING BTREE,
  ADD KEY `jawabanAlumniPS_jawabanPSID` (`jawabanAlumniPS_jawabanPSID`),
  ADD KEY `jawabanAlumniPS_jawabanAlumniID` (`jawabanAlumniPS_jawabanAlumniID`);

--
-- Indexes for table `tb_jawaban_alumni_ps_lanjut`
--
ALTER TABLE `tb_jawaban_alumni_ps_lanjut`
  ADD PRIMARY KEY (`jawabanAlumniPSLID`) USING BTREE,
  ADD KEY `jawabanAlumniPSL_jawabanAlumniPSID` (`jawabanAlumniPSL_jawabanAlumniPSID`);

--
-- Indexes for table `tb_jawaban_pm`
--
ALTER TABLE `tb_jawaban_pm`
  ADD PRIMARY KEY (`jawabanPMID`),
  ADD KEY `jawabanPM_pertanyaanID` (`jawabanPM_pertanyaanID`);

--
-- Indexes for table `tb_jawaban_pm_detail`
--
ALTER TABLE `tb_jawaban_pm_detail`
  ADD PRIMARY KEY (`djawabanPMID`),
  ADD KEY `djawabanPM_jawabanPMID` (`djawabanPM_jawabanPMID`);

--
-- Indexes for table `tb_jawaban_ps`
--
ALTER TABLE `tb_jawaban_ps`
  ADD PRIMARY KEY (`jawabanPSID`),
  ADD KEY `jawabanPS_pertanyaanID` (`jawabanPS_pertanyaanID`);

--
-- Indexes for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`pertanyaanID`),
  ADD KEY `pertanyaan_pertanyaanKID` (`pertanyaan_pertanyaanKID`);

--
-- Indexes for table `tb_pertanyaan_kategori`
--
ALTER TABLE `tb_pertanyaan_kategori`
  ADD PRIMARY KEY (`pertanyaanKID`) USING BTREE;

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`petugasID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  MODIFY `alumniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni`
--
ALTER TABLE `tb_jawaban_alumni`
  MODIFY `jawabanAlumniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_essay`
--
ALTER TABLE `tb_jawaban_alumni_essay`
  MODIFY `jawabanAlumniEsayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_pm`
--
ALTER TABLE `tb_jawaban_alumni_pm`
  MODIFY `jawabanAlumniPMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_ps`
--
ALTER TABLE `tb_jawaban_alumni_ps`
  MODIFY `jawabanAlumniPSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_ps_lanjut`
--
ALTER TABLE `tb_jawaban_alumni_ps_lanjut`
  MODIFY `jawabanAlumniPSLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_jawaban_pm`
--
ALTER TABLE `tb_jawaban_pm`
  MODIFY `jawabanPMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_jawaban_pm_detail`
--
ALTER TABLE `tb_jawaban_pm_detail`
  MODIFY `djawabanPMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_jawaban_ps`
--
ALTER TABLE `tb_jawaban_ps`
  MODIFY `jawabanPSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  MODIFY `pertanyaanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tb_pertanyaan_kategori`
--
ALTER TABLE `tb_pertanyaan_kategori`
  MODIFY `pertanyaanKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `petugasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jawaban_alumni`
--
ALTER TABLE `tb_jawaban_alumni`
  ADD CONSTRAINT `jawabanAlumni_alumniID` FOREIGN KEY (`jawabanAlumni_alumniID`) REFERENCES `tb_alumni` (`alumniID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jawabanAlumni_pertanyaanID` FOREIGN KEY (`jawabanAlumni_pertanyaanID`) REFERENCES `tb_pertanyaan` (`pertanyaanID`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jawaban_alumni_essay`
--
ALTER TABLE `tb_jawaban_alumni_essay`
  ADD CONSTRAINT `jawabanAlumniEsay_jawabanAlumniID` FOREIGN KEY (`jawabanAlumniEsay_jawabanAlumniID`) REFERENCES `tb_jawaban_alumni` (`jawabanAlumniID`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jawaban_alumni_pm`
--
ALTER TABLE `tb_jawaban_alumni_pm`
  ADD CONSTRAINT `jawabanAlumniPM_djawabanPMID` FOREIGN KEY (`jawabanAlumniPM_djawabanPMID`) REFERENCES `tb_jawaban_pm_detail` (`djawabanPMID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jawabanAlumniPM_jawabanAlumniID` FOREIGN KEY (`jawabanAlumniPM_jawabanAlumniID`) REFERENCES `tb_jawaban_alumni` (`jawabanAlumniID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jawabanAlumniPM_jawabanPMID` FOREIGN KEY (`jawabanAlumniPM_jawabanPMID`) REFERENCES `tb_jawaban_pm` (`jawabanPMID`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jawaban_alumni_ps`
--
ALTER TABLE `tb_jawaban_alumni_ps`
  ADD CONSTRAINT `jawabanAlumniPS_jawabanAlumniID` FOREIGN KEY (`jawabanAlumniPS_jawabanAlumniID`) REFERENCES `tb_jawaban_alumni` (`jawabanAlumniID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jawabanAlumniPS_jawabanPSID` FOREIGN KEY (`jawabanAlumniPS_jawabanPSID`) REFERENCES `tb_jawaban_ps` (`jawabanPSID`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jawaban_alumni_ps_lanjut`
--
ALTER TABLE `tb_jawaban_alumni_ps_lanjut`
  ADD CONSTRAINT `jawabanAlumniPSL_jawabanAlumniPSID` FOREIGN KEY (`jawabanAlumniPSL_jawabanAlumniPSID`) REFERENCES `tb_jawaban_alumni_ps` (`jawabanAlumniPSID`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jawaban_pm`
--
ALTER TABLE `tb_jawaban_pm`
  ADD CONSTRAINT `jawabanPM_pertanyaanID` FOREIGN KEY (`jawabanPM_pertanyaanID`) REFERENCES `tb_pertanyaan` (`pertanyaanID`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jawaban_pm_detail`
--
ALTER TABLE `tb_jawaban_pm_detail`
  ADD CONSTRAINT `djawabanPM_jawabanPMID` FOREIGN KEY (`djawabanPM_jawabanPMID`) REFERENCES `tb_jawaban_pm` (`jawabanPMID`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jawaban_ps`
--
ALTER TABLE `tb_jawaban_ps`
  ADD CONSTRAINT `jawabanPS_pertanyaanID` FOREIGN KEY (`jawabanPS_pertanyaanID`) REFERENCES `tb_pertanyaan` (`pertanyaanID`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD CONSTRAINT `pertanyaan_pertanyaanKID` FOREIGN KEY (`pertanyaan_pertanyaanKID`) REFERENCES `tb_pertanyaan_kategori` (`pertanyaanKID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
