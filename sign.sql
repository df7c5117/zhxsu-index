SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `susage_oa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `susage_oa`;

CREATE TABLE IF NOT EXISTS `sign_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Dep` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户所在部门',
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='报名 - 后台用户数据表';

INSERT INTO `sign_admin` (`AdminID`, `Username`, `Password`, `Dep`) VALUES
(1, '37thDNB', '076ea832a66b4b75c668d8d722354ee4', '电脑部');

CREATE TABLE IF NOT EXISTS `sign_studata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuName` varchar(4) COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `stuClass` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT '班别（一至二位数字）',
  `stuSex` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '性别',
  `stuPhone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机',
  `stuMail` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `stuQQ` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'QQ',
  `stuWeChat` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '微信号',
  `SignDep` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '报名部门，JSON格式',
  `Contact` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言',
  `SignTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '报名时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='报名 - 学生报名数据';

INSERT INTO `sign_studata` (`id`, `stuName`, `stuClass`, `stuSex`, `stuPhone`, `stuMail`, `stuQQ`, `stuWeChat`, `SignDep`, `Contact`, `SignTime`) VALUES
(1, '小生蚝', '5', '男', '13318707999', '10000@test.com', '10000', 'wechat', '["","电脑部"]', 'contact', '2016-07-11 03:47:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

