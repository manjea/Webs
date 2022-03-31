-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 04 mars 2022 kl 10:15
-- Serverversion: 10.4.21-MariaDB
-- PHP-version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `loginexam`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `posts`
--

CREATE TABLE `posts` (
  `to_user_id` int(2) UNSIGNED NOT NULL,
  `post_id` int(2) UNSIGNED NOT NULL,
  `from_user_id` int(2) UNSIGNED NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `posts`
--

INSERT INTO `posts` (`to_user_id`, `post_id`, `from_user_id`, `text`, `date`) VALUES
(2, 7, 4, 'hejsan milton -mvh manfred', '2022-03-01 14:49:33'),
(2, 8, 4, 'hejsan MILTON!!', '2022-03-04 10:04:33'),
(5, 9, 2, 'Tjenare Johan! L&auml;get?', '2022-03-04 10:09:00');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `user_id` int(2) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'Jonatan', 'Lindell', 'jonlin', '$2y$10$PLyNmCVJG1ACO90Uf0gN1OPpqN81uOk5u3XQFeq12R0DcI6bSBmaC'),
(2, 'Milton', 'Lundström', 'millun', '$2y$10$iwj0XpgLWD1ZQne/359uYu1ZNdZL0YKA/lVkUdmKsLFmNNag5w/lW'),
(3, 'Matthias', 'Sandström', 'matsan', '$2y$10$pBHNH36DgEDxaXJaCvcjbO.hNC6CSOGP2jqp16Pw38jmQy87FAZwi'),
(4, 'Manfred', 'Jeansson', 'manjea', '$2y$10$1PJDMCzzFL7JwUnErUFODOYJqdEIXqMTE8ppkyp5njLr8HDCuSuB6'),
(5, 'Johan', 'Englund', 'joheng', '$2y$10$iVg1EvziqWzwNF9WoOGZ8eVu6Jv7fq95lDOJUW6AqWWhhF9dqn5AS'),
(8, 'Milton', 'Lundström', 'gastro', '$2y$10$wOKWZelIVp4AHebqwYG8u.c7qem0mlNa0Ra28GCfTndfOsIEDcMe6'),
(10, 'Milton2', 'Lundstr&ouml;m2', 'millun2', '$2y$10$DXn8/pPMNeBYZIVuqI7ax.Zz5lEzX6/2h4GqRd8X/EOnUt28PuvY6'),
(11, 'abc', 'abc', 'abc', 'abc');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
