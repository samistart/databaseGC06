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
  `criteria1` varchar(15) NOT NULL COMMENT '[readability]',
  `comment1` text,
  `grade1` int(11) COMMENT '1 to 5',
  `criteria2` varchar(15) NOT NULL COMMENT '[content]',
  `comment2` text,
  `grade2` int(11) COMMENT '1 to 5',
  `criteria3` varchar(15) NOT NULL COMMENT '[accuracy]',
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
  `groupName` text NOT NULL,
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
  `title` text NOT NULL,
  `abstract` text NOT NULL,
  `content` text NOT NULL,
  `lastEdited` timestamp NOT NULL,
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
  `password` varchar(255) NOT NULL,
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

INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);
INSERT INTO `GC06`.`groups` (`groupID`, `groupName`, `averageGrade`, `ranking`) VALUES (NULL, 'defaultGroup', 0, 1);

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


-- Seed 18 students divided into 6 groups

INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000001, 'Person1', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 1);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000002, 'Person2', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 1);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000003, 'Person3', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 1);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000004, 'Person4', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 2);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000005, 'Person5', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 2);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000006, 'Person6', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 2);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000007, 'Person7', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 3);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000008, 'Person8', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 3);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000009, 'Person9', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 3);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000010, 'Person10', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 4);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000011, 'Person11', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 4);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000012, 'Person12', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 4);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000013, 'Person13', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 5);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000014, 'Person14', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 5);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000015, 'Person15', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 5);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000016, 'Person16', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 6);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000017, 'Person17', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 6);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000018, 'Person18', 'last', 'Person@last.com', '123', CURRENT_TIMESTAMP, 6);


-- Seed 18 students divided into 6 groups

INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Report1', 'This abstracts Report 1.', 'Here group 1 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 1);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Report2', 'This abstracts Report 2.', 'Here group 2 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 2);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Report3', 'This abstracts Report 3.', 'Here group 3 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 3);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Report4', 'This abstracts Report 4.', 'Here group 4 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 4);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Report5', 'This abstracts Report 5.', 'Here group 5 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 5);


-- Seed assessments already done for groups 1-3

INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 1, 2, 'readability', 'Very nice.', '4', 'content', 'Very nice.', '4', 'accuracy', 'Very nice.', '4');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 1, 3, 'readability', 'Very nice.', '3', 'content', 'Very nice.', '2', 'accuracy', 'Very nice.', '2');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 1, 4, 'readability', 'Very nice.', '2', 'content', 'Very nice.', '4', 'accuracy', 'Very nice.', '4');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 2, 1, 'readability', 'Very nice.', '4', 'content', 'Very nice.', '4', 'accuracy', 'Very nice.', '4');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 2, 3, 'readability', 'Very nice.', '5', 'content', 'Very nice.', '4', 'accuracy', 'Very nice.', '1');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 2, 4, 'readability', 'Very nice.', '1', 'content', 'Very nice.', '2', 'accuracy', 'Very nice.', '1');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 3, 1, 'readability', 'Very nice.', '2', 'content', 'Very nice.', '3', 'accuracy', 'Very nice.', '3');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 3, 4, 'readability', 'Very nice.', '4', 'content', 'Very nice.', '4', 'accuracy', 'Very nice.', '4');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 3, 5, 'readability', 'Very nice.', '3', 'content', 'Very nice.', '5', 'accuracy', 'Very nice.', '4');


-- Allocate assessments for group 4 without content.

INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 4, 1, 'readability', NULL, NULL, 'content', NULL, NULL, 'accuracy', NULL, NULL);
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 4, 2, 'readability', NULL, NULL, 'content', NULL, NULL, 'accuracy', NULL, NULL);
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 4, 3, 'readability', NULL, NULL, 'content', NULL, NULL, 'accuracy', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
