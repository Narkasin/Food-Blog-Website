-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host : 127.0.0.1
-- Generated on: Thu, Apr 27, 2023 at 01:30
-- Server version : 10.4.27-MariaDB
-- PHP version : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database : `food`
--
CREATE DATABASE IF NOT EXISTS `food` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `food`;

-- --------------------------------------------------------

--
-- Table Structure `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `category_name` varchar(64) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modification_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Unloading table data `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `creation_date`, `modification_date`) VALUES
(27, 'Breakfast', '2023-04-26 23:22:51', '2023-04-26 23:22:51'),
(28, 'Pizza', '2023-04-26 23:23:06', '2023-04-26 23:23:06'),
(29, 'Eggs', '2023-04-26 23:23:23', '2023-04-26 23:23:23');

-- --------------------------------------------------------

--
-- Table Structure `file_extensions`
--

CREATE TABLE `file_extensions` (
  `id` int(20) NOT NULL,
  `extension_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `extension_subject` varchar(256) NOT NULL,
  `extension_description` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table Structure `labels`
--

CREATE TABLE `labels` (
  `id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `label_name` varchar(64) NOT NULL,
  `label_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Unloading table structure `labels`
--

INSERT INTO `labels` (`id`, `category_id`, `label_name`, `label_description`) VALUES
(1, 27, 'Fruits break fast', '<h2>Break fast with fruits</h2>'),
(2, 27, 'Pancakes', '<h2>Pancakes</h2>'),
(3, 28, 'Pizza', '<h2>Delicious pizza</h2><p>A delicious pizza</p>'),
(4, 29, 'Eggs', '<h3>This is a heading 3</h3><p><br></p><p>Hello World!</p>');

-- --------------------------------------------------------

--
-- Table Structure `my_settings`
--

CREATE TABLE `my_settings` (
  `id` int(20) NOT NULL,
  `my_title` varchar(32) NOT NULL,
  `my_about` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Unloading table data `my_settings`
--

INSERT INTO `my_settings` (`id`, `my_title`, `my_about`) VALUES
(1, 'Food Blog', '<h1>This is a food blog</h1>');

-- --------------------------------------------------------

--
-- Table Structure `permissions`
--

CREATE TABLE `permissions` (
  `id` int(20) NOT NULL,
  `permission_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Unloading table data `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`) VALUES
(1, 'Messages'),
(2, 'Categories'),
(3, 'Foods'),
(4, 'Users'),
(5, 'Roles'),
(6, 'Settings');

-- --------------------------------------------------------

--
-- Table Structure `rel_role_perm`
--

CREATE TABLE `rel_role_perm` (
  `id` int(20) NOT NULL,
  `role_id` int(20) NOT NULL,
  `perm_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Unloading table data `rel_role_perm`
--

INSERT INTO `rel_role_perm` (`id`, `role_id`, `perm_id`) VALUES
(43, 25, 1),
(44, 25, 2),
(45, 25, 3),
(46, 25, 4),
(47, 25, 5),
(48, 25, 6),
(54, 24, 1),
(55, 24, 2),
(56, 24, 3),
(57, 24, 4),
(58, 24, 5),
(59, 24, 6),
(64, 26, 1),
(65, 26, 2),
(66, 26, 3),
(67, 26, 4),
(68, 26, 5),
(69, 26, 6);

-- --------------------------------------------------------

--
-- Table Structure `roles`
--

CREATE TABLE `roles` (
  `id` int(20) NOT NULL,
  `role_name` varchar(64) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modification_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Unloading table data `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `creation_date`, `modification_date`) VALUES
(24, 'Admin', '2023-03-22 19:30:27', '2023-03-22 19:30:27'),
(25, 'Super Admin', '2023-03-25 22:56:37', '2023-03-25 22:56:37'),
(26, 'User', '2023-03-31 21:44:35', '2023-03-31 21:44:35');

-- --------------------------------------------------------

--
-- Table Structure `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(512) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_superuser` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` int(20) DEFAULT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Unloading table data `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `pw`, `is_active`, `is_superuser`, `role_id`, `date_joined`) VALUES
(1, 'admin', 'Ameen', 'Salam', 'admin@gmail.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, 1, NULL, '2023-03-07 19:56:12'),
(14, 'visitor', 'Jon', 'Doe', 'jon@gmail.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, 0, 26, '2023-04-26 23:29:58');

--
-- Index for unloaded tables
--

--
-- Indexes for tables `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for tables `file_extensions`
--
ALTER TABLE `file_extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for tables `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for tables `my_settings`
--
ALTER TABLE `my_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for tables `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for tables `rel_role_perm`
--
ALTER TABLE `rel_role_perm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `perm_id` (`perm_id`);

--
-- Indexes for tables `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for tables `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for unloaded tables
--

--
-- AUTO_INCREMENT for tables `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for tables `file_extensions`
--
ALTER TABLE `file_extensions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for tables `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for tables `my_settings`
--
ALTER TABLE `my_settings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for tables `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for tables `rel_role_perm`
--
ALTER TABLE `rel_role_perm`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for tables `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for tables `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for unloaded tables
--

--
-- Constraints for tables `labels`
--
ALTER TABLE `labels`
  ADD CONSTRAINT `labels_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for tables `rel_role_perm`
--
ALTER TABLE `rel_role_perm`
  ADD CONSTRAINT `rel_role_perm_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rel_role_perm_ibfk_2` FOREIGN KEY (`perm_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for tables `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
