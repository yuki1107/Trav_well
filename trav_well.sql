-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 10, 2014 at 05:35 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Trav_well`
--
-- --------------------------------------------------------

--
-- Table structure for table `City`
--

CREATE TABLE `City` (-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 10, 2014 at 05:35 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Trav_well`
--
-- --------------------------------------------------------

--
-- Table structure for table `City`
--

CREATE TABLE `City` (
  `cityID` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `picture_url` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `City` (`cityID`, `name`, `country`, `picture_url`, `description`) VALUES
(1, 'Toronto', 'Canada', '/Trav_well/assets/images/cityToronto.jpg', 'One of Canada’s best kept secrets, Toronto is on par with New York City, San Francisco, and Chicago when it comes to cultural attractions and urban endeavors.<br /><br />\r\n\r\nThe best place to start is at the top; and in Toronto, there’s no mistaking where that is. The landmark CN Tower is the tallest free-standing structure in the West (Malaysia has a taller free-standing structure), and also an important telecommunications hub. Take the elevator to the top for a breathtaking view of the city and its surrounding areas. <br /><br />\r\n\r\nThe CN Tower is situated close to Lake Ontario.  From there, you can work your way north and explore the rest of what T.O. (Toronto, Ontario) has to offer. Right next door to the Tower, at the Rogers Centre (formerly SkyDome), you can catch a Blue Jays baseball game in the summer, or just walk around the massive stadium. Newly opened, the Ripley''s Aquarium of Canada sits at the base of the CN Tower and is ideal for families and aquatic lovers alike.<br /><br />\r\n\r\nAlso in and around the city, check out the Royal Ontario Museum, the largest in Canada, with fascinating archaeology and natural history exhibits. There’s also the Art Gallery of Ontario, with a fine collection of European and Canadian works. If you’re into shopping, don’t miss the wide array of funky stores, ethnic restaurants — and of course the Eaton Centre (one of the city''s largest indoor shopping malls) — all on Queen Street West. <br /><br />\r\n\r\nFor a relaxing experience, head back down to the waterfront and enjoy Toronto’s Harbourfront, a complex of unique shops and restaurants right on beautiful Lake Ontario. If you’re all shopped out, enjoy a nice stroll on the boardwalk and take in the great views of the city skyline.  From Harbourfront, you can escape the hustle and bustle of the city with a hop on the ferry to the Toronto Islands, an excellent spot for a picnic and some outdoor recreation. <br /><br />\r\n\r\nToronto is a great destination for singles, families and executives. It is an incredibly clean, safe and easy city to get around, either on foot or by public transportation.');


-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userID`, `username`, `first_name`, `last_name`, `email`, `password`, `phone`, `age`, `gender`, `location`, `picture_url`, `interest`, `bio`) VALUES
(1, 'abc', NULL, NULL, 'abc@def.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `CityBeen`
--

CREATE TABLE `CityBeen` (
  `userID` int(30) NOT NULL,
  `cityID` int(30) NOT NULL,
  PRIMARY KEY (`userID`, `cityID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`cityID`) REFERENCES City(`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Place`
--

CREATE TABLE `Place` (
  `placeID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `cityID` int(30) NOT NULL,
  `description` text NOT NULL,
  `picture_url` varchar(300) NOT NULL,
  PRIMARY KEY (`placeID`),
  FOREIGN KEY (`cityID`) REFERENCES City(`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  `content` text NOT NULL,
  `commentID` int(30) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`commentID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`placeID`) REFERENCES Place(`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `messageID` int(30) NOT NULL AUTO_INCREMENT,
  `sender` int(30) NOT NULL,
  `receiver` int(30) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `read` bit(1) DEFAULT 0,
  PRIMARY KEY (`messageID`),
  FOREIGN KEY (`sender`) REFERENCES User(`userID`),
  FOREIGN KEY (`receiver`) REFERENCES User(`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PlacesBeen`
--

CREATE TABLE `PlacesBeen` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  PRIMARY KEY (`userID`, `placeID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`placeID`) REFERENCES Place(`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  `Rating` float NOT NULL,
  PRIMARY KEY (`userID`, `placeID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`placeID`) REFERENCES Place(`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Friendship`
--

CREATE TABLE `Friendship` (
  `user1` int(30) NOT NULL,
  `user2` int(30) NOT NULL,
  PRIMARY KEY (`user1`, `user2`),
  FOREIGN KEY (`user1`) REFERENCES User(`userID`),
  FOREIGN KEY (`user2`) REFERENCES User(`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `WantToGoCity`
--

CREATE TABLE `WantToGoCity` (
  `userID` int(30) NOT NULL,
  `cityID` int(30) NOT NULL,
  PRIMARY KEY (`userID`, `cityID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`cityID`) REFERENCES City(`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `WantToGoPlace`
--

CREATE TABLE `WantToGoPlace` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  PRIMARY KEY (`userID`, `placeID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`placeID`) REFERENCES Place(`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

  `cityID` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `picture_url` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `City` (`cityID`, `name`, `country`, `picture_url`, `description`) VALUES
(1, 'Toronto', 'Canada', '/Trav_well/assets/images/cityToronto.jpg', 'One of Canada’s best kept secrets, Toronto is on par with New York City, San Francisco, and Chicago when it comes to cultural attractions and urban endeavors.<br /><br />\r\n\r\nThe best place to start is at the top; and in Toronto, there’s no mistaking where that is. The landmark CN Tower is the tallest free-standing structure in the West (Malaysia has a taller free-standing structure), and also an important telecommunications hub. Take the elevator to the top for a breathtaking view of the city and its surrounding areas. <br /><br />\r\n\r\nThe CN Tower is situated close to Lake Ontario.  From there, you can work your way north and explore the rest of what T.O. (Toronto, Ontario) has to offer. Right next door to the Tower, at the Rogers Centre (formerly SkyDome), you can catch a Blue Jays baseball game in the summer, or just walk around the massive stadium. Newly opened, the Ripley''s Aquarium of Canada sits at the base of the CN Tower and is ideal for families and aquatic lovers alike.<br /><br />\r\n\r\nAlso in and around the city, check out the Royal Ontario Museum, the largest in Canada, with fascinating archaeology and natural history exhibits. There’s also the Art Gallery of Ontario, with a fine collection of European and Canadian works. If you’re into shopping, don’t miss the wide array of funky stores, ethnic restaurants — and of course the Eaton Centre (one of the city''s largest indoor shopping malls) — all on Queen Street West. <br /><br />\r\n\r\nFor a relaxing experience, head back down to the waterfront and enjoy Toronto’s Harbourfront, a complex of unique shops and restaurants right on beautiful Lake Ontario. If you’re all shopped out, enjoy a nice stroll on the boardwalk and take in the great views of the city skyline.  From Harbourfront, you can escape the hustle and bustle of the city with a hop on the ferry to the Toronto Islands, an excellent spot for a picnic and some outdoor recreation. <br /><br />\r\n\r\nToronto is a great destination for singles, families and executives. It is an incredibly clean, safe and easy city to get around, either on foot or by public transportation.');



-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userID`, `username`, `first_name`, `last_name`, `email`, `password`, `phone`, `age`, `gender`, `location`, `picture_url`, `interest`, `bio`) VALUES
(1, 'abc', NULL, NULL, 'abc@def.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `CityBeen`
--

CREATE TABLE `CityBeen` (
  `userID` int(30) NOT NULL,
  `cityID` int(30) NOT NULL,
  PRIMARY KEY (`userID`, `cityID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`cityID`) REFERENCES City(`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Place`
--

CREATE TABLE `Place` (
  `placeID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `cityID` int(30) NOT NULL,
  `description` text NOT NULL,
  `picture_url` varchar(300) NOT NULL,
  PRIMARY KEY (`placeID`),
  FOREIGN KEY (`cityID`) REFERENCES City(`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  `content` text NOT NULL,
  `commentID` int(30) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`commentID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`placeID`) REFERENCES Place(`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `messageID` int(30) NOT NULL,
  `sender` int(30) NOT NULL,
  `receiver` int(30) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`messageID`),
  FOREIGN KEY (`sender`) REFERENCES User(`userID`),
  FOREIGN KEY (`receiver`) REFERENCES User(`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PlacesBeen`
--

CREATE TABLE `PlacesBeen` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  PRIMARY KEY (`userID`, `placeID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`placeID`) REFERENCES Place(`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  `Rating` float NOT NULL,
  PRIMARY KEY (`userID`, `placeID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`placeID`) REFERENCES Place(`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Friendship`
--

CREATE TABLE `Friendship` (
  `user1` int(30) NOT NULL,
  `user2` int(30) NOT NULL,
  PRIMARY KEY (`user1`, `user2`),
  FOREIGN KEY (`user1`) REFERENCES User(`userID`),
  FOREIGN KEY (`user2`) REFERENCES User(`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `WantToGoCity`
--

CREATE TABLE `WantToGoCity` (
  `userID` int(30) NOT NULL,
  `cityID` int(30) NOT NULL,
  PRIMARY KEY (`userID`, `cityID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`cityID`) REFERENCES City(`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `WantToGoPlace`
--

CREATE TABLE `WantToGoPlace` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  PRIMARY KEY (`userID`, `placeID`),
  FOREIGN KEY (`userID`) REFERENCES User(`userID`),
  FOREIGN KEY (`placeID`) REFERENCES Place(`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
