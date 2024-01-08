-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2024 pada 11.05
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
(6, '123', 'Asd', '2024-01-03', 'asasd', '13123'),
(7, '1231', 'asd', '2024-01-02', 'asdasd', '081234567890'),
(8, '202287001', 'asdf', '2024-01-01', 'AADSASD', '2313213'),
(9, '202287004', 'asd', '2024-01-01', 'dsadad', '123'),
(10, '202287005', 'tur', '2024-01-01', 'asdasd', '12312'),
(11, '202287006', 'asdf', '2024-01-01', 'asdad', '12121');

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
  `verifikasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`iddaftar`, `jenis_beasiswa`, `tgldaftar`, `tahun`, `nim`, `nik`, `no_kk`, `tempat_lahir`, `jenis_kelamin`, `fakultas`, `program_studi`, `semester`, `golongan_darah`, `agama`, `email`, `pendapatan_ortu`, `ipk`, `jml_saudara`, `verifikasi`) VALUES
(2, '', '2023-12-14', '2023', '202287011', 0, 0, '', '', '', '', 0, '', '', '', 1231232, 4.00, 1, ''),
(4, '', '2023-12-11', '2021', '202287019', 0, 0, '', '', '', '', 0, '', '', '', 12123, 3.89, 3, ''),
(6, '', '2023-12-12', '2023', '202287012', 0, 0, '', '', '', '', 0, '', '', '', 12313, 2.00, 2, ''),
(9, 'Prestasi', '2024-01-07', '2024', '202287004', 12123, 123123, 'asda', 'Laki-Laki', 'asdds', 'asdads', 2, 'B', 'lainya', 'sdasd', 122312312, 1.00, 1, 'belum'),
(10, 'Kurang_mampu', '2024-01-07', '2024', '202287004', 1212, 12312, 'sdadas', 'Perempuan', '12asd', 'adsda', 5, 'O', 'Kristen', 'haa.444.444.haa@gmail.com', 123132313, 1.00, 1, 'Belum'),
(11, 'Kurang_mampu', '2024-01-07', '2024', '202287005', 123123, 12123, 'asdads', 'Perempuan', 'asdaf', 'asdas', 1, 'O', 'konghuchu', 'kontolmojang5@gmail.com', 1213, 1.00, 1, 'Belum');

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
(11, 4, 1.000, 1.000, 1.000, 1.000),
(12, 2, 0.010, 1.000, 0.500, 0.405),
(13, 6, 1.000, 0.500, 1.000, 0.850);

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
(4, 'Mahasiswa', '5787be38ee03a9ae5360f54d9026465f', 'Mahasiswa'),
(5, '202287002', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(6, '202287002', '9f544d24208a0d7f41079a4f2ef5a573', 'Mahasiswa'),
(7, '202287003', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(8, '202287004', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(9, '202287005', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa'),
(10, '202287006', '8696f8389f115a3bbb8208946b990cc1', 'Mahasiswa');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `iddaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `perangkingan`
--
ALTER TABLE `perangkingan`
  MODIFY `idperangkingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
