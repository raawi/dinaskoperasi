-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2018 at 10:52 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspek_aktiva`
--

CREATE TABLE IF NOT EXISTS `aspek_aktiva` (
  `id_penilaian` char(10) NOT NULL,
  `rvppatvp` decimal(4,2) unsigned NOT NULL,
  `rpbtvp` decimal(4,2) unsigned NOT NULL,
  `rcrtpb` decimal(4,2) unsigned NOT NULL,
  `rbmpp` decimal(4,2) unsigned NOT NULL,
  `tgl_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_aktiva`
--

INSERT INTO `aspek_aktiva` (`id_penilaian`, `rvppatvp`, `rpbtvp`, `rcrtpb`, `rbmpp`, `tgl_penilaian`) VALUES
('SKR0000001', '10.00', '4.00', '5.00', '5.00', '0000-00-00'),
('SKR0000002', '10.00', '4.00', '5.00', '5.00', '0000-00-00'),
('SKR0000003', '10.00', '4.00', '5.00', '5.00', '0000-00-00'),
('SKR0000004', '10.00', '4.00', '5.00', '5.00', '0000-00-00'),
('SKR0000005', '10.00', '4.00', '5.00', '5.00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_efisiensi`
--

CREATE TABLE IF NOT EXISTS `aspek_efisiensi` (
  `id_penilaian` char(10) NOT NULL,
  `rbotpb` decimal(4,2) NOT NULL,
  `rattta` decimal(4,2) NOT NULL,
  `rep` decimal(4,2) NOT NULL,
  `tgl_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_efisiensi`
--

INSERT INTO `aspek_efisiensi` (`id_penilaian`, `rbotpb`, `rattta`, `rep`, `tgl_penilaian`) VALUES
('SKR0000001', '3.00', '1.00', '1.50', '0000-00-00'),
('SKR0000002', '3.00', '1.00', '1.50', '0000-00-00'),
('SKR0000003', '3.00', '1.00', '1.50', '0000-00-00'),
('SKR0000004', '3.00', '1.00', '1.50', '0000-00-00'),
('SKR0000005', '3.00', '1.00', '1.50', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_jatidiri`
--

CREATE TABLE IF NOT EXISTS `aspek_jatidiri` (
  `id_penilaian` char(10) NOT NULL,
  `rpb` decimal(4,2) NOT NULL,
  `rpea` decimal(4,2) NOT NULL,
  `tgl_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_jatidiri`
--

INSERT INTO `aspek_jatidiri` (`id_penilaian`, `rpb`, `rpea`, `tgl_penilaian`) VALUES
('SKR0000001', '7.00', '0.00', '0000-00-00'),
('SKR0000002', '7.00', '0.00', '0000-00-00'),
('SKR0000003', '7.00', '0.25', '0000-00-00'),
('SKR0000004', '7.00', '0.00', '0000-00-00'),
('SKR0000005', '7.00', '0.00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_kemandirian`
--

CREATE TABLE IF NOT EXISTS `aspek_kemandirian` (
  `id_penilaian` char(10) NOT NULL,
  `ra` decimal(4,2) NOT NULL,
  `rms` decimal(4,2) NOT NULL,
  `kop` decimal(4,2) NOT NULL,
  `tgl_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_kemandirian`
--

INSERT INTO `aspek_kemandirian` (`id_penilaian`, `ra`, `rms`, `kop`, `tgl_penilaian`) VALUES
('SKR0000001', '0.75', '3.00', '4.00', '0000-00-00'),
('SKR0000002', '0.75', '3.00', '4.00', '0000-00-00'),
('SKR0000003', '0.75', '3.00', '4.00', '0000-00-00'),
('SKR0000004', '0.75', '3.00', '4.00', '0000-00-00'),
('SKR0000005', '0.75', '3.00', '4.00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_likuiditas`
--

CREATE TABLE IF NOT EXISTS `aspek_likuiditas` (
  `id_penilaian` char(10) NOT NULL,
  `rk` decimal(4,2) NOT NULL,
  `rpptdyd` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_likuiditas`
--

INSERT INTO `aspek_likuiditas` (`id_penilaian`, `rk`, `rpptdyd`) VALUES
('SKR0000001', '2.50', '3.75'),
('SKR0000002', '2.50', '3.75'),
('SKR0000003', '2.50', '3.75'),
('SKR0000004', '2.50', '3.75'),
('SKR0000005', '2.50', '3.75');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_mamajemen`
--

CREATE TABLE IF NOT EXISTS `aspek_mamajemen` (
  `id_penilaian` char(10) NOT NULL,
  `mu` decimal(4,2) unsigned NOT NULL,
  `mk` decimal(4,2) unsigned NOT NULL,
  `mp` decimal(4,2) unsigned NOT NULL,
  `ma` decimal(4,2) unsigned NOT NULL,
  `ml` decimal(4,2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_mamajemen`
--

INSERT INTO `aspek_mamajemen` (`id_penilaian`, `mu`, `mk`, `mp`, `ma`, `ml`) VALUES
('SKR0000001', '2.50', '2.00', '2.40', '2.10', '1.80'),
('SKR0000002', '2.50', '2.00', '2.40', '2.10', '1.80'),
('SKR0000003', '2.50', '2.00', '2.40', '2.10', '1.80'),
('SKR0000004', '2.50', '2.00', '2.40', '2.10', '1.80'),
('SKR0000005', '2.50', '2.00', '2.40', '2.10', '1.80');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_permodalan`
--

CREATE TABLE IF NOT EXISTS `aspek_permodalan` (
  `id_penilaian` char(10) NOT NULL,
  `rmstta` decimal(6,2) unsigned NOT NULL,
  `rmstpyb` decimal(6,2) unsigned NOT NULL,
  `car` decimal(6,2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_permodalan`
--

INSERT INTO `aspek_permodalan` (`id_penilaian`, `rmstta`, `rmstpyb`, `car`) VALUES
('SKR0000001', '2.00', '6.00', '1.50'),
('SKR0000002', '2.00', '6.00', '1.50'),
('SKR0000003', '2.00', '6.00', '1.50'),
('SKR0000004', '2.00', '6.00', '1.50'),
('SKR0000005', '2.00', '6.00', '1.50');

-- --------------------------------------------------------

--
-- Table structure for table `bentuk_koperasi`
--

CREATE TABLE IF NOT EXISTS `bentuk_koperasi` (
  `kd_bk` varchar(4) NOT NULL,
  `nama_bk` varchar(6) NOT NULL,
  `kepanjangan` varchar(50) NOT NULL,
  PRIMARY KEY (`nama_bk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bentuk_koperasi`
--

INSERT INTO `bentuk_koperasi` (`kd_bk`, `nama_bk`, `kepanjangan`) VALUES
('BK03', 'KJKS', 'Koperasi Jasa keuangan Syariah'),
('BK01', 'KSP', 'Koperasi Simpan Pinjam'),
('BK02', 'USP', 'Unit Simpan Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `data_koperasi`
--

CREATE TABLE IF NOT EXISTS `data_koperasi` (
  `kd_koperasi` varchar(8) NOT NULL,
  `nama_koperasi` varchar(70) NOT NULL,
  `no_bh` text NOT NULL,
  `tanggal_bh` date NOT NULL,
  `jalan` varchar(200) NOT NULL,
  `kelurahan` varchar(4) NOT NULL,
  `kecamatan` varchar(4) NOT NULL,
  `telp` char(12) NOT NULL,
  `bentuk_koperasi` varchar(4) NOT NULL,
  `nama_ketua` varchar(40) NOT NULL,
  `bendahara` varchar(50) NOT NULL,
  `sekertaris` varchar(60) NOT NULL,
  `jumlah_anggota` int(5) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tgl_sekarang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_koperasi`
--

INSERT INTO `data_koperasi` (`kd_koperasi`, `nama_koperasi`, `no_bh`, `tanggal_bh`, `jalan`, `kelurahan`, `kecamatan`, `telp`, `bentuk_koperasi`, `nama_ketua`, `bendahara`, `sekertaris`, `jumlah_anggota`, `status`, `tgl_sekarang`) VALUES
('KOP00004', 'KOPERASI MAJU JAYA', '201/334/3-2/2014', '2014-05-22', 'Jl Kelud raya no 20', 'L005', 'K001', '82', 'BK01', 'sukinah', '', '0', 20, 'Aktif', '0000-00-00'),
('KOP00005', 'BMT ARTHA BUMI ASRI', '5/180.08/BH/XIV.34/II/2010', '2010-02-24', 'Jl. Merdeka Utara H-7', 'L080', 'K008', '081234567654', 'BK01', 'ari susanto', '', '0', 20, 'Aktif', '0000-00-00'),
('KOP00006', 'MAKMUR SEJAHTERA', '5/180.08/BH/XIV.35/II/2010', '2010-05-27', 'Jl Siliwangi', 'L102', 'K010', '082314567876', 'BK01', 'aryo', '', '0', 23, 'Aktif', '0000-00-00'),
('KOP00007', 'CEMARA MAKMUR', ' 01.180.08/BH/XIV.34/V/2012 ', '2012-05-16', 'Jl. Setiabudi No. 5 B', 'L010', 'K001', ' 0811270818', 'BK01', 'Lie Fang Wai', '', '0', 23, 'Aktif', '0000-00-00'),
('KOP00008', 'SUCI', ' 32/180.08/BH/XIV.34/X/2012 ', '2002-02-15', 'Jl. Diponegoro Raya', 'L005', 'K001', '', 'BK01', ' 0811290890 ', '', '0', 25, 'Aktif', '0000-00-00'),
('KOP00009', 'AMANDA', ' 180.08/BH/XIV.34/35', '2008-07-16', 'J. Bukit Seruni I Blok A', 'L165', 'K015', '087654567', 'BK02', 'Ari Irwanto', '', '0', 20, 'Aktif', '0000-00-00'),
('KOP00011', 'BMT EL GAMA ARTHA MANDIRI', '22/180.08/BH/XIV.34/VII/09', '2009-07-07', 'Jl. Banjarsari Raya No.34 Rt.02/01', 'L167', 'K015', '081223776889', 'BK03', 'Arif', '', '0', 21, 'Aktif', '0000-00-00'),
('KOP00012', 'BENTULU', '02/180.08/BH/XIV.34/V/2013', '2013-05-05', 'JL. RAYA CANGKIRAN, GUNUNGPATI, KARANG MALANG RT.01/RW/02', 'L066', 'K007', '08122808248', 'BK01', 'ISMAIL', '', '0', 20, 'Aktif', '0000-00-00'),
('KOP00013', 'JOHO INDAH\n', '15/180.08/BH/XIV.34/VII/2013', '2013-05-25', 'SMAN 13 SMG, JL. ROWO SEMANDING RT.02/RW.10', 'L068', 'K007', '0247711024', 'BK01', 'SUYANTO', '', '0', 23, 'Aktif', '0000-00-00'),
('KOP00014', 'SITI MULIA ABADI', '024/180.08/BH/XIV.34/X/2013', '2013-10-30', 'WONOLOPO RT.02/RW.03', 'L074', 'K007', '081325462221', 'BK01', 'AGUS RUBIYANTO', '', '0', 25, 'Aktif', '0000-00-00'),
('KOP00015', 'MIKROLAND', '28/180.08/BH/XIV.34/XI/2013', '2013-11-25', 'JL.RM HADI SOEBENO SOSROWARDOJO KM.6 RUKO TAMAN NIAGA B-6', 'L070', 'K007', '085642841942', 'BK01', 'BASUKI UTOMO', '', '0', 25, 'Aktif', '0000-00-00'),
('KOP00016', 'MELATI SUKSES', '6/180.08/BH/XIV.34/II/2012', '2012-02-20', 'Jatisari Indah DDI RT.5 RW.7', 'L065', 'K007', '081390252533', 'BK01', 'Pipik Widyawati', '', '0', 24, 'Aktif', '0000-00-00'),
('KOP00017', 'DNSJF', '024/180.08/BH/XIV.34/X/2014', '2014-05-06', 'SMAN 13 SMG, JL. ROWO SEMANDING RT.02/RW.10', 'L003', 'K001', '0247711024', 'BK02', 'SUYANTO', '', '0', 25, 'Aktif', '0000-00-00'),
('KOP00018', 'AL HIDAYAH UTAMA', '14/180.08/BH/XIV.34/VII/2013', '2013-08-14', 'DK.PONDOK', 'L081', 'K008', '081901139096', 'BK01', 'CHURIJAH G', '', '0', 20, 'Aktif', '0000-00-00'),
('KOP-0020', 'HFSJ', '67523tgegfkj', '2015-02-03', 'asgjdf', 'L100', 'K010', '6534', 'BK01', 'fhsgdfh', 'dsjgf', 'dgf', 67, 'Aktif', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `kd_kecamatan` char(4) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kd_kecamatan`, `nama_kecamatan`) VALUES
('K001', 'BANYUMANIK'),
('K002', 'CANDISARI'),
('K003', 'GAJAHMUNGKUR'),
('K004', 'GAYAMSARI'),
('K005', 'GENUK'),
('K006', 'GUNUNGPATI'),
('K007', 'MIJEN'),
('K008', 'NGALIYAN'),
('K009', 'PEDURUNGAN'),
('K010', 'SEMARANG BARAT'),
('K011', 'SEMARANG SELATAN'),
('K012', 'SEMARANG TENGAH'),
('K013', 'SEMARANG TIMUR'),
('K014', 'SEMARANG UTARA'),
('K015', 'TEMBALANG'),
('K016', 'TUGU');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
  `kd_kelurahan` char(4) NOT NULL,
  `nama_kelurahan` varchar(20) NOT NULL,
  `kd_kec` char(4) NOT NULL,
  PRIMARY KEY (`kd_kelurahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`kd_kelurahan`, `nama_kelurahan`, `kd_kec`) VALUES
('L001', 'PUDAK PAYUNG', 'K001'),
('L002', 'GEDAWANG', 'K001'),
('L003', 'JABUNGAN', 'K001'),
('L004', 'PADANGSARI', 'K001'),
('L005', 'BANYUMANIK', 'K001'),
('L006', 'SRONDOL WETAN', 'K001'),
('L007', 'PEDALANGAN', 'K001'),
('L008', 'SUMUBROTO', 'K001'),
('L009', 'SRONDOL KULON', 'K001'),
('L010', 'TINJOMULYO', 'K001'),
('L011', 'NGESREP', 'K001'),
('L012', 'CANDI', 'K002'),
('L013', 'JATI NGALEH', 'K002'),
('L014', 'JOMBLANG', 'K002'),
('L015', 'KALIWIRU', 'K002'),
('L016', 'KARANG ANYAR', 'K002'),
('L017', 'TEGAL SARI', 'K002'),
('L018', 'WONOTINGAL', 'K002'),
('L019', 'BENDAN DUWUR', 'K003'),
('L020', 'BENDAN NGISOR', 'K003'),
('L021', 'BENDUNGAN', 'K003'),
('L022', 'GAJAHMUNGKUR', 'K003'),
('L023', 'KARANGREJO', 'K003'),
('L024', 'LEMPONGSARI', 'K003'),
('L025', 'PETOMPON', 'K003'),
('L026', 'SAMPANGAN', 'K003'),
('L027', 'GAYAM SARI', 'K004'),
('L028', 'KALIGAWE', 'K004'),
('L029', 'PANDEAN LAMPER', 'K004'),
('L030', 'SAMBIREJO', 'K004'),
('L031', 'SAWAH BESAR', 'K004'),
('L032', 'SIWALAN', 'K004'),
('L033', 'TAMBAK REJO', 'K004'),
('L034', 'BANGETAYU KULON', 'K005'),
('L035', 'BANGETAYU WETAN', 'K005'),
('L036', 'BANJAR DOWO', 'K005'),
('L037', 'GEBANGSARI', 'K005'),
('L038', 'GENUKSAN', 'K005'),
('L039', 'KARANGROTO', 'K005'),
('L040', 'KUDU', 'K005'),
('L041', 'MUKTIHARJO LOR', 'K005'),
('L042', 'PENGGARON LOR', 'K005'),
('L043', 'SEMBUNG HARJO', 'K005'),
('L044', 'TERBOYO KULON', 'K005'),
('L045', 'TERBOYO WETAN', 'K005'),
('L046', 'TRIMULYO', 'K005'),
('L047', 'CEPOKO', 'K006'),
('L048', 'GUNUNGPATI', 'K006'),
('L049', 'JATIREJO', 'K006'),
('L050', 'KALISEGORO', 'K006'),
('L051', 'KANDRI', 'K006'),
('L052', 'MANGUNSARI', 'K006'),
('L053', 'NGIJO', 'K006'),
('L054', 'NGONGKOSAWIT', 'K006'),
('L055', 'PAKINTELAN', 'K006'),
('L056', 'PATEMON', 'K006'),
('L057', 'PLALANGAN', 'K006'),
('L058', 'PONGANGAN', 'K006'),
('L059', 'SADENG', 'K006'),
('L060', 'SEKARAN', 'K006'),
('L061', 'SUKOREJO', 'K006'),
('L062', 'SUMUREJO', 'K006'),
('L063', 'BUBAKAN', 'K007'),
('L064', 'CANGKIRAN', 'K007'),
('L065', 'JATISARI', 'K007'),
('L066', 'KARANGMALANG', 'K007'),
('L067', 'KEDUNGPANI', 'K007'),
('L068', 'MIJEN', 'K007'),
('L069', 'NGADIRGO', 'K007'),
('L070', 'PESANTREN', 'K007'),
('L071', 'POLAMAN', 'K007'),
('L072', 'PURWOSARI', 'K007'),
('L073', 'TAMBANGAN', 'K007'),
('L074', 'WONOLOPO', 'K007'),
('L075', 'WONOPLUMBON', 'K007'),
('L076', 'BAMBANKEREP', 'K008'),
('L077', 'BERINGIN', 'K008'),
('L078', 'GONDORIYO', 'K008'),
('L079', 'KALIPANCUR', 'K008'),
('L080', 'NGALIYAN', 'K008'),
('L081', 'PODOREJO', 'K008'),
('L082', 'PURWOYOSO', 'K008'),
('L083', 'TAMBAK AJI', 'K008'),
('L084', 'WONOSARI', 'K008'),
('L085', 'GEMAH', 'K009'),
('L086', 'KALICAN', 'K009'),
('L087', 'MUKTIHARJO KIDUL', 'K009'),
('L088', 'PALEBON', 'K009'),
('L089', 'PEDURUNGAN KIDUL', 'K009'),
('L090', 'PEDURUNGAN LOR', 'K009'),
('L091', 'PEDURUNGAN TENGAH', 'K009'),
('L092', 'PLAMONGAN SARI', 'K009'),
('L093', 'TLOGOMULYO', 'K009'),
('L094', 'TLOGOSARI WETAN', 'K009'),
('L095', 'TLOGOSARI KULON', 'K009'),
('L096', 'BOJONG SALAM', 'K010'),
('L097', 'BONGSARI', 'K010'),
('L098', 'CABEAN', 'K010'),
('L099', 'GISIKDRONO', 'K010'),
('L100', 'KALIBANTENG', 'K010'),
('L101', 'KALIBANTENG KULON', 'K010'),
('L102', 'KARANG AYU', 'K010'),
('L103', 'KEMBANGARUM', 'K010'),
('L104', 'KRAPYAK', 'K010'),
('L105', 'KROBOKAN', 'K010'),
('L106', 'MANYARAN', 'K010'),
('L107', 'NGEMPLAKSIMONGAN', 'K010'),
('L108', 'SALAMANMLOYO', 'K010'),
('L109', 'TAMBAKHARJO', 'K010'),
('L110', 'TAWANGMAS', 'K010'),
('L111', 'TAWANGSARI', 'K010'),
('L112', 'BARUSARI', 'K011'),
('L113', 'BULUSTALAN', 'K011'),
('L114', 'LAMPER KIDUL', 'K011'),
('L115', 'LAMPER LOR', 'K011'),
('L116', 'LAMPER TENGAH', 'K011'),
('L117', 'MUGASSARI', 'K011'),
('L118', 'PETERONGAN', 'K011'),
('L119', 'PELEBURAN', 'K011'),
('L120', 'RANDUSARI', 'K011'),
('L121', 'WONODRI', 'K011'),
('L122', 'BANGUNHARJO', 'K012'),
('L123', 'BRUMBUNGAN', 'K012'),
('L124', 'GABAHAN', 'K012'),
('L125', 'JAGALAN', 'K012'),
('L126', 'KARANGKIDUL', 'K012'),
('L127', 'KAUMAN', 'K012'),
('L128', 'KEMBANGSARI', 'K012'),
('L129', 'KRANGGAN', 'K012'),
('L130', 'MIROTO', 'K012'),
('L131', 'PANDANSARI', 'K012'),
('L132', 'PEKUNDEN', 'K012'),
('L133', 'PENDRIKAN KIDUL', 'K012'),
('L134', 'PENDRIKAN LOR', 'K012'),
('L135', 'PURWODINATAN', 'K012'),
('L136', 'SEKAYU', 'K012'),
('L137', 'BUNGANGAN', 'K013'),
('L138', 'KARANGTEMPEL', 'K013'),
('L139', 'KARANGTURI', 'K013'),
('L140', 'KEBONAGUNG', 'K013'),
('L141', 'KEMIJEN', 'K013'),
('L142', 'MLATIBARU', 'K013'),
('L143', 'MLATIHARJO', 'K013'),
('L144', 'REJOMULYO', 'K013'),
('L145', 'REJOSARI', 'K013'),
('L146', 'SARIREJO', 'K013'),
('L147', 'BANDANHARJO', 'K013'),
('L148', 'BULU LOR', 'K014'),
('L149', 'DADAPSARI', 'K014'),
('L150', 'KUNINGAN', 'K014'),
('L151', 'PANGGUNG KIDUL', 'K014'),
('L152', 'PANGGUNG LOR', 'K014'),
('L153', 'PLOMBOKAN', 'K014'),
('L154', 'PURWOSARI', 'K014'),
('L155', 'TANJUNGMAS', 'K014'),
('L156', 'BULUSAN', 'K015'),
('L157', 'JANGLI', 'K015'),
('L158', 'KEDUNGMUNDU', 'K015'),
('L159', 'KRAMAS', 'K015'),
('L160', 'MANGUNHARJO', 'K015'),
('L161', 'METESEH', 'K015'),
('L162', 'ROWOSARI', 'K015'),
('L163', 'SAMBIROTO', 'K015'),
('L164', 'SENDANGGUWO', 'K015'),
('L165', 'SENDANGMULYO', 'K015'),
('L166', 'TANDANG', 'K015'),
('L167', 'TEMBALANG', 'K015'),
('L168', 'JERAKAN', 'K016'),
('L169', 'KARANGANYAR', 'K016'),
('L170', 'MANGKANG KULON', 'K016'),
('L171', 'MANGKANGKULON', 'K016'),
('L172', 'MANGUNHARJO', 'K016'),
('L173', 'RANDU GARUT', 'K016'),
('L174', 'TUGUREJO', 'K016'),
('L176', 'PUDAK', 'K001');

-- --------------------------------------------------------

--
-- Table structure for table `kesalahan_fatal`
--

CREATE TABLE IF NOT EXISTS `kesalahan_fatal` (
  `id_penilaian` char(10) NOT NULL,
  `perselisihan_intern` char(5) NOT NULL,
  `campur_tangan_phk_luar` char(5) NOT NULL,
  `rekayasa_pembukuan` char(5) NOT NULL,
  `tanpa_pembukuan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kesalahan_fatal`
--

INSERT INTO `kesalahan_fatal` (`id_penilaian`, `perselisihan_intern`, `campur_tangan_phk_luar`, `rekayasa_pembukuan`, `tanpa_pembukuan`) VALUES
('SKR0000001', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK'),
('SKR0000002', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK'),
('SKR0000003', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK'),
('SKR0000004', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK'),
('SKR0000005', 'YA', 'YA', 'YA', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `koreksi_penilaian`
--

CREATE TABLE IF NOT EXISTS `koreksi_penilaian` (
  `id_penilaian` char(10) NOT NULL,
  `planggaran_intern` char(5) NOT NULL,
  `salah_pembukuan` char(5) NOT NULL,
  `pem_pinj_tdk_sesuai` char(5) NOT NULL,
  `tdk_meny_lap_berkala` char(5) NOT NULL,
  `vol_pinj` char(5) NOT NULL,
  `man_usp_blm_diberikan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koreksi_penilaian`
--

INSERT INTO `koreksi_penilaian` (`id_penilaian`, `planggaran_intern`, `salah_pembukuan`, `pem_pinj_tdk_sesuai`, `tdk_meny_lap_berkala`, `vol_pinj`, `man_usp_blm_diberikan`) VALUES
('SKR0000001', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK'),
('SKR0000002', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK'),
('SKR0000003', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK'),
('SKR0000004', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK'),
('SKR0000005', 'TIDAK', 'YA', 'YA', 'YA', 'YA', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `penilai`
--

CREATE TABLE IF NOT EXISTS `penilai` (
  `nip` char(15) NOT NULL,
  `nama_penilai` char(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `ukuran` int(12) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilai`
--

INSERT INTO `penilai` (`nip`, `nama_penilai`, `username`, `password`, `photo`, `ukuran`, `type`) VALUES
('2.008', 'Nur Saidah', 'nursaidah', 'e86b36635d1427eaa02dd1d71b6f275a', '', 0, ''),
('a5317', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '233844-tikj.jpg', 320783, 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id_penilaian` char(10) NOT NULL,
  `no_penilaian` char(5) NOT NULL,
  `thbuku` varchar(4) NOT NULL,
  `kd_koperasi` varchar(8) NOT NULL,
  `score` decimal(4,2) NOT NULL,
  `terbilang` text NOT NULL,
  `tanggal_penilaian` date NOT NULL,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id_penilaian`, `no_penilaian`, `thbuku`, `kd_koperasi`, `score`, `terbilang`, `tanggal_penilaian`) VALUES
('SKR0000001', '001', '2013', 'KOP00004', '70.30', 'Tujuh Puluh Koma Tiga Puluh', '2014-09-24'),
('SKR0000002', '003', '2013', 'KOP00011', '70.30', 'Tujuh Puluh Koma Tiga Puluh', '2014-09-24'),
('SKR0000003', '003', '2013', 'KOP00009', '70.55', 'Tujuh Puluh Koma Lima Puluh Lima', '2014-09-24'),
('SKR0000004', '001', '2013', 'KOP00005', '70.30', 'Tujuh Puluh Koma Tiga Puluh', '2014-12-06'),
('SKR0000005', '001', '2013', 'KOP00011', '70.30', 'Tujuh Puluh Koma Tiga Puluh', '2014-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `skor`
--

CREATE TABLE IF NOT EXISTS `skor` (
  `kd_penilaian` char(7) NOT NULL,
  `no_penilaian` char(3) NOT NULL,
  `kd_koperasi` char(8) NOT NULL,
  `bentuk_koperasi` varchar(4) NOT NULL,
  `kecamatan` varchar(40) NOT NULL,
  `th_buku` int(4) NOT NULL,
  `tgl_sekarang` date NOT NULL,
  `skor` decimal(5,2) NOT NULL,
  `terbilang` varchar(80) NOT NULL,
  `predikat` varchar(30) NOT NULL,
  `kd_penilai` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_penilaian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skor`
--

INSERT INTO `skor` (`kd_penilaian`, `no_penilaian`, `kd_koperasi`, `bentuk_koperasi`, `kecamatan`, `th_buku`, `tgl_sekarang`, `skor`, `terbilang`, `predikat`, `kd_penilai`) VALUES
('SKR0001', '001', 'KOP00005', 'KSP', 'NGALIYAN', 2013, '2014-12-23', '80.10', 'Delapan Puluh Koma Sepuluh', 'SEHAT', 'a5317'),
('SKR0002', '002', 'KOP00004', 'KSP', 'BANYUMANIK', 2013, '2014-12-23', '75.80', 'Tujuh Puluh Lima Koma Delapan Puluh', 'CUKUP SEHAT', 'a5317'),
('SKR0003', '003', 'KOP00005', 'KSP', 'NGALIYAN', 2013, '2014-12-23', '50.25', 'Lima Puluh Koma Dua Puluh Lima', 'KURANG SEHAT', 'a5317'),
('SKR0004', '004', 'KOP00006', 'KSP', 'SEMARANG BARAT', 2013, '2014-12-23', '90.00', 'Sembilan Puluh Koma Nol Nol', 'SEHAT', 'a5317'),
('SKR0005', '005', 'KOP00018', 'KSP', 'NGALIYAN', 2013, '2014-12-23', '60.35', 'Enam Puluh Koma Tiga Puluh Lima', 'CUKUP SEHAT', 'a5317'),
('SKR0006', '006', 'KOP00016', 'KSP', 'MIJEN', 2013, '2014-12-23', '80.50', 'Delapan Puluh Koma Lima Puluh', 'SEHAT', 'a5317'),
('SKR0007', '007', 'KOP00013', 'KSP', 'MIJEN', 2014, '2015-01-02', '80.00', 'Delapan Puluh Koma Nol Nol', 'CUKUP SEHAT', 'a5317'),
('SKR0008', '008', 'KOP00004', 'KSP', 'BANYUMANIK', 2017, '2018-04-10', '999.99', 'Seribu', 'SEHAT', 'a5317'),
('SKR0009', '009', 'KOP00004', 'KSP', 'BANYUMANIK', 2017, '2018-04-10', '100.00', 'Seratus', 'SEHAT', 'a5317');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
