-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 09:42 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `201753082`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kepala_pelaksana` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `catatan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_suratmasuk`, `id_user`, `id_kepala_pelaksana`, `updated_at`, `created_at`, `catatan`, `status`) VALUES
(2, 12, 11, 1, '2021-10-12 20:21:18', '2021-10-12 20:21:18', 'Mohon untuk di tindak lanjutin', 1),
(3, 2, 4, 1, '2021-10-12 16:35:18', '2021-10-12 16:35:18', 'segera tindak lanjutti', 0);

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `kota`, `alamat_instansi`, `no_telp`, `email`) VALUES
(1, 'DINAS TENAGA KERJA PATI', 'Pati', 'Kudus', '08967543354', ''),
(2, 'DINAS KOMINFO', 'Pati', 'Jln kantor', '08967543789', 'kominfopati@gmail.com'),
(3, 'DINAS PENDIDIKAN', 'Pati', 'Pati', '08967543398', ''),
(4, 'DINAS PERTANIAN DAN PANGAN KAB PATI', 'Pati', 'Jln Margorejo Pati', '089675478987', 'dinaspertanianpati@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_bidang`
--

CREATE TABLE `kepala_bidang` (
  `id_kepala_bidang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala_bidang`
--

INSERT INTO `kepala_bidang` (`id_kepala_bidang`, `id_user`, `nama`, `nip`, `jabatan`, `foto`) VALUES
(1, 4, 'Diyah Ayu', '243243543', 'Kepala Bidang Peralatan', 'kades.png'),
(2, 11, 'dessy adelia', '12321', 'Adm. Bid. Perindustrian ', 'dm_ff.png');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_pelaksana`
--

CREATE TABLE `kepala_pelaksana` (
  `id_kepala_pelaksana` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala_pelaksana`
--

INSERT INTO `kepala_pelaksana` (`id_kepala_pelaksana`, `id_user`, `nama`, `nip`, `jabatan`, `foto`) VALUES
(1, 3, 'Tarwinalis', '2324354354656', 'Kepala Pelaksana BPBD Pati', 'user.png'),
(2, 13, 'Yohan Firda', '11118887755789', 'Kepala Pelaksana', 'adit11.png');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `no_klasifikasi` varchar(100) NOT NULL,
  `klasifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `no_klasifikasi`, `klasifikasi`) VALUES
(1, '1', 'Umum'),
(2, '2', 'Pemerintahan');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `nama_lampiran` text NOT NULL,
  `file_lampiran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `id_suratmasuk`, `nama_lampiran`, `file_lampiran`) VALUES
