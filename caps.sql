-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 06:16 AM
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
(1, 16, '2022-11-05 18:30:00', 'test', 'test', 'test', 'test', '2022-10-31 02:31:03', '2022-10-31 02:31:03'),
(2, 20, '2022-11-11 10:13:00', 'test', 'test', 'test', 'test', '2022-10-31 18:13:42', '2022-10-31 18:13:42'),
(3, 25, '2022-11-26 10:14:00', 'test', 'test', 'test', 'test', '2022-10-31 18:14:12', '2022-10-31 18:14:12'),
(4, 5, '2022-11-17 10:14:00', 'test', 'test', 'test', 'test', '2022-10-31 18:14:42', '2022-10-31 18:14:42'),
(5, 30, '2022-11-18 10:15:00', 'test', 'test', 'test', 'test', '2022-10-31 18:15:06', '2022-10-31 18:15:06');

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
(41, 16, '1667270857.webp', '2022-10-31 18:47:37', '2022-10-31 18:47:37');

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
(1, 16, '2022-11-18 10:11:00', 'Interview', 'Kennx Severus', 'test', '5th Counseling Session', 'test', 'test', 'test', 'test', '2022-10-31 18:11:23', '2022-10-31 18:11:23');

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
(1, 1, 'PNHS Acquaintance Party 2022', '2022-11-05 10:23:00', 'PNHS Ground', '2022-10-30 18:23:57', '2022-10-30 18:23:57');

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
(10, '2022_10_31_031402_create_exit_interview_forms', 2),
(11, '2022_10_31_103340_create_career_interest_test_results', 3),
(12, '2022_11_01_030934_create_personality_test_results', 4);

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
(1, 5, '2022-10-31', 'Father of the student', 'Inquiries', 'Inquiry on Psychological Test Results', 'Test', 'Test', 'Test', 'Resolved', '2022-10-30 18:57:33', '2022-10-30 18:57:33'),
(2, 16, '2022-10-31', 'Father of the student', 'Appointment', 'Appointment Set by the Counselor', 'test', 'test', 'test', 'Resolved', '2022-10-31 02:52:26', '2022-10-31 02:52:26');

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
(1, 1, 'Vincent', 'Peligro', 'Hekin', 'Male', '20', 'Grade 11 - Wisdom', 'vincenthekinpeligro@gmail.com', 'Marites Peligro', 'marites@gmail.com', 'Lomboy, Calape, Bohol', 'image18.png', '2022-10-30 18:21:09', '2022-10-30 18:21:09'),
(2, 5, 'Krizhia', 'Cucharo', 'Cucharo', 'Female', '22', 'Grade 12 - Love', 'krizhiacucharo@gmail.com', 'Ma.Fatima Cucharo', 'fatimachucharo@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 18:21:44', '2022-10-30 18:21:44'),
(3, 5, 'Karen', 'Cucharo', 'Cordano', 'Female', '22', 'Grade 12 - Love', 'karyscucharo@gmail.com', 'Teodoro Cucharo', 'teodorocucharo@gmail.com', 'Ulbujan,Calape,Bohol', 'image18.png', '2022-10-30 18:25:41', '2022-10-30 18:26:55'),
(4, 5, 'Jaypee Justin', 'Gallego', 'Cua', 'Male', '22', 'Grade 12 - Love', 'jaypeegallego@gmail.com', 'Pacita Gallego', 'jaypeegallego@gmail.com', 'Ulbujan,Calape,Bohol', 'image18.png', '2022-10-30 18:28:53', '2022-10-30 18:28:53'),
(5, 5, 'Kyle', 'Buladaco', 'Orendain', 'Female', '16', 'Grade 12 - Love', 'kylebuladaco@gmail.com', 'Conchita Buladaco', 'conchitabuladaco@gmail.com', 'Ulbujan,Calape,Bohol', 'image18.png', '2022-10-30 18:30:42', '2022-10-30 18:30:42'),
(6, 5, 'Reynald', 'Sauro', 'Aguelo', 'Male', '22', 'Grade 12 - Love', 'reynaldsauro@gmail.com', 'Ricardo Sauro', 'ricardosauro@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 18:33:18', '2022-10-30 18:33:18'),
(7, 5, 'Camille', 'Rico', 'Millanes', 'Female', '22', 'Grade 12 - Love', 'camillerico@gmail.com', 'Precy Rico', 'precyrico@gmail.com', 'Inabanga , Tubigon , Bohol', 'image18.png', '2022-10-30 18:35:44', '2022-10-30 18:35:44'),
(8, 5, 'Keneth', 'Licame', 'Anosa', 'Male', '22', 'Grade 12 - Love', 'kenethlicame@gmail.com', 'Fatima Licame', 'fatimalicame@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 18:38:21', '2022-10-30 18:38:21'),
(9, 5, 'Ryan', 'Patayon', 'Logrono', 'Male', '23', 'Grade 12 - Love', 'ryanpatayon@gmail.com', 'Edgar Patayon', 'edgarpatayon@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 18:40:32', '2022-10-30 18:40:32'),
(10, 6, 'Mariel', 'Moreno', 'Econar', 'Female', '22', 'Grade 11 - Charity', 'marielmoreno@gmail.com', 'Maricar Moreno', 'maricarmoreno@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 18:59:21', '2022-10-30 18:59:21'),
(11, 6, 'Franklin', 'Pogoy', 'Obguia', 'Male', '24', 'Grade 11 - Charity', 'franklinpogoy@gmail.com', 'Franciso Pogoy', 'franciscopogoy@gmail.com', 'Ulbujan,Calape,Bohol', 'image18.png', '2022-10-30 19:02:23', '2022-10-30 19:02:23'),
(12, 6, 'Joseph', 'Hugo', 'Justol', 'Male', '22', 'Grade 11 - Charity', 'josephhugo@gmail.com', 'Ricardo Hugo', 'ricardohugo@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 19:04:55', '2022-10-30 19:04:55'),
(13, 6, 'Miralyn', 'Mensede', 'Econar', 'Female', '22', 'Grade 11 - Charity', 'miralynmensede@gmail.com', 'Melchor Menede', 'melchormensede@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 19:07:58', '2022-10-30 19:07:58'),
(14, 6, 'Dominic', 'Diez', 'Rayas', 'Male', '22', 'Grade 11 - Charity', 'dominicdiez@gmail.com', 'Maria Fe Diez', 'mariadiez@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 19:09:51', '2022-10-30 19:09:51'),
(15, 6, 'Rener Jan', 'Dano', 'Vedra', 'Male', '22', 'Grade 11 - Charity', 'renerjandano@gmail.com', 'Merideth Dano', 'meridethdano@gmail.com', 'Inabanga , Tubigon , Bohol', 'image18.png', '2022-10-30 19:13:10', '2022-10-30 19:13:10'),
(16, 6, 'Jireh Jil', 'Ajoc', 'Adtoon', 'Male', '22', 'Grade 11 - Charity', 'ajocjay11@gmail.com', 'Murial Ajoc', 'murialajoc@gmail.com', 'Inabanga , Tubigon , Bohol', 'image18.png', '2022-10-30 19:15:14', '2022-10-30 19:15:14'),
(17, 6, 'Ace Jelo', 'Astaca-an', 'Delgado', 'Male', '23', 'Grade 11 - Charity', 'acejeloastacaan@gmail.com', 'Dave Astaca-an', 'daveastacaan@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 19:17:57', '2022-10-30 19:17:57'),
(18, 6, 'Cj Nilo', 'Batausa', 'NA', 'Male', '23', 'Grade 11 - Charity', 'jaye.batz@gmail.com', 'Joel Batausa', 'joelbatausa@gmail.com', 'Inabanga , Tubigon , Bohol', 'image18.png', '2022-10-30 19:20:31', '2022-10-30 19:20:31'),
(19, 6, 'Urshys Kent', 'Flores', 'Booc', 'Male', '23', 'Grade 11 - Charity', 'urshyskentflores@gmail.com', 'Alma Flores', 'almaflores@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 19:24:57', '2022-10-30 19:24:57'),
(20, 7, 'June Philip', 'Astillo', 'Bongcales', 'Male', '23', 'Grade 11 - Faith', 'epoyatillo@gmail.com', 'Benjie Astillo', 'benjieastillo@gmail.com', 'Inabanga , Tubigon , Bohol', 'image18.png', '2022-10-30 19:31:14', '2022-10-30 19:31:14'),
(21, 7, 'Godwin', 'Atabelo', 'Ramos', 'Male', '22', 'Grade 11 - Faith', 'godwin.atabelo@gmail.com', 'Moises Atabelo', 'moises.atabelo@gmail.com', 'Inabanga , Tubigon , Bohol', 'image18.png', '2022-10-30 19:46:07', '2022-10-30 19:46:07'),
(22, 7, 'Chadie Gil', 'Augis', 'Sirdena', 'Male', '23', 'Grade 11 - Faith', 'chadieaugis@gmail.com', 'Keanu Augis', 'Keanu.augis@gmail.com', 'Cahayag ,Tubigon ,Bohol', 'image18.png', '2022-10-30 19:49:00', '2022-10-30 19:49:00'),
(23, 7, 'Jubelyn', 'Baquial', 'Paracullos', 'Male', '22', 'Grade 11 - Faith', 'jubeleyn.baquial@gmail.com', 'Miralyn Baquial', 'miralynbaquial@gmail.com', 'Villanueva ,Tubigon ,Bohol', 'image18.png', '2022-10-30 19:52:17', '2022-10-30 19:52:17'),
(24, 7, 'Marie', 'Belamia', 'Ombajin', 'Female', '22', 'Grade 11 - Faith', 'marjiebelamia@gmail.com', 'Jubelyn Belamia', 'jubelynbelamia@gmail.com', 'Bon-Bon ,Clarin , Bohol', 'image18.png', '2022-10-30 19:55:10', '2022-10-30 19:55:10'),
(25, 1, 'Ike', 'Belida', 'Ronquillo', 'Male', '23', 'Grade 11 - Wisdom', 'ike.belida@gmail.com', 'Rose Belida', 'rosebelida@gmai.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 19:59:46', '2022-10-30 19:59:46'),
(26, 1, 'Jay', 'Calamba', 'Aguanza', 'Male', '22', 'Grade 11 - Wisdom', 'jaycalamba@gmail.com', 'Paulino Calamba', 'paulinocalamba@gmail.com', 'Matabao , Tubigon , Bohol', 'image18.png', '2022-10-30 20:02:39', '2022-10-30 20:02:39'),
(27, 1, 'Kim Vincent', 'Cucharo', 'Cordano', 'Male', '23', 'Grade 11 - Wisdom', 'kimvincentcucharo@gmail.com', 'Boni Cucharo', 'boni.cucharo@gmail.com', 'Ulbujan,Calape,Bohol', 'image18.png', '2022-10-30 20:06:52', '2022-10-30 20:06:52'),
(28, 1, 'Maria Lynn', 'Malbas', 'Asombrado', 'Female', '26', 'Grade 11 - Wisdom', 'maria.lynmalbas@gmail.com', 'Marie Balbas', 'mariemalbas@gmail.com', 'Cabulijan,Tubigon,Bohol', 'image18.png', '2022-10-30 20:10:34', '2022-10-30 20:10:34'),
(29, 1, 'Alonica', 'Cantoneros', 'Jurolan', 'Male', '23', 'Grade 11 - Wisdom', 'alonica.cantoneros@gmail.com', 'Corazon Cantoneros', 'corazon.cantoneros@gmail.com', 'Inabanga , Tubigon , Bohol', 'image18.png', '2022-10-30 20:13:29', '2022-10-30 20:13:29'),
(30, 8, 'Draco', 'Malfoy', 'Freud', 'Male', '20', 'Grade 12 - Hope', 'draco@gmail.com', 'Lucius Malfoy', 'lucius@gmail.com', 'Lomboy, Calape, Bohol', 'image18.png', '2022-10-31 16:00:02', '2022-10-31 16:00:02');

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
(1, 'Severus Snape', 'kennbassist@gmail.com', '2022-10-30 18:07:51', '$2y$10$x2XIZ/Cfudk7s17RVM3jOe4RdjJTh8JxHZzeppgZZzU.QRFuzAEh2', 1, '2022-10-30 18:07:51', '09361652609', 'Grade 11 - Wisdom', '1667269418.jpg', 'editor', NULL, '2022-10-30 18:07:51', '2022-10-31 18:23:38'),
(5, 'Noren May Dumandan', 'norenmay.dumandan29@gmail.com', '2022-10-31 02:13:05', '$2y$10$EvCLNqRIz/1LdIz28tBtO.iflziReyblvwP0WEauB7mKdIPT/yrY.', 0, '2022-10-30 18:14:25', '09009878777', 'Grade 12 - Love', 'image18.png', 'author', NULL, '2022-10-30 18:12:39', '2022-10-30 18:14:25'),
(6, 'Kenn Secusana', 'kennsecusana@gmail.com', '2022-10-31 02:54:11', '$2y$10$pwbOYJXeRYTq/VTIQDy72Oq.CX42b0cVS9I0bIFAF5DPS91cB1bLO', 0, '2022-10-30 18:54:28', '09009898777', 'Grade 11 - Charity', 'image18.png', 'author', NULL, '2022-10-30 18:52:53', '2022-10-30 18:54:28'),
(7, 'Kian Secusana', 'kian@gmail.com', '2022-10-31 03:28:06', '$2y$10$ez2PUom/eLijTkgS6qOr0uuXpP5f0NyfK9DI9qEWivQeD2OXDL6X2', 0, '2022-10-30 19:28:25', '09076565555', 'Grade 11 - Faith', 'image18.png', 'author', NULL, '2022-10-30 19:28:02', '2022-10-30 19:28:25'),
(8, 'Meg Lazarte', 'meg@gmail.com', '2022-10-31 23:59:04', '$2y$10$AaY0RxlY/a9xVGW1OuqRHOTxKNW11i4ZVzHkU/aWz5cOQeOnFkX2a', 0, '2022-10-31 15:59:30', '09009878777', 'Grade 12 - Hope', 'image18.png', 'author', NULL, '2022-10-31 15:58:16', '2022-10-31 15:59:30');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `career_interest_test_results`
--
ALTER TABLE `career_interest_test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `counseling_anecdotal_records`
--
ALTER TABLE `counseling_anecdotal_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personality_test_results`
--
ALTER TABLE `personality_test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
