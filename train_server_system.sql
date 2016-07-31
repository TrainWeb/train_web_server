-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-07-29 05:27:04
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `train_server_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- 表的结构 `commodity`
--

CREATE TABLE IF NOT EXISTS `commodity` (
  `Comm_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Comm_Name` varchar(50) NOT NULL,
  `Comm_Picture_Url` varchar(180) NOT NULL DEFAULT 'commodity/img/default.png',
  `Comm_Price` decimal(8,2) NOT NULL,
  `Comm_Type` int(11) NOT NULL DEFAULT '0',
  `Comm_Descr` text NOT NULL,
  `Comm_Counts` int(11) NOT NULL DEFAULT '0',
  `Comm_Discounted` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`Comm_ID`),
  UNIQUE KEY `Comm_ID` (`Comm_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `commodity`
--

INSERT INTO `commodity` (`Comm_ID`, `Comm_Name`, `Comm_Picture_Url`, `Comm_Price`, `Comm_Type`, `Comm_Descr`, `Comm_Counts`, `Comm_Discounted`) VALUES
(1, '方便面', '/web_trainServer/Uploads/food_img/1469324172_1686399948.jpg', '10.00', 1, '收到', 10, 10),
(2, '大便', '/web_trainServer/Uploads/food_img/1469370996_702394217.jpg', '10.00', 1, '10', 10, 10),
(3, '发送到', '/web_trainServer/Uploads/comm_img/1469432721_22222983.jpg', '123.00', 2, '1234134', 123, 2),
(4, '24234', '/web_trainServer/Uploads/food_img/1469610101_1214927724.jpg', '243.00', 1, '234', 234, 2);

-- --------------------------------------------------------

--
-- 表的结构 `comm_comment`
--

