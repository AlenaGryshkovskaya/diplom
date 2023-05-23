-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 23 2023 г., 13:23
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diploma`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `counts` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Платья', '1one.jpg'),
(2, 'Юбки', NULL),
(3, 'Брюки', NULL),
(4, 'Футболки', '2one.jpg'),
(5, 'Джинсы', NULL),
(6, 'Шорты', NULL),
(7, 'Куртки', NULL),
(8, 'Спортивные костюмы', NULL),
(9, 'Топы', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'Белый'),
(2, 'Черный'),
(3, 'Серый'),
(4, 'Коричневый'),
(5, 'Синий'),
(6, 'Зеленый'),
(7, 'Красный'),
(8, 'Розовый'),
(9, 'Фиолетовый'),
(10, 'Оранжевый'),
(11, 'Желтый'),
(12, 'Малиновый'),
(13, 'Бирюзовый'),
(14, 'Сиреневый'),
(15, 'Оливковый'),
(16, 'Темно-синий'),
(17, 'Бежевый'),
(18, 'Рыжий');

-- --------------------------------------------------------

--
-- Структура таблицы `floor`
--

CREATE TABLE `floor` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `floor`
--

INSERT INTO `floor` (`id`, `name`, `image`) VALUES
(1, 'Женщинам', 'image1.jpg'),
(2, 'Мужчинам', 'image2.jpg'),
(3, 'Детям', 'image3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `counts` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `warning` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `product_id`, `counts`, `status`, `warning`, `created_at`) VALUES
(1, 3, 7, 1, 2, '', '2023-05-19 06:33:16');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `category_id` int NOT NULL,
  `floor_id` int DEFAULT NULL,
  `image_one` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `image_two` varchar(256) DEFAULT NULL,
  `image_three` varchar(256) DEFAULT NULL,
  `price` decimal(11,0) NOT NULL,
  `description` text NOT NULL,
  `size_id` int NOT NULL,
  `color_id` int DEFAULT NULL,
  `counts` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `floor_id`, `image_one`, `image_two`, `image_three`, `price`, `description`, `size_id`, `color_id`, `counts`, `created_at`) VALUES
(1, 'Платье с воланами', 1, 1, '1one.jpg', '1two.jpg', '1three.jpg', '2799', 'Состав: 40% хлопок, 60% полиэстер\r\nСтрана-производитель: КИТАЙ\r\nУход: Ручная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Профессиональная сухая чистка. Мягкий режим.', 12, 1, 4, '2023-05-15 08:23:37'),
(2, 'Футболка с карманом', 4, 2, '2one.jpg', '2two.jpg', '2three.jpg', '1599', 'Состав: 100% хлопок\r\nСтрана-производитель: КИТАЙ\r\nУход: Бережная стирка при максимальной температуре 30ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Сухая чистка запрещена', 16, 5, 4, '2023-05-15 09:31:56'),
(3, 'Джинсы slim', 5, 2, '3one.jpg', '3two.jpg', '3three.jpg', '2999', 'Состав: 62% хлопок, 36% полиэстер, 2% эластан\nСтрана-производитель: КИТАЙ\nУход: Бережная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Сухая чистка запрещена', 17, 5, 0, '2023-05-16 08:08:59'),
(4, 'Платье с воланами', 1, 1, '1one.jpg', '1two.jpg', '1three.jpg', '2799', 'Состав: 40% хлопок, 60% полиэстер\r\nСтрана-производитель: КИТАЙ\r\nУход: Ручная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Профессиональная сухая чистка. Мягкий режим.', 12, 1, 3, '2023-05-15 08:23:37'),
(5, 'Топ из вискозы', 9, 1, '4one.jpg', '4two.jpg', '4three.jpg', '25999', 'Состав: 89% вискоза, 11% полиамид\r\nСтрана-производитель: КИТАЙ\r\nУход: Ручная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Профессиональная сухая чистка. Мягкий режим.', 15, 6, 2, '2023-05-16 08:23:37'),
(6, 'Топ из вискозы', 9, 1, '4one.jpg', '4two.jpg', '4three.jpg', '25999', 'Состав: 89% вискоза, 11% полиамид\r\nСтрана-производитель: КИТАЙ\r\nУход: Ручная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Профессиональная сухая чистка. Мягкий режим.', 15, 6, 2, '2023-05-16 08:23:37'),
(7, 'Платье с воланами', 1, 1, '1one.jpg', '1two.jpg', '1three.jpg', '2799', 'Состав: 40% хлопок, 60% полиэстер\r\nСтрана-производитель: КИТАЙ\r\nУход: Ручная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Профессиональная сухая чистка. Мягкий режим.', 12, 1, 4, '2023-05-15 08:23:37'),
(8, 'Футболка с карманом', 4, 2, '2one.jpg', '2two.jpg', '2three.jpg', '1599', 'Состав: 100% хлопок\r\nСтрана-производитель: КИТАЙ\r\nУход: Бережная стирка при максимальной температуре 30ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Сухая чистка запрещена', 16, 5, 6, '2023-05-15 09:31:56'),
(9, 'Джинсы slim', 5, 2, '3one.jpg', '3two.jpg', '3three.jpg', '2999', 'Состав: 62% хлопок, 36% полиэстер, 2% эластан\r\nСтрана-производитель: КИТАЙ\r\nУход: Бережная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Сухая чистка запрещена', 17, 5, 4, '2023-05-16 08:08:59'),
(10, 'Платье с воланами', 1, 1, '1one.jpg', '1two.jpg', '1three.jpg', '2799', 'Состав: 40% хлопок, 60% полиэстер\r\nСтрана-производитель: КИТАЙ\r\nУход: Ручная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Профессиональная сухая чистка. Мягкий режим.', 12, 1, 4, '2023-05-15 08:23:37'),
(11, 'Топ из вискозы', 9, 1, '4one.jpg', '4two.jpg', '4three.jpg', '25999', 'Состав: 89% вискоза, 11% полиамид\r\nСтрана-производитель: КИТАЙ\r\nУход: Ручная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Профессиональная сухая чистка. Мягкий режим.', 15, 6, 2, '2023-05-16 08:23:37'),
(12, 'Топ из вискозы', 9, 1, '4one.jpg', '4two.jpg', '4three.jpg', '25999', 'Состав: 89% вискоза, 11% полиамид\r\nСтрана-производитель: КИТАЙ\r\nУход: Ручная стирка при максимальной температуре 40ºС, Не отбеливать, Машинная сушка запрещена, Глажение при 110ºС, Профессиональная сухая чистка. Мягкий режим.', 15, 6, 2, '2023-05-16 08:23:37');

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE `size` (
  `id` int NOT NULL,
  `name` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 18),
(2, 20),
(3, 22),
(4, 24),
(5, 26),
(6, 28),
(7, 30),
(8, 32),
(9, 34),
(10, 36),
(11, 38),
(12, 40),
(13, 42),
(14, 44),
(15, 46),
(16, 48),
(17, 50),
(18, 52),
(19, 54),
(20, 56),
(21, 58),
(22, 60),
(23, 62),
(24, 64),
(25, 66),
(26, 68),
(27, 70);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `patronomic` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `authKey` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `patronomic`, `email`, `password`, `is_admin`, `created_at`, `authKey`) VALUES
(1, 'popo', 'popo', 'popo', 'popo', 'popo@popo.popo', 'popopopo', 0, '2023-05-12 06:36:51', NULL),
(2, 'roro', 'roro', 'roro', NULL, 'roro@roro.roro', '$2y$13$I/uXbl5etCprFxafsdrUeu5CduRh0mTL8m7hkgXmCso8YSu2krwnG', 0, '2023-05-12 06:48:34', NULL),
(3, 'admin', 'admin', 'admin', 'admin', 'admin@ad.mi', '$2y$13$uWojIxoK6ppbr/Z8vdeOP.Jp63RB6nwgbDAGbkIgHs34MSLUtzXsO', 0, '2023-05-12 08:26:43', NULL),
(4, 'zxzxzx', 'zxzxzx', 'zxzxzx', 'zxzxzx', 'zxzxzx@zxzxzx.zxzxzx', '$2y$13$wmuqKTRAFPR34DoS4NXewOKh8zWmACNNsfpt.O7YSauoLZsOY3RaG', 0, '2023-05-12 08:28:28', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Индексы таблицы `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `size`
--
ALTER TABLE `size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
