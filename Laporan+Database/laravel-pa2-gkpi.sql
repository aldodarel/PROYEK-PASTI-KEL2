-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2024 at 08:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-pa2-gkpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `baptis`
--

CREATE TABLE `baptis` (
  `id_baptis` int(11) NOT NULL,
  `tgl_baptis` date DEFAULT NULL,
  `nama_pendeta_baptis` varchar(255) DEFAULT NULL,
  `no_surat_baptis` varchar(255) DEFAULT NULL,
  `file_surat_baptis` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baptis`
--

INSERT INTO `baptis` (`id_baptis`, `tgl_baptis`, `nama_pendeta_baptis`, `no_surat_baptis`, `file_surat_baptis`, `created_at`, `updated_at`, `nik`) VALUES
(1, '2024-04-23', 'maria', '1234567', NULL, '2024-04-23', NULL, 'GKPI_JKPS_4'),
(2, '2022-04-10', 'asri', '1234567', NULL, '2024-04-24', '2024-04-24', 'GKPI_JKPS_4'),
(4, '2024-04-10', 'Asri Sirait', 'GKPI_11223344556677', NULL, '2024-04-24', '2024-04-24', 'GKPI_JKPS_7'),
(19, '2024-04-11', 'Asri SiraitT', 'GKPI_11223344556677', '/lampiran/baptis/1714103141-549b0df4a471a813b6dc9ed3dbc59f1d.jpg', '2024-04-26', '2024-04-26', 'GKPI_JKPS_8'),
(21, NULL, NULL, NULL, '', '2024-05-10', '2024-05-10', 'GKPI_JKPS_9'),
(22, '2024-05-11', 'Juan Sinaga', 'GKPI_11223344556677', '/lampiran/baptis/1715315432-7367d2255b0f2eb890c433516eb68cfe.jpg', '2024-05-10', '2024-05-10', 'GKPI_JKPS_10');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ibadah`
--

CREATE TABLE `jadwal_ibadah` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `jenis` enum('Mingguan','Sektor','Situasional','Dukacita','Sakramen') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) DEFAULT NULL,
  `updated_by` varchar(16) DEFAULT NULL,
  `jumlah_hadir` int(11) DEFAULT NULL,
  `tata_ibadah` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_ibadah`
--

INSERT INTO `jadwal_ibadah` (`id`, `name`, `tanggal`, `waktu`, `jenis`, `created_at`, `updated_at`, `created_by`, `updated_by`, `jumlah_hadir`, `tata_ibadah`) VALUES
(1, 'Ibadah Pemuda/Pemudii', '2022-04-14', '12:01:00', 'Mingguan', '2022-04-14 17:00:00', '2022-04-15 17:00:00', '1234567890123456', '1234567890123456', 100, '/lampiran/tataibadah/1714900724-35483bb792e49589425cf592c192c590.jpg'),
(2, 'Ibadah Paskah', '2024-04-09', '05:00:00', 'Situasional', '2024-04-29 13:28:59', '2024-04-29 13:28:59', NULL, NULL, 125, '/lampiran/tataibadah/1714960316-d0fde79fc2a670818b14400d9ae7d212.pdf'),
(3, 'Ibadah Natal', '2024-12-25', '23:00:00', 'Situasional', '2024-05-01 14:40:14', '2024-05-01 14:40:14', NULL, NULL, NULL, NULL),
(4, 'Ibadah Sukacita', '2024-05-05', '23:00:00', 'Mingguan', '2024-05-05 04:02:45', '2024-05-05 04:02:45', NULL, NULL, NULL, '/lampiran/tataibadah/1714881765-4bcfdc034f4dacccbba37308abad87b0.png'),
(5, 'Naik Sidi', '2024-06-11', '23:00:00', 'Sakramen', '2024-05-09 14:13:28', '2024-05-09 14:13:28', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelayanan`
--

