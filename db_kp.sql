-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 08:05 AM
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
  `alumniProdi` varchar(50) DEFAULT NULL,
  `alumniFakultas` varchar(50) NOT NULL,
  `alumniTahunLulus` varchar(4) NOT NULL,
  `alumniNoWA` varchar(15) NOT NULL,
  `alumniEmail` varchar(50) NOT NULL,
  `alumniUsername` varchar(50) NOT NULL,
  `alumniPassword` varchar(50) NOT NULL,
  `alumniAlamat` text NOT NULL,
  `alumniStatusPertanyaan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni`
--

INSERT INTO `tb_alumni` (`alumniID`, `alumniNim`, `alumniNik`, `alumniNpwp`, `alumniNama`, `alumniProdi`, `alumniFakultas`, `alumniTahunLulus`, `alumniNoWA`, `alumniEmail`, `alumniUsername`, `alumniPassword`, `alumniAlamat`, `alumniStatusPertanyaan`) VALUES
(2, 11111143, 1111115, 12333, 'a123x', 'Informatika', 'Industri', '2020', '565656', 'aaaaa', '123', '123', 'fgf', NULL),
(3, 2355, 2355, 235, 'indah', NULL, 'dfg', '2020', '08124321212', 'asddd@gmail.com', '111', '111', 'ddf', NULL),
(4, 14030001, 346, 345, 'aaaaa123', NULL, 'dfg', '', '456', 'dfg', '14030001', '14030001', 'dfg', NULL),
(5, 13030027, 565, 34656, 'indah', 'INFORMATIKA', 'hg', '', '87686', 'indah@gmail.com', '13030027', '13030027', 'df', NULL),
(8, 18030025, 9786, 908675, 'maharani', 'Industri', 'informatika', '2009', '0888263015137', 'rani@gmail.com', '18030025', '18030025', 'jomblangancc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_alumin_alamat`
--

CREATE TABLE `tb_jawaban_alumin_alamat` (
  `jawabanAluminAlamatID` int(11) NOT NULL,
  `jawabanAlumniAlamat_jawabanAlumniID` int(11) DEFAULT NULL,
  `jawabanAluminAlamatProvinsi` varchar(255) DEFAULT NULL,
  `jawabanAluminAlamatKabupaten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(383, 5, 161, 'sukses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_alumni_essay`
--

CREATE TABLE `tb_jawaban_alumni_essay` (
  `jawabanAlumniEsayID` int(11) NOT NULL,
  `jawabanAlumniEsay_jawabanAlumniID` int(11) DEFAULT NULL,
  `jawabanAlumniEsayDesk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(406, 383, 175);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_alumni_ps_lanjut`
--

CREATE TABLE `tb_jawaban_alumni_ps_lanjut` (
  `jawabanAlumniPSLID` int(11) NOT NULL,
  `jawabanAlumniPSL_jawabanAlumniPSID` int(11) DEFAULT NULL,
  `jawabanAlumniPSLDesk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban_alumni_ps_lanjut`
--

INSERT INTO `tb_jawaban_alumni_ps_lanjut` (`jawabanAlumniPSLID`, `jawabanAlumniPSL_jawabanAlumniPSID`, `jawabanAlumniPSLDesk`) VALUES
(150, 406, 'ppa');

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
(22, 162, 'hrgrgrgrgsg');

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
(66, 22, 'sfe'),
(67, 22, 'ef'),
(68, 22, 'fe'),
(69, 22, 'grg');

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
(154, 150, 'aktif', 'coba jawaban 1'),
(155, 150, 'aktif', 'coba jawaban 2'),
(160, 152, 'aktif', 'jika ya, berapa bulan?'),
(161, 152, 'aktif', 'jika tidak, berapa bulan'),
(171, 157, 'tidak_aktif', 'jawaban 1'),
(172, 157, 'tidak_aktif', 'jawaban 2'),
(173, 157, 'aktif', 'jawaban 3 Lainya, benar-benar lain dari yang lain'),
(174, 161, 'tidak_aktif', 'biaya sendiri'),
(175, 161, 'aktif', 'beasiswa, sebutkan'),
(176, 150, 'tidak_aktif', 'biaya sendiri');

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
(150, 1, 'pilihan', 'kriteria_pilih_single_m_aktif', 'coba 1', 1),
(152, 1, 'pilihan', 'kriteria_pilih_single_m_tidak_aktif', 'apakah sudah mendapatkan pekerjaan', 45),
(156, 1, 'alamat', 'kriteria_alamat', 'alamat', 20),
(157, 1, 'pilihan', 'kriteria_pilih_single_m_aktif', 'coba tes yang berikutnya, benar-benar berikutnya', 16),
(158, 1, 'esay', 'kriteria_esay', 'segeg', 56),
(161, 2, 'pilihan', 'kriteria_pilih_single_m_tidak_aktif', 'sumber dana', 5),
(162, 1, 'pilihan', 'kriteria_pilih_multiple', 'ege', 456),
(167, 1, 'esay', 'kriteria_esay', 'segeg11211', 56),
(168, 1, 'esay', 'kriteria_esay', 'pekerjaan21', 56);

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
  `petugasUsername` varchar(255) DEFAULT NULL,
  `petugasPassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`petugasID`, `petugasNama`, `petugasUsername`, `petugasPassword`) VALUES
(1, 'admin1', 'admin1', 'admin1'),
(4, 'petugas5', 'petugas5', 'petugas5'),
(7, 'admin2', 'admin2', 'admin2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`alumniID`);

--
-- Indexes for table `tb_jawaban_alumin_alamat`
--
ALTER TABLE `tb_jawaban_alumin_alamat`
  ADD PRIMARY KEY (`jawabanAluminAlamatID`),
  ADD KEY `jawabanAlumniAlamat_jawabanAlumniID` (`jawabanAlumniAlamat_jawabanAlumniID`);

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
  MODIFY `alumniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumin_alamat`
--
ALTER TABLE `tb_jawaban_alumin_alamat`
  MODIFY `jawabanAluminAlamatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni`
--
ALTER TABLE `tb_jawaban_alumni`
  MODIFY `jawabanAlumniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_essay`
--
ALTER TABLE `tb_jawaban_alumni_essay`
  MODIFY `jawabanAlumniEsayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_pm`
--
ALTER TABLE `tb_jawaban_alumni_pm`
  MODIFY `jawabanAlumniPMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_ps`
--
ALTER TABLE `tb_jawaban_alumni_ps`
  MODIFY `jawabanAlumniPSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_ps_lanjut`
--
ALTER TABLE `tb_jawaban_alumni_ps_lanjut`
  MODIFY `jawabanAlumniPSLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tb_jawaban_pm`
--
ALTER TABLE `tb_jawaban_pm`
  MODIFY `jawabanPMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_jawaban_pm_detail`
--
ALTER TABLE `tb_jawaban_pm_detail`
  MODIFY `djawabanPMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_jawaban_ps`
--
ALTER TABLE `tb_jawaban_ps`
  MODIFY `jawabanPSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  MODIFY `pertanyaanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `tb_pertanyaan_kategori`
--
ALTER TABLE `tb_pertanyaan_kategori`
  MODIFY `pertanyaanKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `petugasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jawaban_alumin_alamat`
--
ALTER TABLE `tb_jawaban_alumin_alamat`
  ADD CONSTRAINT `jawabanAlumniAlamat_jawabanAlumniID` FOREIGN KEY (`jawabanAlumniAlamat_jawabanAlumniID`) REFERENCES `tb_jawaban_alumni` (`jawabanAlumniID`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `jawabanPM_pertanyaanID` FOREIGN KEY (`jawabanPM_pertanyaanID`) REFERENCES `tb_pertanyaan` (`pertanyaanID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jawaban_pm_detail`
--
ALTER TABLE `tb_jawaban_pm_detail`
  ADD CONSTRAINT `djawabanPM_jawabanPMID` FOREIGN KEY (`djawabanPM_jawabanPMID`) REFERENCES `tb_jawaban_pm` (`jawabanPMID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jawaban_ps`
--
ALTER TABLE `tb_jawaban_ps`
  ADD CONSTRAINT `jawabanPS_pertanyaanID` FOREIGN KEY (`jawabanPS_pertanyaanID`) REFERENCES `tb_pertanyaan` (`pertanyaanID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD CONSTRAINT `pertanyaan_pertanyaanKID` FOREIGN KEY (`pertanyaan_pertanyaanKID`) REFERENCES `tb_pertanyaan_kategori` (`pertanyaanKID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
