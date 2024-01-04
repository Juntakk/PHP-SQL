-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 11:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image_path` varchar(30) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `name`, `image_path`, `price`) VALUES
(1, 'Volley-ball', '../images/vball.png', 29.99),
(2, 'Racket', '../images/racket.png', 89.99),
(3, 'Skates', '../images/skates.png', 99.99),
(4, 'Helmet', '../images/helmet1.png', 76.99),
(5, 'Birdie', '../images/birdie.png', 2.5),
(6, 'Jersey', '../images/jersey1.png', 24.99),
(7, 'Shorts', '../images/shorts1.png', 14.99),
(8, 'Basketball', '../images/basketball.png', 20.99),
(9, 'Balls', '../images/balls.png', 1.99),
(10, 'Pucks', '../images/pucks.png', 3.99),
(11, 'Baseballs', '../images/baseballs.png', 4.99),
(12, 'Shoes', '../images/shoes.png', 132.99);

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_id`, `name`) VALUES
(8, 'baseball'),
(6, 'basketball'),
(7, 'hockey'),
(5, 'volleyball');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sport` varchar(255) DEFAULT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `sport`, `level`) VALUES
(1, 'nick.habashi@gmail.com', 'Juntakk', '123', 'volleyball', 'Expert'),
(2, 'sarah.petri@outlook.com', 'Ripley', '123', 'volleyball', 'Expert'),
(35, 'sarah.petri@outlook.com', 'Ripley', '$2y$10$u2E1R1BXHSGfL7hoo1AJYOhLhuBCefNhbkj5/.hU3NzdvuEHlDlTK', 'volleyball', 'Intermediate'),
(39, 'poopoo@gmail.com', 'Jorflonk', '123', 'basketball', 'Intermediate'),
(40, 'badole@mooole.com', 'Maldlae', 'wdj134', 'hockey', 'Beginner'),
(41, 'niwedbchet@mgilc.com', 'Jandiela', 'Adjjrnc', 'volleyball', 'Beginner'),
(42, 'mamamama', 'mamamam', '$2y$10$DFulSXtDAx/HFdELKN7DIe8OWvapXE0aQRcvRdGKnzgyISGtUrEZi', 'baseball', 'Beginner'),
(43, 'mamamama', 'mamamam', 'mamamama', 'baseball', 'Beginner'),
(44, 'lalala@cc.com', 'lalala', 'lalala', 'basketball', 'Expert');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport` (`sport`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sport`) REFERENCES `sport` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
