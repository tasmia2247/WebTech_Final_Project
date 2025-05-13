-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2025 at 04:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectnation`
--

-- --------------------------------------------------------

--
-- Table structure for table `adlist`
--

CREATE TABLE `adlist` (
  `adid` varchar(5) NOT NULL,
  `accountname` varchar(50) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `image` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adlist`
--

INSERT INTO `adlist` (`adid`, `accountname`, `productname`, `Date`, `image`, `status`, `payment`) VALUES
('1', 'JohnDoe', 'Laptop', '2025-01-01', 'laptop.jpg', 'Pending', 'Bkash'),
('3', 'MikeBrown', 'Tablet', '2025-01-03', 'tablet.jpg', 'Pending', 'Bank'),
('4', 'AliceWhite', 'Headphones', '2025-01-04', 'headphones.jpg', 'Pending', 'Bkash'),
('5', 'RobertGreen', 'Smartwatch', '2025-01-05', 'smartwatch.jpg', 'Pending', 'Nogod'),
('6', 'EmilyBlack', 'Camera', '2025-01-06', 'camera.jpg', 'Pending', 'Bank'),
('7', 'ChrisBlue', 'Speaker', '2025-01-07', 'speaker.jpg', 'Pending', 'Bkash'),
('8', 'SophiaGray', 'Keyboard', '2025-01-08', 'keyboard.jpg', 'Active', 'Nogod'),
('9', 'DavidYellow', 'Mouse', '2025-01-09', 'mouse.jpg', 'Active', 'Bank'),
('10', 'MarkBrown', 'Gaming Laptop', '2025-01-10', 'gaming_laptop.jpg', 'Active', 'Bkash'),
('11', 'AnnaGreen', 'DSLR Camera', '2025-01-11', 'dslr_camera.jpg', 'Active', 'Nogod'),
('12', 'TomBlack', 'Smart TV', '2025-01-12', 'smart_tv.jpg', 'Request', 'Bank'),
('13', 'LauraWhite', 'Wireless Earbuds', '2025-01-13', 'wireless_earbuds.jpg', 'Pending', 'Bkash'),
('14', 'KevinGray', 'Gaming Chair', '2025-01-14', 'gaming_chair.jpg', 'Active', 'Nogod'),
('15', 'SaraBlue', 'External Hard Drive', '2025-01-15', 'external_hard_drive.jpg', 'Request', 'Bank'),
('testI', 'testname', 'CodeLab', '2025-01-21', 'https//test.com', 'Active', 'Bank');

-- --------------------------------------------------------

--
-- Table structure for table `adminlist`
--

