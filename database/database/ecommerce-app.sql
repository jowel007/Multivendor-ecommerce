-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 05:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `vendor_id`, `mobile`, `email`, `password`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AB', 'admin', 0, '01847313526', 'admin@admin.com', '$2y$10$qEFeKtO5ojI1BhLU/vYwj.psKFCy4CeSTP0ibtarMDmahjGZhIOvu', '79196.jpg', 1, NULL, '2022-08-07 12:06:17'),
(2, 'Jhon Deo', 'vendor', 1, '01875628575', 'jhon@admin.com', '$2a$12$Fw87R.uUIfAaiJgsOO3FVuwqCPDQBVXVIE1a.Ug5WAaqQbW2pjdpW', '91266.jpg', 1, NULL, '2022-08-18 22:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_discount` float NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Men', '', 0, '', 'men', '', '', '', 1, NULL, '2022-08-23 05:40:16'),
(2, 0, 1, 'WoMen', '', 0, '', 'women', '', '', '', 1, NULL, '2022-08-23 05:40:17'),
(3, 0, 1, 'Kids', '', 0, '', 'kids', '', '', '', 1, NULL, '2022-08-23 05:40:18'),
(4, 0, 8, 'smart phone', '', 10, 'The MacBook is Apple\'s third laptop computer family, introduced in 2006', 'smart phone', 'smart phone', 'smart phone', 'smart phone', 1, '2022-08-27 11:08:32', '2022-08-29 09:04:34'),
(5, 1, 1, 'T-Shirt', '', 10, 'The MacBook is Apple\'s third laptop computer family, introduced in 2006', 'T-Shirt', 'T-Shirt', 'T-Shirt', 'T-Shirt', 1, '2022-08-28 06:25:37', '2022-08-29 09:04:12'),
(6, 0, 8, 'mobile', '', 10, 'A mobile phone is a wireless handheld device that allows users to make and receive calls.', 'https://www.techopedia.com/', 'mobile', 'mobile', 'mobile', 1, '2022-08-29 09:02:34', '2022-08-29 09:02:34'),
(7, 0, 12, 'macbook', '', 4, 'The MacBook is Apple\'s third laptop computer family, introduced in 2006', 'MacBook', 'MacBook', 'MacBook', 'MacBook', 1, '2022-08-29 09:03:24', '2022-08-29 09:03:24'),
(8, 1, 1, 'Shirt', '', 0, NULL, 'Shirts', NULL, NULL, NULL, 1, '2022-08-29 09:36:58', '2022-08-29 09:36:58'),
(9, 2, 1, 'Tops', '', 0, NULL, 'tops', NULL, NULL, NULL, 1, '2022-08-29 09:40:47', '2022-08-29 09:40:47'),
(10, 2, 1, 'Denims', '', 0, NULL, 'Denims', NULL, NULL, NULL, 1, '2022-08-29 09:41:53', '2022-08-29 09:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(2, 'AL', 'Albania', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(3, 'DZ', 'Algeria', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(4, 'DS', 'American Samoa', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(5, 'AD', 'Andorra', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(6, 'AO', 'Angola', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(7, 'AI', 'Anguilla', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(8, 'AQ', 'Antarctica', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(9, 'AG', 'Antigua and Barbuda', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(10, 'AR', 'Argentina', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(11, 'AM', 'Armenia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(12, 'AW', 'Aruba', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(13, 'AU', 'Australia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(14, 'AT', 'Austria', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(15, 'AZ', 'Azerbaijan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(16, 'BS', 'Bahamas', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(17, 'BH', 'Bahrain', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(18, 'BD', 'Bangladesh', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(19, 'BB', 'Barbados', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(20, 'BY', 'Belarus', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(21, 'BE', 'Belgium', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(22, 'BZ', 'Belize', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(23, 'BJ', 'Benin', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(24, 'BM', 'Bermuda', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(25, 'BT', 'Bhutan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(26, 'BO', 'Bolivia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(27, 'BA', 'Bosnia and Herzegovina', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(28, 'BW', 'Botswana', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(29, 'BV', 'Bouvet Island', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(30, 'BR', 'Brazil', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(31, 'IO', 'British Indian Ocean Territory', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(32, 'BN', 'Brunei Darussalam', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(33, 'BG', 'Bulgaria', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(34, 'BF', 'Burkina Faso', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(35, 'BI', 'Burundi', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(36, 'KH', 'Cambodia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(37, 'CM', 'Cameroon', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(38, 'CA', 'Canada', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(39, 'CV', 'Cape Verde', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(40, 'KY', 'Cayman Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(41, 'CF', 'Central African Republic', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(42, 'TD', 'Chad', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(43, 'CL', 'Chile', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(44, 'CN', 'China', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(45, 'CX', 'Christmas Island', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(46, 'CC', 'Cocos (Keeling) Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(47, 'CO', 'Colombia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(48, 'KM', 'Comoros', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(49, 'CD', 'Democratic Republic of the Congo', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(50, 'CG', 'Republic of Congo', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(51, 'CK', 'Cook Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(52, 'CR', 'Costa Rica', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(53, 'HR', 'Croatia (Hrvatska)', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(54, 'CU', 'Cuba', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(55, 'CY', 'Cyprus', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(56, 'CZ', 'Czech Republic', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(57, 'DK', 'Denmark', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(58, 'DJ', 'Djibouti', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(59, 'DM', 'Dominica', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(60, 'DO', 'Dominican Republic', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(61, 'TP', 'East Timor', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(62, 'EC', 'Ecuador', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(63, 'EG', 'Egypt', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(64, 'SV', 'El Salvador', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(65, 'GQ', 'Equatorial Guinea', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(66, 'ER', 'Eritrea', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(67, 'EE', 'Estonia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(68, 'ET', 'Ethiopia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(69, 'FK', 'Falkland Islands (Malvinas)', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(70, 'FO', 'Faroe Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(71, 'FJ', 'Fiji', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(72, 'FI', 'Finland', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(73, 'FR', 'France', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(74, 'FX', 'France, Metropolitan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(75, 'GF', 'French Guiana', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(76, 'PF', 'French Polynesia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(77, 'TF', 'French Southern Territories', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(78, 'GA', 'Gabon', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(79, 'GM', 'Gambia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(80, 'GE', 'Georgia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(81, 'DE', 'Germany', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(82, 'GH', 'Ghana', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(83, 'GI', 'Gibraltar', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(84, 'GK', 'Guernsey', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(85, 'GR', 'Greece', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(86, 'GL', 'Greenland', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(87, 'GD', 'Grenada', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(88, 'GP', 'Guadeloupe', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(89, 'GU', 'Guam', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(90, 'GT', 'Guatemala', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(91, 'GN', 'Guinea', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(92, 'GW', 'Guinea-Bissau', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(93, 'GY', 'Guyana', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(94, 'HT', 'Haiti', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(95, 'HM', 'Heard and Mc Donald Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(96, 'HN', 'Honduras', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(97, 'HK', 'Hong Kong', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(98, 'HU', 'Hungary', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(99, 'IS', 'Iceland', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(100, 'IN', 'India', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(101, 'IM', 'Isle of Man', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(102, 'ID', 'Indonesia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(103, 'IR', 'Iran (Islamic Republic of)', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(104, 'IQ', 'Iraq', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(105, 'IE', 'Ireland', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(106, 'IL', 'Israel', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(107, 'IT', 'Italy', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(108, 'CI', 'Ivory Coast', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(109, 'JE', 'Jersey', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(110, 'JM', 'Jamaica', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(111, 'JP', 'Japan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(112, 'JO', 'Jordan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(113, 'KZ', 'Kazakhstan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(114, 'KE', 'Kenya', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(115, 'KI', 'Kiribati', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(117, 'KR', 'Korea, Republic of', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(118, 'XK', 'Kosovo', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(119, 'KW', 'Kuwait', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(120, 'KG', 'Kyrgyzstan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(121, 'LA', 'Lao People\'s Democratic Republic', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(122, 'LV', 'Latvia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(123, 'LB', 'Lebanon', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(124, 'LS', 'Lesotho', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(125, 'LR', 'Liberia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(126, 'LY', 'Libyan Arab Jamahiriya', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(127, 'LI', 'Liechtenstein', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(128, 'LT', 'Lithuania', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(129, 'LU', 'Luxembourg', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(130, 'MO', 'Macau', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(131, 'MK', 'North Macedonia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(132, 'MG', 'Madagascar', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(133, 'MW', 'Malawi', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(134, 'MY', 'Malaysia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(135, 'MV', 'Maldives', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(136, 'ML', 'Mali', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(137, 'MT', 'Malta', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(138, 'MH', 'Marshall Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(139, 'MQ', 'Martinique', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(140, 'MR', 'Mauritania', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(141, 'MU', 'Mauritius', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(142, 'TY', 'Mayotte', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(143, 'MX', 'Mexico', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(144, 'FM', 'Micronesia, Federated States of', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(145, 'MD', 'Moldova, Republic of', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(146, 'MC', 'Monaco', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(147, 'MN', 'Mongolia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(148, 'ME', 'Montenegro', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(149, 'MS', 'Montserrat', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(150, 'MA', 'Morocco', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(151, 'MZ', 'Mozambique', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(152, 'MM', 'Myanmar', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(153, 'NA', 'Namibia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(154, 'NR', 'Nauru', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(155, 'NP', 'Nepal', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(156, 'NL', 'Netherlands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(157, 'AN', 'Netherlands Antilles', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(158, 'NC', 'New Caledonia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(159, 'NZ', 'New Zealand', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(160, 'NI', 'Nicaragua', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(161, 'NE', 'Niger', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(162, 'NG', 'Nigeria', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(163, 'NU', 'Niue', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(164, 'NF', 'Norfolk Island', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(165, 'MP', 'Northern Mariana Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(166, 'NO', 'Norway', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(167, 'OM', 'Oman', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(168, 'PK', 'Pakistan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(169, 'PW', 'Palau', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(170, 'PS', 'Palestine', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(171, 'PA', 'Panama', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(172, 'PG', 'Papua New Guinea', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(173, 'PY', 'Paraguay', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(174, 'PE', 'Peru', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(175, 'PH', 'Philippines', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(176, 'PN', 'Pitcairn', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(177, 'PL', 'Poland', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(178, 'PT', 'Portugal', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(179, 'PR', 'Puerto Rico', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(180, 'QA', 'Qatar', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(181, 'RE', 'Reunion', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(182, 'RO', 'Romania', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(183, 'RU', 'Russian Federation', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(184, 'RW', 'Rwanda', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(185, 'KN', 'Saint Kitts and Nevis', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(186, 'LC', 'Saint Lucia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(187, 'VC', 'Saint Vincent and the Grenadines', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(188, 'WS', 'Samoa', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(189, 'SM', 'San Marino', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(190, 'ST', 'Sao Tome and Principe', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(191, 'SA', 'Saudi Arabia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(192, 'SN', 'Senegal', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(193, 'RS', 'Serbia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(194, 'SC', 'Seychelles', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(195, 'SL', 'Sierra Leone', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(196, 'SG', 'Singapore', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(197, 'SK', 'Slovakia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(198, 'SI', 'Slovenia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(199, 'SB', 'Solomon Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(200, 'SO', 'Somalia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(201, 'ZA', 'South Africa', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(202, 'GS', 'South Georgia South Sandwich Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(203, 'SS', 'South Sudan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(204, 'ES', 'Spain', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(205, 'LK', 'Sri Lanka', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(206, 'SH', 'St. Helena', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(207, 'PM', 'St. Pierre and Miquelon', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(208, 'SD', 'Sudan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(209, 'SR', 'Suriname', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(211, 'SZ', 'Eswatini', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(212, 'SE', 'Sweden', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(213, 'CH', 'Switzerland', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(214, 'SY', 'Syrian Arab Republic', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(215, 'TW', 'Taiwan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(216, 'TJ', 'Tajikistan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(217, 'TZ', 'Tanzania, United Republic of', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(218, 'TH', 'Thailand', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(219, 'TG', 'Togo', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(220, 'TK', 'Tokelau', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(221, 'TO', 'Tonga', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(222, 'TT', 'Trinidad and Tobago', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(223, 'TN', 'Tunisia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(224, 'TR', 'Turkey', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(225, 'TM', 'Turkmenistan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(226, 'TC', 'Turks and Caicos Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(227, 'TV', 'Tuvalu', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(228, 'UG', 'Uganda', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(229, 'UA', 'Ukraine', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(230, 'AE', 'United Arab Emirates', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(231, 'GB', 'United Kingdom', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(232, 'US', 'United States', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(233, 'UM', 'United States minor outlying islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(234, 'UY', 'Uruguay', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(235, 'UZ', 'Uzbekistan', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(236, 'VU', 'Vanuatu', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(237, 'VA', 'Vatican City State', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(238, 'VE', 'Venezuela', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(239, 'VN', 'Vietnam', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(240, 'VG', 'Virgin Islands (British)', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(241, 'VI', 'Virgin Islands (U.S.)', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(242, 'WF', 'Wallis and Futuna Islands', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(243, 'EH', 'Western Sahara', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(244, 'YE', 'Yemen', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(245, 'ZM', 'Zambia', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25'),
(246, 'ZW', 'Zimbabwe', 1, '0000-00-00 00:00:00', '2022-08-18 19:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_15_135421_create_vendors_table', 2),
(6, '2022_07_15_140628_create_admins_table', 3),
(7, '2022_07_25_163107_create_vendors_business_details_table', 4),
(8, '2022_07_25_164037_create_vendors_bank_details_table', 5),
(9, '2022_08_19_040931_create_sections_table', 6),
(10, '2022_08_23_103908_create_categories_table', 7);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', 1, NULL, '2022-08-18 22:57:14'),
(8, 'Electronics', 1, NULL, NULL),
(10, 'Appliances', 1, NULL, NULL),
(12, 'Computer', 1, '2022-08-19 16:37:15', '2022-08-19 16:38:48');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abu Hanif jowel', 'abuhanifjowel@gmail.com', NULL, '$2y$10$enar0OLSJDCZKbTUhBVXjOblNTznEAQMAoUgRwj2typBxxSSdevPW', NULL, '2022-07-02 23:15:49', '2022-07-02 23:15:49'),
(2, 'jowel', 'jowel@admin.com', NULL, '$2y$10$pslimGmWqwo5nPxeasYbyuHgjPNC8pcSiX8EpYc5Z7jHc1NKv64qS', NULL, '2022-07-17 10:32:18', '2022-07-17 10:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jhon Deo', 'CP-112', 'Dhaka', 'Dhaka', 'Bangladesh', '1207', '01875628575', 'jhon@admin.com', 0, NULL, '2022-08-18 13:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_bank_details`
--

CREATE TABLE `vendors_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_bank_details`
--

INSERT INTO `vendors_bank_details` (`id`, `vendor_id`, `account_holder_name`, `bank_name`, `account_number`, `bank_ifsc_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jhon Deo', 'AB BANK', '16410178575', '123456', NULL, '2022-07-30 09:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_business_details`
--

CREATE TABLE `vendors_business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_proof_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_licence_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_business_details`
--

INSERT INTO `vendors_business_details` (`id`, `vendor_id`, `shop_name`, `shop_address`, `shop_city`, `shop_state`, `shop_country`, `shop_pincode`, `shop_mobile`, `shop_website`, `shop_email`, `address_proof`, `address_proof_image`, `business_licence_number`, `gst_number`, `pan_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Electronic World', 'p-29MH,IDB Bhaban', 'Agargaon', 'Dhaka', 'Bangladesh', '47313526', '01847313526', 'www.jhonMart.com', 'jhon@admin.com', 'N Id', '62759.jpeg', '19951015188', '75852222', '2228575', NULL, '2022-08-18 13:16:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- Indexes for table `vendors_bank_details`
--
ALTER TABLE `vendors_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_business_details`
--
ALTER TABLE `vendors_business_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors_bank_details`
--
ALTER TABLE `vendors_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors_business_details`
--
ALTER TABLE `vendors_business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
