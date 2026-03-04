-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2026 pada 05.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pbd_lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_uji`
--

CREATE TABLE `jenis_uji` (
  `id` int(11) NOT NULL,
  `nama_specimen` varchar(150) DEFAULT NULL,
  `jenis_barang` varchar(150) DEFAULT NULL,
  `harga_mahasiswa` decimal(12,2) DEFAULT NULL,
  `harga_umum` decimal(12,2) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_uji`
--

INSERT INTO `jenis_uji` (`id`, `nama_specimen`, `jenis_barang`, `harga_mahasiswa`, `harga_umum`, `satuan`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Oppo', 'Handphone', 10.00, 100.00, 'pcs', NULL, NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_lab`
--

CREATE TABLE `kepala_lab` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kepala_lab`
--

INSERT INTO `kepala_lab` (`id`, `nama`, `nip`, `jabatan`, `email`, `telepon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Kepala Lab', '198700000001', 'Kepala Lab Material', 'kapalab@upy.ac.id', '08123456789', 'Aktif', '2025-12-15 19:40:46', NULL),
(3, 'AHMAD RHIZKI PAMUNGKAS', '23111100001', 'Ketua', 'ahmadrhizki234@gmail.com', '083870160596', 'Aktif', '2025-12-29 15:10:25', '2025-12-29 15:10:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `no_nota` varchar(30) DEFAULT NULL,
  `tanggal_nota` date DEFAULT NULL,
  `tipe_pelanggan` enum('mahasiswa','umum') DEFAULT NULL,
  `nama_penerima` varchar(150) DEFAULT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id`, `no_nota`, `tanggal_nota`, `tipe_pelanggan`, `nama_penerima`, `nim`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'NT20251212144931', '2025-12-12', 'umum', 'Ahmad Rhizki', NULL, 1, NULL, NULL),
(2, 'NT20251212145126', '2025-12-12', 'mahasiswa', '', '', 1, NULL, NULL),
(3, 'NT20251215121728', '2025-12-15', 'mahasiswa', '', '', 1, NULL, NULL),
(4, 'NT20251215121834', '2025-12-15', 'umum', '', NULL, 1, NULL, NULL),
(5, 'NT20251229150604', '2025-12-29', 'umum', 'Ahmad Rhizki', NULL, 1, NULL, NULL),
(6, 'NT20251229150652', '2025-12-29', 'mahasiswa', '', '', 1, NULL, NULL),
(7, 'NT20251229150714', '2025-12-29', 'mahasiswa', 'Raden', '1100101010101', 1, NULL, NULL),
(8, 'NT20251229152126', '2025-12-29', 'umum', 'Ahmad Rhizki', NULL, 1, NULL, NULL),
(9, 'NT20251229152157', '2025-12-29', 'mahasiswa', 'Rahmat', '23111100001', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_detail`
--

CREATE TABLE `nota_detail` (
  `id` int(11) NOT NULL,
  `nota_id` int(11) DEFAULT NULL,
  `jenis_uji_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nota_detail`
--

INSERT INTO `nota_detail` (`id`, `nota_id`, `jenis_uji_id`, `jumlah`, `harga`, `total`) VALUES
(1, 1, 1, 1, 100.00, 100.00),
(2, 5, 1, 1, 100.00, 100.00),
(3, 6, 1, 1, 10.00, 10.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `role` enum('Admin','KepalaLab','Petugas') NOT NULL DEFAULT 'Petugas',
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `role`, `status`, `email`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Admin Utama', 'Admin', 'Aktif', 'admin@upy.ac.id', '0811111111', '2025-12-12 19:01:08', '2025-12-15 19:48:18'),
(4, 'petugas', 'aa027e41edc3372c35646eb382168ecd7092de7a', 'Petugas Lab', 'Petugas', 'Aktif', 'petugas@upy.ac.id', '0822222222', '2025-12-15 19:48:32', '2025-12-15 19:48:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_uji`
--
ALTER TABLE `jenis_uji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kepala_lab`
--
ALTER TABLE `kepala_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_nota` (`no_nota`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `nota_detail`
--
ALTER TABLE `nota_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota_id` (`nota_id`),
  ADD KEY `jenis_uji_id` (`jenis_uji_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_uji`
--
ALTER TABLE `jenis_uji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kepala_lab`
--
ALTER TABLE `kepala_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `nota_detail`
--
ALTER TABLE `nota_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `nota_detail`
--
ALTER TABLE `nota_detail`
  ADD CONSTRAINT `nota_detail_ibfk_1` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nota_detail_ibfk_2` FOREIGN KEY (`jenis_uji_id`) REFERENCES `jenis_uji` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
