-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2021 at 09:30 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devcnbou_itjobsbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Helsinki'),
(2, 1, 'Espoo'),
(3, 1, 'Vantaa'),
(4, 1, 'Tampere'),
(5, 1, 'Turku'),
(6, 1, 'Oulu'),
(7, 2, 'Stockholm'),
(8, 2, 'Gothenburg'),
(9, 2, 'Malmo'),
(10, 3, 'Copenhagen'),
(11, 3, 'Aalborg'),
(12, 3, 'Aarhus'),
(13, 4, 'Oslo'),
(14, 5, 'Tallinn');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `details`, `created_at`, `updated_at`) VALUES
(1, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>website where you can buy and sell almost everything. The best deals are often done with people who live in your own city or on your own street, so on Bikroy.com it&#39;s easy to buy and sell locally. All you have to do is select your region.</p>\r\n\r\n<p>It takes you less than 2 minutes to post an ad on Bikroy.com. You can sign up for a free account and post ads easily every time.</p>\r\n\r\n<p>Bikroy.com has the widest selection of popular second hand items all over Bangladesh, which makes it easy to find exactly what you are looking for. So if you&#39;re looking for a car, mobile phone, house, computer or maybe a pet, you will find the best deal on Bikroy.com.</p>\r\n\r\n<p>Bikroy.com does not specialize in any specific category - here you can buy and sell items in more than 50 different categories. We also carefully review all ads that are being published, to make sure the quality is up to our standards.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2020-03-04 23:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'FINLAND'),
(2, 'SWEDEN'),
(3, 'DENMARK'),
(4, 'NORWAY'),
(5, 'ESTONIA');

-- --------------------------------------------------------

--
-- Table structure for table `c_v_s`
--

CREATE TABLE `c_v_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experiance` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) UNSIGNED NOT NULL,
  `division_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `website`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', 23.7115253, 90.4111451, 'www.dhaka.gov.bd'),
(2, 3, 'Faridpur', 'ফরিদপুর', 23.6070822, 89.8429406, 'www.faridpur.gov.bd'),
(3, 3, 'Gazipur', 'গাজীপুর', 24.0022858, 90.4264283, 'www.gazipur.gov.bd'),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', 23.0050857, 89.8266059, 'www.gopalganj.gov.bd'),
(5, 8, 'Jamalpur', 'জামালপুর', 24.937533, 89.937775, 'www.jamalpur.gov.bd'),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', 24.444937, 90.776575, 'www.kishoreganj.gov.bd'),
(7, 3, 'Madaripur', 'মাদারীপুর', 23.164102, 90.1896805, 'www.madaripur.gov.bd'),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', 0, 0, 'www.manikganj.gov.bd'),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', 0, 0, 'www.munshiganj.gov.bd'),
(10, 8, 'Mymensingh', 'ময়মনসিংহ', 0, 0, 'www.mymensingh.gov.bd'),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', 23.63366, 90.496482, 'www.narayanganj.gov.bd'),
(12, 3, 'Narsingdi', 'নরসিংদী', 23.932233, 90.71541, 'www.narsingdi.gov.bd'),
(13, 8, 'Netrokona', 'নেত্রকোণা', 24.870955, 90.727887, 'www.netrokona.gov.bd'),
(14, 3, 'Rajbari', 'রাজবাড়ি', 23.7574305, 89.6444665, 'www.rajbari.gov.bd'),
(15, 3, 'Shariatpur', 'শরীয়তপুর', 0, 0, 'www.shariatpur.gov.bd'),
(16, 8, 'Sherpur', 'শেরপুর', 25.0204933, 90.0152966, 'www.sherpur.gov.bd'),
(17, 3, 'Tangail', 'টাঙ্গাইল', 0, 0, 'www.tangail.gov.bd'),
(18, 5, 'Bogura', 'বগুড়া', 24.8465228, 89.377755, 'www.bogra.gov.bd'),
(19, 5, 'Joypurhat', 'জয়পুরহাট', 0, 0, 'www.joypurhat.gov.bd'),
(20, 5, 'Naogaon', 'নওগাঁ', 0, 0, 'www.naogaon.gov.bd'),
(21, 5, 'Natore', 'নাটোর', 24.420556, 89.000282, 'www.natore.gov.bd'),
(22, 5, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', 24.5965034, 88.2775122, 'www.chapainawabganj.gov.bd'),
(23, 5, 'Pabna', 'পাবনা', 23.998524, 89.233645, 'www.pabna.gov.bd'),
(24, 5, 'Rajshahi', 'রাজশাহী', 0, 0, 'www.rajshahi.gov.bd'),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', 24.4533978, 89.7006815, 'www.sirajganj.gov.bd'),
(26, 6, 'Dinajpur', 'দিনাজপুর', 25.6217061, 88.6354504, 'www.dinajpur.gov.bd'),
(27, 6, 'Gaibandha', 'গাইবান্ধা', 25.328751, 89.528088, 'www.gaibandha.gov.bd'),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', 25.805445, 89.636174, 'www.kurigram.gov.bd'),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', 0, 0, 'www.lalmonirhat.gov.bd'),
(30, 6, 'Nilphamari', 'নীলফামারী', 25.931794, 88.856006, 'www.nilphamari.gov.bd'),
(31, 6, 'Panchagarh', 'পঞ্চগড়', 26.3411, 88.5541606, 'www.panchagarh.gov.bd'),
(32, 6, 'Rangpur', 'রংপুর', 25.7558096, 89.244462, 'www.rangpur.gov.bd'),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', 26.0336945, 88.4616834, 'www.thakurgaon.gov.bd'),
(34, 1, 'Barguna', 'বরগুনা', 0, 0, 'www.barguna.gov.bd'),
(35, 1, 'Barishal', 'বরিশাল', 0, 0, 'www.barisal.gov.bd'),
(36, 1, 'Bhola', 'ভোলা', 22.685923, 90.648179, 'www.bhola.gov.bd'),
(37, 1, 'Jhalokati', 'ঝালকাঠি', 0, 0, 'www.jhalakathi.gov.bd'),
(38, 1, 'Patuakhali', 'পটুয়াখালী', 22.3596316, 90.3298712, 'www.patuakhali.gov.bd'),
(39, 1, 'Pirojpur', 'পিরোজপুর', 0, 0, 'www.pirojpur.gov.bd'),
(40, 2, 'Bandarban', 'বান্দরবান', 22.1953275, 92.2183773, 'www.bandarban.gov.bd'),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 23.9570904, 91.1119286, 'www.brahmanbaria.gov.bd'),
(42, 2, 'Chandpur', 'চাঁদপুর', 23.2332585, 90.6712912, 'www.chandpur.gov.bd'),
(43, 2, 'Chattogram', 'চট্টগ্রাম', 22.335109, 91.834073, 'www.chittagong.gov.bd'),
(44, 2, 'Cumilla', 'কুমিল্লা', 23.4682747, 91.1788135, 'www.comilla.gov.bd'),
(45, 2, 'Cox\'s Bazar', 'কক্স বাজার', 0, 0, 'www.coxsbazar.gov.bd'),
(46, 2, 'Feni', 'ফেনী', 23.023231, 91.3840844, 'www.feni.gov.bd'),
(47, 2, 'Khagrachhari', 'খাগড়াছড়ি', 23.119285, 91.984663, 'www.khagrachhari.gov.bd'),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', 22.942477, 90.841184, 'www.lakshmipur.gov.bd'),
(49, 2, 'Noakhali', 'নোয়াখালী', 22.869563, 91.099398, 'www.noakhali.gov.bd'),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', 0, 0, 'www.rangamati.gov.bd'),
(51, 7, 'Habiganj', 'হবিগঞ্জ', 24.374945, 91.41553, 'www.habiganj.gov.bd'),
(52, 7, 'Moulvibazar', 'মৌলভীবাজার', 24.482934, 91.777417, 'www.moulvibazar.gov.bd'),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', 25.0658042, 91.3950115, 'www.sunamganj.gov.bd'),
(54, 7, 'Sylhet', 'সিলেট', 24.8897956, 91.8697894, 'www.sylhet.gov.bd'),
(55, 4, 'Bagerhat', 'বাগেরহাট', 22.651568, 89.785938, 'www.bagerhat.gov.bd'),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', 23.6401961, 88.841841, 'www.chuadanga.gov.bd'),
(57, 4, 'Jashore', 'যশোর', 23.16643, 89.2081126, 'www.jessore.gov.bd'),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', 23.5448176, 89.1539213, 'www.jhenaidah.gov.bd'),
(59, 4, 'Khulna', 'খুলনা', 22.815774, 89.568679, 'www.khulna.gov.bd'),
(60, 4, 'Kushtia', 'কুষ্টিয়া', 23.901258, 89.120482, 'www.kushtia.gov.bd'),
(61, 4, 'Magura', 'মাগুরা', 23.487337, 89.419956, 'www.magura.gov.bd'),
(62, 4, 'Meherpur', 'মেহেরপুর', 23.762213, 88.631821, 'www.meherpur.gov.bd'),
(63, 4, 'Narail', 'নড়াইল', 23.172534, 89.512672, 'www.narail.gov.bd'),
(64, 4, 'Satkhira', 'সাতক্ষীরা', 0, 0, 'www.satkhira.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`) VALUES
(1, 'Barishal', 'বরিশাল'),
(2, 'Chattogram', 'চট্টগ্রাম'),
(3, 'Dhaka', 'ঢাকা'),
(4, 'Khulna', 'খুলনা'),
(5, 'Rajshahi', 'রাজশাহী'),
(6, 'Rangpur', 'রংপুর'),
(7, 'Sylhet', 'সিলেট'),
(8, 'Mymensingh', 'ময়মনসিংহ');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `normal_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `week` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `category_id`, `country_id`, `city_id`, `job_name`, `company_name`, `company_email`, `salary`, `deadline`, `details`, `response`, `requirements`, `apply`, `website_link`, `apply_link`, `tags`, `remote`, `company_logo`, `logo`, `normal_background`, `special_background`, `background_color`, `week`, `month`, `active`, `total_cost`, `payment`, `payment_type`, `transaction_id`, `created_at`, `updated_at`) VALUES
(5, '7', '15', '1', '35', 'afasfsf afasfsf afasfsfafasfsf', 'Complex', 'alifhossain174@gmail.com', 'acasc', NULL, '<p>asc</p>', '<p>scasc</p>', '<p>ascasc</p>', '<p>ascasc</p>', 'asc', NULL, 'ascasc,asc,ascasc,asc,asc', NULL, NULL, '0', '0', '0', '#000000', '200', '0', '1', '200', '1', 'Bkash', '3634346346', '2020-04-28 14:34:58', '2020-04-28 14:41:01'),
(6, '7', '16', '2', '42', 'afasfsf', 'Complex', 'alifhossain174@gmail.com', 'acasc', NULL, '<p>asc</p>', '<p>scasc</p>', '<p>ascasc</p>', '<p>ascasc</p>', 'asc', NULL, 'ascasc,asc,ascasc,asc,asc', NULL, NULL, '0', '0', '0', '#000000', '200', '0', '1', '200', '1', 'Bkash', '253436456', '2020-04-28 14:37:23', '2020-04-28 14:40:59'),
(7, '7', '14', '1', '35', 'Web Developer', 'ascasc', 'alifhossain174@gmail.com', '242343', NULL, '<p>asdasd</p>', '<p>asdasdasd</p>', '<p>asdasdasd</p>', '<p>asdasdasd</p>', 'asdas', NULL, 'Laravel,PHP,JavaScript,Ajax', NULL, NULL, '0', '50', '0', '#000000', '0', '0', '1', '50', '1', 'Bkash', '12312414', '2020-04-30 13:09:33', '2020-04-30 13:11:01'),
(8, '7', '15', '1', '35', 'ascasc', 'ascasc', 'alifhossain174@gmail.com', 'ascc', NULL, '<p>ascas</p>', '<p>asca</p>', '<p>casc</p>', '<p>ascasc</p>', 'ascasc', NULL, 'ascasc,cas,cas,cs,cacs,asc', NULL, NULL, '0', '0', '0', '#000000', '0', '0', '0', '0', '1', 'Bkash', 'ascasc', '2020-05-01 01:30:26', '2020-05-01 01:30:31'),
(9, '7', '15', '2', '42', 'Test', 'Test', 'alifhossain174@gmail.com', '123456', '2020-05-05', '<p>xcvxcv</p>', '<p>cxvxc</p>', '<p>xcvxcv</p>', '<p>xcvxcv</p>', 'asdfghbn', NULL, 'xcv,xcvxcvcxv,xcv', 'yes', 'company_logos/Nya2e.jpg', '100', '50', '0', '#000000', '0', '0', '0', '150', '1', 'Bkash', '234567', '2020-05-01 14:13:07', '2020-05-01 14:13:13'),
(10, '7', '16', '3', '3', 'sdvsdv', 'sdvsdv', 'alifhossain174@gmail.com', 'sdvsdv', NULL, '<p>sdv</p>', '<p>sdvsdv</p>', '<p>sdvsdv</p>', NULL, 'sdvsdv', NULL, 'sdvdsv,sdv,sdvdsv,sdv,sdvdv', NULL, NULL, '0', '50', '0', '#000000', '0', '0', '0', '50', '1', 'Bkash', '124234334', '2020-05-03 11:11:00', '2020-05-03 11:11:06'),
(11, NULL, '14', '3', '2', 'sg', 'sdf', 'asdf@gmail.com', 'asdf', '2020-05-17', '<p>sadfsd</p>', '<p>sadfsa</p>', '<p>asdf</p>', '<p>sdfsad</p>', 'asdf', NULL, 'dsf', NULL, 'company_logos/viEe9.jpg', '0', '0', '0', '#000000', '0', '0', '0', '0', NULL, NULL, NULL, '2020-05-07 22:27:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(14, 'Frontend', '2020-02-05 01:16:38', NULL),
(15, 'Backend', '2020-02-05 01:16:43', NULL),
(16, 'Fullstack', '2020-02-05 01:16:47', NULL),
(17, 'Cloud', '2020-02-05 01:16:51', NULL),
(18, 'Product', '2020-02-05 01:16:56', NULL),
(19, 'Mobile App', '2020-02-05 01:17:08', NULL),
(20, 'Devops', '2020-02-05 01:17:15', NULL),
(22, 'Data Science', '2020-02-05 01:17:27', NULL),
(23, 'QA/Testing', '2020-04-24 12:13:23', NULL),
(24, 'Govt Jobs', '2020-04-24 12:15:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_c_v_s`
--

