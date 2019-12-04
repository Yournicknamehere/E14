-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Gru 2019, 13:16
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

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL COMMENT 'Nazwa klienta',
  `adres` varchar(50) NOT NULL COMMENT 'Adres klienta',
  `miasto` varchar(30) NOT NULL COMMENT 'Miasto klienta',
  `kraj` varchar(30) NOT NULL COMMENT 'Kraj pochodzenia klienta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dane klientów';

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id`, `nazwa`, `adres`, `miasto`, `kraj`) VALUES
(1, 'UK', '120 Hanover Sq.', 'London', 'XD'),
(2, 'Bottom-Dollar Marketse', '23 Tsawassen Blvd.', 'Tsawassen', 'Canada'),
(3, 'Cactus Comidas para llevar', 'Cerrito 333', 'Buenos Aires', 'Argentina'),
(4, 'Centro comercial Moctezuma', 'Sierras de Granada 9993', 'Mexico D.F.', 'Mexico'),
(5, 'Chop-suey Chinese', 'Hauptstr. 29', 'Bern', 'Switzerland'),
(6, 'Comercio Mineiro', 'Av. dos Lusiadas, 23', 'Sao Paulo', 'Brazil'),
(7, 'Consolidated Holdings', 'Berkeley Gardens 12 Brewery', 'London', 'UK'),
(8, 'Du monde entier', '67, rue des Cinquante Otages', 'Nantes', 'France'),
(9, 'Eastern Connection', '35 King George', 'London', 'UK'),
(10, 'Franchi S.p.A.', 'Via Monte Bianco 34', 'Torino', 'Italy'),
(11, 'Great Lakes Food Market', '2732 Baker Blvd.', 'Eugene', 'USA'),
(12, 'Hungry Coyote Import Store', 'City Center Plaza 516 Main St.', 'Elgin', 'USA'),
(13, 'The Cracker Box', '55 Grizzly Peak Rd.', 'Butte', 'USA'),
(14, 'Wilman Kala', 'Keskuskatu 45', 'Helsinki', 'Finland'),
(15, 'Wolski', 'ul. Filtrowa 68', 'Walla', 'Poland'),
(16, 'White Clover Markets', '305 - 14th Ave. S. Suite 3B', 'Seattle', 'USA');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL COMMENT 'klucz główny',
  `login` varchar(50) NOT NULL COMMENT 'login użytkownika',
  `imie` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'Nie podano' COMMENT 'Imie użytkownika',
  `nazwisko` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'Nie podano' COMMENT 'Nazwisko użytkownika',
  `email` varchar(50) DEFAULT NULL COMMENT 'Adres E-mail użytkownika',
  `stanowisko` enum('Administrator','Uzytkownik') CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'Uzytkownik' COMMENT 'stanowisko / typ konta',
  `haslo` varchar(50) NOT NULL COMMENT 'hasło użytkownika'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dane użytkowników';

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `imie`, `nazwisko`, `email`, `stanowisko`, `haslo`) VALUES
(1, 'czarek', 'Cezary', 'Durkalec', 'czadur@gmail.com', 'Uzytkownik', '9e38e8d688743e0d07d669a1fcbcd35b'),
(2, 'admin', 'Administrator', 'Systemu', 'admin@thispage.net', 'Administrator', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'szybki', 'Władysław', 'Chciwonosy', 'szybki@wlad.fu', 'Uzytkownik', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nazwa` (`nazwa`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'klucz główny', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
