-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Lis 2019, 09:58
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
-- Struktura tabeli dla tabeli `uzytkownicy`
--
-- Utworzenie: 27 Lis 2019, 08:56
-- Ostatnia aktualizacja: 27 Lis 2019, 08:57
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL COMMENT 'klucz główny',
  `login` varchar(50) NOT NULL COMMENT 'login użytkownika',
  `stanowisko` enum('Administrator','Uzytkownik') CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'Uzytkownik' COMMENT 'stanowisko / typ konta',
  `haslo` varchar(50) NOT NULL COMMENT 'hasło użytkownika'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dane użytkowników';

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `stanowisko`, `haslo`) VALUES
(1, 'czarek', 'Uzytkownik', '9e38e8d688743e0d07d669a1fcbcd35b'),
(2, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indeksy dla zrzutów tabel
--

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
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'klucz główny', AUTO_INCREMENT=3;


--
-- Metadane
--
USE `phpmyadmin`;

--
-- Metadane dla tabeli uzytkownicy
--

--
-- Zrzut danych tabeli `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'cd4ti', 'uzytkownicy', '[]', '2019-11-27 08:57:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
