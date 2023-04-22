-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-04-22 04:00:01
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `money`
--
CREATE DATABASE IF NOT EXISTS `money` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `money`;

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL COMMENT '每一筆帳目的編號',
  `name` varchar(128) NOT NULL COMMENT '帳目的擁有者',
  `date` date NOT NULL COMMENT '新增項目的日期',
  `item` varchar(128) NOT NULL COMMENT '項目',
  `price` int(11) NOT NULL COMMENT '金額',
  `remark` text NOT NULL COMMENT '備註'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `book`
--

INSERT INTO `book` (`id`, `name`, `date`, `item`, `price`, `remark`) VALUES
(3, 'nick', '2023-04-21', '12', 314, '14141'),
(4, 'nick', '2023-04-21', '412421', 4214214, '14214214122');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT '每個使用者的編號',
  `name` varchar(128) NOT NULL COMMENT '使用者名稱',
  `password` varchar(128) NOT NULL COMMENT '使用者密碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'nick', '$2y$10$k28iC3inJY4AwUqRg84WH.lshX4FGJM2Hp46KXpwTe8dL.BCuEnf.'),
(2, '1223', '$2y$10$JIGzBWjEDHxhepsj9VUQpO0p4sLX.CbL4aHjVR2lcl2eMYGwDRMsG');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '每一筆帳目的編號', AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '每個使用者的編號', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
