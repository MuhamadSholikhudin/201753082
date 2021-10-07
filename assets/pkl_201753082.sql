-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Okt 2021 pada 10.22
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_201753082`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `alamat_instansi`, `no_telp`) VALUES
(1, 'DINAS TENAGA KERJA PATI', 'Kudus', '08967543354'),
(2, 'DINAS KOMINFO', 'Jln kantor', '08967543789'),
(3, 'DINAS PENDIDIKAN', 'PATI', '08967543398');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `no_klasifikasi` varchar(100) NOT NULL,
  `klasifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `no_klasifikasi`, `klasifikasi`) VALUES
(1, '1', 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampiran`
--

CREATE TABLE `lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `nama_lampiran` text NOT NULL,
  `file_lampiran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `id_suratmasuk`, `nama_lampiran`, `file_lampiran`) VALUES
(1, 2, 'tugas', '12707-Article_Text-6753-1-10-20190217.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `hakakses` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `username`, `password`, `nama`, `nip`, `jabatan`, `hakakses`, `foto`) VALUES
(2, 'rahajeng', '123', 'Rahajeng wulansari', '1111888775553', 'Kepala Pelaksana', 'Admin TU', 'ss.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
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
  `index` varchar(100) NOT NULL,
  `tanggal_teruskan` date NOT NULL,
  `klasifikasi_surat` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratkeluar`, `id_instansi`, `no_urut`, `tanggal_surat`, `perihal`, `sifat_surat`, `isi_ringkas`, `catatan`, `no_suratkeluar`, `index`, `tanggal_teruskan`, `klasifikasi_surat`, `status`) VALUES
(1, 1, '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '', ''),
(2, 2, '', '2021-09-30', '', '', '', '', '', '', '0000-00-00', '', ''),
(3, 1, '', '2021-09-23', '', '', '', '', '', '', '0000-00-00', '', ''),
(4, 1, '1', '2021-09-30', '', '', '', '', '', '', '0000-00-00', '', ''),
(5, 1, '1', '2021-09-16', '', '', '', '', '', '', '0000-00-00', '', ''),
(6, 1, '1', '2021-09-30', 'Permohonan', 'Penting', '', '', '', '', '0000-00-00', '', ''),
(7, 1, '1', '2021-09-23', 'Permohonan', 'Penting', 'isi', '', '', '', '0000-00-00', '', ''),
(8, 1, '2', '2021-09-30', 'Permohonan', 'Penting', 'isi', 'catatan', '123', 'Layanan', '2021-09-23', '1', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
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
  `index` varchar(100) NOT NULL,
  `tanggal_teruskan` date NOT NULL,
  `klasifikasi_surat` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratmasuk`, `id_instansi`, `no_urut`, `tanggal_surat`, `perihal`, `sifat_surat`, `isi_ringkas`, `catatan`, `no_suratmasuk`, `index`, `tanggal_teruskan`, `klasifikasi_surat`, `status`) VALUES
(1, 1, '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '', ''),
(2, 3, '12345', '2021-09-30', 'Permohonan', 'Penting', 'isi', 'isi', '12345', 'Layanan', '2021-09-30', 'Umum', '0'),
(3, 1, '', '2021-09-23', '', '', '', '', '', '', '0000-00-00', '', ''),
(4, 1, '1', '2021-09-30', '', '', '', '', '', '', '0000-00-00', '', ''),
(5, 1, '1', '2021-09-16', '', '', '', '', '', '', '0000-00-00', '', ''),
(6, 1, '1', '2021-09-30', 'Permohonan', 'Penting', 'isi', '', '', '', '0000-00-00', '', ''),
(7, 1, '1', '2021-09-23', 'Permohonan', 'Penting', 'isi', '', '', '', '0000-00-00', '', ''),
(8, 1, '2', '2021-09-30', 'Permohonan', 'Penting', 'isi', 'catatan', '123', 'Layanan', '2021-09-23', '1', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indeks untuk tabel `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
