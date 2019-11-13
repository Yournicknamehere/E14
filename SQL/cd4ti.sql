-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Lis 2019, 12:48
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cd4ti`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--
-- Utworzenie: 13 Lis 2019, 11:46
-- Ostatnia aktualizacja: 13 Lis 2019, 11:42
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL COMMENT 'klucz główny',
  `nazwa` varchar(50) NOT NULL COMMENT 'nazwa klienta',
  `adres` varchar(50) NOT NULL COMMENT 'adres klienta',
  `miasto` varchar(50) NOT NULL COMMENT 'miasto',
  `kraj` varchar(30) NOT NULL COMMENT 'kraj'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dane klientów';

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id`, `nazwa`, `adres`, `miasto`, `kraj`) VALUES
(1, 'Around the Horn', '120 Hanover Sq.', 'London', 'UK'),
(2, 'Bottom-Dollar Marketse', '23 Tsawassen Blvd.', 'Tsawassen', 'Canada'),
(3, 'Cactus Comidas para llevar', 'Cerrito 333', 'Buenos Aires', 'Argentina'),
(4, 'Centro comercial Moctezuma', 'Sierras de Granada 9993', 'Mexico D.F.', 'Mexico'),
(5, 'Consolidated Holdings', 'Berkeley Gardens 12 Brewery', 'London', 'UK'),
(6, 'Ernst Handel', 'Kirchgasse 6', 'Graz', 'Austria'),
(7, 'Franchi S.p.A.', 'Via Monte Bianco 34', 'Torino', 'Italy'),
(8, 'Furia Bacalhau e Frutos do Mar', 'Jardim das rosas n. 32', 'Lisboa', 'Portugal'),
(9, 'Great Lakes Food Market', '2732 Baker Blvd.', 'Eugene', 'USA'),
(10, 'Hungry Owl All-Night Grocers', '8 Johnstown Road', 'Cork', 'Ireland');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--
-- Utworzenie: 13 Lis 2019, 11:46
-- Ostatnia aktualizacja: 13 Lis 2019, 11:30
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL COMMENT 'klucz główny',
  `login` varchar(50) NOT NULL COMMENT 'login użytkownika',
  `stanowisko` enum('Administrator','Użytkownik') NOT NULL COMMENT 'stanowisko / typ konta',
  `haslo` varchar(50) NOT NULL COMMENT 'hasło użytkownika'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dane użytkowników';

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `stanowisko`, `haslo`) VALUES
(1, 'czarek', '', '9e38e8d688743e0d07d669a1fcbcd35b');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'klucz główny', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'klucz główny', AUTO_INCREMENT=2;


--
-- Metadane
--
USE `phpmyadmin`;

--
-- Metadane dla tabeli klienci
--

--
-- Metadane dla tabeli uzytkownicy
--

--
-- Metadane dla Bazy danych cd4ti
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
