-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 03:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alvajaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `KD_BELI` int(11) NOT NULL,
  `NO_NOTA` varchar(25) NOT NULL,
  `TANGGAL` varchar(20) NOT NULL,
  `HARGA_BELI` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `GRAND_TOTAL` int(11) NOT NULL,
  `KETERANGAN` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`KD_BELI`, `NO_NOTA`, `TANGGAL`, `HARGA_BELI`, `DISKON`, `JUMLAH`, `TOTAL`, `GRAND_TOTAL`, `KETERANGAN`) VALUES
(1, 'B-0015', '2023-08-02', 0, 20, 0, 0, 3200000, 'hp baru'),
(2, 'B-0095', '2023-08-02', 0, 20, 0, 0, 3200000, 'sc'),
(3, 'B-008', '2023-08-02', 0, 25, 0, 0, 0, 'effsd'),
(4, 'B-008', '2023-08-02', 0, 25, 0, 0, 0, 'effsd'),
(5, 'B-008', '2023-08-02', 0, 25, 0, 0, 0, 'effsd'),
(6, 'B-008', '2023-08-02', 0, 25, 0, 0, 0, 'effsd'),
(7, 'B-008', '2023-08-02', 0, 25, 0, 0, 0, 'effsd'),
(8, 'B-008', '2023-08-02', 0, 25, 0, 0, 0, 'effsd'),
(9, 'B-0083', '2023-08-02', 0, 20, 0, 0, 0, 'hp baru');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `KD_detail_pembelian` int(11) NOT NULL,
  `KD_BELI` int(11) NOT NULL,
  `KD_PRODUK` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `KD_SUPPLIER` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`KD_detail_pembelian`, `KD_BELI`, `KD_PRODUK`, `jumlah`, `KD_SUPPLIER`) VALUES
(1, 1, '01', 2, '01'),
(2, 1, '05', 0, '02'),
(3, 2, '01', 2, '01'),
(4, 2, '05', 0, '02'),
(5, 3, '01', 2, '01'),
(6, 4, '01', 2, '01'),
(7, 5, '01', 2, '01'),
(8, 6, '01', 2, '01'),
(9, 7, '01', 2, '01'),
(10, 8, '01', 2, '01'),
(11, 9, '01', 2, '01');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `NO_NOTA` varchar(25) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `KD_PRODUK` varchar(25) DEFAULT NULL,
  `KD_PELANGGAN` varchar(25) DEFAULT NULL,
  `HARGA_JUAL` decimal(10,0) DEFAULT NULL,
  `DISKON` decimal(10,0) DEFAULT NULL,
  `JUMLAH` decimal(10,0) DEFAULT NULL,
  `TOTAL` decimal(10,0) DEFAULT NULL,
  `GRAND_TOTAL` decimal(10,0) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`NO_NOTA`, `TANGGAL`, `KD_PRODUK`, `KD_PELANGGAN`, `HARGA_JUAL`, `DISKON`, `JUMLAH`, `TOTAL`, `GRAND_TOTAL`, `KETERANGAN`) VALUES
('J-003', '2023-07-09', '01', '01', 2500000, 50, 1, 2500000, 1250000, 'jual');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `KD_JURNAL` varchar(25) NOT NULL,
  `KD_REKENING` varchar(25) DEFAULT NULL,
  `TGL_TRANSAKSI` varchar(50) NOT NULL,
  `KD_TRANSAKSI` varchar(25) DEFAULT NULL,
  `DEBET` int(11) DEFAULT NULL,
  `KREDIT` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`KD_JURNAL`, `KD_REKENING`, `TGL_TRANSAKSI`, `KD_TRANSAKSI`, `DEBET`, `KREDIT`, `KETERANGAN`) VALUES
('', '410101', '', '04', NULL, 100000, NULL),
('121', '120101', '01', '01', 12000, 0, 'beli wipol'),
('232', '110201', '01', '01', 12000, 0, '22434'),
('9999', '120201', '04', '01', 122222, 0, 'test dulu'),
('323', '110401', '01', '01', 12000, 0, 'qwerty'),
('w2323', '111201', '01', '01', 12000, 0, '232');

-- --------------------------------------------------------

--
-- Table structure for table `md_akun`
--

