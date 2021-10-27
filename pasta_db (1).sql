-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 27 Οκτ 2021 στις 13:32:10
-- Έκδοση διακομιστή: 10.4.18-MariaDB
-- Έκδοση PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `pasta_db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `contact`
--

INSERT INTO `contact` (`id`, `name`, `lastname`, `email`, `city`, `country`, `message`, `created_at`) VALUES
(220, 'jvortelinas@gmail.com', 'Vortelinas', 'fenia.mavromati@gmail.com', 'Wien', 'Αυστρία', 'cscs', '2021-10-05 08:29:07.316429'),
(221, 'jvortelinas@gmail.com', 'Vortelinas', 'fenia.mavromati@gmail.com', 'Wien', 'Αυστρία', 'cscs', '2021-10-05 08:29:48.086093'),
(222, 'jvortelinas@gmail.com', 'Vortelinas', 'fenia.mavromati@gmail.com', 'Wien', 'Αυστρία', 'cscs', '2021-10-05 08:31:30.670200'),
(231, 'jvortelinas@gmail.com', 'Vortelinas', 'jvortelinas@gmail.com', 'Wien', 'Αυστρία', 'Ich versende Ihnen meinen Lebenslauf, da ich mich für die Stelle Haustechniker interessiere.\r\nIm Mai habe ich mein Diplom als Web Developer erhalten und seit Jahren bin ich Besitzer einer technischen Ausbildung als Maschinenbauingenieur und Kühltechniker (Berufschule). Mehreren Jahren war ich bei Gesellschäften für Telekommunikation ;am Anfang habe ich das Mobilfunknetz installiert und dann war ich Mitarbeiter bei der Zentrale. Ich bin im Besitz aller Führerscheinklassen für berufliche Zwecke und meine Computerkenntnisse sind exzellent , da ich mehr als 10 Jahre in der Telekommunikation gearbeitet habe . Aufgrund meiner Berufserfahrung entwickelte ich sowohl kommunikative und organisatorische Fertigkeiten, als auch die Fähigkeit zur Problembehebung unter Druckzuständen. Ich arbeite gern im Team und bediene die Kunden mit Freundschaftlichkeit.\r\nIch kann Ihnen für meine Zuverlässigkeit und bereitschaft alles zu schaffen versichern. Es gibt viele Aufgaben , die ich erreichen kann, weil ich selbst viel gelernt und entwickelt habe.\r\n\r\nAls eine engagierte Person wäre  ich gern ein Mitarbeiter in Ihrer Firma .\r\n\r\nIch stehe gerne jederzeit für ein Vorstellungsgespräch zur Verfügung und wäre Ihnen dankbar, sollten Sie mir die Gelegenheit geben, meinen festen Willen für diese neue berufliche Ausforderung zu veräußern.', '2021-10-12 12:11:48.187885');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `item`
--

CREATE TABLE `item` (
  `itemId` int(10) NOT NULL,
  `itemName` text COLLATE utf8_unicode_ci NOT NULL,
  `itemGroup` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `itemInfo` text COLLATE utf8_unicode_ci NOT NULL,
  `itemDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `featured` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `itemGroup`, `itemInfo`, `itemDescription`, `active`, `featured`, `image_name`) VALUES
(377, 'Dimitrios', '302', 'efwwewe', 'wfewefwe', 'on', 'on', 'item_subcategory_236.png');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `item_category`
--

CREATE TABLE `item_category` (
  `itemId` int(10) UNSIGNED NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL,
  `featured` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `item_category`
--

INSERT INTO `item_category` (`itemId`, `itemName`, `image_name`, `active`, `featured`) VALUES
(302, ' ΦΩΤΕΙΝΗ ΜΑΥΡΟΜΜΑΤΗ', 'item_category_221.jpg', 'on', 'on');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `newsletter`
--

INSERT INTO `newsletter` (`id`, `Email`, `date`) VALUES
(1, 'fenia.mavromati@gmail.com', '2021-09-25 10:44:28.290323'),
(2, 'dvortelinas@gmail.com', '2021-09-25 10:51:02.774446'),
(3, 'dvortelinas@gmail.com', '2021-09-25 10:51:08.791988'),
(4, 'fenia.mavromati@gmail.com', '2021-09-25 10:51:30.093137'),
(5, 'jvortelinas@gmail.com', '2021-09-25 11:32:31.637012'),
(6, 'fenia.mavromati@gmail.com', '2021-09-27 08:24:42.989467'),
(7, 'dvortelinas@gmail.com', '2021-10-03 10:57:37.922088'),
(8, 'dvortelinas@gmail.com', '2021-10-08 13:00:56.945414'),
(9, 'fenia.mavromati@gmail.com', '2021-10-08 13:01:20.714735'),
(10, 'jvortelinas@gmail.com', '2021-10-08 13:01:53.275492'),
(11, 'dvortelinas@gmail.com', '2021-10-08 13:03:37.290969');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `created_at`) VALUES
(8, 'jvorte', '$2y$10$/1fkxAf2XpXzOJVEfU0N7uF4H.GQ9.ISBiIMLDGoo8Mwt1xt/b0P2', '2021-10-27 10:29:44'),
(9, 'new', '$2y$10$7r6bBdh73mNC/XgGeLTdZOfwh6pKbgwzk2g6r2KO4PeApIvh4hX3y', '2021-10-27 11:18:23'),
(10, 'jvortelinas', '$2y$10$BPuG0H0zKtewyTwdtn49eOCHsVDHWXY2g1mrM/dPs7gbqSZEhh9dC', '2021-10-27 12:12:44');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Ευρετήρια για πίνακα `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`itemId`);

--
-- Ευρετήρια για πίνακα `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT για πίνακα `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT για πίνακα `item_category`
--
ALTER TABLE `item_category`
  MODIFY `itemId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT για πίνακα `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT για πίνακα `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
