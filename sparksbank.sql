-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 21, 2021 at 09:14 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparksbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `S.no` int(3) NOT NULL AUTO_INCREMENT,
  `Sender` varchar(20) NOT NULL,
  `Receiver` varchar(20) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date and Time` datetime NOT NULL,
  PRIMARY KEY (`S.no`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`S.no`, `Sender`, `Receiver`, `Amount`, `Date and Time`) VALUES
(5, 'Soumya', 'Vennela', 400, '2021-08-03 23:48:19'),
(4, 'Haindavi', 'Kushal', 50, '2021-08-12 23:48:19'),
(3, 'Kushal', 'Haindavi', 100, '2021-08-11 23:48:19'),
(2, 'Sumayya', 'Shaista', 2000, '2021-08-05 23:39:31'),
(1, 'Shaista', 'Sumayya', 4000, '2021-08-01 23:48:19'),
(6, 'Vennela', 'Soumya', 200, '2021-08-08 23:48:19'),
(7, 'Shagufta', 'Samreen', 150, '2021-08-04 23:48:19'),
(8, 'Nooreen', 'Arshiya', 500, '2021-08-16 23:48:19'),
(9, 'Ayaan', 'Saba', 700, '2021-08-14 23:48:19'),
(10, 'Riyaz', 'Rizwan', 70, '2021-08-02 23:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Balance` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Email`, `Balance`) VALUES
(1, 'Shaista', 'shaista@gmail.com', 100000),
(2, 'Sumayya', 'sumayya@gmail.com', 90000),
(3, 'Kushal', 'kushal@gmail.com', 80000),
(4, 'Haindavi', 'haindavi@gmail.com', 70000),
(5, 'Soumya', 'soumya@gmail.com', 50000),
(6, 'Shagufta', 'shagufta@gmail.com', 70000),
(7, 'Samreen', 'samreen@gmail.com', 80000),
(8, 'Nooreen', 'nooreen@gmail.com', 100000),
(9, 'Arshiya', 'arshiya@gmail.com', 70000),
(10, 'Ayaan', 'ayaan@gmail.com', 80000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
