-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 04:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(255) NOT NULL,
  `book_title` varchar(200) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `price` int(100) NOT NULL,
  `image_loc` varchar(500) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'new',
  `description` longtext NOT NULL,
  `index_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `isbn`, `publisher`, `author`, `price`, `image_loc`, `type`, `description`, `index_img`) VALUES
(4, 'opps through java', '1213-2323-1-121', 'james pub', 'wicky singh', 200, '5b69319feafef_thumb900.jpg', 'new', 'THIS IS THE PERFECT BOOK FOR YOUR INTRESTED FEILD', 'SAVE_20200403_181023.jpg'),
(6, 'dsa', '1212-221-3443-556', 'sameer pub', 'sameer', 440, '9789387964112.jpg', 'new', 'THIS IS THE PERFECT BOOK FOR YOUR INTRESTED FEILD', 'SAVE_20200403_180954.jpg'),
(8, 'indian constitution', '2332-23423-42121-44', 'p.r pub', 'peter', 150, '9780316494021-1.jpg', 'new', 'THIS IS THE PERFECT BOOK FOR YOUR INTRESTED FEILD', 'SAVE_20200403_181023.jpg'),
(9, 'dbms', '4323-1123-5576-2479', 'khan pub', 'parkar', 180, '91OME-jyFmL.jpg', 'new', 'THIS IS THE PERFECT BOOK FOR YOUR INTRESTED FEILD', 'SAVE_20200403_180954.jpg'),
(10, 'system administration', '605-343-634-788', 'p.r pub', 'wicky singh', 130, '41qGEi+y5SL._SX351_BO1,204,203,200_-1.jpg', 'new', 'THIS IS THE PERFECT BOOK FOR YOUR INTRESTED FEILD', 'SAVE_20200403_181023.jpg'),
(11, 'opps through java', '495-348395-3434', 's.k pub', 'smith', 280, '1111016936204.jpg', 'new', 'THIS IS THE PERFECT BOOK FOR YOUR INTRESTED FEILD', 'SAVE_20200403_175115.jpg'),
(12, 'python', '3463-6768-7895', 'marker pub', 'rakesh', 170, '40097951._SY475_.jpg', 'new', 'THIS IS THE PERFECT BOOK FOR YOUR INTRESTED FEILD', 'SAVE_20200403_181023.jpg'),
(13, 'computer architecher', '98569-5496-3594', 'james pub', 'parker', 320, 'large-1.jpg', 'new', 'THIS IS THE PERFECT BOOK FOR YOUR INTRESTED FEILD', 'SAVE_20200403_175115.jpg'),
(17, 'discrete mathametics', '302-121-443-56', 'rakesh pub', 'williym', 440, 'Eular-PR-Book-Perspective-min.jpg', 'old', 'THIS IS THE PERFECT BOOK FOR YOUR INTRESTED FEILD', 'SAVE_20200403_181023.jpg'),
(21, 'ENVIRONMENTAL SCIENCE', '23423-34542-1234-32442', 'DAVID PUB', 'A. PAVAN', 137, 'large-1.jpg', 'new', 'THIS BOOK IS RELATED TO THE ENVIRONMENTAL STUDIES WRITTEN BY A. PAVAN KUMAR', 'SAVE_20200403_180954.jpg'),
(22, 'java programming', '123-362-4737', 'parker publishers', 'jones', 300, '40097951._SY475_.jpg', 'old', 'THIS BOOK IS RELATED TO THE JAVA PROGRAMMING WRITTEN BY JONES.', 'SAVE_20200403_175115.jpg'),
(23, 'ruby programming', '234345-765-654-23', 'R.K publishers', 'K. ramesh', 245, '91OME-jyFmL.jpg', 'new', 'THIS BOOK IS RELATED TO THE RUBY PROGRAMMING WRITTEN BY K. RAMESH.', 'SAVE_20200403_175115.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cust_order`
--

CREATE TABLE `cust_order` (
  `recipt_no` bigint(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone_no` bigint(200) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_order`
--

INSERT INTO `cust_order` (`recipt_no`, `name`, `address`, `phone_no`, `emailid`, `price`) VALUES
(683595355, 'sameer', '9-7-45-34', 8008169286, 'ss3339603@gmail.com', 2770),
(903806997, 'sameer', '9-7-45-34 GOLCONDA', 8008169286, 'ss3339603@gmail.com', 590),
(973149889, 'sameer', '9-7-45-34', 8008169286, 'ss3339603@gmail.com', 440),
(1056993399, 'sameer', '9-7-45-34', 8008169286, 'ss3339603@gmail.com', 590),
(1322205723, 'sameer', '9-7-45-34', 8008169286, 'ss3339603@gmail.com', 440),
(1323867666, 'sameer', '9-7-45-34', 8008169286, 'ss3339603@gmail.com', 150),
(1669136469, 'sameer', '9-7-45-34', 8008169286, 'ss3339603@gmail.com', 1795);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(2, 'sameer', 'sameer123@gmail.com', 'admin', 'sameer123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `cust_order`
--
ALTER TABLE `cust_order`
  ADD PRIMARY KEY (`recipt_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
