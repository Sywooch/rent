-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2015 at 09:49 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `commerce`
--

CREATE TABLE IF NOT EXISTS `commerce` (
  `CommerceId` int(50) NOT NULL AUTO_INCREMENT,
  `CommerceType` varchar(255) COLLATE utf8_bin NOT NULL,
  `CommerceAction` varchar(255) COLLATE utf8_bin NOT NULL,
  `CommerceCity` varchar(255) COLLATE utf8_bin NOT NULL,
  `CommerceRegionId` int(255) NOT NULL,
  `CommerceClass` int(50) NOT NULL,
  `CommerceArea` int(50) NOT NULL,
  `CommerceSubway` int(50) NOT NULL,
  `CommercePrice` int(50) NOT NULL,
  PRIMARY KEY (`CommerceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Dumping data for table `commerce`
--

INSERT INTO `commerce` (`CommerceId`, `CommerceType`, `CommerceAction`, `CommerceCity`, `CommerceRegionId`, `CommerceClass`, `CommerceArea`, `CommerceSubway`, `CommercePrice`) VALUES
(1, 'ОФИС', 'ПРОДАЖА', 'МОСКВА', 1, 2, 1204, 1, 82000),
(2, 'ОФИС', 'ПРОДАЖА', 'МОСКВА', 1, 1, 167, 3, 115000),
(3, 'ОСОБНЯК', 'ПРОДАЖА', 'ХИМКИ', 2, 0, 3953, 5, 249000),
(4, 'ОСОБНЯК', 'ПРОДАЖА', 'ВОРОНЕЖ', 3, 0, 680, 6, 320000),
(5, 'ТОРГОВОЕ', 'ПРОДАЖА', 'ТВЕРЬ', 4, 0, 4500, 0, 35000),
(6, 'ТОРГОВОЕ', 'ПРОДАЖА', 'МОСКВА', 1, 0, 222, 0, 70000),
(7, 'БИЗНЕС', 'ПРОДАЖА', 'ЗЕЛЕНОГРАД', 2, 0, 288, 0, 103000),
(8, 'БИЗНЕС', 'ПРОДАЖА', 'МОСКВА', 1, 0, 737, 0, 283000),
(9, 'СКЛАД', 'ПРОДАЖА', 'МОСКВА', 1, 0, 1270, 0, 50000),
(10, 'СКЛАД', 'ПРОДАЖА', 'ТВЕРЬ', 4, 0, 3260, 0, 69000),
(11, 'ОФИС', 'АРЕНДА', 'МОСКВА', 1, 3, 1775, 5, 5135),
(12, 'ОФИС', 'АРЕНДА', 'МОСКВА', 1, 4, 251, 8, 5500),
(13, 'ОФИС', 'АРЕНДА', 'ХИМКИ', 2, 1, 2016, 6, 75000),
(14, 'ОФИС', 'АРЕНДА', 'ОДИНЦОВО', 2, 2, 100, 7, 9200),
(15, 'ОСОБНЯК', 'АРЕНДА', 'МОСКВА', 1, 0, 664, 2, 14000),
(16, 'ОСОБНЯК', 'АРЕНДА', 'МОСКВА', 1, 0, 118, 3, 25368),
(17, 'ТОРГОВОЕ', 'АРЕНДА', 'НАХАБИНО', 2, 0, 100, 8, 8400),
(18, 'ТОРГОВОЕ', 'АРЕНДА', 'РЕУТОВ', 2, 0, 20, 5, 9700),
(19, 'ТОРГОВОЕ', 'АРЕНДА', 'МОСКВА', 1, 0, 88, 2, 14000),
(20, 'ТОРГОВОЕ', 'АРЕНДА', 'МОСКВА', 1, 0, 185, 9, 14300);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DepartmentId` int(50) NOT NULL AUTO_INCREMENT,
  `DepartmentIndex` int(50) NOT NULL,
  `DepartmentTitle` varchar(255) COLLATE utf8_bin NOT NULL,
  `DepartmentUrl` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`DepartmentId`),
  UNIQUE KEY `DepartmentIndex` (`DepartmentIndex`),
  UNIQUE KEY `DepartmentUrl` (`DepartmentUrl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentId`, `DepartmentIndex`, `DepartmentTitle`, `DepartmentUrl`) VALUES
(1, 1, 'Академический', 'akademicheskiy'),
(2, 2, 'Алексеевский', 'alekseyevskiy'),
(3, 3, 'Алтуфьевский', 'altufievskiy'),
(4, 4, 'Арбат', 'arbat'),
(5, 5, 'Аэропорт', 'aeroport'),
(6, 6, 'Бабушкинский', 'babushkinskiy');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `DistrictId` int(50) NOT NULL AUTO_INCREMENT,
  `DistrictIndex` int(50) NOT NULL,
  `DistrictTitle` varchar(255) COLLATE utf8_bin NOT NULL,
  `DistrictUrl` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`DistrictId`),
  UNIQUE KEY `DistrictIndex` (`DistrictIndex`),
  UNIQUE KEY `DistrictUrl` (`DistrictUrl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`DistrictId`, `DistrictIndex`, `DistrictTitle`, `DistrictUrl`) VALUES
(1, 1, 'Центральный', 'centralnyi'),
(2, 2, 'Северный', 'severnyi'),
(3, 3, 'Восточный', 'vostochnyi'),
(4, 4, 'Южный', 'yuzhnyi'),
(5, 5, 'Западный', 'zapadnyi'),
(6, 6, 'Троицкий', 'troitskiy');

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE IF NOT EXISTS `flat` (
  `FlatId` int(50) NOT NULL AUTO_INCREMENT,
  `FlatSection` varchar(255) COLLATE utf8_bin NOT NULL,
  `FlatType` varchar(255) COLLATE utf8_bin NOT NULL,
  `FlatAction` varchar(255) COLLATE utf8_bin NOT NULL,
  `FlatFrontImage` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `FlatName` varchar(255) COLLATE utf8_bin NOT NULL,
  `FlatAddress` varchar(255) COLLATE utf8_bin NOT NULL,
  `FlatCity` varchar(255) COLLATE utf8_bin NOT NULL,
  `FlatRoomNumber` int(50) NOT NULL,
  `FlatRoomArea` int(50) NOT NULL,
  `FlatArea` int(50) NOT NULL,
  `FlatPrice` int(50) NOT NULL,
  `FlatTotalPrice` int(50) NOT NULL,
  `FlatSubway` int(50) NOT NULL,
  `FlatDepartment` int(50) NOT NULL,
  `FlatDistrict` int(50) NOT NULL,
  `FlatStreet` int(50) NOT NULL,
  PRIMARY KEY (`FlatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=64 ;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`FlatId`, `FlatSection`, `FlatType`, `FlatAction`, `FlatFrontImage`, `FlatName`, `FlatAddress`, `FlatCity`, `FlatRoomNumber`, `FlatRoomArea`, `FlatArea`, `FlatPrice`, `FlatTotalPrice`, `FlatSubway`, `FlatDepartment`, `FlatDistrict`, `FlatStreet`) VALUES
