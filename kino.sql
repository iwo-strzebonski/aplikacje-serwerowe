-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Wrz 2021, 21:02
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
-- Baza danych: `kino`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `seat` varchar(5) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `seats`
--

INSERT INTO `seats` (`id`, `title`, `login`, `seat`) VALUES
(1, 'Gwiezdne wojny: Część IV - Nowa nadzieja', 'abc', '1-1'),
(5, 'Gwiezdne wojny: Część IV - Nowa nadzieja', 'abc', '9-7'),
(6, 'Gwiezdne wojny: Część IV - Nowa nadzieja', 'abc', '9-8'),
(8, 'Gwiezdne wojny: Część IV - Nowa nadzieja', 'abc', '10-8'),
(11, 'Fate/Stay night: Heaven\'s Feel III. spring song', 'abc', '13-7'),
(26, 'Fate/Stay night: Heaven\'s Feel III. spring song', 'abc', '1-1'),
(27, 'Fate/Stay night: Heaven\'s Feel III. spring song', 'abc', '1-2'),
(28, 'Fate/Stay night: Heaven\'s Feel III. spring song', 'abc', '2-1'),
(29, 'Fate/Stay night: Heaven\'s Feel III. spring song', 'abc', '2-2');

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
(6, 'Fate/Stay night: Heaven\'s Feel III. spring song', 'fate-stay-night-heavens-feel-iii-spring-song.jpg', 'Wojna Świętego Graala: brutalna bitwa pomiędzy magami, w której siedmiu mistrzów i ich przyzwani słudzy walczą o Świętego Graala, magiczny artefakt potrafiący spełnić każde życzenie. Prawie 10 lat temu, finałowa walka Czwartego Świętego Graala spowodowała zniszczenia w mieście Fuyuki i zabrała ponad 500 istnień, pozostawiając miasto zdewastowane. Shirou Emiya, niedobitek tej tragedii, aspiruje do zostania Bohaterem Sprawiedliwości jak jego wybawca i przybrany ojciec, Kiritsugu Emiya. Pomimo bycia zwyczajnym uczniem, Shirou jest wrzucony w Piątą Wojnę Świętego Graala kiedy przypadkowo widzi walkę pomiędzy sługami w szkole i wzywa swojego własnego, Saber. Kiedy tajemniczy cień zaczyna rzeź w Fuyuki, Shirou łączy siły z Rin Toosaką, inną uczestniczką Wojny Świętego Graala, w celu zatrzymania śmierci niezliczonej liczby ludzi. Jednak, uczucia Shirou do jego bliskiej przyjaciółki Sakury Matou prowadzą go głębiej w mroczne sekrety otaczające wojnę i zwaśnionych rodów w nią zaangażowanych.<br />\r\n<br />\r\nGatunek: Dramat / Fantasy / Anime<br />\r\nProdukcja: Japonia<br />\r\nPremiera: 15 sierpnia 2020 (świat)  ');

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
-- Indeksy dla tabeli `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`) USING BTREE,
  ADD KEY `login` (`login`);

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
-- AUTO_INCREMENT dla tabeli `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`login`) REFERENCES `users` (`login`),
  ADD CONSTRAINT `seats_ibfk_2` FOREIGN KEY (`title`) REFERENCES `shows` (`title`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
