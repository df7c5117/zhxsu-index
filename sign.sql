SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `susage_oa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `susage_oa`;

CREATE TABLE `sign_admin` (
  `AdminID` int(11) NOT NULL,
  `Username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Dep` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户所在部门'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sign_admin` (`AdminID`, `Username`, `Password`, `Dep`) VALUES
(1, '37thDNB', '076ea832a66b4b75c668d8d722354ee4', '电脑部');

CREATE TABLE `sign_studata` (
  `id` int(11) NOT NULL,
  `stuName` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `stuClass` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `stuSex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `stuPhone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `stuMail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stuQQ` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stuWeChat` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `SignDep` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Contact` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `SignTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `sign_admin`
  ADD PRIMARY KEY (`AdminID`);

ALTER TABLE `sign_studata`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `sign_admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `sign_studata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
