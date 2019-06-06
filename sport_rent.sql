-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 14 2019 г., 00:14
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sport_rent`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(5) UNSIGNED NOT NULL,
  `family` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `id_role` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `login` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `family`, `name`, `father`, `id_role`, `login`, `password`, `email`, `phone`) VALUES
(0, '???????', '??????', '', 1, 'УДАЛЕН', 'УДАЛЕН', 'ma3aukos@gmail.com', '89963361958'),
(1, 'Михайлов', 'Стас', 'Незнаювич', 1, 'STASYAN11', 'stas111', 'stasik@mail.ru', ''),
(2, 'Зарипов', 'дэнчик', 'Наилевич', 1, 'login', 'qweqweqweqwe', 'GonZall00@yandex.ru', ''),
(6, 'Герасимов', 'Герасим', 'Герасимович', 1, 'gera', 'qwe', 'ger@gmail.com', ''),
(8, 'Зарипов', 'Данияр', 'Наилевич', 2, 'GonZallo', '2b306a6dbccc3c86f6bdc4c29856e883', 'ma3aukos@gmail.com', '89963361958'),
(10, 'Михайлов', 'вениамин', 'Герасимович', 1, 'SALAMPOC', 'd35db77f2be0a271d37ca4028e6c928b', 'ja@gil.com', '');

-- --------------------------------------------------------

--
-- Структура таблицы `fines`
--

CREATE TABLE `fines` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(70) NOT NULL,
  `cost` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fines`
--

INSERT INTO `fines` (`id`, `name`, `cost`) VALUES
(1, 'Отсутствует', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `mark`
--

CREATE TABLE `mark` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mark`
--

INSERT INTO `mark` (`id`, `name`) VALUES
(0, 'УДАЛЕН'),
(1, 'Xiaomi'),
(2, 'УДАЛЕНО'),
(4, 'CACTUS '),
(5, 'RAZOR'),
(6, 'MAXFIND '),
(7, 'SPEEDWAY'),
(8, 'ULTRON '),
(9, 'ZAXBOARD '),
(10, 'KIWANO '),
(11, 'SKYBOARD ');

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE `price` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_product` int(5) UNSIGNED NOT NULL,
  `cost` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `id_product`, `cost`) VALUES
(0, 0, 0),
(3, 3, 55),
(6, 7, 80),
(7, 8, 100),
(8, 9, 130),
(9, 10, 90),
(10, 11, 130),
(11, 12, 40),
(12, 13, 60),
(13, 14, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(5) UNSIGNED NOT NULL,
  `year` date NOT NULL,
  `id_model` int(5) UNSIGNED NOT NULL,
  `id_type` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `year`, `id_model`, `id_type`) VALUES
(0, '0000-00-00', 0, 0),
(3, '2018-07-01', 3, 1),
(6, '2018-12-05', 5, 2),
(7, '2019-04-13', 5, 2),
(8, '2019-01-11', 7, 3),
(9, '2018-06-10', 8, 3),
(10, '2016-07-10', 9, 1),
(11, '2019-04-13', 10, 1),
(12, '2018-04-13', 11, 2),
(13, '2017-07-02', 12, 2),
(14, '2018-12-08', 13, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product_model`
--

CREATE TABLE `product_model` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_mark` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_model`
--

INSERT INTO `product_model` (`id`, `name`, `id_mark`) VALUES
(0, 'УДАЛЕН', 0),
(3, 'Ninebot KickScooter ES2', 1),
(5, 'CS-GYROCYCLE_F1_SL, 8.5', 4),
(6, 'CS-GYROCYCLE_F1_SL, 8.5', 4),
(7, 'CRUISER', 5),
(8, 'MAX 1А', 6),
(9, 'MINI4 PRO', 7),
(10, 'T118', 8),
(11, 'ZX-11 PRO', 9),
(12, 'KO-X ES05', 10),
(13, 'Зенит 6,5\"', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `product_types`
--

CREATE TABLE `product_types` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_types`
--

INSERT INTO `product_types` (`id`, `name`) VALUES
(0, 'УДАЛЕН'),
(1, 'Электросамокат'),
(2, 'Гироскутер'),
(3, 'Электроскейтборд');

-- --------------------------------------------------------

--
-- Структура таблицы `rent`
--

CREATE TABLE `rent` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_client` int(5) UNSIGNED NOT NULL,
  `id_price` int(5) UNSIGNED NOT NULL,
  `id_fines` int(5) UNSIGNED NOT NULL DEFAULT '1',
  `start_rent` datetime(6) NOT NULL,
  `end_rent` datetime(6) NOT NULL,
  `summary` int(14) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rent`
--

INSERT INTO `rent` (`id`, `id_client`, `id_price`, `id_fines`, `start_rent`, `end_rent`, `summary`) VALUES
(11, 8, 0, 1, '2019-04-13 11:00:00.000000', '2019-04-13 17:00:00.000000', 480),
(12, 8, 0, 1, '2019-04-13 11:00:00.000000', '2019-04-13 19:30:00.000000', 680),
(14, 8, 6, 1, '2019-04-13 15:00:00.000000', '2019-04-13 19:50:00.000000', 387),
(20, 10, 7, 1, '2019-04-13 00:00:00.000000', '2019-04-17 00:00:00.000000', 9600),
(21, 10, 8, 1, '2019-04-14 00:02:00.000000', '2019-04-14 05:08:00.000000', 663),
(22, 10, 12, 1, '2019-04-21 06:02:00.000000', '2019-04-22 03:00:00.000000', 1258);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Пользователь'),
(2, 'Администратор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_model` (`id_product`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_model`),
  ADD KEY `id_type_2` (`id_type`);

--
-- Индексы таблицы `product_model`
--
ALTER TABLE `product_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_mark`);

--
-- Индексы таблицы `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_client`,`id_price`),
  ADD KEY `id_price` (`id_price`),
  ADD KEY `id_fines` (`id_fines`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `fines`
--
ALTER TABLE `fines`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `product_model`
--
ALTER TABLE `product_model`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Ограничения внешнего ключа таблицы `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `product_model` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `product_types` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_model`
--
ALTER TABLE `product_model`
  ADD CONSTRAINT `product_model_ibfk_1` FOREIGN KEY (`id_mark`) REFERENCES `mark` (`id`);

--
-- Ограничения внешнего ключа таблицы `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`id_price`) REFERENCES `price` (`id`),
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`id_fines`) REFERENCES `fines` (`id`),
  ADD CONSTRAINT `rent_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
