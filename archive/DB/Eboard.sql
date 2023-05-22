-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2023 at 11:52 AM
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
-- Table structure for table `Eboard`
--

CREATE TABLE `Eboard` (
  `Name` varchar(40) NOT NULL,
  `Role` varchar(40) NOT NULL,
  `UCID` varchar(40) NOT NULL,
  `Year` varchar(40) NOT NULL,
  `Major` varchar(80) NOT NULL,
  `Term` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Eboard`
--

INSERT INTO `Eboard` (`Name`, `Role`, `UCID`, `Year`, `Major`, `Term`) VALUES
('Eduardo Preciado', 'President', 'ejp9', 'Senior', 'CS', '2016'),
('Theresa Wagner', 'Vice President', 'tlw7', 'Junior', 'IT/CoE', '2016'),
('Tariq Khan', 'Treasurer', 'tk97', 'Junior', 'CS', '2016'),
('Brandon Ruggles', 'Webmaster', 'btr2', 'Junior', 'CS', '2016'),
('John Moreira', 'Secretary', 'jnm26', 'Junior', 'CS', '2016'),
('Mohammad Omer', 'President', '', '', 'Computer Science', '2015'),
('Eduardo Preciado', 'Vice President', '', '', 'Computer Science', '2015'),
('Zakie Hinds', 'Treasurer', '', '', 'IT', '2015'),
('Binoy Patel', 'Webmaster', '', '', 'Web & IS', '2015'),
('Theresa Wagner', 'Secretary', '', 'Sophomore', 'IT/CoE', '2015'),
('Khadir Williams', 'Webmaster', 'kjw26', 'Senior', 'CS', '2017'),
('David Barnes', 'Vice President', 'djb68', 'Junior', 'CS', '2017'),
('Theresa Wagner', 'President', 'tlw7', 'Senior', 'IT/CoE', '2017'),
('Migle Surblyte', 'Secretary', 'ms2286', 'Sophomore', 'CS', '2017'),
('John Daudelin', 'Treasurer', 'jed34', 'Junior', 'CS', '2017'),
('Matthew Gasin', 'Public Relations', 'mg427', 'Junior', 'CS', '2017'),
('Evan Markowitz', 'Treasurer', 'em328', '', 'CS', '2018'),
('Marisa Sigas', 'Webmaster', 'ms2437', '', 'CS', '2018'),
('Matt Gasin', 'Vice President', 'mg427', '', 'CS', '2018'),
('Migle Surblyte', 'Public Relations', 'ms2286', '', 'CS', '2018'),
('David Barnes', 'President', 'djb68', '', 'CS', '2018'),
('David Michealson', 'Secretary', '', '', 'CS', '2018'),
('Evan Markowitz', 'Vice President', 'em328', '', 'CS', '2019'),
('Matt Gasin', 'President', 'mg427', '', 'CS', '2019'),
('Migle Surblyte', 'Public Relations', 'ms2286', '', 'CS', '2019'),
('Marisa Sigas', 'Secretary', 'ms2437', '', 'CS', '2019'),
('Jacob Fuhr', 'Treasurer', 'jf362', '', 'IT', '2019'),
('Connor Criscoe', 'Webmaster', 'cjc63', '', 'CS', '2019'),
('Evan Markowitz', 'President', 'em328', '', 'CS', '2020'),
('Seven Kurt', 'Treasurer', 'sk2593', '', 'Computer Engineering', '2020'),
('Giancarlo Calle', 'SIG Master', 'gc288', '', 'CS', '2020'),
('Andrey Morales', 'Webmaster', 'agm39', '', 'WIS', '2020'),
('Andrea Cleofe', 'Secretary', 'ac682', '', 'IT', '2020'),
('Jacob Fuhr', 'Vice President', 'jf362', '', 'IT', '2020'),
('Diogo Cardoso', 'Public Relations', 'dmc48', '', 'IT', '2020'),
('AOrps', 'Graphic Designer', 'aeo34', '', 'CS/IT', '2020'),
('Seven Kurt', 'President', 'sk2593', '', 'Computer Engineering', '2021'),
('Andrey Morales', 'Vice President', 'agm39', '', 'WIS', '2021'),
('Brett Johnson', 'Treasurer', 'bj244', '', 'IT', '2021'),
('Amandeep Singh', 'Webmaster', 'as3627', '', 'CS', '2021'),
('David Garcia', 'SIG Master', 'dg533', '', 'IT', '2021'),
('Andre Costa', 'Public Relations', 'ac936', '', 'CS', '2021'),
('Sreya Das', 'Graphic Designer', 'sd757', '', 'CS', '2021'),
('Logan Reyes', 'Secretary', 'ler25', '', 'IT', '2021'),
('Massa Belal', 'Secretary', 'mb287', 'Freshman', 'CS', '2022'),
('David Garcia', 'President', 'dg533', 'Junior', 'IT', '2022'),
('Alexander Druzenko', 'Webmaster', 'ad898', 'Freshman', 'CS', '2022'),
('Christian Gutierrez', 'Vice President', 'cg462', 'Junior', 'CS', '2022'),
('Joseph Janssen', 'Public Relations', 'jpj6', 'Freshman', 'CS', '2022'),
('Cade Riegler', 'Treasurer', 'cpr7', 'Junior', 'Comp Eng', '2022'),
('Ethan Ho', 'SIG Master', 'ekh3', 'Freshman', 'CS', '2022'),
('Anthony Siracusa', 'Graphic Designer', 'aws4', 'Freshman', 'CS', '2022'),
('Alex Druzenko', 'Webmaster', 'ad898', 'Junior', 'CS', '2023'),
('Ethan Ho', 'President', 'ekh3', 'Sophomore', 'CS', '2023'),
('Will Simkins', 'Treasurer', 'wss9', 'Junior', 'CS/Math', '2023'),
('Anthony Siracusa', 'Vice President', 'aws4', 'Junior', 'CS/Math Sci', '2023'),
('Kapila Mane', 'Graphic Designer', 'km776', 'Freshman', 'HCI', '2023'),
('Isaac Guerrero', 'Secretary', 'iag8', 'Senior', 'IT', '2023'),
('Ryan Pupia', 'SIG Master', 'rp972', 'Sophomore', 'Data Sci', '2023'),
('Jayden Alexis', 'Public Relations', 'jma88', 'Freshman', 'IT', '2023');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