(1, 2, 'tugas', '12707-Article_Text-6753-1-10-20190217.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `membuat`
--

CREATE TABLE `membuat` (
  `id_membuat` int(11) NOT NULL,
  `id_suratkeluar` int(11) NOT NULL,
  `id_kepala_bidang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membuat`
--

INSERT INTO `membuat` (`id_membuat`, `id_suratkeluar`, `id_kepala_bidang`, `created_at`, `updated_at`) VALUES
(1, 9, 1, '2021-10-12 18:36:36', '2021-10-12 23:36:36'),
(2, 10, 1, '2021-11-01 07:26:40', '2021-11-01 07:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `mendata`
--

CREATE TABLE `mendata` (
  `id_mendata` int(11) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `id_sub_umum_pegawai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mendata`
--

INSERT INTO `mendata` (`id_mendata`, `id_suratmasuk`, `id_sub_umum_pegawai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-10-10 20:40:36', '2021-10-10 20:40:36'),
(2, 12, 1, '2021-10-11 15:25:28', '2021-10-11 10:25:28'),
(3, 13, 1, '2021-10-11 02:26:01', '2021-10-11 02:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `penomoran`
--

CREATE TABLE `penomoran` (
  `id_penomoran` int(11) NOT NULL,
  `id_suratkeluar` int(11) NOT NULL,
  `id_sub_umum_pegawai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_suratkeluar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penomoran`
--

INSERT INTO `penomoran` (`id_penomoran`, `id_suratkeluar`, `id_sub_umum_pegawai`, `created_at`, `updated_at`, `no_suratkeluar`) VALUES
(1, 8, 1, '2021-10-12 03:55:29', '2021-10-12 03:55:29', ''),
(2, 9, 1, '2021-10-28 19:11:25', '2021-10-28 19:11:25', ''),
(3, 10, 1, '2021-11-01 07:37:47', '2021-11-01 07:37:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `setujui`
--

CREATE TABLE `setujui` (
  `id_setujui` int(11) NOT NULL,
  `id_suratkeluar` int(11) NOT NULL,
  `id_kepala_pelaksana` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `catatan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setujui`
--

INSERT INTO `setujui` (`id_setujui`, `id_suratkeluar`, `id_kepala_pelaksana`, `created_at`, `updated_at`, `catatan`, `status`) VALUES
(2, 2, 1, '2021-10-12 03:03:37', '2021-10-12 03:03:37', 'peminjaman Lab Komputer', 1),
(3, 8, 1, '2021-10-12 21:32:30', '2021-10-12 16:32:30', 'langsung tindak lanjuti', 1),
(4, 9, 1, '2021-10-12 19:35:56', '2021-10-12 19:35:56', 'Segera di tindak lanjuti', 1),
(5, 10, 1, '2021-11-01 07:33:00', '2021-11-01 07:33:00', 'Segera tindak lanjuti laporan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_umum_pegawai`
--

CREATE TABLE `sub_umum_pegawai` (
  `id_sub_umum_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_umum_pegawai`
--

INSERT INTO `sub_umum_pegawai` (`id_sub_umum_pegawai`, `nama`, `nip`, `jabatan`, `id_user`, `foto`) VALUES
(0, 'Ifa Septiana', '2432435489', 'Adm. Bid. Perlengkapan', 12, 'Apple_iPhone_12_6_1_inch_-_front_back_and_sides_2048x2048.png'),
(1, 'Rahajeng Wulansari', '1234567454', 'Kepala Sub Umum dan Pegawai', 2, 'ss.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `no_urut` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `sifat_surat` varchar(100) NOT NULL,
  `isi_ringkas` text NOT NULL,
  `catatan` text NOT NULL,
  `no_suratkeluar` varchar(100) NOT NULL,
  `tanggal_teruskan` date NOT NULL,
  `id_klasifikasi` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratkeluar`, `id_instansi`, `no_urut`, `tanggal_surat`, `perihal`, `sifat_surat`, `isi_ringkas`, `catatan`, `no_suratkeluar`, `tanggal_teruskan`, `id_klasifikasi`, `status`) VALUES
(1, 1, '', '0000-00-00', '', '', '', '', '', '0000-00-00', 1, '0'),
(2, 3, '1', '2021-09-30', 'Permohonan', 'Penting', 'Dengan Hormat,\r\nParagraf 1\r\n\r\nParagraf 2\r\n\r\nParagraf 3\r\n\r\nWassalam Wr. Wb', 'peminjaman Lab Komputer', '', '0000-00-00', 2, '3'),
(3, 1, '', '2021-09-23', '', '', '', '', '', '0000-00-00', 2, '0'),
(4, 1, '1', '2021-09-30', '', '', '', '', '', '0000-00-00', 1, '0'),
(5, 1, '1', '2021-09-16', '', '', '', '', '', '0000-00-00', 1, '0'),
(6, 1, '1', '2021-09-30', 'Permohonan', 'Penting', '', '', '', '0000-00-00', 2, '0'),
(7, 1, '1', '2021-09-23', 'Permohonan', 'Penting', 'isi', '', '', '0000-00-00', 2, '0'),
(8, 1, '1111', '2021-09-30', 'Permohonan', 'Penting', 'isi', 'catatan', '1111', '2021-09-23', 1, '4'),
(9, 1, '9', '2021-10-12', 'Permohonan6', 'Penting', 'isi', 'catatan', '12.0.9/BPBD-KP/X/2021', '0000-00-00', 1, '5'),
(10, 4, '10', '2021-11-01', 'Permohonan', 'Penting', 'Sehubung dengan adanya kegiatan kerja bakti untuk memperbaiki selokan bpbdp bertujuan  untuk memohon meminjam alat kebersihan pada dinas kebersihan', 'Permohonan', '12.0.10/BPBD-KP/XI/2021', '0000-00-00', 1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `no_urut` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `sifat_surat` varchar(100) NOT NULL,
  `isi_ringkas` text NOT NULL,
  `catatan` text NOT NULL,
  `no_suratmasuk` varchar(100) NOT NULL,
  `tanggal_teruskan` date NOT NULL,
  `id_klasifikasi` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratmasuk`, `id_instansi`, `no_urut`, `tanggal_surat`, `perihal`, `sifat_surat`, `isi_ringkas`, `catatan`, `no_suratmasuk`, `tanggal_teruskan`, `id_klasifikasi`, `file`, `status`) VALUES
(1, 1, '', '2021-10-13', '', '', '', '', '', '0000-00-00', '1', '', 3),
(2, 3, '12345', '2021-09-30', 'Permohonan', 'Penting', 'isi', 'isi', '12345', '2021-10-12', '1', 'leafet_HIPERTENSI1.pdf', 5),
(3, 1, '', '2021-09-23', '', '', '', '', '', '0000-00-00', '2', '', 0),
(4, 1, '1', '2021-09-30', '', '', '', '', '', '0000-00-00', '1', '', 0),
(5, 1, '1', '2021-09-16', '', '', '', '', '', '0000-00-00', '2', '', 0),
(6, 1, '1', '2021-09-30', 'Permohonan', 'Penting', 'isi', '', '', '0000-00-00', '1', '', 0),
(7, 1, '1', '2021-09-23', 'Permohonan', 'Penting', 'isi', '', '', '0000-00-00', '1', '', 0),
(8, 1, '2', '2021-09-30', 'Permohonan', 'Penting', 'isi', 'catatan', '123', '2021-11-01', '1', '', 3),
(11, 1, '12', '2021-10-11', 'Permohonan', 'Penting', 'saya adalah', 'catan', '123', '2021-10-11', '1', '12707-Article_Text-6753-1-10-201902173.pdf', 4),
(12, 3, '4', '2021-10-12', 'Permohonan1', 'Biasa', 'isi1', 'isi1', '1231', '2021-10-11', '2', 'Form_RDI.pdf', 5),
(13, 1, '12345', '2021-10-11', 'Permohonan', 'Penting', 'iki', 'iki', '1234587', '2021-10-11', '2', 'leafet_HIPERTENSI.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hakakses` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `hakakses`, `status`) VALUES
(2, 'rahajeng', '123', '', 'Admin TU', 1),
(3, 'tarwi', '123', 'muhammadsholihudin18@gmail.com', 'Admin Kepala', 1),
(4, 'ayuk', '123', '', 'Admin Bidang', 1),
(11, 'dessy', '123', '', 'Admin Bidang', 0),
(12, 'ifa', '123', '', 'Admin TU', 0),
(13, 'yohan', '123', '', 'Admin Kepala', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_suratmasuk` (`id_suratmasuk`),
  ADD KEY `id_kepala_pelaksana` (`id_kepala_pelaksana`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `kepala_bidang`
--
ALTER TABLE `kepala_bidang`
  ADD PRIMARY KEY (`id_kepala_bidang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kepala_pelaksana`
--
ALTER TABLE `kepala_pelaksana`
  ADD PRIMARY KEY (`id_kepala_pelaksana`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `id_suratmasuk` (`id_suratmasuk`);

--
-- Indexes for table `membuat`
--
ALTER TABLE `membuat`
  ADD PRIMARY KEY (`id_membuat`),
  ADD KEY `id_suratmasuk` (`id_suratkeluar`),
  ADD KEY `id_kepala_bidang` (`id_kepala_bidang`);

--
-- Indexes for table `mendata`
--
ALTER TABLE `mendata`
  ADD PRIMARY KEY (`id_mendata`),
  ADD KEY `id_suratmasuk` (`id_suratmasuk`),
  ADD KEY `id_sub_umum_pegawai` (`id_sub_umum_pegawai`);

--
-- Indexes for table `penomoran`
--
ALTER TABLE `penomoran`
  ADD PRIMARY KEY (`id_penomoran`),
  ADD KEY `id_suratmasuk` (`id_suratkeluar`),
  ADD KEY `id_sub_umum_pegawai` (`id_sub_umum_pegawai`);

--
-- Indexes for table `setujui`
--
ALTER TABLE `setujui`
  ADD PRIMARY KEY (`id_setujui`),
  ADD KEY `id_suratmasuk` (`id_suratkeluar`),
  ADD KEY `id_kepala_pelaksana` (`id_kepala_pelaksana`);

--
-- Indexes for table `sub_umum_pegawai`
--
ALTER TABLE `sub_umum_pegawai`
  ADD PRIMARY KEY (`id_sub_umum_pegawai`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_suratkeluar`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_suratmasuk`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kepala_bidang`
--
ALTER TABLE `kepala_bidang`
  MODIFY `id_kepala_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kepala_pelaksana`
--
ALTER TABLE `kepala_pelaksana`
  MODIFY `id_kepala_pelaksana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `membuat`
--
ALTER TABLE `membuat`
  MODIFY `id_membuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mendata`
--
ALTER TABLE `mendata`
  MODIFY `id_mendata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penomoran`
--
ALTER TABLE `penomoran`
  MODIFY `id_penomoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setujui`
--
ALTER TABLE `setujui`
  MODIFY `id_setujui` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_suratmasuk`) REFERENCES `surat_masuk` (`id_suratmasuk`),
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`id_kepala_pelaksana`) REFERENCES `kepala_pelaksana` (`id_kepala_pelaksana`),
  ADD CONSTRAINT `disposisi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `kepala_bidang`
--
ALTER TABLE `kepala_bidang`
  ADD CONSTRAINT `kepala_bidang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `kepala_pelaksana`
--
ALTER TABLE `kepala_pelaksana`
  ADD CONSTRAINT `kepala_pelaksana_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD CONSTRAINT `lampiran_ibfk_1` FOREIGN KEY (`id_suratmasuk`) REFERENCES `surat_masuk` (`id_suratmasuk`);

--
-- Constraints for table `membuat`
--
ALTER TABLE `membuat`
  ADD CONSTRAINT `membuat_ibfk_1` FOREIGN KEY (`id_kepala_bidang`) REFERENCES `kepala_bidang` (`id_kepala_bidang`),
  ADD CONSTRAINT `membuat_ibfk_2` FOREIGN KEY (`id_suratkeluar`) REFERENCES `surat_keluar` (`id_suratkeluar`);

--
-- Constraints for table `mendata`
--
ALTER TABLE `mendata`
  ADD CONSTRAINT `mendata_ibfk_1` FOREIGN KEY (`id_sub_umum_pegawai`) REFERENCES `sub_umum_pegawai` (`id_sub_umum_pegawai`),
  ADD CONSTRAINT `mendata_ibfk_2` FOREIGN KEY (`id_suratmasuk`) REFERENCES `surat_masuk` (`id_suratmasuk`);

--
-- Constraints for table `penomoran`
--
ALTER TABLE `penomoran`
  ADD CONSTRAINT `penomoran_ibfk_1` FOREIGN KEY (`id_sub_umum_pegawai`) REFERENCES `sub_umum_pegawai` (`id_sub_umum_pegawai`),
  ADD CONSTRAINT `penomoran_ibfk_2` FOREIGN KEY (`id_suratkeluar`) REFERENCES `surat_keluar` (`id_suratkeluar`);

--
-- Constraints for table `setujui`
--
ALTER TABLE `setujui`
  ADD CONSTRAINT `setujui_ibfk_1` FOREIGN KEY (`id_kepala_pelaksana`) REFERENCES `kepala_pelaksana` (`id_kepala_pelaksana`),
  ADD CONSTRAINT `setujui_ibfk_3` FOREIGN KEY (`id_suratkeluar`) REFERENCES `surat_keluar` (`id_suratkeluar`);

--
-- Constraints for table `sub_umum_pegawai`
--
ALTER TABLE `sub_umum_pegawai`
  ADD CONSTRAINT `sub_umum_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
