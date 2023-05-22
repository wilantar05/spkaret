-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 04:33 PM
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
(2, 'Sayu Gita', '085239444071', 'Melaris', 'sayu', '$2y$10$UNjuRbrkx5p2jsO4.um0geznepEXBpGpePcUFAPXlV1oY0c/W2XLC', 1);

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
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `gejala` text NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `keyakinan` varchar(10) NOT NULL,
  `tgl_konsultasi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_konsultasi`
--

INSERT INTO `tb_konsultasi` (`id_konsultasi`, `id_user`, `nama`, `no_hp`, `gejala`, `penyakit`, `keyakinan`, `tgl_konsultasi`) VALUES
(16, 2, 'user1', '081', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba', 'Jamur Upas\r\n', '37,91 %', '2023-04-26 23:35:44'),
(17, 0, 'testtt', 'aaa', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang', 'Nekrosis Kulit', '46,80 %', '2023-04-26 23:48:49'),
(80, 2, 'user1', '081', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba', 'Jamur Upas\r\n', '49,73 %', '2023-04-27 01:25:12'),
(81, 0, 'Arini ', '0812', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba', 'Jamur Upas\r\n', '59,68 %', '2023-04-27 08:14:12'),
(83, 0, 'gita', '0813', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Kulit batang akan membusuk', 'Jamur Upas\r\n', '61,70 %', '2023-04-27 16:49:03'),
(84, 0, 'gita arini', '0813', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam, Kulit batang mengering dan mengelupas', 'Jamur Upas\r\n', '78,87 %', '2023-04-27 18:08:16'),
(85, 0, 'gita arini', '0813', 'Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam', 'Jamur Upas\r\n', '65,27 %', '2023-04-27 18:10:24'),
(86, 0, 'sayu putu', '0823', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam, Kulit batang mengering dan mengelupas', 'Jamur Upas\r\n', '91,55 %', '2023-04-27 19:59:39'),
(87, 0, 'sayu putu', '0823', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam, Kulit batang mengering dan mengelupas, Jamur masuk ke dalam kayu berwarna merah muda, Memiliki bercak-bercak yang meluas ke samping pada bagian kayu, Cairan lateks berwarna coklat kemerahan', 'Jamur Upas\r\n', '91,50 %', '2023-04-27 20:01:28'),
(89, 0, 'Sayu', '087', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba', 'Jamur Upas\r\n', '46,37 %', '2023-05-01 21:54:10'),
(91, 5, 'sayu putu', '0808', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam, Kulit batang mengering dan mengelupas, Jamur masuk ke dalam kayu berwarna merah muda, Kulit batang atau cabang berwarna coklat kemerahan (jika dikerok bagian dalam)', 'Jamur Upas\r\n', '97,56 %', '2023-05-02 10:51:45'),
(92, 0, 'sayu1', '123b', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Kulit batang mengering dan mengelupas, Jamur masuk ke dalam kayu berwarna merah muda', 'Jamur Upas\r\n', '76,65 %', '2023-05-06 08:25:37'),
(109, 5, 'sayu putu', '0808', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman', 'Jamur Upas\r\n', '42,88 %', '2023-05-06 15:44:11'),
(111, 5, 'sayu putu', '0808', 'Bintil-bintil pada permukaan jaring laba-laba, Kulit batang berubah menjadi hitam', 'Jamur Upas\r\n', '30,08 %', '2023-05-06 15:53:30'),
(112, 0, 'sayu123', '123456987654234', 'Lateks akan menjadi kehitaman', 'Jamur Upas\r\n', '0,00 %', '2023-05-06 15:54:56'),
(113, 6, 'user1', '0834567890', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam, Kulit batang mengering dan mengelupas, Jamur masuk ke dalam kayu berwarna merah muda', 'Jamur Upas\r\n', '96,08 %', '2023-05-06 16:57:08'),
(114, 0, 'ayu', '321', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Jamur masuk ke dalam kayu berwarna merah muda, Kulit batang atau cabang berwarna coklat kemerahan (jika dikerok bagian dalam), Memiliki bercak-bercak yang meluas ke samping pada bagian kayu, Cairan lateks berwarna coklat kemerahan, Lateks berbau busuk', 'Kanker Bercak', '85,64 %', '2023-05-06 16:58:37'),
(115, 0, 'sayu ', '0812', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba', 'Jamur Upas\r\n', '59,68 %', '2023-05-06 17:18:12'),
(116, 0, 'sayu ', '0812', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba', 'Jamur Upas\r\n', '59,68 %', '2023-05-06 17:21:17'),
(117, 6, 'user1', '0834567890', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman', 'Jamur Upas\r\n', '45,60 %', '2023-05-06 23:26:44'),
(118, 0, 'sayu', '0821', 'Lateks akan menjadi kehitaman', 'Jamur Upas\r\n', '0,00 %', '2023-05-09 21:42:06'),
(119, 0, 'sayu', '0821', 'Lateks akan menjadi kehitaman', 'Jamur Upas\r\n', '0,00 %', '2023-05-09 21:43:49'),
(120, 2, 'user1', '081', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman', 'Jamur Upas\r\n', '36,16 %', '2023-05-09 21:52:30'),
(121, 2, 'user1', '081', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman', 'Jamur Upas\r\n', '36,16 %', '2023-05-09 21:53:41'),
(122, 2, 'user1', '081', 'Kulit batang akan membusuk, Kulit batang mengering dan mengelupas', 'Jamur Upas\r\n', '76,00 %', '2023-05-09 21:54:03'),
(123, 2, 'user1', '081', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang', 'Nekrosis Kulit', '70,00 %', '2023-05-09 21:55:30'),
(124, 2, 'user1', '081', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang', 'Nekrosis Kulit', '70,00 %', '2023-05-09 21:56:35'),
(125, 2, 'user1', '081', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang', 'Nekrosis Kulit', '70,00 %', '2023-05-09 21:58:06'),
(126, 0, 'gita', '081916305010', 'Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang mengering dan mengelupas', 'Jamur Upas\r\n', '70,79 %', '2023-05-13 20:59:50'),
(127, 5, 'sayu putu', '0808', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam, Kulit batang mengering dan mengelupas, Jamur masuk ke dalam kayu berwarna merah muda', 'Jamur Upas\r\n', '95,91 %', '2023-05-14 21:27:23'),
(128, 0, 'KucingOrenUdin', '081229444071', 'Jamur masuk ke dalam kayu berwarna merah muda, Kulit batang atau cabang berwarna coklat kemerahan (jika dikerok bagian dalam), Memiliki bercak-bercak yang meluas ke samping pada bagian kayu, Cairan lateks berwarna coklat kemerahan, Lateks berbau busuk, Batang yang terinfeksi membusuk', 'Kanker Bercak', '98,86 %', '2023-05-14 21:30:49'),
(129, 0, 'Orenudin', '081239444072', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang mengering dan mengelupas, Kulit batang atau cabang berwarna coklat kemerahan (jika dikerok bagian dalam), Daun terlihat kusam, Bagian alur berwarna coklat dan berbentuk gum (blendok)', 'Jamur Upas\r\n', '88,02 %', '2023-05-14 21:32:06'),
(130, 5, 'sayu putu', '0808', 'Lateks akan menjadi kehitaman, Kulit batang akan membusuk, Jamur masuk ke dalam kayu berwarna merah muda', 'Jamur Upas\r\n', '75,68 %', '2023-05-16 21:02:54'),
(131, 5, 'sayu putu', '0808', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Kulit batang akan membusuk, Kulit batang mengering dan mengelupas, Kulit batang atau cabang berwarna coklat kemerahan (jika dikerok bagian dalam), Cairan lateks berwarna coklat kemerahan, Bercak coklat kehitaman seperti memar dari bawah hingga cabang, Basah pada kulit dan batang, Permukaan daun menelungkup', 'Jamur Upas\r\n', '86,29 %', '2023-05-17 12:32:36'),
(132, 0, 'sayu gita pu', '0834567899', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang', 'Nekrosis Kulit', '70,00 %', '2023-05-17 12:34:59'),
(133, 5, 'sayu putu', '0808', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam, Kulit batang mengering dan mengelupas, Jamur masuk ke dalam kayu berwarna merah muda, Kulit batang atau cabang berwarna coklat kemerahan (jika dikerok bagian dalam), Memiliki bercak-bercak yang meluas ke samping pada bagian kayu, Cairan lateks berwarna coklat kemerahan, Lateks berbau busuk, Batang yang terinfeksi membusuk, Bercak coklat kehitaman seperti memar dari bawah hingga cabang, Basah pada kulit dan batang, Kulit batang pecah-pecah', 'Kanker Bercak', '98,55 %', '2023-05-17 12:42:35'),
(134, 5, 'sayu putu', '0808', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam, Kulit batang mengering dan mengelupas, Jamur masuk ke dalam kayu berwarna merah muda, Kulit batang atau cabang berwarna coklat kemerahan (jika dikerok bagian dalam), Cairan lateks berwarna coklat kemerahan', 'Jamur Upas\r\n', '97,02 %', '2023-05-17 19:09:01'),
(135, 5, 'sayu putu', '0808', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk, Kulit batang berubah menjadi hitam', 'Jamur Upas\r\n', '80,47 %', '2023-05-18 12:50:02'),
(136, 0, 'sayu gita ', '081234567819', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba', 'Jamur Upas\r\n', '54,30 %', '2023-05-18 21:32:23'),
(137, 5, 'sayu putu', '0808', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman', 'Nekrosis Kulit', '50,00 %', '2023-05-19 13:37:45'),
(138, 5, 'sayu putu', '0808', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang', 'Nekrosis Kulit', '70,00 %', '2023-05-19 13:49:23'),
(139, 0, 'Test', '081916305010', 'Benang putih mirip sarang laba-laba pada bagian pangkal atau cabang, Lateks akan menjadi kehitaman, Bintil-bintil pada permukaan jaring laba-laba, Kulit batang akan membusuk', 'Jamur Upas', '63,53 %', '2023-05-22 21:49:58'),
(140, 0, 'Test', '081916305010', 'Daun tampak pucat dan ujungnya mati serta menggulung, Gugurnya daun-daun muda, Daun yang tersisa berlubang-lubang', 'Jamur Akar Merah', '40,16 %', '2023-05-22 22:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `solusi` text NOT NULL,
  `obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`, `deskripsi`, `solusi`, `obat`) VALUES
(1, 'Jamur Upas', 'Jamur upas merupakan salah satu penyakit yang menyerang batang tanaman karet. Jamur upas disebabkan oleh jamur Corticium salmonicolor. Jamur upas dapat menyerang tanaman yang belum menghasilkan ataupun tanaman yang sudah menghasilkan', 'Melakukan penanaman klon yang relatif tahan seperti klon PB 260, BPM 1 dan RRIC 100.Mengurangi kelembaban suatu areal pertanaman dengan menanam karet menggunakan jarak tanam normal sehingga total populasi tidak terlalu tinggi / rapat. Populasi normal dalam satu hektar biasanya adalah 550 pokok.Cabang dan ranting yang sudah rapuh dan layu akibat jamur upas ini harus dibuang dan dimusnahkan.Melakukan pengobatan tanaman yang sudah terserang penyakit jamur upas. Pengobatan biasa dilakukan dengan cara mengoles cabang tanaman yang terserang jamur menggunakan obat seperti bubur bordo dan calixin. Kulit yang sudah busuk harus dikupas terlebih dahulu, baru kemudian dioles dengan calixin.', 'Bubur Bordo / Calixin'),
(3, 'Kanker Bercak', 'Kanker bercak biasanya muncul pada cabang atau daerah dekat permukaan tanah. Gejala kanker bercak pada tanaman karet termasuk munculnya bercak-bercak basah pada kulit kayu', ' Untuk mengendalikan kanker bercak pada tanaman karet, beberapa tindakan yang dapat dilakukan antara lain memangkas dan membuang bagian tanaman yang terinfeksi, mengaplikasikan fungisida yang tepat seperti ( Trichoderma SP), dan menghindari penggenangan air di sekitar tanaman. Hal ini dapat membantu mencegah penyebaran penyakit dan menjaga keberhasilan produksi karet', 'Trichoderma SP.'),
(5, 'Nekrosis Kulit', 'Penyakit nekrosis kulit tanaman karet adalah suatu kondisi yang mempengaruhi kulit atau epidermis batang tanaman karet (Hevea brasiliensis). Penyakit ini juga dikenal dengan sebutan penyakit nekrosis ringan, penebalan kulit, atau brown bast.', 'Mengoleskan dengan kuas pada bagian yang sakit dengan fungisida, indafol atau calixin. Bagian kulit yang busuk di kerok dan kemudian dioles dengan TB 192. Tanaman yang sehat tapi berada dekat dengan tanaman sakit disemprot dengan indafol 476 dengan rantang waktu seminggu sekali. Tamanan yang terinfeksi berat tidak boleh disadap/ diambil getah.', 'Indafol 476'),
(6, 'Jamur Akar Putih', 'Jamur ini memiliki tubuh buah yang berbentuk seperti piring dengan permukaan berwarna putih hingga krem. Tubuh buahnya dapat tumbuh di dekat akar tanaman karet atau bahkan muncul di atas permukaan tanah.', '4  tanaman disekitar tanaman sakit ditaburi dengan T. Harzianum dan pupuk. Bekas kerokan diberi TER dan dioles fungisida yang direkomendasi seperti Trichoderma SP. Permukaan akar yang ditumbuhi jamur dikerok dan bakar. Menanam tanaman penutup seperti kacang. ', 'Trichoderma SP.'),
(7, 'Kering Alur Sadap (SAP)', 'Penyakit yang disebabkan oleh infeksi bakteri Xanthomonas campestris pv. vesicatoria. Gejala awal penyakit ini biasanya muncul sebagai bercak kecil berwarna kuning atau hijau muda pada alur sadap. Bercak tersebut kemudian berkembang menjadi alur-alur kering berwarna cokelat atau hitam yang melintang pada alur sadap. ', 'Pisau yang akan digunakan mensadap harus diolesi fungisida (difolatan 4 f 1% atau difolatan 80 WPI %).  Mengoleskan demosan 0,5 % atau actidione 0,5 % di jalur 5 – 10 cm pada bagian atas dan bawah pada jalur sadap.', 'Difolatan 4f1% / 80 WPI %, Demosan 0,5%, Actidione 0,5%'),
(8, 'Jamur Akar Merah', 'Jamur akar merah pada tanaman karet, juga dikenal sebagai ', 'Tanaman yang sakit bisa diberi gonacide contoh drazoxolon atau calixin CP (collar protectant) seperti tridemorf. Buka area tanah lakukan isolasi pada tanaman yang terinfeksi. Jaga agar kondisi pH tanah tetap 6 – 6,5 jika rendah berikan dolomi. Tanaman yang mati harus dibongkar hingga ke  akar lalu bakar.', 'Drazoxolon / Calixin CP.'),
(9, 'Daun Gugur Corynospora', 'Penyakit yang mempengaruhi tanaman karet yang disebabkan oleh jamur Corynespora cassiicola. Ciri dari penyakit ini biasanya muncul sebagai bercak-bercak kecil berwarna cokelat atau merah kecokelatan pada daun tanaman karet.', 'Tanaman yang terserang diberi pupuk nitrogem dengan dosis tinggi.  Pupuk di benamkan kedalam tanah.  Melakukan rotasi tanaman dengan tanaman non-karet dapat membantu mengurangi populasi patogen di tanah dan meminimalkan risiko infeksi di musim tanam berikutnya.', 'Pupuk Nitrogem'),
(10, 'Daun Gugur Colletorichum', '', 'Semprot daun muda menggunakan fungisida kimia. Jangan biarkan bibit menjadi lembap. Berikan pupuk ekstra', 'Fungisida Kimia'),
(11, 'Daun Gugur Oidium', ' Penyakit ini juga dikenal sebagai ', 'Pemberian pupuk nitogen sesuai anjuran. 2.	Semprot tanaman dengan fungisida Bayfidan 250 EC, Bayleton 250 atau  Tilt 250 EC. Berikan tepung belerang 10-15 kg/ha dilakukan dengan cara penghembusan dengan alat penghembus bermotor pada pagi hari agar fungisida mudah melekat pada permukaan daun yang masih basah.', 'Bayfidan 250 EC / Bayleton 250 / Tilt 250 EC, Tepung Belerang');

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
(0, 'Guest', '', '', '', '', 1),
(2, 'user1', '081', 'disini', 'user', '$2y$10$S5y7KvPH9I57C/HqsFEwR.91JsHIeiNOM37V2i2SOsCJJzeM0A66K', 1),
(5, 'sayu putu', '0808', 'jl. sambangan', 'sayuputu_', '$2y$10$rLXHbX/mhJTtHKNxKM913u7dnDUCqPKzWygLcP28HfeB/SDQzxTA2', 1),
(6, 'user1', '0834567890', 'jl. menuju wisuda', 'aku', '$2y$10$dWke.ADHRf5gVW6oQFCoHOYS5hyLo70g8CmDk3xEoYfrloz6rVd1O', 1),
(7, 'sayu', '0822', 'gaktaupusing', 'user', '$2y$10$BQYVb6F7Olg5nRxAVm0p0u8I2qeTA5yoVlsGRU1zrXbv5kCLkQAlK', 1),
(8, 'user', '0812', 'pusing', 'user', '$2y$10$W0wA8qnCxaHP8DP3vPIt5..SXbz/rVHWTrNwKHPVU8zoUwKRgGxGS', 1),
(9, 'sayu', '081234567890', 'jl.menuju sidang', 'sayu12', '$2y$10$JiSts3cYfPlU4GCkhpOGduQjSd0RbjGIHc2yRzdVB/P7ACN.NeSCm', 1);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_rules`
--
ALTER TABLE `tb_rules`
  MODIFY `id_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
