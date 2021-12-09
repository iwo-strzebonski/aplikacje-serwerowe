-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Gru 2021, 17:23
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `admin_privileges` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_user_id`, `admin_privileges`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(11) NOT NULL,
  `archive_reservation_id` int(11) NOT NULL,
  `archive_user_id` int(11) NOT NULL,
  `archive_car_id` int(11) NOT NULL,
  `archive_date_start` date NOT NULL,
  `archive_date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `archive`
--

INSERT INTO `archive` (`archive_id`, `archive_reservation_id`, `archive_user_id`, `archive_car_id`, `archive_date_start`, `archive_date_end`) VALUES
(0, 1, 2, 1, '2021-12-09', '2021-12-10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_brand` varchar(12) COLLATE utf8_bin NOT NULL,
  `car_model` varchar(12) COLLATE utf8_bin NOT NULL,
  `car_price` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `cars`
--

INSERT INTO `cars` (`car_id`, `car_brand`, `car_model`, `car_price`) VALUES
(1, 'LADA', '2107', 127);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `reservation_user_id` int(11) NOT NULL,
  `reservation_car_id` int(11) NOT NULL,
  `reservation_date_start` date NOT NULL,
  `reservation_date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_user_id`, `reservation_car_id`, `reservation_date_start`, `reservation_date_end`) VALUES
(2, 1, 1, '2021-12-12', '2021-12-17');

--
-- Wyzwalacze `reservations`
--
DELIMITER $$
CREATE TRIGGER `delete_reservation` BEFORE DELETE ON `reservations` FOR EACH ROW BEGIN
    INSERT INTO `archive` (archive_reservation_id, archive_user_id, archive_car_id, archive_date_start, archive_date_end)
    VALUES (OLD.reservation_id, OLD.reservation_user_id, OLD.reservation_car_id, OLD.reservation_date_start, OLD.reservation_date_end);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(15) COLLATE utf8_bin NOT NULL,
  `user_passwd` binary(16) NOT NULL,
  `user_first_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `user_last_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `user_mail` varchar(30) COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(12) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_passwd`, `user_first_name`, `user_last_name`, `user_mail`, `user_phone`) VALUES
(1, 'octoturge', 0x900150983cd24fb0d6963f7d28e17f72, 'Iwo', 'Strzeboński', 'octoturge@octo-3d.tech', '123456789'),
(2, 'test', 0x76d80224611fc919a5d54f0ff9fba446, 'Te', 'St', 'test@example.com', '098765432');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_user_id` (`admin_user_id`),
  ADD KEY `admin_user_id_2` (`admin_user_id`);

--
-- Indeksy dla tabeli `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`),
  ADD UNIQUE KEY `archive_reservation_id` (`archive_reservation_id`),
  ADD KEY `archive_user_id` (`archive_user_id`),
  ADD KEY `archive_car_id` (`archive_car_id`);

--
-- Indeksy dla tabeli `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservation_car_id` (`reservation_car_id`),
  ADD KEY `reservation_user_id` (`reservation_user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`),
  ADD UNIQUE KEY `user_phone` (`user_phone`),
  ADD UNIQUE KEY `user_login` (`user_login`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`admin_user_id`) REFERENCES `users` (`user_id`);

--
-- Ograniczenia dla tabeli `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `archive_ibfk_1` FOREIGN KEY (`archive_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `archive_ibfk_2` FOREIGN KEY (`archive_car_id`) REFERENCES `cars` (`car_id`);

--
-- Ograniczenia dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`reservation_car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`reservation_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
