-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lip 04, 2024 at 01:44 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funeralhome`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `phonenumber` bigint(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `manager` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `surname`, `phonenumber`, `email`, `password`, `manager`) VALUES
(1, 'Kamil', 'Czenczek', 48942432953, 'test.testowo@o2.pl', 'haslo123', 1),
(2, 'Mateusz', 'Gergont', 48942432954, 'test.testowo@o2.pl', 'haslo123', 1),
(3, 'Konrad', 'Kowalski', 48942432955, 'test.testowo@o2.pl', 'haslo123', 0),
(4, 'Tomek', 'Kowalski', 48942432956, 'test.testowo@o2.pl', 'haslo123', 0),
(5, 'Czarek', 'Kowalski', 48942432957, 'test.testowo@o2.pl', 'haslo123', 0),
(6, 'Krsytian', 'Kowalski', 48942432958, 'test.testowo@o2.pl', 'haslo123', 0),
(7, 'Jan', 'Kowalski', 48942432943, 'test.testowo@o2.pl', 'haslo123', 0),
(8, 'Janek', 'Kowalski', 48942432944, 'test.testowo@o2.pl', 'haslo123', 0),
(9, 'Robert', 'Kowalski', 48942432945, 'test.testowo@o2.pl', 'haslo123', 0),
(10, 'Michał', 'Kowalski', 48942432946, 'test.testowo@o2.pl', 'haslo123', 0),
(11, 'Konrad', 'Kowalski', 48942432947, 'test.testowo@o2.pl', 'haslo123', 0),
(12, 'Patrycja', 'Kowalski', 48942432948, 'test.testowo@o2.pl', 'haslo123', 0),
(13, 'Lidka', 'Kowalski', 48942432949, 'test.testowo@o2.pl', 'haslo123', 0),
(14, 'Barbara', 'Kowalski', 48942432950, 'test.testowo@o2.pl', 'haslo123', 0),
(15, 'Eliza', 'Kowalski', 48942432951, 'test.testowo@o2.pl', 'haslo123', 0),
(16, 'Mirek', 'Kowalski', 48942432952, 'test.testowo@o2.pl', 'haslo123', 0),
(17, 'Polak', 'Kowalski', 48942432953, 'test.testowo@o2.pl', 'haslo123', 0),
(18, 'Niemiec', 'Kowalski', 48942432954, 'test.testowo@o2.pl', 'haslo123', 0),
(19, 'Józek', 'Kowalski', 48942432955, 'test.testowo@o2.pl', 'haslo123', 0),
(29, 'Jan', 'Kowalski', 123456789, 'test.testowo@o2.pl', 'haslo123', 1),
(30, 'Jan', 'Kowalski', 123456789, 'test.testowo@o2.pl', 'haslo123', 1),
(31, 'Jan', 'Kowalski', 123456789, 'test.testowo@o2.pl', 'haslo123', 1),
(38, 'Jan', 'Kowalski', 123456789, 'test.testowo@o2.pl', 'haslo123', 1),
(40, 'Jan', 'Kowalski', 123456789, 'test.testowo@o2.pl', 'haslo123', 1),
(41, 'Jan', 'Kowalski', 123456789, 'test.testowo@o2.pl', 'haslo123', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `funeral`
--

CREATE TABLE `funeral` (
  `id` int(11) NOT NULL,
  `place` varchar(20) DEFAULT NULL,
  `funeral_date` date DEFAULT NULL,
  `funeral_gathering` time DEFAULT NULL,
  `funeral_rosary` time DEFAULT NULL,
  `funeral_holy_mass` time DEFAULT NULL,
  `tent` tinyint(4) DEFAULT NULL,
  `cros` tinyint(4) DEFAULT NULL,
  `flowers` tinyint(4) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `funeral`
--

INSERT INTO `funeral` (`id`, `place`, `funeral_date`, `funeral_gathering`, `funeral_rosary`, `funeral_holy_mass`, `tent`, `cros`, `flowers`, `team_id`) VALUES
(1, 'Lubenia', '2024-07-05', '10:00:00', '11:00:00', '12:00:00', 1, 0, 1, 1),
(2, 'Lubenia', '2024-07-06', '09:30:00', '10:30:00', '11:30:00', 0, 1, 0, 2),
(3, 'Borek', '2024-07-07', '11:00:00', '12:00:00', '13:00:00', 1, 1, 1, 1),
(4, 'Tyczyn', '2024-07-08', '10:30:00', '11:30:00', '12:30:00', 0, 0, 1, 2),
(5, 'Błażowa', '2024-07-09', '09:00:00', '10:00:00', '11:00:00', 1, 0, 0, 1),
(6, 'Lecka', '2024-07-10', '12:00:00', '13:00:00', '14:00:00', 0, 1, 1, 2),
(7, 'Białka', '2024-07-11', '11:30:00', '12:30:00', '13:30:00', 1, 1, 0, 1),
(8, 'Tyczyn', '2024-07-12', '09:30:00', '10:30:00', '11:30:00', 0, 0, 1, 2),
(9, 'Tyczyn', '2024-07-13', '10:00:00', '11:00:00', '12:00:00', 1, 1, 0, 1),
(10, 'Tyczyn', '2024-07-14', '09:00:00', '10:00:00', '11:00:00', 0, 1, 1, 2),
(17, 'Place', '2024-07-05', '12:00:00', '12:30:00', '13:00:00', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `employee_1` int(11) DEFAULT NULL,
  `employee_2` int(11) DEFAULT NULL,
  `employee_3` int(11) DEFAULT NULL,
  `employee_4` int(11) DEFAULT NULL,
  `employee_5` int(11) DEFAULT NULL,
  `employee_6` int(11) DEFAULT NULL,
  `employee_7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `manager_id`, `employee_1`, `employee_2`, `employee_3`, `employee_4`, `employee_5`, `employee_6`, `employee_7`) VALUES
(1, 1, 3, 4, 5, 6, 7, 8, 9),
(2, 2, 10, 11, 12, 13, 14, 15, 16);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `funeral`
--
ALTER TABLE `funeral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indeksy dla tabeli `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `employee_1` (`employee_1`),
  ADD KEY `employee_2` (`employee_2`),
  ADD KEY `employee_3` (`employee_3`),
  ADD KEY `employee_4` (`employee_4`),
  ADD KEY `employee_5` (`employee_5`),
  ADD KEY `employee_6` (`employee_6`),
  ADD KEY `employee_7` (`employee_7`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `funeral`
--
ALTER TABLE `funeral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `funeral`
--
ALTER TABLE `funeral`
  ADD CONSTRAINT `funeral_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`employee_1`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `team_ibfk_3` FOREIGN KEY (`employee_2`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `team_ibfk_4` FOREIGN KEY (`employee_3`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `team_ibfk_5` FOREIGN KEY (`employee_4`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `team_ibfk_6` FOREIGN KEY (`employee_5`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `team_ibfk_7` FOREIGN KEY (`employee_6`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `team_ibfk_8` FOREIGN KEY (`employee_7`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
