-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Paź 2021, 22:06
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
-- Baza danych: `istrzebonski`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dates`
--

CREATE TABLE `dates` (
  `id` int(11) NOT NULL,
  `show_dt` datetime NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dates`
--

INSERT INTO `dates` (`id`, `show_dt`, `title`) VALUES
(1, '2021-10-11 12:00:00', 'Człowiek z blizną'),
(5, '2021-10-11 08:45:00', 'Fate/Stay night: Heaven\'s Feel III. spring song'),
(6, '2021-10-10 15:00:00', 'Człowiek z blizną'),
(14, '2021-10-12 08:45:00', 'Smoleńsk'),
(15, '2021-10-12 11:00:00', 'Smoleńsk'),
(16, '2021-10-12 13:15:00', 'Smoleńsk'),
(17, '2021-10-12 15:30:00', 'Smoleńsk'),
(18, '2021-10-12 17:45:00', 'Smoleńsk'),
(19, '2021-10-12 20:00:00', 'Smoleńsk'),
(20, '2021-10-10 08:45:00', 'Gwiezdne wojny: Część IV - Nowa nadzieja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `seat` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `show_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `seats`
--

INSERT INTO `seats` (`id`, `title`, `login`, `seat`, `show_dt`) VALUES
(34, 'Człowiek z blizną', 'abc', '1-1', '2021-10-10 15:00:00'),
(35, 'Człowiek z blizną', 'abc', '1-2', '2021-10-10 15:00:00'),
(36, 'Człowiek z blizną', 'abc', '2-2', '2021-10-10 15:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `poster` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(1500) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `shows`
--

INSERT INTO `shows` (`id`, `title`, `poster`, `description`) VALUES
(1, 'Gwiezdne wojny: Część IV - Nowa nadzieja', 'star-wars-iv-a-new-hope.jpg', 'Złowrogie Imperium zawładnęło galaktyką. Uwięzionej przez Dartha Vadera księżniczce Lei z nieoczekiwaną pomocą przyjdą kosmiczny przemytnik Han Solo i młody Luke Skywalker.<br />\r\n<br />\r\nReżyseria: George Lucas<br />\r\nScenariusz: George Lucas<br />\r\nGatunek: Przygodowy / Sci-Fi<br />\r\nProdukcja: USA<br />\r\nPremiera: 25 maja 1977 (świat)<br />\r\nUniwersum: Gwiezdne Wojny'),
(2, 'Człowiek z blizną', 'scarface.jpg', 'Kubański emigrant Tony Montana opuszcza ojczyznę i przybywa do Miami. Razem z przyjacielem, Mannym Riberą, zaczyna pracować dla mafii narkotykowej.<br />\r\n<br />\r\nGatunek: Dramat / Gangsterski<br />\r\nProdukcja: USA<br />\r\nPremiera: 1 grudnia 1983 (świat)<br />\r\nNagrody: Film dostał 2 nagrody i 6 nominacji '),
(6, 'Fate/Stay night: Heaven\'s Feel III. spring song', 'fate-stay-night-heavens-feel-iii-spring-song.jpg', 'Wojna Świętego Graala: brutalna bitwa pomiędzy magami, w której siedmiu mistrzów i ich przyzwani słudzy walczą o Świętego Graala, magiczny artefakt potrafiący spełnić każde życzenie. Prawie 10 lat temu, finałowa walka Czwartego Świętego Graala spowodowała zniszczenia w mieście Fuyuki i zabrała ponad 500 istnień, pozostawiając miasto zdewastowane. Shirou Emiya, niedobitek tej tragedii, aspiruje do zostania Bohaterem Sprawiedliwości jak jego wybawca i przybrany ojciec, Kiritsugu Emiya. Pomimo bycia zwyczajnym uczniem, Shirou jest wrzucony w Piątą Wojnę Świętego Graala kiedy przypadkowo widzi walkę pomiędzy sługami w szkole i wzywa swojego własnego, Saber. Kiedy tajemniczy cień zaczyna rzeź w Fuyuki, Shirou łączy siły z Rin Toosaką, inną uczestniczką Wojny Świętego Graala, w celu zatrzymania śmierci niezliczonej liczby ludzi. Jednak, uczucia Shirou do jego bliskiej przyjaciółki Sakury Matou prowadzą go głębiej w mroczne sekrety otaczające wojnę i zwaśnionych rodów w nią zaangażowanych.<br />\r\n<br />\r\nGatunek: Dramat / Fantasy / Anime<br />\r\nProdukcja: Japonia<br />\r\nPremiera: 15 sierpnia 2020 (świat)  '),
(7, 'Smoleńsk', 'smolensk.jpg', 'Młoda dziennikarka na własną rękę prowadzi dochodzenie w sprawie katastrofy smoleńskiej.<br>\r\n<br>\r\nGatunek: Dramat<br>\r\nProdukcja: Polska<br>\r\nPremiera: 5 września 2016 (świat)<br>\r\nNagrody: Film dostał 7 nagród i 10 nominacji');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `password` binary(16) NOT NULL,
  `phone` varchar(9) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `phone`) VALUES
(1, 'abc', 0x900150983cd24fb0d6963f7d28e17f72, '123123123'),
(6, 'qwe', 0x76d80224611fc919a5d54f0ff9fba446, '321321321');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `show_dt` (`show_dt`);

--
-- Indeksy dla tabeli `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`) USING BTREE,
  ADD KEY `login` (`login`),
  ADD KEY `show_dt` (`show_dt`);

--
-- Indeksy dla tabeli `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dates`
--
ALTER TABLE `dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT dla tabeli `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dates`
--
ALTER TABLE `dates`
  ADD CONSTRAINT `dates_ibfk_1` FOREIGN KEY (`title`) REFERENCES `shows` (`title`);

--
-- Ograniczenia dla tabeli `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`login`) REFERENCES `users` (`login`),
  ADD CONSTRAINT `seats_ibfk_2` FOREIGN KEY (`title`) REFERENCES `shows` (`title`),
  ADD CONSTRAINT `seats_ibfk_3` FOREIGN KEY (`show_dt`) REFERENCES `dates` (`show_dt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
