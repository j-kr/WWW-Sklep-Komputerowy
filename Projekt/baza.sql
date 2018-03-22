-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Cze 2017, 00:05
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lista_zdjec`
--

CREATE TABLE `lista_zdjec` (
  `ID_zdjecia` int(11) NOT NULL,
  `ID_przedmiotu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `lista_zdjec`
--

INSERT INTO `lista_zdjec` (`ID_zdjecia`, `ID_przedmiotu`) VALUES
(1, 9),
(2, 10),
(1, 11),
(2, 11),
(5, 9),
(3, 1),
(3, 2),
(3, 2),
(3, 3),
(4, 5),
(4, 6),
(5, 4),
(5, 7),
(5, 8),
(3, 10),
(4, 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producent`
--

CREATE TABLE `producent` (
  `ID` smallint(6) NOT NULL,
  `Nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Adres` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `producent`
--

INSERT INTO `producent` (`ID`, `Nazwa`, `Adres`) VALUES
(1, 'AMD', 'Normalna 2'),
(2, 'Intel', 'Piastowska 2'),
(3, 'Apple', 'Celna 4'),
(5, 'Samsung', 'Wrocławska 3'),
(6, 'A4 Tech', 'Ujejskiego 6');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `ID` smallint(6) NOT NULL,
  `Producent_ID` smallint(6) NOT NULL,
  `Nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Kategoria` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Cena` double NOT NULL,
  `Opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Zdjecie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`ID`, `Producent_ID`, `Nazwa`, `Kategoria`, `Cena`, `Opis`, `Zdjecie`) VALUES
(1, 2, 'i7 3550', 'Procesor', 720, 'Bardzo szybki', 'p.jpg'),
(2, 1, 'Ryzen x7', 'Procesor', 820, 'Wydajny', 'p.jpg'),
(3, 2, 'i5 4450', 'Procesor', 540, 'Dobrze wykonany', 'p.jpg'),
(4, 3, 'Iphone 7', 'Telefon', 3000, 'Dogi', 't.jpg'),
(5, 6, 'E54', 'Klawiatura', 100, 'Mechaniczna', 'k.jpg'),
(6, 6, 'x75', 'Klawiatura', 220, 'Dla graczy', 'k.jpg'),
(7, 3, 'Iphone 6', 'Telefon', 2500, 'Nie zacina', 't.jpg'),
(8, 5, 'S7 Edge', 'Telefon', 2800, 'Zakrzywione krawedzie', 't.jpg'),
(9, 5, 'S8', 'Telefon', 3200, 'Najnowszy', 't.jpg'),
(10, 1, 'Ryzen x2', 'Procesor', 800, 'Dla rodzin z dziecmi', 'p.jpg'),
(11, 6, 'X69', 'Klawiatura', 200, 'Dziala', 'k.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `password` text COLLATE utf8mb4_polish_ci NOT NULL,
  `czy_Admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID_user`, `login`, `password`, `czy_Admin`) VALUES
(1, 'admin', 'admin', 1),
(2, 'user', 'user', 0),
(3, 'Ania', 'Ania', 0),
(4, 'Janek', 'Janek', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE `zdjecia` (
  `Nazwa_zdjecia` text COLLATE utf8mb4_polish_ci NOT NULL,
  `ID_zdjecia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zdjecia`
--

INSERT INTO `zdjecia` (`Nazwa_zdjecia`, `ID_zdjecia`) VALUES
('p.jpg', 3),
('k.jpg', 4),
('t.jpg', 5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `producent`
--
ALTER TABLE `producent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Producent_ID` (`Producent_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`);

--
-- Indexes for table `zdjecia`
--
ALTER TABLE `zdjecia`
  ADD PRIMARY KEY (`ID_zdjecia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `producent`
--
ALTER TABLE `producent`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  MODIFY `ID_zdjecia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD CONSTRAINT `produkt_ibfk_1` FOREIGN KEY (`Producent_ID`) REFERENCES `producent` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
