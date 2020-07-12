-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 05:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin admin', 'admin@jobfinder.com', NULL, '$2y$10$npEHjcGdEoDHwbKFhApPiOtDvg2t3eM0ZuvKpeJQ8oKk./WtOk9pW', NULL, '2020-05-28 05:32:38', '2020-05-28 05:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `applyjob`
--

CREATE TABLE `applyjob` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `apply_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `resume` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applyjob`
--

INSERT INTO `applyjob` (`id`, `apply_id`, `candidate_id`, `job_id`, `resume`, `created_at`, `updated_at`) VALUES
(8, 1, 2, 16, '1589284939.pdf', '2020-05-12 06:32:19', '2020-05-12 06:32:19'),
(9, 1, 2, 17, '1589284976.pdf', '2020-05-12 06:32:56', '2020-05-12 06:32:56'),
(12, 1, 1, 16, '1589292164.pdf', '2020-05-12 08:32:44', '2020-05-12 08:32:44'),
(13, 1, 1, 17, '1589432280.pdf', '2020-05-13 23:28:00', '2020-05-13 23:28:00'),
(14, 1, 7, 17, '1590584030.pdf', '2020-05-27 07:23:50', '2020-05-27 07:23:50'),
(15, 2, 7, 20, '1590651514.pdf', '2020-05-28 02:08:34', '2020-05-28 02:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cid` int(11) NOT NULL,
  `master_user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commenter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `cid`, `master_user_id`, `post_id`, `comment`, `commenter_name`, `other_user_id`, `created_at`, `updated_at`) VALUES
(12, 802, 9, 30, 'hii', 'Shivasish Dey', 7, '2020-05-30 06:09:18', '2020-05-30 06:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `followsystem`
--

CREATE TABLE `followsystem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followsystem`
--

INSERT INTO `followsystem` (`id`, `sender_id`, `reciever_id`, `created_at`, `updated_at`) VALUES
(21, 9, '7', '2020-05-27 05:35:55', '2020-05-27 05:35:55'),
(22, 9, '8', '2020-05-27 05:36:15', '2020-05-27 05:36:15'),
(23, 7, '8', '2020-05-27 05:36:58', '2020-05-27 05:36:58'),
(24, 7, '9', '2020-05-27 05:37:13', '2020-05-27 05:37:13'),
(25, 8, '7', '2020-05-27 05:39:18', '2020-05-27 05:39:18'),
(26, 8, '9', '2020-05-27 05:39:29', '2020-05-27 05:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `job_providers`
--

CREATE TABLE `job_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curr_job_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curr_job_com` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curr_job_joining_yr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_providers`
--

INSERT INTO `job_providers` (`id`, `name`, `email`, `email_verified_at`, `password`, `curr_job_post`, `curr_job_com`, `curr_job_joining_yr`, `pro_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Surendra Paswan', 'supas@company.info', NULL, '$2y$10$A1kzk6unhpEQyUY2z0EraeOiB/enkFKyWxPhBpX.EW1hQNxlWWaCW', 'Senior Recruiter', 'TATA Consultancy Services', '2016', NULL, NULL, '2020-05-03 06:12:16', '2020-05-03 06:12:16'),
(2, 'Alex Hales', 'alex444@accenture.info', NULL, '$2y$10$PbQ/N8568FQFqRasgDPywePwgkdL7EklStndaBYysuwwthfBf/x3S', 'Lead HR', 'Accenture', '2017', NULL, NULL, '2020-05-10 10:24:59', '2020-05-10 10:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers`
--

CREATE TABLE `job_seekers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reciever_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_seekers`
--

INSERT INTO `job_seekers` (`id`, `sender_name`, `message`, `reciever_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Surendra Paswan', 'hii', 'Shubham Kumar', NULL, '2020-05-30 08:59:45', '2020-05-30 08:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_sender_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_reciever_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_sender_id`, `message`, `message_reciever_id`, `created_at`, `updated_at`) VALUES
(18, 7, 'hii', 8, '2020-05-27 09:18:11', '2020-05-27 09:18:11'),
(19, 7, 'hii', 8, '2020-05-27 09:24:54', '2020-05-27 09:24:54'),
(20, 7, 'hello', 9, '2020-05-30 01:32:10', '2020-05-30 01:32:10'),
(21, 9, 'hello bro', 7, '2020-05-30 06:12:40', '2020-05-30 06:12:40');

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
(1, '2020_04_22_06660000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2020_04_22_000_create_users_table', 3),
(4, '2020_04_22_0012345670_create_users_table', 4),
(5, '2020_04_23_114116_create_users_table', 5),
(6, '2020_04_23_11423234116_create_users_table', 6),
(7, '2020_04_22_5670_create_users_table', 7),
(8, '2020_04_22_53344334670_create_users_table', 8),
(9, '2020_04_22_530_create_users_table', 9),
(10, '2020_04_25_094508_create_employees_table', 10),
(11, '2020_04_22_53123450_create_users_table', 11),
(12, '2020_04_22_12343123450_create_users_table', 12),
(13, '2020_04_22_50_create_users_table', 13),
(14, '2020_04_22_500000000000_create_users_table', 14),
(15, '2020_04_22_500_create_users_table', 15),
(16, '2020_04_22_505464440_create_users_table', 16),
(17, '2020_04_22_5440_create_users_table', 17),
(18, '2020_05_02_141232_create_posts_table', 18),
(19, '2020_05_02_141288877632_create_posts_table', 19),
(20, '2020_05_02_1632_create_posts_table', 20),
(21, '2020_05_02_12345632_create_posts_table', 21),
(22, '2020_05_02_1232_create_posts_table', 22),
(23, '2014_10_12_000000_create_users_table', 23),
(24, '2020_10_12_0123100000_create_users_table', 24),
(25, '2020_10_12_000_create_users_table', 25),
(26, '2020_05_03_114554_newjobs', 26),
(27, '2020_05_03_123456114554_newjobs', 27),
(28, '2020_05_03_124_newjobs', 28),
(29, '2020_05_03_111121224_newjobs', 29),
(30, '2020_05_07_122939_applyjob', 30),
(31, '2020_05_07_19_applyjob', 31),
(32, '2020_05_07_19123456789_applyjob', 32),
(33, '2020_05_07_1989_applyjob', 33),
(34, '2020_04_22_543245565340_create_users_table', 34),
(35, '2020_04_22_543240_create_users_table', 35),
(36, '2020_05_14_115827_commentsystem', 36),
(37, '2020_05_14_11333_commentsystem', 37),
(38, '2020_05_15_090341_followsystem', 38),
(39, '2020_05_14_1123456333_commentsystem', 39),
(40, '2020_05_14_116333_commentsystem', 40),
(41, '2020_05_14_11654576333_commentsystem', 41),
(42, '2020_05_15_123450_followsystem', 42),
(43, '2020_05_14_116543_commentsystem', 43),
(44, '2020_05_17_133621_messages', 44),
(45, '2020_05_19_112150_jobseeker', 45),
(46, '2020_05_19_112232150_jobseeker', 46),
(47, '2020_05_19_1120_jobseeker', 47),
(48, '2020_05_27_130246_create_notifications_table', 48),
(49, '2014_10_12_12343560_create_users_table', 49),
(50, '2014_10_12_12123456789_create_admin_table', 50),
(51, '2020_10_12_12123456789_create_users_table', 51),
(52, '2020_05_29_103220_reports', 52),
(53, '2020_05_29_133932_notifications', 53);

-- --------------------------------------------------------

--
-- Table structure for table `newjobs`
--

CREATE TABLE `newjobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stream` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_offer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `com_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newjobs`
--

INSERT INTO `newjobs` (`id`, `company_name`, `job_title`, `location`, `Experience`, `company_size`, `hear`, `stream`, `salary_offer`, `job_desc`, `user_id`, `com_logo`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'Extra Marks Pvt. Ltd.', 'Business Development Associate', 'Kolkata, Mumbai', 'Freshers', '1000+', 'Advertisement', 'Sales', '₹3LPA to 5LPA', 'Salary will be 4.2LPA. WE NEED CANDIDATES FOR FULL TIME.', 1, '1588767164.png', NULL, '2020-05-06 06:42:44', '2020-05-06 06:42:44'),
(19, 'Tata Consultancy Center Pvt. Ltd.', 'Customer Executive', 'Delhi, Kolkata, Pune and Chennai', 'Freshers', '1000+', 'Advertisement', 'BPO', '₹1.5LPA to ₹3LPA', 'Salary will be Rs1.8LPA. We need good communication skills. WE NEED PEOPLES FOR PART TIME.', 1, '1589124014.jpg', NULL, '2020-05-10 09:50:14', '2020-05-10 09:50:14'),
(20, 'Asian Paints', 'Marketing Manager', 'Delhi, Kolkata, Pune, Mumbai and Chennai', '4 Years', '1000+', 'Advertisement', 'Marketing', '₹15LPA to ₹30LPA', 'The salary will be 25LPA. WE NEED CANDIDATES FOR FULL TIME.', 2, '1590651240.png', NULL, '2020-05-28 02:04:00', '2020-05-28 02:04:00'),
(21, 'Cognizant Technologies. Pvt. Ltd.', 'Assistant Program Trainee', 'Delhi, Kolkata, Pune, Mumbai and Chennai', 'Freshers', '1000+', 'Advertisement', 'IT', '₹3LPA to 5LPA', 'Salary will be 4LPA. THIS WILL BE A FULL TIME JOB.', 1, '1590759919.jpg', NULL, '2020-05-29 08:15:19', '2020-05-29 08:15:19'),
(22, 'Capgemini Soln. Pvt. Ltd.', 'Software Analyst', 'Delhi, Kolkata, Pune, Mumbai and Chennai', 'Freshers', '1000+', 'Advertisement', 'IT', '₹3LPA to 5LPA', 'Salary will be 3.8LPA. THIS WILL BE A FULL TIME JOB.', 1, '1590759960.jpg', NULL, '2020-05-29 08:16:00', '2020-05-29 08:16:00'),
(23, 'Mindtree Pvt. Ltd', 'Software Developer', 'Delhi, Kolkata, Pune, Mumbai and Chennai', 'Freshers', '1000+', 'Advertisement', 'IT', '₹3LPA to 5LPA', 'Salary will be 3.2LPA. THIS WILL BE A FULL TIME JOB.', 1, '1590760098.webp', NULL, '2020-05-29 08:18:18', '2020-05-29 08:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `notification_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `from_user_id`, `notification_type`, `to_user_id`, `created_at`, `updated_at`) VALUES
(1, 7, 'message', 9, '2020-05-30 01:30:30', '2020-05-30 01:30:30'),
(2, 7, 'message', 9, '2020-05-30 01:31:38', '2020-05-30 01:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sdey025@outlook.com', '$2y$10$CsqrowAFQXh9XGJx4XI0kuVt4D3f6ChcF2hLA1FOZI.H6PARBel.W', '2020-05-12 03:38:11'),
('shivadey800@gmail.com', '$2y$10$rZSLk8lOwKPV8EvMYSqYnuNC/K69y2lWPQRx.75ofoPYUpNaBGBeK', '2020-05-12 04:37:45'),
('alsiladka@gmail.com', '$2y$10$0qiTZZmcA4pxfA8JS1BBZ.FqvAOSK7g3bhnzfMJJctsiSB0aSkECe', '2020-05-22 09:45:49'),
('rajamunger@gmail.com', '$2y$10$9L49dbGYaeT6Woh0vwpthu53ENtNhfeGK2GOJbribttFRYq2OOsKC', '2020-05-27 01:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_content`, `created_at`, `updated_at`) VALUES
(22, 1, 'Hi There!', '2020-05-12 05:53:06', '2020-05-12 05:53:06'),
(23, 3, 'Hi There! Is anyone free to play PUBG??', '2020-05-12 07:06:24', '2020-05-12 07:06:24'),
(24, 2, 'Hi There!', '2020-05-12 07:07:15', '2020-05-12 07:07:15'),
(25, 3, 'Hi friends!!', '2020-05-17 00:13:06', '2020-05-17 00:13:06'),
(28, 1, 'Hi there ! this is my new post', '2020-05-26 09:52:22', '2020-05-26 09:52:22'),
(29, 5, 'hii friends i lost the password of the old account this is my new account.      \r\n\r\n                                                                                              -shivasish dey', '2020-05-27 01:42:37', '2020-05-27 01:42:37'),
(30, 9, 'hello friends', '2020-05-27 05:35:41', '2020-05-27 05:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `report_user`
--

CREATE TABLE `report_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reported_user_id` int(11) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reporter_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_user`
--

INSERT INTO `report_user` (`id`, `reported_user_id`, `reason`, `reporter_user_id`, `created_at`, `updated_at`) VALUES
(4, 9, 'This is a bad person', 7, '2020-05-29 07:29:20', '2020-05-29 07:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adhar` bigint(20) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stream` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_group_mem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_job_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_job_com` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_job_res_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_yr_proj_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_yr_proj_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_inst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_board` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_inst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_board` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ug_inst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ug_marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ug_board` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_inst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_board` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curr_job_com` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curr_job_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curr_job_joining` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ug_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ug_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `dob`, `email`, `email_verified_at`, `password`, `adhar`, `address`, `phone`, `avatar`, `stream`, `skill`, `project_name`, `project_desc`, `number_of_group_mem`, `bio`, `prev_job_post`, `prev_job_com`, `prev_job_res_year`, `final_yr_proj_name`, `final_yr_proj_desc`, `sc_inst`, `sc_marks`, `sc_board`, `hsc_inst`, `hsc_marks`, `hsc_board`, `ug_inst`, `ug_marks`, `ug_board`, `pg_inst`, `pg_marks`, `pg_board`, `curr_job_com`, `curr_job_post`, `curr_job_joining`, `sc_year`, `hsc_year`, `ug_year`, `ug_branch`, `pg_branch`, `pg_year`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Shivasish Dey', 'Male', '1999-04-04', 'rajamunger@gmail.com', NULL, '$2y$10$32Cj6M.uy9lj.kpfIBhZ1eN4DEgM5BNc.5OVvb9knP4bAs4uCn9ai', 1234567887654321, 'Kolkata, India', 8002273579, '1590575149.jpg', 'IT', 'UI Tech, MEAN Stack, Adv. PHP with Laravel', 'Ebanking', 'Internet banking means any user with a personal computer and a browser can get connected to his bank\'s website to perform any of the virtual banking functions: Balance enquiry. Transfer of funds. Online payment of bills.', '3', 'Hi, i am Shivasish Dey', 'NA', 'NA', 'NA', 'Jofinder', 'Job portal is an application which connects employer and job seekers where employers are the source of the resources and the job seeker can find and apply for their targeted job. This document provides details about the entire software requirement specification for the online job portal.', 'DAV Public School', '7.2CGPA', 'CBSE', 'RSS Evening College', '65.4%', 'BSEB', 'Bengal College of Engineering', '7.17 CGPA', 'MAKAUT', 'NA', 'NA', 'NA', 'Capgemini', 'Analyst A4', '2020', '2014', '2016-03', '2020-05', 'Computer Science & Engineering', 'NA', NULL, NULL, '2020-05-27 04:54:57', '2020-05-27 04:55:49'),
(8, 'Riya Kumari Jain', 'Female', '1998-02-11', 'rj@gmail.com', NULL, '$2y$10$AhVuHaXF1n5h8P/q/zieS.spvi6QCfB8Bo7vV8IO6zeJgEpgwgSSy', 1232121212345343, 'Giridih, 811513', 7992436530, '1590576486.jpg', 'IT', 'PHP with MYSQL, PHP and LARAVEL', 'indie game', 'In the video game industry, an independent (indie) game refers to games typically created by ... While video games had used crowdfunding prior to 2012, several large indie game-related projects successfully raised millions of dollars through', '4', 'Hi, i am riya jain', 'NA', 'NA', 'NA', 'Jofinder', 'Job portal is an application which connects employer and job seekers where employers are the source of the resources and the job seeker can find and apply for their targeted job. This document provides details about the entire software requirement specification for the online job portal', 'BNS DAV Public School', '9.2CGPA', 'CBSE', 'BNS DAV Public School', '84%', 'CBSE', 'Bengal College of Engineering', '8.6CGPA', 'MAKAUT', 'NA', 'NA', 'NA', 'AI Solutions', 'Researcher', '2020', '2014', '2016-03', '2020-05', 'Computer Science & Engineering', 'NA', NULL, NULL, '2020-05-27 05:16:43', '2020-05-27 05:18:06'),
(9, 'Shubham Kumar', 'Male', '1998-09-23', 'subhkumar@gmail.com', NULL, '$2y$10$FV.7dz9wTUV0ecLGgyZGR.3VOwlg8gS28k/l3KJIDMHQMZMKfzSVO', 1234321567876599, 'Dhanbad', 7778532245, '1590577516.jpg', 'IT', 'UI Technology, MEAN Stack, Adv. PHP and LARAVEL', 'Snake Game', 'It is played between 2 or more players on a playing board with numbered grid squares. On certain squares on the grid are drawn a number of \"ladders\" connecting two squares together, and a number of \"snakes\" or \"chutes\" also connecting squares together.', '3', 'Hi, i am subham kumar', 'NA', 'NA', 'NA', 'Jofinder', 'Job portal is an application which connects employer and job seekers where employers are the source of the resources and the job seeker can find and apply for their targeted job. This document provides details about the entire software requirement specification for the online job portal.', 'Rajkamal Saraswati Vidya Mandir', '10CGPA', 'CBSE', 'Rajkamal Saraswati Vidya Mandir', '95.4%', 'CBSE', 'Bengal College of Engineering', '6.9CGPA', 'MAKAUT', 'NA', 'NA', 'NA', 'Bengal College of Engineering', 'Student', '2016', '2014', '2016-03', '2020-05', 'Computer Science & Engineering', 'NA', NULL, NULL, '2020-05-27 05:34:12', '2020-05-27 05:35:16');

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
-- Indexes for table `applyjob`
--
ALTER TABLE `applyjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followsystem`
--
ALTER TABLE `followsystem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_providers`
--
ALTER TABLE `job_providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_providers_email_unique` (`email`);

--
-- Indexes for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `newjobs`
--
ALTER TABLE `newjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_user`
--
ALTER TABLE `report_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_adhar_unique` (`adhar`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applyjob`
--
ALTER TABLE `applyjob`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `followsystem`
--
ALTER TABLE `followsystem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `job_providers`
--
ALTER TABLE `job_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_seekers`
--
ALTER TABLE `job_seekers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `newjobs`
--
ALTER TABLE `newjobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `report_user`
--
ALTER TABLE `report_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
