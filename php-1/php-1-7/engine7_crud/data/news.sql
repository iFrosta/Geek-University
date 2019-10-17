-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 17 2019 г., 13:52
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(4, 'Олег', 'Сообщение'),
(18, 'Олег', 'Все хорошо');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_goods`
--

CREATE TABLE `feedback_goods` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text CHARACTER SET utf32 NOT NULL,
  `id_good` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback_goods`
--

INSERT INTO `feedback_goods` (`id`, `name`, `feedback`, `id_good`) VALUES
(3, 'Олег', 'Отзыв2', 2),
(5, 'Иван', 'УРА', 9),
(6, 'Иван', 'Вот это кораблик!', 9),
(7, 'Иван', 'А мне этот нравится3', 2),
(8, 'Олег', 'КУКУК', 1),
(9, 'Олег', 'Сообщение2', 9);

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
(1, '01.jpg', 86),
(2, '02.jpg', 85),
(3, '03.jpg', 8),
(4, '04.jpg', 10),
(5, '05.jpg', 8),
(6, '06.jpg', 8),
(7, '07.jpg', 9),
(8, '08.jpg', 11),
(9, '09.jpg', 124),
(10, '10.jpg', 18);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `prev` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category`, `prev`, `text`) VALUES
(1, 1, 'Вице-премьер Италии призвал бороться против антироссийских санкций', 'Глава движения Пять звезд, министр экономического развития, труда и социальной политики Италии Луиджи Ди Майо\r\n© AFP 2019 / Alberto Pizzolo\r\nМОСКВА, 10 фев — РИА Новости. Правительство Италии намерено добиться пересмотра антироссийских санкций, заявил вице-премьер и министр экономического развития страны Луиджи Ди Майо. Об этом сообщило информационное агентство ANSA.\r\nДи Майо подчеркнул, что санкционный режим в отношении Москвы наносит значительный ущерб итальянскому бизнесу. По его словам, если компании несут огромные потери из-за антироссийских ограничений, то санкционную политику надо пересмотреть.'),
(2, 1, 'В России оценили призыв посла США к Германии увеличить расходы на оборону', 'Покровский собор (храм Василия Блаженного) и площадь Васильевский спуск \r\n© РИА Новости / Григорий Сысоев\r\nМОСКВА, 10 фев — РИА Новости. В обеих палатах парламента отреагировали на заявление посла США в Германии Ричарда Греннела о том, что \"Россия стоит на пороге\".\r\nТаким образом американский дипломат \"аргументировал\" необходимость увеличить расходы Берлина на оборону НАТО с полутора процентов до двух к 2024 году.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback_goods`
--
ALTER TABLE `feedback_goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `feedback_goods`
--
ALTER TABLE `feedback_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
