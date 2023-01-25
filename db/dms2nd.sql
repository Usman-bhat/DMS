-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 08:00 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit_detail`
--

CREATE TABLE `credit_detail` (
  `cr_id` int(11) NOT NULL,
  `cr_amount` int(11) NOT NULL,
  `cr_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cr_by` varchar(30) NOT NULL,
  `cr_mode` varchar(30) NOT NULL DEFAULT 'cash',
  `cr_for_id` varchar(30) NOT NULL,
  `cr_reciept_no` int(11) NOT NULL,
  `cr_reciept_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_detail`
--

INSERT INTO `credit_detail` (`cr_id`, `cr_amount`, `cr_date`, `cr_by`, `cr_mode`, `cr_for_id`, `cr_reciept_no`, `cr_reciept_by`) VALUES
(1, 100000, '2021-01-06 01:00:00', 'me', 'online', 'food', 777, 'me'),
(2, 10000, '2022-01-06 01:02:06', 'me', 'online', 'food', 777, 'me'),
(3, 10000, '2020-02-06 01:02:28', 'me', 'online', 'pay', 777, 'me'),
(4, 20000, '2023-03-06 01:02:43', 'me', 'online', 'pay', 777, 'me'),
(5, 100, '2023-01-06 01:03:35', 'me', 'online', 'food', 777, 'me'),
(6, 100, '2023-01-06 01:03:36', 'me', 'online', 'food', 777, 'me'),
(7, 100, '2023-01-06 01:03:56', 'me', 'online', 'food', 777, 'me'),
(8, 100, '2023-01-06 01:04:37', 'me', 'online', 'food', 777, 'me'),
(9, 100, '2023-03-06 01:05:26', 'me', 'online', 'others', 777, 'me'),
(10, 1000, '2023-01-06 01:06:05', 'me', 'online', 'others', 777, 'me'),
(11, 50000, '2023-02-06 01:06:49', 'me', 'online', 'others', 777, 'me'),
(12, 100, '2023-01-06 01:06:51', 'me', 'online', 'food', 777, 'me'),
(13, 100, '2023-01-06 01:07:14', 'me', 'online', 'food', 777, 'me'),
(14, 100, '2023-01-06 01:07:15', 'me', 'online', 'food', 777, 'me'),
(16, 10000, '2023-03-06 01:08:34', 'me', 'online', 'construction', 777, 'me'),
(17, 100, '2023-01-06 01:08:40', 'me', 'online', 'others', 777, 'me'),
(26, 15000, '2023-02-06 01:14:18', 'me', 'online', 'bills', 777, 'me'),
(27, 100, '2023-01-06 01:14:19', 'me', 'online', 'construction', 777, 'me'),
(28, 100, '2023-01-06 01:14:49', 'me', 'online', 'food', 777, 'me'),
(29, 100, '2023-03-06 01:16:03', 'me', 'online', 'bills', 777, 'me'),
(30, 10015, '2023-02-06 01:20:47', 'me', 'online', 'food', 777, 'me'),
(31, 1000, '2023-01-06 01:22:51', 'sepf', 'Mali', 'Pay', 0, '555'),
(32, 10056, '2023-03-06 01:30:35', 'abdul lateef', 'Cash', 'food', 0, '206'),
(33, 10000, '2023-01-06 01:41:04', 'me', 'online', 'construction', 737, 'me'),
(34, 1020, '2023-01-06 01:44:02', 'me', 'online', 'food', 737, 'me'),
(35, 100, '2023-01-06 01:46:29', 'test', 'Cash', 'Food', 0, '455'),
(36, 100, '2023-01-06 01:48:49', 'ghg', 'Cash', 'Food', 0, 'hjg'),
(37, 189, '2023-01-06 01:53:38', 'ndbe', 'Cash', 'pay', 0, 'rbbe'),
(1552, 100, '2023-01-06 01:07:43', 'me', 'online', 'bills', 777, 'me'),
(1554, 100, '2023-01-12 02:18:19', 'self', 'Online', 'construction', 0, 'gg4'),
(1555, 1000, '2023-01-15 03:28:05', 'test', 'Cash', 'Food', 0, '667'),
(1556, 100, '2023-01-15 03:59:14', '.\n\n\nعثمان بٹ بٹہ گنڈ ویرسناک', 'Cash', 'Food', 0, '55'),
(1557, 300, '2023-01-16 15:37:10', 'aadil san', 'Online', 'Food', 0, '7'),
(1558, 100, '2023-01-24 12:46:18', 'گل محمد', 'Cash', 'Food', 0, '2356'),
(1559, 10000000, '2023-01-24 13:26:19', 'ادم', 'Cash', 'Food', 0, '34'),
(1560, 100, '2023-01-24 21:49:41', 'trr', 'Cash', 'Food', 0, '56');

-- --------------------------------------------------------

--
-- Table structure for table `debit_detail`
--

CREATE TABLE `debit_detail` (
  `dt_id` int(11) NOT NULL,
  `dt_amount` int(11) NOT NULL,
  `dt_for` varchar(30) NOT NULL,
  `dt_by` varchar(30) NOT NULL,
  `dt_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debit_detail`
--

INSERT INTO `debit_detail` (`dt_id`, `dt_amount`, `dt_for`, `dt_by`, `dt_date`) VALUES
(1, 100000, 'food', 'self', '2023-01-09 00:11:19'),
(2, 1020, 'food', 'me', '2023-01-09 01:28:39'),
(3, 1000, 'Bills', 'sultan sahab', '2023-02-09 01:41:16'),
(4, 500, 'Food', 'sultan sahab', '2022-01-09 01:43:49'),
(5, 10000, 'Pay', 'nisar sahab', '2023-02-09 01:46:49'),
(6, 1020, 'food', 'me', '2023-01-09 22:12:41'),
(7, 1020, 'food', 'me', '2023-02-11 22:41:54'),
(8, 1020, 'food', 'me', '2022-01-11 22:44:01'),
(9, 1000, 'construction', 'self', '2023-01-12 02:15:13'),
(10, 5000, 'construction', 'self', '2022-01-12 02:15:58'),
(11, 1000, 'Bills', 'self', '2023-01-12 02:17:25'),
(12, 1500, 'Food', 'self', '2023-01-15 03:54:09'),
(13, 100, 'Food', 'self', '2023-01-16 15:39:37'),
(14, 500, 'Food', 'Mufti sahab', '2023-01-23 01:40:58'),
(15, 1020, 'food', 'me', '2023-01-23 15:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `e_email` varchar(50) NOT NULL,
  `e_password` text NOT NULL,
  `e_photo` varchar(50) NOT NULL DEFAULT 'noimg.jpg',
  `e_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`e_id`, `e_name`, `e_email`, `e_password`, `e_photo`, `e_phone`) VALUES
