-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 04:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkaret`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `no_hp`, `alamat`, `username`, `password`, `status`) VALUES
(1, 'Sayu Gita', '085239444071', 'Melaris', 'sayu', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(1, 'G01', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang'),
(4, 'G02', 'Lateks akan menjadi kehitaman'),
(5, 'G03', 'Bintil-bintil pada permukaan jaring laba-laba'),
(6, 'G04', 'Kulit batang akan membusuk'),
(7, 'G05', 'Kulit batang berubah menjadi hitam'),
(8, 'G06', 'Kulit batang mengering dan mengelupas'),
(10, 'G07', 'Jamur masuk ke dalam kayu berwarna merah muda'),
(11, 'G08', 'Kulit batang atau cabang berwarna coklat kemerahan (jika dikerok bagian dalam)'),
(12, 'G09', 'Memiliki bercak-bercak yang meluas ke samping pada bagian kayu'),
(13, 'G10', 'Cairan lateks berwarna coklat kemerahan'),
(14, 'G11', 'Lateks berbau busuk'),
(15, 'G12', 'Batang yang terinfeksi membusuk'),
(16, 'G13', 'Bercak coklat kehitaman seperti memar dari bawah hingga cabang'),
(17, 'G14', 'Basah pada kulit dan batang'),
(18, 'G15', 'Kulit batang pecah-pecah'),
(19, 'G16', 'Daun terlihat kusam'),
(20, 'G17', 'Permukaan daun menelungkup'),
(21, 'G18', 'Daun layu dan gugur'),
(22, 'G19', 'Jamur pada akar berwarna putih dan menempel sangat kuat'),
(23, 'G20', 'Akar yang terinfeksi akan menjadi lunak'),
(24, 'G21', 'Tidak mengalir lateks (getah) dari alur sadap'),
(25, 'G22', 'Bagian alur berwarna coklat dan berbentuk gum (blendok)'),
(26, 'G23', 'Kulit batang pecah-pecah'),
(27, 'G24', 'Tonjolan pada batang'),
(28, 'G25', 'Daun gugur oidium'),
(29, 'G26', 'Selaput ditempeli butiran tanah warna merah'),
(30, 'G27', 'Bagian luka dalam selaput berwarna putih kotor'),
(31, 'G28', 'Daun terdapat bercak bulat dan tidak beraturan coklat kehitaman'),
(32, 'G29', 'Daun terdapat sirip-sirip dengan bagian pusat kering'),
(33, 'G30', 'Daun tampak pucat dan ujungnya mati serta menggulung'),
(34, 'G31', 'Gugurnya daun-daun muda'),
(35, 'G32', 'Daun yang tersisa berlubang-lubang'),
(36, 'G33', 'Daun terdapat bercak coklat kehitaman'),
(37, 'G34', 'Daun akan menjadi basah dan gugur'),
(38, 'G35', 'Daun lebih tua ada bercak kekuningan'),
(39, 'G36', 'Daun tua terdapat seperti tepung'),
(40, 'G37', 'Daun akan berlendir'),
(41, 'G38', 'Daun lemas dan mengeriput');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsultasi`
--

CREATE TABLE `tb_konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `gejala` text NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `keyakinan` varchar(10) NOT NULL,
  `tgl_konsultasi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `solusi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`, `solusi`) VALUES
(1, 'Jamur Upas\r\n', 'Solusi 1'),
(3, 'Kanker Bercak', 'Solusi 2'),
(5, 'Nekrosis Kulit', ''),
(6, 'Jamur Akar Putih', ''),
(7, 'Kering Alur Sadap (SAP)', ''),
(8, 'Jamur Akar Merah', ''),
(9, 'Daun Gugur Corynospora', ''),
(10, 'Daun Gugur Colletorichum', ''),
(11, 'Daun Gugur Oidium', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rules`
--

CREATE TABLE `tb_rules` (
  `id_rules` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `nilai_mb` int(11) NOT NULL,
  `nilai_md` int(11) NOT NULL,
  `nilai_cf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rules`
--

INSERT INTO `tb_rules` (`id_rules`, `id_gejala`, `id_penyakit`, `nilai_mb`, `nilai_md`, `nilai_cf`) VALUES
(4, 1, 5, 5, 5, 5),
(5, 1, 1, 7, 3, 4),
(6, 4, 1, 6, 4, 2),
(7, 5, 1, 6, 4, 2),
(8, 6, 1, 7, 3, 4),
(9, 7, 1, 7, 3, 4),
(10, 8, 1, 8, 2, 6),
(11, 10, 1, 8, 2, 6),
(14, 11, 3, 7, 3, 4),
(15, 12, 3, 8, 2, 6),
(16, 13, 3, 6, 4, 2),
(17, 14, 3, 9, 1, 8),
(18, 15, 3, 9, 1, 8),
(19, 16, 5, 8, 2, 6),
(20, 17, 5, 7, 3, 4),
(21, 18, 5, 7, 3, 4),
(22, 19, 6, 6, 4, 2),
(23, 20, 6, 7, 3, 4),
(24, 21, 6, 7, 3, 4),
(26, 22, 6, 9, 1, 8),
(27, 23, 6, 6, 4, 2),
(28, 24, 7, 8, 2, 6),
(29, 25, 7, 7, 3, 4),
(30, 26, 7, 6, 4, 2),
(31, 27, 7, 6, 4, 2),
(32, 28, 8, 6, 4, 2),
(33, 29, 8, 9, 1, 8),
(34, 30, 8, 9, 1, 8),
(35, 31, 9, 8, 2, 6),
(36, 32, 9, 8, 2, 6),
(37, 33, 8, 7, 3, 4),
(38, 34, 6, 6, 4, 2),
(39, 34, 10, 6, 4, 2),
(40, 35, 10, 7, 3, 4),
(41, 36, 10, 8, 2, 6),
(42, 37, 10, 8, 2, 6),
(43, 38, 11, 7, 3, 4),
(44, 39, 11, 6, 4, 2),
(45, 40, 11, 10, 0, 10),
(46, 41, 11, 8, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `no_hp`, `alamat`, `username`, `password`, `status`) VALUES
(2, 'user1', '081', 'disini', 'user', '$2y$10$S5y7KvPH9I57C/HqsFEwR.91JsHIeiNOM37V2i2SOsCJJzeM0A66K', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `tb_rules`
--
ALTER TABLE `tb_rules`
  ADD PRIMARY KEY (`id_rules`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_rules`
--
ALTER TABLE `tb_rules`
  MODIFY `id_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
