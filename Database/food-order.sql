-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 12:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `img` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `email`, `username`, `pass`, `img`) VALUES
(3, 'Ruchi Shah Virendra', 'rsanghvi2712@gmail.com', 'ruchis', 'Mahavir@24', 'uploads/Users/20200809_180027.jpg'),
(4, 'Veer Shah B', 'rsanghvi2712@gmail.com', 'veer1805', 'veer', 'uploads/Users/20211118_104657.jpg'),
(8, 'sonal', 'rsanghvi2712@gmail.com', 'sonal12', 'sonal', 'uploads/profile.png'),
(9, 'Amish', 'rsanghvi2712@gmail.com', 'amish12', 'amish', 'uploads/20190513_163148.jpg'),
(10, 'Meeta', 'rsanghvi2712@gmail.com', 'meeta', 'meeta', 'uploads/20190321_210950.jpg'),
(13, 'ramkumar', 'rsanghvi2712@gmail.com', 'ram', 'ram123', 'uploads/pizza.jpg'),
(14, 'adasdada', 'rsanghvi2712@gmail.com', 'asddasdsss', 'ddd', 'uploads/77b5a262-0662-4af8-9411-7c670bc66a78.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `title`, `img`, `is_featured`, `is_active`) VALUES
(1, 'North Indian', '/uploads/categories/indian_punjabi.jpg', 1, 1),
(2, 'South Indain', '/uploads/categories/bg.jpg', 1, 1),
(8, 'Pizza', '/uploads/categories/menu-pizza.jpg', 0, 1),
(10, 'burger', '/uploads/categories/menu-momo.jpg', 1, 1),
(19, 'New1', '/uploads/categories/female-pending-approval.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_contact` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_img` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `cust_name`, `cust_contact`, `cust_email`, `cust_address`, `cust_img`, `is_active`) VALUES
(1, 'Ruchi Sanghvi', '469-434-7643', 'rsanghvi2712@gmail.com', 'ddadadadadd', 'uploads/customers/02a04bdf-1141-4c8d-9942-0648f5036673.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(11) UNSIGNED NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `price` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `food_name`, `descr`, `price`, `img`, `category_id`, `is_featured`, `is_active`) VALUES
(2, 'Veggie Pizza11', 'Veggie pizzaASA', 300, 'uploads/foods/menu-pizza.jpg', 2, 1, 1),
(4, 'Naan', 'naan', 30, 'uploads/foods/menu-burger.jpg', 1, 1, 1),
(5, 'Paneer Bhurji', 'Paneer bhurji', 120, 'uploads/foods/menu-momo.jpg', 1, 1, 1),
(8, 'Lachha PAratha', 'Lachha paratha', 32, 'uploads/foods/menu-momo.jpg', 1, 0, 1),
(9, 'Saladsdsdsadas', 'Salad', 20, 'uploads/foods/menu-burger.jpg', 19, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_review`
--

CREATE TABLE `tbl_food_review` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `review_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food_review`
--

INSERT INTO `tbl_food_review` (`id`, `food_id`, `user_id`, `stars`, `review_note`) VALUES
(1, 0, 1, 4, 'Nice.Super tasty'),
(2, 2, 1, 4, 'Nice');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `total` varchar(20) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_address` text NOT NULL,
  `cust_contact` text NOT NULL,
  `cust_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `order_number`, `food`, `price`, `quantity`, `total`, `total_price`, `order_date`, `order_status`, `cust_name`, `cust_address`, `cust_contact`, `cust_email`) VALUES
(7, 'RES7', 'Naan', '30', '1.00', '30', '30.00', '2022-11-14 00:00:00', 'Received', 'Veer', '4245 Cedar Bridge walk', '469-434-7643', 'rsanghvi2712@gmail.com'),
(8, 'RES8', 'Naan', '30', '1.00', '30', '30.00', '2022-11-14 00:00:00', 'Received', 'Veer', '4245 Cedar Bridge walk', '469-434-7643', 'rsanghvi2712@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `id` int(11) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `res_img` varchar(255) NOT NULL,
  `res_address` varchar(255) NOT NULL,
  `res_contact` varchar(255) NOT NULL,
  `res_email` varchar(255) NOT NULL,
  `res_website` varchar(255) NOT NULL,
  `business_hours` varchar(255) NOT NULL,
  `business_days_open` varchar(255) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`id`, `res_name`, `res_img`, `res_address`, `res_contact`, `res_email`, `res_website`, `business_hours`, `business_days_open`, `is_featured`, `is_active`) VALUES
(1, 'Imperial Palace111', '', 'Yagnik Road,Rajkot', '469-434-7643', 'contact@imperialpalace.com', '', '', '', 1, 1),
(2, 'asdasdadsa', '', 'asdasddasd', '469-769-0390', 'adadad@gmail.com', '', '', '', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food_review`
--
ALTER TABLE `tbl_food_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_food_review`
--
ALTER TABLE `tbl_food_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
