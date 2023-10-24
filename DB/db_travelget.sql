-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 08:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_travelget`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_contact` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_name`, `admin_email`, `admin_contact`, `admin_password`, `admin_id`) VALUES
('Travel-Get', 'travelguide@gmail.com', '9961294690', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(200) NOT NULL,
  `complaint_description` varchar(300) NOT NULL,
  `complaint_status` int(50) NOT NULL,
  `complaint_reply` varchar(300) NOT NULL,
  `user_id` int(50) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_reply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_description`, `complaint_status`, `complaint_reply`, `user_id`, `complaint_date`, `complaint_reply_date`) VALUES
(9, 'Travel get is so expensive', 'travel get is so expensive when compared to other websites', 1, 'we will sort it out real quick', 7, '2023-09-14', '2023-09-14'),
(10, 'Travel get is so expensive', 'travel get is so expensive when compared to other websites', 0, '', 7, '2023-09-15', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_name`, `district_id`) VALUES
('Ernakulam', 1),
('Idukki', 2),
('Kollam', 3),
('Alapuzha', 4),
('Thrissur', 5),
('Trivandrum', 6),
('Pathanamthitta', 7),
('Wayanad', 8),
('Kozhikod', 9),
('Mlapuram', 10),
('Kannur', 11),
('Kasargod', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guide`
--

CREATE TABLE `tbl_guide` (
  `guide_first_name` varchar(100) NOT NULL,
  `guide_last_name` varchar(100) NOT NULL,
  `guide_contact` varchar(100) NOT NULL,
  `guide_email` varchar(100) NOT NULL,
  `guide_address` varchar(101) NOT NULL,
  `guide_gender` varchar(101) NOT NULL,
  `guide_photo` varchar(200) NOT NULL,
  `guide_proof` varchar(200) NOT NULL,
  `guide_experience` varchar(100) NOT NULL,
  `guide_password` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `guide_status` int(100) NOT NULL,
  `guide_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_guide`
--

INSERT INTO `tbl_guide` (`guide_first_name`, `guide_last_name`, `guide_contact`, `guide_email`, `guide_address`, `guide_gender`, `guide_photo`, `guide_proof`, `guide_experience`, `guide_password`, `place_id`, `guide_status`, `guide_id`) VALUES
('Jasim', 'Fayas', '9961294690', 'jaasim@gmail.com', 'pkd', 'Male', 'Screenshot (17).png', 'Screenshot (23).png', '5 years', 'jasimme', 1, 2, 1),
('Midlaj', 'Mohd', '6457645765', 'midlaj@gmail.com', 'hello', 'Male', 'Screenshot (33).png', 'Screenshot (17).png', '5 years', 'midlaj', 2, 2, 2),
('Rasha', 'Zara', '9072515306', 'rasha@gamil.com', 'helllo', 'Female', 'Screenshot (6).png', 'Screenshot (7).png', '5 years of experience', 'rasha', 4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `location_id` int(11) NOT NULL,
  `place_id` int(100) NOT NULL,
  `location_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`location_id`, `place_id`, `location_name`) VALUES
(1, 3, 'Mamalakandam'),
(2, 3, 'Ayyapan mudi'),
(3, 3, 'Bhoothathaankettu dam'),
(4, 9, 'Muziris beach'),
(5, 9, 'Muziris fort'),
(6, 2, 'Dam'),
(7, 4, 'Kariyathumpaara'),
(8, 4, 'Naarangathodu'),
(9, 1, 'Grand mall');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_name` varchar(200) NOT NULL,
  `package_rate` varchar(100) NOT NULL,
  `package_details` varchar(500) NOT NULL,
  `package_type_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_name`, `package_rate`, `package_details`, `package_type_id`, `package_id`) VALUES
('munnar-ooty', '2000', 'munnar to ooty', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_type`
--

CREATE TABLE `tbl_package_type` (
  `package_type_name` varchar(100) NOT NULL,
  `package_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package_type`
--

INSERT INTO `tbl_package_type` (`package_type_name`, `package_type_id`) VALUES
('Type-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `district_id` int(50) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`district_id`, `place_name`, `place_id`) VALUES
(1, 'Muvattupuzha', 1),
(2, 'Thodupuzha', 2),
(1, 'Kothamangalam', 3),
(9, 'Perambra', 4),
(5, 'Kodungallur', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_first_name` varchar(500) NOT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_place_id` int(100) NOT NULL,
  `user_photo` varchar(250) NOT NULL,
  `user_proof` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_first_name`, `user_last_name`, `user_contact`, `user_email`, `user_address`, `user_dob`, `user_gender`, `user_password`, `user_place_id`, `user_photo`, `user_proof`, `user_id`) VALUES
('Toby', 'Jose', '9072515306', 'tobyjn@gmail.com', 'Muvattupuzha', '2023-09-01', 'male', '123456', 1, 'Screenshot (1).png', 'Screenshot (2).png', 2),
('Abhinav ', 'Gopi', '6457645765', 'gopi@gmail.com', 'manapattil', '2023-09-08', 'male', 'gopi1', 1, 'Screenshot (32).png', 'Screenshot (62).png', 3),
('Abhishek', 'Ramesh', '1234567898', 'ramesh@gmail.com', 'hello', '2023-09-14', 'female', 'ramesh', 2, 'Screenshot (2).png', 'Screenshot (6).png', 4),
('Nihaala', 'nasar', '9961294690', 'nihaala@gmail.com', 'hello', '2023-09-16', 'female', 'nihaala', 9, 'Screenshot (2).png', 'Screenshot (5).png', 7),
('sid', 'Nair', '9072515306', 'travelguide@gmail.com', 'kodungalllur', '2010-10-15', 'male', 'sid', 4, 'Screenshot (20).png', 'Screenshot (27).png', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_guide`
--
ALTER TABLE `tbl_guide`
  ADD PRIMARY KEY (`guide_id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_package_type`
--
ALTER TABLE `tbl_package_type`
  ADD PRIMARY KEY (`package_type_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_guide`
--
ALTER TABLE `tbl_guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_package_type`
--
ALTER TABLE `tbl_package_type`
  MODIFY `package_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
