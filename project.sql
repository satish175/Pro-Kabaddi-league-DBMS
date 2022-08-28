-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2017 at 05:17 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `sp1`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp1` (IN `mr` VARCHAR(25))  NO SQL
BEGIN
UPDATE team
SET WINS=WINS+1 WHERE Team_Acronym=mr;
END$$

DROP PROCEDURE IF EXISTS `sp2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp2` (IN `mr1` VARCHAR(25))  NO SQL
BEGIN
UPDATE team
SET WINS=WINS-1 WHERE Team_Acronym=mr1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `admin_name` varchar(25) NOT NULL,
  `apassword` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admin_name`, `apassword`) VALUES
('harshinib', 'harshinib');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_name`, `password`) VALUES
('me', 'me'),
('bin', '12'),
('ik', 'ik'),
('ikik', 'ikik'),
('kolo', 'kolo'),
('q', 'q'),
('ooop', 'ppop'),
('pop', 'oo'),
('bin', 'iu'),
('kavya', 'kavya'),
('ppl', 'ppl'),
('2u2', '2u2'),
('1u1', '1u1'),
('yutu', 'yutu');

-- --------------------------------------------------------

--
-- Table structure for table `pkl_match`
--

DROP TABLE IF EXISTS `pkl_match`;
CREATE TABLE IF NOT EXISTS `pkl_match` (
  `Match_Id` int(6) NOT NULL,
  `Season_No` int(1) NOT NULL,
  `Team1_Acronym` varchar(25) NOT NULL,
  `Team2_Acronym` varchar(25) NOT NULL,
  `Match_Date` date NOT NULL,
  `Match_Time` time NOT NULL,
  `Match_Venue` varchar(50) NOT NULL,
  `Match_Result` varchar(25) NOT NULL,
  PRIMARY KEY (`Match_Id`),
  KEY `c7` (`Season_No`),
  KEY `c8` (`Team1_Acronym`),
  KEY `c9` (`Team2_Acronym`),
  KEY `c10` (`Match_Result`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pkl_match`
--

INSERT INTO `pkl_match` (`Match_Id`, `Season_No`, `Team1_Acronym`, `Team2_Acronym`, `Match_Date`, `Match_Time`, `Match_Venue`, `Match_Result`) VALUES
(5000, 3, 'GFG', 'PPA', '2016-02-03', '12:30:00', 'Gujarat', 'GFG'),
(5057, 5, 'BB', 'BW', '2017-11-03', '09:09:00', 'Bengaluru', 'BB'),
(5656, 4, 'UM', 'BB', '2016-09-09', '22:00:00', 'Mumbai', 'BB'),
(5658, 4, 'UM', 'GFG', '2016-11-02', '03:30:00', 'Gujarat', 'GFG');

--
-- Triggers `pkl_match`
--
DROP TRIGGER IF EXISTS `trig1`;
DELIMITER $$
CREATE TRIGGER `trig1` AFTER INSERT ON `pkl_match` FOR EACH ROW BEGIN
CALL sp1(NEW.Match_Result);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trig3`;
DELIMITER $$
CREATE TRIGGER `trig3` BEFORE DELETE ON `pkl_match` FOR EACH ROW BEGIN
CALL sp2(OLD.Match_Result);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `Player_Id` int(5) NOT NULL,
  `Player_Name` varchar(50) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Nationality` varchar(50) NOT NULL,
  `Skill` varchar(25) NOT NULL,
  PRIMARY KEY (`Player_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`Player_Id`, `Player_Name`, `Date_Of_Birth`, `Nationality`, `Skill`) VALUES
(1, 'Deepak Narwal', '1991-02-07', 'India', 'Raider'),
(3, 'Sandeep Malik', '1988-04-02', 'India', 'Defender'),
(5, 'Young Chang Ko', '1987-02-04', 'Overseas', 'Defender'),
(7, 'Shrikant Tewthia', '1997-01-01', 'India', 'Allrounder'),
(10, 'Ajay Kumar', '1988-02-05', 'India', 'Raider'),
(12, 'Amit', '1985-07-11', 'India', 'Allrounder'),
(23, 'Jae Min Lee', '1981-03-06', 'Overseas', 'Defender'),
(31, 'Zakir Hossain', '1995-02-15', 'Overseas', 'Raider'),
(98, 'Arvind Kumar', '1991-03-08', 'India', 'Allrounder'),
(101, 'Manjeet Chhillar', '1986-01-29', 'India', 'Allrounder'),
(111, 'Deepak Niwas Hooda ', '1983-03-04', 'India', 'Allrounder'),
(888, 'Shashi', '2017-12-08', 'Overseas', 'Allrounder'),
(900, 'Kiran', '2017-12-08', 'India', 'Raider');

-- --------------------------------------------------------

--
-- Table structure for table `pplay_details`
--

DROP TABLE IF EXISTS `pplay_details`;
CREATE TABLE IF NOT EXISTS `pplay_details` (
  `Season_No` int(1) NOT NULL,
  `Player_Id` int(5) NOT NULL,
  `Team_Acronym` varchar(25) NOT NULL,
  `Bid_Amount` int(10) NOT NULL,
  `Jersey_No` int(5) NOT NULL,
  PRIMARY KEY (`Season_No`,`Player_Id`),
  KEY `c2` (`Player_Id`),
  KEY `c3` (`Team_Acronym`),
  KEY `Season_No` (`Season_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pplay_details`
--

INSERT INTO `pplay_details` (`Season_No`, `Player_Id`, `Team_Acronym`, `Bid_Amount`, `Jersey_No`) VALUES
(3, 7, 'PPA', 7700000, 5),
(3, 98, 'GFG', 7800000, 66),
(3, 111, 'BB', 8000000, 31),
(4, 23, 'GFG', 6500000, 4),
(4, 31, 'BB', 5600000, 7),
(4, 101, 'UM', 7900000, 12),
(5, 1, 'BW', 7800000, 9),
(5, 5, 'BW', 6700000, 78),
(5, 10, 'BB', 8700000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

DROP TABLE IF EXISTS `season`;
CREATE TABLE IF NOT EXISTS `season` (
  `Season_No` int(1) NOT NULL,
  `Year` int(4) NOT NULL,
  `Title_Sponsor` varchar(25) NOT NULL,
  `player_name` varchar(50) NOT NULL,
  `most_paid` varchar(50) NOT NULL,
  PRIMARY KEY (`Season_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`Season_No`, `Year`, `Title_Sponsor`, `player_name`, `most_paid`) VALUES