(1, 'usman', 'ybhat39@gmail.com', '921dbcb6b5325e5e580ff4cb94bd027ab55560eb8920fb9d325f76c6c6ba43d7', 'noimg.jpg', 1122334455);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ex_id` int(11) NOT NULL,
  `ex_by` varchar(40) NOT NULL,
  `ex_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ex_total_marks` int(11) NOT NULL,
  `ex_total_students` int(11) NOT NULL,
  `ex_type` varchar(40) NOT NULL,
  `ex_is_closed` int(11) NOT NULL DEFAULT 1 COMMENT '0=exam is closed \r\n1= exam is open',
  `ex_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ex_id`, `ex_by`, `ex_date`, `ex_total_marks`, `ex_total_students`, `ex_type`, `ex_is_closed`, `ex_remarks`) VALUES
(1, '5gt', '2023-01-05 00:00:00', 10, 1, 'mahana', 0, 'mahana exam test'),
(4, '', '2023-01-04 00:00:00', 100, 1, 'mahana', 0, ',lll'),
(5, 'eee', '2023-01-12 00:00:00', 344, 1, 'mahana', 0, 'eeee'),
(6, 'self', '2023-01-18 00:00:00', 100, 2, 'mahana', 0, 'gswhjvjhw'),
(7, 'test d', '2023-01-25 00:00:00', 100, 2, 'mahana', 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `n_id` int(11) NOT NULL,
  `n_title` text NOT NULL,
  `n_body` text NOT NULL,
  `n_date` datetime NOT NULL DEFAULT current_timestamp(),
  `n_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(11) NOT NULL,
  `p_title` text NOT NULL,
  `p_body` text NOT NULL,
  `p_crud` datetime NOT NULL DEFAULT current_timestamp(),
  `p_tags` text NOT NULL,
  `p_date` datetime NOT NULL DEFAULT current_timestamp(),
  `p_by` varchar(50) NOT NULL,
  `p_category` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `p_title`, `p_body`, `p_crud`, `p_tags`, `p_date`, `p_by`, `p_category`) VALUES
