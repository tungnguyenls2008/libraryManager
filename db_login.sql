-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2020 at 05:19 PM
-- Server version: 10.3.22-MariaDB-1
-- PHP Version: 7.3.15-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `status`) VALUES
(17, 'kkk', 0),
(27, 'Harry Potter and the Goblet of Fire', 1),
(28, 'treight trer ngaia strer ', 1),
(29, 'hung gier tyo whieu ', 1),
(30, 'hing chay zhon streight ', 1),
(31, 'sssss', 1),
(32, 'ádasd', 1),
(33, 'vcvcv', 1),
(34, 'straia ing zher yo ', 1),
(35, 'yo bruyen thai hang ', 1),
(36, 'nhang chang ngai giang ', 1),
(37, 'aia ghyo nginh ngheight ', 1),
(38, 'giieu giinh thieu huyen ', 1),
(39, 'ang ngya ghyo thya ', 1),
(40, 'nghuyen on giinh ung ', 1),
(41, 'ngaia ghon nhyo brung ', 1),
(42, 'whinh nghei shing ngung ', 1),
(43, 'nghang teight ing strung ', 1),
(44, 'inh brinh wher tei ', 1),
(45, 'zheight ei nghyo on ', 1),
(46, 'nghung thaia chung ghung ', 1),
(47, 'height nghai thya trai ', 1),
(48, 'uuuuu', 1),
(49, 'nghya hay chinh tei ', 1),
(50, 'strieu hya whyo ngieu ', 1),
(51, 'Bí kíp làm giàu của anh Huấn hoa hẹo', 1),
(52, 'kinh doanh online cùng anh huấn hoa hòe', 1),
(53, 'tya bryo breight chai ', 1),
(54, 'zhinh theight thai hai ', 1),
(55, 'thyo shieu giya nhuyen ', 1),
(56, 'ghya nhay breight shang ', 1),
(57, 'fgdsgsdgf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_borrow`
--

CREATE TABLE `book_borrow` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_borrow`
--

INSERT INTO `book_borrow` (`id`, `mem_id`, `book_id`) VALUES
(7, 167, 51),
(8, 168, 52);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(255) NOT NULL,
  `mem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `role`, `status`, `firstname`, `lastname`, `username`, `password`) VALUES
(147, 1, 0, 'overlord', '', 'admin', 'admin'),
(152, 0, 1, 'haia_thuyen_', 'chyo_nhing_', 'ngang_giei_', '123'),
(153, 0, 1, 'nger_giay_', 'ghai_zhyo_', 'sher_chon_', '123'),
(154, 0, 1, 'nghieu_nghinh_', 'ghuyen_nghing_', 'strei_ching_', '123'),
(155, 0, 1, 'gion_bron_', 'shuyen_nhing_', 'tring_ghon_', '123'),
(156, 0, 1, 'giai_streight_', 'whang_ghon_', 'giyo_truyen_', '123'),
(157, 0, 0, 'nhinh_whuyen_', 'brinh_trinh_', 'ieu_ton_', '123'),
(158, 0, 0, 'ei_brang_', 'bryo_ghieu_', 'uyen_treight_', '123'),
(159, 0, 0, 'nghei_zhang_', 'nghing_ei_', 'nhinh_shuyen_', '123'),
(160, 0, 1, 'sher_giieu_', 'zhay_whon_', 'treight_brya_', '123'),
(161, 0, 0, 'chieu_hya_', 'ngang_ghay_', 'brei_whai_', '123'),
(163, 0, 0, 'tron_ghya_', 'inh_brung_', 'shon_zhinh_', '123'),
(165, 0, 0, 'ngay_brer_', 'zhei_hinh_', 'height_giinh_', '123'),
(166, 0, 0, 'chaia_strinh_', 'ghon_chinh_', 'ching_giya_', '123'),
(167, 1, 0, 'a', 'a', 'a', 'a'),
(168, 0, 1, 'height_wher_', 'thinh_zhuyen_', 'giei_strieu_', '123'),
(169, 0, 0, 'tung', 'nguyen', 'tung', '123');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `ticket_details`
-- (See below for the actual view)
--
CREATE TABLE `ticket_details` (
`id` int(11)
,`book_name` varchar(255)
,`book_id` int(11)
,`book_status` int(11)
,`username` varchar(30)
,`user_id` int(11)
,`member_status` int(11)
,`member_role` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `ticket_details`
--
DROP TABLE IF EXISTS `ticket_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ticket_details`  AS  select `book_borrow`.`id` AS `id`,`books`.`name` AS `book_name`,`books`.`id` AS `book_id`,`books`.`status` AS `book_status`,`member`.`username` AS `username`,`member`.`mem_id` AS `user_id`,`member`.`status` AS `member_status`,`member`.`role` AS `member_role` from ((`book_borrow` join `books` on(`book_borrow`.`book_id` = `books`.`id`)) join `member` on(`book_borrow`.`mem_id` = `member`.`mem_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `book_borrow`
--
ALTER TABLE `book_borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD CONSTRAINT `book_borrow_ibfk_1` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`),
  ADD CONSTRAINT `book_borrow_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
