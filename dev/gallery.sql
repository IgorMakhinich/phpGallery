-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Бер 30 2022 р., 18:32
-- Версія сервера: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- Версія PHP: 7.2.34-28+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`, `date`) VALUES
(0, 12, 'Анчоус', 'Comment from Anchovas', '2022-03-14 19:27:24');

-- --------------------------------------------------------

--
-- Структура таблиці `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`, `date`) VALUES
(12, 'CAR', 'caption', '<p>dsecription</p>', 'images-5.jpg', 'alternate text', 'image/jpeg', 33192, '2022-03-14'),
(13, 'car3', '', '', 'images-11.jpg', '', 'image/jpeg', 27916, '2022-03-16'),
(14, 'car crash', '', '', 'images-15.jpg', '', 'image/jpeg', 28466, '2022-03-16'),
(15, 'left door', '', '', 'images-12.jpg', '', 'image/jpeg', 18540, '2022-03-16'),
(16, '', '', '', 'images-23.jpg', '', 'image/jpeg', 22792, '2022-03-16'),
(17, '', '', '', 'images-42.jpg', '', 'image/jpeg', 22401, '2022-03-16'),
(18, '', '', '', 'images-50.jpg', '', 'image/jpeg', 21652, '2022-03-16'),
(19, '44', '', '', 'images-44.jpg', '', 'image/jpeg', 29486, '2022-03-21'),
(20, '43', '', '', 'images-43.jpg', '', 'image/jpeg', 27955, '2022-03-21'),
(21, '41', '', '', 'images-41.jpg', '', 'image/jpeg', 16296, '2022-03-21'),
(22, '40', '', '', 'images-40.jpg', '', 'image/jpeg', 24385, '2022-03-21'),
(23, '39', '', '', 'images-39.jpg', '', 'image/jpeg', 24969, '2022-03-21'),
(24, '38', '', '', 'images-38.jpg', '', 'image/jpeg', 21857, '2022-03-21'),
(25, '37', '', '', 'images-37.jpg', '', 'image/jpeg', 20381, '2022-03-21');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(7, 'user1', '123', 'user', 'userovich', 'images-37.jpg'),
(16, 'user2', '123', 'user2', 'user2ovich', 'images-5.jpg');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `photos`
--
ALTER TABLE `photos`
  ADD UNIQUE KEY `id` (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
