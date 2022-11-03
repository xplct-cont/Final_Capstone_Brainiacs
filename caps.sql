-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 08:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caps`
--

-- --------------------------------------------------------

--
-- Table structure for table `anecdotal_records`
--

CREATE TABLE `anecdotal_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `observation_date_time` datetime DEFAULT NULL,
  `description_of_incident` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_of_incidents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actions_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anecdotal_records`
--

INSERT INTO `anecdotal_records` (`id`, `student_id`, `observation_date_time`, `description_of_incident`, `location_of_incidents`, `actions_taken`, `recommendations`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-11-03 10:24:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 18:24:43', '2022-11-02 18:24:43'),
(3, 34, '2022-11-03 13:20:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 21:20:41', '2022-11-02 21:20:41'),
(5, 31, '2022-11-03 13:28:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 21:28:36', '2022-11-02 21:28:36'),
(6, 36, '2022-11-03 13:28:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 21:28:49', '2022-11-02 21:28:49'),
(7, 11, '2022-11-03 13:35:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 21:35:41', '2022-11-02 21:35:41'),
(8, 8, '2022-11-03 13:41:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 21:41:52', '2022-11-02 21:41:52'),
(9, 14, '2022-10-29 12:57:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 21:57:51', '2022-11-02 21:57:51'),
(10, 59, '2022-11-03 14:02:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 22:03:26', '2022-11-02 22:03:26'),
(11, 60, '2022-11-03 14:23:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 22:23:44', '2022-11-02 22:23:44'),
(12, 23, '2022-05-30 14:32:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 22:32:30', '2022-11-02 22:32:30'),
(13, 62, '2022-11-03 14:35:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 22:35:52', '2022-11-02 22:35:52'),
(14, 17, '2022-07-03 14:37:00', 'Test', 'Test', 'Test', 'Test', '2022-11-02 22:37:51', '2022-11-02 22:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `career_interest_test_results`
--

CREATE TABLE `career_interest_test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `interest_result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `career_interest_test_results`
--

INSERT INTO `career_interest_test_results` (`id`, `student_id`, `interest_result`, `created_at`, `updated_at`) VALUES
(1, 14, '1667455314.jpg', '2022-11-02 22:01:55', '2022-11-02 22:01:55'),
(2, 59, '1667455647.jpg', '2022-11-02 22:07:28', '2022-11-02 22:07:28'),
(3, 31, '1667456517.jpg', '2022-11-02 22:21:58', '2022-11-02 22:21:58'),
(4, 60, '1667456863.jpg', '2022-11-02 22:27:44', '2022-11-02 22:27:44'),
(5, 23, '1667457355.jpg', '2022-11-02 22:35:56', '2022-11-02 22:35:56'),
(6, 62, '1667457589.jpg', '2022-11-02 22:39:49', '2022-11-02 22:39:49'),
(7, 17, '1667457626.jpg', '2022-11-02 22:40:27', '2022-11-02 22:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `counseling_anecdotal_records`
--

CREATE TABLE `counseling_anecdotal_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date_time_called` datetime DEFAULT NULL,
  `reasons_for_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reasons_for_referral` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `follow_up_counseling_session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behavior_observed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_findings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinical_impressions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counseling_anecdotal_records`
--

INSERT INTO `counseling_anecdotal_records` (`id`, `student_id`, `date_time_called`, `reasons_for_contact`, `referred_by`, `reasons_for_referral`, `follow_up_counseling_session`, `behavior_observed`, `interview_findings`, `clinical_impressions`, `recommendation`, `created_at`, `updated_at`) VALUES
(1, 59, '2022-11-03 14:04:00', 'Interview', 'Joy lupian', 'Service', '1st Counseling Session', 'Good', 'Very good', 'Nice', 'Good', '2022-11-02 22:05:32', '2022-11-02 22:05:32'),
(2, 14, '2023-02-03 14:07:00', 'Interview', 'Kenn Cucharo', 'Test', '2nd Counseling Session', 'Test', 'Test', 'Test', 'Test', '2022-11-02 22:08:10', '2022-11-02 22:08:10'),
(3, 31, '2020-11-03 14:22:00', 'Interview', 'Reynald Sauro', 'Test', '5th Counseling Session', 'Test', 'Test', 'Test', 'Test', '2022-11-02 22:22:42', '2022-11-02 22:22:42'),
(4, 60, '2022-11-03 14:24:00', 'Interview', 'Joy lupian', 'Interview', '2nd Counseling Session', 'Behavior', 'Matters', 'Goods', 'Nice', '2022-11-02 22:25:00', '2022-11-02 22:25:00'),
(5, 62, '2022-11-03 14:36:00', 'Interview', 'Joy lupian', 'Discuss', '1st Counseling Session', 'Observed', 'Goods', 'Very good', 'Nice', '2022-11-02 22:37:04', '2022-11-02 22:37:04'),
(6, 17, '2022-07-03 14:38:00', 'Regular Counseling', 'Ryan Patayon', 'Test', '4th Counseling Session', 'Test', 'Test', 'Test', 'Test', '2022-11-02 22:38:38', '2022-11-02 22:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title_of_the_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date_time` datetime DEFAULT NULL,
  `location_of_the_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title_of_the_event`, `event_date_time`, `location_of_the_event`, `created_at`, `updated_at`) VALUES
