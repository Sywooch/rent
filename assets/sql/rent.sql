-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2015 at 05:11 PM
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
  `FlatArea` int(50) NOT NULL,
  `FlatPrice` int(50) NOT NULL,
  `FlatTotalPrice` int(50) NOT NULL,
  `FlatSubway` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`FlatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=24 ;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`FlatId`, `FlatSection`, `FlatType`, `FlatAction`, `FlatFrontImage`, `FlatName`, `FlatAddress`, `FlatCity`, `FlatRoomNumber`, `FlatArea`, `FlatPrice`, `FlatTotalPrice`, `FlatSubway`) VALUES
(1, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', '', 'ЖК "Хорошевский"', 'ул. Хорошевская, д. 17', 'МОСКВА', 1, 65, 160000, 0, ''),
(2, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Ленинградский"', 'ул. 9 Мая, д. 98', 'МОСКВА', 1, 49, 79000, 0, ''),
(3, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Лефорт"', 'пер. Солдатский, д. 26', 'МОСКВА', 1, 61, 149000, 0, ''),
(4, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '"Мегаполис"', 'ул. Салтыковская, д. 8', 'МОСКВА', 1, 58, 90000, 0, ''),
(5, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '"Царицыно-2"', 'ул. Элеваторная, д. 11', 'МОСКВА', 1, 54, 119000, 0, ''),
(6, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Дом на Самаринской"', 'ул. 2-я Самаринская, д. 4', 'МОСКВА', 1, 68, 219000, 0, ''),
(7, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Богородский"', 'б-р. Маршала Рокосовского, д. 5-8', 'МОСКВА', 1, 64, 183500, 0, ''),
(8, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Дубровская Слобода"', 'ул. 1-я Машиностроения, д. 6-14', 'МОСКВА', 2, 85, 201500, 0, ''),
(9, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Старт-Формат"', 'ул. Элеваторная, д. 48', 'МОСКВА', 2, 79, 116000, 0, ''),
(10, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "07"', 'ул. Озёрная, д. 8', 'МОСКВА', 2, 87, 163000, 0, ''),
(11, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Москфильмовский"', 'ул. Москфильмовская, д. 1', 'МОСКВА', 3, 105, 237000, 0, ''),
(12, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Новогиреевская, д. 1', 'НОВОГИРЕЕВО', 1, 47, 113000, 0, ''),
(13, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Солнечная, д. 5А', 'БУТОВО', 2, 59, 108000, 0, ''),
(14, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Мытищи"', 'Осташковское шоссе, д. 2', 'МЫТИЩИ', 3, 78, 62000, 0, ''),
(15, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Новокосино-2"', 'ул. Челомея, д. 10', 'НОВОКОСИНО', 2, 75, 96000, 0, ''),
(16, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Планерный"', 'ул. Молодежная, д. 9', 'ХИМКИ', 1, 48, 113500, 0, ''),
(17, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Сказка"', 'Новорижское шоссе, 5', 'НОВОРИЖСКОЕ', 1, 43, 69000, 0, ''),
(18, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Маршала Жукова, д. 78', 'МОСКВА', 3, 157, 0, 36000000, ''),
(19, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'Проспект Мира, дом 33, корпус 1', 'МОСКВА', 5, 230, 0, 120000000, ''),
(20, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул.Академика Анохина д.9', 'МОСКВА', 2, 54, 0, 15000000, ''),
(21, 'ВТОРИЧНОЕ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. 1-я Владимирская, д.19/1', 'МОСКВА', 3, 85, 0, 12500000, ''),
(22, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', 'Сумской проезд д. 29', 'МОСКВА', 1, 0, 0, 2900000, ''),
(23, 'ВТОРИЧНОЕ', 'КОМНАТА', 'ПРОДАЖА', NULL, '', 'ул. Уржумская д.3 к.1', 'МОСКВА', 1, 0, 0, 3800000, '');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
