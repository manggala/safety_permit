-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2016 at 06:19 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `safety_permit`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklist_apd`
--

CREATE TABLE IF NOT EXISTS `checklist_apd` (
  `id_checklist_apd` int(11) NOT NULL,
  `id_daftar_apd` int(11) NOT NULL,
  `id_form_safetypermit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_kd`
--

CREATE TABLE IF NOT EXISTS `checklist_kd` (
  `id_checklist_kd` int(11) NOT NULL,
  `id_daftar_kd` int(11) NOT NULL,
  `id_formemergenci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_kerugian`
--

CREATE TABLE IF NOT EXISTS `checklist_kerugian` (
  `id_checklist_k` int(11) NOT NULL,
  `id_daftar_k` int(11) NOT NULL,
  `id_formemergency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_orientasik3`
--

CREATE TABLE IF NOT EXISTS `checklist_orientasik3` (
  `id_checklist_ok` int(11) NOT NULL,
  `id_daftar_ok` int(11) NOT NULL,
  `id_form_safetypermit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_peralatanbaik`
--

CREATE TABLE IF NOT EXISTS `checklist_peralatanbaik` (
  `id_checklist_pb` int(11) NOT NULL,
  `id_daftar_pb` int(11) NOT NULL,
  `id_for` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_pl`
--

CREATE TABLE IF NOT EXISTS `checklist_pl` (
  `id_checklist_pl` int(11) NOT NULL,
  `id_daftar_pl` int(11) NOT NULL,
  `id_form_safetypermit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_apd`
--

CREATE TABLE IF NOT EXISTS `daftar_apd` (
  `id_apd` int(11) NOT NULL,
  `nama_apd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_keadaandarurat`
--

CREATE TABLE IF NOT EXISTS `daftar_keadaandarurat` (
  `id_keadaandarurat` int(11) NOT NULL,
  `nama_keadaandarurat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kerugian`
--

CREATE TABLE IF NOT EXISTS `daftar_kerugian` (
  `id_daftarkerugian` int(11) NOT NULL,
  `nama_kerugian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_orientasik3`
--

CREATE TABLE IF NOT EXISTS `daftar_orientasik3` (
  `id_daftar_ok` int(11) NOT NULL,
  `nama_daftar_ok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_peralatanbaik`
--

CREATE TABLE IF NOT EXISTS `daftar_peralatanbaik` (
  `id_daftar_pb` int(11) NOT NULL,
  `nama_daftar_pb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_peralatanlokasi`
--

CREATE TABLE IF NOT EXISTS `daftar_peralatanlokasi` (
  `id_daftar_pl` int(11) NOT NULL,
  `nama_daftar_pl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE IF NOT EXISTS `departemen` (
  `id_departemen` text NOT NULL,
  `nama_departemen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_accident`
--

CREATE TABLE IF NOT EXISTS `form_accident` (
  `id_formaccident` int(11) NOT NULL AUTO_INCREMENT,
  `nip` text NOT NULL,
  `id_jabatan` text NOT NULL,
  `id_departemen` text NOT NULL,
  `lokasi_formaccident` text NOT NULL,
  `tanggal_formaccident` datetime NOT NULL,
  `kronologi_formaccident` text NOT NULL,
  `keterangan_formaccident` text NOT NULL,
  PRIMARY KEY (`id_formaccident`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `form_emergency`
--

CREATE TABLE IF NOT EXISTS `form_emergency` (
  `id_formemergency` int(11) NOT NULL,
  `nip` text NOT NULL,
  `id_jabatan` text NOT NULL,
  `id_departemen` text NOT NULL,
  `id_lokasi` text NOT NULL,
  `tanggal_formemergency` datetime NOT NULL,
  `penanganan_formemergency` text NOT NULL,
  `oleh_formemergency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_nearmiss`
--

CREATE TABLE IF NOT EXISTS `form_nearmiss` (
  `id_formnearmiss` int(11) NOT NULL AUTO_INCREMENT,
  `nip` text NOT NULL,
  `id_jabatan` text NOT NULL,
  `id_departemen` text NOT NULL,
  `id_lokasi` text NOT NULL,
  `tanggal_formnearmiss` datetime NOT NULL,
  `kronologi_formnearmiss` text NOT NULL,
  `akibat_formnearmiss` text NOT NULL,
  `tindakan_formnearmiss` text NOT NULL,
  PRIMARY KEY (`id_formnearmiss`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `form_safetypermit`
--

CREATE TABLE IF NOT EXISTS `form_safetypermit` (
  `id_form` text NOT NULL,
  `id_pekerjaan` text NOT NULL,
  `id_lokasi` text NOT NULL,
  `id_departemen` text NOT NULL,
  `id_pelaksana` text NOT NULL,
  `id_jabatan` text NOT NULL,
  `id_pengawas` text NOT NULL,
  `id_jenissafetypermit` int(11) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `jumlah_pekerja` int(11) NOT NULL,
  `jumlah_mitrakerja` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` text NOT NULL,
  `nama_jabatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_safetypermit`
--

CREATE TABLE IF NOT EXISTS `jenis_safetypermit` (
  `id_jenissafetypermit` int(11) NOT NULL,
  `nama_jenissafetypermit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `id_lokasi` text NOT NULL,
  `nama_lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` text NOT NULL,
  `nama_pegawai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` text NOT NULL,
  `nama_pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelaksana`
--

CREATE TABLE IF NOT EXISTS `pelaksana` (
  `id_pelaksana` int(11) NOT NULL,
  `nama_pelaksana` text NOT NULL,
  `telp_pelaksana` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengawas`
--

CREATE TABLE IF NOT EXISTS `pengawas` (
  `id_pengawas` int(11) NOT NULL,
  `nama_pengawas` text NOT NULL,
  `telp_pengawas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
