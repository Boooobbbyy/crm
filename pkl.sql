-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 07:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` int(12) NOT NULL,
  `latitude` varchar(128) NOT NULL,
  `longitude` varchar(128) NOT NULL,
  `catatan` text NOT NULL,
  `foto` varchar(128) NOT NULL,
  `device` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nama`, `nip`, `latitude`, `longitude`, `catatan`, `foto`, `device`, `keterangan`, `created_at`) VALUES
(7, 'Bobby Malela', 1817051002, '-5.3948298999999995', '105.2006693', 'testtestestestestestestestestestestrestestestesteste', '2021-03-20_09-55-59_1817051002.jpg', 'NT 10.0;, like', 'Datang Terlambat', '2021-03-20 09:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id_home` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `jud` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id_home`, `foto`, `des`, `tgl`, `jud`) VALUES
(1, 'slider2.jpg', 'asd', '2021-03-30', 'test'),
(2, 'slider1.jpg', 'ssdaa', '2021-03-28', 'asda'),
(3, 'slider3.jpg', 'testing1', '2021-04-06', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `level`) VALUES
(1, 'Chief Executive Officer', 1),
(2, 'Manager HRD', 2),
(5, 'Manager CSR', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-02-08-040450', 'App\\Database\\Migrations\\User', 'default', 'App', 1612778316, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `desk` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `judul`, `tanggal`, `desk`, `link`, `foto`) VALUES
(2, 'test', '2021-03-09', 'testing1', 'https://www.youtube.com/watch?v=EBotfH842hc', '2.jpeg'),
(3, 'fsdf', '2021-03-03', 'asdas', 'asdas', '4.jpeg'),
(6, 'zz', '2021-03-10', 'zzc', 'zxcz', '5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `mulai_bekerja` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `foto`, `nama`, `telepon`, `email`, `jabatan`, `gaji_pokok`, `mulai_bekerja`, `created_at`) VALUES
(1, 1817051074, 'EM9NURDU4AAO2MH.jpeg', 'Aulia Ahmad Nabil', '082297578773', 'nabilunited2@gmail.com', 1, 12000000, '2020-05-10', '0000-00-00'),
(5, 1807051008, 'default.png', 'Pandi Barep', '081278317777', 'admin@gmail.com', 5, 1000000, '2021-03-11', '0000-00-00'),
(6, 1807051006, 'default.png', 'Thorin Satria Ramadhans', '081278317778', 'idnbdy@gmail.com', 2, 1000000, '2021-03-18', '0000-00-00'),
(7, 1817051025, 'default.png', 'Intania Rahmadila', '089630479663', 'intaniar@gmail.com', 5, 3500000, '2021-03-01', '0000-00-00'),
(8, 1817051002, 'default.png', 'Bobby Malela', '081234567890', 'bur.ilham2021@students.ugm.ac.id', 2, 1000000, '2021-03-02', '0000-00-00'),
(9, 1817051001, '1.png', 'Pandi Barep', '081278317744', 'pandi.barep@gmail.com', 1, 2500000, '2021-03-02', '2021-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_pt` varchar(255) NOT NULL,
  `profile_pt` varchar(255) NOT NULL,
  `logo_pt` varchar(255) NOT NULL,
  `no_telp` int(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tempat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_pt`, `profile_pt`, `logo_pt`, `no_telp`, `email`, `tempat`) VALUES
(1, 'arsi enarcon', 'test', 'aa', 815403785, 'test@gmail.com', 'bsndung');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id_port` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id_port`, `foto`, `tgl`) VALUES
(1, '1817051049.png', '2021-03-03'),
(2, 'default.png', '2021-03-31'),
(3, 'default.png', '2021-04-06'),
(4, 'default.png', '2021-04-27'),
(5, 'default.png', '2021-05-08'),
(6, 'default.png', '2021-03-30'),
(7, 'default.png', '2021-05-06'),
(8, 'default.png', '2021-04-30'),
(9, 'default.png', '2021-05-01'),
(10, 'default.png', '2021-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama_pt` varchar(128) NOT NULL,
  `profile_pt` text NOT NULL,
  `logo_pt` varchar(128) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tempat` text NOT NULL,
  `instagram` varchar(70) NOT NULL,
  `facebook` varchar(70) NOT NULL,
  `whatsapp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama_pt`, `profile_pt`, `logo_pt`, `no_telp`, `email`, `tempat`, `instagram`, `facebook`, `whatsapp`) VALUES
(1, 'Arsi Enarcons', 'Perusahaan ini mulai dirintis oleh 4 orang ex karyawan PT Megapola Macro Design (MMD). Dari keempat orang tersebut, tiga di antaranya memiliki disiplin arsitektur dari perguruan tinggi yang sama dan satu orang mempunyai disiplin seni rupa. Mereka adalah Ir. Iman N. Djatiatmadja (arsitek), Ir. Beni Robini (arsitek), Ir. Budi Satria (arsitek), dan Drs. Zainal Arifin (seni rupa). Setelah lima tahun bekerja pada PT MMD, tahun 1995 mereka memisahkan diri dengan mendirikan Studio Adi Reka Seni Imaji (ARSI). Manajemen PT MMD sendiri mengalami perpecahan.', 'default.svg', '(022) 7275016', 'arsienarcon@gmail.com', 'Jl. Saninten No.6, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114', 'www.instagram.com/arsienarcon', 'www.facebook.com/arsienarcon', '082297578773');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role`, `nama`) VALUES
(1, 'Admin Utama'),
(2, 'Admin Administrasi'),
(3, 'Admin Content'),
(4, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `srtk`
--

CREATE TABLE `srtk` (
  `id_srt` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` int(128) NOT NULL,
  `tanggal` date NOT NULL,
  `dari` varchar(255) NOT NULL,
  `surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srtk`
--

INSERT INTO `srtk` (`id_srt`, `nama`, `nomor`, `tanggal`, `dari`, `surat`) VALUES
(2, 'ddsafa', 2311, '2021-03-09', 'asdada', 'sadasffa'),
(3, 'asdassadd', 12321, '2021-03-04', 'asd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `srtm`
--

CREATE TABLE `srtm` (
  `id_srt` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` int(128) NOT NULL,
  `tanggal` date NOT NULL,
  `dari` varchar(255) NOT NULL,
  `surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srtm`
--

INSERT INTO `srtm` (`id_srt`, `nama`, `nomor`, `tanggal`, `dari`, `surat`) VALUES
(8, 'megumin', 7000, '2021-03-05', 'sadasada', 'asdsad'),
(9, 'adsas', 2746, '2021-03-02', 'afaszc', 'pembangunan'),
(10, 'zxcz', 12321, '2021-03-16', 'zxczxc', 'zxcz'),
(11, 'megumindc', 2147483647, '2021-03-12', 'sdsd', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `foto`, `username`, `id_pegawai`, `email`, `password`, `role_id`, `last_login`) VALUES
(1, 'default.png', 'brondol', 0, 'nabilunited2@gmail.com', '$2y$10$wjkg9fEhWg4nfgcsyj46jelDv.BKlS/y20CojprdmL7ogZE5J8Q7m', 1, '2021-04-16 22:00:26'),
(2, '1. Nabil.png', 'aulia.ahmad1074', 0, 'aulia.ahmad1074@students.unila.ac.id', '$2y$10$FsbN.vw4D06GXG7ekV69N.9FsaV5BdCrC0c0JLxkfYWk4s6zmRRbq', 2, '2021-03-18 13:14:44'),
(3, 'default.png', '1817051025', 7, 'intaniar@gmail.com', '$2y$10$s6.Z.H0s.JJFiRVrNoMdNOFQPD9ql5UwfGMQItnNMx4aPrMYJA2yy', 4, '2021-03-18 13:33:23'),
(4, 'default.png', '1817051002', 8, 'bur.ilham2021@students.ugm.ac.id', '$2y$10$z0.BN2t8nZlu6GHLqJZqI.nmSD.g0xsjaF0XB/NzvkbA4IrlT2s3y', 4, '2021-03-20 09:55:09'),
(5, 'default.png', '1817051001', 9, 'pandi.barep@gmail.com', '$2y$10$yhJdi193oBwuB70aDcq/W.XVwQLQXvh1vNY/e9.k.uXJDFqZzJQ2a', 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id_vid` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id_vid`, `judul`, `link`, `tanggal`) VALUES
(1, 'lagu', 'https://www.youtube.com/embed/Kv21Vcb28GI', '2021-03-03'),
(2, 'fsdf', 'https://www.youtube.com/embed/EBotfH842hc', '2021-03-08'),
(3, 'lagu2', 'https://www.youtube.com/embed/G4VAdWJXyFk', '2021-03-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id_port`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `srtk`
--
ALTER TABLE `srtk`
  ADD PRIMARY KEY (`id_srt`);

--
-- Indexes for table `srtm`
--
ALTER TABLE `srtm`
  ADD PRIMARY KEY (`id_srt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id_port` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `srtk`
--
ALTER TABLE `srtk`
  MODIFY `id_srt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `srtm`
--
ALTER TABLE `srtm`
  MODIFY `id_srt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
