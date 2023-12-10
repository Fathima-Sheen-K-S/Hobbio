-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 06:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_contact` varchar(10) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(2, 'Sheen', '8606147681', 'fathima@gmail.com', 'fathima');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `booking_date` varchar(10) NOT NULL,
  `booking_time` varchar(10) NOT NULL,
  `booking_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `user_id`, `package_id`, `booking_date`, `booking_time`, `booking_status`) VALUES
(135, 40, 60, '2023-10-28', '23:18:11', 1),
(136, 42, 52, '2023-10-28', '23:19:30', 3),
(137, 42, 58, '2023-10-28', '23:20:52', 1),
(138, 39, 56, '2023-10-29', '18:23:58', 1),
(139, 40, 54, '2023-10-30', '17:43:31', 2),
(140, 40, 56, '2023-10-30', '20:08:51', 2),
(141, 40, 52, '2023-10-30', '20:13:00', 3),
(142, 40, 53, '2023-10-30', '21:14:39', 1),
(143, 40, 65, '2023-10-31', '12:38:35', 1),
(144, 40, 59, '2023-11-02', '10:08:56', 1),
(145, 40, 52, '2023-11-02', '11:47:31', 2),
(147, 40, 63, '2023-11-03', '19:13:25', 1),
(148, 40, 56, '2023-11-04', '15:11:07', 1),
(149, 40, 55, '2023-11-04', '15:24:48', 1),
(150, 42, 53, '2023-11-04', '15:33:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(19, 'Dancing'),
(20, 'Singing'),
(21, 'Martial Arts'),
(22, 'Skating'),
(28, 'Aquatic Sports');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_center`
--

CREATE TABLE `tbl_center` (
  `center_id` int(11) NOT NULL,
  `center_name` varchar(30) NOT NULL,
  `center_contact` varchar(10) NOT NULL,
  `center_type` varchar(10) NOT NULL,
  `center_logo` varchar(400) NOT NULL,
  `center_proof` varchar(400) NOT NULL,
  `center_email` varchar(40) NOT NULL,
  `center_password` varchar(10) NOT NULL,
  `city_id` int(11) NOT NULL,
  `center_doj` varchar(10) NOT NULL,
  `center_status` int(2) NOT NULL,
  `center_area` varchar(50) NOT NULL,
  `center_building` varchar(50) NOT NULL,
  `center_landmark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_center`
--

INSERT INTO `tbl_center` (`center_id`, `center_name`, `center_contact`, `center_type`, `center_logo`, `center_proof`, `center_email`, `center_password`, `city_id`, `center_doj`, `center_status`, `center_area`, `center_building`, `center_landmark`) VALUES
(37, 'Sinjus Worlds', '6235009360', 'Individual', 'centerlogo2.jpg', 'centerproof2.png', 'sinjumathews0005@gmail.com', 'Sinju123*', 69, '2023-10-07', 1, 'Nellimattom', 'K Tower', 'Near SBI ATM'),
(44, 'My Dreams', '8590498318', 'Group', 'centerlogo1.jpg', 'centerproof3.jpg', 'muhammedshifan71@gmail.com', 'dreams', 70, '2023-10-26', 1, 'Aramanappady', 'S K Tower', 'Near Grand Center Mall'),
(55, 'Amaya', '5678932456', 'Group', 'centerlogo3.jpg', 'centerproof3.jpg', 'lashilachu@gmail.com', 'Lasaan123*', 78, '2023-11-04', 1, 'Gujarat Street', '123 Street Building', 'Near Post Office'),
(56, 'Connect', '5367289023', 'Individual', 'logo 5.jpg', 'centerproof2.png', 'jeenajoby22@gmail.com', 'Jeena123*', 74, '2023-11-04', 1, 'Kochupally', 'K Y Tower', 'Near SH College'),
(58, 'Heeyo', '4526178290', 'Group', 'logo4.jpg', 'centerproof1.png', 'Heeyo@gmail.com', 'Heeyo12345', 52, '2023-11-04', 0, 'Aroor', 'S N Building', 'Near police station');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_centercomplaint`
--

CREATE TABLE `tbl_centercomplaint` (
  `ccomplaint_id` int(11) NOT NULL,
  `ccomplaint_title` varchar(40) NOT NULL,
  `ccomplaint_content` varchar(100) NOT NULL,
  `ccomplaint_reply` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `ccomplaint_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_centercomplaint`
--

INSERT INTO `tbl_centercomplaint` (`ccomplaint_id`, `ccomplaint_title`, `ccomplaint_content`, `ccomplaint_reply`, `user_id`, `center_id`, `ccomplaint_status`) VALUES
(12, 'Teaching Faculty', 'Plz increase your teaching faculty', 'Will do..sorry for the inconvinience', 40, 37, 1),
(13, 'Karate clothes', 'Karate clothes are of low quality', '', 40, 44, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `city_pincode` varchar(6) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`, `city_pincode`, `district_id`) VALUES
(51, 'Ambalappuzha', '688561', 24),
(52, 'Alappuzha Town', '688001', 24),
(53, 'Alappuzha Collectorate', '688011', 24),
(54, 'Alappuzha Finishing Point', '688013', 24),
(55, 'Cherthala', '688524', 24),
(56, 'Cherthala South', '688539', 24),
(57, 'Haripad', '690514', 24),
(58, 'Kayamkulam', '690502', 24),
(59, 'Kuttanad', '688555', 24),
(60, 'Mavelikara', '690101', 24),
(61, 'Aluva', '683101', 25),
(62, 'Angamaly', '683572', 25),
(63, 'Kochi Head Post Office', '682001', 25),
(64, 'Mattancherry', '682003', 25),
(65, 'Kacheripady', '682005', 25),
(66, 'Ernakulam North', '682007', 25),
(67, 'Ravipuram', '682011', 25),
(68, 'Kakkanad', '682016', 25),
(69, 'Kothamangalam', '686691', 25),
(70, 'Muvattupuzha', '686661', 25),
(71, 'North Paravur', '683513', 25),
(72, 'Perumbavoor', '683542', 25),
(73, 'Piravom', '686664', 25),
(74, 'Tripunithura', '682301', 25),
(77, 'Balusseri', '673612', 26),
(78, 'Beypor', '673015', 26),
(79, 'Feroke', '673631', 26),
(80, 'Kozhikode Main', '673001', 26),
(81, 'Kozhikode Civil Station', '673002', 26),
(82, 'Kozhikode Beach', '673003', 26),
(83, 'Puthiyara', '673004', 26),
(84, 'Vellayil', '673005', 26),
(85, 'Kannanchery', '673006', 26),
(86, 'Narikkuni', '673007', 26),
(87, 'West Hill', '673008', 26),
(88, 'Koduvally', '673572', 26),
(89, 'Koyilandy', '673305', 26),
(90, 'Mukkam', '673602', 26),
(91, 'Ramanattukara', '673633', 26),
(92, 'Vadakara', '673101', 26),
(93, 'Thamarassery', '673573', 26),
(94, 'Alathur', '678541', 27),
(95, 'Chittur', '678101', 27),
(96, 'Thathamangalam', '678683', 27),
(97, 'Mannarkkad', '678582', 27),
(98, 'Ottapalam', '679101', 27),
(99, 'Palakkad Town', '678001', 27),
(100, 'Palakkad Collectorate', '678002', 27),
(101, 'Pattambi', '679303', 27),
(102, 'Shoranur', '679121', 27),
(103, 'Chavara', '691583', 28),
(104, 'Karunagappally', '690518', 28),
(105, 'Kollam Cantonment', '691001', 28),
(106, 'Kollam Civil Station', '691002', 28),
(107, 'Chamakada', '691003', 28),
(108, 'Andamukkam', '691004', 28),
(109, 'Kollam Beach', '691005', 28),
(110, 'Kottarakkara', '691506', 28),
(111, 'Punalur', '691305', 28),
(112, 'Paravur Town', '691301', 28),
(113, 'Paravur East', '691302', 28),
(114, 'Pathanapuram', '689695', 28),
(115, 'Sasthamkotta', '690521', 28),
(116, 'Kannur Main', '670001', 29),
(117, 'Kannur Collectorate', '670002', 29),
(118, 'Kannur Cantonment', '670003', 29),
(119, 'Pallikunnu', '670004', 29),
(120, 'Thavakkara', '670005', 29),
(122, 'Payyanur', '670307', 29),
(123, 'Mattannur', '670702', 29),
(124, 'Taliparamba', '670141', 29),
(125, 'Thalassery', '670101', 29),
(127, 'Kasaragod', '671121', 30),
(128, 'Kasaragod Collectorate', '671123', 30),
(129, 'Manjeshwar:', '671323', 30),
(130, 'Nileshwar', '671314', 30),
(131, 'Kanhangad', '671315', 30),
(135, 'Changanassery', '686101', 32),
(136, 'Kottayam Main', '686001', 32),
(137, 'Kottayam Collectorate', '686002', 32),
(138, 'Kottayam Head Post Office', '686003', 32),
(139, 'Thirunakkara', '686004', 32),
(140, 'Pala', '686575', 32),
(141, 'Vaikom', '686141', 32),
(142, 'Chalakudy', '680307', 33),
(143, 'Guruvayur', '680101', 33),
(144, 'Irinjalakuda', '680121', 33),
(145, 'Kodungallur', '680664', 33),
(146, 'Kunnamkulam', '680503', 33),
(147, 'Thrissur Main', '680001', 33),
(148, 'Thrissur Collectorate', '680002', 33),
(149, 'Poothole', '680003', 33),
(151, 'Sakthan Thampuran Nagar', '680005', 33),
(152, 'Kuriachira', '680006', 33),
(153, 'Ayyanthole', '680004', 33),
(154, 'Adoor', '691523', 34),
(155, 'Konni', '689691', 34),
(156, 'Pathanamthitta', '689645', 34),
(157, 'Thiruvalla', '689101', 34),
(158, 'Malappuram', '676505', 35),
(159, 'Malappuram Collectorate', '676506', 35),
(160, 'Kottakkal', '676507', 35),
(161, 'Down Hill', '676508', 35),
(162, 'Manjeri', '676121', 35),
(163, 'Perinthalmanna', '679322', 35),
(164, 'Tirur', '676101', 35),
(165, 'Kalpetta', '673121', 36),
(166, 'Mananthavady', '670645', 36),
(167, 'Sultan Bathery', '673592', 36),
(168, 'Vythiri', '673576', 36),
(169, 'Attingal', '695101', 37),
(170, 'Nedumangad', '695541', 37),
(171, 'Neyyattinkara', '69512', 37),
(172, 'Thiruvananthapuram Central', '695001', 37),
(173, 'Thiruvananthapuram GPO', '695002', 37),
(174, 'Pattom', '695003', 37),
(175, 'Kowdiar', '695004', 37),
(176, 'Vanchiyoor', '695005', 37),
(177, 'Kesavadasapuram', '695006', 37),
(178, 'Vellayambalam', '695007', 37),
(179, 'Sreekariyam', '695008', 37),
(180, 'Kovalam', '695527', 37),
(186, 'Idukki', '685602', 41),
(187, 'Munnar', '685612', 41),
(188, 'Thodupuzha', '685584', 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(200) NOT NULL,
  `complaint_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_status`, `user_id`, `center_id`, `complaint_reply`) VALUES
(31, 'website lags', 'Lagging happens often plz fix it', 1, 40, 0, 'Will fix it sorry'),
(32, 'Provide more categories', 'Plz provide more categories', 0, 0, 37, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_des` varchar(200) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_des`, `subcategory_id`, `center_id`) VALUES
(58, 'Rollerzz', 'Roller skating is a fun sport', 26, 37),
(59, 'Swims Goose', 'Swimming is a healthy activity ', 37, 37),
(60, 'Karate Kid', 'Be a master of Karate and be like Jackie Chan', 24, 44),
(61, 'Nightingale', 'Sing like a nightingale', 22, 37),
(67, 'Kungfu Masters', 'Be the masters of kungfu', 25, 55);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(24, 'Alappuzha'),
(25, 'Ernakulam'),
(26, 'Kozhikode'),
(27, 'Palakkad'),
(28, 'Kollam'),
(29, 'Kannur'),
(30, 'Kasaragod'),
(32, 'Kottayam'),
(33, ' Thrissur'),
(34, 'Pathanamthitta'),
(35, 'Malappuram'),
(36, 'Wayanad'),
(37, 'Thiruvananthapuram'),
(41, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorites`
--

CREATE TABLE `tbl_favorites` (
  `fav_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_favorites`
--

INSERT INTO `tbl_favorites` (`fav_id`, `user_id`, `course_id`) VALUES
(117, 40, 59),
(118, 40, 60),
(121, 40, 58);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(200) NOT NULL,
  `feedback_time` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_time`, `user_id`, `center_id`) VALUES
(11, 'Really thankful for this site helped a lot..', '21:04:22', 40, 0),
(12, 'Thankyou For Starting this site', '22:04:40', 0, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_image` varchar(400) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_image`, `course_id`) VALUES
(16, 'roller1.jpg', 58),
(17, 'roller2.jpg', 58),
(18, 'swimkid.jpg', 59),
(19, 'swimschool.jpg', 59),
(20, 'karate1.jpg', 60),
(22, 'karate2.jpg', 60),
(26, 'karate2.jpg', 67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `package_cost` int(11) NOT NULL,
  `package_duration` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `package_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `package_cost`, `package_duration`, `course_id`, `package_details`) VALUES
(52, 'Roller Skating pack 1', 2000, '4 months', 58, 'Beginner level'),
(53, 'Roller Skating pack 2', 4000, '6 months', 58, 'Intermediate level'),
(54, 'Roller Skating pack 3', 10000, '12 months', 58, 'Professional level'),
(55, 'Swimming pack 1', 1000, '4 months', 59, 'Beginner level'),
(56, 'Swimming pack 2', 3000, '6 months', 59, 'Intermediate level'),
(57, 'Swimming pack 3', 7000, '10 months', 59, 'Professional level'),
(58, 'Karate pack 1', 6000, '6 months', 60, 'Beginners level'),
(59, 'Karate pack 2', 12000, '12 months', 60, 'Intermediate level'),
(60, 'Karate pack 3', 18000, '18 months', 60, 'Expert level'),
(61, 'Karate pack 4', 24000, '24 months', 60, 'Legendary level'),
(62, 'Karate pack 5', 26000, '26 months', 60, 'Legendary and outstanding level'),
(63, 'Singing pack 1', 10000, '6 months', 61, 'Intermediate level'),
(65, 'Singing pack 2', 20000, '12 months', 61, 'Professional level'),
(68, 'Kungfu pack 1', 20000, '12 months', 67, 'Learn fully and master the art of kungfu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `transaction_status` int(11) NOT NULL DEFAULT 0,
  `payment_date` varchar(10) NOT NULL,
  `payment_time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `booking_id`, `payment_amount`, `transaction_status`, `payment_date`, `payment_time`) VALUES
(59, 135, 18000, 1, '2023-10-28', '23:18:26'),
(60, 136, 2000, 2, '2023-10-28', '23:19:48'),
(61, 137, 6000, 1, '2023-10-28', '23:21:07'),
(62, 138, 3000, 1, '2023-10-29', '18:24:16'),
(63, 139, 10000, 2, '2023-10-30', '17:43:48'),
(64, 140, 3000, 2, '2023-10-30', '20:09:09'),
(65, 141, 2000, 2, '2023-10-30', '20:13:15'),
(66, 142, 4000, 1, '2023-10-30', '21:14:56'),
(67, 143, 20000, 1, '2023-10-31', '12:39:01'),
(68, 144, 12000, 1, '2023-11-02', '10:09:29'),
(69, 145, 2000, 2, '2023-11-02', '11:48:26'),
(70, 147, 10000, 1, '2023-11-03', '19:22:54'),
(71, 148, 3000, 1, '2023-11-04', '15:11:25'),
(72, 149, 1000, 1, '2023-11-04', '15:25:00'),
(73, 150, 4000, 1, '2023-11-04', '15:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `rating_value_no` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_comment` varchar(50) NOT NULL,
  `center_id` int(11) NOT NULL,
  `rating_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `rating_value_no`, `user_id`, `rating_comment`, `center_id`, `rating_date`) VALUES
(4, 4, 39, 'I love swimming and sinjus world made me adore it.', 37, '2023-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(20, 'Hip Hop', 19),
(21, 'Classical Dancing', 19),
(22, 'Classical Singing', 20),
(23, 'Western Singing', 20),
(24, 'Karate', 21),
(25, 'Kungfu', 21),
(26, 'Roller Skating', 22),
(27, 'Ice Skating', 22),
(37, 'Swimming', 28),
(38, 'Scuba Diving', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_gender` varchar(6) NOT NULL,
  `user_dob` varchar(30) NOT NULL,
  `user_photo` varchar(400) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_doj` varchar(10) NOT NULL,
  `user_house` varchar(50) NOT NULL,
  `user_area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_gender`, `user_dob`, `user_photo`, `user_password`, `city_id`, `user_doj`, `user_house`, `user_area`) VALUES
(39, 'Krishnapriya B', '9544520477', 'kpb08062004@gmail.com', 'Female', '2004-07-08', 'profilewoman1.jpg', 'krishna', 69, '2023-10-06', 'Madavanakkudy', 'Thrikkariyoor'),
(40, 'Fathima Sheen K S', '8606147681', 'fathimasheen524@gmail.com', 'Female', '2003-08-04', 'profilewoman3.jpeg', 'Sheen123*', 70, '2023-10-18', 'Karolil', 'Punnamattom'),
(42, 'Shafeena P A', '9656900042', 'feenathaha@gmail.com', 'Female', '1983-03-28', 'profilewoman4.jpeg', 'shafeena', 142, '2023-10-23', 'Thottukkadan', 'Chalakudy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_center`
--
ALTER TABLE `tbl_center`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `tbl_centercomplaint`
--
ALTER TABLE `tbl_centercomplaint`
  ADD PRIMARY KEY (`ccomplaint_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_favorites`
--
ALTER TABLE `tbl_favorites`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_center`
--
ALTER TABLE `tbl_center`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_centercomplaint`
--
ALTER TABLE `tbl_centercomplaint`
  MODIFY `ccomplaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_favorites`
--
ALTER TABLE `tbl_favorites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
