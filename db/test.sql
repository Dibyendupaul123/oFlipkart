-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 07:23 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminname` varchar(50) NOT NULL,
  `adminemail` varchar(50) NOT NULL,
  `adminpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminname`, `adminemail`, `adminpassword`) VALUES
('g@gmail.com', 'g@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(1) NOT NULL,
  `pid` int(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `pid`, `email`, `quantity`) VALUES
(121, 41, 'souvik@gmail.com', 1),
(122, 40, 'souvik@gmail.com', 2),
(123, 42, 'souvik@gmail.com', 2),
(124, 41, 'souvik@gmail.com', 2),
(125, 50, 'souvik@gmail.com', 1),
(128, 47, '', 1),
(129, 40, 'p@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`) VALUES
(40, 'shirt', 299, 'uploads/s-st2-vebnor-original-imagpv8vufgg5egp.webp'),
(41, 'jince', 499, 'uploads/jince.png'),
(42, 'WATCH', 1299, 'uploads/61ZjlBOp+rL._AC_UF1000,1000_QL80_.jpg'),
(43, 'APPLE 15 PRO+MAX', 47999, 'uploads/81Os1SDWpcL._AC_UF1000,1000_QL80_.jpg'),
(44, 'r15', 229999, 'uploads/1_-UPqRz5EaXkMj_O2NBGdRg.webp'),
(45, 'sweet heart', 199, 'uploads/300-sweetheart-green-men-and-women-deodorant-body-spray-original-imagjvgygfyuuces.webp'),
(47, 'HOODY', 299, 'uploads/51sciPcEOAL._AC_UY1100_.jpg'),
(48, 'frize', 24799, 'uploads/1657223623019-jpg-500x500.webp'),
(49, 'AC', 47999, 'uploads/Air-Conditioner-Buying-Guide.jpg'),
(50, 'r15', 290999, 'uploads/1_-UPqRz5EaXkMj_O2NBGdRg.webp'),
(51, 'TVS SCOOTER', 80999, 'uploads/tvs-ntorq-125-scooty.jpg'),
(52, 'HAIR STYLER', 198, 'uploads/urbangabru-hair-removal-cream-spray-200-ml.jpg'),
(53, 'hoody', 499, 'uploads/hoo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `useremail`, `userpassword`) VALUES
('2020294', 'p@gmail.com', '123'),
('souvik', 'souvik@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `ordrid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`ordrid`, `pid`, `email`, `quantity`, `price`) VALUES
(2, 40, 'p@gmail.com', 1, 0),
(3, 42, 'p@gmail.com', 1, 0),
(4, 42, 'p@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminemail`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`useremail`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`ordrid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `ordrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
