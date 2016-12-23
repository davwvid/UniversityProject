-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Dez 2016 um 10:05
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `universityproject`
--
CREATE DATABASE IF NOT EXISTS `universityproject` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `universityproject`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shortDescription` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `expirationDate` date NOT NULL,
  `fkUniversity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `course`
--

INSERT INTO `course` (`id`, `name`, `shortDescription`, `description`, `expirationDate`, `fkUniversity`) VALUES
(1, 'Bachelor Business Administration (International Management)', 'The world gets international. Do so as well!', 'Students seeking management careers in international environments need communication competence, a generalist academic background coupled with a practical focus, and a working knowledge of how to function in multicultural systems. The unique and original Bachelor of Business Administration (International Management) programme delivers this. Taught entirely in English and embedded in an intercultural setting, qualified and experienced lecturers impart sound knowledge and application skills in various management fields always ensuring there are global perspectives. In the higher semesters, the selected major provides specialist training in key business fields.', '2017-02-20', 2),
(2, 'BSc Computer Science', 'Computers slowly take over the normal workforce. Explore why!', 'Thanks to the unique Project Track at the FHNW, international students have the opportunity to engage in semester-long project work with customer mandates from local Swiss industry and international companies. This programme will prepare you to successfully launch your IT career in an international setting.<br/>\r\nLanguage excellence and intercultural competence play a key role in today''s hyper-competitive world. Studying together with international exchange students, you face the challenges and opportunities which this situation can create.', '2017-02-20', 2),
(5, 'Bachelor in Economics', 'A course on the cutting edge of science and current economic policies. Join us now!', 'The Major in Economics offers you the widest range of possibilities for deepening your interest in various subjects. More than half the credits in core studies can be earned in freely chosen courses. \r\n<br/>Core studies (80 credits) are structured into the three parts of compulsory subjects, core electives and (free) electives.', '2017-02-20', 3),
(6, 'Bachelor in International Affairs', 'An interdisciplinary, internationally oriented degree course.', 'The Major in International Affairs is a self-contained, multi-disciplinary degree course. After you have successfully completed the Assessment Year, you will attend the compulsory subjects of this major in Economics, Political Science, Law and Business Administration for four semesters.', '2017-02-20', 3),
(7, 'Bachelor of Arts (B.A.)', 'History, cultural studies, literature studies, political science, sociology, economics. All in One', 'The BA-curriculum in North American Studies (NAS) is characterized by multiple disciplines and an interdisciplinary orientation. A total of six disciplines â€“ history, cultural studies, literature studies, political science, sociology and economics â€“ offer courses on the United States and Canada and allow for an incremental disciplinary specialization and qualification by the selection of disciplinary fields of concentration. The disciplinary perspectives are supplemented by inter- and transdisciplinary courses â€“ both, at the stage of basic and advanced studies, e.g. by the regularly offered interdisciplinary lecture series.', '2017-02-20', 9),
(8, 'Master of Science (M.Sc.) in Bioinformatics', 'Biology and Informatics. Combined!', 'The masterâ€™s program in bioinformatics is a direct response to a paradigm shift taking place in medicine and biological sciences. Further research in these areas rests on the evaluation of masses of biological data: here, the use of computers, combined with accurate mathematical models and efficient algorithms is essential. Employing adequate training in the various sub-disciplines, this program provides the required knowledge for students to be able to judge mathematical methods and models, to recognize relevant biological questions, and to correctly interpret the results of the models in a biological context.', '2017-02-20', 9);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `price` double NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(200) NOT NULL,
  `payed` int(11) NOT NULL,
  `fkUniversity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `invoice`
--

INSERT INTO `invoice` (`id`, `price`, `date`, `comment`, `payed`, `fkUniversity`) VALUES
(20, 15, '2016-12-19', 'New Course Fee', 1, 2),
(23, 700, '2016-12-20', 'Subscription Fee', 0, 2),
(24, 700, '2016-12-20', 'Subscription Fee', 0, 2),
(25, 700, '2016-12-20', 'Subscription Fee', 0, 2),
(26, 700, '2016-12-20', 'Subscription Fee', 0, 2),
(27, 800, '2016-12-21', 'Subscription Fee', 1, 3),
(28, 700, '2016-12-21', 'Subscription Fee', 0, 4),
(29, 700, '2016-12-22', 'Subscription Fee', 0, 6),
(30, 1000, '2016-12-22', 'Subscription Fee', 1, 7),
(31, 30, '2016-12-22', 'New Course Fee', 1, 7),
(32, 700, '2016-12-22', 'Subscription Fee', 0, 8),
(33, 15, '2016-12-22', 'New Course Fee', 0, 8),
(34, 30, '2016-12-22', 'New Course Fee', 0, 3),
(35, 1000, '2016-12-23', 'Subscription Fee', 0, 9),
(36, 30, '2016-12-23', 'New Course Fee', 0, 3),
(37, 30, '2016-12-23', 'New Course Fee', 0, 9),
(38, 30, '2016-12-23', 'New Course Fee', 0, 9);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pricepackage`
--

