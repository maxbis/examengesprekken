-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2020 at 09:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examengesprekken`
--

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `datum_van` date NOT NULL,
  `datum_tot` date NOT NULL,
  `actief` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examen`
--

INSERT INTO `examen` (`id`, `naam`, `datum_van`, `datum_tot`, `actief`) VALUES
(1, 'Examen group 7A/B september 2020', '2020-09-14', '2020-09-18', 0),
(2, 'Test', '2020-07-28', '2020-07-30', 1),
(3, 'Test 2', '2020-05-01', '2020-05-08', 1),
(4, 'Test ', '2020-12-01', '2020-12-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `examen_gesprek_soort`
--

CREATE TABLE `examen_gesprek_soort` (
  `id` int(11) NOT NULL,
  `examen_id` int(11) NOT NULL,
  `gesprek_soort_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gesprek`
--

CREATE TABLE `gesprek` (
  `id` int(11) NOT NULL,
  `student_naam` varchar(100) NOT NULL,
  `lokaal` varchar(10) NOT NULL,
  `rolspeler_id` int(11) NOT NULL,
  `gesprek_soort_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gesprek_soort`
--

CREATE TABLE `gesprek_soort` (
  `id` int(11) NOT NULL,
  `kerntaak_nr` int(11) NOT NULL,
  `kerntaak_naam` text NOT NULL,
  `gesprek_nr` int(11) NOT NULL,
  `gesprek_naam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gesprek_soort`
--

INSERT INTO `gesprek_soort` (`id`, `kerntaak_nr`, `kerntaak_naam`, `gesprek_nr`, `gesprek_naam`) VALUES
(1, 1, 'KT-1 Levert een bijdrage aan het ontwikkeltraject - Werk Proces 1 - PvE', 1, 'PvE Intro'),
(6, 1, 'KT-1 Levert een bijdrage aan het ontwikkeltraject - Werk Proces 1 - PvE', 2, 'PvE Opleveren'),
(7, 1, 'KT-1 Levert een bijdrage aan het ontwikkeltraject - Werk Proces 1 - PvE', 1, 'PvE Intro'),
(8, 1, 'KT-1 Levert een bijdrage aan het ontwikkeltraject - Werk Proces 1 - PvE', 1, 'PvE Intro'),
(9, 1, 'KT-1 Levert een bijdrage aan het ontwikkeltraject - Werk Proces 1 - PvE', 1, 'PvE Intro'),
(11, 2, 'KT-1 Levert een bijdrage aan het ontwikkeltraject - Werk Proces 1 - PvE', 1, 'PvE Intro'),
(12, 0, 'KT-1 Levert een bijdrage aan het ontwikkeltraject - Werk Proces 1 - PvE', 2, 'PvE Intro'),
(13, 0, 'KT-1 Levert een bijdrage aan het ontwikkeltraject - Werk Proces 1 - PvE', 3, 'PvE Intro');

-- --------------------------------------------------------

--
-- Table structure for table `rolspeler`
--

CREATE TABLE `rolspeler` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examen_gesprek_soort`
--
ALTER TABLE `examen_gesprek_soort`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examen_id` (`examen_id`),
  ADD KEY `gesprek_soort_id` (`gesprek_soort_id`);

--
-- Indexes for table `gesprek`
--
ALTER TABLE `gesprek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rolspeler_id` (`rolspeler_id`),
  ADD KEY `gesprek_soort_id` (`gesprek_soort_id`);

--
-- Indexes for table `gesprek_soort`
--
ALTER TABLE `gesprek_soort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolspeler`
--
ALTER TABLE `rolspeler`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examen_gesprek_soort`
--
ALTER TABLE `examen_gesprek_soort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gesprek`
--
ALTER TABLE `gesprek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gesprek_soort`
--
ALTER TABLE `gesprek_soort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rolspeler`
--
ALTER TABLE `rolspeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `examen_gesprek_soort`
--
ALTER TABLE `examen_gesprek_soort`
  ADD CONSTRAINT `examen_gesprek_soort_ibfk_1` FOREIGN KEY (`examen_id`) REFERENCES `examen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examen_gesprek_soort_ibfk_2` FOREIGN KEY (`gesprek_soort_id`) REFERENCES `gesprek_soort` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gesprek`
--
ALTER TABLE `gesprek`
  ADD CONSTRAINT `gesprek_ibfk_1` FOREIGN KEY (`gesprek_soort_id`) REFERENCES `gesprek_soort` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gesprek_ibfk_2` FOREIGN KEY (`rolspeler_id`) REFERENCES `rolspeler` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
