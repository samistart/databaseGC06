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
-- Database: `GC06`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

/*Only need the drop line if the database exists already*/
DROP DATABASE `GC06`;
CREATE DATABASE `GC06`;
USE `GC06`; 

CREATE TABLE `admins` (
`adminID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessmentID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `groupID` int(11) NOT NULL,
  `reportID` int(11) NOT NULL,
  `criteria1` varchar(15) DEFAULT 'Readability' COMMENT '[readability]',
  `comment1` text,
  `grade1` int(11) COMMENT '1 to 5',
  `criteria2` varchar(15) DEFAULT 'Content' COMMENT '[content]',
  `comment2` text,
  `grade2` int(11) COMMENT '1 to 5',
  `criteria3` varchar(15) DEFAULT 'Accuracy' COMMENT '[accuracy]',
  `comment3` text,
  `grade3` int(11) COMMENT '1 to 5'
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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
`groupID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `averageGrade` double NOT NULL COMMENT 'from 1-5',
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
`commentID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastEdited` timestamp NOT NULL,
  `threadID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
`reportID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` text,
  `abstract` text,
  `content` text,
  `lastEdited` timestamp,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
`studentID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL COMMENT 'is username',
  `password` varchar(255) NOT NULL,
  `lastActive` datetime NOT NULL,
  `groupID` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
`threadID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `lastEdited` timestamp NOT NULL,
  `forumID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
ADD CONSTRAINT `assessments_ibfk_2` FOREIGN KEY (`reportID`) REFERENCES `reports` (`reportID`),
ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`);

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`),
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`threadID`) REFERENCES `threads` (`threadID`);

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
ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`),
ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`forumID`) REFERENCES `forums` (`forumID`);


-- Seed db with all 20 groups and corresponding group forums

INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `averageGrade`, `ranking`) VALUES (NULL, 0, 1);

INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '1');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '2');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '3');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '4');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '5');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '6');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '7');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '8');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '9');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '10');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '11');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '12');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '13');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '14');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '15');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '16');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '17');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '18');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '19');
INSERT INTO `GC06`.`forums` (`forumID`, `groupID`) VALUES (NULL, '20');

-- Seed all reports, some of which currently have content.

INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 1);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 2);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 3);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 4);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 5);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 6);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 7);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 8);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 9);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 10);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 11);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 12);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 13);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 14);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 15);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 16);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 17);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 18);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 19);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, '', '', '', NULL, 20);

-- Seed assessments already done for groups 1-3

-- INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
--   VALUES (NULL, 1, 2, 'Readability', 'Very nice.', '4', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '4');
-- INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
--   VALUES (NULL, 1, 3, 'Readability', 'Very nice.', '3', 'Content', 'Very nice.', '2', 'Accuracy', 'Very nice.', '2');
-- INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
--   VALUES (NULL, 1, 4, 'Readability', 'Very nice.', '2', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '4');
-- INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
--   VALUES (NULL, 2, 1, 'Readability', 'Very nice.', '4', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '4');
-- INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
--   VALUES (NULL, 2, 3, 'Readability', 'Very nice.', '5', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '1');
-- INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
--   VALUES (NULL, 2, 4, 'Readability', 'Very nice.', '1', 'Content', 'Very nice.', '2', 'Accuracy', 'Very nice.', '1');
-- INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
--   VALUES (NULL, 3, 1, 'Readability', 'Very nice.', '2', 'Content', 'Very nice.', '3', 'Accuracy', 'Very nice.', '3');
-- INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
--   VALUES (NULL, 3, 4, 'Readability', 'Very nice.', '4', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '4');
-- INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
--   VALUES (NULL, 3, 5, 'Readability', 'Very nice.', '3', 'Content', 'Very nice.', '5', 'Accuracy', 'Very nice.', '4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
