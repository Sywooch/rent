-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2015 at 12:33 PM
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
  PRIMARY KEY (`FlatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`FlatId`, `FlatSection`, `FlatType`, `FlatAction`, `FlatFrontImage`, `FlatName`, `FlatAddress`, `FlatCity`, `FlatRoomNumber`, `FlatArea`, `FlatPrice`) VALUES
(1, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', '', 'ЖК "Хорошевский"', 'ул. Хорошевская, д. 17', 'МОСКВА', 1, 65, 160000),
(2, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Ленинградский"', 'ул. 9 Мая, д. 98', 'МОСКВА', 1, 49, 79000),
(3, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Лефорт"', 'пер. Солдатский, д. 26', 'МОСКВА', 1, 61, 149000),
(4, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '"Мегаполис"', 'ул. Салтыковская, д. 8', 'МОСКВА', 1, 58, 90000),
(5, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '"Царицыно-2"', 'ул. Элеваторная, д. 11', 'МОСКВА', 1, 54, 119000),
(6, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Дом на Самаринской"', 'ул. 2-я Самаринская, д. 4', 'МОСКВА', 1, 68, 219000),
(7, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Богородский"', 'б-р. Маршала Рокосовского, д. 5-8', 'МОСКВА', 1, 64, 183500),
(8, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Дубровская Слобода"', 'ул. 1-я Машиностроения, д. 6-14', 'МОСКВА', 2, 85, 201500),
(9, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Старт-Формат"', 'ул. Элеваторная, д. 48', 'МОСКВА', 2, 79, 116000),
(10, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "07"', 'ул. Озёрная, д. 8', 'МОСКВА', 2, 87, 163000),
(11, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Москфильмовский"', 'ул. Москфильмовская, д. 1', 'МОСКВА', 3, 105, 237000),
(12, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Новогиреевская, д. 1', 'НОВОГИРЕЕВО', 1, 47, 113000),
(13, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, '', 'ул. Солнечная, д. 5А', 'БУТОВО', 2, 59, 108000),
(14, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Мытищи"', 'Осташковское шоссе, д. 2', 'МЫТИЩИ', 3, 78, 62000),
(15, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Новокосино-2"', 'ул. Челомея, д. 10', 'НОВОКОСИНО', 2, 75, 96000),
(16, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Планерный"', 'ул. Молодежная, д. 9', 'ХИМКИ', 1, 48, 113500),
(17, 'НОВОСТРОЙКИ', 'КВАРТИРА', 'ПРОДАЖА', NULL, 'ЖК "Сказка"', 'Новорижское шоссе, 5', 'НОВОРИЖСКОЕ', 1, 43, 69000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
