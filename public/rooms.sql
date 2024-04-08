-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 12:56 PM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `person` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `beds` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`, `person`, `room_type_id`, `description`, `images`, `beds`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe Room', 15, 2, 1, 'Spacious deluxe room with a king-sized bed.', 'deluxe_room.jpg', '1', 10, NULL, NULL),
(2, 'Standard Room', 10, 1, 2, 'Cozy standard room with a queen-sized bed.', 'standard_room.jpg', '2', 10, NULL, NULL),
(3, 'Executive Suite', 25, 2, 3, 'Luxurious executive suite with a separate living area.', 'executive_suite.jpg', '3', 10, NULL, NULL),
(6, 'Presidential Suite', 50, 2, 3, 'Opulent presidential suite with a private dining area.', 'presidential_suite.jpg', '3', 10, NULL, NULL),
(7, 'Duplex Loft', 30, 2, 1, 'Chic duplex loft with modern furnishings.', 'duplex_loft.jpg', '1', 10, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
