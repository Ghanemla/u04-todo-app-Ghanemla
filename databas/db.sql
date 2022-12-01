-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `company`;
CREATE DATABASE `company` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `company`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `name` text NOT NULL,
  `fav_color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`name`, `fav_color`) VALUES
('Lucy',	'Yellow'),
('Nick',	'Red'),
('Mark',	'Blue');

-- 2022-11-13 22:11:35
