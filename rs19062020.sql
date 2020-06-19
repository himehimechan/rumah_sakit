-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 08:36 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `kode_dokter` varchar(20) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kode_spesialis` varchar(10) NOT NULL,
  `tgl_join` date NOT NULL,
  `status_dokter` varchar(50) NOT NULL,
  `no_izin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`kode_dokter`, `nama_dokter`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_tinggal`, `no_hp`, `kode_spesialis`, `tgl_join`, `status_dokter`, `no_izin`) VALUES
('DK-1604200851037979', 'teguh', 'L', 'tes', '1998-08-21', 'tes', '83645834', 'DU2', '0000-00-00', '0', ''),
('DK-1604200907066134', 'Putra Nugraha', 'L', 'Jakarta Pusat', '1998-07-21', 'Gambir, Jakarta Pusat', '08537563823', 'THT1', '2020-06-07', 'active', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_diagnosa`
--

CREATE TABLE `tbl_master_diagnosa` (
  `kode_diagnosa` varchar(10) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `status_coverage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_diagnosa`
--

INSERT INTO `tbl_master_diagnosa` (`kode_diagnosa`, `diagnosis`, `status_coverage`) VALUES
('1', 'Sakit Kepala', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id` varchar(50) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori_obat` varchar(50) NOT NULL,
  `satuan_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`id`, `nama_obat`, `harga`, `kategori_obat`, `satuan_barang`) VALUES
('2', 'BETADIN', 45000, 'Obat Antibiotik', 'Sirup'),
('4', 'Mixagrip flu dan batuk', 5000, 'Obat Vitamin', 'Tablet'),
('5', 'Panadol', 5000, 'Obat Vitamin', 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(15) NOT NULL,
  `nama_pasien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_tlp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `no_rekam_medis` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama_pasien`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_tlp`, `no_rekam_medis`) VALUES
(1, 'Maman Durahman', '1978-02-21', 'l', 'Tebet dalam, Jakarta Selatan', '082789989990', 'RM-1604204801'),
(2, 'Salman Farisi', '1998-02-09', 'l', 'Karet Tengsin, Jakarta Selatan', '081788239912', 'RM-1604202805'),
(3, 'Syahida Muslimah', '1992-05-12', 'p', 'Kuningan, Jakarta Selatan', '0890989990', 'RM-1604206364'),
(4, 'Teguh Putra Nugraha', '1998-08-21', 'l', 'Jakarta Selatan, Jakarta', '085375065162', 'RM-1604205354');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemeriksaan_pasien`
--

CREATE TABLE `tbl_pemeriksaan_pasien` (
  `id_data_pemeriksaan` varchar(10) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `no_rekam_medis` varchar(20) NOT NULL,
  `anamase` text NOT NULL,
  `kode_diagnosa` varchar(10) NOT NULL,
  `tindakan` text NOT NULL,
  `obat` text NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `status_pemeriksaan` varchar(20) NOT NULL,
  `biaya_dokter` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemeriksaan_pasien`
--

INSERT INTO `tbl_pemeriksaan_pasien` (`id_data_pemeriksaan`, `nama_pasien`, `no_rekam_medis`, `anamase`, `kode_diagnosa`, `tindakan`, `obat`, `tanggal_periksa`, `status_pemeriksaan`, `biaya_dokter`) VALUES
('1', 'Teguh Putra Nugraha', 'RM-1604205354', 'Kepala Sakit', '1', 'Berikan obat sakit kepala', 'Berikan Panadol Saja', '2020-06-12', 'selesai', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat_pemberian_obat`
--

CREATE TABLE `tbl_riwayat_pemberian_obat` (
  `id` int(11) NOT NULL,
  `id_data_pemeriksaan` varchar(11) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_resep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_riwayat_pemberian_obat`
--

INSERT INTO `tbl_riwayat_pemberian_obat` (`id`, `id_data_pemeriksaan`, `kode_barang`, `qty`, `tanggal`, `status`, `status_resep`) VALUES
(1, '1', '5', 1, '2020-06-12 15:50:16', 'ready', 'no copy only'),
(4, '1', '4', 4, '2020-06-19 02:39:26', 'not ready', 'no copy only'),
(5, '1', '2', 1, '2020-06-19 02:43:56', 'ready', 'no copy only');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spesialis`
--

CREATE TABLE `tbl_spesialis` (
  `kode_spesialis` varchar(50) NOT NULL,
  `bidang_spesialis` varchar(40) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spesialis`
--

INSERT INTO `tbl_spesialis` (`kode_spesialis`, `bidang_spesialis`, `keterangan`) VALUES
('BDH1', 'Bedah', 'Sp.B , Bedah Umum'),
('BDH2', 'Bedah Urologi', 'Sp.U, Urologist'),
('DU1', 'Dokter Umum', 'Dokter umum'),
('DU2', 'Dokter Umum Siaga', 'Dokter umum IGD'),
('MTA1', 'Mata', 'Sp.M, Spesialis Mata'),
('OBG1', 'Kandungan', 'Sp.OG, Spesialis kebidanan dan kandungan'),
('PPD1', 'Penyakit Dalam', 'Sp.PD, Spesialis penyakit dalam umum'),
('PPD2', 'Penyakit dalam – Hematologi', 'Spesialis penyakit dalam, sub spesialis Kelainan darah'),
('PUL1', 'Paru', 'Sp.P, Spesialis Kesehatan Paru'),
('THT1', 'THT', 'Sp.THT, Spesialis Telinga Hidung Tenggorokan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_menikah`
--

CREATE TABLE `tbl_status_menikah` (
  `id_status_menikah` int(11) NOT NULL,
  `status_menikah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status_menikah`
--

INSERT INTO `tbl_status_menikah` (`id_status_menikah`, `status_menikah`) VALUES
(1, 'kawin'),
(2, 'belum kawin'),
(3, 'duda'),
(4, 'janda');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `last_login`, `created_date`, `created_by`, `updated_date`, `updated_by`, `role`, `status_user`, `name`, `no_hp`) VALUES
(6, 'ADMUSR1', 'sarah@email.com', '21232f297a57a5a743894a0e4a801fc3', '2020-06-19 13:07:01', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 1, 'aktif', 'Sarah Nur Laila', ''),
(8, 'ADMMR2', 'janur@email.com', '32250170a0dca92d53ec9624f336ca24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 2, 'aktif', 'Jaka Nurmanto', ''),
(9, 'DR-012', 'wijaaydr@rmail.com', '32250170a0dca92d53ec9624f336ca24', '2020-05-01 15:15:55', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 3, 'aktif', 'dr. Wijaya, Sp.PD', ''),
(10, 'DR-345', 'siscasari@rmail.com', '32250170a0dca92d53ec9624f336ca24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 3, 'aktif', 'dr. Sisca sari', ''),
(11, 'DR-245', 'dr_nay@gmail.com', '32250170a0dca92d53ec9624f336ca24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 3, 'aktif', 'dr. Maulani, Sp.OG', ''),
(12, 'DR-215', 'dr_yasmin@gmail.com', '32250170a0dca92d53ec9624f336ca24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 3, 'aktif', 'dr. Yasmin, Sp.B', ''),
(13, 'PD-10', 'yudo@mail.com', '32250170a0dca92d53ec9624f336ca24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 4, 'aktif', 'Yudho Agustian', ''),
(14, 'PD-07', 'nurwidi@mail.com', '32250170a0dca92d53ec9624f336ca24', '2020-05-01 15:13:26', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 4, 'aktif', 'Riani Nurwidhi', ''),
(16, 'ADMUSR2', 'teguh@sentadj.co.id', '32250170a0dca92d53ec9624f336ca24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 1, 'aktif', 'ADMIN2', '085375065162');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`kode_dokter`);

--
-- Indexes for table `tbl_master_diagnosa`
--
ALTER TABLE `tbl_master_diagnosa`
  ADD PRIMARY KEY (`kode_diagnosa`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_pemeriksaan_pasien`
--
ALTER TABLE `tbl_pemeriksaan_pasien`
  ADD PRIMARY KEY (`id_data_pemeriksaan`);

--
-- Indexes for table `tbl_riwayat_pemberian_obat`
--
ALTER TABLE `tbl_riwayat_pemberian_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_spesialis`
--
ALTER TABLE `tbl_spesialis`
  ADD PRIMARY KEY (`kode_spesialis`);

--
-- Indexes for table `tbl_status_menikah`
--
ALTER TABLE `tbl_status_menikah`
  ADD PRIMARY KEY (`id_status_menikah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_riwayat_pemberian_obat`
--
ALTER TABLE `tbl_riwayat_pemberian_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_status_menikah`
--
ALTER TABLE `tbl_status_menikah`
  MODIFY `id_status_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
