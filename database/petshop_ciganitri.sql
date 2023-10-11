-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 12:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop_ciganitri`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `id` int(11) NOT NULL,
  `nama_beban` varchar(128) NOT NULL,
  `biaya_beban` float(16,2) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`id`, `nama_beban`, `biaya_beban`, `tanggal`) VALUES
(1, 'Biaya Transportasi Bulan Juni', 20000.00, '2021-06-08'),
(2, 'Bayar Listrik Bulan Juni', 30000.00, '2021-06-08'),
(3, 'Biaya Listrik Bulan Juli', 50000.00, '2021-07-12'),
(4, 'beban biaya gas bulan juli', 30000.00, '2021-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_transfer`
--

CREATE TABLE `bukti_transfer` (
  `id` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `id_rekening_tujuan` int(11) NOT NULL,
  `rekening_pengirim` varchar(128) NOT NULL,
  `bank_pengirim` varchar(100) NOT NULL,
  `nama_pengirim` varchar(128) NOT NULL,
  `waktu_transfer` datetime NOT NULL,
  `nominal_transfer` float(14,2) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_transfer`
--

INSERT INTO `bukti_transfer` (`id`, `id_checkout`, `id_rekening_tujuan`, `rekening_pengirim`, `bank_pengirim`, `nama_pengirim`, `waktu_transfer`, `nominal_transfer`, `bukti_pembayaran`, `catatan`, `status`) VALUES
(1, 1, 2, '0123', 'BNI', 'Olga Paurenta', '2021-04-02 17:57:00', 2000000.00, 'Olga_Paurenta.png', 'makasih yak', 'Pembayaran tidak%20valid'),
(2, 1, 2, '012345', 'BNI', 'Olga Paurenta', '2021-04-02 17:57:00', 2000000.00, 'Olga_Paurenta1.png', 'makasih yak', 'Pembayaran valid'),
(3, 3, 1, '1203129039213', 'BNI', 'Hariadi Arfah', '2021-04-14 23:52:00', 207000.00, '0.jpg', 'makasih ya', 'Pembayaran kurang'),
(4, 4, 1, '0812387259245', 'Mandiri', 'Olga Paurenta ', '2021-06-28 15:58:00', 49000.00, 'kwitansi.png', 'pemb produk', 'Pembayaran valid'),
(5, 8, 1, '09718919137823', 'Mandiri', 'olga', '2021-07-05 18:36:00', 49000.00, 'kwitansi1.png', '', 'Pembayaran valid'),
(6, 16, 1, '456786452345679', 'mandiri', 'nisa', '2021-08-14 15:32:00', 49000.00, 'kwitansi2.png', '', 'Pembayaran valid'),
(7, 17, 1, '6832498230912', 'mandiri', 'nisa', '2021-08-14 16:58:00', 49000.00, 'kwitansi3.png', '', 'Pembayaran valid'),
(8, 18, 1, '789201238123', 'mandiri', 'nisa', '2021-08-14 17:26:00', 49000.00, 'kwitansi4.png', '', 'Pembayaran valid'),
(9, 19, 1, '8732914747084', 'mandiri', 'nisa', '2021-08-14 17:44:00', 49000.00, 'kwitansi5.png', '', 'Pembayaran valid'),
(10, 21, 1, '63824728372732', 'mandiri', 'nisa', '2021-08-14 20:55:00', 49000.00, 'kwitansi6.png', '', 'Pembayaran valid'),
(11, 22, 1, '67980767546', 'mandiri', 'nca', '2021-08-15 22:47:00', 98000.00, 'kwitansi7.png', '', 'Pembayaran kurang'),
(12, 23, 1, '99177031232197', 'mandiri', 'nca', '2021-08-18 22:59:00', 49000.00, 'kwitansi8.png', '', 'Pembayaran valid'),
(13, 24, 1, '7891401470', 'mandiri', 'nca', '2021-08-14 23:10:00', 49000.00, 'kwitansi9.png', '', 'Pembayaran tidak%20valid'),
(14, 25, 1, '982967467988987', 'mandiri', 'nca', '2021-08-19 23:32:00', 49000.00, 'kwitansi10.png', '', 'Pembayaran tidak%20valid'),
(15, 26, 1, '8765467890', 'mandiri', 'nca', '2021-08-15 23:36:00', 49000.00, 'kwitansi11.png', '', 'Pembayaran tidak%20valid'),
(16, 27, 1, '98765467890', 'mandiri', 'nca', '2021-08-15 23:35:00', 49000.00, 'kwitansi12.png', '', 'Pembayaran tidak valid'),
(17, 28, 1, '12354678902893', 'mandiri', 'annisayusmaniah', '2021-08-16 08:37:00', 98000.00, 'kwitansi13.png', '', 'Pembayaran valid'),
(18, 29, 1, '125346789', 'mandiri', 'annisayusmaniah', '2021-08-16 08:51:00', 49000.00, 'kwitansi14.png', '', 'Pembayaran valid'),
(19, 30, 1, '2738239', 'mandiri', 'annisayusmaniah', '2021-08-16 08:54:00', 49000.00, 'kwitansi15.png', '', 'Pembayaran tidak valid');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_hp_penerima` varchar(50) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `total_harga` float(14,2) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `id_metode_bayar` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `id_user`, `kode_bayar`, `nama_penerima`, `no_hp_penerima`, `alamat_penerima`, `id_kurir`, `total_harga`, `waktu_pemesanan`, `id_metode_bayar`, `status`) VALUES
(1, 1, '8FB93EBCF40943DF5330353E99EF0AF2', 'Olga Paurenta', '081289182332', 'Medan', 2, 207000.00, '2021-04-02 17:41:04', 1, 'Sudah dibayar'),
(2, 1, '4102FE967A078974F3C1E7E262F35496', 'Olga Paurenta', '081201232133', 'Medan', 2, 256000.00, '2021-04-02 17:45:59', 1, 'Pesanan diterima'),
(3, 1, '12014315B3CF8568FDA938443AD17EEB', 'Hariadi Arfah', '02130129321', 'Goa Tallo', 3, 207000.00, '2021-04-02 23:46:56', 1, 'Menunggu konfirmasi pembayaran'),
(4, 3, 'B40195F0FABC7D31C37DE0E8B0E35281', 'cici', '81234567', 'jln amal', 5, 49000.00, '2021-06-28 15:57:41', 1, 'Pesanan dikirim'),
(5, 2, '28609395DA742882B0137B1D27D405C5', 'caca', '8123456', 'jln amal', 1, 49000.00, '2021-06-28 16:03:18', 1, 'Belum dibayar'),
(6, 3, 'CCAF905C7AD420EA1510F97B7002D13C', '', '', '', 2, 49000.00, '2021-07-05 13:20:09', 1, 'Pesanan dibatalkan'),
(7, 3, 'DE12476EA0210444A8F89278AF809D9B', 'Olga Paurenta', '081263509885', 'Jln. AR hakim, no. 80', 6, 49000.00, '2021-07-05 18:15:03', 1, 'Pesanan dibatalkan'),
(8, 3, 'B84ACFDAFB71C614DB58C7567AF56C7A', 'cici', '81234567', 'jln amal', 2, 49000.00, '2021-07-05 18:34:02', 1, 'Pesanan diterima'),
(9, 3, '63725DA9E710505D18D3BC2EDD48D6E6', 'caca', '8123456', 'jln mesjid', 4, 49000.00, '2021-07-12 20:14:35', 1, 'Pesanan diterima'),
(10, 3, 'D101B84EE2D8B1F51C188E69BAAE2775', 'Olga Paurenta', '081263509885', 'Jln. AR hakim, no. 80', 5, 49000.00, '2021-07-12 20:57:22', 1, 'Pesanan diterima'),
(11, 3, '0C6A17E9436C6527FEF8668E5864A677', 'olga', '081234567', 'jlm simalingkar medan', 5, 49000.00, '2021-07-13 23:56:21', 1, 'Belum dibayar'),
(12, 3, '61E10356D7682451498C3EA5B82C0287', 'olga', '978775647658', 'jln. medan', 3, 49000.00, '2021-07-14 11:52:31', 1, 'Belum dibayar'),
(13, 3, '4D0C9D07A90F21C87B7CBFF40B33C436', 'olga', '769424238037', '', 1, 49000.00, '2021-07-16 17:33:45', 1, 'Belum dibayar'),
(14, 3, '0F143F21C5BF0D452827F34BB0B314D9', 'olga', '6575859768', '', 1, 49000.00, '2021-07-16 17:38:05', 1, 'Pesanan dibatalkan'),
(15, 3, 'C688365FF40733F4D0F42196661CA199', 'olga', '', '', 1, 49000.00, '2021-07-16 17:41:48', 1, 'Belum dibayar'),
(16, 10, '33B150ED38EAA11DD9E07EAEE01A9A55', 'nisaa', '567897654', 'jln. rakyat\r\n', 1, 49000.00, '2021-08-14 15:32:02', 1, 'Sudah dibayar'),
(17, 10, '7E9727B38332AAB89BF84EB5E76BA9B6', 'nisa', '7382391318', 'jln. amal no. 80', 1, 49000.00, '2021-08-14 16:58:13', 1, 'Pesanan dikirim'),
(18, 10, '732284C249962B43722DA110E8559BE3', 'nisa', '78292120312', 'jln. amal', 1, 49000.00, '2021-08-14 17:26:19', 1, 'Pesanan diterima'),
(19, 10, '12FACBDBAF6F23BF7EC8D345D7FC99E6', 'nisa', '723932023013', 'jln. mesjidd, no. 80', 1, 49000.00, '2021-08-14 17:43:49', 1, 'Sudah dibayar'),
(20, 10, '77044C9CE4A23CE55441B4F356B69F70', 'nisa', '654789076', 'jln. medan', 1, 98000.00, '2021-08-14 20:52:43', 1, 'Belum dibayar'),
(21, 10, '82D4927C14A8C6B5A69C47D9B639DCB1', 'nisa', '67839240480', 'jln. aceh, no.80', 1, 98000.00, '2021-08-14 20:55:04', 1, 'Pesanan diterima'),
(22, 12, '5978DB984C615A632BEB2735A76FA5C4', 'nisa', '08126397423089', 'jln. ke neraka', 1, 98000.00, '2021-08-15 22:46:50', 1, 'Menunggu konfirmasi pembayaran'),
(23, 12, '999451237AC6E45F111653542B95A564', 'nisa', '893462984013', 'jln. ar hakim', 5, 49000.00, '2021-08-15 22:56:59', 1, 'Pesanan diterima'),
(24, 12, '2957FC38DE409D3B0A92F6895EDF5B07', 'nisa', '68342391013401', 'jln. keneraka', 5, 49000.00, '2021-08-15 23:09:56', 1, 'Menunggu konfirmasi pembayaran'),
(25, 12, '8E67B150B0A98179DDE45065CD618588', 'nisa', '7897237349', 'jln. mdn', 1, 49000.00, '2021-08-15 23:21:56', 1, 'Menunggu konfirmasi pembayaran'),
(26, 12, '083E9FF4388C235FBFB34B03252E312E', 'nisa', '09283784', 'jln. medan', 1, 49000.00, '2021-08-15 23:23:23', 1, 'Menunggu konfirmasi pembayaran'),
(27, 12, '075D69F830EF3EB5B0EE497A7423E258', 'nisa', '098765467', 'jln mdn', 3, 49000.00, '2021-08-15 23:35:03', 1, 'Sudah dibayar'),
(28, 7, '6C0DE5CBEDAA0CCF0C7A391302DFDA19', 'annisayusmaniah', '081263509885', 'jln. ar hakim, gg. kolam, no. 80', 5, 98000.00, '2021-08-16 08:37:05', 1, 'Pesanan diterima'),
(29, 7, '219C958C037A932BDEF7CE47CD1DFB75', 'annisayusmaniah', '081263509885', 'jln. ar hakim, gg kolam, no. 80', 4, 49000.00, '2021-08-16 08:51:20', 1, 'Sudah dibayar'),
(30, 7, '02BB5A111CC44BA04CCABC20622672F9', 'annisayusmaniah', '1273485960', 'jln. ar hakim', 5, 49000.00, '2021-08-16 08:54:05', 1, 'Menunggu konfirmasi pembayaran'),
(31, 7, 'F4ABA0CFEC531E40334DE68A8251B121', 'annisayusmaniah', '782494708401', 'jln medan\r\n', 4, 49000.00, '2021-08-24 15:45:53', 1, 'Pesanan dikirim'),
(32, 7, 'CEAB248AA1E1086D39C1BC16552A7A1B', 'Peggy', '08212112', 'OKe\r\n', 2, 49000.00, '2021-08-25 23:59:05', 1, 'Belum dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `footer` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `header`, `content`, `footer`, `last_updated`) VALUES
(1, 'Illustration', '<p>Add some quality, svg illustrations to your project courtesy of <a\r\n                                            target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">unDraw</a>, a\r\n                                        constantly updated collection of beautiful svg images that you can use\r\n                                        completely free and without attribution!</p>\r\n                                    <a target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">Browse Illustrations on\r\n                                        unDraw &rarr;</a>', '', '2021-03-05 03:51:54'),
(2, 'Development Approach', '<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce\r\n                                        CSS bloat and poor page performance. Custom CSS classes are used to create\r\n                                        custom components and custom utility classes.</p>\r\n                                    <p class=\"mb-0\">Before working with this theme, you should become familiar with the\r\n                                        Bootstrap framework, especially the utility classes.</p>', '', '2021-03-05 03:49:49'),
(3, 'Illustration', '<p>Add some quality, svg illustrations to your project courtesy of <a\r\n                                            target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">unDraw</a>, a\r\n                                        constantly updated collection of beautiful svg images that you can use\r\n                                        completely free and without attribution!</p>\r\n                                    <a target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">Browse Illustrations on\r\n                                        unDraw &rarr;</a>', '', '2021-03-05 03:51:44'),
(4, 'Development Approach', '<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce\r\n                                        CSS bloat and poor page performance. Custom CSS classes are used to create\r\n                                        custom components and custom utility classes.</p>\r\n                                    <p class=\"mb-0\">Before working with this theme, you should become familiar with the\r\n                                        Bootstrap framework, especially the utility classes.</p>', '', '2021-03-05 03:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `footer` varchar(256) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `header`, `title`, `content`, `footer`, `icon`) VALUES
(1, 'About Application', 'Petshop Ciganitri', '<b>Petshop Ciganitri</b> Pet Shop Ciganitri merupakan  salah  satu  perusahaan yang  tergolong dalam  usaha kecil  menengah  yang  beralamatkan  di  Kota  Bandung.  Dalam  bisnisnya  Pet  shop Ciganitri  ini  bergerak  dibidang  penjualan  kebutuhan  hewan  peliharaan  mulai  dari makanan, pasir, kandang, vitamin, obat?obat untuk hewan peliharaan dan berbagai perlengkapan  seperti  mainan  hewan  peliharaan  yang  diberikan  untuk  beberapa jenis  hewan  seperti  kucing,  hamster,  kelinci,  anjing,  dan  berbagai  jenis  hewan lainnya.\r\nAlamatnya Jl. Ciganitri No.69 B, Cipagalo, Kec. Bojongsoang, Bandung, Jawa Barat 40287', 'Annisa Yusmaniah', 'fas fa-paw');

-- --------------------------------------------------------

--
-- Table structure for table `detail_paket_grooming`
--

CREATE TABLE `detail_paket_grooming` (
  `id` int(11) NOT NULL,
  `id_paket_grooming` int(11) NOT NULL,
  `jasa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_paket_grooming`
--

INSERT INTO `detail_paket_grooming` (`id`, `id_paket_grooming`, `jasa`) VALUES
(6, 1, 'Grooming'),
(7, 1, 'Potong kuku'),
(8, 2, 'Grooming Jamur'),
(9, 2, 'Potong kuku'),
(10, 2, 'Vitamin'),
(11, 3, 'Grooming Kutu'),
(12, 3, 'Potong kuku'),
(13, 3, 'Vitamin');

-- --------------------------------------------------------

--
-- Table structure for table `grooming`
--

CREATE TABLE `grooming` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pet` varchar(255) NOT NULL,
  `jenis_hewan` varchar(128) NOT NULL,
  `id_paket_grooming` int(11) NOT NULL,
  `waktu_booking` datetime NOT NULL,
  `tanggal_grooming` date NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_slot` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grooming`
--

INSERT INTO `grooming` (`id`, `id_user`, `nama_pet`, `jenis_hewan`, `id_paket_grooming`, `waktu_booking`, `tanggal_grooming`, `id_jadwal`, `id_slot`, `keterangan`, `status`) VALUES
(1, 1, 'Rocky', 'Batu', 1, '2021-06-02 22:58:39', '2021-06-03', 3, 1, 'Jangan dicukur bulunya, karena rocky ga punya bulu', 'Selesai'),
(2, 3, 'Goofie', 'Kucing Persia', 2, '2021-06-02 22:58:39', '2021-06-03', 6, 2, 'Jangan dicuci, tapi dimandiin', 'Selesai'),
(3, 1, 'Bingo', 'Kucing Persia', 1, '2021-06-04 00:33:11', '2021-06-05', 1, 2, 'Oke', 'Selesai'),
(4, 1, 'Grey', 'Kucing pieck nose', 2, '2021-06-04 00:35:31', '2021-06-04', 3, 2, 'Suntik', 'Selesai'),
(5, 3, 'chiko', 'kucing', 1, '2021-06-16 13:25:24', '2021-06-16', 5, 2, 'harus yg bersih yaa', 'Selesai'),
(6, 3, 'chiko', 'kucing', 1, '2021-06-22 16:13:42', '2021-06-22', 8, 2, '', 'Booking'),
(7, 3, 'haitsam', 'kucing', 1, '2021-06-28 15:53:45', '2021-06-28', 9, 2, '', 'Selesai'),
(8, 3, 'momo', 'kucing', 1, '2021-07-14 00:02:38', '2021-07-15', 1, 1, '', 'Booking');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `jadwal` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `jadwal`) VALUES
(1, '09:30:00'),
(2, '10:30:00'),
(3, '11:30:00'),
(4, '12:30:00'),
(5, '13:30:00'),
(6, '14:30:00'),
(7, '15:30:00'),
(8, '16:30:00'),
(9, '17:30:00'),
(10, '18:30:00'),
(11, '19:30:00'),
(12, '20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Kucing'),
(2, 'Makanan'),
(3, 'Aksesoris'),
(4, 'Obat-obatan'),
(5, 'Vitamin'),
(6, 'Kandang'),
(7, 'Pasir'),
(8, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_notifikasi`
--

CREATE TABLE `kategori_notifikasi` (
  `id` int(11) NOT NULL,
  `kategori_notifikasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_notifikasi`
--

INSERT INTO `kategori_notifikasi` (`id`, `kategori_notifikasi`) VALUES
(1, 'Notifikasi'),
(2, 'Permintaan Teman'),
(3, 'Pembayaran'),
(4, 'Pesanan');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `kurir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id`, `kurir`) VALUES
(1, 'JNE'),
(2, 'POS Indonesia'),
(3, 'SAP Express'),
(4, 'Sicepat'),
(5, 'J&T'),
(6, 'Standard Express');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id` int(11) NOT NULL,
  `metode_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`id`, `metode_bayar`) VALUES
(1, 'Transfer'),
(2, 'Virtual Account'),
(3, 'OVO'),
(4, 'DANA');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori_notifikasi` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `waktu_notifikasi` datetime NOT NULL,
  `subjek` varchar(128) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL,
  `id_creator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `id_kategori_notifikasi`, `sub_id`, `waktu_notifikasi`, `subjek`, `pesan`, `is_read`, `id_creator`) VALUES
(1, 1, 1, 1, '2021-07-04 13:36:00', 'Notification', 'Spending Alert: We\'ve noticed unusually high spending for your account.', 1, 0),
(3, 1, 3, 1, '2021-07-04 14:00:00', 'Anggota Eksekutif Baru	\r\n', 'A new monthly report is ready to download!', 1, NULL),
(4, 1, 1, 4, '2021-07-05 07:47:25', 'Pemesanan dibatalkan', 'Pemesanan Anda dibatalkan', 1, 1),
(5, 1, 1, 5, '2021-07-05 08:31:57', 'Pemesanan dibatalkan', 'Pemesanan Anda dibatalkan', 1, 1),
(8, 2, 4, 13, '2021-07-18 22:05:59', 'Undangan Organisasi', 'Alya Putri Maharani ikuti Organisasi kami', 1, 1),
(14, 25, 4, 19, '2021-07-18 22:31:20', 'Undangan Organisasi', 'Undangan Bismillah', 0, 1),
(15, 25, 4, 20, '2021-07-18 22:32:23', 'Undangan Organisasi', 'Undangan Bismillah', 0, 1),
(16, 25, 4, 21, '2021-07-18 22:32:27', 'Undangan Organisasi', 'Undangan Bismillah', 0, 1),
(17, 25, 4, 22, '2021-07-18 22:33:16', 'Undangan Organisasi', 'Undangan Bismillah', 0, 1),
(18, 25, 4, 23, '2021-07-18 22:36:08', 'Undangan Organisasi', 'Undangan Bismillah', 0, 1),
(19, 25, 4, 24, '2021-07-18 22:38:50', 'Undangan Organisasi', 'Undangan Bismillah', 0, 1),
(20, 25, 4, 25, '2021-07-18 22:40:27', 'Undangan Organisasi', 'Undangan Bismillah', 0, 1),
(22, 2, 2, 8, '2021-07-25 16:25:44', 'Permintaan Teman', 'Alya Putri Maharani ingin menjadi teman Anda', 1, 1),
(23, 2, 2, 9, '2021-07-25 16:28:41', 'Permintaan Teman', 'Alya Putri Maharani ingin menjadi teman Anda', 1, 1),
(24, 1, 2, 10, '2021-07-25 16:29:34', 'Permintaan Teman', 'Olga Paurenta Simanihuruk ingin menjadi teman Anda', 0, 2),
(25, 25, 2, 11, '2021-07-25 20:19:12', 'Permintaan Teman', 'Alya Putri Maharani ingin menjadi teman Anda', 0, 1),
(26, 7, 4, 31, '2021-08-26 16:12:38', 'Terkirim', 'Pesanan Anda Telah lunas', 1, 2),
(27, 7, 4, 31, '2021-08-26 16:16:45', 'Terkirim', 'Pesanan Anda Telah dikirim', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `paket_grooming`
--

CREATE TABLE `paket_grooming` (
  `id` int(11) NOT NULL,
  `paket_grooming` varchar(255) NOT NULL,
  `harga` float(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_grooming`
--

INSERT INTO `paket_grooming` (`id`, `paket_grooming`, `harga`) VALUES
(1, 'Basic Grooming', 50000.00),
(2, 'Premium Grooming', 65000.00),
(3, 'Special Grooming', 75000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pasokan`
--

CREATE TABLE `pasokan` (
  `id` int(11) NOT NULL,
  `pemasok` varchar(255) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_pempek` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total_harga` float(14,2) NOT NULL,
  `waktu_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasokan`
--

INSERT INTO `pasokan` (`id`, `pemasok`, `id_petugas`, `id_pempek`, `jumlah`, `sub_total_harga`, `waktu_transaksi`) VALUES
(21, 'Pempek Resto', 1, 16, 20, 40000.00, '2021-04-21 22:13:37'),
(22, 'Pempek Resto', 1, 17, 10, 20000.00, '2021-04-21 22:18:51'),
(23, 'Pempek Resto', 1, 18, 10, 20000.00, '2021-04-21 22:22:31'),
(24, 'Pempek Resto', 1, 19, 10, 20000.00, '2021-04-21 22:24:34'),
(25, 'Pempek Resto', 1, 20, 10, 20000.00, '2021-04-21 22:25:19'),
(26, 'Pempek Resto', 1, 21, 10, 20000.00, '2021-04-21 22:26:01'),
(27, 'Pempek Resto', 1, 22, 10, 20000.00, '2021-04-21 22:26:51'),
(28, 'Pempek Resto', 1, 23, 10, 20000.00, '2021-04-21 22:28:52'),
(29, 'Pempek Resto', 1, 24, 10, 20000.00, '2021-04-21 22:29:52'),
(30, 'Pempek Resto', 1, 25, 10, 50000.00, '2021-04-21 22:31:00'),
(31, 'Pempek Resto', 1, 26, 10, 20000.00, '2021-04-21 22:32:19'),
(32, 'Pempek Resto', 1, 27, 10, 20000.00, '2021-04-21 22:33:01'),
(33, 'Pempek Resto', 1, 16, 4, 8000.00, '2021-04-21 22:49:14'),
(34, 'Pempek Resto', 1, 23, 3, 6000.00, '2021-04-21 22:51:39'),
(35, 'Pempek Resto', 1, 16, 2, 4000.00, '2021-05-26 14:58:44'),
(36, 'Pempek Resto', 1, 17, 1, 2000.00, '2021-05-28 14:58:40'),
(37, 'Pempek Resto', 32, 16, 20, 40000.00, '2021-07-12 22:19:56'),
(38, 'Pempek Resto', 32, 28, 25, 75000.00, '2021-07-12 22:22:58'),
(39, 'Pempek Resto', 32, 21, 20, 40000.00, '2021-07-12 22:51:08'),
(40, 'Pempek Resto', 25, 17, 5, 10000.00, '2021-07-12 23:58:00'),
(41, 'Pempek Resto', 25, 17, 5, 10000.00, '2021-07-12 23:58:18'),
(42, 'Pempek Resto', 33, 27, 3, 6000.00, '2021-07-13 00:35:08'),
(43, 'Pempek Resto', 33, 16, 2, 4000.00, '2021-07-13 07:54:38'),
(44, 'Pempek Resto', 33, 18, 2, 4000.00, '2021-07-13 07:54:38'),
(45, 'Pempek Resto', 33, 18, 3, 6000.00, '2021-07-13 07:54:54'),
(46, 'Pempek Resto', 33, 29, 15, 30000.00, '2021-07-13 09:08:40'),
(47, 'Pempek Resto', 33, 16, 10, 20000.00, '2021-07-13 11:20:15'),
(48, 'Pempek Resto', 33, 16, 1, 2000.00, '2021-07-13 11:38:25'),
(49, 'Pempek Resto', 34, 16, 10, 2000.00, '2021-07-24 11:47:14'),
(50, 'Pempek Resto', 34, 19, 5, 2000.00, '2021-07-24 11:47:20'),
(51, 'Pempek Resto', 34, 18, 100, 2000.00, '2021-07-24 11:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kode_pesanan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total_harga` float(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_checkout`, `id_produk`, `kode_pesanan`, `jumlah`, `sub_total_harga`) VALUES
(1, 1, 1, '212F78F28139E55B2476554D6A10E0CC', 3, 147000.00),
(2, 1, 2, 'C622FCECF2FE3047D9022470D3511A67', 1, 60000.00),
(3, 2, 2, 'C85D7C10E7FB5323D1B5622F1FD80A5E', 1, 60000.00),
(4, 2, 1, '4754E0FAB372FC7EC1F99E1C3B2932A1', 4, 196000.00),
(5, 3, 1, '4E8852969C15557D994FDCDBDC1F4A2B', 3, 147000.00),
(6, 3, 2, 'CBA0D7D0798C16979420D4F8F1F0A607', 1, 60000.00),
(7, 4, 1, '81BB21C7A881303DB80B87EC7DA2837E', 1, 49000.00),
(8, 5, 1, '38F8E502A12EA77D0E153B4F22EEFCD5', 1, 49000.00),
(9, 6, 1, 'AF7D4CFD11DC1C4F09DAF2CC64D90787', 1, 49000.00),
(10, 7, 1, '8148291143FA6036E5F4E5BB91D4E18E', 1, 49000.00),
(11, 8, 1, '83863947A697CFF865063BF8820A4D7B', 1, 49000.00),
(12, 9, 1, 'F3CDE566B4B962B69636277214AB46DE', 1, 49000.00),
(13, 10, 1, 'BAE9BE1C7D6B5E4AAF99CE0B8574D433', 1, 49000.00),
(14, 11, 1, '634DD8EC651B338156A19F5188739DFF', 1, 49000.00),
(15, 12, 1, 'E494B124F68E40D8B54E5CBAC5F6A38C', 1, 49000.00),
(16, 13, 1, '2F119ECA9B738FD2BFB7FC1020B40F39', 1, 49000.00),
(17, 14, 1, 'C2632479C549C0BB8A38D20120BE6437', 1, 49000.00),
(18, 15, 1, '010111AA5C66D3B85AF467FCC6C8E10B', 1, 49000.00),
(19, 16, 1, '01B909475877B20BCAC909DF5598AE29', 1, 49000.00),
(20, 17, 1, '9D1D78EB17265288BC26F4F5B2A51B3C', 1, 49000.00),
(21, 18, 1, 'F15ABF48806328E6D942C97CFF63EE85', 1, 49000.00),
(22, 19, 1, '803DCCC351CD49F36C5786E459E71A47', 1, 49000.00),
(23, 20, 1, '7E64C5630FD571644EB7D34BACE02D39', 2, 98000.00),
(24, 21, 1, '5E87ACE9AAB92C6326AD9B889CFCB90D', 2, 98000.00),
(25, 22, 1, 'C13CF713AA7C859B54376941124D4D23', 2, 98000.00),
(26, 23, 1, '821BF98B3DA138484F1F7489C8D7F41E', 1, 49000.00),
(27, 24, 1, '98539391DDC47830AE18CE94F2850D97', 1, 49000.00),
(28, 25, 1, '4D8BA8EC1DA49274FE446C38B944F686', 1, 49000.00),
(29, 26, 1, '9D52966242CA45197AE68A13800B825E', 1, 49000.00),
(30, 27, 1, 'F0BA9F072BEEEC3F4DC6256271B1E1C6', 1, 49000.00),
(31, 28, 1, 'F3BA689692682DE3FF40568515FB1F8F', 2, 98000.00),
(32, 29, 1, '73DCFB5DF911FFCA487E868F3AE999FF', 1, 49000.00),
(33, 30, 1, '9F255D7F9AD67E085B3A159A6B817686', 1, 49000.00),
(34, 31, 1, 'ABBC98879593883225D9C58F7A86DA65', 1, 49000.00),
(35, 32, 1, 'F873F78971BCB40424B913E8EB196085', 1, 49000.00);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` float(14,2) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `merk`, `id_kategori`, `stok`, `harga`, `satuan`, `deskripsi`, `gambar`) VALUES
(1, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Wishkas', 2, 65, 49000.00, '/Kg', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(2, 'B0002', 'Wishkas Tuna Adult 300 Gram', 'Wishkas', 2, 1, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', 'PropLan.jpg'),
(3, 'B0003', 'Proplan Tuna Adult 900 Gram', 'Proplan', 2, 0, 60000.00, '', 'Proplan isi Sereal Tuna untuk Kucing Dewasa', 'PropLan.jpg'),
(4, 'A0001', 'Kucing Anggora 9 bulan', 'Anggora', 1, 9, 6000000.00, '', 'Kucing Anggora, MAta Biru, Bulu Coklat Putih', '1615606507-kucing-mata-biru-banner.jpg'),
(5, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Proplane', 2, 4, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(6, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Proplane', 2, 3, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(7, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Proplane', 2, 42, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(8, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Proplane', 2, 9, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(9, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Proplane', 2, 19, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(10, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Proplane', 2, 3, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(11, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Proplane', 2, 3, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(12, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Proplane', 2, 3, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(13, 'B0001', 'Wishkas Tuna Adult 900 Gram', 'Proplane', 2, 3, 60000.00, '', 'Wishkas isi Tuna untuk Kucing Dewasa', '121987_1.jpg'),
(14, 'B0003', 'Wishkash Tuna Kitten 500 Gram', 'Wishkash', 2, 50, 750000.00, '', 'Wishkash isi Tuna untuk anak kucing', 'Whiskash_Catfood.png'),
(15, 'B0003', 'Wishkash Tuna Kitten 500 Gram', 'Wishkash', 2, 50, 75000.00, '', 'Wishkash isi Tuna untuk anak kucing', 'Whiskash_Catfood1.png');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `bank`, `no_rekening`, `atas_nama`, `email`) VALUES
(1, 'Mandiri', '1234567890', 'Annisa Yusmaniah', 'annisayusmaniah2001@gmail.com'),
(2, 'BNI', '0987654321', 'Annisa Yusmaniah', 'annisayusmaniah2001@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id` int(11) NOT NULL,
  `slot` varchar(128) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `slot`, `active`) VALUES
(1, '1', 1),
(2, '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total_harga` float(14,2) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_bayar`, `id_kasir`, `id_produk`, `jumlah`, `sub_total_harga`, `waktu_transaksi`, `catatan`) VALUES
(1, '31F04B32F18F8F4E195C', 1, 1, 9, 441000.00, '2021-04-02 21:48:58', 'customer bayar Via Transfer'),
(2, 'E24CA8BEEB50CF69E235', 1, 1, 9, 441000.00, '2021-04-02 21:50:07', ''),
(3, '2CCCF469437491BB5CD5', 1, 1, 9, 441000.00, '2021-04-02 22:21:41', ''),
(4, '09D9F1E646174E1C3FDD', 1, 1, 9, 441000.00, '2021-04-02 22:26:59', ''),
(5, 'FA4DD4B82BF197D27A96', 1, 1, 9, 441000.00, '2021-04-02 22:27:53', ''),
(6, 'FA4DD4B82BF197D27A96', 1, 10, 1, 60000.00, '2021-04-02 22:27:53', ''),
(7, 'FA4DD4B82BF197D27A96', 1, 2, 1, 60000.00, '2021-04-02 22:27:53', ''),
(8, '806F6082E4C104621453', 1, 2, 1, 60000.00, '2021-04-04 13:17:34', 'makasih'),
(9, '806F6082E4C104621453', 1, 1, 5, 245000.00, '2021-04-04 13:17:34', 'makasih'),
(10, '0D1A66DEB27856A48615', 2, 1, 1, 49000.00, '2021-06-28 16:04:21', ''),
(11, '1E41FA7678B7F6155B91', 2, 1, 1, 49000.00, '2021-08-15 23:00:02', 'pemb. a.n lira '),
(12, 'E32D87F2E07C2B0023A2', 2, 1, 1, 49000.00, '2021-08-16 08:40:58', 'pemb. a.n annisa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `place_of_birth` varchar(128) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `gender`, `place_of_birth`, `birthday`, `phone_number`, `address`, `religion_id`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'Annisa Yusmaniah', 'annisayusmaniah2001@gmail.com', 'Perempuan', 'Medan', '2001-03-22', '081263509885', 'Kota Medan', 1, 'default.svg', '$2y$10$54Ajl0R.ArBF45hyXCsJZOnTdLzoegtv9nJbBRs3ICk1QBv1kS5yW', 1, 1, 1614472317),
(4, 'Muhammad Haitsam', 'mhaitsam18@gmail.com', 'Laki-laki', 'Madinah', '1999-02-18', '089118202112', 'Bandung', 1, 'default.svg', '$2y$10$.ixo7mdt30yfQNM2rpo3pOMyYgYV4MzqdX0m.4LqjXaAEFv.mgqk6', 3, 1, 1609925711),
(5, 'Sandhika Galih', 'sandika@gmail.com', 'Laki-laki', 'Bandung', '1991-11-11', '082117504322', 'Bandung', 1, 'default.svg', '$2y$10$DLCp6ce7jyHem7q/eNcPbOeYeuU8dp3kwtgZ5lz3aVsDaIJsgjPHu', 2, 1, 1609657135),
(7, 'annisayusmaniah', 'annisayusmaniah@gmail.com', 'Perempuan', 'medan', '2001-03-22', '081263509885', 'jln. ar hakim, gg.kolam, no. 80', 1, 'default.svg', '$2y$10$z1UwJO/jOMyelznAtLZ4M.QGkxs.T93aIT9g7YqIKT2kZ.U5DiiWm', 2, 1, 1629077673);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(11, 2, 8),
(21, 3, 2),
(23, 3, 8),
(24, 1, 8),
(26, 1, 14),
(27, 1, 15),
(29, 2, 15),
(30, 2, 10),
(31, 3, 15),
(32, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `active`) VALUES
(1, 'Admin', 1),
(2, 'User', 1),
(3, 'Menu', 1),
(4, 'Produk', 1),
(5, 'Grooming', 0),
(6, 'Transaksi', 1),
(10, 'Member', 1),
(14, 'DataMaster', 1),
(15, 'Lainnya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member'),
(3, 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user/', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu/', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/subMenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role Management', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changePassword', 'fas fa-fw fa-key', 1),
(8, 1, 'Data User', 'admin/dataUser/', 'fas fa-fw fa-user-tie', 1),
(9, 4, 'Beranda', 'produk/', 'fas fa-fw fa-home', 0),
(10, 14, 'Data Master', 'DataMaster/', 'fas fa-fw fa-database', 1),
(11, 6, 'Pemesanan', 'Transaksi/', 'fas fa-fw fa-handshake', 1),
(12, 6, 'Pemesanan Online', 'Transaksi/online', 'fas fa-fw fa-shopping-bag', 1),
(13, 6, 'Pemesanan Offline', 'Transaksi/offline', 'fas fa-fw fa-shopping-cart', 1),
(14, 6, 'Pembayaran Online', 'Transaksi/pembayaranOnline/', 'fas fa-fw fa-money-bill-wave', 1),
(15, 10, 'Beranda', 'Member/', 'fas fa-fw fa-home', 1),
(16, 4, 'Data Produk', 'Produk/produk', 'fab fa-fw fa-product-hunt', 1),
(17, 10, 'PetShop', 'Member/petshop', 'fas fa-fw fa-paw', 1),
(18, 10, 'PetGrooming', 'Member/petGrooming', 'fas fa-fw fa-store', 0),
(19, 10, 'Antrean Grooming', 'member/antreanGrooming', 'fas fa-fw fa-male', 0),
(20, 10, 'Keranjang', 'Member/keranjang', 'fas fa-fw fa-shopping-cart', 1),
(21, 4, 'Produk Terjual', 'produk/terjual', 'fas fa-fw fa-hand-holding-usd', 1),
(22, 14, 'Data Agama', 'DataMaster/agama/', 'fas fa-fw fa-pray', 1),
(23, 14, 'Data Dashboard', 'DataMaster/dashboard/', 'fas fa-fw fa-edit', 1),
(24, 14, 'Data Konten', 'DataMaster/konten', 'far fa-fw fa-newspaper', 1),
(25, 15, 'Tentang Aplikasi', 'Lainnya/tentang', 'fas fa-fw fa-address-card', 1),
(26, 15, 'Pengaturan', 'Lainnya/pengaturan', 'fas fa-fw fa-wrench', 1),
(27, 15, 'Hubungi Kami', 'Lainnya/hubungi', 'fas fa-fw fa-address-book', 1),
(28, 15, 'Bantuan', 'Lainnya/bantuan', 'far fa-fw fa-question-circle', 1),
(29, 15, 'FAQ', 'Lainnya/faq', 'fas fa-fw fa-question', 1),
(30, 14, 'Data Kategori', 'DataMaster/kategori', 'fas fa-fw fa-bars', 1),
(31, 14, 'Data Kurir', 'DataMaster/kurir', 'fas fa-fw fa-shipping-fast', 1),
(32, 10, 'Pesanan Saya', 'Member/pesanan', 'fas fa-fw fa-shopping-basket', 1),
(33, 14, 'Data Metode Bayar', 'DataMaster/metodeBayar', 'fas fa-fw fa-money-check', 1),
(34, 14, 'Data Rekening', 'DataMaster/rekening', 'fas fa-fw fa-file-invoice-dollar', 1),
(35, 5, 'Grooming', 'grooming/', 'fas fa-fw fa-cat', 1),
(36, 5, 'Slot', 'grooming/slot', 'fas fa-fw fa-map-marker', 1),
(37, 5, 'Jadwal', 'grooming/jadwal', 'fas fa-fw fa-calendar-day', 1),
(38, 14, 'Data Paket Grooming', 'DataMaster/paketGrooming', 'fas fa-fw fa-cat', 1),
(39, 10, 'Pembayaran', 'Member/pembayaran', 'fab fa-fw fa-shopify', 1),
(40, 10, 'Riwayat Pembayaran', 'Member/riwayatPembayaran/', 'fas fa-fw fa-history', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'haitsam03@gmail.com', 'iscmRCWne+lTCfqz/25n5R8VUX5MUkaN02Bhum3gVsU=', 1609930420),
(5, 'haitsam03@gmail.com', 'n5QKD1D9vUL9QiROw9MO4pgD/fbbdFGYrGd8znIJWe4=', 1609932048),
(6, 'haitsam03@gmail.com', 'wPG+3htmGqTKAArzVlpS/b0eoqor9TKqG16H5cDvMqA=', 1609932054),
(7, 'aa@aa.a', 'oIK0LUztcU02aYAE6HG86eh7Fq5/TcK17wF7B/To+/k=', 1609941391),
(8, 'wahyuhidayat@gmail.com', 'h5OYZb29deEXYS/1Bc69GOaWseVwGEhhSXVKert9Oog=', 1610019862),
(9, 'pramuko@gmail.com', 'ijlFNaUwBrUcqEbANwlEml1FluVkgWAOvEPf3VtE9H4=', 1610019892),
(10, 'elyrosely@gmail.com', 'zLt8OC5aT9LrQaCipRl09/n95aUTUUjwCiVtKM150uA=', 1610019940),
(11, 'inne@gmail.com', '6kl2FFh6027PAQ51K03uIlFz8f3+e59snpxLo3jAOBE=', 1610019985),
(12, 'wawa@gmail.com', '/g7m4I60ysY6Ljs6xsHhye5zWPyA0eR/4qwv7r7czlo=', 1610020015),
(13, 'fasaldo1999@gmail.com', 'fOSWX9UdFnoi7ejSOIkhye7te1tVdT+cXmd1hh0YZCQ=', 1610023446),
(15, 'muhammadbarja@gmail.com', 'VpatS/tgTK/bfTZLlDDoVX9aaD6Kb3YoeS2/ozJOhXI=', 1610280453),
(16, 'januarizqi5@gmail.com', '8QKHOpK1ROQrW679QbREt1fb2wdgcsffl5PLahNGPws=', 1610507816),
(17, 'suryatiningsih@gmail.com', 'IvVR3KjJpnh+lnQgeWOmpht3w235j9Vax2GkkDCzUBE=', 1610509684),
(18, 'ersanum@gmail.com', 'Tst2ygGt8n2wUa+RsqvtHguZMn1KPTaiNE63D4wwehQ=', 1610529882),
(19, 'haitsamhaitsam18@yahoo.com', '06vONmPAIi0hj/xgLH72Ck6FSDDyqs96P9pxA5bOU54=', 1610556667),
(20, 'shibghotul7@gmail.com', 'zLT3U4RCMM6pc1pVBCI3SodKzlAVJmG13PbfY8ijFnU=', 1610556792),
(21, 'haitsam03@gmail.com', 'oVyGSYjGv4lTvFvUKawPJ96cj42FYlkQW8QcyPDghSQ=', 1611588824),
(22, 'akibdahlan20@gmail.com', 'Q5sF4roomYzNnHkIS0zKCHKteza6KwrK5GYaHqlJr8w=', 1614472096),
(23, 'akibdahlan21@gmail.com', 'M23yBdkPPwctLera1YG1Eccpx5PFhn1vNyKEeEqVpT0=', 1614472317),
(24, 'hariadiarfah21263@gmail.com', 'TqbWx3Vf3Z/kDFKSrDmJkBOb7q2ps/51az1qHxWSnW0=', 1626429149),
(26, 'annisayusmaniah2001@gmail.com', 'HERMzOgp9QFhAQjXuW/UBvpxJxzR4g/Mlq1/bhbpvCI=', 1626430676),
(28, 'sstrngrr2001@gmail.com', 'rAoYoQRGelEDyk/iDQjzdLMmt6vooxHKa/cvuHEDnwU=', 1626440828),
(29, 'chairanimiskah@gmail.com', 'wB9PFxOaMhwhgxI85esrVc49YsQywDungnQz/fRSroU=', 1628927224);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukti_transfer`
--
ALTER TABLE `bukti_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_bayar` (`kode_bayar`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_paket_grooming`
--
ALTER TABLE `detail_paket_grooming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grooming`
--
ALTER TABLE `grooming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_grooming`
--
ALTER TABLE `paket_grooming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasokan`
--
ALTER TABLE `pasokan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bukti_transfer`
--
ALTER TABLE `bukti_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_paket_grooming`
--
ALTER TABLE `detail_paket_grooming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `grooming`
--
ALTER TABLE `grooming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `paket_grooming`
--
ALTER TABLE `paket_grooming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasokan`
--
ALTER TABLE `pasokan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
