-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 02:16 PM
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
-- Database: `kazon_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'osamah@gmail.com', 'go123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `img`, `quantity`, `product_id`, `user_id`) VALUES
(25, 'osamah', '20$', '403_Engaging Fast Food Website Hero Banner - Mr Khalil.jpg', '2', 13, 2),
(26, '     eeeeeeeeeeeeeee', '    10$', '', '1', 12, 2),
(27, '     eeeeeeeeeeeeeee', '    10$', '', '1', 12, 1),
(28, '     eeeeeeeeeeeeeee', '    10$', '', '1', 12, 3),
(29, '     eeeeeeeeeeeeeee', '    10$', '', '1', 12, 5),
(30, 'osamah', '20$', '403_Engaging Fast Food Website Hero Banner - Mr Khalil.jpg', '1', 13, 5),
(31, '     eeeeeeeeeeeeeee', '    10$', '', '1', 12, 9),
(32, '     eeeeeeeeeeeeeee', '    10$', '', '1', 12, 10),
(34, 'osamah', '20$', '351_Engaging Fast Food Website Hero Banner - Mr Khalil.jpg', '3', 14, 12);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_img` varchar(200) NOT NULL,
  `pro_price` varchar(200) NOT NULL,
  `pro_section` varchar(200) NOT NULL,
  `pro_descrip` varchar(1000) NOT NULL,
  `pro_size` varchar(200) NOT NULL,
  `pro_unv` varchar(100) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pro_name`, `pro_img`, `pro_price`, `pro_section`, `pro_descrip`, `pro_size`, `pro_unv`) VALUES
(12, '     eeeeeeeeeeeeeee', '', '    10$', 'food', '     eeeeeeeeeeee', ' small', '    unavailable'),
(13, 'osamah', '403_Engaging Fast Food Website Hero Banner - Mr Khalil.jpg', '20$', 'food', 'hot burger with an ything', 'medum', ''),
(14, 'osamah', '351_Engaging Fast Food Website Hero Banner - Mr Khalil.jpg', '20$', 'food', 'hot burger with an ything', 'medum', ''),
(15, 'moto g power 2021', '2454_WIN_20251203_15_57_43_Pro.jpg', '100$', 'electronics', 'تلفون ضد الدكمات و الهجشات ', 'small', ''),
(17, 'ـــتشــ', '3464_WIN_20251203_15_57_54_Pro.jpg', '500$', 'perfum', 'حب من اول شمه', 'small', '');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `Section_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `Section_name`) VALUES
(6, 'clothes'),
(9, 'food'),
(13, 'electronics'),
(15, 'perfum');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `created_at`) VALUES
(1, 'ali', 'ali@gmail.com', '111', '2025-11-29 20:42:32'),
(2, 'aml', 'aml@gmail.com', '123', '2025-11-29 21:09:24'),
(6, 'nano', 'nano@gmail.com', '000', '2025-12-01 22:45:03'),
(9, 'dfd', 'www@ww', 'df', '2025-12-01 22:59:02'),
(10, 'aa', 'www@ww', 'aa', '2025-12-01 23:01:49'),
(11, 'osama', 'os@gmail.com', 'osama', '2025-12-03 12:13:12'),
(12, 'os', 'osamah@gmail.com', '555', '2025-12-03 12:28:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
