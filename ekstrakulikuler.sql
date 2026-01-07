-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2026 at 05:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekstrakulikuler`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_ekskul`
--

CREATE TABLE `absensi_ekskul` (
  `id_absen` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('Hadir','Izin','Alpha') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi_ekskul`
--

INSERT INTO `absensi_ekskul` (`id_absen`, `id_daftar`, `tanggal`, `keterangan`) VALUES
(1, 1, '2026-01-07', 'Hadir'),
(2, 2, '2026-01-07', 'Izin'),
(3, 3, '2026-01-07', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id_ekskul` int(11) NOT NULL,
  `nama_ekskul` varchar(100) NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `kuota` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id_ekskul`, `nama_ekskul`, `id_instruktur`, `kuota`) VALUES
(1, 'Pemrograman', 0, 11),
(3, 'test', 0, 11),
(6, 'Kerohanian', 3, 5),
(7, 'Perang', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `id_user`) VALUES
(1, '23161016', 'Kalpas', 2),
(3, '1326943', 'Aponia', 36),
(4, '574527275', 'Elysia', 39);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ekskul`
--

CREATE TABLE `jadwal_ekskul` (
  `id_jadwal` int(11) NOT NULL,
  `id_ekskul` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_ekskul`
--

INSERT INTO `jadwal_ekskul` (`id_jadwal`, `id_ekskul`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 6, 'Senin', '15:10:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'RPL'),
(2, 'AKL'),
(3, 'BDP');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '7'),
(2, '8'),
(3, '9'),
(4, '10'),
(5, '11'),
(6, '12');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ekskul`
--

CREATE TABLE `nilai_ekskul` (
  `id_nilai` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `nilai` decimal(5,2) DEFAULT NULL,
  `predikat` char(2) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `bulan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_ekskul`
--

INSERT INTO `nilai_ekskul` (`id_nilai`, `id_daftar`, `nilai`, `predikat`, `catatan`, `bulan`) VALUES
(4, 3, 80.00, 'A', 'huh', '0000-00-00'),
(5, 1, 80.00, 'C', 'ok', '0000-00-00'),
(6, 2, 80.00, 'C', 'ok', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_ekskul`
--

CREATE TABLE `pendaftaran_ekskul` (
  `id_daftar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_ekskul` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','disetujui','ditolak') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran_ekskul`
--

INSERT INTO `pendaftaran_ekskul` (`id_daftar`, `id_siswa`, `id_ekskul`, `tanggal_daftar`, `status`) VALUES
(1, 5, 6, '2026-01-07', 'disetujui'),
(2, 1, 6, '2026-01-07', 'disetujui'),
(3, 5, 7, '2026-01-07', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_rombel` varchar(50) NOT NULL,
  `id_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `id_kelas`, `id_jurusan`, `nama_rombel`, `id_guru`) VALUES
(1, 6, 1, 'RPL 12 ', 1),
(3, 6, 2, 'AKL 12 ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `id_rombel`, `id_user`) VALUES
(1, '23161014', 'Kevin Fernando', 1, 1),
(5, '23161012134', 'Ryuku', 3, 38);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`, `foto`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `token`, `expiry`) VALUES
(1, 'KF', 'KF@gmail.com', 'f457c545a9ded88f18ecee47145a72c0', 1, NULL, '2025-04-07 18:44:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Kalpas', 'Kalpas@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, NULL, '2026-01-07 09:32:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Aponia', 'Aponia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, NULL, '2026-01-07 18:31:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Ryuku', 'Ryukusune@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 3, NULL, '2026-01-07 20:01:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Elysia', 'elysia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, NULL, '2026-01-07 23:05:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_ekskul`
--
ALTER TABLE `absensi_ekskul`
  ADD PRIMARY KEY (`id_absen`),
  ADD UNIQUE KEY `unik_absen` (`id_daftar`,`tanggal`);

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal_ekskul`
--
ALTER TABLE `jadwal_ekskul`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `nilai_ekskul`
--
ALTER TABLE `nilai_ekskul`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pendaftaran_ekskul`
--
ALTER TABLE `pendaftaran_ekskul`
  ADD PRIMARY KEY (`id_daftar`),
  ADD UNIQUE KEY `unik_siswa_ekskul` (`id_siswa`,`id_ekskul`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_ekskul`
--
ALTER TABLE `absensi_ekskul`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id_ekskul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal_ekskul`
--
ALTER TABLE `jadwal_ekskul`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_ekskul`
--
ALTER TABLE `nilai_ekskul`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendaftaran_ekskul`
--
ALTER TABLE `pendaftaran_ekskul`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
