-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2016 at 11:13 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fmroomie`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `rent` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `publisher` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `title`, `address`, `description`, `rent`, `time`, `publisher`, `role`) VALUES
(79, 'test ad1', 'some address', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.                                                                        ', 200, NULL, 'owner1', 1),
(85, 'roommate_add_1', 'address for test 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. ', 100, NULL, 'user', 0),
(88, 'roommate_add_3', 'fresno', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.                                                                                                                                                                                                     ', 700, NULL, 'user2', 0),
(90, '1 person vacancy', 'san jose', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.                                                                                                ', 500, NULL, 'user2', 0),
(101, 'nice place with backyard', 'white house dc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.                         ', 3000, NULL, 'owner2', 1),
(105, 'Castle with a view', 'grand canyon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.                                                                                                 ', 250, NULL, 'owner2', 1),
(107, 'Studio apartment', 'some address', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. ', 1050, NULL, 'owner', 1),
(108, 'awesome room', 'some address', 'blah blah                         ', 6, NULL, 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `adID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=198 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `adID`) VALUES
(180, 'roommate_add_1', 'roommate_add_1_159.png', 85),
(187, 'Studio apartment', 'Studio apartment_182.jpeg', 107),
(188, 'Castle with a view', 'Castle with a view_187.jpg', 105),
(189, 'nice place with backyard', 'nice place with backyard_188.jpg', 101),
(190, 'awesome room', 'awesome room_189.jpg', 108),
(195, '1 person vacancy', '1 person vacancy_190.jpeg', 90),
(197, 'roommate_add_3', 'roommate_add_3_195.jpg', 88);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `code` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `code`, `active`) VALUES
(21, 'user', 'a@b.c', 'u', 0, 0, 1),
(41, 'owner2', 'a@b.com', 'r', 1, 0, 1),
(42, 'user2', 'a@b.com', 'u', 0, 0, 1),
(43, 'owner1', 'd@e.f', 'r', 1, 0, 1),
(45, 'owner', 'o@w.ner', 'r', 1, 0, 1),
(48, 'a', 'a@b.com', 'a', 1, 0, 1),
(49, 'q', 'q@a.com', 'q', 1, 0, 1),
(50, 'dummy', 'a@b.com', 'asd', 0, 0, 1),
(51, 'user3', 'a@b.com', 'u', 0, 0, 1),
(54, 'user6', 'tejasvarsekar@gmail.com', 'u', 0, 52285539, 0),
(60, '1', 'tejasvarsekar@gmail.com', '2', 0, 18057667, 1),
(61, '2', 'tejasvarsekar@gmail.com', '2', 0, 30318246, 0),
(62, '3', 'tejasvarsekar@gmail.com', '3', 0, 60379923, 0),
(63, '4', 'tejasvarsekar@gmail.com', '4', 1, 14952648, 0),
(64, '5', 'tejasvarsekar@gmail.com', '5', 0, 90902728, 0),
(65, '6', 'tejasvarsekar@gmail.com', '6', 1, 22164275, 0),
(66, '7', 'tejasvarsekar@gmail.com', '7', 0, 56296027, 0),
(67, '8', 'tejasvarsekar@gmail.com', '8', 0, 87657672, 1),
(68, 'Swapnal', 'swapnal.pune@gmail.com', 'test1', 0, 27639574, 0),
(69, 'Swapnal1', 'jawaleswapn379@students.itu.edu', 'test2', 0, 44452064, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
