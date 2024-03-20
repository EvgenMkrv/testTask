-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 20 2024 г., 18:00
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user_accounts`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `phone_number_1` varchar(10) DEFAULT NULL,
  `phone_number_2` varchar(10) DEFAULT NULL,
  `phone_number_3` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `email`, `company_name`, `position`, `phone_number_1`, `phone_number_2`, `phone_number_3`) VALUES
(3, 'alex', 'smith', 'alm@yahoo.com', '', '', '', '', ''),
(8, 'Petr', 'Ivanov', 'pir@mail.ru', '', '', '', '', ''),
(9, 'petr', 'petrov', 'pit@mail.ru', '', '', '', '', ''),
(21, 'Eugene', 'Makarov', 'g@gmail.com', 'My', 'director', '9998997989', '', ''),
(22, 'Eugene', 'Makarov', 'eg@gmail.com', 'My', 'director', '9998997989', '', ''),
(23, 'mike', 'shinoda', 'mike@gmail.com', 'LP', 'singer', '9123456789', '9876543211', '8523697412'),
(28, 'tod', 'hovard', 'tod@gmail.ru', 'beth', 'director', '9874563215', '9865321247', '7539518264'),
(29, 'vasia', 'vase4kin', 'vas@mail.ru', '', '', '', '', ''),
(30, 'igor', 'sidorov', 'sid@mail.ru', '', '', '', '', ''),
(31, 'oleg', 'popov', 'pop@mail.ru', 'church', 'padre', '', '', ''),
(33, 'petr', 'petrov', 'petia@mail.ru', '', '', '', '', ''),
(34, 'semion', 'semenov', 'sem@mail.ru', 'none', 'manager', '9874563210', '9874563210', '0123654789'),
(35, 'maks', 'fadeev', 'max@gmail.ru', 'ansambl', 'produser', '', '', ''),
(37, 'maga', 'magomedovi4', 'mage@yandex.ru', '', '', '', '', ''),
(38, 'alex', 'lekseenko', 'alex@yahoo.com', 'tsd', 'cleaner', '', '', ''),
(39, 'fiona', 'shrekova', 'fio@mail.ru', 'kingdom', 'queen', '', '', ''),
(40, 'arieal', 'poseidonova', 'mermaid@ocean.net', 'seafood', '', '', '', ''),
(41, 'sveta', 'koneva', 'sv@mail.ru', 'noname', 'nobody', '9852367410', '', ''),
(42, 'katia', 'krasova', 'kate@yandex.ru', '', '', '', '', ''),
(43, 'marina', 'volkova', 'volk@forest.com', '', '', '', '', ''),
(44, 'diana', 'ko4anova', 'dina@yandex.ru', '', '', '', '', ''),
(45, 'Janna', 'perova', 'flight@mail.ru', 'avia', 'stuvardess', '', '', ''),
(50, 'petr', 'pavel', 'pitpav@gmail.com', 'latvia', 'president', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
