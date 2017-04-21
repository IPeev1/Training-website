-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 mrt 2017 om 19:13
-- Serverversie: 5.7.9
-- PHP-versie: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `time` time(6) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(25) NOT NULL,
  `max_persons` int(9) NOT NULL,
  `training_id` int(9) NOT NULL,
  `instructor_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (instructor_id) REFERENCES persons(id),
  FOREIGN KEY (training_id) REFERENCES persons(id)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lessons`
--

INSERT INTO `lessons` (`id`, `time`, `date`, `location`, `max_persons`, `training_id`, `instructor_id`) VALUES
(1, '2017-04-27 12:00:00.000000', '2017-04-27', 'A2', 3, 1, 1),
(2, '2017-04-20 12:00:00.000000', '2017-04-28', 'B3', 2, 2, 2),
(13, '2017-04-25 14:00:00.000000', '2017-04-25', 'A5', 2, 1, 1),
(14, '2017-04-26 12:00:00.000000', '2017-04-26', 'A6', 2, 3, 2),
(15, '2017-04-26 14:00:00.000000', '2017-04-26', 'A6', 5, 2, 3),
(16, '2017-04-27 12:00:00.000000', '2017-04-27', 'A4', 2, 1, 4),
(17, '2017-04-27 14:00:00.000000', '2017-04-27', 'A4', 3, 3, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(20) NOT NULL,
  `password` varchar(65) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `preprovision` varchar(10) DEFAULT NULL,
  `lastname` varchar(35) NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `emailaddress` varchar(40) NOT NULL,
  `hire_date` date DEFAULT NULL,
  `salary` int(7) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `place` varchar(35) DEFAULT NULL,
  `role` enum('instructeur','lid','admin') NOT NULL,
  `lesson_id` int(9) DEFAULT NULL,
  `registration_id` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `persons`
--

INSERT INTO `persons` (`id`, `loginname`, `password`, `firstname`, `preprovision`, `lastname`, `dateofbirth`, `gender`, `emailaddress`, `hire_date`, `salary`, `street`, `postal_code`, `place`, `role`, `lesson_id`, `registration_id`) VALUES
(1, 'jvliet', 'qwerty', 'Jan', 'van', 'Vliet', '2017-03-07', 'male', 'jvliet@caiway.nl', NULL, NULL, 'Noodlestraat 14', '3258BC', 'Den Haag', 'lid', NULL, 1),
(2, 'ptol', 'qwerty', 'Pim', 'van', 'Tol', '2017-03-06', 'male', 'ptol@caiway.nl', NULL, NULL, 'Noodlestraat 15', '5424BH', 'Den Haag', 'lid', NULL, 2),
(3, 'sgroot', 'qwerty', 'Sakia', 'de ', 'Groot', '2017-03-08', 'female', 'sgroot@caiway.nl', NULL, NULL, 'Wregwarpstraat 28', '2564DE', 'Den Haag', 'lid', NULL, 3),
(4, 'pklus', 'qwerty', 'Petra', 'de', 'Klus', '2017-03-01', 'female', 'pklus@caiway.nl', NULL, NULL, 'Dwarfstraat 2', '4875SF', 'Vlaardingen', 'lid', NULL, 4),
(5, 'ipeev', 'qwerty', 'Ivan', NULL, 'Peev', '2017-02-28', 'male', 'ivan@hotmail.com', '2017-03-01', 255, 'noodlestraat 41', '2222xl', 'den haag', 'instructeur', 1, NULL),
(11, 'sanjay', 'qwerty', 'Sanjay', NULL, 'ragunath', '2017-02-28', 'male', 'sanjay@hotmail.com', '2017-03-01', 222, 'noodlestraat 414', '2222xl', 'den haag', 'instructeur', 2, NULL),
(12, 'pavendonk', 'qwerty', 'Paul', NULL, 'Avendonk', '2017-02-28', 'male', 'paul@hotmail.com', '2017-03-11', 255, 'noodlestraat 42', '2222xl', 'den haag', 'instructeur', 3, NULL),
(13, 'elok', 'qwerty', 'Els', NULL, 'Lok', '2017-02-28', 'male', 'els@hotmail.com', '2017-03-01', 275, 'noodlestraat 46', '2222xl', 'den haag', 'instructeur', 4, NULL),
(14, 'kim', 'qwerty', 'kim', NULL, 'Peev', '2017-02-28', 'male', 'kim@hotmail.com', NULL, NULL, 'noodlestraat 44', '2222xl', 'den haag', 'lid', NULL, 5),
(15, 'bas', 'qwerty', 'bas', NULL, 'Peev', '2017-02-28', 'male', 'bas@hotmail.com', NULL, NULL, 'noodlestraat 45', '2222xl', 'den haag', 'lid', NULL, 6),
(16, 'KittyCate', 'qwerty', 'Kitty', NULL, 'Cate', '2017-03-21', 'female', 'kittyCateCupcake@hotmail.com', '2017-03-24', 241, 'Cakestreet 13', '3221BH', 'Noodlestad', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `payment` varchar(25) DEFAULT NULL,
  `member_id` int(9) NOT NULL,
  `lesson_id` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `registrations`
--

INSERT INTO `registrations` (`id`, `payment`, `member_id`, `lesson_id`) VALUES
(1, '20', 1, 1),
(2, '20', 1, 3),
(3, '20', 2, 2),
(4, '20', 3, 3),
(5, '20', 4, 2),
(6, '20', 14, 1),
(7, '20', 15, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trainings`
--

DROP TABLE IF EXISTS `trainings`;
CREATE TABLE IF NOT EXISTS `trainings` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `description` varchar(40) NOT NULL,
  `duration` int(9) NOT NULL,
  `extra_costs` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `trainings`
--

INSERT INTO `trainings` (`id`, `description`, `duration`, `extra_costs`) VALUES
(1, 'MMA', 50, NULL),
(2, 'Kickboksen', 60, 23),
(3, 'Stootzak training', 65, 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