(1, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', '', 'ЖК "Хорошевский"', 'ул. Хорошевская, д. 17', 'МОСКВА', 1, 0, 65, 160000, 0, 0, 0, 0, 0),
(2, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Ленинградский"', 'ул. 9 Мая, д. 98', 'МОСКВА', 1, 0, 49, 79000, 0, 0, 0, 0, 0),
(3, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Лефорт"', 'пер. Солдатский, д. 26', 'МОСКВА', 1, 0, 61, 149000, 0, 0, 0, 0, 0),
(4, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '"Мегаполис"', 'ул. Салтыковская, д. 8', 'МОСКВА', 1, 0, 58, 90000, 0, 0, 0, 0, 0),
(5, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '"Царицыно-2"', 'ул. Элеваторная, д. 11', 'МОСКВА', 1, 0, 54, 119000, 0, 0, 0, 0, 0),
(6, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Дом на Самаринской"', 'ул. 2-я Самаринская, д. 4', 'МОСКВА', 1, 0, 68, 219000, 0, 0, 0, 0, 0),
(7, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Богородский"', 'б-р. Маршала Рокосовского, д. 5-8', 'МОСКВА', 1, 0, 64, 183500, 0, 0, 0, 0, 0),
(8, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Дубровская Слобода"', 'ул. 1-я Машиностроения, д. 6-14', 'МОСКВА', 2, 0, 85, 201500, 0, 0, 0, 0, 0),
(9, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Старт-Формат"', 'ул. Элеваторная, д. 48', 'МОСКВА', 2, 0, 79, 116000, 0, 0, 0, 0, 0),
(10, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "07"', 'ул. Озёрная, д. 8', 'МОСКВА', 2, 0, 87, 163000, 0, 0, 0, 0, 0),
(11, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Москфильмовский"', 'ул. Москфильмовская, д. 1', 'МОСКВА', 3, 0, 105, 237000, 0, 0, 0, 0, 0),
(12, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Новогиреевская, д. 1', 'НОВОГИРЕЕВО', 1, 0, 47, 113000, 0, 0, 0, 0, 0),
(13, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Солнечная, д. 5А', 'БУТОВО', 2, 0, 59, 108000, 0, 0, 0, 0, 0),
(14, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Мытищи"', 'Осташковское шоссе, д. 2', 'МЫТИЩИ', 3, 0, 78, 62000, 0, 0, 0, 0, 0),
(15, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Новокосино-2"', 'ул. Челомея, д. 10', 'НОВОКОСИНО', 2, 0, 75, 96000, 0, 0, 0, 0, 0),
(16, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Планерный"', 'ул. Молодежная, д. 9', 'ХИМКИ', 1, 0, 48, 113500, 0, 0, 0, 0, 0),
(17, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Сказка"', 'Новорижское шоссе, 5', 'НОВОРИЖСКОЕ', 1, 0, 43, 69000, 0, 0, 0, 0, 0),
(18, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Маршала Жукова, д. 78', 'МОСКВА', 3, 0, 157, 0, 36000000, 1, 1, 1, 1),
(19, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'Проспект Мира, дом 33, корпус 1', 'МОСКВА', 5, 0, 230, 0, 120000000, 2, 1, 1, 2),
(20, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул.Академика Анохина д.9', 'МОСКВА', 2, 0, 54, 0, 15000000, 3, 2, 3, 4),
(21, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. 1-я Владимирская, д.19/1', 'МОСКВА', 3, 0, 85, 0, 12500000, 4, 3, 4, 1),
(22, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', 'Сумской проезд д. 29', 'МОСКВА', 2, 15, 55, 0, 2900000, 5, 5, 2, 2),
(23, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', 'ул. Уржумская д.3 к.1', 'МОСКВА', 3, 19, 80, 0, 3800000, 6, 2, 3, 3),
(24, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ХИМКИ', 2, 0, 70, 0, 7600000, 0, 0, 0, 0),
(25, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'БАЛАШИХА', 1, 0, 51, 0, 3700000, 0, 0, 0, 0),
(26, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ПОДОЛЬСК', 2, 0, 42, 0, 3300000, 10, 0, 0, 0),
(27, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'СЕЛЯТИНО', 3, 0, 77, 0, 7300000, 11, 0, 0, 0),
(28, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'КЛИМОВСК', 2, 0, 68, 0, 4850000, 9, 0, 0, 0),
(29, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'КРАСНОГОРСК', 1, 0, 30, 0, 4600000, 8, 0, 0, 0),
(30, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'АПРЕЛЕВКА', 3, 0, 91, 0, 8500000, 7, 0, 0, 0),
(31, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ЧЕХОВ', 2, 0, 45, 0, 3600000, 6, 0, 0, 0),
(32, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ОДИНЦОВО', 2, 0, 67, 0, 11220000, 5, 0, 0, 0),
(33, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'КРАСНОГОРСК', 1, 0, 32, 0, 4500000, 4, 0, 0, 0),
(34, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'РАМЕНСКОЕ', 1, 0, 38, 0, 3400000, 3, 0, 0, 0),
(35, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ДЗЕРЖИНСКИЙ', 1, 0, 34, 0, 4500000, 2, 0, 0, 0),
(36, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', '', 'ХИМКИ', 4, 20, 95, 0, 1750000, 2, 0, 0, 0),
(37, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', '', 'ЩЕРБИНКА', 3, 21, 65, 0, 2750000, 1, 0, 0, 0),
(38, 'ВТОРИЧНОЕ', 'ДОЛЯ', 'ПРОДАЖА', NULL, '', '', 'МОСКВА', 2, 14, 41, 0, 3500000, 8, 2, 4, 1),
(39, 'ВТОРИЧНОЕ', 'ДОЛЯ', 'ПРОДАЖА', NULL, '', '', 'ХИМКИ', 3, 17, 59, 0, 2700000, 10, 0, 0, 0),
(40, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'МОСКВА', 1, 0, 52, 0, 9450000, 5, 2, 2, 2),
(41, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'МОСКВА', 1, 0, 37, 0, 7500000, 4, 3, 1, 4),
(42, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 2, 0, 67, 0, 37000, 1, 3, 3, 3),
(43, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 2, 0, 52, 0, 80000, 2, 6, 2, 1),
(44, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 2, 0, 105, 0, 120000, 3, 6, 5, 5),
(45, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 3, 0, 130, 0, 250000, 4, 4, 2, 1),
(46, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 2, 0, 55, 0, 100000, 6, 4, 4, 4),
(47, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 4, 0, 220, 0, 240000, 8, 2, 2, 2),
(48, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 3, 0, 105, 0, 110000, 9, 3, 1, 1),
(49, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 2, 0, 51, 0, 31000, 11, 2, 4, 4),
(50, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 1, 0, 36, 0, 40000, 1, 2, 5, 6),
(51, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 4, 0, 81, 0, 192000, 5, 1, 5, 1),
(52, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'КРАСНОГОРСК', 3, 0, 74, 0, 60000, 2, 0, 0, 0),
(53, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'РЕУТОВ', 3, 0, 95, 0, 55000, 2, 0, 0, 0),
(54, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ХИМКИ', 1, 0, 60, 0, 40000, 3, 0, 0, 0),
(55, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ЛЮБЕРЦЫ', 1, 0, 54, 0, 32000, 8, 0, 0, 0),
(56, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ЩЕЛКОВО', 1, 0, 30, 0, 25000, 9, 0, 0, 0),
(57, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'БАЛАШИХА', 3, 0, 70, 0, 40000, 10, 0, 0, 0),
(58, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ХИМКИ', 2, 0, 55, 0, 40000, 6, 0, 0, 0),
(59, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ХИМКИ', 3, 0, 75, 0, 45000, 6, 0, 0, 0),
(60, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ХИМКИ', 2, 0, 70, 0, 40000, 6, 0, 0, 0),
(61, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ОДИНЦОВО', 3, 0, 80, 0, 50000, 4, 0, 0, 0),
(62, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'МОСКВА', 5, 0, 105, 160000, 0, 5, 0, 0, 0),
(63, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ХИМКИ', 4, 0, 88, 160000, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE IF NOT EXISTS `house` (
  `HouseId` int(50) NOT NULL AUTO_INCREMENT,
  `HouseType` varchar(255) COLLATE utf8_bin NOT NULL,
  `HouseAction` varchar(255) COLLATE utf8_bin NOT NULL,
  `HouseDirectionId` int(50) NOT NULL,
  `HouseDistance` int(50) NOT NULL,
  `HouseArea` int(50) DEFAULT NULL,
  `HousePlotArea` int(50) DEFAULT NULL,
  `HousePrice` int(50) NOT NULL,
  PRIMARY KEY (`HouseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`HouseId`, `HouseType`, `HouseAction`, `HouseDirectionId`, `HouseDistance`, `HouseArea`, `HousePlotArea`, `HousePrice`) VALUES
(1, 'ДОМ', 'ПРОДАЖА', 1, 50, 170, 6, 3900),
(2, 'ДОМ', 'ПРОДАЖА', 2, 34, 210, 8, 5500),
(3, 'ДОМ', 'ПРОДАЖА', 2, 35, 190, 7, 4800),
(4, 'ДОМ', 'ПРОДАЖА', 3, 56, 140, 4, 2900),
(5, 'ДОМ', 'ПРОДАЖА', 6, 65, 180, 5, 3400),
(6, 'ДОМ', 'ПРОДАЖА', 8, 40, 200, 6, 4600),
(7, 'УЧАСТОК', 'ПРОДАЖА', 2, 40, NULL, 6, 400),
(8, 'УЧАСТОК', 'ПРОДАЖА', 3, 55, NULL, 8, 750),
(9, 'ДОМ', 'АРЕНДА', 4, 35, 160, 6, 20000),
(10, 'ДОМ', 'АРЕНДА', 5, 25, 210, 8, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `street`
--

CREATE TABLE IF NOT EXISTS `street` (
  `StreetId` int(50) NOT NULL AUTO_INCREMENT,
  `StreetIndex` int(50) NOT NULL,
  `StreetTitle` varchar(255) COLLATE utf8_bin NOT NULL,
  `StreetUrl` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`StreetId`),
  UNIQUE KEY `StreetIndex` (`StreetIndex`),
  UNIQUE KEY `StreetUrl` (`StreetUrl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `street`
--

INSERT INTO `street` (`StreetId`, `StreetIndex`, `StreetTitle`, `StreetUrl`) VALUES
(1, 1, 'Абельмановская Застава', 'abelmanovskaya-zastava'),
(2, 2, 'Абельмановская', 'abelmanovskaya'),
(3, 3, 'Абрамцевская просека', 'abramtsevskaya-proceka'),
(4, 4, 'Абрикосовский переулок', 'abrokisovskiy-pereulok'),
(5, 5, 'Авангардная', 'avangardnaya'),
(6, 6, 'Авиаконструктора Микояна', 'aviakonstruktora-mikoyana');

-- --------------------------------------------------------

--
-- Table structure for table `subway`
--

CREATE TABLE IF NOT EXISTS `subway` (
  `SubwayId` int(50) NOT NULL AUTO_INCREMENT,
  `SubwayIndex` int(50) NOT NULL,
  `SubwayTitle` varchar(255) COLLATE utf8_bin NOT NULL,
  `SubwayUrl` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`SubwayId`),
  UNIQUE KEY `SubwayIndex` (`SubwayIndex`),
  UNIQUE KEY `SubwayUrl` (`SubwayUrl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `subway`
--

INSERT INTO `subway` (`SubwayId`, `SubwayIndex`, `SubwayTitle`, `SubwayUrl`) VALUES
(1, 1, 'Авиамоторная', 'aviamotornaya'),
(2, 2, 'Автозаводская', 'avtozavodskaya'),
(3, 3, 'Академическая', 'akademicheskaya'),
(4, 4, 'Александровский сад', 'aleksandrovskiyi_sad'),
(5, 5, 'Алексеевская', 'alekseyevskaya'),
(6, 6, 'Алма-Атинская', 'alma_atinskaya'),
(7, 7, 'Алтуфьево', 'altufievo'),
(8, 8, 'Аннино', 'annino'),
(9, 9, 'Арбатская', 'arbatskaya'),
(10, 10, 'Аэропорт', 'aeroport'),
(11, 11, 'Бабушкинская', 'babushkinskaya'),
(12, 12, 'Багратионовская', 'bagrationovskaya');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
