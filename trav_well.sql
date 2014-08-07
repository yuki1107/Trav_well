-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 07, 2014 at 06:02 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `trav_well`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `interest` text,
  `bio` text,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `first_name`, `last_name`, `email`, `password`, `phone`, `age`, `gender`, `location`, `picture_url`, `interest`, `bio`) VALUES
(1, 'abc', NULL, NULL, 'abc@def.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'efg', NULL, NULL, 'efg@hij.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
