-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 22 2019 г., 20:22
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
(1, 472, 'Space', 'Space is a term that can refer to various phenomena in science, mathematics, and communications. In astronomy and cosmology, space is the vast 3-dimensional region that begins where the earth\'s atmosphere ends.', 999),
(2, 452, 'image 2', ' Malesuada feugiat pulvinar tortor ultrices nisi convallis ex massa cubilia curae aptent donec nisl.', 381),
(3, 259, 'image 3', ' Elit mi in velit vestibulum venenatis molestie hac libero donec. A purus euismod urna turpis', 228),
(4, 377, 'image 4', ' Maecenas scelerisque venenatis ex ante hendrerit sollicitudin pretium tempus eu commodo class.', 753),
(5, 119, 'image 5', ' Tortor ultrices aliquam posuere nullam quam consequat platea commodo maximus porta tristique.', 576),
(6, 203, 'image 6', ' Mi at velit nibh phasellus ultricies platea ad fermentum. Ultricies maximus nostra eros sem. Non', 911),
(7, 87, 'image 7', ' Lorem ex primis commodo porta netus fames iaculis. Elit interdum erat quis tellus ante posuere', 913),
(8, 377, 'image 8', ' Interdum sapien scelerisque quis fusce augue dapibus lectus curabitur. Vitae lobortis nisi nullam', 430),
(9, 102, 'image 9', ' Sapien id nunc quisque semper phasellus orci sollicitudin arcu habitasse porta odio eros sem', 301),
(10, 162, 'image 10', ' Sit amet velit mauris tincidunt suspendisse nunc varius posuere tempus eu eros sem ullamcorper', 781),
(11, 307, 'image 11', ' Luctus a posuere maximus donec. Sit in leo a nullam euismod consequat accumsan aliquet. Nulla in', 808),
(12, 38, 'image 12', ' Egestas hendrerit fermentum aenean. Sed maecenas et augue potenti congue bibendum. Adipiscing non', 821),
(13, 235, 'image 13', ' In velit metus a tellus ornare arcu dui himenaeos curabitur bibendum. Lorem nisi curae dapibus dui', 338),
(14, 249, 'image 14', ' Non placerat purus senectus. Lorem sit justo luctus feugiat eget pretium potenti accumsan suscipit', 535),
(15, 116, 'image 15', ' Dolor ac phasellus molestie cursus ex varius sollicitudin eu dui aptent ad conubia neque suscipit.', 630);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
