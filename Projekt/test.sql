-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Kwi 2015, 21:42
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `test`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producent`
--

CREATE TABLE IF NOT EXISTS `producent` (
`ID` smallint(6) NOT NULL,
  `Nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Adres` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `producent`
--

INSERT INTO `producent` (`ID`, `Nazwa`, `Adres`) VALUES
(1, 'AMD', 'Kolejowa 1'),
(2, 'Intel', 'Piastowska 2'),
(3, 'Qwerty', 'Krzywa 3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE IF NOT EXISTS `produkt` (
`ID` smallint(6) NOT NULL,
  `Producent_ID` smallint(6) NOT NULL,
  `Nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Kategoria` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Cena` double NOT NULL,
  `Opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Zdjecie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`ID`, `Producent_ID`, `Nazwa`, `Kategoria`, `Cena`, `Opis`, `Zdjecie`) VALUES
(1, 1, 'Hyper CPU', 'Procesor', 400, 'Wincyj mocy, wincyj mocy', 'p.jpg'),
(2, 1, 'y4 overclocked', 'Procesor', 600, 'Fajny i szybki', 'p.jpg'),
(3, 2, 'Super Duperon i7', 'Procesor', 800, 'Bardzo mocny procek', 'p.jpg'),
(4, 2, 'Celeron Blabla', 'Procesor', 200, 'Budżetowa wersja', 'p.jpg'),
(5, 3, 'Wypas Klawa', 'Klawiatura', 20, 'Klawa dla każdego!', 'k.jpg');

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
 ADD PRIMARY KEY (`ID`), ADD KEY `Producent_ID` (`Producent_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `producent`
--
ALTER TABLE `producent`
MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `produkt`
--
ALTER TABLE `produkt`
MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
