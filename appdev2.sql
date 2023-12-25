-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2023 at 09:22 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appdev2`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `vendor_id` int DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `vendor_id`, `product_name`, `prod_image`, `type`, `price`) VALUES
(1, 5, 'Mansanas', 'http://localhost:8080/uploads/odoo pics.jpg', 'Fresh Produce', '25.00'),
(2, 5, 'Apple', 'http://localhost:8080/uploads/Home Rectangle Sideboard Cabinet Wooden Side Board with Doors - 71_L x 14_W x 35_H Buffets & Sideboards.jpg', 'Fresh Produce', '43.00'),
(3, 6, 'Chicken', 'http://localhost:8080/uploads/lp-3.jpg', 'Meat and Poultry', '43.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active',
  `role` varchar(20) DEFAULT 'user',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `token`, `status`, `role`, `created`) VALUES
(1, 'robert', '$2y$10$D64f1xR6QJ54XvIMh9ZE0uakAKoamRxqvGBY.shH61mFp6xS2ykB6', 'xuN0YFtfT7SDZks9QP6aVicqC43gEyBW5GlXrwI2zHp1vUjLJd', 'active', 'user', '2023-12-04 17:01:39'),
(2, 'bebang', '$2y$10$Lcrd.Xf5TuwWOL2SuuW7tuELm.iVsCoKhPoWfhNtZyBAJfURyHxSm', 'i3ZfIbXBoWxGntMTCSFqvVyAd7aN5RE28rjz4gcHe9l0hmpws1', 'active', 'user', '2023-12-04 17:02:29'),
(3, 'Darna', '$2y$10$8CU2CQA1YWqAe9Bkyuq91uGC6LTdGfV6WiteVWkRjlg5rH9KGdQDG', 'dVo2jDQpiHC8xsNPrFWtKZ5qS7Ovz6MLAGkJYIl9hb4UuXfwR1', 'active', 'user', '2023-12-04 17:02:48'),
(4, 'aizle', '$2y$10$I0NVA0oca3ZAUZ/pvwPIfO7uvsLl7U3EX/00c2uk6eALQ9RpAVdpy', 'yHau5SXzcPVtBYb2MqWj1NwJ0oxilFkGRTKIsde6vDrm4fnhQ7', 'active', 'user', '2023-12-05 04:24:04'),
(6, 'Marites', '$2y$10$itVreIxXDQkjot0JL.VFce7HmT0OeiwMoGJvGCSjlyhnMlKZ.g1p2', 'QhJ2ZeqGE6c1LAsgPKroBvdS0MtlkuY3x7wbayRVUOI4HDnpfN', 'active', 'user', '2023-12-08 15:25:09'),
(7, 'Barney', '$2y$10$dqtJ/7KIv8SnIgbFYoaDF.kMbLk84M0f6O1b7rsmyi.XXU5MI6MIy', '9NJBGK2RUIxcehgby083XYOwSQsr6AuEPTLfZVFivkaqCDmpMt', 'active', 'user', '2023-12-08 15:28:18'),
(9, 'Hannah', '$2y$10$GoeWjprMoqcgvjT7uF/vUeK.rgKlEor8P9AjUCHcFGTZsU1mzXcV6', 'rSbM70fyZGP1CpdQUgizFNx9oe6hJ8ILlsnK5DaR4TEquVc3XA', 'active', 'user', '2023-12-13 07:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `user_id`, `vendor_name`, `contact_email`, `contact_number`, `status`) VALUES
(1, 1, 'Robert Weide', 'robert@gmail.com', '09199091234', 'Pending'),
(2, 2, 'Bebang Cordona', 'bebang@gmail.com', '09126780987', 'Pending'),
(3, 3, 'Darna Lucia', 'darna@gmail.com', '09891234567', 'Pending'),
(4, 6, 'Marites Babao', 'marites@gmail.com', '09128901234', 'Pending'),
(5, 7, 'Barney Lemoir', 'barney@gmail.com', '09789091234', 'Pending'),
(6, 9, 'Hannah Delos Santos', 'hannah@gmai.com', '09451237890', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
