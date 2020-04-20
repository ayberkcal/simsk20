-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 05:16 AM
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
-- Database: `simsk20`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `created_at`, `updated_at`, `content`, `name`, `subject`) VALUES
(1, NULL, NULL, '<!DOCTYPE html>\r\n                <html lang=\"en\">\r\n                <head>\r\n                    <meta charset=\"utf-8\">\r\n                    <meta name=\"viewport\" content=\"width=device-width\">\r\n                    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \r\n                    <meta name=\"x-apple-disable-message-reformatting\">\r\n                    <title>Example</title>\r\n                    <style>\r\n                        body {\r\n                            background-color:#fff;\r\n                            color:#222222;\r\n                            margin: 0px auto;\r\n                            padding: 0px;\r\n                            height: 100%;\r\n                            width: 100%;\r\n                            font-weight: 400;\r\n                            font-size: 15px;\r\n                            line-height: 1.8;\r\n                        }\r\n                        .continer{\r\n                            width:400px;\r\n                            margin-left:auto;\r\n                            margin-right:auto;\r\n                            background-color:#efefef;\r\n                            padding:30px;\r\n                        }\r\n                        .btn{\r\n                            padding: 5px 15px;\r\n                            display: inline-block;\r\n                        }\r\n                        .btn-primary{\r\n                            border-radius: 3px;\r\n                            background: #0b3c7c;\r\n                            color: #fff;\r\n                            text-decoration: none;\r\n                        }\r\n                        .btn-primary:hover{\r\n                            border-radius: 3px;\r\n                            background: #4673ad;\r\n                            color: #fff;\r\n                            text-decoration: none;\r\n                        }\r\n                    </style>\r\n                </head>\r\n                <body>\r\n                    <div class=\"continer\">\r\n                        <h1>Lorem ipsum dolor</h1>\r\n                        <h4>Ipsum dolor cet emit amet</h4>\r\n                        <p>\r\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea <strong>commodo consequat</strong>. \r\n                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                        </p>\r\n                        <h4>Ipsum dolor cet emit amet</h4>\r\n                        <p>\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <a href=\"#\">tempor incididunt ut labore</a> et dolore magna aliqua.\r\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n                        </p>\r\n                        <h4>Ipsum dolor cet emit amet</h4>\r\n                        <p>\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n                        </p>\r\n                        <a href=\"#\" class=\"btn btn-primary\">Lorem ipsum dolor</a>\r\n                        <h4>Ipsum dolor cet emit amet</h4>\r\n                        <p>\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                            Ut enim ad minim veniam, quis nostrud exercitation <a href=\"#\">ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. \r\n                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                        </p>\r\n                    </div>\r\n                </body>\r\n                </html>', 'Example E-mail', 'Example E-mail');

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
(1, NULL, NULL, 'Natus reprehenderit explicabo.', 'Assumenda saepe voluptas et libero est dolorem. Quae velit iusto magni quasi fugit eos quas dolore. Sed dolorem assumenda omnis debitis qui quia minus. Voluptas qui nam dolores repudiandae aut ut.', 4),
(2, NULL, NULL, 'Tempore minima iusto cupiditate ratione.', 'Itaque dolores tenetur beatae sit voluptate deleniti. Corrupti ad consequuntur perferendis. Debitis voluptatem temporibus aut qui.', 1),
(3, NULL, NULL, 'Veniam minus repudiandae voluptatem.', 'Dolorem magni et ea eum vero. Et culpa dignissimos aut tempore animi. Sunt sit facere ipsam ut nemo. Enim est officia repellendus voluptas.', 1),
(4, NULL, NULL, 'Qui aliquid autem adipisci distinctio ratione.', 'Facilis quas eveniet libero tempora voluptates maxime quaerat rem. Cum magni eligendi incidunt quis animi praesentium ducimus totam.', 1),
(5, NULL, NULL, 'Harum saepe enim maxime commodi ullam.', 'Ad sed numquam fuga voluptatum architecto. Eius et quam qui laudantium rerum accusamus illo.', 2),
(6, NULL, NULL, 'Dolorem ad quia.', 'Error non et est ab sed. Autem voluptates sit iusto nostrum veniam totam. Atque voluptas sed nobis beatae beatae.', 2),
(7, NULL, NULL, 'Numquam quaerat sit ea non et.', 'Est magni sint accusantium inventore. Fugit voluptatem atque aliquam doloremque consectetur porro. Ut doloribus ut aut veritatis.', 4),
(8, NULL, NULL, 'Et hic est.', 'Ullam quia et tenetur molestias aut odio occaecati. Voluptas deserunt et tenetur placeat recusandae dolor velit quas. Quis ea est consequatur enim veritatis.', 4),
(9, NULL, NULL, 'Qui ab aut laboriosam.', 'Nesciunt exercitationem est repellendus sit qui voluptas amet. Et eveniet necessitatibus quasi suscipit odit. Qui est pariatur sequi minus voluptates.', 4),
(10, NULL, NULL, 'Cumque deleniti et.', 'Saepe incidunt quidem labore modi rerum voluptatibus. Dicta sunt qui esse velit. Et ut quis sint illum nemo dolorem.', 2),
(11, NULL, NULL, 'Sed accusamus error debitis amet et.', 'Necessitatibus totam consequatur id quo labore et excepturi ex. Corrupti eligendi molestias illum eum eligendi. Et reprehenderit tempore in dolores.', 2),
(12, NULL, NULL, 'Modi molestiae necessitatibus nihil.', 'Dolor omnis voluptatem aut saepe repellat. Non labore vel pariatur sit enim ex nihil. Est dolores aut aliquam recusandae ut odio voluptatem.', 1),
(13, NULL, NULL, 'Veniam ab nobis sint placeat.', 'Eos aut officia quo exercitationem iure. Rerum voluptatum inventore excepturi vel in. Consectetur fugiat et vero in ad beatae soluta ipsam. A dignissimos dolores voluptatem repudiandae et.', 4),
(14, NULL, NULL, 'Tempora cupiditate assumenda modi ut.', 'Natus dignissimos quia temporibus velit. Eos quidem autem et est sint. Voluptatem doloribus ut animi inventore quam incidunt sint. Eos dolor voluptatem laboriosam laudantium pariatur ut. Qui voluptatibus praesentium neque nihil aut.', 4),
(15, NULL, NULL, 'Aut corrupti ut pariatur.', 'Molestias nostrum recusandae nihil natus ut ratione. Nostrum reprehenderit minus ipsam aperiam. Voluptas recusandae id ab eos eligendi libero totam nisi.', 4),
(16, NULL, NULL, 'Neque mollitia et corporis vel in.', 'In eaque explicabo earum nostrum quod debitis. Laboriosam facere voluptatem laborum quasi. Maxime et sint repudiandae et. Molestias blanditiis nulla sequi.', 1),
(17, NULL, NULL, 'Aut quis officia ut.', 'Sit iste ratione ut debitis est consectetur voluptatum. Vero nulla qui et soluta molestias quis. In repudiandae veniam facilis non tempore consectetur voluptas et. Sunt rerum modi mollitia voluptates.', 2),
(18, NULL, NULL, 'Nemo illo sit.', 'Illo ipsam neque itaque amet velit mollitia et eveniet. Nihil nesciunt quod quod delectus. Amet sit iste autem voluptatum numquam porro.', 4),
(19, NULL, NULL, 'A nesciunt hic sapiente omnis.', 'Quaerat atque voluptatem autem laboriosam nesciunt explicabo quia. Praesentium dolor dicta quas aliquid beatae cupiditate accusantium. Rem repellat et consectetur sapiente.', 3),
(20, NULL, NULL, 'Libero accusamus quo eaque.', 'Exercitationem nemo id perferendis exercitationem voluptatibus aut veniam. Consequatur saepe ea aspernatur quia quod culpa. Est id eum occaecati quidem quia.', 1),
(21, NULL, NULL, 'Quo aut beatae.', 'Aliquid porro enim eum quas odio voluptatum facilis. Voluptatem fuga consequuntur quis officiis ea. Velit animi aut cum atque officia. Eaque qui sit officiis iusto magni quia. Rerum voluptate quas est ut et vitae enim.', 1),
(22, NULL, NULL, 'Quo pariatur ipsa ducimus atque.', 'Error quia dolorem atque. Voluptate neque quo at sit nisi ut quisquam. Consequuntur sunt exercitationem magnam. Laboriosam aut consequuntur qui pariatur.', 2),
(23, NULL, NULL, 'Enim et repellat cumque.', 'Numquam debitis voluptatem velit at. Eos molestiae quia assumenda maiores. Aut itaque eum error est.', 1),
(24, NULL, NULL, 'Eaque saepe aperiam consequatur cupiditate.', 'Accusamus delectus aut laborum ut quibusdam. Amet qui error blanditiis sed. Fuga ipsum mollitia ipsa. Eum qui perspiciatis eum temporibus consequatur et non. Explicabo odio ad minus expedita nobis laudantium.', 3),
(25, NULL, NULL, 'A voluptas repellat et rerum vel.', 'Ab laborum sequi consequatur voluptatem. Similique iure minus ullam eum. Officiis aliquam rerum fuga ut.', 3);

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
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int(10) UNSIGNED DEFAULT NULL,
  `resource` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `created_at`, `updated_at`, `name`, `folder_id`, `resource`) VALUES
