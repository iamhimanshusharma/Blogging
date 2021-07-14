-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2021 at 04:58 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `author_id` varchar(50) NOT NULL,
  `blog_name` varchar(100) NOT NULL,
  `blog_category` varchar(100) NOT NULL,
  `blog_file` varchar(100) NOT NULL,
  `blog_author` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs_comment`
--

DROP TABLE IF EXISTS `blogs_comment`;
CREATE TABLE IF NOT EXISTS `blogs_comment` (
  `blogs_id` varchar(100) NOT NULL,
  `blogs_comment` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs_feedback`
--

DROP TABLE IF EXISTS `blogs_feedback`;
CREATE TABLE IF NOT EXISTS `blogs_feedback` (
  `feedback_blogs_id` varchar(100) NOT NULL,
  `feedbacker_name` varchar(100) NOT NULL,
  `feedbacker_email` varchar(100) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follower_following`
--

DROP TABLE IF EXISTS `follower_following`;
CREATE TABLE IF NOT EXISTS `follower_following` (
  `follower_id` varchar(100) NOT NULL,
  `following_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `signup_id` int(11) NOT NULL AUTO_INCREMENT,
  `signup_first_name` varchar(100) NOT NULL,
  `signup_last_name` varchar(100) NOT NULL,
  `signup_email` varchar(100) NOT NULL,
  `signup_password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`signup_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`signup_id`, `signup_first_name`, `signup_last_name`, `signup_email`, `signup_password`, `status`) VALUES
(1, 'Himanshu', 'Sharma', 'hello@gmail.com', 'Him567890@', 'unverified'),
(2, 'Himanshu', 'Sharma', 'hello@gmail.com', 'Him567890@', 'unverified'),
(3, 'Himanshu', 'Sharma', 'hello@gmail.com', 'Him567890@', 'unverified');

-- --------------------------------------------------------

--
-- Table structure for table `signup_photo`
--

DROP TABLE IF EXISTS `signup_photo`;
CREATE TABLE IF NOT EXISTS `signup_photo` (
  `photo_id` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
