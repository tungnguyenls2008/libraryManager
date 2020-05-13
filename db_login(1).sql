-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2020 at 03:01 PM
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
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `category`, `cover`, `description`, `status`) VALUES
(51, 'Bí kíp làm giàu của anh Huấn hoa hẹo', 'huấn rose', 'drama', NULL, 'sách đéo gì cái loại này???', 1),
(52, 'kinh doanh online cùng anh huấn hoa hòe', '', '', '', '', 1),
(58, 'fhfgh', 'dfgdfg', 'crime-detective', '', 'sdfsgs', 1),
(59, 'nhyo ter shei string ', 'straia chay zheight ', '2', NULL, 'trya bring nguyen ting nghang gher nhang trieu ngyo her zhuyen nhung hieu bryo hai ', 1),
(60, 'ching hon brer giung ', 'strei ting hya ', '5', NULL, 'trer zhai ngieu zhai giung thai trinh sheight wheight brai nhung chung nhuyen tya nhya ', 1),
(61, 'tray shieu ngher truyen ', 'ther nhyo ngyo ', 'comic-graphic', NULL, 'wher ghai tyo tyo nhei trung thung thya hei zhang strya ghay traia whei sheight ', 1),
(62, '111', '111', 'comic-graphic', '', '111', 1),
(63, 'nghon chay nghai traia ', 'chyo thing whinh ', 'drama', NULL, 'sher tung tieu whyo whuyen hung nghang chon breight giaia thang nghang traia hai gheight ', 1),
(64, 'thai sher stron shon ', 'brung giung thuyen ', 'action-adventure', NULL, 'chay trung tyo chuyen thing hya giieu shang whyo gheight tai thay ghyo ngang whieu ', 1),
(65, 'strya whieu chei strya ', 'trinh whyo thinh ', 'comic-graphic', NULL, 'zhieu whya giya chei hinh nhon zhya whang whang brei zhaia nher straia zhei trya ', 1),
(66, 'nghinh hung nging ghyo ', 'thya trya giang ', 'classic', NULL, 'brer strung zhaia shinh strer chung tang bron hay giinh zhang tya nginh chei trai ', 1),
(67, 'shon hing thon brer ', 'shya whya whon ', 'classic', NULL, 'whing bring thya thay strer thai trieu gher cher nghaia ghang nhon ghon tya tray ', 1),
(68, 'cheight shay nhon tung ', 'tei giung struyen ', 'crime-detective', NULL, 'zhai zhei nhing stryo brer whya tang nghing shya shya nger nhya nhay cheight zhya ', 1),
(69, 'nher ghuyen ghai ghay ', 'ghay ghing whon ', 'crime-detective', NULL, 'zhay zher giai giaia ton strai shei whaia ngya nghai trinh ngher hung stron brya ', 1),
(70, 'whon whei giya ghieu ', 'thuyen tray hieu ', 'drama', NULL, 'hinh bron giuyen ghuyen gher haia stray shing ting bryo trya ghang giing nghei ther ', 1),
(71, 'struyen haia gier nhya ', 'stron giei tang ', 'classic', NULL, 'hung bring nher ting traia chay nghei huyen tay ngei trung taia giei nhay thuyen ', 1);

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
  `password` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `ticket_history` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `role`, `status`, `firstname`, `lastname`, `username`, `password`, `email`, `address`, `phone`, `ticket_history`) VALUES
(147, 1, 0, 'overlord', '', 'admin', 'admin', '', '', '', ''),
(152, 0, 1, 'haia_thuyen_', 'chyo_nhing_', 'ngang_giei_', '123', '', '', '', ''),
(153, 0, 1, 'nger_giay_', 'ghai_zhyo_', 'sher_chon_', '123', '', '', '', ''),
(154, 0, 1, 'nghieu_nghinh_', 'ghuyen_nghing_', 'strei_ching_', '123', '', '', '', ''),
(155, 0, 1, 'gion_bron_', 'shuyen_nhing_', 'tring_ghon_', '123', '', '', '', ''),
(156, 0, 1, 'giai_streight_', 'whang_ghon_', 'giyo_truyen_', '123', '', '', '', ''),
(157, 0, 0, 'nhinh_whuyen_', 'brinh_trinh_', 'ieu_ton_', '123', '', '', '', ''),
(158, 0, 0, 'ei_brang_', 'bryo_ghieu_', 'uyen_treight_', '123', '', '', '', ''),
(159, 0, 0, 'nghei_zhang_', 'nghing_ei_', 'nhinh_shuyen_', '123', '', '', '', ''),
(160, 0, 1, 'sher_giieu_', 'zhay_whon_', 'treight_brya_', '123', '', '', '', ''),
(161, 0, 0, 'chieu_hya_', 'ngang_ghay_', 'brei_whai_', '123', '', '', '', ''),
(163, 0, 0, 'tron_ghya_', 'inh_brung_', 'shon_zhinh_', '123', '', '', '', ''),
(165, 0, 0, 'ngay_brer_', 'zhei_hinh_', 'height_giinh_', '123', '', '', '', ''),
(166, 0, 0, 'chaia_strinh_', 'ghon_chinh_', 'ching_giya_', '123', '', '', '', ''),
(167, 1, 0, 'a', 'a', 'a', 'a', '', '', '', ''),
(168, 0, 1, 'height_wher_', 'thinh_zhuyen_', 'giei_strieu_', '123', '', '', '', ''),
(169, 0, 0, 'tung', 'nguyen', 'tung', '123', '', '', '', ''),
(170, 0, 0, 'firstname', 'lastname', 'username', 'password', 'email', 'address', '123', NULL),
(171, 0, 0, 'xxx', 'xxx', 'xxx', 'xxx', 'xxx@gmail.com', 'xxx', 'xxx', NULL),
(172, 0, 0, 'shyo_zhung_', 'chaia_brieu_', 'thung_huyen_', '123', 'hinh_huyen_nher_@gmail.com', 'trei_nher_shon_giei_cheight_', '0985120096', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

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
