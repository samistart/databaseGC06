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


-- Seed 57 students

INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000001, 'student1', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 2);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000002, 'student2', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 2);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000003, 'student3', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 2);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000004, 'student4', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 3);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000005, 'student5', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 3);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000006, 'student6', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 3);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000007, 'student7', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 4);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000008, 'student8', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 4);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000009, 'student9', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 4);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000010, 'student10', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 5);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000011, 'student11', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 5);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000012, 'student12', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 5);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000013, 'student13', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 6);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000014, 'student14', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 6);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000015, 'student15', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 6);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000016, 'student16', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 7);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000017, 'student17', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 7);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000018, 'student18', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 7);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000019, 'student19', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 8);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000020, 'student20', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 8);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000021, 'student21', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 8);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000022, 'student22', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 9);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000023, 'student23', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 9);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000024, 'student24', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 9);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000025, 'student25', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 10);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000026, 'student26', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 10);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000027, 'student27', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 10);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000028, 'student28', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 11);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000029, 'student29', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 11);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000030, 'student30', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 11);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000031, 'student31', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 12);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000032, 'student32', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 12);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000033, 'student33', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 12);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000034, 'student34', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 13);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000035, 'student35', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 13);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000036, 'student36', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 13);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000037, 'student37', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 14);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000038, 'student38', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 14);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000039, 'student39', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 14);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000040, 'student40', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 15);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000041, 'student41', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 15);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000042, 'student42', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 15);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000043, 'student43', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 16);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000044, 'student44', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 16);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000045, 'student45', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 16);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000046, 'student46', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 17);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000047, 'student47', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 17);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000048, 'student48', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 17);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000049, 'student49', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 18);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000050, 'student50', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 18);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000051, 'student51', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 18);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000052, 'student52', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 19);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000053, 'student53', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 19);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000054, 'student54', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 19);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000055, 'student55', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 20);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000056, 'student56', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 20);
INSERT INTO `GC06`.`students` (`studentID`, `studentNumber`, `firstName`, `lastName`, `email`, `password`, `lastActive`, `groupID`) 
  VALUES (NULL, 0000057, 'student57', 'last', 'student@school.com', '123', CURRENT_TIMESTAMP, 20);




-- Seed all reports, some of which currently have content.

INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Title for Report1', 'This abstracts Report 1.', 'Here group 1 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 1);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Title for Report2', 'This abstracts Report 2.', 'Here group 2 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 2);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Title for Report3', 'This abstracts Report 3.', 'Here group 3 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 3);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Title for Report4', 'This abstracts Report 4.', 'Here group 4 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 4);
INSERT INTO `GC06`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) 
  VALUES (NULL, 'Title for Report5', 'This abstracts Report 5.', 'Here group 5 describes their review in detail a localhost.', CURRENT_TIMESTAMP, 5);
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

INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 1, 2, 'Readability', 'Very nice.', '4', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '4');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 1, 3, 'Readability', 'Very nice.', '3', 'Content', 'Very nice.', '2', 'Accuracy', 'Very nice.', '2');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 1, 4, 'Readability', 'Very nice.', '2', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '4');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 2, 1, 'Readability', 'Very nice.', '4', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '4');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 2, 3, 'Readability', 'Very nice.', '5', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '1');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 2, 4, 'Readability', 'Very nice.', '1', 'Content', 'Very nice.', '2', 'Accuracy', 'Very nice.', '1');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 3, 1, 'Readability', 'Very nice.', '2', 'Content', 'Very nice.', '3', 'Accuracy', 'Very nice.', '3');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 3, 4, 'Readability', 'Very nice.', '4', 'Content', 'Very nice.', '4', 'Accuracy', 'Very nice.', '4');
INSERT INTO `GC06`.`assessments` (assessmentID, groupID, reportID, criteria1, comment1, grade1, criteria2, comment2, grade2, criteria3, comment3, grade3)
  VALUES (NULL, 3, 5, 'Readability', 'Very nice.', '3', 'Content', 'Very nice.', '5', 'Accuracy', 'Very nice.', '4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
