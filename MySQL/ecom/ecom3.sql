-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2021 г., 21:10
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ecom3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`) VALUES
(8, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `delivery_types`
--

CREATE TABLE `delivery_types` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `delivery_types`
--

INSERT INTO `delivery_types` (`id`, `status`) VALUES
(1, 'SDEK'),
(2, 'MailRussia');

-- --------------------------------------------------------

--
-- Структура таблицы `in_cart`
--

CREATE TABLE `in_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `in_cart`
--

INSERT INTO `in_cart` (`id`, `product_id`, `quantity`, `cart_id`, `status`) VALUES
(13, 10, 3, 8, 1),
(24, 9, 5, 2, 1),
(25, 3, 3, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `email` text NOT NULL,
  `statusId` int(11) NOT NULL,
  `clientName` text NOT NULL,
  `deliveryTypeId` int(11) NOT NULL,
  `paymentTypeId` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `address`, `phone`, `email`, `statusId`, `clientName`, `deliveryTypeId`, `paymentTypeId`, `cart_id`) VALUES
(1, '', 0, '', 1, 'sam', 2, 0, 0),
(2, 'Krasnoarmeiskiy pr, 8 / 225 Tula 777777', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(3, 'Krasnoarmeiskiy pr, 8 / 225 Tula 2222222', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 1, 1, 2),
(4, 'Krasnoarmeiskiy pr, 8 / 225 Tula gfhfh', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 1, 1, 2),
(5, 'Krasnoarmeiskiy pr, 8 / 225 Tula 45646464', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 1, 1, 2),
(6, 'Krasnoarmeiskiy pr, 8 / 225 Tula 21231', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(7, 'Krasnoarmeiskiy pr, 8 / 225 Tula 21231', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(8, 'Krasnoarmeiskiy pr, 8 / 225 Tula 345353535', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 1, 1, 2),
(9, 'Krasnoarmeiskiy pr, 8 / 225 Tula 1231313', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 1, 1, 2),
(10, 'Krasnoarmeiskiy pr, 8 / 225 Tula asdads', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 1, 1, 2),
(11, 'Krasnoarmeiskiy pr, 8 / 225 Tula asdads', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 1, 1, 2),
(12, 'Krasnoarmeiskiy pr, 8 / 225 Tula 23434', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(13, 'Krasnoarmeiskiy pr, 8 / 225 Tula 6756757', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(14, 'Krasnoarmeiskiy pr, 8 / 225 Tula 123213123', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 1, 1, 2),
(15, 'Krasnoarmeiskiy pr, 8 / 225 Tula 333333', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(16, 'Krasnoarmeiskiy pr, 8 / 225 Tula 3343434', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(17, 'Krasnoarmeiskiy pr, 8 / 225 Tula 453535', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(18, 'Krasnoarmeiskiy pr, 8 / 225 Tula utgigk', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(19, 'Krasnoarmeiskiy pr, 8 / 225 Tula 77777777', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 1, 1, 2),
(20, 'Krasnoarmeiskiy pr, 8 / 225 Tula aa', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 2, 2),
(21, 'Krasnoarmeiskiy pr, 8 / 225 Tula sdfsf', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(22, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(23, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(24, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(25, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(26, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(27, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(28, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(29, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(30, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(31, 'Krasnoarmeiskiy pr, 8 / 225 Tula ', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2),
(32, 'Krasnoarmeiskiy pr, 8 / 225 Tula рррр', 7950333, 'sam@mail.ru', 1, 'Murad Gah', 2, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(11) NOT NULL,
  `typeName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `payment_types`
--

INSERT INTO `payment_types` (`id`, `typeName`) VALUES
(1, 'C.O.D'),
(2, 'Transfer to Sberbank');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` int(20) NOT NULL,
  `active` int(10) NOT NULL,
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `active`, `img_path`) VALUES
(2, 'Chevrolet', 'white', 9000, 0, '/img/ch'),
(3, 'Lincoln', 'red', 2, 1, '/img'),
(4, 'Skoda', 'Green', 9000, 1, '/img'),
(5, 'Saab', 'Gold', 13000, 1, '/'),
(7, 'Lada', 'Yellow', 3000, 1, '/'),
(8, 'Volkswagen', 'Grey', 15309, 0, '/'),
(9, 'Ford', 'White', 19000, 1, '/'),
(10, 'Jeep', 'Red', 10, 0, '/');

-- --------------------------------------------------------

--
-- Структура таблицы `quantity`
--

CREATE TABLE `quantity` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `quantity`
--

INSERT INTO `quantity` (`id`, `store_id`, `product_id`, `quantity`) VALUES
(1, 1, 8, 13),
(2, 2, 7, 9),
(3, 3, 8, 11),
(4, 4, 5, 7),
(5, 2, 2, 5),
(6, 4, 4, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `status_types`
--

CREATE TABLE `status_types` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `status_types`
--

INSERT INTO `status_types` (`id`, `status`) VALUES
(1, 'accepted'),
(2, 'transferred to the formation'),
(3, 'formed'),
(4, 'in the delivery service'),
(5, 'delivered'),
(6, 'awaiting receipt'),
(7, 'received'),
(8, 'not received/comes back'),
(9, 'refused/comes back');

-- --------------------------------------------------------

--
-- Структура таблицы `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `addres` varchar(64) NOT NULL,
  `city` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stores`
--

INSERT INTO `stores` (`id`, `name`, `addres`, `city`) VALUES
(1, 'Shop 1', 'Pushkina 2', 'Moscow'),
(2, 'Shop 2', 'Kolorushkina 3', 'Moscow'),
(3, 'Shop 3', 'Petrovskaya 56', 'Tula'),
(4, 'Shop 4', 'Razumovskaya 13', 'Tula');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `phone` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`) VALUES
(1, 'Egor', '123123'),
(2, 'Pavel', '12312312'),
(3, 'Inna', '123123'),
(4, 'Andrei', '12312312');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Индексы таблицы `delivery_types`
--
ALTER TABLE `delivery_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `in_cart`
--
ALTER TABLE `in_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`,`cart_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `quantity`
--
ALTER TABLE `quantity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_id` (`store_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `status_types`
--
ALTER TABLE `status_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stores`
--
ALTER TABLE `stores`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `delivery_types`
--
ALTER TABLE `delivery_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `in_cart`
--
ALTER TABLE `in_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `quantity`
--
ALTER TABLE `quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `status_types`
--
ALTER TABLE `status_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `in_cart`
--
ALTER TABLE `in_cart`
  ADD CONSTRAINT `in_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `in_cart_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);

--
-- Ограничения внешнего ключа таблицы `quantity`
--
ALTER TABLE `quantity`
  ADD CONSTRAINT `quantity_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `quantity_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
