-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 01:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(10) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `customer_id`, `name`, `email`, `description`) VALUES
(14, '1', 'Weight Loss', '', 'I want a loss my weight please give me diet plan for Weight loss and Yoga poss.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `customer_img` varchar(200) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `fees` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_id`, `owner_id`, `customer_img`, `fname`, `lname`, `gender`, `email`, `password`, `phone_no`, `dob`, `address`, `fees`) VALUES
(8, 1, 1, '../uploaded_images/yoga.jpeg', 'PATEL', 'ARPIT', 'Male', 'arpit@gmail.com', 'arpit', '06356119899', '2004-06-08', 'VADODARA', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` varchar(200) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`id`, `owner_id`, `name`, `content`, `issue_date`) VALUES
(13, 101, 'Breakfast', 'Oatmeal topped with cinnamon, nut butter & fresh berries\r\n\r\nHerbal tea', '2024-05-13'),
(14, 101, 'Lunch', 'Salad with fresh veggies, sweet potato, avocado & chickpeas, with a lemon & olive oil dressing\r\n\r\nGreek yogurt', '2024-05-13'),
(15, 101, 'Dinner', 'Stir fried vegetables with tofu, ginger, & brown rice', '2024-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(100) NOT NULL,
  `owner_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `owner_id`, `name`, `email`, `password`) VALUES
(1, 101, 'DHRUV', 'dhruv@gmail.com', 'dhruv');

-- --------------------------------------------------------

--
-- Table structure for table `yogasan`
--

CREATE TABLE `yogasan` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `des` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yogasan`
--

INSERT INTO `yogasan` (`id`, `img`, `des`, `name`) VALUES
(8, 'chil_yoga.jpeg', 'The child pose helps to stretch your back and musc', 'Child Pose'),
(15, 'yoga.jpeg', 'It is a beautiful yoga posture', 'NATARAJASANA'),
(18, 'Sphinx-Pose.webp', 'yoga pose', 'sphinx pose');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yogasan`
--
ALTER TABLE `yogasan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diet`
--
ALTER TABLE `diet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `yogasan`
--
ALTER TABLE `yogasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