CREATE TABLE IF NOT EXISTS `comm_comment` (
  `Comm_Comment_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Comm_ID` bigint(20) NOT NULL,
  `Comment_Text` text NOT NULL,
  PRIMARY KEY (`Comm_Comment_ID`),
  UNIQUE KEY `Comm_Comment_ID` (`Comm_Comment_ID`),
  KEY `Comm_Comment_Pk` (`Comm_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comm_consume_record`
--

CREATE TABLE IF NOT EXISTS `comm_consume_record` (
  `Record_ID` varchar(50) NOT NULL,
  `Comm_ID` bigint(20) NOT NULL,
  PRIMARY KEY (`Record_ID`),
  UNIQUE KEY `Record_ID` (`Record_ID`),
  UNIQUE KEY `Comm_ID` (`Comm_ID`),
  KEY `Comm_Record_Pk_Re` (`Record_ID`),
  KEY `Comm_Record_Pk_Co` (`Comm_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `consume_record`
--

CREATE TABLE IF NOT EXISTS `consume_record` (
  `Record_ID` varchar(50) NOT NULL,
  `User_ID` varchar(18) NOT NULL,
  `Consume_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Consume_Type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Record_ID`),
  UNIQUE KEY `Record_ID` (`Record_ID`),
  UNIQUE KEY `User_ID` (`User_ID`),
  KEY `Consume_Record_Pk` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `F_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `F_Name` varchar(100) NOT NULL,
  `F_Type` varchar(100) NOT NULL,
  `F_Year` year(4) DEFAULT NULL,
  `F_Point` float NOT NULL,
  `F_Introduction` text NOT NULL,
  `F_Source_Url` varchar(100) NOT NULL,
  `F_WPrice` float NOT NULL DEFAULT '0',
  `F_Image_Url` varchar(100) NOT NULL DEFAULT 'film/img/default.png',
  PRIMARY KEY (`F_ID`),
  UNIQUE KEY `F_ID` (`F_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `film_comment`
--

CREATE TABLE IF NOT EXISTS `film_comment` (
  `Film_Comment_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Film_ID` bigint(20) NOT NULL,
  `Comment_Text` text NOT NULL,
  PRIMARY KEY (`Film_Comment_ID`),
  UNIQUE KEY `Film_Comment_ID` (`Film_Comment_ID`),
  KEY `Film_Comment_Pk` (`Film_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `film_consume_record`
--

CREATE TABLE IF NOT EXISTS `film_consume_record` (
  `Record_ID` varchar(50) NOT NULL,
  `F_ID` bigint(20) NOT NULL,
  PRIMARY KEY (`Record_ID`),
  UNIQUE KEY `Record_ID` (`Record_ID`),
  KEY `Film_Record_Pk_Re` (`Record_ID`),
  KEY `Film_Record_Pk_Co` (`F_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `points_reward`
--

CREATE TABLE IF NOT EXISTS `points_reward` (
  `ReWard_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Reward_Name` varchar(50) NOT NULL,
  `Reward_Picture` varchar(100) NOT NULL DEFAULT 'reward/img/default.png',
  `Need_Points` int(11) NOT NULL DEFAULT '0',
  `TIME_OUT` timestamp NOT NULL,
  PRIMARY KEY (`ReWard_ID`),
  UNIQUE KEY `ReWard_ID` (`ReWard_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `points_reward`
--

INSERT INTO `points_reward` (`ReWard_ID`, `Reward_Name`, `Reward_Picture`, `Need_Points`, `TIME_OUT`) VALUES
(3, '充电宝', '/web_trainServer/Uploads/score_img/1469497030_1258595439.jpg', 10000, '2018-05-04 21:05:05'),
(4, 'sdf', '/web_trainServer/Uploads/score_img/1469592125_1314939729.jpg', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `scenic`
--

CREATE TABLE IF NOT EXISTS `scenic` (
  `SCE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SCE_NAME` varchar(50) NOT NULL,
  `SCE_Address` varchar(100) NOT NULL,
  `SCE_Picture` varchar(150) NOT NULL DEFAULT 'scenic/img/default.png',
  `SCE_Router` varchar(150) NOT NULL DEFAULT 'scenic/router/default.png',
  `Description` text NOT NULL,
  PRIMARY KEY (`SCE_ID`),
  UNIQUE KEY `SCE_ID` (`SCE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `scenic`
--

INSERT INTO `scenic` (`SCE_ID`, `SCE_NAME`, `SCE_Address`, `SCE_Picture`, `SCE_Router`, `Description`) VALUES
(7, '华山', '华山', '/web_trainServer/Uploads/sce_img/1469707948_1778173951.jpg', 'scenic/router/default.png', '213123'),
(8, '华清池', '啊啊啊', '/web_trainServer/Uploads/sce_img/1469708793_1160084705.jpg', 'scenic/router/default.png', '刀锋');

-- --------------------------------------------------------

--
-- 表的结构 `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `S_Name` varchar(50) NOT NULL,
  `S_Province` varchar(50) NOT NULL,
  PRIMARY KEY (`S_ID`),
  UNIQUE KEY `S_ID` (`S_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `station`
--

INSERT INTO `station` (`S_ID`, `S_Name`, `S_Province`) VALUES
(3, '西安', '陕西'),
(4, '太原', '山西');

-- --------------------------------------------------------

--
-- 表的结构 `station_scenic`
--

CREATE TABLE IF NOT EXISTS `station_scenic` (
  `SS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Station_ID` int(11) NOT NULL,
  `Scenic_ID` int(11) NOT NULL,
  PRIMARY KEY (`SS_ID`),
  UNIQUE KEY `SS_ID` (`SS_ID`),
  KEY `SS_STA_PK` (`Station_ID`),
  KEY `SS_SCE_PK` (`Scenic_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `station_scenic`
--

INSERT INTO `station_scenic` (`SS_ID`, `Station_ID`, `Scenic_ID`) VALUES
(2, 3, 7),
(3, 4, 8);

-- --------------------------------------------------------

--
-- 表的结构 `ticket_record`
--

CREATE TABLE IF NOT EXISTS `ticket_record` (
  `User_ID` varchar(18) NOT NULL,
  `Trian_ID` varchar(20) NOT NULL,
  `Start_Station` int(11) NOT NULL,
  `End_Staton` int(11) NOT NULL,
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `User_ID` (`User_ID`),
  KEY `Ticket_Record_Pk_User` (`User_ID`),
  KEY `Ticket_Record_Pk_Trian` (`Trian_ID`),
  KEY `Ticket_Record_Pk_Start` (`Start_Station`),
  KEY `Ticket_Record_Pk_End` (`End_Staton`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `train`
--

CREATE TABLE IF NOT EXISTS `train` (
  `Trian_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`Trian_ID`),
  UNIQUE KEY `Trian_ID` (`Trian_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `train`
--

INSERT INTO `train` (`Trian_ID`) VALUES
('k11111'),
('k123');

-- --------------------------------------------------------

--
-- 表的结构 `train_router`
--

CREATE TABLE IF NOT EXISTS `train_router` (
  `Trian_ID` varchar(20) NOT NULL,
  `Leaves_Station` int(11) NOT NULL,
  PRIMARY KEY (`Trian_ID`),
  UNIQUE KEY `Trian_ID` (`Trian_ID`),
  KEY `Train_Router_Train` (`Trian_ID`),
  KEY `Train_Router_Leaves` (`Leaves_Station`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `train_router`
--

INSERT INTO `train_router` (`Trian_ID`, `Leaves_Station`) VALUES
('k11111', 3),
('k123', 3);

-- --------------------------------------------------------

--
-- 表的结构 `train_router_time`
--

CREATE TABLE IF NOT EXISTS `train_router_time` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Trian_ID` varchar(20) NOT NULL,
  `Pre_Station` int(11) DEFAULT NULL,
  `Station_ID` int(11) NOT NULL,
  `Drive_Time` time NOT NULL,
  `Arrival_Time` time NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `Router_Train_pk` (`Trian_ID`),
  KEY `Router_pre_pk` (`Pre_Station`),
  KEY `Router_current_pk` (`Station_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `train_router_time`
--

INSERT INTO `train_router_time` (`ID`, `Trian_ID`, `Pre_Station`, `Station_ID`, `Drive_Time`, `Arrival_Time`) VALUES
(21, 'k123', NULL, 3, '12:23:00', '12:23:00'),
(22, 'k123', 3, 4, '16:00:00', '16:00:00'),
(26, 'k11111', NULL, 3, '12:23:00', '12:23:00'),
(27, 'k11111', 3, 4, '16:00:00', '16:00:00'),
(28, 'k11111', 4, 3, '14:10:00', '14:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` varchar(18) NOT NULL,
  `PassWord` varchar(18) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `PhoneNum` varchar(11) NOT NULL,
  `E_mail` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `User_ID` varchar(18) NOT NULL,
  `PassWord` varchar(18) NOT NULL,
  `Balance` varchar(20) NOT NULL DEFAULT '0.00',
  `Points` decimal(20,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `User_ID` (`User_ID`),
  KEY `User_Acount_pk` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 限制导出的表
--

--
-- 限制表 `comm_comment`
--
ALTER TABLE `comm_comment`
  ADD CONSTRAINT `comm_comment_ibfk_1` FOREIGN KEY (`Comm_ID`) REFERENCES `commodity` (`Comm_ID`);

--
-- 限制表 `comm_consume_record`
--
ALTER TABLE `comm_consume_record`
  ADD CONSTRAINT `comm_consume_record_ibfk_1` FOREIGN KEY (`Comm_ID`) REFERENCES `commodity` (`Comm_ID`),
  ADD CONSTRAINT `Comm_Record_Pk_Re` FOREIGN KEY (`Record_ID`) REFERENCES `consume_record` (`Record_ID`);

--
-- 限制表 `consume_record`
--
ALTER TABLE `consume_record`
  ADD CONSTRAINT `Consume_Record_Pk` FOREIGN KEY (`User_ID`) REFERENCES `user_account` (`User_ID`);

--
-- 限制表 `film_comment`
--
ALTER TABLE `film_comment`
  ADD CONSTRAINT `Film_Comment_Pk` FOREIGN KEY (`Film_ID`) REFERENCES `film` (`F_ID`);

--
-- 限制表 `film_consume_record`
--
ALTER TABLE `film_consume_record`
  ADD CONSTRAINT `Film_Record_Pk_Co` FOREIGN KEY (`F_ID`) REFERENCES `film` (`F_ID`),
  ADD CONSTRAINT `Film_Record_Pk_Re` FOREIGN KEY (`Record_ID`) REFERENCES `consume_record` (`Record_ID`);

--
-- 限制表 `station_scenic`
--
ALTER TABLE `station_scenic`
  ADD CONSTRAINT `SS_SCE_PK` FOREIGN KEY (`Scenic_ID`) REFERENCES `scenic` (`SCE_ID`),
  ADD CONSTRAINT `SS_STA_PK` FOREIGN KEY (`Station_ID`) REFERENCES `station` (`S_ID`);

--
-- 限制表 `ticket_record`
--
ALTER TABLE `ticket_record`
  ADD CONSTRAINT `Ticket_Record_Pk_End` FOREIGN KEY (`End_Staton`) REFERENCES `station` (`S_ID`),
  ADD CONSTRAINT `Ticket_Record_Pk_Start` FOREIGN KEY (`Start_Station`) REFERENCES `station` (`S_ID`),
  ADD CONSTRAINT `Ticket_Record_Pk_Trian` FOREIGN KEY (`Trian_ID`) REFERENCES `train` (`Trian_ID`),
  ADD CONSTRAINT `Ticket_Record_Pk_User` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- 限制表 `train_router`
--
ALTER TABLE `train_router`
  ADD CONSTRAINT `Train_Router_Leaves` FOREIGN KEY (`Leaves_Station`) REFERENCES `station` (`S_ID`),
  ADD CONSTRAINT `Train_Router_Train` FOREIGN KEY (`Trian_ID`) REFERENCES `train` (`Trian_ID`);

--
-- 限制表 `train_router_time`
--
ALTER TABLE `train_router_time`
  ADD CONSTRAINT `Router_current_pk` FOREIGN KEY (`Station_ID`) REFERENCES `station` (`S_ID`),
  ADD CONSTRAINT `Router_pre_pk` FOREIGN KEY (`Pre_Station`) REFERENCES `station` (`S_ID`),
  ADD CONSTRAINT `Router_Train_pk` FOREIGN KEY (`Trian_ID`) REFERENCES `train` (`Trian_ID`);

--
-- 限制表 `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `User_Acount_pk` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