CREATE TABLE `job_c_v_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_02_02_070755_create_job_categories_table', 3),
(12, '2014_10_12_000000_create_users_table', 4),
(21, '2020_03_05_040134_create_terms_table', 6),
(22, '2020_03_05_040513_create_privacies_table', 6),
(23, '2020_03_05_040557_create_contacts_table', 6),
(24, '2020_04_24_180346_create_side_ads_table', 7),
(26, '2020_04_27_065651_create_c_v_s_table', 8),
(29, '2020_01_30_103003_create_jobs_table', 9),
(30, '2020_04_29_092000_create_job_c_v_s_table', 10);

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
-- Table structure for table `privacies`
--

CREATE TABLE `privacies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacies`
--

INSERT INTO `privacies` (`id`, `details`, `created_at`, `updated_at`) VALUES
(1, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>website where you can buy and sell almost everything. The best deals are often done with people who live in your own city or on your own street, so on Bikroy.com it&#39;s easy to buy and sell locally. All you have to do is select your region.</p>\r\n\r\n<p>It takes you less than 2 minutes to post an ad on Bikroy.com. You can sign up for a free account and post ads easily every time.</p>\r\n\r\n<p>Bikroy.com has the widest selection of popular second hand items all over Bangladesh, which makes it easy to find exactly what you are looking for. So if you&#39;re looking for a car, mobile phone, house, computer or maybe a pet, you will find the best deal on Bikroy.com.</p>\r\n\r\n<p>Bikroy.com does not specialize in any specific category - here you can buy and sell items in more than 50 different categories. We also carefully review all ads that are being published, to make sure the quality is up to our standards.</p>', NULL, '2020-03-04 23:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `side_ads`
--

CREATE TABLE `side_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `side` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `side_ads`
--

