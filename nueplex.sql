-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 12:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nueplex`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinemas`
--

CREATE TABLE `cinemas` (
  `cinemaId` int(11) NOT NULL,
  `cinemaType` varchar(40) DEFAULT NULL,
  `maxseats` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinemas`
--

INSERT INTO `cinemas` (`cinemaId`, `cinemaType`, `maxseats`, `price`) VALUES
(1, 'Silver', 70, 1000),
(2, 'Gold', 100, 1500),
(3, 'Platinum', 100, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieId` int(11) NOT NULL,
  `movieName` varchar(40) DEFAULT NULL,
  `movieCat` varchar(40) DEFAULT NULL,
  `movieRuntime` bigint(20) DEFAULT NULL,
  `movieImage` varchar(255) DEFAULT NULL,
  `movieDescription` longtext DEFAULT NULL,
  `movieStatus` varchar(100) DEFAULT NULL,
  `movieRating` int(11) DEFAULT NULL,
  `movieTrailer` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieId`, `movieName`, `movieCat`, `movieRuntime`, `movieImage`, `movieDescription`, `movieStatus`, `movieRating`, `movieTrailer`) VALUES
(3, 'Oblivion 2', 'Action/Adventure', 7440, '1966691347mv1.jpg', 'A court martial sends a veteran soldier to a distant planet, where he has to ... Everything New on Hulu in November. There&#39;s a whole lot to love about Hulu&#39;s ', 'Showing', NULL, 'https://www.youtube.com/embed/XmIIgE7eSak'),
(4, 'Black Adam', 'Action/Adventure', 7440, '868194380blackadam.jpg', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Showing', NULL, 'https://www.youtube.com/embed/EXeTwQWrcwY'),
(5, 'The Dark Knight', 'Action/Adventure', 9120, '2142151293darknight.jpg', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Showing', NULL, 'https://www.youtube.com/embed/LDG9bisJEaI'),
(6, 'Man Of Steel', 'Action/Adventure', 9120, '333395070mos.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quos tempore voluptatibus.', 'Showing', NULL, 'https://www.youtube.com/embed/T6DJcgm3wNY '),
(7, 'Avengers Endgame', 'Action/Adventure', 10800, '585074086avenger.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quos tempore voluptatibus.', 'Showing', NULL, 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(8, 'Interstellar', 'SciFi', 10800, '1778344385interstellar.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quos tempore voluptatibus.', 'Showing', 8, 'https://www.youtube.com/embed/zSWdZVtXT7E'),
(9, 'John Wick 2', 'Action/Adventure', 7200, '1021955603john wick.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quos tempore voluptatibus.', 'Showing', NULL, ' https://www.youtube.com/embed/v=XGk2EfbD_Ps '),
(10, 'Black Panther: Wakanda Forever', 'Action/Adventure', 7200, '1228562629wakandaforever.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quos tempore voluptatibus.', 'Upcoming', NULL, '  https://www.youtube.com/embed/_Z3QKkl1WyM  ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `showId` int(11) DEFAULT NULL,
  `seatsBooked` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservedseats`
--

CREATE TABLE `reservedseats` (
  `orderId` int(11) DEFAULT NULL,
  `seatnumber` varchar(40) DEFAULT NULL,
  `priceEach` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `dt` datetime DEFAULT current_timestamp(),
  `movieId` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `userId`, `review`, `ts`, `dt`, `movieId`, `rating`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur voluptates esse debitis nostrum dignissimos? Facere ut asperiores exercitationem similique odio expedita sapiente harum aliquam architecto officia eveniet numquam delectus magnam dolores, nihil enim, ullam in recusandae possimus repellendus maiores excepturi?\r\n                                                            ', '2022-11-12 07:33:34', '2022-11-12 12:33:34', 8, 1),
(2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur voluptates esse debitis nostrum dignissimos? Facere ut asperiores exercitationem similique odio expedita sapiente harum aliquam architecto officia eveniet numquam delectus magnam dolores, nihil enim, ullam in recusandae possimus repellendus maiores excepturi?\r\n                                                            ', '2022-11-12 07:41:21', '2022-11-12 12:41:21', 8, 10),
(3, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur voluptates esse debitis nostrum dignissimos? Facere ut asperiores exercitationem similique odio expedita sapiente harum aliquam architecto officia eveniet numquam delectus magnam dolores, nihil enim, ullam in recusandae possimus repellendus maiores excepturi?\r\n                                                            ', '2022-11-12 07:43:42', '2022-11-12 12:43:42', 8, 10),
(4, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur voluptates esse debitis nostrum dignissimos? Facere ut asperiores exercitationem similique odio expedita sapiente harum aliquam architecto officia eveniet numquam delectus magnam dolores, nihil enim, ullam in recusandae possimus repellendus maiores excepturi?\r\n                                                            ', '2022-11-12 07:45:26', '2022-11-12 12:45:26', 8, 10),
(5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur voluptates esse debitis nostrum dignissimos? Facere ut asperiores exercitationem similique odio expedita sapiente harum aliquam architecto officia eveniet numquam delectus magnam dolores, nihil enim, ullam in recusandae possimus repellendus maiores excepturi?\r\n                                                            ', '2022-11-12 07:47:30', '2022-11-12 12:47:30', 8, 10),
(6, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur voluptates esse debitis nostrum dignissimos? Facere ut asperiores exercitationem similique odio expedita sapiente harum aliquam architecto officia eveniet numquam delectus magnam dolores, nihil enim, ullam in recusandae possimus repellendus maiores excepturi?\r\n                                                            ', '2022-11-12 07:50:25', '2022-11-12 12:50:25', 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `seatreserve`
--

CREATE TABLE `seatreserve` (
  `userId` int(11) DEFAULT NULL,
  `seatno` varchar(255) DEFAULT NULL,
  `showId` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seatreserve`
--

INSERT INTO `seatreserve` (`userId`, `seatno`, `showId`, `price`) VALUES
(1, 'A1', 2, 1000),
(1, 'B2', 2, 1000),
(1, 'A5', 2, 1000),
(1, 'B4', 2, 1000),
(1, 'C3', 2, 1000),
(1, 'A3', 5, 1500),
(1, 'A1', 5, 1500),
(1, 'B2', 5, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `showtimes`
--

CREATE TABLE `showtimes` (
  `showId` int(11) NOT NULL,
  `movieId` int(11) DEFAULT NULL,
  `cinemaId` int(11) DEFAULT NULL,
  `showtimings` varchar(100) DEFAULT NULL,
  `showDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showtimes`
--

INSERT INTO `showtimes` (`showId`, `movieId`, `cinemaId`, `showtimings`, `showDate`) VALUES
(2, 4, 1, '22:29', '2022-11-05'),
(3, 5, 3, '15:29', '2022-11-05'),
(4, 6, 3, '17:40', '2022-11-16'),
(5, 7, 2, '22:40', '2022-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(40) DEFAULT NULL,
  `userEmail` varchar(40) DEFAULT NULL,
  `userPw` varchar(40) DEFAULT NULL,
  `userRole` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPw`, `userRole`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`cinemaId`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `showId` (`showId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `movieId` (`movieId`);

--
-- Indexes for table `seatreserve`
--
ALTER TABLE `seatreserve`
  ADD KEY `userId` (`userId`),
  ADD KEY `showId` (`showId`);

--
-- Indexes for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`showId`),
  ADD KEY `movieId` (`movieId`),
  ADD KEY `cinemaId` (`cinemaId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `cinemaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`showId`) REFERENCES `showtimes` (`showId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`movieId`) REFERENCES `movies` (`movieId`);

--
-- Constraints for table `seatreserve`
--
ALTER TABLE `seatreserve`
  ADD CONSTRAINT `seatreserve_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `seatreserve_ibfk_2` FOREIGN KEY (`showId`) REFERENCES `showtimes` (`showId`);

--
-- Constraints for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_ibfk_1` FOREIGN KEY (`movieId`) REFERENCES `movies` (`movieId`),
  ADD CONSTRAINT `showtimes_ibfk_2` FOREIGN KEY (`cinemaId`) REFERENCES `cinemas` (`cinemaId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