(3, 2016, 'Star India', '', ''),
(4, 2016, 'Star India', '', ''),
(5, 2015, 'VIVO', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `standings`
--

DROP TABLE IF EXISTS `standings`;
CREATE TABLE IF NOT EXISTS `standings` (
  `Team_Acronym` varchar(25) NOT NULL,
  `Wins` int(3) NOT NULL,
  KEY `c12` (`Team_Acronym`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standings`
--

INSERT INTO `standings` (`Team_Acronym`, `Wins`) VALUES
('BW', 0),
('DD', 0),
('JPP', 0),
('PP', 0),
('PPA', 0),
('UM', 0),
('BB', 0),
('GFG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `Team_Acronym` varchar(25) NOT NULL,
  `Team_Name` varchar(50) NOT NULL,
  `Located` varchar(50) NOT NULL,
  `Titles` int(1) NOT NULL,
  `Wins` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Team_Acronym`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`Team_Acronym`, `Team_Name`, `Located`, `Titles`, `Wins`) VALUES
('BB', 'Bengaluru Bulls', 'Bengaluru', 0, 2),
('BW', 'Bengal Warriors', 'Bengal', 0, 0),
('DD', 'Dabang Delhi', 'Delhi', 0, 0),
('GFG', 'Gujarat Fortunegiants', 'Gujarat', 0, 2),
('JPP', 'Jaipur Pink Panthers', 'Jaipur', 1, 0),
('PP', 'Patna Pirates', 'Patna', 3, 0),
('PPA', 'Puneri Paltan', 'Pune', 0, 0),
('UM', 'U MUMBA', 'Mumbai', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tplay_details`
--

DROP TABLE IF EXISTS `tplay_details`;
CREATE TABLE IF NOT EXISTS `tplay_details` (
  `Season_No` int(1) NOT NULL,
  `Team_Acronym` varchar(25) NOT NULL,
  `Captain_Id` int(5) NOT NULL,
  `Coach` varchar(50) NOT NULL,
  `Owner` varchar(50) NOT NULL,
  PRIMARY KEY (`Season_No`,`Team_Acronym`),
  KEY `c5` (`Team_Acronym`),
  KEY `c6` (`Captain_Id`),
  KEY `Season_No` (`Season_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tplay_details`
--

INSERT INTO `tplay_details` (`Season_No`, `Team_Acronym`, `Captain_Id`, `Coach`, `Owner`) VALUES
(3, 'BB', 111, 'Ram Singh', 'Kent Group'),
(3, 'GFG', 98, 'Lohith', 'Philips groups'),
(3, 'PPA', 7, 'J Udaya Kumar', 'GMR League Private Limited'),
(4, 'BB', 31, 'Lakhshman', 'USHA Private Limited'),
(4, 'GFG', 23, 'Purohith', 'Oppo '),
(4, 'UM', 101, 'Karan Khan', 'Parle Group'),
(5, 'BB', 10, 'Pandu Rao', 'Apsara Limited'),
(5, 'BW', 5, 'K.K.Jagadeesha', 'Kishore Biyani,Future Group');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pkl_match`
--
ALTER TABLE `pkl_match`
  ADD CONSTRAINT `c10` FOREIGN KEY (`Match_Result`) REFERENCES `team` (`Team_Acronym`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c7` FOREIGN KEY (`Season_No`) REFERENCES `season` (`Season_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c8` FOREIGN KEY (`Team1_Acronym`) REFERENCES `team` (`Team_Acronym`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c9` FOREIGN KEY (`Team2_Acronym`) REFERENCES `team` (`Team_Acronym`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pplay_details`
--
ALTER TABLE `pplay_details`
  ADD CONSTRAINT `c1` FOREIGN KEY (`Season_No`) REFERENCES `season` (`Season_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c2` FOREIGN KEY (`Player_Id`) REFERENCES `player` (`Player_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c3` FOREIGN KEY (`Team_Acronym`) REFERENCES `team` (`Team_Acronym`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `standings`
--
ALTER TABLE `standings`
  ADD CONSTRAINT `c12` FOREIGN KEY (`Team_Acronym`) REFERENCES `team` (`Team_Acronym`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tplay_details`
--
ALTER TABLE `tplay_details`
  ADD CONSTRAINT `c4` FOREIGN KEY (`Season_No`) REFERENCES `season` (`Season_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c5` FOREIGN KEY (`Team_Acronym`) REFERENCES `team` (`Team_Acronym`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c6` FOREIGN KEY (`Captain_Id`) REFERENCES `player` (`Player_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
