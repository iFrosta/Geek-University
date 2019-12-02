-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 02 2019 г., 23:25
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
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `id_session` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_good`, `id_session`) VALUES
(3, 6, '1uf67hk9584t2hr1lb8o720n1h9vuffr'),
(4, 15, 'ogs2ehraeb6tdrr8ban4f8k64jq0ibh9'),
(5, 7, 'ogs2ehraeb6tdrr8ban4f8k64jq0ibh9'),
(6, 11, 'ogs2ehraeb6tdrr8ban4f8k64jq0ibh9'),
(7, 3, 'ogs2ehraeb6tdrr8ban4f8k64jq0ibh9'),
(16, 15, '1uf67hk9584t2hr1lb8o720n1h9vuffr'),
(20, 14, 'c0n81ghg9r0a5q07gasjhqo0216pajbb'),
(21, 11, 'c0n81ghg9r0a5q07gasjhqo0216pajbb'),
(22, 7, 'c0n81ghg9r0a5q07gasjhqo0216pajbb'),
(23, 3, 'mm2e3veeu18896f125sv1o4k13gkr5ld'),
(24, 12, 'mm2e3veeu18896f125sv1o4k13gkr5ld'),
(25, 11, 'mm2e3veeu18896f125sv1o4k13gkr5ld'),
(26, 11, 'ic05np66pv2h55giv5j6k8n99hfjg8aq'),
(27, 5, 'ic05np66pv2h55giv5j6k8n99hfjg8aq'),
(28, 8, 'ic05np66pv2h55giv5j6k8n99hfjg8aq'),
(29, 2, 'ic05np66pv2h55giv5j6k8n99hfjg8aq'),
(31, 1, '1uf67hk9584t2hr1lb8o720n1h9vuffr');

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
(1, 'Вася', 'Все хорошо'),
(2, 'Петя', 'Все плохо');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback-img`
--

CREATE TABLE `feedback-img` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL,
  `imgID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback-img`
--

INSERT INTO `feedback-img` (`id`, `name`, `feedback`, `imgID`) VALUES
(2, 'Егор', 'Хорошая картина', 2),
(3, 'Леша', 'Просто космос', 1),
(4, 'Андрей', 'Ого', 3),
(11, 'Петр', 'Фотошоп!', 8),
(12, 'Сергей', 'Хм', 8),
(13, 'Сергей', 'Отлично', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `views`) VALUES
(1, 310),
(2, 15),
(3, 51),
(4, 29),
(5, 13),
(6, 26),
(7, 17),
(8, 151),
(9, 20),
(10, 20),
(11, 14),
(12, 2),
(13, 23),
(14, 14),
(15, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `views`, `name`, `description`, `price`) VALUES
(1, 541, 'Space', 'Space is a term that can refer to various phenomena in science, mathematics, and communications. In astronomy and cosmology, space is the vast 3-dimensional region that begins where the earth\'s atmosphere ends.', 999),
(2, 465, 'image 2', ' Malesuada feugiat pulvinar tortor ultrices nisi convallis ex massa cubilia curae aptent donec nisl.', 381),
(3, 269, 'image 3', ' Elit mi in velit vestibulum venenatis molestie hac libero donec. A purus euismod urna turpis', 228),
(4, 380, 'image 4', ' Maecenas scelerisque venenatis ex ante hendrerit sollicitudin pretium tempus eu commodo class.', 753),
(5, 126, 'image 5', ' Tortor ultrices aliquam posuere nullam quam consequat platea commodo maximus porta tristique.', 576),
(6, 211, 'image 6', ' Mi at velit nibh phasellus ultricies platea ad fermentum. Ultricies maximus nostra eros sem. Non', 911),
(7, 102, 'image 7', ' Lorem ex primis commodo porta netus fames iaculis. Elit interdum erat quis tellus ante posuere', 913),
(8, 389, 'image 8', ' Interdum sapien scelerisque quis fusce augue dapibus lectus curabitur. Vitae lobortis nisi nullam', 430),
(9, 105, 'image 9', ' Sapien id nunc quisque semper phasellus orci sollicitudin arcu habitasse porta odio eros sem', 301),
(10, 166, 'image 10', ' Sit amet velit mauris tincidunt suspendisse nunc varius posuere tempus eu eros sem ullamcorper', 781),
(11, 324, 'image 11', ' Luctus a posuere maximus donec. Sit in leo a nullam euismod consequat accumsan aliquet. Nulla in', 808),
(12, 48, 'image 12', ' Egestas hendrerit fermentum aenean. Sed maecenas et augue potenti congue bibendum. Adipiscing non', 821),
(13, 242, 'image 13', ' In velit metus a tellus ornare arcu dui himenaeos curabitur bibendum. Lorem nisi curae dapibus dui', 338),
(14, 256, 'image 14', ' Non placerat purus senectus. Lorem sit justo luctus feugiat eget pretium potenti accumsan suscipit', 535),
(15, 132, 'image 15', ' Dolor ac phasellus molestie cursus ex varius sollicitudin eu dui aptent ad conubia neque suscipit.', 630);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session` text NOT NULL,
  `name` text NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `login` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session`, `name`, `phone`, `address`, `login`) VALUES
(1, '1uf67hk9584t2hr1lb8o720n1h9vuffr', 'Sam', 79999999, 'sam@mail.com', 'nologin'),
(2, 'c0n81ghg9r0a5q07gasjhqo0216pajbb', 'Oleg', 1999999, 'oleg@mail.ru', 'nologin'),
(3, 'mm2e3veeu18896f125sv1o4k13gkr5ld', 'Ron', 399999999, 'ron@mail.ru', 'nologin'),
(4, 'ic05np66pv2h55giv5j6k8n99hfjg8aq', 'Steve', 214321421, 'steve@mail.ru', 'nologin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$GAh95KWqFf1Fw4YyH/BCnuODYbJ1Mln78vDuOIwj7WQvChhR8QcX.', '5267162135de5661085e904.94973770');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback-img`
--
ALTER TABLE `feedback-img`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `feedback-img`
--
ALTER TABLE `feedback-img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
