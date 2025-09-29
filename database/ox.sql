-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 03:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ox`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `activity_description` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `user_id`, `activity_type`, `activity_description`, `timestamp`) VALUES
(45, NULL, 'Review', 'Submitted a review by User: junaidpcce@gmail.com', '2023-11-22 09:08:45'),
(46, NULL, 'Review', 'Submitted a review by User: junaidpcce@gmail.com', '2023-11-22 09:09:52'),
(47, NULL, 'Booking', 'Visited By User: junaidpcce@gmail.com', '2023-11-22 13:18:10'),
(48, NULL, 'Booking', 'Visited By User: junaidpcce@gmail.com', '2023-11-22 13:44:50'),
(49, NULL, 'Booking', 'Visited By User: mohsin@gmail.com', '2023-11-23 04:53:08'),
(50, NULL, 'Review', 'Submitted a review by User: john@gmail.com', '2023-11-23 08:17:06'),
(51, NULL, 'Review', 'Submitted a review by User: mohsin@gmail.com', '2023-11-23 08:17:51'),
(52, NULL, 'Booking', 'Visited By User: john@gmail.com', '2023-11-23 08:27:22'),
(53, NULL, 'Booking', 'Visited By User: john@gmail.com', '2023-11-23 08:27:31'),
(54, NULL, 'Booking', 'Visited By User: john@gmail.com', '2023-11-23 08:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2020-05-11 11:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(255) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `PackageId`, `UserEmail`, `Comment`, `status`, `created_at`) VALUES
(48, 14, 'junaidpcce@gmail.com', 'Good Place To visit', 0, '2023-11-22 09:08:45'),
(49, 16, 'junaidpcce@gmail.com', 'Nice View', 0, '2023-11-22 09:09:52'),
(50, 14, 'john@gmail.com', 'Nice Atmosphere', 0, '2023-11-23 08:17:06'),
(51, 14, 'mohsin@gmail.com', 'Holy Vibe', 0, '2023-11-23 08:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(15, 'Goa', 'Couple Adventure / Family Adventure', 'Goa, India', 20000, 'Beach activities (water sports, sunbathing), Nightlife and parties, Cultural experiences, Nature exploration (hiking, wildlife sanctuaries), Historical sites (churches, forts)', 'Goa offers a diverse range of activities suitable for both couples and families. You can enjoy the beautiful beaches, indulge in water sports like parasailing and jet-skiing, explore the vibrant nightlife, visit historic churches and forts, and experience the unique blend of Indian and Portuguese cultures. Nature lovers can also explore the lush landscapes and wildlife sanctuaries in the region.', 'upload 4.jpg', '2023-11-22 07:26:50', NULL),
(16, 'Gateway of India', 'Family Adventure / Historical Exploration', 'Mumbai, India', 120000, 'Historical exploration, Waterfront views, Boat rides to Elephanta Caves, Nearby attractions like Chhatrapati Shivaji Maharaj Terminus', ' The Gateway of India is a historical monument that serves as a major tourist attraction in Mumbai. Visitors can explore the architecture, take in the scenic waterfront views, and enjoy boat rides to the nearby Elephanta Caves. The area is also surrounded by other landmarks like the Chhatrapati Shivaji Maharaj Terminus, making it a great spot for historical exploration.', 'upload 3.jpg', '2023-11-22 07:29:07', NULL),
(17, 'Taj Mahal', 'Couple Adventure / Historical Romance', 'Agra, India', 5000, 'Historical romance, Architectural marvel, Gardens and surrounding monuments, Guided tours available', 'The Taj Mahal is a symbol of eternal love and a UNESCO World Heritage Site. Couples can immerse themselves in the historical romance of this architectural marvel, explore the well-maintained gardens, and take guided tours to learn about the rich history and intricate details of the monument.', 'upload 2.jpg', '2023-11-22 07:30:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(5, 'Test', '1987894654', 'anuj@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-07-08 06:35:06', '2021-05-11 04:37:41'),
(8, 'Junaid Nagarchi', '8059778488', 'junaidpcce@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-11-21 12:13:19', '2023-11-22 13:25:13'),
(9, 'mohsin', '9877574745', 'mohsin@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-11-23 04:51:49', NULL),
(10, 'John Silva', '8459192970', 'john@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-11-23 08:08:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvisited`
--

CREATE TABLE `tblvisited` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `Comment` mediumtext DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvisited`
--

INSERT INTO `tblvisited` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(36, 14, 'mohsin@gmail.com', NULL, NULL, NULL, '2023-11-23 04:53:08', 0, NULL, NULL),
(37, 14, 'john@gmail.com', NULL, NULL, NULL, '2023-11-23 08:27:22', 0, NULL, NULL),
(39, 16, 'john@gmail.com', NULL, NULL, NULL, '2023-11-23 08:27:37', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- Indexes for table `tblvisited`
--
ALTER TABLE `tblvisited`
  ADD PRIMARY KEY (`BookingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblvisited`
--
ALTER TABLE `tblvisited`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tblusers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
