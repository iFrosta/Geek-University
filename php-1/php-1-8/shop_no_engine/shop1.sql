-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 13 2018 г., 22:18
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `idx` int(11) NOT NULL,
  `session` text NOT NULL,
  `id_good` int(11) NOT NULL,
  `col` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`idx`, `session`, `id_good`, `col`) VALUES
(4, 'pssn19b87mbgl3d28hidih6kd3', 2, 3),
(5, 'pssn19b87mbgl3d28hidih6kd3', 1, 1),
(7, 'en4v36ohki52m12o73eh4j51s7', 2, 1),
(8, '5pkthe4igupi5acjmc9ac080u2', 1, 2),
(9, '5pkthe4igupi5acjmc9ac080u2', 2, 1),
(10, '5pkthe4igupi5acjmc9ac080u2', 3, 1),
(12, 'u3db3f9qj1hnmcg575hmlf1c63', 1, 1),
(13, 'u3db3f9qj1hnmcg575hmlf1c63', 2, 1),
(14, '2brunnsqebqpt9e5409npffhj1', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `idx` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`idx`, `name`, `price`, `image`) VALUES
(1, 'Ноутбук Acer', 10000, '64270.jpg'),
(2, 'Ноутбук HP 15-bs516ur 2GF21EA', 20000, '5a48e1b05e92bbc5a50a809e516e1edf.jpg'),
(3, 'Ноутбук Lenovo IdeaPad 110-15IBR (80T700С2RK)', 30000, '7.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `guestbook`
--

CREATE TABLE `guestbook` (
  `idx` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `text` text NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guestbook`
--

INSERT INTO `guestbook` (`idx`, `name`, `email`, `text`, `data`) VALUES
(1, 'Олег', 'Evebay', 'Все хорошо', '2018-03-22'),
(5, 'Иван', 'evebay@mail.ru', 'Проверка', '2018-03-22'),
(6, 'Петя', 'evebay3@gmail.com', 'Хороший магазин', '2018-03-22'),
(7, 'Олег', 'evebay@mail.ru', 'ee', '2018-07-13');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `idx` int(11) NOT NULL,
  `filename` text NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`idx`, `filename`, `likes`) VALUES
(1, '01.jpg', 47),
(2, '02.jpg', 9),
(3, '03.jpg', 1),
(4, '04.jpg', 6),
(5, '05.jpg', 0),
(6, '06.jpg', 8),
(7, '07.jpg', 9),
(8, '08.jpg', 8),
(9, '09.jpg', 11),
(10, '10.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `idx` int(11) NOT NULL,
  `news_title` text NOT NULL,
  `prev` text NOT NULL,
  `news_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`idx`, `news_title`, `prev`, `news_body`) VALUES
(1, 'Новость 1', 'Краткая новость 1', 'Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 '),
(2, 'Новость 2', 'Краткая новость 2', 'Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 ');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `idx` int(11) NOT NULL,
  `session` text NOT NULL,
  `status` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`idx`, `session`, `status`, `name`, `phone`, `adres`) VALUES
(1, 'pssn19b87mbgl3d28hidih6kd3', 2, 'Олег', '222', 'Москва'),
(2, 'en4v36ohki52m12o73eh4j51s7', 2, 'Иван', '123123', 'Томск'),
(3, '5pkthe4igupi5acjmc9ac080u2', 2, 'Admin', '222', 'Mosk');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