(1, NULL, NULL, 'root', NULL, NULL),
(2, NULL, NULL, 'resource', 1, 1),
(3, NULL, NULL, 'documents', 1, NULL),
(4, NULL, NULL, 'graphics', 1, NULL),
(5, NULL, NULL, 'other', 1, NULL),
(6, '2020-04-13 05:12:33', '2020-04-13 05:12:33', 'New Folder', 1, NULL),
(7, '2020-04-13 07:34:35', '2020-04-13 07:34:35', 'New Folder', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `pagination` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `created_at`, `updated_at`, `name`, `table_name`, `read`, `edit`, `add`, `delete`, `pagination`) VALUES
(1, NULL, NULL, 'Example', 'example', 1, 1, 1, 1, 5);

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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

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
(3, 'Notes', '/notes', NULL, 'link', 2, 1, 22),
(4, 'Users', '/users', NULL, 'link', 2, 1, 23),
(5, 'Edit menu', '/menu/menu', NULL, 'link', 2, 1, 24),
(6, 'Edit menu elements', '/menu/element', NULL, 'link', 2, 1, 25),
(7, 'Edit roles', '/roles', NULL, 'link', 2, 1, 26),
(8, 'Media', '/media', NULL, 'link', 2, 1, 27),
(9, 'BREAD', '/bread', NULL, 'link', 2, 1, 28),
(10, 'Email', '/mail', NULL, 'link', 2, 1, 29),
(11, 'Login', '/login', 'cil-account-logout', 'link', NULL, 1, 30),
(12, 'Register', '/register', 'cil-account-logout', 'link', NULL, 1, 31),
(13, 'General', NULL, NULL, 'title', NULL, 1, 2),
(66, 'Data Master', NULL, 'cil-list', 'dropdown', NULL, 1, 3),
(67, 'Klasifikasi', '/klasifikasi', 'cil-chevron-right', 'link', 66, 1, 4),
(68, 'Syarat', '/syarat', 'cil-chevron-right', 'link', 66, 1, 5),
(69, 'layanan', '/layanan', 'cil-chevron-right', 'link', 66, 1, 6),
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
(5, 'admin', 3),
(6, 'admin', 4),
(7, 'admin', 5),
(8, 'admin', 6),
(9, 'admin', 7),
(10, 'admin', 8),
(11, 'admin', 9),
(12, 'admin', 10),
(13, 'guest', 11),
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
(118, 'admin', 66),
(119, 'admin', 67),
(120, 'admin', 68),
(121, 'admin', 69),
(124, 'admin', 48),
(125, 'user', 48),
(126, 'admin', 70),
(129, 'admin', 1),
(130, 'petugas', 1),
(131, 'sivitas', 1),
(132, 'admin', 13),
(133, 'petugas', 13),
(134, 'sivitas', 13),
(138, 'admin', 72),
(139, 'petugas', 72),
(140, 'sivitas', 72),
(141, 'admin', 73),
(142, 'petugas', 73),
(143, 'sivitas', 73),
(144, 'admin', 71),
(145, 'petugas', 71),
(146, 'sivitas', 71);

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
(2, 'App\\User', 11),
(2, 'App\\User', 12);

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
(2, 'Tenetur ut dolorum optio.', 'Eum officia consequatur id quos maiores quod doloribus. Mollitia vitae totam rem. At veritatis debitis adipisci. Ipsa aspernatur dolorem qui et eveniet quisquam eligendi.', 'sed facilis', '1997-09-20', 3, 2, NULL, NULL),
(3, 'Ea quas quasi.', 'Sed facilis suscipit illo ipsum voluptatum distinctio autem. Quia alias molestiae sit. Architecto libero iste qui velit.', 'earum', '1998-04-21', 4, 2, NULL, NULL),
(4, 'Et quia tempora non nobis.', 'Itaque officiis voluptatibus nisi est accusamus. Saepe ipsum consequatur ea voluptatem dolor consequuntur omnis. Culpa sed occaecati eum rerum ut.', 'ipsum', '2009-11-12', 5, 4, NULL, NULL),
(5, 'Velit ipsum quidem voluptatum.', 'Ut autem quasi quam perspiciatis ut quaerat. Aut suscipit sint amet debitis et quis tempora. At doloribus molestiae enim quae exercitationem ducimus.', 'rerum sit', '2006-10-09', 4, 1, NULL, NULL),
(6, 'Suscipit distinctio rerum placeat id.', 'Non ullam nulla exercitationem voluptatibus amet quia. Voluptas numquam ratione voluptatibus eum doloribus distinctio sapiente. Quos iure omnis accusamus aut.', 'accusantium', '1982-09-21', 3, 3, NULL, NULL),
(7, 'Saepe nesciunt sequi quasi.', 'Corrupti enim ducimus modi sit iure esse. Beatae voluptas earum veritatis praesentium perspiciatis est. Sit molestiae reiciendis et ea corrupti.', 'quibusdam consequatur', '2003-04-01', 5, 4, NULL, NULL),
(8, 'Id quam ut.', 'Provident est architecto et minima. Exercitationem quibusdam nihil minima reiciendis hic nemo. Aut mollitia officiis nihil amet qui ducimus inventore.', 'nemo', '1988-11-15', 5, 4, NULL, NULL),
(9, 'Aspernatur et blanditiis et et.', 'Iusto et non earum quis consequatur velit voluptatum. Quia quis voluptate sit unde sit et.', 'ut tempora', '2019-04-13', 10, 1, NULL, NULL),
(10, 'Ut omnis iure perspiciatis quo.', 'Vel sunt deserunt beatae quo libero eligendi repudiandae. Quasi odio ducimus blanditiis nulla. Enim voluptas earum unde sit voluptas.', 'ex debitis', '1990-07-03', 4, 2, NULL, NULL),
(11, 'Ut voluptatem molestias quia omnis.', 'Velit voluptatum architecto ratione est. Eum voluptas doloribus voluptatibus quas cumque debitis nesciunt quia. Eligendi molestias tempora dolores et. Praesentium facere non adipisci debitis numquam sunt in modi.', 'laboriosam', '1991-12-27', 9, 4, NULL, NULL),
(12, 'Aliquid molestiae beatae voluptas ut.', 'Nemo iure placeat aut quia ipsam atque. Sint ducimus ea quod mollitia aliquid. Quae nostrum rerum adipisci omnis numquam. Atque et et similique labore aliquam.', 'consequatur dolorem', '1974-01-12', 7, 3, NULL, NULL),
(13, 'Dolor atque sapiente quia.', 'Mollitia quaerat et vel excepturi laudantium necessitatibus. Repellat ducimus repudiandae beatae repellendus qui qui consequatur officiis. Quidem necessitatibus beatae quis et.', 'et', '1985-03-12', 8, 2, NULL, NULL),
(14, 'Sequi est veniam occaecati.', 'Corporis dolorem voluptates corrupti vitae dolor. Labore aut dolore distinctio autem eius omnis recusandae qui. Ea voluptatem aliquid optio voluptatem nesciunt dolorem exercitationem. Voluptatem quis impedit rerum. Suscipit reiciendis ut a eos.', 'corporis', '2003-10-01', 9, 1, NULL, NULL),
(15, 'Maxime harum dolor non est.', 'Cumque sed ut in praesentium architecto. Ex pariatur voluptatum aliquam sint corporis deserunt. Recusandae modi architecto eius vero. Sequi quia quia quia quod doloribus veniam.', 'sed nesciunt', '2000-08-09', 5, 1, NULL, NULL),
(16, 'Ipsum aut officia voluptas reprehenderit.', 'Aut quia omnis totam qui officiis voluptatem itaque. Quos distinctio necessitatibus sunt nobis. Quis omnis aut aut excepturi corrupti eaque eius.', 'quis', '1980-12-07', 9, 4, NULL, NULL),
(17, 'Quia laboriosam tempore quo.', 'Omnis nihil asperiores vel et sit. Qui porro accusamus aut iure ad. Voluptates fugit laudantium dolor consequatur at eveniet voluptatum.', 'neque omnis', '1986-11-16', 7, 3, NULL, NULL),
(18, 'Eius est et ut.', 'Suscipit esse a ipsa corporis aut neque. Et dolores quo id nihil ex. Temporibus voluptatum sint voluptas.', 'iste quia', '1985-08-15', 9, 4, NULL, NULL),
(19, 'Ullam autem sunt a.', 'Deserunt qui maiores saepe inventore quibusdam quia. Accusamus molestias et est ut. Qui veritatis expedita voluptatum alias aperiam commodi iusto maiores.', 'dolores', '1980-11-05', 9, 4, NULL, NULL),
(20, 'Iusto beatae eos facilis ipsum.', 'Cum quia optio totam doloremque. Quod voluptatem et qui sit nesciunt repellat. Consequatur saepe qui eum veniam maiores quam itaque.', 'quis esse', '1977-03-25', 10, 3, NULL, NULL),
(21, 'Est occaecati minus atque non.', 'Eveniet tempora veniam deleniti debitis. Aut suscipit necessitatibus ex debitis quia repellendus. Necessitatibus consectetur maxime exercitationem repellat libero placeat explicabo. Doloribus iusto et non velit.', 'quos omnis', '1982-04-13', 6, 1, NULL, NULL),
(22, 'Fuga molestias officiis numquam nobis.', 'Ab expedita sed hic cum. Dolores ipsam error aperiam. Voluptatem illum alias eaque ea vero est magni. Omnis cumque dolorem ipsum laboriosam omnis.', 'quia cupiditate', '2005-01-13', 6, 4, NULL, NULL),
(23, 'Debitis qui adipisci aut.', 'Dolore occaecati dolor est. Dolores deserunt ipsa dignissimos nisi sit ducimus. Corrupti praesentium est dolor excepturi molestiae. Nulla est placeat eveniet quos consequatur et.', 'voluptas aut', '1987-05-29', 5, 1, NULL, NULL),
(24, 'Amet explicabo nemo vel.', 'Facere est debitis vel ratione. Nam nemo sapiente quidem accusantium eos officiis ea quia. Quos sed non blanditiis sit qui quasi tenetur enim. Sunt rerum nostrum quis eum laboriosam unde alias mollitia.', 'fuga et', '2016-10-30', 11, 2, NULL, NULL),
(25, 'Quasi dolor odit explicabo.', 'Quo vel impedit minima ratione harum velit. Molestiae beatae illum et magni doloremque sint. Est ducimus soluta aliquid consequatur qui quis necessitatibus.', 'atque', '1970-09-28', 2, 3, NULL, NULL),
(26, 'Omnis doloribus nobis eos omnis.', 'Ipsam placeat sed nihil ullam voluptatum rerum fuga. Asperiores voluptatum architecto temporibus quod enim officiis. Earum atque mollitia quibusdam aperiam eos in.', 'eum', '1976-06-05', 3, 4, NULL, NULL),
(27, 'Est totam consequatur.', 'Est placeat ullam ullam vitae. Praesentium omnis praesentium itaque fuga est. Voluptates eum perferendis rerum ut quaerat saepe eligendi. Ut consequatur possimus eos excepturi consectetur qui.', 'omnis et', '2014-03-28', 4, 4, NULL, NULL),
(28, 'Accusantium consequatur qui dicta vel velit.', 'Dolores dignissimos vero tempore nihil qui commodi amet architecto. Nulla dignissimos pariatur corporis harum. Et a ipsam sit quia nulla non. Nihil velit quod excepturi distinctio consequatur.', 'alias', '1984-12-05', 7, 2, NULL, NULL),
(29, 'Et qui alias illum repudiandae.', 'Dolore enim numquam earum et natus omnis corrupti. Suscipit et dolore architecto mollitia atque eum. Nemo aliquam cupiditate quas.', 'culpa', '1995-07-16', 2, 4, NULL, NULL),
(30, 'Aut beatae vel.', 'Laboriosam expedita nemo minus est nisi mollitia eveniet perferendis. Aut esse officia id. Illum voluptas et eum in dolores culpa.', 'dolores earum', '1983-08-05', 2, 4, NULL, NULL),
(31, 'Dolores dolorum earum.', 'Eveniet voluptates illo in dolores maiores tempore. Animi laborum velit qui sequi magnam quis et. Ut sint vel saepe et expedita atque. Neque laudantium ut libero non corporis at. Laborum et molestias ipsam officia vero laborum impedit exercitationem.', 'temporibus voluptatibus', '2001-07-14', 9, 2, NULL, NULL),
(32, 'Dicta aliquid voluptatem officia dolorem.', 'Quo consequuntur eius dolorum voluptas. Quam harum ut unde similique ut et. Esse consectetur labore ut ut. Sed optio magni quae illum et non. Quibusdam et sunt illo.', 'quidem in', '1978-07-03', 7, 1, NULL, NULL),
(33, 'Iure ducimus fugit incidunt.', 'Odio deleniti culpa ad porro beatae enim. Aut quo sit ut mollitia. Molestiae quam itaque quia rem.', 'dignissimos illo', '1989-02-08', 6, 2, NULL, NULL),
(34, 'Optio quibusdam recusandae et.', 'Numquam aliquid provident voluptatibus qui ducimus debitis. Sapiente dolore reprehenderit aut tempora. Nemo est et ratione aut sunt a. Iure soluta tenetur fugiat quo aut pariatur aut.', 'a eligendi', '2001-01-01', 10, 4, NULL, NULL),
(35, 'Occaecati quo assumenda dolores corrupti vel.', 'Facilis autem labore omnis sunt et et fuga eos. Natus et provident maxime. Ea quos rerum nulla quas velit deleniti dolor. Eos laboriosam sed voluptatibus dicta laboriosam voluptas libero.', 'in et', '1989-03-30', 7, 4, NULL, NULL),
(36, 'Voluptas totam magni ipsum corrupti.', 'Qui molestiae eaque illo explicabo ex doloribus. Modi iusto id et quisquam. Totam quo a et labore. Recusandae ipsam sed ipsum similique fugit et est voluptas.', 'maxime', '2013-04-20', 2, 3, NULL, NULL),
(37, 'Ullam quo quibusdam rerum sequi tenetur.', 'Voluptatem aut nam ut. Vel ad distinctio odio consequatur eum veniam. Et voluptas adipisci eaque vitae vero. Iste deleniti facilis harum a molestias neque velit facilis.', 'molestiae', '2014-09-18', 6, 4, NULL, NULL),
(38, 'Ea vel est eum asperiores.', 'Consectetur omnis consequatur id et est quam. Sed vel cum blanditiis eum. Fuga omnis id incidunt expedita.', 'consequatur qui', '1994-08-02', 8, 2, NULL, NULL),
(39, 'Sunt eum a ut eum quo.', 'Quaerat neque iure omnis soluta provident consectetur porro. Ut ad ad quasi reprehenderit sed quos ipsum esse. Distinctio libero delectus alias rerum qui numquam. Id error fuga a culpa quibusdam laborum dolor qui.', 'iusto consequatur', '1982-07-29', 11, 2, NULL, NULL),
(40, 'A mollitia inventore nesciunt dolor.', 'Sunt odit facilis quae vel ut ducimus recusandae. Voluptatem eum suscipit fugit quas ratione sit. Aspernatur sequi quis rerum qui aut fugiat et.', 'dicta', '1982-04-29', 8, 4, NULL, NULL),
(41, 'Nemo odit quo non.', 'A aut ipsum qui et dolorem occaecati eveniet. Reprehenderit id laboriosam quis dolores et id incidunt.', 'sint', '2005-10-21', 9, 2, NULL, NULL),
(42, 'Voluptas nostrum ut qui dignissimos.', 'Harum ea ad laudantium. Exercitationem natus iusto nihil aut commodi. Quas sed ullam quas reiciendis soluta quis. Perferendis quo molestiae minus nulla maxime impedit nulla.', 'culpa', '2008-11-14', 9, 4, NULL, NULL),
(43, 'Nulla asperiores error incidunt necessitatibus in.', 'Velit consectetur rerum incidunt sed maiores molestiae. Earum maiores provident assumenda pariatur corrupti et. Atque adipisci pariatur non quae.', 'quo', '1999-08-22', 6, 4, NULL, NULL),
(44, 'Sapiente non quasi cumque animi.', 'Aliquid unde ducimus provident quos eligendi esse. Ut unde repudiandae aut tempora ipsum necessitatibus. Mollitia praesentium illum quisquam sed aliquid fuga. Eaque itaque non ea sunt.', 'qui maiores', '2004-06-30', 5, 2, NULL, NULL),
(45, 'Et molestiae quo cupiditate.', 'Tempora est quia perspiciatis. Blanditiis nesciunt quos et velit officiis qui assumenda. Perspiciatis quod in quia quisquam laudantium repellat repellat. Quia cupiditate quam magnam numquam dolorem error consequatur vitae.', 'incidunt aut', '2012-04-09', 7, 2, NULL, NULL),
(46, 'Ullam asperiores earum enim assumenda.', 'Aperiam libero dignissimos aut qui. Qui atque quia est sint vero eligendi iure modi. Animi dolorem tenetur dolore quam numquam assumenda error magni. Expedita pariatur eaque quod tempora.', 'vero', '1985-06-26', 3, 1, NULL, NULL),
(47, 'Ut quis consequatur veritatis.', 'In placeat sint minima eaque. Omnis eveniet deleniti deleniti sunt eaque. Nihil voluptate est accusantium libero.', 'placeat et', '2004-09-22', 6, 3, NULL, NULL),
(48, 'Neque culpa voluptatibus ut dolor.', 'Aut exercitationem distinctio qui explicabo culpa eveniet quidem. Et hic recusandae accusamus quia cumque. Aliquid veritatis ut necessitatibus. Et aut ut id perferendis voluptas animi laudantium.', 'enim', '1978-08-12', 4, 2, NULL, NULL),
(49, 'Doloribus eius error architecto sequi.', 'Voluptatem voluptatem repudiandae officia. Dolorum non qui mollitia sunt. Qui sed repudiandae aut hic quia repellendus voluptatibus. Dicta optio quaerat quisquam ducimus ut fugit.', 'atque non', '1995-12-27', 4, 1, NULL, NULL),
(50, 'Dolorem ratione maxime est et odio.', 'Iste laudantium est totam quia. Est laborum nesciunt sequi consequuntur. Quibusdam reprehenderit illo esse velit voluptas magnam cupiditate amet.', 'alias et', '1976-10-01', 4, 3, NULL, NULL),
(51, 'Fugit quibusdam illo repellendus velit.', 'Voluptate voluptatem ab accusamus culpa voluptatem sunt nobis nisi. Qui eos aperiam possimus hic cum. Enim et autem tempore nisi.', 'placeat', '2017-01-29', 9, 2, NULL, NULL),
(52, 'Aspernatur consequuntur ut culpa rerum.', 'Consequatur quo voluptatum ea aut. Sequi porro id amet nobis aut aut et. Eos et omnis velit atque culpa corporis. Rerum aspernatur sit impedit velit at. Eum ut velit aut rerum qui error.', 'natus', '2017-03-11', 6, 2, NULL, NULL),
(53, 'Laborum perferendis consequatur pariatur.', 'Consectetur non exercitationem dolorem. Temporibus aut hic expedita aut delectus ullam. Officiis id et possimus vel omnis qui. Suscipit quia iste deserunt ad.', 'quaerat blanditiis', '2012-07-14', 9, 2, NULL, NULL),
(54, 'Dolor nihil rerum.', 'Nam amet placeat possimus aperiam voluptatum sit. Facere deleniti distinctio consequatur facilis qui occaecati repellendus.', 'enim', '1995-07-01', 10, 1, NULL, NULL),
(55, 'Optio et modi et hic veniam.', 'Voluptatem sit ut veniam qui autem vel. Modi non magni ipsum exercitationem. Iure reprehenderit qui accusantium enim autem.', 'autem facilis', '1984-08-24', 6, 3, NULL, NULL),
(56, 'Molestiae sit provident aliquid unde tempore.', 'Culpa repellat et sapiente quis. Vitae consequatur non eaque non. Aspernatur et voluptas veritatis sed ullam ipsam exercitationem. Qui voluptate illo sed qui reiciendis nobis tempora facere.', 'sit nemo', '1974-01-21', 2, 1, NULL, NULL),
(57, 'Qui dicta neque doloribus quaerat.', 'Maiores ducimus quis voluptatibus ipsum molestiae error voluptatem. Rerum corporis recusandae eius voluptatem. Molestias rem consequatur qui sunt ipsum quia porro a. Cupiditate dicta nam qui molestias occaecati at ut.', 'quam est', '1976-11-19', 4, 4, NULL, NULL),
(58, 'Impedit numquam ut quia molestias et.', 'Ex est asperiores pariatur. Ut reprehenderit eos dolor perferendis est omnis. Occaecati ipsum quia ab omnis harum qui est. Excepturi commodi voluptas autem qui eligendi vitae.', 'excepturi aut', '1986-08-29', 4, 2, NULL, NULL),
(59, 'Nihil est repudiandae.', 'Sed id libero commodi rerum enim. Magni quia eos voluptas velit consequatur. Et accusamus beatae at omnis.', 'voluptatibus quam', '1999-01-14', 4, 3, NULL, NULL),
(60, 'Laboriosam ratione deserunt ut autem.', 'Nulla et velit hic et rerum sed facilis. Consequuntur dolores molestiae voluptatem sit. Et non voluptas error perferendis illo nihil impedit. Aut aliquid recusandae optio praesentium amet ut possimus. Exercitationem nulla in qui qui consequatur dignissimos consectetur.', 'consequuntur inventore', '1982-12-31', 9, 2, NULL, NULL),
(61, 'Nisi sit id et corrupti.', 'Vero quasi natus sit vero voluptatem sit laborum pariatur. Et ullam rerum ex neque voluptatem molestiae fugiat. Perspiciatis provident iste dolore iste vero labore nobis.', 'dolor', '1987-04-27', 2, 4, NULL, NULL),
(62, 'Fuga ratione est aut omnis.', 'Quam et molestias aut ut ipsa ad molestiae. Laboriosam quia nihil molestiae dicta quaerat excepturi. Exercitationem iste eum adipisci rem dignissimos minima voluptate.', 'in', '1976-02-22', 4, 1, NULL, NULL),
(63, 'Molestias inventore exercitationem.', 'Dolor aut consequatur non distinctio sit. Eaque non ut doloremque consequatur est temporibus. Est maxime consequatur cum dolore.', 'dolore placeat', '1980-03-30', 2, 2, NULL, NULL),
(64, 'Doloribus sed id.', 'Dolor vel voluptatem quo tenetur. Consequatur aut ex reprehenderit libero et. Dolor laboriosam animi sapiente officiis. Sequi libero illo sed aut iure non fugiat.', 'eius commodi', '2001-09-15', 9, 2, NULL, NULL),
(65, 'Voluptate ab quia magni.', 'Necessitatibus soluta aut vel eos id animi illo. Fugiat sequi molestias totam ipsam veniam blanditiis adipisci. Dolores suscipit architecto eum corporis culpa maiores.', 'quas ex', '1977-09-23', 3, 3, NULL, NULL),
(66, 'Consequuntur officiis quas.', 'Numquam libero quia ratione placeat porro quaerat. Voluptatem voluptatem consectetur omnis distinctio tempore sed commodi. At corporis recusandae saepe culpa sint quasi. Qui et deserunt aut sequi pariatur neque.', 'omnis', '1990-02-01', 8, 1, NULL, NULL),
(67, 'Itaque facere fugiat aliquid cumque.', 'Est aut aliquid saepe aperiam recusandae deleniti debitis fugiat. Eos quibusdam et mollitia ab numquam quaerat consequatur. Laborum aut veritatis corporis beatae dolores ea et. Aut dolores voluptates et vel provident eligendi veniam.', 'assumenda', '1999-10-11', 9, 3, NULL, NULL),
(68, 'Ipsam est nihil neque.', 'Asperiores esse nihil sint velit quas dolore consequatur. Et rem sit consequuntur.', 'possimus est', '2016-06-25', 10, 1, NULL, NULL),
(69, 'Officia reprehenderit illo cumque ullam ipsam.', 'Nisi dolorum dicta quos ipsam expedita aliquam molestias. Ab enim omnis sapiente ipsam incidunt placeat. Recusandae blanditiis nobis eveniet fugiat et.', 'rerum', '1992-03-16', 5, 4, NULL, NULL),
(70, 'Sunt porro ipsa consequatur.', 'Itaque ex ratione voluptatem ullam maiores eius. Dolores voluptas est alias cum enim rerum modi. Qui consectetur facilis ipsam.', 'officiis quasi', '1993-04-19', 7, 2, NULL, NULL),
(71, 'Qui at quibusdam praesentium dolorem et.', 'Non earum at quos dolorum dicta exercitationem. Est alias doloribus at molestias. Dolores quia voluptatem non ea reiciendis.', 'aut', '1971-01-29', 7, 3, NULL, NULL),
(72, 'Quas iusto ut labore.', 'Repellendus animi expedita facilis ut. Sit est officiis vero alias aut exercitationem suscipit. Qui iste quia odio temporibus quod explicabo. Vel corporis inventore laudantium facere.', 'sed', '2016-09-27', 3, 4, NULL, NULL),
(73, 'In quae dolor.', 'Rerum sequi autem id quo. Non perspiciatis porro ea. Quod eum optio molestiae quis. Et accusamus facilis impedit.', 'debitis eaque', '1988-11-13', 8, 2, NULL, NULL),
(74, 'Et eaque et laboriosam.', 'Dolore mollitia adipisci fugiat velit sed magnam illo quia. Mollitia et iusto ea. Architecto ad amet id nemo aut.', 'quo nostrum', '1974-05-22', 7, 2, NULL, NULL),
(75, 'Ut iusto unde dolorem.', 'Est architecto eaque unde. Earum consectetur quasi corrupti voluptatum illo aliquid facere. Omnis fugiat pariatur nostrum odio architecto odio.', 'pariatur inventore', '2012-09-08', 2, 3, NULL, NULL),
(76, 'Cum quis voluptatem.', 'Et facere adipisci incidunt fugit necessitatibus. Recusandae et voluptatem asperiores quod. Dolor officiis qui sit fuga.', 'et', '2008-07-04', 6, 3, NULL, NULL),
(77, 'Numquam cumque iste molestias a.', 'Est maxime provident saepe quaerat. Dolorum voluptas ut quisquam cumque tempore et. Eius ut quia illo itaque sapiente accusantium dolorem. Sit voluptates molestiae sit est.', 'velit', '2016-02-13', 2, 1, NULL, NULL),
(78, 'Esse dolorem modi nam tempora.', 'Sunt doloribus voluptas sed. Commodi quis minima iure quia debitis. Sint voluptate enim autem est officiis laudantium.', 'dolores commodi', '1986-07-28', 5, 4, NULL, NULL),
(79, 'Error autem est odio quos.', 'Voluptatem in quis et non. Dolores autem ipsa quis iste eum rerum praesentium. Rerum quo sunt magnam repellat sed recusandae labore quia. Consequuntur beatae id minima laboriosam ipsam laudantium repellat.', 'molestiae', '1989-09-28', 3, 3, NULL, NULL),
(80, 'Ea ipsum magni sint saepe.', 'Debitis nobis fuga optio rerum assumenda. Beatae ratione reiciendis alias dolores minus eligendi totam distinctio. Nihil omnis perferendis assumenda iste. Dolores voluptas qui dolor ut suscipit qui et consectetur. Repudiandae ratione minus architecto ut et soluta.', 'eum doloremque', '1990-07-03', 6, 4, NULL, NULL),
(81, 'Voluptas ex quo non.', 'Facere quas rerum et ut quae similique ut et. Aut et aut sed. Facere ab sit nisi sed. Facere qui explicabo non qui. Eum ipsa error quae reprehenderit libero reprehenderit.', 'et alias', '1975-01-03', 4, 2, NULL, NULL),
(82, 'Expedita accusantium est.', 'Ut est molestiae sit odit aut numquam. Expedita veniam et quod quas repellendus. Non fuga aspernatur voluptatem explicabo dolor placeat. Et ea dolores et maiores non error eos.', 'magnam', '1984-05-29', 11, 1, NULL, NULL),
(83, 'Consectetur ducimus dicta earum.', 'Aliquid aut numquam enim voluptas consequatur aperiam sequi. Assumenda explicabo eos rerum maxime ea sint perferendis. Nemo laudantium quo nihil quisquam id vel ad magni. Ut ipsa minima ipsa.', 'cumque incidunt', '2011-12-03', 10, 1, NULL, NULL),
(84, 'Officia eum quia ut vel.', 'Qui facilis consequatur soluta fugit adipisci fugiat perspiciatis. Odit nemo nemo voluptas recusandae eum velit reprehenderit molestiae. Nam aliquam et et.', 'voluptatibus ea', '2001-07-10', 3, 4, NULL, NULL),
(85, 'Ut velit quos adipisci quo nihil.', 'Aut quia et debitis qui delectus sed. Eligendi incidunt facere porro praesentium. Inventore ipsum blanditiis consequatur doloribus et. Totam accusantium ut excepturi qui.', 'assumenda', '1985-11-05', 2, 2, NULL, NULL),
(86, 'Incidunt aliquid laboriosam et dignissimos.', 'Et molestiae et et aut dignissimos. Doloremque culpa iusto iure libero. Delectus et sit modi dolorem dicta. Occaecati sunt magnam repellat qui. Veniam amet distinctio aspernatur aliquam incidunt aut non.', 'culpa exercitationem', '1990-09-09', 2, 1, NULL, NULL),
(87, 'Quo perspiciatis non nihil optio sit.', 'Nesciunt libero sapiente aperiam. Id rerum at vel itaque sed. Quo labore aut ut doloribus voluptas laborum earum. At est magnam officia modi veritatis enim necessitatibus.', 'dignissimos iure', '1999-03-30', 6, 2, NULL, NULL),
(88, 'Adipisci quo eligendi et.', 'Alias quaerat aut suscipit excepturi consequatur sit. Eum rerum aut voluptates optio qui ad. Quia fuga et error et occaecati exercitationem. Sunt optio tenetur et.', 'eos', '1978-05-30', 4, 4, NULL, NULL),
(89, 'Perspiciatis dolorem vel deserunt quos totam.', 'Autem earum ea quasi eveniet perferendis. Aut omnis cupiditate earum laboriosam quasi quae consequatur cum. Sed sit ut ea quis necessitatibus commodi ratione. Cumque sint voluptas eveniet vel dolorem omnis a.', 'qui', '1975-05-03', 2, 1, NULL, NULL),
(90, 'Pariatur modi rerum.', 'Totam sequi inventore necessitatibus aut molestias. Temporibus amet ut qui. Earum possimus et non facere beatae. Eveniet quo ab occaecati sapiente.', 'deserunt', '2015-10-18', 5, 3, NULL, NULL),
(91, 'Aut ducimus laudantium est voluptas.', 'Quia quod adipisci nihil soluta dicta et illum dolor. Nemo cumque repudiandae ipsum reprehenderit itaque ab. Eos repudiandae nemo magnam ex quidem soluta. Illo officia et velit voluptas voluptatem occaecati.', 'odio omnis', '2014-02-21', 6, 2, NULL, NULL),
(92, 'Reiciendis dolore sed dignissimos sequi.', 'Ut voluptatum vitae optio fugiat. Voluptatem voluptates reiciendis officia nemo pariatur. Illum qui quae voluptas qui voluptatibus odio.', 'accusantium', '1975-06-24', 10, 2, NULL, NULL),
(93, 'Perferendis laborum quo explicabo molestiae.', 'Quia beatae omnis quaerat et eum veritatis. Porro ut quasi et ad placeat quis. Non voluptatum minus corrupti autem.', 'soluta ut', '1975-10-12', 4, 4, NULL, NULL),
(94, 'Sed et ut.', 'Aspernatur sit amet ducimus eos et. Doloribus qui sunt cum aliquid. Qui corporis sint dolor adipisci explicabo incidunt. Ullam dolorem consequatur id maiores.', 'excepturi', '2016-03-08', 2, 1, NULL, NULL),
(95, 'Est et qui ut.', 'Labore eaque libero est sed minima ea. Possimus corrupti deserunt rerum. Vel nulla expedita non sunt laboriosam sequi natus. Voluptatem voluptatem autem et in quia. Facilis reprehenderit omnis non repellat aut.', 'ad', '1971-11-26', 10, 2, NULL, NULL),
(96, 'Sapiente beatae aut ab consequatur.', 'Maiores provident officiis et numquam et nihil. Perferendis modi non quaerat saepe. Dolores fugiat laboriosam vel dicta repellat delectus. Aut enim ab laborum sapiente.', 'at rem', '2010-11-09', 6, 4, NULL, NULL),
(97, 'Eum numquam voluptatibus optio.', 'Exercitationem at nihil occaecati adipisci aut consequatur sed deserunt. Nesciunt non non ratione nesciunt nemo officiis iste. Impedit sit qui ut porro facere sed aut. Voluptatum nihil error unde sunt sed distinctio.', 'molestias', '1982-06-07', 4, 3, NULL, NULL),
(98, 'Provident sunt qui velit dolore.', 'Qui exercitationem pariatur ut. Facilis nostrum est consequatur sit quis minus est. Dolor necessitatibus officia natus reprehenderit aut.', 'dignissimos facere', '1978-01-01', 6, 3, NULL, NULL),
(99, 'Quidem mollitia quis deleniti porro.', 'Commodi praesentium recusandae ipsam repudiandae provident. Nemo labore ex soluta odit temporibus eligendi. Qui sunt fuga omnis asperiores necessitatibus. Numquam quia ut labore vel eum.', 'voluptatem ut', '1994-11-07', 6, 4, NULL, NULL),
(100, 'Pariatur atque exercitationem dolor.', 'Deleniti praesentium blanditiis adipisci numquam. Nihil asperiores dolor facere eveniet tenetur sint. Excepturi labore ut error possimus ut.', 'placeat', '1984-06-20', 9, 4, NULL, NULL),
(101, 'coba', 'ini coba coreui v3 + laravel', 'ikon', '2020-04-06', 1, 1, '2020-04-13 04:33:58', '2020-04-13 04:33:58');

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
(1, 'browse bread 1', 'web', '2020-04-13 02:46:03', '2020-04-13 02:46:03'),
(2, 'read bread 1', 'web', '2020-04-13 02:46:03', '2020-04-13 02:46:03'),
(3, 'edit bread 1', 'web', '2020-04-13 02:46:03', '2020-04-13 02:46:03'),
(4, 'add bread 1', 'web', '2020-04-13 02:46:04', '2020-04-13 02:46:04'),
(5, 'delete bread 1', 'web', '2020-04-13 02:46:04', '2020-04-13 02:46:04');

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
(1, 'admin', 'web', '2020-04-13 02:45:36', '2020-04-13 02:45:36'),
(2, 'user', 'web', '2020-04-13 02:45:36', '2020-04-13 02:45:36'),
(3, 'guest', 'web', '2020-04-13 02:45:36', '2020-04-13 02:45:36'),
(4, 'petugas', 'web', '2020-04-13 06:22:46', '2020-04-13 06:22:46'),
(5, 'sivitas', 'web', '2020-04-13 06:22:54', '2020-04-13 06:22:54');

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
(2, 2, 4),
(3, 3, 5),
(4, 4, 2),
(5, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `class`) VALUES
(1, 'ongoing', 'badge badge-pill badge-primary'),
(2, 'stopped', 'badge badge-pill badge-secondary'),
(3, 'completed', 'badge badge-pill badge-success'),
(4, 'expired', 'badge badge-pill badge-warning');

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
(1, 'admin', 'admin@admin.com', '2020-04-13 02:45:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user,admin', 'UOpgV7GcBK0rkQ8CQYDKcmLsBeJAqGvklV6sM6Vxt3qwbk8FZPa30Um4wv5N', '2020-04-13 02:45:38', '2020-04-13 02:45:38', NULL),
(2, 'Mrs. Kaelyn Dare I', 'marcella66@example.net', '2020-04-13 02:45:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'p3zS8YZnZu', '2020-04-13 02:45:39', '2020-04-13 02:45:39', NULL),
(3, 'Ms. Nichole Lindgren DVM', 'schaefer.dean@example.org', '2020-04-13 02:45:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '0C85jZaMUU', '2020-04-13 02:45:39', '2020-04-13 02:45:39', NULL),
(4, 'Elna Thiel', 'jesse.effertz@example.org', '2020-04-13 02:45:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'rZXJY4Id6v', '2020-04-13 02:45:39', '2020-04-13 02:45:39', NULL),
(5, 'Catharine Friesen', 'kunde.jacky@example.com', '2020-04-13 02:45:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '53iMKgv8Jv', '2020-04-13 02:45:39', '2020-04-13 02:45:39', NULL),
(6, 'Miss Lenna Marks', 'yasmine.torp@example.net', '2020-04-13 02:45:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'qd6Hu8CLE3', '2020-04-13 02:45:40', '2020-04-13 02:45:40', NULL),
(7, 'Derek Graham', 'kirk.gusikowski@example.com', '2020-04-13 02:45:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'WnHYTWTUuW', '2020-04-13 02:45:40', '2020-04-13 02:45:40', NULL),
(8, 'Heloise Veum', 'ellis65@example.org', '2020-04-13 02:45:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'yIn1TZfvHR', '2020-04-13 02:45:41', '2020-04-13 02:45:41', NULL),
(9, 'Katelin Will Jr.', 'emil14@example.net', '2020-04-13 02:45:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'kuDPbtbF8Y', '2020-04-13 02:45:41', '2020-04-13 02:45:41', NULL),
(10, 'Mr. Myles Schneider I', 'kylie.streich@example.com', '2020-04-13 02:45:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'Q3Ss9ZzBrN', '2020-04-13 02:45:41', '2020-04-13 02:45:41', NULL),
(11, 'Reanna Lubowitz', 'llittel@example.net', '2020-04-13 02:45:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'vDxzv6F3MN', '2020-04-13 02:45:41', '2020-04-13 02:45:41', NULL),
(12, 'user1', 'user1@email.com', NULL, '$2y$10$qPmJsoO3KOnBSQWjlyRMjehOCbHqAeKbys0Phzm2Fp.otT.JQla0W', 'user', NULL, '2020-04-13 04:51:45', '2020-04-13 04:51:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menulist`
--
ALTER TABLE `menulist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_hierarchy`
--
ALTER TABLE `role_hierarchy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
