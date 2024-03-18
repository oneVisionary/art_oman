-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 03:37 PM
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
(2, 'isisoftwaresolutions', 'contact.isisoftwaresolutions@gmail.com', 'isis123', 'NA', '2024-02-29'),
(3, 'madhu', 'madhu@gmail.com', 'madhu', 'NA', '2024-02-29'),
(4, 'Sanam Kumari', 'sanam123@artwork.com', 'sanam', 'EA', '2024-02-29'),
(7, 'mahesh', 'mahesh@artwork.com', 'mahesh', 'EA', '2024-03-01'),
(8, 'admin', 'admin@gmail.com', 'admin', 'admin', '02-03-2024');

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
(1, 3, 7, 'Hi how are u', '2024-03-01'),
(2, 8, 4, 'Hello', '2024-03-02'),
(3, 8, 7, 'from admin the chats is', '2024-03-02'),
(4, 3, 4, 'Hi sanam here is madhu', '2024-03-02'),
(5, 3, 7, 'Hi mahesh here is madhu', '2024-03-02'),
(6, 8, 4, 'nice to meet u', '2024-03-02'),
(7, 4, 3, 'I will chech for you', '2024-03-02'),
(8, 4, 8, 'Hi hello', '2024-03-02'),
(18, 8, 7, '20240302150317.jfif', '2024-03-02'),
(19, 8, 7, '20240302151200.jpg', '2024-03-02'),
(20, 8, 7, '20240302151323.pdf', '2024-03-02'),
(21, 8, 4, '20240302151813.jpg', '2024-03-02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artorders`
--
ALTER TABLE `artorders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