CREATE TABLE `adminlist` (
  `ID` varchar(5) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `mobileno` varchar(11) DEFAULT NULL,
  `fullname` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlist`
--

INSERT INTO `adminlist` (`ID`, `username`, `password`, `email`, `dob`, `gender`, `mobileno`, `fullname`) VALUES
('1', 'mahfuz1', '1', 'kaai@gmail.com', '2025-01-18', 'Male', '01990947348', 'Kazi Mahfuzur Rahman'),
('10', 'mahfuz5', '55555555', 'kaai@gmail.com', '2025-01-16', 'male', '01990947348', 'Kazi Mahfuzur Rahman'),
('2', 'mahfuz2', '2222222', '2@gmail.com', '2025-01-01', 'male', '054 002 183', 'Kazi Mahfuzur Rahman'),
('6', 'mahfuz6', '6666666', 'kaai@gmail.com', '2025-01-18', 'male', '0540021830', 'Kazi Mahfuzur Rahman'),
('11', 'mahfuz11', '11111111', 'kaai@gmail.com', '2025-01-28', 'male', '0540021830', 'Kazi Mahfuzur Rahman'),
('20', 'test1', '11111111', 'kaai@gmail.com', '2025-01-18', 'male', '0540021830', 'Kazi Mahfuzur Rahman'),
('21', 'test2', '1111111', 'kaai@gmail.com', '2025-01-18', 'male', '01400218301', 'Kazi Mahfuzur Rahman'),
('22', 'test3', '33333333', 'kaai@gmail.com', '2025-01-30', 'male', '01990947348', 'Kazi Mahfuzur Rahman'),
('23', 'test4', '44444444', 'kaai@gmail.com', '2024-12-30', 'male', '01990947348', 'Kazi Mahfuzur Rahman'),
('test5', 'Mr.Test', 'testtest', 'test@gmail.com', '2025-01-12', 'Male', '01990947348', 'Kazi Mahfuzur Rahman'),
('50', 'Kazi Mahfuzur Rahman1', '5555555', '50@gmail.com', '2025-01-22', 'male', '01990947348', 'Kazi Mahfuzur Rahman'),
('55', 'TEST55', '1111111111111', 'iju0933@gmail.com', '2025-01-26', 'male', '01990947340', 'Kazi Mahfuzur Rahman'),
('56', 'TEST56', '1111111111111', 'test122@gmail.com', '2025-01-22', 'male', '01990947349', 'Kazi Mahfuzur Rahman');

-- --------------------------------------------------------

--
-- Table structure for table `bannedlist`
--

CREATE TABLE `bannedlist` (
  `accountid` varchar(5) NOT NULL,
  `accountname` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `bannedtime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bannedlist`
--

INSERT INTO `bannedlist` (`accountid`, `accountname`, `reason`, `bannedtime`) VALUES
('202', 'jane_s', 'Inappropriate', '7th January 2025'),
('204', 'emily_w', 'Inappropriate', '7th January 2025'),
('205', 'chris_g', 'Misleading Content', '7th January 2025');

-- --------------------------------------------------------

--
-- Table structure for table `boastpost`
--

CREATE TABLE `boastpost` (
  `postid` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `postdetails` varchar(50) NOT NULL,
  `postType` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boastpost`
--

INSERT INTO `boastpost` (`postid`, `userid`, `postdetails`, `postType`, `Status`, `Username`) VALUES
('P002', 'U002', 'A thought for the day: Stay positive!', 'text', 'Active', 'JaneSmith'),
('P003', 'U003', 'Captured this amazing sunset today!', 'image', 'Deactive', 'MikeBrown'),
('P004', 'U004', 'How to stay productive while working remotely.', 'text', 'Deactive', 'EmilyClark'),
('P005', 'U005', 'My recent travel experience to the mountains.', 'image', 'Deactive', 'AliceGreen'),
('P006', 'U006', 'Best workout tips to stay in shape!', 'text', 'Deactive', 'BobWhite'),
('P007', 'U007', 'Check out this delicious recipe I tried.', 'image', 'Deactive', 'ClaraBlue'),
('P008', 'U008', 'Just finished reading a great book on leadership.', 'text', 'Deactive', 'DanielYellow'),
('P009', 'U009', 'Amazing view from the top of the skyscraper.', 'image', 'Active', 'EvaRed'),
('P010', 'U010', 'Weekend plans: Hiking with friends.', 'text', 'Active', 'FrankPurple');

-- --------------------------------------------------------

--
-- Table structure for table `complainbox`
--

CREATE TABLE `complainbox` (
  `details` text NOT NULL,
  `post_content` varchar(250) NOT NULL,
  `post_id` int(250) NOT NULL,
  `post_type` varchar(250) NOT NULL,
  `report_id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complainbox`
--

INSERT INTO `complainbox` (`details`, `post_content`, `post_id`, `post_type`, `report_id`, `user_id`) VALUES
('Sophia Gray', 'sophia_g', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deletedpost`
--

CREATE TABLE `deletedpost` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `postContent` text NOT NULL,
  `postType` text NOT NULL,
  `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deletedpost`
--

INSERT INTO `deletedpost` (`post_id`, `user_id`, `postContent`, `postType`, `Type`) VALUES
(0, '', '', '', ''),
(0, '', '', '', ''),
(0, '', '', '', ''),
(0, '', '', '', ''),
(0, '', '', '', ''),
(76, '107728', 'rer', 'text', 'NULL'),
(77, '107728', 'najib', 'text', 'NULL'),
(78, '107728', 'hbhb', 'text', 'NULL'),
(65, '635561', 'h', 'text', 'NULL'),
(79, '107728', 'hi', 'text', 'NULL'),
(80, '107728', 'upload/67923ae4c105b.png', 'image', 'NULL'),
(81, '107728', 'upload/67923bdf2616f.png', 'image', 'NULL'),
(82, '107728', 'upload/67923cbf116c9.png', 'image', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

CREATE TABLE `friendlist` (
  `userid` varchar(255) DEFAULT NULL,
  `friendid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friendlist`
--

INSERT INTO `friendlist` (`userid`, `friendid`) VALUES
('539186', '694615'),
('466886', '539186'),
('107728', '635561');

-- --------------------------------------------------------

--
-- Table structure for table `postComments`
--

CREATE TABLE `postComments` (
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postComments`
--

INSERT INTO `postComments` (`comment_id`, `user_id`, `post_id`, `comment`) VALUES
(9, '539186', 45, 'check'),
(10, '539186', 43, 'sei\r\n'),
(12, '539186', 43, 'h'),
(13, '466886', 43, 'ere'),
(14, '466886', 43, 'check'),
(15, '466886', 43, 'check'),
(18, '466886', 43, 'jn'),
(23, '421461', 53, 'cefe'),
(24, '421461', 53, 'cefe'),
(25, '421461', 53, 'cefe'),
(26, '421461', 53, 'cefe'),
(27, '421461', 53, 'j'),
(28, '421461', 53, 'a'),
(29, '421461', 53, 'by'),
(30, '421461', 54, 'ok'),
(31, '421461', 54, 'hi'),
(32, '421461', 54, 'check'),
(33, '421461', 54, 'g'),
(34, '421461', 54, 'dfd'),
(39, '421461', 55, 'fdfdfd'),
(40, '421461', 55, 'dfdfdf'),
(42, '795822', 56, '545');

-- --------------------------------------------------------

--
-- Table structure for table `postLikes`
--

CREATE TABLE `postLikes` (
  `user_id` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postLikes`
--

INSERT INTO `postLikes` (`user_id`, `post_id`) VALUES
('539186', 43),
('539186', 45),
('466886', 43),
('466886', 45),
('421461', 53),
('421461', 54),
('421461', 55),
('795822', 57),
('795822', 59),
('795822', 61),
('635561', 64),
('635561', 67),
('107728', 71),
('107728', 68),
('107728', 69);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `postContent` text DEFAULT NULL,
  `postType` enum('text','image') NOT NULL,
  `type` enum('political','sports','entertainment','NULL') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `postContent`, `postType`, `type`) VALUES
(58, '635561', 'rearaef', 'text', 'NULL'),
(66, '635561', 'bb', 'text', 'NULL'),
(67, '635561', 'upload/678d5ae868186.png', 'image', 'NULL'),
(68, '635561', 'erer', 'text', 'NULL'),
(69, '635561', 'hbhb', 'text', 'NULL'),
(70, '635561', 'upload/678d5e465eecf.png', 'image', 'NULL'),
(71, '635561', 'upload/678d5e574f721.png', 'image', 'political'),
(83, '107728', 'check', 'text', 'NULL'),
(84, '107728', 'upload/6794b396e2691.png', 'image', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `premiumaccountrequest`
--

CREATE TABLE `premiumaccountrequest` (
  `username` varchar(50) NOT NULL,
  `Paccountname` varchar(50) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `websitename` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `enddate` date NOT NULL,
  `remDays` int(5) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `premiumaccountrequest`
--

INSERT INTO `premiumaccountrequest` (`username`, `Paccountname`, `url`, `websitename`, `type`, `enddate`, `remDays`, `Active`) VALUES
('test', 'Somoy TV', 'https://example.com', 'Somoy', 'Media Channel', '2025-01-31', -26, 1),
('john_doe', 'BBC News', 'https://bbc.com', 'BBC Official', 'Online Portal', '2025-01-31', -25, 1),
('jane_smith', 'The Times', 'https://thetimes.co.uk', 'The Times UK', 'Newspaper', '2025-02-15', -40, 1),
('mike_brown', 'CNN', 'https://cnn.com', 'CNN Media', 'Media Channel', '2025-03-01', -54, 0),
('emily_white', 'TechCrunch', 'https://techcrunch.com', 'TechCrunch Portal', 'Online Portal', '2025-01-20', -14, 0),
('chris_green', 'The Guardian', 'https://theguardian.com', 'Guardian News', 'Newspaper', '2025-02-05', -30, 0),
('sophia_gray', 'Fox News', 'https://foxnews.com', 'Fox Media', 'Media Channel', '2025-03-10', -63, 0),
('test', 'Jamuna News', 'https://JamunaTv.com', 'JamunaTV', 'Media Channel', '2024-12-29', 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `user_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `report` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`user_name`, `email`, `report`) VALUES
('', '', ''),
('', '', ''),
('', '', ''),
('a', 'a', 'a'),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('aer', '1234@gmail.com', 'are'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', '1234@gmail.com', 'sds'),
('dsd', 'najib@example.com', 'sd'),
('dsd', 'najib@example.com', 'sd'),
('dsd', 'najib@example.com', 'sd'),
('dsd', 'najib@example.com', 'sd'),
('dsd', 'najib@example.com', 'sd'),
('dsd', 'najib@example.com', 'sd'),
('dsd', 'najib@example.com', 'sd'),
('dsd', 'najib@example.com', 'sd'),
('dsd', 'najib@example.com', 'sd'),
('e', '1234@gmail.com', 'e'),
('e', '1234@gmail.com', 'e'),
('e', '1234@gmail.com', 'e'),
('e', '1234@gmail.com', 'e'),
('dsd', '1234@gmail.com', 'd'),
('a', '1234@gmail.com', 'a'),
('a', '1234@gmail.com', 'a'),
('a', 'mahfuz1@gmail.com', 'a'),
('a', 'najib@example.com', 'a'),
('a', 'abcd@gmail.com', 'a'),
('a', '1234@gmail.com', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `report_post`
--

CREATE TABLE `report_post` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `post_content` text DEFAULT NULL,
  `post_type` enum('text','image') NOT NULL,
  `details` text DEFAULT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_status` varchar(250) NOT NULL DEFAULT 'normal',
  `profilepic` text DEFAULT NULL,
  `livein` varchar(250) DEFAULT NULL,
  `university` varchar(250) DEFAULT NULL,
  `college` varchar(250) DEFAULT NULL,
  `hometown` varchar(250) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `password`, `email`, `id_status`, `profilepic`, `livein`, `university`, `college`, `hometown`, `dob`) VALUES
('107728', 'a', 'Najib#', 'najibmahfuj2@gmail.com', 'political', 'upload/DSC02064.JPG', 'A', 'B', 'C', 'D', '2025-01-29'),
('508951', 'Najib', 'Najib!', 'abcd@gmail.com', 'normal', NULL, NULL, NULL, NULL, NULL, '2025-01-24'),
('635561', 'najib', 'Najib$', 'najib@example.com', 'normal', 'upload/DSC01743.JPG', NULL, NULL, NULL, NULL, '2025-01-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bannedlist`
--
ALTER TABLE `bannedlist`
  ADD PRIMARY KEY (`accountid`);

--
-- Indexes for table `postComments`
--
ALTER TABLE `postComments`
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `userId` (`user_id`);

--
-- Indexes for table `report_post`
--
ALTER TABLE `report_post`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postComments`
--
ALTER TABLE `postComments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `report_post`
--
ALTER TABLE `report_post`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
