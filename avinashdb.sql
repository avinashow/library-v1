-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2014 at 06:43 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `avinashdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `account_type` varchar(10) NOT NULL,
  `books_allowed` int(11) DEFAULT NULL,
  PRIMARY KEY (`account_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`account_type`, `books_allowed`) VALUES
('gold', 20),
('platinum', 50),
('silver', 10);

-- --------------------------------------------------------

--
-- Table structure for table `lib_borrow_details`
--

CREATE TABLE IF NOT EXISTS `lib_borrow_details` (
  `Username` varchar(20) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `amount_paid` float DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  KEY `Username` (`Username`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lib_catalogue_books`
--

CREATE TABLE IF NOT EXISTS `lib_catalogue_books` (
  `Book_id` int(11) NOT NULL AUTO_INCREMENT,
  `Book_name` varchar(30) DEFAULT NULL,
  `Author_name` varchar(30) DEFAULT NULL,
  `no_of_books` int(11) DEFAULT NULL,
  `year_of_publication` int(11) DEFAULT NULL,
  `pulbish_company` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lib_catalogue_books`
--

INSERT INTO `lib_catalogue_books` (`Book_id`, `Book_name`, `Author_name`, `no_of_books`, `year_of_publication`, `pulbish_company`) VALUES
(1, 'Do Androids Dream of Electric ', 'Philip K. Dick', 6, 1968, 'Del Rey'),
(2, 'The Hunger Games', 'Suzanne Collins', 67, 2008, 'scholasticpress');

-- --------------------------------------------------------

--
-- Table structure for table `lib_user_login`
--

CREATE TABLE IF NOT EXISTS `lib_user_login` (
  `Username` varchar(20) NOT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `Lastname` varchar(40) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `Email_ID` varchar(30) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `account_type` varchar(30) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_user_login`
--

INSERT INTO `lib_user_login` (`Username`, `firstname`, `Lastname`, `password`, `address`, `Email_ID`, `phoneno`, `date_of_birth`, `account_type`, `category`) VALUES
('akilesh', 'AKILESH', 'masna', 'avinash', '1550 SW 104 PATH', 'avinashow@gmail.com', 2147483647, '1990-12-30', 'platinum', 'user'),
('avinashow', 'avinash', 'chowdary', 'avinash', '1550 SW 104 PATH', 'avinashow@gmail.com', 2147483647, '1990-12-30', 'silver', 'user'),
('ravi008', 'ravi', 'kumar', 'ravi', '1550 SW 104 PATH', 'ravi0082gmail.com', 2147483647, NULL, '', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lib_borrow_details`
--
ALTER TABLE `lib_borrow_details`
  ADD CONSTRAINT `lib_borrow_details_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `lib_user_login` (`Username`),
  ADD CONSTRAINT `lib_borrow_details_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `lib_catalogue_books` (`Book_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
