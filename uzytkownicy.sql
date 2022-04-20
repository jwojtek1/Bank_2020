-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Cze 2020, 17:05
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bank`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(20) UNSIGNED NOT NULL,
  `nrkonta` char(26) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(40) NOT NULL,
  `datarejestracji` datetime NOT NULL DEFAULT current_timestamp(),
  `ulica` varchar(30) NOT NULL,
  `miasto` varchar(30) NOT NULL,
  `mail` text NOT NULL,
  `haslo` varchar(100) NOT NULL,
  `srodki` float NOT NULL,
  `uprawnienia` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `nrkonta`, `imie`, `nazwisko`, `datarejestracji`, `ulica`, `miasto`, `mail`, `haslo`, `srodki`, `uprawnienia`) VALUES
(7, '11111111111111111111111111', 'Patryk', 'Pakowski', '2020-06-04 16:59:24', 'Bąblasta', 'Łódź', 'patryk@gmail.com', '$2y$10$iHqy4UehXX4dkbybuPJO2eV1dh1BkeNUx6jdQbtvwB2gziLrs/CXe', 2089.95, 1),
(8, '99999999999999999999999999', 'Tomasz', 'Mieczyński', '2020-06-05 11:39:54', 'Fafika 21', 'Pieskowo', 'tomasz.mieczynski@gmail.com', '$2y$10$dhRi.mMjAf9QTSEUKCTkiuptaFcYSdnJpOMSxiBwD5sFm/.HQQIpW', 521, 0),
(9, '66666666666666666666666666', 'Aleksa', 'Adminowa', '2020-06-12 15:15:48', 'Robotnicza', 'Poznań', 'alexis@gmail.com', '$2y$10$JY9mQphPnx1cF5rJg7PL7.cpiWwHCV3uAYPAManMZClSiYSl3IpyK', 321, 1),
(10, '11112222333344445555666666', 'Ryszard', 'Kowalski', '2020-06-12 19:09:04', 'Pazurka', 'Kobaltowo', 'rysio@gmail.com', '$2y$10$ku7OCs9sLvejnLjiA3ae5u8sJZptikPTzgOD217gmuzOkSFiMCVb.', 963.05, 0),
(11, '11112222333344445555666661', 'Romek', 'ElPablo', '2020-06-12 19:09:57', 'Kwiatowa', 'Ryszardowo', 'romek@gmail.com', '$2y$10$77uEWexMNkE1X0fcGxQtOOmPkg/d5oaWZUy4I9JPgrNpaIXwsuvdW', 6789, 0),
(12, '22222222222222222222222222', 'Adam', 'Boberek', '2020-06-14 09:40:39', 'Fioletowa', 'Stolec', 'adamboberek@op.pl', '$2y$10$TJ.9wTv0BM1QgxEHHUmY1.fH0KtwJ9qkRPDueNss2G9hzdocDjNcm', 32, 1),
(13, '22222222222222222222322222', 'Rafałek', 'Powalski', '2020-06-14 09:42:36', 'Podziwianowa', 'Bielsko', 'mammaila@gmail.com', '$2y$10$h/jD5Mu2v/t9fCOM5WYQruBwZ7I7gxpkLUqdAo1NDbCUvSheF6jF2', 321, 0),
(14, '22222222222222223222222222', 'Barry', 'Hrudny', '2020-06-14 09:44:44', 'Patyczakowa', 'Piwot', 'hrudny@op.pl', '$2y$10$VYm74UPR3amJJQ1lD.1bVuyq7SgD4t9FanE8Zld/xsEITqxRFyr62', 32000, 0),
(15, '12345678955555678912345678', 'Alicja', 'Malicja', '2020-06-14 09:46:14', 'Spokojna', 'Alfabetowo', 'alicja@op.pl', '$2y$10$Lrbh5HQTxTOdPoGhXmtrSO1uA/QvU8gEUgeylCP/s/peqbedYsrbu', 14, 0),
(25, '44410458127934822496561564', 'Rafał', 'Pakos', '2020-06-18 17:02:15', 'Bobowa', 'Wrocław', 'rafal@gmail.com', '$2y$10$nnz3dAztT2mWu9Sc.5ir5eZ1bqQjkuPDvHaOjZOx2teZ5DU/pT42.', 945, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