(1, 1, 'PNHS Acquaintance Party 2022', '2022-11-03 14:06:00', 'PNHS Main Ground', '2022-11-02 22:06:34', '2022-11-02 22:06:34');

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
(5, '2022_09_09_020733_create_events', 1),
(6, '2022_09_24_232859_create_students', 1),
(7, '2022_10_10_053607_create_anecdotal_records', 1),
(8, '2022_10_14_235130_create_counseling_anecdotal_records', 1),
(9, '2022_10_25_042858_create_parent_conference_records', 1),
(10, '2022_10_31_103340_create_career_interest_test_results', 1),
(11, '2022_11_01_030934_create_personality_test_results', 1),
(12, '2022_11_02_021432_create_student_information_sheets', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_conference_records`
--

CREATE TABLE `parent_conference_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `relation_to_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_for_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inquiries_referral_appointment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_concern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topics_discussed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suggested_resolution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_conference_records`
--

INSERT INTO `parent_conference_records` (`id`, `student_id`, `date`, `relation_to_student`, `reason_for_contact`, `inquiries_referral_appointment`, `problem_concern`, `topics_discussed`, `suggested_resolution`, `action_taken`, `created_at`, `updated_at`) VALUES
(1, 14, '2023-01-08', 'Guardian', 'Feedback on the child progress', 'Appointment Letter Sent', 'Test', 'Test', 'Test', 'Resolved', '2022-11-02 22:07:14', '2022-11-02 22:07:14'),
(2, 59, '2022-11-03', 'Classmate', 'Feedback on the child progress', 'Appointment Set by the Parents', 'Paperworks', 'Guidance', 'N/A', 'Resolved', '2022-11-02 22:12:41', '2022-11-02 22:12:41'),
(4, 31, '2022-11-27', 'Neighbor', 'Referral', 'Appointment Letter Sent', 'Test', 'Test', 'Test', 'Resolved', '2022-11-02 22:19:28', '2022-11-02 22:19:28'),
(5, 60, '2022-11-03', 'Classmate', 'Appointment', 'Contacted by the Counselor', 'Guidance', 'How to succeed', 'Resolved', 'Resolved', '2022-11-02 22:26:27', '2022-11-02 22:26:27'),
(6, 23, '2021-11-03', 'Guardian', 'Inquiries', 'Appointment Letter Sent', 'Test', 'Test', 'Test', 'Resolved', '2022-11-02 22:35:03', '2022-11-02 22:35:03'),
(7, 62, '2022-11-03', 'Classmate', 'Appointment', 'Contacted by the Counselor', 'Guidance', 'Guidance', 'Resolved', 'Resolved', '2022-11-02 22:38:26', '2022-11-02 22:38:26'),
(8, 17, '2022-09-01', 'Guardian', 'Inquiries', 'Contacted by the Counselor', 'Test', 'Test', 'Test', 'Resolved', '2022-11-02 22:40:00', '2022-11-02 22:40:00');

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
-- Table structure for table `personality_test_results`
--

CREATE TABLE `personality_test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `personality_result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personality_test_results`
--

INSERT INTO `personality_test_results` (`id`, `student_id`, `personality_result`, `created_at`, `updated_at`) VALUES
(1, 2, '1667443737.jpg', '2022-11-02 18:48:58', '2022-11-02 18:48:58'),
(2, 1, '1667454908.jpg', '2022-11-02 21:55:08', '2022-11-02 21:55:08'),
(3, 14, '1667455199.jpg', '2022-11-02 22:00:00', '2022-11-02 22:00:00'),
(4, 59, '1667456268.jpg', '2022-11-02 22:17:48', '2022-11-02 22:17:48'),
(5, 31, '1667456438.jpg', '2022-11-02 22:20:40', '2022-11-02 22:20:40'),
(6, 60, '1667456925.jpg', '2022-11-02 22:28:46', '2022-11-02 22:28:46'),
(7, 23, '1667457423.jpg', '2022-11-02 22:37:04', '2022-11-02 22:37:04'),
(8, 62, '1667457643.jpg', '2022-11-02 22:40:44', '2022-11-02 22:40:44'),
(9, 17, '1667457776.jpg', '2022-11-02 22:42:57', '2022-11-02 22:42:57');

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image18.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `firstname`, `lastname`, `middlename`, `gender`, `age`, `year_section`, `email`, `parent_name`, `parent_email`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ginny', 'Weasley', 'Nigellus', 'Female', '20', 'Grade 11 - Wisdom', 'ginny@gmail.com', 'Greg Weasley', 'george@gmail.com', 'Lomboy, Calape, Bohol', 'image18.png', '2022-11-02 18:23:02', '2022-11-02 18:23:07'),
(2, 2, 'Alonica', 'Cantoneros', 'Jurolan', 'Female', '18', 'Grade 11 - Charity', 'alonica.cantoneros@gmail.com', 'Corazon Cantoneros', 'corazon.cantoneros@gmail.com', 'Pooc Oriental, Tubigon, Bohol', 'image18.png', '2022-11-02 18:23:39', '2022-11-02 18:23:39'),
(3, 2, 'Maria Lynn', 'Malbas', 'Asombrado', 'Female', '17', 'Grade 11 - Charity', 'maria.lynmalbas@gmail.com', 'Marie Malbas mariemalbas@gmail.com', 'mariemalbas@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:19:14', '2022-11-02 20:19:14'),
(4, 2, 'Kim Vincent', 'Cucharo', 'Cordano', 'Male', '18', 'Grade 11 - Charity', 'kimvincentcucharo@gmail.com', 'Teodoro Cucharo', 'mariafatimacucharo@gmail.com', 'Ulbujan, Calape, Bohol', 'image18.png', '2022-11-02 20:22:07', '2022-11-02 20:22:07'),
(5, 2, 'Kaven', 'Cucharo', 'Cordano', 'Male', '18', 'Grade 11 - Charity', 'kavencucharo@gmail.com', 'Maria Fatima Cucharo', 'teodorocucharo@gmail.com', 'Ulbujan, Calape, Bohol', 'image18.png', '2022-11-02 20:24:08', '2022-11-02 20:24:08'),
(6, 3, 'Kenneth', 'Delima', 'Sebuco', 'Male', '22', 'Grade 11 - Faith', 'kennethdelima@gmail.com', 'Josephine Delima', 'josephine@gmail.com', 'Panayton Tubigon Bohol', 'image18.png', '2022-11-02 20:27:40', '2022-11-02 20:27:40'),
(7, 2, 'Kenneth', 'Cucharo', 'Cordano', 'Male', '18', 'Grade 11 - Charity', 'kennethcucharo@gmail.com', 'Samuel Cucharo', 'samuelcucharo@gmail.com', 'Labu-on, Calape, Bohol', 'image18.png', '2022-11-02 20:30:03', '2022-11-02 20:30:03'),
(8, 4, 'Amie', 'Amporado', 'Pecolados', 'Female', '20', 'Grade 12 - Hope', 'amieamporado1@gmail.com', 'Anabel Pecolados', 'anabelpecolados1@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:30:27', '2022-11-02 20:30:27'),
(9, 3, 'Krizhia', 'Cuharo', 'Cordano', 'Female', '21', 'Grade 11 - Faith', 'krizhiacucharo@gmail.com', 'Ma. Fatima Cucharo', 'fatimacucharo@gmail.com', 'Calape Bohol', 'image18.png', '2022-11-02 20:30:45', '2022-11-02 20:30:45'),
(10, 2, 'Meriel', 'Cordano', 'Tampon', 'Female', '18', 'Grade 11 - Charity', 'merielcordano@gmail.com', 'Merideth Cordano', 'meridethcordano@gmail.com', 'Binogawan, Calape, Bohol', 'image18.png', '2022-11-02 20:31:57', '2022-11-02 20:31:57'),
(11, 4, 'Vernie', 'Amodia', 'Parinasan', 'Male', '20', 'Grade 12 - Hope', 'Vernieamodia@yahoo.com', 'Veronica Parinasan', 'veronicaparinasan1@gmail.com', 'Macaas, Tubigon, Bohol', 'image18.png', '2022-11-02 20:31:58', '2022-11-02 20:31:58'),
(12, 3, 'Karen', 'Cucharo', 'Cordano', 'Female', '22', 'Grade 11 - Faith', 'karsycucharo@gmail.com', 'Teodoro Cucharo', 'pacitagallego@gmail.com', 'Calape Bohol', 'image18.png', '2022-11-02 20:33:00', '2022-11-02 20:33:00'),
(13, 4, 'Emily', 'Paloguer', 'Sateniaman', 'Female', '22', 'Grade 12 - Hope', 'emily.langgoy@yahoo.com', 'Emilia Langgoy', 'emilialanggoy2@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:33:16', '2022-11-02 20:33:16'),
(14, 2, 'Joy', 'Aparicio', 'Ajoc', 'Female', '18', 'Grade 11 - Charity', 'joyaparicio@gmail.com', 'Agnes Aparicio', 'agnes.aparicio@gmail.com', 'Cabulijan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:33:37', '2022-11-02 20:33:37'),
(15, 4, 'Dan Alfie', 'Mencede', 'Torrejas', 'Male', '20', 'Grade 12 - Hope', 'alfiemencede3@gmail.com', 'Josefina Mencede', 'josefinamencede3@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:34:38', '2022-11-02 20:34:38'),
(17, 2, 'Jeyward', 'Bacolod', 'Sauro', 'Male', '18', 'Grade 11 - Charity', 'jeyward.sauro@gmail.com', 'Hanes Sauro', 'hanes.sauro@gmail.com', 'Looc, Inabanga, Bohol', 'image18.png', '2022-11-02 20:35:28', '2022-11-02 20:35:28'),
(18, 4, 'Sherly', 'Pecolados', 'Torrejas', 'Female', '23', 'Grade 12 - Hope', 'sherlypecolados4@gmail.com', 'Lucia Pecolados', 'luciapecolados4@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:36:36', '2022-11-02 20:36:36'),
(19, 2, 'Justine', 'Davila', 'Calunia', 'Female', '18', 'Grade 11 - Charity', 'justine.davila@gmail.com', 'Magnus Davila', 'magnus.davila@gmail.com', 'Luyo, Calape, Bohol', 'image18.png', '2022-11-02 20:37:39', '2022-11-02 20:37:39'),
(20, 4, 'Lialyn', 'Jao', 'Pecolados', 'Female', '20', 'Grade 12 - Hope', 'lailynjao5@gmail.com', 'Ann Jao', 'Annjao5@gmail.com', 'Pinayagan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:39:33', '2022-11-02 20:39:33'),
(21, 4, 'Precious Ann', 'Rico', 'Millianes', 'Female', '25', 'Grade 12 - Hope', 'preciousrico6@gmail.com', 'Precy Rico', 'precyrico@gmail.com', 'Inabangga, Bohol', 'image18.png', '2022-11-02 20:42:39', '2022-11-02 20:42:39'),
(22, 4, 'RJ', 'Palomaria', 'Torrejas', 'Male', '20', 'Grade 12 - Hope', 'Rjpalomaria@gmail.com', 'Sherilou Torrejas', 'sheriloutorrejas@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:45:43', '2022-11-02 20:45:43'),
(23, 2, 'Ivy', 'Babad', 'Batausa', 'Male', '18', 'Grade 11 - Charity', 'ivy.babad@gmail.com', 'Vincent Babad', 'vincent.babad@gmail.com', 'Sta.Cruz, Calape, Bohol', 'image18.png', '2022-11-02 20:45:49', '2022-11-02 20:45:49'),
(24, 2, 'Alberto', 'Fronteras', 'Duran', 'Male', '18', 'Grade 11 - Charity', 'alberto.fronteras@gmail.com', 'Maribel Fronteras', 'maribel.fronteras@gmail.com', 'Ulbujan, Calape, Bohol', 'image18.png', '2022-11-02 20:47:10', '2022-11-02 20:47:10'),
(25, 4, 'Ana Marie Bianca', 'Papa', 'Talaboc', 'Female', '25', 'Grade 12 - Hope', 'anamariebianca@gmail.com', 'Analisa Talaboc', 'analizatalaboc32@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:47:39', '2022-11-02 20:47:39'),
(26, 2, 'Mhardele', 'Gulayan', 'Oyao', 'Male', '18', 'Grade 11 - Charity', 'mhardele.gulayan@gmail.com', 'Marites Gulayan', 'marites.gulayan@gmail.com', 'Sta.Cruz, Calape, Bohol', 'image18.png', '2022-11-02 20:48:59', '2022-11-02 20:48:59'),
(27, 4, 'Racel', 'Mencede', 'Torrejas', 'Female', '22', 'Grade 12 - Hope', 'racelmencede@gmail.com', 'Josefina Mencede', 'josefinamencede@gmail.com', 'Caloocan, City', 'image18.png', '2022-11-02 20:49:43', '2022-11-02 20:49:43'),
(28, 2, 'Jethro', 'Ladeza', 'Obguia', 'Male', '18', 'Grade 11 - Charity', 'jethrows.ladeza@gmail.com', 'Maricar Ladeza', 'maricar.ladeza@gmail.com', 'Panaytayon, Tubigon, Bohol', 'image18.png', '2022-11-02 20:50:44', '2022-11-02 20:50:44'),
(29, 4, 'Venus', 'Bagsic', 'Baquerosa', 'Female', '20', 'Grade 12 - Hope', 'venusbagsic21@gmail.com', 'Victoria Bagsic', 'victoriabagsic1@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:50:54', '2022-11-02 20:50:54'),
(30, 3, 'Kyle', 'Buladaco', 'Orendain', 'Male', '22', 'Grade 11 - Faith', 'kylebuladaco@gmail.com', 'Conchita Buladaco', 'conchitabuladaco@gmail.com', 'Calape Bohol', 'image18.png', '2022-11-02 20:51:57', '2022-11-02 20:51:57'),
(31, 2, 'Sophia Nicole', 'Aranas', 'Ajoc', 'Female', '18', 'Grade 11 - Charity', 'sophianicole.aranas@gmail.com', 'Andrea Aranas', 'andrea.aranas@gmail.con', 'Putohan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:52:08', '2022-11-02 20:52:08'),
(32, 4, 'Rea', 'Ruba', 'Badilla', 'Female', '21', 'Grade 12 - Hope', 'rearuba1@gmail.com', 'Jessa Ruba', 'jessaruba1@gmail.com', 'Macaas, Tubigon, Bohol', 'image18.png', '2022-11-02 20:52:44', '2022-11-02 20:52:44'),
(33, 3, 'Reynald', 'Sauro', 'Aguelo', 'Male', '23', 'Grade 11 - Faith', 'reynaldsauro@gmail.com', 'Ricardo Sauro', 'ricardosauro@gmail.com', 'Inabangga Bohol', 'image18.png', '2022-11-02 20:53:45', '2022-11-02 20:53:45'),
(34, 4, 'Jessa', 'Albura', 'Pecolados', 'Female', '19', 'Grade 12 - Hope', 'jessaalbura@gmail.com', 'Anabel Pecolados', 'anabelpecolados@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:54:02', '2022-11-02 20:54:02'),
(35, 2, 'Xianne', 'Gaza', 'Mari', 'Female', '18', 'Grade 11 - Charity', 'xianne.gaza@gmail.com', 'Olive Gaza', 'olive.green@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:54:25', '2022-11-02 20:54:25'),
(36, 4, 'Jessie', 'Albura', 'Pecolados', 'Male', '20', 'Grade 12 - Hope', 'jessiealbura@gmail.com', 'Anabel Pecolados', 'anabelpecolados23@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:54:59', '2022-11-02 20:54:59'),
(37, 2, 'Aj', 'Nilo', 'Tampon', 'Male', '17', 'Grade 11 - Charity', 'aj.nilo@gmail.com', 'Joel Nilo', 'joel.nilo@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:55:36', '2022-11-02 20:55:36'),
(39, 4, 'Mirasol', 'Bagsic', 'Baquerosa', 'Female', '23', 'Grade 12 - Hope', 'mirabagsic21@gmail.com', 'Victoria Bagsic', 'victoriabagsic11@gmail.com', 'Caloocan, City', 'image18.png', '2022-11-02 20:56:08', '2022-11-02 20:56:08'),
(40, 4, 'Nina Mae', 'Pecolados', 'Torrejas', 'Female', '24', 'Grade 12 - Hope', 'ninamae15@gmail.com', 'Lucia Pecolados', 'luciapecolados14@gmail.com', 'Pasay city', 'image18.png', '2022-11-02 20:57:39', '2022-11-02 20:57:39'),
(41, 3, 'keneth', 'Licame', 'Anosa', 'Male', '22', 'Grade 11 - Faith', 'kenethanosa@gmail.com', 'Fatima Licame', 'fatimalicame@gmail.com', 'Inabangga Bohol', 'image18.png', '2022-11-02 20:58:15', '2022-11-02 20:58:15'),
(42, 2, 'Ivan Anne', 'Udtoon', 'Udtohan', 'Female', '18', 'Grade 11 - Charity', 'annegwapa@gmail.com', 'Carlo Udtoon', 'carlo.udtoon@gmail.com', 'Pinayaga Sur, Tubigon, Bohol', 'image18.png', '2022-11-02 20:58:17', '2022-11-02 20:58:17'),
(43, 4, 'Joshua', 'Mencede', 'Torrejas', 'Male', '19', 'Grade 12 - Hope', 'joshuamencede26@gmail.com', 'Perlita Torrejas', 'perlitatorrejas4@gmail.com', 'Caloocan, City', 'image18.png', '2022-11-02 20:59:02', '2022-11-02 20:59:02'),
(44, 2, 'Rennan', 'Piodos', 'Cantones', 'Male', '18', 'Grade 11 - Charity', 'rennangwapoo@gmail.com', 'Jacob Piodos', 'jacob.piodos@gmail.com', 'Tultugan, Calape, Bohol', 'image18.png', '2022-11-02 20:59:33', '2022-11-02 20:59:33'),
(45, 4, 'Bare', 'Mencede', 'Torrejas', 'Male', '24', 'Grade 12 - Hope', 'baremencede22@gmail.com', 'Josefina Mencede', 'josefinamencede22@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 20:59:56', '2022-11-02 20:59:56'),
(46, 3, 'Ryan', 'Patayon', 'Logrono', 'Male', '22', 'Grade 11 - Faith', 'ryanpatayon@gmail.com', 'Edgar Patayon', 'edgarpatayon@gmail.com', 'Inabangga Bohol', 'image18.png', '2022-11-02 21:00:09', '2022-11-02 21:00:09'),
(47, 2, 'Jazelle', 'Cantones', 'Piodos', 'Female', '18', 'Grade 11 - Charity', 'jazelle.cantones@gmail.com', 'Philip Cantones', 'philip.cantones@gmail.com', 'Cantomocad, Loon, Bohol', 'image18.png', '2022-11-02 21:01:21', '2022-11-02 21:01:21'),
(48, 3, 'Vincent', 'Pilegro', 'Hiken', 'Male', '23', 'Grade 11 - Faith', 'vincentthekinpeligro@gamil.com', 'Marites Peligro', 'maritespeligro@gmail.com', 'Tubigon Bohol', 'image18.png', '2022-11-02 21:03:09', '2022-11-02 21:03:09'),
(49, 2, 'Victor', 'Lagurin', 'Sauro', 'Male', '17', 'Grade 11 - Charity', 'victor.lagurin@gmail.com', 'Fe Lagurin', 'fe.lagurin@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 21:03:16', '2022-11-02 21:03:16'),
(50, 4, 'Shainina', 'Quiroben', 'Tisoy', 'Female', '20', 'Grade 12 - Hope', 'shaininaatisoy12@gmail.com', 'Marites Quiroben', 'marites123@gmail.com', 'Tinangnan, Tubigon, Bohol', 'image18.png', '2022-11-02 21:04:31', '2022-11-02 21:04:31'),
(51, 3, 'Mariel', 'Moreno', 'Econar', 'Female', '23', 'Grade 11 - Faith', 'marielmoreno@gmail.com', 'Maricar  Moreno', 'maricarmoreni@gmail.com', 'Banlasan Tubigon Bohol', 'image18.png', '2022-11-02 21:05:06', '2022-11-02 21:05:06'),
(54, 4, 'Oscar Jr.', 'Torrejas', 'Gulayan', 'Male', '20', 'Grade 12 - Hope', 'oscartorrejas33@gmail.com', 'Jennylyn Gulayan', 'jennylyngulayan@gmail.com', 'Macaas, Tubigon, Bohol', 'image18.png', '2022-11-02 21:06:46', '2022-11-02 21:06:46'),
(55, 3, 'Franklin', 'Pogoy', 'Obguia', 'Male', '23', 'Grade 11 - Faith', 'franklinpogoy@gmail.com', 'Fransico Pogoy', 'FransicoPogoy@gmail.com', 'TinangnanTubigon Bohol', 'image18.png', '2022-11-02 21:07:47', '2022-11-02 21:07:47'),
(56, 3, 'Joseph', 'Hugo', 'Justol', 'Male', '21', 'Grade 11 - Faith', 'josephhugo@gmail.com', 'Ricardo Hugo', 'ricardohugo@gmail.com', 'Cabulijan Tubigon Bohol', 'image18.png', '2022-11-02 21:11:38', '2022-11-02 21:11:38'),
(57, 3, 'Dominic', 'Diez', 'Rayas', 'Male', '20', 'Grade 11 - Faith', 'dominicdiez@gmail.com', 'Maria Fe Diez', 'mariafediez@gmail.com', 'Banlasan Tubigon Bohol', 'image18.png', '2022-11-02 21:14:23', '2022-11-02 21:14:23'),
(58, 3, 'Rener Jan', 'Dano', 'Vedra', 'Male', '21', 'Grade 11 - Faith', 'renerjandano@gmail.com', 'Meerideth Dano', 'meridethdano@gmail.com', 'Calape Tubigon Bohol', 'image18.png', '2022-11-02 21:16:58', '2022-11-02 21:16:58'),
(59, 3, 'Jerih Gil', 'Ajoc', 'Adtoon', 'Male', '20', 'Grade 11 - Faith', 'jerihgilajoc@gmail.com', 'Murial Ajoc', 'murialajoc@gmail.com', 'Calape Tubigon Bohol', 'image18.png', '2022-11-02 21:19:49', '2022-11-02 21:19:49'),
(60, 3, 'Ace Jelo', 'Astacaan', 'Delgado', 'Male', '21', 'Grade 11 - Faith', 'acejeloastacaan@gmail.com', 'Dave Astacaan', 'daveastacaan@gmail.com', 'Cabulijan Tubigon Bohol', 'image18.png', '2022-11-02 21:22:01', '2022-11-02 21:22:01'),
(61, 3, 'Cj', 'Batausa', 'Nilo', 'Male', '20', 'Grade 11 - Faith', 'cjbatausa@gmail.com', 'Joel Batuasa', 'joelbatausa@gmail.com', 'Calape Bohol', 'image18.png', '2022-11-02 21:24:06', '2022-11-02 21:24:06'),
(62, 3, 'June Philip', 'Astillo', 'Bongcales', 'Male', '19', 'Grade 11 - Faith', 'epoyaastillo@gamil.com', 'Benjie Astillo', 'benjieastillo@gmail.com', 'Calape Bohol', 'image18.png', '2022-11-02 21:27:24', '2022-11-02 21:27:24'),
(63, 1, 'Maria lynn', 'Malbas', 'Asombrado', 'Female', '19', 'Grade 11 - Wisdom', 'marialynnasombrado@gmail.com', 'Martin Asombrado', 'martinasombrado@gmail.com', 'Tinangnan Tubigon Bohol', 'image18.png', '2022-11-02 22:19:05', '2022-11-02 22:19:05'),
(64, 1, 'Laiza', 'Logrono', 'Anosa', 'Female', '20', 'Grade 11 - Wisdom', 'laizalogrono@gmail.com', 'Bernadeth Logrono', 'bernadethlogrono@gmail.com', 'Calape Bohol', 'image18.png', '2022-11-02 22:22:22', '2022-11-02 22:22:22'),
(65, 1, 'Nathaniel', 'Reserva', 'Anora', 'Male', '19', 'Grade 11 - Wisdom', 'nathanielreserva@gmail.com', 'Lucas Reserva', 'lucasreserva@gmail.com', 'Calape Bohol', 'image18.png', '2022-11-02 22:26:06', '2022-11-02 22:26:06'),
(66, 1, 'Sabel', 'Desierto', 'Aparece', 'Male', '20', 'Grade 11 - Wisdom', 'sabeldesierto@gamil.com', 'Marecel Desierto', 'mareceldesierto@gamil.com', 'Cahayag Tubigon Bohol', 'image18.png', '2022-11-02 22:29:06', '2022-11-02 22:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `student_information_sheets`
--

CREATE TABLE `student_information_sheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `type_of_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_attended_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthplace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elementary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elem_honors_rec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secon_honors_rec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elem_year_grad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secon_year_grad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_last_attended` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_add` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reasons_for_transfer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_sub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `most_dif_sub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dislikes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_off_ad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_off_ad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_educ_stat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_educ_stat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_income` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mar_parents_stat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_brothers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_sisters` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_with` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_are_you_supp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rel_with_father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rel_with_mother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rel_with_brother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rel_with_sister` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_comp_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `past_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `injuries` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mens_history` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_signed` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_information_sheets`
--

INSERT INTO `student_information_sheets` (`id`, `student_id`, `type_of_student`, `last_attended_school`, `school_year`, `birthdate`, `nationality`, `status`, `number`, `height`, `birthplace`, `religion`, `weight`, `elementary`, `secondary`, `elem_honors_rec`, `secon_honors_rec`, `elem_year_grad`, `secon_year_grad`, `level_last_attended`, `school_add`, `year`, `reasons_for_transfer`, `org_name`, `position`, `org_year`, `fav_sub`, `most_dif_sub`, `hobbies`, `likes`, `dislikes`, `father`, `mother`, `father_age`, `mother_age`, `father_occupation`, `mother_occupation`, `father_off_ad`, `mother_off_ad`, `father_educ_stat`, `mother_educ_stat`, `monthly_income`, `mar_parents_stat`, `rank_order`, `no_of_brothers`, `no_of_sisters`, `living_with`, `how_are_you_supp`, `rel_with_father`, `rel_with_mother`, `rel_with_brother`, `rel_with_sister`, `spouse_name`, `spouse_age`, `spouse_nationality`, `spouse_occupation`, `spouse_comp_name`, `company_num`, `past_disease`, `injuries`, `operations`, `mens_history`, `date_signed`, `created_at`, `updated_at`) VALUES
(4, 14, 'Old Student', 'Calape High School Sta.Cruz, Calape, Bohol', '2020', '2006-07-08', 'Filipino', 'Single', '0923456788', '5\'11', 'Tagbilaran City', 'Roman Catholic', '150', 'Central Calape', 'Calape High School', '3rd honor', '2nd honor', '2014-2016', '2017-2020', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Philosophy', 'Math', 'Watching Movies', 'Ice cream', 'No proper hygiene', 'George Aparicio', 'Wella Aparicio', '45', '45', 'Dentist', 'Online Seller', 'Tagbilaran City', 'N/A', 'College Graduate', 'High School', 'More than 20, 000', 'Living together here in the Philippines', 'Only', 'None', 'None', 'Parents', 'Parents', 'Supportive', 'Very appreciative', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Ankle', 'N/A', 'N/A', '2022-11-11', '2022-11-02 21:13:20', '2022-11-02 21:13:20'),
(6, 34, 'Old Student', 'Holycross academy', '2022', '2003-10-04', 'Filipino', 'Single', '09453012657', '4.1', 'Tinangnan, Tubigon, Bohol', 'Catholic', '27', 'Tinangnan, Tubigon, Bohol', 'Tinangnan, Tubigon, Bohol', 'Most behave', 'Most behave', '2010', '2015', 'Gr12 Holycross Academy', 'Holycross Academy', '2022', 'Tuition', 'Church', 'PYM', '2019', 'English', 'Math', 'Dancing, eating', '20k', 'Singing', 'Sander', 'Anabel', NULL, '40', 'Fish vendor', 'Housekeeping', 'Tinangnan', 'Tinangnan', 'Elementary', 'Elementary', 'More than 1, 0000 but less than 5, 000', 'Living together here in the Philippines', 'Eldest', 'Jessie albura', 'Amie Amporado', 'Parents', 'Parents', 'The best father', 'The best mother', 'Kind brother', 'Kind sister', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2011-03-22', '2022-11-02 21:19:22', '2022-11-02 21:39:20'),
(7, 36, 'Old Student', 'Tubigon West Central', '2022', '2002-10-23', 'Filipino', 'Single', '09382639171', '5.2', 'Tinangnan, Tubigon, Bohol', 'Catholic', '38', 'Tinangnan, Tubigon, Bohol', 'Tinangnan, Tubigon, Bohol', 'Second Honor', 'Second Honor', '2009', '2017', 'Tubigon, West Central', 'Tubigon, West, Central', '2022', 'Tuition', 'Church', 'PYM', '2019', 'Math', 'English', 'Eating', '5k', 'Basket', 'Sander', 'Anabel', '38', '40', 'Fish vendor', 'Housekeeping', 'Tinangnan', 'Tinangnan', 'Elementary', 'Elementary', 'More than 1, 0000 but less than 5, 000', 'Living together here in the Philippines', 'Eldest', 'Albert Pecolados', 'Jessa Albura', 'Parents', 'Parents', 'The best father', 'The best mother', 'Kind brother', 'Kind sister', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-11-03', '2022-11-02 21:28:15', '2022-11-02 21:28:15'),
(8, 31, 'Old Student', 'Tubigon High School Tinangnan, Tubigon, Bohol', '2020', '2023-03-26', 'Filipino', 'Single', '09262782828', '5\'11', 'Cebu City', 'Roman Catholic', '120', 'Labu-on Elementary School', 'Calape High School', 'None', 'None', '2015-2018', '2017-2020', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'Art appreciation', 'English', 'Painting', 'French fries', 'Adobong manok', 'Ferdinand Aranas', 'Andrea Aranas', '50', '40', 'Doctor', 'Dentist', 'Cebu City', 'Calape', 'College Graduate', 'College Graduate', 'More than 20, 000', 'Living together here in the Philippines', 'Eldest', '1', '2', 'Parents', 'Parents', 'Good', 'Loving mother', 'Supportive', 'Caring', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '2029-11-03', '2022-11-02 21:34:20', '2022-11-02 21:34:20'),
(9, 11, 'New Student', 'Holycross academy', '2022', '2003-09-15', 'Filipino', 'Single', '0909357289', '5.5', 'Macaas, Tubigon,Bohol', 'Catholic', '60', 'Macaas, Tubigon, Bohol', 'Macaas, Tubigon, Bohol', 'Most behave', 'Most behave', '2009', '2017', 'Gr12 Holycross Academy', 'Holycross Academy', '2022', 'Tuition', 'Church', 'PYM', '2019', 'English', 'Aralpan', 'Eating, baskets', '1k', 'Singing', 'Edgar', 'Veronica', '40', '35', 'Trycle driver', 'Housekeeping', 'Macaas, Tubigon, Bohol', 'Macaas, Tubigon, Bohol', 'High School', 'High School', 'More than 1, 0000 but less than 5, 000', 'Living together here in the Philippines', 'Youngest', 'N/A', 'Angel Amodia', 'Parents', 'Parents', 'The best father', 'The best mother', 'N/A', 'Best sister', 'N/A', NULL, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-11-03', '2022-11-02 21:35:00', '2022-11-02 21:35:00'),
(10, 8, 'Old Student', 'Holycross academy', '2022', '2000-11-12', 'Filipino', 'Single', '09353739021', '4.1', 'Tinangnan, Tubigon, Bohol', 'Catholic', '38', 'Tinangnan, Tubigon, Bohol', 'Tinangnan, Tubigon, Bohol', 'Most behave', 'Most behave', '2018', '2019', 'Gr12 Holycross Academy', 'Holycross Academy', '2022', 'Tuition', 'Church', 'PYM', '2019', 'English', 'English', 'Eating', '1k', 'Singing', 'Sander', 'Anabel', '38', '40', 'Fish vendor', 'Housekeeping', 'Tinangnan', 'Macaas, Tubigon, Bohol', 'Elementary', 'Elementary', 'More than 1, 0000 but less than 5, 000', 'Living together here in the Philippines', 'Eldest', 'N/A', 'Jessa Albura', 'Parents', 'Parents', 'The best father', 'The best mother', 'Kind brother', 'Kind sister', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-11-03', '2022-11-02 21:41:19', '2022-11-02 21:41:19'),
(13, 59, 'New Student', 'Holycross academy', '2022', '1998-04-22', 'Filipino', 'Single', '09453012657', '4.1', 'Tinangnan, Tubigon, Bohol', 'Catholic', '60', 'Tinangnan, Tubigon, Bohol', 'Tinangnan, Tubigon, Bohol', 'Most behave', 'Most behave', '2009', '2015', 'Gr12 Holycross Academy', 'Holycross Academy', '2022', 'Tuition', 'Church', 'PYM', '2019', 'English', 'Aralpan', 'Eating', '1k', 'Singing', 'Cesar', 'Nica', '40', '35', 'Trycle driver', 'Housekeeping', 'Tinangnan', 'Tinangnan', 'Elementary', 'Elementary', 'More than 1, 0000 but less than 5, 000', 'Living together here in the Philippines', 'Eldest', NULL, NULL, 'Parents', 'Parents', 'The best father', 'The best mother', 'N/A', 'Best sister', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-11-03', '2022-11-02 22:02:02', '2022-11-02 22:02:02'),
(14, 60, 'New Student', 'Materdei', '2022', '2000-10-26', 'Filipino', 'Single', '09877283685', '4.1', 'Pooc, Oriental', 'Catholic', '80', 'Pooc, Oriental', 'Pooc, Oriental', 'Second Honor', 'Second Honor', '2010', '2015', 'Pooc, Oriental', 'Pooc, Oriental', '2022', 'Tuition', 'Church', 'PYM', '2019', 'Filipino', 'English', 'Eating', '1k', 'Singing', 'Ethan', 'Nita', '56', '50', 'Trycle driver', 'Housekeeping', 'Pooc, Oriental', 'Pooc, Oriental', 'Elementary', 'Elementary', 'More than 1, 0000 but less than 5, 000', 'Living together here in the Philippines', 'Middle', 'N/A', 'Erica Astacaan', 'Parents', 'Parents', 'The best father', 'The best mother', 'N/A', 'Best sister', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', NULL, 'N/A', 'N/A', 'N/A', 'N/A', '2022-11-03', '2022-11-02 22:23:09', '2022-11-02 22:23:09'),
(15, 62, 'New Student', 'Materdei', '2022', '1999-05-03', 'Filipino', 'Single', '0909357289', '5.2', 'Cabulijan, Tubigon Bohol', 'Catholic', '60', 'Cabulijan, Tubigon, Bohol', 'Cabulijan, Tubigon, Bohol', 'Second Honor', 'Second Honor', '2010', '2015', 'Cabulijan, Tubigon, Bohol', 'Cabulijan, Tubigon, Bohol', '2022', 'Tuition', 'Church', 'PYM', '2019', 'Math', 'Mathn', 'Eating, baskets', '1k', 'Singing', 'Kiko', 'Nesta', '40', '35', 'Fish vendor', 'Housekeeping', 'Cabulijan, Tubigon, Bohol', 'Cabulijan, Tubigon, Bohol', 'Elementary', 'Elementary', 'More than 1, 0000 but less than 5, 000', 'Living together here in the Philippines', 'Eldest', 'N/A', 'N/A', 'Parents', 'Parents', 'The best father', 'The best mother', 'N/A', 'Best sister', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-11-03', '2022-11-02 22:35:17', '2022-11-02 22:35:17');

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
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `approved_at` timestamp NULL DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advisory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image18.png',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'author',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `approved_at`, `contact_no`, `advisory`, `avatar`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Severus Snape', 'kennbassist@gmail.com', '2022-11-02 18:12:40', '$2y$10$63TS.QK4ktfBZxeHy7zwt.daCPg2vdHNwBlMaWVdVzmP6K/ZdxdzW', 1, '2022-11-02 18:12:40', '09361652609', 'Grade 11 - Wisdom', '1667455453.jpg', 'editor', NULL, '2022-11-02 18:12:40', '2022-11-02 22:04:13'),
(2, 'Kim Vincent Cucharo', 'kimvincentcucharo@gmail.com', '2022-11-03 02:16:41', '$2y$10$rifmfmIfn4GJdja/rHg7xuK1OdWIpaebb5/J7/R3hYNu6BEQkhgK2', 0, '2022-11-02 18:18:05', '09009898888', 'Grade 11 - Charity', '1667454462.jpg', 'author', NULL, '2022-11-02 18:16:27', '2022-11-02 21:47:43'),
(3, 'Mary Joy Lupian', 'joylupian60@gmail.com', '2022-11-02 20:14:33', '$2y$10$rbhLNwj.8yNZjvyDs5D2eOS.6UaQAw.pChhGQMn8HQwVeR/ZH0OVG', 0, '2022-11-02 20:14:44', '09008787666', 'Grade 11 - Faith', '1667454698.jpg', 'author', NULL, '2022-11-02 20:12:41', '2022-11-02 21:51:38'),
(4, 'Miralyn Mensede', 'miralynmensede6@gmail.com', '2022-11-02 20:14:37', '$2y$10$n8feq5i5hw8o/HEewfTaVuubrh6TOPQ9fbeJk5/fpRdVNqA3pOjgG', 0, '2022-11-02 20:15:04', '09008787777', 'Grade 12 - Hope', '1667454468.jpg', 'author', NULL, '2022-11-02 20:13:54', '2022-11-02 21:47:48'),
(5, 'Gesselle Lopoz', 'ellessegzopol@gmail.com', '2022-11-03 05:32:29', '$2y$10$yucPX7C5L8fYC0ouTmCCTuM4X1weSeBS3VIIzAKkiu43NwK/7Goym', 0, '2022-11-02 21:39:36', '09008767666', 'Grade 12 - Love', 'image18.png', 'author', NULL, '2022-11-02 21:32:19', '2022-11-02 21:39:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anecdotal_records`
--
ALTER TABLE `anecdotal_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anecdotal_records_student_id_foreign` (`student_id`);

--
-- Indexes for table `career_interest_test_results`
--
ALTER TABLE `career_interest_test_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `career_interest_test_results_student_id_foreign` (`student_id`);

--
-- Indexes for table `counseling_anecdotal_records`
--
ALTER TABLE `counseling_anecdotal_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counseling_anecdotal_records_student_id_foreign` (`student_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

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
-- Indexes for table `parent_conference_records`
--
ALTER TABLE `parent_conference_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_conference_records_student_id_foreign` (`student_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personality_test_results`
--
ALTER TABLE `personality_test_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personality_test_results_student_id_foreign` (`student_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_parent_email_unique` (`parent_email`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_information_sheets`
--
ALTER TABLE `student_information_sheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_information_sheets_student_id_foreign` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_advisory_unique` (`advisory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anecdotal_records`
--
ALTER TABLE `anecdotal_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `career_interest_test_results`
--
ALTER TABLE `career_interest_test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `counseling_anecdotal_records`
--
ALTER TABLE `counseling_anecdotal_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `parent_conference_records`
--
ALTER TABLE `parent_conference_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personality_test_results`
--
ALTER TABLE `personality_test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `student_information_sheets`
--
ALTER TABLE `student_information_sheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anecdotal_records`
--
ALTER TABLE `anecdotal_records`
  ADD CONSTRAINT `anecdotal_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `career_interest_test_results`
--
ALTER TABLE `career_interest_test_results`
  ADD CONSTRAINT `career_interest_test_results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counseling_anecdotal_records`
--
ALTER TABLE `counseling_anecdotal_records`
  ADD CONSTRAINT `counseling_anecdotal_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_conference_records`
--
ALTER TABLE `parent_conference_records`
  ADD CONSTRAINT `parent_conference_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `personality_test_results`
--
ALTER TABLE `personality_test_results`
  ADD CONSTRAINT `personality_test_results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_information_sheets`
--
ALTER TABLE `student_information_sheets`
  ADD CONSTRAINT `student_information_sheets_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
