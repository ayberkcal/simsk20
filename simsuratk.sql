-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 10:15 AM
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
-- Database: `simsuratk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `no_regist` varchar(6) NOT NULL,
  `kode_layanan` varchar(4) NOT NULL,
  `id_field` int(11) NOT NULL,
  `data` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`no_regist`, `kode_layanan`, `id_field`, `data`) VALUES
('S0001', 'L001', 1, 'Erm'),
('S0001', 'L001', 2, '31083018308080'),
('S0001', 'L001', 3, 'Pembina'),
('S0001', 'L001', 4, 'IV'),
('S0001', 'L001', 5, 'Pendataan'),
('S0001', 'L001', 6, 'Badan Pusat Statistik'),
('S0003', 'L003', 18, '2');

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
('S0001', 'L001', 1, 'S0001_1.pdf', 1),
('S0001', 'L001', 3, 'S0001_2.jpg', 1),
('S0002', 'L002', 1, 'S0002_1.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_tendik`
--

CREATE TABLE `dosen_tendik` (
  `id_user` varchar(20) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `sub_bagian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_tendik`
--

INSERT INTO `dosen_tendik` (`id_user`, `pangkat`, `golongan`, `jabatan`, `sub_bagian`) VALUES
('196205011983032002', 'Penata Tk.I', 'III.d', 'Kasubag Akademik dan Kemahasiswaan', NULL),
('D0001', 'Pembina', 'IVA', 'WD I', NULL),
('TP001', 'P', 'IIIb', 'Tata Usaha', 'A & K');

-- --------------------------------------------------------

--
-- Table structure for table `example`
--

CREATE TABLE `example` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `example`
--

INSERT INTO `example` (`id`, `created_at`, `updated_at`, `name`, `description`, `status_id`) VALUES
(1, NULL, NULL, 'Sit id earum assumenda.', 'Dolorem animi at nihil qui officia eum eligendi. In qui id quos rerum quod. Odit corrupti quibusdam ullam ut perspiciatis consectetur. Blanditiis necessitatibus quia iusto et molestiae nobis. Autem explicabo et ducimus.', 3),
(2, NULL, NULL, 'Ducimus voluptas commodi qui.', 'Explicabo odio quia qui culpa. Rem aut ratione mollitia enim ducimus molestias dolores. Quas repellat dignissimos commodi consequuntur a in ratione.', 3),
(3, NULL, NULL, 'At ab hic libero dolores.', 'Deserunt inventore perspiciatis illo ut molestiae fugiat. Numquam nesciunt facere velit voluptas voluptate a. Sequi aut placeat odio non et magnam distinctio.', 1),
(4, NULL, NULL, 'Aut rerum culpa.', 'Aspernatur sapiente ducimus voluptatibus nam. Eaque velit corporis repudiandae optio. Minus vel minus non maiores. Corrupti et adipisci nisi sapiente nesciunt officia.', 2),
(5, NULL, NULL, 'Nostrum provident excepturi eum.', 'Laudantium sed sit reiciendis ducimus ea odit. Tenetur repudiandae nobis voluptatem ipsam. Similique consectetur repellat eius sed enim exercitationem.', 3),
(6, NULL, NULL, 'Fugiat sint consequatur nulla sint.', 'Vitae aspernatur hic neque quasi. Dolor quod accusamus repellendus voluptatem ab qui.', 1),
(7, NULL, NULL, 'Quia illum quae cumque unde.', 'Qui aut dolorem fugiat similique dignissimos qui. Dolorem culpa et molestiae dicta eos omnis magni. Ipsum autem delectus voluptatem est. Facilis voluptas id consequuntur.', 2),
(8, NULL, NULL, 'Perspiciatis enim culpa qui ea.', 'Molestiae error id culpa. Voluptate in mollitia ut sit perferendis rerum eius. Enim fugit nam ipsa nulla sit ea. Vero similique explicabo fuga est.', 2),
(9, NULL, NULL, 'Nisi amet dolores voluptatem beatae illum.', 'Repudiandae debitis nisi aut et voluptatem. Assumenda voluptatem sint officia hic.', 1),
(10, NULL, NULL, 'Quisquam autem laudantium dolorem.', 'Rerum et cum nisi perferendis quos autem. Reiciendis dolore exercitationem dolore temporibus temporibus blanditiis. Nihil id quia consectetur sit aut ducimus laborum.', 3),
(11, NULL, NULL, 'Error ab qui repudiandae velit.', 'Architecto doloremque quis qui veritatis vel at vel nesciunt. Praesentium tenetur non fuga enim. Ut qui iure aut reprehenderit aut nesciunt fuga. Est alias ab vitae nihil quae ut facere.', 1),
(12, NULL, NULL, 'Mollitia excepturi voluptatum.', 'Eum corporis rerum voluptatem ipsam dolor et. Maxime dolore commodi officia ut et laboriosam sint. Consectetur perspiciatis fugit beatae accusamus placeat.', 1),
(13, NULL, NULL, 'Neque iusto nihil non perferendis amet.', 'Et eum molestiae voluptas. Voluptatum ipsa natus tempore. Repellat consectetur voluptas dolor voluptatem eos dolore iure optio. Accusantium ut autem voluptas illum.', 2),
(14, NULL, NULL, 'Rerum non porro voluptatum aut molestiae.', 'Aut quas consectetur deserunt beatae. Et repellendus est ut esse. Molestiae architecto quidem accusamus aut cumque nihil eius. Et officia sit quia omnis ab.', 2),
(15, NULL, NULL, 'Qui repellendus qui velit debitis.', 'Et dolorem eos sequi delectus velit fugit repellat. Aspernatur rerum similique voluptatum sed hic sapiente.', 1),
(16, NULL, NULL, 'Veritatis repellat dicta beatae voluptas asperiores.', 'Neque est tempore distinctio et. At recusandae maiores autem neque omnis. Officiis aut cupiditate autem est deleniti reiciendis qui. Voluptatem vitae veniam fugit. Cum dolorem assumenda sed veniam suscipit eum sint.', 1),
(17, NULL, NULL, 'Aut est et.', 'Nisi magni ipsum molestias ab et est. Earum vero molestias sed quibusdam velit. Optio ducimus doloribus nulla nulla.', 3),
(18, NULL, NULL, 'Voluptas iste voluptatibus.', 'Ut omnis voluptatem qui ipsum ut voluptates. Eaque modi quo non. Adipisci quasi nesciunt rerum et rerum. Voluptas omnis dolorem aut aut aut iure neque.', 1),
(19, NULL, NULL, 'Est facilis tenetur illum.', 'Aliquam est amet ab ut consequuntur aspernatur. Illum necessitatibus unde nisi quaerat accusantium tenetur. Nisi dolore consequatur voluptas repellendus et occaecati accusamus. Quo qui quas adipisci consequatur qui sed.', 2),
(20, NULL, NULL, 'Eos voluptas et.', 'Recusandae enim facere dignissimos consequatur ut necessitatibus. Pariatur sint repellat reprehenderit provident. Magnam aspernatur non nobis. Sed numquam et harum eos autem qui eos ipsam.', 3),
(21, NULL, NULL, 'Corrupti doloribus sunt beatae.', 'Aut sequi repudiandae commodi quod ullam. Consequatur provident magnam temporibus molestiae repudiandae perferendis laboriosam. Totam est possimus ut. Molestias neque laudantium sit nostrum. Inventore facilis nesciunt non labore eveniet sint.', 3),
(22, NULL, NULL, 'Qui aperiam et ipsa.', 'Optio modi ab sunt nihil et quis. Neque voluptatem nihil quae maiores quo incidunt. Vitae laudantium maiores voluptatem minima.', 4),
(23, NULL, NULL, 'Quos labore ipsa voluptatum.', 'Repudiandae molestiae consequatur iste non neque vel sit. Quisquam voluptate qui voluptate quisquam quasi deserunt. Hic qui fugit magnam ad ipsam ex ex.', 1),
(24, NULL, NULL, 'Debitis omnis voluptatum aut aspernatur animi.', 'Labore praesentium eum autem consequatur. Sunt voluptatem occaecati architecto vero qui.', 2),
(25, NULL, NULL, 'Tempora modi adipisci commodi praesentium.', 'Voluptatum magni velit nam similique rerum dolorem. Similique et non sint sed necessitatibus necessitatibus. Ad blanditiis eveniet et placeat tempora aspernatur exercitationem repellat. Accusamus ratione doloremque soluta.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_field`
--

CREATE TABLE `form_field` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browse` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL,
  `relation_table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_field`
--

INSERT INTO `form_field` (`id`, `created_at`, `updated_at`, `name`, `type`, `browse`, `read`, `edit`, `add`, `relation_table`, `relation_column`, `form_id`, `column_name`) VALUES
(1, NULL, NULL, 'Title', 'text', 1, 1, 1, 1, NULL, NULL, 1, 'name'),
(2, NULL, NULL, 'Description', 'text_area', 1, 1, 1, 1, NULL, NULL, 1, 'description'),
(3, NULL, NULL, 'Status', 'relation_select', 1, 1, 1, 1, 'status', 'name', 1, 'status_id');

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
  `nama_layanan` varchar(100) NOT NULL,
  `template_file` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`kode_layanan`, `kode_sub`, `nama_layanan`, `template_file`) VALUES
('L001', 'KM.00.00', 'Surat Keterangan Aktif Kuliah (Tunjangan Orang Tua, TASPEN, BPJS)', 'L001.docx'),
('L002', 'KM.00.00', 'Surat Keterangan Aktif Kuliah (Beasiswa)', 'L002.docx'),
('L003', 'KP.00', 'test1', 'L003.docx');

-- --------------------------------------------------------

--
-- Table structure for table `menulist`
--

CREATE TABLE `menulist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menulist`
--

INSERT INTO `menulist` (`id`, `name`) VALUES
(1, 'sidebar menu'),
(2, 'top menu');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `href`, `icon`, `slug`, `parent_id`, `menu_id`, `sequence`) VALUES
(1, 'Dashboard', '/dashboard', 'cil-speedometer', 'link', NULL, 1, 1),
(2, 'Settings', NULL, 'cil-calculator', 'dropdown', NULL, 1, 21),
(4, 'Users', '/users', NULL, 'link', 2, 1, 23),
(5, 'Edit menu', '/menu/menu', NULL, 'link', 2, 1, 24),
(6, 'Edit menu elements', '/menu/element', NULL, 'link', 2, 1, 25),
(7, 'Edit roles', '/roles', NULL, 'link', 2, 1, 26),
(11, 'Login', '/login', 'cil-account-logout', 'link', NULL, 1, 30),
(12, 'Register', '/register', 'cil-account-logout', 'link', NULL, 1, 31),
(13, 'General', NULL, NULL, 'title', NULL, 1, 2),
(66, 'Data Master', NULL, 'cil-list', 'dropdown', NULL, 1, 3),
(67, 'Klasifikasi', '/klasifikasi', 'cil-chevron-right', 'link', 66, 1, 4),
(68, 'Syarat', '/syarat', 'cil-chevron-right', 'link', 66, 1, 5),
(69, 'Layanan', '/layanan', 'cil-chevron-right', 'link', 66, 1, 6),
(70, 'Configuration', NULL, NULL, 'title', NULL, 1, 15),
(71, 'Permohonan', '/permohonan', 'cil-envelope-closed', 'link', NULL, 1, 7),
(72, 'Draft Surat', '/draft', 'cil-description', 'link', NULL, 1, 8),
(73, 'Surat Keluar', '/suratkeluar', 'cil-envelope-letter', 'link', NULL, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menus_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`id`, `role_name`, `menus_id`) VALUES
(4, 'admin', 2),
(6, 'admin', 4),
(7, 'admin', 5),
(8, 'admin', 6),
(9, 'admin', 7),
(14, 'guest', 12),
(17, 'user', 14),
(18, 'admin', 14),
(19, 'user', 15),
(20, 'admin', 15),
(21, 'user', 16),
(22, 'admin', 16),
(23, 'user', 17),
(24, 'admin', 17),
(25, 'user', 18),
(26, 'admin', 18),
(27, 'user', 19),
(28, 'admin', 19),
(29, 'user', 20),
(30, 'admin', 20),
(31, 'user', 21),
(32, 'admin', 21),
(33, 'user', 22),
(34, 'admin', 22),
(35, 'user', 23),
(36, 'admin', 23),
(37, 'user', 24),
(38, 'admin', 24),
(39, 'user', 25),
(40, 'admin', 25),
(41, 'user', 26),
(42, 'admin', 26),
(43, 'user', 27),
(44, 'admin', 27),
(45, 'user', 28),
(46, 'admin', 28),
(47, 'user', 29),
(48, 'admin', 29),
(49, 'user', 30),
(50, 'admin', 30),
(51, 'user', 31),
(52, 'admin', 31),
(53, 'user', 32),
(54, 'admin', 32),
(55, 'user', 33),
(56, 'admin', 33),
(57, 'user', 34),
(58, 'admin', 34),
(59, 'user', 35),
(60, 'admin', 35),
(61, 'user', 36),
(62, 'admin', 36),
(63, 'user', 37),
(64, 'admin', 37),
(65, 'user', 38),
(66, 'admin', 38),
(67, 'user', 39),
(68, 'admin', 39),
(69, 'user', 40),
(70, 'admin', 40),
(71, 'user', 41),
(72, 'admin', 41),
(73, 'user', 42),
(74, 'admin', 42),
(75, 'user', 43),
(76, 'admin', 43),
(77, 'user', 44),
(78, 'admin', 44),
(79, 'user', 45),
(80, 'admin', 45),
(81, 'user', 46),
(82, 'admin', 46),
(83, 'user', 47),
(84, 'admin', 47),
(85, 'user', 48),
(86, 'admin', 48),
(87, 'user', 49),
(88, 'admin', 49),
(89, 'user', 50),
(90, 'admin', 50),
(91, 'user', 51),
(92, 'admin', 51),
(93, 'user', 52),
(94, 'admin', 52),
(95, 'user', 53),
(96, 'admin', 53),
(97, 'guest', 54),
(98, 'user', 54),
(99, 'admin', 54),
(100, 'guest', 55),
(101, 'user', 55),
(102, 'admin', 55),
(103, 'guest', 56),
(104, 'user', 56),
(105, 'admin', 56),
(106, 'guest', 57),
(107, 'user', 57),
(108, 'admin', 57),
(109, 'user', 58),
(110, 'admin', 58),
(111, 'admin', 59),
(112, 'admin', 60),
(113, 'admin', 61),
(114, 'admin', 62),
(115, 'admin', 63),
(116, 'admin', 64),
(117, 'admin', 65),
(118, 'admin', 1),
(119, 'user', 1),
(120, 'petugas', 1),
(121, 'admin', 66),
(122, 'admin', 13),
(123, 'user', 13),
(124, 'petugas', 13),
(125, 'admin', 67),
(126, 'admin', 68),
(127, 'admin', 69),
(128, 'admin', 71),
(129, 'user', 71),
(130, 'petugas', 71),
(131, 'admin', 72),
(132, 'civitas akademica', 72),
(133, 'petugas', 72),
(134, 'admin', 73),
(135, 'civitas akademica', 73),
(136, 'petugas', 73),
(137, 'admin', 70),
(142, 'guest', 11);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_11_085455_create_notes_table', 1),
(5, '2019_10_12_115248_create_status_table', 1),
(6, '2019_11_08_102827_create_menus_table', 1),
(7, '2019_11_13_092213_create_menurole_table', 1),
(8, '2019_12_10_092113_create_permission_tables', 1),
(9, '2019_12_11_091036_create_menulist_table', 1),
(10, '2019_12_18_092518_create_role_hierarchy_table', 1),
(11, '2020_01_07_093259_create_folder_table', 1),
(12, '2020_01_08_184500_create_media_table', 1),
(13, '2020_01_21_161241_create_form_field_table', 1),
(14, '2020_01_21_161242_create_form_table', 1),
(15, '2020_01_21_161243_create_example_table', 1),
(16, '2020_03_12_111400_create_email_template_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(2, 'App\\User', 5),
(2, 'App\\User', 6),
(2, 'App\\User', 7),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(2, 'App\\User', 10),
(2, 'App\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applies_to_date` date NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `content`, `note_type`, `applies_to_date`, `users_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Reiciendis veritatis ratione.', 'Quae atque qui optio possimus voluptatum. Vero quia veniam possimus ut voluptatem. Cumque enim quaerat incidunt hic fugit dolores.', 'molestias', '1974-09-27', 4, 4, NULL, NULL),
(2, 'Voluptatibus fuga reiciendis est sunt.', 'Voluptatum quia sed totam voluptas cumque minus saepe. Perspiciatis est sunt fugit.', 'dolore provident', '1975-11-18', 7, 2, NULL, NULL),
(3, 'Sint sit nulla sit.', 'Culpa exercitationem impedit nam ipsa. Officia sit voluptatem quia omnis modi.', 'quis veritatis', '1988-06-19', 10, 2, NULL, NULL),
(4, 'In commodi nisi eum aut omnis.', 'Quia ut minima accusantium perspiciatis. Sit repellat sit eos doloremque. Eum quia totam ad velit et cumque. Aperiam odio et et accusantium.', 'ipsam officia', '2004-11-09', 11, 1, NULL, NULL),
(5, 'Est qui corporis quaerat excepturi.', 'Reiciendis doloremque quae voluptas facilis. Quidem odio sunt eveniet at. Blanditiis quia itaque voluptatem cupiditate nemo qui. Consequatur perspiciatis voluptatem fuga.', 'magnam ducimus', '2012-05-15', 8, 2, NULL, NULL),
(6, 'Asperiores rerum deserunt.', 'Reiciendis rem sapiente sint ducimus minima dolorem et. Porro maxime repellat dolor molestias aut molestiae nihil. Vero minima aperiam officiis perspiciatis. Sapiente corporis et quos fuga non aut.', 'maxime aut', '1980-01-31', 10, 2, NULL, NULL),
(7, 'Aliquam eos dolorem at.', 'Error sed aut cumque sit rerum quo ipsum. Voluptatem a voluptas accusantium qui est. Dicta laudantium quis placeat maiores quis.', 'quia aut', '1992-01-19', 7, 4, NULL, NULL),
(8, 'Quaerat esse doloribus dicta.', 'Corporis reprehenderit mollitia reprehenderit explicabo iste consequatur aut odio. Eum voluptatem et ut. Voluptatem et cum incidunt exercitationem fuga omnis.', 'dolor', '2006-01-15', 3, 2, NULL, NULL),
(9, 'Ad labore labore adipisci.', 'Iste aliquid vel assumenda incidunt illo dolorem quo nam. Voluptatibus cum corrupti dicta suscipit quam nulla omnis et. At ducimus illo nihil quo est. Sint tempore molestiae harum ratione.', 'magnam error', '2006-10-16', 2, 4, NULL, NULL),
(10, 'Sed quos eos ratione.', 'Laboriosam ut aut eius quas et. Quae sunt possimus ducimus facere animi molestiae qui. Est ut qui ut. Vel natus excepturi nobis facere provident et saepe voluptate.', 'quidem', '1977-07-05', 8, 1, NULL, NULL),
(11, 'Ut rerum dolorem dolorem.', 'Sit ut laudantium laboriosam ut. Voluptas et sint est fugit autem. Quis excepturi voluptas fuga sed explicabo eos et.', 'in', '1984-03-31', 2, 1, NULL, NULL),
(12, 'Quis ut qui.', 'Soluta animi ad id. Cum ut pariatur in dignissimos voluptatem eos voluptatum. Et consequatur quasi mollitia autem quas tempora. Ea officia doloribus esse beatae. Ab hic excepturi laborum velit necessitatibus velit optio.', 'et', '2005-06-26', 3, 1, NULL, NULL),
(13, 'Laborum similique veniam et.', 'Consequatur explicabo impedit consectetur laborum. Dolor voluptatibus dolor omnis reiciendis eveniet. Est neque ea temporibus optio aut ratione. Molestias aut eaque magnam ut sit ut.', 'illo', '1980-05-27', 6, 2, NULL, NULL),
(14, 'Vero placeat nostrum omnis.', 'Reiciendis modi maxime deserunt in molestiae. Officia et eaque earum quod suscipit doloremque. Sit aut voluptatum quam perspiciatis quidem sunt.', 'cumque', '1978-11-01', 7, 2, NULL, NULL),
(15, 'Laboriosam qui eaque velit dolorem quo.', 'Unde et aspernatur incidunt cumque ut quos. Optio rem quas beatae sit ad. Velit voluptatem sit odio vel iste amet. Accusantium aut nostrum debitis aperiam autem.', 'possimus', '1997-10-01', 3, 2, NULL, NULL),
(16, 'Molestiae enim nostrum quo in.', 'Exercitationem saepe doloremque alias culpa. Aut quaerat consequatur rerum earum nesciunt. Cumque sed nostrum ratione tenetur.', 'ipsam', '1988-03-30', 2, 4, NULL, NULL),
(17, 'Provident optio ea et.', 'Est aut voluptate qui eos odit quasi. Magni hic eius recusandae ut et sed ut et. Labore voluptatum minima commodi earum ut earum voluptatem.', 'voluptas', '1979-11-14', 5, 4, NULL, NULL),
(18, 'Inventore aliquam velit nihil et.', 'Totam aut perferendis et dolorem iusto dolore sit molestias. Perferendis dolorem reprehenderit amet pariatur. Atque atque facere officiis animi dolorem delectus ad. Minus consequatur aliquid dignissimos et.', 'atque', '2019-01-04', 7, 2, NULL, NULL),
(19, 'Commodi perspiciatis quo omnis et.', 'Quia laudantium velit sit quis in pariatur. Voluptates soluta temporibus vel. Dolorem dolores ipsum ipsum autem qui velit. Amet deserunt maiores dolores ut. Minima eos blanditiis dolorem tempora.', 'omnis', '2008-10-04', 2, 4, NULL, NULL),
(20, 'Aspernatur odio praesentium eaque nemo possimus.', 'Voluptatem molestiae dolor sunt dicta asperiores iste in. Odit et optio et et. Sint atque fugiat odit autem voluptatem.', 'doloribus quisquam', '1994-04-26', 8, 2, NULL, NULL),
(21, 'Eum et ipsam fugit.', 'Consequatur iusto iste vel aut quibusdam. Et porro voluptatem quam minima vel. Rerum qui omnis veniam autem cumque eligendi.', 'velit ad', '1970-12-01', 4, 2, NULL, NULL),
(22, 'Quae ea laborum.', 'Nesciunt nihil numquam quas molestiae eos incidunt nostrum. Error et quia magnam dolor eligendi. Ducimus voluptates dolore quo rem. Tempora rerum voluptas rerum qui asperiores quia.', 'et', '1985-08-29', 9, 2, NULL, NULL),
(23, 'Fugiat qui eligendi omnis molestias.', 'Nulla suscipit pariatur magni quo esse eos. Labore sunt quia tempora voluptas. Architecto commodi sunt et velit.', 'officia dolores', '1989-11-13', 2, 2, NULL, NULL),
(24, 'Magnam dolor eum sit.', 'Nulla velit eos odio dolores cumque non laborum. Quia error unde sint pariatur. Ducimus qui quos ut reprehenderit modi quia. Esse molestias dolorum iure vero.', 'ipsam dolor', '2000-01-01', 6, 1, NULL, NULL),
(25, 'Consequatur ea dolor.', 'Ut accusantium sed vitae sed magnam labore. Pariatur iste veniam non repudiandae laboriosam consectetur. Perspiciatis excepturi ut ipsam.', 'occaecati', '2018-02-16', 2, 2, NULL, NULL),
(26, 'Similique earum adipisci aut.', 'Delectus id fuga odio impedit sapiente qui animi. Rerum omnis reiciendis quisquam beatae. Eveniet dignissimos repudiandae in animi laudantium.', 'modi molestiae', '1980-10-05', 10, 3, NULL, NULL),
(27, 'Pariatur eum et et et.', 'Molestiae ut et et omnis voluptatem tenetur est. Dolores aliquam nulla unde nihil. Voluptatem eos nesciunt a. Aut minus magni dignissimos maxime et.', 'harum', '1990-04-27', 11, 3, NULL, NULL),
(28, 'Est aliquam rerum ipsum nesciunt aut.', 'Consequatur corrupti doloremque omnis et aut nihil sint. Fugiat similique ut placeat voluptate ratione odio et. Sed dolore quam ipsum ducimus.', 'nesciunt similique', '1978-02-26', 5, 4, NULL, NULL),
(29, 'Quam beatae quis quia.', 'Illum vitae occaecati tempora eos explicabo. Molestiae cupiditate ex aliquam ut et. Aliquam qui maiores ut ut consequatur consequatur iure.', 'numquam aut', '1983-06-22', 9, 3, NULL, NULL),
(30, 'Aliquid commodi dolore eos unde praesentium.', 'Aperiam ipsam qui odio minima quas. Esse adipisci dignissimos inventore sunt praesentium nobis. Debitis fugiat nihil aut nemo autem dolor odio. Quod corrupti dolores dolorem ipsa.', 'omnis architecto', '2017-05-24', 7, 3, NULL, NULL),
(31, 'Eius omnis earum.', 'At qui nemo voluptatem id voluptatibus sapiente voluptatum. Ratione aut voluptatem enim error. Dolores quisquam sunt repellat harum similique quis nulla earum.', 'reprehenderit dolor', '2016-01-13', 8, 2, NULL, NULL),
(32, 'Sequi eaque iste nostrum voluptatem.', 'Optio et debitis ut id. Ea ex molestias aut provident officia enim saepe voluptas.', 'similique delectus', '2014-08-09', 7, 1, NULL, NULL),
(33, 'Quis ut repudiandae.', 'Non possimus numquam ad voluptatum molestiae. Quaerat ipsa iure quo aperiam. Illo dolor explicabo et et incidunt nesciunt rem.', 'sunt', '1990-11-26', 4, 1, NULL, NULL),
(34, 'Pariatur error temporibus voluptas quas delectus.', 'Aut repudiandae illum ad facilis qui omnis quia. Consequuntur inventore odit eos. Ut libero tenetur minima veniam reprehenderit totam placeat.', 'doloremque natus', '1975-09-09', 7, 1, NULL, NULL),
(35, 'Quasi aut nisi corrupti.', 'Vitae officiis ut velit facilis doloremque quo voluptas. Dolores nemo est quibusdam quia laborum. Fuga et fugit et eum. At qui et et corrupti doloribus cumque eligendi.', 'sed', '1981-08-13', 10, 1, NULL, NULL),
(36, 'Corrupti totam aut delectus.', 'Numquam accusantium qui in illo hic qui. Consequatur optio minus blanditiis saepe. Sequi distinctio qui sequi ut sit. Odio vel mollitia laudantium sint aliquid. Expedita non dolorum maxime asperiores eum.', 'consequatur quia', '2004-02-09', 3, 4, NULL, NULL),
(37, 'Voluptas voluptatum et eaque animi.', 'Excepturi laudantium repellendus laboriosam est laudantium. Dolores blanditiis atque quas sint distinctio. Animi unde ea sunt.', 'quo', '2009-11-09', 9, 2, NULL, NULL),
(38, 'Molestias qui rerum.', 'Tempora non alias deleniti eius iste. Maxime qui dignissimos magnam quo. Consequatur qui aperiam tempore tempore.', 'pariatur modi', '1972-10-04', 4, 1, NULL, NULL),
(39, 'Repudiandae et minima natus culpa quisquam.', 'Vel ipsam aliquid est reiciendis in maiores quibusdam. Quo tempore quos quo dolor dolores. Voluptatem voluptate et enim. Numquam inventore quia similique aut laudantium eveniet.', 'atque', '2010-03-02', 11, 1, NULL, NULL),
(40, 'Temporibus minima cumque eum blanditiis.', 'Expedita expedita quod et sed. Libero accusantium consectetur quia molestias suscipit consequatur quae. Rerum ipsum cum totam molestiae dignissimos deleniti. Totam laudantium quo soluta.', 'sed', '2000-01-24', 5, 2, NULL, NULL),
(41, 'Sed dolorem et earum ratione provident.', 'Eius aut voluptatem natus nihil. Doloribus libero repellendus similique reiciendis dolorum porro. Et dolores exercitationem autem sit aspernatur.', 'voluptatibus', '2000-07-06', 3, 1, NULL, NULL),
(42, 'Ipsum blanditiis et.', 'Consectetur cupiditate suscipit et est. Et voluptas enim cupiditate deserunt delectus molestiae. Quos dolorem veniam maiores dolore aperiam.', 'provident', '1979-07-16', 5, 4, NULL, NULL),
(43, 'Sit qui qui doloremque.', 'Et iure sed consequatur rem magnam et repellat. Deleniti repudiandae laborum magni delectus voluptatem praesentium. Sint dolores sit quo voluptatem similique qui natus alias. Consectetur dignissimos saepe magnam ullam sed.', 'nemo', '2015-05-26', 10, 4, NULL, NULL),
(44, 'Quod voluptas perferendis ad in consectetur.', 'Ad voluptatum alias corrupti et vel a enim. Porro labore aliquam ut excepturi ea sunt. Modi ipsam quod explicabo dolor fugit.', 'ut suscipit', '2003-09-04', 8, 1, NULL, NULL),
(45, 'Delectus quas et sint laudantium.', 'Consequatur sint eaque est sed quam eum. Aut ut sequi consectetur quia aliquam eos sed. Eum qui blanditiis et molestiae qui eos. Ut accusamus et et in repudiandae ea corrupti.', 'occaecati', '1976-01-22', 5, 2, NULL, NULL),
(46, 'Et aut facere impedit.', 'Commodi recusandae ducimus et nisi deleniti. Magnam exercitationem nobis omnis. Nostrum quae ratione illum est sit voluptates. Praesentium aliquam ex error aliquid perferendis.', 'placeat blanditiis', '2016-11-10', 2, 2, NULL, NULL),
(47, 'Magni corrupti inventore ut magni.', 'Voluptas asperiores rerum aut aperiam consequatur debitis. Aut sit quaerat omnis vel unde laudantium quos. Ut vel itaque enim illo. Rem omnis sunt at eveniet sed.', 'sed', '1982-10-25', 9, 3, NULL, NULL),
(48, 'Magnam vero voluptatem id ea.', 'Distinctio facere dolorem libero vel placeat consequatur provident assumenda. Consequatur labore porro architecto vero pariatur pariatur fugiat similique. Deleniti provident velit quas sunt ex facilis. Laudantium praesentium sint sed odio.', 'voluptatibus', '1992-10-16', 8, 2, NULL, NULL),
(49, 'Perspiciatis repellat ratione omnis.', 'Animi magnam molestias et. Repudiandae veniam sed sed ut. Quasi voluptatibus aperiam omnis ducimus.', 'ratione eaque', '2007-11-28', 5, 1, NULL, NULL),
(50, 'Maiores numquam facere omnis.', 'Est qui sed dolore dolorem est. In blanditiis ex odio temporibus reiciendis. Dolor sunt soluta rem pariatur eaque.', 'est quidem', '1974-08-22', 6, 3, NULL, NULL),
(51, 'Deserunt molestias et voluptas.', 'Et tenetur inventore tempore voluptatem eum ut nostrum. Commodi et voluptatem voluptas et tempore vero sunt. Qui blanditiis dolor inventore voluptas voluptatem aliquam.', 'facilis', '2017-08-30', 5, 4, NULL, NULL),
(52, 'Ab id minus.', 'Delectus et qui saepe amet et aut praesentium. Iure qui tempore labore quaerat vel et molestias. Enim laborum aut aut quis qui vel natus. Quisquam fugiat similique aut quidem ipsum et consequatur praesentium.', 'suscipit eos', '2003-03-10', 10, 3, NULL, NULL),
(53, 'Voluptates amet nam facere.', 'Fuga quisquam dolores quas nostrum rem laborum voluptas quisquam. Veniam quod nulla rerum. Atque voluptas dolores ut illum. Nam tempora consectetur et velit nihil nobis veniam.', 'omnis aliquam', '1970-11-13', 9, 4, NULL, NULL),
(54, 'Aliquam quisquam beatae aut.', 'Error aspernatur amet aut quidem quia alias aperiam. Praesentium et aut dignissimos natus maiores et. Inventore iste dolores magnam. Et sunt enim dolore eum.', 'quam', '1972-06-01', 5, 3, NULL, NULL),
(55, 'Rerum sit nemo.', 'Ut quis accusamus voluptates aut. Quia omnis accusantium ipsum. Dignissimos alias explicabo veniam et libero quod. Et dignissimos ut et est ipsum.', 'ut', '2000-02-16', 9, 2, NULL, NULL),
(56, 'Itaque saepe velit dolor.', 'Quibusdam dolorum veniam fugiat ipsam. Inventore occaecati cupiditate quas aut quasi facilis. Rerum nam quisquam laboriosam. Aliquam rem ex quae minus. Quasi facere velit nesciunt excepturi culpa.', 'nesciunt', '2003-09-11', 11, 4, NULL, NULL),
(57, 'Vero voluptas ut voluptatem autem.', 'Aliquid temporibus culpa porro praesentium. Velit vel repudiandae eos exercitationem. Deleniti dolores eaque et dolore.', 'ut corrupti', '2000-12-01', 2, 1, NULL, NULL),
(58, 'Voluptatem perferendis perferendis voluptates.', 'Nesciunt consequuntur distinctio ut eos necessitatibus iste voluptates. Dolore voluptates ipsa nihil dolorum aperiam consequatur. Consequuntur voluptatem aliquid beatae quis cum nostrum.', 'omnis', '1975-05-11', 9, 4, NULL, NULL),
(59, 'Corporis beatae sequi perferendis.', 'Enim alias et totam sit odio quo nulla. Ad placeat quo tempore iusto repellat nesciunt exercitationem. Veritatis iste et qui eos.', 'sit non', '1973-12-25', 3, 4, NULL, NULL),
(60, 'Quaerat ducimus rem.', 'Aut eos officia odit rerum. Inventore blanditiis temporibus reprehenderit ab. Sequi quia eum voluptatem dolorum autem.', 'voluptas', '2018-01-07', 11, 4, NULL, NULL),
(61, 'Ea ut culpa dicta eos id.', 'Placeat magni autem ducimus corrupti esse totam voluptas. Quibusdam quia accusantium cumque eos alias enim. Voluptas illum facilis unde numquam. Accusamus maxime non numquam dolor et possimus.', 'dolore harum', '2014-06-20', 10, 3, NULL, NULL),
(62, 'Aspernatur possimus ipsam.', 'Vel quas iste aut aut odio debitis quia. Expedita dolor vel voluptates ut dolorem. Soluta laboriosam quia neque aliquid sit.', 'alias', '2003-02-22', 10, 1, NULL, NULL),
(63, 'Velit molestiae quibusdam dolores.', 'Quis sapiente et harum vero et sed. Laboriosam sapiente adipisci aut vel. Nobis quas voluptatem qui qui quae tenetur alias. Pariatur dolores et aut aperiam.', 'enim labore', '2008-11-19', 11, 3, NULL, NULL),
(64, 'Itaque ut debitis laboriosam.', 'Molestiae qui saepe quas cum saepe velit non. Ut est aut minus praesentium. Et ullam sed laboriosam. Similique magnam illo sit nam ducimus qui.', 'eos', '2005-09-24', 7, 3, NULL, NULL),
(65, 'Recusandae qui fugiat.', 'Reiciendis ipsum quod eos molestiae laborum doloremque reprehenderit. Quasi est ratione quo aut maiores ad et magni. Aspernatur temporibus porro eos vitae impedit. Cupiditate aliquam numquam eius necessitatibus.', 'est', '2005-02-16', 11, 1, NULL, NULL),
(66, 'Maiores porro consectetur est aut.', 'Iste et sit quo quia. Et explicabo a corporis rerum qui soluta placeat. Ipsum voluptatibus tenetur soluta eaque ex magni dolores quibusdam.', 'esse qui', '1994-03-04', 3, 3, NULL, NULL),
(67, 'Sed eligendi fuga vitae ut.', 'Architecto dicta nostrum similique ipsum et id et. Inventore magnam ut consectetur nobis. Aut natus qui qui doloremque asperiores.', 'ipsa aut', '2017-10-20', 8, 2, NULL, NULL),
(68, 'Aperiam qui est consequuntur numquam.', 'Numquam iure molestiae voluptatem numquam in voluptate placeat. Fugit natus molestias nihil optio magni. Aperiam et autem at quia. Nemo explicabo eos voluptatem expedita accusamus.', 'saepe qui', '1999-04-22', 4, 2, NULL, NULL),
(69, 'Deserunt atque consectetur aperiam.', 'Quibusdam ea possimus qui et id distinctio. Architecto quaerat et eum ipsum. Autem quia accusamus in esse deleniti eius. Pariatur facere consequatur fugiat eligendi.', 'similique et', '1994-05-28', 9, 4, NULL, NULL),
(70, 'Ratione omnis sapiente id non.', 'Consequatur ab et dignissimos voluptas fuga qui veniam. Ut enim molestias qui delectus. Molestiae et aperiam enim debitis. Sit enim labore sit enim similique voluptate.', 'et', '1995-08-14', 8, 2, NULL, NULL),
(71, 'Ipsum quas dolorem.', 'Quasi ab sunt necessitatibus distinctio rerum alias necessitatibus. Velit consectetur laudantium omnis quia repudiandae vel harum.', 'quas nam', '1979-07-24', 3, 2, NULL, NULL),
(72, 'Blanditiis ex tempore et consequuntur.', 'Accusantium omnis rerum rerum inventore. Sequi itaque vero impedit voluptatem natus eum quis.', 'culpa', '1986-08-10', 6, 1, NULL, NULL),
(73, 'Nam fugiat sit.', 'Dolores est ad et tempore ut voluptatibus aut. Culpa eveniet optio autem cumque ex non eveniet et. Aut omnis quia fuga optio libero impedit quisquam.', 'aut nesciunt', '2000-10-20', 11, 3, NULL, NULL),
(74, 'Ut ut et mollitia et.', 'Blanditiis voluptatem rem nesciunt officia maiores soluta maiores. Placeat vel iste aliquid rerum eaque placeat repudiandae voluptas. Explicabo voluptatem est qui voluptatem officia sit. Id temporibus sed eum repellendus aut fugit.', 'neque doloremque', '1990-12-12', 2, 1, NULL, NULL),
(75, 'Aut dolore repellat velit.', 'Aut nulla molestiae in magnam excepturi voluptatem et. Amet commodi nisi aut id sapiente. Hic assumenda excepturi magni accusantium quia hic. Voluptas at animi et et officia.', 'rerum', '1970-03-24', 11, 1, NULL, NULL),
(76, 'Est rem et qui aut.', 'Non magni et ea commodi temporibus nulla reiciendis. Veritatis in aut culpa omnis tempora vel. Et quas laudantium nisi accusantium consequuntur perspiciatis reprehenderit. Ab hic officia aut eaque officiis cum a laborum.', 'cumque non', '1992-04-20', 5, 2, NULL, NULL),
(77, 'Doloremque temporibus esse aut.', 'Dignissimos eos dolores tenetur eum eius veniam ea. Et eos atque laboriosam dolor ab consequatur.', 'reiciendis', '1985-09-11', 9, 1, NULL, NULL),
(78, 'Molestiae ut sequi cupiditate.', 'Suscipit ipsa et officiis accusantium vel repudiandae. Iure sapiente id sed quo. Debitis commodi ea autem minima voluptate.', 'rem', '1995-08-23', 3, 4, NULL, NULL),
(79, 'Repellendus ea voluptates.', 'Odio sint voluptatem quod ut ullam. Deserunt debitis soluta quia voluptas quo quia eum. Numquam sint libero eligendi tempora molestiae assumenda laboriosam. Totam minus ut odio dignissimos ut aut.', 'sit', '2015-03-01', 4, 2, NULL, NULL),
(80, 'Odio reiciendis repellat eos vero.', 'Illum est qui optio enim rerum et. Nihil autem fuga aut aut omnis dolorem. Similique ab repudiandae asperiores id sint. Et in nemo quia quam.', 'mollitia veniam', '2014-02-18', 6, 1, NULL, NULL),
(81, 'Enim iure quos iste earum illum.', 'Eos ut reiciendis qui quibusdam dignissimos autem nisi. Quod beatae voluptatem maiores itaque id rerum asperiores. Quisquam molestiae nostrum consectetur eaque ea reprehenderit et. Unde error modi ipsam blanditiis neque voluptas nobis. Cupiditate quasi velit officiis qui.', 'voluptatem illum', '1985-02-11', 3, 4, NULL, NULL),
(82, 'Ad magni nulla maiores dolores eum.', 'Aspernatur ut omnis consectetur. Nostrum ullam adipisci temporibus omnis consequatur occaecati iusto. Ea numquam minus quia officiis suscipit.', 'voluptates deleniti', '1999-07-21', 11, 3, NULL, NULL),
(83, 'Velit recusandae nesciunt enim.', 'Officia quas exercitationem corrupti qui. Mollitia doloribus est quia ut. In rerum soluta et nostrum inventore. Non fugiat quasi quae aut aut.', 'et', '1978-12-27', 10, 1, NULL, NULL),
(84, 'Placeat eos alias recusandae.', 'Beatae perferendis reiciendis est. Nihil illo ut et doloremque perspiciatis temporibus. Delectus commodi ducimus omnis dolorum. Modi error praesentium possimus.', 'velit in', '2017-04-08', 11, 2, NULL, NULL),
(85, 'Culpa quia rem.', 'Quas animi soluta sed qui dolores. Sit corporis ex ipsam unde molestiae autem et. Numquam culpa odio ut autem consequatur suscipit. Aut quia laborum necessitatibus quo. Labore non quos facilis nihil distinctio facilis.', 'amet', '1999-01-14', 10, 1, NULL, NULL),
(86, 'Aut itaque ipsam.', 'Voluptatum officia voluptatem qui aut. Mollitia vel eos quaerat dolor. Fugit id et odio voluptatem et voluptatem sint. Qui nobis natus expedita dolorum et ut necessitatibus.', 'neque dolores', '2019-02-18', 9, 1, NULL, NULL),
(87, 'Laborum ab quaerat ea.', 'Aut est ipsa distinctio vero aut. Delectus sed aut voluptatibus deserunt. Asperiores autem qui occaecati iure iusto expedita.', 'modi amet', '1981-09-19', 9, 2, NULL, NULL),
(88, 'Voluptas natus dolores.', 'Quis aut in unde nihil. Distinctio aut fugit dolorem voluptatem laudantium. Illum quod exercitationem minima natus.', 'dolorem qui', '2014-10-31', 7, 2, NULL, NULL),
(89, 'Sunt et dolor laborum quia quidem.', 'Omnis rerum ipsum eos quod. Molestiae ex non aspernatur non qui. Et quidem quia veritatis consequuntur dolor ipsam.', 'dolor sint', '1991-11-04', 2, 2, NULL, NULL),
(90, 'Eveniet maiores itaque quos doloribus.', 'Natus provident voluptatem et iusto quibusdam cum illo. Facere aperiam incidunt facilis ut. Quia quasi nobis ut ipsa repellendus soluta. Blanditiis officiis sed et tempore rerum vitae molestias in.', 'et ex', '2013-07-18', 9, 4, NULL, NULL),
(91, 'Illo qui necessitatibus voluptatem eum.', 'Amet corporis voluptatem nesciunt. Occaecati autem excepturi laudantium quia. Voluptatibus ad esse dolorem magni quos blanditiis voluptates. Sequi reprehenderit sunt dolor.', 'nobis neque', '2017-10-26', 11, 1, NULL, NULL),
(92, 'Expedita at ratione.', 'Consequatur ut odio similique sed laudantium fugiat. Temporibus numquam voluptates fugit ea excepturi aut. Mollitia omnis veniam qui corrupti dolorum nobis. Minima accusantium laboriosam numquam nihil.', 'alias', '1995-10-10', 5, 4, NULL, NULL),
(93, 'Ipsa itaque rerum non tempora minima.', 'Qui nihil dolores assumenda delectus. Sit modi aut deleniti animi facere consequuntur id adipisci. Nulla molestiae doloribus quam veritatis omnis laboriosam.', 'distinctio', '1998-08-04', 5, 1, NULL, NULL),
(94, 'Repudiandae doloremque similique.', 'Ut suscipit sapiente nisi ut sint qui at. Est quia iusto autem et.', 'voluptas dolor', '2011-03-29', 5, 3, NULL, NULL),
(95, 'Non occaecati dolorem perferendis quibusdam quis.', 'Consequatur commodi ab repudiandae aut est maiores blanditiis. Rem iste laboriosam aut dolores consequatur necessitatibus. Et aut est labore perferendis. Beatae rerum consequuntur quidem nesciunt optio voluptatem doloribus quis.', 'quam officia', '1977-09-12', 2, 3, NULL, NULL),
(96, 'Ipsum nam eaque rerum.', 'Quia nihil facilis et fugit voluptatem voluptas adipisci ipsum. Officia nam ipsam illo exercitationem illo velit facilis aut. Temporibus alias est id natus. Cumque cum vel aut vitae. Ut sapiente accusantium sit deserunt aut ut.', 'impedit', '2002-04-03', 9, 4, NULL, NULL),
(97, 'Soluta perspiciatis aliquam cupiditate error.', 'Odio laudantium deserunt doloremque nihil provident dolore. Aut sint quo enim rerum laborum. Et aut aut repellendus laudantium aperiam necessitatibus.', 'aspernatur possimus', '1983-09-01', 10, 2, NULL, NULL),
(98, 'Vel quia quae quo voluptatem.', 'Nemo cupiditate possimus magnam sit. Alias aut id debitis temporibus. Reiciendis quasi itaque voluptatem debitis. Et incidunt itaque est fuga ut nam.', 'eum voluptas', '1977-06-10', 10, 3, NULL, NULL),
(99, 'Et fugiat minus nobis.', 'Error soluta est illum sed voluptatem doloribus. Vitae consequatur qui ut itaque et voluptatem. Atque eligendi ut soluta commodi voluptas.', 'asperiores', '1981-01-10', 5, 3, NULL, NULL),
(100, 'Consectetur tempora itaque architecto velit autem.', 'Non laboriosam quis illo occaecati voluptas hic voluptas. Non mollitia amet consequatur et magni. Tenetur incidunt ut commodi corporis enim alias qui. Impedit quis sapiente aperiam deserunt.', 'assumenda', '1983-05-09', 8, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penandatangan`
--

CREATE TABLE `penandatangan` (
  `kode_layanan` varchar(4) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penandatangan`
--

INSERT INTO `penandatangan` (`kode_layanan`, `id_user`, `status`, `urutan`) VALUES
('L001', '196205011983032002', 1, 1),
('L002', '196205011983032002', 1, 1),
('L003', 'D0001', 1, 1),
('L003', 'D0002', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'browse bread 1', 'web', '2020-04-25 02:12:27', '2020-04-25 02:12:27'),
(2, 'read bread 1', 'web', '2020-04-25 02:12:27', '2020-04-25 02:12:27'),
(3, 'edit bread 1', 'web', '2020-04-25 02:12:28', '2020-04-25 02:12:28'),
(4, 'add bread 1', 'web', '2020-04-25 02:12:28', '2020-04-25 02:12:28'),
(5, 'delete bread 1', 'web', '2020-04-25 02:12:28', '2020-04-25 02:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-04-25 02:12:08', '2020-04-25 02:12:08'),
(2, 'civitas akademica', 'web', '2020-04-25 02:12:09', '2020-05-14 21:19:26'),
(3, 'guest', 'web', '2020-04-25 02:12:09', '2020-04-25 02:12:09'),
(4, 'petugas', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role_hierarchy`
--

CREATE TABLE `role_hierarchy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `hierarchy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_hierarchy`
--

INSERT INTO `role_hierarchy` (`id`, `role_id`, `hierarchy`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 4),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `name`, `class`) VALUES
(0, 'ditolak', 'badge badge-pill badge-danger\r\n'),
(1, 'belum dproses', 'badge badge-pill badge-secondary'),
(2, 'revisi draft', 'badge badge-pill badge-warning'),
(3, 'drafting', 'badge badge-pill badge-primary'),
(4, 'menunggu tanda tangan', 'badge badge-pill badge-info'),
(5, 'selesai', 'badge badge-pill badge-success');

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
  `nama_file` varchar(80) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `verifikasi` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`no_regist`, `kode_layanan`, `id_user`, `tgl_permohonan`, `tujuan`, `tgl_surat`, `no_surat`, `nama_file`, `keterangan`, `verifikasi`, `status`, `created_at`, `updated_at`) VALUES
('S0001', 'L001', '1511521007', '2020-05-15', 'Tunjangan orang tua pegawai', NULL, NULL, NULL, NULL, NULL, 1, '2020-05-15 15:08:41', '2020-05-15 15:08:41'),
('S0002', 'L002', '1511521015', '2020-05-15', 'Beasiswa PPA', '2020-05-19', 'B/1/UN.16.15/KM.00.00/2020', 'S0002.pdf', NULL, 1, 4, '2020-05-15 15:09:24', '2020-05-19 08:15:09'),
('S0003', 'L003', '1511521015', '2020-05-19', 'test', NULL, NULL, NULL, NULL, NULL, 1, '2020-05-19 07:31:24', '2020-05-19 07:31:24');

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
(1, 'KRS Terbaru (telah ditandatangani PA)', 1),
(2, 'Transkrip Nilai', 1),
(3, 'SK Terakhir Orang Tua (bagi PNS)', 2),
(4, 'KHS semester terakhir', 2),
(6, 'Ijazah SMA', 2),
(7, 'Surat Permohonan BSS ke Ketua Jurusan', 1);

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
('L001', 3),
('L002', 1);

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
(3, 'L001', 'pangkat_ortu', 1),
(4, 'L001', 'golongan_ortu', 1),
(5, 'L001', 'unit_kerja', 1),
(6, 'L001', 'instansi', 1),
(18, 'L003', 'semester', 1);

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
('196205011983032002', 'Yusmimurni, S.IP', '-', '1966-01-01', 1, 'yusmimurni@email.com', '1817', 'Padang', '88008', 'Islam', 'y.jpg', NULL, NULL, NULL, 3),
('D0001', 'Doni', 'Padang', '1985-02-02', 0, 'doni@email.com', '12345', 'Padang', '089911111111', 'Islam', 'doni.jpg', NULL, NULL, NULL, 2),
('D0002', 'Mirsya', 'bukittinggi', '1985-03-01', 2, 'email@email.com', '12345', 'Pauh', '83938', 'Islam', 'a.jpg', NULL, NULL, NULL, 2),
('TP001', 'Mia', 'Padang', '1988-09-21', 1, 'mia@email.com', '12331', 'Padang', '091928198', 'Islam', 'mia.jpg', NULL, NULL, NULL, 3),
('TP003', 'Kasih', 'bukittinggi', '1985-03-01', 2, 'email@email.com', '12345', 'Pauh', '83938', 'Islam', 'a.jpg', NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuroles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `menuroles`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@admin.com', '2020-04-25 02:12:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user,admin', 'qcNkFOHJGR', '2020-04-25 02:12:10', '2020-04-25 02:12:10', NULL),
(2, 'Brenda Roberts DDS', 'amya.schneider@example.net', '2020-04-25 02:12:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'tvNWHfQw0m', '2020-04-25 02:12:11', '2020-04-25 02:12:11', NULL),
(3, 'Dr. Dion Gerhold MD', 'dave.grady@example.org', '2020-04-25 02:12:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '56UJob8RSt', '2020-04-25 02:12:11', '2020-04-25 02:12:11', NULL),
(4, 'Maegan Torp', 'keenan94@example.net', '2020-04-25 02:12:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'NlFmE1w4iW', '2020-04-25 02:12:11', '2020-04-25 02:12:11', NULL),
(5, 'Ricardo Lueilwitz PhD', 'ygrant@example.com', '2020-04-25 02:12:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'k5FJKqH31z', '2020-04-25 02:12:12', '2020-04-25 02:12:12', NULL),
(6, 'Mr. Liam Jakubowski DVM', 'zjacobi@example.org', '2020-04-25 02:12:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'mbYFT7McCw', '2020-04-25 02:12:12', '2020-04-25 02:12:12', NULL),
(7, 'Abbigail Kling', 'reggie47@example.net', '2020-04-25 02:12:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'zgcJBXS2xq', '2020-04-25 02:12:12', '2020-04-25 02:12:12', NULL),
(8, 'Justina Cremin', 'jordyn.cole@example.org', '2020-04-25 02:12:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '8NgXeUdxB9', '2020-04-25 02:12:12', '2020-04-25 02:12:12', NULL),
(9, 'Keely Schulist', 'precious43@example.com', '2020-04-25 02:12:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'xog9LTxJ8w', '2020-04-25 02:12:12', '2020-04-25 02:12:12', NULL),
(10, 'Dusty Williamson', 'mabelle89@example.org', '2020-04-25 02:12:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'DeDpC1nN89', '2020-04-25 02:12:12', '2020-04-25 02:12:12', NULL),
(11, 'Mr. Gianni Graham Jr.', 'asia.mclaughlin@example.org', '2020-04-25 02:12:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'RCFw0TVa6v', '2020-04-25 02:12:13', '2020-04-25 02:12:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no_regist`,`kode_layanan`,`id_field`),
  ADD KEY `field_data_fk` (`id_field`),
  ADD KEY `surat_keluar_data_fk` (`kode_layanan`,`no_regist`);

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
-- Indexes for table `example`
--
ALTER TABLE `example`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `menulist`
--
ALTER TABLE `menulist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penandatangan`
--
ALTER TABLE `penandatangan`
  ADD PRIMARY KEY (`kode_layanan`,`id_user`),
  ADD KEY `user_penandatangan_fk` (`id_user`) USING BTREE;

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_hierarchy`
--
ALTER TABLE `role_hierarchy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

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
  ADD KEY `layanan_surat_keluar_fk` (`kode_layanan`),
  ADD KEY `status` (`status`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `example`
--
ALTER TABLE `example`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menulist`
--
ALTER TABLE `menulist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `template_field`
--
ALTER TABLE `template_field`
  MODIFY `id_field` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `field_data_fk` FOREIGN KEY (`id_field`) REFERENCES `template_field` (`id_field`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_keluar_data_fk` FOREIGN KEY (`kode_layanan`,`no_regist`) REFERENCES `surat_keluar` (`kode_layanan`, `no_regist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `surat_keluar_dokumen_fk` FOREIGN KEY (`no_regist`,`kode_layanan`) REFERENCES `surat_keluar` (`no_regist`, `kode_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `syarat_layanan_dokumen_fk` FOREIGN KEY (`kode_layanan`,`id_syarat`) REFERENCES `syarat_layanan` (`kode_layanan`, `id_syarat`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `layanan_surat_keluar_fk` FOREIGN KEY (`kode_layanan`) REFERENCES `layanan` (`kode_layanan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
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
