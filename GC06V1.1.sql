-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2015 at 09:20 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `GC06V1.1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--


CREATE DATABASE `GC06V1.1`;
USE `GC06V1.1`; 

CREATE TABLE `admins` (
`adminID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessmentID` int(11) NOT NULL,
  `criteria` varchar(15) NOT NULL COMMENT '[readability, content, accuracy]',
  `comment` text NOT NULL,
  `grade` int(11) NOT NULL COMMENT '1 to 5',
  PRIMARY KEY  (`assessmentID`,`criteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `forumID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupReportAssessments`
--

CREATE TABLE `groupReportAssessments` (
`assessmentID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `reportID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
`groupID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `groupName` text NOT NULL,
  `averageGrade` double NOT NULL COMMENT 'from 1-5',
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `content` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  `threadID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
`reportID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` text NOT NULL,
  `abstract` text NOT NULL,
  `content` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
`studentID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `studentNumber` int(11) NOT NULL COMMENT 'SN on card',
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL COMMENT 'is username',
  `password` varchar(50) NOT NULL,
  `lastActive` datetime NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
`threadID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  `forumID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`assessmentID`) REFERENCES `groupReportAssessments` (`assessmentID`);

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`),
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`threadID`) REFERENCES `threads` (`threadID`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`);

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`forumID`) REFERENCES `forums` (`forumID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
