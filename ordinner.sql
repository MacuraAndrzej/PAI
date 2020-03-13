-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Czas generowania: 13 Mar 2020, 07:38
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ordinner`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `food`
--

CREATE TABLE `food` (
  `ID` int(11) NOT NULL,
  `TYPE_ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `PRICE` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `food`
--

INSERT INTO `food` (`ID`, `TYPE_ID`, `NAME`, `PRICE`, `image`) VALUES
(1, 1, 'pomidorowa', 5, 'first.jpg'),
(2, 1, 'grzybowa', 3, 'second.jpg'),
(3, 2, 'mielone', 15, 'third.jpg'),
(4, 2, 'schabowy', 16, 'fourth.jpg'),
(5, 2, 'kurczak pieczony', 20, 'five.jpg'),
(6, 3, 'woda', 1, 'six.jpg'),
(7, 3, 'wino', 10, 'seven.jpg'),
(8, 3, 'sok', 6, 'eight.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `food_order`
--

CREATE TABLE `food_order` (
  `ID` int(11) NOT NULL,
  `foodID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `STATUS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `food_order`
--

INSERT INTO `food_order` (`ID`, `foodID`, `quantity`, `USER_ID`, `STATUS`) VALUES
(71, 1, 1, 2, 'ready'),
(72, 5, 1, 2, 'ready'),
(73, 2, 1, 2, 'ready'),
(74, 1, 3, 2, 'ready'),
(75, 4, 1, 2, 'ready'),
(76, 7, 1, 2, 'ready'),
(77, 2, 2, 2, 'ready'),
(78, 6, 1, 2, 'ready'),
(79, 1, 4, 2, 'ready'),
(80, 6, 1, 2, 'ready'),
(81, 4, 4, 2, 'ORDERED'),
(82, 2, 3, 2, 'ready');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `food_type`
--

CREATE TABLE `food_type` (
  `ID` int(11) NOT NULL,
  `TYPE_NAME` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `food_type`
--

INSERT INTO `food_type` (`ID`, `TYPE_NAME`, `image`) VALUES
(1, 'soup', 'first.jpg'),
(2, 'main', 'first.jpg'),
(3, 'drinks', 'first.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Role` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `Name`, `Role`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@admin.admin', '$2y$10$dnu49XypLMKeUMjX9KX18.D2Ouf2qTw8/0Zxne4DORvZPWv1I8Ca.'),
(2, 'user', 'user', 'user@user.user', '$2y$10$IT8ZZN.h.d7BYJIKkDcBwuh5FLHcuu5UPE8g4AxefuAmLwo0nlc1W');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `food_order`
--
ALTER TABLE `food_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT dla tabeli `food_type`
--
ALTER TABLE `food_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
