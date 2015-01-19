-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2015 at 09:57 PM
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
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `CityId` int(50) NOT NULL AUTO_INCREMENT,
  `CityIndex` int(50) NOT NULL,
  `CityTitle` varchar(255) COLLATE utf8_bin NOT NULL,
  `CityUrl` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`CityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=47 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityId`, `CityIndex`, `CityTitle`, `CityUrl`) VALUES
(3, 1, 'Апрелевка', 'aprelevka'),
(4, 2, 'Балашиха', 'balashyha'),
(5, 3, 'Видное', 'vidnoye'),
(6, 4, 'Волоколамск', 'volokolamsk'),
(7, 5, 'Дзержинский', 'dzerzhynskiy'),
(8, 6, 'Дмитров', 'dmitrov'),
(9, 7, 'Долгопрудный', 'dolgoprudnyi'),
(10, 8, 'Домодево', 'domodedovo'),
(11, 9, 'Егорьевск', 'egorievsk'),
(12, 10, 'Железнодорожный', 'zheleznododrozhnyi'),
(13, 11, 'Жуковский', 'zhukovskiy'),
(14, 12, 'Звенигород', 'zvenigorod'),
(15, 13, 'Зеленоград', 'zelenograd'),
(16, 14, 'Ивантеевка', 'ivanteevka'),
(17, 15, 'Истра', 'istra'),
(18, 16, 'Коломна', 'kolomna'),
(19, 17, 'Королев', 'korolev'),
(20, 18, 'Королёв', 'koroliov'),
(21, 19, 'Котельники', 'kotelniki'),
(22, 20, 'Красково', 'kraskovo'),
(23, 21, 'Красногорск', 'krasnogorsk'),
(24, 22, 'Лобня', 'lobnia'),
(25, 23, 'Луковицы', 'lukovitsy'),
(26, 24, 'Лыткарино', 'lytkarino'),
(27, 25, 'Люберцы', 'liubertsy'),
(28, 26, 'Мытищи', 'mytyshchi'),
(29, 27, 'Московский', 'moskovskiy'),
(30, 28, 'Наро-Фоминск', 'naro-fominsk'),
(31, 29, 'Нахабино', 'nahabino'),
(32, 30, 'Немчиновка', 'niemchinovka'),
(33, 31, 'Ногинск', 'noginsk'),
(34, 32, 'Одинцово', 'odintsovo'),
(35, 33, 'Павловский Посад', 'pavlovskiy-posad'),
(36, 34, 'Подольск', 'podolsk'),
(37, 35, 'Протвино', 'protvino'),
(38, 36, 'Пушкино', 'pushkino'),
(39, 39, 'Раменское', 'ramenskoe'),
(40, 40, 'Реутов', 'reutov'),
(41, 41, 'Сергиев Посад', 'sergiyev-posad'),
(42, 42, 'Серпухов', 'serpuhov'),
(43, 43, 'Солнечногорск', 'solnechnogorsk'),
(44, 44, 'Старая Купавна', 'staraya-kupavna'),
(45, 45, 'Фрязино', 'friazino'),
(46, 46, 'Химки', 'himki');

-- --------------------------------------------------------

--
-- Table structure for table `commerce`
--

