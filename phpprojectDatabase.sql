-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 07.Nov 2023, 17:07
-- Verzia serveru: 10.4.21-MariaDB
-- Verzia PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `phpproject`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `sellerID` int(11) NOT NULL,
  `sellerName` varchar(128) NOT NULL,
  `productName` varchar(128) NOT NULL,
  `productCategory` varchar(128) NOT NULL,
  `productPrice` varchar(128) NOT NULL,
  `productCondition` varchar(128) NOT NULL,
  `productDescription` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `products`
--

INSERT INTO `products` (`productID`, `sellerID`, `sellerName`, `productName`, `productCategory`, `productPrice`, `productCondition`, `productDescription`) VALUES
(8, 13, 'dog', 'House', 'home', '49', 'bad', 'Been using my crib for some while and its time to get new one'),
(10, 13, 'dog', 'Bone', 'other', '99', 'good', 'This is my favourite bone.'),
(11, 14, 'Sused', 'Psy', 'other', '1000', 'new', 'za kus mlade velmi dobry stav'),
(46, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(49, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(50, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(51, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(52, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(53, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(54, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(55, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(56, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(57, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(58, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(59, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(60, 8, 'xd', 'xd', '---', 'xd', '---', 'xdx'),
(61, 8, 'xd', 'xd', '---', 'xd', '---', 'xd'),
(65, 17, 'Prezentacia', 'd', '---', 'd', '---', 'd'),
(67, 19, 'kamilka', 'Filip', 'kids', '5', 'bad', 'predam pouzi');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersPassword`) VALUES
(4, 'JakubPotocky', 'jakubpatoky@gmail.com', 'dd'),
(6, 'dds', 'wtree9132@gmail.com', 'dd'),
(7, 'test', 'test@gmail.com', 'test'),
(8, 'xd', 'xd@gmail.com', 'xd'),
(12, 'ff', 'ff@gmail.com', 'ff'),
(13, 'dog', 'dog@gmail.com', 'dog'),
(14, 'Sused', 'sused@gmail.com', 'sused'),
(15, 'danko', 'danko@gmail.com', 'danko'),
(16, 'Danielko', 'danielkovac@gmail.com', 'danko'),
(17, 'Prezentacia', 'prezentacia@spsehalova.sk', 'p'),
(18, 'Jeden', 'jeden@gmail.com', '1'),
(19, 'kamilka', 'kamilka@gmail.com', 'kamilka');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
