-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2016 at 04:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safety_permit`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklist_apd`
--

CREATE TABLE `checklist_apd` (
  `id_checklist_apd` int(11) NOT NULL,
  `id_daftar_apd` int(11) NOT NULL,
  `id_form_safetypermit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_kd`
--

CREATE TABLE `checklist_kd` (
  `id_checklist_kd` int(11) NOT NULL,
  `id_daftar_kd` int(11) NOT NULL,
  `id_formemergency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_kerugian`
--

CREATE TABLE `checklist_kerugian` (
  `id_checklist_k` int(11) NOT NULL,
  `id_daftar_k` int(11) NOT NULL,
  `id_formemergency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_orientasik3`
--

CREATE TABLE `checklist_orientasik3` (
  `id_checklist_ok` int(11) NOT NULL,
  `id_daftar_ok` int(11) NOT NULL,
  `id_form_safetypermit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_peralatanbaik`
--

CREATE TABLE `checklist_peralatanbaik` (
  `id_checklist_pb` int(11) NOT NULL,
  `id_daftar_pb` int(11) NOT NULL,
  `id_form_safetypermit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_pl`
--

CREATE TABLE `checklist_pl` (
  `id_checklist_pl` int(11) NOT NULL,
  `id_daftar_pl` int(11) NOT NULL,
  `id_form_safetypermit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist_pl`
--

INSERT INTO `checklist_pl` (`id_checklist_pl`, `id_daftar_pl`, `id_form_safetypermit`) VALUES
(1, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_apd`
--

CREATE TABLE `daftar_apd` (
  `id_apd` int(11) NOT NULL,
  `nama_apd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_keadaandarurat`
--

CREATE TABLE `daftar_keadaandarurat` (
  `id_keadaandarurat` int(11) NOT NULL,
  `nama_keadaandarurat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kerugian`
--

CREATE TABLE `daftar_kerugian` (
  `id_daftarkerugian` int(11) NOT NULL,
  `nama_kerugian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_orientasik3`
--

CREATE TABLE `daftar_orientasik3` (
  `id_daftar_ok` int(11) NOT NULL,
  `nama_daftar_ok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_peralatanbaik`
--

CREATE TABLE `daftar_peralatanbaik` (
  `id_daftar_pb` int(11) NOT NULL,
  `nama_daftar_pb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_peralatanlokasi`
--

CREATE TABLE `daftar_peralatanlokasi` (
  `id_daftar_pl` int(11) NOT NULL,
  `nama_daftar_pl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_peralatanlokasi`
--

INSERT INTO `daftar_peralatanlokasi` (`id_daftar_pl`, `nama_daftar_pl`) VALUES
(1, 'APD tersedia dan dipakai'),
(2, 'Bahan Mudah Terbakar Sudah Dipindahkan'),
(3, 'Tersedia Fire Blanket'),
(4, 'Tersedia APAR'),
(5, 'Ada 2 Orang Operator Blender/Las');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` text NOT NULL,
  `nama_departemen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_accident`
--

CREATE TABLE `form_accident` (
  `id_formaccident` int(11) NOT NULL,
  `nip` text NOT NULL,
  `id_jabatan` text NOT NULL,
  `id_departemen` text NOT NULL,
  `lokasi_formaccident` text NOT NULL,
  `tanggal_formaccident` date NOT NULL,
  `waktu_formaccident` time NOT NULL,
  `kronologi_formaccident` text NOT NULL,
  `keterangan_formaccident` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_accident`
--

INSERT INTO `form_accident` (`id_formaccident`, `nip`, `id_jabatan`, `id_departemen`, `lokasi_formaccident`, `tanggal_formaccident`, `waktu_formaccident`, `kronologi_formaccident`, `keterangan_formaccident`) VALUES
(1, 'P01', 'JA01', 'D01', 'L01', '2016-07-23', '07:36:34', ',ajdnf', 'asdjf');

-- --------------------------------------------------------

--
-- Table structure for table `form_emergency`
--

CREATE TABLE `form_emergency` (
  `id_formemergency` int(11) NOT NULL,
  `nip` text NOT NULL,
  `id_jabatan` text NOT NULL,
  `id_departemen` text NOT NULL,
  `id_lokasi` text NOT NULL,
  `tanggal_formemergency` date NOT NULL,
  `waktu_formemergency` time NOT NULL,
  `penanganan_formemergency` text NOT NULL,
  `oleh_formemergency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_emergency`
--

INSERT INTO `form_emergency` (`id_formemergency`, `nip`, `id_jabatan`, `id_departemen`, `id_lokasi`, `tanggal_formemergency`, `waktu_formemergency`, `penanganan_formemergency`, `oleh_formemergency`) VALUES
(1, 'P01', 'JA01', 'D01', 'L01', '2016-07-23', '20:23:38', 'alkjdf', 'alsdkjf');

-- --------------------------------------------------------

--
-- Table structure for table `form_nearmiss`
--

CREATE TABLE `form_nearmiss` (
  `id_formnearmiss` int(11) NOT NULL,
  `nip` text NOT NULL,
  `id_jabatan` text NOT NULL,
  `id_departemen` text NOT NULL,
  `id_lokasi` text NOT NULL,
  `tanggal_formnearmiss` datetime NOT NULL,
  `kronologi_formnearmiss` text NOT NULL,
  `akibat_formnearmiss` text NOT NULL,
  `tindakan_formnearmiss` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_safetypermit`
--

CREATE TABLE `form_safetypermit` (
  `id_form` int(11) NOT NULL,
  `id_pekerjaan` text NOT NULL,
  `id_lokasi` text NOT NULL,
  `id_departemen` text NOT NULL,
  `id_pelaksana` text NOT NULL,
  `id_jabatan` text NOT NULL,
  `id_pengawas` text NOT NULL,
  `id_jenissafetypermit` int(11) NOT NULL,
  `status_safetypermit` int(11) NOT NULL DEFAULT '0',
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `jumlah_pekerja` int(11) NOT NULL,
  `jumlah_mitrakerja` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_safetypermit`
--

INSERT INTO `form_safetypermit` (`id_form`, `id_pekerjaan`, `id_lokasi`, `id_departemen`, `id_pelaksana`, `id_jabatan`, `id_pengawas`, `id_jenissafetypermit`, `status_safetypermit`, `waktu_mulai`, `waktu_selesai`, `jumlah_pekerja`, `jumlah_mitrakerja`, `created_at`, `updated_at`) VALUES
(1, 'P01', 'L01', 'D01', 'PE01', 'JA01', 'PA01', 1, 1, '2016-07-23 13:31:46', '2016-07-23 14:41:48', 1, 2, '2016-07-23 09:20:20', '2016-07-24 12:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` text NOT NULL,
  `nama_jabatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_safetypermit`
--

CREATE TABLE `jenis_safetypermit` (
  `id_jenissafetypermit` int(11) NOT NULL,
  `nama_jenissafetypermit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` text NOT NULL,
  `nama_lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nama_pegawai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`) VALUES
(1, 'P01', 'Pegawai Pertama');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` text NOT NULL,
  `nama_pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelaksana`
--

CREATE TABLE `pelaksana` (
  `id_pelaksana` int(11) NOT NULL,
  `nama_pelaksana` text NOT NULL,
  `telp_pelaksana` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengawas`
--

CREATE TABLE `pengawas` (
  `id_pengawas` int(11) NOT NULL,
  `nama_pengawas` text NOT NULL,
  `telp_pengawas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist_pl`
--
ALTER TABLE `checklist_pl`
  ADD PRIMARY KEY (`id_checklist_pl`);

--
-- Indexes for table `daftar_peralatanlokasi`
--
ALTER TABLE `daftar_peralatanlokasi`
  ADD PRIMARY KEY (`id_daftar_pl`);

--
-- Indexes for table `form_accident`
--
ALTER TABLE `form_accident`
  ADD PRIMARY KEY (`id_formaccident`);

--
-- Indexes for table `form_emergency`
--
ALTER TABLE `form_emergency`
  ADD PRIMARY KEY (`id_formemergency`);

--
-- Indexes for table `form_nearmiss`
--
ALTER TABLE `form_nearmiss`
  ADD PRIMARY KEY (`id_formnearmiss`);

--
-- Indexes for table `form_safetypermit`
--
ALTER TABLE `form_safetypermit`
  ADD PRIMARY KEY (`id_form`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checklist_pl`
--
ALTER TABLE `checklist_pl`
  MODIFY `id_checklist_pl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `daftar_peralatanlokasi`
--
ALTER TABLE `daftar_peralatanlokasi`
  MODIFY `id_daftar_pl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `form_accident`
--
ALTER TABLE `form_accident`
  MODIFY `id_formaccident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `form_emergency`
--
ALTER TABLE `form_emergency`
  MODIFY `id_formemergency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `form_nearmiss`
--
ALTER TABLE `form_nearmiss`
  MODIFY `id_formnearmiss` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form_safetypermit`
--
ALTER TABLE `form_safetypermit`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
