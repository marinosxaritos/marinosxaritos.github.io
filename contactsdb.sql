-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 17 Δεκ 2024 στις 22:25:12
-- Έκδοση διακομιστή: 10.4.22-MariaDB
-- Έκδοση PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `contactsdb`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `breath_insident`
--

CREATE TABLE `breath_insident` (
  `id` int(11) NOT NULL,
  `recovery_position` varchar(40) DEFAULT NULL,
  `transported` varchar(40) DEFAULT NULL,
  `sensations` varchar(40) DEFAULT NULL,
  `contacts_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `breath_insident`
--

INSERT INTO `breath_insident` (`id`, `recovery_position`, `transported`, `sensations`, `contacts_id`) VALUES
(6, 'With Oxygen', 'Yes', 'Yes', 85),
(7, 'Without Oxygen', 'No', '', 128),
(8, 'With Oxygen', 'Yes', 'No', 134),
(9, 'Without Oxygen', 'No', 'Yes', 135),
(10, 'Without Oxygen', 'No', 'Yes', 136);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `license` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `last_name`, `date`, `time`, `address`, `license`) VALUES
(85, 'Μαρινος', 'Χαριτος', '2024-04-14', '06:22:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '4142'),
(86, 'Γεράσιμος ', 'Χαριτος ', '2024-04-14', '05:24:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '3322'),
(87, 'Γιώργος', 'Γαρουφαλλης ', '2024-04-15', '02:25:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '7798'),
(88, 'Μαρινος ', 'Χαριτος ', '2024-04-16', '05:21:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '4142'),
(89, 'Μαρινος', 'Χαριτος', '2024-03-08', '10:00:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '4142'),
(91, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(92, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(93, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(94, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(95, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(96, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(97, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(98, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(99, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(100, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(101, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(102, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(103, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(104, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(105, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(106, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(107, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(108, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(109, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(110, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(111, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(112, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(113, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(114, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(115, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(116, '', '', '2024-04-16', '00:00:00', 'Address', '4142'),
(120, '', '', '2024-03-23', '00:00:00', 'Address', '4142'),
(126, 'Λευτερης ', 'Σιμητος ', '2024-04-18', '04:51:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '7777'),
(128, 'Ελενη ', 'Μισχου', '2024-04-12', '11:25:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '0909'),
(129, 'Ελενη ', 'Μπαμπη', '2024-04-18', '10:30:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '5678'),
(130, 'Γεράσιμος ', 'Χαριτος', '2024-04-20', '12:28:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '3322'),
(131, 'Λευτερης ', 'Σιμητος', '2024-04-21', '02:10:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '7777'),
(132, 'Ιωάννης ', 'Χαριτος', '2024-04-22', '07:30:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '8888'),
(133, 'Απόστολος ', 'Καπουσουζης ', '2024-04-22', '11:41:00', 'Address :\nΡήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '9191'),
(134, 'Γεράσιμος ', 'Χαριτος ', '2024-04-24', '02:41:00', 'Ρήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '3322'),
(135, 'dimitrios', 'misxos', '2024-04-26', '10:00:00', 'Ρήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '1234'),
(136, 'ΕΥΓΕΝΊΑ ', 'ΙΩΑΝΝΙΔΟΥ', '2024-04-26', '12:00:00', 'Ρήγα Φεραίου 13, Έδεσσα 582 00, Ελλάδα', '0812');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `equipment` varchar(100) NOT NULL,
  `tower` varchar(30) NOT NULL,
  `contacts_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `equipment`
--

INSERT INTO `equipment` (`id`, `equipment`, `tower`, `contacts_id`) VALUES
(3, '[Αδιάβροχο φακό, Σφυρίχτρα, Τηλεβόα]', '', 120),
(8, '[Καταδυτικό Μαχαίρι]', 'δελφίνι ', 128),
(9, '[Σανίδα Διάσωσης, Βατραχοπέδιλα, Αυτόματο Απινιδωτή]', 'Πύργος 1', 129),
(10, '[Αδιάβροχο φακό, Κιάλια]', 'ρεινα', 126),
(11, '[Σανίδα Διάσωσης]', 'αχινος', 87),
(12, '[Τηλεβόα]', 'δελφίνι ', 131),
(13, '[Πτυσσόμενο Φορείο]', 'Αι Γιάννης ', 134),
(14, '[Αδιάβροχο φακό, Σωστικός Σωλήνας, Βατραχοπέδιλα, Τηλεβόα]', '5', 135),
(15, '[Κιάλια, Σωστικός Σωλήνας]', 'τι', 136);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `inside_water_insident`
--

CREATE TABLE `inside_water_insident` (
  `id` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `flag` varchar(20) NOT NULL,
  `distance` int(22) DEFAULT NULL,
  `buoys` varchar(20) NOT NULL,
  `rescue` varchar(20) NOT NULL,
  `rescued` int(22) DEFAULT NULL,
  `contacts_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `inside_water_insident`
--

INSERT INTO `inside_water_insident` (`id`, `time`, `flag`, `distance`, `buoys`, `rescue`, `rescued`, `contacts_id`) VALUES
(20, NULL, 'Green', 30, 'in', 'Can', 1, 85),
(21, NULL, 'Yellow', 80, 'out', 'Board', 2, 87),
(27, NULL, 'Red', 3, 'out', 'Can', 4, 126),
(28, NULL, 'Yellow', 100, 'out', 'Board', 1, 129),
(29, NULL, 'Yellow', 100, 'out', 'Board', 1, 131),
(30, NULL, 'Green', 100, 'in', 'Boat', 1, 135),
(31, '09:11:00', 'Yellow', 90, 'out', 'Board', 2, 136);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `login`
--

CREATE TABLE `login` (
  `username` varchar(18) NOT NULL,
  `password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('australia2024', '1234@Asdf');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `no_breath_insident`
--

CREATE TABLE `no_breath_insident` (
  `id` int(11) NOT NULL,
  `cardiopulmonary` varchar(40) DEFAULT NULL,
  `aed` varchar(40) DEFAULT NULL,
  `recovery` varchar(40) DEFAULT NULL,
  `contacts_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `no_breath_insident`
--

INSERT INTO `no_breath_insident` (`id`, `cardiopulmonary`, `aed`, `recovery`, `contacts_id`) VALUES
(12, 'With Oxygen', 'Defibrillation was given', 'Successful', 86),
(13, 'With Oxygen', 'Defibrillation was given', 'Successful', 87),
(14, 'With Oxygen', 'Defibrillation was given', 'Unsuccessful', 126),
(15, 'With Oxygen', 'Defibrillation was given', 'Successful', 129),
(16, 'With Oxygen', 'Defibrillation was given', 'Successful', 131),
(17, 'With Oxygen', 'Defibrillation was given', 'Successful', 132);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `outside_water_insident`
--

CREATE TABLE `outside_water_insident` (
  `id` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `flag` varchar(20) NOT NULL,
  `cause` varchar(20) NOT NULL,
  `distance` int(22) DEFAULT NULL,
  `rescued` int(22) DEFAULT NULL,
  `contacts_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `outside_water_insident`
--

INSERT INTO `outside_water_insident` (`id`, `time`, `flag`, `cause`, `distance`, `rescued`, `contacts_id`) VALUES
(9, NULL, 'Green', 'Marine life', 40, 1, 86),
(10, NULL, 'Yellow', 'Bleeding', 150, 1, 128),
(11, NULL, 'Red', 'Injury', 20, 3, 132),
(12, NULL, 'Yellow', 'Bleeding', 80, 1, 134),
(13, '08:21:00', 'Green', 'Sunstroke', 8, 1, 136);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `breath_insident`
--
ALTER TABLE `breath_insident`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_id` (`contacts_id`);

--
-- Ευρετήρια για πίνακα `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `inside_water_insident`
--
ALTER TABLE `inside_water_insident`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_id` (`contacts_id`);

--
-- Ευρετήρια για πίνακα `no_breath_insident`
--
ALTER TABLE `no_breath_insident`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_id` (`contacts_id`);

--
-- Ευρετήρια για πίνακα `outside_water_insident`
--
ALTER TABLE `outside_water_insident`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_contacts` (`contacts_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `breath_insident`
--
ALTER TABLE `breath_insident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT για πίνακα `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT για πίνακα `inside_water_insident`
--
ALTER TABLE `inside_water_insident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT για πίνακα `no_breath_insident`
--
ALTER TABLE `no_breath_insident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT για πίνακα `outside_water_insident`
--
ALTER TABLE `outside_water_insident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `breath_insident`
--
ALTER TABLE `breath_insident`
  ADD CONSTRAINT `breath_insident_ibfk_1` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `breath_insident_ibfk_2` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`);

--
-- Περιορισμοί για πίνακα `inside_water_insident`
--
ALTER TABLE `inside_water_insident`
  ADD CONSTRAINT `inside_water_insident_ibfk_1` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`);

--
-- Περιορισμοί για πίνακα `no_breath_insident`
--
ALTER TABLE `no_breath_insident`
  ADD CONSTRAINT `no_breath_insident_ibfk_1` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`);

--
-- Περιορισμοί για πίνακα `outside_water_insident`
--
ALTER TABLE `outside_water_insident`
  ADD CONSTRAINT `FK_contacts` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
