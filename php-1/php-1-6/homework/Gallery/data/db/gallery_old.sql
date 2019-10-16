-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 15 2019 г., 16:51
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `root`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `small` text NOT NULL,
  `big` text NOT NULL,
  `views` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `small`, `big`, `views`, `likes`) VALUES
(1, '1.jpg', 'files/small/01.jpg', 'files/big/01.jpg', 24, 0),
(2, '2.jpg', 'files/small/02.jpg', 'files/big/02.jpg', 3, 0),
(3, '3.jpg', 'files/small/03.jpg', 'files/big/03.jpg', 14, 0),
(4, '4.jpg', 'files/small/04.jpg', 'files/big/04.jpg', 13, 0),
(5, '5.jpg', 'files/small/05.jpg', 'files/big/05.jpg', 1, 0),
(6, '6.jpg', 'files/small/06.jpg', 'files/big/06.jpg', 0, 0),
(7, '7.jpg', 'files/small/07.jpg', 'files/big/07.jpg', 1, 0),
(8, '8.jpg', 'files/small/08.jpg', 'files/big/08.jpg', 0, 0),
(9, '9.jpg', 'files/small/09.jpg', 'files/big/09.jpg', 15, 0),
(10, '10.jpg', 'files/small/10.jpg', 'files/big/10.jpg', 0, 0),
(11, '11.jpg', 'files/small/11.jpg', 'files/big/11.jpg', 0, 0),
(12, '12.jpg', 'files/small/12.jpg', 'files/big/12.jpg', 0, 0),
(13, '13.jpg', 'files/small/13.jpg', 'files/big/13.jpg', 7, 0),
(14, '14.jpg', 'files/small/14.jpg', 'files/big/14.jpg', 2, 0),
(15, '15.jpg', 'files/small/15.jpg', 'files/big/15.jpg', 3, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
