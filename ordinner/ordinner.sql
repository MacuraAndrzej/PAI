-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Czas generowania: 28 Sty 2020, 12:03
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
  `User` int(11) NOT NULL,
  `food` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `food_type`
--

CREATE TABLE `food_type` (
  `ID` int(11) NOT NULL,
  `FOOD_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `food_type`
--

INSERT INTO `food_type` (`ID`, `FOOD_NAME`) VALUES
(1, 'soup'),
(2, 'main'),
(3, 'drinks');

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
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
