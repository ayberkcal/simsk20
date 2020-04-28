-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 05:17 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `no_regist` varchar(5) NOT NULL,
  `kode_layanan` varchar(4) NOT NULL,
  `id_syarat` int(11) NOT NULL,
  `nama_file` varchar(80) NOT NULL,
  `verifikasi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`no_regist`, `kode_layanan`, `id_syarat`, `nama_file`, `verifikasi`) VALUES
('S0001', 'L001', 1, 'S0001_1.pdf', 0),
('S0001', 'L001', 3, 'S0001_2.jpg', 0),
('S0002', 'L001', 1, 'S0002_1.pdf', 0),
('S0002', 'L001', 3, 'S0002_2.jpg', 0),
('S0003', 'L001', 1, 'S0003_1.pdf', 0),
('S0003', 'L001', 3, 'S0003_2.jpg', 0),
('S0004', 'L001', 1, 'S0004_1.pdf', 0),
('S0004', 'L001', 3, 'S0004_2.jpg', 0),
('S0005', 'L001', 1, 'S0005_1.pdf', 0),
('S0005', 'L001', 3, 'S0005_2.jpg', 0),
('S0006', 'L001', 1, 'S0006_1.pdf', 0),
('S0006', 'L001', 3, 'S0006_2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_tendik`
--