CREATE TABLE IF NOT EXISTS `commerce` (
  `CommerceId` int(50) NOT NULL AUTO_INCREMENT,
  `CommerceType` varchar(255) COLLATE utf8_bin NOT NULL,
  `CommerceAction` varchar(255) COLLATE utf8_bin NOT NULL,
  `CommerceCity` varchar(255) COLLATE utf8_bin NOT NULL,
  `CommerceCityId` int(50) NOT NULL,
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

INSERT INTO `commerce` (`CommerceId`, `CommerceType`, `CommerceAction`, `CommerceCity`, `CommerceCityId`, `CommerceRegionId`, `CommerceClass`, `CommerceArea`, `CommerceSubway`, `CommercePrice`) VALUES
(1, 'ОФИС', 'ПРОДАЖА', 'МОСКВА', 0, 1, 2, 1204, 1, 82000),
(2, 'ОФИС', 'ПРОДАЖА', 'МОСКВА', 0, 1, 1, 167, 3, 115000),
(3, 'ОСОБНЯК', 'ПРОДАЖА', 'ХИМКИ', 46, 2, 0, 3953, 5, 249000),
(4, 'ОСОБНЯК', 'ПРОДАЖА', 'ВОРОНЕЖ', 0, 3, 0, 680, 6, 320000),
(5, 'ТОРГОВОЕ', 'ПРОДАЖА', 'ТВЕРЬ', 0, 4, 0, 4500, 0, 35000),
(6, 'ТОРГОВОЕ', 'ПРОДАЖА', 'МОСКВА', 0, 1, 0, 222, 6, 70000),
(7, 'БИЗНЕС', 'ПРОДАЖА', 'ЗЕЛЕНОГРАД', 13, 2, 0, 288, 5, 103000),
(8, 'БИЗНЕС', 'ПРОДАЖА', 'МОСКВА', 0, 1, 0, 737, 2, 283000),
(9, 'СКЛАД', 'ПРОДАЖА', 'МОСКВА', 0, 1, 0, 1270, 3, 50000),
(10, 'СКЛАД', 'ПРОДАЖА', 'МОСКВА', 0, 1, 0, 3260, 1, 69000),
(11, 'ОФИС', 'АРЕНДА', 'МОСКВА', 0, 1, 3, 1775, 5, 5135),
(12, 'ОФИС', 'АРЕНДА', 'МОСКВА', 0, 1, 4, 251, 8, 5500),
(13, 'ОФИС', 'АРЕНДА', 'ХИМКИ', 46, 2, 1, 2016, 6, 75000),
(14, 'ОФИС', 'АРЕНДА', 'ОДИНЦОВО', 32, 2, 2, 100, 7, 9200),
(15, 'ОСОБНЯК', 'АРЕНДА', 'МОСКВА', 0, 1, 0, 664, 2, 14000),
(16, 'ОСОБНЯК', 'АРЕНДА', 'МОСКВА', 0, 1, 0, 118, 3, 25368),
(17, 'ТОРГОВОЕ', 'АРЕНДА', 'НАХАБИНО', 29, 2, 0, 100, 8, 8400),
(18, 'ТОРГОВОЕ', 'АРЕНДА', 'РЕУТОВ', 40, 2, 0, 20, 5, 9700),
(19, 'ТОРГОВОЕ', 'АРЕНДА', 'МОСКВА', 0, 1, 0, 88, 2, 14000),
(20, 'ТОРГОВОЕ', 'АРЕНДА', 'МОСКВА', 0, 1, 0, 185, 9, 14300);

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
  `FlatCityId` int(50) NOT NULL,
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

INSERT INTO `flat` (`FlatId`, `FlatSection`, `FlatType`, `FlatAction`, `FlatFrontImage`, `FlatName`, `FlatAddress`, `FlatCity`, `FlatCityId`, `FlatRoomNumber`, `FlatRoomArea`, `FlatArea`, `FlatPrice`, `FlatTotalPrice`, `FlatSubway`, `FlatDepartment`, `FlatDistrict`, `FlatStreet`) VALUES
(1, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', '', 'ЖК "Хорошевский"', 'ул. Хорошевская, д. 17', 'МОСКВА', 0, 1, 0, 65, 160000, 0, 0, 0, 0, 0),
(2, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Ленинградский"', 'ул. 9 Мая, д. 98', 'МОСКВА', 0, 1, 0, 49, 79000, 0, 0, 0, 0, 0),
(3, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Лефорт"', 'пер. Солдатский, д. 26', 'МОСКВА', 0, 1, 0, 61, 149000, 0, 0, 0, 0, 0),
(4, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '"Мегаполис"', 'ул. Салтыковская, д. 8', 'МОСКВА', 0, 1, 0, 58, 90000, 0, 0, 0, 0, 0),
(5, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '"Царицыно-2"', 'ул. Элеваторная, д. 11', 'МОСКВА', 0, 1, 0, 54, 119000, 0, 0, 0, 0, 0),
(6, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Дом на Самаринской"', 'ул. 2-я Самаринская, д. 4', 'МОСКВА', 0, 1, 0, 68, 219000, 0, 0, 0, 0, 0),
(7, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Богородский"', 'б-р. Маршала Рокосовского, д. 5-8', 'МОСКВА', 0, 1, 0, 64, 183500, 0, 0, 0, 0, 0),
(8, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Дубровская Слобода"', 'ул. 1-я Машиностроения, д. 6-14', 'МОСКВА', 0, 2, 0, 85, 201500, 0, 0, 0, 0, 0),
(9, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Старт-Формат"', 'ул. Элеваторная, д. 48', 'МОСКВА', 0, 2, 0, 79, 116000, 0, 0, 0, 0, 0),
(10, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "07"', 'ул. Озёрная, д. 8', 'МОСКВА', 0, 2, 0, 87, 163000, 0, 0, 0, 0, 0),
(11, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Москфильмовский"', 'ул. Москфильмовская, д. 1', 'МОСКВА', 0, 3, 0, 105, 237000, 0, 0, 0, 0, 0),
(12, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Новогиреевская, д. 1', 'НАХАБИНО', 29, 1, 0, 47, 113000, 0, 0, 0, 0, 0),
(13, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Солнечная, д. 5А', 'ВОЛОКОЛАМСК', 4, 2, 0, 59, 108000, 0, 0, 0, 0, 0),
(14, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Мытищи"', 'Осташковское шоссе, д. 2', 'МЫТИЩИ', 26, 3, 0, 78, 62000, 0, 0, 0, 0, 0),
(15, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Новокосино-2"', 'ул. Челомея, д. 10', 'НОГИНСК', 31, 2, 0, 75, 96000, 0, 0, 0, 0, 0),
(16, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Планерный"', 'ул. Молодежная, д. 9', 'ХИМКИ', 46, 1, 0, 48, 113500, 0, 0, 0, 0, 0),
(17, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Сказка"', 'Новорижское шоссе, 5', 'ПОДОЛЬСК', 34, 1, 0, 43, 69000, 0, 0, 0, 0, 0),
(18, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Маршала Жукова, д. 78', 'МОСКВА', 0, 3, 0, 157, 0, 36000000, 1, 1, 1, 1),
(19, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'Проспект Мира, дом 33, корпус 1', 'МОСКВА', 0, 5, 0, 230, 0, 120000000, 2, 1, 1, 2),
(20, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул.Академика Анохина д.9', 'МОСКВА', 0, 2, 0, 54, 0, 15000000, 3, 2, 3, 4),
(21, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. 1-я Владимирская, д.19/1', 'МОСКВА', 0, 3, 0, 85, 0, 12500000, 4, 3, 4, 1),
(22, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', 'Сумской проезд д. 29', 'МОСКВА', 0, 2, 15, 55, 0, 2900000, 5, 5, 2, 2),
(23, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', 'ул. Уржумская д.3 к.1', 'МОСКВА', 0, 3, 19, 80, 0, 3800000, 6, 2, 3, 3),
(24, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ХИМКИ', 46, 2, 0, 70, 0, 7600000, 0, 0, 0, 0),
(25, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'БАЛАШИХА', 2, 1, 0, 51, 0, 3700000, 0, 0, 0, 0),
(26, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ПОДОЛЬСК', 34, 2, 0, 42, 0, 3300000, 10, 0, 0, 0),
(27, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'СЕРПУХОВ', 42, 3, 0, 77, 0, 7300000, 11, 0, 0, 0),
(28, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'КОЛОМНА', 16, 2, 0, 68, 0, 4850000, 9, 0, 0, 0),
(29, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'КРАСНОГОРСК', 21, 1, 0, 30, 0, 4600000, 8, 0, 0, 0),
(30, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'АПРЕЛЕВКА', 1, 3, 0, 91, 0, 8500000, 7, 0, 0, 0),
(31, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ФРЯЗИНО', 45, 2, 0, 45, 0, 3600000, 6, 0, 0, 0),
(32, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ОДИНЦОВО', 32, 2, 0, 67, 0, 11220000, 5, 0, 0, 0),
(33, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'КРАСНОГОРСК', 21, 1, 0, 32, 0, 4500000, 4, 0, 0, 0),
(34, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'РАМЕНСКОЕ', 39, 1, 0, 38, 0, 3400000, 3, 0, 0, 0),
(35, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ДЗЕРЖИНСКИЙ', 5, 1, 0, 34, 0, 4500000, 2, 0, 0, 0),
(36, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', '', 'ХИМКИ', 46, 4, 20, 95, 0, 1750000, 2, 0, 0, 0),
(37, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', '', 'ПРОТВИНО', 35, 3, 21, 65, 0, 2750000, 1, 0, 0, 0),
(38, 'ВТОРИЧНОЕ', 'ДОЛЯ', 'ПРОДАЖА', NULL, '', '', 'МОСКВА', 0, 2, 14, 41, 0, 3500000, 8, 2, 4, 1),
(39, 'ВТОРИЧНОЕ', 'ДОЛЯ', 'ПРОДАЖА', NULL, '', '', 'ХИМКИ', 46, 3, 17, 59, 0, 2700000, 10, 0, 0, 0),
(40, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'МОСКВА', 0, 1, 0, 52, 0, 9450000, 5, 2, 2, 2),
(41, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'МОСКВА', 0, 1, 0, 37, 0, 7500000, 4, 3, 1, 4),
(42, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 2, 0, 67, 0, 37000, 1, 3, 3, 3),
(43, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 2, 0, 52, 0, 80000, 2, 6, 2, 1),
(44, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 2, 0, 105, 0, 120000, 3, 6, 5, 5),
(45, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 3, 0, 130, 0, 250000, 4, 4, 2, 1),
(46, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 2, 0, 55, 0, 100000, 6, 4, 4, 4),
(47, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 4, 0, 220, 0, 240000, 8, 2, 2, 2),
(48, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 3, 0, 105, 0, 110000, 9, 3, 1, 1),
(49, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 2, 0, 51, 0, 31000, 11, 2, 4, 4),
(50, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 1, 0, 36, 0, 40000, 1, 2, 5, 6),
(51, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'МОСКВА', 0, 4, 0, 81, 0, 192000, 5, 1, 5, 1),
(52, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'КРАСНОГОРСК', 21, 3, 0, 74, 0, 60000, 2, 0, 0, 0),
(53, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'РЕУТОВ', 40, 3, 0, 95, 0, 55000, 2, 0, 0, 0),
(54, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ХИМКИ', 46, 1, 0, 60, 0, 40000, 3, 0, 0, 0),
(55, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ЛЮБЕРЦЫ', 25, 1, 0, 54, 0, 32000, 8, 0, 0, 0),
(56, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ПУШКИНО', 36, 1, 0, 30, 0, 25000, 9, 0, 0, 0),
(57, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'БАЛАШИХА', 2, 3, 0, 70, 0, 40000, 10, 0, 0, 0),
(58, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ХИМКИ', 46, 2, 0, 55, 0, 40000, 6, 0, 0, 0),
(59, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ХИМКИ', 46, 3, 0, 75, 0, 45000, 6, 0, 0, 0),
(60, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ХИМКИ', 46, 2, 0, 70, 0, 40000, 6, 0, 0, 0),
(61, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'АРЕНДА', NULL, '', '', 'ОДИНЦОВО', 32, 3, 0, 80, 0, 50000, 4, 0, 0, 0),
(62, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'МОСКВА', 0, 5, 0, 105, 160000, 0, 5, 0, 0, 0),
(63, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', '', 'ХИМКИ', 46, 4, 0, 88, 160000, 0, 0, 0, 0, 0);

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
-- Table structure for table `metro`
--

CREATE TABLE IF NOT EXISTS `metro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `city_id` int(10) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=226 ;

--
-- Dumping data for table `metro`
--

INSERT INTO `metro` (`id`, `name`, `city_id`, `lat`, `lng`) VALUES
(1, 'Авиамоторная', 1, 55.751579, 37.716976),
(2, 'Автозаводская', 1, 55.707748, 37.657497),
(3, 'Академическая', 1, 55.687790, 37.573387),
(4, 'Александровский Сад', 1, 55.752258, 37.610222),
(5, 'Алексеевская', 1, 55.807789, 37.638718),
(6, 'Алтуфьево', 1, 55.897923, 37.587139),
(7, 'Аннино', 1, 55.583691, 37.596783),
(8, 'Арбатская (ар.)', 1, 55.755787, 37.617634),
(9, 'Арбатская (фил.)', 1, 55.755787, 37.617634),
(10, 'Аэропорт', 1, 55.800671, 37.532200),
(11, 'Бабушкинская', 1, 55.869858, 37.664242),
(12, 'Багратионовская', 1, 55.743786, 37.497715),
(13, 'Баррикадная', 1, 55.760754, 37.581234),
(14, 'Бауманская', 1, 55.772366, 37.678825),
(15, 'Беговая', 1, 55.773590, 37.547138),
(16, 'Белорусская', 1, 55.776920, 37.584126),
(17, 'Беляево', 1, 55.642654, 37.526272),
(18, 'Бибирево', 1, 55.883926, 37.603630),
(19, 'Библиотека имени Ленина', 1, 55.751389, 37.609722),
(20, 'Битцевский Парк', 1, 55.599167, 37.556946),
(21, 'Боровицкая', 1, 55.752304, 37.612877),
(22, 'Ботанический Сад', 1, 55.845478, 37.638409),
(23, 'Братиславская', 1, 55.659416, 37.750462),
(24, 'Бульвар Дмитрия Донского', 1, 55.570244, 37.577145),
(25, 'Бунинская аллея', 1, 55.537945, 37.515362),
(26, 'Варшавская', 1, 55.653545, 37.620480),
(27, 'ВДНХ', 1, 55.820732, 37.640697),
(28, 'Владыкино', 1, 55.847183, 37.589916),
(29, 'Водный Стадион', 1, 55.839844, 37.486820),
(30, 'Войковская', 1, 55.818790, 37.498028),
(31, 'Волгоградский Проспект', 1, 55.724899, 37.687134),
(32, 'Волжская', 1, 55.690865, 37.754219),
(33, 'Волоколамская (стр.)', 1, 55.755787, 37.617634),
(34, 'Воробьевы горы', 1, 55.710308, 37.559219),
(35, 'Выхино', 1, 55.715805, 37.818024),
(36, 'Горчакова ул.', 1, 55.541962, 37.531132),
(37, 'Деловой центр', 1, 55.749222, 37.543285),
(38, 'Динамо', 1, 55.789749, 37.558189),
(39, 'Дмитровская', 1, 55.807999, 37.581066),
(40, 'Добрынинская', 1, 55.728992, 37.622787),
(41, 'Домодедовская', 1, 55.610634, 37.718033),
(42, 'Дубровка', 1, 55.717850, 37.676556),
(43, 'Измайловская', 1, 55.787731, 37.781597),
(44, 'Калужская', 1, 55.656601, 37.539955),
(45, 'Кантемировская', 1, 55.635803, 37.656513),
(46, 'Каховская', 1, 55.652985, 37.598343),
(47, 'Каширская', 1, 55.655067, 37.648666),
(48, 'Киевская', 1, 55.743305, 37.565807),
(49, 'Китай-Город', 1, 55.755367, 37.632343),
(50, 'Кожуховская', 1, 55.706142, 37.685642),
(51, 'Коломенская', 1, 55.677906, 37.663727),
(52, 'Комсомольская', 1, 55.775448, 37.655964),
(53, 'Коньково', 1, 55.633553, 37.519413),
(54, 'Красногвардейская', 1, 55.613853, 37.744473),
(55, 'Краснопресненская', 1, 55.760216, 37.577251),
(56, 'Красносельская', 1, 55.779964, 37.666084),
(57, 'Красные Ворота', 1, 55.768875, 37.649067),
(58, 'Крестьянская застава', 1, 55.732269, 37.665592),
(59, 'Кропоткинская', 1, 55.745346, 37.603348),
(60, 'Крылатское', 1, 55.756790, 37.408096),
(61, 'Кузнецкий Мост', 1, 55.761509, 37.624149),
(62, 'Кузьминки', 1, 55.705429, 37.765682),
(63, 'Кунцевская', 1, 55.730698, 37.445919),
(64, 'Курская', 1, 55.758183, 37.661484),
(65, 'Кутузовская', 1, 55.740040, 37.534569),
(66, 'Ленинский Проспект', 1, 55.707661, 37.586185),
(67, 'Лубянка', 1, 55.759342, 37.626850),
(68, 'Люблино', 1, 55.676300, 37.761852),
(69, 'Марксистская', 1, 55.740913, 37.656425),
(70, 'Марьино', 1, 55.650089, 37.743809),
(71, 'Маяковская', 1, 55.769936, 37.596046),
(72, 'Медведково', 1, 55.887074, 37.661388),
(73, 'Международная', 1, 55.748329, 37.532825),
(74, 'Менделеевская', 1, 55.781910, 37.598583),
(75, 'Митино (стр.)', 1, 55.872944, 37.451054),
(76, 'Молодежная', 1, 55.740807, 37.416832),
(77, 'Нагатинская', 1, 55.682728, 37.621819),
(78, 'Нагорная', 1, 55.672981, 37.610760),
(79, 'Нахимовский Проспект', 1, 55.662846, 37.605583),
(80, 'Новогиреево', 1, 55.751801, 37.816002),
(81, 'Новокузнецкая', 1, 55.742382, 37.629257),
(82, 'Новослободская', 1, 55.779514, 37.601166),
(83, 'Новые Черёмушки', 1, 55.670261, 37.554600),
(84, 'Октябрьская', 1, 55.730255, 37.612240),
(85, 'Октябрьское Поле', 1, 55.793526, 37.493404),
(86, 'Орехово', 1, 55.613449, 37.694496),
(87, 'Отрадное', 1, 55.863319, 37.604694),
(88, 'Охотный Ряд', 1, 55.756706, 37.615906),
(89, 'Павелецкая', 1, 55.730663, 37.636787),
(90, 'Парк Культуры', 1, 55.735645, 37.594002),
(91, 'Парк Победы', 1, 55.736301, 37.517002),
(92, 'Партизанская', 1, 55.788437, 37.749626),
(93, 'Первомайская', 1, 55.794617, 37.799335),
(94, 'Перово', 1, 55.751095, 37.785938),
(95, 'Петровско-Разумовская', 1, 55.836391, 37.575424),
(96, 'Печатники', 1, 55.692928, 37.727657),
(97, 'Пионерская', 1, 55.736027, 37.467033),
(98, 'Планерная', 1, 55.860649, 37.436306),
(99, 'Площадь Ильича', 1, 55.747047, 37.680367),
(100, 'Площадь Революции', 1, 55.756542, 37.621658),
(101, 'Полежаевская', 1, 55.777554, 37.518940),
(102, 'Полянка', 1, 55.736771, 37.618443),
(103, 'Пражская', 1, 55.611889, 37.603813),
(104, 'Преображенская Площадь', 1, 55.796104, 37.715588),
(105, 'Пролетарская', 1, 55.731724, 37.665592),
(106, 'Проспект Вернадского', 1, 55.676716, 37.505573),
(107, 'Проспект Мира', 1, 55.780720, 37.633446),
(108, 'Профсоюзная', 1, 55.677929, 37.562840),
(109, 'Пушкинская', 1, 55.765953, 37.604179),
(110, 'Речной Вокзал', 1, 55.855015, 37.476139),
(111, 'Рижская', 1, 55.792484, 37.636097),
(112, 'Римская', 1, 55.746445, 37.680157),
(113, 'Рязанский Проспект', 1, 55.716949, 37.793243),
(114, 'Савеловская', 1, 55.794029, 37.589176),
(115, 'Свиблово', 1, 55.855206, 37.652699),
(116, 'Севастопольская', 1, 55.651352, 37.598354),
(117, 'Семеновская', 1, 55.783100, 37.719341),
(118, 'Серпуховская', 1, 55.726791, 37.625240),
(119, 'Скобелевская', 1, 55.547405, 37.555481),
(120, 'Смоленская (ар.)', 1, 55.755787, 37.617634),
(121, 'Смоленская (фил.)', 1, 55.755787, 37.617634),
(122, 'Сокол', 1, 55.804844, 37.515484),
(123, 'Сокольники', 1, 55.789284, 37.679726),
(124, 'Спортивная', 1, 55.723099, 37.563766),
(125, 'Старокачаловская', 1, 55.569706, 37.584190),
(126, 'Строгино (стр.)', 1, 55.806946, 37.498055),
(127, 'Студенческая', 1, 55.738907, 37.548126),
(128, 'Сухаревская', 1, 55.772308, 37.632507),
(129, 'Сходненская', 1, 55.850266, 37.439934),
(130, 'Таганская', 1, 55.740425, 37.653362),
(131, 'Тверская', 1, 55.765038, 37.605007),
(132, 'Театральная', 1, 55.758747, 37.617695),
(133, 'Текстильщики', 1, 55.708691, 37.730728),
(134, 'Теплый Стан', 1, 55.618874, 37.507046),
(135, 'Тимирязевская', 1, 55.819046, 37.575466),
(136, 'Третьяковская', 1, 55.740696, 37.625576),
(137, 'Тульская', 1, 55.708702, 37.622494),
(138, 'Тургеневская', 1, 55.766014, 37.636921),
(139, 'Тушинская', 1, 55.826923, 37.437359),
(140, 'Улица 1905 года', 1, 55.764763, 37.561371),
(141, 'Улица Академика Янгеля', 1, 55.595482, 37.601173),
(142, 'Улица Подбельского', 1, 55.814461, 37.734020),
(143, 'Университет', 1, 55.692574, 37.534542),
(144, 'Ушакова Адмирала', 1, 55.545261, 37.542072),
(145, 'Филевский Парк', 1, 55.739540, 37.483265),
(146, 'Фили', 1, 55.746048, 37.514874),
(147, 'Фрунзенская', 1, 55.727463, 37.580502),
(148, 'Царицыно', 1, 55.621056, 37.669456),
(149, 'Цветной Бульвар', 1, 55.771656, 37.620575),
(150, 'Черкизовская', 1, 55.803844, 37.744694),
(151, 'Чертановская', 1, 55.640709, 37.605751),
(152, 'Чеховская', 1, 55.765865, 37.608139),
(153, 'Чистые Пруды', 1, 55.764904, 37.638344),
(154, 'Чкаловская', 1, 55.756001, 37.658749),
(155, 'Шаболовская', 1, 55.718826, 37.607914),
(156, 'Шоссе Энтузиастов', 1, 55.758167, 37.751667),
(157, 'Щелковская', 1, 55.809608, 37.798588),
(158, 'Щукинская', 1, 55.808510, 37.464344),
(159, 'Электрозаводская', 1, 55.782024, 37.705219),
(160, 'Юго-Западная', 1, 55.663681, 37.483196),
(161, 'Южная', 1, 55.622299, 37.608994),
(162, 'Ясенево', 1, 55.606220, 37.533340);

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