(2, 'eeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeee', '2023-01-13 01:07:34', 'eee', '2023-01-13 01:07:34', 'ybhat39@gmail.com', 'quran');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `r_id` int(11) NOT NULL,
  `r_sid` int(11) NOT NULL,
  `r_date` datetime NOT NULL DEFAULT current_timestamp(),
  `r_exam` varchar(30) NOT NULL,
  `r_adaygi` varchar(30) NOT NULL,
  `r_lahja` varchar(30) NOT NULL,
  `r_tajweed` varchar(30) NOT NULL,
  `r_exid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`r_id`, `r_sid`, `r_date`, `r_exam`, `r_adaygi`, `r_lahja`, `r_tajweed`, `r_exid`) VALUES
(1, 100, '2023-01-05 15:29:07', '', '3', '3', '3', 1),
(2, 100, '2023-01-13 00:42:17', '', '', '', '', 2),
(4, 100, '2023-01-13 00:44:57', '', '', '', '', 3),
(5, 100, '2023-01-13 00:55:09', '', '', '', '', 4),
(6, 100, '2023-01-12 00:00:00', '', '22', '22', '32', 5),
(7, 100, '2023-01-18 00:00:00', '', '10', '52', '2', 6),
(8, 101, '2023-01-18 00:00:00', '', '50', '25', '10', 6),
(9, 100, '2023-01-25 00:00:00', '', '50', '20', '20', 7),
(10, 101, '2023-01-25 00:00:00', '', '30', '10', '15', 7);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `t_admission_no` int(11) NOT NULL,
  `t_admission_date` datetime NOT NULL DEFAULT current_timestamp(),
  `t_name` varchar(50) NOT NULL,
  `t_name_ur` varchar(25) NOT NULL,
  `t_parentage` varchar(50) NOT NULL,
  `t_parentage_ur` varchar(25) NOT NULL,
  `t_class` varchar(10) NOT NULL,
  `t_dob` datetime NOT NULL,
  `t_phone_number` varchar(15) NOT NULL,
  `t_aadhar` varchar(20) NOT NULL,
  `t_photo` varchar(40) NOT NULL DEFAULT 'noimg.jpg',
  `t_form_no` varchar(11) NOT NULL,
  `t_address` text NOT NULL,
  `t_address_ur` text NOT NULL,
  `t_pincode` int(11) NOT NULL,
  `t_prev_study_place` varchar(30) NOT NULL,
  `t_prev_study_place_ur` varchar(30) NOT NULL,
  `prev_class` varchar(30) NOT NULL,
  `t_status` varchar(25) NOT NULL,
  `t_in_exam` int(11) NOT NULL DEFAULT 0 COMMENT '0=not\r\n1= in exam \r\n2= not in exam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`t_admission_no`, `t_admission_date`, `t_name`, `t_name_ur`, `t_parentage`, `t_parentage_ur`, `t_class`, `t_dob`, `t_phone_number`, `t_aadhar`, `t_photo`, `t_form_no`, `t_address`, `t_address_ur`, `t_pincode`, `t_prev_study_place`, `t_prev_study_place_ur`, `prev_class`, `t_status`, `t_in_exam`) VALUES
(100, '2023-01-10 00:00:00', 'mdchj', 'محمد ایوب بٹ', 'jhbkjnlkm,mnjb', 'محمد ایوب بٹ', 'hifz', '2023-01-13 00:00:00', '65446', '5665', 'noimg.jpg', '45', 'ugyfughkjlm;', 'محمد ایوب بٹ', 553, 'jhbkn', 'محمد ایوب بٹ', 'start', 'active', 0),
(101, '2023-01-11 00:00:00', 'usman bhat', 'محمد عثمان بٹ', 'ayoub bhat', 'محمد ایوب بٹ', 'hifz', '2023-01-17 00:00:00', '123321123132', '211221212121', '1674403490.JPG', 'f34', 'batagund vering anantnag', 'جھئتفتفئ کجنبک ئگجھ جھط', 192212, 'as chvwdf', 'سفھبطسدب', 'start', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(25) NOT NULL,
  `u_email` varchar(25) NOT NULL,
  `u_password` text NOT NULL,
  `u_photo` varchar(20) NOT NULL DEFAULT 'noimg.jpg',
  `u_phone` varchar(15) NOT NULL,
  `u_role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_password`, `u_photo`, `u_phone`, `u_role`) VALUES
(1, 'Usman', 'ybhat39@gmail.com', '921dbcb6b5325e5e580ff4cb94bd027ab55560eb8920fb9d325f76c6c6ba43d7', 'noimg.jpg', '7780818683', 'admin'),
(2, 'Mufti Sultan Sahab', 'muftisultan@gmail.com', '921dbcb6b5325e5e580ff4cb94bd027ab55560eb8920fb9d325f76c6c6ba43d7', 'noimg.jpg', '1122334455', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_detail`
--
ALTER TABLE `credit_detail`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `debit_detail`
--
ALTER TABLE `debit_detail`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_detail`
--
ALTER TABLE `credit_detail`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1561;

--
-- AUTO_INCREMENT for table `debit_detail`
--
ALTER TABLE `debit_detail`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
