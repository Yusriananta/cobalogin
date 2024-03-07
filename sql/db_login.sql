-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 07:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart_data`
--

CREATE TABLE `chart_data` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_data`
--

INSERT INTO `chart_data` (`id`, `label`, `value`) VALUES
(1, 'Category A', 25),
(2, 'Category B', 40),
(3, 'Category C', 30),
(4, 'Category D', 15);

-- --------------------------------------------------------

--
-- Table structure for table `nama_bulan`
--

CREATE TABLE `nama_bulan` (
  `id` int(11) NOT NULL,
  `nama_bulan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nama_bulan`
--

INSERT INTO `nama_bulan` (`id`, `nama_bulan`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `pelaksanaan`
--

CREATE TABLE `pelaksanaan` (
  `id` int(11) NOT NULL,
  `id_unit` int(12) NOT NULL,
  `change_agent` varchar(128) NOT NULL,
  `pemimpin` varchar(128) NOT NULL,
  `kegiatan_budaya` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `poin` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `image_q1` varchar(128) NOT NULL,
  `image_q2` varchar(128) NOT NULL,
  `image_q3` varchar(128) NOT NULL,
  `evidence1` varchar(128) NOT NULL,
  `evidence2` varchar(128) NOT NULL,
  `evidence3` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelaksanaan`
--

INSERT INTO `pelaksanaan` (`id`, `id_unit`, `change_agent`, `pemimpin`, `kegiatan_budaya`, `deskripsi`, `tanggal`, `poin`, `q1`, `q2`, `q3`, `image_q1`, `image_q2`, `image_q3`, `evidence1`, `evidence2`, `evidence3`) VALUES
(8, 5, 'dani', 'andi', 'berkebun', 'menanam pohon-pohon', '2024-01-20', 35, 40, 15, 10, '0', '0', '0', '0', '0', '0'),
(9, 5, 'Yusri', 'andi', 'healing', 'menyelam ', '2024-02-15', 35, 40, 15, 0, 'logoweb.png', '1-hiace-commuter-white.png', '', 'logo-kab.tegal.png', 'f2384503-d621-4024-beb8-fc447b8e81f2.jpg', ''),
(11, 5, 'abdul', 'Ahmad', 'berkebun', 'tanam-tanam ubi', '2024-02-19', 35, 40, 15, 0, 'istockphoto-1271192418-612x612.webp', 'kartun1.jpg', '', '', '', ''),
(12, 3, 'abdul', 'andi', 'mancing mania', 'mancing ikan tongkol', '2024-01-14', 35, 40, 15, 10, 'Screenshot_(9)1.png', 'Screenshot_(2)1.png', 'Screenshot_(4)1.png', 'Screenshot_(6)1.png', 'Screenshot_(6)1.png', 'Screenshot_(12)1.png'),
(13, 5, 'Andi', 'Edi', '5R', 'bersih Bersih', '2024-01-25', 35, 40, 15, 10, 'Screenshot_(32).png', 'Screenshot_(31).png', 'Screenshot_(30).png', 'Screenshot_(45).png', 'Screenshot_(32)1.png', 'Screenshot_(13).png'),
(14, 5, 'dani', 'ahmad', 'Ngoding', 'ngoding asik', '2024-02-12', 35, 40, 15, 10, '', '', '', '', '', ''),
(15, 5, 'dono', 'Edi', 'cek cek cek', 'cek approval', '2024-02-13', 35, 0, 15, 10, '', '', '', '', '', ''),
(16, 5, 'abdul', 'Edi', 'Ngoding', 'Duplikasi CMS', '2024-02-13', 35, 40, 15, 10, 'Screenshot_(51).png', 'Screenshot_(52).png', 'Screenshot_(59).png', 'Screenshot_(15).png', 'Screenshot_(61).png', 'Screenshot_(61).png'),
(17, 7, 'Siti Annisa', 'Pemimpin', 'Seminar Kesehatan', 'Seminar Kesehatan dengan 2 narasumber dan 50  peserta ', '2024-02-13', 35, 40, 15, 10, '', '', '', 'WhatsApp_Image_2024-02-13_at_14_57_04_f3cf94ff.jpg', 'WhatsApp_Image_2024-02-13_at_14_57_04_f3cf94ff.jpg', 'WhatsApp_Image_2024-02-13_at_14_57_04_f3cf94ff.jpg'),
(18, 5, 'dono', 'dani', 'cek evidence', 'bug 3 foto evidence', '2024-02-13', 35, 40, 0, 0, 'Screenshot_(26).png', 'Screenshot_(26).png', 'Screenshot_(26).png', 'Screenshot_(41).png', 'Screenshot_(41).png', 'Screenshot_(41).png'),
(19, 5, 'fghdfh', 'dfhdhdh', 'dfhdfhd', 'dbhjhkfgg', '2024-02-13', 35, 40, 0, 10, 'Screenshot_20230219_214111.png', 'Screenshot_(12)2.png', 'Screenshot_(12)2.png', 'Screenshot_(12)2.png', 'Screenshot_(60).png', 'Screenshot_(60).png'),
(20, 5, 'iubyubtf', ',okijnn iihh', 'tuhlihbg unoijjk', ' hugiuy iuehshxxjhb ', '2024-02-13', 35, 40, 0, 0, '', '', '', '', '', ''),
(21, 5, 'Yusri', 'Ahmad', 'kabsajbca', 'savdsvdfbbd', '2024-02-29', 35, 40, 15, 10, '', '', '', '', '', ''),
(22, 4, 'Yusri', 'ananta', 'bug gambar', 'cari bug upload gambar evidence', '2024-03-04', 35, 40, 0, 0, 'K3.png', 'K3.png', 'K3.png', 'LogoAKHLAK.png', 'LogoAKHLAK.png', 'LogoAKHLAK.png');

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

CREATE TABLE `planning` (
  `id` int(11) NOT NULL,
  `id_unit` int(12) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `deskripsi` varchar(1500) NOT NULL,
  `approvel` int(128) NOT NULL,
  `mandatori` int(11) NOT NULL,
  `terlaksana` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planning`
--

INSERT INTO `planning` (`id`, `id_unit`, `kegiatan`, `deskripsi`, `approvel`, `mandatori`, `terlaksana`, `tanggal`, `end`) VALUES
(27, 3, 'RRRRR 5', '', 1, 0, 0, '2024-01-01', '2024-02-29'),
(28, 3, 'berlari lari 2svdv', 'kocak sekali 3452', 1, 0, 1, '2024-02-09', '2024-02-29'),
(29, 0, 'ngoding', 'memuat aplikasi', 1, 1, 0, '2024-01-30', '2024-01-31'),
(38, 0, 'ngoding', 'ngoding asik', 1, 1, 0, '2024-02-06', '2024-02-29'),
(39, 5, 'membuat tanggal berakhir 2', 'mengatur rentang pelaksanaan', 1, 0, 0, '2024-02-07', '2024-02-29'),
(41, 0, 'Ngoding lagi', 'Membuat Aplikasi Digital Library', 1, 1, 0, '2024-02-13', '0000-00-00'),
(42, 7, 'Seminar Kesehatan', 'Seminar Kesehatan tentang Kenali Faktor Risiko TBC, HIV/AIDS & Pencegahannya', 1, 0, 0, '2024-02-13', '2024-02-29'),
(43, 5, 'turu', 'knfdbdb', 1, 0, 0, '2024-02-29', '2024-02-29'),
(44, 4, 'cek upload gambar 123', 'cari bug upload gambar evidence', 1, 0, 0, '2024-03-04', '2024-03-31'),
(45, 0, 'madatori maret 123', 'coaba data mandatori maret 123', 1, 1, 0, '2024-03-04', '0000-00-00'),
(46, 4, 'cek pending 123', 'cek fitur edit planning', 0, 0, 0, '2024-03-04', '2024-03-31'),
(47, 5, 'cek aproval', 'asygafgaugcsdgcaregff', 1, 0, 0, '2024-03-07', '2024-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` int(11) NOT NULL,
  `unit` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `unit`) VALUES
(1, '	Unit of Communication and CSR'),
(2, 'Unit of Internal Audit'),
(3, 'Unit of Legal and GRC'),
(4, 'Unit of Security'),
(5, 'Unit of Human Capital and General Affairs'),
(6, 'Unit of SMSG'),
(7, 'Unit of Accounting and Finance'),
(8, 'Unit of Production Support'),
(9, 'Unit of Production Plan and Control'),
(10, 'Unit of Maintenance Plan and Control'),
(12, 'Unit of Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_unit` int(12) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `id_unit`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(11, 'Admin Cobalogin', 'cobalogin1311@gmail.com', 1, 'foto.jpg', '$2y$10$IDfsl41kR9cmx44zYDqsEOh4IMy/cpzpeVqw1rjmdioQK5dbOekae', 1, 1, 1702428812),
(23, 'Yusri Ananta Syarif', 'yusrisirohito@gmail.com', 5, 'FB_IMG_16561655503055413.jpg', '$2y$10$p6sE/KfMsJyhHt7SRLqdjeOHAqs8cIx9c5wvbHoA2uyVuz9/tV77.', 2, 1, 1705047067),
(26, 'Ahmad', 'kocak@gmail.com', 3, 'default.jpg', '$2y$10$eBCyoAmaxiB6nqiRqXvVqeTQJTfMk4Yb7E6lzCspwXMr56JM5zNAO', 2, 0, 1706057997),
(27, 'Syafira', 'syafira@gmail.com', 7, 'default.jpg', '$2y$10$p6sE/KfMsJyhHt7SRLqdjeOHAqs8cIx9c5wvbHoA2uyVuz9/tV77.', 2, 1, 1706148432),
(28, 'Ananta', 'ananta@gmail.com', 4, 'default.jpg', '$2y$10$ne5ry1uu.6w16MxwpMdDFuG6ODnn7rPFXs.wQRLbcBvQlIvdZIt9S', 2, 1, 1706688296),
(29, 'Sandy', 'sandi@gmail.com', 5, 'default.jpg', '$2y$10$jRo.bo4d9irNJGyslaDcNeXvVWGMiWw.jR6Zc3XzLmN6xLyzYxIIW', 2, 1, 1706841203),
(30, 'Human capital Semen Gresik', 'hcsg@sig.id', 5, 'Logo_Semen_Gresik.png', '$2y$10$VjJkRFOKLy/86uKLoBtQCOV575/3T..lHhrW3IuCWgr7tVuU6XfwC', 2, 1, 1707278000),
(31, 'Siti Annisa', 'ica@gmail.com', 7, 'default.jpg', '$2y$10$XEDK6OEsiKZ0CLgL6fiZbe8UrteAv8H3SpPyTtmNSNu0hLSPfagoS', 2, 1, 1707810273);

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
(2, 2, 2),
(3, 1, 2),
(4, 1, 4),
(5, 1, 3),
(6, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Program'),
(4, 'Menu'),
(5, 'Pelaporan');

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
(1, 'Administrator'),
(2, 'Member');

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
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user-tie', 1),
(3, 2, 'Edit Profile', 'user/editProfile', 'fas fa-fw fa-user-edit', 1),
(4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-tasks', 1),
(5, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 3, 'Program Budaya', 'program', 'fas fa-fw fa-list-ul', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Daftar Unit Kerja Change Agent', 'admin/user_list', 'fas fa-fw fa-users', 1),
(11, 5, 'Input Action Plan', 'user/planning', 'fas fa-fw fa-lightbulb', 1),
(12, 5, 'Pelaksanaan Program', 'laporan', 'fas fa-fw fa-hand-holding', 1),
(13, 5, 'Laporan Pelaksanaan', 'laporan/laporan_pelaksanaan', 'fas fa-fw fa-clipboard-check', 1),
(14, 5, 'Grafik Bulanan', 'laporan/grafik_user', 'far fa-fw fa-chart-bar', 1),
(15, 3, 'Laporan Pelaksanaan', 'program/laporan_pelaksanaan', 'fas fa-fw fa-file-upload', 1),
(16, 3, 'Rekap Nilai Action Plan', 'program/rekap_nilai', 'fas fa-fw fa-medal', 1),
(17, 3, 'Grafik Kegiatan', 'program/grafik', 'far fa-fw fa-chart-bar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'kmsg.presenter2@sig.id', 'Ou2AhuoT9VwXaPaMNHt8XRk9wrI=', 1705284646),
(2, 'syarif@gmail.com', 'qfJ08rVKMDV3Ah9oSo8SFPrh4rg=', 1705903663),
(3, 'admin@coba.com', 'NTPr/tiUMoUdO5+u/whVNDXc21w=', 1705998543);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart_data`
--
ALTER TABLE `chart_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nama_bulan`
--
ALTER TABLE `nama_bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelaksanaan`
--
ALTER TABLE `pelaksanaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `chart_data`
--
ALTER TABLE `chart_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nama_bulan`
--
ALTER TABLE `nama_bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelaksanaan`
--
ALTER TABLE `pelaksanaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
