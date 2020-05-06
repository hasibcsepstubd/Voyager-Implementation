-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 04:56 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2018-02-28 14:47:48', '2018-02-28 14:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(26, 3, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, NULL, 1),
(27, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(28, 3, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 6),
(29, 3, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 16),
(30, 3, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}', 21),
(31, 3, 'remember_token', 'text', 'remember_token', 0, 0, 0, 0, 0, 0, NULL, 17),
(32, 3, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, NULL, 18),
(33, 3, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, NULL, 19),
(34, 3, 'avatar', 'image', 'Image', 0, 1, 1, 1, 1, 1, NULL, 2),
(35, 5, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(36, 5, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
(37, 5, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(38, 5, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(46, 6, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(47, 6, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(48, 6, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(49, 6, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(50, 6, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
(53, 3, 'role_id', 'text', 'role_id', 0, 1, 1, 1, 1, 1, NULL, 20),
(54, 7, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(55, 7, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 2),
(56, 7, 'details', 'rich_text_box', 'Details', 1, 1, 1, 1, 1, 1, NULL, 3),
(57, 7, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"Pending\":\"Pending\",\"Published\":\"Published\"}}', 5),
(58, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 6),
(59, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(60, 7, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, NULL, 8),
(61, 7, 'type', 'select_dropdown', 'Type', 1, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"Public\":\"Public\",\"Admin\":\"Admin\",\"Client\":\"Client\",\"Live Update\":\"Live Update\",\"Buy\":\"Buy\",\"Sell\":\"Sell\",\"Exchange\":\"Exchange\"}}', 4),
(62, 8, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(63, 8, 'question', 'text', 'Question', 1, 1, 1, 1, 1, 1, NULL, 2),
(64, 8, 'answer', 'rich_text_box', 'Answer', 1, 1, 1, 1, 1, 1, NULL, 3),
(65, 8, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"Pending\":\"Pending\",\"Published\":\"Published\"}}', 4),
(66, 8, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 5),
(67, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 6),
(69, 3, 'nid', 'text', 'Nid', 0, 0, 1, 1, 1, 1, NULL, 7),
(71, 9, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(72, 9, 'moto_title', 'text', 'Moto Title', 0, 1, 1, 1, 1, 1, NULL, 2),
(73, 9, 'moto_details', 'text_area', 'Moto Details', 0, 1, 1, 1, 1, 1, NULL, 3),
(74, 9, 'about_us', 'text_area', 'About Us', 0, 1, 1, 1, 1, 1, NULL, 4),
(75, 9, 'our_team', 'text_area', 'Our Team', 0, 1, 1, 1, 1, 1, NULL, 5),
(76, 9, 'contact_us', 'text_area', 'Contact Us', 0, 1, 1, 1, 1, 1, NULL, 6),
(77, 9, 'address', 'text', 'Address', 0, 1, 1, 1, 1, 1, NULL, 7),
(78, 9, 'support_email', 'text', 'Support Email', 0, 1, 1, 1, 1, 1, NULL, 8),
(79, 9, 'support_phone', 'text', 'Support Phone No', 0, 1, 1, 1, 1, 1, NULL, 9),
(80, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 10),
(81, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 11),
(82, 10, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(83, 10, 'name', 'text', 'Name', 0, 1, 1, 0, 0, 1, NULL, 2),
(84, 10, 'email', 'hidden', 'Email', 0, 1, 1, 0, 0, 1, NULL, 3),
(85, 10, 'title', 'text', 'Title', 0, 1, 1, 1, 0, 1, NULL, 4),
(86, 10, 'details', 'text_area', 'Details', 0, 1, 1, 1, 0, 1, NULL, 5),
(87, 10, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"Unread\":\"Unread\",\"Read\":\"Read\",\"Replied\":\"Replied\"}}', 9),
(88, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 1, NULL, 11),
(89, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 12),
(90, 11, 'id', 'text', 'Trx Id', 1, 1, 1, 0, 0, 0, NULL, 1),
(91, 11, 'user_id', 'text', 'User Id', 1, 1, 1, 0, 0, 0, NULL, 2),
(93, 11, 'send', 'text', 'Send', 1, 1, 1, 0, 0, 0, NULL, 3),
(94, 11, 'received', 'text', 'Received', 1, 1, 1, 0, 0, 0, NULL, 4),
(95, 11, 'account_no', 'text', 'Account No', 1, 1, 1, 0, 0, 0, NULL, 7),
(96, 11, 'trans_id', 'text', 'Transection Code', 0, 1, 1, 0, 0, 0, NULL, 8),
(98, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 1, NULL, 12),
(99, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(100, 11, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, NULL, 14),
(101, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(102, 12, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(103, 12, 'details', 'rich_text_box', 'Details', 1, 1, 1, 1, 1, 1, NULL, 5),
(104, 12, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 1, 1, NULL, 8),
(105, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 9),
(106, 13, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(107, 13, 'curency_name', 'text', 'Curency Name', 1, 1, 1, 1, 1, 1, '{\"on\":\"On Text\",\"off\":\"Off Text\",\"checked\":\"true\"}', 3),
(109, 13, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 11),
(110, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 10),
(111, 12, 'client_name', 'text', 'Client Name', 1, 1, 1, 1, 1, 1, NULL, 3),
(112, 12, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, NULL, 2),
(113, 13, 'reserved', 'text', 'Reserved', 1, 1, 1, 1, 1, 1, NULL, 6),
(114, 13, 'image', 'image', 'Image', 1, 1, 1, 1, 1, 1, NULL, 2),
(115, 14, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(116, 14, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '', 2),
(117, 14, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, '', 3),
(118, 14, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 4),
(119, 14, 'excerpt', 'text_area', 'excerpt', 1, 0, 1, 1, 1, 1, '', 5),
(120, 14, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 6),
(121, 14, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(122, 14, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}', 8),
(123, 14, 'meta_description', 'text_area', 'meta_description', 1, 0, 1, 1, 1, 1, '', 9),
(124, 14, 'meta_keywords', 'text_area', 'meta_keywords', 1, 0, 1, 1, 1, 1, '', 10),
(125, 14, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(126, 14, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 12),
(127, 14, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 13),
(128, 15, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(129, 15, 'author_id', 'text', 'author_id', 1, 0, 0, 0, 0, 0, '', 2),
(130, 15, 'title', 'text', 'title', 1, 1, 1, 1, 1, 1, '', 3),
(131, 15, 'excerpt', 'text_area', 'excerpt', 1, 0, 1, 1, 1, 1, '', 4),
(132, 15, 'body', 'rich_text_box', 'body', 1, 0, 1, 1, 1, 1, '', 5),
(133, 15, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"}}', 6),
(134, 15, 'meta_description', 'text', 'meta_description', 1, 0, 1, 1, 1, 1, '', 7),
(135, 15, 'meta_keywords', 'text', 'meta_keywords', 1, 0, 1, 1, 1, 1, '', 8),
(136, 15, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(137, 15, 'created_at', 'timestamp', 'created_at', 1, 1, 1, 0, 0, 0, '', 10),
(138, 15, 'updated_at', 'timestamp', 'updated_at', 1, 0, 0, 0, 0, 0, '', 11),
(139, 15, 'image', 'image', 'image', 0, 1, 1, 1, 1, 1, '', 12),
(140, 16, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(141, 16, 'parent_id', 'select_dropdown', 'parent_id', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(142, 16, 'order', 'text', 'order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(143, 16, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 4),
(144, 16, 'slug', 'text', 'slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(145, 16, 'created_at', 'timestamp', 'created_at', 0, 0, 1, 0, 0, 0, '', 6),
(146, 16, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
(147, 14, 'seo_title', 'text', 'seo_title', 0, 1, 1, 1, 1, 1, '', 14),
(148, 14, 'featured', 'checkbox', 'featured', 1, 1, 1, 1, 1, 1, '', 15),
(149, 17, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(150, 17, 'moto_title', 'text', 'Moto Title', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|max:50\"}}', 2),
(151, 17, 'moto_details', 'text_area', 'Moto Details', 1, 1, 1, 1, 1, 1, NULL, 3),
(152, 17, 'about_us', 'text_area', 'About Us', 1, 1, 1, 1, 1, 1, NULL, 4),
(153, 17, 'address', 'text', 'Postal Address', 1, 1, 1, 1, 1, 1, NULL, 5),
(154, 17, 'support_email', 'text', 'Support Email', 1, 1, 1, 1, 1, 1, NULL, 6),
(155, 17, 'support_phone', 'text', 'Phone', 1, 1, 1, 1, 1, 1, NULL, 7),
(156, 17, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 1, 1, NULL, 8),
(157, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 9),
(158, 13, 'buy', 'text', 'Buy', 1, 1, 1, 1, 1, 1, NULL, 4),
(159, 13, 'sell', 'text', 'Sell', 1, 1, 1, 1, 1, 1, NULL, 5),
(160, 12, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"Pending\":\"Pending\",\"Published\":\"Published\"}}', 6),
(161, 10, 'from', 'hidden', 'From', 1, 0, 0, 0, 0, 0, NULL, 7),
(162, 10, 'to', 'hidden', 'To', 0, 0, 0, 0, 0, 0, NULL, 8),
(164, 11, 'rate', 'text', 'Rate', 0, 0, 0, 0, 0, 0, NULL, 9),
(165, 11, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"Processing\":\"Processing\",\"Completed\":\"Completed\",\"Rejected\":\"Rejected\"}}', 10),
(166, 11, 'send_amount', 'text', 'Send Amount', 1, 1, 1, 0, 0, 0, NULL, 5),
(167, 11, 'received_amount', 'text', 'Received Amount', 1, 1, 1, 0, 0, 0, NULL, 6),
(168, 11, 'is_reviewed', 'checkbox', 'Is Reviewed', 1, 0, 0, 0, 0, 0, NULL, 11),
(169, 12, 'transection_id', 'text', 'Transection Id', 1, 1, 1, 0, 0, 0, NULL, 7),
(170, 3, 'mobile_1', 'text', 'Mobile 1', 0, 1, 1, 1, 1, 1, NULL, 8),
(171, 3, 'mobile_2', 'text', 'Mobile 2', 0, 0, 1, 1, 1, 1, NULL, 9),
(172, 3, 'address', 'text', 'Address', 0, 0, 1, 1, 1, 1, NULL, 10),
(173, 3, 'nid_first_page', 'image', 'Nid First Page', 0, 0, 1, 1, 1, 1, NULL, 3),
(174, 3, 'city', 'text', 'City', 0, 0, 1, 1, 1, 1, NULL, 11),
(175, 3, 'gender', 'select_dropdown', 'Gender', 1, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"Male\":\"Male\",\"Female\":\"Female\"}}', 12),
(176, 3, 'referred_by', 'text', 'Referred By', 0, 0, 1, 1, 1, 1, NULL, 13),
(177, 3, 'affiliate_id', 'text', 'Affiliate Id', 1, 1, 1, 1, 1, 1, NULL, 14),
(178, 3, 'is_verified', 'select_dropdown', 'Verified', 1, 1, 1, 1, 1, 1, '{\"default\":\"3\",\"options\":{\"Yes\":\"Yes\",\"Submitted\":\"Submitted\",\"No\":\"No\"}}', 24),
(179, 3, 'nid_second_page', 'image', 'Nid Second Page', 0, 0, 1, 1, 1, 1, NULL, 4),
(180, 19, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(181, 19, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, NULL, 2),
(182, 19, 'withdraw', 'text', 'Withdraw', 1, 1, 1, 1, 1, 1, NULL, 3),
(183, 19, 'payment_method', 'text', 'Payment Method', 1, 1, 1, 1, 1, 1, NULL, 4),
(184, 19, 'account_no', 'text', 'Account No', 1, 1, 1, 1, 1, 1, NULL, 5),
(185, 19, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 1, 0, 1, NULL, 6),
(186, 19, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 7),
(187, 19, 'referral_withdraw_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\"}', 8),
(188, 20, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(189, 20, 'user_id', 'text', 'User Id', 1, 1, 1, 0, 0, 1, NULL, 2),
(190, 20, 'withdraw', 'text', 'Withdraw', 1, 1, 1, 0, 0, 1, NULL, 3),
(191, 20, 'payment_method', 'text', 'Payment Method', 1, 1, 1, 0, 0, 1, NULL, 4),
(192, 20, 'account_no', 'text', 'Account No', 1, 1, 1, 0, 0, 1, NULL, 5),
(193, 20, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 1, NULL, 7),
(194, 20, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 8),
(195, 20, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"Pending\":\"Pending\",\"Completed\":\"Completed\",\"Rejected\":\"Rejected\"}}', 6),
(196, 3, 'current_referral_amount', 'number', 'Referral Amount', 0, 1, 1, 1, 1, 1, '{\"null\":\"\"}', 15),
(197, 3, 'confirmed', 'checkbox', 'Confirmed', 1, 0, 0, 0, 0, 0, NULL, 22),
(198, 3, 'confirmation_code', 'checkbox', 'Confirmation Code', 0, 0, 0, 0, 0, 0, NULL, 23),
(199, 10, 'reply', 'text_area', 'Reply', 0, 1, 1, 1, 1, 1, NULL, 6),
(200, 13, 'account_info', 'text', 'Account Info', 0, 1, 1, 1, 1, 1, NULL, 8),
(201, 13, 'is_active', 'checkbox', 'Is Active', 1, 1, 1, 1, 1, 1, '{\"on\":\"Active\",\"off\":\"Inactive\",\"checked\":\"true\"}', 9),
(202, 13, 'ammount_type', 'select_dropdown', 'Ammount Type', 1, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"USD\":\"USD\",\"BDT\":\"BDT\",\"EUR\":\"EUR\",\"GBP\":\"GBP\"}}', 7),
(203, 17, 'helpline', 'text', 'Helpline', 1, 1, 1, 1, 1, 1, NULL, 8),
(204, 11, 'sending_account', 'checkbox', 'Sending Account', 1, 1, 1, 1, 1, 1, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `created_at`, `updated_at`) VALUES
(3, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', NULL, NULL, 1, 1, '2018-02-28 14:46:04', '2018-04-11 20:49:36'),
(5, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, '2018-02-28 14:46:04', '2018-02-28 14:46:04'),
(6, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, '2018-02-28 14:46:04', '2018-02-28 14:46:04'),
(7, 'notices', 'notices', 'Notice', 'Notices', 'voyager-window-list', 'App\\Notice', NULL, NULL, NULL, 1, 1, '2018-03-06 14:02:33', '2018-03-06 14:12:19'),
(8, 'faqs', 'faqs', 'Faq', 'Faqs', 'voyager-info-circled', 'App\\Faq', NULL, NULL, NULL, 1, 0, '2018-03-06 14:51:42', '2018-03-06 14:56:57'),
(9, 'home', 'home', 'Home', 'Homes', 'voyager-home', 'App\\Home', NULL, NULL, NULL, 1, 0, '2018-03-07 02:34:48', '2018-03-07 02:34:48'),
(10, 'messages', 'messages', 'Message', 'Messages', 'voyager-mail', 'App\\Message', NULL, NULL, NULL, 1, 1, '2018-03-08 14:07:19', '2018-03-31 13:26:33'),
(11, 'transections', 'transections', 'Transection', 'Transections', 'voyager-credit-cards', 'App\\Transection', NULL, NULL, NULL, 1, 1, '2018-03-08 14:27:31', '2018-03-08 14:27:31'),
(12, 'testimonials', 'testimonials', 'Testimonial', 'Testimonials', 'voyager-bubble-hear', 'App\\Testimonial', NULL, NULL, NULL, 1, 1, '2018-03-11 23:14:37', '2018-03-31 00:44:33'),
(13, 'rates', 'rates', 'Rate', 'Rates', 'voyager-dollar', 'App\\Rate', NULL, NULL, NULL, 1, 1, '2018-03-14 16:12:42', '2018-04-20 09:27:58'),
(14, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, '2018-03-30 13:58:25', '2018-03-30 13:58:25'),
(15, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, '2018-03-30 13:58:25', '2018-03-30 13:58:25'),
(16, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, '2018-03-30 13:58:25', '2018-03-30 13:58:25'),
(17, 'homes', 'homes', 'Home', 'Homes', 'voyager-home', 'App\\Home', NULL, NULL, NULL, 1, 1, '2018-03-30 22:23:17', '2018-04-19 19:14:41'),
(19, 'referral_withdraw', 'referral-withdraw', 'Referral Withdraw', 'Referral Withdraws', '&#xe00e;', 'App\\ReferralWithdraw', NULL, NULL, NULL, 1, 1, '2018-04-18 08:26:12', '2018-04-18 08:26:12'),
(20, 'referral_withdraws', 'referral-withdraws', 'Referral Withdraw', 'Referral Withdraw', 'voyager-wallet', 'App\\ReferralWithdraw', NULL, NULL, NULL, 1, 1, '2018-04-18 08:41:01', '2018-04-19 21:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Pending','Published') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, '1.Q. What is Moneybagbd.com wallet?', '<p>Moneybagbd.com E wallet is network marketing business for buy,sell and exchange dollar.</p>', 'Published', '2018-03-06 14:58:00', '2018-04-25 13:33:01'),
(2, '2.Q. Is Moneybagbd.com wallet free to join?', '<p>Yes. ipdbse wallet is fully free to join.</p>', 'Published', '2018-03-06 14:58:32', '2018-04-25 13:32:42'),
(3, '3.Q. Can I join without a sponsor?', '<p>Yes,You may join us directly using the \"Join\" link found on the \"Home Page\" or on the \"Top Menu Bar\". The default sponsor is site Admin.</p>', 'Published', '2018-03-06 15:02:52', '2018-04-11 19:35:34'),
(4, '4.Q. Have any commission for user?', '<p>Yes, we give you 1% referral commission.</p>', 'Published', '2018-03-06 15:03:48', '2018-04-11 19:35:30'),
(5, '5.Q. What payment processors are accept Moneybagbd.com wallet?', '<p>We accept Payza, Perfect Money, skrill, neteller, bitcoin, Mbc usd, DBBL,Brac bank, bkash.</p>', 'Published', '2018-03-06 15:05:48', '2018-04-25 13:32:34'),
(6, '6.Q. How long does it take to process purchases?', '<p>All purchases are instantly processed But during some cases, it may take upto 5-15 minutes.If the payment is not processed even after 5-15 minutes, please contact our helpline.</p>', 'Published', '2018-03-06 15:06:15', '2018-04-11 19:35:00'),
(7, '7.Q. How can I buy dollar from Moneybagbd.com wallet?', '<p>Fristly login your account then click buy botton and select your ecurrency mathod and tipe dollar amount.Now you can see how many BDT are need.Then click next and fillup the from with bkash number, bkash trx id and ecurrency email/ID then click submit botton.</p>', 'Published', '2018-03-06 15:06:51', '2018-04-25 13:30:58'),
(8, '8.Q. How can I sell dollar to Moneybagbd.com wallet?', '<p>Fristly login your account then click sell botton and select ecutrency which you want to sell and select BDT payment gate way than tipe dollar amount.Now you can see how many BDT you will get .Then click next and fillup the from with bkash number, and ecurrency email/ID then click submit botton.</p>', 'Published', '2018-03-06 15:07:31', '2018-04-25 13:32:22'),
(9, '9.Q. How can I exchange dollar with Moneybagbd.com wallet?', '<p>Fristly login your account then click exchange botton and select your ecutrency mathod which you send and which you receive then tipe dollar amount.Now you can see how many USD you will get.Then click next and fillup the from with your ecurrency email/ID then click submit botton.</p>', 'Published', '2018-03-06 15:08:02', '2018-04-25 13:31:19'),
(10, '10.Q. My question is not answered here. What should I do?', '<p>Please contact our helpline or live chat.</p>', 'Published', '2018-03-06 15:08:27', '2018-04-11 19:33:05'),
(11, '11. All of you query about us in bangla.', '<p><strong>Moneybagbd.com কি?</strong> বাংলাদেশের আউটসোর্সিং/ফ্রিলেন্সার/অনলাইন ইনকামকারীগণের ডলার অত্যান্ত সহজ ও সঠিকভাবে ক্রয়/বিক্রয় এর অতি বিশ্বস্ত মাধ্যম Moneybagbd.com E Wallet । বাংলাদেশকে বৈদেশিক মুদ্রার রিজার্ভ সর্বোচ্চ করার মাধ্যমে দেশকে উন্নত আয়ের দেশ করাই Moneybagbd.com E Wallet এর লক্ষ্য।</p>\r\n<p><strong>Moneybagbd.com E Wallet এর উদ্দেশ্যে।</strong> <strong>১।</strong> বাংলাদেশের সকল অনলাইন ইনকামকারীগণ যেন তাদের ডলার নিজ মোবাইল নম্বরে বিকাশের মাধ্যমে টাকা গ্রহণ করতে পারে।<br /> <strong>২।</strong> তারা ডলার সঠিক ভাবে যেন ক্রয়/বিক্রয করতে পারে। <br /> <strong>৩।</strong> অপরিচিত ব্যক্তির নিকট ডলার ক্রয়/বিক্রয ক্ষেত্রে যেন প্রতারিত না হয়ে থাকে।<br /> <strong>৪।</strong> ফেসবুক/ইউটিউব/ব্লক থেকে ডলার ক্রয়/বিক্রয় করে যেন কেউ প্রতারক চক্রের মাধ্যমে ক্ষতিগ্রস্থ না হয়ে থাকে।<br /> <strong>৫।</strong> ডলার ক্রয়/বিক্রয় যেন ঘরে বসেই করতে পারে।</p>\r\n<p><strong>Moneybagbd.com E Wallet এ ডলার ক্রয়/বিক্রয় ১০০% নিরাপদ।</strong><br /> <strong>১।</strong> TDBS E Wallet এ ডলার ক্রয়/বিক্রয় সম্পূর্ণ সিস্টেম পরিচালনা করা হয় অত্যাধুনিক ডিজিটাল সিস্টেমে ও Moneybagbd.com E Wallet অত্যাধুনিক সিকিউরিটি সফটওয়্যার এর মাধ্যমে। তাই কোন ব্যক্তি বা অনলাইন হ্যাকারের ডলার চুরি/প্রতারনার কোন সুযোগ নেই।<br /> <strong>২।</strong> প্রতিটি লেনদেনের তথ্য আমাদের রিজার্ভ অপশনে সেফ থাকে তাই লেনদেন ১০০% নিরাপদ। এছাড়াও আমাদের মনিটরিং টিম সবসময় তদারকি করে।</p>\r\n<p><strong>Moneybagbd.com E Wallet এ ডলার ক্রয় পদ্ধতি।</strong> প্রথমে আপনার একাউন্টটি লগইন করুন এবার আপনি Buy অপশনে ক্লিক করুন। এরপর আপনি কোন গেইটওয়ে ডলার ক্রয় করবেন তা সিলেক্ট করুন এবং কোন মাধ্যমে টাকা পাঠাতে চান তা সিলেক্ট করুন । পরে আপনার প্রয়োজন মতো ডলার পরিমাণ দিন, আপনি দেখতে পাবেন আপনাকে কত টাকা পরিশোধ করতে হবে। আর যদি টাকার পরিমাণ দেখতে না পেয়ে থাকেন তবে আপনাকে বুঝে নিতে হবে Moneybagbd.com E Wallet এ এখন ডলার লেনদেন বন্ধ আছে। তখন আপনি কিছুক্ষণ পরে আবার চেষ্টা করবেন। এরপর Next এ ক্লিক করুন ,আপনি যে নম্বর থেকে বিকাশ করবেন সেই নম্বর টাইপ করুন এবং বিকাশ এ টাকা পাঠানোর পর আপনি একটি মেসেজ পাবেন সেই মেসেজে যে ট্রানজেকশন আই ডি আছে তা লিখুন এবং কোন গেইটওয়ে তে আপনি টাকা পেতে চান তার আইডি / ইমেইল লিখুন। পরে Submit বাটনে ক্লিক করুন। আপনার ডলার ক্রয় হয়ে যাবে এবং ৫-১৫ মিনিটের মাঝে আপনার একাউন্টে ডলার চলে যাবে।</p>\r\n<p><strong>Moneybagbd.com E Wallet এ ডলার বিক্রয়ের পদ্ধতি। </strong> আপনার একাউন্ট লগিন করার পর, আপনি Sell এ ক্লিক করুন। এবার আপনি কোন গেইট ওয়ে তে ডলার সেল করবেন তা সিলেক্ট করুন । পরে আপনার প্রয়োজন মত ডলার এর পরিমাণ দিন, তাহলে আপনি দেখতে পারবেন আপনি কত টাকা পাবেন। Next এ ক্লিক করুন, আপনি যে বিকাশ নম্বরে টাকা নিতে চান সেই বিকাশ নাম্বার দিন। যে একাউন্ট হতে ডলার সেন্ড করবেন সেই একাউন্ট এর ই-মেইল/আইডি দিয়ে Submit এ ক্লিক করুন। ৫-১৫ মিনিটের মধ্যে আপনার লেনদেন সম্পন্ন হবে।</p>\r\n<p><strong>Moneybagbd.com E Wallet এ ডলার এক্সচেঞ্জ করার পদ্ধতি। </strong> একাউন্ট লগিন করার পর Exchange লিঙ্কে ক্লিক করুন। এবার আপনি কোন গেইট ওয়ে থেকে কোন গেইট ওয়ে তে এক্সচেঞ্জ করবেন তা সিলেক্ট করুন। পরে আপনার ইচ্ছে মতো ডলার এর পরিমাণ দিন, তাহলে আপনি যত ডলার পাবেন দেখতে পারবেন। এরপর Next এ ক্লিক করুন, আপনি যে ই-মেইল/আইডি থেকে ডলার সেন্ড করছেন সেই ই-মেইল/আইডি দিন, যেই একাউন্ট এ ডলার নিতে চান সেই একাউন্ট ই-মেইল/আইডি দিয়ে Submit বাটনে এ ক্লিক করুন। ৫-১৫ মিনিটের মধ্যে লেনদেন সম্পন্ন হবে।</p>\r\n<p><strong>Moneybagbd.com E Wallet এ ডলার ক্রয় /বিক্রয় রেট। Moneybagbd.com </strong>E Wallet এর মাধ্যমে যখন ডলার বিক্রয় করবেন তখন ১$=৮০-৮৫ টাকা<br /> Moneybagbd.com E Wallet এর মাধ্যমে যখন ডলার ক্রয় করবেন তখন ১$=৮৫-৯১ টাকা<br /> তবে এটি নির্ধারিত হবে ঐ দিনের ডলার এর আন্তজার্তিক রেট এর উপর।</p>\r\n<p><strong>Moneybagbd.com E Wallet এ ব্যাংক এর মাধ্যমে লেনদেন। </strong> আপনি ব্যাংকের মাধ্যমে Moneybagbd.com E Wallet এ লেনদেন করতে পারবেন। সেটিও ৫-১৫ মিনিটের মধ্যে পেমেন্ট করা হবে।</p>\r\n<p><strong>Moneybagbd.com E Wallet এ রেফারেন্স কমিশন। </strong> আমরা ১% রেফারেল কমিশন প্রদান করে থাকি। ২৪ ঘন্টার মধ্যে। আমাদের স্পেশাল রেফারেন্স কমিশনের জন্য হেল্প লাইনে যোগাযোগ করুন।</p>\r\n<p><strong>Moneybagbd.com E Wallet হেল্প লাইন। </strong> প্রতিটি লেনদেন আমরা ৫-১০ মিনিটের মধ্যে সম্পন্ন করি। যদি অতিরিক্ত সময় নেয়া হয় তবে অনুগ্রহপূর্বক হেল্প লাইনে যোগাযোগ করুন।</p>', 'Published', '2018-03-06 15:10:00', '2018-04-25 13:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(10) UNSIGNED NOT NULL,
  `moto_title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `moto_details` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `about_us` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `support_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `support_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `helpline` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `max_order` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '100',
  `min_order` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `moto_title`, `moto_details`, `about_us`, `address`, `support_email`, `support_phone`, `helpline`, `max_order`, `min_order`, `created_at`, `updated_at`) VALUES
(1, 'Fast, secure money exchange', 'Buy, sell and exchange your money with a better exchange rate and avoid excessive bank fees.', 'Bangladesh all online money maker welcome to Moneybagbd.com. Honourable all members can Buy, Sell and Exchange Doller to Taka just in 5-15 minutes. To make Bangladesh rich, developed and digital country we always with you.', '301 Kashem Nagor Sharok , khulna.', 'support@moneybagbd.com', '+88 (0) 1912 990 918', '01827788726', '100', '5', '2018-03-27 22:33:00', '2018-04-22 15:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-02-28 14:46:05', '2018-02-28 14:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2018-02-28 14:46:05', '2018-02-28 14:46:05', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 8, '2018-02-28 14:46:05', '2018-04-21 06:20:28', 'voyager.media.index', NULL),
(4, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 9, '2018-02-28 14:46:05', '2018-04-21 06:20:28', 'voyager.users.index', NULL),
(7, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 10, '2018-02-28 14:46:05', '2018-04-21 06:20:28', 'voyager.roles.index', NULL),
(8, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 11, '2018-02-28 14:46:05', '2018-04-21 06:20:28', NULL, NULL),
(9, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 8, 1, '2018-02-28 14:46:05', '2018-03-06 13:17:47', 'voyager.menus.index', NULL),
(10, 1, 'Database', '', '_self', 'voyager-data', NULL, 8, 2, '2018-02-28 14:46:05', '2018-03-06 13:18:47', 'voyager.database.index', NULL),
(11, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 8, 3, '2018-02-28 14:46:05', '2018-03-06 13:18:47', 'voyager.compass.index', NULL),
(12, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 12, '2018-02-28 14:46:05', '2018-04-21 06:20:28', 'voyager.settings.index', NULL),
(13, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 8, 4, '2018-02-28 14:46:05', '2018-03-06 13:18:47', 'voyager.hooks', NULL),
(14, 1, 'CMS', '', '_self', 'voyager-bolt', '#000000', NULL, 6, '2018-03-06 13:21:22', '2018-04-18 08:41:55', 'voyager.cms.index', 'null'),
(19, 1, 'Notices', '/admin/notices', '_self', 'voyager-window-list', NULL, 14, 2, '2018-03-06 14:02:33', '2018-04-18 08:35:40', NULL, NULL),
(22, 1, 'Messages', '/admin/messages', '_self', 'voyager-mail', NULL, NULL, 5, '2018-03-08 14:07:19', '2018-04-18 08:41:57', NULL, NULL),
(23, 1, 'Transections', '/admin/transections', '_self', 'voyager-credit-cards', NULL, NULL, 3, '2018-03-08 14:27:31', '2018-03-15 12:24:53', NULL, NULL),
(24, 1, 'Testimonials', '/admin/testimonials', '_self', 'voyager-bubble-hear', '#000000', 14, 4, '2018-03-11 23:14:37', '2018-04-21 06:20:28', NULL, ''),
(25, 1, 'Rates', '/admin/rates', '_self', 'voyager-dollar', '#000000', NULL, 2, '2018-03-14 16:12:42', '2018-03-15 12:24:53', NULL, ''),
(26, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 7, '2018-03-30 13:58:26', '2018-04-18 08:41:55', 'voyager.posts.index', NULL),
(29, 1, 'Home', '/admin/homes', '_self', 'voyager-home', '#000000', 14, 1, '2018-03-30 22:23:17', '2018-04-18 08:35:40', NULL, ''),
(31, 1, 'Referral Withdraw', '/admin/referral-withdraws', '_self', 'voyager-wallet', '#000000', NULL, 4, '2018-04-18 08:41:01', '2018-04-19 21:30:39', NULL, ''),
(32, 1, 'FAQ', '/admin/faqs', '_self', 'voyager-info-circled', '#000000', 14, 3, '2018-04-21 06:20:10', '2018-04-21 06:23:36', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `reply` text COLLATE utf8_unicode_ci,
  `from` int(11) NOT NULL,
  `to` int(11) DEFAULT NULL,
  `status` enum('Unread','Read','Replied') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_add_permission_group_id_to_permissions_table', 1),
(17, '2017_01_15_000000_create_permission_groups_table', 1),
(18, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(19, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(20, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(21, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(22, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(23, '2017_08_05_000000_add_group_to_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Public','Admin','Client','Live Update','Buy','Sell','Exchange') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Public',
  `status` enum('Pending','Published') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `details`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About Moneybagbd.com', '<p>Bangladesh all online money maker welcome to Moneybagbd.com Wallet. Moneybagbd.com wallet is a network marketing business for buy,sell and exchange dollar.All online money maker members can Buy, Sell and Exchange Dollar to Taka just in 5-15 minutes.To make Bangladesh rich, developed and digital country we always with you. We think it will be easy and faster way to all users who wants to Buy, Sell or Exchange dollar from online in a trustworthy way without fraud and patarana. Its so flixible. Every User could sell their Dollar in a reasonable price and also could buy dollar with a reasonable price. User could also exchange dollar with a flexible rate.</p>', 'Public', 'Published', '2018-03-05 14:18:00', '2018-04-25 13:26:10', NULL),
(2, 'নোটিশ', '<p><span style=\"color: #000000; font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Coinbase ছাড়া অন্য ওয়ালেটে BTC BUY করার ক্ষেত্রে ট্রানজেকশন ফি আপনার এবং নুন্যতম 20$ । Coinbase এর BUY করার ক্ষেত্রে মেইল দিয়ে রিকুয়েষ্ট সাবমিট করবেন।Payza BUY করার ক্ষেত্রে ট্রানজেকশন ফি আপনার । Skrill / Neteller 30 $ নিচে BUY করার ক্ষেত্রে ট্রানজেকশন ফি 0.60$ আপনার । এই সাইটটি শুধুমাত্র বাংলাদেশী ফ্রিলেন্সারগণের জন্য তাই দেশের বাইরে টাকা বা ডলার প্রদান করা হয় না।</span></p>', 'Live Update', 'Published', '2018-04-10 07:11:00', '2018-05-28 06:10:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2018-02-28 14:47:49', '2018-02-28 14:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hasib.cse.pstu.bd@gmail.com', '$2y$10$Is0r67ROb8/a3LOOqElTgOZFEcaFBEpn/tRuEbIoZfZfxHmm2DaQC', '2018-04-25 11:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`, `permission_group_id`) VALUES
(1, 'browse_admin', NULL, '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(2, 'browse_database', NULL, '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(3, 'browse_media', NULL, '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(4, 'browse_compass', NULL, '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(5, 'browse_menus', 'menus', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(6, 'read_menus', 'menus', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(7, 'edit_menus', 'menus', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(8, 'add_menus', 'menus', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(9, 'delete_menus', 'menus', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(15, 'browse_roles', 'roles', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(16, 'read_roles', 'roles', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(17, 'edit_roles', 'roles', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(18, 'add_roles', 'roles', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(19, 'delete_roles', 'roles', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(20, 'browse_users', 'users', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(21, 'read_users', 'users', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(22, 'edit_users', 'users', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(23, 'add_users', 'users', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(24, 'delete_users', 'users', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(35, 'browse_settings', 'settings', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(36, 'read_settings', 'settings', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(37, 'edit_settings', 'settings', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(38, 'add_settings', 'settings', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(39, 'delete_settings', 'settings', '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(40, 'browse_hooks', NULL, '2018-02-28 14:46:05', '2018-02-28 14:46:05', NULL),
(41, 'browse_notices', 'notices', '2018-03-06 14:02:33', '2018-03-06 14:02:33', NULL),
(42, 'read_notices', 'notices', '2018-03-06 14:02:33', '2018-03-06 14:02:33', NULL),
(43, 'edit_notices', 'notices', '2018-03-06 14:02:33', '2018-03-06 14:02:33', NULL),
(44, 'add_notices', 'notices', '2018-03-06 14:02:33', '2018-03-06 14:02:33', NULL),
(45, 'delete_notices', 'notices', '2018-03-06 14:02:33', '2018-03-06 14:02:33', NULL),
(46, 'browse_faqs', 'faqs', '2018-03-06 14:51:42', '2018-03-06 14:51:42', NULL),
(47, 'read_faqs', 'faqs', '2018-03-06 14:51:42', '2018-03-06 14:51:42', NULL),
(48, 'edit_faqs', 'faqs', '2018-03-06 14:51:42', '2018-03-06 14:51:42', NULL),
(49, 'add_faqs', 'faqs', '2018-03-06 14:51:42', '2018-03-06 14:51:42', NULL),
(50, 'delete_faqs', 'faqs', '2018-03-06 14:51:42', '2018-03-06 14:51:42', NULL),
(51, 'browse_home', 'home', '2018-03-07 02:34:48', '2018-03-07 02:34:48', NULL),
(52, 'read_home', 'home', '2018-03-07 02:34:48', '2018-03-07 02:34:48', NULL),
(53, 'edit_home', 'home', '2018-03-07 02:34:48', '2018-03-07 02:34:48', NULL),
(54, 'add_home', 'home', '2018-03-07 02:34:48', '2018-03-07 02:34:48', NULL),
(55, 'delete_home', 'home', '2018-03-07 02:34:48', '2018-03-07 02:34:48', NULL),
(56, 'browse_messages', 'messages', '2018-03-08 14:07:19', '2018-03-08 14:07:19', NULL),
(57, 'read_messages', 'messages', '2018-03-08 14:07:19', '2018-03-08 14:07:19', NULL),
(58, 'edit_messages', 'messages', '2018-03-08 14:07:19', '2018-03-08 14:07:19', NULL),
(59, 'add_messages', 'messages', '2018-03-08 14:07:19', '2018-03-08 14:07:19', NULL),
(60, 'delete_messages', 'messages', '2018-03-08 14:07:19', '2018-03-08 14:07:19', NULL),
(61, 'browse_transections', 'transections', '2018-03-08 14:27:31', '2018-03-08 14:27:31', NULL),
(62, 'read_transections', 'transections', '2018-03-08 14:27:31', '2018-03-08 14:27:31', NULL),
(63, 'edit_transections', 'transections', '2018-03-08 14:27:31', '2018-03-08 14:27:31', NULL),
(64, 'add_transections', 'transections', '2018-03-08 14:27:31', '2018-03-08 14:27:31', NULL),
(65, 'delete_transections', 'transections', '2018-03-08 14:27:31', '2018-03-08 14:27:31', NULL),
(66, 'browse_testimonials', 'testimonials', '2018-03-11 23:14:37', '2018-03-11 23:14:37', NULL),
(67, 'read_testimonials', 'testimonials', '2018-03-11 23:14:37', '2018-03-11 23:14:37', NULL),
(68, 'edit_testimonials', 'testimonials', '2018-03-11 23:14:37', '2018-03-11 23:14:37', NULL),
(69, 'add_testimonials', 'testimonials', '2018-03-11 23:14:37', '2018-03-11 23:14:37', NULL),
(70, 'delete_testimonials', 'testimonials', '2018-03-11 23:14:37', '2018-03-11 23:14:37', NULL),
(71, 'browse_rates', 'rates', '2018-03-14 16:12:42', '2018-03-14 16:12:42', NULL),
(72, 'read_rates', 'rates', '2018-03-14 16:12:42', '2018-03-14 16:12:42', NULL),
(73, 'edit_rates', 'rates', '2018-03-14 16:12:42', '2018-03-14 16:12:42', NULL),
(74, 'add_rates', 'rates', '2018-03-14 16:12:42', '2018-03-14 16:12:42', NULL),
(75, 'delete_rates', 'rates', '2018-03-14 16:12:42', '2018-03-14 16:12:42', NULL),
(76, 'browse_pages', 'pages', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(77, 'read_pages', 'pages', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(78, 'edit_pages', 'pages', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(79, 'add_pages', 'pages', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(80, 'delete_pages', 'pages', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(81, 'browse_posts', 'posts', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(82, 'read_posts', 'posts', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(83, 'edit_posts', 'posts', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(84, 'add_posts', 'posts', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(85, 'delete_posts', 'posts', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(86, 'browse_categories', 'categories', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(87, 'read_categories', 'categories', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(88, 'edit_categories', 'categories', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(89, 'add_categories', 'categories', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(90, 'delete_categories', 'categories', '2018-03-30 13:58:26', '2018-03-30 13:58:26', NULL),
(91, 'browse_homes', 'homes', '2018-03-30 22:23:17', '2018-03-30 22:23:17', NULL),
(92, 'read_homes', 'homes', '2018-03-30 22:23:17', '2018-03-30 22:23:17', NULL),
(93, 'edit_homes', 'homes', '2018-03-30 22:23:17', '2018-03-30 22:23:17', NULL),
(94, 'add_homes', 'homes', '2018-03-30 22:23:17', '2018-03-30 22:23:17', NULL),
(95, 'delete_homes', 'homes', '2018-03-30 22:23:17', '2018-03-30 22:23:17', NULL),
(96, 'browse_referral_withdraw', 'referral_withdraw', '2018-04-18 08:26:12', '2018-04-18 08:26:12', NULL),
(97, 'read_referral_withdraw', 'referral_withdraw', '2018-04-18 08:26:12', '2018-04-18 08:26:12', NULL),
(98, 'edit_referral_withdraw', 'referral_withdraw', '2018-04-18 08:26:12', '2018-04-18 08:26:12', NULL),
(99, 'add_referral_withdraw', 'referral_withdraw', '2018-04-18 08:26:12', '2018-04-18 08:26:12', NULL),
(100, 'delete_referral_withdraw', 'referral_withdraw', '2018-04-18 08:26:12', '2018-04-18 08:26:12', NULL),
(101, 'browse_referral_withdraws', 'referral_withdraws', '2018-04-18 08:41:01', '2018-04-18 08:41:01', NULL),
(102, 'read_referral_withdraws', 'referral_withdraws', '2018-04-18 08:41:01', '2018-04-18 08:41:01', NULL),
(103, 'edit_referral_withdraws', 'referral_withdraws', '2018-04-18 08:41:01', '2018-04-18 08:41:01', NULL),
(104, 'add_referral_withdraws', 'referral_withdraws', '2018-04-18 08:41:01', '2018-04-18 08:41:01', NULL),
(105, 'delete_referral_withdraws', 'referral_withdraws', '2018-04-18 08:41:01', '2018-04-18 08:41:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/March2018/4xQJuu6w9w9UvNgGwPRF.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-02-28 14:47:49', '2018-03-30 14:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `curency_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ammount_type` enum('BDT','USD','EUR','GBP') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `buy` float NOT NULL,
  `sell` float NOT NULL,
  `reserved` double NOT NULL,
  `account_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `image`, `curency_name`, `ammount_type`, `buy`, `sell`, `reserved`, `account_info`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'rates/April2018/FnR7qR9Obof9C3CSaUnZ.png', 'Payoneer', 'USD', 80, 86, 560, 'support@gmail.com', 1, '2018-03-30 23:04:03', '2018-06-03 21:41:27'),
(5, 'rates/April2018/IFfbH1s7jGWCNmJdP0sl.png', 'Perfect Money', 'USD', 85, 0, 1200, 'asd@gmail.com', 1, '2018-03-30 23:05:46', '2018-06-13 20:51:32'),
(6, 'rates/April2018/vgEl5MzpQN0vofL6ejgN.png', 'Skrill', 'USD', 0, 95, 6391.58, NULL, 1, '2018-03-30 23:06:25', '2018-06-13 20:51:13'),
(7, 'rates/April2018/y73h65JuuaV49X69mgr0.png', 'Neteller', 'USD', 90, 95, 0, NULL, 1, '2018-03-30 23:07:07', '2018-05-27 11:23:56'),
(8, 'rates/April2018/0Ngq7oIoROrEXMQiutDm.jpg', 'Bkash', 'USD', 0, 0, 20500, '01827788726', 1, '2018-04-14 07:26:13', '2018-06-04 09:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `referral_withdraws`
--

CREATE TABLE `referral_withdraws` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `withdraw` float NOT NULL,
  `payment_method` varchar(64) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `status` enum('Pending','Completed','Rejected') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2018-02-28 14:46:05', '2018-02-28 14:46:05'),
(2, 'user', 'Normal User', '2018-02-28 14:46:05', '2018-02-28 14:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Money Bag BD', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Moneybagbd.com is the trusted and secured dollar buy sell site in Bangladesh. We accept Skrill, Neteller, Payza, Payoneer, Paypal, Webmoney, Bitcoin, Western-union, Money-gram, Bkash, Rocket, DBBL Bank and etc. in Bangladesh. We provide best and secure services Bangladeshi Freelancers.', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', 'UA-117843515-1', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Mission Control', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Money Bag Bangladesh Limitted.', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '994963204007-0ftemucdptsbhuci6b6fpnub05qduqgq.apps.googleusercontent.com', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `transection_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Pending','Published') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `transection_id`, `image`, `client_name`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(7, 0, 'users/March2018/JJtK1Lx8pckseXC6p78Y.jpg', 'Hasib', 'Awesome', '<p>I trust this site. First and clean transaction. Recommend this site.</p>', 'Published', '2018-04-02 20:31:00', '2018-04-25 13:35:06'),
(8, 2, 'users/March2018/JJtK1Lx8pckseXC6p78Y.jpg', 'Md. Sofikul Islam', 'Excellent', '<p>A very trusted site . thanks admin. love this site.</p>', 'Pending', '2018-04-08 08:26:00', '2018-05-03 19:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `transections`
--

CREATE TABLE `transections` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `send` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `received` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `send_amount` double UNSIGNED NOT NULL,
  `sending_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `received_amount` double UNSIGNED NOT NULL,
  `account_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trans_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` double UNSIGNED DEFAULT NULL,
  `status` enum('Processing','Completed','Rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Processing',
  `is_reviewed` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transections`
--

INSERT INTO `transections` (`id`, `user_id`, `send`, `received`, `send_amount`, `sending_account`, `received_amount`, `account_no`, `trans_id`, `rate`, `status`, `is_reviewed`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 'Bkash', 'Payoneer', 100, '01827788726', 8600, 'support@gmail.com', 'ASD3457HJKL', NULL, 'Processing', 0, '2018-05-27 19:08:24', '2018-05-27 19:08:24', NULL),
(3, 1, 'Skrill', 'Bkash', 100, '01827788726', 9000, 'support@gmail.com', 'ASD3457HJKL', NULL, 'Processing', 0, '2018-05-27 19:10:18', '2018-05-27 19:10:18', NULL),
(4, 1, 'Payoneer', 'Skrill', 100, 'support@gmail.com', 84.21, 'support@gmail.com', NULL, NULL, 'Processing', 0, '2018-05-27 19:11:01', '2018-05-27 19:11:01', NULL),
(5, 1, 'Bkash', 'Payoneer', 8600, '31232132131232', 100, '321312312312312', NULL, NULL, 'Processing', 0, '2018-05-27 19:29:38', '2018-05-27 19:29:38', NULL),
(6, 1, 'Payoneer', 'Bkash', 100, '3213123', 8000, '21312312312', NULL, NULL, 'Processing', 0, '2018-05-27 19:30:51', '2018-05-27 19:30:51', NULL),
(7, 1, 'Skrill', 'Payoneer', 100, '21312312', 104.65, '21312312312', NULL, NULL, 'Processing', 0, '2018-05-27 19:35:41', '2018-05-27 19:35:41', NULL),
(8, 1, 'Bkash', 'Payoneer', 86, '1', 1, '12121', '11', NULL, 'Processing', 0, '2018-06-03 06:55:56', '2018-06-03 06:55:56', NULL),
(9, 1, 'Payoneer', 'Bkash', 50, '133000', 4000, '1223', '121212', NULL, 'Processing', 0, '2018-06-03 20:35:45', '2018-06-03 20:35:45', NULL),
(10, 1, 'Bkash', 'Skrill', 9500, '3213123', 100, '2312312312', '12213123', NULL, 'Processing', 0, '2018-06-03 20:52:57', '2018-06-03 20:52:57', NULL),
(11, 1, 'Bkash', 'Skrill', 9500, '123123123', 100, '12312312', '1213213', NULL, 'Processing', 0, '2018-06-03 20:57:33', '2018-06-03 20:57:33', NULL),
(12, 1, 'Payoneer', 'Skrill', 10, '2121212', 8.42, '1212121', '12121', NULL, 'Processing', 0, '2018-06-03 21:41:27', '2018-06-03 21:41:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 1, 'pt', 'Post', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(2, 'data_types', 'display_name_singular', 2, 'pt', 'Página', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(3, 'data_types', 'display_name_singular', 3, 'pt', 'Utilizador', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(5, 'data_types', 'display_name_singular', 5, 'pt', 'Menu', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(6, 'data_types', 'display_name_singular', 6, 'pt', 'Função', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(7, 'data_types', 'display_name_plural', 1, 'pt', 'Posts', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(8, 'data_types', 'display_name_plural', 2, 'pt', 'Páginas', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(9, 'data_types', 'display_name_plural', 3, 'pt', 'Utilizadores', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(11, 'data_types', 'display_name_plural', 5, 'pt', 'Menus', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(12, 'data_types', 'display_name_plural', 6, 'pt', 'Funções', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(22, 'menu_items', 'title', 3, 'pt', 'Publicações', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(23, 'menu_items', 'title', 4, 'pt', 'Utilizadores', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(24, 'menu_items', 'title', 5, 'pt', 'Categorias', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(25, 'menu_items', 'title', 6, 'pt', 'Páginas', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(26, 'menu_items', 'title', 7, 'pt', 'Funções', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(27, 'menu_items', 'title', 8, 'pt', 'Ferramentas', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(28, 'menu_items', 'title', 9, 'pt', 'Menus', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(29, 'menu_items', 'title', 10, 'pt', 'Base de dados', '2018-02-28 14:47:49', '2018-02-28 14:47:49'),
(30, 'menu_items', 'title', 12, 'pt', 'Configurações', '2018-02-28 14:47:49', '2018-02-28 14:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_1` decimal(10,0) DEFAULT NULL,
  `mobile_2` decimal(10,0) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` decimal(10,0) DEFAULT NULL,
  `nid_first_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_second_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `affiliate_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referred_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_referral_amount` float DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` enum('Yes','Submitted','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `role_id`, `name`, `email`, `mobile_1`, `mobile_2`, `address`, `nid`, `nid_first_page`, `nid_second_page`, `city`, `gender`, `affiliate_id`, `referred_by`, `current_referral_amount`, `password`, `confirmed`, `confirmation_code`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'users/default.png', 1, 'Admin', 'admin@admin.com', '1234567890', '987654321', 'nirala', '801190902', NULL, NULL, 'Khulna', 'Male', 'uWusO5', NULL, 0.25, '$2y$10$I/zYErlwNP/232PJCFSXaOqHzpkAaj6Vtju6B9c2Ag9x4wuxS0Ofy', 1, NULL, 'Yes', 'GdyQKf7kegvwvPfIfUrSZeVtQNfPCi4dODSEnsA8Bk7Zhwo4PtkPozBnmvz1', '2018-02-28 14:47:49', '2018-04-26 19:33:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_groups_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_withdraws`
--
ALTER TABLE `referral_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transections`
--
ALTER TABLE `transections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_affiliate_id_unique` (`affiliate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `referral_withdraws`
--
ALTER TABLE `referral_withdraws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transections`
--
ALTER TABLE `transections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
