-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 07:01 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simak_dharmanegara`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_04_06_233832_create_table_ruangan', 1),
(4, '2020_04_06_233957_create_table_prodi', 1),
(5, '2020_04_06_234136_create_table_konsentrasi', 1),
(6, '2020_04_06_234430_create_table_tahun_akademik', 1),
(7, '2020_04_08_174152_create_table_mahasiswa', 1),
(8, '2020_04_08_181257_create_table_tahun_angkatan', 1),
(9, '2020_04_09_071915_create_table_dosen', 1),
(10, '2020_04_09_081527_create_table_matkul', 1),
(11, '2020_04_09_123344_create_table_registrasi', 1),
(12, '2020_04_10_074402_create_table_jadwal', 1),
(13, '2020_04_10_190717_create_table_krs', 2),
(14, '2020_04_11_043219_create_table_khs', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nip` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nip`, `nama`, `no_telp`, `email`, `prodi_id`, `created_at`, `updated_at`) VALUES
(11706125, 'andri', '082345123', 'andri@gmail.com', 1, '2020-05-04 10:47:29', '2020-05-04 10:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik_id` int(11) DEFAULT NULL,
  `prodi_id` int(11) NOT NULL,
  `konsentrasi_id` int(11) NOT NULL,
  `hari` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matkul_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `tahun_akademik_id`, `prodi_id`, `konsentrasi_id`, `hari`, `matkul_id`, `ruangan_id`, `jam_mulai`, `jam_selesai`, `dosen_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Senin', 'DTIKB001', 1, '07:00:00', '08:00:00', 11706125, NULL, '2020-05-07 04:29:39'),
(2, 1, 1, 1, 'Rabu', 'DTIKB002', 1, '21:00:00', '22:00:00', 11706125, NULL, '2020-05-07 04:29:39'),
(3, 1, 1, 1, 'Kamis', 'DTIKB004', 1, '10:00:00', '00:00:00', 11706125, NULL, '2020-05-07 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_khs`
--

CREATE TABLE `tb_khs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `krs_id` int(11) NOT NULL,
  `kehadiran` int(11) DEFAULT NULL,
  `tugas` int(11) DEFAULT NULL,
  `mutu` int(11) DEFAULT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_khs`
--

INSERT INTO `tb_khs` (`id`, `nim`, `krs_id`, `kehadiran`, `tugas`, `mutu`, `grade`, `created_at`, `updated_at`) VALUES
(6, 903583, 14, 20, 4, 4, 'B', NULL, '2020-05-04 15:09:19'),
(9, 903583, 17, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsentrasi`
--

CREATE TABLE `tb_konsentrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konsentrasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_konsentrasi`
--

INSERT INTO `tb_konsentrasi` (`id`, `konsentrasi`, `prodi_id`, `created_at`, `updated_at`) VALUES
(1, 'Rekayasa Perangkat Lunak', '1', NULL, NULL),
(2, 'Akutansi management', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_krs`
--

CREATE TABLE `tb_krs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_krs`
--

INSERT INTO `tb_krs` (`id`, `nim`, `jadwal_id`, `created_at`, `updated_at`) VALUES
(14, 903583, 1, NULL, NULL),
(17, 903583, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun_angkatan_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `konsentrasi_id` int(11) NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ayah` int(50) NOT NULL,
  `nama_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ibu` int(50) NOT NULL,
  `nama_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `jk`, `agama`, `tempat_lahir`, `tanggal_lahir`, `tahun_angkatan_id`, `prodi_id`, `konsentrasi_id`, `alamat`, `nik_ayah`, `nama_ayah`, `pekerjaan_ayah`, `nik_ibu`, `nama_ibu`, `pekerjaan_ibu`, `created_at`, `updated_at`) VALUES
(903583, 'aersadf', 'Laki - laki', 'Islam', 'bsdf', '2020-05-04', 1, 1, 1, 'asdf', 123134, 'asdf', 'asdf', 34567, 'serwer', 'dfg', '2020-05-04 10:56:54', '2020-05-04 10:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `kode_matkul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `konsentrasi_id` int(11) NOT NULL,
  `matkul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`kode_matkul`, `prodi_id`, `konsentrasi_id`, `matkul`, `sks`, `semester`, `created_at`, `updated_at`) VALUES
('DTIKB001', 1, 1, 'Konsep Pemrograman', 4, 1, NULL, NULL),
('DTIKB002', 1, 1, 'Praktek Konsep Pemrograman', 4, 1, NULL, '2020-05-05 04:15:21'),
('DTIKB003', 1, 1, 'Algoritma', 3, 1, '2020-05-05 02:54:13', '2020-05-05 02:54:13'),
('DTIKB004', 1, 1, 'Teknik Komputer Dasar', 4, 1, '2020-05-07 03:54:45', '2020-05-07 03:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id`, `prodi`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', NULL, NULL),
(2, 'Akutansi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasi`
--

CREATE TABLE `tb_registrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `tahun_akademik_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_registrasi`
--

INSERT INTO `tb_registrasi` (`id`, `nim`, `tahun_akademik_id`, `created_at`, `updated_at`) VALUES
(2, 903583, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id`, `ruangan`, `created_at`, `updated_at`) VALUES
(1, 'R203', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_akademik`
--

CREATE TABLE `tb_tahun_akademik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_tahun_akademik`
--

INSERT INTO `tb_tahun_akademik` (`id`, `tahun_akademik`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, '20181', 'Semester Ganjil', 'aktif', NULL, '2020-05-07 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_angkatan`
--

CREATE TABLE `tb_tahun_angkatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_angkatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_tahun_angkatan`
--

INSERT INTO `tb_tahun_angkatan` (`id`, `tahun_angkatan`, `created_at`, `updated_at`) VALUES
(1, '2014', NULL, NULL),
(2, '2020', '2020-05-07 03:33:46', '2020-05-07 03:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '12345', 'andriawan@gmail.com', NULL, '$2y$10$3kVERKmJvWLWFRihnMBcNOcO9o/cT2HGY7LPqTYadS7f6NvoNLMR2', 'Admin', '1', NULL, '2020-04-11 01:58:58', '2020-04-11 01:58:58'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$95lYAGQKy.FS2Gtjf35eVOpgx0rwuCDo8chqxv/d4wCN.vMuaVO1e', 'Admin', '1', NULL, NULL, '2020-05-07 04:47:17'),
(4, '11706125', 'andri@gmail.com', NULL, '$2y$10$IoDZBLX/nPfAOlM/Wjby6.ChYcySkoWTODiuBfxGQUoDc9/h/oivy', 'Dosen', '1', NULL, '2020-05-04 10:47:29', '2020-05-04 10:47:29'),
(5, '903583', NULL, NULL, '$2y$10$S5e9LoOj.Llx58A1JllHZ.0Tx7h883oDWN3yw4o1B4TrqRm4Gioqm', 'Mahasiswa', '1', NULL, '2020-05-04 10:56:54', '2020-05-04 10:56:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_khs`
--
ALTER TABLE `tb_khs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_konsentrasi`
--
ALTER TABLE `tb_konsentrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tahun_angkatan`
--
ALTER TABLE `tb_tahun_angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_khs`
--
ALTER TABLE `tb_khs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_konsentrasi`
--
ALTER TABLE `tb_konsentrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_krs`
--
ALTER TABLE `tb_krs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_tahun_angkatan`
--
ALTER TABLE `tb_tahun_angkatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
