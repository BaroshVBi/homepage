-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Maj 2023, 13:15
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `puw`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `apps`
--

CREATE TABLE `apps` (
  `id` int(11) NOT NULL,
  `app_name` text NOT NULL,
  `app_category_id` int(11) NOT NULL,
  `app_link` text NOT NULL,
  `app_logo_link` text NOT NULL,
  `app_bg_link` text NOT NULL,
  `app_bg_color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `apps`
--

INSERT INTO `apps` (`id`, `app_name`, `app_category_id`, `app_link`, `app_logo_link`, `app_bg_link`, `app_bg_color`) VALUES
(1, 'Youtube', 1, 'https://www.youtube.com/', 'defaultlogo.png', '', 'f44336');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `user_login` varchar(11) NOT NULL,
  `user_dn` text NOT NULL,
  `title` text NOT NULL,
  `descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `calendar`
--

INSERT INTO `calendar` (`id`, `date`, `time`, `user_login`, `user_dn`, `title`, `descr`) VALUES
(1, '2023-04-12', '12:49:08', '1', '', 'Test', 'Nowe ogłoszenie'),
(2, '2023-04-04', '11:33:13', '3', '', 'title', 'testowe ogloszenie'),
(3, '2023-04-12', '11:52:09', '2', '', 'tesdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddst2', 'test'),
(4, '2023-04-12', '12:11:02', '6', '', 'tytul', 'halo\r\n\r\nhalo\r\n\r\nhads\r\na\r\nsd\r\n\r\n\r\nsdfsd'),
(5, '2023-05-02', '27:22:29', 'guzb', 'Bartosz Guz', 'testwo', ' no nie wiem'),
(6, '2023-05-11', '14:57:00', 'guzb', 'Bartosz Guz', 'e', 'test'),
(7, '0000-00-00', '00:00:00', 'guzb', 'Bartosz Guz', '', ''),
(8, '0000-00-00', '00:00:00', 'guzb', 'Bartosz Guz', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Ogólne'),
(2, 'Kadry');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `descr` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_login` text NOT NULL,
  `user_dn` text NOT NULL,
  `user_lvl` int(11) NOT NULL DEFAULT 1,
  `tel` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