CREATE TABLE `md_akun` (
  `KD_AKUN` varchar(25) NOT NULL,
  `NM_AKUN` varchar(200) NOT NULL,
  `NM_AKUN_ALIAS` varchar(200) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_akun`
--

INSERT INTO `md_akun` (`KD_AKUN`, `NM_AKUN`, `NM_AKUN_ALIAS`, `KETERANGAN`) VALUES
('1', 'Aset', 'Aktiva', NULL),
('2', 'Kewajiban ', 'Liabilitas', NULL),
('3', 'Modal', 'Ekuitas', NULL),
('4', 'Pendapatan', 'Income', NULL),
('5', 'Beban', 'Expense', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_dokumen`
--

CREATE TABLE `md_dokumen` (
  `KD_DOKUMEN` varchar(25) NOT NULL,
  `NM_DOKUMEN` varchar(50) DEFAULT NULL,
  `TIPE_TRANSAKSI` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_dokumen`
--

INSERT INTO `md_dokumen` (`KD_DOKUMEN`, `NM_DOKUMEN`, `TIPE_TRANSAKSI`, `KETERANGAN`) VALUES
('01', 'Dokumen Jual', 'Jual', NULL),
('02', 'Dokumen Beli', 'Beli', NULL),
('03', 'Dokumen Utang', 'Utang', NULL),
('04', 'Dokumen Beban', 'Bayar-bayar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_jenis`
--

CREATE TABLE `md_jenis` (
  `KD_AKUN` varchar(25) NOT NULL,
  `KD_KELOMPOK` varchar(25) NOT NULL,
  `KD_JENIS` varchar(25) NOT NULL,
  `NM_JENIS` varchar(200) NOT NULL,
  `NM_JENIS_ALIAS` varchar(200) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_jenis`
--

INSERT INTO `md_jenis` (`KD_AKUN`, `KD_KELOMPOK`, `KD_JENIS`, `NM_JENIS`, `NM_JENIS_ALIAS`, `KETERANGAN`) VALUES
('1', '1', '01', 'Kas', 'Kas', NULL),
('1', '1', '02', 'Persediaan Barang Dagang', 'Persediaan Barang Dagang', NULL),
('1', '1', '03', 'Piutang Dagang', 'Piutang Dagang', NULL),
('1', '1', '04', 'Perlengkapan', 'Perlengkapan', NULL),
('1', '1', '05', 'Sewa dibayar dimuka', 'Sewa dibayar dimuka', NULL),
('1', '1', '06', 'Retur Pembelian', 'Retur Pembelian', NULL),
('1', '1', '07', 'Retur Penjualan', 'Retur Penjualan', NULL),
('1', '1', '08', 'Wesel Tagih', 'Wesel Tagih', NULL),
('1', '1', '09', 'Iklan dibayar dimuka', 'Iklan dibayar dimuka', NULL),
('1', '1', '10', 'Asuransi dibayar dimuka', 'Asuransi dibayar dimuka', NULL),
('1', '1', '11', 'Potongan Pembelian', 'Potongan Pembelian', NULL),
('1', '1', '12', 'Piutang Karyawan', 'Piutang Karyawan', NULL),
('1', '2', '01', 'Tanah', 'Tanah', NULL),
('1', '2', '02', 'Bangunan', 'Bangunan', NULL),
('1', '2', '03', 'Kendaraan', 'Kendaraan', NULL),
('1', '2', '04', 'Peralatan', 'Peralatan', NULL),
('1', '2', '05', 'Akumulasi Penyusutan', 'Akumulasi Penyusutan', NULL),
('2', '1', '01', 'Utang Usaha', 'Utang Usaha', NULL),
('2', '1', '02', 'Utang Wesel', 'Utang Wesel', NULL),
('2', '1', '03', 'Utang Bank', 'Utang Bank', NULL),
('2', '1', '04', 'Utang Gaji', 'Utang Gaji', NULL),
('2', '1', '05', 'Utang Sewa gedung', 'Utang Sewa gedung', NULL),
('2', '1', '06', 'Utang Bunga', 'Utang Bunga', NULL),
('2', '1', '07', 'Utang Belanja', 'Utang Belanja', NULL),
('2', '1', '08', 'Utang Pinjaman Jangka Pendek', 'Utang Pinjaman Jangka Pendek', NULL),
('2', '2', '01', 'Utang Jangka Panjang', 'Utang Pinjaman Jangka Pendek', NULL),
('2', '2', '02', 'Utang Obligasi', 'Utang Obligasi', NULL),
('2', '2', '03', 'Utang Hipotik', 'Utang Hipotik', NULL),
('3', '1', '01', 'Modal Pemilik', 'Modal Pemilik', NULL),
('3', '1', '02', 'Prive', 'Prive', NULL),
('3', '1', '03', 'Laba/Keuntungan', 'Laba/Keuntungan', NULL),
('3', '1', '04', 'Laba ditahan', 'Laba ditahan', NULL),
('4', '1', '01', 'Penjualan Tunai', 'Penjualan Tunai', NULL),
('4', '2', '01', 'Pendapatan diluar usaha', 'Pendapatan diluar usaha', NULL),
('5', '1', '01', 'Beban Gaji', 'Beban Gaji', NULL),
('5', '1', '02', 'Beban Iklan', 'Beban Iklan', NULL),
('5', '1', '03', 'Beban Listrik', 'Beban Listrik', NULL),
('5', '1', '04', 'Beban Air', 'Beban Air', NULL),
('5', '1', '05', 'Beban Telepon', 'Beban Telepon', NULL),
('5', '1', '06', 'Beban Komisi', 'Beban Komisi', NULL),
('5', '1', '07', 'Biaya Angkut', 'Biaya Angkut', NULL),
('5', '2', '01', 'Beban Sewa', 'Beban Sewa', NULL),
('5', '2', '02', 'Beban Asuransi', 'Beban Asuransi', NULL),
('5', '2', '03', 'Beban Perlengkapan', 'Beban Perlengkapan', NULL),
('5', '2', '04', 'Beban Habis Pakai', 'Beban Habis Pakai', NULL),
('5', '2', '05', 'Beban Penyusutan', 'Beban Penyusutan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_jnbayar`
--

CREATE TABLE `md_jnbayar` (
  `KD_JNBAYAR` varchar(25) NOT NULL,
  `JENIS_BAYAR` varchar(25) NOT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_jnbayar`
--

INSERT INTO `md_jnbayar` (`KD_JNBAYAR`, `JENIS_BAYAR`, `KETERANGAN`) VALUES
('01', 'Tunai', NULL),
('02', 'Kredit', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_jntransaksi`
--

CREATE TABLE `md_jntransaksi` (
  `KD_JNTRANSAKSI` varchar(25) NOT NULL,
  `JENIS_TRANSAKSI` varchar(25) NOT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_jntransaksi`
--

INSERT INTO `md_jntransaksi` (`KD_JNTRANSAKSI`, `JENIS_TRANSAKSI`, `KETERANGAN`) VALUES
('01', 'Transaksi Jual', NULL),
('02', 'Transaksi Beli', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_katproduk`
--

CREATE TABLE `md_katproduk` (
  `KD_KATPRODUK` varchar(25) NOT NULL,
  `NM_KATEGORI` varchar(200) NOT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_katproduk`
--

INSERT INTO `md_katproduk` (`KD_KATPRODUK`, `NM_KATEGORI`, `KETERANGAN`) VALUES
('1', 'Handphone', NULL),
('2', 'Aksesoris', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_kelompok`
--

CREATE TABLE `md_kelompok` (
  `KD_AKUN` varchar(25) NOT NULL,
  `KD_KELOMPOK` varchar(25) NOT NULL,
  `NM_KELOMPOK` varchar(200) NOT NULL,
  `NM_KELOMPOK_ALIAS` varchar(200) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_kelompok`
--

INSERT INTO `md_kelompok` (`KD_AKUN`, `KD_KELOMPOK`, `NM_KELOMPOK`, `NM_KELOMPOK_ALIAS`, `KETERANGAN`) VALUES
('1', '1', 'Aset Lancar', 'Aset Lancar', NULL),
('1', '2', 'Aset Tetap', 'Aset Tetap', NULL),
('2', '1', 'Kewajiban Jangka Pendek', 'Kewajiban Jangka Pendek', NULL),
('2', '2', 'Kewajiban Jangka Panjang', 'Kewajiban Jangka Panjang', NULL),
('3', '1', 'Modal', 'Ekuitas', NULL),
('4', '1', 'Pendapatan Tunai', 'Pendapatan Tunai', NULL),
('4', '2', 'Pendapatan Lain-lain', 'Pendapatan Lain-lain', NULL),
('5', '1', 'Beban Operasional', 'Beban Operasional', NULL),
('5', '2', 'Beban Administrasi', 'Beban Administrasi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_obyek`
--

CREATE TABLE `md_obyek` (
  `KD_REKENING` varchar(25) NOT NULL,
  `KD_AKUN` varchar(25) DEFAULT NULL,
  `KD_KELOMPOK` varchar(25) DEFAULT NULL,
  `KD_JENIS` varchar(25) DEFAULT NULL,
  `KD_OBYEK` varchar(25) DEFAULT NULL,
  `NM_OBYEK` varchar(200) NOT NULL,
  `NM_OBYEK_ALIAS` varchar(200) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_obyek`
--

INSERT INTO `md_obyek` (`KD_REKENING`, `KD_AKUN`, `KD_KELOMPOK`, `KD_JENIS`, `KD_OBYEK`, `NM_OBYEK`, `NM_OBYEK_ALIAS`, `KETERANGAN`) VALUES
('110101', '1', '1', '01', '01', 'Kas', 'Kas', 'Aset Lancar'),
('110201', '1', '1', '02', '01', 'Persediaan Barang Dagang', 'Persediaan Barang Dagang', 'Aset Lancar'),
('110301', '1', '1', '03', '01', 'Piutang Dagang', 'Piutang Dagang', 'Aset Lancar'),
('110401', '1', '1', '04', '01', 'Perlengkapan', 'Perlengkapan', 'Aset Lancar'),
('110501', '1', '1', '05', '01', 'Sewa dibayar dimuka', 'Sewa dibayar dimuka', 'Aset Lancar'),
('110601', '1', '1', '06', '01', 'Retur Pembelian', 'Retur Pembelian', 'Aset Lancar'),
('110701', '1', '1', '07', '01', 'Retur Penjualan', 'Retur Penjualan', 'Aset Lancar'),
('110801', '1', '1', '08', '01', 'Wesel Tagih', 'Wesel Tagih', 'Aset Lancar'),
('110901', '1', '1', '09', '01', 'Iklan dibayar dimuka', 'Iklan dibayar dimuka', 'Aset Lancar'),
('111001', '1', '1', '10', '01', 'Asuransi dibayar dimuka', 'Asuransi dibayar dimuka', 'Aset Lancar'),
('111101', '1', '1', '11', '01', 'Potongan Pembelian', 'Potongan Pembelian', 'Aset Lancar'),
('111201', '1', '1', '12', '01', 'Piutang Karyawan', 'Piutang Karyawan', 'Aset Lancar'),
('120101', '1', '2', '01', '01', 'Tanah', 'Tanah', 'Aset Tetap'),
('120201', '1', '2', '02', '01', 'Bangunan', 'Bangunan', 'Aset Tetap'),
('120301', '1', '2', '03', '01', 'Kendaraan', 'Kendaraan', 'Aset Tetap'),
('120401', '1', '2', '04', '01', 'Peralatan', 'Peralatan', 'Aset Tetap'),
('120501', '1', '2', '05', '01', 'Akumulasi Penyusutan Peralatan', 'Akumulasi Penyusutan Peralatan', 'Aset Tetap'),
('120502', '1', '2', '05', '02', 'Akumulasi Penyusutan Kendaraan', 'Akumulasi Penyusutan Kendaraan', 'Aset Tetap'),
('120503', '1', '2', '05', '03', 'Akumulasi Penyusutan Bangunan', 'Akumulasi Penyusutan Bangunan', 'Aset Tetap'),
('210101', '2', '1', '01', '01', 'Utang Usaha', 'Utang Usaha', 'Kewajiban Jangka Pendek'),
('210201', '2', '1', '02', '01', 'Utang Wesel', 'Utang Wesel', 'Kewajiban Jangka Pendek'),
('210301', '2', '1', '03', '01', 'Utang Bank', 'Utang Bank', 'Kewajiban Jangka Pendek'),
('210401', '2', '1', '04', '01', 'Utang Gaji', 'Utang Gaji', 'Kewajiban Jangka Pendek'),
('210501', '2', '1', '05', '01', 'Utang Sewa Gedung', 'Utang Sewa Gedung', 'Kewajiban Jangka Pendek'),
('210601', '2', '1', '06', '01', 'Utang Bunga', 'Utang Bunga', 'Kewajiban Jangka Pendek'),
('210701', '2', '1', '07', '01', 'Utang Belanja', 'Utang Belanja', 'Kewajiban Jangka Pendek'),
('210801', '2', '1', '08', '01', 'Utang Pinjaman Jangka Pendek', 'Utang Pinjaman Jangka Pendek', 'Kewajiban Jangka Pendek'),
('220101', '2', '2', '01', '01', 'Utang Jangka Panjang', 'Utang Jangka Panjang', 'Kewajiban Jangka Panjang'),
('220201', '2', '2', '02', '01', 'Utang Obligasi', 'Utang Obligasi', 'Kewajiban Jangka Panjang'),
('220301', '2', '2', '03', '01', 'Utang Hipotik', 'Utang Hipotik', 'Kewajiban Jangka Panjang'),
('310101', '3', '1', '01', '01', 'Modal Pemilik', 'Modal Pemilik', 'Modal'),
('310201', '3', '1', '02', '01', 'Prive', 'Prive', 'Modal'),
('310301', '3', '1', '03', '01', 'Laba/Keuntungan', 'Laba/Keuntungan', 'Modal'),
('310401', '3', '1', '04', '01', 'Laba Ditahan', 'Laba Ditahan', 'Modal'),
('410101', '4', '1', '01', '01', 'Penjualan Tunai', 'Penjualan Tunai', 'Pendapatan tunai'),
('420101', '4', '2', '01', '01', 'Pendapatan diluar usaha', 'Pendapatan diluar usaha', 'Pendapatan lain-lain'),
('510101', '5', '1', '01', '01', 'Beban Gaji', 'Beban Gaji', 'Beban Operasional'),
('510201', '5', '1', '02', '01', 'Beban Iklan', 'Beban Iklan', 'Beban Operasional'),
('510301', '5', '1', '03', '01', 'Beban Listrik', 'Beban Listrik', 'Beban Operasional'),
('510401', '5', '1', '04', '01', 'Beban Air', 'Beban Air', 'Beban Operasional'),
('510501', '5', '1', '05', '01', 'Beban Telepon', 'Beban Telepon', 'Beban Operasional'),
('510601', '5', '1', '06', '01', 'Beban Komisi', 'Beban Komisi', 'Beban Operasional'),
('510701', '5', '1', '07', '01', 'Biaya Angkut', 'Biaya Angkut', 'Beban Operasional'),
('520101', '5', '2', '01', '01', 'Beban Sewa', 'Beban Sewa', 'Beban Administrasi'),
('520201', '5', '2', '02', '01', 'Beban Asuransi', 'Beban Asuransi', 'Beban Administrasi'),
('520301', '5', '2', '03', '01', 'Beban Perlengkapan', 'Beban Perlengkapan', 'Beban Administrasi'),
('520401', '5', '2', '04', '01', 'Beban Habis Pakai', 'Beban Habis Pakai', 'Beban Administrasi'),
('520501', '5', '2', '05', '01', 'Beban Penyusutan Bangunan', 'Beban Penyusutan Bangunan', 'Beban Administrasi'),
('520502', '5', '2', '05', '02', 'Beban Penyusutan Kendaraan', 'Beban Penyusutan Kendaraan', 'Beban Administrasi'),
('520503', '5', '2', '05', '03', 'Beban Penyusutan Peralatan', 'Beban Penyusutan Peralatan', 'Beban Administrasi');

-- --------------------------------------------------------

--
-- Table structure for table `md_pelanggan`
--

CREATE TABLE `md_pelanggan` (
  `KD_PELANGGAN` varchar(25) NOT NULL,
  `NM_PELANGGAN` varchar(100) NOT NULL,
  `NO_HP` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(150) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL,
  `CATATAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_pelanggan`
--

INSERT INTO `md_pelanggan` (`KD_PELANGGAN`, `NM_PELANGGAN`, `NO_HP`, `ALAMAT`, `KETERANGAN`, `CATATAN`) VALUES
('01', 'Nanda', '0817807171650', 'sleman', '-', '-'),
('02', 'Ani', '085901234567', 'Yogyakarta', '-', '-'),
('03', 'Ahmad ', '089666378114', 'Bantul', NULL, NULL),
('04', 'Dessi', '088226880200', 'Yogyakarta', NULL, NULL),
('05', 'Herlan', '085290842328', 'Sleman', NULL, NULL),
('06', 'Febian', '085701345678', 'Sleman', NULL, NULL),
('07', 'Kevin Gio', '089232367890', 'Sleman', NULL, NULL),
('08', 'Suji', '081234567990', 'Sleman', NULL, NULL),
('09', 'Nawasena', '085791663381', 'Yogyakarta', NULL, NULL),
('10', 'Zayid', '081228110880', 'Bantul', 'q3232', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_produk`
--

CREATE TABLE `md_produk` (
  `KD_PRODUK` varchar(25) NOT NULL,
  `KD_KATPRODUK` varchar(25) DEFAULT NULL,
  `NM_PRODUK` varchar(200) NOT NULL,
  `JML_PRODUK` decimal(5,0) DEFAULT NULL,
  `HARGA_JUAL` decimal(10,0) DEFAULT NULL,
  `HARGA_BELI` float(10,0) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_produk`
--

INSERT INTO `md_produk` (`KD_PRODUK`, `KD_KATPRODUK`, `NM_PRODUK`, `JML_PRODUK`, `HARGA_JUAL`, `HARGA_BELI`, `KETERANGAN`) VALUES
('01', '1', 'SAMSUNG A34', 11, 2500000, 2000000, 'Handphone'),
('02', '1', 'SAMSUNG M23', 12, 2800000, 2500000, 'Handphone'),
('03', '1', 'SAMSUNG A54 8/256', 10, 6500000, 6399999, 'Handphone'),
('04', '1', 'OPPO RENO 8', 12, 4999999, 4899999, 'Handphone'),
('05', '1', 'OPPO A17K', 11, 1799999, 1699999, 'Handphone'),
('06', '1', 'XIAOMI REDMI 10', 15, 2399000, 2299000, 'Handphone'),
('07', '1', 'REALME 10', 20, 3199000, 3099000, 'Handphone'),
('08', '1', 'REALME C3', 18, 1899000, 1799000, 'Handphone'),
('09', '1', 'CASE HP SAMSUNG A54', 20, 25000, 24000, 'Aksesoris'),
('10', '1', 'HEADPHONE WIRELESS', 5, 185000, 179000, 'Aksesoris'),
('11', '1', 'HEADSET BLUETOOTH', 7, 45000, 40000, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `md_supplier`
--

CREATE TABLE `md_supplier` (
  `KD_SUPPLIER` varchar(25) NOT NULL,
  `NM_SUPPLIER` varchar(100) NOT NULL,
  `NO_HP` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(150) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL,
  `CATATAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `md_supplier`
--

INSERT INTO `md_supplier` (`KD_SUPPLIER`, `NM_SUPPLIER`, `NO_HP`, `ALAMAT`, `KETERANGAN`, `CATATAN`) VALUES
('01', 'Oppo', '085703234567', 'Jakarta', '-', '-'),
('02', 'SAMSUNG', '086789345678', 'Jakarta', '-', '-'),
('03', 'Realme', '081234567896', 'Jakarta', NULL, NULL),
('04', 'Xiaomi', '087234567890', 'Jakarta', NULL, NULL),
('05', 'Lenovo', '081245678236', 'Jakarta', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `KD_TRANSAKSI` varchar(25) NOT NULL,
  `KD_JNTRANSAKSI` varchar(25) DEFAULT NULL,
  `KD_JNBAYAR` varchar(25) DEFAULT NULL,
  `KD_DOKUMEN` varchar(25) DEFAULT NULL,
  `NO_TRANSAKSI` varchar(11) DEFAULT NULL,
  `TGL_TRANSAKSI` date DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `KEPERLUAN` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`KD_TRANSAKSI`, `KD_JNTRANSAKSI`, `KD_JNBAYAR`, `KD_DOKUMEN`, `NO_TRANSAKSI`, `TGL_TRANSAKSI`, `TOTAL`, `KEPERLUAN`, `KETERANGAN`) VALUES
('01', NULL, NULL, '01', NULL, '2023-07-23', 10000000, 'penjualan tunai', 'jual'),
('04', '01', '01', '01', '0', '2023-07-23', 1000000, 'penjualan tunai hari ini', 'jual'),
('05', '01', '02', '01', 'T-009', '2023-07-23', 10987, 'penjualan tunai', 'tunai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd_user` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `name`, `phone`, `email`, `password`, `role`, `is_active`, `date_created`) VALUES
(1, 'hernanda ani', '087786576', 'hernanda@gmail.com', '$2y$10$M8fnlCNriB8oEjWP6QrdPecIwZ8jDBZXE/rzHDuVQlRTZolQAY9ku', 1, 1, 1672139515),
(2, 'raditya', '087786576', 'adit@gmail.com', '$2y$10$M8fnlCNriB8oEjWP6QrdPecIwZ8jDBZXE/rzHDuVQlRTZolQAY9ku', 2, 1, 1672139919),
(3, 'hernanda ani', '087786576', 'hernanda@gmail.com', '$2y$10$zpai5dAKJVcshHKnz5tsQONRnN0F6bQqGo3D2on3/yosVMmXn8YdG', 2, 1, 1674726361),
(4, 'hernanda ani', '087786576', 'vike@gmail.com', '$2y$10$M8fnlCNriB8oEjWP6QrdPecIwZ8jDBZXE/rzHDuVQlRTZolQAY9ku', 3, 1, 1674726361),
(26, 'hernanda ani', '087786576', 'hernanda@gmail.com', '$2y$10$Tl67hpJ3PsdE7Z2/sjWSvePLUEsuUiO9jAXAoQZ3lOzT2tI5WNE3m', NULL, 2, NULL),
(32, 'DANI LUKMAN h', '0424243243', 'dani@gmail.com', '$2y$10$M8fnlCNriB8oEjWP6QrdPecIwZ8jDBZXE/rzHDuVQlRTZolQAY9ku', 2, 2, NULL),
(33, 'garuda', '42343', 'garuda@gmail.com', '$2y$10$M8fnlCNriB8oEjWP6QrdPecIwZ8jDBZXE/rzHDuVQlRTZolQAY9ku', 2, NULL, NULL),
(34, 'hamdi abdul aziz', '322323323', 'hadmi@gmail.com', '$2y$10$VrrZCWXbZLpWNglgGUo2Y.Lgc.PC5gpy6OVF29E2kaRNiO1ItsqKu', 2, 1, NULL),
(35, 'east blue tech', '2132131232', 'admin@gmail.com', '$2y$10$M8fnlCNriB8oEjWP6QrdPecIwZ8jDBZXE/rzHDuVQlRTZolQAY9ku', 4, 1, NULL),
(36, 'HAMDI ABDUL AZIZ', '082216320121', 'admin@gmail.com', '$2y$10$6UGXd4eXF/quQrwpkut8ce2Bxm9prxH9OEpgairOwAPzWRAPC4Pku', 2, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`KD_BELI`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`KD_detail_pembelian`),
  ADD KEY `KD_PRODUK` (`KD_PRODUK`),
  ADD KEY `KD_SUPPLIER` (`KD_SUPPLIER`),
  ADD KEY `detail_pembelian_ibfk_2` (`KD_BELI`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`NO_NOTA`),
  ADD KEY `FK_MD_PRODUK` (`KD_PRODUK`),
  ADD KEY `FK_MD_PEL` (`KD_PELANGGAN`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD KEY `KD_REKENING` (`KD_REKENING`),
  ADD KEY `KD_TRANSAKSI` (`KD_TRANSAKSI`);

--
-- Indexes for table `md_akun`
--
ALTER TABLE `md_akun`
  ADD PRIMARY KEY (`KD_AKUN`);

--
-- Indexes for table `md_dokumen`
--
ALTER TABLE `md_dokumen`
  ADD PRIMARY KEY (`KD_DOKUMEN`);

--
-- Indexes for table `md_jenis`
--
ALTER TABLE `md_jenis`
  ADD PRIMARY KEY (`KD_AKUN`,`KD_KELOMPOK`,`KD_JENIS`);

--
-- Indexes for table `md_jnbayar`
--
ALTER TABLE `md_jnbayar`
  ADD PRIMARY KEY (`KD_JNBAYAR`);

--
-- Indexes for table `md_jntransaksi`
--
ALTER TABLE `md_jntransaksi`
  ADD PRIMARY KEY (`KD_JNTRANSAKSI`);

--
-- Indexes for table `md_katproduk`
--
ALTER TABLE `md_katproduk`
  ADD PRIMARY KEY (`KD_KATPRODUK`);

--
-- Indexes for table `md_kelompok`
--
ALTER TABLE `md_kelompok`
  ADD PRIMARY KEY (`KD_AKUN`,`KD_KELOMPOK`);

--
-- Indexes for table `md_obyek`
--
ALTER TABLE `md_obyek`
  ADD PRIMARY KEY (`KD_REKENING`),
  ADD KEY `FK_MD_OBYEK_JENIS` (`KD_AKUN`,`KD_KELOMPOK`,`KD_JENIS`);

--
-- Indexes for table `md_pelanggan`
--
ALTER TABLE `md_pelanggan`
  ADD PRIMARY KEY (`KD_PELANGGAN`);

--
-- Indexes for table `md_produk`
--
ALTER TABLE `md_produk`
  ADD PRIMARY KEY (`KD_PRODUK`),
  ADD KEY `KD_KATPRODUK` (`KD_KATPRODUK`);

--
-- Indexes for table `md_supplier`
--
ALTER TABLE `md_supplier`
  ADD PRIMARY KEY (`KD_SUPPLIER`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`KD_TRANSAKSI`),
  ADD KEY `KD_JNTRANSAKSI` (`KD_JNTRANSAKSI`),
  ADD KEY `KD_JNBAYAR` (`KD_JNBAYAR`),
  ADD KEY `KD_DOKUMEN` (`KD_DOKUMEN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `KD_BELI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `KD_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`KD_BELI`) REFERENCES `beli` (`KD_BELI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_ibfk_3` FOREIGN KEY (`KD_SUPPLIER`) REFERENCES `md_supplier` (`KD_SUPPLIER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `FK_MD_PEL` FOREIGN KEY (`KD_PELANGGAN`) REFERENCES `md_pelanggan` (`KD_PELANGGAN`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MD_PRODUK` FOREIGN KEY (`KD_PRODUK`) REFERENCES `md_produk` (`KD_PRODUK`);

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_ibfk_1` FOREIGN KEY (`KD_REKENING`) REFERENCES `md_obyek` (`KD_REKENING`),
  ADD CONSTRAINT `jurnal_ibfk_2` FOREIGN KEY (`KD_TRANSAKSI`) REFERENCES `transaksi` (`KD_TRANSAKSI`);

--
-- Constraints for table `md_jenis`
--
ALTER TABLE `md_jenis`
  ADD CONSTRAINT `FK_MD_JENIS_KELOMPOK` FOREIGN KEY (`KD_AKUN`,`KD_KELOMPOK`) REFERENCES `md_kelompok` (`KD_AKUN`, `KD_KELOMPOK`) ON DELETE CASCADE;

--
-- Constraints for table `md_kelompok`
--
ALTER TABLE `md_kelompok`
  ADD CONSTRAINT `FK_MD_KELOMPOK_AKUN` FOREIGN KEY (`KD_AKUN`) REFERENCES `md_akun` (`KD_AKUN`) ON DELETE CASCADE;

--
-- Constraints for table `md_obyek`
--
ALTER TABLE `md_obyek`
  ADD CONSTRAINT `FK_MD_OBYEK_JENIS` FOREIGN KEY (`KD_AKUN`,`KD_KELOMPOK`,`KD_JENIS`) REFERENCES `md_jenis` (`KD_AKUN`, `KD_KELOMPOK`, `KD_JENIS`) ON DELETE CASCADE;

--
-- Constraints for table `md_produk`
--
ALTER TABLE `md_produk`
  ADD CONSTRAINT `md_produk_ibfk_1` FOREIGN KEY (`KD_KATPRODUK`) REFERENCES `md_katproduk` (`KD_KATPRODUK`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`KD_JNTRANSAKSI`) REFERENCES `md_jntransaksi` (`KD_JNTRANSAKSI`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`KD_JNBAYAR`) REFERENCES `md_jnbayar` (`KD_JNBAYAR`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`KD_DOKUMEN`) REFERENCES `md_dokumen` (`KD_DOKUMEN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
