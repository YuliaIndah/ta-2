-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Apr 2018 pada 11.28
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acc_kegiatan`
--

CREATE TABLE `acc_kegiatan` (
  `kode_acc_kegiatan` int(20) NOT NULL,
  `no_identitas` bigint(20) NOT NULL,
  `kode_jenis_kegiatan` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(20) NOT NULL,
  `kode_jenis_barang` int(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(20) NOT NULL,
  `captcha_time` int(10) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(3, 1522637966, '127.0.0.1', '8NpE7tb8'),
(4, 1522639125, '127.0.0.1', 'OY5yLkb7'),
(5, 1522639253, '127.0.0.1', 'gxBEqt3W'),
(6, 1522639411, '127.0.0.1', '46guDmY5'),
(7, 1522639430, '127.0.0.1', 'l08AH9MZ'),
(8, 1522640181, '127.0.0.1', 'QDSyG4SG'),
(9, 1522640199, '127.0.0.1', '4A5lQk85'),
(10, 1522640409, '127.0.0.1', 'K4ZrWU91'),
(11, 1522640423, '127.0.0.1', 'CvqWYnhc'),
(12, 1522640434, '127.0.0.1', '9O2bvTAI'),
(13, 1522640476, '127.0.0.1', 'M6dTT9Pm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_upload`
--

