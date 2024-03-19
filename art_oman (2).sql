-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 10:36 AM
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
-- Database: `art_oman`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `art_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` char(100) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`art_id`, `artist_id`, `title`, `description`, `price`, `created_at`, `img`) VALUES
(1, 7, 'Design of Girl Face', 'Girl Face with colorful', '25000', '2024-03-01', '20240301074214.jpg'),
(3, 7, 'Write View', 'Wonderful Paint', '25830', '2024-03-01', '20240301102538.jpg'),
(5, 7, 'Bid Info', 'This is new view of bid', '500', '2024-03-02', '20240302072818.jpg'),
(8, 4, 'Blackbox', 'IIRI', '5666', '2024-03-02', '20240302074311.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mode` varchar(15) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `username`, `email`, `password`, `mode`, `created_at`) VALUES
(1, 'username', 'email', 'password', 'mode', 'created_at'),
(3, 'madhu', 'madhu@gmail.com', 'madhu', 'NA', '2024-02-29'),
(4, 'Sanam Kumari', 'sanam123@artwork.com', 'sanam', 'EA', '2024-02-29'),
(7, 'mahesh', 'mahesh@artwork.com', 'mahesh', 'EA', '2024-03-01'),
(8, 'admin', 'admin@gmail.com', 'admin', 'admin', '02-03-2024'),
(9, 'uma', 'uma@gmail.com', 'uma', 'NA', '2024-03-18'),
(10, 'Timur', 'timur@art.com', 'timur', 'NA', '2024-03-19'),
(11, 'Naveen', 'naveen@artwork.com', 'naveen', 'EA', '2024-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `artorders`
--

CREATE TABLE `artorders` (
  `order_id` int(11) NOT NULL,
  `new_artist_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artorders`
--

INSERT INTO `artorders` (`order_id`, `new_artist_id`, `art_id`, `created_at`) VALUES
(1, 3, 1, '2024-03-01'),
(2, 3, 4, '2024-03-01'),
(3, 3, 3, '2024-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `sendby` int(11) NOT NULL,
  `sendto` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `sendby`, `sendto`, `message`, `created_at`) VALUES
(29, 8, 7, 'Hello mahesh, this is admin', '2024-03-19'),
(30, 7, 8, 'I will chat with you in a minute', '2024-03-19'),
(31, 8, 7, 'Sure mahesh i will be in wait', '2024-03-19'),
(32, 10, 7, 'hi mahesh this timur can u see my art i will upload here', '2024-03-19'),
(33, 10, 7, 'Nice to meet u timur', '2024-03-19'),
(34, 7, 10, 'This from mahes expert side', '2024-03-19'),
(35, 10, 7, 'Hi mahesh this from timur', '2024-03-19'),
(36, 10, 11, 'Hi this uma from new expert side', '2024-03-19'),
(37, 10, 11, 'This is naveen expert here', '2024-03-19'),
(38, 10, 11, 'Hi timur how are you man by naveen', '2024-03-19'),
(39, 10, 11, 'This is an again message by expert naveen', '2024-03-19'),
(40, 10, 11, 'This by NVN', '2024-03-19'),
(41, 11, 10, 'Hwllo bo by navenne', '2024-03-19'),
(42, 10, 11, 'Hi naveen this is timur how r u man', '2024-03-19'),
(43, 11, 10, 'How is going on??', '2024-03-19'),
(44, 10, 11, 'Everything good here naveen', '2024-03-19'),
(45, 10, 11, 'How abt ur family', '2024-03-19'),
(46, 11, 10, 'yes going well timur', '2024-03-19'),
(47, 8, 11, 'Hi naveen this is admin side how are u.. what abt ur work', '2024-03-19'),
(48, 11, 8, 'Good man i will update', '2024-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `feedback` varchar(1500) NOT NULL,
  `star` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `artid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `feedback`, `star`, `created_at`, `artid`) VALUES
(4, 'Riya', 'Good Art', '5', '2024-03-19', 3),
(5, 'Sona', 'Wow beautiful', '3', '2024-03-19', 3),
(6, 'Noman', 'Good to see', '5', '2024-03-19', 3),
(7, 'Sana', 'Good One', '4', '2024-03-19', 1),
(8, 'binu', 'not good to appreciate', '3', '2024-03-19', 1),
(9, 'Hosan', 'Good to see', '4', '2024-03-19', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artorders`
--
ALTER TABLE `artorders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `artorders`
--
ALTER TABLE `artorders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
