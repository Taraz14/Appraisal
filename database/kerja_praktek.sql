-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 03:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerja_praktek`
--

-- --------------------------------------------------------

--
-- Table structure for table `appraisal`
--

CREATE TABLE `appraisal` (
  `id_appraisal` int(11) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tahun_periode` varchar(50) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL,
  `tanggal_penilaian` date NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appraisal`
--

INSERT INTO `appraisal` (`id_appraisal`, `id_aspek`, `id_user`, `tahun_periode`, `periode`, `nilai`, `tanggal_penilaian`, `time`) VALUES
(1, 1, 1, '2019', 'April-June', 4, '2019-04-04', 1554368819),
(2, 2, 1, '2019', 'April-June', 4, '2019-04-04', 1554368819),
(3, 3, 1, '2019', 'April-June', 4, '2019-04-04', 1554368819),
(4, 4, 1, '2019', 'April-June', 3, '2019-04-04', 1554368819),
(5, 5, 1, '2019', 'April-June', 4, '2019-04-04', 1554368819),
(6, 6, 1, '2019', 'April-June', 4, '2019-04-04', 1554368819),
(7, 7, 1, '2019', 'April-June', 4, '2019-04-04', 1554368819),
(8, 8, 1, '2019', 'April-June', 4, '2019-04-04', 1554368819),
(9, 9, 1, '2019', 'April-June', 4, '2019-04-04', 1554368819),
(10, 1, 4, '2019', 'June-August', 4, '2019-04-04', 1554368950),
(11, 2, 4, '2019', 'June-August', 4, '2019-04-04', 1554368950),
(12, 3, 4, '2019', 'June-August', 3, '2019-04-04', 1554368950),
(13, 4, 4, '2019', 'June-August', 4, '2019-04-04', 1554368950),
(14, 5, 4, '2019', 'June-August', 4, '2019-04-04', 1554368950),
(15, 6, 4, '2019', 'June-August', 4, '2019-04-04', 1554368950),
(16, 7, 4, '2019', 'June-August', 4, '2019-04-04', 1554368950),
(17, 8, 4, '2019', 'June-August', 4, '2019-04-04', 1554368950),
(18, 9, 4, '2019', 'June-August', 4, '2019-04-04', 1554368950),
(19, 1, 1, '2019', 'October-December', 4, '2019-04-04', 1554369024),
(20, 2, 1, '2019', 'October-December', 4, '2019-04-04', 1554369024),
(21, 3, 1, '2019', 'October-December', 4, '2019-04-04', 1554369024),
(22, 4, 1, '2019', 'October-December', 4, '2019-04-04', 1554369024),
(23, 5, 1, '2019', 'October-December', 2, '2019-04-04', 1554369024),
(24, 6, 1, '2019', 'October-December', 2, '2019-04-04', 1554369024),
(25, 7, 1, '2019', 'October-December', 2, '2019-04-04', 1554369024),
(26, 8, 1, '2019', 'October-December', 1, '2019-04-04', 1554369024),
(27, 9, 1, '2019', 'October-December', 1, '2019-04-04', 1554369024),
(64, 1, 4, '2019', 'February-April', 4, '2019-04-05', 1554462315),
(65, 2, 4, '2019', 'February-April', 3, '2019-04-05', 1554462315),
(66, 3, 4, '2019', 'February-April', 4, '2019-04-05', 1554462315),
(67, 4, 4, '2019', 'February-April', 4, '2019-04-05', 1554462315),
(68, 5, 4, '2019', 'February-April', 3, '2019-04-05', 1554462315),
(69, 6, 4, '2019', 'February-April', 3, '2019-04-05', 1554462315),
(70, 7, 4, '2019', 'February-April', 4, '2019-04-05', 1554462315),
(71, 8, 4, '2019', 'February-April', 4, '2019-04-05', 1554462315),
(72, 9, 4, '2019', 'February-April', 4, '2019-04-05', 1554462315),
(73, 1, 5, '2019', 'July-October', 4, '2019-04-05', 1554475640),
(74, 2, 5, '2019', 'July-October', 4, '2019-04-05', 1554475640),
(75, 3, 5, '2019', 'July-October', 4, '2019-04-05', 1554475640),
(76, 4, 5, '2019', 'July-October', 4, '2019-04-05', 1554475640),
(77, 5, 5, '2019', 'July-October', 4, '2019-04-05', 1554475640),
(78, 6, 5, '2019', 'July-October', 4, '2019-04-05', 1554475640),
(79, 7, 5, '2019', 'July-October', 4, '2019-04-05', 1554475640),
(80, 8, 5, '2019', 'July-October', 4, '2019-04-05', 1554475640),
(81, 9, 5, '2019', 'July-October', 4, '2019-04-05', 1554475640);

-- --------------------------------------------------------

--
-- Table structure for table `aspek`
--

CREATE TABLE `aspek` (
  `id_aspek` int(11) NOT NULL,
  `id_jAspek` int(11) NOT NULL,
  `aspek` varchar(50) NOT NULL,
  `detail_aspek` varchar(100) NOT NULL,
  `bobot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek`
--

INSERT INTO `aspek` (`id_aspek`, `id_jAspek`, `aspek`, `detail_aspek`, `bobot`) VALUES
(1, 1, 'Ketetapan', 'Hadir tepat waktu yang sudah ditetapkan', '10'),
(2, 1, 'Absensi', 'Kehadiran kerja disebabkan oleh ijin atau alpa', '10'),
(3, 2, 'Motivasi Kerja', 'Memiliki inisiatif dan aktif berusaha, konsisten dan bersedia bekerja eksra', '10'),
(4, 2, 'Komunikasi dan Kerjasama', 'Menjalin komunikasi 2 arah, memahami kepentingan bagian lain terkait, bersediia menerima masukan', '10'),
(5, 3, 'Pemahaman dan Penguassaan Pekerjaan', 'Mampu menyelesaikan tugas dan mengatasi masalah secara mandiri, lebih efisien/efektif', '10'),
(6, 3, 'Pengembangan Diri', 'Menyediakan waktu untuk belajar lagi serta mau belajar dari pihak yang lebih memahami', '10'),
(7, 3, 'Teoritis', 'Pengetahuan teoritis tentang pekerjaan yang didapat dari pendidikan formal atau informal', '10'),
(8, 4, 'Kualitas Hasil Kerja', 'Keterampilan, ketelitian, kecermatan, dan keapihan termasuk tingkat pengawasan dan penelitian ulang ', '15'),
(9, 4, 'Kuantitas Hasil Kerja', 'Persentase hasil kerja yang diselesaikan dalam jangka waktu tertentu termasuk beban kerja, kecepatan', '15');

-- --------------------------------------------------------

--
-- Table structure for table `jaspek`
--

CREATE TABLE `jaspek` (
  `id_jAspek` int(11) NOT NULL,
  `judul_aspek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jaspek`
--

INSERT INTO `jaspek` (`id_jAspek`, `judul_aspek`) VALUES
(1, 'Disiplin'),
(2, 'Sikap Kerja'),
(3, 'Potensi dan Kemampuan'),
(4, 'Hasil Kerja');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pekerjaan` varchar(50) NOT NULL,
  `keterlibatan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `id_user`, `nama_pekerjaan`, `keterlibatan`, `keterangan`) VALUES
(1, 1, 'Pengembangan Johjoplan', 'Main', '-'),
(2, 1, 'App Danais', 'Support', 'Backend Saja'),
(3, 2, 'Web Developer', 'Development', 'Frontend');

-- --------------------------------------------------------

--
-- Table structure for table `skor`
--

CREATE TABLE `skor` (
  `id_skor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_penilaian` date NOT NULL,
  `periode` varchar(50) NOT NULL,
  `total_skor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skor`
--

INSERT INTO `skor` (`id_skor`, `id_user`, `tanggal_penilaian`, `periode`, `total_skor`) VALUES
(1, 1, '2017-04-04', 'April-June', 98),
(2, 4, '2019-04-04', 'June-August', 98),
(3, 1, '2019-04-04', 'October-December', 63),
(4, 4, '2019-04-05', 'February-April', 93),
(5, 5, '2019-04-05', 'July-October', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `role`, `email`, `pass`, `status`, `department`, `name_user`) VALUES
(1, 'karyawan', 'reanggun@gmail.com', 'reg', 'aktif', 'it', 'regina anggun'),
(2, 'manager', 'deka@gmail.com', '1234', 'aktif', 'it', 'dewi keban'),
(3, 'pnc', 'hendry@gmail.com', 'hen', 'aktif', '-', 'hendry'),
(4, 'karyawan', 'tika@yahoo.com', '123123', 'aktif', 'it', 'tikaa'),
(5, 'karyawan', 'steven@gmail.com', '11231', 'aktif', 'Produksi', 'steven tamrin'),
(6, 'karyawan', 'eka@gmail.com', '111122122', 'aktif', 'marketing', 'ekawati');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appraisal`
--
ALTER TABLE `appraisal`
  ADD PRIMARY KEY (`id_appraisal`),
  ADD KEY `id_aspek` (`id_aspek`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `aspek`
--
ALTER TABLE `aspek`
  ADD PRIMARY KEY (`id_aspek`),
  ADD KEY `id_jAspek` (`id_jAspek`);

--
-- Indexes for table `jaspek`
--
ALTER TABLE `jaspek`
  ADD PRIMARY KEY (`id_jAspek`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `FK_PROJECT_REFERENCE_USERS` (`id_user`);

--
-- Indexes for table `skor`
--
ALTER TABLE `skor`
  ADD PRIMARY KEY (`id_skor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appraisal`
--
ALTER TABLE `appraisal`
  MODIFY `id_appraisal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `skor`
--
ALTER TABLE `skor`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appraisal`
--
ALTER TABLE `appraisal`
  ADD CONSTRAINT `FK_appraisal_aspek` FOREIGN KEY (`id_aspek`) REFERENCES `aspek` (`id_aspek`),
  ADD CONSTRAINT `FK_appraisal_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `aspek`
--
ALTER TABLE `aspek`
  ADD CONSTRAINT `FK_aspek_jaspek` FOREIGN KEY (`id_jAspek`) REFERENCES `jaspek` (`id_jAspek`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_project_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `skor`
--
ALTER TABLE `skor`
  ADD CONSTRAINT `FK_skor_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