CREATE TABLE `file_upload` (
  `kode_file` int(10) NOT NULL,
  `kode_kegiatan` int(20) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `ukuran_file` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_upload`
--

INSERT INTO `file_upload` (`kode_file`, `kode_kegiatan`, `nama_file`, `ukuran_file`, `created_at`, `updated_at`) VALUES
(1, 1, '1a26bc38be1fcd8c56cea853b7089e37.pdf', 52.42, '2018-04-02 03:57:33', '2018-04-02 03:57:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_pengajuan`
--

CREATE TABLE `item_pengajuan` (
  `kode_item_pengajuan` int(20) NOT NULL,
  `no_identitas` bigint(20) NOT NULL,
  `kode_barang` int(20) NOT NULL,
  `kode_pengajuan` int(20) NOT NULL,
  `status_pengajuan` enum('baru','proses','selesai','tolak') NOT NULL,
  `tgl_item_pengajuan` date NOT NULL,
  `nama_item_pengajuan` varchar(50) NOT NULL,
  `status_persediaan` enum('tersedia','tidak tersedia') NOT NULL,
  `url` varchar(100) NOT NULL,
  `harga_satuan` int(12) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `file_gambar` varchar(30) NOT NULL,
  `pimpinan` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` int(20) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Kepala', '2018-04-02 02:51:51', '2018-04-02 02:51:51'),
(2, 'Sekretaris', '2018-04-02 02:51:51', '2018-04-02 02:51:51'),
(3, 'Manajer', '2018-04-02 02:54:48', '2018-04-02 02:54:48'),
(4, 'Staf', '2018-04-02 02:54:48', '2018-04-02 02:54:48'),
(5, 'Mahasiswa', '2018-04-02 02:54:55', '2018-04-02 02:54:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `kode_jenis_barang` int(20) NOT NULL,
  `nama_jenis_barang` enum('habis pakai','aset') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`kode_jenis_barang`, `nama_jenis_barang`, `created_at`, `updated_at`) VALUES
(1, 'habis pakai', '2018-04-01 12:32:49', '2018-04-01 12:32:49'),
(2, 'aset', '2018-04-01 12:32:49', '2018-04-01 12:32:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `kode_jenis_kegiatan` int(20) NOT NULL,
  `nama_jenis_kegiatan` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`kode_jenis_kegiatan`, `nama_jenis_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan Pegawai', '2018-04-01 12:12:29', '2018-04-01 12:12:29'),
(2, 'Kegiatan Mahasiswa', '2018-04-01 12:12:29', '2018-04-01 12:12:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kode_kegiatan` int(20) NOT NULL,
  `no_identitas` bigint(20) NOT NULL,
  `kode_jenis_kegiatan` int(20) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `dana_diajukan` int(12) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `dana_disetujui` int(12) NOT NULL,
  `pimpinan` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`kode_kegiatan`, `no_identitas`, `kode_jenis_kegiatan`, `nama_kegiatan`, `tgl_kegiatan`, `dana_diajukan`, `tgl_pengajuan`, `dana_disetujui`, `pimpinan`, `created_at`, `updated_at`) VALUES
(1, 340305180219950002, 1, 'Round Up', '2018-05-05', 1000000, '2018-04-02', 0, 0, '2018-04-02 03:57:33', '2018-04-02 03:57:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_progress`
--

CREATE TABLE `nama_progress` (
  `kode_nama_progress` int(20) NOT NULL,
  `nama_progress` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `kode_pengajuan` int(20) NOT NULL,
  `nama_pengajuan` varchar(20) NOT NULL,
  `file_rab` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `no_identitas` bigint(20) NOT NULL,
  `kode_unit` int(20) NOT NULL,
  `kode_jabatan` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jen_kel` enum('Laki - laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `status_email` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`no_identitas`, `kode_unit`, `kode_jabatan`, `nama`, `jen_kel`, `tmp_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `email`, `password`, `status`, `status_email`, `created_at`, `updated_at`) VALUES
(340305180219950002, 1, 1, 'Febriyan Yoga Pratama', 'Laki - laki', 'Gunungkidul', '1997-02-18', 'Gunungkidul', '081217109583', 'febriyanyoga@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'aktif', '1', '2018-04-02 04:02:12', '2018-04-02 03:35:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `kode_progress` int(20) NOT NULL,
  `no_identitas` bigint(20) NOT NULL,
  `kode_fk` int(20) NOT NULL,
  `kode_nama_progress` int(20) NOT NULL,
  `nama_progress` varchar(30) NOT NULL,
  `komentar` varchar(50) NOT NULL,
  `waktu_progress` time NOT NULL,
  `tgl_progress` date NOT NULL,
  `jenis_progress` enum('barang','kegiatan') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `kode_unit` int(20) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`kode_unit`, `nama_unit`, `created_at`, `updated_at`) VALUES
(1, 'Departemen', '2018-04-02 02:37:35', '2018-04-02 02:37:35'),
(2, 'Sarana dan Prasarana', '2018-04-02 02:37:35', '2018-04-02 02:37:35'),
(3, 'Keuangan', '2018-04-02 02:48:17', '2018-04-02 02:48:17'),
(4, 'Akademik', '2018-04-02 02:48:17', '2018-04-02 02:48:17'),
(5, 'Tata Usaha', '2018-04-02 02:48:37', '2018-04-02 02:48:37'),
(6, 'Laboratorium', '2018-04-02 02:48:37', '2018-04-02 02:48:37'),
(7, 'Kemahasiswaan', '2018-04-02 02:48:58', '2018-04-02 02:48:58'),
(8, 'KM TEDI', '2018-04-02 02:48:58', '2018-04-02 02:48:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_kegiatan`
--
ALTER TABLE `acc_kegiatan`
  ADD PRIMARY KEY (`kode_acc_kegiatan`),
  ADD KEY `kode_jabatan` (`no_identitas`),
  ADD KEY `kode_jenis_kegiatan` (`kode_jenis_kegiatan`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_jenis_barang` (`kode_jenis_barang`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`kode_file`),
  ADD KEY `kode_kegiatan` (`kode_kegiatan`);

--
-- Indexes for table `item_pengajuan`
--
ALTER TABLE `item_pengajuan`
  ADD PRIMARY KEY (`kode_item_pengajuan`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_pengajuan` (`kode_pengajuan`),
  ADD KEY `item_pengajuan_ibfk_3` (`no_identitas`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`kode_jenis_barang`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`kode_jenis_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kode_kegiatan`),
  ADD KEY `kode_jenis_kegiatan` (`kode_jenis_kegiatan`),
  ADD KEY `no_identitas` (`no_identitas`);

--
-- Indexes for table `nama_progress`
--
ALTER TABLE `nama_progress`
  ADD PRIMARY KEY (`kode_nama_progress`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`kode_pengajuan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`no_identitas`),
  ADD KEY `kode_unit` (`kode_unit`),
  ADD KEY `kode_jabatan` (`kode_jabatan`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`kode_progress`),
  ADD KEY `kode_kegiatan` (`kode_fk`),
  ADD KEY `kode_nama_progress` (`kode_nama_progress`),
  ADD KEY `no_identitas` (`no_identitas`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`kode_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_kegiatan`
--
ALTER TABLE `acc_kegiatan`
  MODIFY `kode_acc_kegiatan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `kode_file` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item_pengajuan`
--
ALTER TABLE `item_pengajuan`
  MODIFY `kode_item_pengajuan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kode_jabatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `kode_jenis_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `kode_jenis_kegiatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kode_kegiatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nama_progress`
--
ALTER TABLE `nama_progress`
  MODIFY `kode_nama_progress` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `kode_pengajuan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `kode_progress` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `kode_unit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `acc_kegiatan`
--
ALTER TABLE `acc_kegiatan`
  ADD CONSTRAINT `acc_kegiatan_ibfk_1` FOREIGN KEY (`no_identitas`) REFERENCES `pengguna` (`no_identitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acc_kegiatan_ibfk_2` FOREIGN KEY (`kode_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`kode_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_jenis_barang`) REFERENCES `jenis_barang` (`kode_jenis_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `file_upload`
--
ALTER TABLE `file_upload`
  ADD CONSTRAINT `file_upload_ibfk_1` FOREIGN KEY (`kode_kegiatan`) REFERENCES `kegiatan` (`kode_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `item_pengajuan`
--
ALTER TABLE `item_pengajuan`
  ADD CONSTRAINT `item_pengajuan_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_pengajuan_ibfk_2` FOREIGN KEY (`kode_pengajuan`) REFERENCES `pengajuan` (`kode_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_pengajuan_ibfk_3` FOREIGN KEY (`no_identitas`) REFERENCES `pengguna` (`no_identitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`no_identitas`) REFERENCES `pengguna` (`no_identitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`kode_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`kode_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`kode_unit`) REFERENCES `unit` (`kode_unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengguna_ibfk_2` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan` (`kode_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`no_identitas`) REFERENCES `pengguna` (`no_identitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`kode_fk`) REFERENCES `kegiatan` (`kode_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_ibfk_3` FOREIGN KEY (`kode_fk`) REFERENCES `item_pengajuan` (`kode_item_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_ibfk_4` FOREIGN KEY (`kode_nama_progress`) REFERENCES `nama_progress` (`kode_nama_progress`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