CREATE TABLE `jadwal_pelayanan` (
  `id` int(11) NOT NULL,
  `status_pelayanan` enum('Pengkotbah','Liturgis','Doa Syafaat','Warta Jemaat','Pengumpul Persembahan 1','Pengumpul Persembahan 2','Pengumpul Persembahan 3','Pengumpul Persembahan 4','Penerima Tamu 1','Penerima Tamu 2','Penerima Tamu 3','Song Leader','Pemusik','Liturgis Sekolah Minggu') DEFAULT NULL,
  `id_pelayan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jadwal_ibadah` int(11) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_pelayanan`
--

INSERT INTO `jadwal_pelayanan` (`id`, `status_pelayanan`, `id_pelayan`, `id_jadwal_ibadah`, `updated_at`, `created_at`) VALUES
(1, 'Pengkotbah', '1212100107020004', 2, '2024-05-01 22:25:25', '2024-05-01 22:25:25'),
(2, 'Liturgis', '1212100107020001', 2, '2024-05-01 22:25:25', '2024-05-01 22:25:25'),
(3, 'Pengkotbah', '1212100107020001', 1, '2024-05-01 22:46:56', '2024-05-01 22:46:56'),
(4, 'Doa Syafaat', '1212100107020003', 1, '2024-05-01 22:46:56', '2024-05-01 22:46:56'),
(5, 'Warta Jemaat', '1212100107020002', 1, '2024-05-01 22:46:56', '2024-05-01 22:46:56'),
(6, 'Pengumpul Persembahan 1', '1212100107020004', 1, '2024-05-01 22:46:56', '2024-05-01 22:46:56'),
(7, 'Pengumpul Persembahan 2', '1234567890123456', 1, '2024-05-01 22:46:56', '2024-05-01 22:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `jemaat`
--

CREATE TABLE `jemaat` (
  `nik` varchar(16) NOT NULL,
  `username` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `status_gereja` enum('Aktif','Meninggal','Pindah') NOT NULL,
  `status_pernikahan` enum('Menikah','Belum Menikah','Cerai Mati') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `baptis` enum('Ya','Tidak') DEFAULT NULL,
  `sidi` enum('Ya','Tidak') DEFAULT NULL,
  `sektor_id` bigint(20) UNSIGNED NOT NULL,
  `sektor_role` enum('Penanggung Jawab','Anggota') NOT NULL DEFAULT 'Anggota',
  `profile` varchar(255) NOT NULL DEFAULT '/profile/default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lampiran` text DEFAULT NULL,
  `no_telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jemaat`
--

INSERT INTO `jemaat` (`nik`, `username`, `name`, `jenis_kelamin`, `password`, `alamat`, `tempat_lahir`, `status_gereja`, `status_pernikahan`, `tanggal_lahir`, `baptis`, `sidi`, `sektor_id`, `sektor_role`, `profile`, `created_at`, `updated_at`, `lampiran`, `no_telepon`) VALUES
('1212100107020001', 'darwin', 'Darwin sibarani', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Tarutung', 'Tarutung Kota', 'Aktif', 'Belum Menikah', '2022-05-01', 'Tidak', 'Tidak', 1, 'Anggota', 'profile/default.png', '2022-05-27 05:25:59', '2022-05-27 05:25:59', '/lampiran/jemaat/1653629159-970b3a375d877868603adb4045957b94.pdf', ''),
('1212100107020002', 'daniel', 'Daniel Simamora', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Tarutung', 'Tarutung Kota', 'Aktif', 'Belum Menikah', '2022-05-29', 'Tidak', 'Tidak', 1, 'Anggota', 'profile/default.png', '2022-05-27 10:52:13', '2022-05-27 10:52:13', '/lampiran/jemaat/1653648733-70fa08ef22ae0d7e4e655d561c36ac57.pdf', ''),
('1212100107020003', 'martuani', 'Martuani Sitohang', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Tarutung', 'Tarutung', 'Aktif', 'Belum Menikah', '2022-05-01', 'Tidak', 'Tidak', 1, 'Anggota', 'profile/default.png', '2022-05-27 14:41:38', '2022-05-27 14:41:38', '/lampiran/jemaat/1653662498-3e65182bc5c29ccb9aec8a45d4808dfa.pdf', ''),
('1212100107020004', 'cyntia', 'Cyntia', 'Laki-laki', 'admin123', 'Tarutung Kota', 'Tarutung', 'Aktif', 'Belum Menikah', '2022-05-29', 'Tidak', 'Tidak', 1, 'Anggota', 'profile/default.png', '2022-05-27 17:19:52', '2022-05-27 17:19:52', '/lampiran/jemaat/1653671992-4cce2b1e11f1e6e623efd792b2f21af1.pdf', '082272743315'),
('1212100107020006', 'torkis', 'Torkis', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Tarutung', 'Tarutung Kota', 'Aktif', 'Belum Menikah', '2022-05-01', 'Tidak', 'Tidak', 1, 'Anggota', 'profile/default.png', '2022-05-28 05:15:50', '2022-05-28 05:15:50', '/lampiran/jemaat/1653714950-72e43d7574e424f2a6b477cef6909827.pdf', ''),
('1234567890123456', 'dirgos', 'Pdt. Dirgos Lumban Tobing, M.Th', 'Laki-laki', '$2y$10$bKhaxZNZwMLYCCfgwKKGE.bD3kW21ShAwZ604/i8/bV23R2GWqxam', 'Tarutung Kota', 'Tarutung Kota', 'Aktif', 'Menikah', '1968-01-01', 'Tidak', 'Tidak', 1, 'Penanggung Jawab', 'profile/default.png', NULL, NULL, NULL, ''),
('289212190', 'yonoaja', 'yono', 'Laki-laki', '$2y$10$gK372e3LjvBslTPHstc91ull9S2h64NbJnzmbIzGBA866HMlQSGvS', 'Pontianak', 'Samarinda', 'Aktif', 'Menikah', '2024-05-21', NULL, NULL, 5, 'Anggota', '/profile/default.png', NULL, NULL, 'iasjiajsja', '081287171'),
('GKPI_JKPS_1', 'deboy', 'Mutiara Enjelina', 'Perempuan', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Jl. Baba Lubis', 'Balige', 'Aktif', 'Belum Menikah', '2004-07-26', 'Ya', 'Tidak', 7, 'Anggota', 'profile/default.png', '2024-04-22 12:59:20', '2024-04-22 12:59:20', '', '082164304672'),
('GKPI_JKPS_10', 'test_admin', 'test_admin', 'Laki-laki', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'fsfsgsgsgs', 'Balige', 'Aktif', 'Belum Menikah', '2024-05-11', 'Ya', 'Ya', 2, 'Penanggung Jawab', '/profile/jemaat/1715315432-af63717accd64a20ac39073892271145.jpg', '2024-05-10 04:30:32', '2024-05-10 04:30:32', '/lampiran/jemaat/1715315432-fac620d3991712ee235dec5ee636ed37.pdf', '082272743312'),
('GKPI_JKPS_2', 'jeremi', 'Jeremi Septian Manalu', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Laguboti', 'Balige', 'Aktif', 'Belum Menikah', '2007-02-21', 'Tidak', 'Tidak', 7, 'Anggota', 'profile/default.png', '2024-04-22 14:17:14', '2024-04-22 14:17:14', '', '082272743312'),
('GKPI_JKPS_3', 'monica', 'monica manalu', 'Perempuan', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'laguboti', 'Balige', 'Aktif', 'Belum Menikah', '2024-04-03', 'Ya', 'Ya', 7, 'Anggota', 'profile/default.png', '2024-04-23 08:29:17', '2024-04-23 08:29:17', '', '082272743311'),
('GKPI_JKPS_4', 'lek', 'laek', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'Laguboti', 'Balige', 'Aktif', 'Belum Menikah', '2024-04-22', 'Ya', 'Tidak', 4, 'Anggota', 'profile/default.png', '2024-04-23 12:31:39', '2024-04-23 12:31:39', '', '082272743318'),
('GKPI_JKPS_5', 'dan', 'daniel', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'laguboti', 'Balige', 'Aktif', 'Belum Menikah', '2024-04-23', 'Ya', 'Ya', 5, 'Anggota', 'profile/default.png', '2024-04-24 05:00:56', '2024-04-24 05:00:56', '', '082272743317'),
('GKPI_JKPS_7', 'anita', 'csc', 'Laki-laki', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'csacscadc', 'Balige', 'Aktif', 'Belum Menikah', '2024-04-10', 'Ya', 'Ya', 1, 'Anggota', 'profile/default.png', '2024-04-24 09:14:33', '2024-04-24 09:14:33', '', '082272743311'),
('GKPI_JKPS_8', 'if422008', 'test', 'Perempuan', '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG', 'CSADVADV', 'Balige', 'Aktif', 'Belum Menikah', '2024-04-18', 'Ya', 'Ya', 2, 'Penanggung Jawab', '/profile/jemaat/1714103141-2826d6f8e42c5b04234351bce24e0044.jpg', '2024-04-26 03:45:41', '2024-04-26 03:45:41', '/lampiran/jemaat/1714103141-ab4645019a248084d037ba54851c4f7d.jpg', '082272743313'),
('GKPI_JKPS_9', 'admin', 'admin', 'Laki-laki', '$2a$12$ibEFposc7rVfMv7zeMVJuO.OGRprwyDhcWnFMx1kbvpGCQum1Yapm', 'vvwsfvsrv', 'Balige', 'Aktif', 'Belum Menikah', '2024-05-09', 'Tidak', 'Tidak', 3, 'Penanggung Jawab', '/profile/jemaat/1715304930-168b17951b9cd976b79836c081cef252.jpg', '2024-05-10 01:35:30', '2024-05-10 01:35:30', '/lampiran/jemaat/1715304930-74024f9dcbccace241440149c9b15723.jpg', '082272743313');

-- --------------------------------------------------------

--
-- Table structure for table `jemaat_keluarga`
--

CREATE TABLE `jemaat_keluarga` (
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `status` enum('Suami','Istri','Anak','Menikah') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jemaat_keluarga`
--

INSERT INTO `jemaat_keluarga` (`nik`, `no_kk`, `status`, `created_at`, `updated_at`) VALUES
('1212100107020001', '1231241241241512', 'Anak', '2022-05-27 05:25:59', '2022-05-27 05:25:59'),
('1212100107020002', '1231241241241512', 'Anak', '2022-05-27 10:52:13', '2022-05-27 10:52:13'),
('1212100107020003', '1231241241241512', 'Anak', '2022-05-27 14:41:38', '2022-05-27 14:41:38'),
('1212100107020004', '1231241241241512', 'Anak', '2022-05-27 17:19:52', '2022-05-27 17:19:52'),
('1212100107020006', '1231241241241512', 'Anak', '2022-05-28 05:15:50', '2022-05-28 05:15:50'),
('1234567890123456', '1231241241241512', 'Suami', NULL, NULL),
('GKPI_JKPS_1', 'GKPI_JKPS_KK_3', 'Anak', '2024-04-22 12:59:20', '2024-04-22 12:59:20'),
('GKPI_JKPS_10', '1231241241241513', 'Anak', '2024-05-10 04:30:32', '2024-05-10 04:30:32'),
('GKPI_JKPS_2', 'GKPI_JKPS_KK_3', 'Anak', '2024-04-22 14:17:14', '2024-04-22 14:17:14'),
('GKPI_JKPS_3', 'GKPI_JKPS_KK_3', 'Anak', '2024-04-23 08:29:17', '2024-04-23 08:29:17'),
('GKPI_JKPS_4', 'GKPI_JKPS_KK_3', 'Anak', '2024-04-23 12:31:39', '2024-04-23 12:31:39'),
('GKPI_JKPS_5', 'GKPI_JKPS_KK_3', 'Anak', '2024-04-24 05:00:56', '2024-04-24 05:00:56'),
('GKPI_JKPS_7', 'GKPI_JKPS_KK_3', 'Istri', '2024-04-24 09:14:33', '2024-04-24 09:14:33'),
('GKPI_JKPS_8', 'GKPI_JKPS_KK_3', 'Anak', '2024-04-26 03:45:41', '2024-04-26 03:45:41'),
('GKPI_JKPS_9', '1231241241241512', 'Anak', '2024-05-10 01:35:30', '2024-05-10 01:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `nama_kas`) VALUES
(1, 'Kas Pelayanan Gereja'),
(2, 'Kas Kantor Sinode'),
(3, 'Kas Sarana dan Prasarana'),
(4, 'Kas Pembangunan');

-- --------------------------------------------------------

--
-- Table structure for table `kas_keuangan`
--

CREATE TABLE `kas_keuangan` (
  `id_kas` int(11) NOT NULL,
  `id_keuangan` bigint(20) NOT NULL,
  `nominal` double DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kas_keuangan`
--

INSERT INTO `kas_keuangan` (`id_kas`, `id_keuangan`, `nominal`, `updated_at`, `created_at`) VALUES
(1, 22, 19000, '2024-05-07 08:58:57', '2024-05-07 08:58:57'),
(1, 23, 1000, '2024-05-07 09:00:23', '2024-05-07 09:00:23'),
(1, 24, 1000, '2024-05-07 09:07:09', '2024-05-07 09:07:09'),
(1, 25, 100000, '2024-05-10 07:11:54', '2024-05-10 07:11:54'),
(2, 22, NULL, '2024-05-07 08:58:57', '2024-05-07 08:58:57'),
(2, 23, NULL, '2024-05-07 09:00:23', '2024-05-07 09:00:23'),
(3, 22, NULL, '2024-05-07 08:58:57', '2024-05-07 08:58:57'),
(3, 23, NULL, '2024-05-07 09:00:23', '2024-05-07 09:00:23'),
(3, 25, 200000, '2024-05-10 07:11:54', '2024-05-10 07:11:54'),
(4, 22, 89000, '2024-05-07 08:58:57', '2024-05-07 08:58:57'),
(4, 23, 10000, '2024-05-07 09:00:23', '2024-05-07 09:00:23'),
(4, 24, 2000, '2024-05-07 09:07:09', '2024-05-07 09:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_akhir` timestamp NULL DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `lampiran` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) NOT NULL,
  `updated_by` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `no_kk` varchar(16) NOT NULL,
  `nama_keluarga` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` enum('Aktif','Pindah','Disabled') NOT NULL DEFAULT 'Aktif',
  `tanggal_nikah` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lampiran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`no_kk`, `nama_keluarga`, `alamat`, `status`, `tanggal_nikah`, `created_at`, `updated_at`, `lampiran`) VALUES
('1231241241241512', 'Keluarga Pdt. Dirgos Lumban Tobing, M.Th', 'Tarutung Kota', 'Aktif', '2016-01-01', NULL, NULL, NULL),
('1231241241241513', 'GUSTAF LUMBANTOBING (+) / BR.HUTAPEA', 'KOMP MESJID HUTA TORUAN X. NO. 90', 'Aktif', '2010-01-01', '2022-05-24 17:12:51', '2022-05-24 17:12:51', '/lampiran/keluarga/1653390771-8653a466a8510cd0acb9808483d54c55.pdf'),
('GKPI_JKPS_KK_3', 'Ama. Deby Manalu/ Br. Pakpahann', 'Laguboti City', 'Aktif', '2002-07-03', '2024-04-22 10:27:39', '2024-04-22 10:27:39', '/lampiran/keluarga/1714014775-df3543bea6dd2e6348cf70f2025c9977.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` enum('Persembahan','Diakoni Sosial') NOT NULL,
  `keterangan` text NOT NULL,
  `jenis_keuangan` enum('Pengeluaran','Pemasukan','Pembagian') NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` double NOT NULL,
  `status_keuangan` text NOT NULL DEFAULT 'Aktif',
  `lampiran` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) DEFAULT NULL,
  `updated_by` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `kategori`, `keterangan`, `jenis_keuangan`, `tanggal`, `nominal`, `status_keuangan`, `lampiran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, '', 'Dana masuk', 'Pemasukan', '2022-05-22', 9000, '\'Aktif\'', '', '2022-05-27 03:53:15', '2022-05-27 03:53:15', '', ''),
(4, '', 'Dana keluar', 'Pengeluaran', '2022-05-29', 9000, '\'Aktif\'', '', '2022-05-27 03:59:39', '2022-05-27 03:59:39', '', ''),
(5, '', 'Dana masuk', 'Pemasukan', '2022-05-29', 900, '\'Aktif\'', '', '2022-05-27 04:09:09', '2022-05-27 04:09:09', '', ''),
(6, '', 'Dana keluar', 'Pengeluaran', '2022-05-22', 900, 'Aktif', '', '2022-05-27 05:12:01', '2024-05-05 02:57:01', NULL, NULL),
(7, '', 'Daerah Silimbung', 'Pemasukan', '2024-05-06', 100000, 'Aktif', '', '2024-05-06 02:00:11', '2024-05-09 13:53:28', NULL, NULL),
(8, '', 'Daerah Silimbung', 'Pengeluaran', '2024-05-07', 50000, 'Aktif', '', '2024-05-06 02:00:49', '2024-05-09 13:53:31', NULL, NULL),
(9, '', 'Paskah', 'Pemasukan', '2024-05-06', 500000, 'Aktif', '', '2024-05-06 02:06:53', '2024-05-06 02:06:53', NULL, NULL),
(10, '', 'membeli telur paskah', 'Pengeluaran', '2024-05-07', 100000, 'Aktif', '', '2024-05-06 02:08:23', '2024-05-06 02:08:23', NULL, NULL),
(11, 'Persembahan', 'Ibadah Sekolah Minggu', 'Pemasukan', '2024-05-06', 100000, 'Aktif', '', '2024-05-06 09:26:05', '2024-05-06 09:26:05', NULL, NULL),
(12, 'Diakoni Sosial', 'kedia', 'Pemasukan', '2024-05-06', 170000, 'Aktif', '', '2024-05-06 11:56:59', '2024-05-06 23:11:13', NULL, NULL),
(13, 'Diakoni Sosial', 'sumbangan', 'Pemasukan', '2024-05-08', 900000, 'Aktif', '', '2024-05-07 07:20:17', '2024-05-07 07:20:17', NULL, NULL),
(14, 'Persembahan', 'Ibadah Sekolah Minggu', 'Pembagian', '2024-05-07', 180000, 'Aktif', NULL, '2024-05-07 08:15:12', '2024-05-07 08:15:12', NULL, NULL),
(15, 'Persembahan', 'Ibadah Sekolah Minggu', 'Pembagian', '2024-05-07', 200000, 'Aktif', NULL, '2024-05-07 08:16:26', '2024-05-07 08:16:26', NULL, NULL),
(16, 'Persembahan', 'Ibadah Sekolah Minggu', 'Pembagian', '2024-05-07', 200000, 'Aktif', NULL, '2024-05-07 08:18:39', '2024-05-07 08:18:39', NULL, NULL),
(17, 'Persembahan', 'Ibadah Sekolah Minggu', 'Pembagian', '2024-05-07', 200000, 'Aktif', NULL, '2024-05-07 08:23:58', '2024-05-07 08:23:58', NULL, NULL),
(18, 'Persembahan', 'Ibadah Sekolah Minggu', 'Pembagian', '2024-05-07', 200000, 'Aktif', NULL, '2024-05-07 08:28:23', '2024-05-07 08:28:23', NULL, NULL),
(19, 'Persembahan', 'Ibadah Sekolah Minggu', 'Pembagian', '2024-05-07', 200000, 'Aktif', NULL, '2024-05-07 08:30:06', '2024-05-07 08:30:06', NULL, NULL),
(20, 'Persembahan', 'Ibadah Minggu Umum', 'Pembagian', '2024-05-07', 180000, 'Aktif', NULL, '2024-05-07 08:31:38', '2024-05-07 08:31:38', NULL, NULL),
(21, 'Persembahan', 'Partangiangan Sekolah Minggu', 'Pembagian', '2024-05-07', 160000, 'Aktif', NULL, '2024-05-07 08:39:00', '2024-05-07 08:39:00', NULL, NULL),
(22, 'Persembahan', 'Ibadah Partangiangan Sektor', 'Pembagian', '2024-05-07', 108000, 'Aktif', NULL, '2024-05-07 08:58:57', '2024-05-07 08:58:57', NULL, NULL),
(23, 'Persembahan', 'Ibadah Partangiangan Sektor', 'Pembagian', '2024-05-08', 11000, 'Aktif', NULL, '2024-05-07 09:00:23', '2024-05-07 09:00:23', NULL, NULL),
(24, 'Persembahan', 'Ibadah Minggu Umum', 'Pembagian', '2024-05-07', 3000, 'Aktif', NULL, '2024-05-07 09:07:09', '2024-05-07 09:07:09', NULL, NULL),
(25, 'Persembahan', 'Ibadah Minggu Umum', 'Pembagian', '2024-05-12', 300000, 'Aktif', NULL, '2024-05-10 07:11:53', '2024-05-10 07:11:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_laporan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `kategori_laporan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tahunan',
  `saldo_sebelum` double NOT NULL,
  `status_laporan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id`, `nama_laporan`, `tanggal_awal`, `tanggal_akhir`, `kategori_laporan`, `saldo_sebelum`, `status_laporan`, `created_at`, `updated_at`) VALUES
(1, 'laporan', '2022-05-29', '2022-05-29', 'Mingguan', 900, 'Aktif', '2022-05-27 04:27:28', '2024-05-05 22:48:36'),
(2, 'laporan', '2022-05-29', '2022-06-05', 'Mingguan', 900, 'Aktif', '2022-05-27 05:12:35', '2022-05-31 07:16:38'),
(3, 'laporan', '2022-05-29', '2022-05-22', 'Mingguan', 90, 'Aktif', '2022-05-27 05:13:56', '2022-06-06 15:07:17'),
(4, 'persembahan', '2024-05-06', '2024-05-11', 'Mingguan', 200, 'Aktif', '2024-05-06 02:01:55', '2024-05-06 02:01:55'),
(5, 'Diakonia 2024', '2024-05-06', '2024-05-11', 'Mingguan', 0, 'Aktif', '2024-05-06 02:09:11', '2024-05-06 02:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_04_14_135757_create_jemaat', 1),
(2, '2022_04_14_140941_create_keluarga', 1),
(3, '2022_04_14_141339_create_pelayan_gereja', 1),
(4, '2022_04_14_142700_create_keuangan', 1),
(5, '2022_04_14_143049_create_jadwal_ibadah', 1),
(6, '2022_04_14_143304_create_tata_ibadah', 1),
(7, '2022_04_14_143436_create_warta_jemaat', 1),
(8, '2022_04_14_143610_create_renungan', 1),
(9, '2022_04_14_143721_create_kegiatan', 1),
(10, '2022_04_14_143904_create_sektor', 1),
(11, '2022_04_14_144640_add_lampiran_to_jemaat_table', 1),
(12, '2022_04_14_144750_add_lampiran_to_keluarga_table', 1),
(13, '2022_04_14_144904_create_jemaat_keluarga', 1),
(14, '2022_04_15_215311_add_foreign_key_jemaat_to_sektor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelayan_gereja`
--

CREATE TABLE `pelayan_gereja` (
  `nik` varchar(16) NOT NULL,
  `peran` enum('Pendeta','Sekretaris','Bendahara','Penatua','Pelayan Ibadah','Tata Usaha','Seksi Pelayanan Rohani','Seksi Pekabaran Injil','Seksi Diakoni','Seksi Musik/Nyanyian/Koor','Seksi Sekolah Minggu','Seksi Pemuda/i (PP)','Pengawas Harta Benda','Penasehat Jemaat') NOT NULL,
  `tanggal_terima_jabatan` date NOT NULL,
  `tanggal_akhir_jabatan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelayan_gereja`
--

INSERT INTO `pelayan_gereja` (`nik`, `peran`, `tanggal_terima_jabatan`, `tanggal_akhir_jabatan`, `created_at`, `updated_at`) VALUES
('1212100107020001', 'Tata Usaha', '2022-05-22', NULL, '2022-05-27 05:26:23', '2022-05-27 05:26:23'),
('1212100107020002', 'Bendahara', '2022-05-29', NULL, '2022-05-27 10:54:13', '2022-05-27 10:54:13'),
('1212100107020003', 'Sekretaris', '2022-05-27', NULL, '2022-05-27 15:27:42', '2022-05-27 15:27:42'),
('1212100107020004', 'Pengawas Harta Benda', '2022-05-22', NULL, '2022-05-27 17:20:09', '2022-05-27 17:20:09'),
('1234567890123456', 'Pendeta', '2012-01-24', NULL, NULL, NULL),
('GKPI_JKPS_10', 'Pendeta', '2024-05-11', NULL, '2024-05-10 04:30:59', '2024-05-10 04:30:59'),
('GKPI_JKPS_2', 'Pengawas Harta Benda', '2024-05-05', NULL, '2024-05-05 01:58:03', '2024-05-05 01:58:03'),
('GKPI_JKPS_9', 'Pendeta', '2024-05-11', NULL, '2024-05-10 03:33:22', '2024-05-10 03:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `persembahan_khusus`
--

CREATE TABLE `persembahan_khusus` (
  `id` int(11) NOT NULL,
  `kategori` enum('Persembahan Bulanan','Ucapan Syukur') NOT NULL,
  `jenis_keuangan` enum('Pengeluaran','Pemasukan') NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` double NOT NULL,
  `status_keuangan` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_kk` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persembahan_khusus`
--

INSERT INTO `persembahan_khusus` (`id`, `kategori`, `jenis_keuangan`, `tanggal`, `nominal`, `status_keuangan`, `created_at`, `updated_at`, `no_kk`) VALUES
(1, 'Persembahan Bulanan', 'Pemasukan', '2024-05-06', 90000, 'Aktif', '2024-05-06 23:13:42', '2024-05-06 23:13:42', '1231241241241513'),
(2, 'Ucapan Syukur', 'Pemasukan', '2024-05-08', 80000, 'Nonaktif', '2024-05-06 15:27:02', '2024-05-06 11:59:53', 'GKPI_JKPS_KK_3'),
(3, 'Ucapan Syukur', 'Pemasukan', '2024-05-07', 170000, 'Aktif', '2024-05-07 07:08:23', '2024-05-07 07:08:23', '1231241241241513');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `jenis_program` enum('Rancangan Program Kerja','Rancangan Anggaran Penerimaan dan Belanja') NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `lampiran` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `jenis_program`, `tahun`, `created_at`, `updated_at`, `lampiran`) VALUES
(2, 'Rancangan Anggaran Penerimaan dan Belanja', 2023, '2024-05-09 13:08:19', '2024-05-05 22:40:46', '/lampiran/program/1715260099-a2bec97867783541c349a6c3fcc370ad.pdf'),
(3, 'Rancangan Program Kerja', 2024, '2024-05-09 11:51:48', '2024-05-09 11:51:48', '/lampiran/program/1715255506-6a50870d2f2986fc177b1fc7bf5f9525.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `renungan`
--

CREATE TABLE `renungan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `ayat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) DEFAULT NULL,
  `updated_by` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renungan`
--

INSERT INTO `renungan` (`id`, `tanggal`, `title`, `isi`, `ayat`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, '2022-05-21', 'Harapan jadi Bumerang', 'Ia mempersembahkan korban kepada para allah orang Damsyik yang telah mengalahkan dia. Pikirnya: \"Yang membantu raja-raja orang Aram adalah para allah mereka; kepada merekalah aku akan mempersembahkan korban, supaya mereka membantu aku juga.', '2 Tawarikh 28:23', '2022-05-19 08:20:05', '2022-05-19 08:20:05', NULL, NULL),
(5, '2022-05-20', 'Tetaplah Berdoa', 'Satu hal yang paling tidak kita sukai dalam hidup ini adalah menunggu. Terlebih lagi kalau harus menunggu dalam ketidakpastian. Ibarat berjalan dengan mata tertutup, situasi yang tak pasti membuat kita tidak bisa mengontrol apa yang bakal terjadi.', '1 Tesalonika 5 :17', '2022-05-20 19:44:13', '2022-05-20 19:44:13', NULL, NULL),
(7, '2022-06-05', 'Perkumpulan bangsa untuk mendengarkan', 'Yakni hari itu ketika engkau berdiri di hadapan TUHAN, Allahmu, di Horeb,  waktu TUHAN berfirman kepadaku: Suruhlah bangsa itu berkumpul kepada-Ku,  maka Aku akan memberi mereka mendengar segala perkataan-Ku', 'Ulangan 4 : 10', '2022-05-25 14:58:03', '2022-05-25 14:58:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sektor`
--

CREATE TABLE `sektor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sektor`
--

INSERT INTO `sektor` (`id`, `nama`, `created_at`, `updated_at`, `keterangan`) VALUES
(1, 'Okuli', NULL, NULL, ''),
(2, 'Letare', NULL, NULL, ''),
(3, 'Josua', NULL, NULL, ''),
(4, 'Aek jordan', NULL, NULL, ''),
(5, 'Estomihi', NULL, NULL, ''),
(6, 'Rogate', NULL, NULL, ''),
(7, 'Sion', NULL, NULL, 'Daerah Tarutung lewat sikit'),
(8, 'Silo', '2024-04-29 09:20:12', '2024-04-29 09:20:12', 'Daerah Silimbungg');

-- --------------------------------------------------------

--
-- Table structure for table `sidi`
--

CREATE TABLE `sidi` (
  `id_sidi` int(11) NOT NULL,
  `tgl_sidi` date DEFAULT NULL,
  `nama_pendeta_sidi` varchar(255) DEFAULT NULL,
  `no_surat_sidi` varchar(255) DEFAULT NULL,
  `file_surat_sidi` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sidi`
--

INSERT INTO `sidi` (`id_sidi`, `tgl_sidi`, `nama_pendeta_sidi`, `no_surat_sidi`, `file_surat_sidi`, `created_at`, `updated_at`, `nik`) VALUES
(13, '2024-04-19', 'cdscda', 'das`12e43', '/lampiran/sidi/1714103141-2932f2aa1c3d9e89fe1798b09ea28cfe.jpg', '2024-04-26', '2024-04-26', 'GKPI_JKPS_8'),
(15, NULL, NULL, NULL, '', '2024-05-10', '2024-05-10', 'GKPI_JKPS_9'),
(16, '2024-05-11', 'cdscda', 'das`12e43', '/lampiran/sidi/1715315432-22daf0730001a3b27701e07408ca1520.jpg', '2024-05-10', '2024-05-10', 'GKPI_JKPS_10');

-- --------------------------------------------------------

--
-- Table structure for table `tata_ibadah`
--

CREATE TABLE `tata_ibadah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `lampiran` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) DEFAULT NULL,
  `updated_by` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tata_ibadah`
--

INSERT INTO `tata_ibadah` (`id`, `nama`, `tanggal`, `lampiran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(19, 'Minggu Sesi III', '2022-06-12', '/lampiran/tataibadah/1654751725-647944fd2374026dfe62f7a5f8eac999.pdf', '2022-06-09 05:15:25', '2022-06-09 05:15:25', NULL, NULL),
(20, 'Minggu Sesi II', '2022-06-12', '/lampiran/tataibadah/1654752927-60523867db2e9043cd4790fde3aaf2a1.pdf', '2022-06-09 05:35:27', '2022-06-09 05:35:27', NULL, NULL),
(21, 'Minggu Sesi I', '2022-06-12', '/lampiran/tataibadah/1654844643-fa2d6790c666df579defd340678e05c8.pdf', '2022-06-10 07:04:03', '2022-06-10 07:04:03', NULL, NULL),
(22, 'Minggu Sesi IV', '2022-06-14', '/lampiran/tataibadah/1655048658-6d8cbb197add44dbc75becee220a9fc5.docx', '2022-06-12 15:44:18', '2022-06-12 15:44:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `jenis_kelamin`, `no_telepon`, `alamat`) VALUES
(1, 'beben123', 'asalgasal', 'bereben@mail.com', 'PHJ', 'Laki-laki', '0899172819', 'Humbang Hasundutan'),
(2, 'holong', 'holongaja', 'holong123@mail.com', 'Pendeta', 'Laki-laki', '089121292718', 'Berastagi');

-- --------------------------------------------------------

--
-- Table structure for table `warta_jemaat`
--

CREATE TABLE `warta_jemaat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `lampiran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(16) DEFAULT NULL,
  `updated_by` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warta_jemaat`
--

INSERT INTO `warta_jemaat` (`id`, `nama`, `tanggal`, `isi`, `lampiran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(16, 'Perayaan Natal Remajaa GKPI Jemaat Khusus Tarutung Kota', '2022-04-01', 'Perayaan Natal Remaja \r\nGKPI Jemaat Khusus Tarutung Kota Perayaan Natal Remaja \r\nGKPI Jemaat Khusus Tarutung KotaPerayaan Natal Remaja \r\nGKPI Jemaat Khusus Tarutung KotaPerayaan Natal Remaja \r\nGKPI Jemaat Khusus Tarutung KotaPerayaan Natal Remaja \r\nGKPI Jemaat Khusus Tarutung KotaPerayaan Natal Remaja \r\nGKPI Jemaat Khusus Tarutung Kota', 'public/gallery/5tXwEGF3zERn6AevNDVmn0x1BMLMXJW8ZtXUlI86.jpg', '2022-04-17 16:49:08', '2022-04-17 16:49:08', '', NULL),
(21, 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', '2022-05-25', 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung KotaPerayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', 'gallery/GH5nGCEpQewXNuRaUooCPXY76xJwuUmd4mK0vouo.jpg', '2022-05-25 14:09:44', '2022-05-25 14:09:44', NULL, NULL),
(22, 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', '2022-05-25', 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung KotaPerayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', 'gallery/0cMh9ckgbFXICGZxvWvxvCueApQEvPLANrHRbXyv.jpg', '2022-05-25 14:10:06', '2022-05-25 14:10:06', NULL, NULL),
(23, 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', '2022-05-25', 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung KotaPerayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', 'gallery/ld1PvHrWRupiG2bWDzmNFujRHzH8NtYmM4g9n2Fr.jpg', '2022-05-25 14:10:21', '2022-05-25 14:10:21', NULL, NULL),
(24, 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', '2022-05-25', 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung KotaPerayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', 'gallery/yQlORadk83sILQEQkSl4KXoKDHGrC0VA74bvfZDY.jpg', '2022-05-25 14:44:10', '2022-05-25 14:44:10', NULL, NULL),
(25, 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', '2022-05-25', 'Perayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung KotaPerayaan Natal Pemuda/i - Remaja GKPI Jemaat Khusus Tarutung Kota', 'gallery/wCAjHdLOg9CcNaNH3AAw69hVfjGdYIhNBuJsQZaU.jpg', '2022-05-25 14:44:23', '2022-05-25 14:44:23', NULL, NULL),
(34, 'Paskah', '2024-04-23', 'pengadaan ibadah paskah....', 'gallery/SI37ZSXwfI7xfUyC8n1gE0zBPFycjbyYJMWhu6L3.jpg', '2024-04-24 12:58:23', '2024-04-24 12:58:23', NULL, NULL),
(35, 'Aldo', '2023-12-12', 'ini isi berita saya', 'public/gallery/q25E0zaJ8E7FM2MY9cDK4actBm74gcRq42pmyQ21.webp', '2024-05-14 03:26:42', '2024-05-14 03:26:42', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baptis`
--
ALTER TABLE `baptis`
  ADD PRIMARY KEY (`id_baptis`),
  ADD KEY `fk_nik_jemaat` (`nik`);

--
-- Indexes for table `jadwal_ibadah`
--
ALTER TABLE `jadwal_ibadah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_ibadah_created_by_foreign` (`created_by`),
  ADD KEY `jadwal_ibadah_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `jadwal_pelayanan`
--
ALTER TABLE `jadwal_pelayanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pelayan_pelayanan` (`id_pelayan`),
  ADD KEY `fk_ibadah_jadwal` (`id_jadwal_ibadah`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `jemaat_sektor_id_foreign` (`sektor_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `jemaat_keluarga`
--
ALTER TABLE `jemaat_keluarga`
  ADD PRIMARY KEY (`nik`,`no_kk`),
  ADD KEY `jemaat_keluarga_no_kk_foreign` (`no_kk`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas_keuangan`
--
ALTER TABLE `kas_keuangan`
  ADD PRIMARY KEY (`id_kas`,`id_keuangan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_created_by_foreign` (`created_by`),
  ADD KEY `kegiatan_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keuangan_created_by_foreign` (`created_by`),
  ADD KEY `keuangan_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayan_gereja`
--
ALTER TABLE `pelayan_gereja`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `persembahan_khusus`
--
ALTER TABLE `persembahan_khusus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_no_kk` (`no_kk`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renungan`
--
ALTER TABLE `renungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `renungan_created_by_foreign` (`created_by`),
  ADD KEY `renungan_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidi`
--
ALTER TABLE `sidi`
  ADD PRIMARY KEY (`id_sidi`),
  ADD KEY `fk_jemaat_nik` (`nik`);

--
-- Indexes for table `tata_ibadah`
--
ALTER TABLE `tata_ibadah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tata_ibadah_created_by_foreign` (`created_by`),
  ADD KEY `tata_ibadah_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warta_jemaat`
--
ALTER TABLE `warta_jemaat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warta_jemaat_created_by_foreign` (`created_by`),
  ADD KEY `warta_jemaat_updated_by_foreign` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baptis`
--
ALTER TABLE `baptis`
  MODIFY `id_baptis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jadwal_ibadah`
--
ALTER TABLE `jadwal_ibadah`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_pelayanan`
--
ALTER TABLE `jadwal_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `persembahan_khusus`
--
ALTER TABLE `persembahan_khusus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `renungan`
--
ALTER TABLE `renungan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sidi`
--
ALTER TABLE `sidi`
  MODIFY `id_sidi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tata_ibadah`
--
ALTER TABLE `tata_ibadah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warta_jemaat`
--
ALTER TABLE `warta_jemaat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baptis`
--
ALTER TABLE `baptis`
  ADD CONSTRAINT `fk_nik_jemaat` FOREIGN KEY (`nik`) REFERENCES `jemaat` (`nik`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_ibadah`
--
ALTER TABLE `jadwal_ibadah`
  ADD CONSTRAINT `jadwal_ibadah_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `jemaat` (`nik`),
  ADD CONSTRAINT `jadwal_ibadah_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `jemaat` (`nik`);

--
-- Constraints for table `jadwal_pelayanan`
--
ALTER TABLE `jadwal_pelayanan`
  ADD CONSTRAINT `fk_ibadah_jadwal` FOREIGN KEY (`id_jadwal_ibadah`) REFERENCES `jadwal_ibadah` (`id`),
  ADD CONSTRAINT `fk_pelayan_pelayanan` FOREIGN KEY (`id_pelayan`) REFERENCES `pelayan_gereja` (`nik`);

--
-- Constraints for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD CONSTRAINT `jemaat_sektor_id_foreign` FOREIGN KEY (`sektor_id`) REFERENCES `sektor` (`id`);

--
-- Constraints for table `jemaat_keluarga`
--
ALTER TABLE `jemaat_keluarga`
  ADD CONSTRAINT `jemaat_keluarga_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `jemaat` (`nik`) ON DELETE CASCADE,
  ADD CONSTRAINT `jemaat_keluarga_no_kk_foreign` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `jemaat` (`nik`),
  ADD CONSTRAINT `kegiatan_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `jemaat` (`nik`);

--
-- Constraints for table `pelayan_gereja`
--
ALTER TABLE `pelayan_gereja`
  ADD CONSTRAINT `pelayan_gereja_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `jemaat` (`nik`) ON DELETE CASCADE;

--
-- Constraints for table `persembahan_khusus`
--
ALTER TABLE `persembahan_khusus`
  ADD CONSTRAINT `fk_no_kk` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`);

--
-- Constraints for table `sidi`
--
ALTER TABLE `sidi`
  ADD CONSTRAINT `fk_jemaat_nik` FOREIGN KEY (`nik`) REFERENCES `jemaat` (`nik`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
