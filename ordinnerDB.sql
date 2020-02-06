-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Czas generowania: 06 Lut 2020, 16:23
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
  `FOOD_TYPE` text NOT NULL,
  `NAME` text NOT NULL,
  `PRICE` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `food`
--

INSERT INTO `food` (`ID`, `FOOD_TYPE`, `NAME`, `PRICE`, `image`) VALUES
(1, '1', 'pomidorowa', 5, 'first.jpg'),
(2, '1', 'grzybowa', 3, 'second.jpg'),
(3, '2', 'mielone', 15, 'third.jpg'),
(4, '2', 'schabowy', 16, 'fourth.jpg'),
(5, '2', 'kurczak pieczony', 20, 'five.jpg'),
(6, '3', 'woda', 1, 'six.jpg'),
(7, '3', 'wino', 10, 'seven.jpg'),
(8, '3', 'sok', 6, 'eight.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `food_order`
--

CREATE TABLE `food_order` (
  `ID` int(11) NOT NULL,
  `foodID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ORDERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `food_order`
--

INSERT INTO `food_order` (`ID`, `foodID`, `quantity`, `ORDERID`) VALUES
(49, 1, 1, 0),
(50, 4, 1, 0),
(51, 7, 4, 0),
(52, 3, 3, 47),
(53, 7, 1, 47),
(54, 1, 1, 47),
(55, 2, 2, 47),
(56, 1, 3, 47),
(57, 1, 1, 52),
(58, 4, 4, 52),
(59, 4, 4, 52),
(60, 1, 1, 52),
(61, 2, 3, 52),
(62, 4, 1, 52),
(63, 3, 1, 52),
(64, 2, 3, 55),
(65, 2, 1, 56),
(66, 6, 1, 58),
(67, 8, 1, 58),
(68, 4, 1, 58),
(69, 5, 1, 58),
(70, 7, 1, 58);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `food_type`
--

CREATE TABLE `food_type` (
  `ID` int(11) NOT NULL,
  `FOOD_NAME` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `food_type`
--

INSERT INTO `food_type` (`ID`, `FOOD_NAME`, `image`) VALUES
(1, 'soup', 'first.jpg'),
(2, 'main', 'first.jpg'),
(3, 'drinks', 'first.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `full_order`
--

CREATE TABLE `full_order` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `full_order`
--

INSERT INTO `full_order` (`ID`, `Date`, `Status`) VALUES
(47, '2020-02-06', 'ordered'),
(48, '2020-02-06', 'ordered'),
(49, '2020-02-06', 'ordered'),
(50, '2020-02-06', 'ordered'),
(51, '2020-02-06', 'ordered'),
(52, '2020-02-06', 'ordered'),
(53, '2020-02-06', 'ordered'),
(54, '2020-02-06', 'ordered'),
(55, '2020-02-06', 'ordered'),
(56, '2020-02-06', 'ordered'),
(57, '2020-02-06', 'ordered'),
(58, '2020-02-06', 'ordered');

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
(1, 'admin', 'admin', 'admin@admin.admin', 'admin'),
(2, 'user', 'user', 'user@user.user', 'user');

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
-- Indeksy dla tabeli `full_order`
--
ALTER TABLE `full_order`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT dla tabeli `food_type`
--
ALTER TABLE `food_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `full_order`
--
ALTER TABLE `full_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
