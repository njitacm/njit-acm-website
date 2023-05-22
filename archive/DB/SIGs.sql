-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2023 at 12:02 PM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `njithost_acm_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `SIGs`
--

CREATE TABLE `SIGs` (
  `Name` varchar(255) NOT NULL,
  `Leaders` varchar(255) DEFAULT NULL,
  `Contact Info` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SIGs`
--

INSERT INTO `SIGs` (`Name`, `Leaders`, `Contact Info`, `Time`, `Description`) VALUES
('SIG Algorithm', 'Giancarlo Calle', 'pumpingLemma#1421', 'Weekly, Thursday 7:30pm', 'Learning and mastering different algorithms and data structures, both for classes and technical interviews! Will be coding intensive.'),
('SIG PI', 'Dominik Kreslo', 'Dominik\r\n#1290', 'TBD', 'SIG meant to teach anything and everything related to using a RaspberryPi'),
('SIG Roblox', 'David Garcia', 'JustPlainDark#0613', 'TBD', 'Come learn how to make Roblox games with Lua scripting! '),
('SIG Web Dev', 'Andrey Morales', 'helloToco#4362', 'Biweekly, Wednesday 2:30pm - 3:30pm', 'Discuss topics like HTML, CSS, and Web Design to help you create and run your own website! Backend Web Dev TBD'),
('SIG Interview', 'Marisa Sigas', 'zippo#8952', 'Weekly, Friday 12:30pm', 'Work on technical interview problems in a casual, collaborative environment, ask questions about the Software Engineering interview process, learn interview soft-skills, and more!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SIGs`
--
ALTER TABLE `SIGs`
  ADD PRIMARY KEY (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
