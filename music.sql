-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 01:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `Genre_ID` int(8) NOT NULL,
  `Genre_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`Genre_ID`, `Genre_Name`) VALUES
(1, 'Jazz'),
(2, 'Pop');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Order_ID` int(8) NOT NULL,
  `Song_ID` int(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Order_ID`, `Song_ID`, `Quantity`, `Price`) VALUES
(41, 1, 1, 999),
(42, 22, 1, 999),
(42, 23, 4, 999),
(44, 21, 1, 999);

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `Order_ID` int(8) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `User_ID` int(8) NOT NULL,
  `Status` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`Order_ID`, `Order_Date`, `User_ID`, `Status`) VALUES
(41, '2021-04-07 19:15:56', 1, 'Paid'),
(42, '2021-04-07 20:21:37', 1, 'Paid'),
(44, '2021-04-07 21:25:08', 2, 'Unpa');

-- --------------------------------------------------------

--
-- Table structure for table `singer`
--

CREATE TABLE `singer` (
  `Singer_ID` int(8) NOT NULL,
  `Singer_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `singer`
--

INSERT INTO `singer` (`Singer_ID`, `Singer_Name`) VALUES
(1, 'Neovaii'),
(2, 'Joney');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `Song_ID` int(8) NOT NULL,
  `Song_Name` varchar(30) NOT NULL,
  `Song_Img` varchar(100) NOT NULL,
  `Song_Mp3` varchar(100) NOT NULL,
  `Song_Price` int(8) NOT NULL,
  `Genre_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`Song_ID`, `Song_Name`, `Song_Img`, `Song_Mp3`, `Song_Price`, `Genre_ID`) VALUES
(1, 'Mia Wray - Send Me Your Love', '1258210637Mia.jpg', '1709846613Mia Wray - Send Me Your Love (Goldwave Edit).mp3', 999, 1),
(3, 'Neovaii - Chase Pop', '802926954Neo-chase pop.jpg', '428087148Neovaii - Chase Pop.mp3', 999, 2),
(21, 'Centuries - Fall Out Boy', '1525016464Fall out boy.jpg', '1823934687Centuries - Fall Out Boy (Lyrics).mp3', 999, 1),
(22, 'Jeoko - Memories', '21186413812117af96448a93dc97879a3bb9f05071.jpg', '1405530784Goldwave feat. Jeoko - Memories.mp3', 999, 1),
(23, 'Neovaii - Heart Shaped Box', '975473730Shaped box.jpg', '711669609Neovaii - Heart Shaped Box.mp3', 999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `song_singer`
--

CREATE TABLE `song_singer` (
  `Song_ID` int(8) NOT NULL,
  `Singer_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song_singer`
--

INSERT INTO `song_singer` (`Song_ID`, `Singer_ID`) VALUES
(1, 1),
(3, 2),
(21, 1),
(22, 2),
(23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(8) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `User_Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Password`, `Email`, `Role`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'user2', 'user2', 'user2@gmail.com', 'user'),
(8, 'user3', 'user3', 'user3@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Genre_ID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Order_ID`,`Song_ID`),
  ADD KEY `Song_ID` (`Song_ID`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`Singer_ID`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`Song_ID`),
  ADD KEY `Genre_ID` (`Genre_ID`);

--
-- Indexes for table `song_singer`
--
ALTER TABLE `song_singer`
  ADD PRIMARY KEY (`Song_ID`,`Singer_ID`),
  ADD KEY `Singer_ID` (`Singer_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `user_unique` (`User_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `Genre_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `Order_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `singer`
--
ALTER TABLE `singer`
  MODIFY `Singer_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `Song_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `order_user` (`Order_ID`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`Song_ID`) REFERENCES `song` (`Song_ID`);

--
-- Constraints for table `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `order_user_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`Genre_ID`) REFERENCES `genre` (`Genre_ID`);

--
-- Constraints for table `song_singer`
--
ALTER TABLE `song_singer`
  ADD CONSTRAINT `song_singer_ibfk_1` FOREIGN KEY (`Singer_ID`) REFERENCES `singer` (`Singer_ID`),
  ADD CONSTRAINT `song_singer_ibfk_2` FOREIGN KEY (`Song_ID`) REFERENCES `song` (`Song_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
