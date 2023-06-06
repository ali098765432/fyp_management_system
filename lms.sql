-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 07:31 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `department`) VALUES
(1, 'akeelsaul@gmail.com', 'akeel123', 'BSE'),
(3, 'ateeqathomas@gmail.com', '9422960', 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE `msgs` (
  `id` int(11) NOT NULL,
  `fromu` varchar(20) NOT NULL,
  `tou` varchar(20) NOT NULL,
  `msg` varchar(1500) NOT NULL,
  `fromuname` varchar(50) NOT NULL,
  `touname` varchar(50) NOT NULL,
  `senddatetime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `status` varchar(20) NOT NULL,
  `attachfile` varchar(2000) NOT NULL,
  `attachfilename` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`id`, `fromu`, `tou`, `msg`, `fromuname`, `touname`, `senddatetime`, `status`, `attachfile`, `attachfilename`) VALUES
(1, '3', '6', 'helo jenny your submission file is incomplete', 'adeel', 'jenny winget', '2023-04-12 18:41:05.793949', 'read', '', ''),
(2, '3', '6', 'when will you submit your new file', 'adeel', 'jenny winget', '2023-04-12 18:41:05.793949', 'read', '', ''),
(3, '3', '7', 'hello akeel message from your supervisor', 'adeel', 'akeel saul', '2023-04-08 12:55:00.000000', 'unread', '', ''),
(7, '6', '3', 'sir i will submit soon', 'jennywinget', 'adeel', '2023-04-12 14:29:45.909429', 'read', '', ''),
(13, '6', '3', 'done', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '', ''),
(14, '6', '3', 'ok', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '', ''),
(18, '6', '3', '', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/about.jpeg', ''),
(19, '6', '3', '', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/bg1.png', ''),
(28, '6', '3', 'affiliate marking file', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/affiliatemarketing.pdf', 'affiliatemarketing.pdf'),
(29, '6', '3', '', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/FYP SDS Template.doc', 'FYP SDS Template.doc'),
(30, '6', '3', '', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/E-VOTINGSYSTEM.docx', 'E-VOTINGSYSTEM.docx'),
(31, '6', '3', '', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/14-234-1458364281112-113.pdf', '14-234-1458364281112-113.pdf'),
(32, '6', '3', 'media file for downloading ', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/AllProjectsS22.pdf', 'AllProjectsS22.pdf'),
(33, '6', '3', 'tracking img', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/download-removebg-preview.png', 'download-removebg-preview.png'),
(34, '6', '3', '', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/Path of sunshine.png', 'Path of sunshine.png'),
(35, '6', '3', '', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '../chatmedia/logo.png', 'logo.png'),
(36, '6', '3', 'okay its working fine', 'jennywinget', 'adeel', '2023-06-03 04:59:45.528767', 'read', '', ''),
(37, '3', '6', 'ok', 'adeel', 'jenny winget', '2023-06-03 05:30:25.612013', 'read', '', ''),
(38, '3', '6', 'text with  file ', 'adeel', 'jenny winget', '2023-06-03 05:30:25.612013', 'read', '../chatmedia/bg.jpg', 'bg.jpg'),
(39, '3', '6', 'note file', 'adeel', 'jenny winget', '2023-06-03 05:30:25.612013', 'read', '../chatmedia/E-VOTINGSYSTEM.docx', 'E-VOTINGSYSTEM.docx');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `sentnotitime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `msg`, `userid`, `sentnotitime`, `status`, `type`) VALUES
(1, 'your proposal has been rejected by selected supervisor', '6', '2023-02-26 07:43:41', 'read', 'proposal'),
(2, 'your proposal has been accepted by selected supervisor', '6', '2023-02-26 08:05:19', 'read', 'proposal'),
(3, 'New Project Submission Has Been Added By SupervisorCheck Now', '6', '2023-02-26 09:00:40', 'read', 'assignment'),
(4, 'Project Marks has been added by supervisor check your marks', '6', '2023-02-26 07:43:21', 'read', 'marks'),
(5, 'Supervisor added comment to your submission check it out', '6', '2023-04-15 12:59:48', 'read', 'assignmentcomment'),
(6, 'your proposal has been accepted by selected supervisor', '7', '2023-02-26 16:19:15', 'unread', 'proposal'),
(7, 'New Project Submission Has Been Added By Supervisor Check It', '7', '2023-02-26 16:22:13', 'unread', 'assignment'),
(8, 'Your Proposal has been accepted by supervisor check it out', '6', '2023-04-15 17:46:44', 'read', 'proposal'),
(9, 'Your Proposal has been accepted by supervisor check it out', '7', '2023-04-15 17:21:26', 'unread', 'proposal'),
(10, 'Your Proposal has been accepted by supervisor check it out', '6', '2023-04-15 17:22:21', 'read', 'proposal'),
(11, 'Your Proposal has been accepted by supervisor check it out', '7', '2023-04-15 17:23:25', 'unread', 'proposal'),
(12, 'New Project assignment has been added by supervisor', '6', '2023-04-15 17:46:57', 'read', 'assignment'),
(13, 'New Project assignment has been added by supervisor', '6', '2023-04-15 17:47:11', 'read', 'assignment'),
(14, 'Supervisor added comments to your assignment check it', '6', '2023-04-15 17:47:27', 'read', 'assignmentcomment'),
(15, 'Supervisor Updated Your aassignment marks', '6', '2023-04-15 17:47:19', 'read', 'marks'),
(16, 'New Project assignment has been added by supervisor', '6', '2023-04-15 21:40:01', 'unread', 'assignment'),
(17, 'New Project assignment has been added by supervisor', '6', '2023-04-15 21:49:15', 'unread', 'assignment'),
(18, 'New Project assignment has been added by supervisor', '6', '2023-04-15 22:05:04', 'unread', 'assignment'),
(19, 'New Project assignment has been added by supervisor', '6', '2023-04-15 22:09:00', 'unread', 'assignment'),
(20, 'New Project assignment has been added by supervisor', '6', '2023-05-27 20:38:51', 'unread', 'assignment'),
(21, 'Your Proposal has been accepted by supervisor check it out', '16', '2023-05-27 20:45:21', 'unread', 'proposal'),
(22, 'New Project assignment has been added by supervisor', '16', '2023-05-27 20:45:56', 'unread', 'assignment'),
(23, 'New Project assignment has been added by supervisor', '6', '2023-05-28 17:25:16', 'read', 'assignment'),
(24, 'New Project assignment has been added by supervisor', '7', '2023-05-28 17:29:07', 'unread', 'assignment');

-- --------------------------------------------------------

--
-- Table structure for table `projectsubmissions`
--

CREATE TABLE `projectsubmissions` (
  `id` int(11) NOT NULL,
  `pid` varchar(40) NOT NULL,
  `uid` varchar(40) NOT NULL,
  `supid` varchar(40) NOT NULL,
  `templatefiile` varchar(2000) NOT NULL,
  `submissonname` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `duedate` date NOT NULL,
  `submitfile` varchar(2000) NOT NULL,
  `status` varchar(50) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `stdsubmitfiledate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectsubmissions`
--

INSERT INTO `projectsubmissions` (`id`, `pid`, `uid`, `supid`, `templatefiile`, `submissonname`, `startdate`, `duedate`, `submitfile`, `status`, `comment`, `stdsubmitfiledate`) VALUES
(7, '13', '6', '3', 'changesr.docx', 'srs template', '2023-02-14', '2023-02-28', 'toyland final deliverable.doc', 'checked', 'correct diagrams', '2023-02-14'),
(8, '13', '6', '3', 'changesr.docx', 'srs template', '2023-02-14', '2023-02-28', 'himanshumahadevsonawane.pdf', 'not checked yet', '', '2023-02-26'),
(9, '13', '6', '3', '17SCSE203081_NIDHI SINGH_FinalProjectReport - Shubham Pathak.pdf', 'design template', '2023-02-25', '2023-02-28', '', '', '', '0000-00-00'),
(32, '13', '6', '3', 'Css tutorial.docx', 'hhfth', '2023-04-16', '2023-04-16', '', '', '', '0000-00-00'),
(33, '13', '6', '3', 'Assests Management App Design Document.docx', 'dfrb', '2023-04-16', '2023-04-28', '', '', '', '0000-00-00'),
(34, '13', '6', '3', 'FYP THESIS.docx', 'fd', '2023-04-16', '2023-04-20', '', '', '', '0000-00-00'),
(35, '13', '6', '3', 'Assests Management App Design Document.docx', 'dfrb', '2023-04-12', '2023-04-15', '', '', '', '0000-00-00'),
(36, '13', '6', '3', 'QA Portal.doc', 'rdrt', '2023-04-16', '2023-04-21', '', '', '', '0000-00-00'),
(37, '13', '6', '3', '', 'srs', '2023-05-16', '2023-05-31', '', '', '', '0000-00-00'),
(38, '13', '6', '3', '', 'srs three', '2023-05-16', '2023-05-24', '', '', '', '0000-00-00'),
(39, '13', '6', '3', '', 'srs three', '2023-05-16', '2023-05-24', '', '', '', '0000-00-00'),
(40, '13', '6', '3', '', 'rs ft', '2023-05-31', '2023-06-08', '', '', '', '0000-00-00'),
(41, '13', '6', '3', 'Assests Management App Design Document.docx', 'tes', '2023-05-28', '2023-05-31', '', '', '', '0000-00-00'),
(42, '21', '16', '3', 'Assests Management App Design Document.docx', 'tes', '2023-05-28', '2023-05-31', '', '', '', '0000-00-00'),
(43, '13', '6', '3', 'SYSTEM DESIGN chapt 4.docx', 'res', '2023-05-28', '2023-05-31', '', '', '', '0000-00-00'),
(44, '14', '7', '3', 'SYSTEM DESIGN chapt 4.docx', 'res', '2023-05-28', '2023-05-29', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `proposalfiles`
--

CREATE TABLE `proposalfiles` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `supid` varchar(50) NOT NULL,
  `proposalfile` varchar(2000) NOT NULL,
  `submiteddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `projname` varchar(400) NOT NULL,
  `stdname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposalfiles`
--

INSERT INTO `proposalfiles` (`id`, `uid`, `supid`, `proposalfile`, `submiteddate`, `status`, `projname`, `stdname`) VALUES
(13, '6', '3', 'Css tutorial.docx', '2023-02-14', 'Accepted', 'ef', 'jenny winget'),
(14, '7', '3', '1411799.pdf', '2023-02-26', 'Accepted', 'sending notifification app', 'akeel saul'),
(15, '7', '3', '1411799.pdf', '2023-02-26', 'Not Checked Yet', 'sending notifification app', 'akeel saul'),
(16, '4', '1', 'Hair Dresser Management system f.docx', '2023-04-08', 'Not Checked Yet', 'hair dresser project', ''),
(17, '6', '3', 'Healthy Diet Android App Design.docx', '2023-05-15', 'Not Checked Yet', 'custom proposal', 'jenny winget'),
(18, '6', '3', 'Healthy Diet Android App Design.docx', '2023-05-15', 'Not Checked Yet', 'custom proposal', 'jenny winget'),
(19, '6', '3', 'Healthy Diet Android App Design.docx', '2023-05-15', 'Not Checked Yet', 'custom proposal', 'jenny winget'),
(20, '6', '3', 'Healthy Diet Android App Design.docx', '2023-05-15', 'Not Checked Yet', 'custom proposal', 'jenny winget'),
(21, '16', '3', 'Assests Management App Design Document.docx', '2023-05-28', 'Accepted', 'x rat', 'joh johnny');

-- --------------------------------------------------------

--
-- Table structure for table `studentmarks`
--

CREATE TABLE `studentmarks` (
  `id` int(11) NOT NULL,
  `proposalmarks` varchar(20) NOT NULL,
  `midmarks` varchar(20) NOT NULL,
  `reportmarks` varchar(20) NOT NULL,
  `finalsubmarks` varchar(20) NOT NULL,
  `studentid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmarks`
--

INSERT INTO `studentmarks` (`id`, `proposalmarks`, `midmarks`, `reportmarks`, `finalsubmarks`, `studentid`) VALUES
(1, '8', '22', '9', '40', '6'),
(2, '8', '', '', '', '7');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `batch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `password`, `degree`, `batch`) VALUES
(4, 'zoya', 'john', 'zoya@gmail.com', '78', 'BEE', '2028'),
(5, 'jason', 'john', 'jason@gmail.com', '78', 'BSE', '2022'),
(6, 'jenny', 'winget', 'jenny@gmail.com', 'jeeny12345', 'BSE', '2023'),
(7, 'akeel', 'saul', 'akeelsaul@gmail.com', 'akeel123', 'BSE', '2023'),
(9, 'matthias', 'john', 'mat@gmail.com', 'mat123', 'BSEC', '2019'),
(10, 'sara', 'khan', 'sarakhan@gmail.com', 'sara12345', 'BSEC', '2019'),
(11, 'hina', 'khan', 'hina@gmal.com', 'hina123', 'BBA', '2022'),
(12, 'sonia', 'james', 'sonia@gmal.com', 'sonia123', 'BSCS', '2077'),
(13, 'y', 'v', 'z@gmail.com', 'z9', 'BSCS', '2027'),
(14, 'y', 'winget', 'z@gmail.com', 'z9', 'BSCS', '2027'),
(15, 'king', 'john', 'kingjohn@gmail.com', '$2y$10$o/gcTE52EnswXZfzhxNZyO/', 'BBA', '2023'),
(16, 'joh', 'johnny', 'johnny@gmail.com', '$2y$10$zOJsK2.59FMBjM/6Goq7P.rXraPeKREkgTE7Q798PszzwDK6R6rtm', 'BSE', '2023'),
(17, 'at', 'at', 'ateeqathomas@gmail.com', '8735807', 'BSCS', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `name`, `email`, `password`, `year`, `department`) VALUES
(1, 'fouzia', 'fouzia@gmail.com', 'fioz789', '2022', 'BEE'),
(2, 'fouzia2', 'fouzia@gmail.com', 'fioz789', '2023', 'BBA'),
(3, 'adeel', 'adeel@gmail.com', 'adeel123', '2023', 'BSE'),
(4, 'alexis', 'alexis@gmail.com', 'alexis123', '1589', 'BBA'),
(5, 'khan', 'khan@gmail', 'khan456', '8088', 'BBA'),
(6, 'alexis thomas', 'alexis@gmail.com', 'alexis123', '1589', 'BBA'),
(7, 'khan thomas', 'khan@gmail', 'khan456', '8088', 'BBA'),
(8, 'alexis t', 'alexis@gmail.com', 'alexis123', '1589', 'BBA'),
(9, 'khan t', 'khan@gmail', 'khan456', '8088', 'BBA'),
(10, 'alexis th', 'alexis@gmail.com', 'alexis123', '1589', 'BBA'),
(11, 'khan th', 'khan@gmail', 'khan456', '8088', 'BBA'),
(12, 'king john', 'kingjohn@gmail.com', '$2y$10$ypb4rnINBRrw3/e2/sIcMu2', '2023', 'BSCS'),
(13, 'ate', 'ateeqathomas@gmail.com', '2957769', '2023', 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `supervisornotification`
--

CREATE TABLE `supervisornotification` (
  `id` int(11) NOT NULL,
  `msg` varchar(50) NOT NULL,
  `supid` varchar(50) NOT NULL,
  `senttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `stdid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisornotification`
--

INSERT INTO `supervisornotification` (`id`, `msg`, `supid`, `senttime`, `status`, `type`, `pid`, `stdid`) VALUES
(2, 'New Student Added the Proposal Check it ', '3', '2023-02-27 11:41:29', 'read', 'proposal', '', ''),
(3, 'Student submit his assignment check it ', '3', '2023-02-28 07:28:23', 'read', 'assignment', '13', ''),
(4, 'New Student Added the Proposal Check it ', '1', '2023-04-08 15:49:12', 'unread', 'proposal', '', ''),
(5, 'New Student Added the Proposal Check it ', '3', '2023-04-12 16:14:40', 'unread', 'proposal', '', ''),
(6, 'New Student Added the Proposal Check it ', '3', '2023-05-15 17:22:47', 'unread', 'proposal', '', ''),
(7, 'New Student Added the Proposal Check it ', '3', '2023-05-15 17:25:21', 'unread', 'proposal', '', ''),
(8, 'New Student Added the Proposal Check it ', '3', '2023-05-15 17:26:31', 'unread', 'proposal', '', ''),
(9, 'New Student Added the Proposal Check it ', '3', '2023-05-15 18:07:58', 'unread', 'proposal', '', ''),
(10, 'New Student Added the Proposal Check it ', '', '2023-05-16 00:02:26', 'unread', 'proposal', '', ''),
(11, 'New Student Added the Proposal Check it ', '', '2023-05-16 00:03:49', 'unread', 'proposal', '', ''),
(12, 'New Student Added the Proposal Check it ', '3', '2023-05-27 20:44:22', 'unread', 'proposal', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `weeklyreport`
--

CREATE TABLE `weeklyreport` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `week` varchar(50) NOT NULL,
  `progress` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weeklyreport`
--

INSERT INTO `weeklyreport` (`id`, `uid`, `week`, `progress`) VALUES
(1, '6', 'week 1', ' designing the  home page of the project'),
(2, '6', 'week 2', ' design login and register pages');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectsubmissions`
--
ALTER TABLE `projectsubmissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposalfiles`
--
ALTER TABLE `proposalfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentmarks`
--
ALTER TABLE `studentmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisornotification`
--
ALTER TABLE `supervisornotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weeklyreport`
--
ALTER TABLE `weeklyreport`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `projectsubmissions`
--
ALTER TABLE `projectsubmissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `proposalfiles`
--
ALTER TABLE `proposalfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `studentmarks`
--
ALTER TABLE `studentmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supervisornotification`
--
ALTER TABLE `supervisornotification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `weeklyreport`
--
ALTER TABLE `weeklyreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
