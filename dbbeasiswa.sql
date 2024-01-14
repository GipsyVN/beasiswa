-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2024 pada 11.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbeasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acc`
--

CREATE TABLE `acc` (
  `idacc` int(11) NOT NULL,
  `iddaftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `acc`
--

INSERT INTO `acc` (`idacc`, `iddaftar`) VALUES
(13, 12),
(14, 15),
(15, 16),
(16, 14),
(17, 17),
(18, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama_mahasiswa`, `tanggal_lahir`, `alamat`, `telp`) VALUES
(12, '202287001', 'A', '2024-01-01', 'asdf', '1234'),
(13, '202287002', 'B', '2024-01-01', 'asdf', '1234'),
(14, '202287003', 'c', '2024-01-01', 'asdf', '1234'),
(15, '202287004', 'd', '2024-01-01', 'asdf', '1234'),
(16, '202287005', 'e', '2024-01-01', 'asdf', '1234'),
(17, '202287006', 'f', '2024-01-01', 'asdf', '1234'),
(18, '202287007', 'g', '2024-01-01', 'asdf', '1234'),
(19, '202287008', 'h', '2024-01-01', 'asdf', '1234'),
(20, '202287009', 'i', '2024-01-01', 'asdf', '1234'),
(21, '202287010', 'j', '2024-01-01', 'asdf', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `iddaftar` int(11) NOT NULL,
  `jenis_beasiswa` varchar(20) NOT NULL,
  `tgldaftar` date DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nik` int(16) NOT NULL,
  `no_kk` int(16) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `semester` int(1) NOT NULL,
  `golongan_darah` varchar(2) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pendapatan_ortu` int(11) DEFAULT NULL,
  `ipk` decimal(3,2) DEFAULT NULL,
  `jml_saudara` int(11) DEFAULT NULL,
  `verifikasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`iddaftar`, `jenis_beasiswa`, `tgldaftar`, `tahun`, `nim`, `nik`, `no_kk`, `tempat_lahir`, `jenis_kelamin`, `fakultas`, `program_studi`, `semester`, `golongan_darah`, `agama`, `email`, `pendapatan_ortu`, `ipk`, `jml_saudara`, `verifikasi`) VALUES
(12, 'Prestasi', '2024-01-14', '2024', '202287001', 1234, 1234, 'asf', 'Laki-Laki', 'asdf', 'asdf', 2, 'O', 'Lainnya', 'asddsa', 500000, 3.75, 2, 'Terverifikasi'),
(14, 'Tugas Akhir', '2024-01-14', '2024', '202287003', 123, 123, 'asda', 'Perempuan', 'asd', 'asdsd', 7, 'O', 'Lainnya', 'ayam@gmail.com', 1000000, 3.50, 1, 'Terverifikasi'),
(15, 'Prestasi', '2024-01-14', '2024', '202287004', 123, 123, 'asfad', 'Laki-Laki', 'ASDFGHJK', 'asdas', 5, 'O', 'Lainnya', 'itik@gmail.com', 700000, 3.50, 3, 'Terverifikasi'),
(16, 'Kurang Mampu', '2024-01-14', '2024', '202287005', 1232, 1234, 'asfad', 'Perempuan', 'ASDFGHJK', 'asdas', 2, 'A', 'Budha', 'asdfghj@gmail.com', 150000, 2.00, 3, 'Terverifikasi'),
(17, 'Tugas Akhir', '2024-01-14', '2024', '202287006', 1234, 1234, 'asdads', 'Perempuan', 'dssf', 'dsfs', 6, 'B', 'Islam', 'asdfghj@gmail.com', 600000, 1.00, 2, 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkingan`
--

CREATE TABLE `perangkingan` (
  `idperangkingan` int(11) NOT NULL,
  `iddaftar` int(11) DEFAULT NULL,
  `n_pendapatan` decimal(4,3) DEFAULT NULL,
  `n_ipk` decimal(4,3) DEFAULT NULL,
  `n_saudara` decimal(4,3) DEFAULT NULL,
  `preferensi` decimal(4,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `perangkingan`
--

INSERT INTO `perangkingan` (`idperangkingan`, `iddaftar`, `n_pendapatan`, `n_ipk`, `n_saudara`, `preferensi`) VALUES
(29, 13, 1.000, 1.000, 1.000, 1.000),
(87, 16, 1.000, 1.000, 1.000, 1.000),
(90, 14, 0.600, 1.000, 0.500, 0.770),
(91, 17, 1.000, 0.286, 1.000, 0.643),
(104, 12, 1.000, 1.000, 0.667, 0.933),
(105, 15, 0.714, 0.933, 1.000, 0.903);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `level`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(11, '202287001', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(12, '202287002', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(13, '202287003', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(14, '202287004', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(15, '202287005', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(16, '202287006', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(17, '202287007', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(18, '202287008', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(19, '202287009', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(20, '202287010', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`idacc`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`) USING BTREE;

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`iddaftar`) USING BTREE;

--
-- Indeks untuk tabel `perangkingan`
--
ALTER TABLE `perangkingan`
  ADD PRIMARY KEY (`idperangkingan`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acc`
--
ALTER TABLE `acc`
  MODIFY `idacc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `iddaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `perangkingan`
--
ALTER TABLE `perangkingan`
  MODIFY `idperangkingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