DROP TABLE IF EXISTS `pricepackage`;
CREATE TABLE `pricepackage` (
  `id` int(11) NOT NULL,
  `priceSub` double NOT NULL,
  `priceCourse` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pricepackage`
--

INSERT INTO `pricepackage` (`id`, `priceSub`, `priceCourse`) VALUES
(1, 1000, 30),
(2, 800, 20),
(3, 700, 15);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `university`
--

DROP TABLE IF EXISTS `university`;
CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fkPricePackage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `university`
--

INSERT INTO `university` (`id`, `name`, `link`, `description`, `email`, `password`, `fkPricePackage`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '$2y$10$twgTgxNOZsqOq1K0CXqRVOpu1vDU5GKN0.GFlJJA85aoSLOY0jKfa', 1),
(2, 'Fachhochschule Nordwestschweiz (FHNW)', 'www.fhnw.ch', 'The University of Applied Sciences and Arts Northwestern Switzerland FHNW ranks amongst Switzerland''s leading and most innovative universities of applied sciences. It is composed of nine Schools covering Applied Psychology, Architecture, Civil Engineering and Geomatics, Art and Design, Life Sciences, Music, Teacher Education, Social Work, Engineering and Business. The modern campuses are in northwestern Switzerland, near the borders with Germany and France and in the immediate vicinity of the cities of Basel and Zurich, as well as of national and international companies.', 'info@fhnw.ch', '$2y$10$iX12uyC/JoECVjex65r.i.pCL7jXwWrBcoQQuQpDKRje2/6Dt/L4K', 2),
(3, 'University St. Gallen', 'www.unisg.ch', 'As one of Europeâ€™s leading business universities in Switzerland, we offer degrees and executive education at the highest international level. A practical approach and an integrative view characterise our education and support the HSGâ€™s unique concept.', 'info@unisg.ch', '$2y$10$iX12uyC/JoECVjex65r.i.pCL7jXwWrBcoQQuQpDKRje2/6Dt/L4K', 1),
(9, 'Free University Berlin', 'www.fu-berlin.de', 'Freie UniversitÃ¤t is one of the eleven universities to have been successful in all three lines of funding in the German government''s Excellence Initiative in 2012. The future development concept of Freie UniversitÃ¤t is based on three key strategic centers: the Center for Research Strategy, which focuses on research planning; the Center for International Cooperation; and the Dahlem Research School, which supports next-generation academic talent.', 'info@fu-berlin.de', '$2y$10$iX12uyC/JoECVjex65r.i.pCL7jXwWrBcoQQuQpDKRje2/6Dt/L4K', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `pricepackage`
--
ALTER TABLE `pricepackage`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT für Tabelle `pricepackage`
--
ALTER TABLE `pricepackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