CREATE TABLE `dosen_tendik` (
  `id_user` varchar(20) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `sub_bagian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_tendik`
--

INSERT INTO `dosen_tendik` (`id_user`, `pangkat`, `golongan`, `jabatan`, `sub_bagian`) VALUES
('D0001', 'Pembina', 'IVA', 'WD I', NULL),
('TP001', 'P', 'IIIb', 'Tata Usaha', 'A & K');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `kode_klasifikasi` char(2) NOT NULL,
  `klasifikasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`kode_klasifikasi`, `klasifikasi`) VALUES
('KM', 'Kemahasiswaan'),
('KP', 'Kepegawaian'),
('TM', 'Penerimaan Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `kode_layanan` varchar(4) NOT NULL,
  `kode_sub` varchar(8) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `template_file` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`kode_layanan`, `kode_sub`, `nama_layanan`, `template_file`) VALUES
('L001', 'KM.00.00', 'Surat Aktif (Gaji Ortu)', 'L001.docx');

-- --------------------------------------------------------

--
-- Table structure for table `penandatangan`
--

CREATE TABLE `penandatangan` (
  `kode_layanan` varchar(4) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penandatangan`
--

INSERT INTO `penandatangan` (`kode_layanan`, `id_user`, `status`) VALUES
('L001', 'D0001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_klasifikasi`
--

CREATE TABLE `sub_klasifikasi` (
  `kode_sub` varchar(8) NOT NULL,
  `kode_klasifikasi` char(2) NOT NULL,
  `sub_klasifikasi` varchar(255) NOT NULL,
  `penomoran` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_klasifikasi`
--

INSERT INTO `sub_klasifikasi` (`kode_sub`, `kode_klasifikasi`, `sub_klasifikasi`, `penomoran`) VALUES
('KM.00.00', 'KM', 'Surat Keterangan Aktif Kuliah', 'B/[no_urut]/UN.16.15/KM.00.00/[tahun]'),
('KM.00.01', 'KM', 'Cuti Mahasiswa/Dispensasi', 'B/[no_urut]/UN.16.15/KM.00.01/[tahun]'),
('KP.00', 'KP', 'Kebijakan di bidang manajemen kepegawaian', '[no_urut]/UN16.15/D/KP/[tahun]');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `no_regist` varchar(5) NOT NULL,
  `kode_layanan` varchar(4) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `tgl_permohonan` date NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  `nama_file` varchar(80) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`no_regist`, `kode_layanan`, `id_user`, `tgl_permohonan`, `tujuan`, `tgl_surat`, `no_surat`, `data`, `nama_file`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
('S0001', 'L001', '1511521007', '2020-04-09', 'Pengambilan slip gaji orang tua dan BPJS', NULL, NULL, '{\"nama_ortu\":\"Erman\",\"nik\":\"13080743XXXXX001\",\"semester\":\"GENAP\"}', NULL, NULL, 1, '2020-04-09 14:50:21', '2020-04-09 14:50:21'),
('S0002', 'L001', '1511521015', '2020-04-09', 'BPJS', NULL, NULL, '{\"nama_ortu\":\"Ayah Rizka\",\"nik\":\"13080XXXXX940001\",\"semester\":\"GENAP\"}', NULL, NULL, 1, '2020-04-09 14:53:08', '2020-04-09 14:53:08'),
('S0003', 'L001', '1511521005', '2020-04-09', 'BPJS dan slip gaji', NULL, NULL, '{\"nama_ortu\":\"Papa Ami\",\"nik\":\"13080XXXXX940001\",\"semester\":\"GANJIL\"}', NULL, NULL, 1, '2020-04-09 14:54:13', '2020-04-09 14:54:13'),
('S0004', 'L001', '1511521007', '2020-04-09', 'bpjs', NULL, NULL, '{\"nama_ortu\":\"Papa Ami\",\"nik\":\"13080743049XXXXX\",\"semester\":\"GANJIL\"}', NULL, NULL, 1, '2020-04-09 14:55:23', '2020-04-09 14:55:23'),
('S0005', 'L001', '1511521015', '2020-04-09', 'jkajsk', NULL, NULL, '{\"nama_ortu\":\"kjkj\",\"nik\":\"130XXXXXX8890001\",\"semester\":\"GANJIL\"}', NULL, NULL, 1, '2020-04-09 14:56:12', '2020-04-09 14:56:12'),
('S0006', 'L001', '1511521007', '2020-04-09', 'ASAJK', NULL, NULL, '{\"nama_ortu\":\"KALKSL\",\"nik\":\"13XXXXX401980006\",\"semester\":\"GANJIL\"}', NULL, NULL, 1, '2020-04-09 14:57:11', '2020-04-09 14:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` int(11) NOT NULL,
  `nama_syarat` varchar(50) NOT NULL,
  `tipe_file` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `nama_syarat`, `tipe_file`) VALUES
(1, 'KRS Terbaru', 1),
(2, 'Transkrip Nilai', 1),
(3, 'SK Terakhir Orang Tua', 2),
(4, 'KHS semester terakhir', 1),
(5, 'Ijazah SMA', 2),
(6, 'Foto 3x4 Berwarna', 2),
(7, 'Surat Permohonan BSS ke Ketua Jurusan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `syarat_layanan`
--

CREATE TABLE `syarat_layanan` (
  `kode_layanan` varchar(4) NOT NULL,
  `id_syarat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat_layanan`
--

INSERT INTO `syarat_layanan` (`kode_layanan`, `id_syarat`) VALUES
('L001', 1),
('L001', 3);

-- --------------------------------------------------------

--
-- Table structure for table `template_field`
--

CREATE TABLE `template_field` (
  `id_field` int(11) NOT NULL,
  `kode_layanan` varchar(4) NOT NULL,
  `nama_field` varchar(20) NOT NULL,
  `tipe_field` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_field`
--

INSERT INTO `template_field` (`id_field`, `kode_layanan`, `nama_field`, `tipe_field`) VALUES
(1, 'L001', 'nama_ortu', 1),
(2, 'L001', 'nik', 1),
(3, 'L001', 'semester', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `foto` varchar(80) NOT NULL,
  `sertifikat_digital` varchar(80) DEFAULT NULL,
  `tanda_tangan` varchar(80) DEFAULT NULL,
  `paraf` varchar(80) DEFAULT NULL,
  `jenis_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `tempat_lahir`, `tgl_lahir`, `jekel`, `email`, `password`, `alamat`, `hp`, `agama`, `foto`, `sertifikat_digital`, `tanda_tangan`, `paraf`, `jenis_user`) VALUES
('1511521005', 'Agusti Amri Rahmi', 'Padang', '1996-08-13', 1, 'agusti@email.com', '12345', 'Padang', '081222222222', 'Islam', 'amiA.jpg', NULL, NULL, NULL, 1),
('1511521007', 'Aulia Rahmi', 'Bukittinggi', '1998-01-24', 1, 'aulia@email.com', '12345', 'Pasar Baru', '081222222222', 'Islam', 'ami.jpg', NULL, NULL, NULL, 1),
('1511521015', 'Rizka Aulia', 'Padang', '1998-03-07', 1, 'rizka@email.com', '12345', 'Padang', '081222222222', 'Islam', 'rizka.jpg', NULL, NULL, NULL, 1),
('D0001', 'Doni', 'Padang', '1985-02-02', 0, 'doni@email.com', '12345', 'Padang', '089911111111', 'Islam', 'doni.jpg', NULL, NULL, NULL, 2),
('D0002', 'Mirsya', 'bukittinggi', '1985-03-01', 2, 'email@email.com', '12345', 'Pauh', '83938', 'Islam', 'a.jpg', NULL, NULL, NULL, 2),
('TP001', 'Mia', 'Padang', '1988-09-21', 1, 'mia@email.com', '12331', 'Padang', '091928198', 'Islam', 'mia.jpg', NULL, NULL, NULL, 3),
('TP003', 'Kasih', 'bukittinggi', '1985-03-01', 2, 'email@email.com', '12345', 'Pauh', '83938', 'Islam', 'a.jpg', NULL, NULL, NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`no_regist`,`kode_layanan`,`id_syarat`),
  ADD KEY `syarat_layanan_dokumen_fk` (`kode_layanan`,`id_syarat`);

--
-- Indexes for table `dosen_tendik`
--
ALTER TABLE `dosen_tendik`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`kode_klasifikasi`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`kode_layanan`),
  ADD KEY `sub_klasifikasi_layanan_fk` (`kode_sub`);

--
-- Indexes for table `penandatangan`
--
ALTER TABLE `penandatangan`
  ADD PRIMARY KEY (`kode_layanan`,`id_user`),
  ADD KEY `user_penandatangan_fk` (`id_user`) USING BTREE;

--
-- Indexes for table `sub_klasifikasi`
--
ALTER TABLE `sub_klasifikasi`
  ADD PRIMARY KEY (`kode_sub`),
  ADD KEY `klasifikasi_sub_klasifikasi_fk` (`kode_klasifikasi`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`no_regist`,`kode_layanan`),
  ADD UNIQUE KEY `surat_keluar_idx` (`no_regist`),
  ADD UNIQUE KEY `surat_keluar_idx1` (`no_surat`),
  ADD KEY `user_surat_keluar_fk` (`id_user`),
  ADD KEY `layanan_surat_keluar_fk` (`kode_layanan`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indexes for table `syarat_layanan`
--
ALTER TABLE `syarat_layanan`
  ADD PRIMARY KEY (`kode_layanan`,`id_syarat`),
  ADD KEY `syarat_syarat_layanan_fk` (`id_syarat`);

--
-- Indexes for table `template_field`
--
ALTER TABLE `template_field`
  ADD PRIMARY KEY (`id_field`),
  ADD KEY `layanan_field_fk` (`kode_layanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `template_field`
--
ALTER TABLE `template_field`
  MODIFY `id_field` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `surat_keluar_dokumen_fk` FOREIGN KEY (`no_regist`,`kode_layanan`) REFERENCES `surat_keluar` (`no_regist`, `kode_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `syarat_layanan_dokumen_fk` FOREIGN KEY (`kode_layanan`,`id_syarat`) REFERENCES `syarat_layanan` (`kode_layanan`, `id_syarat`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `dosen_tendik`
--
ALTER TABLE `dosen_tendik`
  ADD CONSTRAINT `user_petugas_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `sub_klasifikasi_layanan_fk` FOREIGN KEY (`kode_sub`) REFERENCES `sub_klasifikasi` (`kode_sub`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penandatangan`
--
ALTER TABLE `penandatangan`
  ADD CONSTRAINT `layanan_penandatangan_fk` FOREIGN KEY (`kode_layanan`) REFERENCES `layanan` (`kode_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_penandatangan_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_klasifikasi`
--
ALTER TABLE `sub_klasifikasi`
  ADD CONSTRAINT `klasifikasi_sub_klasifikasi_fk` FOREIGN KEY (`kode_klasifikasi`) REFERENCES `klasifikasi` (`kode_klasifikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `layanan_surat_keluar_fk` FOREIGN KEY (`kode_layanan`) REFERENCES `layanan` (`kode_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_surat_keluar_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `syarat_layanan`
--
ALTER TABLE `syarat_layanan`
  ADD CONSTRAINT `layanan_syarat_layanan_fk` FOREIGN KEY (`kode_layanan`) REFERENCES `layanan` (`kode_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `syarat_syarat_layanan_fk` FOREIGN KEY (`id_syarat`) REFERENCES `syarat` (`id_syarat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template_field`
--
ALTER TABLE `template_field`
  ADD CONSTRAINT `layanan_field_fk` FOREIGN KEY (`kode_layanan`) REFERENCES `layanan` (`kode_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