INSERT INTO `side_ads` (`id`, `side`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'left', 'ads/1587754174VZGzT.jpg', 'https://getbootstrap.com/', '2020-04-24 12:49:35', NULL),
(2, 'right', 'ads/15877541987WyEW.jpg', 'https://fontawesome.com/', '2020-04-24 12:49:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `details`, `created_at`, `updated_at`) VALUES
(1, '<h1>&nbsp;</h1>\r\n\r\n<p><strong>Terms &amp; Conditions</strong></p>\r\n\r\n<p>Bikroy.com is a service provided by Saltside Technologies AB (subject to your compliance with the Terms and Conditions set forth below). Please read these Terms and Conditions before using this Web Site.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>General</strong></p>\r\n\r\n<p>Advertisers and users are responsible for ensuring that advertising content, text, images, graphics, video (&quot;Content&quot;) uploaded for inclusion on Bikroy.com complies with all applicable laws. Bikroy.com &amp; Saltside Technologies AB assumes no responsibility for any illegality or any inaccuracy of the Content.</p>\r\n\r\n<p>The advertisers and user guarantees that his or her Content do not violate any copyright, intellectual property rights or other rights of any person or entity, and agrees to release Bikroy.com and Saltside Technologies AB from all obligations, liabilities and claims arising in connection with the use of (or the inability to use) the service.</p>\r\n\r\n<p>Advertisers agree that their Content can may be presented through Bikroy.com&#39;s partner sites under the same terms and conditions as on Bikroy.com.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Copyright</strong></p>\r\n\r\n<p>Advertisers grant Bikroy.com and Saltside Technologies AB a perpetual, royalty-free, irrevocable, non-exclusive right and license to use, reproduce, modify, adapt, publish, translate, create derivative works from and distribute such Content or incorporate such Content into any form, medium, or technology now known or later developed.</p>\r\n\r\n<p>The material (including the Content, and any other content, software or services) contained on Bikroy.com are the property of Saltside Technologies AB, its subsidiaries, affiliates and/or third party licensors. Any intellectual property rights, such as copyright, trademarks, service marks, trade names and other distinguishing brands on the Web Site are the property of Saltside Technologies AB. To be clear: No material on this site may be copied, reproduced, republished, installed, posted, transmitted, stored or distributed without written permission from Saltside Technologies AB.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Buy Now service</strong></p>\r\n\r\n<p>Buy Now is a service provided by Bikroy.com to deliver and handle payment of purchases made through Bikroy.com.</p>\r\n\r\n<p>Bikroy.com charges a fee (&quot;service charge&quot;) to Sellers when an item is delivered to a Buyer and the Buyer pays for the item. If the Buyer is unwilling or unavailable to buy the item, Bikroy.com will return the item to the Seller against payment of a return fee. Bikroy.com reserves the right to amend these fees at any time.</p>\r\n\r\n<p>By listing an item for sale on Bikroy.com, Sellers undertake the following:</p>\r\n\r\n<ul>\r\n	<li>To accept delivery of any items ordered by Buyers using &ldquo;Buy Now&rdquo; unless the items are out of stock. Bikroy.com reserves the right to delete ads upon refusal of delivery</li>\r\n	<li>To provide for delivery item(s) that match the order received in terms of quality and quantity, as advertised in the listing</li>\r\n	<li>That they have the lawful right and necessary registrations and license to sell the advertised item</li>\r\n	<li>To appropriately pack and prepare the item for delivery. Bikroy.com does not provide installation or dismantling services</li>\r\n	<li>Not to encourage Buyers who have placed orders using &ldquo;Buy Now&rdquo; to complete the purchase outside of Bikroy.com</li>\r\n	<li>To accept payment of the item price, minus the service charge, within a reasonable timeframe upon successful sale of an item</li>\r\n	<li>To pay a return fee for return of an item when a Buyer is unwilling or unavailable to purchase the item.</li>\r\n	<li>To pay any taxes due if and when the item is sold.</li>\r\n</ul>', NULL, '2020-03-04 22:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Decode Lab', 'admin@jobs.com', NULL, 'admin', NULL, '$2y$10$9x/ECTOxJMM6Djx4x1yrcuP8o6k9QsuZLystTPPrB0A5rHUnIm78O', NULL, '2020-02-02 05:12:20', '2020-02-02 05:12:20'),
(3, 'Comlex2', 'user@gmail.com', NULL, 'user', NULL, '$2y$10$rJSO4MAR2.Xqy7UuWFLsvum5MUh7IQkkSU/uCX.k8CeFeElXbBcVi', NULL, '2020-02-02 06:13:31', '2020-02-02 06:13:31'),
(7, 'Complex', 'alifhossain174@gmail.com', NULL, 'user', NULL, '$2y$10$2Ymj/O8AKF3/cTlHa4sS2u1yxLQojE8bYtLfpMkEMbDWfkB.f8/BK', NULL, '2020-04-28 14:35:05', NULL),
(8, 'Rajiur Rahman', 'raj@gmail.com', NULL, 'admin', NULL, '$2y$10$LkfjDm1imq6.eDC1kqjby.WEUgu4gP4cKy.a71gtx.A.ZYHqQucFK', NULL, '2021-03-26 16:59:37', '2021-03-26 16:59:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_v_s`
--
ALTER TABLE `c_v_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_c_v_s`
--
ALTER TABLE `job_c_v_s`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `privacies`
--
ALTER TABLE `privacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_ads`
--
ALTER TABLE `side_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
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
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `c_v_s`
--
ALTER TABLE `c_v_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `job_c_v_s`
--
ALTER TABLE `job_c_v_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `privacies`
--
ALTER TABLE `privacies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `side_ads`
--
ALTER TABLE `side_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
