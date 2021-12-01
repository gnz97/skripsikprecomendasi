-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 07:52 PM
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
(6, 13030001, 123, 123, 'Ken', NULL, 'informatika', '2013', '8123333', 'ken@gmail.com', '13030001', '13030001', 'fg', NULL),
(8, 18030025, 9786, 908675, 'maharani', NULL, 'informatika', '2009', '0888263015137', 'rani@gmail.com', '18030025', '18030025', 'jomblangan', NULL);

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
(19, 58, 'Pengembangan Diri');

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
(57, 19, 'Sangat Baik');

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
(105, 111, 'tidak_aktif', 'swasta'),
(106, 111, 'tidak_aktif', 'bumn'),
(107, 111, 'aktif', 'lainnya...');

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
(100, 1, 'alamat', 'kriteria_alamat', 'lokasi tempat kerja?', 13),
(111, 1, 'pilihan', 'kriteria_pilih_single', 'apa posisi jabatan sekarang?', 3),
(112, 2, 'esay', 'kriteria_esay', 'prodi jurusan yang diambil?', 1);

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
(1, 'admin1', 'admin1', 'admin1', 'admin1'),
(4, 'petugas4', 'petugas4', 'petugas4', 'petugas4'),
(7, 'admin2', 'admin2', 'admin2', 'admin2');

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
  MODIFY `alumniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumin_alamat`
--
ALTER TABLE `tb_jawaban_alumin_alamat`
  MODIFY `jawabanAluminAlamatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni`
--
ALTER TABLE `tb_jawaban_alumni`
  MODIFY `jawabanAlumniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_essay`
--
ALTER TABLE `tb_jawaban_alumni_essay`
  MODIFY `jawabanAlumniEsayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_pm`
--
ALTER TABLE `tb_jawaban_alumni_pm`
  MODIFY `jawabanAlumniPMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_ps`
--
ALTER TABLE `tb_jawaban_alumni_ps`
  MODIFY `jawabanAlumniPSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `tb_jawaban_alumni_ps_lanjut`
--
ALTER TABLE `tb_jawaban_alumni_ps_lanjut`
  MODIFY `jawabanAlumniPSLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_jawaban_pm`
--
ALTER TABLE `tb_jawaban_pm`
  MODIFY `jawabanPMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_jawaban_pm_detail`
--
ALTER TABLE `tb_jawaban_pm_detail`
  MODIFY `djawabanPMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_jawaban_ps`
--
ALTER TABLE `tb_jawaban_ps`
  MODIFY `jawabanPSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  MODIFY `pertanyaanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tb_pertanyaan_kategori`
--
ALTER TABLE `tb_pertanyaan_kategori`
  MODIFY `pertanyaanKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `petugasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
