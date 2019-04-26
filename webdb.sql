-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 01:28 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `name` varchar(60) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`name`, `feedback`) VALUES
('ahmed mohamed', 'awesome website'),
('sadas sada', 'asdasdas'),
('dsdddS sssssss', 'qeqweqweq'),
('dasda dsad', 'asdsadsadas'),
('asdas aaaaa', 'weeeeeeeeeeeeeeee'),
('aaaad vvvvvvvvvvvvvvvv', 'wwwwwwwwwwwwwwwwwww');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `img` varchar(30) NOT NULL,
  `head` varchar(50) NOT NULL,
  `para` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `img`, `head`, `para`) VALUES
(1, 'pic1.jpg', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dignissimos enim ex recusandae voluptatibus? Aliquam aperiam iusto magni maxime nemo nesciunt non, omnis perferendis placeat quos repellat, similique sit vero!\r\n'),
(2, 'pic2.jpg', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dignissimos enim ex recusandae voluptatibus? Aliquam aperiam iusto magni maxime nemo nesciunt non, omnis perferendis placeat quos repellat, similique sit vero!\r\n'),
(3, 'pic3.jpg', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dignissimos enim ex recusandae voluptatibus? Aliquam aperiam iusto magni maxime nemo nesciunt non, omnis perferendis placeat quos repellat, similique sit vero!\r\n'),
(4, 'pic4.jpg', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dignissimos enim ex recusandae voluptatibus? Aliquam aperiam iusto magni maxime nemo nesciunt non, omnis perferendis placeat quos repellat, similique sit vero!'),
(5, 'pic5.jpg', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dignissimos enim ex recusandae voluptatibus? Aliquam aperiam iusto magni maxime nemo nesciunt non, omnis perferendis placeat quos repellat, similique sit vero!'),
(6, 'pic6.jpg', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dignissimos enim ex recusandae voluptatibus? Aliqu\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(70) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `age`, `gender`) VALUES
(1, 'amr magdy', 'admin01@gmail.com', 'admin01', 24, 'm'),
(2, 'ahmed mohamed', 'ahmedmohamed@yahoo.com', 'admin', 24, 'm');

-- --------------------------------------------------------

--
-- Table structure for table `usersandprod`
--

CREATE TABLE `usersandprod` (
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersandprod`
--

INSERT INTO `usersandprod` (`user_id`, `prod_id`) VALUES
(1, 4),
(2, 2),
(1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
