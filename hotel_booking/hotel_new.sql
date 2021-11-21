-- Adminer 4.8.1 MySQL 8.0.27-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Hotel`;
CREATE TABLE `Hotel` (
  `hotelID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone_num` varchar(32) NOT NULL,
  `weekend_diff` float NOT NULL,
  `amenities` set('spa','pool','gym','business_office') NOT NULL,
  PRIMARY KEY (`hotelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Hotel` (`hotelID`, `name`, `address`, `phone_num`, `weekend_diff`, `amenities`) VALUES
(4,	'The Magnolia All Suites',	'San Antonio',	'210-123-1234',	1.25,	'spa,pool,gym,business_office'),
(5,	'The Lofts at Town Center',	'San Antonio',	'210-444-4343',	1.35,	'pool,gym,business_office'),
(6,	'Park North Hotel',	'San Antonio',	'210-890-9870',	1.15,	'pool,gym'),
(7,	'The Courtyard Suites',	'Houston',	'713-222-2232',	1.25,	'spa,pool,gym,business_office'),
(8,	'The Regency Rooms',	'Houston',	'713-567-8907',	1.25,	'spa,pool,gym,business_office'),
(9,	'Town Inn Budget Rooms',	'Austin',	'123-234-3456',	1.15,	'pool'),
(10,	'The Comfy Motel Place',	'San Antonio',	'210-543-5435',	1.1,	''),
(11,	'Sun Palace Inn',	'San Antonio',	'210-786-1234',	1.25,	'pool,gym'),
(12,	'HomeAway Inn',	'San Antonio',	'210-434-3434',	1.25,	'pool,business_office'),
(13,	'Rio Inn',	'San Antonio',	'210-321-3210',	1.2,	'pool');

DROP TABLE IF EXISTS `Hotel_Rooms`;
CREATE TABLE `Hotel_Rooms` (
  `hrID` int NOT NULL AUTO_INCREMENT,
  `hotelID` int NOT NULL,
  `room_type` enum('standard','queen','king','suite') NOT NULL,
  `rate` float NOT NULL,
  `total_num` int NOT NULL,
  PRIMARY KEY (`hrID`),
  UNIQUE KEY `room_type_hotelID` (`room_type`,`hotelID`),
  KEY `hotelID` (`hotelID`),
  CONSTRAINT `Hotel_Rooms_ibfk_1` FOREIGN KEY (`hotelID`) REFERENCES `Hotel` (`hotelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Hotel_Rooms` (`hrID`, `hotelID`, `room_type`, `rate`, `total_num`) VALUES
(7,	4,	'standard',	100,	10),
(8,	4,	'queen',	150,	6),
(10,	4,	'king',	250,	4),
(11,	5,	'standard',	105,	30),
(12,	5,	'queen',	120,	20),
(13,	5,	'king',	190,	10),
(14,	6,	'standard',	50,	50),
(15,	6,	'queen',	75,	30),
(16,	6,	'king',	90,	20),
(17,	7,	'standard',	100,	8),
(18,	7,	'queen',	150,	7),
(19,	7,	'king',	250,	5),
(20,	8,	'standard',	100,	10),
(21,	8,	'queen',	150,	5),
(22,	8,	'king',	250,	5),
(23,	9,	'standard',	25,	85),
(24,	9,	'queen',	50,	35),
(25,	9,	'king',	60,	30),
(26,	10,	'standard',	30,	35),
(27,	10,	'queen',	50,	15),
(28,	11,	'standard',	40,	25),
(29,	11,	'queen',	60,	15),
(30,	11,	'king',	80,	10),
(31,	12,	'standard',	50,	30),
(32,	13,	'standard',	25,	20),
(33,	13,	'queen',	55,	17),
(34,	13,	'king',	89,	13);

DROP TABLE IF EXISTS `Hotel_Room_Num`;
CREATE TABLE `Hotel_Room_Num` (
  `room_num` int NOT NULL,
  `hrID` int NOT NULL,
  PRIMARY KEY (`room_num`,`hrID`),
  KEY `hrID` (`hrID`),
  CONSTRAINT `Hotel_Room_Num_ibfk_1` FOREIGN KEY (`hrID`) REFERENCES `Hotel_Rooms` (`hrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` enum('customer','manager') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `Booking`;
CREATE TABLE `Booking` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `hrID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `start_dt` date NOT NULL,
  `end_dt` date NOT NULL,
  `party_size` int NOT NULL,
  `phone_num` varchar(16) NOT NULL,
  `email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_num` int DEFAULT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `hrID` (`hrID`),
  KEY `userID` (`userID`),
  CONSTRAINT `Booking_ibfk_3` FOREIGN KEY (`hrID`) REFERENCES `Hotel_Rooms` (`hrID`),
  CONSTRAINT `Booking_ibfk_5` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `User` (`userID`, `username`, `password`, `full_name`, `email`, `permissions`) VALUES
(4,	'tuan',	'1234',	'tuan Nguyen',	'Nguyen@gmail.com',	'manager'),
(5,	'John',	'123',	'john kolh',	'Johnson@gmail.com',	'customer'),
(6,	'kevin',	'5432',	'kevin lamar',	'kevin@gmail.com',	'customer'),
(7,	'tom',	'tom123',	'tom Johnson',	'tomJohnson@gmail.com',	'manager'),
(8,	'jessy',	'1234',	'jessy henson',	'admin@admin.com',	'manager');

-- 2021-11-18 10:20:47